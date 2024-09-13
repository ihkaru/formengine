<?php

namespace Database\Seeders;

use App\Models\Kegiatan;
use App\Models\Template;
use App\Supports\Constants;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TemplateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $kegiatan = Kegiatan::first();
        $kolomWajib = '{"kolom_wajib":[{"name":"kepalaRumahTangga","label":"Kepala Rumah Tangga","field":"kepalaRumahTangga","align":"left"},{"name":"id","label":"ID","field":"id","align":"left"}],"visible_columns":["kepalaRumahTangga"]}';
        Template::create([
            "versi" => "0.0.1",
            "label_versi" => Constants::VERSI_TEMPLATE_OLD,
            "kegiatan_id" => $kegiatan->id,
            "kolom_wajib" => $kolomWajib,
            "template" => 'old'
        ]);
        Template::create([
            "versi" => "0.0.2",
            "label_versi" => Constants::VERSI_TEMPLATE_LATEST,
            "kolom_wajib" => $kolomWajib,
            "kegiatan_id" => $kegiatan->id,
            "template" => '{"questions":[{"type":"text","name":"kepalaRumahTangga","title":"Nama Kepala Rumah Tangga","isRequired":true},{"type":"paneldynamic","name":"anggotaRumahTangga","title":"Anggota Rumah Tangga Lainnya","renderMode":"progressTop","panelCount":1,"panelAddText":"Tambahkan Anggota Rumah Tangga","panelRemoveText":"Hapus Anggota Rumah Tangga","templateTitle":"Anggota #{panelIndex}","templateElements":[{"type":"text","name":"namaAnggota","title":"Nama Anggota","isRequired":true}]}]}'
        ]);
    }
}
