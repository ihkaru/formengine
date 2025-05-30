<?php

namespace Database\Seeders;

use App\Models\Kegiatan;
use App\Models\Template;
use App\Supports\Constants;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Template2Seeder extends Seeder
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
        $kolomWajib = '{
            "kolom_wajib": [
                {
                "name": "question_108",
                "label": "Kepala Keluarga",
                "field": "question_108",
                "align": "left"
                }
            ],
            "visible_columns": [
                "kepalaRumahTangga"
            ]
            }';
        $template = '{"id":"template-123","version":"1.2.0","subkegiatanId":"subkegiatan-456","title":"Kuesioner Sosial Ekonomi Nasional 2025","sections":[{"id":"section-1","title":"Identitas Keluarga","questions":[{"id":"q1","type":"text","label":"Nama Kepala Keluarga","required":true,"validation":{"rules":["required","maxLength:100"],"errorMessages":{"required":"Nama kepala keluarga wajib diisi","maxLength":"Nama tidak boleh lebih dari 100 karakter"}},"permissions":{"editable":["PPL","PML"]},"defaultValue":""},{"id":"q2","type":"select","label":"Jenis Kelamin","required":true,"masterId":"master-gender","validation":{"rules":["required"]},"permissions":{"editable":["PPL"]}},{"id":"q3","type":"text","label":"Jumlah Anak Laki-laki","required":false,"validation":{"rules":["minLength:1"]},"permissions":{"editable":["PPL","PML"]}},{"id":"q4","type":"text","label":"Jumlah Anak Perempuan","required":false,"validation":{"rules":["minLength:1"]},"permissions":{"editable":["PPL","PML"]}}]},{"id":"section-2","title":"Informasi Ekonomi","questions":[{"id":"q5","type":"select","label":"Pekerjaan Utama","required":true,"masterId":"master-pekerjaan","validation":{"rules":["required"]},"permissions":{"editable":["PPL"]}},{"id":"q6","type":"number","label":"Penghasilan per Bulan (Rp)","required":true,"validation":{"rules":["required",{"pattern":"^[0-9]+$","message":"Hanya angka yang diperbolehkan"}]},"permissions":{"editable":["PPL"]}}]}],"conditionalLogic":[{"if":{"questionId":"q2","value":"1"},"then":{"show":["q3"],"hide":["q4"]}},{"if":{"questionId":"q2","value":"2"},"then":{"show":["q4"],"hide":["q3"]}}]}';
        Template::create([
            "versi" => "0.0.2",
            "label_versi" => Constants::VERSI_TEMPLATE_LATEST,
            "kolom_wajib" => trim($kolomWajib),
            "kegiatan_id" => $kegiatan->id,
            "template" => trim($template)
        ]);
    }
}
