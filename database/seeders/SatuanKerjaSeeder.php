<?php

namespace Database\Seeders;

use App\Models\SatuanKerja;
use App\Supports\Constants;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SatuanKerjaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SatuanKerja::create([
            "wilayah_kerja_id"=>"6104080003",
            "level_wilayah_kerja"=>Constants::LEVEL_WILAYAH_DESA_KELURAHAN,
            "nama"=>"Pemerintah Desa Wajok Hilir"
        ]);
    }
}
