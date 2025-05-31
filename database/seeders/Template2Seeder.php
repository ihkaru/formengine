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
            "label_versi" => Constants::VERSI_TEMPLATE_OLD,
            "kolom_wajib" => trim($kolomWajib),
            "kegiatan_id" => $kegiatan->id,
            "template" => trim($template)
        ]);

        $template = "{\"id\":\"template-all-inputs-v1\",\"version\":\"1.0.0\",\"subkegiatanId\":\"subkegiatan-test-all-inputs\",\"title\":\"Kuesioner Uji Coba Semua Jenis Input\",\"sections\":[{\"id\":\"section-common\",\"title\":\"Input Umum\",\"questions\":[{\"id\":\"q_text_required\",\"type\":\"text\",\"label\":\"Nama Lengkap (Teks)\",\"required\":true,\"validation\":{\"rules\":[\"required\",\"maxLength:100\"],\"errorMessages\":{\"required\":\"Nama lengkap wajib diisi.\",\"maxLength\":\"Nama tidak boleh lebih dari 100 karakter.\"}},\"permissions\":{\"editable\":[\"PPL\",\"PML\"]},\"description\":\"Masukkan nama lengkap Anda.\"},{\"id\":\"q_number_optional\",\"type\":\"number\",\"label\":\"Usia (Angka)\",\"required\":false,\"validation\":{\"rules\":[{\"pattern\":\"^[1-9][0-9]?$|^100$\",\"message\":\"Usia harus antara 1-100.\"}]},\"permissions\":{\"editable\":[\"PPL\"]},\"description\":\"Masukkan usia dalam tahun.\"},{\"id\":\"q_textarea_feedback\",\"type\":\"textarea\",\"label\":\"Saran & Masukan (Textarea)\",\"required\":false,\"permissions\":{\"editable\":[\"PPL\",\"PML\"]},\"description\":\"Berikan saran atau masukan Anda (jika ada).\"},{\"id\":\"q_date_birth\",\"type\":\"date\",\"label\":\"Tanggal Lahir (Tanggal)\",\"required\":true,\"validation\":{\"rules\":[\"required\"]},\"permissions\":{\"editable\":[\"PPL\"]},\"description\":\"Pilih tanggal lahir Anda.\"}]},{\"id\":\"section-selection\",\"title\":\"Input Pilihan\",\"questions\":[{\"id\":\"q_select_gender\",\"type\":\"select\",\"label\":\"Jenis Kelamin (Select dari Master)\",\"required\":true,\"masterId\":\"master-gender\",\"validation\":{\"rules\":[\"required\"]},\"permissions\":{\"editable\":[\"PPL\"]},\"description\":\"Pilih jenis kelamin (menggunakan master-gender yang sudah ada).\"},{\"id\":\"q_radio_consent\",\"type\":\"radio\",\"label\":\"Persetujuan Partisipasi (Radio)\",\"required\":true,\"options\":[{\"label\":\"Ya, saya setuju\",\"value\":\"yes\"},{\"label\":\"Tidak, saya tidak setuju\",\"value\":\"no\"}],\"validation\":{\"rules\":[\"required\"]},\"permissions\":{\"editable\":[\"PPL\"]},\"description\":\"Apakah Anda setuju untuk berpartisipasi?\"},{\"id\":\"q_checkbox_hobbies\",\"type\":\"checkbox\",\"label\":\"Hobi (Checkbox dari Master Baru)\",\"required\":false,\"masterId\":\"master-hobbies-test\",\"permissions\":{\"editable\":[\"PPL\",\"PML\"]},\"description\":\"Pilih hobi Anda (bisa lebih dari satu).\"}]},{\"id\":\"section-advanced\",\"title\":\"Input Lanjutan (Fitur PWA)\",\"questions\":[{\"id\":\"q_geolocation_home\",\"type\":\"geolocation\",\"label\":\"Lokasi Rumah (Geotagging)\",\"required\":true,\"validation\":{\"rules\":[\"required\"]},\"permissions\":{\"editable\":[\"PPL\"]},\"description\":\"Ambil koordinat GPS lokasi rumah saat ini.\"},{\"id\":\"q_camera_house\",\"type\":\"camera\",\"label\":\"Foto Rumah (Kamera Belakang)\",\"required\":false,\"cameraFacing\":\"environment\",\"maxFileSizeMB\":5,\"permissions\":{\"editable\":[\"PPL\"]},\"description\":\"Ambil foto tampak depan rumah menggunakan kamera belakang.\"},{\"id\":\"q_camera_selfie_id\",\"type\":\"camera\",\"label\":\"Foto Diri dengan KTP (Kamera Depan)\",\"required\":true,\"cameraFacing\":\"user\",\"maxFileSizeMB\":3,\"validation\":{\"rules\":[\"required\"]},\"permissions\":{\"editable\":[\"PPL\"]},\"description\":\"Ambil foto selfie sambil memegang KTP (gunakan kamera depan).\"}]}],\"conditionalLogic\":[{\"if\":{\"questionId\":\"q_radio_consent\",\"value\":\"yes\"},\"then\":{\"show\":[\"q_textarea_feedback\"]},\"else\":{\"hide\":[\"q_textarea_feedback\"]}},{\"if\":{\"questionId\":\"q_number_optional\",\"exists\":true},\"then\":{\"show\":[\"q_date_birth\"]},\"else\":{\"hide\":[\"q_date_birth\"]}}]}";
        $kolomWajib = "{\n            \"kolom_wajib\": [\n                {\n                \"name\": \"q_text_required\",\n                \"label\": \"Nama Lengkap (Teks)\",\n                \"field\": \"q_text_required\",\n                \"align\": \"left\"\n                }\n            ],\n            \"visible_columns\": [\n                \"q_text_required\"\n            ]\n            }";
        Template::create([
            "versi" => "0.0.3",
            "label_versi" => Constants::VERSI_TEMPLATE_LATEST,
            "kolom_wajib" => trim($kolomWajib),
            "kegiatan_id" => $kegiatan->id,
            "template" => trim($template)
        ]);
    }
}
