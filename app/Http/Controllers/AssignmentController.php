<?php

namespace App\Http\Controllers;

use App\Models\Assignment;
use App\Models\Kegiatan;
use App\Models\Organisasi;
use App\Models\Responden;
use Illuminate\Http\Request;
use App\Models\RiwayatStatus;
use App\Models\Template;
use App\Services\GoogleSheetExportService;
use App\Supports\Constants;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage; // Untuk menyimpan file
use Illuminate\Support\Str;

class AssignmentController extends Controller
{
    // Kemungkinan Anda sudah punya method index dan show
    public function index(Request $request)
    {
        // Logika untuk mengambil daftar assignment, pastikan menyertakan last_riwayat_status
        // dari relasi Responden jika status disimpan di sana.
        // Contoh:
        // $user = auth()->user();
        // $kegiatanId = $request->query('kegiatanId');
        // $assignments = Assignment::where('kegiatan_id', $kegiatanId)
        //     ->where('pencacah_id', $user?->id) // atau logika role lain
        //     ->with('responden.latestRiwayatStatus') // Asumsi ada relasi latestRiwayatStatus di Responden
        //     ->get();
        // return response()->json($assignments);
        // ATAU jika Anda menyimpan status langsung di tabel assignments (sesuai Dexie)
        // dan menyinkronkannya, maka cukup ambil dari sana.

        // Untuk sementara, kita akan mengandalkan loadKegiatan yang sudah ada
        // yang mengambil semua assignment beserta responden dan riwayat statusnya.
        // Namun, idealnya DaftarAssignmentPage punya endpoint sendiri untuk list assignment
        // yang lebih ringan.
        return response()->json(['message' => 'Endpoint index assignment, implementasikan sesuai kebutuhan list.'], 501);
    }

    public function show(Assignment $assignment)
    {
        // Pastikan data assignment yang dikembalikan memuat status terakhir yang relevan.
        // $assignment->load('responden.latestRiwayatStatus');
        // return response()->json($assignment);
        return response()->json(['message' => 'Endpoint show assignment, implementasikan sesuai kebutuhan detail.'], 501);
    }

    /**
     * Sinkronisasi data assignment. Bisa untuk membuat assignment baru atau mengupdate yang sudah ada.
     * Jika $assignmentId adalah 'new' atau 0, maka akan membuat assignment baru.
     * Jika $assignmentId adalah ID yang valid, maka akan mengupdate assignment tersebut.
     */
    public function sync(Request $request, $assignmentId)
    {
        $user = auth()->user();

        // Ambil assignment dengan relasi responden yang benar
        $existingAssignment = ($assignmentId !== 'new' && $assignmentId != 0 && $assignmentId !== null)
            ? Assignment::where('id', $assignmentId)->with('respondens')->first() // Gunakan 'respondens' sesuai method di model
            : null;

        $existingResponden = $existingAssignment?->respondens; // Langsung akses, karena belongsTo
        $isCreating = ($assignmentId === 'new' || $assignmentId == 0 || !$existingResponden);

        // if ($isCreating) {
        //     abort(500, "Harusnya tidak create: " . $assignmentId . "|" . $existingAssignment?->toJson());
        // }

        // Validasi dasar
        $validationRules = [
            'answers' => 'required|json',
            'new_status' => [
                'required',
                'string',
                Rule::in([
                    'belum_dibuka',
                    'sudah_dibuka',
                    'submitted_by_pencacah',
                    'approved_by_pengawas',
                    'rejected_by_pengawas',
                    'approved_by_admin_level_1',
                    'rejected_by_admin_level_1',
                ]),
            ],
            'keterangan' => 'nullable|string|max:255',
        ];

        if ($isCreating) {
            $validationRules['kegiatan_id'] = 'required|exists:kegiatans,id';
        }

        $validatedBaseData = $request->validate($validationRules);
        $answersPlain = json_decode($validatedBaseData['answers'], true);

        if (json_last_error() !== JSON_ERROR_NONE) {
            return response()->json(['message' => 'Format JSON pada field answers tidak valid.'], 400);
        }

        DB::beginTransaction();
        try {
            $assignment = null;
            $responden = null;
            $kegiatan = null;
            $kegiatanId = null;

            if ($isCreating) {
                Log::info("Memulai pembuatan assignment baru.");
                $kegiatanId = $validatedBaseData['kegiatan_id'];
                $kegiatan = Kegiatan::findOrFail($kegiatanId);
                $template = Template::where('kegiatan_id', $kegiatan->id)
                    ->where('label_versi', Constants::VERSI_TEMPLATE_LATEST)
                    ->first();
                $templateId = $template?->id;

                // Ekstrak data wilayah dari answers
                $provinsiId = $answersPlain['q_provinsi_id'] ?? request('provinsi_id') ?? null;
                $kabkotId = $answersPlain['q_kabkot_id'] ?? request('kabkot_id') ?? null;
                $kecamatanId = $answersPlain['q_kecamatan_id'] ?? request('kecamatan_id') ?? null;
                $desaId = $answersPlain['q_desa_id'] ?? request('desa_id') ?? null;
                $slsId = $answersPlain['q_sls_id'] ?? request('sls_id') ?? null;
                $bsId = $answersPlain['q_bs_id'] ?? request('bs_id') ?? null;

                // Proses geolocation
                $latitude = null;
                $longitude = null;
                if (isset($answersPlain['q_geolocation_rumah'])) {
                    $geoData = is_string($answersPlain['q_geolocation_rumah'])
                        ? json_decode($answersPlain['q_geolocation_rumah'], true)
                        : $answersPlain['q_geolocation_rumah'];

                    if (is_array($geoData) && json_last_error() === JSON_ERROR_NONE) {
                        $latitude = $geoData['latitude'] ?? null;
                        $longitude = $geoData['longitude'] ?? null;
                    }
                }

                // 1. Buat Responden baru
                $respondenData = [
                    'id' => (string) Str::uuid(),
                    'kegiatan_id' => $kegiatanId,
                    'template_id' => $templateId,
                    'provinsi_id' => $provinsiId,
                    'kabkot_id' => $kabkotId,
                    'kecamatan_id' => $kecamatanId,
                    'desa_id' => $desaId,
                    'sls_id' => $slsId,
                    'bs_id' => $bsId,
                    'last_riwayat_status' => $validatedBaseData['new_status'],
                    'terakhir_diisi' => now(),
                    'data' => json_encode([]),
                    'latitude' => $latitude,
                    'longitude' => $longitude,
                    'jumlah_blank' => null,
                    'jumlah_error' => null,
                    'jumlah_warning' => null,
                    'jumlah_terisi' => null,
                ];

                $responden = Responden::create($respondenData);

                if (!$responden->provinsi_id) {
                    abort(500, "Wilayah ID tidak lengkap saat create: " . $responden->toJson());
                }

                Log::info("Responden baru dibuat: ID {$responden->id}");

                // 2. Buat Assignment dengan responden_id yang benar
                $assignment = Assignment::create([
                    'kegiatan_id' => $kegiatanId,
                    'pencacah_id' => $user->id,
                    'responden_id' => $responden->id, // Pastikan ini terisi dengan benar
                ]);

                Log::info("Assignment baru dibuat: ID {$assignment->id} untuk responden ID {$responden->id}");
            } else {
                // Update assignment yang sudah ada
                Log::info("Memulai update assignment ID: {$assignmentId}");
                $assignment = $existingAssignment;

                // Pastikan menggunakan relasi yang benar - respondens adalah belongsTo jadi langsung akses
                $responden = $assignment->respondens; // Bukan ->first() karena belongsTo

                if (!$responden) {
                    Log::error("Responden tidak ditemukan untuk assignment ID: {$assignment->id}");
                    DB::rollBack();
                    return response()->json(['message' => 'Data responden terkait assignment tidak ditemukan.'], 404);
                }

                // Load kegiatan melalui responden
                $kegiatan = $responden->kegiatan;
                if (!$kegiatan) {
                    Log::error("Kegiatan tidak ditemukan untuk responden ID: {$responden->id}");
                    DB::rollBack();
                    return response()->json(['message' => 'Data kegiatan terkait responden tidak ditemukan.'], 404);
                }

                $kegiatanId = $kegiatan->id;

                // Validasi bahwa responden memang milik assignment ini
                if ($responden->id !== $assignment->responden_id) {
                    Log::error("Mismatch responden: Assignment {$assignment->id} seharusnya memiliki responden {$assignment->responden_id}, tapi mendapat {$responden->id}");
                    DB::rollBack();
                    return response()->json(['message' => 'Data tidak konsisten: responden tidak sesuai dengan assignment.'], 500);
                }

                Log::info("Assignment ID {$assignment->id} ditemukan, responden ID {$responden->id}, kegiatan ID {$kegiatanId}");

                // Update geolocation jika ada
                if (isset($answersPlain['q_geolocation_rumah'])) {
                    $geoData = is_string($answersPlain['q_geolocation_rumah'])
                        ? json_decode($answersPlain['q_geolocation_rumah'], true)
                        : $answersPlain['q_geolocation_rumah'];

                    if (is_array($geoData) && json_last_error() === JSON_ERROR_NONE) {
                        $responden->latitude = $geoData['latitude'] ?? $responden->latitude;
                        $responden->longitude = $geoData['longitude'] ?? $responden->longitude;
                    }
                }
            }

            $finalAnswers = $answersPlain;

            // Proses file upload
            if ($request->hasFile('files')) {
                Log::info("Memproses file untuk responden ID: {$responden->id}");
                foreach ($request->file('files') as $questionIdWithMarker => $file) {
                    $questionId = str_replace('__file', '', $questionIdWithMarker);

                    if ($file->isValid()) {
                        $directory = "kegiatan_uploads/{$kegiatanId}/{$responden->id}/{$questionId}";
                        $clientOriginalName = preg_replace('/[^A-Za-z0-9\.\-\_]/', '_', $file->getClientOriginalName());
                        $uniqueFilename = uniqid() . '_' . $clientOriginalName;
                        $path = $file->storeAs($directory, $uniqueFilename, 'public');

                        $finalAnswers[$questionId] = Storage::url($path);

                        $placeholderKey = $questionId . '__file_placeholder';
                        if (array_key_exists($placeholderKey, $finalAnswers)) {
                            unset($finalAnswers[$placeholderKey]);
                        }

                        Log::info("File untuk {$questionId} disimpan di: {$path}");
                    } else {
                        Log::warning("File tidak valid untuk {$questionIdWithMarker}");
                    }
                }
            }

            // Update responden
            $responden->data = json_encode($finalAnswers);
            $responden->terakhir_diisi = now();
            $responden->last_riwayat_status = $validatedBaseData['new_status'];

            if (!$responden->provinsi_id) {
                abort(500, "Wilayah ID tidak lengkap saat cek terakhir: " . $responden->toJson());
            }

            $responden->save();
            Log::info("Data responden ID {$responden->id} telah diupdate.");

            // Buat riwayat status
            RiwayatStatus::create([
                'kegiatan_id' => $kegiatanId,
                'responden_id' => $responden->id,
                'status' => $validatedBaseData['new_status'],
                'user_id' => $user->id,
                'keterangan' => $validatedBaseData['keterangan'] ?? null,
            ]);

            DB::commit();
            Log::info("Sinkronisasi berhasil untuk assignment ID {$assignment->id}, responden ID {$responden->id}");

            // --- MULAI SINKRONISASI KE GOOGLE SHEET ---
            try {
                // Gunakan Service Container untuk memanggil service kita
                $exporter = app(GoogleSheetExportService::class);
                $exporter->syncRow($assignment);
            } catch (\Exception $e) {
                // JANGAN hentikan proses jika Google Sheet gagal. Cukup catat error.
                Log::error("SINKRONISASI GOOGLE SHEET GAGAL (tapi data DB aman) untuk assignment {$assignment->id}: " . $e->getMessage());
            }
            // --- SELESAI SINKRONISASI KE GOOGLE SHEET ---

            // Refresh dan load relasi yang benar
            $assignment->refresh();
            $assignment->load(['respondens' => function ($query) {
                $query->with(['riwayatStatuses', 'kegiatan', 'template']);
            }]);

            return response()->json([
                'message' => $isCreating ? 'Assignment berhasil dibuat.' : 'Assignment berhasil disinkronkan.',
                'assignment_id' => $assignment->id,
                'responden_id' => $responden->id,
                'new_status' => $validatedBaseData['new_status'],
                'assignment' => $assignment,
                'answers_processed_paths' => $finalAnswers,
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            DB::rollBack();
            Log::error("Validasi gagal: " . $e->getMessage(), ['errors' => $e->errors()]);
            return response()->json(['message' => 'Validasi gagal.', 'errors' => $e->errors()], 422);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error("Sinkronisasi gagal: " . $e->getMessage(), [
                'assignment_id_param' => $assignmentId,
                'is_creating' => $isCreating,
                'trace' => $e->getTraceAsString()
            ]);
            return response()->json(['message' => 'Sinkronisasi gagal: ' . $e->getMessage()], 500);
        }
    }

    // Anda mungkin perlu method ini atau yang serupa jika dihitung saat sync
    // protected function updateRespondenCounts(Responden $responden, array $answers)
    // {
    //     // Logika untuk menghitung jumlah_blank, jumlah_error, dll. dari $answers
    //     // $responden->jumlah_blank = ...;
    //     // $responden->jumlah_error = ...;
    //     // ...
    // }

    public function jumlah(Request $request)
    {
        $user = auth()->user();
        $kegiatanId = $request->query('kegiatanId');

        if (!$kegiatanId) {
            // Menggunakan response()->json untuk konsistensi error handling
            return response()->json(['message' => "'kegiatanId' tidak boleh kosong"], 400);
        }

        // Asumsi sederhana: user adalah pencacah
        // Anda perlu menyesuaikan ini jika ada role lain seperti pengawas
        $assignmentsCount = Assignment::where('kegiatan_id', $kegiatanId)
            ->where('pencacah_id', $user?->id)
            ->count();

        return response()->json([
            'assignmentsCount' => $assignmentsCount
        ]);
    }
}
