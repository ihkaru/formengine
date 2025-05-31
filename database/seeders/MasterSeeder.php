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
        Master::create([
            "id" => "master-gender",
            "version" => "1.0.0",
            "name" => "Jenis Kelamin",
            "data" => "[{\"id\":\"1\",\"label\":\"Laki-laki\",\"value\":\"1\"},{\"id\":\"2\",\"label\":\"Perempuan\",\"value\":\"2\"}]",
        ]);
        Master::create([
            "id" => "master-pekerjaan",
            "version" => "1.0.0",
            "name" => "Pekerjaan Utama",
            "data" => "[{\"id\":\"1\",\"label\":\"Petani\",\"value\":\"1\"},{\"id\":\"2\",\"label\":\"Nelayan\",\"value\":\"2\"},{\"id\":\"3\",\"label\":\"Pedagang\",\"value\":\"3\"},{\"id\":\"4\",\"label\":\"Pegawai Negeri Sipil\",\"value\":\"4\"},{\"id\":\"5\",\"label\":\"TNI/Polri\",\"value\":\"5\"},{\"id\":\"6\",\"label\":\"Pegawai Swasta\",\"value\":\"6\"},{\"id\":\"7\",\"label\":\"Wiraswasta\",\"value\":\"7\"},{\"id\":\"8\",\"label\":\"Pensiunan\",\"value\":\"8\"},{\"id\":\"9\",\"label\":\"Tidak Bekerja\",\"value\":\"9\"},{\"id\":\"10\",\"label\":\"Lainnya\",\"value\":\"10\"}]",
        ]);
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
            ]
        ]);
    }
}
