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
        $template = '{
    "pages": [
        {
            "name": "page_0_",
            "elements": [
                {
                    "type": "paneldynamic",
                    "name": "subpanel_0_",
                    "title": "WAKTU MULAI",
                    "templateElements": [
                        {
                            "type": "text",
                            "name": "question_001",
                            "title": "001. Waktu mulai pendataan"
                        }
                    ],
                    "panelCount": 1,
                    "allowAddPanel": false,
                    "allowRemovePanel": false
                }
            ]
        },
        {
            "name": "page_1_",
            "elements": [
                {
                    "type": "paneldynamic",
                    "name": "subpanel_1_",
                    "title": "I. KETERANGAN TEMPAT",
                    "templateElements": [
                        {
                            "type": "text",
                            "name": "question_101",
                            "title": "101. Provinsi"
                        },
                        {
                            "type": "text",
                            "name": "question_102",
                            "title": "102. Kabupaten/Kota"
                        },
                        {
                            "type": "text",
                            "name": "question_103",
                            "title": "103. Kecamatan"
                        },
                        {
                            "type": "text",
                            "name": "question_104",
                            "title": "104. Desa/Kelurahan"
                        },
                        {
                            "type": "text",
                            "name": "question_105",
                            "title": "105. Kode SLS/Non SLS"
                        },
                        {
                            "type": "text",
                            "name": "question_106",
                            "title": "106. Nama SLS/Non SLS"
                        },
                        {
                            "type": "text",
                            "name": "question_107",
                            "title": "107. Alamat (Jalan/Gang, Nomor Rumah)"
                        },
                        {
                            "type": "text",
                            "name": "question_108",
                            "title": "108. Nama Kepala Keluarga (KK)/ Nama Anggota Keluarga Lainnya"
                        },
                        {
                            "type": "text",
                            "name": "question_109",
                            "title": "109. Nomor Urut Bangunan Tempat Tinggal"
                        },
                        {
                            "type": "text",
                            "name": "question_110",
                            "title": "110. Nomor Urut Keluarga Hasil Verifikasi"
                        },
                        {
                            "type": "text",
                            "name": "question_111",
                            "title": "111. Status Keluarga"
                        },
                        {
                            "type": "text",
                            "name": "question_112",
                            "title": "112. Jumlah Anggota Keluarga"
                        },
                        {
                            "type": "text",
                            "name": "question_113",
                            "title": "113. ID Landmark Wilkerstat"
                        },
                        {
                            "type": "text",
                            "name": "question_114",
                            "title": "114. Geotagging"
                        },
                        {
                            "type": "text",
                            "name": "question_115",
                            "title": "115. Gambar Bangunan"
                        }
                    ],
                    "panelCount": 1,
                    "allowAddPanel": false,
                    "allowRemovePanel": false
                }
            ]
        },
        {
            "name": "page_2_",
            "elements": [
                {
                    "type": "paneldynamic",
                    "name": "subpanel_2_",
                    "title": "II. KETERANGAN PETUGAS",
                    "templateElements": [
                        {
                            "type": "text",
                            "name": "question_201_1",
                            "title": "201_1. Tanggal"
                        },
                        {
                            "type": "text",
                            "name": "question_201_2",
                            "title": "201_2. Bulan"
                        },
                        {
                            "type": "text",
                            "name": "question_201_3",
                            "title": "201_3. Tahun"
                        },
                        {
                            "type": "text",
                            "name": "question_202",
                            "title": "202. Kode"
                        },
                        {
                            "type": "text",
                            "name": "question_203_1",
                            "title": "203_1. Tanggal"
                        },
                        {
                            "type": "text",
                            "name": "question_203_2",
                            "title": "203_2. Bulan"
                        },
                        {
                            "type": "text",
                            "name": "question_203_3",
                            "title": "203_3. Tahun"
                        },
                        {
                            "type": "dropdown",
                            "name": "question_205",
                            "title": "205. hasil pendataan keluarga",
                            "choices": [
                                {
                                    "value": 1,
                                    "text": "Terisi Lengkap"
                                },
                                {
                                    "value": 2,
                                    "text": "Terisi Tidak Lengkap"
                                },
                                {
                                    "value": 3,
                                    "text": "Tidak ada responden yang dapat memberi jawaban sampai akhir masa pendataan"
                                },
                                {
                                    "value": 4,
                                    "text": "Responden menolak"
                                },
                                {
                                    "value": 5,
                                    "text": "Keluarga pindah/bangunan sensus sudah tidak ada"
                                }
                            ]
                        }
                    ],
                    "panelCount": 1,
                    "allowAddPanel": false,
                    "allowRemovePanel": false
                }
            ]
        },
        {
            "name": "page_3_",
            "elements": [
                {
                    "type": "paneldynamic",
                    "name": "subpanel_3_",
                    "title": "III. KETERANGAN PERUMAHAN",
                    "templateElements": [
                        {
                            "type": "dropdown",
                            "name": "question_301_a",
                            "title": "301_a. Status kepemilikan bangunan tempat tinggal yang ditempati",
                            "choices": [
                                {
                                    "value": 1,
                                    "text": "Milik sendiri"
                                },
                                {
                                    "value": 2,
                                    "text": "Kontrak/sewa"
                                },
                                {
                                    "value": 3,
                                    "text": "Bebas sewa"
                                },
                                {
                                    "value": 4,
                                    "text": "Dinas"
                                },
                                {
                                    "value": 5,
                                    "text": "Lainnya"
                                }
                            ]
                        },
                        {
                            "type": "dropdown",
                            "name": "question_301_b",
                            "title": "301_b. jika 301a berkode 1, apa jenis bukti kepemilikan tanah bangunan tempat tinggal ini?",
                            "choices": [
                                {
                                    "value": 1,
                                    "text": "SHM atas Nama Anggota Keluarga"
                                },
                                {
                                    "value": 2,
                                    "text": "SHM bukan a.n Anggota Keluarga dengan perjanjian pemanfaatan tertulis "
                                },
                                {
                                    "value": 3,
                                    "text": "SHM bukan a.n Anggota Keluarga tanpa perjanjian pemanfaatan tertulis"
                                },
                                {
                                    "value": 4,
                                    "text": "Sertifikat selain SHM (SHGB, SHSRS)"
                                },
                                {
                                    "value": 5,
                                    "text": "Surat bukti lainnya (Girik, Letter C, dll)"
                                },
                                {
                                    "value": 6,
                                    "text": "Tidak Punya"
                                }
                            ]
                        },
                        {
                            "type": "text",
                            "name": "question_302",
                            "title": "302. Luas lantai bangunan tempat tinggal"
                        },
                        {
                            "type": "dropdown",
                            "name": "question_303",
                            "title": "303. Jenis lantai terluas",
                            "choices": [
                                {
                                    "value": 1,
                                    "text": "Marmer/granit"
                                },
                                {
                                    "value": 2,
                                    "text": "Keramik"
                                },
                                {
                                    "value": 3,
                                    "text": "Parket/vinil/karpet"
                                },
                                {
                                    "value": 4,
                                    "text": "Ubin/tegel/teraso"
                                },
                                {
                                    "value": 5,
                                    "text": "Kayu/papan"
                                },
                                {
                                    "value": 6,
                                    "text": "Semen/bata merah"
                                },
                                {
                                    "value": 7,
                                    "text": "Bambu"
                                },
                                {
                                    "value": 8,
                                    "text": "Tanah"
                                },
                                {
                                    "value": 9,
                                    "text": "Lainnya"
                                }
                            ]
                        },
                        {
                            "type": "dropdown",
                            "name": "question_304",
                            "title": "304. Jenis dinding terluas",
                            "choices": [
                                {
                                    "value": 1,
                                    "text": "Tembok"
                                },
                                {
                                    "value": 2,
                                    "text": "Plesteran anyamanbambu/kawat"
                                },
                                {
                                    "value": 3,
                                    "text": "Kayu/Papan/Gypsum/GRC/Calciboard"
                                },
                                {
                                    "value": 4,
                                    "text": "Anyaman bambu"
                                },
                                {
                                    "value": 5,
                                    "text": "Batang kayu"
                                },
                                {
                                    "value": 6,
                                    "text": "Bambu"
                                },
                                {
                                    "value": 7,
                                    "text": "Lainnya"
                                }
                            ]
                        },
                        {
                            "type": "dropdown",
                            "name": "question_305",
                            "title": "305. Jenis atap terluas",
                            "choices": [
                                {
                                    "value": 1,
                                    "text": "Beton"
                                },
                                {
                                    "value": 2,
                                    "text": "Genteng"
                                },
                                {
                                    "value": 3,
                                    "text": "Seng"
                                },
                                {
                                    "value": 4,
                                    "text": "Asbes"
                                },
                                {
                                    "value": 5,
                                    "text": "Bambu"
                                },
                                {
                                    "value": 6,
                                    "text": "Kayu/sirap"
                                },
                                {
                                    "value": 7,
                                    "text": "Jerami/ijuk/daun-daunan/rumbia"
                                },
                                {
                                    "value": 8,
                                    "text": "Lainnya"
                                }
                            ]
                        },
                        {
                            "type": "dropdown",
                            "name": "question_306_a",
                            "title": "306_a. Sumber air minum utama",
                            "choices": [
                                {
                                    "value": 1,
                                    "text": "Air kemasan bermerk"
                                },
                                {
                                    "value": 2,
                                    "text": "Air isi ulang"
                                },
                                {
                                    "value": 3,
                                    "text": "Leding"
                                },
                                {
                                    "value": 4,
                                    "text": "Sumur bor/pompa"
                                },
                                {
                                    "value": 5,
                                    "text": "sumur terlindung"
                                },
                                {
                                    "value": 6,
                                    "text": "sumur tak terlindung"
                                },
                                {
                                    "value": 7,
                                    "text": "Mata air terlindung"
                                },
                                {
                                    "value": 8,
                                    "text": "Mata air tak terlindung"
                                },
                                {
                                    "value": 9,
                                    "text": "Air permukaan (sungai/danau/ waduk/kolam/irigasi)"
                                },
                                {
                                    "value": 10,
                                    "text": "Air hujan"
                                },
                                {
                                    "value": 11,
                                    "text": "Lainnya"
                                }
                            ]
                        },
                        {
                            "type": "dropdown",
                            "name": "question_306_b",
                            "title": "306_b. Jika 306a berkode 4, 5, 6, 7, atau 8, Seberapa jauh jarak sumber air minum utama ke tempat penampungan limbah/kotoran/tinja terdekat?",
                            "choices": [
                                {
                                    "value": 1,
                                    "text": "< 10 meter"
                                },
                                {
                                    "value": 2,
                                    "text": "\u2265 10 meter"
                                },
                                {
                                    "value": 8,
                                    "text": "Tidak tahu"
                                }
                            ]
                        },
                        {
                            "type": "dropdown",
                            "name": "question_307_a",
                            "title": "307_a. Sumber penerangan utama",
                            "choices": [
                                {
                                    "value": 1,
                                    "text": "Listrik PLN dengan meteran"
                                },
                                {
                                    "value": 2,
                                    "text": "Listrik PLN tanpa meteran"
                                },
                                {
                                    "value": 3,
                                    "text": "Listrik Non-PLN"
                                },
                                {
                                    "value": 4,
                                    "text": "Bukan listrik"
                                }
                            ]
                        },
                        {
                            "type": "dropdown",
                            "name": "question_307_b1",
                            "title": "307_b1. Daya yang terpasang di rumah ini",
                            "choices": [
                                {
                                    "value": 1,
                                    "text": "450 watt"
                                },
                                {
                                    "value": 2,
                                    "text": "900 watt"
                                },
                                {
                                    "value": 3,
                                    "text": "1.300 watt"
                                },
                                {
                                    "value": 4,
                                    "text": "2.200 watt"
                                },
                                {
                                    "value": 5,
                                    "text": "> 2.200 watt"
                                }
                            ]
                        },
                        {
                            "type": "dropdown",
                            "name": "question_307_b2",
                            "title": "307_b2. Daya yang terpasang di rumah ini",
                            "choices": [
                                {
                                    "value": 1,
                                    "text": "450 watt"
                                },
                                {
                                    "value": 2,
                                    "text": "900 watt"
                                },
                                {
                                    "value": 3,
                                    "text": "1.300 watt"
                                },
                                {
                                    "value": 4,
                                    "text": "2.200 watt"
                                },
                                {
                                    "value": 5,
                                    "text": "> 2.200 watt"
                                }
                            ]
                        },
                        {
                            "type": "dropdown",
                            "name": "question_307_b3",
                            "title": "307_b3. Daya yang terpasang di rumah ini",
                            "choices": [
                                {
                                    "value": 1,
                                    "text": "450 watt"
                                },
                                {
                                    "value": 2,
                                    "text": "900 watt"
                                },
                                {
                                    "value": 3,
                                    "text": "1.300 watt"
                                },
                                {
                                    "value": 4,
                                    "text": "2.200 watt"
                                },
                                {
                                    "value": 5,
                                    "text": "> 2.200 watt"
                                }
                            ]
                        },
                        {
                            "type": "dropdown",
                            "name": "question_308",
                            "title": "308. Bahan bakar/energi utama untuk memasak",
                            "choices": [
                                {
                                    "value": 1,
                                    "text": "Listrik"
                                },
                                {
                                    "value": 2,
                                    "text": "Gas elpiji 5,5kg/blue gaz"
                                },
                                {
                                    "value": 3,
                                    "text": "Gas elpiji 12 kg"
                                },
                                {
                                    "value": 4,
                                    "text": "Gas elpiji 3 kg"
                                },
                                {
                                    "value": 5,
                                    "text": "Gas  kota/meteran PGN"
                                },
                                {
                                    "value": 6,
                                    "text": "Biogas"
                                },
                                {
                                    "value": 7,
                                    "text": "Minyak tanah"
                                },
                                {
                                    "value": 8,
                                    "text": "Briket"
                                },
                                {
                                    "value": 9,
                                    "text": "Arang"
                                },
                                {
                                    "value": 10,
                                    "text": "Kayu bakar"
                                },
                                {
                                    "value": 11,
                                    "text": "Lainnya"
                                },
                                {
                                    "value": 0,
                                    "text": "Tidak memasak di rumah"
                                }
                            ]
                        },
                        {
                            "type": "dropdown",
                            "name": "question_309_a",
                            "title": "309_a. Kepemilikan dan penggunaan fasilitas tempat buang air besar",
                            "choices": [
                                {
                                    "value": 1,
                                    "text": "Ada, digunakan hanya Anggota Keluarga sendiri"
                                },
                                {
                                    "value": 2,
                                    "text": "Ada, digunakan bersama Anggota Keluarga \ndari keluarga tertentu"
                                },
                                {
                                    "value": 3,
                                    "text": "Ada, di MCK komunal   "
                                },
                                {
                                    "value": 4,
                                    "text": "Ada, di MCK umum/ siapapun menggunakan"
                                },
                                {
                                    "value": 5,
                                    "text": "Ada, Anggota Keluarga tidak menggunakan"
                                },
                                {
                                    "value": 6,
                                    "text": "Tidak ada fasilitas"
                                }
                            ]
                        },
                        {
                            "type": "dropdown",
                            "name": "question_309_b",
                            "title": "309_b. Jika 309a berkode 1, 2, atau 3, Jenis kloset",
                            "choices": [
                                {
                                    "value": 1,
                                    "text": "Leher angsa"
                                },
                                {
                                    "value": 2,
                                    "text": "Plengsengan dengan tutup"
                                },
                                {
                                    "value": 3,
                                    "text": "Plengsengan tanpa tutup"
                                },
                                {
                                    "value": 4,
                                    "text": "Cemplung/cubluk"
                                }
                            ]
                        },
                        {
                            "type": "dropdown",
                            "name": "question_310",
                            "title": "310. Tempat pembuangan akhir tinja",
                            "choices": [
                                {
                                    "value": 1,
                                    "text": "Tangki septik"
                                },
                                {
                                    "value": 2,
                                    "text": "IPAL"
                                },
                                {
                                    "value": 3,
                                    "text": "Kolam/sawah/sungai/danau/laut"
                                },
                                {
                                    "value": 4,
                                    "text": "Lubang tanah"
                                },
                                {
                                    "value": 5,
                                    "text": "Pantai/tanah lapang/kebun"
                                },
                                {
                                    "value": 6,
                                    "text": "Lainnya"
                                }
                            ]
                        }
                    ],
                    "panelCount": 1,
                    "allowAddPanel": false,
                    "allowRemovePanel": false
                }
            ]
        },
        {
            "name": "page_4_",
            "elements": [
                {
                    "type": "paneldynamic",
                    "name": "subpanel_4_A",
                    "title": "IV A. KETERANGAN DEMOGRAFI",
                    "templateElements": [
                        {
                            "type": "text",
                            "name": "question_401",
                            "title": "401. Nomor urut anggota keluarga"
                        },
                        {
                            "type": "text",
                            "name": "question_402",
                            "title": "402. Nama anggota keluarga"
                        },
                        {
                            "type": "text",
                            "name": "question_403",
                            "title": "403. Nomor Induk Kependudukan (NIK)"
                        },
                        {
                            "type": "dropdown",
                            "name": "question_404",
                            "title": "404. Keterangan keberadaan anggota keluarga",
                            "choices": [
                                {
                                    "value": 1,
                                    "text": "Tinggal bersama keluarga"
                                },
                                {
                                    "value": 2,
                                    "text": "Meninggal"
                                },
                                {
                                    "value": 3,
                                    "text": "Tidak tinggal bersama keluarga/pindah"
                                },
                                {
                                    "value": 4,
                                    "text": "Anggota keluarga baru"
                                },
                                {
                                    "value": 5,
                                    "text": "Tidak ditemukan"
                                }
                            ]
                        },
                        {
                            "type": "dropdown",
                            "name": "question_405",
                            "title": "405. Jenis kelamin",
                            "choices": [
                                {
                                    "value": 1,
                                    "text": "Laki-laki"
                                },
                                {
                                    "value": 2,
                                    "text": "Perempuan"
                                }
                            ]
                        },
                        {
                            "type": "text",
                            "name": "question_406_1",
                            "title": "406_1. Tanggal"
                        },
                        {
                            "type": "text",
                            "name": "question_406_2",
                            "title": "406_2. Bulan"
                        },
                        {
                            "type": "text",
                            "name": "question_406_3",
                            "title": "406_3. Tahun"
                        },
                        {
                            "type": "text",
                            "name": "question_407",
                            "title": "407. Umur (Tahun)"
                        },
                        {
                            "type": "dropdown",
                            "name": "question_408",
                            "title": "408. Status Perkawinan",
                            "choices": [
                                {
                                    "value": 1,
                                    "text": "Belum kawin"
                                },
                                {
                                    "value": 2,
                                    "text": "Kawin/nikah"
                                },
                                {
                                    "value": 3,
                                    "text": "Cerai hidup"
                                },
                                {
                                    "value": 4,
                                    "text": "Cerai mati"
                                }
                            ]
                        },
                        {
                            "type": "dropdown",
                            "name": "question_409",
                            "title": "409. Status hubungan dengan kepala keluarga",
                            "choices": [
                                {
                                    "value": 1,
                                    "text": "Kepala keluarga"
                                },
                                {
                                    "value": 2,
                                    "text": "Istri/suami"
                                },
                                {
                                    "value": 3,
                                    "text": "Anak"
                                },
                                {
                                    "value": 4,
                                    "text": "Menantu"
                                },
                                {
                                    "value": 5,
                                    "text": "Cucu"
                                },
                                {
                                    "value": 6,
                                    "text": "Orangtua/mertua"
                                },
                                {
                                    "value": 7,
                                    "text": "Pembantu/sopir"
                                },
                                {
                                    "value": 8,
                                    "text": " Lainnya"
                                }
                            ]
                        },
                        {
                            "type": "dropdown",
                            "name": "question_410",
                            "title": "410. Jika {panel.question_402} merupakan wanita berusia 10-54 tahun dan 408 berkode 2, 3, atau 4, Apakah saat ini {panel.question_402} sedang hamil?",
                            "choices": [
                                {
                                    "value": 1,
                                    "text": "ya"
                                },
                                {
                                    "value": 2,
                                    "text": "tidak"
                                }
                            ]
                        },
                        {
                            "type": "dropdown",
                            "name": "question_411",
                            "title": "411. Apakah {panel.question_402} memiliki kartu identitas?",
                            "choices": [
                                {
                                    "value": 0,
                                    "text": "Tidak memilik"
                                },
                                {
                                    "value": 1,
                                    "text": "Akta kelahiran"
                                },
                                {
                                    "value": 2,
                                    "text": "KIA"
                                },
                                {
                                    "value": 4,
                                    "text": "KTP"
                                }
                            ]
                        },
                        {
                            "type": "paneldynamic",
                            "name": "subpanel_4_B",
                            "title": "IV B. PENDIDIKAN (ANGGOTA KELUARGA USIA 5 TAHUN KE ATAS)",
                            "templateElements": [
                                {
                                    "type": "dropdown",
                                    "name": "question_412",
                                    "title": "412. Partisipasi sekolah",
                                    "choices": [
                                        {
                                            "value": 1,
                                            "text": "Tidak/belum pernah sekolah"
                                        },
                                        {
                                            "value": 2,
                                            "text": "Masih sekolah"
                                        },
                                        {
                                            "value": 3,
                                            "text": "Tidak bersekolah lagi"
                                        }
                                    ]
                                },
                                {
                                    "type": "dropdown",
                                    "name": "question_413",
                                    "title": "413. Jenjang dan jenis pendidikan tertinggi yang pernah/sedang diduduki",
                                    "choices": [
                                        {
                                            "value": 1,
                                            "text": "Paket A"
                                        },
                                        {
                                            "value": 2,
                                            "text": "SDLB"
                                        },
                                        {
                                            "value": 3,
                                            "text": "SD"
                                        },
                                        {
                                            "value": 4,
                                            "text": "MI"
                                        },
                                        {
                                            "value": 5,
                                            "text": "SPM/PDF Ula"
                                        },
                                        {
                                            "value": 6,
                                            "text": "Paket B"
                                        },
                                        {
                                            "value": 7,
                                            "text": "SMP LB"
                                        },
                                        {
                                            "value": 8,
                                            "text": "SMP"
                                        },
                                        {
                                            "value": 9,
                                            "text": "MTs"
                                        },
                                        {
                                            "value": 10,
                                            "text": " SPM/PDF Wustha"
                                        },
                                        {
                                            "value": 11,
                                            "text": "Paket C"
                                        },
                                        {
                                            "value": 12,
                                            "text": "SMLB"
                                        },
                                        {
                                            "value": 13,
                                            "text": "SMA"
                                        },
                                        {
                                            "value": 14,
                                            "text": "MA"
                                        },
                                        {
                                            "value": 15,
                                            "text": "SMK"
                                        },
                                        {
                                            "value": 16,
                                            "text": "MAK"
                                        },
                                        {
                                            "value": 17,
                                            "text": "SPM/PDF Ulya"
                                        },
                                        {
                                            "value": 18,
                                            "text": "D1/D2/D3"
                                        },
                                        {
                                            "value": 19,
                                            "text": "D4/S1 "
                                        },
                                        {
                                            "value": 20,
                                            "text": "Profesi"
                                        },
                                        {
                                            "value": 21,
                                            "text": "S2"
                                        },
                                        {
                                            "value": 22,
                                            "text": "S3"
                                        },
                                        {
                                            "value": 23,
                                            "text": "Tidak Punya Ijazah SD"
                                        }
                                    ]
                                },
                                {
                                    "type": "text",
                                    "name": "question_414",
                                    "title": "414. Kelas tertinggi yang pernah/sedang diduduki"
                                },
                                {
                                    "type": "dropdown",
                                    "name": "question_415",
                                    "title": "415. Ijazah/STTB tertinggi yang dimiliki",
                                    "choices": [
                                        {
                                            "value": 1,
                                            "text": "Paket A"
                                        },
                                        {
                                            "value": 2,
                                            "text": "SDLB"
                                        },
                                        {
                                            "value": 3,
                                            "text": "SD"
                                        },
                                        {
                                            "value": 4,
                                            "text": "MI"
                                        },
                                        {
                                            "value": 5,
                                            "text": "SPM/PDF Ula"
                                        },
                                        {
                                            "value": 6,
                                            "text": "Paket B"
                                        },
                                        {
                                            "value": 7,
                                            "text": "SMP LB"
                                        },
                                        {
                                            "value": 8,
                                            "text": "SMP"
                                        },
                                        {
                                            "value": 9,
                                            "text": "MTs"
                                        },
                                        {
                                            "value": 10,
                                            "text": " SPM/PDF Wustha"
                                        },
                                        {
                                            "value": 11,
                                            "text": "Paket C"
                                        },
                                        {
                                            "value": 12,
                                            "text": "SMLB"
                                        },
                                        {
                                            "value": 13,
                                            "text": "SMA"
                                        },
                                        {
                                            "value": 14,
                                            "text": "MA"
                                        },
                                        {
                                            "value": 15,
                                            "text": "SMK"
                                        },
                                        {
                                            "value": 16,
                                            "text": "MAK"
                                        },
                                        {
                                            "value": 17,
                                            "text": "SPM/PDF Ulya"
                                        },
                                        {
                                            "value": 18,
                                            "text": "D1/D2/D3"
                                        },
                                        {
                                            "value": 19,
                                            "text": "D4/S1 "
                                        },
                                        {
                                            "value": 20,
                                            "text": "Profesi"
                                        },
                                        {
                                            "value": 21,
                                            "text": "S2"
                                        },
                                        {
                                            "value": 22,
                                            "text": "S3"
                                        },
                                        {
                                            "value": 23,
                                            "text": "Tidak Punya Ijazah SD"
                                        }
                                    ]
                                }
                            ],
                            "panelCount": 1,
                            "allowAddPanel": false,
                            "allowRemovePanel": false
                        },
                        {
                            "type": "paneldynamic",
                            "name": "subpanel_4_C",
                            "title": "IV C. KETENAGAKERJAAN (ANGGOTA KELUARGA USIA 5 TAHUN KE ATAS)",
                            "templateElements": [
                                {
                                    "type": "dropdown",
                                    "name": "question_416_a",
                                    "title": "416_a. Apakah {parentPanel.question_402} bekerja/membantu bekerja selama seminggu yang lalu?",
                                    "choices": [
                                        {
                                            "value": 1,
                                            "text": "Ya"
                                        },
                                        {
                                            "value": 2,
                                            "text": "Tidak"
                                        }
                                    ]
                                },
                                {
                                    "type": "text",
                                    "name": "question_416_b",
                                    "title": "416_b. Berapa jam {parentPanel.question_402} bekerja?"
                                },
                                {
                                    "type": "dropdown",
                                    "name": "question_417",
                                    "title": "417. Lapangan usaha dari pekerjaan utama",
                                    "choices": [
                                        {
                                            "value": 1,
                                            "text": "Pertanian tanaman padi & palawija"
                                        },
                                        {
                                            "value": 2,
                                            "text": "Hortikultura"
                                        },
                                        {
                                            "value": 3,
                                            "text": "Perkebunan"
                                        },
                                        {
                                            "value": 4,
                                            "text": "Perikanan"
                                        },
                                        {
                                            "value": 5,
                                            "text": "Peternakan"
                                        },
                                        {
                                            "value": 6,
                                            "text": "Kehutanan & pertanian lainnya"
                                        },
                                        {
                                            "value": 7,
                                            "text": "Pertambangan/penggalian"
                                        },
                                        {
                                            "value": 8,
                                            "text": "Industri pengolahan"
                                        },
                                        {
                                            "value": 9,
                                            "text": "Pengadaan listrik, gas, uap/air panas, dan udara dingin"
                                        },
                                        {
                                            "value": 10,
                                            "text": "Pengelolaan air, pengelolaan air limbah, pengelolaan dan daur ulang sampah, dan aktivitas remediasi"
                                        },
                                        {
                                            "value": 11,
                                            "text": "Konstruksi"
                                        },
                                        {
                                            "value": 12,
                                            "text": "Perdagangan besar dan eceran, reparasi dan perawatan mobil dan sepeda motor"
                                        },
                                        {
                                            "value": 13,
                                            "text": "Pengangkutan dan pergudangan"
                                        },
                                        {
                                            "value": 14,
                                            "text": "Penyediaan akomodasi & makan minum"
                                        },
                                        {
                                            "value": 15,
                                            "text": "Informasi & komunikasi"
                                        },
                                        {
                                            "value": 16,
                                            "text": "Keuangan & asuransi"
                                        },
                                        {
                                            "value": 17,
                                            "text": "Real estate"
                                        },
                                        {
                                            "value": 18,
                                            "text": "Aktivitas profesional, ilmiah, dan teknis"
                                        },
                                        {
                                            "value": 19,
                                            "text": "Aktivitas penyewaan dan sewa guna tanpa hak opsi, ketenagakerjaan, agen perjalanan, dan penunjang usaha lainnya"
                                        },
                                        {
                                            "value": 20,
                                            "text": "Administrasi pemerintahan, pertahanan, dan jaminan sosial wajib"
                                        },
                                        {
                                            "value": 21,
                                            "text": "Pendidikan"
                                        },
                                        {
                                            "value": 22,
                                            "text": "Aktivitas kesehatan manusia dan aktivitas sosial"
                                        },
                                        {
                                            "value": 23,
                                            "text": "Kesenian, hiburan, dan rekreasi"
                                        },
                                        {
                                            "value": 24,
                                            "text": "Aktivitas jasa lainnya"
                                        },
                                        {
                                            "value": 25,
                                            "text": "Aktivitas rumah tangga sebagai pemberi kerja"
                                        },
                                        {
                                            "value": 26,
                                            "text": "Aktivitas badan internasional dan badan ekstra internasional lainnya"
                                        }
                                    ]
                                },
                                {
                                    "type": "dropdown",
                                    "name": "question_418",
                                    "title": "418. Status dalam pekerjaan utama",
                                    "choices": [
                                        {
                                            "value": 1,
                                            "text": "Berusaha sendiri"
                                        },
                                        {
                                            "value": 2,
                                            "text": "Berusaha dibantu buruh tidak tetap/tidak dibayar"
                                        },
                                        {
                                            "value": 3,
                                            "text": "Berusaha dibantu buruh tetap/buruh dibayar"
                                        },
                                        {
                                            "value": 4,
                                            "text": "Buruh/karyawan/pegawai swasta"
                                        },
                                        {
                                            "value": 5,
                                            "text": "PNS/TNI/Polri/ BUMN/BUMD/pejabat negara"
                                        },
                                        {
                                            "value": 6,
                                            "text": "Pekerja bebas pertanian"
                                        },
                                        {
                                            "value": 7,
                                            "text": "Pekerja bebas non pertanian"
                                        },
                                        {
                                            "value": 8,
                                            "text": "Pekerja keluarga/tidak dibayar"
                                        }
                                    ]
                                },
                                {
                                    "type": "dropdown",
                                    "name": "question_419",
                                    "title": "419. Apakah {parentPanel.question_402} memiliki NPWP?",
                                    "choices": [
                                        {
                                            "value": 1,
                                            "text": "Ada, dapat menunjukkan"
                                        },
                                        {
                                            "value": 2,
                                            "text": "Ada, tidak dapat menunjukkan"
                                        },
                                        {
                                            "value": 3,
                                            "text": "Tidak ada"
                                        }
                                    ]
                                }
                            ],
                            "panelCount": 1,
                            "allowAddPanel": false,
                            "allowRemovePanel": false
                        },
                        {
                            "type": "paneldynamic",
                            "name": "subpanel_4_D",
                            "title": "IV D. KEPEMILIKAN USAHA (ANGGOTA KELUARGA USIA 5 TAHUN KE ATAS)",
                            "templateElements": [
                                {
                                    "type": "dropdown",
                                    "name": "question_420",
                                    "title": "420. Apakah {parentPanel.question_402} memiliki usaha sendiri/ bersama?",
                                    "choices": [
                                        {
                                            "value": 1,
                                            "text": "Ya"
                                        },
                                        {
                                            "value": 2,
                                            "text": "Tidak"
                                        }
                                    ]
                                },
                                {
                                    "type": "dropdown",
                                    "name": "question_421",
                                    "title": "421. Apakah lapangan usaha dari usaha tersebut?",
                                    "choices": [
                                        {
                                            "value": 1,
                                            "text": "Pertanian tanaman padi & palawija"
                                        },
                                        {
                                            "value": 2,
                                            "text": "Hortikultura"
                                        },
                                        {
                                            "value": 3,
                                            "text": "Perkebunan"
                                        },
                                        {
                                            "value": 4,
                                            "text": "Perikanan"
                                        },
                                        {
                                            "value": 5,
                                            "text": "Peternakan"
                                        },
                                        {
                                            "value": 6,
                                            "text": "Kehutanan & pertanian lainnya"
                                        },
                                        {
                                            "value": 7,
                                            "text": "Pertambangan/penggalian"
                                        },
                                        {
                                            "value": 8,
                                            "text": "Industri pengolahan"
                                        },
                                        {
                                            "value": 9,
                                            "text": "Pengadaan listrik, gas, uap/air panas, dan udara dingin"
                                        },
                                        {
                                            "value": 10,
                                            "text": "Pengelolaan air, pengelolaan air limbah, pengelolaan dan daur ulang sampah, dan aktivitas remediasi"
                                        },
                                        {
                                            "value": 11,
                                            "text": "Konstruksi"
                                        },
                                        {
                                            "value": 12,
                                            "text": "Perdagangan besar dan eceran, reparasi dan perawatan mobil dan sepeda motor"
                                        },
                                        {
                                            "value": 13,
                                            "text": "Pengangkutan dan pergudangan"
                                        },
                                        {
                                            "value": 14,
                                            "text": "Penyediaan akomodasi & makan minum"
                                        },
                                        {
                                            "value": 15,
                                            "text": "Informasi & komunikasi"
                                        },
                                        {
                                            "value": 16,
                                            "text": "Keuangan & asuransi"
                                        },
                                        {
                                            "value": 17,
                                            "text": "Real estate"
                                        },
                                        {
                                            "value": 18,
                                            "text": "Aktivitas profesional, ilmiah, dan teknis"
                                        },
                                        {
                                            "value": 19,
                                            "text": "Aktivitas penyewaan dan sewa guna tanpa hak opsi, ketenagakerjaan, agen perjalanan, dan penunjang usaha lainnya"
                                        },
                                        {
                                            "value": 20,
                                            "text": "Administrasi pemerintahan, pertahanan, dan jaminan sosial wajib"
                                        },
                                        {
                                            "value": 21,
                                            "text": "Pendidikan"
                                        },
                                        {
                                            "value": 22,
                                            "text": "Aktivitas kesehatan manusia dan aktivitas sosial"
                                        },
                                        {
                                            "value": 23,
                                            "text": "Kesenian, hiburan, dan rekreasi"
                                        },
                                        {
                                            "value": 24,
                                            "text": "Aktivitas jasa lainnya"
                                        },
                                        {
                                            "value": 25,
                                            "text": "Aktivitas rumah tangga sebagai pemberi kerja"
                                        },
                                        {
                                            "value": 26,
                                            "text": "Aktivitas badan internasional dan badan ekstra internasional lainnya"
                                        }
                                    ]
                                },
                                {
                                    "type": "text",
                                    "name": "question_422",
                                    "title": "422. Jumlah pekerja yang dibayar"
                                },
                                {
                                    "type": "text",
                                    "name": "question_423",
                                    "title": "423. Jumlah pekerja yang tidak dibayar"
                                },
                                {
                                    "type": "dropdown",
                                    "name": "question_424",
                                    "title": "424. Kepemilikan perizinan usaha",
                                    "choices": [
                                        {
                                            "value": 1,
                                            "text": "Surat Izin Tempat Usaha (SITU)"
                                        },
                                        {
                                            "value": 2,
                                            "text": "Surat Izin Usaha Perdagangan (SIUP)"
                                        },
                                        {
                                            "value": 3,
                                            "text": "Nomor Register Perusahaan (NRP)"
                                        },
                                        {
                                            "value": 4,
                                            "text": "Nomor Induk Berusaha (NIB)"
                                        },
                                        {
                                            "value": 5,
                                            "text": "Surat Keterangan Domisili Perusahaan (SKDP)"
                                        },
                                        {
                                            "value": 6,
                                            "text": "Analisis Mengenai Dampak Lingkungan (Amdal)"
                                        },
                                        {
                                            "value": 7,
                                            "text": "Surat Izin Mendirikan Bangunan (SIMB)"
                                        },
                                        {
                                            "value": 8,
                                            "text": "Surat Keputusan Badan Hukum (SKBH)"
                                        },
                                        {
                                            "value": 9,
                                            "text": "Akta Pendirian Perseroan Terbatas (APPT)"
                                        },
                                        {
                                            "value": 10,
                                            "text": "Surat izin lainnya"
                                        },
                                        {
                                            "value": 11,
                                            "text": "Belum memiliki izin usaha"
                                        },
                                        {
                                            "value": 12,
                                            "text": "Surat Izin Gangguan"
                                        }
                                    ]
                                },
                                {
                                    "type": "dropdown",
                                    "name": "question_425",
                                    "title": "425. Omzet usaha perbulan",
                                    "choices": [
                                        {
                                            "value": 1,
                                            "text": "< 5 Juta (ultra mikro)"
                                        },
                                        {
                                            "value": 2,
                                            "text": "5 - < 15 Juta (ultra mikro)"
                                        },
                                        {
                                            "value": 3,
                                            "text": "15 - < 25 Juta (ultra mikro)"
                                        },
                                        {
                                            "value": 4,
                                            "text": "25 - < 167 Juta (mikro)"
                                        },
                                        {
                                            "value": 5,
                                            "text": "167 - < 1.250 Juta (kecil)"
                                        },
                                        {
                                            "value": 6,
                                            "text": "1.250 - < 4.167 Juta (menengah)"
                                        },
                                        {
                                            "value": 7,
                                            "text": "\u2265 4.167 Juta (besar)"
                                        }
                                    ]
                                },
                                {
                                    "type": "dropdown",
                                    "name": "question_426",
                                    "title": "426. Penggunaan internet dalam kegiatan usaha",
                                    "choices": [
                                        {
                                            "value": 0,
                                            "text": "Tidak menggunakan internet"
                                        },
                                        {
                                            "value": 1,
                                            "text": "Sebagai sarana komunikasi"
                                        },
                                        {
                                            "value": 2,
                                            "text": "Untuk mencari informasi"
                                        },
                                        {
                                            "value": 4,
                                            "text": "Sebagai Pemasaran/Iklan"
                                        },
                                        {
                                            "value": 8,
                                            "text": "Sebagai Sarana Penjualan Produk/Output"
                                        },
                                        {
                                            "value": 16,
                                            "text": "Sebagai Pembelian dan/atau Produksi"
                                        },
                                        {
                                            "value": 32,
                                            "text": "Lainnya"
                                        }
                                    ]
                                }
                            ],
                            "panelCount": 1,
                            "allowAddPanel": false,
                            "allowRemovePanel": false
                        },
                        {
                            "type": "paneldynamic",
                            "name": "subpanel_4_E",
                            "title": "IV E. KESEHATAN",
                            "templateElements": [
                                {
                                    "type": "text",
                                    "name": "question_427",
                                    "title": "427. Bagaimana kondisi gizi anak dari pemeriksaan 3 bulan terakhir di posyandu / puskesmas/rumah sakit dengan mengacu pada catatan/buku kontrol?"
                                },
                                {
                                    "type": "dropdown",
                                    "name": "question_428_a",
                                    "title": "428_a. Apakah {parentPanel.question_402}  mengalami kesulitan/gangguan penglihatan meskipun menggunakan alat bantu melihat?",
                                    "choices": [
                                        {
                                            "value": 1,
                                            "text": "Ya, sama sekali tidak bisa"
                                        },
                                        {
                                            "value": 2,
                                            "text": "Ya, banyak kesulitan dan membutuhkan bantuan"
                                        },
                                        {
                                            "value": 3,
                                            "text": "Ya, sedikit kesulitan, tapi tidak membutuhkan bantuan"
                                        },
                                        {
                                            "value": 4,
                                            "text": "Tidak mengalami kesulitan"
                                        }
                                    ]
                                },
                                {
                                    "type": "dropdown",
                                    "name": "question_428_b",
                                    "title": "428_b. Apakah {parentPanel.question_402} mengalami kesulitan/gangguan pendengaran meskipun menggunakan alat bantu dengar?",
                                    "choices": [
                                        {
                                            "value": 1,
                                            "text": "Ya, sama sekali tidak bisa"
                                        },
                                        {
                                            "value": 2,
                                            "text": "Ya, banyak kesulitan dan membutuhkan bantuan"
                                        },
                                        {
                                            "value": 3,
                                            "text": "Ya, sedikit kesulitan, tapi tidak membutuhkan bantuan"
                                        },
                                        {
                                            "value": 4,
                                            "text": "Tidak mengalami kesulitan"
                                        }
                                    ]
                                },
                                {
                                    "type": "dropdown",
                                    "name": "question_428_c",
                                    "title": "428_c. Apakah {parentPanel.question_402} mengalami kesulitan/gangguan berjalan atau naik tangga?",
                                    "choices": [
                                        {
                                            "value": 1,
                                            "text": "Ya, sama sekali tidak bisa"
                                        },
                                        {
                                            "value": 2,
                                            "text": "Ya, banyak kesulitan dan membutuhkan bantuan"
                                        },
                                        {
                                            "value": 3,
                                            "text": "Ya, sedikit kesulitan, tapi tidak membutuhkan bantuan"
                                        },
                                        {
                                            "value": 4,
                                            "text": "Tidak mengalami kesulitan"
                                        }
                                    ]
                                },
                                {
                                    "type": "dropdown",
                                    "name": "question_428_d",
                                    "title": "428_d. Apakah {parentPanel.question_402} mengalami kesulitan/gangguan menggerakkan/menggunakan tangan/ jari?",
                                    "choices": [
                                        {
                                            "value": 1,
                                            "text": "Ya, sama sekali tidak bisa"
                                        },
                                        {
                                            "value": 2,
                                            "text": "Ya, banyak kesulitan dan membutuhkan bantuan"
                                        },
                                        {
                                            "value": 3,
                                            "text": "Ya, sedikit kesulitan, tapi tidak membutuhkan bantuan"
                                        },
                                        {
                                            "value": 4,
                                            "text": "Tidak mengalami kesulitan"
                                        }
                                    ]
                                },
                                {
                                    "type": "dropdown",
                                    "name": "question_428_e",
                                    "title": "428_e. Dibandingkan dengan penduduk yang sebaya, apakah {parentPanel.question_402} mengalami kesulitan/ gangguan dalam belajar atau kemampuan intelektual?",
                                    "choices": [
                                        {
                                            "value": 1,
                                            "text": "Ya, sama sekali tidak bisa"
                                        },
                                        {
                                            "value": 2,
                                            "text": "Ya, banyak kesulitan dan membutuhkan bantuan"
                                        },
                                        {
                                            "value": 3,
                                            "text": "Ya, sedikit kesulitan, tapi tidak membutuhkan bantuan"
                                        },
                                        {
                                            "value": 4,
                                            "text": "Tidak mengalami kesulitan"
                                        }
                                    ]
                                },
                                {
                                    "type": "dropdown",
                                    "name": "question_428_f",
                                    "title": "428_f. Dibandingkan dengan penduduk yang sebaya, apakah {parentPanel.question_402} mengalami kesulitan/ gangguan mengendalikan perilaku?",
                                    "choices": [
                                        {
                                            "value": 1,
                                            "text": "Ya, sama sekali tidak bisa"
                                        },
                                        {
                                            "value": 2,
                                            "text": "Ya, banyak kesulitan dan membutuhkan bantuan"
                                        },
                                        {
                                            "value": 3,
                                            "text": "Ya, sedikit kesulitan, tapi tidak membutuhkan bantuan"
                                        },
                                        {
                                            "value": 4,
                                            "text": "Tidak mengalami kesulitan"
                                        }
                                    ]
                                },
                                {
                                    "type": "dropdown",
                                    "name": "question_428_g",
                                    "title": "428_g. Apakah {parentPanel.question_402} mengalami kesulitan/gangguan berbicara/berkomunikasi?",
                                    "choices": [
                                        {
                                            "value": 1,
                                            "text": "Ya, sama sekali tidak bisa"
                                        },
                                        {
                                            "value": 2,
                                            "text": "Ya, banyak kesulitan dan membutuhkan bantuan"
                                        },
                                        {
                                            "value": 3,
                                            "text": "Ya, sedikit kesulitan, tapi tidak membutuhkan bantuan"
                                        },
                                        {
                                            "value": 4,
                                            "text": "Tidak mengalami kesulitan"
                                        }
                                    ]
                                },
                                {
                                    "type": "dropdown",
                                    "name": "question_428_h",
                                    "title": "428_h. Apakah {parentPanel.question_402} mengalami kesulitan/gangguan untuk mengurus diri sendiri? (mandi, makan, berpakaian, BAK, BAB)",
                                    "choices": [
                                        {
                                            "value": 1,
                                            "text": "Ya, sama sekali tidak bisa"
                                        },
                                        {
                                            "value": 2,
                                            "text": "Ya, banyak kesulitan dan membutuhkan bantuan"
                                        },
                                        {
                                            "value": 3,
                                            "text": "Ya, sedikit kesulitan, tapi tidak membutuhkan bantuan"
                                        },
                                        {
                                            "value": 4,
                                            "text": "Tidak mengalami kesulitan"
                                        }
                                    ]
                                },
                                {
                                    "type": "dropdown",
                                    "name": "question_428_i",
                                    "title": "428_i. Apakah {parentPanel.question_402} mengalami kesulitan/gangguan mengingat/berkonsentrasi?",
                                    "choices": [
                                        {
                                            "value": 1,
                                            "text": "Ya, sama sekali tidak bisa"
                                        },
                                        {
                                            "value": 2,
                                            "text": "Ya, banyak kesulitan dan membutuhkan bantuan"
                                        },
                                        {
                                            "value": 3,
                                            "text": "Ya, sedikit kesulitan, tapi tidak membutuhkan bantuan"
                                        },
                                        {
                                            "value": 4,
                                            "text": "Tidak mengalami kesulitan"
                                        }
                                    ]
                                },
                                {
                                    "type": "dropdown",
                                    "name": "question_428_j",
                                    "title": "428_j. Seberapa sering {parentPanel.question_402} mengalami gangguan kesedihan depresi?",
                                    "choices": [
                                        {
                                            "value": 1,
                                            "text": "Sangat sering"
                                        },
                                        {
                                            "value": 2,
                                            "text": "Sering"
                                        },
                                        {
                                            "value": 3,
                                            "text": "Jarang"
                                        },
                                        {
                                            "value": 4,
                                            "text": "Tidak pernah"
                                        }
                                    ]
                                },
                                {
                                    "type": "dropdown",
                                    "name": "question_429",
                                    "title": "429. Apakah {parentPanel.question_402} memiliki caregiver/pemberi rawat/pengasuh/wali?",
                                    "choices": [
                                        {
                                            "value": 1,
                                            "text": "Ya, Anggota Keluarga"
                                        },
                                        {
                                            "value": 2,
                                            "text": "Ya, Bukan Anggota Keluarga"
                                        },
                                        {
                                            "value": 3,
                                            "text": "Tinggal Sendiri"
                                        }
                                    ]
                                },
                                {
                                    "type": "dropdown",
                                    "name": "question_430_a",
                                    "title": "430_a. Apakah {parentPanel.question_402} mengalami kesulitan/gangguan yang menyebabkan keterbatasan dalam kehidupan sehari-hari",
                                    "choices": [
                                        {
                                            "value": 1,
                                            "text": "Tidak Ada"
                                        },
                                        {
                                            "value": 2,
                                            "text": "Darah tinggi"
                                        },
                                        {
                                            "value": 3,
                                            "text": "Rematik"
                                        },
                                        {
                                            "value": 4,
                                            "text": "Asma"
                                        },
                                        {
                                            "value": 5,
                                            "text": "Masalah jantung"
                                        },
                                        {
                                            "value": 6,
                                            "text": "Diabetes (kencing manis)"
                                        },
                                        {
                                            "value": 7,
                                            "text": "Tuberculosis (TBC)"
                                        },
                                        {
                                            "value": 8,
                                            "text": "Stroke"
                                        },
                                        {
                                            "value": 9,
                                            "text": "Kanker atau tumor ganas"
                                        },
                                        {
                                            "value": 10,
                                            "text": "Gagal ginjal"
                                        },
                                        {
                                            "value": 11,
                                            "text": "Haemophilia"
                                        },
                                        {
                                            "value": 12,
                                            "text": "HIV/AIDS"
                                        },
                                        {
                                            "value": 13,
                                            "text": "Kolesterol"
                                        },
                                        {
                                            "value": 14,
                                            "text": "Sirosis Hati"
                                        },
                                        {
                                            "value": 15,
                                            "text": "Thalasemia"
                                        },
                                        {
                                            "value": 16,
                                            "text": "Leukimia"
                                        },
                                        {
                                            "value": 17,
                                            "text": "Alzheimer"
                                        },
                                        {
                                            "value": 18,
                                            "text": "Lainnya"
                                        }
                                    ]
                                },
                                {
                                    "type": "dropdown",
                                    "name": "question_430_b",
                                    "title": "430_b. Apakah {parentPanel.question_402} memiliki keluhan kesehatan kronis/menahun?",
                                    "choices": [
                                        {
                                            "value": 1,
                                            "text": "Tidak Ada"
                                        },
                                        {
                                            "value": 2,
                                            "text": "Darah tinggi"
                                        },
                                        {
                                            "value": 3,
                                            "text": "Rematik"
                                        },
                                        {
                                            "value": 4,
                                            "text": "Asma"
                                        },
                                        {
                                            "value": 5,
                                            "text": "Masalah jantung"
                                        },
                                        {
                                            "value": 6,
                                            "text": "Diabetes (kencing manis)"
                                        },
                                        {
                                            "value": 7,
                                            "text": "Tuberculosis (TBC)"
                                        },
                                        {
                                            "value": 8,
                                            "text": "Stroke"
                                        },
                                        {
                                            "value": 9,
                                            "text": "Kanker atau tumor ganas"
                                        },
                                        {
                                            "value": 10,
                                            "text": "Gagal ginjal"
                                        },
                                        {
                                            "value": 11,
                                            "text": "Haemophilia"
                                        },
                                        {
                                            "value": 12,
                                            "text": "HIV/AIDS"
                                        },
                                        {
                                            "value": 13,
                                            "text": "Kolesterol"
                                        },
                                        {
                                            "value": 14,
                                            "text": "Sirosis Hati"
                                        },
                                        {
                                            "value": 15,
                                            "text": "Thalasemia"
                                        },
                                        {
                                            "value": 16,
                                            "text": "Leukimia"
                                        },
                                        {
                                            "value": 17,
                                            "text": "Alzheimer"
                                        },
                                        {
                                            "value": 18,
                                            "text": "Lainnya"
                                        }
                                    ]
                                }
                            ],
                            "panelCount": 1,
                            "allowAddPanel": false,
                            "allowRemovePanel": false
                        },
                        {
                            "type": "paneldynamic",
                            "name": "subpanel_4_F",
                            "title": "IV F. PROGRAM PERLINDUNGAN SOSIAL",
                            "templateElements": [
                                {
                                    "type": "dropdown",
                                    "name": "question_431_a",
                                    "title": "431_a. Dalam satu tahun terakhir, apakah {parentPanel.question_402} memiliki jaminan kesehatan?",
                                    "choices": [
                                        {
                                            "value": 0,
                                            "text": "Tidak memiliki"
                                        },
                                        {
                                            "value": 1,
                                            "text": "PBI JKN"
                                        },
                                        {
                                            "value": 2,
                                            "text": "JKN Mandiri"
                                        },
                                        {
                                            "value": 4,
                                            "text": "JKN Pemberi kerja"
                                        },
                                        {
                                            "value": 8,
                                            "text": "Jamkes lainnya"
                                        },
                                        {
                                            "value": 99,
                                            "text": "Tidak Tahu"
                                        }
                                    ]
                                },
                                {
                                    "type": "dropdown",
                                    "name": "question_431_b",
                                    "title": "431_b. Dalam satu tahun terakhir, apakah {parentPanel.question_402} ikut serta dalam Program Pra-Kerja?",
                                    "choices": [
                                        {
                                            "value": 1,
                                            "text": "Ya"
                                        },
                                        {
                                            "value": 2,
                                            "text": "Tidak"
                                        },
                                        {
                                            "value": 8,
                                            "text": "Tidak Tahu"
                                        }
                                    ]
                                },
                                {
                                    "type": "dropdown",
                                    "name": "question_431_c",
                                    "title": "431_c. Dalam satu tahun terakhir, apakah {parentPanel.question_402} ikut serta dalam Program Kredit Usaha Rakyat (KUR)?",
                                    "choices": [
                                        {
                                            "value": 1,
                                            "text": "Ya"
                                        },
                                        {
                                            "value": 2,
                                            "text": "Tidak"
                                        },
                                        {
                                            "value": 8,
                                            "text": "Tidak Tahu"
                                        }
                                    ]
                                },
                                {
                                    "type": "dropdown",
                                    "name": "question_431_d",
                                    "title": "431_d. Dalam satu tahun terakhir, apakah {parentPanel.question_402} ikut serta dalam Program Pembiayaan Ultra Mikro (UMi)?",
                                    "choices": [
                                        {
                                            "value": 1,
                                            "text": "Ya"
                                        },
                                        {
                                            "value": 2,
                                            "text": "Tidak"
                                        },
                                        {
                                            "value": 8,
                                            "text": "Tidak Tahu"
                                        }
                                    ]
                                },
                                {
                                    "type": "dropdown",
                                    "name": "question_431_e",
                                    "title": "431_e. Dalam satu tahun terakhir, apakah {parentPanel.question_402} ikut serta dalam Program Indonesia Pintar (PIP)?",
                                    "choices": [
                                        {
                                            "value": 1,
                                            "text": "Ya"
                                        },
                                        {
                                            "value": 2,
                                            "text": "Tidak"
                                        },
                                        {
                                            "value": 8,
                                            "text": "Tidak Tahu"
                                        }
                                    ]
                                },
                                {
                                    "type": "dropdown",
                                    "name": "question_431_f",
                                    "title": "431_f. Dalam satu tahun terakhir, apakah {parentPanel.question_402} memiliki jaminan ketenagakerjaan?",
                                    "choices": [
                                        {
                                            "value": 0,
                                            "text": "Tidak memiliki"
                                        },
                                        {
                                            "value": 1,
                                            "text": "BPJS Jaminan Kecelakaan Kerja"
                                        },
                                        {
                                            "value": 2,
                                            "text": "BPJS Jaminan Kematian"
                                        },
                                        {
                                            "value": 4,
                                            "text": "BPJS Jaminan Hari Tua"
                                        },
                                        {
                                            "value": 8,
                                            "text": "BPJS Jaminan Pensiun"
                                        },
                                        {
                                            "value": 16,
                                            "text": "Pensiun/Jaminan hari tua lainnya (Taspen/Program Pensiun Swasta)"
                                        },
                                        {
                                            "value": 99,
                                            "text": "Tidak Tahu"
                                        }
                                    ]
                                }
                            ],
                            "panelCount": 1,
                            "allowAddPanel": false,
                            "allowRemovePanel": false
                        }
                    ],
                    "panelCount": 1,
                    "allowAddPanel": true,
                    "allowRemovePanel": true,
                    "templateTabTitle": "{panel.question_402}",
                    "tabTitlePlaceholder": "Anggota Keluarga",
                    "panelAddText": "Tambah Anggota Keluarga",
                    "panelRemoveText": "Hapus Anggota Keluarga",
                    "renderMode": "tab",
                    "displayMode": "tab"
                }
            ]
        },
        {
            "name": "page_5_A",
            "elements": [
                {
                    "type": "paneldynamic",
                    "name": "subpanel_5_A",
                    "title": "V. KEIKUTSERTAAN PROGRAM, KEPEMILIKAN ASET, DAN LAYANAN",
                    "templateElements": [
                        {
                            "type": "dropdown",
                            "name": "question_501_a_1",
                            "title": "501_a_1. Program Bantuan Sosial Sembako/ BPNT",
                            "choices": [
                                {
                                    "value": 1,
                                    "text": "Ya"
                                },
                                {
                                    "value": 2,
                                    "text": "Tidak"
                                }
                            ]
                        },
                        {
                            "type": "text",
                            "name": "question_501_a_2",
                            "title": "501_a_2. Program Bantuan Sosial Sembako/ BPNT"
                        },
                        {
                            "type": "text",
                            "name": "question_501_a_3",
                            "title": "501_a_3. Program Bantuan Sosial Sembako/ BPNT"
                        },
                        {
                            "type": "dropdown",
                            "name": "question_501_b_1",
                            "title": "501_b_1. Program Keluarga Harapan (PKH)",
                            "choices": [
                                {
                                    "value": 1,
                                    "text": "Ya"
                                },
                                {
                                    "value": 2,
                                    "text": "Tidak"
                                }
                            ]
                        },
                        {
                            "type": "text",
                            "name": "question_501_b_2",
                            "title": "501_b_2. Program Keluarga Harapan (PKH)"
                        },
                        {
                            "type": "text",
                            "name": "question_501_b_3",
                            "title": "501_b_3. Program Keluarga Harapan (PKH)"
                        },
                        {
                            "type": "dropdown",
                            "name": "question_501_c_1",
                            "title": "501_c_1. Program Bantuan Langsung Tunai (BLT) Desa",
                            "choices": [
                                {
                                    "value": 1,
                                    "text": "Ya"
                                },
                                {
                                    "value": 2,
                                    "text": "Tidak"
                                }
                            ]
                        },
                        {
                            "type": "text",
                            "name": "question_501_c_2",
                            "title": "501_c_2. Program Bantuan Langsung Tunai (BLT) Desa"
                        },
                        {
                            "type": "text",
                            "name": "question_501_c_3",
                            "title": "501_c_3. Program Bantuan Langsung Tunai (BLT) Desa"
                        },
                        {
                            "type": "dropdown",
                            "name": "question_501_d_1",
                            "title": "501_d_1. Program Subsidi Listrik (gratis/pemotongan biaya)",
                            "choices": [
                                {
                                    "value": 1,
                                    "text": "Ya"
                                },
                                {
                                    "value": 2,
                                    "text": "Tidak"
                                }
                            ]
                        },
                        {
                            "type": "text",
                            "name": "question_501_d_2",
                            "title": "501_d_2. Program Subsidi Listrik (gratis/pemotongan biaya)"
                        },
                        {
                            "type": "text",
                            "name": "question_501_d_3",
                            "title": "501_d_3. Program Subsidi Listrik (gratis/pemotongan biaya)"
                        },
                        {
                            "type": "dropdown",
                            "name": "question_501_e_1",
                            "title": "501_e_1. Program Bantuan Pemerintah Daerah",
                            "choices": [
                                {
                                    "value": 1,
                                    "text": "Ya"
                                },
                                {
                                    "value": 2,
                                    "text": "Tidak"
                                }
                            ]
                        },
                        {
                            "type": "text",
                            "name": "question_501_e_2",
                            "title": "501_e_2. Program Bantuan Pemerintah Daerah"
                        },
                        {
                            "type": "text",
                            "name": "question_501_e_3",
                            "title": "501_e_3. Program Bantuan Pemerintah Daerah"
                        }
                    ],
                    "panelCount": 1,
                    "allowAddPanel": false,
                    "allowRemovePanel": false
                }
            ]
        },
        {
            "name": "page_5_B",
            "elements": [
                {
                    "type": "paneldynamic",
                    "name": "subpanel_5_B",
                    "title": "V. KEIKUTSERTAAN PROGRAM, KEPEMILIKAN ASET, DAN LAYANAN",
                    "templateElements": [
                        {
                            "type": "dropdown",
                            "name": "question_502_a",
                            "title": "502_a. Tabung gas 5,5 kg atau lebih",
                            "choices": [
                                {
                                    "value": 1,
                                    "text": "Ya"
                                },
                                {
                                    "value": 2,
                                    "text": "Tidak"
                                }
                            ]
                        },
                        {
                            "type": "dropdown",
                            "name": "question_502_b",
                            "title": "502_b. Lemari es/kulkas",
                            "choices": [
                                {
                                    "value": 1,
                                    "text": "Ya"
                                },
                                {
                                    "value": 2,
                                    "text": "Tidak"
                                }
                            ]
                        },
                        {
                            "type": "dropdown",
                            "name": "question_502_c",
                            "title": "502_c. Air Conditioner(AC)",
                            "choices": [
                                {
                                    "value": 1,
                                    "text": "Ya"
                                },
                                {
                                    "value": 2,
                                    "text": "Tidak"
                                }
                            ]
                        },
                        {
                            "type": "dropdown",
                            "name": "question_502_d",
                            "title": "502_d. Pemanas air (water heater)",
                            "choices": [
                                {
                                    "value": 1,
                                    "text": "Ya"
                                },
                                {
                                    "value": 2,
                                    "text": "Tidak"
                                }
                            ]
                        },
                        {
                            "type": "dropdown",
                            "name": "question_502_e",
                            "title": "502_e. Telepon rumah (PSTN)",
                            "choices": [
                                {
                                    "value": 1,
                                    "text": "Ya"
                                },
                                {
                                    "value": 2,
                                    "text": "Tidak"
                                }
                            ]
                        },
                        {
                            "type": "dropdown",
                            "name": "question_502_f",
                            "title": "502_f. Televisi layar datar (min. 30 inci)",
                            "choices": [
                                {
                                    "value": 1,
                                    "text": "Ya"
                                },
                                {
                                    "value": 2,
                                    "text": "Tidak"
                                }
                            ]
                        },
                        {
                            "type": "dropdown",
                            "name": "question_502_g",
                            "title": "502_g. Emas/perhiasan (min. 10 gram)",
                            "choices": [
                                {
                                    "value": 1,
                                    "text": "Ya"
                                },
                                {
                                    "value": 2,
                                    "text": "Tidak"
                                }
                            ]
                        },
                        {
                            "type": "dropdown",
                            "name": "question_502_h",
                            "title": "502_h. Komputer/Laptop/Tablet",
                            "choices": [
                                {
                                    "value": 1,
                                    "text": "Ya"
                                },
                                {
                                    "value": 2,
                                    "text": "Tidak"
                                }
                            ]
                        },
                        {
                            "type": "dropdown",
                            "name": "question_502_i",
                            "title": "502_i. Sepeda Motor",
                            "choices": [
                                {
                                    "value": 1,
                                    "text": "Ya"
                                },
                                {
                                    "value": 2,
                                    "text": "Tidak"
                                }
                            ]
                        },
                        {
                            "type": "dropdown",
                            "name": "question_502_j",
                            "title": "502_j. Sepeda",
                            "choices": [
                                {
                                    "value": 1,
                                    "text": "Ya"
                                },
                                {
                                    "value": 2,
                                    "text": "Tidak"
                                }
                            ]
                        },
                        {
                            "type": "dropdown",
                            "name": "question_502_k",
                            "title": "502_k. Mobil",
                            "choices": [
                                {
                                    "value": 1,
                                    "text": "Ya"
                                },
                                {
                                    "value": 2,
                                    "text": "Tidak"
                                }
                            ]
                        },
                        {
                            "type": "dropdown",
                            "name": "question_502_l",
                            "title": "502_l. Perahu",
                            "choices": [
                                {
                                    "value": 1,
                                    "text": "Ya"
                                },
                                {
                                    "value": 2,
                                    "text": "Tidak"
                                }
                            ]
                        },
                        {
                            "type": "dropdown",
                            "name": "question_502_m",
                            "title": "502_m. Kapal/Perahu Motor",
                            "choices": [
                                {
                                    "value": 1,
                                    "text": "Ya"
                                },
                                {
                                    "value": 2,
                                    "text": "Tidak"
                                }
                            ]
                        },
                        {
                            "type": "dropdown",
                            "name": "question_502_n",
                            "title": "502_n. Smartphone",
                            "choices": [
                                {
                                    "value": 1,
                                    "text": "Ya"
                                },
                                {
                                    "value": 2,
                                    "text": "Tidak"
                                }
                            ]
                        },
                        {
                            "type": "dropdown",
                            "name": "question_503_a",
                            "title": "503_a. Lahan (selain yang ditempati)",
                            "choices": [
                                {
                                    "value": 1,
                                    "text": "Ya"
                                },
                                {
                                    "value": 2,
                                    "text": "Tidak"
                                }
                            ]
                        },
                        {
                            "type": "dropdown",
                            "name": "question_503_b",
                            "title": "503_b. Rumah/bangunan di tempat lain",
                            "choices": [
                                {
                                    "value": 1,
                                    "text": "Ya"
                                },
                                {
                                    "value": 2,
                                    "text": "Tidak"
                                }
                            ]
                        },
                        {
                            "type": "text",
                            "name": "question_504_a",
                            "title": "504_a. Sapi"
                        },
                        {
                            "type": "text",
                            "name": "question_504_b",
                            "title": "504_b. Kerbau"
                        },
                        {
                            "type": "text",
                            "name": "question_504_c",
                            "title": "504_c. Kuda"
                        },
                        {
                            "type": "text",
                            "name": "question_504_d",
                            "title": "504_d. Babi"
                        },
                        {
                            "type": "text",
                            "name": "question_504_e",
                            "title": "504_e. Kambing/Domba"
                        },
                        {
                            "type": "dropdown",
                            "name": "question_505",
                            "title": "505. Jenis akses internet utama yang digunakan keluarga selama sebulan terakhir?",
                            "choices": [
                                {
                                    "value": 0,
                                    "text": "Tidak menggunakan internet"
                                },
                                {
                                    "value": 1,
                                    "text": "Kabel Optik"
                                },
                                {
                                    "value": 2,
                                    "text": "WiFi"
                                },
                                {
                                    "value": 3,
                                    "text": "Internet Handphone"
                                }
                            ]
                        },
                        {
                            "type": "dropdown",
                            "name": "question_506",
                            "title": "506. Apakah keluarga ini memiliki rekening aktif atau dompet digital?",
                            "choices": [
                                {
                                    "value": 1,
                                    "text": "Ya"
                                },
                                {
                                    "value": 2,
                                    "text": "Tidak"
                                }
                            ]
                        }
                    ],
                    "panelCount": 1,
                    "allowAddPanel": false,
                    "allowRemovePanel": false
                }
            ]
        },
        {
            "name": "page_6_",
            "elements": [
                {
                    "type": "paneldynamic",
                    "name": "subpanel_6_",
                    "title": "VI. CATATAN",
                    "templateElements": [
                        {
                            "type": "text",
                            "name": "question_601",
                            "title": "601. Catatan"
                        },
                        {
                            "type": "text",
                            "name": "question_702",
                            "title": "702. Waktu selesai pendataan"
                        }
                    ],
                    "panelCount": 1,
                    "allowAddPanel": false,
                    "allowRemovePanel": false
                }
            ]
        }
    ]
}';
        Template::create([
            "versi" => "0.0.2",
            "label_versi" => Constants::VERSI_TEMPLATE_LATEST,
            "kolom_wajib" => trim($kolomWajib),
            "kegiatan_id" => $kegiatan->id,
            "template" => trim($template)
        ]);
    }
}
