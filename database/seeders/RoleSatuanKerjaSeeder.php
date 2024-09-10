<?php

namespace Database\Seeders;

use App\Models\Kegiatan;
use App\Models\RoleSatuanKerja;
use App\Models\User;
use App\Supports\Constants;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSatuanKerjaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::where("email", "ihza2karunia@gmail.com")->first();
        $kegiatans = Kegiatan::whereHas("satuanKerjas.users", function ($q) use ($user) {
            $q->where("users.id", $user->id);
        })->get();
        $satuanKerjas = $user->satuanKerjas;
        foreach ($kegiatans as $k) {
            # code...
            foreach ($satuanKerjas as $s) {
                # code...
                RoleSatuanKerja::assign([
                    "user_id" => $user->id,
                    "kegiatan_id" => $k->id,
                    "role_name" => Constants::ROLE_ADMIN_SATUAN_KERJA[$s->level_wilayah_kerja],
                    "satuan_kerja_id" => $s->id
                ]);
            }
        }
    }
}
