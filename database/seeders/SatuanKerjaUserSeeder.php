<?php

namespace Database\Seeders;

use App\Models\SatuanKerja;
use App\Models\SatuanKerjaUser;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SatuanKerjaUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::where("email", "ihza2karunia@gmail.com")->first();
        $satuanKerja = SatuanKerja::where('id', '6104080003-pemerintah-desa-wajok-hilir')->first();
        SatuanKerja::assignUserKeSatuanKerja($user, $satuanKerja);
        $satuanKerja = SatuanKerja::where('id', '6104101005-pemerintah-kelurahan-pulau-pedalaman')->first();
        SatuanKerja::assignUserKeSatuanKerja($user, $satuanKerja);

        $user = User::where("email", "najiaaahelmiah@gmail.com")->first();
        $satuanKerja = SatuanKerja::where('id', '6104080003-pemerintah-desa-wajok-hilir')->first();
        SatuanKerja::assignUserKeSatuanKerja($user, $satuanKerja);
        $satuanKerja = SatuanKerja::where('id', '6104101005-pemerintah-kelurahan-pulau-pedalaman')->first();
        SatuanKerja::assignUserKeSatuanKerja($user, $satuanKerja);

        $user = User::where("email", "ihzathegodslayer@gmail.com")->first();
        $satuanKerja = SatuanKerja::where('id', '6104080003-pemerintah-desa-wajok-hilir')->first();
        SatuanKerja::assignUserKeSatuanKerja($user, $satuanKerja);
        $satuanKerja = SatuanKerja::where('id', '6104101005-pemerintah-kelurahan-pulau-pedalaman')->first();
        SatuanKerja::assignUserKeSatuanKerja($user, $satuanKerja);

        $user = User::where("email", "petugaslapangan6104@gmail.com")->first();
        $satuanKerja = SatuanKerja::where('id', '6104101005-pemerintah-kelurahan-pulau-pedalaman')->first();
        SatuanKerja::assignUserKeSatuanKerja($user, $satuanKerja);
    }
}
