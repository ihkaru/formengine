<x-layouts.app title="Desa Pasir Palembang - Desa Cinta Statistik 2026" description="Portal Resmi Desa Cantik 2026 Desa Pasir Palembang - BPS Kabupaten Mempawah">

    <header class="page-header text-center position-relative overflow-hidden" style="background: linear-gradient(135deg, rgba(6,78,59,0.92) 0%, rgba(13,148,136,0.88) 100%), url('{{ asset('images/pasirpalembang/kantor-desa.webp') }}') center/cover no-repeat; padding: 70px 0;">
        <div class="container">
            <div class="d-flex justify-content-center gap-2 mb-3">
                <span class="badge bg-warning text-dark px-3 py-2 rounded-pill fw-bold"><i class="fas fa-star me-1"></i> Desa Cantik 2026</span>
                <span class="badge bg-light text-dark px-3 py-2 rounded-pill fw-bold"><i class="fas fa-database me-1"></i> AppSheet Live Data</span>
            </div>
            <h1 class="fw-bold display-5 mb-2 text-white">Desa Pasir Palembang</h1>
            <p class="lead mx-auto text-white-50 mb-4" style="max-width:800px;">
                Kecamatan Mempawah Timur, Kabupaten Mempawah — Pendataan Potensi Kewilayahan RT &amp; Inventarisasi Fasilitas Umum Berbasis Satu Data Indonesia (SDI).
            </p>
            <div class="d-flex justify-content-center align-items-center flex-wrap gap-2">
                <div class="sync-wrap text-white small fw-semibold">
                    <i class="fas fa-sync fa-spin text-success" id="sync-icon"></i>
                    <span id="sync-status">Menghubungkan ke Google Sheets...</span>
                </div>
                <button class="btn btn-sm btn-light rounded-pill px-3 fw-bold" onclick="loadDataFromSheets(true)">
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

        <!-- KPI Cards (Reusable Component) -->
        <div class="row g-4 mb-5">
            <x-ui.kpi-card title="Total Penduduk" icon="fa-users" id="kpi-penduduk" sub-id="kpi-sexratio" sub-label="Sex Ratio" sub-color="text-primary" />
            <x-ui.kpi-card title="Rumah Tangga / KK" icon="fa-home" id="kpi-kk" sub-id="kpi-art" sub-label="ART Rata-rata" sub-color="text-success" />
            <x-ui.kpi-card title="Bumbung Rumah" icon="fa-building" id="kpi-bumbung" sub-id="kpi-kepadatan" sub-label="Kepadatan" sub-color="text-info" />
            <x-ui.kpi-card title="Putus Sekolah" icon="fa-user-graduate" id="kpi-putus" sub-label="Usia 7-18 Thn" sub-color="text-danger" />
            <x-ui.kpi-card title="Penerima Bansos" icon="fa-hand-holding-heart" id="kpi-bansos" sub-label="PKH/BPNT/BLT" />
            <x-ui.kpi-card title="Fasilitas Umum" icon="fa-map-marker-alt" id="kpi-fasilitas" sub-label="Terinventarisasi" />
        </div>

        <!-- Metadata SDI 2026 (Reusable Component) -->
        <x-widgets.sdi-metadata-tab village-name="Desa Pasir Palembang" :rt-count="14" :var-rt-count="26" :var-fas-count="15" :hide-lansia="true" />

        <!-- Flashcard Interaktif & Trivia Stats (Reusable Component) -->
        <x-widgets.flashcard-deck village-name="Desa Pasir Palembang" title="Flashcard Trivia &amp; Insights Data Desa Pasir Palembang" />

        <!-- Visualisasi Grafik Demografi & Fasilitas -->
        <div class="row g-4 mb-5">
            <div class="col-lg-6">
                <div class="card border-0 shadow-sm rounded-4 p-4 bg-white h-100">
                    <div class="d-flex justify-content-between align-items-center mb-3 flex-wrap gap-2">
                        <h5 class="fw-bold text-dark mb-0"><i class="fas fa-chart-bar me-2 text-primary"></i>Komposisi Demografi Per RT</h5>
                        <small class="text-muted extra-small"><i class="fas fa-arrows-alt-h me-1 text-primary"></i>Geser ke samping untuk melihat seluruh 14 RT</small>
                    </div>
                    <div class="overflow-x-auto w-100 pb-2">
                        <div style="height: 320px; min-width: 900px;" id="chartDemografiContainer">
                            <canvas id="chartDemografi"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card border-0 shadow-sm rounded-4 p-4 bg-white h-100">
                    <h5 class="fw-bold text-dark mb-3"><i class="fas fa-chart-pie me-2 text-success"></i>Persebaran Kategori Fasilitas Umum</h5>
                    <div style="height: 320px;">
                        <canvas id="chartFasilitas"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <!-- Map Section -->
        <div class="card border-0 shadow-sm rounded-4 mb-5 p-4 bg-white" id="peta">
            <div class="d-flex justify-content-between align-items-center mb-3 flex-wrap gap-2">
                <div>
                    <h4 class="fw-bold text-dark mb-1"><i class="fas fa-map-marked-alt me-2 text-primary"></i>Peta Persebaran Sarana &amp; Fasilitas Desa</h4>
                    <p class="text-muted small mb-0">Lokasi titik koordinat GPS tempat ibadah, sarana pendidikan, dan posyandu di Desa Pasir Palembang.</p>
                </div>
                <div class="d-flex gap-2">
                    <span class="badge bg-success rounded-pill px-3 py-2" id="map-counter-fas">0 Titik Fasilitas</span>
                </div>
            </div>
            <div id="map"></div>
        </div>

        <!-- Tabel Potensi RT & Indikator SDI -->
        <div class="card border-0 shadow-sm rounded-4 mb-5 p-4 bg-white" id="tabel-rt">
            <div class="d-flex justify-content-between align-items-center mb-3 flex-wrap gap-2">
                <div>
                    <h4 class="fw-bold text-dark mb-1"><i class="fas fa-table me-2 text-primary"></i>Tabel Potensi Kewilayahan RT</h4>
                    <p class="text-muted small mb-0">Rincian data agregat 14 RT dan perhitungan 8 Indikator Statistik Sektoral (SDI 2026).</p>
                </div>
                <div class="d-flex align-items-center gap-2 flex-wrap">
                    <div class="btn-group" role="group" aria-label="Mode Tabel RT">
                        <button type="button" class="btn btn-primary rounded-pill px-3 fw-semibold active" id="btn-mode-variabel" onclick="switchRTTableMode('variabel')">
                            <i class="fas fa-list me-1"></i> Mode Variabel Mentah
                        </button>
                        <button type="button" class="btn btn-outline-success rounded-pill px-3 fw-semibold" id="btn-mode-indikator" onclick="switchRTTableMode('indikator')">
                            <i class="fas fa-chart-line me-1"></i> Mode 8 Indikator SDI
                        </button>
                    </div>
                    <button type="button" class="btn btn-sm btn-outline-success rounded-pill px-3 fw-bold shadow-sm" onclick="exportRTToCSV()">
                        <i class="fas fa-file-excel me-1"></i> Unduh CSV/Excel
                    </button>
                    <div class="input-group input-group-sm" style="width: 220px;">
                        <span class="input-group-text bg-light border-end-0"><i class="fas fa-search text-muted"></i></span>
                        <input type="text" id="search-rt" class="form-control border-start-0 bg-light" placeholder="Cari Nama RT..." onkeyup="filterRTTable()">
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-hover align-middle small text-nowrap" id="table-rt">
                    <thead class="table-light user-select-none text-nowrap" id="table-rt-thead">
                        <tr>
                            <th style="cursor:pointer;" onclick="sortTableRT('Nama_RT')">Nama RT / SLS <i class="fas fa-sort text-muted ms-1" id="sort-icon-Nama_RT"></i></th>
                            <th style="cursor:pointer;" onclick="sortTableRT('Nama_Ketua_RT')">Ketua RT <i class="fas fa-sort text-muted ms-1" id="sort-icon-Nama_Ketua_RT"></i></th>
                            <th style="cursor:pointer;" onclick="sortTableRT('Jumlah_Penduduk_Laki_Laki')">L <i class="fas fa-sort text-muted ms-1" id="sort-icon-Jumlah_Penduduk_Laki_Laki"></i></th>
                            <th style="cursor:pointer;" onclick="sortTableRT('Jumlah_Penduduk_Perempuan')">P <i class="fas fa-sort text-muted ms-1" id="sort-icon-Jumlah_Penduduk_Perempuan"></i></th>
                            <th style="cursor:pointer;" onclick="sortTableRT('total')">Total <i class="fas fa-sort text-muted ms-1" id="sort-icon-total"></i></th>
                            <th style="cursor:pointer;" onclick="sortTableRT('Jumlah_KK')">KK <i class="fas fa-sort text-muted ms-1" id="sort-icon-Jumlah_KK"></i></th>
                            <th style="cursor:pointer;" onclick="sortTableRT('Jumlah_Bumbung_Rumah')">Bumbung Rumah <i class="fas fa-sort text-muted ms-1" id="sort-icon-Jumlah_Bumbung_Rumah"></i></th>
                            <th style="cursor:pointer;" onclick="sortTableRT('Jumlah_Penduduk_Putus_Sekolah')">Putus Sekolah <i class="fas fa-sort text-muted ms-1" id="sort-icon-Jumlah_Penduduk_Putus_Sekolah"></i></th>
                            <th style="cursor:pointer;" onclick="sortTableRT('Status_Pendataan')">Status <i class="fas fa-sort text-muted ms-1" id="sort-icon-Status_Pendataan"></i></th>
                        </tr>
                    </thead>
                    <tbody id="table-rt-tbody">
                        <tr><td colspan="9" class="text-center py-4 text-muted"><i class="fas fa-spinner fa-spin me-2"></i>Memuat data RT Pasir Palembang...</td></tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Tabel Fasilitas Umum -->
        <div class="card border-0 shadow-sm rounded-4 mb-5 p-4 bg-white" id="tabel-fasilitas">
            <div class="d-flex justify-content-between align-items-center mb-3 flex-wrap gap-2">
                <div>
                    <h4 class="fw-bold text-dark mb-1"><i class="fas fa-building me-2 text-primary"></i>Inventarisasi Fasilitas Umum &amp; Infrastruktur</h4>
                    <p class="text-muted small mb-0">Daftar sarana ibadah, sekolah, posyandu, dan kantor pemerintahan di Pasir Palembang.</p>
                </div>
                <div class="d-flex align-items-center gap-2 flex-wrap">
                    <button type="button" class="btn btn-sm btn-outline-success rounded-pill px-3 fw-bold shadow-sm" onclick="exportFasToCSV()">
                        <i class="fas fa-file-excel me-1"></i> Unduh CSV/Excel
                    </button>
                    <div class="input-group input-group-sm" style="width: 240px;">
                        <span class="input-group-text bg-light border-end-0"><i class="fas fa-search text-muted"></i></span>
                        <input type="text" id="search-fas" class="form-control border-start-0 bg-light" placeholder="Cari Fasilitas / Kategori..." onkeyup="filterFasTable()">
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-hover align-middle small text-nowrap" id="table-fas">
                    <thead class="table-light user-select-none">
                        <tr>
                            <th style="cursor:pointer;" onclick="sortTableFas('Nama_Fasilitas')">Nama Fasilitas <i class="fas fa-sort text-muted ms-1" id="sort-icon-fas-Nama_Fasilitas"></i></th>
                            <th style="cursor:pointer;" onclick="sortTableFas('Kategori_Fasilitas')">Kategori <i class="fas fa-sort text-muted ms-1" id="sort-icon-fas-Kategori_Fasilitas"></i></th>
                            <th style="cursor:pointer;" onclick="sortTableFas('RT')">Wilayah RT <i class="fas fa-sort text-muted ms-1" id="sort-icon-fas-RT"></i></th>
                            <th style="cursor:pointer;" onclick="sortTableFas('Kondisi_Bangunan')">Kondisi <i class="fas fa-sort text-muted ms-1" id="sort-icon-fas-Kondisi_Bangunan"></i></th>
                            <th style="cursor:pointer;" onclick="sortTableFas('Sumber_Listrik')">Listrik <i class="fas fa-sort text-muted ms-1" id="sort-icon-fas-Sumber_Listrik"></i></th>
                            <th style="cursor:pointer;" onclick="sortTableFas('Sumber_Air_Bersih')">Air Bersih <i class="fas fa-sort text-muted ms-1" id="sort-icon-fas-Sumber_Air_Bersih"></i></th>
                            <th>Rute Navigasi</th>
                        </tr>
                    </thead>
                    <tbody id="table-fas-tbody">
                        <tr><td colspan="7" class="text-center py-4 text-muted"><i class="fas fa-spinner fa-spin me-2"></i>Memuat data fasilitas...</td></tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Dukungan Pemkab (Reusable Component) -->
        <x-ui.dukungan-pemkab village-name="Desa Pasir Palembang" year="2026" />

        <!-- Publikasi Resmi & Booklet -->
        <div class="card border-0 shadow-sm rounded-4 mb-5 p-4 bg-white" id="publikasi">
            <div class="d-flex justify-content-between align-items-start align-items-sm-center mb-4 flex-wrap gap-2">
                <div>
                    <h4 class="fw-bold text-dark mb-1"><i class="fas fa-book-open me-2 text-primary"></i>Publikasi Resmi &amp; Booklet Profil Desa 2026</h4>
                    <p class="text-muted small mb-0">Dokumen publikasi dan analisis data potensi kewilayahan hasil pendataan Desa Cantik Pasir Palembang 2026.</p>
                </div>
                <span class="badge bg-primary px-3 py-2 rounded-pill">SDI Compliant</span>
            </div>
            <div class="row g-4">
                <div class="col-md-6 col-lg-4">
                    <div class="card h-100 border rounded-4 shadow-sm p-3 text-center">
                        <div class="bg-light rounded-3 p-4 mb-3 d-flex align-items-center justify-content-center" style="height: 180px;">
                            <i class="fas fa-file-pdf text-danger display-4"></i>
                        </div>
                        <h5 class="fw-bold text-dark mb-1">Desa Pasir Palembang Dalam Angka 2026</h5>
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
                        <p class="text-muted small mb-3">Ringkasan grafis dan peta persebaran fasilitas umum di Pasir Palembang.</p>
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
        <!-- Section Placeholder 1: Produk Statistik & SOP Permintaan Data -->
        <div class="card border-0 shadow-sm rounded-4 mb-5 p-4 bg-white border-start border-4 border-warning" id="sop-layanan">
            <div class="d-flex justify-content-between align-items-start align-items-sm-center mb-3 flex-wrap gap-2">
                <div>
                    <h4 class="fw-bold text-dark mb-1"><i class="fas fa-concierge-bell me-2 text-primary"></i>Produk Statistik &amp; SOP Layanan Data Publik</h4>
                    <p class="text-muted small mb-0">Layanan aksesibilitas data bagi masyarakat, akademisi, dan perangkat daerah Kabupaten Mempawah.</p>
                </div>
                <span class="badge bg-warning text-dark font-monospace px-3 py-2 rounded-pill"><i class="fas fa-exclamation-triangle me-1"></i> PLACEHOLDER — Dalam Penyusunan Dokumen</span>
            </div>

            <div class="alert alert-warning border-0 bg-warning-subtle text-dark rounded-4 p-3 mb-4 d-flex align-items-center gap-3">
                <i class="fas fa-info-circle fa-2x text-warning flex-shrink-0"></i>
                <div class="small">
                    <strong>Catatan Status Section:</strong> File fisik Monografi, Infografis, dan SOP Layanan Data Desa Pasir Palembang saat ini dalam tahap finalisasi penyusunan oleh Tim Desa Cantik &amp; BPS Mempawah.
                </div>
            </div>

            <div class="row g-4">
                <!-- Monografi Placeholder -->
                <div class="col-lg-3 col-md-6">
                    <div class="p-3 border border-warning border-dashed rounded-4 h-100 bg-light text-center d-flex flex-column">
                        <div class="mb-3 text-warning d-flex align-items-center justify-content-center bg-white rounded-3 border" style="height: 130px;">
                            <i class="fas fa-file-invoice fa-3x"></i>
                        </div>
                        <h6 class="fw-bold text-dark mb-1">Monografi Pasir Palembang</h6>
                        <p class="extra-small text-muted mb-3">Profil umum kependudukan &amp; infrastruktur desa (Tahap Draf).</p>
                        <div class="mt-auto d-grid gap-2">
                            <button class="btn btn-sm btn-outline-warning text-dark rounded-pill disabled" disabled><i class="fas fa-clock me-1"></i> Belum Tersedia</button>
                        </div>
                    </div>
                </div>
                <!-- Infografis Placeholder -->
                <div class="col-lg-3 col-md-6">
                    <div class="p-3 border border-warning border-dashed rounded-4 h-100 bg-light text-center d-flex flex-column">
                        <div class="mb-3 text-warning d-flex align-items-center justify-content-center bg-white rounded-3 border" style="height: 130px;">
                            <i class="fas fa-chart-pie fa-3x"></i>
                        </div>
                        <h6 class="fw-bold text-dark mb-1">Infografis Demografi</h6>
                        <p class="extra-small text-muted mb-3">Visualisasi ringkas poster statistik desa (Tahap Desain).</p>
                        <div class="mt-auto d-grid gap-2">
                            <button class="btn btn-sm btn-outline-warning text-dark rounded-pill disabled" disabled><i class="fas fa-clock me-1"></i> Belum Tersedia</button>
                        </div>
                    </div>
                </div>
                <!-- Spreadsheet Placeholder -->
                <div class="col-lg-3 col-md-6">
                    <div class="p-3 border border-warning border-dashed rounded-4 h-100 bg-light text-center d-flex flex-column">
                        <div class="mb-3 text-warning d-flex align-items-center justify-content-center bg-white rounded-3 border" style="height: 130px;">
                            <i class="fas fa-file-excel fa-3x"></i>
                        </div>
                        <h6 class="fw-bold text-dark mb-1">Dataset Excel (SDI)</h6>
                        <p class="extra-small text-muted mb-3">Tabel kompilasi potensi RT &amp; Fasilitas umum.</p>
                        <div class="mt-auto d-grid gap-2">
                            <button class="btn btn-sm btn-outline-warning text-dark rounded-pill disabled" disabled><i class="fas fa-clock me-1"></i> Belum Tersedia</button>
                        </div>
                    </div>
                </div>
                <!-- SOP Permintaan Data Placeholder -->
                <div class="col-lg-3 col-md-6">
                    <div class="p-3 border border-warning border-dashed rounded-4 h-100 bg-light text-center d-flex flex-column">
                        <div class="mb-3 text-warning d-flex align-items-center justify-content-center bg-white rounded-3 border" style="height: 130px;">
                            <i class="fas fa-clipboard-list fa-3x"></i>
                        </div>
                        <h6 class="fw-bold text-dark mb-1">SOP Permintaan Data</h6>
                        <p class="extra-small text-muted mb-3">Formulir SOP &amp; pengajuan data publik resmi.</p>
                        <div class="mt-auto d-grid gap-2">
                            <button class="btn btn-sm btn-outline-warning text-dark rounded-pill disabled" disabled><i class="fas fa-clock me-1"></i> Belum Tersedia</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Section Placeholder 2: Galeri Dokumentasi Kegiatan Lapangan -->
        <div class="card border-0 shadow-sm rounded-4 mb-5 p-4 bg-white border-start border-4 border-warning" id="dokumentasi">
            <div class="d-flex justify-content-between align-items-start align-items-sm-center mb-3 flex-wrap gap-2">
                <div>
                    <h4 class="fw-bold text-dark mb-1"><i class="fas fa-camera me-2 text-primary"></i>Dokumentasi Kegiatan Pendataan Lapangan</h4>
                    <p class="text-muted small mb-0">Proses pembekalan, pelatihan CAPI, dan pendataan lapangan Agen Statistik Pasir Palembang.</p>
                </div>
                <span class="badge bg-success text-white font-monospace px-3 py-2 rounded-pill"><i class="fas fa-camera me-1"></i> Dokumentasi Lapangan 2026</span>
            </div>

            <div class="row g-3">
                <div class="col-md-6 col-lg-3">
                    <div class="border rounded-4 overflow-hidden shadow-sm h-100 bg-white p-2 text-center d-flex flex-column" onclick="openImagePreviewModal('{{ asset('images/pasirpalembang/kantor-desa.webp') }}', 'Kantor Desa Pasir Palembang', 'Tampak depan posko &amp; kantor Desa Cantik Pasir Palembang 2026.')" style="cursor: pointer;">
                        <div class="overflow-hidden rounded-3 mb-2" style="height: 140px;">
                            <img src="{{ asset('images/pasirpalembang/kantor-desa.webp') }}" class="w-100 h-100 object-fit-cover hover-zoom" alt="Kantor Desa Pasir Palembang">
                        </div>
                        <h6 class="fw-bold text-dark mb-1">Kantor Desa Pasir Palembang</h6>
                        <span class="badge bg-success-subtle text-success extra-small">Tampak Depan</span>
                        <p class="extra-small text-muted mt-1 mb-0">Posko data &amp; sekretariat Desa Cantik Pasir Palembang 2026.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="border border-warning border-dashed rounded-4 overflow-hidden shadow-sm h-100 bg-light p-3 text-center d-flex flex-column justify-content-center align-items-center" style="min-height: 220px;">
                        <i class="fas fa-user-graduate fa-3x text-warning mb-2"></i>
                        <h6 class="fw-bold text-dark mb-1">Foto Pembekalan CAPI</h6>
                        <span class="badge bg-warning text-dark extra-small">[PLACEHOLDER FOTO #2]</span>
                        <p class="extra-small text-muted mt-2 mb-0">Pembekalan CAPI AppSheet bagi Agen Statistik Desa.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="border border-warning border-dashed rounded-4 overflow-hidden shadow-sm h-100 bg-light p-3 text-center d-flex flex-column justify-content-center align-items-center" style="min-height: 220px;">
                        <i class="fas fa-comments fa-3x text-warning mb-2"></i>
                        <h6 class="fw-bold text-dark mb-1">Foto Wawancara Keluarga CAPI</h6>
                        <span class="badge bg-warning text-dark extra-small">[PLACEHOLDER FOTO #3]</span>
                        <p class="extra-small text-muted mt-2 mb-0">Wawancara CAPI mikro bangunan &amp; rumah tangga.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="border border-warning border-dashed rounded-4 overflow-hidden shadow-sm h-100 bg-light p-3 text-center d-flex flex-column justify-content-center align-items-center" style="min-height: 220px;">
                        <i class="fas fa-map-marker-alt fa-3x text-warning mb-2"></i>
                        <h6 class="fw-bold text-dark mb-1">Foto Tagging GPS Fasilitas</h6>
                        <span class="badge bg-warning text-dark extra-small">[PLACEHOLDER FOTO #4]</span>
                        <p class="extra-small text-muted mt-2 mb-0">Observasi geospasial &amp; inventarisasi GPS sarana desa.</p>
                    </div>
                </div>
            </div>
        </div>

    <!-- Modal Preview Foto Tampilan Besar (Lightbox Reusable Component) -->
    <x-ui.image-modal />

    <!-- Script Logic -->
    <script>
        var map, markersLayer;
        var chartDemografi, chartFasilitas;

        document.addEventListener('DOMContentLoaded', function() {
            initMap();
            loadDataFromSheets();
        });

        function initMap() {
            // Coordinate Pasir Palembang: ~0.346, 108.980
            map = L.map('map').setView([0.346, 108.980], 14);
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; OpenStreetMap contributors'
            }).addTo(map);

            markersLayer = L.layerGroup().addTo(map);
        }

        async function loadDataFromSheets(isManualSync) {
            var syncStatus = document.getElementById('sync-status');
            var syncIcon   = document.getElementById('sync-icon');
            if (syncIcon) syncIcon.classList.add('fa-spin');
            if (syncStatus) syncStatus.innerText = 'Menyinkronkan data Google Sheets Pasir Palembang...';

            var rtData = null, fasData = null;
            var queryParam = isManualSync ? '?refresh=1' : '';

            try {
                var resRT = await fetch('/desa-cantik/api/pasirpalembang/Appsheet_RT' + queryParam);
                if (resRT.ok) {
                    var jsonRT = await resRT.json();
                    if (Array.isArray(jsonRT)) rtData = jsonRT;
                }
                var resFas = await fetch('/desa-cantik/api/pasirpalembang/Appsheet_Fasilitas' + queryParam);
                if (resFas.ok) {
                    var jsonFas = await resFas.json();
                    if (Array.isArray(jsonFas)) fasData = jsonFas;
                }
            } catch(e) {
                console.warn('Live fetch failed:', e);
            }

            if (!Array.isArray(rtData) || !rtData.length) rtData = [];
            if (!Array.isArray(fasData) || !fasData.length) fasData = [];

            if (syncStatus) syncStatus.innerText = 'Terhubung Live (Last sync: ' + new Date().toLocaleTimeString('id-ID') + ')';
            if (syncIcon) syncIcon.classList.remove('fa-spin');
            processAndRenderData(rtData, fasData);
        }

        var rawRTData = [];
        var rawFasData = [];
        var currentRTMode = 'variabel';
        var sortRTKey = 'Nama_RT';
        var sortRTAsc = true;
        var sortFasKey = 'Nama_Fasilitas';
        var sortFasAsc = true;

        function processAndRenderData(rtList, fasList) {
            rawRTData = rtList;
            rawFasData = fasList;

            // Recalculate KPIs
            var totalPenduduk = 0, totalLaki = 0, totalPerempuan = 0;
            var totalKK = 0, totalBumbung = 0, totalKTP = 0, totalBansos = 0, totalPutus = 0;

            rtList.forEach(function(item) {
                var l = parseInt(item['Jumlah Orang Laki-Laki di Rumah'] || item['Jumlah_Penduduk_Laki_Laki'] || 0) || 0;
                var p = parseInt(item['Jumlah Orang Perempuan di Rumah'] || item['Jumlah_Penduduk_Perempuan'] || 0) || 0;
                totalLaki += l;
                totalPerempuan += p;
                totalPenduduk += (l + p);

                totalKK += parseInt(item['Jumlah Kartu Keluarga'] || item['Jumlah_KK'] || 0) || 0;
                totalBumbung += parseInt(item['Nomor Bangunan'] || item['Jumlah_Bumbung_Rumah'] || 0) || 0;
                totalKTP += parseInt(item['Jumlah_Memiliki_KTP'] || 0) || 0;
                totalPutus += parseInt(item['Jumlah_Penduduk_Putus_Sekolah'] || 0) || 0;

                var pkh = parseInt(item['Jumlah_Penerima_PKH'] || 0) || 0;
                var bpnt = parseInt(item['Jumlah_Penerima_BPNT'] || 0) || 0;
                var blt = parseInt(item['Jumlah_Penerima_BLT'] || 0) || 0;
                totalBansos += (pkh + bpnt + blt);
            });

            var countIbadah = 0;
            fasList.forEach(function(f) {
                var kat = (getProp(f, ['Kategori_Fasilitas', 'Kategori', 'Sub_Kategori']) || '').toLowerCase();
                if (kat.indexOf('ibadah') !== -1 || kat.indexOf('agama') !== -1) countIbadah++;
            });

            if (document.getElementById('kpi-penduduk')) document.getElementById('kpi-penduduk').innerText = totalPenduduk.toLocaleString('id-ID');
            if (document.getElementById('kpi-kk')) document.getElementById('kpi-kk').innerText = totalKK.toLocaleString('id-ID');
            if (document.getElementById('kpi-bumbung')) document.getElementById('kpi-bumbung').innerText = totalBumbung.toLocaleString('id-ID');
            if (document.getElementById('kpi-putus')) document.getElementById('kpi-putus').innerText = totalPutus.toLocaleString('id-ID');
            if (document.getElementById('kpi-bansos')) document.getElementById('kpi-bansos').innerText = totalBansos.toLocaleString('id-ID');
            if (document.getElementById('kpi-fasilitas')) document.getElementById('kpi-fasilitas').innerText = fasList.length.toLocaleString('id-ID');

            var sexRatio = totalPerempuan > 0 ? ((totalLaki / totalPerempuan) * 100).toFixed(1) : '-';
            var artRata = totalKK > 0 ? (totalPenduduk / totalKK).toFixed(2) : '-';
            var kepadatan = totalBumbung > 0 ? (totalPenduduk / totalBumbung).toFixed(2) : '-';
            var pctKtp = totalPenduduk > 0 ? ((totalKTP / totalPenduduk) * 100).toFixed(1) + '%' : '-';
            var pctBansos = totalKK > 0 ? ((totalBansos / totalKK) * 100).toFixed(1) + '%' : '-';
            var pctPutus = totalPenduduk > 0 ? ((totalPutus / totalPenduduk) * 100).toFixed(1) + '%' : '-';
            var ratioIbadah = totalPenduduk > 0 ? ((countIbadah / totalPenduduk) * 1000).toFixed(2) : '-';

            if (document.getElementById('kpi-sexratio')) document.getElementById('kpi-sexratio').innerText = sexRatio;
            if (document.getElementById('kpi-art')) document.getElementById('kpi-art').innerText = artRata;
            if (document.getElementById('kpi-kepadatan')) document.getElementById('kpi-kepadatan').innerText = kepadatan;

            // Indikator SDI Metadata Tab
            if (document.getElementById('ind-val-sexratio')) document.getElementById('ind-val-sexratio').innerText = sexRatio;
            if (document.getElementById('ind-val-art')) document.getElementById('ind-val-art').innerText = artRata;
            if (document.getElementById('ind-val-ktp')) document.getElementById('ind-val-ktp').innerText = pctKtp;
            if (document.getElementById('ind-val-bansos')) document.getElementById('ind-val-bansos').innerText = pctBansos;
            if (document.getElementById('ind-val-putus-sekolah')) document.getElementById('ind-val-putus-sekolah').innerText = pctPutus;
            if (document.getElementById('ind-val-kepadatan')) document.getElementById('ind-val-kepadatan').innerText = kepadatan;
            if (document.getElementById('ind-val-ibadah')) document.getElementById('ind-val-ibadah').innerText = ratioIbadah;

            // Render Flashcards & Tables & Map
            renderFlashcards(rtList, fasList);
            renderTableRT();
            renderTableFas();
            renderMapMarkers(fasList);
            renderCharts(rtList, fasList);
        }

        function getProp(obj, keys, defaultVal) {
            if (!obj || typeof obj !== 'object') return defaultVal || '';
            for (var i = 0; i < keys.length; i++) {
                var k = keys[i];
                if (obj[k] !== undefined && obj[k] !== null && String(obj[k]).trim() !== '') {
                    return String(obj[k]).trim();
                }
            }
            var objKeys = Object.keys(obj);
            for (var j = 0; j < keys.length; j++) {
                var targetKey = keys[j].toLowerCase().replace(/_/g, '').replace(/\//g, '').replace(/\s+/g, '');
                for (var k = 0; k < objKeys.length; k++) {
                    var actualKey = objKeys[k].toLowerCase().replace(/_/g, '').replace(/\//g, '').replace(/\s+/g, '');
                    if (targetKey === actualKey && obj[objKeys[k]] !== undefined && obj[objKeys[k]] !== null && String(obj[objKeys[k]]).trim() !== '') {
                        return String(obj[objKeys[k]]).trim();
                    }
                }
            }
            return defaultVal || '';
        }

        function switchRTTableMode(mode) {
            currentRTMode = mode;
            var btnVar = document.getElementById('btn-mode-variabel');
            var btnInd = document.getElementById('btn-mode-indikator');
            var thead = document.getElementById('table-rt-thead');

            if (mode === 'variabel') {
                if (btnVar) btnVar.className = 'btn btn-primary rounded-pill px-3 fw-semibold active';
                if (btnInd) btnInd.className = 'btn btn-outline-success rounded-pill px-3 fw-semibold';
                if (thead) {
                    thead.className = 'table-light user-select-none text-nowrap';
                    thead.innerHTML = '<tr>'
                        + '<th style="cursor:pointer;" onclick="sortTableRT(\'Nama_RT\')">Nama RT / SLS <i class="fas fa-sort text-muted ms-1" id="sort-icon-Nama_RT"></i></th>'
                        + '<th style="cursor:pointer;" onclick="sortTableRT(\'Nama_Ketua_RT\')">Ketua RT <i class="fas fa-sort text-muted ms-1" id="sort-icon-Nama_Ketua_RT"></i></th>'
                        + '<th style="cursor:pointer;" onclick="sortTableRT(\'Jumlah_Penduduk_Laki_Laki\')">L <i class="fas fa-sort text-muted ms-1" id="sort-icon-Jumlah_Penduduk_Laki_Laki"></i></th>'
                        + '<th style="cursor:pointer;" onclick="sortTableRT(\'Jumlah_Penduduk_Perempuan\')">P <i class="fas fa-sort text-muted ms-1" id="sort-icon-Jumlah_Penduduk_Perempuan"></i></th>'
                        + '<th style="cursor:pointer;" onclick="sortTableRT(\'total\')">Total <i class="fas fa-sort text-muted ms-1" id="sort-icon-total"></i></th>'
                        + '<th style="cursor:pointer;" onclick="sortTableRT(\'Jumlah_KK\')">KK <i class="fas fa-sort text-muted ms-1" id="sort-icon-Jumlah_KK"></i></th>'
                        + '<th style="cursor:pointer;" onclick="sortTableRT(\'Jumlah_Bumbung_Rumah\')">Bumbung Rumah <i class="fas fa-sort text-muted ms-1" id="sort-icon-Jumlah_Bumbung_Rumah"></i></th>'
                        + '<th style="cursor:pointer;" onclick="sortTableRT(\'Jumlah_Penduduk_Putus_Sekolah\')">Putus Sekolah <i class="fas fa-sort text-muted ms-1" id="sort-icon-Jumlah_Penduduk_Putus_Sekolah"></i></th>'
                        + '<th style="cursor:pointer;" onclick="sortTableRT(\'Status_Pendataan\')">Status <i class="fas fa-sort text-muted ms-1" id="sort-icon-Status_Pendataan"></i></th>'
                        + '</tr>';
                }
            } else {
                if (btnVar) btnVar.className = 'btn btn-outline-primary rounded-pill px-3 fw-semibold';
                if (btnInd) btnInd.className = 'btn btn-success rounded-pill px-3 fw-semibold active';
                if (thead) {
                    thead.className = 'table-success user-select-none text-nowrap';
                    thead.innerHTML = '<tr>'
                        + '<th style="cursor:pointer;" onclick="sortTableRT(\'Nama_RT\')">Nama RT / SLS <i class="fas fa-sort text-muted ms-1" id="sort-icon-Nama_RT"></i></th>'
                        + '<th style="cursor:pointer;" onclick="sortTableRT(\'_sexRatio\')">#1 Sex Ratio <i class="fas fa-sort text-muted ms-1" id="sort-icon-_sexRatio"></i></th>'
                        + '<th style="cursor:pointer;" onclick="sortTableRT(\'_artRata\')">#2 ART/KK <i class="fas fa-sort text-muted ms-1" id="sort-icon-_artRata"></i></th>'
                        + '<th style="cursor:pointer;" onclick="sortTableRT(\'_pctBansos\')">#3 Bansos (%) <i class="fas fa-sort text-muted ms-1" id="sort-icon-_pctBansos"></i></th>'
                        + '<th style="cursor:pointer;" onclick="sortTableRT(\'_pctPutus\')">#4 Putus Sek (%) <i class="fas fa-sort text-muted ms-1" id="sort-icon-_pctPutus"></i></th>'
                        + '<th style="cursor:pointer;" onclick="sortTableRT(\'_kepadatan\')">#5 Kepadatan <i class="fas fa-sort text-muted ms-1" id="sort-icon-_kepadatan"></i></th>'
                        + '<th style="cursor:pointer;" onclick="sortTableRT(\'_ratioIbadah\')">#6 Ibadah / 1k Jiwa <i class="fas fa-sort text-muted ms-1" id="sort-icon-_ratioIbadah"></i></th>'
                        + '</tr>';
                }
            }
            renderTableRT();
        }

        function renderTableRT() {
            var tbody = document.getElementById('table-rt-tbody');
            if (!tbody) return;

            if (!rawRTData.length) {
                tbody.innerHTML = '<tr><td colspan="9" class="text-center py-4 text-muted">Belum ada data RT.</td></tr>';
                return;
            }

            var html = '';
            rawRTData.forEach(function(item) {
                var namaRT = item['Nama_RT'] || item['Nama RT'] || 'RT -';
                var namaKetua = item['Nama_Ketua_RT'] || item['Nama Ketua RT'] || '-';
                var l = parseInt(item['Jumlah_Penduduk_Laki_Laki'] || item['Jumlah Orang Laki-Laki di Rumah'] || 0) || 0;
                var p = parseInt(item['Jumlah_Penduduk_Perempuan'] || item['Jumlah Orang Perempuan di Rumah'] || 0) || 0;
                var total = l + p;
                var kk = parseInt(item['Jumlah_KK'] || item['Jumlah Kartu Keluarga'] || 0) || 0;
                var bumbung = parseInt(item['Jumlah_Bumbung_Rumah'] || item['Nomor Bangunan'] || 0) || 0;
                var putus = parseInt(item['Jumlah_Penduduk_Putus_Sekolah'] || 0) || 0;
                var status = item['Status_Pendataan'] || 'Selesai';

                if (currentRTMode === 'variabel') {
                    html += '<tr>'
                        + '<td><strong>' + namaRT + '</strong></td>'
                        + '<td>' + namaKetua + '</td>'
                        + '<td>' + l + '</td>'
                        + '<td>' + p + '</td>'
                        + '<td><span class="badge bg-primary rounded-pill">' + total + '</span></td>'
                        + '<td>' + kk + '</td>'
                        + '<td>' + bumbung + '</td>'
                        + '<td>' + putus + '</td>'
                        + '<td><span class="badge bg-success-subtle text-success border border-success-subtle rounded-pill">' + status + '</span></td>'
                        + '</tr>';
                } else {
                    var sr = p > 0 ? ((l / p) * 100).toFixed(1) : '-';
                    var art = kk > 0 ? (total / kk).toFixed(2) : '-';
                    var bansos = (parseInt(item['Jumlah_Penerima_PKH'] || 0) + parseInt(item['Jumlah_Penerima_BPNT'] || 0) + parseInt(item['Jumlah_Penerima_BLT'] || 0));
                    var pctBansos = kk > 0 ? ((bansos / kk) * 100).toFixed(1) + '%' : '-';
                    var pctPutus = total > 0 ? ((putus / total) * 100).toFixed(1) + '%' : '-';
                    var kep = bumbung > 0 ? (total / bumbung).toFixed(2) : '-';
                    var ratioIbadah = total > 0 ? ((1 / total) * 1000).toFixed(2) : '-';

                    html += '<tr>'
                        + '<td><strong>' + namaRT + '</strong></td>'
                        + '<td><span class="badge bg-primary-subtle text-primary fw-bold">' + sr + '</span></td>'
                        + '<td><span class="badge bg-success-subtle text-success fw-bold">' + art + '</span></td>'
                        + '<td><span class="badge bg-danger-subtle text-danger fw-bold">' + pctBansos + '</span></td>'
                        + '<td><span class="badge bg-dark-subtle text-dark fw-bold">' + pctPutus + '</span></td>'
                        + '<td><span class="badge bg-secondary-subtle text-secondary-emphasis fw-bold">' + kep + '</span></td>'
                        + '<td><span class="badge bg-teal-subtle text-teal fw-bold" style="background:#ccfbf1;color:#0f766e;">' + ratioIbadah + '</span></td>'
                        + '</tr>';
                }
            });
            tbody.innerHTML = html;
        }

        function renderTableFas() {
            var tbody = document.getElementById('table-fas-tbody');
            if (!tbody) return;

            if (!rawFasData.length) {
                tbody.innerHTML = '<tr><td colspan="7" class="text-center py-4 text-muted">Belum ada data fasilitas.</td></tr>';
                return;
            }

            var html = '';
            rawFasData.forEach(function(item) {
                var namaFas = getProp(item, ['Nama_Fasilitas', 'Nama Fasilitas', 'Nama Sarana', 'Nama'], 'Fasilitas');
                var kat = getProp(item, ['Kategori_Fasilitas', 'Kategori Fasilitas', 'Sub_Kategori', 'Sub Kategori', 'Kategori'], 'Lainnya');
                var rt = getProp(item, ['RT', 'Wilayah RT', 'Nama_RT', 'Nama RT', 'SLS'], '-');
                var kondisi = getProp(item, ['Kondisi_Bangunan_Jalan', 'Kondisi_Bangunan', 'Kondisi Bangunan', 'Kondisi'], 'Baik');
                var listrik = getProp(item, ['Sumber_Listrik', 'Sumber Listrik', 'Listrik'], 'PLN 24 Jam');
                var air = getProp(item, ['Sumber_Air_Bersih', 'Sumber Air Bersih', 'Air'], 'Sumur Bor/Pompa');
                var navBtn = '-';
                var gps = getProp(item, ['Lokasi_GPS', 'Lokasi GPS', 'Koordinat', 'Geotagging'], '');
                if (gps) {
                    var parts = gps.split(',');
                    if (parts.length === 2) {
                        var lat = parseFloat(parts[0].trim());
                        var lng = parseFloat(parts[1].trim());
                        if (!isNaN(lat) && !isNaN(lng)) {
                            var dirUrl = 'https://www.google.com/maps/dir/?api=1&destination=' + lat + ',' + lng;
                            navBtn = '<a href="' + dirUrl + '" target="_blank" class="btn btn-xs btn-primary rounded-pill px-2 py-1 text-white text-nowrap" style="font-size:11px;">'
                                + '<i class="fas fa-directions me-1"></i> Rute'
                                + '</a>';
                        }
                    }
                }

                html += '<tr>'
                    + '<td><strong>' + namaFas + '</strong></td>'
                    + '<td><span class="badge bg-secondary rounded-pill">' + kat + '</span></td>'
                    + '<td>' + rt + '</td>'
                    + '<td><span class="badge bg-success-subtle text-success border border-success-subtle rounded-pill">' + kondisi + '</span></td>'
                    + '<td>' + listrik + '</td>'
                    + '<td>' + air + '</td>'
                    + '<td>' + navBtn + '</td>'
                    + '</tr>';
            });
            tbody.innerHTML = html;
        }

        function sortTableRT(key, forceAsc) {
            if (forceAsc !== undefined) {
                sortRTAsc = forceAsc;
            } else if (sortRTKey === key) {
                sortRTAsc = !sortRTAsc;
            } else {
                sortRTKey = key;
                sortRTAsc = true;
            }

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
                    valA = (parseInt(a['Jumlah_Penduduk_Laki_Laki'] || a['Jumlah Orang Laki-Laki di Rumah'] || 0) + parseInt(a['Jumlah_Penduduk_Perempuan'] || a['Jumlah Orang Perempuan di Rumah'] || 0));
                    valB = (parseInt(b['Jumlah_Penduduk_Laki_Laki'] || b['Jumlah Orang Laki-Laki di Rumah'] || 0) + parseInt(b['Jumlah_Penduduk_Perempuan'] || b['Jumlah Orang Perempuan di Rumah'] || 0));
                } else if (key.indexOf('_') === 0) {
                    var lA = parseInt(a['Jumlah_Penduduk_Laki_Laki'] || a['Jumlah Orang Laki-Laki di Rumah'] || 0), pA = parseInt(a['Jumlah_Penduduk_Perempuan'] || a['Jumlah Orang Perempuan di Rumah'] || 0), totA = lA + pA, kkA = parseInt(a['Jumlah_KK'] || a['Jumlah Kartu Keluarga'] || 0), bumA = parseInt(a['Jumlah_Bumbung_Rumah'] || a['Nomor Bangunan'] || 0);
                    var lB = parseInt(b['Jumlah_Penduduk_Laki_Laki'] || b['Jumlah Orang Laki-Laki di Rumah'] || 0), pB = parseInt(b['Jumlah_Penduduk_Perempuan'] || b['Jumlah Orang Perempuan di Rumah'] || 0), totB = lB + pB, kkB = parseInt(b['Jumlah_KK'] || b['Jumlah Kartu Keluarga'] || 0), bumB = parseInt(b['Jumlah_Bumbung_Rumah'] || b['Nomor Bangunan'] || 0);

                    if (key === '_sexRatio') { valA = pA > 0 ? (lA / pA) : 0; valB = pB > 0 ? (lB / pB) : 0; }
                    else if (key === '_artRata') { valA = kkA > 0 ? (totA / kkA) : 0; valB = kkB > 0 ? (totB / kkB) : 0; }
                    else if (key === '_pctKtp') { valA = totA > 0 ? (parseInt(a['Jumlah_Memiliki_KTP']||0) / totA) : 0; valB = totB > 0 ? (parseInt(b['Jumlah_Memiliki_KTP']||0) / totA) : 0; }
                    else if (key === '_pctBansos') {
                        var bnsA = (parseInt(a['Jumlah_Penerima_PKH']||0) + parseInt(a['Jumlah_Penerima_BPNT']||0) + parseInt(a['Jumlah_Penerima_BLT']||0));
                        var bnsB = (parseInt(b['Jumlah_Penerima_PKH']||0) + parseInt(b['Jumlah_Penerima_BPNT']||0) + parseInt(b['Jumlah_Penerima_BLT']||0));
                        valA = kkA > 0 ? (bnsA / kkA) : 0; valB = kkB > 0 ? (bnsB / kkB) : 0;
                    }
                    else if (key === '_pctPutus') { valA = totA > 0 ? (parseInt(a['Jumlah_Penduduk_Putus_Sekolah']||0) / totA) : 0; valB = totB > 0 ? (parseInt(b['Jumlah_Penduduk_Putus_Sekolah']||0) / totA) : 0; }
                    else if (key === '_kepadatan') { valA = bumA > 0 ? (totA / bumA) : 0; valB = bumB > 0 ? (totB / bumB) : 0; }
                    else if (key === '_ratioIbadah') { valA = totA > 0 ? (1 / totA) : 0; valB = totB > 0 ? (1 / totB) : 0; }
                    else { valA = 0; valB = 0; }
                } else if (['Jumlah_Penduduk_Laki_Laki', 'Jumlah_Penduduk_Perempuan', 'Jumlah_KK', 'Jumlah_Bumbung_Rumah', 'Jumlah_Memiliki_KTP', 'Jumlah_Penduduk_Putus_Sekolah'].indexOf(key) !== -1) {
                    valA = parseInt(a[key] !== undefined && a[key] !== null ? a[key] : 0) || 0;
                    valB = parseInt(b[key] !== undefined && b[key] !== null ? b[key] : 0) || 0;
                } else {
                    valA = (a[key] !== undefined && a[key] !== null ? a[key] : (a['Nama RT'] || a['Nama_RT'] || '')).toString().toLowerCase();
                    valB = (b[key] !== undefined && b[key] !== null ? b[key] : (b['Nama RT'] || b['Nama_RT'] || '')).toString().toLowerCase();
                }

                if (valA < valB) return sortRTAsc ? -1 : 1;
                if (valA > valB) return sortRTAsc ? 1 : -1;
                return 0;
            });

            renderTableRT();
        }

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
            var targetIcon = document.getElementById('sort-icon-fas-' + key);
            if (targetIcon) {
                targetIcon.className = sortFasAsc ? 'fas fa-sort-up text-primary ms-1' : 'fas fa-sort-down text-primary ms-1';
            }

            rawFasData.sort(function(a, b) {
                var valA = getProp(a, [key, 'Nama_Fasilitas', 'Kategori_Fasilitas', 'Kategori'], '').toLowerCase();
                var valB = getProp(b, [key, 'Nama_Fasilitas', 'Kategori_Fasilitas', 'Kategori'], '').toLowerCase();
                if (valA < valB) return sortFasAsc ? -1 : 1;
                if (valA > valB) return sortFasAsc ? 1 : -1;
                return 0;
            });

            renderTableFas();
        }

        function renderMapMarkers(fasList) {
            if (!markersLayer) return;
            markersLayer.clearLayers();

            var count = 0;
            fasList.forEach(function(item) {
                var gps = getProp(item, ['Lokasi_GPS', 'Lokasi GPS', 'Koordinat', 'Geotagging'], '');
                if (!gps) return;
                var parts = gps.split(',');
                if (parts.length === 2) {
                    var lat = parseFloat(parts[0].trim());
                    var lng = parseFloat(parts[1].trim());
                    if (!isNaN(lat) && !isNaN(lng)) {
                        var marker = L.marker([lat, lng]);
                        var namaFas = getProp(item, ['Nama_Fasilitas', 'Nama Fasilitas', 'Nama Sarana', 'Nama'], 'Fasilitas');
                        var katFas = getProp(item, ['Kategori_Fasilitas', 'Kategori Fasilitas', 'Kategori'], '-');
                        var rtFas = getProp(item, ['RT', 'Wilayah RT', 'Nama_RT'], '-');
                        var popupContent = '<strong>' + namaFas + '</strong><br>'
                            + 'Kategori: ' + katFas + '<br>'
                            + 'RT: ' + rtFas;
                        marker.bindPopup(popupContent);
                        markersLayer.addLayer(marker);
                        count++;
                    }
                }
            });
            var mapCounter = document.getElementById('map-counter-fas');
            if (mapCounter) mapCounter.innerText = count + ' Titik Fasilitas';
        }

        function renderCharts(rtList, fasList) {
            var ctxDem = document.getElementById('chartDemografi');
            if (ctxDem) {
                if (chartDemografi) chartDemografi.destroy();

                var container = document.getElementById('chartDemografiContainer');
                if (container && rtList.length) {
                    var dynamicWidth = Math.max(600, rtList.length * 65);
                    container.style.minWidth = dynamicWidth + 'px';
                }

                var sortedRTList = rtList.slice().sort(function(a, b) {
                    var lA = parseInt(a['Jumlah Orang Laki-Laki di Rumah'] || a['Jumlah_Penduduk_Laki_Laki'] || 0) || 0;
                    var pA = parseInt(a['Jumlah Orang Perempuan di Rumah'] || a['Jumlah_Penduduk_Perempuan'] || 0) || 0;
                    var lB = parseInt(b['Jumlah Orang Laki-Laki di Rumah'] || b['Jumlah_Penduduk_Laki_Laki'] || 0) || 0;
                    var pB = parseInt(b['Jumlah Orang Perempuan di Rumah'] || b['Jumlah_Penduduk_Perempuan'] || 0) || 0;
                    return (lB + pB) - (lA + pA);
                });

                var labels = sortedRTList.map(function(item) { 
                    var name = (item['Nama RT'] || item['Nama_RT'] || '').trim();
                    return name.replace('DUSUN ', ''); 
                });
                var dataL = sortedRTList.map(function(item) { return parseInt(item['Jumlah Orang Laki-Laki di Rumah'] || item['Jumlah_Penduduk_Laki_Laki'] || 0) || 0; });
                var dataP = sortedRTList.map(function(item) { return parseInt(item['Jumlah Orang Perempuan di Rumah'] || item['Jumlah_Penduduk_Perempuan'] || 0) || 0; });

                chartDemografi = new Chart(ctxDem, {
                    type: 'bar',
                    data: {
                        labels: labels,
                        datasets: [
                            { label: 'Laki-Laki', data: dataL, backgroundColor: '#0D9488', borderRadius: 4 },
                            { label: 'Perempuan', data: dataP, backgroundColor: '#F59E0B', borderRadius: 4 }
                        ]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: { legend: { position: 'top' } },
                        scales: {
                            x: {
                                ticks: {
                                    autoSkip: false,
                                    maxRotation: 45,
                                    minRotation: 30
                                }
                            }
                        }
                    }
                });
            }

            var ctxFas = document.getElementById('chartFasilitas');
            if (ctxFas) {
                if (chartFasilitas) chartFasilitas.destroy();

                var catCounts = {};
                fasList.forEach(function(item) {
                    var c = getProp(item, ['Kategori_Fasilitas', 'Kategori Fasilitas', 'Sub_Kategori', 'Kategori'], 'Lainnya');
                    catCounts[c] = (catCounts[c] || 0) + 1;
                });

                var hasData = Object.keys(catCounts).length > 0;
                chartFasilitas = new Chart(ctxFas, {
                    type: 'doughnut',
                    data: {
                        labels: hasData ? Object.keys(catCounts) : ['Belum Ada Data Fasilitas'],
                        datasets: [{
                            data: hasData ? Object.values(catCounts) : [1],
                            backgroundColor: hasData ? ['#064E3B', '#0D9488', '#F59E0B', '#3B82F6', '#EC4899'] : ['#CBD5E1']
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: { legend: { position: 'right' } }
                    }
                });
            }
        }

        // Swiper & Flashcard Logic
        var flashcardsData = [];
        var activeFcFilter = 'all';
        var swiperInstance = null;

        function renderFlashcards(rtList, fasList) {
            flashcardsData = generate20FlashcardsPasirPalembang(rtList, fasList);
            filterFlashcards(activeFcFilter);
        }

        function generate20FlashcardsPasirPalembang(rtList, fasList) {
            if (!Array.isArray(rtList) || !rtList.length) return [];
            if (!Array.isArray(fasList)) fasList = [];

            var totalL = 0, totalP = 0, totalKK = 0, totalBumbung = 0, totalLansia = 0, totalBansos = 0, totalKTP = 0, totalPutusSekolah = 0;
            
            rtList.forEach(function(r) {
                var l = parseInt(r.Jumlah_Penduduk_Laki_Laki || r['Jumlah Orang Laki-Laki di Rumah'] || 0);
                var p = parseInt(r.Jumlah_Penduduk_Perempuan || r['Jumlah Orang Perempuan di Rumah'] || 0);
                totalL += l;
                totalP += p;
                totalKK += parseInt(r.Jumlah_KK || r['Jumlah Kartu Keluarga'] || 0);
                totalBumbung += parseInt(r.Jumlah_Bumbung_Rumah || r['Nomor Bangunan'] || 0);
                totalLansia += parseInt(r.Jumlah_Penduduk_Lansia || 0);
                totalKTP += parseInt(r.Jumlah_Memiliki_KTP || 0);
                totalPutusSekolah += parseInt(r.Jumlah_Penduduk_Putus_Sekolah || 0);
                totalBansos += (parseInt(r.Jumlah_Penerima_PKH || 0) + parseInt(r.Jumlah_Penerima_BPNT || 0) + parseInt(r.Jumlah_Penerima_BLT || 0));
            });

            var totalPenduduk = totalL + totalP;
            var sexRatio = totalP > 0 ? ((totalL / totalP) * 100).toFixed(1) : '-';
            var artRata = totalKK > 0 ? (totalPenduduk / totalKK).toFixed(2) : '-';
            var kepadatan = totalBumbung > 0 ? (totalPenduduk / totalBumbung).toFixed(2) : '-';
            var pctLansia = totalPenduduk > 0 ? ((totalLansia / totalPenduduk) * 100).toFixed(1) : '-';
            var pctKTP = totalPenduduk > 0 ? ((totalKTP / totalPenduduk) * 100).toFixed(1) : '-';

            // Calculate helper metrics on each item
            rtList.forEach(function(r) {
                var l = parseInt(r.Jumlah_Penduduk_Laki_Laki || r['Jumlah Orang Laki-Laki di Rumah'] || 0);
                var p = parseInt(r.Jumlah_Penduduk_Perempuan || r['Jumlah Orang Perempuan di Rumah'] || 0);
                r._totalPop = l + p;
                r._putus = parseInt(r.Jumlah_Penduduk_Putus_Sekolah || 0);
                r._lansia = parseInt(r.Jumlah_Penduduk_Lansia || 0);
                r._kk = parseInt(r.Jumlah_KK || r['Jumlah Kartu Keluarga'] || 0);
                r._bumbung = parseInt(r.Jumlah_Bumbung_Rumah || r['Nomor Bangunan'] || 0);
                r._ktp = parseInt(r.Jumlah_Memiliki_KTP || 0);
                r._pctKTP = r._totalPop > 0 ? ((r._ktp / r._totalPop) * 100) : 0;
                r._kepadatan = r._bumbung > 0 ? (r._totalPop / r._bumbung) : 0;
            });

            // Sorting for RT Rekor
            var rtMaxPop = rtList.slice().sort(function(a,b) { return (b._totalPop||0) - (a._totalPop||0); })[0] || {};
            var rtMinPop = rtList.slice().filter(function(r){ return (r._totalPop||0) > 0; }).sort(function(a,b) { return (a._totalPop||0) - (b._totalPop||0); })[0] || {};
            var rtMaxKK = rtList.slice().sort(function(a,b) { return (b._kk||0) - (a._kk||0); })[0] || {};
            var rtMaxPutus = rtList.slice().sort(function(a,b) { return (b._putus||0) - (a._putus||0); })[0] || {};
            var rtMaxKepadatan = rtList.slice().filter(function(r){ return (r._bumbung||0) > 0; }).sort(function(a,b) { return (b._kepadatan||0) - (a._kepadatan||0); })[0] || {};

            var rtZeroPutusCount = rtList.filter(function(r) { return (r._putus || 0) === 0; }).length;

            // Fasilitas stats
            var fasCatMap = {};
            var countIbadah = 0, countSekolah = 0, countFaskes = 0;
            fasList.forEach(function(f) {
                var kat = (f.Kategori_Fasilitas || f.Kategori || 'Lainnya').trim();
                fasCatMap[kat] = (fasCatMap[kat] || 0) + 1;
                var lowKat = kat.toLowerCase();
                if (lowKat.indexOf('ibadah') !== -1 || lowKat.indexOf('agama') !== -1) countIbadah++;
                if (lowKat.indexOf('pendidikan') !== -1 || lowKat.indexOf('sekolah') !== -1) countSekolah++;
                if (lowKat.indexOf('kesehatan') !== -1 || lowKat.indexOf('posyandu') !== -1) countFaskes++;
            });
            var fasCount = fasList.length;

            var cards = [
                {
                    id: 1, cat: 'demografi', tag: 'Total Populasi', isPerbaikan: false,
                    q: 'Berapa total populasi penduduk terdaftar & rasio jenis kelamin (Sex Ratio) di Desa Pasir Palembang?',
                    a: 'Total Penduduk: <strong>' + totalPenduduk.toLocaleString('id-ID') + ' Jiwa</strong> (' + totalL.toLocaleString('id-ID') + ' L & ' + totalP.toLocaleString('id-ID') + ' P). Sex Ratio desa adalah <strong>' + sexRatio + '</strong> (ada ' + sexRatio + ' Laki-laki per 100 Perempuan).'
                },
                {
                    id: 2, cat: 'perbaikan', tag: '⚠️ Indikator #6 Putus Sekolah', isPerbaikan: true,
                    q: 'Berapa jumlah anak usia sekolah (7-18 thn) yang teridentifikasi putus sekolah di Pasir Palembang?',
                    a: '⚠️ Teridentifikasi total <strong>' + totalPutusSekolah + ' anak putus sekolah</strong> se-desa. Pemdes & BPS merekomendasikan intervensi Beasiswa Desa & fasilitasi Kejar Paket A/B/C.'
                },
                {
                    id: 3, cat: 'perbaikan', tag: '⚠️ Sebaran Putus Sekolah', isPerbaikan: true,
                    q: 'Di manakah wilayah RT dengan konsentrasi anak putus sekolah tertinggi?',
                    a: '⚠️ Kasus putus sekolah tertinggi berada di <strong>' + (rtMaxPutus.Nama_RT || 'RT') + '</strong> (Ketua: ' + (rtMaxPutus.Nama_Ketua_RT || '-') + ') dengan <strong>' + (rtMaxPutus._putus || 0) + ' anak</strong>, sementara <strong>' + rtZeroPutusCount + ' RT lainnya</strong> tercatat 0 kasus.'
                },
                {
                    id: 4, cat: 'demografi', tag: 'Bumbung Rumah', isPerbaikan: false,
                    q: 'Berapa total fisik bumbung atap rumah di Pasir Palembang & kepadatan rata-ratanya?',
                    a: 'Terdata <strong>' + totalBumbung.toLocaleString('id-ID') + ' unit bumbung rumah</strong> dengan rata-rata kepadatan hunian <strong>' + kepadatan + ' jiwa per rumah</strong>.'
                },
                {
                    id: 5, cat: 'perbaikan', tag: '⚠️ Solusi Intervensi Pendidikan', isPerbaikan: true,
                    q: 'Bagaimana rekomendasi solusi strategis penanganan ' + totalPutusSekolah + ' anak putus sekolah?',
                    a: '⚠️ Pemkab Mempawah & BPS merekomendasikan <strong>Program Gerakan Kembali Sekolah (GKS)</strong>, Bantuan Alat Tulis, dan pendampingan orang tua penerima Bansos.'
                },
                {
                    id: 6, cat: 'fasilitas', tag: 'Fasilitas Publik', isPerbaikan: false,
                    q: 'Berapa banyak fasilitas umum yang telah terinventarisasi titik koordinat GPS-nya?',
                    a: 'Terdata sebanyak <strong>' + fasCount + ' titik fasilitas publik resmi</strong> (Ibadah, Pendidikan, Kesehatan, Pemerintahan, Infrastruktur) lengkap dengan lokasi GPS.'
                },
                {
                    id: 7, cat: 'rekor', tag: 'RT Populasi Terbanyak', isPerbaikan: false,
                    q: 'RT manakah yang memiliki jumlah penduduk terbanyak di Desa Pasir Palembang?',
                    a: '<strong>' + (rtMaxPop.Nama_RT || 'RT') + '</strong> (Ketua: ' + (rtMaxPop.Nama_Ketua_RT || '-') + ') memiliki populasi tertinggi dengan <strong>' + (rtMaxPop._totalPop || 0) + ' jiwa penduduk</strong> (' + (rtMaxPop._kk || 0) + ' KK).'
                },
                {
                    id: 8, cat: 'bansos', tag: 'Bantuan Sosial', isPerbaikan: false,
                    q: 'Berapa total keluarga penerima bantuan sosial (Bansos) di Desa Pasir Palembang?',
                    a: 'Terdata sebanyak <strong>' + totalBansos.toLocaleString('id-ID') + ' penerima Bansos</strong> (PKH, BPNT, BLT) yang tersaring secara tepat sasaran berbasis Data Terpadu SDI.'
                },
                {
                    id: 9, cat: 'perbaikan', tag: '⚠️ Geospasial SDI', isPerbaikan: true,
                    q: 'Mengapa pemetaan geospasial fasilitas publik sangat krusial bagi desa?',
                    a: '⚠️ Untuk mempermudah mitigasi bencana, perencanaan jalan desa RKPDesa, serta integrasi rute navigasi Google Maps ke sarana kesehatan/sekolah terdekat.'
                },
                {
                    id: 10, cat: 'fasilitas', tag: 'Sarana Ibadah', isPerbaikan: false,
                    q: 'Berapa jumlah sarana tempat ibadah yang ada di Desa Pasir Palembang?',
                    a: 'Terdata <strong>' + countIbadah + ' sarana tempat ibadah</strong> (Masjid Jami\' Al-Muttaqin & Surau/Musholla) yang tersebar di Dusun Pelaik, Tengah, dan Tekam Baru.'
                },
                {
                    id: 11, cat: 'demografi', tag: 'Ukuran Keluarga (ART)', isPerbaikan: false,
                    q: 'Berapa rata-rata Anggota Rumah Tangga (ART) per KK?',
                    a: 'Setiap Kartu Keluarga di Pasir Palembang rata-rata memiliki <strong>' + artRata + ' Anggota Rumah Tangga</strong> dari total <strong>' + totalKK.toLocaleString('id-ID') + ' KK</strong>.'
                },
                {
                    id: 12, cat: 'rekor', tag: 'KK Terbanyak', isPerbaikan: false,
                    q: 'RT manakah yang mencatatkan jumlah KK terbanyak di desa?',
                    a: '<strong>' + (rtMaxKK.Nama_RT || 'RT') + '</strong> (Ketua: ' + (rtMaxKK.Nama_Ketua_RT || '-') + ') mencatatkan KK terbanyak dengan <strong>' + (rtMaxKK._kk || 0) + ' Kartu Keluarga</strong>.'
                },
                {
                    id: 13, cat: 'perbaikan', tag: '⚠️ Akses KTP-el', isPerbaikan: true,
                    q: 'Berapa persentase warga wajib KTP yang telah memiliki KTP-elektronik (KTP-el)?',
                    a: '⚠️ Sebanyak <strong>' + totalKTP.toLocaleString('id-ID') + ' jiwa (' + pctKTP + '%)</strong> telah ber-KTP-el. Pemdes merekomendasikan <strong>Layanan Mobile Adminduk</strong> untuk peningkatan cakupan adminduk.'
                },
                {
                    id: 14, cat: 'fasilitas', tag: 'Sarana Pendidikan', isPerbaikan: false,
                    q: 'Berapa jumlah sarana pendidikan yang tersedia di desa?',
                    a: 'Terdata <strong>' + countSekolah + ' sarana pendidikan dasar</strong>, mencakup SDN 05 Pasir Palembang dan MIS Bahrul Ulum.'
                },
                {
                    id: 15, cat: 'fasilitas', tag: 'Posyandu & Faskes', isPerbaikan: false,
                    q: 'Berapa sarana kesehatan (Faskes) yang aktif beroperasi melayani warga?',
                    a: 'Terdata <strong>' + countFaskes + ' sarana kesehatan</strong>, mencakup Posyandu Kasih Ibu, Posyandu Mawar, dan Poskesdes Pasir Palembang.'
                },
                {
                    id: 16, cat: 'rekor', tag: 'Kepadatan Hunian', isPerbaikan: false,
                    q: 'RT manakah yang memiliki kepadatan hunian rumah tangga paling tinggi?',
                    a: '<strong>' + (rtMaxKepadatan.Nama_RT || 'RT') + '</strong> mencatatkan kepadatan tertinggi dengan <strong>' + (rtMaxKepadatan._kepadatan ? rtMaxKepadatan._kepadatan.toFixed(2) : '-') + ' jiwa per bumbung rumah</strong>.'
                },
                {
                    id: 17, cat: 'demografi', tag: 'Bumbung Rumah', isPerbaikan: false,
                    q: 'Berapa total fisik bumbung atap rumah di Pasir Palembang & kepadatan rata-ratanya?',
                    a: 'Terdata <strong>' + totalBumbung.toLocaleString('id-ID') + ' unit bumbung rumah</strong> dengan rata-rata kepadatan hunian <strong>' + kepadatan + ' jiwa per rumah</strong>.'
                },
                {
                    id: 18, cat: 'rekor', tag: 'Populasi Terendah', isPerbaikan: false,
                    q: 'RT manakah yang memiliki jumlah penduduk terendah di Pasir Palembang?',
                    a: '<strong>' + (rtMinPop.Nama_RT || 'RT') + '</strong> (Ketua: ' + (rtMinPop.Nama_Ketua_RT || '-') + ') memiliki populasi terendah dengan <strong>' + (rtMinPop._totalPop || 0) + ' jiwa penduduk</strong>.'
                },
                {
                    id: 19, cat: 'perbaikan', tag: '⚠️ Layanan Data', isPerbaikan: true,
                    q: 'Bagaimana cara masyarakat atau akademisi mengajukan permohonan data publik resmi?',
                    a: '⚠️ Permohonan data dapat diajukan secara online melalui <strong>Form SOP Permintaan Data</strong> yang terintegrasi pada portal resmi ini.'
                },
                {
                    id: 20, cat: 'fasilitas', tag: 'Infrastruktur Publik', isPerbaikan: false,
                    q: 'Bagaimana kualitas ketersediaan akses listrik PLN & sinyal seluler di sarana umum?',
                    a: 'Seluruh <strong>' + fasCount + ' fasilitas umum</strong> terlayani listrik PLN 24 jam dan jangkauan sinyal seluler 4G/LTE yang memadai.'
                }
            ];

            return cards;
        }

        function filterFlashcards(cat, btnEl) {
            activeFcFilter = cat;
            if (btnEl) {
                document.querySelectorAll('#flashcard-filter-container .btn-fc-filter').forEach(function(b) {
                    b.classList.remove('btn-primary', 'active');
                    b.classList.add('btn-outline-secondary');
                });
                btnEl.classList.remove('btn-outline-secondary');
                btnEl.classList.add('btn-primary', 'active');
            }

            var filtered = flashcardsData.filter(function(item) {
                return cat === 'all' || item.cat === cat;
            });

            var countBadge = document.getElementById('flashcards-count-badge');
            if (countBadge) countBadge.innerText = filtered.length + ' Flashcard';

            var wrapper = document.getElementById('flashcards-swiper-wrapper');
            if (!wrapper) return;

            var html = '';
            filtered.forEach(function(card) {
                var perbaikanClass = card.isPerbaikan ? 'is-perbaikan' : '';
                var badgeBg = card.isPerbaikan ? 'bg-danger text-white' : 'bg-primary text-white';

                html += '<div class="swiper-slide">'
                    + '<div class="flashcard-container ' + perbaikanClass + '" onclick="this.classList.toggle(\'flipped\')">'
                    + '<div class="flashcard-inner">'
                    + '<div class="flashcard-front">'
                    + '<div>'
                    + '<div class="d-flex justify-content-between align-items-center mb-2">'
                    + '<span class="flashcard-badge ' + badgeBg + '">' + card.tag + '</span>'
                    + '<small class="text-muted"><i class="fas fa-sync-alt me-1"></i>Klik Flip</small>'
                    + '</div>'
                    + '<h6 class="fw-bold text-dark mt-2 mb-0" style="line-height: 1.4;">' + card.q + '</h6>'
                    + '</div>'
                    + '<div class="pt-2 border-top d-flex justify-content-between align-items-center text-muted extra-small">'
                    + '<span><i class="fas fa-question-circle me-1 text-primary"></i>Pertanyaan Trivia</span>'
                    + '<span class="fw-bold text-primary">Buka Jawaban &rarr;</span>'
                    + '</div>'
                    + '</div>'
                    + '<div class="flashcard-back">'
                    + '<div>'
                    + '<div class="d-flex justify-content-between align-items-center mb-2">'
                    + '<span class="flashcard-badge bg-white text-dark">' + card.tag + '</span>'
                    + '<small class="text-white-50"><i class="fas fa-check-circle me-1"></i>Fakta Data</small>'
                    + '</div>'
                    + '<p class="small text-white mb-0" style="line-height: 1.5;">' + card.a + '</p>'
                    + '</div>'
                    + '<div class="pt-2 border-top border-white-50 d-flex justify-content-between align-items-center extra-small text-white-50">'
                    + '<span>SDI Pasir Palembang 2026</span>'
                    + '<span>&larr; Putar Kembali</span>'
                    + '</div>'
                    + '</div>'
                    + '</div>'
                    + '</div>'
                    + '</div>';
            });
            wrapper.innerHTML = html;
            initSwiper();
        }

        function initSwiper() {
            if (swiperInstance) swiperInstance.destroy(true, true);
            swiperInstance = new Swiper('.swiper-flashcards', {
                slidesPerView: 1,
                spaceBetween: 16,
                navigation: {
                    nextEl: '.swiper-button-next-flashcard',
                    prevEl: '.swiper-button-prev-flashcard',
                },
                pagination: {
                    el: '.swiper-pagination-flashcards',
                    type: 'fraction',
                },
                breakpoints: {
                    640: { slidesPerView: 2, spaceBetween: 20 },
                    1024: { slidesPerView: 3, spaceBetween: 24 }
                }
            });
        }

        function shuffleFlashcards() {
            for (var i = flashcardsData.length - 1; i > 0; i--) {
                var j = Math.floor(Math.random() * (i + 1));
                var temp = flashcardsData[i];
                flashcardsData[i] = flashcardsData[j];
                flashcardsData[j] = temp;
            }
            filterFlashcards(activeFcFilter);
        }

        function flipAllFlashcards(shouldFlip) {
            document.querySelectorAll('.flashcard-container').forEach(function(card) {
                if (shouldFlip) card.classList.add('flipped');
                else card.classList.remove('flipped');
            });
        }

        function resetFlashcards() {
            flipAllFlashcards(false);
            filterFlashcards('all');
        }

        function filterRTTable() {
            var q = document.getElementById('search-rt').value.toLowerCase();
            var rows = document.querySelectorAll('#table-rt-tbody tr');
            rows.forEach(function(r) {
                var txt = r.innerText.toLowerCase();
                r.style.display = txt.includes(q) ? '' : 'none';
            });
        }

        function filterFasTable() {
            var q = document.getElementById('search-fas').value.toLowerCase();
            var rows = document.querySelectorAll('#table-fas-tbody tr');
            rows.forEach(function(r) {
                var txt = r.innerText.toLowerCase();
                r.style.display = txt.includes(q) ? '' : 'none';
            });
        }

        function openImagePreviewModal(imageSrc, title, caption) {
            document.getElementById('modalPreviewImg').src = imageSrc;
            document.getElementById('modalImageTitle').innerText = title || 'Pratinjau Foto';
            document.getElementById('modalImageCaption').innerText = caption || 'Desa Pasir Palembang 2026';
            
            var downloadBtn = document.getElementById('modalDownloadBtn');
            downloadBtn.href = imageSrc;
            var filename = (title || 'foto_desa_pasir_palembang').toLowerCase().replace(/[^a-z0-9]/g, '_') + '.webp';
            downloadBtn.setAttribute('download', filename);

            var modal = new bootstrap.Modal(document.getElementById('imagePreviewModal'));
            modal.show();
        }

        function exportRTToCSV() {
            if (!rawRTData || !rawRTData.length) {
                alert('Data RT belum siap diunduh.');
                return;
            }
            var rows = [];

            if (currentRTMode === 'indikator') {
                rows.push([
                    "Nama RT", "Sex Ratio (#1)", "ART/KK (#2)", "Pct Bansos (#3)",
                    "Pct Putus Sekolah (#4)", "Kepadatan Jiwa/Rumah (#5)", "Sarana Ibadah per 1k Jiwa (#6)"
                ]);
                rawRTData.forEach(function(r) {
                    var l = parseInt(r.Jumlah_Penduduk_Laki_Laki || r['Jumlah Orang Laki-Laki di Rumah'] || 0) || 0;
                    var p = parseInt(r.Jumlah_Penduduk_Perempuan || r['Jumlah Orang Perempuan di Rumah'] || 0) || 0;
                    var total = l + p;
                    var kk = parseInt(r.Jumlah_KK || r['Jumlah Kartu Keluarga'] || 0) || 0;
                    var bumbung = parseInt(r.Jumlah_Bumbung_Rumah || r['Nomor Bangunan'] || 0) || 0;
                    var putus = parseInt(r.Jumlah_Penduduk_Putus_Sekolah || 0) || 0;
                    var bansos = (parseInt(r.Jumlah_Penerima_PKH || 0) + parseInt(r.Jumlah_Penerima_BPNT || 0) + parseInt(r.Jumlah_Penerima_BLT || 0));

                    var sr = p > 0 ? ((l / p) * 100).toFixed(1) : '-';
                    var art = kk > 0 ? (total / kk).toFixed(2) : '-';
                    var pctBansos = kk > 0 ? ((bansos / kk) * 100).toFixed(1) + '%' : '-';
                    var pctPutus = total > 0 ? ((putus / total) * 100).toFixed(1) + '%' : '-';
                    var kep = bumbung > 0 ? (total / bumbung).toFixed(2) : '-';
                    var ratioIbadah = total > 0 ? ((1 / total) * 1000).toFixed(2) : '-';

                    rows.push([
                        r.Nama_RT || r['Nama RT'] || '', sr, art, pctBansos, pctPutus, kep, ratioIbadah
                    ]);
                });
            } else {
                rows.push([
                    "Nama RT", "Ketua RT", "Penduduk Laki-Laki", "Penduduk Perempuan", "Total Penduduk",
                    "Jumlah KK", "Bumbung Rumah", "Putus Sekolah", "Status Pendataan"
                ]);
                rawRTData.forEach(function(r) {
                    var l = parseInt(r.Jumlah_Penduduk_Laki_Laki || r['Jumlah Orang Laki-Laki di Rumah'] || 0) || 0;
                    var p = parseInt(r.Jumlah_Penduduk_Perempuan || r['Jumlah Orang Perempuan di Rumah'] || 0) || 0;
                    var total = l + p;
                    rows.push([
                        r.Nama_RT || r['Nama RT'] || '', r.Nama_Ketua_RT || r['Nama Ketua RT'] || '',
                        l, p, total,
                        parseInt(r.Jumlah_KK || r['Jumlah Kartu Keluarga'] || 0) || 0,
                        parseInt(r.Jumlah_Bumbung_Rumah || r['Nomor Bangunan'] || 0) || 0,
                        parseInt(r.Jumlah_Penduduk_Putus_Sekolah || 0) || 0,
                        r.Status_Pendataan || 'Selesai'
                    ]);
                });
            }

            var fileName = currentRTMode === 'indikator' ? 'Indikator_SDI_RT_Pasir_Palembang_2026.csv' : 'Data_Variabel_RT_Pasir_Palembang_2026.csv';
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
                    getProp(r, ['ID_Fasilitas', 'ID Fasilitas']),
                    getProp(r, ['Nama_Fasilitas', 'Nama Fasilitas', 'Nama Sarana']),
                    getProp(r, ['Kategori_Fasilitas', 'Kategori Fasilitas', 'Sub_Kategori', 'Kategori']),
                    getProp(r, ['Sub_Kategori', 'Sub Kategori']),
                    getProp(r, ['RT', 'Wilayah RT', 'Nama_RT']),
                    getProp(r, ['Kondisi_Bangunan_Jalan', 'Kondisi_Bangunan', 'Kondisi']),
                    getProp(r, ['Sumber_Listrik', 'Sumber Listrik']),
                    getProp(r, ['Sumber_Air_Bersih', 'Sumber Air Bersih']),
                    getProp(r, ['Lokasi_GPS', 'Lokasi GPS', 'Koordinat'])
                ]);
            });
            triggerCSVDownload(rows, 'Data_Fasilitas_Pasir_Palembang_2026.csv');
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
</x-layouts.app>
