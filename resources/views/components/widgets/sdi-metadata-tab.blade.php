@props([
    'villageName' => 'Desa Sungai Bakau Kecil',
    'rtCount' => 37,
    'varRtCount' => 26,
    'varFasCount' => 15,
    'hideLansia' => false
])
<div class="card border-0 shadow-sm rounded-4 mb-5 p-4 bg-white" data-aos="fade-up" data-aos-duration="1000" data-aos-duration="850">
    <div class="d-flex justify-content-between align-items-center mb-3 flex-wrap gap-2">
        <h4 class="fw-bold text-primary mb-0"><i class="fas fa-file-contract me-2"></i>Metadata Statistik Sektoral (SDI 2026)</h4>
        <span class="badge bg-success">Satu Data Indonesia Compliant</span>
    </div>
    <ul class="nav nav-tabs border-bottom mb-4 flex-nowrap overflow-x-auto text-nowrap" id="metadataTab" role="tablist">
        <li class="nav-item"><button class="nav-link active" data-bs-toggle="tab" data-bs-target="#kegiatan" type="button">I. Metadata Kegiatan</button></li>
        <li class="nav-item"><button class="nav-link" data-bs-toggle="tab" data-bs-target="#variabel" type="button">II. Metadata Variabel</button></li>
        <li class="nav-item"><button class="nav-link" data-bs-toggle="tab" data-bs-target="#indikator" type="button">III. Metadata Indikator</button></li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane fade show active" id="kegiatan">
            <div class="table-responsive">
                <table class="table table-bordered table-striped align-middle">
                    <thead class="table-dark"><tr><th>No</th><th>Elemen Metadata</th><th>Keterangan / Nilai</th></tr></thead>
                    <tbody>
                        <tr><td>1</td><td><strong>Nama Kegiatan</strong></td><td>Pendataan Potensi Kewilayahan Rukun Tetangga (RT) dan Inventarisasi Fasilitas Umum Desa Cantik {{ $villageName }} 2026</td></tr>
                        <tr><td>2</td><td><strong>Instansi Penyelenggara</strong></td><td>Pemerintah {{ $villageName }} bekerjasama dengan BPS Kabupaten Mempawah</td></tr>
                        <tr><td>3</td><td><strong>Jenis Kegiatan</strong></td><td>Kompilasi Produk Administrasi &amp; Survei Sektoral</td></tr>
                        <tr><td>4</td><td><strong>Tujuan Kegiatan</strong></td><td>Memetakan kondisi sosial-ekonomi penduduk di tingkat RT serta kelayakan sarana prasarana desa untuk evidence-based policy.</td></tr>
                        <tr><td>5</td><td><strong>Cara Pengumpulan Data</strong></td><td>Wawancara langsung (CAPI) dengan Ketua RT dan observasi GPS sarana desa menggunakan AppSheet.</td></tr>
                        <tr><td>6</td><td><strong>Cakupan Wilayah</strong></td><td>Seluruh wilayah {{ $villageName }} mencakup {{ $rtCount }} RT.</td></tr>
                        <tr><td>7</td><td><strong>Unit Pengamatan</strong></td><td>Rukun Tetangga (RT), Bangunan Fisik Rumah, Sarana Prasarana (Fasilitas Umum)</td></tr>
                        <tr><td>8</td><td><strong>Frekuensi &amp; Waktu</strong></td><td>Tahunan (Pengumpulan Lapangan: Juni - Juli 2026)</td></tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="tab-pane fade" id="variabel">
            <!-- Sub-Tabs Switcher for Variabel RT vs Fasilitas -->
            <div class="d-flex justify-content-between align-items-center mb-3 flex-wrap gap-2">
                <ul class="nav nav-pills nav-pills-sm gap-2" id="metaVarSubTabs" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active rounded-pill px-3 py-1 fw-bold small" id="subtab-var-rt" data-bs-toggle="pill" data-bs-target="#subpane-var-rt" type="button" role="tab">
                            <i class="fas fa-users me-1 text-primary"></i> Variabel Potensi RT ({{ $varRtCount }})
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link rounded-pill px-3 py-1 fw-bold small" id="subtab-var-fas" data-bs-toggle="pill" data-bs-target="#subpane-var-fas" type="button" role="tab">
                            <i class="fas fa-building me-1 text-success"></i> Variabel Sarana Fasilitas ({{ $varFasCount }})
                        </button>
                    </li>
                </ul>
                <span class="badge bg-light text-muted border rounded-pill px-3 py-1 extra-small">
                    <i class="fas fa-info-circle me-1 text-primary"></i> Standar MS-Variabel Satu Data Indonesia
                </span>
            </div>

            <div class="tab-content" id="metaVarSubTabsContent">
                <!-- Subpane: Variabel RT (26 Variabel) -->
                <div class="tab-pane fade show active" id="subpane-var-rt" role="tabpanel">
                    <div class="table-responsive border rounded-3" style="max-height: 420px;">
                        <table class="table table-hover table-striped align-middle mb-0 small">
                            <thead class="table-dark sticky-top">
                                <tr>
                                    <th style="width: 5%;">No</th>
                                    <th style="width: 25%;">Nama Variabel</th>
                                    <th style="width: 15%;">Konsep</th>
                                    <th style="width: 40%;">Definisi Operasional (SDI)</th>
                                    <th style="width: 15%;">Satuan &amp; Tipe</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr><td class="text-center fw-bold">1</td><td><code>Nama_RT</code></td><td>Wilayah</td><td>Nama satuan rukun tetangga dan dusun tempat pengumpulan data CAPI.</td><td><span class="badge bg-secondary-subtle text-secondary">String</span></td></tr>
                                <tr><td class="text-center fw-bold">2</td><td><code>Nama_Petugas</code></td><td>Petugas</td><td>Nama agen statistik desa yang melakukan wawancara &amp; input data.</td><td><span class="badge bg-secondary-subtle text-secondary">String</span></td></tr>
                                <tr><td class="text-center fw-bold">3</td><td><code>Tanggal_Waktu</code></td><td>Waktu</td><td>Tanggal dan waktu pelaksanaan pencacahan lapangan.</td><td><span class="badge bg-info-subtle text-info">DateTime</span></td></tr>
                                <tr><td class="text-center fw-bold">4</td><td><code>Nama_Ketua_RT</code></td><td>Narasumber</td><td>Nama Ketua RT aktif yang bertindak sebagai responden utama.</td><td><span class="badge bg-secondary-subtle text-secondary">String</span></td></tr>
                                <tr><td class="text-center fw-bold">5</td><td><code>Jumlah_Penduduk_Laki_Laki</code></td><td>Demografi</td><td>Banyaknya penduduk berjenis kelamin laki-laki di wilayah RT.</td><td>Orang (<span class="badge bg-primary-subtle text-primary">Integer</span>)</td></tr>
                                <tr><td class="text-center fw-bold">6</td><td><code>Jumlah_Penduduk_Perempuan</code></td><td>Demografi</td><td>Banyaknya penduduk berjenis kelamin perempuan di wilayah RT.</td><td>Orang (<span class="badge bg-primary-subtle text-primary">Integer</span>)</td></tr>
                                <tr><td class="text-center fw-bold">7</td><td><code>Jumlah_Bumbung_Rumah</code></td><td>Fisik</td><td>Banyaknya bangunan fisik/atap tempat tinggal keluarga di wilayah RT.</td><td>Unit (<span class="badge bg-primary-subtle text-primary">Integer</span>)</td></tr>
                                <tr><td class="text-center fw-bold">8</td><td><code>Jumlah_KK</code></td><td>Keluarga</td><td>Banyaknya kepala keluarga (Kartu Keluarga) yang berdomisili di RT.</td><td>KK (<span class="badge bg-primary-subtle text-primary">Integer</span>)</td></tr>
                                <tr><td class="text-center fw-bold">9</td><td><code>Jumlah_Penduduk_Lansia</code></td><td>Kelompok Rentan</td><td>Banyaknya penduduk yang telah mencapai usia 60 tahun ke atas.</td><td>Orang (<span class="badge bg-primary-subtle text-primary">Integer</span>)</td></tr>
                                <tr><td class="text-center fw-bold">10</td><td><code>Jumlah_Kelahiran_Bayi</code></td><td>Kelahiran</td><td>Banyaknya kelahiran bayi hidup dalam periode 1 tahun terakhir di RT.</td><td>Bayi (<span class="badge bg-primary-subtle text-primary">Integer</span>)</td></tr>
                                <tr><td class="text-center fw-bold">11</td><td><code>Jumlah_Kematian</code></td><td>Kematian</td><td>Banyaknya kejadian kematian penduduk dalam periode 1 tahun terakhir.</td><td>Orang (<span class="badge bg-primary-subtle text-primary">Integer</span>)</td></tr>
                                <tr><td class="text-center fw-bold">12</td><td><code>Jumlah_Penerima_PKH</code></td><td>Bantuan Sosial</td><td>Banyaknya keluarga terdaftar penerima Program Keluarga Harapan Kemensos.</td><td>KK (<span class="badge bg-primary-subtle text-primary">Integer</span>)</td></tr>
                                <tr><td class="text-center fw-bold">13</td><td><code>Jumlah_Penerima_BPNT</code></td><td>Bantuan Sosial</td><td>Banyaknya keluarga penerima Bantuan Pangan Non-Tunai / Kartu Sembako.</td><td>KK (<span class="badge bg-primary-subtle text-primary">Integer</span>)</td></tr>
                                <tr><td class="text-center fw-bold">14</td><td><code>Jumlah_Penerima_BST</code></td><td>Bantuan Sosial</td><td>Banyaknya penerima manfaat Bantuan Sosial Tunai.</td><td>KK (<span class="badge bg-primary-subtle text-primary">Integer</span>)</td></tr>
                                <tr><td class="text-center fw-bold">15</td><td><code>Jumlah_Penerima_BLT</code></td><td>Bantuan Sosial</td><td>Banyaknya keluarga penerima Bantuan Langsung Tunai bersumber Dana Desa.</td><td>KK (<span class="badge bg-primary-subtle text-primary">Integer</span>)</td></tr>
                                <tr><td class="text-center fw-bold">16</td><td><code>Jumlah_Memiliki_KTP</code></td><td>Adminduk</td><td>Banyaknya penduduk wajib KTP (usia 17+ / sudah menikah) yang memiliki KTP-el.</td><td>Orang (<span class="badge bg-primary-subtle text-primary">Integer</span>)</td></tr>
                                <tr><td class="text-center fw-bold">17</td><td><code>Jumlah_Sekolah_TK</code></td><td>Pendidikan</td><td>Banyaknya penduduk yang sedang mengenyam jenjang TK / PAUD.</td><td>Orang (<span class="badge bg-primary-subtle text-primary">Integer</span>)</td></tr>
                                <tr><td class="text-center fw-bold">18</td><td><code>Jumlah_Sekolah_SD</code></td><td>Pendidikan</td><td>Banyaknya penduduk yang sedang mengenyam jenjang SD / MI / sederajat.</td><td>Orang (<span class="badge bg-primary-subtle text-primary">Integer</span>)</td></tr>
                                <tr><td class="text-center fw-bold">19</td><td><code>Jumlah_Sekolah_SMP</code></td><td>Pendidikan</td><td>Banyaknya penduduk yang sedang mengenyam jenjang SMP / MTs / sederajat.</td><td>Orang (<span class="badge bg-primary-subtle text-primary">Integer</span>)</td></tr>
                                <tr><td class="text-center fw-bold">20</td><td><code>Jumlah_Sekolah_SMA</code></td><td>Pendidikan</td><td>Banyaknya penduduk yang sedang mengenyam jenjang SMA / SMK / MA / sederajat.</td><td>Orang (<span class="badge bg-primary-subtle text-primary">Integer</span>)</td></tr>
                                <tr><td class="text-center fw-bold">21</td><td><code>Jumlah_Sekolah_Sarjana</code></td><td>Pendidikan</td><td>Banyaknya penduduk yang telah menyelesaikan pendidikan D1-D4 / S1 / S2 / S3.</td><td>Orang (<span class="badge bg-primary-subtle text-primary">Integer</span>)</td></tr>
                                <tr><td class="text-center fw-bold">22</td><td><code>Jumlah_Penduduk_Putus_Sekolah</code></td><td>Pendidikan</td><td>Banyaknya anak usia wajib belajar (7-18 tahun) yang tidak bersekolah/putus sekolah.</td><td>Orang (<span class="badge bg-primary-subtle text-primary">Integer</span>)</td></tr>
                                <tr><td class="text-center fw-bold">23</td><td><code>Jumlah_Anak_Usia_0_1_Tahun</code></td><td>Balita</td><td>Banyaknya bayi berusia di bawah 1 tahun (0–11 bulan).</td><td>Anak (<span class="badge bg-primary-subtle text-primary">Integer</span>)</td></tr>
                                <tr><td class="text-center fw-bold">24</td><td><code>Jumlah_Anak_Usia_2_5_Tahun</code></td><td>Balita</td><td>Banyaknya anak berusia 2 s.d. 5 tahun (usia prasekolah).</td><td>Anak (<span class="badge bg-primary-subtle text-primary">Integer</span>)</td></tr>
                                <tr><td class="text-center fw-bold">25</td><td><code>Jumlah_Pendatang</code></td><td>Migrasi</td><td>Banyaknya penduduk baru yang pindah masuk ke wilayah RT dalam 1 tahun terakhir.</td><td>Orang (<span class="badge bg-primary-subtle text-primary">Integer</span>)</td></tr>
                                <tr><td class="text-center fw-bold">26</td><td><code>Status_Pendataan</code></td><td>Metodologi</td><td>Status kelengkapan dan verifikasi kuesioner CAPI tingkat RT (Selesai/Proses).</td><td><span class="badge bg-success-subtle text-success">Kategori</span></td></tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Subpane: Variabel Fasilitas (15 Variabel) -->
                <div class="tab-pane fade" id="subpane-var-fas" role="tabpanel">
                    <div class="table-responsive border rounded-3" style="max-height: 420px;">
                        <table class="table table-hover table-striped align-middle mb-0 small">
                            <thead class="table-dark sticky-top">
                                <tr>
                                    <th style="width: 5%;">No</th>
                                    <th style="width: 25%;">Nama Variabel</th>
                                    <th style="width: 15%;">Konsep</th>
                                    <th style="width: 40%;">Definisi Operasional (SDI)</th>
                                    <th style="width: 15%;">Satuan &amp; Tipe</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr><td class="text-center fw-bold">1</td><td><code>ID_Fasilitas</code></td><td>Identitas</td><td>Kode unik alfanumerik pengenal sarana prasarana fisik desa.</td><td><span class="badge bg-secondary-subtle text-secondary">Alfanumerik</span></td></tr>
                                <tr><td class="text-center fw-bold">2</td><td><code>Nama_Petugas</code></td><td>Petugas</td><td>Nama agen statistik desa yang melakukan tagging &amp; pencatatan sarana.</td><td><span class="badge bg-secondary-subtle text-secondary">String</span></td></tr>
                                <tr><td class="text-center fw-bold">3</td><td><code>Tanggal_Waktu</code></td><td>Waktu</td><td>Waktu pengambilan data koordinat GPS dan atribut fasilitas di lapangan.</td><td><span class="badge bg-info-subtle text-info">DateTime</span></td></tr>
                                <tr><td class="text-center fw-bold">4</td><td><code>Lokasi_GPS</code></td><td>Geospasial</td><td>Titik koordinat lintang dan bujur (Latitude, Longitude WGS84) lokasi sarana.</td><td>Koordinat (<span class="badge bg-primary-subtle text-primary">Decimal</span>)</td></tr>
                                <tr><td class="text-center fw-bold">5</td><td><code>Foto_Fasilitas</code></td><td>Dokumentasi</td><td>Berkas gambar/foto fisik tampak depan sarana prasarana desa.</td><td><span class="badge bg-secondary-subtle text-secondary">URI Image</span></td></tr>
                                <tr><td class="text-center fw-bold">6</td><td><code>RT</code></td><td>Wilayah</td><td>Nama wilayah RT tempat fasilitas umum tersebut berada.</td><td><span class="badge bg-secondary-subtle text-secondary">String</span></td></tr>
                                <tr><td class="text-center fw-bold">7</td><td><code>Nama_Fasilitas</code></td><td>Identitas</td><td>Nama resmi atau sebutan umum sarana prasarana publik di desa.</td><td><span class="badge bg-secondary-subtle text-secondary">String</span></td></tr>
                                <tr><td class="text-center fw-bold">8</td><td><code>Kategori_Fasilitas</code></td><td>Klasifikasi</td><td>Pengelompokan utama sarana (Pemerintahan, Pendidikan, Kesehatan, Ibadah, Ekonomi, dll).</td><td><span class="badge bg-success-subtle text-success">Kategori</span></td></tr>
                                <tr><td class="text-center fw-bold">9</td><td><code>Sub_Kategori</code></td><td>Klasifikasi</td><td>Rincian jenis sarana (misal: SD, SMP, Masjid, Surau, Posyandu, Kantor Desa).</td><td><span class="badge bg-success-subtle text-success">Kategori</span></td></tr>
                                <tr><td class="text-center fw-bold">10</td><td><code>Kondisi_Bangunan</code></td><td>Kelayakan Fisik</td><td>Tingkat kelayakan struktur fisik gedung sarana (Baik / Rusak Sedang / Rusak Berat).</td><td><span class="badge bg-warning-subtle text-warning">Ordinal</span></td></tr>
                                <tr><td class="text-center fw-bold">11</td><td><code>Sumber_Listrik</code></td><td>Utilitas</td><td>Ketersediaan dan keandalan daya listrik pada fasilitas (PLN 24 Jam / Non-PLN).</td><td><span class="badge bg-success-subtle text-success">Kategori</span></td></tr>
                                <tr><td class="text-center fw-bold">12</td><td><code>Sumber_Air_Bersih</code></td><td>Sanitasi</td><td>Sumber pemenuhan air bersih utama (PDAM / Sumur Bor / Mata Air / Sungai).</td><td><span class="badge bg-success-subtle text-success">Kategori</span></td></tr>
                                <tr><td class="text-center fw-bold">13</td><td><code>Akses_Jalan</code></td><td>Aksesibilitas</td><td>Kondisi permukaan jalan menuju lokasi (Aspal/Beton R4, Perkerasan, Jalan Tanah).</td><td><span class="badge bg-success-subtle text-success">Kategori</span></td></tr>
                                <tr><td class="text-center fw-bold">14</td><td><code>Sinyal_Seluler</code></td><td>Konektivitas</td><td>Kekuatan sinyal telekomunikasi di titik fasilitas (Sangat Baik 4G / Cukup 3G / Lemah).</td><td><span class="badge bg-info-subtle text-info">Kategori</span></td></tr>
                                <tr><td class="text-center fw-bold">15</td><td><code>Catatan</code></td><td>Keterangan</td><td>Catatan deskriptif tambahan mengenai operasional atau fungsi spesifik sarana.</td><td><span class="badge bg-secondary-subtle text-secondary">Text</span></td></tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="indikator">
            <div class="row g-3">
                <div class="col-md-3">
                    <div class="p-3 border rounded-3 bg-light text-center h-100">
                        <h6 class="fw-bold text-secondary mb-1">Rasio Jenis Kelamin</h6>
                        <h3 class="fw-bold text-dark mb-0" id="ind-val-sexratio">-</h3>
                        <small class="text-muted">(L / P) &times; 100</small>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="p-3 border rounded-3 bg-light text-center h-100">
                        <h6 class="fw-bold text-secondary mb-1">Rata-rata ART / KK</h6>
                        <h3 class="fw-bold text-dark mb-0" id="ind-val-art">-</h3>
                        <small class="text-muted">Total Pop / Total KK</small>
                    </div>
                </div>
                @if(!$hideLansia)
                <div class="col-md-3">
                    <div class="p-3 border rounded-3 bg-light text-center h-100">
                        <h6 class="fw-bold text-secondary mb-1">Persentase Lansia</h6>
                        <h3 class="fw-bold text-dark mb-0" id="ind-val-lansia">-</h3>
                        <small class="text-muted">(Lansia / Pop) &times; 100</small>
                    </div>
                </div>
                @endif
                <div class="col-md-3">
                    <div class="p-3 border rounded-3 bg-light text-center h-100">
                        <h6 class="fw-bold text-secondary mb-1">Kepemilikan KTP-el</h6>
                        <h3 class="fw-bold text-dark mb-0" id="ind-val-ktp">-</h3>
                        <small class="text-muted">(KTP / Pop) &times; 100</small>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="p-3 border rounded-3 bg-light text-center h-100">
                        <h6 class="fw-bold text-secondary mb-1">Penerima Bansos</h6>
                        <h3 class="fw-bold text-dark mb-0" id="ind-val-bansos">-</h3>
                        <small class="text-muted">(Bansos / Pop) &times; 100</small>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="p-3 border rounded-3 bg-light text-center h-100">
                        <h6 class="fw-bold text-secondary mb-1">Anak Putus Sekolah</h6>
                        <h3 class="fw-bold text-dark mb-0" id="ind-val-putus-sekolah">-</h3>
                        <small class="text-muted">(Putus / Anak Sekolah) &times; 100</small>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="p-3 border rounded-3 bg-light text-center h-100">
                        <h6 class="fw-bold text-secondary mb-1">Kepadatan Hunian Rumah</h6>
                        <h3 class="fw-bold text-dark mb-0" id="ind-val-kepadatan">-</h3>
                        <small class="text-muted">Pop / Bumbung Rumah</small>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="p-3 border rounded-3 bg-light text-center h-100">
                        <h6 class="fw-bold text-secondary mb-1">Sarana Ibadah / 1k Jiwa</h6>
                        <h3 class="fw-bold text-dark mb-0" id="ind-val-ibadah">-</h3>
                        <small class="text-muted">(Ibadah / Pop) &times; 1000</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
