<?php

namespace App\Http\Controllers;

use App\Models\Assignment;
use App\Models\Organisasi;
use Illuminate\Http\Request;
use App\Models\RiwayatStatus;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage; // Untuk menyimpan file

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
        //     ->where('pencacah_id', $user->id) // atau logika role lain
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

    public function sync(Request $request, Assignment $assignment)
    {
        $user = auth()->user();

        $kegiatanId = $assignment->kegiatan_id;
        // Validasi data JSON 'answers' dan field lain
        $validatedJsonData = $request->validate([
            'answers' => 'required|json', // Ini sekarang string JSON dari FormData
            'new_status' => [
                'required',
                'string',
                Rule::in([
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
        ]);

        $answersPlain = json_decode($validatedJsonData['answers'], true);
        if (json_last_error() !== JSON_ERROR_NONE) {
            return response()->json(['message' => 'Format JSON pada field answers tidak valid.'], 400);
        }

        $responden = $assignment->respondens;
        if (!$responden) {
            return response()->json(['message' => 'Responden tidak ditemukan.'], 404);
        }

        $currentStatus = $responden->last_riwayat_status;
        $newStatus = $validatedJsonData['new_status'];

        // TODO: Validasi transisi status berdasarkan role dan status saat ini (lebih detail)

        DB::beginTransaction();
        try {
            $finalAnswers = $answersPlain; // Mulai dengan jawaban non-file

            // Proses file yang diupload (jika ada)
            if ($request->hasFile('files')) {
                foreach ($request->file('files') as $questionId => $file) {
                    if ($file->isValid()) {
                        // Path: kegiatan_id/responden_id/question_id/namafile.ext
                        $directory = "kegiatan_uploads/{$kegiatanId}/{$responden->id}/{$questionId}";
                        // Nama file bisa diambil dari yang dikirim client atau generate baru
                        // $filename = $file->getClientOriginalName();
                        // $path = $file->storeAs($directory, $filename, 'public'); // Simpan ke disk 'public'

                        // Atau generate nama unik untuk menghindari konflik
                        $uniqueFilename = uniqid() . '.' . $file->getClientOriginalExtension();
                        $path = $file->storeAs($directory, $uniqueFilename, 'public');

                        // Simpan path relatif ke storage di dalam jawaban
                        // Hapus marker '__file' jika ada, dan simpan path-nya
                        $originalQuestionId = str_replace('__file', '', $questionId); // Jika client mengirim files[q_id__file]
                        // Atau jika client kirim files[q_id], maka $originalQuestionId = $questionId;

                        // Jika Anda mengirim `files[q_id]` dari frontend, maka:
                        $finalAnswers[$questionId] = Storage::url($path); // Simpan URL publik ke file

                        // Jika Anda mengirim `files[q_id]` dan `answers[q_id__file]`
                        // $finalAnswers[$originalQuestionId] = Storage::url($path);
                        // unset($finalAnswers[$questionId]); // Hapus marker q_id__file jika ada di $answersPlain

                        Log::info("File untuk {$questionId} disimpan di: {$path}");
                    } else {
                        Log::warning("File tidak valid untuk {$questionId} pada assignment {$assignment->id}");
                    }
                }
            }

            // 1. Update data jawaban (sekarang berisi path ke file)
            $responden->data = json_encode($finalAnswers);
            $responden->terakhir_diisi = now();

            // 2. Buat entri baru di riwayat_statuses
            $riwayat = RiwayatStatus::create([
                'kegiatan_id' => $kegiatanId,
                'responden_id' => $responden->id,
                'status' => $newStatus,
                'user_id' => $user->id,
                'keterangan' => $validatedJsonData['keterangan'] ?? null,
            ]);

            // 3. Update last_riwayat_status di tabel responden
            $responden->last_riwayat_status = $newStatus;
            $responden->save(); // Ini juga akan update updated_at

            DB::commit();

            $responden->refresh(); // Ambil data responden terbaru, termasuk updated_at

            return response()->json([
                'message' => 'Assignment berhasil disinkronkan.',
                'assignment_id' => $assignment->id,
                'new_status' => $newStatus,
                'responden' => $responden->load('riwayatStatuses'), // Kirim data responden terbaru
                'answers_processed_paths' => $finalAnswers, // Kirim jawaban dengan path gambar
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error("Sinkronisasi gagal untuk assignment {$assignment->id}: " . $e->getMessage(), [
                'trace' => $e->getTraceAsString()
            ]);
            return response()->json(['message' => 'Sinkronisasi gagal: ' . $e->getMessage()], 500);
        }
    }
    public function jumlah()
    {
        $user = auth()->user();
        if (!request('kegiatanId')) {
            return abort('400', "'kegiatanId' tidak boleh kosong");
        }
        $organisasi = Organisasi::where("pencacah_id", $user->id)
            ->orWhere("pengawas_id", $user->id)
            ->orWhere("koseka_id", $user->id)
            ->first();
        $role = Organisasi::getUserKegiatanRoleByOrganisasi($user->id, $organisasi);
        $assignmentsCount = Assignment::getAssignments(request('kegiatanId'), $user->id, $role)?->count();
        return response()->json([
            'assignmentsCount' => $assignmentsCount
        ]);
    }
}
