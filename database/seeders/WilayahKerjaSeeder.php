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
        // dump($data);
        WilayahKerja::alokasiPetugas($data);
    }
}
