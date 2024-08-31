<?php

namespace Database\Seeders;

use App\Models\Kegiatan;
use App\Models\SatuanKerja;
use App\Models\SatuanKerjaKegiatan;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SatuanKerjaKegiatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $satuanKerja = SatuanKerja::where('nama',"Pemerintah Desa Wajok Hilir")->first();
        $kegiatan = Kegiatan::where('id',"REM-2024-1-PILOT-LAPANGAN")->first();
        SatuanKerjaKegiatan::create([
            'satuan_kerja_id'=>$satuanKerja->id,
            "kegiatan_id"=>$kegiatan->id
        ]);
    }
}
