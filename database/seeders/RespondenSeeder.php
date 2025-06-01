<?php

namespace Database\Seeders;

use App\Models\Assignment;
use App\Models\Responden;
use App\Models\Template;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str; // Untuk UUID jika diperlukan

class RespondenSeeder extends Seeder
{
    public function run(): void
    {
        $userPencacah1 = User::where('email', 'najiaaahelmiah@gmail.com')->firstOrFail();
        $userPencacah2 = User::where("email", 'ihzathegodslayer@gmail.com')->firstOrFail();
        // $userPengawas = User::where('email', 'pengawas@example.com')->firstOrFail(); // Contoh jika ada pengawas

        $kegiatanId = "REM-2024-1-PILOT-LAPANGAN";

        // 1. Dapatkan template terbaru untuk kegiatan ini
        $templateInstance = Template::where('kegiatan_id', $kegiatanId)
            ->orderBy('versi', 'desc') // Asumsi 'versi' bisa diurutkan untuk dapat yang terbaru
            ->firstOrFail();

        // 2. Parse JSON template untuk mendapatkan ID pertanyaan
        //    Ini adalah bagian krusial untuk mendapatkan ID yang benar.
        $templateJson = json_decode($templateInstance->template, true);
        if (!$templateJson || !isset($templateJson['sections'])) {
            $this->command->error("Template JSON tidak valid atau tidak memiliki sections untuk template ID: " . $templateInstance->id);
            return;
        }

        // Cari ID pertanyaan untuk "Nama Kepala Rumah Tangga" atau field kunci lainnya.
        // Ini adalah contoh, Anda mungkin perlu cara yang lebih robust untuk menemukannya.
        $krtQuestionId = null;
        foreach ($templateJson['sections'] as $section) {
            foreach ($section['questions'] as $question) {
                // Asumsi label "Nama Kepala Rumah Tangga" adalah unik atau cukup spesifik.
                // Atau, jika Anda TAHU ID pastinya, gunakan itu langsung (misalnya, "q_krt_nama").
                if (isset($question['id']) && ($question['label'] === 'Nama Kepala Rumah Tangga' || $question['id'] === 'q_krt_nama')) {
                    $krtQuestionId = $question['id'];
                    break 2;
                }
            }
        }

        if (!$krtQuestionId) {
            $this->command->error("Tidak dapat menemukan ID pertanyaan untuk Kepala Rumah Tangga di template ID: " . $templateInstance->id);
            // Anda bisa fallback ke key generik jika tidak ditemukan, tapi idealnya harus ada.
            // $krtQuestionId = 'nama_kepala_rumah_tangga_fallback'; // Kurang ideal
            return; // Lebih baik stop jika konfigurasi kunci tidak ditemukan
        }
        $this->command->info("Menggunakan ID pertanyaan '{$krtQuestionId}' untuk Kepala Rumah Tangga.");


        // Data responden contoh
        $respondenDataList = [
            [
                "sls_id" => "6104080003100700",
                "answers" => [
                    $krtQuestionId => "Aller Abdul Karim", // Menggunakan ID pertanyaan sebagai key
                    // Tambahkan jawaban lain dengan ID pertanyaan yang sesuai
                    // Contoh: "q_krt_nik" => "1234567890123456",
                    //         "anggota_keluarga_list" => [
                    //             ["art_nama" => "Safira", "art_tgl_lahir" => "1990-01-01"],
                    //             ["art_nama" => "Listio", "art_tgl_lahir" => "1992-05-10"],
                    //         ]
                    // Untuk repeater, 'anggota_keluarga_list' adalah ID pertanyaan repeater.
                    // Di dalamnya, item-item akan memiliki sub-question ID seperti 'art_nama'.
                ],
                "pencacah_user_id" => $userPencacah1->id
            ],
            [
                "sls_id" => "6104080003000400",
                "answers" => [
                    $krtQuestionId => "Ihza Sang Pemikir",
                    // "q_alamat_lengkap" => "Jl. Merdeka No. 123",
                ],
                "pencacah_user_id" => $userPencacah1->id
            ],
            [
                "sls_id" => "6104080003100700", // SLS sama dengan yang pertama, untuk variasi
                "answers" => [
                    $krtQuestionId => "Adwin Cerdas",
                ],
                "pencacah_user_id" => $userPencacah1->id
            ],
            [
                "sls_id" => "6104080003000800",
                "answers" => [
                    $krtQuestionId => "Zaki Pelopor",
                ],
                "pencacah_user_id" => $userPencacah2->id
            ],
            [
                "sls_id" => "6104080003000900",
                "answers" => [
                    $krtQuestionId => "Karunia Berjaya",
                ],
                "pencacah_user_id" => $userPencacah2->id
            ],
        ];

        foreach ($respondenDataList as $data) {
            $responden = Responden::create([
                "id" => Str::uuid()->toString(), // Gunakan UUID untuk ID responden
                "kegiatan_id" => $kegiatanId,
                "template_id" => $templateInstance->id,
                "provinsi_id" => "61", // Asumsi tetap
                "kabkot_id" => "6104",   // Asumsi tetap
                "kecamatan_id" => "6104080", // Asumsi tetap
                "desa_id" => "6104080003", // Asumsi tetap
                "sls_id" => $data["sls_id"],
                "last_riwayat_status" => 'belum_dibuka', // Status awal
                "terakhir_diisi" => now(),
                "data" => json_encode($data["answers"]), // Simpan jawaban sebagai JSON
            ]);

            Assignment::create([
                "id" => Str::uuid()->toString(), // Gunakan UUID untuk ID assignment
                "pencacah_id" => $data["pencacah_user_id"],
                "responden_id" => $responden->id,
                "kegiatan_id" => $kegiatanId,
                // "status" => 'pending_download', // Status assignment (bukan status alur kerja responden)
                // 'synced' => false, // default
            ]);

            // Anda juga bisa membuat entri awal di riwayat_statuses di sini
            // \App\Models\RiwayatStatus::create([
            //     'kegiatan_id' => $kegiatanId,
            //     'responden_id' => $responden->id,
            //     'status' => 'belum_dibuka',
            //     'user_id' => $data["pencacah_user_id"], // atau system
            //     'keterangan' => 'Assignment dibuat',
            // ]);

            $this->command->info("Responden {$responden->id} ({$data['answers'][$krtQuestionId]}) di SLS {$data['sls_id']} dan Assignment dibuat.");
        }
    }
}
