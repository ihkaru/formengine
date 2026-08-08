<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Desa Sungai Bakau Kecil - Desa Cinta Statistik 2026</title>
    <meta name="description" content="Portal Resmi Desa Cantik 2026 Desa Sungai Bakau Kecil - BPS Kabupaten Mempawah">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/PapaParse/5.4.1/papaparse.min.js"></script>

    <style>
        :root {
            --primary: #064E3B;
            --secondary: #0D9488;
            --accent: #F59E0B;
        }
        body { font-family: 'Poppins', sans-serif; background-color: #F8FAFC; color: #1E293B; }
        .navbar { background-color: var(--primary); box-shadow: 0 2px 10px rgba(0,0,0,0.15); }
        .page-header {
            background: linear-gradient(135deg, rgba(6,78,59,0.88) 0%, rgba(13,148,136,0.90) 100%),
                url("{{ asset('images/sungaibakaukecil/kantor-desa.webp') }}");
            background-size: cover; background-position: center;
            color: white; padding: 80px 0 60px;
        }
        .kpi-card {
            background: white; border-radius: 16px; padding: 24px;
            border-left: 5px solid var(--secondary);
            box-shadow: 0 4px 15px rgba(0,0,0,0.04);
            transition: transform 0.3s ease;
        }
        .kpi-card:hover { transform: translateY(-5px); }
        .kpi-icon {
            width: 50px; height: 50px; border-radius: 12px;
            background: rgba(13,148,136,0.1); color: var(--secondary);
            display: flex; align-items: center; justify-content: center; font-size: 1.4rem;
        }
        #map { height: 480px; border-radius: 16px; box-shadow: 0 8px 25px rgba(0,0,0,0.08); }
        .table-responsive { max-height: 500px; overflow-y: auto; }
        .nav-tabs .nav-link.active { color: var(--primary); font-weight: 700; border-bottom: 3px solid var(--primary); }
        .sync-wrap { background: rgba(0,0,0,0.4); border-radius: 50px; padding: 6px 16px; display: inline-flex; align-items: center; gap: 8px; }
        
        /* Modal & Image Preview Enhancements */
        .clickable-img {
            cursor: pointer;
            transition: transform 0.3s cubic-bezier(0.4, 0, 0.2, 1), filter 0.3s ease;
        }
        .clickable-img:hover {
            transform: scale(1.03);
            filter: brightness(1.05);
        }
        .img-hover-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .img-hover-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.1) !important;
        }
        .img-zoom-wrapper {
            position: relative;
            overflow: hidden;
            cursor: pointer;
        }
        .img-zoom-wrapper .zoom-overlay {
            position: absolute;
            top: 0; left: 0; right: 0; bottom: 0;
            background: rgba(6, 78, 59, 0.55);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            transition: opacity 0.3s ease;
            font-weight: 600;
            font-size: 0.85rem;
            gap: 6px;
            pointer-events: none;
        }
        .img-zoom-wrapper:hover .zoom-overlay {
            opacity: 1;
        }
    </style>
</head>

<body>
    @include('partials.navbar')

    <header class="page-header text-center">
        <div class="container">
            <div class="d-flex justify-content-center gap-2 mb-3">
                <span class="badge bg-warning text-dark px-3 py-2 rounded-pill fw-bold"><i class="fas fa-star me-1"></i> Desa Cantik 2026</span>
                <span class="badge bg-light text-dark px-3 py-2 rounded-pill fw-bold"><i class="fas fa-database me-1"></i> AppSheet Live Data</span>
            </div>
            <h1 class="fw-bold display-5 mb-2">Desa Sungai Bakau Kecil</h1>
            <p class="lead mx-auto text-white-50 mb-4" style="max-width:800px;">
                Kecamatan Mempawah Hilir, Kabupaten Mempawah — Pendataan Potensi Kewilayahan RT &amp; Inventarisasi Fasilitas Umum Berbasis Satu Data Indonesia (SDI).
            </p>
            <div class="d-flex justify-content-center align-items-center flex-wrap gap-2">
                <div class="sync-wrap text-white small fw-semibold">
                    <i class="fas fa-sync fa-spin text-success" id="sync-icon"></i>
                    <span id="sync-status">Menghubungkan ke Google Sheets...</span>
                </div>
                <button class="btn btn-sm btn-light rounded-pill px-3 fw-bold" onclick="loadDataFromSheets()">
                    <i class="fas fa-redo me-1"></i> Sync Sekarang
                </button>
                <a href="#sop-layanan" class="btn btn-sm btn-outline-light rounded-pill px-3 fw-bold">
                    <i class="fas fa-envelope me-1"></i> Permintaan Data
                </a>
                <a href="#publikasi" class="btn btn-sm btn-outline-light rounded-pill px-3 fw-bold">
                    <i class="fas fa-book me-1"></i> Bukti Dukung 2026
                </a>
            </div>
        </div>
    </header>

    <main class="container my-5">

        <!-- KPI Cards -->
        <div class="row g-4 mb-5">
            <div class="col-md-4 col-lg-2">
                <div class="kpi-card">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <small class="text-muted fw-bold text-uppercase">Total Penduduk</small>
                        <div class="kpi-icon"><i class="fas fa-users"></i></div>
                    </div>
                    <h3 class="fw-bold mb-0 text-dark" id="kpi-penduduk">-</h3>
                    <small class="text-muted">Sex Ratio: <span id="kpi-sexratio" class="fw-bold text-primary">-</span></small>
                </div>
            </div>
            <div class="col-md-4 col-lg-2">
                <div class="kpi-card">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <small class="text-muted fw-bold text-uppercase">Rumah Tangga / KK</small>
                        <div class="kpi-icon"><i class="fas fa-home"></i></div>
                    </div>
                    <h3 class="fw-bold mb-0 text-dark" id="kpi-kk">-</h3>
                    <small class="text-muted">ART Rata-rata: <span id="kpi-art" class="fw-bold text-success">-</span></small>
                </div>
            </div>
            <div class="col-md-4 col-lg-2">
                <div class="kpi-card">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <small class="text-muted fw-bold text-uppercase">Bumbung Rumah</small>
                        <div class="kpi-icon"><i class="fas fa-building"></i></div>
                    </div>
                    <h3 class="fw-bold mb-0 text-dark" id="kpi-bumbung">-</h3>
                    <small class="text-muted">Kepadatan: <span id="kpi-kepadatan" class="fw-bold text-info">-</span></small>
                </div>
            </div>
            <div class="col-md-4 col-lg-2">
                <div class="kpi-card">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <small class="text-muted fw-bold text-uppercase">Penduduk Lansia</small>
                        <div class="kpi-icon"><i class="fas fa-user-clock"></i></div>
                    </div>
                    <h3 class="fw-bold mb-0 text-dark" id="kpi-lansia">-</h3>
                    <small class="text-muted">Proporsi: <span id="kpi-pct-lansia" class="fw-bold text-warning">-</span></small>
                </div>
            </div>
            <div class="col-md-4 col-lg-2">
                <div class="kpi-card">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <small class="text-muted fw-bold text-uppercase">Penerima Bansos</small>
                        <div class="kpi-icon"><i class="fas fa-hand-holding-heart"></i></div>
                    </div>
                    <h3 class="fw-bold mb-0 text-dark" id="kpi-bansos">-</h3>
                    <small class="text-muted">PKH/BPNT/BLT</small>
                </div>
            </div>
            <div class="col-md-4 col-lg-2">
                <div class="kpi-card">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <small class="text-muted fw-bold text-uppercase">Fasilitas Umum</small>
                        <div class="kpi-icon"><i class="fas fa-map-marker-alt"></i></div>
                    </div>
                    <h3 class="fw-bold mb-0 text-dark" id="kpi-fasilitas">-</h3>
                    <small class="text-muted">Terinventarisasi</small>
                </div>
            </div>
        </div>

        <!-- Metadata SDI 2026 -->
        <div class="card border-0 shadow-sm rounded-4 mb-5 p-4 bg-white">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h4 class="fw-bold text-primary mb-0"><i class="fas fa-file-contract me-2"></i>Metadata Statistik Sektoral (SDI 2026)</h4>
                <span class="badge bg-success">Satu Data Indonesia Compliant</span>
            </div>
            <ul class="nav nav-tabs border-bottom mb-4" id="metadataTab" role="tablist">
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
                                <tr><td>1</td><td><strong>Nama Kegiatan</strong></td><td>Pendataan Potensi Kewilayahan Rukun Tetangga (RT) dan Inventarisasi Fasilitas Umum Desa Cantik Sungai Bakau Kecil 2026</td></tr>
                                <tr><td>2</td><td><strong>Instansi Penyelenggara</strong></td><td>Pemerintah Desa Sungai Bakau Kecil bekerjasama dengan BPS Kabupaten Mempawah</td></tr>
                                <tr><td>3</td><td><strong>Jenis Kegiatan</strong></td><td>Kompilasi Produk Administrasi &amp; Survei Sektoral</td></tr>
                                <tr><td>4</td><td><strong>Tujuan Kegiatan</strong></td><td>Memetakan kondisi sosial-ekonomi penduduk di tingkat RT serta kelayakan sarana prasarana desa untuk evidence-based policy.</td></tr>
                                <tr><td>5</td><td><strong>Cara Pengumpulan Data</strong></td><td>Wawancara langsung (CAPI) dengan Ketua RT dan observasi GPS sarana desa menggunakan AppSheet.</td></tr>
                                <tr><td>6</td><td><strong>Cakupan Wilayah</strong></td><td>Seluruh wilayah Desa Sungai Bakau Kecil (Kec. Mempawah Hilir, Kab. Mempawah) mencakup 37 RT.</td></tr>
                                <tr><td>7</td><td><strong>Unit Pengamatan</strong></td><td>Rukun Tetangga (RT), Bangunan Fisik Rumah, Sarana Prasarana (Fasilitas Umum)</td></tr>
                                <tr><td>8</td><td><strong>Frekuensi &amp; Waktu</strong></td><td>Tahunan (Pengumpulan Lapangan: Juni - Juli 2026)</td></tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="tab-pane fade" id="variabel">
                    <div class="row">
                        <div class="col-md-6">
                            <h6 class="fw-bold mb-2"><i class="fas fa-list-ol me-2 text-primary"></i>Variabel RT (Daftar_RT) — 26 Variabel</h6>
                            <ul class="list-group list-group-flush small">
                                <li class="list-group-item"><code>Nama_RT</code>, <code>Nama_Ketua_RT</code>, <code>Nama_Petugas</code></li>
                                <li class="list-group-item"><code>Jumlah_Penduduk_Laki_Laki</code>, <code>Jumlah_Penduduk_Perempuan</code></li>
                                <li class="list-group-item"><code>Jumlah_KK</code>, <code>Jumlah_Bumbung_Rumah</code>, <code>Jumlah_Penduduk_Lansia</code></li>
                                <li class="list-group-item"><code>Jumlah_Penerima_PKH</code>, <code>BPNT</code>, <code>BLT</code>, <code>BST</code></li>
                                <li class="list-group-item">Tingkat Pendidikan: <code>TK, SD, SMP, SMA, Sarjana, Putus Sekolah</code></li>
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <h6 class="fw-bold mb-2"><i class="fas fa-building me-2 text-success"></i>Variabel Fasilitas — 15 Variabel</h6>
                            <ul class="list-group list-group-flush small">
                                <li class="list-group-item"><code>ID_Fasilitas</code>, <code>Nama_Fasilitas</code>, <code>Lokasi_GPS</code></li>
                                <li class="list-group-item"><code>Kategori_Fasilitas</code>: Ibadah, Pendidikan, Kesehatan, Ekonomi, dll.</li>
                                <li class="list-group-item"><code>Kondisi_Bangunan</code>: Baik, Rusak Ringan, Rusak Berat</li>
                                <li class="list-group-item"><code>Sumber_Listrik</code>, <code>Sumber_Air_Bersih</code>, <code>Akses_Jalan</code>, <code>Sinyal_Seluler</code></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="indikator">
                    <div class="row g-3">
                        <!-- #1 Sex Ratio -->
                        <div class="col-md-6 col-lg-3">
                            <div class="p-3 bg-white border border-1 rounded-4 h-100 shadow-sm d-flex flex-column justify-content-between position-relative">
                                <div>
                                    <div class="d-flex justify-content-between align-items-center mb-2">
                                        <span class="badge bg-primary-subtle text-primary fw-bold text-uppercase px-2 py-1 small">#1 Demografi</span>
                                        <span class="text-muted extra-small"><i class="fas fa-venus-mars me-1"></i>SDI 2026</span>
                                    </div>
                                    <h6 class="fw-bold text-secondary mb-1">Rasio Jenis Kelamin</h6>
                                    <div class="d-flex align-items-baseline gap-1 my-2">
                                        <h3 class="fw-bold text-dark mb-0" id="ind-val-sexratio">-</h3>
                                    </div>
                                    <p class="small text-muted mb-2">Perbandingan jumlah Laki-Laki per 100 Perempuan di wilayah desa.</p>
                                </div>
                                <div class="pt-2 border-top">
                                    <span class="badge bg-light text-secondary border font-monospace fw-normal small px-2 py-1">(Σ Laki / Σ Perempuan) &times; 100</span>
                                </div>
                            </div>
                        </div>

                        <!-- #2 ART -->
                        <div class="col-md-6 col-lg-3">
                            <div class="p-3 bg-white border border-1 rounded-4 h-100 shadow-sm d-flex flex-column justify-content-between position-relative">
                                <div>
                                    <div class="d-flex justify-content-between align-items-center mb-2">
                                        <span class="badge bg-success-subtle text-success fw-bold text-uppercase px-2 py-1 small">#2 Demografi</span>
                                        <span class="text-muted extra-small"><i class="fas fa-home me-1"></i>SDI 2026</span>
                                    </div>
                                    <h6 class="fw-bold text-secondary mb-1">Rata-rata ART / KK</h6>
                                    <div class="d-flex align-items-baseline gap-1 my-2">
                                        <h3 class="fw-bold text-dark mb-0" id="ind-val-art">-</h3>
                                    </div>
                                    <p class="small text-muted mb-2">Rata-rata jumlah anggota keluarga yang mendiami 1 rumah tangga.</p>
                                </div>
                                <div class="pt-2 border-top">
                                    <span class="badge bg-light text-secondary border font-monospace fw-normal small px-2 py-1">Total Penduduk / Total KK</span>
                                </div>
                            </div>
                        </div>

                        <!-- #3 Lansia -->
                        <div class="col-md-6 col-lg-3">
                            <div class="p-3 bg-white border border-1 rounded-4 h-100 shadow-sm d-flex flex-column justify-content-between position-relative">
                                <div>
                                    <div class="d-flex justify-content-between align-items-center mb-2">
                                        <span class="badge bg-warning-subtle text-warning-emphasis fw-bold text-uppercase px-2 py-1 small">#3 Kelompok Rentan</span>
                                        <span class="text-muted extra-small"><i class="fas fa-user-clock me-1"></i>SDI 2026</span>
                                    </div>
                                    <h6 class="fw-bold text-secondary mb-1">Persentase Lansia</h6>
                                    <div class="d-flex align-items-baseline gap-1 my-2">
                                        <h3 class="fw-bold text-dark mb-0" id="ind-val-lansia">-</h3>
                                    </div>
                                    <p class="small text-muted mb-2">Proporsi jumlah penduduk berusia 60 tahun ke atas terhadap total penduduk.</p>
                                </div>
                                <div class="pt-2 border-top">
                                    <span class="badge bg-light text-secondary border font-monospace fw-normal small px-2 py-1">(Σ Lansia / Total Penduduk) &times; 100</span>
                                </div>
                            </div>
                        </div>

                        <!-- #4 KTP -->
                        <div class="col-md-6 col-lg-3">
                            <div class="p-3 bg-white border border-1 rounded-4 h-100 shadow-sm d-flex flex-column justify-content-between position-relative">
                                <div>
                                    <div class="d-flex justify-content-between align-items-center mb-2">
                                        <span class="badge bg-info-subtle text-info-emphasis fw-bold text-uppercase px-2 py-1 small">#4 Adminduk</span>
                                        <span class="text-muted extra-small"><i class="fas fa-id-card me-1"></i>SDI 2026</span>
                                    </div>
                                    <h6 class="fw-bold text-secondary mb-1">Kepemilikan KTP-el</h6>
                                    <div class="d-flex align-items-baseline gap-1 my-2">
                                        <h3 class="fw-bold text-dark mb-0" id="ind-val-ktp">-</h3>
                                    </div>
                                    <p class="small text-muted mb-2">Cakupan penduduk yang telah memiliki fisik KTP-el di wilayah desa.</p>
                                </div>
                                <div class="pt-2 border-top">
                                    <span class="badge bg-light text-secondary border font-monospace fw-normal small px-2 py-1">(Σ KTP / Total Penduduk) &times; 100</span>
                                </div>
                            </div>
                        </div>

                        <!-- #5 Bansos -->
                        <div class="col-md-6 col-lg-3">
                            <div class="p-3 bg-white border border-1 rounded-4 h-100 shadow-sm d-flex flex-column justify-content-between position-relative">
                                <div>
                                    <div class="d-flex justify-content-between align-items-center mb-2">
                                        <span class="badge bg-danger-subtle text-danger fw-bold text-uppercase px-2 py-1 small">#5 Kesejahteraan</span>
                                        <span class="text-muted extra-small"><i class="fas fa-hand-holding-heart me-1"></i>SDI 2026</span>
                                    </div>
                                    <h6 class="fw-bold text-secondary mb-1">Penerima Bantuan Sosial</h6>
                                    <div class="d-flex align-items-baseline gap-1 my-2">
                                        <h3 class="fw-bold text-dark mb-0" id="ind-val-bansos">-</h3>
                                    </div>
                                    <p class="small text-muted mb-2">Proporsi penerima bantuan sosial (PKH/BPNT/BLT/BST) terhadap total penduduk.</p>
                                </div>
                                <div class="pt-2 border-top">
                                    <span class="badge bg-light text-secondary border font-monospace fw-normal small px-2 py-1">(Σ Bansos / Total Penduduk) &times; 100</span>
                                </div>
                            </div>
                        </div>

                        <!-- #6 Putus Sekolah -->
                        <div class="col-md-6 col-lg-3">
                            <div class="p-3 bg-white border border-1 rounded-4 h-100 shadow-sm d-flex flex-column justify-content-between position-relative">
                                <div>
                                    <div class="d-flex justify-content-between align-items-center mb-2">
                                        <span class="badge bg-dark-subtle text-dark fw-bold text-uppercase px-2 py-1 small">#6 Pendidikan</span>
                                        <span class="text-muted extra-small"><i class="fas fa-user-graduate me-1"></i>SDI 2026</span>
                                    </div>
                                    <h6 class="fw-bold text-secondary mb-1">Anak Putus Sekolah</h6>
                                    <div class="d-flex align-items-baseline gap-1 my-2">
                                        <h3 class="fw-bold text-dark mb-0" id="ind-val-putus-sekolah">-</h3>
                                    </div>
                                    <p class="small text-muted mb-2">Proporsi anak usia sekolah (7-18 thn) yang tidak bersekolah lagi.</p>
                                </div>
                                <div class="pt-2 border-top">
                                    <span class="badge bg-light text-secondary border font-monospace fw-normal small px-2 py-1">(Σ Putus / Σ Anak Sekolah) &times; 100</span>
                                </div>
                            </div>
                        </div>

                        <!-- #7 Kepadatan -->
                        <div class="col-md-6 col-lg-3">
                            <div class="p-3 bg-white border border-1 rounded-4 h-100 shadow-sm d-flex flex-column justify-content-between position-relative">
                                <div>
                                    <div class="d-flex justify-content-between align-items-center mb-2">
                                        <span class="badge bg-secondary-subtle text-secondary-emphasis fw-bold text-uppercase px-2 py-1 small">#7 Infrastruktur</span>
                                        <span class="text-muted extra-small"><i class="fas fa-building me-1"></i>SDI 2026</span>
                                    </div>
                                    <h6 class="fw-bold text-secondary mb-1">Kepadatan Hunian Rumah</h6>
                                    <div class="d-flex align-items-baseline gap-1 my-2">
                                        <h3 class="fw-bold text-dark mb-0" id="ind-val-kepadatan">-</h3>
                                    </div>
                                    <p class="small text-muted mb-2">Rata-rata jumlah penduduk yang menghuni setiap atap bumbung rumah.</p>
                                </div>
                                <div class="pt-2 border-top">
                                    <span class="badge bg-light text-secondary border font-monospace fw-normal small px-2 py-1">Total Penduduk / Total Bumbung</span>
                                </div>
                            </div>
                        </div>

                        <!-- #8 Sarana Ibadah -->
                        <div class="col-md-6 col-lg-3">
                            <div class="p-3 bg-white border border-1 rounded-4 h-100 shadow-sm d-flex flex-column justify-content-between position-relative">
                                <div>
                                    <div class="d-flex justify-content-between align-items-center mb-2">
                                        <span class="badge bg-teal-subtle text-teal fw-bold text-uppercase px-2 py-1 small" style="background-color:#ccfbf1;color:#0f766e;">#8 Keagamaan</span>
                                        <span class="text-muted extra-small"><i class="fas fa-mosque me-1"></i>SDI 2026</span>
                                    </div>
                                    <h6 class="fw-bold text-secondary mb-1">Sarana Ibadah / 1k Jiwa</h6>
                                    <div class="d-flex align-items-baseline gap-1 my-2">
                                        <h3 class="fw-bold text-dark mb-0" id="ind-val-ibadah">-</h3>
                                    </div>
                                    <p class="small text-muted mb-2">Ketersediaan sarana tempat ibadah desa untuk setiap 1.000 jiwa penduduk.</p>
                                </div>
                                <div class="pt-2 border-top">
                                    <span class="badge bg-light text-secondary border font-monospace fw-normal small px-2 py-1">(Σ Ibadah / Total Penduduk) &times; 1000</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Charts -->
        <div class="row g-4 mb-5">
            <div class="col-lg-8">
                <div class="card border-0 shadow-sm rounded-4 p-4 bg-white h-100">
                    <h5 class="fw-bold text-dark mb-3"><i class="fas fa-chart-bar me-2 text-primary"></i>Jumlah Penduduk &amp; KK Per RT</h5>
                    <canvas id="chartDemografi" style="max-height:380px;"></canvas>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card border-0 shadow-sm rounded-4 p-4 bg-white h-100">
                    <h5 class="fw-bold text-dark mb-3"><i class="fas fa-chart-pie me-2 text-success"></i>Kategori Fasilitas Desa</h5>
                    <canvas id="chartFasilitas" style="max-height:350px;"></canvas>
                </div>
            </div>
        </div>

        <!-- Map -->
        <div class="card border-0 shadow-sm rounded-4 mb-5 p-4 bg-white">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h4 class="fw-bold text-primary mb-0"><i class="fas fa-map-marked-alt me-2"></i>Peta Persebaran Sarana &amp; Fasilitas Umum</h4>
                <span class="badge bg-info text-dark" id="map-count-badge">0 Fasilitas Terpetakan</span>
            </div>
            <div id="map"></div>
        </div>

        <!-- Tables -->
        <div class="card border-0 shadow-sm rounded-4 mb-5 p-4 bg-white">
            <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-2">
                <h4 class="fw-bold text-dark mb-0"><i class="fas fa-table me-2 text-primary"></i>Daftar Potensi RT &amp; Fasilitas Desa</h4>
                <button type="button" class="btn btn-sm btn-outline-success rounded-pill px-3 fw-bold shadow-sm" onclick="downloadCurrentTableCSV()">
                    <i class="fas fa-file-excel me-1"></i> Unduh Data Tabel (CSV/Excel)
                </button>
            </div>
            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                <li class="nav-item"><button class="nav-link active rounded-pill px-4" data-bs-toggle="pill" data-bs-target="#pills-rt">Daftar RT (37 Wilayah)</button></li>
                <li class="nav-item"><button class="nav-link rounded-pill px-4" data-bs-toggle="pill" data-bs-target="#pills-fas">Daftar Fasilitas (49 Unit)</button></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane fade show active" id="pills-rt">
                    <div class="d-flex justify-content-between align-items-center mb-3 flex-wrap gap-2">
                        <div class="col-md-4">
                            <input type="text" id="search-rt" class="form-control form-control-sm rounded-pill" placeholder="Cari Nama RT / Ketua RT...">
                        </div>
                        <div class="btn-group btn-group-sm rounded-pill p-1 bg-light border" role="group">
                            <button type="button" class="btn btn-primary rounded-pill px-3 fw-semibold active" id="btn-mode-variabel" onclick="switchRTTableMode('variabel')">
                                <i class="fas fa-list me-1"></i> Variabel Mentah
                            </button>
                            <button type="button" class="btn btn-outline-success rounded-pill px-3 fw-semibold" id="btn-mode-indikator" onclick="switchRTTableMode('indikator')">
                                <i class="fas fa-chart-line me-1"></i> 8 Indikator SDI Per RT
                            </button>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover align-middle small" id="table-rt">
                            <thead class="table-light user-select-none" id="table-rt-thead">
                                <tr>
                                    <th style="cursor:pointer;" onclick="sortTableRT('Nama_RT')">Nama RT <i class="fas fa-sort text-muted ms-1" id="sort-icon-Nama_RT"></i></th>
                                    <th style="cursor:pointer;" onclick="sortTableRT('Nama_Ketua_RT')">Ketua RT <i class="fas fa-sort text-muted ms-1" id="sort-icon-Nama_Ketua_RT"></i></th>
                                    <th style="cursor:pointer;" onclick="sortTableRT('Jumlah_Penduduk_Laki_Laki')">L <i class="fas fa-sort text-muted ms-1" id="sort-icon-Jumlah_Penduduk_Laki_Laki"></i></th>
                                    <th style="cursor:pointer;" onclick="sortTableRT('Jumlah_Penduduk_Perempuan')">P <i class="fas fa-sort text-muted ms-1" id="sort-icon-Jumlah_Penduduk_Perempuan"></i></th>
                                    <th style="cursor:pointer;" onclick="sortTableRT('total')">Total <i class="fas fa-sort text-muted ms-1" id="sort-icon-total"></i></th>
                                    <th style="cursor:pointer;" onclick="sortTableRT('Jumlah_KK')">KK <i class="fas fa-sort text-muted ms-1" id="sort-icon-Jumlah_KK"></i></th>
                                    <th style="cursor:pointer;" onclick="sortTableRT('Jumlah_Bumbung_Rumah')">Bumbung <i class="fas fa-sort text-muted ms-1" id="sort-icon-Jumlah_Bumbung_Rumah"></i></th>
                                    <th style="cursor:pointer;" onclick="sortTableRT('Jumlah_Penduduk_Lansia')">Lansia <i class="fas fa-sort text-muted ms-1" id="sort-icon-Jumlah_Penduduk_Lansia"></i></th>
                                    <th style="cursor:pointer;" onclick="sortTableRT('Jumlah_Memiliki_KTP')">KTP-el <i class="fas fa-sort text-muted ms-1" id="sort-icon-Jumlah_Memiliki_KTP"></i></th>
                                    <th style="cursor:pointer;" onclick="sortTableRT('Status_Pendataan')">Status <i class="fas fa-sort text-muted ms-1" id="sort-icon-Status_Pendataan"></i></th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
                <div class="tab-pane fade" id="pills-fas">
                    <div class="mb-3 col-md-4">
                        <input type="text" id="search-fas" class="form-control form-control-sm rounded-pill" placeholder="Cari Nama Fasilitas / Kategori...">
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover align-middle small" id="table-fas">
                            <thead class="table-light user-select-none">
                                <tr>
                                    <th style="cursor:pointer;" onclick="sortTableFas('ID_Fasilitas')">ID <i class="fas fa-sort text-muted ms-1" id="sort-icon-ID_Fasilitas"></i></th>
                                    <th style="cursor:pointer;" onclick="sortTableFas('Nama_Fasilitas')">Nama Fasilitas <i class="fas fa-sort text-muted ms-1" id="sort-icon-Nama_Fasilitas"></i></th>
                                    <th style="cursor:pointer;" onclick="sortTableFas('Kategori_Fasilitas')">Kategori <i class="fas fa-sort text-muted ms-1" id="sort-icon-Kategori_Fasilitas"></i></th>
                                    <th style="cursor:pointer;" onclick="sortTableFas('Sub_Kategori')">Sub-Kategori <i class="fas fa-sort text-muted ms-1" id="sort-icon-Sub_Kategori"></i></th>
                                    <th style="cursor:pointer;" onclick="sortTableFas('RT')">RT <i class="fas fa-sort text-muted ms-1" id="sort-icon-RT"></i></th>
                                    <th style="cursor:pointer;" onclick="sortTableFas('Kondisi_Bangunan')">Kondisi <i class="fas fa-sort text-muted ms-1" id="sort-icon-Kondisi_Bangunan"></i></th>
                                    <th style="cursor:pointer;" onclick="sortTableFas('Sumber_Listrik')">Listrik <i class="fas fa-sort text-muted ms-1" id="sort-icon-Sumber_Listrik"></i></th>
                                    <th style="cursor:pointer;" onclick="sortTableFas('Sumber_Air_Bersih')">Air Bersih <i class="fas fa-sort text-muted ms-1" id="sort-icon-Sumber_Air_Bersih"></i></th>
                                    <th>Rute Navigasi</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
            </div>
        <!-- Dukungan Pemkab & Pembinaan Sektoral (Bukti Dukung Evaluasi) -->
        <div class="card border-0 shadow-sm rounded-4 mb-5 p-4 bg-white" id="dukungan-pemkab">
            <div class="row align-items-center">
                <div class="col-lg-5 mb-4 mb-lg-0">
                    <div class="rounded-4 overflow-hidden shadow-sm border img-zoom-wrapper clickable-img" onclick="openImagePreviewModal('{{ asset('images/sungaibakaukecil/kantor-desa.webp') }}', 'Pemerintah Desa Sungai Bakau Kecil', 'Kantor Desa Sungai Bakau Kecil — Posko Pelayanan Data Desa Cantik 2026')">
                        <img src="{{ asset('images/sungaibakaukecil/kantor-desa.webp') }}" alt="Kantor Desa Sungai Bakau Kecil" class="img-fluid w-100" style="height: 320px; object-fit: cover;" onerror="this.onerror=null;this.src='{{ asset('images/dukungan-pemda.jpg') }}';">
                        <div class="zoom-overlay">
                            <i class="fas fa-search-plus"></i> Klik untuk Tampilan Besar
                        </div>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="d-flex align-items-center gap-2 mb-2">
                        <span class="badge bg-primary-subtle text-primary fw-bold text-uppercase px-3 py-2 rounded-pill small">Bukti Pembinaan Sektoral 2026</span>
                        <span class="badge bg-success-subtle text-success fw-bold px-3 py-2 rounded-pill small">Pemkab Mempawah x BPS</span>
                    </div>
                    <h3 class="fw-bold text-dark mb-3">Dukungan Penuh Pemerintah Kabupaten Mempawah</h3>
                    <p class="text-secondary mb-3">
                        Pemerintah Kabupaten Mempawah menegaskan komitmen penuh terhadap keberhasilan penyelenggaraan statistik sektoral dan Program Desa Cantik di Desa Sungai Bakau Kecil 2026 sebagai percontohan kebijakan berbasis data (<em>evidence-based policy</em>).
                    </p>
                    <blockquote class="blockquote border-start border-4 border-primary ps-3 bg-light p-3 rounded-3 my-3">
                        <p class="mb-2 fst-italic text-dark small">"Penguatan data hingga tingkat RT melalui Desa Cantik merupakan pondasi utama integrasi Satu Data Indonesia di Kabupaten Mempawah."</p>
                        <footer class="blockquote-footer small text-muted">Komitmen Bersama <cite title="Source Title">Pemkab Mempawah &amp; BPS Kabupaten Mempawah</cite></footer>
                    </blockquote>
                    <div class="d-flex gap-2 mt-3">
                        <a href="#" class="btn btn-sm btn-primary rounded-pill px-4">
                            <i class="fab fa-instagram me-1"></i> Lihat Dokumentasi Liputan (Link)
                        </a>
                        <a href="#publikasi" class="btn btn-sm btn-outline-secondary rounded-pill px-4">
                            <i class="fas fa-file-alt me-1"></i> Dokumen Pembinaan
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Publikasi Resmi & Booklet (Bukti Dukung Output) -->
        <div class="card border-0 shadow-sm rounded-4 mb-5 p-4 bg-white" id="publikasi">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h4 class="fw-bold text-dark mb-1"><i class="fas fa-book-open me-2 text-primary"></i>Publikasi Resmi &amp; Booklet Profil Desa 2026</h4>
                    <p class="text-muted small mb-0">Dokumen publikasi dan analisis data potensi kewilayahan hasil pendataan Desa Cantik 2026.</p>
                </div>
                <span class="badge bg-primary px-3 py-2 rounded-pill">SDI Compliant</span>
            </div>
            <div class="row g-4">
                <div class="col-md-6 col-lg-4">
                    <div class="card h-100 border rounded-4 shadow-sm p-3 text-center">
                        <div class="bg-light rounded-3 p-4 mb-3 d-flex align-items-center justify-content-center" style="height: 180px;">
                            <i class="fas fa-file-pdf text-danger display-4"></i>
                        </div>
                        <h5 class="fw-bold text-dark mb-1">Desa Sungai Bakau Kecil Dalam Angka 2026</h5>
                        <p class="text-muted small mb-3">Publikasi komprehensif data sosial, ekonomi, kependudukan, dan potensi desa.</p>
                        <div class="mt-auto d-grid gap-2">
                            <a href="#" class="btn btn-sm btn-outline-primary rounded-pill"><i class="fas fa-eye me-1"></i> Lihat Online (Drive/Link)</a>
                            <a href="#" class="btn btn-sm btn-primary rounded-pill"><i class="fas fa-download me-1"></i> Unduh PDF Publikasi</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="card h-100 border rounded-4 shadow-sm p-3 text-center">
                        <div class="bg-light rounded-3 p-4 mb-3 d-flex align-items-center justify-content-center" style="height: 180px;">
                            <i class="fas fa-atlas text-success display-4"></i>
                        </div>
                        <h5 class="fw-bold text-dark mb-1">Booklet Potensi RT &amp; Fasilitas Desa 2026</h5>
                        <p class="text-muted small mb-3">Ringkasan grafis dan peta persebaran fasilitas umum 37 RT di Sungai Bakau Kecil.</p>
                        <div class="mt-auto d-grid gap-2">
                            <a href="#" class="btn btn-sm btn-outline-primary rounded-pill"><i class="fas fa-eye me-1"></i> Lihat Online (Drive/Link)</a>
                            <a href="#" class="btn btn-sm btn-primary rounded-pill"><i class="fas fa-download me-1"></i> Unduh Booklet PDF</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="card h-100 border rounded-4 shadow-sm p-3 text-center">
                        <div class="bg-light rounded-3 p-4 mb-3 d-flex align-items-center justify-content-center" style="height: 180px;">
                            <i class="fas fa-chart-line text-warning display-4"></i>
                        </div>
                        <h5 class="fw-bold text-dark mb-1">Laporan Analisis Indikator SDI 2026</h5>
                        <p class="text-muted small mb-3">Kajian indikator rasio gender, ART, lansia, bansos, dan sarana ibadah.</p>
                        <div class="mt-auto d-grid gap-2">
                            <a href="#" class="btn btn-sm btn-outline-primary rounded-pill"><i class="fas fa-eye me-1"></i> Lihat Online (Drive/Link)</a>
                            <a href="#" class="btn btn-sm btn-primary rounded-pill"><i class="fas fa-download me-1"></i> Unduh Laporan PDF</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Produk Statistik & SOP Permintaan Data (Bukti Dukung Layanan & Standar Operasional) -->
        <div class="card border-0 shadow-sm rounded-4 mb-5 p-4 bg-white" id="sop-layanan">
            <h4 class="fw-bold text-dark mb-3"><i class="fas fa-concierge-bell me-2 text-primary"></i>Produk Statistik &amp; SOP Layanan Data Publik</h4>
            <p class="text-muted small mb-4">Layanan aksesibilitas data bagi masyarakat, akademisi, dan perangkat daerah Kabupaten Mempawah.</p>
            <div class="row g-4">
                <!-- Monografi -->
                <div class="col-lg-3 col-md-6">
                    <div class="p-3 border rounded-4 h-100 bg-light text-center d-flex flex-column img-hover-card">
                        <div class="mb-3 overflow-hidden rounded-3 border img-zoom-wrapper clickable-img" onclick="openImagePreviewModal('{{ asset('images/sungaibakaukecil/monografi.webp') }}', 'Monografi Desa Sungai Bakau Kecil 2026', 'Profil Monografi Kependudukan, Wilayah &amp; Sarana Infrastruktur Desa')" style="height: 130px;">
                            <img src="{{ asset('images/sungaibakaukecil/monografi.webp') }}" alt="Monografi Desa Sungai Bakau Kecil" class="img-fluid w-100 h-100" style="object-fit: cover;">
                            <div class="zoom-overlay">
                                <i class="fas fa-search-plus"></i> Perbesar
                            </div>
                        </div>
                        <h6 class="fw-bold text-dark mb-1">Monografi Desa 2026</h6>
                        <p class="extra-small text-muted mb-3">Gambaran umum kependudukan, batas wilayah, dan infrastruktur desa.</p>
                        <div class="mt-auto d-grid gap-2">
                            <button type="button" class="btn btn-sm btn-outline-secondary rounded-pill" onclick="openImagePreviewModal('{{ asset('images/sungaibakaukecil/monografi.webp') }}', 'Monografi Desa Sungai Bakau Kecil 2026', 'Profil Monografi Kependudukan, Wilayah &amp; Sarana Infrastruktur Desa')">
                                <i class="fas fa-eye me-1"></i> Pratinjau Foto
                            </button>
                            <a href="{{ asset('images/sungaibakaukecil/monografi.webp') }}" download="Monografi_Desa_Sungai_Bakau_Kecil_2026.webp" class="btn btn-sm btn-primary rounded-pill">
                                <i class="fas fa-download me-1"></i> Unduh Monografi
                            </a>
                        </div>
                    </div>
                </div>
                <!-- Infografis -->
                <div class="col-lg-3 col-md-6">
                    <div class="p-3 border rounded-4 h-100 bg-light text-center d-flex flex-column">
                        <div class="mb-3 text-success d-flex align-items-center justify-content-center" style="height: 130px;">
                            <i class="fas fa-chart-pie fa-3x"></i>
                        </div>
                        <h6 class="fw-bold text-dark mb-1">Infografis Demografi</h6>
                        <p class="extra-small text-muted mb-3">Visualisasi data statistik dalam bentuk poster ringkas dan komunikatif.</p>
                        <div class="mt-auto d-grid gap-2">
                            <a href="#" class="btn btn-sm btn-outline-success rounded-pill"><i class="fas fa-image me-1"></i> Lihat Infografis</a>
                        </div>
                    </div>
                </div>
                <!-- Tabel Excel Raw Data -->
                <div class="col-lg-3 col-md-6">
                    <div class="p-3 border rounded-4 h-100 bg-light text-center d-flex flex-column">
                        <div class="mb-3 text-info d-flex align-items-center justify-content-center" style="height: 130px;">
                            <i class="fas fa-file-excel fa-3x"></i>
                        </div>
                        <h6 class="fw-bold text-dark mb-1">Tabel Data Excel (SDI)</h6>
                        <p class="extra-small text-muted mb-3">Kumpulan dataset RT &amp; Fasilitas dalam format spreadsheet terbuka.</p>
                        <div class="mt-auto d-grid gap-2">
                            <a href="#" class="btn btn-sm btn-outline-info rounded-pill"><i class="fas fa-external-link-alt me-1"></i> Akses Spreadsheet</a>
                        </div>
                    </div>
                </div>
                <!-- SOP Permintaan Data -->
                <div class="col-lg-3 col-md-6">
                    <div class="p-3 border rounded-4 h-100 bg-light text-center d-flex flex-column">
                        <div class="mb-3 text-danger d-flex align-items-center justify-content-center" style="height: 130px;">
                            <i class="fas fa-clipboard-list fa-3x"></i>
                        </div>
                        <h6 class="fw-bold text-dark mb-1">SOP Permintaan Data</h6>
                        <p class="extra-small text-muted mb-3">Standar Operasional Prosedur pengajuan layanan permintaan data desa.</p>
                        <div class="mt-auto d-grid gap-2">
                            <a href="#" class="btn btn-sm btn-outline-danger rounded-pill"><i class="fas fa-download me-1"></i> Unduh SOP PDF</a>
                            <a href="#" class="btn btn-sm btn-danger rounded-pill"><i class="fas fa-paper-plane me-1"></i> Form Pengajuan Data</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Galeri Dokumentasi Kegiatan Lapangan (Bukti Proses Pembinaan & Pencacahan Agen Statistik) -->
        <div class="card border-0 shadow-sm rounded-4 mb-5 p-4 bg-white" id="dokumentasi">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <div>
                    <h4 class="fw-bold text-dark mb-1"><i class="fas fa-camera me-2 text-primary"></i>Dokumentasi Kegiatan Pendataan Lapangan</h4>
                    <p class="text-muted small mb-0">Proses kapasitas building, pelatihan CAPI, dan pendataan lapangan oleh Agen Statistik Desa Sungai Bakau Kecil.</p>
                </div>
                <span class="badge bg-success rounded-pill px-3 py-2">5 Foto Dokumentasi WebP (Klik untuk Tampilan Besar)</span>
            </div>
            <div class="row g-3">
                <div class="col-md-4 col-lg-4">
                    <div class="border rounded-4 overflow-hidden shadow-sm h-100 bg-light img-hover-card" onclick="openImagePreviewModal('{{ asset('images/sungaibakaukecil/kantor-desa.webp') }}', 'Pemerintah Desa Sungai Bakau Kecil', 'Pusat koordinasi &amp; kesiapan posko pelayanan data Desa Cantik 2026.')">
                        <div class="overflow-hidden border-bottom img-zoom-wrapper" style="height: 200px;">
                            <img src="{{ asset('images/sungaibakaukecil/kantor-desa.webp') }}" alt="Pemerintah Desa Sungai Bakau Kecil" class="img-fluid w-100 h-100" style="object-fit: cover;">
                            <div class="zoom-overlay">
                                <i class="fas fa-search-plus"></i> Klik Tampilan Besar
                            </div>
                        </div>
                        <div class="p-3">
                            <h6 class="fw-bold mb-1">Pemerintah Desa Sungai Bakau Kecil</h6>
                            <p class="extra-small text-muted mb-0">Pusat koordinasi &amp; kesiapan posko pelayanan data Desa Cantik 2026.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-lg-4">
                    <div class="border rounded-4 overflow-hidden shadow-sm h-100 bg-light img-hover-card" onclick="openImagePreviewModal('{{ asset('images/sungaibakaukecil/dokum-1.webp') }}', 'Pelatihan Agen Statistik RT', 'Pembekalan metodologi CAPI AppSheet &amp; verifikasi indikator SDI oleh BPS Mempawah.')">
                        <div class="overflow-hidden border-bottom img-zoom-wrapper" style="height: 200px;">
                            <img src="{{ asset('images/sungaibakaukecil/dokum-1.webp') }}" alt="Pembekalan & Pelatihan Agen Statistik" class="img-fluid w-100 h-100" style="object-fit: cover;">
                            <div class="zoom-overlay">
                                <i class="fas fa-search-plus"></i> Klik Tampilan Besar
                            </div>
                        </div>
                        <div class="p-3">
                            <h6 class="fw-bold mb-1">Pelatihan Agen Statistik RT</h6>
                            <p class="extra-small text-muted mb-0">Pembekalan metodologi CAPI AppSheet &amp; verifikasi indikator SDI oleh BPS Mempawah.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-lg-4">
                    <div class="border rounded-4 overflow-hidden shadow-sm h-100 bg-light img-hover-card" onclick="openImagePreviewModal('{{ asset('images/sungaibakaukecil/dokum-2.webp') }}', 'Wawancara CAPI dengan Ketua RT', 'Pengumpulan 26 variabel potensi kewilayahan RT secara komprehensif di lapangan.')">
                        <div class="overflow-hidden border-bottom img-zoom-wrapper" style="height: 200px;">
                            <img src="{{ asset('images/sungaibakaukecil/dokum-2.webp') }}" alt="Wawancara CAPI dengan Ketua RT" class="img-fluid w-100 h-100" style="object-fit: cover;">
                            <div class="zoom-overlay">
                                <i class="fas fa-search-plus"></i> Klik Tampilan Besar
                            </div>
                        </div>
                        <div class="p-3">
                            <h6 class="fw-bold mb-1">Wawancara CAPI dengan Ketua RT</h6>
                            <p class="extra-small text-muted mb-0">Pengumpulan 26 variabel potensi kewilayahan RT secara komprehensif di lapangan.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6">
                    <div class="border rounded-4 overflow-hidden shadow-sm h-100 bg-light img-hover-card" onclick="openImagePreviewModal('{{ asset('images/sungaibakaukecil/dokum-3.webp') }}', 'Tagging GPS Sarana & Fasilitas Umum', 'Inventarisasi geospasial titik koordinat tempat ibadah, sekolah, dan posyandu desa.')">
                        <div class="overflow-hidden border-bottom img-zoom-wrapper" style="height: 220px;">
                            <img src="{{ asset('images/sungaibakaukecil/dokum-3.webp') }}" alt="Tagging GPS Sarana & Fasilitas" class="img-fluid w-100 h-100" style="object-fit: cover;">
                            <div class="zoom-overlay">
                                <i class="fas fa-search-plus"></i> Klik Tampilan Besar
                            </div>
                        </div>
                        <div class="p-3">
                            <h6 class="fw-bold mb-1">Tagging GPS Sarana &amp; Fasilitas Umum</h6>
                            <p class="extra-small text-muted mb-0">Inventarisasi geospasial titik koordinat tempat ibadah, sekolah, dan posyandu desa.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6">
                    <div class="border rounded-4 overflow-hidden shadow-sm h-100 bg-light img-hover-card" onclick="openImagePreviewModal('{{ asset('images/sungaibakaukecil/dokum-4.webp') }}', 'Quality Control & Ground Check Data', 'Pemeriksaan ulang akurasi data hasil pendataan bersama aparatur desa dan BPS.')">
                        <div class="overflow-hidden border-bottom img-zoom-wrapper" style="height: 220px;">
                            <img src="{{ asset('images/sungaibakaukecil/dokum-4.webp') }}" alt="Ground Check & Quality Control Data" class="img-fluid w-100 h-100" style="object-fit: cover;">
                            <div class="zoom-overlay">
                                <i class="fas fa-search-plus"></i> Klik Tampilan Besar
                            </div>
                        </div>
                        <div class="p-3">
                            <h6 class="fw-bold mb-1">Quality Control &amp; Ground Check Data</h6>
                            <p class="extra-small text-muted mb-0">Pemeriksaan ulang akurasi data hasil pendataan bersama aparatur desa dan BPS.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </main>

    <!-- Modal Preview Foto Tampilan Besar (Lightbox) -->
    <div class="modal fade" id="imagePreviewModal" tabindex="-1" aria-labelledby="imagePreviewModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content border-0 rounded-4 shadow-lg overflow-hidden">
                <div class="modal-header bg-dark text-white border-0 py-3">
                    <h5 class="modal-title fw-bold fs-6" id="imagePreviewModalLabel">
                        <i class="fas fa-image me-2 text-primary"></i><span id="modalImageTitle">Pratinjau Foto</span>
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-0 bg-black text-center position-relative d-flex align-items-center justify-content-center" style="min-height: 350px;">
                    <img id="modalPreviewImg" src="" alt="Pratinjau Foto" class="img-fluid w-100" style="max-height: 75vh; object-fit: contain;">
                </div>
                <div class="modal-footer bg-light border-0 py-2 d-flex justify-content-between align-items-center">
                    <small class="text-muted fw-semibold" id="modalImageCaption">Desa Sungai Bakau Kecil 2026</small>
                    <a id="modalDownloadBtn" href="#" download="" class="btn btn-sm btn-primary rounded-pill px-3 fw-bold">
                        <i class="fas fa-download me-1"></i> Unduh Foto High-Res
                    </a>
                </div>
            </div>
        </div>
    </div>

    <footer class="bg-dark text-white py-4 mt-5">
        <div class="container text-center">
            <p class="mb-0 text-muted small">&copy; 2026 BPS Kabupaten Mempawah &amp; Pemerintah Desa Sungai Bakau Kecil — Portal Desa Cantik.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        function openImagePreviewModal(imageSrc, title, caption) {
            document.getElementById('modalPreviewImg').src = imageSrc;
            document.getElementById('modalImageTitle').innerText = title || 'Pratinjau Foto';
            document.getElementById('modalImageCaption').innerText = caption || 'Desa Sungai Bakau Kecil 2026';
            
            var downloadBtn = document.getElementById('modalDownloadBtn');
            downloadBtn.href = imageSrc;
            var filename = (title || 'foto_desa_sungai_bakau_kecil').toLowerCase().replace(/[^a-z0-9]/g, '_') + '.webp';
            downloadBtn.setAttribute('download', filename);

            var modal = new bootstrap.Modal(document.getElementById('imagePreviewModal'));
            modal.show();
        }
    </script>

    <script id="fallback-rt" type="application/json">[{"Nama_RT": "RT 020 RW 01 DUSUN SENGGIRING", "Nama_Petugas": "Haqqi Wirakaryadi", "Tanggal_Waktu": "5/24/2026 17:53:00", "Nama_Ketua_RT": "DG. RIVA'IE", "Jumlah_Penduduk_Laki_Laki": "82", "Jumlah_Penduduk_Perempuan": "75", "Jumlah_Bumbung_Rumah": "50", "Jumlah_KK": "53", "Jumlah_Penduduk_Lansia": "16", "Jumlah_Kelahiran_Bayi": "0", "Jumlah_Kematian": "0", "Jumlah_Penerima_PKH": "0", "Jumlah_Penerima_BPNT": "0", "Jumlah_Penerima_BST": "0", "Jumlah_Penerima_BLT": "0", "Jumlah_Memiliki_KTP": "121", "Jumlah_Sekolah_TK": "", "Jumlah_Sekolah_SD": "11", "Jumlah_Sekolah_SMP": "4", "Jumlah_Sekolah_SMA": "", "Jumlah_Sekolah_Sarjana": "0", "Jumlah_Penduduk_Putus_Sekolah": "0", "Jumlah_Anak_Usia_0_1_Tahun": "0", "Jumlah_Anak_Usia_2_5_Tahun": "3", "Jumlah_Pendatang": "0", "Status_Pendataan": "Selesai"}, {"Nama_RT": "RT 001 RW 01 DUSUN SENGGIRING", "Nama_Petugas": "Haqqi Wirakaryadi", "Tanggal_Waktu": "6/2/2026 9:30:10", "Nama_Ketua_RT": "SY. JAMALUDDIN", "Jumlah_Penduduk_Laki_Laki": "98", "Jumlah_Penduduk_Perempuan": "96", "Jumlah_Bumbung_Rumah": "40", "Jumlah_KK": "58", "Jumlah_Penduduk_Lansia": "15", "Jumlah_Kelahiran_Bayi": "0", "Jumlah_Kematian": "0", "Jumlah_Penerima_PKH": "0", "Jumlah_Penerima_BPNT": "0", "Jumlah_Penerima_BST": "0", "Jumlah_Penerima_BLT": "0", "Jumlah_Memiliki_KTP": "160", "Jumlah_Sekolah_TK": "0", "Jumlah_Sekolah_SD": "11", "Jumlah_Sekolah_SMP": "1", "Jumlah_Sekolah_SMA": "7", "Jumlah_Sekolah_Sarjana": "0", "Jumlah_Penduduk_Putus_Sekolah": "0", "Jumlah_Anak_Usia_0_1_Tahun": "0", "Jumlah_Anak_Usia_2_5_Tahun": "0", "Jumlah_Pendatang": "0", "Status_Pendataan": "Selesai"}, {"Nama_RT": "RT 002 RW 01 DUSUN SENGGIIRING", "Nama_Petugas": "Haqqi Wirakaryadi", "Tanggal_Waktu": "6/2/2026 9:31:30", "Nama_Ketua_RT": "MURSID, S.Pd", "Jumlah_Penduduk_Laki_Laki": "67", "Jumlah_Penduduk_Perempuan": "73", "Jumlah_Bumbung_Rumah": "32", "Jumlah_KK": "41", "Jumlah_Penduduk_Lansia": "17", "Jumlah_Kelahiran_Bayi": "0", "Jumlah_Kematian": "0", "Jumlah_Penerima_PKH": "3", "Jumlah_Penerima_BPNT": "0", "Jumlah_Penerima_BST": "0", "Jumlah_Penerima_BLT": "1", "Jumlah_Memiliki_KTP": "105", "Jumlah_Sekolah_TK": "6", "Jumlah_Sekolah_SD": "9", "Jumlah_Sekolah_SMP": "2", "Jumlah_Sekolah_SMA": "7", "Jumlah_Sekolah_Sarjana": "1", "Jumlah_Penduduk_Putus_Sekolah": "3", "Jumlah_Anak_Usia_0_1_Tahun": "3", "Jumlah_Anak_Usia_2_5_Tahun": "7", "Jumlah_Pendatang": "0", "Status_Pendataan": "Selesai"}, {"Nama_RT": "RT 003 RW 01 DUSUN SENGGIRING", "Nama_Petugas": "Haqqi Wirakaryadi", "Tanggal_Waktu": "6/2/2026 11:25:09", "Nama_Ketua_RT": "M. NAWI", "Jumlah_Penduduk_Laki_Laki": "59", "Jumlah_Penduduk_Perempuan": "64", "Jumlah_Bumbung_Rumah": "38", "Jumlah_KK": "37", "Jumlah_Penduduk_Lansia": "6", "Jumlah_Kelahiran_Bayi": "0", "Jumlah_Kematian": "0", "Jumlah_Penerima_PKH": "0", "Jumlah_Penerima_BPNT": "0", "Jumlah_Penerima_BST": "0", "Jumlah_Penerima_BLT": "0", "Jumlah_Memiliki_KTP": "85", "Jumlah_Sekolah_TK": "1", "Jumlah_Sekolah_SD": "22", "Jumlah_Sekolah_SMP": "5", "Jumlah_Sekolah_SMA": "10", "Jumlah_Sekolah_Sarjana": "0", "Jumlah_Penduduk_Putus_Sekolah": "0", "Jumlah_Anak_Usia_0_1_Tahun": "0", "Jumlah_Anak_Usia_2_5_Tahun": "0", "Jumlah_Pendatang": "0", "Status_Pendataan": "Selesai"}, {"Nama_RT": "RT 004 RW 02 DUSUN BENTENG RAYA", "Nama_Petugas": "Haqqi Wirakaryadi", "Tanggal_Waktu": "6/2/2026 11:26:25", "Nama_Ketua_RT": "HARFANSYAH", "Jumlah_Penduduk_Laki_Laki": "57", "Jumlah_Penduduk_Perempuan": "64", "Jumlah_Bumbung_Rumah": "32", "Jumlah_KK": "40", "Jumlah_Penduduk_Lansia": "11", "Jumlah_Kelahiran_Bayi": "3", "Jumlah_Kematian": "0", "Jumlah_Penerima_PKH": "4", "Jumlah_Penerima_BPNT": "4", "Jumlah_Penerima_BST": "0", "Jumlah_Penerima_BLT": "1", "Jumlah_Memiliki_KTP": "83", "Jumlah_Sekolah_TK": "2", "Jumlah_Sekolah_SD": "16", "Jumlah_Sekolah_SMP": "4", "Jumlah_Sekolah_SMA": "4", "Jumlah_Sekolah_Sarjana": "0", "Jumlah_Penduduk_Putus_Sekolah": "0", "Jumlah_Anak_Usia_0_1_Tahun": "3", "Jumlah_Anak_Usia_2_5_Tahun": "3", "Jumlah_Pendatang": "0", "Status_Pendataan": "Selesai"}, {"Nama_RT": "RT 031 RW 02 DUSUN BENTENG RAYA", "Nama_Petugas": "Haqqi Wirakaryadi", "Tanggal_Waktu": "6/2/2026 11:54:07", "Nama_Ketua_RT": "RUDHI KHAIRUDDIN", "Jumlah_Penduduk_Laki_Laki": "39", "Jumlah_Penduduk_Perempuan": "38", "Jumlah_Bumbung_Rumah": "38", "Jumlah_KK": "38", "Jumlah_Penduduk_Lansia": "10", "Jumlah_Kelahiran_Bayi": "0", "Jumlah_Kematian": "0", "Jumlah_Penerima_PKH": "0", "Jumlah_Penerima_BPNT": "0", "Jumlah_Penerima_BST": "0", "Jumlah_Penerima_BLT": "0", "Jumlah_Memiliki_KTP": "55", "Jumlah_Sekolah_TK": "1", "Jumlah_Sekolah_SD": "9", "Jumlah_Sekolah_SMP": "2", "Jumlah_Sekolah_SMA": "2", "Jumlah_Sekolah_Sarjana": "0", "Jumlah_Penduduk_Putus_Sekolah": "0", "Jumlah_Anak_Usia_0_1_Tahun": "1", "Jumlah_Anak_Usia_2_5_Tahun": "3", "Jumlah_Pendatang": "0", "Status_Pendataan": "Selesai"}, {"Nama_RT": "RT 005 RW 02 DUSUN BENTENG RAYA", "Nama_Petugas": "Haqqi Wirakaryadi", "Tanggal_Waktu": "6/2/2026 11:58:15", "Nama_Ketua_RT": "SATIAT", "Jumlah_Penduduk_Laki_Laki": "143", "Jumlah_Penduduk_Perempuan": "106", "Jumlah_Bumbung_Rumah": "42", "Jumlah_KK": "62", "Jumlah_Penduduk_Lansia": "9", "Jumlah_Kelahiran_Bayi": "0", "Jumlah_Kematian": "2", "Jumlah_Penerima_PKH": "4", "Jumlah_Penerima_BPNT": "2", "Jumlah_Penerima_BST": "0", "Jumlah_Penerima_BLT": "0", "Jumlah_Memiliki_KTP": "109", "Jumlah_Sekolah_TK": "0", "Jumlah_Sekolah_SD": "13", "Jumlah_Sekolah_SMP": "9", "Jumlah_Sekolah_SMA": "6", "Jumlah_Sekolah_Sarjana": "0", "Jumlah_Penduduk_Putus_Sekolah": "0", "Jumlah_Anak_Usia_0_1_Tahun": "0", "Jumlah_Anak_Usia_2_5_Tahun": "0", "Jumlah_Pendatang": "0", "Status_Pendataan": "Selesai"}, {"Nama_RT": "RT 006 RW 02 DUSUN BENTENG RAYA", "Nama_Petugas": "Haqqi Wirakaryadi", "Tanggal_Waktu": "6/8/2026 12:28:47", "Nama_Ketua_RT": "EFFENDI RAUPE", "Jumlah_Penduduk_Laki_Laki": "108", "Jumlah_Penduduk_Perempuan": "92", "Jumlah_Bumbung_Rumah": "56", "Jumlah_KK": "57", "Jumlah_Penduduk_Lansia": "14", "Jumlah_Kelahiran_Bayi": "1", "Jumlah_Kematian": "0", "Jumlah_Penerima_PKH": "2", "Jumlah_Penerima_BPNT": "0", "Jumlah_Penerima_BST": "0", "Jumlah_Penerima_BLT": "0", "Jumlah_Memiliki_KTP": "156", "Jumlah_Sekolah_TK": "3", "Jumlah_Sekolah_SD": "8", "Jumlah_Sekolah_SMP": "5", "Jumlah_Sekolah_SMA": "3", "Jumlah_Sekolah_Sarjana": "0", "Jumlah_Penduduk_Putus_Sekolah": "0", "Jumlah_Anak_Usia_0_1_Tahun": "1", "Jumlah_Anak_Usia_2_5_Tahun": "3", "Jumlah_Pendatang": "0", "Status_Pendataan": "Selesai"}, {"Nama_RT": "RT 007 RW 03 DUSUN BENTENG TIMUR", "Nama_Petugas": "Haqqi Wirakaryadi", "Tanggal_Waktu": "6/17/2026 9:53:59", "Nama_Ketua_RT": "SULAIMAN", "Jumlah_Penduduk_Laki_Laki": "76", "Jumlah_Penduduk_Perempuan": "81", "Jumlah_Bumbung_Rumah": "46", "Jumlah_KK": "50", "Jumlah_Penduduk_Lansia": "16", "Jumlah_Kelahiran_Bayi": "0", "Jumlah_Kematian": "0", "Jumlah_Penerima_PKH": "0", "Jumlah_Penerima_BPNT": "0", "Jumlah_Penerima_BST": "0", "Jumlah_Penerima_BLT": "0", "Jumlah_Memiliki_KTP": "125", "Jumlah_Sekolah_TK": "4", "Jumlah_Sekolah_SD": "9", "Jumlah_Sekolah_SMP": "6", "Jumlah_Sekolah_SMA": "6", "Jumlah_Sekolah_Sarjana": "0", "Jumlah_Penduduk_Putus_Sekolah": "2", "Jumlah_Anak_Usia_0_1_Tahun": "0", "Jumlah_Anak_Usia_2_5_Tahun": "2", "Jumlah_Pendatang": "0", "Status_Pendataan": "Selesai"}, {"Nama_RT": "RT 018 RW 03 DUSUN BENTENG TIMUR", "Nama_Petugas": "Haqqi Wirakaryadi", "Tanggal_Waktu": "6/10/2026 10:40:13", "Nama_Ketua_RT": "EFENDI", "Jumlah_Penduduk_Laki_Laki": "105", "Jumlah_Penduduk_Perempuan": "85", "Jumlah_Bumbung_Rumah": "54", "Jumlah_KK": "65", "Jumlah_Penduduk_Lansia": "10", "Jumlah_Kelahiran_Bayi": "0", "Jumlah_Kematian": "0", "Jumlah_Penerima_PKH": "0", "Jumlah_Penerima_BPNT": "0", "Jumlah_Penerima_BST": "0", "Jumlah_Penerima_BLT": "0", "Jumlah_Memiliki_KTP": "137", "Jumlah_Sekolah_TK": "2", "Jumlah_Sekolah_SD": "20", "Jumlah_Sekolah_SMP": "6", "Jumlah_Sekolah_SMA": "8", "Jumlah_Sekolah_Sarjana": "0", "Jumlah_Penduduk_Putus_Sekolah": "0", "Jumlah_Anak_Usia_0_1_Tahun": "0", "Jumlah_Anak_Usia_2_5_Tahun": "5", "Jumlah_Pendatang": "0", "Status_Pendataan": "Selesai"}, {"Nama_RT": "RT 008 RW 03 DUSUN BENTENG TIMUR", "Nama_Petugas": "Haqqi Wirakaryadi", "Tanggal_Waktu": "6/17/2026 9:56:43", "Nama_Ketua_RT": "NURHAYATI", "Jumlah_Penduduk_Laki_Laki": "52", "Jumlah_Penduduk_Perempuan": "77", "Jumlah_Bumbung_Rumah": "43", "Jumlah_KK": "50", "Jumlah_Penduduk_Lansia": "2", "Jumlah_Kelahiran_Bayi": "0", "Jumlah_Kematian": "0", "Jumlah_Penerima_PKH": "0", "Jumlah_Penerima_BPNT": "0", "Jumlah_Penerima_BST": "0", "Jumlah_Penerima_BLT": "0", "Jumlah_Memiliki_KTP": "74", "Jumlah_Sekolah_TK": "1", "Jumlah_Sekolah_SD": "20", "Jumlah_Sekolah_SMP": "10", "Jumlah_Sekolah_SMA": "5", "Jumlah_Sekolah_Sarjana": "0", "Jumlah_Penduduk_Putus_Sekolah": "0", "Jumlah_Anak_Usia_0_1_Tahun": "0", "Jumlah_Anak_Usia_2_5_Tahun": "15", "Jumlah_Pendatang": "0", "Status_Pendataan": "Selesai"}, {"Nama_RT": "RT 009 RW 03 DUSUN BENTENG TIMUR", "Nama_Petugas": "Haqqi Wirakaryadi", "Tanggal_Waktu": "6/17/2026 10:01:17", "Nama_Ketua_RT": "BURHANI", "Jumlah_Penduduk_Laki_Laki": "64", "Jumlah_Penduduk_Perempuan": "74", "Jumlah_Bumbung_Rumah": "36", "Jumlah_KK": "46", "Jumlah_Penduduk_Lansia": "9", "Jumlah_Kelahiran_Bayi": "0", "Jumlah_Kematian": "0", "Jumlah_Penerima_PKH": "0", "Jumlah_Penerima_BPNT": "0", "Jumlah_Penerima_BST": "0", "Jumlah_Penerima_BLT": "0", "Jumlah_Memiliki_KTP": "102", "Jumlah_Sekolah_TK": "1", "Jumlah_Sekolah_SD": "5", "Jumlah_Sekolah_SMP": "5", "Jumlah_Sekolah_SMA": "9", "Jumlah_Sekolah_Sarjana": "0", "Jumlah_Penduduk_Putus_Sekolah": "0", "Jumlah_Anak_Usia_0_1_Tahun": "0", "Jumlah_Anak_Usia_2_5_Tahun": "8", "Jumlah_Pendatang": "0", "Status_Pendataan": "Selesai"}, {"Nama_RT": "RT 010 RW 03 DUSUN SEPAKAT TENGAH", "Nama_Petugas": "Haqqi Wirakaryadi", "Tanggal_Waktu": "6/17/2026 10:04:15", "Nama_Ketua_RT": "HARIANTO", "Jumlah_Penduduk_Laki_Laki": "66", "Jumlah_Penduduk_Perempuan": "72", "Jumlah_Bumbung_Rumah": "27", "Jumlah_KK": "39", "Jumlah_Penduduk_Lansia": "10", "Jumlah_Kelahiran_Bayi": "0", "Jumlah_Kematian": "0", "Jumlah_Penerima_PKH": "0", "Jumlah_Penerima_BPNT": "0", "Jumlah_Penerima_BST": "0", "Jumlah_Penerima_BLT": "0", "Jumlah_Memiliki_KTP": "104", "Jumlah_Sekolah_TK": "0", "Jumlah_Sekolah_SD": "5", "Jumlah_Sekolah_SMP": "6", "Jumlah_Sekolah_SMA": "11", "Jumlah_Sekolah_Sarjana": "0", "Jumlah_Penduduk_Putus_Sekolah": "0", "Jumlah_Anak_Usia_0_1_Tahun": "0", "Jumlah_Anak_Usia_2_5_Tahun": "0", "Jumlah_Pendatang": "0", "Status_Pendataan": "Selesai"}, {"Nama_RT": "RT 011 RW 03 DUSUN SEPAKAT TENGAH", "Nama_Petugas": "Haqqi Wirakaryadi", "Tanggal_Waktu": "6/8/2026 11:13:14", "Nama_Ketua_RT": "JUNAIDI", "Jumlah_Penduduk_Laki_Laki": "54", "Jumlah_Penduduk_Perempuan": "51", "Jumlah_Bumbung_Rumah": "35", "Jumlah_KK": "32", "Jumlah_Penduduk_Lansia": "24", "Jumlah_Kelahiran_Bayi": "2", "Jumlah_Kematian": "0", "Jumlah_Penerima_PKH": "1", "Jumlah_Penerima_BPNT": "5", "Jumlah_Penerima_BST": "0", "Jumlah_Penerima_BLT": "0", "Jumlah_Memiliki_KTP": "0", "Jumlah_Sekolah_TK": "1", "Jumlah_Sekolah_SD": "4", "Jumlah_Sekolah_SMP": "6", "Jumlah_Sekolah_SMA": "2", "Jumlah_Sekolah_Sarjana": "3", "Jumlah_Penduduk_Putus_Sekolah": "0", "Jumlah_Anak_Usia_0_1_Tahun": "2", "Jumlah_Anak_Usia_2_5_Tahun": "2", "Jumlah_Pendatang": "5", "Status_Pendataan": "Selesai"}, {"Nama_RT": "RT 035 RW 04 DUSUN SEPAKAT TENGAH", "Nama_Petugas": "Sahrul Rozi", "Tanggal_Waktu": "6/20/2026 10:29:24", "Nama_Ketua_RT": "JOHAN", "Jumlah_Penduduk_Laki_Laki": "79", "Jumlah_Penduduk_Perempuan": "79", "Jumlah_Bumbung_Rumah": "39", "Jumlah_KK": "50", "Jumlah_Penduduk_Lansia": "15", "Jumlah_Kelahiran_Bayi": "2", "Jumlah_Kematian": "3", "Jumlah_Penerima_PKH": "7", "Jumlah_Penerima_BPNT": "2", "Jumlah_Penerima_BST": "0", "Jumlah_Penerima_BLT": "0", "Jumlah_Memiliki_KTP": "143", "Jumlah_Sekolah_TK": "0", "Jumlah_Sekolah_SD": "10", "Jumlah_Sekolah_SMP": "5", "Jumlah_Sekolah_SMA": "7", "Jumlah_Sekolah_Sarjana": "1", "Jumlah_Penduduk_Putus_Sekolah": "1", "Jumlah_Anak_Usia_0_1_Tahun": "2", "Jumlah_Anak_Usia_2_5_Tahun": "0", "Jumlah_Pendatang": "2", "Status_Pendataan": "Selesai"}, {"Nama_RT": "RT 012 RW 04 DUSUN SEPAKAT TENGAH", "Nama_Petugas": "Haqqi Wirakaryadi", "Tanggal_Waktu": "6/17/2026 10:28:32", "Nama_Ketua_RT": "MARINO", "Jumlah_Penduduk_Laki_Laki": "146", "Jumlah_Penduduk_Perempuan": "124", "Jumlah_Bumbung_Rumah": "54", "Jumlah_KK": "72", "Jumlah_Penduduk_Lansia": "41", "Jumlah_Kelahiran_Bayi": "0", "Jumlah_Kematian": "0", "Jumlah_Penerima_PKH": "0", "Jumlah_Penerima_BPNT": "0", "Jumlah_Penerima_BST": "0", "Jumlah_Penerima_BLT": "0", "Jumlah_Memiliki_KTP": "229", "Jumlah_Sekolah_TK": "0", "Jumlah_Sekolah_SD": "3", "Jumlah_Sekolah_SMP": "11", "Jumlah_Sekolah_SMA": "9", "Jumlah_Sekolah_Sarjana": "0", "Jumlah_Penduduk_Putus_Sekolah": "0", "Jumlah_Anak_Usia_0_1_Tahun": "0", "Jumlah_Anak_Usia_2_5_Tahun": "0", "Jumlah_Pendatang": "0", "Status_Pendataan": "Selesai"}, {"Nama_RT": "RT 013 RW 04 DUSUN SEPAKAT TENGAH", "Nama_Petugas": "Haqqi Wirakaryadi", "Tanggal_Waktu": "6/8/2026 11:22:06", "Nama_Ketua_RT": "KHOLIS", "Jumlah_Penduduk_Laki_Laki": "70", "Jumlah_Penduduk_Perempuan": "62", "Jumlah_Bumbung_Rumah": "32", "Jumlah_KK": "37", "Jumlah_Penduduk_Lansia": "6", "Jumlah_Kelahiran_Bayi": "1", "Jumlah_Kematian": "0", "Jumlah_Penerima_PKH": "7", "Jumlah_Penerima_BPNT": "5", "Jumlah_Penerima_BST": "0", "Jumlah_Penerima_BLT": "0", "Jumlah_Memiliki_KTP": "84", "Jumlah_Sekolah_TK": "2", "Jumlah_Sekolah_SD": "11", "Jumlah_Sekolah_SMP": "8", "Jumlah_Sekolah_SMA": "5", "Jumlah_Sekolah_Sarjana": "3", "Jumlah_Penduduk_Putus_Sekolah": "5", "Jumlah_Anak_Usia_0_1_Tahun": "2", "Jumlah_Anak_Usia_2_5_Tahun": "6", "Jumlah_Pendatang": "0", "Status_Pendataan": "Selesai"}, {"Nama_RT": "RT 014 RW 04 DUSUN SEPAKAT TENGAH", "Nama_Petugas": "Haqqi Wirakaryadi", "Tanggal_Waktu": "6/8/2026 11:15:51", "Nama_Ketua_RT": "MARTILAM", "Jumlah_Penduduk_Laki_Laki": "71", "Jumlah_Penduduk_Perempuan": "83", "Jumlah_Bumbung_Rumah": "35", "Jumlah_KK": "37", "Jumlah_Penduduk_Lansia": "16", "Jumlah_Kelahiran_Bayi": "0", "Jumlah_Kematian": "0", "Jumlah_Penerima_PKH": "4", "Jumlah_Penerima_BPNT": "10", "Jumlah_Penerima_BST": "0", "Jumlah_Penerima_BLT": "0", "Jumlah_Memiliki_KTP": "84", "Jumlah_Sekolah_TK": "2", "Jumlah_Sekolah_SD": "15", "Jumlah_Sekolah_SMP": "5", "Jumlah_Sekolah_SMA": "3", "Jumlah_Sekolah_Sarjana": "0", "Jumlah_Penduduk_Putus_Sekolah": "1", "Jumlah_Anak_Usia_0_1_Tahun": "1", "Jumlah_Anak_Usia_2_5_Tahun": "12", "Jumlah_Pendatang": "0", "Status_Pendataan": "Selesai"}, {"Nama_RT": "RT 033 RW 04 DUSUN SEPAKAT TENGAH", "Nama_Petugas": "Sahrul Rozi", "Tanggal_Waktu": "6/25/2026 10:26:39", "Nama_Ketua_RT": "FIRDAUS", "Jumlah_Penduduk_Laki_Laki": "95", "Jumlah_Penduduk_Perempuan": "100", "Jumlah_Bumbung_Rumah": "45", "Jumlah_KK": "50", "Jumlah_Penduduk_Lansia": "14", "Jumlah_Kelahiran_Bayi": "2", "Jumlah_Kematian": "2", "Jumlah_Penerima_PKH": "12", "Jumlah_Penerima_BPNT": "4", "Jumlah_Penerima_BST": "0", "Jumlah_Penerima_BLT": "1", "Jumlah_Memiliki_KTP": "105", "Jumlah_Sekolah_TK": "0", "Jumlah_Sekolah_SD": "28", "Jumlah_Sekolah_SMP": "10", "Jumlah_Sekolah_SMA": "5", "Jumlah_Sekolah_Sarjana": "1", "Jumlah_Penduduk_Putus_Sekolah": "0", "Jumlah_Anak_Usia_0_1_Tahun": "2", "Jumlah_Anak_Usia_2_5_Tahun": "24", "Jumlah_Pendatang": "0", "Status_Pendataan": "Selesai"}, {"Nama_RT": "RT 019 RW 04 DUSUN SEPAKAT TENGAH", "Nama_Petugas": "Haqqi Wirakaryadi", "Tanggal_Waktu": "6/17/2026 10:25:50", "Nama_Ketua_RT": "MARJUKI", "Jumlah_Penduduk_Laki_Laki": "79", "Jumlah_Penduduk_Perempuan": "60", "Jumlah_Bumbung_Rumah": "26", "Jumlah_KK": "37", "Jumlah_Penduduk_Lansia": "8", "Jumlah_Kelahiran_Bayi": "0", "Jumlah_Kematian": "0", "Jumlah_Penerima_PKH": "0", "Jumlah_Penerima_BPNT": "0", "Jumlah_Penerima_BST": "0", "Jumlah_Penerima_BLT": "0", "Jumlah_Memiliki_KTP": "102", "Jumlah_Sekolah_TK": "0", "Jumlah_Sekolah_SD": "6", "Jumlah_Sekolah_SMP": "6", "Jumlah_Sekolah_SMA": "10", "Jumlah_Sekolah_Sarjana": "0", "Jumlah_Penduduk_Putus_Sekolah": "0", "Jumlah_Anak_Usia_0_1_Tahun": "0", "Jumlah_Anak_Usia_2_5_Tahun": "0", "Jumlah_Pendatang": "0", "Status_Pendataan": "Selesai"}, {"Nama_RT": "RT 015 RW 05 DUSUN SEPAKAT DARAT", "Nama_Petugas": "Sahrul Rozi", "Tanggal_Waktu": "6/2/2026 12:09:45", "Nama_Ketua_RT": "MAHRUJI", "Jumlah_Penduduk_Laki_Laki": "82", "Jumlah_Penduduk_Perempuan": "76", "Jumlah_Bumbung_Rumah": "38", "Jumlah_KK": "41", "Jumlah_Penduduk_Lansia": "11", "Jumlah_Kelahiran_Bayi": "0", "Jumlah_Kematian": "1", "Jumlah_Penerima_PKH": "8", "Jumlah_Penerima_BPNT": "14", "Jumlah_Penerima_BST": "0", "Jumlah_Penerima_BLT": "1", "Jumlah_Memiliki_KTP": "109", "Jumlah_Sekolah_TK": "0", "Jumlah_Sekolah_SD": "23", "Jumlah_Sekolah_SMP": "11", "Jumlah_Sekolah_SMA": "5", "Jumlah_Sekolah_Sarjana": "2", "Jumlah_Penduduk_Putus_Sekolah": "5", "Jumlah_Anak_Usia_0_1_Tahun": "2", "Jumlah_Anak_Usia_2_5_Tahun": "8", "Jumlah_Pendatang": "0", "Status_Pendataan": "Selesai"}, {"Nama_RT": "RT 034 RW 05 DUSUN SEPAKAT DARAT", "Nama_Petugas": "Sahrul Rozi", "Tanggal_Waktu": "6/2/2026 12:22:10", "Nama_Ketua_RT": "SADRA'I", "Jumlah_Penduduk_Laki_Laki": "86", "Jumlah_Penduduk_Perempuan": "115", "Jumlah_Bumbung_Rumah": "41", "Jumlah_KK": "45", "Jumlah_Penduduk_Lansia": "9", "Jumlah_Kelahiran_Bayi": "4", "Jumlah_Kematian": "0", "Jumlah_Penerima_PKH": "5", "Jumlah_Penerima_BPNT": "8", "Jumlah_Penerima_BST": "0", "Jumlah_Penerima_BLT": "1", "Jumlah_Memiliki_KTP": "87", "Jumlah_Sekolah_TK": "3", "Jumlah_Sekolah_SD": "16", "Jumlah_Sekolah_SMP": "3", "Jumlah_Sekolah_SMA": "4", "Jumlah_Sekolah_Sarjana": "1", "Jumlah_Penduduk_Putus_Sekolah": "0", "Jumlah_Anak_Usia_0_1_Tahun": "0", "Jumlah_Anak_Usia_2_5_Tahun": "0", "Jumlah_Pendatang": "2", "Status_Pendataan": "Selesai"}, {"Nama_RT": "RT 016 RW 05 DUSUN SEPAKAT DARAT", "Nama_Petugas": "Sahrul Rozi", "Tanggal_Waktu": "6/2/2026 12:15:03", "Nama_Ketua_RT": "SIRI", "Jumlah_Penduduk_Laki_Laki": "92", "Jumlah_Penduduk_Perempuan": "105", "Jumlah_Bumbung_Rumah": "41", "Jumlah_KK": "47", "Jumlah_Penduduk_Lansia": "14", "Jumlah_Kelahiran_Bayi": "1", "Jumlah_Kematian": "0", "Jumlah_Penerima_PKH": "3", "Jumlah_Penerima_BPNT": "0", "Jumlah_Penerima_BST": "0", "Jumlah_Penerima_BLT": "1", "Jumlah_Memiliki_KTP": "152", "Jumlah_Sekolah_TK": "2", "Jumlah_Sekolah_SD": "20", "Jumlah_Sekolah_SMP": "7", "Jumlah_Sekolah_SMA": "3", "Jumlah_Sekolah_Sarjana": "0", "Jumlah_Penduduk_Putus_Sekolah": "6", "Jumlah_Anak_Usia_0_1_Tahun": "5", "Jumlah_Anak_Usia_2_5_Tahun": "20", "Jumlah_Pendatang": "2", "Status_Pendataan": "Selesai"}, {"Nama_RT": "RT 017 RW 05 DUSUN SEPAKAT DARAT", "Nama_Petugas": "Haqqi Wirakaryadi", "Tanggal_Waktu": "6/17/2026 10:24:11", "Nama_Ketua_RT": "SAFURI", "Jumlah_Penduduk_Laki_Laki": "95", "Jumlah_Penduduk_Perempuan": "90", "Jumlah_Bumbung_Rumah": "34", "Jumlah_KK": "50", "Jumlah_Penduduk_Lansia": "10", "Jumlah_Kelahiran_Bayi": "0", "Jumlah_Kematian": "0", "Jumlah_Penerima_PKH": "0", "Jumlah_Penerima_BPNT": "0", "Jumlah_Penerima_BST": "0", "Jumlah_Penerima_BLT": "0", "Jumlah_Memiliki_KTP": "146", "Jumlah_Sekolah_TK": "5", "Jumlah_Sekolah_SD": "11", "Jumlah_Sekolah_SMP": "15", "Jumlah_Sekolah_SMA": "4", "Jumlah_Sekolah_Sarjana": "2", "Jumlah_Penduduk_Putus_Sekolah": "2", "Jumlah_Anak_Usia_0_1_Tahun": "0", "Jumlah_Anak_Usia_2_5_Tahun": "0", "Jumlah_Pendatang": "0", "Status_Pendataan": "Selesai"}, {"Nama_RT": "RT 030 RW 05 DUSUN SEPAKAT DARAT", "Nama_Petugas": "Haqqi Wirakaryadi", "Tanggal_Waktu": "6/17/2026 10:24:48", "Nama_Ketua_RT": "MARSALIM", "Jumlah_Penduduk_Laki_Laki": "54", "Jumlah_Penduduk_Perempuan": "38", "Jumlah_Bumbung_Rumah": "0", "Jumlah_KK": "33", "Jumlah_Penduduk_Lansia": "14", "Jumlah_Kelahiran_Bayi": "0", "Jumlah_Kematian": "0", "Jumlah_Penerima_PKH": "0", "Jumlah_Penerima_BPNT": "0", "Jumlah_Penerima_BST": "0", "Jumlah_Penerima_BLT": "0", "Jumlah_Memiliki_KTP": "78", "Jumlah_Sekolah_TK": "2", "Jumlah_Sekolah_SD": "2", "Jumlah_Sekolah_SMP": "3", "Jumlah_Sekolah_SMA": "1", "Jumlah_Sekolah_Sarjana": "0", "Jumlah_Penduduk_Putus_Sekolah": "0", "Jumlah_Anak_Usia_0_1_Tahun": "0", "Jumlah_Anak_Usia_2_5_Tahun": "2", "Jumlah_Pendatang": "0", "Status_Pendataan": "Selesai"}, {"Nama_RT": "RT 021 RW 06 DUSUN KEDAUNG", "Nama_Petugas": "Haqqi Wirakaryadi", "Tanggal_Waktu": "6/15/2026 10:36:02", "Nama_Ketua_RT": "PULIAN", "Jumlah_Penduduk_Laki_Laki": "66", "Jumlah_Penduduk_Perempuan": "66", "Jumlah_Bumbung_Rumah": "0", "Jumlah_KK": "37", "Jumlah_Penduduk_Lansia": "15", "Jumlah_Kelahiran_Bayi": "0", "Jumlah_Kematian": "0", "Jumlah_Penerima_PKH": "2", "Jumlah_Penerima_BPNT": "0", "Jumlah_Penerima_BST": "0", "Jumlah_Penerima_BLT": "0", "Jumlah_Memiliki_KTP": "95", "Jumlah_Sekolah_TK": "0", "Jumlah_Sekolah_SD": "18", "Jumlah_Sekolah_SMP": "11", "Jumlah_Sekolah_SMA": "8", "Jumlah_Sekolah_Sarjana": "0", "Jumlah_Penduduk_Putus_Sekolah": "0", "Jumlah_Anak_Usia_0_1_Tahun": "0", "Jumlah_Anak_Usia_2_5_Tahun": "8", "Jumlah_Pendatang": "0", "Status_Pendataan": "Selesai"}, {"Nama_RT": "RT 022 RW 06 DUSUN KEDAUNG", "Nama_Petugas": "Haqqi Wirakaryadi", "Tanggal_Waktu": "6/15/2026 10:44:13", "Nama_Ketua_RT": "MARSULI", "Jumlah_Penduduk_Laki_Laki": "44", "Jumlah_Penduduk_Perempuan": "36", "Jumlah_Bumbung_Rumah": "0", "Jumlah_KK": "23", "Jumlah_Penduduk_Lansia": "5", "Jumlah_Kelahiran_Bayi": "0", "Jumlah_Kematian": "0", "Jumlah_Penerima_PKH": "0", "Jumlah_Penerima_BPNT": "0", "Jumlah_Penerima_BST": "0", "Jumlah_Penerima_BLT": "0", "Jumlah_Memiliki_KTP": "58", "Jumlah_Sekolah_TK": "2", "Jumlah_Sekolah_SD": "8", "Jumlah_Sekolah_SMP": "6", "Jumlah_Sekolah_SMA": "3", "Jumlah_Sekolah_Sarjana": "0", "Jumlah_Penduduk_Putus_Sekolah": "0", "Jumlah_Anak_Usia_0_1_Tahun": "0", "Jumlah_Anak_Usia_2_5_Tahun": "8", "Jumlah_Pendatang": "0", "Status_Pendataan": "Selesai"}, {"Nama_RT": "RT 023 RW 06 DUSUN KEDAUNG", "Nama_Petugas": "Haqqi Wirakaryadi", "Tanggal_Waktu": "6/2/2026 9:50:30", "Nama_Ketua_RT": "SYAHRUDDIN", "Jumlah_Penduduk_Laki_Laki": "111", "Jumlah_Penduduk_Perempuan": "95", "Jumlah_Bumbung_Rumah": "41", "Jumlah_KK": "56", "Jumlah_Penduduk_Lansia": "0", "Jumlah_Kelahiran_Bayi": "0", "Jumlah_Kematian": "0", "Jumlah_Penerima_PKH": "0", "Jumlah_Penerima_BPNT": "0", "Jumlah_Penerima_BST": "0", "Jumlah_Penerima_BLT": "0", "Jumlah_Memiliki_KTP": "128", "Jumlah_Sekolah_TK": "37", "Jumlah_Sekolah_SD": "12", "Jumlah_Sekolah_SMP": "11", "Jumlah_Sekolah_SMA": "12", "Jumlah_Sekolah_Sarjana": "0", "Jumlah_Penduduk_Putus_Sekolah": "0", "Jumlah_Anak_Usia_0_1_Tahun": "0", "Jumlah_Anak_Usia_2_5_Tahun": "0", "Jumlah_Pendatang": "0", "Status_Pendataan": "Selesai"}, {"Nama_RT": "RT 024 RW 07 DUSUN SENAMBANG", "Nama_Petugas": "Haqqi Wirakaryadi", "Tanggal_Waktu": "6/17/2026 9:46:30", "Nama_Ketua_RT": "MAT RAIS", "Jumlah_Penduduk_Laki_Laki": "57", "Jumlah_Penduduk_Perempuan": "51", "Jumlah_Bumbung_Rumah": "28", "Jumlah_KK": "34", "Jumlah_Penduduk_Lansia": "2", "Jumlah_Kelahiran_Bayi": "0", "Jumlah_Kematian": "0", "Jumlah_Penerima_PKH": "0", "Jumlah_Penerima_BPNT": "0", "Jumlah_Penerima_BST": "0", "Jumlah_Penerima_BLT": "0", "Jumlah_Memiliki_KTP": "98", "Jumlah_Sekolah_TK": "0", "Jumlah_Sekolah_SD": "5", "Jumlah_Sekolah_SMP": "8", "Jumlah_Sekolah_SMA": "2", "Jumlah_Sekolah_Sarjana": "0", "Jumlah_Penduduk_Putus_Sekolah": "0", "Jumlah_Anak_Usia_0_1_Tahun": "0", "Jumlah_Anak_Usia_2_5_Tahun": "0", "Jumlah_Pendatang": "0", "Status_Pendataan": "Selesai"}, {"Nama_RT": "RT 025 RW 07 DUSUN SENAMBANG", "Nama_Petugas": "Haqqi Wirakaryadi", "Tanggal_Waktu": "6/17/2026 9:48:02", "Nama_Ketua_RT": "HASANUDIN", "Jumlah_Penduduk_Laki_Laki": "71", "Jumlah_Penduduk_Perempuan": "67", "Jumlah_Bumbung_Rumah": "31", "Jumlah_KK": "33", "Jumlah_Penduduk_Lansia": "12", "Jumlah_Kelahiran_Bayi": "0", "Jumlah_Kematian": "0", "Jumlah_Penerima_PKH": "0", "Jumlah_Penerima_BPNT": "0", "Jumlah_Penerima_BST": "0", "Jumlah_Penerima_BLT": "0", "Jumlah_Memiliki_KTP": "111", "Jumlah_Sekolah_TK": "7", "Jumlah_Sekolah_SD": "14", "Jumlah_Sekolah_SMP": "8", "Jumlah_Sekolah_SMA": "5", "Jumlah_Sekolah_Sarjana": "0", "Jumlah_Penduduk_Putus_Sekolah": "0", "Jumlah_Anak_Usia_0_1_Tahun": "0", "Jumlah_Anak_Usia_2_5_Tahun": "0", "Jumlah_Pendatang": "0", "Status_Pendataan": "Selesai"}, {"Nama_RT": "RT 026 RW 07 DUSUN SENAMBANG", "Nama_Petugas": "Haqqi Wirakaryadi", "Tanggal_Waktu": "6/17/2026 9:48:54", "Nama_Ketua_RT": "SAHRUJI", "Jumlah_Penduduk_Laki_Laki": "101", "Jumlah_Penduduk_Perempuan": "111", "Jumlah_Bumbung_Rumah": "41", "Jumlah_KK": "47", "Jumlah_Penduduk_Lansia": "21", "Jumlah_Kelahiran_Bayi": "0", "Jumlah_Kematian": "0", "Jumlah_Penerima_PKH": "0", "Jumlah_Penerima_BPNT": "0", "Jumlah_Penerima_BST": "0", "Jumlah_Penerima_BLT": "0", "Jumlah_Memiliki_KTP": "172", "Jumlah_Sekolah_TK": "0", "Jumlah_Sekolah_SD": "10", "Jumlah_Sekolah_SMP": "11", "Jumlah_Sekolah_SMA": "15", "Jumlah_Sekolah_Sarjana": "0", "Jumlah_Penduduk_Putus_Sekolah": "0", "Jumlah_Anak_Usia_0_1_Tahun": "0", "Jumlah_Anak_Usia_2_5_Tahun": "0", "Jumlah_Pendatang": "0", "Status_Pendataan": "Selesai"}, {"Nama_RT": "RT 032 RW 07 DUSUN SENAMBANG", "Nama_Petugas": "Haqqi Wirakaryadi", "Tanggal_Waktu": "6/17/2026 9:49:39", "Nama_Ketua_RT": "M. ALI", "Jumlah_Penduduk_Laki_Laki": "71", "Jumlah_Penduduk_Perempuan": "68", "Jumlah_Bumbung_Rumah": "30", "Jumlah_KK": "33", "Jumlah_Penduduk_Lansia": "18", "Jumlah_Kelahiran_Bayi": "0", "Jumlah_Kematian": "0", "Jumlah_Penerima_PKH": "0", "Jumlah_Penerima_BPNT": "0", "Jumlah_Penerima_BST": "0", "Jumlah_Penerima_BLT": "0", "Jumlah_Memiliki_KTP": "115", "Jumlah_Sekolah_TK": "0", "Jumlah_Sekolah_SD": "7", "Jumlah_Sekolah_SMP": "12", "Jumlah_Sekolah_SMA": "4", "Jumlah_Sekolah_Sarjana": "0", "Jumlah_Penduduk_Putus_Sekolah": "0", "Jumlah_Anak_Usia_0_1_Tahun": "0", "Jumlah_Anak_Usia_2_5_Tahun": "0", "Jumlah_Pendatang": "0", "Status_Pendataan": "Selesai"}, {"Nama_RT": "RT 027 RW 08 DUSUN KONSASI", "Nama_Petugas": "Haqqi Wirakaryadi", "Tanggal_Waktu": "6/2/2026 10:04:54", "Nama_Ketua_RT": "MARSYAD", "Jumlah_Penduduk_Laki_Laki": "65", "Jumlah_Penduduk_Perempuan": "54", "Jumlah_Bumbung_Rumah": "27", "Jumlah_KK": "36", "Jumlah_Penduduk_Lansia": "10", "Jumlah_Kelahiran_Bayi": "2", "Jumlah_Kematian": "0", "Jumlah_Penerima_PKH": "4", "Jumlah_Penerima_BPNT": "0", "Jumlah_Penerima_BST": "1", "Jumlah_Penerima_BLT": "0", "Jumlah_Memiliki_KTP": "80", "Jumlah_Sekolah_TK": "2", "Jumlah_Sekolah_SD": "14", "Jumlah_Sekolah_SMP": "3", "Jumlah_Sekolah_SMA": "7", "Jumlah_Sekolah_Sarjana": "0", "Jumlah_Penduduk_Putus_Sekolah": "0", "Jumlah_Anak_Usia_0_1_Tahun": "2", "Jumlah_Anak_Usia_2_5_Tahun": "7", "Jumlah_Pendatang": "0", "Status_Pendataan": "Selesai"}, {"Nama_RT": "RT 028 RW 08 DUSUN KONSASI", "Nama_Petugas": "Haqqi Wirakaryadi", "Tanggal_Waktu": "6/17/2026 9:50:33", "Nama_Ketua_RT": "SARUKI", "Jumlah_Penduduk_Laki_Laki": "86", "Jumlah_Penduduk_Perempuan": "70", "Jumlah_Bumbung_Rumah": "36", "Jumlah_KK": "35", "Jumlah_Penduduk_Lansia": "15", "Jumlah_Kelahiran_Bayi": "0", "Jumlah_Kematian": "0", "Jumlah_Penerima_PKH": "0", "Jumlah_Penerima_BPNT": "0", "Jumlah_Penerima_BST": "0", "Jumlah_Penerima_BLT": "0", "Jumlah_Memiliki_KTP": "117", "Jumlah_Sekolah_TK": "0", "Jumlah_Sekolah_SD": "20", "Jumlah_Sekolah_SMP": "16", "Jumlah_Sekolah_SMA": "7", "Jumlah_Sekolah_Sarjana": "0", "Jumlah_Penduduk_Putus_Sekolah": "0", "Jumlah_Anak_Usia_0_1_Tahun": "0", "Jumlah_Anak_Usia_2_5_Tahun": "0", "Jumlah_Pendatang": "0", "Status_Pendataan": "Selesai"}, {"Nama_RT": "RT 029 RW 08 DUSUN KONSASI", "Nama_Petugas": "Haqqi Wirakaryadi", "Tanggal_Waktu": "6/11/2026 10:17:12", "Nama_Ketua_RT": "MARSYAD", "Jumlah_Penduduk_Laki_Laki": "56", "Jumlah_Penduduk_Perempuan": "52", "Jumlah_Bumbung_Rumah": "108", "Jumlah_KK": "34", "Jumlah_Penduduk_Lansia": "13", "Jumlah_Kelahiran_Bayi": "0", "Jumlah_Kematian": "0", "Jumlah_Penerima_PKH": "4", "Jumlah_Penerima_BPNT": "8", "Jumlah_Penerima_BST": "7", "Jumlah_Penerima_BLT": "1", "Jumlah_Memiliki_KTP": "59", "Jumlah_Sekolah_TK": "2", "Jumlah_Sekolah_SD": "6", "Jumlah_Sekolah_SMP": "2", "Jumlah_Sekolah_SMA": "1", "Jumlah_Sekolah_Sarjana": "0", "Jumlah_Penduduk_Putus_Sekolah": "7", "Jumlah_Anak_Usia_0_1_Tahun": "0", "Jumlah_Anak_Usia_2_5_Tahun": "8", "Jumlah_Pendatang": "0", "Status_Pendataan": "Selesai"}, {"Nama_RT": "RT 036 RW 03 DUSUN BENTENG TIMUR", "Nama_Petugas": "Haqqi Wirakaryadi", "Tanggal_Waktu": "6/10/2026 10:42:42", "Nama_Ketua_RT": "JULIADI", "Jumlah_Penduduk_Laki_Laki": "115", "Jumlah_Penduduk_Perempuan": "98", "Jumlah_Bumbung_Rumah": "36", "Jumlah_KK": "63", "Jumlah_Penduduk_Lansia": "7", "Jumlah_Kelahiran_Bayi": "0", "Jumlah_Kematian": "0", "Jumlah_Penerima_PKH": "0", "Jumlah_Penerima_BPNT": "0", "Jumlah_Penerima_BST": "0", "Jumlah_Penerima_BLT": "0", "Jumlah_Memiliki_KTP": "137", "Jumlah_Sekolah_TK": "5", "Jumlah_Sekolah_SD": "19", "Jumlah_Sekolah_SMP": "13", "Jumlah_Sekolah_SMA": "9", "Jumlah_Sekolah_Sarjana": "2", "Jumlah_Penduduk_Putus_Sekolah": "0", "Jumlah_Anak_Usia_0_1_Tahun": "0", "Jumlah_Anak_Usia_2_5_Tahun": "19", "Jumlah_Pendatang": "0", "Status_Pendataan": "Selesai"}, {"Nama_RT": "RT 037 RW 05 DUSUN SEPAKAT DARAT", "Nama_Petugas": "Haqqi Wirakaryadi", "Tanggal_Waktu": "6/17/2026 10:23:00", "Nama_Ketua_RT": "MUNAKI", "Jumlah_Penduduk_Laki_Laki": "40", "Jumlah_Penduduk_Perempuan": "51", "Jumlah_Bumbung_Rumah": "39", "Jumlah_KK": "63", "Jumlah_Penduduk_Lansia": "19", "Jumlah_Kelahiran_Bayi": "0", "Jumlah_Kematian": "0", "Jumlah_Penerima_PKH": "0", "Jumlah_Penerima_BPNT": "0", "Jumlah_Penerima_BST": "0", "Jumlah_Penerima_BLT": "0", "Jumlah_Memiliki_KTP": "116", "Jumlah_Sekolah_TK": "0", "Jumlah_Sekolah_SD": "20", "Jumlah_Sekolah_SMP": "3", "Jumlah_Sekolah_SMA": "6", "Jumlah_Sekolah_Sarjana": "0", "Jumlah_Penduduk_Putus_Sekolah": "0", "Jumlah_Anak_Usia_0_1_Tahun": "0", "Jumlah_Anak_Usia_2_5_Tahun": "0", "Jumlah_Pendatang": "0", "Status_Pendataan": "Selesai"}]</script>
    <script id="fallback-fas" type="application/json">[{"ID_Fasilitas": "e1880180", "Nama_Petugas": "Haqqi Wirakaryadi", "Tanggal_Waktu": "5/26/2026 11:14:30", "Lokasi_GPS": "0.313411, 108.994129", "Foto_Fasilitas": "Fasilitas_Images/e1880180.Foto_Fasilitas.041844.jpg", "RT": "RT 001 RW 01 DUSUN SENGGIRING", "Nama_Fasilitas": "SURAU AL HIDAYAH", "Kategori_Fasilitas": "Ibadah", "Sub_Kategori": "Musholla/Langgar", "Kondisi_Bangunan": "Baik", "Sumber_Listrik": "PLN 24 Jam", "Sumber_Air_Bersih": "PDAM/PAMSIMAS", "Akses_Jalan": "Aspal/Beton (Roda 4)", "Sinyal_Seluler": "Sangat Baik (4G/LTE)", "Catatan": ""}, {"ID_Fasilitas": "bb39de8e", "Nama_Petugas": "Haqqi Wirakaryadi", "Tanggal_Waktu": "6/2/2026 10:08:07", "Lokasi_GPS": "0.311922, 109.002703", "Foto_Fasilitas": "Fasilitas_Images/bb39de8e.Foto_Fasilitas.030946.jpg", "RT": "RT 003 RW 01 DUSUN SENGGIRING", "Nama_Fasilitas": "SURAU NURUZZAMAN", "Kategori_Fasilitas": "Ibadah", "Sub_Kategori": "Musholla/Langgar", "Kondisi_Bangunan": "Baik", "Sumber_Listrik": "PLN 24 Jam", "Sumber_Air_Bersih": "PDAM/PAMSIMAS", "Akses_Jalan": "Aspal/Beton (Roda 4)", "Sinyal_Seluler": "Sangat Baik (4G/LTE)", "Catatan": ""}, {"ID_Fasilitas": "740f59db", "Nama_Petugas": "Sahrul Rozi", "Tanggal_Waktu": "6/2/2026 10:09:55", "Lokasi_GPS": "0.306965, 109.008208", "Foto_Fasilitas": "Fasilitas_Images/740f59db.Foto_Fasilitas.031155.jpg", "RT": "RT 018 RW 03 DUSUN BENTENG TIMUR", "Nama_Fasilitas": "SURAU ALHIDAYAH", "Kategori_Fasilitas": "Ibadah", "Sub_Kategori": "Musholla/Langgar", "Kondisi_Bangunan": "Baik", "Sumber_Listrik": "PLN 24 Jam", "Sumber_Air_Bersih": "Sumur Bor/Pompa", "Akses_Jalan": "Aspal/Beton (Roda 4)", "Sinyal_Seluler": "Sangat Baik (4G/LTE)", "Catatan": ""}, {"ID_Fasilitas": "5348b5cf", "Nama_Petugas": "Haqqi Wirakaryadi", "Tanggal_Waktu": "6/2/2026 10:12:08", "Lokasi_GPS": "0.311664, 109.002145", "Foto_Fasilitas": "Fasilitas_Images/5348b5cf.Foto_Fasilitas.031539.png", "RT": "RT 002 RW 01 DUSUN SENGGIIRING", "Nama_Fasilitas": "KANTOR DESA SUNGAI BAKAU KECIL", "Kategori_Fasilitas": "Pemerintahan", "Sub_Kategori": "Kantor Desa", "Kondisi_Bangunan": "Baik", "Sumber_Listrik": "PLN 24 Jam", "Sumber_Air_Bersih": "Sumur Bor/Pompa", "Akses_Jalan": "Aspal/Beton (Roda 4)", "Sinyal_Seluler": "Sangat Baik (4G/LTE)", "Catatan": ""}, {"ID_Fasilitas": "1a9541e1", "Nama_Petugas": "Sahrul Rozi", "Tanggal_Waktu": "6/2/2026 10:39:06", "Lokasi_GPS": "0.336561, 109.017759", "Foto_Fasilitas": "Fasilitas_Images/1a9541e1.Foto_Fasilitas.040347.jpg", "RT": "RT 014 RW 04 DUSUN SEPAKAT TENGAH", "Nama_Fasilitas": "MUSHALLA BAITURRAHIM", "Kategori_Fasilitas": "Ibadah", "Sub_Kategori": "Musholla/Langgar", "Kondisi_Bangunan": "Baik", "Sumber_Listrik": "PLN 24 Jam", "Sumber_Air_Bersih": "Mata Air/Sungai", "Akses_Jalan": "Aspal/Beton (Roda 4)", "Sinyal_Seluler": "Sangat Baik (4G/LTE)", "Catatan": ""}, {"ID_Fasilitas": "2120204d", "Nama_Petugas": "Haqqi Wirakaryadi", "Tanggal_Waktu": "6/2/2026 11:52:08", "Lokasi_GPS": "0.310675, 109.008926", "Foto_Fasilitas": "Fasilitas_Images/2120204d.Foto_Fasilitas.045316.jpg", "RT": "RT 006 RW 02 DUSUN BENTENG RAYA", "Nama_Fasilitas": "MASJID SABILUL KHAIRAT", "Kategori_Fasilitas": "Ibadah", "Sub_Kategori": "Masjid", "Kondisi_Bangunan": "Baik", "Sumber_Listrik": "PLN 24 Jam", "Sumber_Air_Bersih": "PDAM/PAMSIMAS", "Akses_Jalan": "Aspal/Beton (Roda 4)", "Sinyal_Seluler": "Sangat Baik (4G/LTE)", "Catatan": ""}, {"ID_Fasilitas": "7c213726", "Nama_Petugas": "Sahrul Rozi", "Tanggal_Waktu": "6/2/2026 10:58:35", "Lokasi_GPS": "0.312140, 109.010819", "Foto_Fasilitas": "Fasilitas_Images/7c213726.Foto_Fasilitas.050152.jpg", "RT": "RT 011 RW 03 DUSUN SEPAKAT TENGAH", "Nama_Fasilitas": "SURAU H.BAHRUDDIN (AL-ABROR)", "Kategori_Fasilitas": "Ibadah", "Sub_Kategori": "Musholla/Langgar", "Kondisi_Bangunan": "Baik", "Sumber_Listrik": "PLN 24 Jam", "Sumber_Air_Bersih": "Sumur Bor/Pompa", "Akses_Jalan": "Aspal/Beton (Roda 4)", "Sinyal_Seluler": "Sangat Baik (4G/LTE)", "Catatan": ""}, {"ID_Fasilitas": "dbfc189f", "Nama_Petugas": "Haqqi Wirakaryadi", "Tanggal_Waktu": "6/8/2026 12:33:54", "Lokasi_GPS": "0.331249, 109.000894", "Foto_Fasilitas": "Fasilitas_Images/dbfc189f.Foto_Fasilitas.030449.jpg", "RT": "RT 026 RW 07 DUSUN SENAMBANG", "Nama_Fasilitas": "SD ISLAM AMALIYAH", "Kategori_Fasilitas": "Pendidikan", "Sub_Kategori": "SD/MI", "Kondisi_Bangunan": "Baik", "Sumber_Listrik": "PLN 24 Jam", "Sumber_Air_Bersih": "Sumur Bor/Pompa", "Akses_Jalan": "Aspal/Beton (Roda 4)", "Sinyal_Seluler": "Cukup (3G)", "Catatan": ""}, {"ID_Fasilitas": "4835badc", "Nama_Petugas": "Haqqi Wirakaryadi", "Tanggal_Waktu": "6/8/2026 12:41:57", "Lokasi_GPS": "0.331359, 109.001302", "Foto_Fasilitas": "Fasilitas_Images/4835badc.Foto_Fasilitas.031139.jpg", "RT": "RT 024 RW 07 DUSUN SENAMBANG", "Nama_Fasilitas": "MASJID BABUN NA'IM", "Kategori_Fasilitas": "Ibadah", "Sub_Kategori": "Masjid", "Kondisi_Bangunan": "Baik", "Sumber_Listrik": "PLN 24 Jam", "Sumber_Air_Bersih": "Sumur Bor/Pompa", "Akses_Jalan": "Aspal/Beton (Roda 4)", "Sinyal_Seluler": "Cukup (3G)", "Catatan": ""}, {"ID_Fasilitas": "87f04975", "Nama_Petugas": "Haqqi Wirakaryadi", "Tanggal_Waktu": "6/8/2026 12:44:25", "Lokasi_GPS": "0.347086, 109.021033", "Foto_Fasilitas": "Fasilitas_Images/87f04975.Foto_Fasilitas.025110.jpg", "RT": "RT 016 RW 05 DUSUN SEPAKAT DARAT", "Nama_Fasilitas": "MASJID SAFINATUSSALAM", "Kategori_Fasilitas": "Ibadah", "Sub_Kategori": "Masjid", "Kondisi_Bangunan": "Baik", "Sumber_Listrik": "PLN 24 Jam", "Sumber_Air_Bersih": "Sumur Bor/Pompa", "Akses_Jalan": "Aspal/Beton (Roda 4)", "Sinyal_Seluler": "Sangat Baik (4G/LTE)", "Catatan": ""}, {"ID_Fasilitas": "efdb660a", "Nama_Petugas": "Haqqi Wirakaryadi", "Tanggal_Waktu": "6/9/2026 10:53:58", "Lokasi_GPS": "0.310540, 109.008400", "Foto_Fasilitas": "Fasilitas_Images/efdb660a.Foto_Fasilitas.035522.jpg", "RT": "RT 006 RW 02 DUSUN BENTENG RAYA", "Nama_Fasilitas": "SMA MUHAMMADIYAH", "Kategori_Fasilitas": "Pendidikan", "Sub_Kategori": "SMA/SMK/MA", "Kondisi_Bangunan": "Baik", "Sumber_Listrik": "PLN 24 Jam", "Sumber_Air_Bersih": "PDAM/PAMSIMAS", "Akses_Jalan": "Aspal/Beton (Roda 4)", "Sinyal_Seluler": "Sangat Baik (4G/LTE)", "Catatan": ""}, {"ID_Fasilitas": "114dda0b", "Nama_Petugas": "Haqqi Wirakaryadi", "Tanggal_Waktu": "6/9/2026 10:55:27", "Lokasi_GPS": "0.311247, 109.008988", "Foto_Fasilitas": "Fasilitas_Images/114dda0b.Foto_Fasilitas.035652.jpg", "RT": "RT 005 RW 02 DUSUN BENTENG RAYA", "Nama_Fasilitas": "MTS MUHAMMADIYAH", "Kategori_Fasilitas": "Pendidikan", "Sub_Kategori": "SMP/MTs", "Kondisi_Bangunan": "Baik", "Sumber_Listrik": "PLN 24 Jam", "Sumber_Air_Bersih": "PDAM/PAMSIMAS", "Akses_Jalan": "Aspal/Beton (Roda 4)", "Sinyal_Seluler": "Sangat Baik (4G/LTE)", "Catatan": ""}, {"ID_Fasilitas": "4b50dd9e", "Nama_Petugas": "Haqqi Wirakaryadi", "Tanggal_Waktu": "6/10/2026 10:56:55", "Lokasi_GPS": "0.311417, 109.010950", "Foto_Fasilitas": "Fasilitas_Images/4b50dd9e.Foto_Fasilitas.035801.jpg", "RT": "RT 011 RW 03 DUSUN SEPAKAT TENGAH", "Nama_Fasilitas": "SDN 15 MEMPAWAH TIMUR", "Kategori_Fasilitas": "Pendidikan", "Sub_Kategori": "SD/MI", "Kondisi_Bangunan": "Baik", "Sumber_Listrik": "PLN 24 Jam", "Sumber_Air_Bersih": "PDAM/PAMSIMAS", "Akses_Jalan": "Aspal/Beton (Roda 4)", "Sinyal_Seluler": "Sangat Baik (4G/LTE)", "Catatan": ""}, {"ID_Fasilitas": "0a06c3c2", "Nama_Petugas": "Haqqi Wirakaryadi", "Tanggal_Waktu": "6/9/2026 10:58:01", "Lokasi_GPS": "0.311876, 109.010941", "Foto_Fasilitas": "Fasilitas_Images/0a06c3c2.Foto_Fasilitas.035856.jpg", "RT": "RT 011 RW 03 DUSUN SEPAKAT TENGAH", "Nama_Fasilitas": "SDN 8 MEMPAWAH TIMUR", "Kategori_Fasilitas": "Pendidikan", "Sub_Kategori": "SD/MI", "Kondisi_Bangunan": "Baik", "Sumber_Listrik": "PLN 24 Jam", "Sumber_Air_Bersih": "PDAM/PAMSIMAS", "Akses_Jalan": "Aspal/Beton (Roda 4)", "Sinyal_Seluler": "Sangat Baik (4G/LTE)", "Catatan": ""}, {"ID_Fasilitas": "6b1396b7", "Nama_Petugas": "Haqqi Wirakaryadi", "Tanggal_Waktu": "6/9/2026 10:58:59", "Lokasi_GPS": "0.335154, 109.017434", "Foto_Fasilitas": "Fasilitas_Images/6b1396b7.Foto_Fasilitas.025130.jpg", "RT": "RT 014 RW 04 DUSUN SEPAKAT TENGAH", "Nama_Fasilitas": "SDN 14 MEMPAWAH TIMUR", "Kategori_Fasilitas": "Pendidikan", "Sub_Kategori": "SD/MI", "Kondisi_Bangunan": "Baik", "Sumber_Listrik": "PLN 24 Jam", "Sumber_Air_Bersih": "Sumur Bor/Pompa", "Akses_Jalan": "Aspal/Beton (Roda 4)", "Sinyal_Seluler": "Cukup (3G)", "Catatan": ""}, {"ID_Fasilitas": "1dd2b894", "Nama_Petugas": "Haqqi Wirakaryadi", "Tanggal_Waktu": "6/9/2026 11:00:53", "Lokasi_GPS": "0.321297, 108.999287", "Foto_Fasilitas": "Fasilitas_Images/1dd2b894.Foto_Fasilitas.025751.jpg", "RT": "RT 022 RW 06 DUSUN KEDAUNG", "Nama_Fasilitas": "SMPN 3 MEMPAWAH TIMUR", "Kategori_Fasilitas": "Pendidikan", "Sub_Kategori": "SMP/MTs", "Kondisi_Bangunan": "Baik", "Sumber_Listrik": "PLN 24 Jam", "Sumber_Air_Bersih": "Sumur Bor/Pompa", "Akses_Jalan": "Aspal/Beton (Roda 4)", "Sinyal_Seluler": "Sangat Baik (4G/LTE)", "Catatan": ""}, {"ID_Fasilitas": "3d21c79c", "Nama_Petugas": "Haqqi Wirakaryadi", "Tanggal_Waktu": "6/9/2026 11:03:33", "Lokasi_GPS": "0.321473, 108.999469", "Foto_Fasilitas": "Fasilitas_Images/3d21c79c.Foto_Fasilitas.040427.jpg", "RT": "RT 022 RW 06 DUSUN KEDAUNG", "Nama_Fasilitas": "SDN 16 MEMPAWAH TIMUR", "Kategori_Fasilitas": "Pendidikan", "Sub_Kategori": "SD/MI", "Kondisi_Bangunan": "Baik", "Sumber_Listrik": "PLN 24 Jam", "Sumber_Air_Bersih": "Sumur Bor/Pompa", "Akses_Jalan": "Aspal/Beton (Roda 4)", "Sinyal_Seluler": "Sangat Baik (4G/LTE)", "Catatan": ""}, {"ID_Fasilitas": "e8edccee", "Nama_Petugas": "Haqqi Wirakaryadi", "Tanggal_Waktu": "6/10/2026 12:28:21", "Lokasi_GPS": "0.323551, 109.014105", "Foto_Fasilitas": "Fasilitas_Images/e8edccee.Foto_Fasilitas.025332.jpg", "RT": "RT 012 RW 04 DUSUN SEPAKAT TENGAH", "Nama_Fasilitas": "MASJID AL IKHLAS", "Kategori_Fasilitas": "Ibadah", "Sub_Kategori": "Masjid", "Kondisi_Bangunan": "Baik", "Sumber_Listrik": "PLN 24 Jam", "Sumber_Air_Bersih": "Sumur Bor/Pompa", "Akses_Jalan": "Aspal/Beton (Roda 4)", "Sinyal_Seluler": "Sangat Baik (4G/LTE)", "Catatan": ""}, {"ID_Fasilitas": "0f5f98aa", "Nama_Petugas": "Haqqi Wirakaryadi", "Tanggal_Waktu": "6/10/2026 9:34:39", "Lokasi_GPS": "0.348166, 109.021167", "Foto_Fasilitas": "Fasilitas_Images/0f5f98aa.Foto_Fasilitas.023555.jpg", "RT": "RT 016 RW 05 DUSUN SEPAKAT DARAT", "Nama_Fasilitas": "POSKESDES SUNGAI BAKAU KECIL", "Kategori_Fasilitas": "Kesehatan", "Sub_Kategori": "Polindes/Poskesdes", "Kondisi_Bangunan": "Baik", "Sumber_Listrik": "PLN 24 Jam", "Sumber_Air_Bersih": "Sumur Bor/Pompa", "Akses_Jalan": "Aspal/Beton (Roda 4)", "Sinyal_Seluler": "Cukup (3G)", "Catatan": ""}, {"ID_Fasilitas": "cdfcae7d", "Nama_Petugas": "Haqqi Wirakaryadi", "Tanggal_Waktu": "6/10/2026 9:59:44", "Lokasi_GPS": "0.313511, 108.993804", "Foto_Fasilitas": "Fasilitas_Images/cdfcae7d.Foto_Fasilitas.030138.jpg", "RT": "RT 020 RW 01 DUSUN SENGGIRING", "Nama_Fasilitas": "POSYANDU MAWAR", "Kategori_Fasilitas": "Kesehatan", "Sub_Kategori": "Posyandu", "Kondisi_Bangunan": "Baik", "Sumber_Listrik": "PLN 24 Jam", "Sumber_Air_Bersih": "PDAM/PAMSIMAS", "Akses_Jalan": "Aspal/Beton (Roda 4)", "Sinyal_Seluler": "Sangat Baik (4G/LTE)", "Catatan": ""}, {"ID_Fasilitas": "c9166f9c", "Nama_Petugas": "Haqqi Wirakaryadi", "Tanggal_Waktu": "6/10/2026 10:02:28", "Lokasi_GPS": "0.345231, 109.019839", "Foto_Fasilitas": "Fasilitas_Images/c9166f9c.Foto_Fasilitas.030510.jpg", "RT": "RT 037 RW 05 DUSUN SEPAKAT DARAT", "Nama_Fasilitas": "POSYANDU KASIH IBU", "Kategori_Fasilitas": "Kesehatan", "Sub_Kategori": "Posyandu", "Kondisi_Bangunan": "Baik", "Sumber_Listrik": "PLN 24 Jam", "Sumber_Air_Bersih": "Sumur Bor/Pompa", "Akses_Jalan": "Aspal/Beton (Roda 4)", "Sinyal_Seluler": "Cukup (3G)", "Catatan": ""}, {"ID_Fasilitas": "af11103f", "Nama_Petugas": "Haqqi Wirakaryadi", "Tanggal_Waktu": "6/16/2026 9:56:41", "Lokasi_GPS": "0.322295, 109.014134", "Foto_Fasilitas": "Fasilitas_Images/af11103f.Foto_Fasilitas.025821.jpg", "RT": "RT 012 RW 04 DUSUN SEPAKAT TENGAH", "Nama_Fasilitas": "POSYANDU MUTIARA", "Kategori_Fasilitas": "Kesehatan", "Sub_Kategori": "Posyandu", "Kondisi_Bangunan": "Baik", "Sumber_Listrik": "PLN 24 Jam", "Sumber_Air_Bersih": "Sumur Bor/Pompa", "Akses_Jalan": "Aspal/Beton (Roda 4)", "Sinyal_Seluler": "Sangat Baik (4G/LTE)", "Catatan": ""}, {"ID_Fasilitas": "e8e5f63e", "Nama_Petugas": "Sahrul Rozi", "Tanggal_Waktu": "6/15/2026 12:37:07", "Lokasi_GPS": "0.338571, 109.000162", "Foto_Fasilitas": "Fasilitas_Images/e8e5f63e.Foto_Fasilitas.053954.jpg", "RT": "RT 032 RW 07 DUSUN SENAMBANG", "Nama_Fasilitas": "SURAU AL MUHLISIN", "Kategori_Fasilitas": "Ibadah", "Sub_Kategori": "Musholla/Langgar", "Kondisi_Bangunan": "Baik", "Sumber_Listrik": "PLN 24 Jam", "Sumber_Air_Bersih": "Sumur Bor/Pompa", "Akses_Jalan": "Jalan Tanah (Roda 2)", "Sinyal_Seluler": "Cukup (3G)", "Catatan": ""}, {"ID_Fasilitas": "eefec299", "Nama_Petugas": "Sahrul Rozi", "Tanggal_Waktu": "6/15/2026 12:39:56", "Lokasi_GPS": "0.330780, 109.004413", "Foto_Fasilitas": "Fasilitas_Images/eefec299.Foto_Fasilitas.025522.jpg", "RT": "RT 024 RW 07 DUSUN SENAMBANG", "Nama_Fasilitas": "SURAU ALMANAR", "Kategori_Fasilitas": "Ibadah", "Sub_Kategori": "Musholla/Langgar", "Kondisi_Bangunan": "Baik", "Sumber_Listrik": "PLN 24 Jam", "Sumber_Air_Bersih": "Sumur Bor/Pompa", "Akses_Jalan": "Aspal/Beton (Roda 4)", "Sinyal_Seluler": "Cukup (3G)", "Catatan": ""}, {"ID_Fasilitas": "71d50bf8", "Nama_Petugas": "Haqqi Wirakaryadi", "Tanggal_Waktu": "6/16/2026 9:46:04", "Lokasi_GPS": "0.345679, 109.020013", "Foto_Fasilitas": "Fasilitas_Images/71d50bf8.Foto_Fasilitas.024919.jpg", "RT": "RT 016 RW 05 DUSUN SEPAKAT DARAT", "Nama_Fasilitas": "PONDOK POSANTREN BAHRUL ULUM", "Kategori_Fasilitas": "Pendidikan", "Sub_Kategori": "Pondok Pesantren", "Kondisi_Bangunan": "Baik", "Sumber_Listrik": "PLN 24 Jam", "Sumber_Air_Bersih": "Sumur Bor/Pompa", "Akses_Jalan": "Aspal/Beton (Roda 4)", "Sinyal_Seluler": "Sangat Baik (4G/LTE)", "Catatan": ""}, {"ID_Fasilitas": "549a1060", "Nama_Petugas": "Haqqi Wirakaryadi", "Tanggal_Waktu": "6/16/2026 9:55:35", "Lokasi_GPS": "0.330850, 109.002738", "Foto_Fasilitas": "Fasilitas_Images/549a1060.Foto_Fasilitas.025730.jpg", "RT": "RT 026 RW 07 DUSUN SENAMBANG", "Nama_Fasilitas": "POSYANDU SEHAT BAROKAH", "Kategori_Fasilitas": "Kesehatan", "Sub_Kategori": "Posyandu", "Kondisi_Bangunan": "Baik", "Sumber_Listrik": "PLN 24 Jam", "Sumber_Air_Bersih": "Sumur Bor/Pompa", "Akses_Jalan": "Aspal/Beton (Roda 4)", "Sinyal_Seluler": "Cukup (3G)", "Catatan": ""}, {"ID_Fasilitas": "d0782721", "Nama_Petugas": "Haqqi Wirakaryadi", "Tanggal_Waktu": "6/16/2026 10:00:46", "Lokasi_GPS": "0.333226, 109.016633", "Foto_Fasilitas": "Fasilitas_Images/d0782721.Foto_Fasilitas.030147.jpg", "RT": "RT 033 RW 04 DUSUN SEPAKAT TENGAH", "Nama_Fasilitas": "MASJID BABUL KHAIR", "Kategori_Fasilitas": "Ibadah", "Sub_Kategori": "Masjid", "Kondisi_Bangunan": "Baik", "Sumber_Listrik": "PLN 24 Jam", "Sumber_Air_Bersih": "Sumur Bor/Pompa", "Akses_Jalan": "Aspal/Beton (Roda 4)", "Sinyal_Seluler": "Cukup (3G)", "Catatan": ""}, {"ID_Fasilitas": "0c399118", "Nama_Petugas": "Haqqi Wirakaryadi", "Tanggal_Waktu": "6/16/2026 10:03:46", "Lokasi_GPS": "0.312977, 109.011336", "Foto_Fasilitas": "Fasilitas_Images/0c399118.Foto_Fasilitas.030505.jpg", "RT": "RT 011 RW 03 DUSUN SEPAKAT TENGAH", "Nama_Fasilitas": "VIHARA SHAN TUNG KIUNG", "Kategori_Fasilitas": "Ibadah", "Sub_Kategori": "Vihara/Klenteng", "Kondisi_Bangunan": "Baik", "Sumber_Listrik": "PLN 24 Jam", "Sumber_Air_Bersih": "Sumur Bor/Pompa", "Akses_Jalan": "Aspal/Beton (Roda 4)", "Sinyal_Seluler": "Sangat Baik (4G/LTE)", "Catatan": ""}, {"ID_Fasilitas": "f465d720", "Nama_Petugas": "Haqqi Wirakaryadi", "Tanggal_Waktu": "6/16/2026 11:00:38", "Lokasi_GPS": "0.342384, 109.019113", "Foto_Fasilitas": "Fasilitas_Images/f465d720.Foto_Fasilitas.040241.jpg", "RT": "RT 015 RW 05 DUSUN SEPAKAT DARAT", "Nama_Fasilitas": "MASJID KHITAMUL KHAIR", "Kategori_Fasilitas": "Ibadah", "Sub_Kategori": "Masjid", "Kondisi_Bangunan": "Baik", "Sumber_Listrik": "PLN 24 Jam", "Sumber_Air_Bersih": "Sumur Bor/Pompa", "Akses_Jalan": "Aspal/Beton (Roda 4)", "Sinyal_Seluler": "Sangat Baik (4G/LTE)", "Catatan": ""}, {"ID_Fasilitas": "ef001b20", "Nama_Petugas": "Haqqi Wirakaryadi", "Tanggal_Waktu": "6/16/2026 11:06:17", "Lokasi_GPS": "0.351186, 109.023887", "Foto_Fasilitas": "Fasilitas_Images/ef001b20.Foto_Fasilitas.040841.jpg", "RT": "RT 017 RW 05 DUSUN SEPAKAT DARAT", "Nama_Fasilitas": "RA. ALBILQIST", "Kategori_Fasilitas": "Pendidikan", "Sub_Kategori": "PAUD", "Kondisi_Bangunan": "Baik", "Sumber_Listrik": "PLN 24 Jam", "Sumber_Air_Bersih": "Sumur Bor/Pompa", "Akses_Jalan": "Aspal/Beton (Roda 4)", "Sinyal_Seluler": "Cukup (3G)", "Catatan": ""}, {"ID_Fasilitas": "edaff353", "Nama_Petugas": "Haqqi Wirakaryadi", "Tanggal_Waktu": "6/16/2026 9:33:31", "Lokasi_GPS": "0.304753, 109.008078", "Foto_Fasilitas": "Fasilitas_Images/edaff353.Foto_Fasilitas.023634.jpg", "RT": "RT 008 RW 03 DUSUN BENTENG TIMUR", "Nama_Fasilitas": "PENGGALANGAN SAMPAN", "Kategori_Fasilitas": "Bangunan Lainnya", "Sub_Kategori": "Lainnya (Sebutkan di Catatan)", "Kondisi_Bangunan": "Baik", "Sumber_Listrik": "PLN 24 Jam", "Sumber_Air_Bersih": "Mata Air/Sungai", "Akses_Jalan": "Aspal/Beton (Roda 4)", "Sinyal_Seluler": "Sangat Baik (4G/LTE)", "Catatan": "PENGGALANGAN SAMPAN"}, {"ID_Fasilitas": "dd588eba", "Nama_Petugas": "Haqqi Wirakaryadi", "Tanggal_Waktu": "6/16/2026 9:36:45", "Lokasi_GPS": "0.307837, 109.008999", "Foto_Fasilitas": "Fasilitas_Images/dd588eba.Foto_Fasilitas.023859.jpg", "RT": "RT 008 RW 03 DUSUN BENTENG TIMUR", "Nama_Fasilitas": "SURAU SABILUL JANNAH", "Kategori_Fasilitas": "Ibadah", "Sub_Kategori": "Musholla/Langgar", "Kondisi_Bangunan": "Baik", "Sumber_Listrik": "PLN 24 Jam", "Sumber_Air_Bersih": "PDAM/PAMSIMAS", "Akses_Jalan": "Aspal/Beton (Roda 4)", "Sinyal_Seluler": "Sangat Baik (4G/LTE)", "Catatan": ""}, {"ID_Fasilitas": "c05037d6", "Nama_Petugas": "Haqqi Wirakaryadi", "Tanggal_Waktu": "6/16/2026 9:43:50", "Lokasi_GPS": "0.311686, 109.009842", "Foto_Fasilitas": "Fasilitas_Images/c05037d6.Foto_Fasilitas.024610.jpg", "RT": "RT 010 RW 03 DUSUN SEPAKAT TENGAH", "Nama_Fasilitas": "KLENTENG FUK TET MIAU", "Kategori_Fasilitas": "Ibadah", "Sub_Kategori": "Vihara/Klenteng", "Kondisi_Bangunan": "Baik", "Sumber_Listrik": "PLN 24 Jam", "Sumber_Air_Bersih": "Sumur Bor/Pompa", "Akses_Jalan": "Aspal/Beton (Roda 4)", "Sinyal_Seluler": "Sangat Baik (4G/LTE)", "Catatan": ""}, {"ID_Fasilitas": "550f419a", "Nama_Petugas": "Haqqi Wirakaryadi", "Tanggal_Waktu": "6/16/2026 9:48:49", "Lokasi_GPS": "0.303334, 109.007613", "Foto_Fasilitas": "Fasilitas_Images/550f419a.Foto_Fasilitas.024958.jpg", "RT": "RT 008 RW 03 DUSUN BENTENG TIMUR", "Nama_Fasilitas": "TK NEGERI PEDESAAN", "Kategori_Fasilitas": "Pendidikan", "Sub_Kategori": "TK", "Kondisi_Bangunan": "Baik", "Sumber_Listrik": "PLN 24 Jam", "Sumber_Air_Bersih": "Sumur Bor/Pompa", "Akses_Jalan": "Perkerasan/Batu (Roda 4)", "Sinyal_Seluler": "Cukup (3G)", "Catatan": ""}, {"ID_Fasilitas": "5b64d902", "Nama_Petugas": "Haqqi Wirakaryadi", "Tanggal_Waktu": "6/16/2026 9:51:23", "Lokasi_GPS": "0.321663, 109.000616", "Foto_Fasilitas": "Fasilitas_Images/5b64d902.Foto_Fasilitas.025259.jpg", "RT": "RT 022 RW 06 DUSUN KEDAUNG", "Nama_Fasilitas": "POSYANDU FLAMBOYAN", "Kategori_Fasilitas": "Kesehatan", "Sub_Kategori": "Posyandu", "Kondisi_Bangunan": "Baik", "Sumber_Listrik": "PLN 24 Jam", "Sumber_Air_Bersih": "Sumur Bor/Pompa", "Akses_Jalan": "Aspal/Beton (Roda 4)", "Sinyal_Seluler": "Sangat Baik (4G/LTE)", "Catatan": ""}, {"ID_Fasilitas": "7b2c3814", "Nama_Petugas": "Haqqi Wirakaryadi", "Tanggal_Waktu": "6/16/2026 9:53:06", "Lokasi_GPS": "0.321581, 109.002269", "Foto_Fasilitas": "Fasilitas_Images/7b2c3814.Foto_Fasilitas.025445.jpg", "RT": "RT 022 RW 06 DUSUN KEDAUNG", "Nama_Fasilitas": "SURAU NURUL ISLAM", "Kategori_Fasilitas": "Ibadah", "Sub_Kategori": "Musholla/Langgar", "Kondisi_Bangunan": "Baik", "Sumber_Listrik": "PLN 24 Jam", "Sumber_Air_Bersih": "Sumur Bor/Pompa", "Akses_Jalan": "Aspal/Beton (Roda 4)", "Sinyal_Seluler": "Sangat Baik (4G/LTE)", "Catatan": ""}, {"ID_Fasilitas": "70cc0ff1", "Nama_Petugas": "Haqqi Wirakaryadi", "Tanggal_Waktu": "6/16/2026 9:55:14", "Lokasi_GPS": "0.321988, 109.000229", "Foto_Fasilitas": "Fasilitas_Images/70cc0ff1.Foto_Fasilitas.025630.jpg", "RT": "RT 022 RW 06 DUSUN KEDAUNG", "Nama_Fasilitas": "SURAU ALHAMIDI", "Kategori_Fasilitas": "Ibadah", "Sub_Kategori": "Musholla/Langgar", "Kondisi_Bangunan": "Baik", "Sumber_Listrik": "PLN 24 Jam", "Sumber_Air_Bersih": "Sumur Bor/Pompa", "Akses_Jalan": "Aspal/Beton (Roda 4)", "Sinyal_Seluler": "Sangat Baik (4G/LTE)", "Catatan": ""}, {"ID_Fasilitas": "3f7bf460", "Nama_Petugas": "Haqqi Wirakaryadi", "Tanggal_Waktu": "6/16/2026 9:58:02", "Lokasi_GPS": "0.347275, 109.021084", "Foto_Fasilitas": "Fasilitas_Images/3f7bf460.Foto_Fasilitas.030236.jpg", "RT": "RT 016 RW 05 DUSUN SEPAKAT DARAT", "Nama_Fasilitas": "MADRASAH TSANAWIYAH BAHRUL ULUM AL-HAMIDIYAH", "Kategori_Fasilitas": "Pendidikan", "Sub_Kategori": "SMP/MTs", "Kondisi_Bangunan": "Baik", "Sumber_Listrik": "PLN 24 Jam", "Sumber_Air_Bersih": "Sumur Bor/Pompa", "Akses_Jalan": "Aspal/Beton (Roda 4)", "Sinyal_Seluler": "Cukup (3G)", "Catatan": ""}, {"ID_Fasilitas": "2cb73286", "Nama_Petugas": "Haqqi Wirakaryadi", "Tanggal_Waktu": "6/16/2026 10:13:06", "Lokasi_GPS": "0.322156, 108.998991", "Foto_Fasilitas": "Fasilitas_Images/2cb73286.Foto_Fasilitas.031927.jpg", "RT": "RT 022 RW 06 DUSUN KEDAUNG", "Nama_Fasilitas": "MASJID RAUDHATUL JANNAH", "Kategori_Fasilitas": "Ibadah", "Sub_Kategori": "Masjid", "Kondisi_Bangunan": "Baik", "Sumber_Listrik": "PLN 24 Jam", "Sumber_Air_Bersih": "Sumur Bor/Pompa", "Akses_Jalan": "Aspal/Beton (Roda 4)", "Sinyal_Seluler": "Cukup (3G)", "Catatan": ""}, {"ID_Fasilitas": "678f2849", "Nama_Petugas": "Haqqi Wirakaryadi", "Tanggal_Waktu": "6/16/2026 10:20:22", "Lokasi_GPS": "0.326806, 109.014365", "Foto_Fasilitas": "Fasilitas_Images/678f2849.Foto_Fasilitas.032341.jpg", "RT": "RT 012 RW 04 DUSUN SEPAKAT TENGAH", "Nama_Fasilitas": "SURAU AL BAIHAQI", "Kategori_Fasilitas": "Ibadah", "Sub_Kategori": "Musholla/Langgar", "Kondisi_Bangunan": "Baik", "Sumber_Listrik": "PLN 24 Jam", "Sumber_Air_Bersih": "Sumur Bor/Pompa", "Akses_Jalan": "Aspal/Beton (Roda 4)", "Sinyal_Seluler": "Cukup (3G)", "Catatan": ""}, {"ID_Fasilitas": "60915a25", "Nama_Petugas": "Haqqi Wirakaryadi", "Tanggal_Waktu": "6/17/2026 11:25:34", "Lokasi_GPS": "0.332119, 109.007683", "Foto_Fasilitas": "Fasilitas_Images/60915a25.Foto_Fasilitas.043009.jpg", "RT": "RT 026 RW 07 DUSUN SENAMBANG", "Nama_Fasilitas": "MASJID NURUL HUDA", "Kategori_Fasilitas": "Ibadah", "Sub_Kategori": "Masjid", "Kondisi_Bangunan": "Baik", "Sumber_Listrik": "PLN 24 Jam", "Sumber_Air_Bersih": "Sumur Bor/Pompa", "Akses_Jalan": "Perkerasan/Batu (Roda 4)", "Sinyal_Seluler": "Sangat Baik (4G/LTE)", "Catatan": ""}, {"ID_Fasilitas": "5cea9054", "Nama_Petugas": "Haqqi Wirakaryadi", "Tanggal_Waktu": "6/17/2026 11:36:01", "Lokasi_GPS": "0.332198, 109.024496", "Foto_Fasilitas": "Fasilitas_Images/5cea9054.Foto_Fasilitas.043750.jpg", "RT": "RT 013 RW 04 DUSUN SEPAKAT TENGAH", "Nama_Fasilitas": "MASJID USSISA ALATTAQWA", "Kategori_Fasilitas": "Ibadah", "Sub_Kategori": "Masjid", "Kondisi_Bangunan": "Baik", "Sumber_Listrik": "PLN 24 Jam", "Sumber_Air_Bersih": "Sumur Bor/Pompa", "Akses_Jalan": "Perkerasan/Batu (Roda 4)", "Sinyal_Seluler": "Cukup (3G)", "Catatan": ""}, {"ID_Fasilitas": "d53bded0", "Nama_Petugas": "Haqqi Wirakaryadi", "Tanggal_Waktu": "6/17/2026 11:38:06", "Lokasi_GPS": "0.332554, 109.024614", "Foto_Fasilitas": "Fasilitas_Images/d53bded0.Foto_Fasilitas.043919.jpg", "RT": "RT 013 RW 04 DUSUN SEPAKAT TENGAH", "Nama_Fasilitas": "POSYANDU AMPULOR", "Kategori_Fasilitas": "Kesehatan", "Sub_Kategori": "Posyandu", "Kondisi_Bangunan": "Rusak Ringan", "Sumber_Listrik": "PLN 24 Jam", "Sumber_Air_Bersih": "Sumur Bor/Pompa", "Akses_Jalan": "Perkerasan/Batu (Roda 4)", "Sinyal_Seluler": "Cukup (3G)", "Catatan": ""}, {"ID_Fasilitas": "6c5301fb", "Nama_Petugas": "Haqqi Wirakaryadi", "Tanggal_Waktu": "6/17/2026 11:42:33", "Lokasi_GPS": "0.326782, 109.025167", "Foto_Fasilitas": "Fasilitas_Images/6c5301fb.Foto_Fasilitas.044329.jpg", "RT": "RT 019 RW 04 DUSUN SEPAKAT TENGAH", "Nama_Fasilitas": "MUSHOLA NURUL JIHAD", "Kategori_Fasilitas": "Ibadah", "Sub_Kategori": "Musholla/Langgar", "Kondisi_Bangunan": "Rusak Ringan", "Sumber_Listrik": "PLN 24 Jam", "Sumber_Air_Bersih": "Sumur Bor/Pompa", "Akses_Jalan": "Perkerasan/Batu (Roda 4)", "Sinyal_Seluler": "Cukup (3G)", "Catatan": ""}, {"ID_Fasilitas": "da053cd3", "Nama_Petugas": "Haqqi Wirakaryadi", "Tanggal_Waktu": "6/17/2026 11:45:16", "Lokasi_GPS": "0.333487, 109.021264", "Foto_Fasilitas": "Fasilitas_Images/da053cd3.Foto_Fasilitas.044615.jpg", "RT": "RT 013 RW 04 DUSUN SEPAKAT TENGAH", "Nama_Fasilitas": "SURAU AL MUTAZZAM", "Kategori_Fasilitas": "Ibadah", "Sub_Kategori": "Musholla/Langgar", "Kondisi_Bangunan": "Baik", "Sumber_Listrik": "PLN 24 Jam", "Sumber_Air_Bersih": "Sumur Bor/Pompa", "Akses_Jalan": "Perkerasan/Batu (Roda 4)", "Sinyal_Seluler": "Cukup (3G)", "Catatan": ""}, {"ID_Fasilitas": "d167524b", "Nama_Petugas": "Haqqi Wirakaryadi", "Tanggal_Waktu": "6/18/2026 9:52:36", "Lokasi_GPS": "0.338871, 109.008036", "Foto_Fasilitas": "Fasilitas_Images/d167524b.Foto_Fasilitas.025356.jpg", "RT": "RT 027 RW 08 DUSUN KONSASI", "Nama_Fasilitas": "POSYANDU MELATI", "Kategori_Fasilitas": "Kesehatan", "Sub_Kategori": "Posyandu", "Kondisi_Bangunan": "Baik", "Sumber_Listrik": "PLN 24 Jam", "Sumber_Air_Bersih": "Tidak Tersedia", "Akses_Jalan": "Perkerasan/Batu (Roda 4)", "Sinyal_Seluler": "Cukup (3G)", "Catatan": ""}, {"ID_Fasilitas": "b14df374", "Nama_Petugas": "Haqqi Wirakaryadi", "Tanggal_Waktu": "6/17/2026 10:34:18", "Lokasi_GPS": "0.311924, 109.009735", "Foto_Fasilitas": "Fasilitas_Images/b14df374.Foto_Fasilitas.033534.jpg", "RT": "RT 005 RW 02 DUSUN BENTENG RAYA", "Nama_Fasilitas": "POSYANDU ANUGRAH", "Kategori_Fasilitas": "Kesehatan", "Sub_Kategori": "Posyandu", "Kondisi_Bangunan": "Baik", "Sumber_Listrik": "PLN 24 Jam", "Sumber_Air_Bersih": "Tidak Tersedia", "Akses_Jalan": "Perkerasan/Batu (Roda 4)", "Sinyal_Seluler": "Sangat Baik (4G/LTE)", "Catatan": ""}, {"ID_Fasilitas": "d107f6ea", "Nama_Petugas": "Haqqi Wirakaryadi", "Tanggal_Waktu": "7/3/2026 10:35:36", "Lokasi_GPS": "0.344935, 109.009734", "Foto_Fasilitas": "Fasilitas_Images/d107f6ea.Foto_Fasilitas.033726.jpg", "RT": "RT 028 RW 08 DUSUN KONSASI", "Nama_Fasilitas": "SURAU MIFTAHUL ULUM", "Kategori_Fasilitas": "Ibadah", "Sub_Kategori": "Musholla/Langgar", "Kondisi_Bangunan": "Baik", "Sumber_Listrik": "PLN 24 Jam", "Sumber_Air_Bersih": "Sumur Bor/Pompa", "Akses_Jalan": "Perkerasan/Batu (Roda 4)", "Sinyal_Seluler": "Cukup (3G)", "Catatan": ""}, {"ID_Fasilitas": "bac20daa", "Nama_Petugas": "Haqqi Wirakaryadi", "Tanggal_Waktu": "6/17/2026 12:44:31", "Lokasi_GPS": "0.343966, 109.013396", "Foto_Fasilitas": "Fasilitas_Images/bac20daa.Foto_Fasilitas.054626.jpg", "RT": "RT 029 RW 08 DUSUN KONSASI", "Nama_Fasilitas": "SURAU AL AMIN", "Kategori_Fasilitas": "Ibadah", "Sub_Kategori": "Musholla/Langgar", "Kondisi_Bangunan": "Baik", "Sumber_Listrik": "PLN 24 Jam", "Sumber_Air_Bersih": "Sumur Bor/Pompa", "Akses_Jalan": "Jalan Tanah (Roda 2)", "Sinyal_Seluler": "Cukup (3G)", "Catatan": ""}]</script>

    <script>
        var FALLBACK_RT = [];
        var FALLBACK_FAS = [];
        try {
            var elRt = document.getElementById('fallback-rt');
            if (elRt && elRt.textContent) FALLBACK_RT = JSON.parse(elRt.textContent);
        } catch(e) { console.error('Fallback RT parse error:', e); }

        try {
            var elFas = document.getElementById('fallback-fas');
            if (elFas && elFas.textContent) FALLBACK_FAS = JSON.parse(elFas.textContent);
        } catch(e) { console.error('Fallback FAS parse error:', e); }

        var map, markersLayer;
        var chartDemografiInstance  = null;
        var chartFasilitasInstance  = null;

        document.addEventListener('DOMContentLoaded', function() {
            initMap();
            loadDataFromSheets();
            var sRt = document.getElementById('search-rt');
            if (sRt) sRt.addEventListener('input', filterTableRT);
            var sFas = document.getElementById('search-fas');
            if (sFas) sFas.addEventListener('input', filterTableFas);
        });

        function initMap() {
            var mapEl = document.getElementById('map');
            if (!mapEl) return;
            map = L.map('map').setView([0.32, 109.00], 13);
            
            // 1. Google Satellite Hybrid (Satelit + Label Jalan)
            var googleHybrid = L.tileLayer('https://mt{s}.google.com/vt/lyrs=y&x={x}&y={y}&z={z}', {
                maxZoom: 20,
                subdomains: ['0', '1', '2', '3'],
                attribution: '&copy; Google Maps'
            }).addTo(map);

            // 2. Esri World Imagery (Satelit HD)
            var esriSat = L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}', {
                maxZoom: 19,
                attribution: '&copy; Esri World Imagery'
            });

            // 3. OpenStreetMap (Peta Jalan)
            var osmRoad = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 19,
                attribution: '&copy; OpenStreetMap'
            });

            // Layer Control Switcher (Top Right)
            L.control.layers({
                "Google Satelit Hybrid": googleHybrid,
                "Esri Satelit HD": esriSat,
                "OpenStreetMap Jalan": osmRoad
            }, null, { position: 'topright' }).addTo(map);

            markersLayer = L.layerGroup().addTo(map);
        }

        async function loadDataFromSheets() {
            var syncStatus = document.getElementById('sync-status');
            var syncIcon   = document.getElementById('sync-icon');
            if (syncIcon) syncIcon.classList.add('fa-spin');
            if (syncStatus) syncStatus.innerText = 'Menyinkronkan data Google Sheets...';

            var rtData = null, fasData = null;

            try {
                var resRT = await fetch('/desa-cantik/api/sungaibakaukecil/Appsheet_RT');
                if (resRT.ok) {
                    var jsonRT = await resRT.json();
                    if (Array.isArray(jsonRT)) rtData = jsonRT;
                }
                var resFas = await fetch('/desa-cantik/api/sungaibakaukecil/Appsheet_Fasilitas');
                if (resFas.ok) {
                    var jsonFas = await resFas.json();
                    if (Array.isArray(jsonFas)) fasData = jsonFas;
                }
            } catch(e) {
                console.warn('Live fetch failed, using fallback:', e);
            }

            if (!Array.isArray(rtData) || !rtData.length) rtData = cleanKeys(FALLBACK_RT);
            if (!Array.isArray(fasData) || !fasData.length) fasData = cleanKeys(FALLBACK_FAS);

            if (syncStatus) syncStatus.innerText = 'Terhubung Live (Last sync: ' + new Date().toLocaleTimeString('id-ID') + ')';
            if (syncIcon) syncIcon.classList.remove('fa-spin');
            processAndRenderData(rtData, fasData);
        }

        function cleanKeys(arr) {
            if (!Array.isArray(arr)) return [];
            return arr.map(function(item) {
                var out = {};
                if (item && typeof item === 'object') {
                    Object.keys(item).forEach(function(k) { out[k.trim()] = item[k]; });
                }
                return out;
            });
        }

        var rawRTData = [];
        var rawFasData = [];
        var currentRTMode = 'variabel';
        var sortRTKey = 'Nama_RT';
        var sortRTAsc = true;
        var sortFasKey = 'Nama_Fasilitas';
        var sortFasAsc = true;

        function switchRTTableMode(mode) {
            currentRTMode = mode;
            var btnVar = document.getElementById('btn-mode-variabel');
            var btnInd = document.getElementById('btn-mode-indikator');
            var thead = document.getElementById('table-rt-thead');

            if (mode === 'variabel') {
                if (btnVar) { btnVar.className = 'btn btn-primary rounded-pill px-3 fw-semibold active'; }
                if (btnInd) { btnInd.className = 'btn btn-outline-success rounded-pill px-3 fw-semibold'; }
                if (thead) {
                    thead.className = 'table-light user-select-none text-nowrap';
                    thead.innerHTML = '<tr>'
                        + '<th style="cursor:pointer;" onclick="sortTableRT(\'Nama_RT\')">Nama RT <i class="fas fa-sort text-muted ms-1" id="sort-icon-Nama_RT"></i></th>'
                        + '<th style="cursor:pointer;" onclick="sortTableRT(\'Nama_Ketua_RT\')">Ketua RT <i class="fas fa-sort text-muted ms-1" id="sort-icon-Nama_Ketua_RT"></i></th>'
                        + '<th style="cursor:pointer;" onclick="sortTableRT(\'Jumlah_Penduduk_Laki_Laki\')">L <i class="fas fa-sort text-muted ms-1" id="sort-icon-Jumlah_Penduduk_Laki_Laki"></i></th>'
                        + '<th style="cursor:pointer;" onclick="sortTableRT(\'Jumlah_Penduduk_Perempuan\')">P <i class="fas fa-sort text-muted ms-1" id="sort-icon-Jumlah_Penduduk_Perempuan"></i></th>'
                        + '<th style="cursor:pointer;" onclick="sortTableRT(\'total\')">Total <i class="fas fa-sort text-muted ms-1" id="sort-icon-total"></i></th>'
                        + '<th style="cursor:pointer;" onclick="sortTableRT(\'Jumlah_KK\')">KK <i class="fas fa-sort text-muted ms-1" id="sort-icon-Jumlah_KK"></i></th>'
                        + '<th style="cursor:pointer;" onclick="sortTableRT(\'Jumlah_Bumbung_Rumah\')">Bumbung <i class="fas fa-sort text-muted ms-1" id="sort-icon-Jumlah_Bumbung_Rumah"></i></th>'
                        + '<th style="cursor:pointer;" onclick="sortTableRT(\'Jumlah_Penduduk_Lansia\')">Lansia <i class="fas fa-sort text-muted ms-1" id="sort-icon-Jumlah_Penduduk_Lansia"></i></th>'
                        + '<th style="cursor:pointer;" onclick="sortTableRT(\'Jumlah_Memiliki_KTP\')">KTP-el <i class="fas fa-sort text-muted ms-1" id="sort-icon-Jumlah_Memiliki_KTP"></i></th>'
                        + '<th style="cursor:pointer;" onclick="sortTableRT(\'Status_Pendataan\')">Status <i class="fas fa-sort text-muted ms-1" id="sort-icon-Status_Pendataan"></i></th>'
                        + '</tr>';
                }
            } else {
                if (btnVar) { btnVar.className = 'btn btn-outline-primary rounded-pill px-3 fw-semibold'; }
                if (btnInd) { btnInd.className = 'btn btn-success rounded-pill px-3 fw-semibold active'; }
                if (thead) {
                    thead.className = 'table-success user-select-none text-nowrap';
                    thead.innerHTML = '<tr>'
                        + '<th style="cursor:pointer;" onclick="sortTableRT(\'Nama_RT\')">Nama RT <i class="fas fa-sort text-muted ms-1" id="sort-icon-Nama_RT"></i></th>'
                        + '<th style="cursor:pointer;" onclick="sortTableRT(\'_sexRatio\')">#1 Sex Ratio <i class="fas fa-sort text-muted ms-1" id="sort-icon-_sexRatio"></i></th>'
                        + '<th style="cursor:pointer;" onclick="sortTableRT(\'_artRata\')">#2 ART/KK <i class="fas fa-sort text-muted ms-1" id="sort-icon-_artRata"></i></th>'
                        + '<th style="cursor:pointer;" onclick="sortTableRT(\'Jumlah_Penduduk_Lansia\')">Jml Lansia <i class="fas fa-sort text-muted ms-1" id="sort-icon-Jumlah_Penduduk_Lansia"></i></th>'
                        + '<th style="cursor:pointer;" onclick="sortTableRT(\'_pctLansia\')">#3 % Lansia <i class="fas fa-sort text-muted ms-1" id="sort-icon-_pctLansia"></i></th>'
                        + '<th style="cursor:pointer;" onclick="sortTableRT(\'Jumlah_Memiliki_KTP\')">Jml KTP-el <i class="fas fa-sort text-muted ms-1" id="sort-icon-Jumlah_Memiliki_KTP"></i></th>'
                        + '<th style="cursor:pointer;" onclick="sortTableRT(\'_pctKTP\')">#4 % KTP-el <i class="fas fa-sort text-muted ms-1" id="sort-icon-_pctKTP"></i></th>'
                        + '<th style="cursor:pointer;" onclick="sortTableRT(\'_cntBansos\')">Jml Bansos <i class="fas fa-sort text-muted ms-1" id="sort-icon-_cntBansos"></i></th>'
                        + '<th style="cursor:pointer;" onclick="sortTableRT(\'_pctBansos\')">#5 % Bansos <i class="fas fa-sort text-muted ms-1" id="sort-icon-_pctBansos"></i></th>'
                        + '<th style="cursor:pointer;" onclick="sortTableRT(\'Jumlah_Penduduk_Putus_Sekolah\')">Jml Putus <i class="fas fa-sort text-muted ms-1" id="sort-icon-Jumlah_Penduduk_Putus_Sekolah"></i></th>'
                        + '<th style="cursor:pointer;" onclick="sortTableRT(\'_pctPutus\')">#6 % Putus <i class="fas fa-sort text-muted ms-1" id="sort-icon-_pctPutus"></i></th>'
                        + '<th style="cursor:pointer;" onclick="sortTableRT(\'_kepadatan\')">#7 Kepadatan <i class="fas fa-sort text-muted ms-1" id="sort-icon-_kepadatan"></i></th>'
                        + '<th style="cursor:pointer;" onclick="sortTableRT(\'_cntIbadah\')">Jml Ibadah <i class="fas fa-sort text-muted ms-1" id="sort-icon-_cntIbadah"></i></th>'
                        + '<th style="cursor:pointer;" onclick="sortTableRT(\'_ratioIbadah\')">#8 Ibadah/1k <i class="fas fa-sort text-muted ms-1" id="sort-icon-_ratioIbadah"></i></th>'
                        + '</tr>';
                }
            }
            renderTableRT(rawRTData);
        }

        function processAndRenderData(rt, fas) {
            rt = Array.isArray(rt) ? rt : [];
            fas = Array.isArray(fas) ? fas : [];

            // Map facilities count per RT
            var ibadahMap = {};
            fas.forEach(function(f) {
                var kat = (f.Kategori_Fasilitas || '').toLowerCase();
                if (kat.indexOf('ibadah') !== -1 || kat.indexOf('agama') !== -1) {
                    var rtKey = (f.RT || '').trim();
                    ibadahMap[rtKey] = (ibadahMap[rtKey] || 0) + 1;
                }
            });

            // Calculate per-RT metadata indicators
            rt.forEach(function(r) {
                var l = parseInt(r.Jumlah_Penduduk_Laki_Laki  || 0);
                var p = parseInt(r.Jumlah_Penduduk_Perempuan  || 0);
                var pop = l + p;
                var kk = parseInt(r.Jumlah_KK || 0);
                var bumbung = parseInt(r.Jumlah_Bumbung_Rumah || 0);
                var lansia = parseInt(r.Jumlah_Penduduk_Lansia || 0);
                var ktp = parseInt(r.Jumlah_Memiliki_KTP || 0);
                var bansos = parseInt(r.Jumlah_Penerima_PKH||0) + parseInt(r.Jumlah_Penerima_BPNT||0) + parseInt(r.Jumlah_Penerima_BLT||0) + parseInt(r.Jumlah_Penerima_BST||0);
                var putus = parseInt(r.Jumlah_Penduduk_Putus_Sekolah || 0);
                var anakSekolah = parseInt(r.Jumlah_Sekolah_TK||0) + parseInt(r.Jumlah_Sekolah_SD||0) + parseInt(r.Jumlah_Sekolah_SMP||0) + parseInt(r.Jumlah_Sekolah_SMA||0);

                r._totalPop     = pop;
                r._sexRatio     = p > 0 ? parseFloat((l / p * 100).toFixed(1)) : 0;
                r._artRata      = kk > 0 ? parseFloat((pop / kk).toFixed(2)) : 0;
                r._pctLansia    = pop > 0 ? parseFloat((lansia / pop * 100).toFixed(1)) : 0;
                r._pctKTP       = pop > 0 ? parseFloat((ktp / pop * 100).toFixed(1)) : 0;
                r._cntBansos    = bansos;
                r._pctBansos    = pop > 0 ? parseFloat((bansos / pop * 100).toFixed(1)) : 0;
                r._pctPutus     = anakSekolah > 0 ? parseFloat((putus / anakSekolah * 100).toFixed(1)) : 0;
                r._kepadatan    = bumbung > 0 ? parseFloat((pop / bumbung).toFixed(2)) : 0;

                var ibadahCount = ibadahMap[(r.Nama_RT || '').trim()] || 0;
                r._cntIbadah    = ibadahCount;
                r._ratioIbadah  = pop > 0 ? parseFloat((ibadahCount / pop * 1000).toFixed(2)) : 0;
            });

            rawRTData = rt.slice();
            rawFasData = fas.slice();

            var totalL=0, totalP=0, totalKK=0, totalBumbung=0, totalLansia=0, totalBansos=0, totalKTP=0, totalPutusSekolah=0, totalAnakSekolah=0;
            rt.forEach(function(r) {
                totalL       += parseInt(r.Jumlah_Penduduk_Laki_Laki  || 0);
                totalP       += parseInt(r.Jumlah_Penduduk_Perempuan  || 0);
                totalKK      += parseInt(r.Jumlah_KK                  || 0);
                totalBumbung += parseInt(r.Jumlah_Bumbung_Rumah       || 0);
                totalLansia  += parseInt(r.Jumlah_Penduduk_Lansia     || 0);
                totalKTP     += parseInt(r.Jumlah_Memiliki_KTP        || 0);
                totalPutusSekolah += parseInt(r.Jumlah_Penduduk_Putus_Sekolah || 0);
                totalAnakSekolah += parseInt(r.Jumlah_Sekolah_TK || 0)
                                  + parseInt(r.Jumlah_Sekolah_SD || 0)
                                  + parseInt(r.Jumlah_Sekolah_SMP || 0)
                                  + parseInt(r.Jumlah_Sekolah_SMA || 0);
                totalBansos  += parseInt(r.Jumlah_Penerima_PKH  || 0)
                             +  parseInt(r.Jumlah_Penerima_BPNT || 0)
                             +  parseInt(r.Jumlah_Penerima_BLT  || 0)
                             +  parseInt(r.Jumlah_Penerima_BST  || 0);
            });
            var totalPenduduk = totalL + totalP;
            var sexRatio      = totalP > 0 ? ((totalL / totalP) * 100).toFixed(1) : '-';
            var artRata       = totalKK > 0 ? (totalPenduduk / totalKK).toFixed(2) : '-';
            var kepadatan     = totalBumbung > 0 ? (totalPenduduk / totalBumbung).toFixed(2) : '-';
            var pctLansia     = totalPenduduk > 0 ? ((totalLansia / totalPenduduk) * 100).toFixed(1) : '-';
            var pctKTP        = totalPenduduk > 0 ? ((totalKTP / totalPenduduk) * 100).toFixed(1) : '-';
            var pctBansos     = totalPenduduk > 0 ? ((totalBansos / totalPenduduk) * 100).toFixed(1) : '-';
            var pctPutusSekolah = totalAnakSekolah > 0 ? ((totalPutusSekolah / totalAnakSekolah) * 100).toFixed(1) : '-';

            // Sarana ibadah count
            var countIbadah = 0;
            fas.forEach(function(f) {
                var kat = (f.Kategori_Fasilitas || '').toLowerCase();
                if (kat.indexOf('ibadah') !== -1 || kat.indexOf('agama') !== -1) countIbadah++;
            });
            var ratioIbadah = totalPenduduk > 0 ? ((countIbadah / totalPenduduk) * 1000).toFixed(2) : '-';

            // Top KPI Cards
            document.getElementById('kpi-penduduk').innerText  = totalPenduduk.toLocaleString('id-ID');
            document.getElementById('kpi-sexratio').innerText  = sexRatio;
            document.getElementById('kpi-kk').innerText        = totalKK.toLocaleString('id-ID');
            document.getElementById('kpi-art').innerText       = artRata + ' ART/KK';
            document.getElementById('kpi-bumbung').innerText   = totalBumbung.toLocaleString('id-ID');
            document.getElementById('kpi-kepadatan').innerText = kepadatan + ' Jiwa/Rumah';
            document.getElementById('kpi-lansia').innerText    = totalLansia.toLocaleString('id-ID');
            document.getElementById('kpi-pct-lansia').innerText = pctLansia + '%';
            document.getElementById('kpi-bansos').innerText    = totalBansos.toLocaleString('id-ID');
            document.getElementById('kpi-fasilitas').innerText = fas.length;

            // Metadata Indikator Tab elements (Modern Typography Format)
            if (document.getElementById('ind-val-sexratio')) document.getElementById('ind-val-sexratio').innerText = sexRatio;
            if (document.getElementById('ind-val-art'))      document.getElementById('ind-val-art').innerText = artRata;
            if (document.getElementById('ind-val-lansia'))   document.getElementById('ind-val-lansia').innerText = pctLansia + '%';
            if (document.getElementById('ind-val-ktp'))      document.getElementById('ind-val-ktp').innerText = pctKTP + '%';
            if (document.getElementById('ind-val-bansos'))   document.getElementById('ind-val-bansos').innerText = pctBansos + '%';
            if (document.getElementById('ind-val-putus-sekolah')) document.getElementById('ind-val-putus-sekolah').innerText = pctPutusSekolah + '%';
            if (document.getElementById('ind-val-kepadatan')) document.getElementById('ind-val-kepadatan').innerText = kepadatan;
            if (document.getElementById('ind-val-ibadah'))   document.getElementById('ind-val-ibadah').innerText = ratioIbadah;

            renderDemografiChart(rt);
            renderFasilitasChart(fas);
            renderMapMarkers(fas);

            // Default initial sort: Sort RT table by Nama_RT ascending
            sortTableRT('Nama_RT', true);
            sortTableFas('Nama_Fasilitas', true);
        }

        // Render Bar Chart: Sorted from Largest to Smallest total population
        function renderDemografiChart(rt) {
            var sorted = rt.slice().sort(function(a, b) {
                var popA = parseInt(a.Jumlah_Penduduk_Laki_Laki || 0) + parseInt(a.Jumlah_Penduduk_Perempuan || 0);
                var popB = parseInt(b.Jumlah_Penduduk_Laki_Laki || 0) + parseInt(b.Jumlah_Penduduk_Perempuan || 0);
                return popB - popA; // Descending order
            });

            var ctx = document.getElementById('chartDemografi').getContext('2d');
            if (chartDemografiInstance) chartDemografiInstance.destroy();
            chartDemografiInstance = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: sorted.slice(0,15).map(function(d) { return d.Nama_RT ? d.Nama_RT.replace('DUSUN ', '').replace('RW ', '') : 'RT'; }),
                    datasets: [
                        { label: 'Penduduk', data: sorted.slice(0,15).map(function(d) { return parseInt(d.Jumlah_Penduduk_Laki_Laki||0)+parseInt(d.Jumlah_Penduduk_Perempuan||0); }), backgroundColor: '#0D9488' },
                        { label: 'Jumlah KK', data: sorted.slice(0,15).map(function(d) { return parseInt(d.Jumlah_KK||0); }), backgroundColor: '#F59E0B' }
                    ]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: { position: 'top' },
                        title: { display: true, text: 'Top 15 RT Berdasarkan Total Penduduk (Terbesar → Terkecil)' }
                    }
                }
            });
        }

        function renderFasilitasChart(fas) {
            var ctx = document.getElementById('chartFasilitas').getContext('2d');
            if (chartFasilitasInstance) chartFasilitasInstance.destroy();
            var counts = {};
            fas.forEach(function(d) { var c = d.Kategori_Fasilitas || 'Lainnya'; counts[c] = (counts[c]||0)+1; });
            chartFasilitasInstance = new Chart(ctx, {
                type: 'doughnut',
                data: {
                    labels: Object.keys(counts),
                    datasets: [{ data: Object.values(counts), backgroundColor: ['#064E3B','#0D9488','#F59E0B','#3B82F6','#8B5CF6','#EC4899','#64748B'] }]
                },
                options: { responsive: true, maintainAspectRatio: false }
            });
        }

        function renderMapMarkers(fas) {
            markersLayer.clearLayers();
            var bounds = [];
            fas.forEach(function(f) {
                if (!f.Lokasi_GPS || f.Lokasi_GPS.indexOf(',') === -1) return;
                var parts = f.Lokasi_GPS.split(',');
                var lat = parseFloat(parts[0].trim());
                var lng = parseFloat(parts[1].trim());
                if (isNaN(lat) || isNaN(lng)) return;
                bounds.push([lat, lng]);
                var dirUrl = 'https://www.google.com/maps/dir/?api=1&destination=' + lat + ',' + lng;
                var html = '<div style="font-family:sans-serif;min-width:210px" class="p-1">'
                    + '<strong style="color:#064E3B;font-size:14px;">' + escHtml(f.Nama_Fasilitas) + '</strong><br>'
                    + '<small style="color:#555;">' + escHtml(f.Kategori_Fasilitas) + ' &ndash; ' + escHtml(f.Sub_Kategori) + '</small><br>'
                    + '<span style="background:#16a34a;color:white;padding:2px 8px;border-radius:4px;font-size:11px;display:inline-block;margin-top:4px;">' + escHtml(f.Kondisi_Bangunan) + '</span>'
                    + '<br><small style="color:#666;display:block;margin-top:2px;">RT: ' + escHtml(f.RT) + '</small>'
                    + '<a href="' + dirUrl + '" target="_blank" class="btn btn-sm btn-primary text-white rounded-pill w-100 mt-2 d-flex align-items-center justify-content-center gap-1" style="font-size:12px;padding:4px 10px;text-decoration:none;">'
                    + '<i class="fas fa-directions"></i> Petunjuk Rute (Google Maps)'
                    + '</a>'
                    + '</div>';
                L.marker([lat, lng]).addTo(markersLayer).bindPopup(html);
            });
            document.getElementById('map-count-badge').innerText = bounds.length + ' Fasilitas Terpetakan';
            if (bounds.length) map.fitBounds(bounds, { padding: [30, 30] });
        }

        function escHtml(s) { return (s || '-').replace(/&/g,'&amp;').replace(/</g,'&lt;').replace(/>/g,'&gt;').replace(/"/g,'&quot;'); }

        // Interactive Sorting for RT Table
        function sortTableRT(key, forceAsc) {
            if (forceAsc !== undefined) {
                sortRTAsc = forceAsc;
            } else if (sortRTKey === key) {
                sortRTAsc = !sortRTAsc;
            } else {
                sortRTKey = key;
                sortRTAsc = true;
            }

            // Reset all sort icons
            document.querySelectorAll('#table-rt th i').forEach(function(icon) {
                icon.className = 'fas fa-sort text-muted ms-1';
            });
            var targetIcon = document.getElementById('sort-icon-' + key);
            if (targetIcon) {
                targetIcon.className = sortRTAsc ? 'fas fa-sort-up text-primary ms-1' : 'fas fa-sort-down text-primary ms-1';
            }

            rawRTData.sort(function(a, b) {
                var valA, valB;
                if (key === 'total') {
                    valA = (parseInt(a.Jumlah_Penduduk_Laki_Laki||0) + parseInt(a.Jumlah_Penduduk_Perempuan||0));
                    valB = (parseInt(b.Jumlah_Penduduk_Laki_Laki||0) + parseInt(b.Jumlah_Penduduk_Perempuan||0));
                } else if (key.indexOf('_') === 0) {
                    // Pre-calculated indicator metric keys e.g. _sexRatio, _artRata
                    valA = parseFloat(a[key] || 0);
                    valB = parseFloat(b[key] || 0);
                } else if (['Jumlah_Penduduk_Laki_Laki', 'Jumlah_Penduduk_Perempuan', 'Jumlah_KK', 'Jumlah_Bumbung_Rumah', 'Jumlah_Penduduk_Lansia', 'Jumlah_Memiliki_KTP', 'Jumlah_Penduduk_Putus_Sekolah'].indexOf(key) !== -1) {
                    valA = parseInt(a[key] || 0);
                    valB = parseInt(b[key] || 0);
                } else {
                    valA = (a[key] || '').toString().toLowerCase();
                    valB = (b[key] || '').toString().toLowerCase();
                }

                if (valA < valB) return sortRTAsc ? -1 : 1;
                if (valA > valB) return sortRTAsc ? 1 : -1;
                return 0;
            });

            renderTableRT(rawRTData);
        }

        // Interactive Sorting for Fasilitas Table
        function sortTableFas(key, forceAsc) {
            if (forceAsc !== undefined) {
                sortFasAsc = forceAsc;
            } else if (sortFasKey === key) {
                sortFasAsc = !sortFasAsc;
            } else {
                sortFasKey = key;
                sortFasAsc = true;
            }

            document.querySelectorAll('#table-fas th i').forEach(function(icon) {
                icon.className = 'fas fa-sort text-muted ms-1';
            });
            var targetIcon = document.getElementById('sort-icon-' + key);
            if (targetIcon) {
                targetIcon.className = sortFasAsc ? 'fas fa-sort-up text-primary ms-1' : 'fas fa-sort-down text-primary ms-1';
            }

            rawFasData.sort(function(a, b) {
                var valA = (a[key] || '').toString().toLowerCase();
                var valB = (b[key] || '').toString().toLowerCase();
                if (valA < valB) return sortFasAsc ? -1 : 1;
                if (valA > valB) return sortFasAsc ? 1 : -1;
                return 0;
            });

            renderTableFas(rawFasData);
        }

        function renderTableRT(rt) {
            var tbody = document.querySelector('#table-rt tbody');
            if (!tbody) return;
            tbody.innerHTML = '';

            rt.forEach(function(r) {
                var tr = document.createElement('tr');
                if (currentRTMode === 'indikator') {
                    tr.innerHTML = '<td class="fw-bold">' + escHtml(r.Nama_RT) + '</td>'
                        + '<td><span class="badge bg-primary-subtle text-primary fw-bold">' + (r._sexRatio || 0) + '</span></td>'
                        + '<td><span class="badge bg-success-subtle text-success fw-bold">' + (r._artRata || 0) + '</span></td>'
                        + '<td class="fw-bold text-dark">' + (r.Jumlah_Penduduk_Lansia || 0) + '</td>'
                        + '<td><span class="badge bg-warning-subtle text-dark fw-bold">' + (r._pctLansia || 0) + '%</span></td>'
                        + '<td class="fw-bold text-dark">' + (r.Jumlah_Memiliki_KTP || 0) + '</td>'
                        + '<td><span class="badge bg-info-subtle text-info-emphasis fw-bold">' + (r._pctKTP || 0) + '%</span></td>'
                        + '<td class="fw-bold text-dark">' + (r._cntBansos || 0) + '</td>'
                        + '<td><span class="badge bg-danger-subtle text-danger fw-bold">' + (r._pctBansos || 0) + '%</span></td>'
                        + '<td class="fw-bold text-dark">' + (r.Jumlah_Penduduk_Putus_Sekolah || 0) + '</td>'
                        + '<td><span class="badge bg-dark-subtle text-dark fw-bold">' + (r._pctPutus || 0) + '%</span></td>'
                        + '<td><span class="badge bg-secondary-subtle text-secondary-emphasis fw-bold">' + (r._kepadatan || 0) + '</span></td>'
                        + '<td class="fw-bold text-dark">' + (r._cntIbadah || 0) + '</td>'
                        + '<td><span class="badge bg-teal-subtle text-teal fw-bold" style="background:#ccfbf1;color:#0f766e;">' + (r._ratioIbadah || 0) + '</span></td>';
                } else {
                    var total = parseInt(r.Jumlah_Penduduk_Laki_Laki||0) + parseInt(r.Jumlah_Penduduk_Perempuan||0);
                    tr.innerHTML = '<td class="fw-bold">' + escHtml(r.Nama_RT) + '</td>'
                        + '<td>' + escHtml(r.Nama_Ketua_RT) + '</td>'
                        + '<td>' + (r.Jumlah_Penduduk_Laki_Laki||0) + '</td>'
                        + '<td>' + (r.Jumlah_Penduduk_Perempuan||0) + '</td>'
                        + '<td class="fw-bold text-primary">' + total + '</td>'
                        + '<td>' + (r.Jumlah_KK||0) + '</td>'
                        + '<td>' + (r.Jumlah_Bumbung_Rumah||0) + '</td>'
                        + '<td>' + (r.Jumlah_Penduduk_Lansia||0) + '</td>'
                        + '<td>' + (r.Jumlah_Memiliki_KTP||0) + '</td>'
                        + '<td><span class="badge bg-success">' + escHtml(r.Status_Pendataan||'Selesai') + '</span></td>';
                }
                tbody.appendChild(tr);
            });
            filterTableRT();
        }

        function renderTableFas(fas) {
            var tbody = document.querySelector('#table-fas tbody');
            tbody.innerHTML = '';
            fas.forEach(function(r) {
                var dirBtn = '-';
                if (r.Lokasi_GPS && r.Lokasi_GPS.indexOf(',') !== -1) {
                    var p = r.Lokasi_GPS.split(',');
                    var lat = p[0].trim();
                    var lng = p[1].trim();
                    if (!isNaN(parseFloat(lat)) && !isNaN(parseFloat(lng))) {
                        var dirUrl = 'https://www.google.com/maps/dir/?api=1&destination=' + lat + ',' + lng;
                        dirBtn = '<a href="' + dirUrl + '" target="_blank" class="btn btn-xs btn-primary rounded-pill px-2 py-1 text-white text-nowrap" style="font-size:11px;">'
                            + '<i class="fas fa-directions me-1"></i> Rute'
                            + '</a>';
                    }
                }

                var tr = document.createElement('tr');
                tr.innerHTML = '<td><code>' + escHtml(r.ID_Fasilitas) + '</code></td>'
                    + '<td class="fw-bold">' + escHtml(r.Nama_Fasilitas) + '</td>'
                    + '<td><span class="badge bg-secondary">' + escHtml(r.Kategori_Fasilitas) + '</span></td>'
                    + '<td>' + escHtml(r.Sub_Kategori) + '</td>'
                    + '<td>' + escHtml(r.RT) + '</td>'
                    + '<td><span class="badge bg-success">' + escHtml(r.Kondisi_Bangunan||'Baik') + '</span></td>'
                    + '<td>' + escHtml(r.Sumber_Listrik) + '</td>'
                    + '<td>' + escHtml(r.Sumber_Air_Bersih) + '</td>'
                    + '<td>' + dirBtn + '</td>';
                tbody.appendChild(tr);
            });
            filterTableFas();
        }

        function filterTableRT() {
            var q = document.getElementById('search-rt').value.toLowerCase();
            document.querySelectorAll('#table-rt tbody tr').forEach(function(tr) {
                tr.style.display = tr.innerText.toLowerCase().indexOf(q) !== -1 ? '' : 'none';
            });
        }

        function filterTableFas() {
            var el = document.getElementById('search-fas');
            if (!el) return;
            var q = el.value.toLowerCase();
            document.querySelectorAll('#table-fas tbody tr').forEach(function(tr) {
                tr.style.display = tr.innerText.toLowerCase().indexOf(q) !== -1 ? '' : 'none';
            });
        }

        // CSV / Excel Data Export Logic
        function downloadCurrentTableCSV() {
            var activeTab = document.querySelector('#pills-tab .nav-link.active');
            var isRT = activeTab && (activeTab.getAttribute('data-bs-target') === '#pills-rt' || activeTab.innerText.indexOf('Daftar RT') !== -1);

            if (isRT) {
                exportRTToCSV();
            } else {
                exportFasToCSV();
            }
        }

        function exportRTToCSV() {
            if (!rawRTData || !rawRTData.length) {
                alert('Data RT belum siap diunduh.');
                return;
            }
            var rows = [];

            if (currentRTMode === 'indikator') {
                rows.push([
                    "Nama RT", "Sex Ratio (#1)", "ART/KK (#2)", "Jumlah Lansia", "Pct Lansia (#3)",
                    "Jumlah KTP-el", "Pct KTP-el (#4)", "Jumlah Bansos", "Pct Bansos (#5)",
                    "Jumlah Putus Sekolah", "Pct Putus Sekolah (#6)", "Kepadatan Jiwa/Rumah (#7)",
                    "Jumlah Sarana Ibadah", "Sarana Ibadah per 1k Jiwa (#8)"
                ]);
                rawRTData.forEach(function(r) {
                    rows.push([
                        r.Nama_RT || '', r._sexRatio || 0, r._artRata || 0, r.Jumlah_Penduduk_Lansia || 0, (r._pctLansia || 0) + '%',
                        r.Jumlah_Memiliki_KTP || 0, (r._pctKTP || 0) + '%', r._cntBansos || 0, (r._pctBansos || 0) + '%',
                        r.Jumlah_Penduduk_Putus_Sekolah || 0, (r._pctPutus || 0) + '%', r._kepadatan || 0,
                        r._cntIbadah || 0, r._ratioIbadah || 0
                    ]);
                });
            } else {
                rows.push([
                    "Nama RT", "Ketua RT", "Penduduk Laki-Laki", "Penduduk Perempuan", "Total Penduduk",
                    "Jumlah KK", "Jumlah Bumbung Rumah", "Jumlah Lansia", "Jumlah Memiliki KTP", "Status Pendataan"
                ]);
                rawRTData.forEach(function(r) {
                    var total = parseInt(r.Jumlah_Penduduk_Laki_Laki||0) + parseInt(r.Jumlah_Penduduk_Perempuan||0);
                    rows.push([
                        r.Nama_RT || '', r.Nama_Ketua_RT || '', r.Jumlah_Penduduk_Laki_Laki || 0, r.Jumlah_Penduduk_Perempuan || 0,
                        total, r.Jumlah_KK || 0, r.Jumlah_Bumbung_Rumah || 0, r.Jumlah_Penduduk_Lansia || 0,
                        r.Jumlah_Memiliki_KTP || 0, r.Status_Pendataan || 'Selesai'
                    ]);
                });
            }

            var fileName = currentRTMode === 'indikator' ? 'Indikator_SDI_RT_Sungai_Bakau_Kecil_2026.csv' : 'Data_Variabel_RT_Sungai_Bakau_Kecil_2026.csv';
            triggerCSVDownload(rows, fileName);
        }

        function exportFasToCSV() {
            if (!rawFasData || !rawFasData.length) {
                alert('Data Fasilitas belum siap diunduh.');
                return;
            }
            var rows = [
                ["ID Fasilitas", "Nama Fasilitas", "Kategori", "Sub Kategori", "RT", "Kondisi Bangunan", "Sumber Listrik", "Sumber Air Bersih", "Lokasi GPS"]
            ];
            rawFasData.forEach(function(r) {
                rows.push([
                    r.ID_Fasilitas || '', r.Nama_Fasilitas || '', r.Kategori_Fasilitas || '', r.Sub_Kategori || '',
                    r.RT || '', r.Kondisi_Bangunan || 'Baik', r.Sumber_Listrik || '', r.Sumber_Air_Bersih || '', r.Lokasi_GPS || ''
                ]);
            });
            triggerCSVDownload(rows, 'Data_Fasilitas_Sungai_Bakau_Kecil_2026.csv');
        }

        function triggerCSVDownload(rows, filename) {
            var csvContent = "\uFEFF" + rows.map(function(e) {
                return e.map(function(v) {
                    var str = (v === null || v === undefined) ? '' : String(v);
                    return '"' + str.replace(/"/g, '""') + '"';
                }).join(",");
            }).join("\r\n");

            var blob = new Blob([csvContent], { type: 'text/csv;charset=utf-8;' });
            var link = document.createElement("a");
            var url = URL.createObjectURL(blob);
            link.setAttribute("href", url);
            link.setAttribute("download", filename);
            document.body.appendChild(link);
            link.click();
            document.body.removeChild(link);
        }
    </script>
</body>
</html>
