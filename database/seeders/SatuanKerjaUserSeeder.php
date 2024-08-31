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
        $users = User::get();
        $satuanKerja = SatuanKerja::first();
        foreach ($users as $u) {
            SatuanKerjaUser::create(
                [
                    "satuan_kerja_id"=>$satuanKerja->id,
                    "user_id"=>$u->id,
                ]
            );
        }
    }
}
