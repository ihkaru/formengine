<?php

namespace Database\Seeders;

use App\Models\Kegiatan;
use App\Supports\Constants;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class KegiatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tgl_mulai = Carbon::parse("2025-09-15");
        $tgl_selesai = Carbon::parse("2025-09-30");
        $tgl_tutup = Carbon::parse("2025-09-30");
        Kegiatan::create([
            "nama"=>"A",
            "tgl_mulai"=>$tgl_mulai,
            "tgl_selesai"=>$tgl_selesai,
            "tgl_tutup"=>$tgl_tutup,
            "level_rekap_1"=>Constants::LEVEL_REKAP_SLS,
            "level_rekap_2"=>Constants::LEVEL_REKAP_DESA,
            "level_assignment"=>Constants::LEVEL_ASSIGNMENT_KEPALA_KELUARGA,
            "unit_observasi"=>"A",
            "tahun"=>"A",
            "frekuensi"=>"A",
            "seri"=>"A",
            "subkategori"=>"A",
            "kode_subkategori"=>"A",
        ]);
    }
}
