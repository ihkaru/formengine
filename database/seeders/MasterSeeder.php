<?php

namespace Database\Seeders;

use App\Models\Master;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MasterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Master untuk Pekerjaan (seperti contoh Anda)
        Master::create([
            "id" => "master-pekerjaan",
            "version" => "1.0.0",
            "name" => "Pekerjaan Utama",
            "data" => "[{\"id\":\"1\",\"label\":\"Petani\",\"value\":\"1\"},{\"id\":\"2\",\"label\":\"Nelayan\",\"value\":\"2\"},{\"id\":\"3\",\"label\":\"Pedagang\",\"value\":\"3\"},{\"id\":\"4\",\"label\":\"Pegawai Negeri Sipil\",\"value\":\"4\"},{\"id\":\"5\",\"label\":\"TNI/Polri\",\"value\":\"5\"},{\"id\":\"6\",\"label\":\"Pegawai Swasta\",\"value\":\"6\"},{\"id\":\"7\",\"label\":\"Wiraswasta\",\"value\":\"7\"},{\"id\":\"8\",\"label\":\"Pensiunan\",\"value\":\"8\"},{\"id\":\"9\",\"label\":\"Tidak Bekerja\",\"value\":\"9\"},{\"id\":\"10\",\"label\":\"Lainnya\",\"value\":\"10\"}]",
        ]);

        // MASTER BARU untuk Pendidikan Terakhir Anak Putus Sekolah
        Master::create([
            "id" => "master-pendidikan-terakhir-putus-sekolah",
            "version" => "1.0.0",
            "name" => "Pendidikan Terakhir (Anak Putus Sekolah)",
            "data" => "[{\"label\":\"Tidak/Belum Pernah Sekolah\",\"value\":\"0\"},{\"label\":\"Tidak Tamat SD/Sederajat\",\"value\":\"1\"},{\"label\":\"Tamat SD/Sederajat\",\"value\":\"2\"},{\"label\":\"Tamat SMP/Sederajat\",\"value\":\"3\"},{\"label\":\"Tamat SMA/Sederajat\",\"value\":\"4\"}]",
        ]);
        Master::create([
            "id" => "master-gender",
            "version" => "1.0.0",
            "name" => "Jenis Kelamin",
            "data" => "[{\"id\":\"1\",\"label\":\"Laki-laki\",\"value\":\"1\"},{\"id\":\"2\",\"label\":\"Perempuan\",\"value\":\"2\"}]",
        ]);
        // Master::create([
        //     "id" => "master-pekerjaan",
        //     "version" => "1.0.0",
        //     "name" => "Pekerjaan Utama",
        //     "data" => "[{\"id\":\"1\",\"label\":\"Petani\",\"value\":\"1\"},{\"id\":\"2\",\"label\":\"Nelayan\",\"value\":\"2\"},{\"id\":\"3\",\"label\":\"Pedagang\",\"value\":\"3\"},{\"id\":\"4\",\"label\":\"Pegawai Negeri Sipil\",\"value\":\"4\"},{\"id\":\"5\",\"label\":\"TNI/Polri\",\"value\":\"5\"},{\"id\":\"6\",\"label\":\"Pegawai Swasta\",\"value\":\"6\"},{\"id\":\"7\",\"label\":\"Wiraswasta\",\"value\":\"7\"},{\"id\":\"8\",\"label\":\"Pensiunan\",\"value\":\"8\"},{\"id\":\"9\",\"label\":\"Tidak Bekerja\",\"value\":\"9\"},{\"id\":\"10\",\"label\":\"Lainnya\",\"value\":\"10\"}]",
        // ]);
        Master::create(
            [ // NEW MASTER DATA
                "id" => "master-hobbies-test",
                "version" => "1.0.0",
                "name" => "Daftar Hobi Uji Coba",
                "data" => "[{\"label\":\"Membaca Buku\",\"value\":\"reading\"},{\"label\":\"Olahraga\",\"value\":\"sports\"},{\"label\":\"Musik\",\"value\":\"music\"},{\"label\":\"Traveling\",\"value\":\"traveling\"},{\"label\":\"Memasak\",\"value\":\"cooking\"}]",
                "created_at" => "2025-06-01T10:00:00.000000Z",
                "updated_at" => "2025-06-01T10:00:00.000000Z"
            ]
        );

        $masters = [
            [
                'id' => 'master-gender',
                'version' => '1.0.0',
                'name' => 'Jenis Kelamin',
                'data' => json_encode([
                    ['id' => '1', 'label' => 'Laki-laki', 'value' => '1'],
                    ['id' => '2', 'label' => 'Perempuan', 'value' => '2'],
                ]),
            ],
            [
                'id' => 'master-hobbies-test',
                'version' => '1.0.0',
                'name' => 'Daftar Hobi Uji Coba',
                'data' => json_encode([
                    ['label' => 'Membaca Buku', 'value' => 'reading'],
                    ['label' => 'Olahraga', 'value' => 'sports'],
                    ['label' => 'Musik', 'value' => 'music'],
                    ['label' => 'Traveling', 'value' => 'traveling'],
                    ['label' => 'Memasak', 'value' => 'cooking'],
                ]),
            ],
            [
                'id' => 'master-pendidikan-art',
                'version' => '1.0.0',
                'name' => 'Pendidikan Terakhir ART',
                'data' => json_encode([
                    ['label' => 'Tidak/Belum Sekolah', 'value' => '0'],
                    ['label' => 'Tidak Tamat SD/Sederajat', 'value' => '1'],
                    ['label' => 'Tamat SD/Sederajat', 'value' => '2'],
                    ['label' => 'Tamat SMP/Sederajat', 'value' => '3'],
                    ['label' => 'Tamat SMA/Sederajat', 'value' => '4'],
                    ['label' => 'Diploma I/II/III', 'value' => '5'],
                    ['label' => 'Diploma IV/S1', 'value' => '6'],
                    ['label' => 'S2/S3', 'value' => '7'],
                ]),
            ],
            // Tambahkan master lain jika perlu
        ];
        Master::updateOrCreate(
            ['id' => 'master-jenis-disabilitas'],
            [
                "version" => "1.1.0",
                "name" => "Jenis Kesulitan/Disabilitas",
                // Menambahkan 'lainnya'
                "data" => "[{\"label\":\"Kesulitan Melihat\",\"value\":\"melihat\"},{\"label\":\"Kesulitan Mendengar\",\"value\":\"mendengar\"},{\"label\":\"Kesulitan Berjalan/Naik Tangga\",\"value\":\"berjalan\"},{\"label\":\"Kesulitan Mengingat/Konsentrasi\",\"value\":\"mengingat\"},{\"label\":\"Kesulitan Mengurus Diri Sendiri\",\"value\":\"mengurus_diri\"},{\"label\":\"Kesulitan Berkomunikasi\",\"value\":\"berkomunikasi\"},{\"label\":\"Lainnya\",\"value\":\"lainnya\"}]"
            ]
        );


        foreach ($masters as $masterData) {
            // Asumsi Anda memiliki model Master, sesuaikan pathnya
            Master::updateOrCreate(['id' => $masterData['id']], $masterData);
        }
        // $this->command->info("Master data for template seeded/updated.");

        DB::table("master_kegiatan")->insert([
            [
                'master_id' => 'master-pekerjaan',
                'kegiatan_id' => 'REM-2024-1-PILOT-LAPANGAN'
            ],
            [
                'master_id' => 'master-gender',
                'kegiatan_id' => 'REM-2024-1-PILOT-LAPANGAN'
            ],
            [
                'master_id' => 'master-hobbies-test',
                'kegiatan_id' => 'REM-2024-1-PILOT-LAPANGAN'
            ],
            [
                'master_id' => 'master-pendidikan-art',
                'kegiatan_id' => 'REM-2024-1-PILOT-LAPANGAN'
            ]
        ]);
        DB::table("master_kegiatan")->insert([
            [
                'master_id' => 'master-pekerjaan',
                'kegiatan_id' => 'PLEM-2025-1-PILOT-LAPANGAN'
            ],
            [
                'master_id' => 'master-gender',
                'kegiatan_id' => 'PLEM-2025-1-PILOT-LAPANGAN'
            ],
            [
                'master_id' => 'master-pendidikan-terakhir-putus-sekolah',
                'kegiatan_id' => 'PLEM-2025-1-PILOT-LAPANGAN'
            ],
            [
                'master_id' => 'master-pendidikan-art',
                'kegiatan_id' => 'PLEM-2025-1-PILOT-LAPANGAN'
            ],
            [
                'master_id' => 'master-jenis-disabilitas',
                'kegiatan_id' => 'PLEM-2025-1-PILOT-LAPANGAN'
            ]
        ]);
    }
}
