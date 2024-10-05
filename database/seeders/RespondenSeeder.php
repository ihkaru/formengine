<?php

namespace Database\Seeders;

use App\Models\Assignment;
use App\Models\Responden;
use App\Models\Template;
use App\Models\User;
use Illuminate\Database\Seeder;

class RespondenSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::where('email', 'ihza2karunia@gmail.com')->first();
        $user2 = User::where("email", 'najiaaahelmiah@gmail.com')->first();
        $user3 = User::where("email", 'ihzathegodslayer@gmail.com')->first();
        $res = [];
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
        $template = Template::getLatestTemplate($data["kegiatan_id"]);
        $res[] = Responden::create([
            "kegiatan_id" => $data["kegiatan_id"],
            "template_id" => $template->id,
            "provinsi_id" => $data["prov_id"],
            "kabkot_id" => $data["kabkot_id"],
            "kecamatan_id" => $data["kec_id"],
            "desa_id" => $data["desa_kel_id"],
            "sls_id" => "6104080003100700",
            "terakhir_diisi" => now(),
            "data" => trim('{"anggotaRumahTangga":[{"namaAnggota":"Abdul Karim"},{"namaAnggota":"Safira"},{"namaAnggota":"Listio"}],"kepalaRumahTangga":"Aller"}'),
        ]);
        $res[] = Responden::create([
            "kegiatan_id" => $data["kegiatan_id"],
            "template_id" => $template->id,
            "provinsi_id" => $data["prov_id"],
            "kabkot_id" => $data["kabkot_id"],
            "kecamatan_id" => $data["kec_id"],
            "desa_id" => $data["desa_kel_id"],
            "sls_id" => "6104080003000400",
            "terakhir_diisi" => now(),
            "data" => trim('{"anggotaRumahTangga":[{"namaAnggota":"Najia"},{"namaAnggota":"Arsita"},{"namaAnggota":"Rifky"}],"kepalaRumahTangga":"Ihza"}'),
        ]);
        $res[] = Responden::create([
            "kegiatan_id" => $data["kegiatan_id"],
            "template_id" => $template->id,
            "provinsi_id" => $data["prov_id"],
            "kabkot_id" => $data["kabkot_id"],
            "kecamatan_id" => $data["kec_id"],
            "desa_id" => $data["desa_kel_id"],
            "sls_id" => "6104080003100700",
            "terakhir_diisi" => now(),
            "data" => trim('{"anggotaRumahTangga":[{"namaAnggota":"Arini"},{"namaAnggota":"Maria"},{"namaAnggota":"Sarah"}],"kepalaRumahTangga":"Adwin"}'),
        ]);
        $res2 = [];
        $res2[] = Responden::create([
            "kegiatan_id" => $data["kegiatan_id"],
            "template_id" => $template->id,
            "provinsi_id" => $data["prov_id"],
            "kabkot_id" => $data["kabkot_id"],
            "kecamatan_id" => $data["kec_id"],
            "desa_id" => $data["desa_kel_id"],
            "sls_id" => "6104080003000800",
            "terakhir_diisi" => now(),
            "data" => trim('{"anggotaRumahTangga":[{"namaAnggota":"Arini"},{"namaAnggota":"Maria"},{"namaAnggota":"Sarah"}],"kepalaRumahTangga":"Adwin"}'),
        ]);
        $res2[] = Responden::create([
            "kegiatan_id" => $data["kegiatan_id"],
            "template_id" => $template->id,
            "provinsi_id" => $data["prov_id"],
            "kabkot_id" => $data["kabkot_id"],
            "kecamatan_id" => $data["kec_id"],
            "desa_id" => $data["desa_kel_id"],
            "sls_id" => "6104080003000900",
            "terakhir_diisi" => now(),
            "data" => trim('{"anggotaRumahTangga":[{"namaAnggota":"Arini"},{"namaAnggota":"Maria"},{"namaAnggota":"Sarah"}],"kepalaRumahTangga":"Adwin"}'),
        ]);

        foreach ($res as $r) {
            Assignment::create([
                "pencacah_id" => $user2->id,
                "responden_id" => $r->id,
                "kegiatan_id" => $data["kegiatan_id"],
            ]);
        }
        foreach ($res2 as $r) {
            Assignment::create([
                "pencacah_id" => $user3->id,
                "responden_id" => $r->id,
                "kegiatan_id" => $data["kegiatan_id"],
            ]);
        }
    }
}
