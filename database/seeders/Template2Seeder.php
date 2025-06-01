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
            "label_versi" => Constants::VERSI_TEMPLATE_OLD,
            "kolom_wajib" => trim($kolomWajib),
            "kegiatan_id" => $kegiatan->id,
            "template" => trim($template)
        ]);

        $templateJsonString = <<<JSON
{
    "id": "template-comprehensive-v1",
    "version": "1.0.0",
    "subkegiatanId": "subkegiatan-test-all-features",
    "title": "Kuesioner Uji Coba Fitur Lengkap",
    "sections": [
        {
            "id": "section-identitas",
            "title": "Identitas Responden & Rumah Tangga",
            "questions": [
                {
                    "id": "q_krt_nama",
                    "type": "text",
                    "label": "Nama Kepala Rumah Tangga",
                    "required": true,
                    "validation": {
                        "rules": ["required", "maxLength:100"],
                        "errorMessages": {"required": "Nama KRT wajib diisi.", "maxLength": "Nama KRT tidak boleh lebih dari 100 karakter."}
                    },
                    "permissions": {"editable": ["PPL", "PML"]},
                    "description": "Masukkan nama lengkap Kepala Rumah Tangga."
                },
                {
                    "id": "q_krt_nik",
                    "type": "number",
                    "label": "NIK Kepala Rumah Tangga (16 digit)",
                    "required": false,
                    "validation": {
                        "rules": [{"pattern": "^\\\\d{16}$", "message": "NIK harus 16 digit angka."}]
                    },
                    "permissions": {"editable": ["PPL"]},
                    "description": "Masukkan NIK KRT jika ada."
                },
                {
                    "id": "q_alamat_lengkap",
                    "type": "textarea",
                    "label": "Alamat Lengkap Rumah Tangga",
                    "required": true,
                    "validation": {"rules": ["required"]},
                    "permissions": {"editable": ["PPL", "PML"]},
                    "description": "Contoh: Jl. Merdeka No. 10, RT 01 RW 02, Dusun Mawar, Desa Mekar Jaya"
                },
                {
                    "id": "q_tanggal_pendataan",
                    "type": "date",
                    "label": "Tanggal Pendataan",
                    "required": true,
                    "validation": {"rules": ["required"]},
                    "permissions": {"editable": ["PPL"]},
                    "description": "Pilih tanggal pelaksanaan pendataan."
                }
            ]
        },
        {
            "id": "section-anggota-keluarga",
            "title": "Data Anggota Rumah Tangga (Repeater)",
            "questions": [
                {
                    "id": "anggota_keluarga_list",
                    "type": "repeater",
                    "label": "Daftar Anggota Rumah Tangga",
                    "addButtonLabel": "Tambah Anggota",
                    "itemTitlePrefix": "Anggota ke-",
                    "minItems": 1,
                    "maxItems": 10,
                    "required": true,
                    "validation": {
                        "rules": ["minItems:1"],
                        "errorMessages": {"minItems": "Minimal harus ada 1 anggota rumah tangga."}
                    },
                    "questions": [
                        {
                            "id": "art_nama",
                            "type": "text",
                            "label": "Nama Anggota Rumah Tangga",
                            "required": true,
                            "validation": {"rules": ["required", "maxLength:100"]},
                            "permissions": {"editable": ["PPL"]}
                        },
                        {
                            "id": "art_nik",
                            "type": "number",
                            "label": "NIK ART (16 digit, opsional)",
                            "required": false,
                            "validation": {
                                "rules": [{"pattern": "^([0-9]{16})?$", "message": "NIK ART harus 16 digit angka jika diisi."}]
                            },
                            "permissions": {"editable": ["PPL"]}
                        },
                        {
                            "id": "art_tgl_lahir",
                            "type": "date",
                            "label": "Tanggal Lahir ART",
                            "required": true,
                            "validation": {"rules": ["required"]},
                            "permissions": {"editable": ["PPL"]}
                        },
                        {
                            "id": "art_jenis_kelamin",
                            "type": "select",
                            "label": "Jenis Kelamin ART",
                            "required": true,
                            "masterId": "master-gender",
                            "validation": {"rules": ["required"]},
                            "permissions": {"editable": ["PPL"]}
                        },
                        {
                            "id": "art_pendidikan",
                            "type": "radio",
                            "label": "Pendidikan Terakhir ART",
                            "required": false,
                            "masterId": "master-pendidikan-art",
                            "permissions": {"editable": ["PPL"]}
                        },
                        {
                            "id": "art_hobi",
                            "type": "checkbox",
                            "label": "Hobi ART (Pilih Beberapa)",
                            "required": false,
                            "masterId": "master-hobbies-test",
                            "permissions": {"editable": ["PPL"]}
                        }
                    ],
                    "permissions": {"editable": ["PPL", "PML"]}
                }
            ]
        },
        {
            "id": "section-pilihan-lain",
            "title": "Input Pilihan Lainnya",
            "questions": [
                 {
                    "id": "q_status_perkawinan",
                    "type": "select",
                    "label": "Status Perkawinan KRT (dari Opsi)",
                    "required": true,
                    "options": [
                        {"label": "Belum Kawin", "value": "1"},
                        {"label": "Kawin", "value": "2"},
                        {"label": "Cerai Hidup", "value": "3"},
                        {"label": "Cerai Mati", "value": "4"}
                    ],
                    "validation": {"rules": ["required"]},
                    "permissions": {"editable": ["PPL"]},
                    "description": "Pilih status perkawinan Kepala Rumah Tangga."
                },
                {
                    "id": "q_radio_partisipasi_program",
                    "type": "radio",
                    "label": "Apakah pernah menerima bantuan program pemerintah?",
                    "required": true,
                    "options": [
                        {"label": "Ya, Pernah", "value": "yes"},
                        {"label": "Tidak Pernah", "value": "no"},
                        {"label": "Tidak Tahu", "value": "dont_know"}
                    ],
                    "validation": {"rules": ["required"]},
                    "permissions": {"editable": ["PPL"]},
                    "description": "Pilih salah satu."
                },
                {
                    "id": "q_checkbox_aset",
                    "type": "checkbox",
                    "label": "Aset yang Dimiliki (dari Opsi)",
                    "required": false,
                    "options": [
                        {"label": "Rumah", "value": "rumah"},
                        {"label": "Tanah", "value": "tanah"},
                        {"label": "Kendaraan Roda 2", "value": "motor"},
                        {"label": "Kendaraan Roda 4", "value": "mobil"},
                        {"label": "Perhiasan > 10gr", "value": "perhiasan"}
                    ],
                    "permissions": {"editable": ["PPL", "PML"]},
                    "description": "Pilih semua aset yang dimiliki."
                }
            ]
        },
        {
            "id": "section-fitur-pwa",
            "title": "Input Lanjutan (Fitur PWA & Kamera)",
            "questions": [
                {
                    "id": "q_geolocation_rumah",
                    "type": "geolocation",
                    "label": "Koordinat Lokasi Rumah (Geotagging)",
                    "required": true,
                    "validation": {"rules": ["required"]},
                    "permissions": {"editable": ["PPL"]},
                    "description": "Ambil koordinat GPS lokasi rumah saat ini. Pastikan GPS aktif."
                },
                {
                    "id": "q_camera_depan_rumah",
                    "type": "camera",
                    "label": "Foto Tampak Depan Rumah",
                    "required": true,
                    "cameraFacing": "environment",
                    "maxFileSizeMBBeforeConversion": 10,
                    "webpQuality": 0.75,
                    "imageMaxWidth": 1280,
                    "imageMaxHeight": 1280,
                    "validation": {"rules": ["required"]},
                    "permissions": {"editable": ["PPL"]},
                    "description": "Ambil foto tampak depan rumah. Bisa ambil langsung atau dari galeri."
                },
                {
                    "id": "q_camera_selfie_krt",
                    "type": "camera",
                    "label": "Foto Selfie KRT (Opsional)",
                    "required": false,
                    "cameraFacing": "user",
                    "maxFileSizeMBBeforeConversion": 5,
                    "webpQuality": 0.7,
                    "imageMaxWidth": 800,
                    "imageMaxHeight": 800,
                    "permissions": {"editable": ["PPL"]},
                    "description": "Ambil foto selfie KRT. Bisa ambil langsung atau dari galeri."
                },
                {
                    "id": "q_camera_dokumen_penting",
                    "type": "camera",
                    "label": "Foto Dokumen Penting (KK/KTP, opsional)",
                    "required": false,
                    "cameraFacing": "environment",
                    "maxFileSizeMBBeforeConversion": 8,
                    "webpQuality": 0.8,
                    "imageMaxWidth": 1024,
                    "imageMaxHeight": 1024,
                    "permissions": {"editable": ["PPL"]},
                    "description": "Ambil foto dokumen seperti Kartu Keluarga atau KTP. Pastikan jelas terbaca."
                }
            ]
        },
        {
            "id": "section-catatan",
            "title": "Catatan Tambahan",
            "questions": [
                {
                    "id": "q_catatan_petugas",
                    "type": "textarea",
                    "label": "Catatan Petugas Pendata",
                    "required": false,
                    "permissions": {"editable": ["PPL", "PML"]},
                    "description": "Catatan tambahan dari petugas terkait proses pendataan."
                }
            ]
        }
    ],
    "conditionalLogic": [
        {
            "if": {"questionId": "q_radio_partisipasi_program", "value": "yes"},
            "then": {"show": ["q_checkbox_aset"]},
            "else": {"hide": ["q_checkbox_aset"]}
        },
        {
            "if": {"questionId": "anggota_keluarga_list", "exists": true},
            "then": {"show": ["q_catatan_petugas"]},
            "else": {"hide": ["q_catatan_petugas"]}
        }
    ]
}
JSON;
        // Hapus karakter newline yang mungkin muncul karena heredoc untuk memastikan JSON valid
        $cleanedTemplateJsonString = trim(str_replace(["\r", "\n"], '', $templateJsonString));

        $kolomWajib = json_encode([
            "kolom_wajib" => [
                [
                    "name" => "q_krt_nama",
                    "label" => "Kepala Rumah Tangga",
                    "field" => "q_krt_nama",
                    "align" => "left"
                ]
            ],
            "visible_columns" => [
                "q_krt_nama"
            ]
        ]);

        // Ganti dengan ID kegiatan yang sesuai
        // Misalnya, jika Anda menggunakan model Kegiatan:
        // $kegiatan = \App\Models\Kegiatan::first(); // Atau cara lain untuk mendapatkan ID kegiatan

        if ($kegiatan) {
            \App\Models\Template::create([
                "versi" => "1.0.0-test", // Atau versi yang sesuai
                "label_versi" => 'VERSI_TEMPLATE_LATEST', // Gunakan konstanta jika ada
                "kolom_wajib" => $kolomWajib,
                "kegiatan_id" => $kegiatan->id,
                "template" => $cleanedTemplateJsonString
            ]);
            $this->command->info("Comprehensive test template seeded successfully.");
        } else {
            $this->command->error("Kegiatan not found. Cannot seed template.");
        }

        // // Seed Master Data jika belum ada (contoh)
        // $this->seedMasterData();
    }
}
