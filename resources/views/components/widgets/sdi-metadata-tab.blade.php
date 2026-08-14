@props([
    'villageName' => 'Desa Sungai Bakau Kecil',
    'rtCount' => 37,
    'varRtCount' => 26,
    'varFasCount' => 15,
    'hideLansia' => false
])
<div class="card border-0 shadow-sm rounded-4 mb-5 p-4 bg-white" data-aos="slide-up" data-aos-duration="850">
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
            <div class="row">
                <div class="col-md-6">
                    <h6 class="fw-bold mb-2"><i class="fas fa-list-ol me-2 text-primary"></i>Variabel RT (Daftar_RT) — {{ $varRtCount }} Variabel</h6>
                    <ul class="list-group list-group-flush small">
                        <li class="list-group-item">1. Nama_RT / Dusun / RW</li>
                        <li class="list-group-item">2. Nama_Ketua_RT &amp; No_HP</li>
                        <li class="list-group-item">3. Jumlah_Penduduk_Laki_Laki &amp; Perempuan</li>
                        <li class="list-group-item">4. Jumlah_KK &amp; Jumlah_Bumbung_Rumah</li>
                        <li class="list-group-item">5. Jumlah_Penduduk_Lansia &amp; Balita</li>
                        <li class="list-group-item">6. Jumlah_Memiliki_KTP &amp; Akta_Kelahiran</li>
                        <li class="list-group-item">7. Jumlah_Penerima_PKH, BPNT, BLT, BST</li>
                        <li class="list-group-item">8. Jumlah_Penduduk_Putus_Sekolah (TK, SD, SMP, SMA)</li>
                    </ul>
                </div>
                <div class="col-md-6">
                    <h6 class="fw-bold mb-2"><i class="fas fa-building me-2 text-success"></i>Variabel Fasilitas — {{ $varFasCount }} Variabel</h6>
                    <ul class="list-group list-group-flush small">
                        <li class="list-group-item">1. ID_Fasilitas &amp; Nama_Fasilitas</li>
                        <li class="list-group-item">2. Kategori_Fasilitas &amp; Sub_Kategori</li>
                        <li class="list-group-item">3. Lokasi_GPS (Latitude, Longitude)</li>
                        <li class="list-group-item">4. Alamat_Lengkap &amp; RT</li>
                        <li class="list-group-item">5. Kondisi_Bangunan (Baik / Rusak)</li>
                        <li class="list-group-item">6. Sumber_Listrik &amp; Sumber_Air_Bersih</li>
                        <li class="list-group-item">7. Foto_Fasilitas &amp; Catatan_Tambahan</li>
                    </ul>
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
