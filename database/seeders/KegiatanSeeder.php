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
        $tgl_mulai = Carbon::parse("2024-09-15");
        $tgl_selesai = Carbon::parse("2024-10-30");
        $tgl_tutup = Carbon::parse("2024-10-30");
        Kegiatan::create([
            "id" => "REM-2024-1-PILOT-LAPANGAN",
            "nama" => "Pilot Registrasi Ekonomi Masyarakat Desa Wajok Hilir",
            "level_pendataan" => Constants::LEVEL_PENDATAAN_SURVEI,
            "tgl_mulai" => $tgl_mulai,
            "tgl_selesai" => $tgl_selesai,
            "tgl_tutup" => $tgl_tutup,
            "level_rekap_1" => Constants::LEVEL_REKAP_SLS,
            "level_rekap_2" => Constants::LEVEL_REKAP_DESA,
            "level_assignment" => Constants::LEVEL_ASSIGNMENT_KEPALA_KELUARGA,
            "unit_sampel" => Constants::LEVEL_UNIT_SAMPEL_PENDUDUK,
            "unit_observasi" => Constants::LEVEL_UNIT_OBSERVASI_KEPALA_KELUARGA,
            "tahun" => 2024,
            "frekuensi" => Constants::JENIS_FREKEUNSI_TAHUN,
            "seri" => 1,
            "subkategori" => "Pilot Lapangan",
            "kode_subkategori" => "PILOT-LAPANGAN",
            "petugas_level_1" => Constants::JABATAN_LEVEL_1_PETUGAS_PENDATAAN_LAPANGAN,
            "petugas_level_2" => Constants::JABATAN_LEVEL_2_PETUGAS_PEMERIKSA_LAPANGAN,
            "max_petugas_di_level_1" => 14
        ]);
    }
}
