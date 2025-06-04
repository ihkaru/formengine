<?php

namespace App\Http\Controllers;

use App\Models\Assignment;
use App\Models\Kegiatan;
use App\Models\Organisasi;
use App\Models\Responden;
use Illuminate\Http\Request;
use App\Models\RiwayatStatus;
use App\Models\Template;
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
        // Cek apakah ini operasi pembuatan baru atau update
        // Kita anggap jika $assignmentId bukan numerik yang valid atau bernilai 'new'/0, itu adalah pembuatan baru.
        // Atau jika ID numerik tapi tidak ditemukan.
        $existingAssignment = is_numeric($assignmentId) && $assignmentId > 0 ? Assignment::find($assignmentId) : null;
        $isCreating = ($assignmentId === 'new' || $assignmentId == 0 || !$existingAssignment);

        // Validasi dasar
        $validationRules = [
            'answers' => 'required|json',
            'new_status' => [
                'required',
                'string',
                Rule::in([
                    'belum_dibuka', // Status awal mungkin 'belum_dibuka' atau 'draft'
                    'sudah_dibuka',
                    'submitted_by_pencacah',
                    'approved_by_pengawas',
                    'rejected_by_pengawas',
                    'approved_by_admin_level_1',
                    'rejected_by_admin_level_1',
                    // ... (status lainnya)
                ]),
            ],
            'keterangan' => 'nullable|string|max:255',
        ];

        if ($isCreating) {
            $validationRules['kegiatan_id'] = 'required|exists:kegiatans,id';
            // Jika template_id tidak bisa didapat dari Kegiatan, maka harus dikirim:
            // $validationRules['template_id'] = 'required|exists:templates,id';
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
            $kegiatan = null; // Objek Kegiatan
            $kegiatanId = null; // ID Kegiatan

            if ($isCreating) {
                Log::info("Memulai pembuatan assignment baru.");
                $kegiatanId = $validatedBaseData['kegiatan_id'];
                $kegiatan = Kegiatan::findOrFail($kegiatanId); // Load kegiatan beserta template-nya
                $template = Template::where('kegiatan_id', $kegiatan->id)->where('label_versi', Constants::VERSI_TEMPLATE_LATEST)->first();
                // Prioritaskan template_id dari relasi, lalu dari field langsung di kegiatan
                $templateId = $template?->id;


                // Ekstrak data dari answersPlain untuk field Responden
                // Sesuaikan 'q_...' dengan key yang sebenarnya di JSON 'answers' Anda
                $provinsiId = $answersPlain['q_provinsi_id'] ?? null;
                $kabkotId = $answersPlain['q_kabkot_id'] ?? null;
                $kecamatanId = $answersPlain['q_kecamatan_id'] ?? null;
                $desaId = $answersPlain['q_desa_id'] ?? null;
                $slsId = $answersPlain['q_sls_id'] ?? null;
                $bsId = $answersPlain['q_bs_id'] ?? null;

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
                    'id' => (string) Str::uuid(), // Generate UUID untuk ID string
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
                    'data' => json_encode([]), // Data jawaban akan diisi setelah proses file
                    'latitude' => $latitude,
                    'longitude' => $longitude,
                    'jumlah_blank' => null, // Atau 0
                    'jumlah_error' => null, // Atau 0
                    'jumlah_warning' => null, // Atau 0
                    'jumlah_terisi' => null, // Atau 0
                ];
                $responden = Responden::create($respondenData);
                Log::info("Responden baru dibuat: ID {$responden?->id} untuk kegiatan ID {$kegiatanId} dengan template ID {$templateId}");

                // 2. Buat Assignment baru
                // Pastikan model Assignment memiliki fillable untuk responden_id, kegiatan_id, pencacah_id
                $assignment = Assignment::create([
                    'kegiatan_id' => $kegiatanId,
                    'pencacah_id' => $user?->id, // Asumsi user yang login adalah pencacah
                    'responden_id' => $responden?->id,
                    // Tambahkan field lain untuk Assignment jika ada (misal: status_penugasan)
                ]);
                Log::info("Assignment baru dibuat: ID {$assignment?->id} untuk responden ID {$responden?->id}");
            } else { // Mengupdate assignment yang sudah ada
                Log::info("Memulai update assignment ID: {$assignmentId}");
                $assignment = $existingAssignment; // Gunakan assignment yang sudah diambil
                // Load relasi responden dan kegiatan responden untuk mendapatkan kegiatanId
                $assignment->load('respondens.kegiatan');
                $responden = $assignment->respondens;

                if (!$responden) {
                    Log::error("Responden tidak ditemukan untuk assignment ID: {$assignment?->id}");
                    DB::rollBack();
                    return response()->json(['message' => 'Data responden terkait assignment tidak ditemukan.'], 404);
                }
                $kegiatan = $responden->kegiatan; // Objek Kegiatan dari relasi
                if (!$kegiatan) {
                    Log::error("Kegiatan tidak ditemukan untuk responden ID: {$responden?->id} (assignment ID: {$assignment?->id})");
                    DB::rollBack();
                    return response()->json(['message' => 'Data kegiatan terkait responden tidak ditemukan.'], 404);
                }
                $kegiatanId = $kegiatan?->id; // ID Kegiatan
                Log::info("Assignment ID {$assignment?->id} ditemukan, responden ID {$responden?->id}, kegiatan ID {$kegiatanId}");

                // Jika ada data geolocation di 'answers', update di responden
                if (isset($answersPlain['q_geolocation_rumah'])) {
                    $geoData = is_string($answersPlain['q_geolocation_rumah'])
                        ? json_decode($answersPlain['q_geolocation_rumah'], true)
                        : $answersPlain['q_geolocation_rumah'];

                    if (is_array($geoData) && json_last_error() === JSON_ERROR_NONE) {
                        $responden->latitude = $geoData['latitude'] ?? $responden->latitude;
                        $responden->longitude = $geoData['longitude'] ?? $responden->longitude;
                    }
                }
                // Anda bisa juga mengupdate field wilayah jika diperlukan saat edit
                // $responden->provinsi_id = $answersPlain['q_provinsi_id'] ?? $responden->provinsi_id;
                // ... dst
            }

            $finalAnswers = $answersPlain;

            // Proses file yang diupload (jika ada)
            if ($request->hasFile('files')) {
                Log::info("Memproses file untuk responden ID: {$responden?->id}, kegiatan ID: {$kegiatanId}");
                foreach ($request->file('files') as $questionIdWithMarker => $file) {
                    // Bersihkan marker jika ada (misal __file dari q_camera_depan_rumah__file)
                    $questionId = str_replace('__file', '', $questionIdWithMarker);

                    if ($file->isValid()) {
                        $directory = "kegiatan_uploads/{$kegiatanId}/{$responden?->id}/{$questionId}";
                        // Menggunakan nama file asli dengan prefix unik untuk menghindari konflik dan menjaga ekstensi
                        $clientOriginalName = preg_replace('/[^A-Za-z0-9\.\-\_]/', '_', $file->getClientOriginalName());
                        $uniqueFilename = uniqid() . '_' . $clientOriginalName;
                        $path = $file->storeAs($directory, $uniqueFilename, 'public');

                        // Simpan URL publik ke file
                        $finalAnswers[$questionId] = Storage::url($path);

                        // Hapus placeholder dari answersPlain jika ada
                        // Misal: q_camera_depan_rumah__file_placeholder
                        $placeholderKey = $questionId . '__file_placeholder';
                        if (array_key_exists($placeholderKey, $finalAnswers)) {
                            unset($finalAnswers[$placeholderKey]);
                        }
                        Log::info("File untuk {$questionId} disimpan di: {$path} (URL: " . Storage::url($path) . ")");
                    } else {
                        Log::warning("File tidak valid untuk {$questionIdWithMarker} pada responden {$responden?->id}");
                    }
                }
            }

            // Update data jawaban (sekarang berisi path ke file) di responden
            $responden->data = json_encode($finalAnswers);
            $responden->terakhir_diisi = now();
            $responden->last_riwayat_status = $validatedBaseData['new_status']; // Update status di responden
            // Jika ada logic untuk mengupdate jumlah_blank, error, warning, terisi, panggil di sini
            // $this->updateRespondenCounts($responden, $finalAnswers);
            $responden->save();
            Log::info("Data responden ID {$responden?->id} telah diupdate.");

            // Buat entri baru di riwayat_statuses
            RiwayatStatus::create([
                'kegiatan_id' => $kegiatanId,
                'responden_id' => $responden?->id,
                'status' => $validatedBaseData['new_status'],
                'user_id' => $user?->id,
                'keterangan' => $validatedBaseData['keterangan'] ?? null,
            ]);
            Log::info("RiwayatStatus baru dibuat untuk responden ID {$responden?->id} dengan status {$validatedBaseData['new_status']}");

            DB::commit();
            Log::info("Sinkronisasi berhasil untuk assignment ID {$assignment?->id}, responden ID {$responden?->id}");

            // Refresh untuk mendapatkan data terbaru, termasuk updated_at dan relasi
            $assignment->refresh();
            // Load relasi yang dibutuhkan untuk response
            $assignment->load(['respondens' => function ($query) {
                $query->with(['riwayatStatuses', 'kegiatan', 'template']);
            }]);

            return response()->json([
                'message' => $isCreating ? 'Assignment berhasil dibuat.' : 'Assignment berhasil disinkronkan.',
                'assignment_id' => $assignment?->id,
                'responden_id' => $responden?->id,
                'new_status' => $validatedBaseData['new_status'],
                'assignment' => $assignment, // Kirim data assignment terbaru beserta responden dan relasinya
                'answers_processed_paths' => $finalAnswers, // Untuk debugging atau konfirmasi frontend
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            DB::rollBack();
            Log::error("Validasi gagal saat sinkronisasi: " . $e->getMessage(), ['errors' => $e->errors()]);
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
