<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\WilayahKerja;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WilayahKerjaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::where("email", "ihza2karunia@gmail.com")->first();
        $user2 = User::where("email", "najiaaahelmiah@gmail.com")->first();
        $user3 = User::where("email", "ihzathegodslayer@gmail.com")->first();
        $user4 = User::where("email", "petugaslapangan6104@gmail.com")->first();
        $data = [
            "satuanKerja" => "6104080003-pemerintah-desa-wajok-hilir",
            "kegiatan_id" => "REM-2024-1-PILOT-LAPANGAN",
            "prov_id" => "61",
            "kabkot_id" => "6104",
            "kec_id" => "6104080",
            "desa_kel_id" => "6104080003",
            "sls_id" => [
                0 => "6104080003000400",
                1 => "6104080003100700"
            ],
            "petugas_level_2" => $user->id,
            "petugas_level_1" => $user2->id
        ];
        WilayahKerja::alokasiPetugas($data);
        $data = [
            "satuanKerja" => "6104080003-pemerintah-desa-wajok-hilir",
            "kegiatan_id" => "REM-2024-1-PILOT-LAPANGAN",
            "prov_id" => "61",
            "kabkot_id" => "6104",
            "kec_id" => "6104080",
            "desa_kel_id" => "6104080003",
            "sls_id" => [
                0 => "6104080003000800",
                1 => "6104080003000900"
            ],
            "petugas_level_2" => $user->id,
            "petugas_level_1" => $user3->id
        ];
        WilayahKerja::alokasiPetugas($data);
        $data = [
            "satuanKerja" => "6104101005-pemerintah-kelurahan-pulau-pedalaman",
            "kegiatan_id" => "PLEM-2025-1-PILOT-LAPANGAN",
            "prov_id" => "61",
            "kabkot_id" => "6104",
            "kec_id" => "6104101",
            "desa_kel_id" => "6104101005",
            "sls_id" => [
                "6104101005000100",
                "6104101005000200",
                "6104101005000300",
                "6104101005000400",
            ],
            "petugas_level_2" => $user->id,
            "petugas_level_1" => $user4->id
        ];
        WilayahKerja::alokasiPetugas($data);

        // dump($data);
    }
}
