<x-layouts.app 
    title="Kelurahan Pasir Wan Salim - Desa Cinta Statistik 2026" 
    description="Portal Resmi Kelurahan Cantik 2026 Pasir Wan Salim - BPS Kabupaten Mempawah"
    village-name="Kelurahan Pasir Wan Salim"
    district-name="Kecamatan Mempawah Timur"
    address="Jl. Pasir Wan Salim, Kode Pos 78919"
    email="pasirwansalim@mempawahkab.go.id"
>

    <header class="page-header text-center">
        <div class="container">
            <div class="d-flex justify-content-center gap-2 mb-3">
                <span class="badge bg-warning text-dark px-3 py-2 rounded-pill fw-bold"><i class="fas fa-star me-1"></i> Kelurahan Cantik 2026</span>
                <span class="badge bg-light text-dark px-3 py-2 rounded-pill fw-bold"><i class="fas fa-database me-1"></i> AppSheet Live Data</span>
            </div>
            <h1 class="fw-bold display-5 mb-2">Kelurahan Pasir Wan Salim</h1>
            <p class="lead mx-auto text-white-50 mb-4" style="max-width:800px;">
                Kecamatan Mempawah Timur, Kabupaten Mempawah — Pendataan Potensi Kewilayahan RT &amp; Inventarisasi Fasilitas Umum Berbasis Satu Data Indonesia (SDI).
            </p>
            <div class="d-flex justify-content-center align-items-center flex-wrap gap-2">
                <div class="sync-wrap text-white small fw-semibold">
                    <i class="fas fa-sync fa-spin text-success" id="sync-icon"></i>
                    <span id="sync-status">Menghubungkan ke Google Sheets...</span>
                </div>
                <button class="btn btn-sm btn-light rounded-pill px-3 fw-bold" onclick="loadDataFromSheets()">
                    <i class="fas fa-redo me-1"></i> Sync Sekarang
                </button>
                <a href="#gsbpm-flow" class="btn btn-sm btn-outline-light rounded-pill px-3 fw-bold">
                    <i class="fas fa-project-diagram me-1"></i> Alur GSBPM
                </a>
                <a href="#tabel-rt" class="btn btn-sm btn-outline-light rounded-pill px-3 fw-bold">
                    <i class="fas fa-table me-1"></i> Tabel Potensi RT
                </a>
                <a href="#sop-layanan" class="btn btn-sm btn-outline-light rounded-pill px-3 fw-bold">
                    <i class="fas fa-file-excel me-1"></i> Unduh Data SDI (Excel)
                </a>
                <a href="#dokumentasi" class="btn btn-sm btn-outline-light rounded-pill px-3 fw-bold">
                    <i class="fas fa-camera me-1"></i> Dokumentasi
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
            <x-ui.kpi-card title="Penduduk Lansia" icon="fa-user-clock" id="kpi-lansia" sub-id="kpi-pct-lansia" sub-label="Proporsi" sub-color="text-warning" />
            <x-ui.kpi-card title="Penerima Bansos" icon="fa-hand-holding-heart" id="kpi-bansos" sub-label="PKH &amp; BPNT" />
            <x-ui.kpi-card title="Fasilitas Publik" icon="fa-map-marker-alt" id="kpi-fasilitas" sub-label="Terdata &amp; Aktif" />
        </div>

        <!-- Metadata SDI 2026 (Reusable Component) -->
        <x-widgets.sdi-metadata-tab village-name="Kelurahan Pasir Wan Salim" :rt-count="9" :var-rt-count="26" :var-fas-count="10" />

        <!-- Flashcard Interaktif & Trivia Stats (Reusable Component) -->
        <x-widgets.flashcard-deck village-name="Kelurahan Pasir Wan Salim" title="Flashcard Trivia &amp; Wawasan Data Kelurahan" />

        <!-- Charts Section -->
        <div class="row g-4 mb-5">
            <div class="col-lg-8">
                <div class="card border-0 shadow-sm rounded-4 p-4 bg-white h-100">
                    <div class="d-flex justify-content-between align-items-center mb-3 flex-wrap gap-2">
                        <div>
                            <h5 class="fw-bold text-dark mb-1"><i class="fas fa-chart-bar me-2 text-primary"></i>Jumlah Penduduk &amp; KK Per RT</h5>
                            <p class="text-muted extra-small mb-0"><i class="fas fa-arrows-left-right me-1 text-primary"></i>Grafik sebaran penduduk laki-laki, perempuan &amp; kepala keluarga</p>
                        </div>
                        <span class="badge bg-primary-subtle text-primary fw-bold px-3 py-2 rounded-pill" id="rt-chart-count-badge">Wilayah Terdata</span>
                    </div>
                    <div style="overflow-x: auto; overflow-y: hidden; width: 100%; -webkit-overflow-scrolling: touch;" class="pb-2">
                        <div id="chartDemografiContainer" style="width: 100%; min-width: 550px; height: 350px; position: relative;">
                            <canvas id="chartDemografi"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card border-0 shadow-sm rounded-4 p-4 bg-white h-100">
                    <h5 class="fw-bold text-dark mb-3"><i class="fas fa-chart-pie me-2 text-success"></i>Kategori Fasilitas Kelurahan</h5>
                    <canvas id="chartFasilitas" style="max-height:350px;"></canvas>
                </div>
            </div>
        </div>

        <!-- Interactive Facility Map -->
        <div class="card border-0 shadow-sm rounded-4 mb-5 p-4 bg-white" id="peta-sebaran">
            <div class="d-flex justify-content-between align-items-center mb-3 flex-wrap gap-2">
                <div>
                    <h4 class="fw-bold text-primary mb-0"><i class="fas fa-map-marked-alt me-2"></i>Peta Persebaran Sarana &amp; Fasilitas Publik</h4>
                    <p class="text-muted small mb-0">Lokasi fasilitas publik dan infrastruktur wilayah Kelurahan Pasir Wan Salim.</p>
                </div>
                <span class="badge bg-success text-white px-3 py-2 rounded-pill fw-bold" id="map-count-badge">5 Titik Fasilitas</span>
            </div>
            <div id="map" style="height: 440px; width: 100%; border-radius: 16px; z-index: 1;"></div>
        </div>

        <!-- Tables Section -->
        <div class="card border-0 shadow-sm rounded-4 mb-5 p-4 bg-white" id="tabel-rt">
            <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-2">
                <div>
                    <h4 class="fw-bold text-dark mb-1"><i class="fas fa-table me-2 text-primary"></i>Daftar Potensi RT &amp; Fasilitas Umum</h4>
                    <p class="text-muted small mb-0">Agregasi data mikro statistik kewilayahan hasil pembinaan Desa Cantik 2026.</p>
                </div>
                <button type="button" class="btn btn-sm btn-outline-success rounded-pill px-3 py-2 fw-bold shadow-sm" onclick="downloadComprehensiveSDIWorkbookPasirWanSalim()">
                    <i class="fas fa-file-excel me-1"></i> Unduh Data Excel Lengkap (.xlsx)
                </button>
            </div>
            <ul class="nav nav-pills mb-3 flex-nowrap overflow-x-auto text-nowrap" id="pills-tab" role="tablist">
                <li class="nav-item"><button class="nav-link active rounded-pill px-4" data-bs-toggle="pill" data-bs-target="#pills-rt">Potensi RT (Agregat)</button></li>
                <li class="nav-item"><button class="nav-link rounded-pill px-4" data-bs-toggle="pill" data-bs-target="#pills-fas">Sarana &amp; Fasilitas Publik</button></li>
            </ul>
            <div class="tab-content">
                <!-- Tab 1: RT Agregat -->
                <div class="tab-pane fade show active" id="pills-rt">
                    <div class="d-flex justify-content-between align-items-center mb-3 flex-wrap gap-2">
                        <div class="col-md-4 col-12">
                            <input type="text" id="search-rt" class="form-control form-control-sm rounded-pill" placeholder="Cari Nama RT / RW..." onkeyup="filterTableRT()">
                        </div>
                        <div class="btn-group btn-group-sm rounded-pill p-1 bg-light border text-nowrap flex-wrap flex-sm-nowrap" role="group">
                            <button type="button" class="btn btn-primary rounded-pill px-3 fw-semibold active" id="btn-mode-variabel" onclick="switchRTTableMode('variabel')">
                                <i class="fas fa-list me-1"></i> Variabel Mentah
                            </button>
                            <button type="button" class="btn btn-outline-success rounded-pill px-3 fw-semibold" id="btn-mode-indikator" onclick="switchRTTableMode('indikator')">
                                <i class="fas fa-chart-line me-1"></i> 8 Indikator SDI Per RT
                            </button>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover align-middle small text-nowrap" id="table-rt">
                            <thead class="table-light user-select-none text-nowrap" id="table-rt-thead">
                                <tr>
                                    <th>Nama RT / Wilayah</th>
                                    <th>L</th>
                                    <th>P</th>
                                    <th>Total Penduduk</th>
                                    <th>Total KK</th>
                                    <th>Bumbung Rumah</th>
                                    <th>Lansia</th>
                                    <th>Penerima Bansos</th>
                                    <th>UMKM</th>
                                    <th>BPJS</th>
                                </tr>
                            </thead>
                            <tbody id="table-rt-tbody">
                                <tr><td colspan="10" class="text-center py-4 text-muted"><i class="fas fa-spinner fa-spin me-2"></i>Memuat data RT...</td></tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Tab 2: Fasilitas -->
                <div class="tab-pane fade" id="pills-fas">
                    <div class="d-flex justify-content-between align-items-center mb-3 flex-wrap gap-2">
                        <div class="col-md-4 col-12">
                            <input type="text" id="search-fas" class="form-control form-control-sm rounded-pill" placeholder="Cari Fasilitas / Sarana..." onkeyup="filterTableFas()">
                        </div>
                        <span class="badge bg-secondary-subtle text-dark px-3 py-2 rounded-pill fw-semibold">5 Fasilitas Terdata</span>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover align-middle small text-nowrap" id="table-fas">
                            <thead class="table-light user-select-none text-nowrap">
                                <tr>
                                    <th>No</th>
                                    <th>Nama Fasilitas</th>
                                    <th>Kategori</th>
                                    <th>Wilayah RW</th>
                                    <th>Kondisi Bangunan</th>
                                    <th>Aksesibilitas</th>
                                </tr>
                            </thead>
                            <tbody id="table-fas-tbody">
                                <tr>
                                    <td>1</td>
                                    <td class="fw-bold">Kantor Kelurahan Pasir Wan Salim</td>
                                    <td><span class="badge bg-primary">Pemerintahan</span></td>
                                    <td>RW 01</td>
                                    <td><span class="badge bg-success">Baik</span></td>
                                    <td>Aspal / Beton (Roda 4)</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td class="fw-bold">Poskesdes / Posyandu Melati</td>
                                    <td><span class="badge bg-danger">Kesehatan</span></td>
                                    <td>RW 02</td>
                                    <td><span class="badge bg-success">Baik</span></td>
                                    <td>Aspal / Beton (Roda 4)</td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td class="fw-bold">SD Negeri 05 Pasir Wan Salim</td>
                                    <td><span class="badge bg-warning text-dark">Pendidikan</span></td>
                                    <td>RW 01</td>
                                    <td><span class="badge bg-success">Baik</span></td>
                                    <td>Aspal (Roda 4)</td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td class="fw-bold">Masjid Jami Pasir Wan Salim</td>
                                    <td><span class="badge bg-success">Sarana Ibadah</span></td>
                                    <td>RW 02</td>
                                    <td><span class="badge bg-success">Baik</span></td>
                                    <td>Aspal (Roda 4)</td>
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td class="fw-bold">Sentra Kuliner &amp; Olahan UMKM Pesisir</td>
                                    <td><span class="badge bg-info text-dark">Ekonomi</span></td>
                                    <td>RW 08</td>
                                    <td><span class="badge bg-success">Baik</span></td>
                                    <td>Aspal (Roda 4)</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Dukungan Pemkab (Reusable Component) -->
        <x-ui.dukungan-pemkab village-name="Kelurahan Pasir Wan Salim" year="2026" />

        <!-- ============================================================== -->
        <!--  ALUR PENYELENGGARAAN PEMBINAAN KELURAHAN CINTA STATISTIK (GSBPM) -->
        <!-- ============================================================== -->
        <div class="card border-0 shadow-sm rounded-4 mb-5 p-4 bg-white" id="gsbpm-flow" data-aos="fade-up" data-aos-duration="1000" style="overflow: hidden;">
            
            <!-- Header Section -->
            <div class="d-flex justify-content-between align-items-start align-items-md-center mb-3 flex-wrap gap-3">
                <div>
                    <div class="d-flex align-items-center gap-2 mb-2 flex-wrap">
                        <span class="badge bg-primary-subtle text-primary border border-primary-subtle rounded-pill px-3 py-1 fw-bold extra-small">
                            <i class="fas fa-certificate me-1"></i> Standar Internasional BPS &amp; UNECE (GSBPM)
                        </span>
                        <span class="badge bg-success-subtle text-success border border-success-subtle rounded-pill px-3 py-1 fw-bold extra-small">
                            <i class="fas fa-database me-1"></i> Satu Data Indonesia (SDI)
                        </span>
                    </div>
                    <h4 class="fw-bold text-dark mb-1">
                        <i class="fas fa-project-diagram me-2 text-primary"></i>Alur Penyelenggaraan Pembinaan Kelurahan Cinta Statistik (GSBPM)
                    </h4>
                    <p class="text-muted small mb-0">Rangkaian 8 fase pembinaan statistik sektoral Kelurahan Pasir Wan Salim 2026 mengadopsi standar <em>Generic Statistical Business Process Model</em> (GSBPM v5.1).</p>
                </div>
                <div class="d-flex gap-2 align-items-center flex-wrap">
                    <a href="#metadataTab" class="btn btn-sm btn-outline-primary rounded-pill px-3 fw-semibold shadow-sm">
                        <i class="fas fa-database me-1"></i> Buka Metadata SDI
                    </a>
                    <button type="button" class="btn btn-sm btn-dark rounded-pill px-3 fw-semibold font-monospace" id="gsbpm-play-btn" onclick="toggleGsbpmAutoPlay()" title="Klik untuk Jeda/Lanjut Rotasi Otomatis">
                        <i class="fas fa-pause fa-xs text-warning me-1" id="gsbpm-play-icon"></i>
                        <span id="gsbpm-timer-badge">Auto: ON (6.5s)</span>
                    </button>
                </div>
            </div>

            <!-- Progress Track Bar -->
            <div class="gsbpm-progress-container mb-3">
                <div class="d-flex justify-content-between align-items-center mb-1">
                    <span class="extra-small fw-bold text-primary" id="gsbpm-step-label">
                        <i class="fas fa-spinner fa-spin me-1 text-primary"></i> Fase 1 dari 8: Specify Needs (Identifikasi Kebutuhan)
                    </span>
                    <span class="extra-small text-muted fw-bold font-monospace" id="gsbpm-progress-pct">12.5% Selesai</span>
                </div>
                <div class="progress rounded-pill bg-light border" style="height: 6px;">
                    <div class="progress-bar progress-bar-striped progress-bar-animated bg-success" id="gsbpm-progress-bar" role="progressbar" style="width: 12.5%; transition: width 0.4s ease;"></div>
                </div>
            </div>

            <!-- Custom Modern Stepper CSS -->
            <style>
                .gsbpm-scroll-track {
                    overflow-x: auto !important;
                    overflow-y: hidden !important;
                    scrollbar-width: none !important;
                    -ms-overflow-style: none !important;
                    scroll-behavior: smooth;
                    padding: 4px 2px 10px 2px;
                }
                .gsbpm-scroll-track::-webkit-scrollbar {
                    display: none !important;
                }

                .gsbpm-nav-btn {
                    background: #f8fafc;
                    border: 1.5px solid #e2e8f0 !important;
                    border-radius: 16px !important;
                    padding: 10px 14px !important;
                    min-width: 135px;
                    max-width: 160px;
                    height: 100%;
                    transition: all 0.25s cubic-bezier(0.4, 0, 0.2, 1);
                    text-align: left;
                    display: flex;
                    flex-direction: column;
                    justify-content: space-between;
                    position: relative;
                    cursor: pointer;
                }
                .gsbpm-nav-btn:hover {
                    background: #ffffff;
                    border-color: #cbd5e1 !important;
                    transform: translateY(-3px);
                    box-shadow: 0 6px 16px rgba(0, 0, 0, 0.06);
                }
                .gsbpm-nav-btn.active {
                    background: #ffffff !important;
                    border-color: var(--primary, #064E3B) !important;
                    box-shadow: 0 6px 20px rgba(6, 78, 59, 0.16) !important;
                    transform: translateY(-2px);
                }
                .gsbpm-nav-btn.active::after {
                    content: '';
                    position: absolute;
                    bottom: -1px;
                    left: 14px;
                    right: 14px;
                    height: 3.5px;
                    background: var(--primary, #064E3B);
                    border-radius: 4px 4px 0 0;
                }
                .gsbpm-num-badge {
                    width: 26px;
                    height: 26px;
                    border-radius: 50%;
                    background: #e2e8f0;
                    color: #475569;
                    font-size: 0.72rem;
                    font-weight: 800;
                    display: inline-flex;
                    align-items: center;
                    justify-content: center;
                    transition: all 0.2s ease;
                }
                .gsbpm-nav-btn.active .gsbpm-num-badge {
                    background: var(--primary, #064E3B);
                    color: #ffffff;
                    box-shadow: 0 2px 8px rgba(6, 78, 59, 0.35);
                }
                .gsbpm-nav-btn .phase-title {
                    font-size: 0.88rem;
                    font-weight: 700;
                    color: #1e293b;
                    margin-top: 6px;
                    margin-bottom: 2px;
                    line-height: 1.2;
                    white-space: nowrap;
                    overflow: hidden;
                    text-overflow: ellipsis;
                }
                .gsbpm-nav-btn.active .phase-title {
                    color: var(--primary, #064E3B);
                }
                .gsbpm-nav-btn .phase-desc {
                    font-size: 0.72rem;
                    color: #64748b;
                    line-height: 1.2;
                    white-space: nowrap;
                    overflow: hidden;
                    text-overflow: ellipsis;
                }

                .gsbpm-nav-arrow {
                    width: 32px;
                    height: 32px;
                    border-radius: 50%;
                    background: #ffffff;
                    border: 1px solid #e2e8f0;
                    box-shadow: 0 2px 8px rgba(0,0,0,0.08);
                    color: var(--primary, #064E3B);
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    cursor: pointer;
                    transition: all 0.2s ease;
                    flex-shrink: 0;
                }
                .gsbpm-nav-arrow:hover {
                    background: var(--primary, #064E3B);
                    color: #ffffff;
                    border-color: var(--primary, #064E3B);
                    transform: scale(1.08);
                }
            </style>

            <!-- Modern Stepper Carousel with Arrow Navs -->
            <div class="position-relative mb-4">
                <div class="d-flex align-items-center gap-2">
                    <button type="button" class="gsbpm-nav-arrow d-none d-md-flex" onclick="scrollGsbpmTrack('left')" title="Geser Kiri">
                        <i class="fas fa-chevron-left fa-xs"></i>
                    </button>
                    
                    <div class="gsbpm-scroll-track flex-grow-1" id="gsbpm-scroll-track">
                        <ul class="nav nav-pills flex-nowrap gap-2" id="gsbpm-tabs" role="tablist">
                            <li class="nav-item flex-shrink-0" role="presentation">
                                <button class="nav-link active gsbpm-nav-btn" id="tab-gsbpm-1" data-bs-toggle="pill" data-bs-target="#pane-gsbpm-1" type="button" role="tab" aria-selected="true" onclick="manualSelectGsbpmTab(0)">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <span class="gsbpm-num-badge">01</span>
                                        <i class="fas fa-clipboard-check text-primary extra-small"></i>
                                    </div>
                                    <div class="phase-title">Specify Needs</div>
                                    <div class="phase-desc">Identifikasi Kebutuhan</div>
                                </button>
                            </li>
                            <li class="nav-item flex-shrink-0" role="presentation">
                                <button class="nav-link gsbpm-nav-btn" id="tab-gsbpm-2" data-bs-toggle="pill" data-bs-target="#pane-gsbpm-2" type="button" role="tab" aria-selected="false" onclick="manualSelectGsbpmTab(1)">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <span class="gsbpm-num-badge">02</span>
                                        <i class="fas fa-drafting-compass text-info extra-small"></i>
                                    </div>
                                    <div class="phase-title">Design</div>
                                    <div class="phase-desc">Metadata &amp; Kuesioner</div>
                                </button>
                            </li>
                            <li class="nav-item flex-shrink-0" role="presentation">
                                <button class="nav-link gsbpm-nav-btn" id="tab-gsbpm-3" data-bs-toggle="pill" data-bs-target="#pane-gsbpm-3" type="button" role="tab" aria-selected="false" onclick="manualSelectGsbpmTab(2)">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <span class="gsbpm-num-badge">03</span>
                                        <i class="fas fa-cubes text-secondary extra-small"></i>
                                    </div>
                                    <div class="phase-title">Build</div>
                                    <div class="phase-desc">CAPI &amp; Database</div>
                                </button>
                            </li>
                            <li class="nav-item flex-shrink-0" role="presentation">
                                <button class="nav-link gsbpm-nav-btn" id="tab-gsbpm-4" data-bs-toggle="pill" data-bs-target="#pane-gsbpm-4" type="button" role="tab" aria-selected="false" onclick="manualSelectGsbpmTab(3)">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <span class="gsbpm-num-badge">04</span>
                                        <i class="fas fa-mobile-alt text-success extra-small"></i>
                                    </div>
                                    <div class="phase-title">Collect</div>
                                    <div class="phase-desc">Pelatihan &amp; Survei RT</div>
                                </button>
                            </li>
                            <li class="nav-item flex-shrink-0" role="presentation">
                                <button class="nav-link gsbpm-nav-btn" id="tab-gsbpm-5" data-bs-toggle="pill" data-bs-target="#pane-gsbpm-5" type="button" role="tab" aria-selected="false" onclick="manualSelectGsbpmTab(4)">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <span class="gsbpm-num-badge">05</span>
                                        <i class="fas fa-brain text-warning extra-small"></i>
                                    </div>
                                    <div class="phase-title">Process</div>
                                    <div class="phase-desc">AI Gemini &amp; Validasi</div>
                                </button>
                            </li>
                            <li class="nav-item flex-shrink-0" role="presentation">
                                <button class="nav-link gsbpm-nav-btn" id="tab-gsbpm-6" data-bs-toggle="pill" data-bs-target="#pane-gsbpm-6" type="button" role="tab" aria-selected="false" onclick="manualSelectGsbpmTab(5)">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <span class="gsbpm-num-badge">06</span>
                                        <i class="fas fa-chart-line text-danger extra-small"></i>
                                    </div>
                                    <div class="phase-title">Analyze</div>
                                    <div class="phase-desc">8 Indikator &amp; Wawasan</div>
                                </button>
                            </li>
                            <li class="nav-item flex-shrink-0" role="presentation">
                                <button class="nav-link gsbpm-nav-btn" id="tab-gsbpm-7" data-bs-toggle="pill" data-bs-target="#pane-gsbpm-7" type="button" role="tab" aria-selected="false" onclick="manualSelectGsbpmTab(6)">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <span class="gsbpm-num-badge">07</span>
                                        <i class="fas fa-globe text-primary extra-small"></i>
                                    </div>
                                    <div class="phase-title">Disseminate</div>
                                    <div class="phase-desc">Monografi &amp; Web</div>
                                </button>
                            </li>
                            <li class="nav-item flex-shrink-0" role="presentation">
                                <button class="nav-link gsbpm-nav-btn" id="tab-gsbpm-8" data-bs-toggle="pill" data-bs-target="#pane-gsbpm-8" type="button" role="tab" aria-selected="false" onclick="manualSelectGsbpmTab(7)">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <span class="gsbpm-num-badge">08</span>
                                        <i class="fas fa-sync-alt text-success extra-small"></i>
                                    </div>
                                    <div class="phase-title">Evaluate</div>
                                    <div class="phase-desc">SOP Layanan Data</div>
                                </button>
                            </li>
                        </ul>
                    </div>

                    <button type="button" class="gsbpm-nav-arrow d-none d-md-flex" onclick="scrollGsbpmTrack('right')" title="Geser Kanan">
                        <i class="fas fa-chevron-right fa-xs"></i>
                    </button>
                </div>
            </div>

            <!-- Tab Content Panes -->
            <div class="tab-content" id="gsbpm-panes">
                
                <!-- FASE 1: SPECIFY NEEDS -->
                <div class="tab-pane fade show active" id="pane-gsbpm-1" role="tabpanel">
                    <div class="p-4 rounded-4 bg-white border shadow-sm">
                        <div class="row align-items-center g-4">
                            <div class="col-lg-7">
                                <div class="d-flex align-items-center gap-2 mb-2 flex-wrap">
                                    <span class="badge bg-primary-subtle text-primary border border-primary-subtle px-3 py-1 rounded-pill extra-small fw-bold">Fase 1: Specify Needs</span>
                                    <span class="badge bg-light text-dark border rounded-pill extra-small"><i class="fas fa-calendar-alt me-1 text-primary"></i> Mei - Awal Juni 2026</span>
                                    <span class="badge bg-success-subtle text-success rounded-pill extra-small"><i class="fas fa-check-circle me-1"></i> Selesai &amp; Diresmikan</span>
                                </div>
                                <h5 class="fw-bold text-dark mb-2">Identifikasi Kebutuhan Data &amp; Pencanangan Resmi Kelurahan Cantik</h5>
                                <p class="text-muted small mb-3">Langkah inisiasi pembinaan statistik sektoral yang diawali koordinasi antara BPS Kabupaten Mempawah dan Pemerintah Kelurahan Pasir Wan Salim hingga pencanangan serentak oleh Pemkab Mempawah.</p>
                                
                                <div class="bg-light p-3 rounded-3 border mb-3">
                                    <h6 class="fw-bold text-dark small mb-2"><i class="fas fa-list-check text-primary me-2"></i>Aktivitas Konkret yang Dilalui:</h6>
                                    <ul class="extra-small text-muted mb-0 ps-3">
                                        <li class="mb-1"><strong>Koordinasi Awal BPS Mempawah:</strong> Tim pembina BPS Mempawah hadir melakukan audiensi ke kantor Kelurahan Pasir Wan Salim.</li>
                                        <li class="mb-1"><strong>Persetujuan Pemkel Pasir Wan Salim:</strong> Lurah dan jajaran staf menyepakati komitmen pelaksanaan pembinaan statistik terpadu.</li>
                                        <li class="mb-1"><strong>Pencanangan di Mempawah Command Center:</strong> Deklarasi resmi Desa &amp; Kelurahan Cantik 2026 bersama Bupati/Sekda Mempawah di Kantor Bupati.</li>
                                        <li><strong>Penetapan Agen Statistik Kelurahan:</strong> Penunjukan aparatur kelurahan dan operator IT sebagai Agen Statistik resmi.</li>
                                    </ul>
                                </div>
                                <div class="d-flex gap-2 flex-wrap">
                                    <button type="button" class="btn btn-sm btn-outline-primary rounded-pill extra-small" onclick="openImagePreviewModal('{{ asset('images/pencanangan-2026.webp') }}', 'Pencanangan Kelurahan Cantik 2026', 'Deklarasi &amp; Pencanangan Resmi Desa &amp; Kelurahan Cinta Statistik Kabupaten Mempawah 2026 oleh BPS &amp; Pemkab.')">
                                        <i class="fas fa-eye me-1"></i> Pratinjau Foto Pencanangan
                                    </button>
                                </div>
                            </div>
                            <div class="col-lg-5">
                                <div class="card border rounded-4 overflow-hidden shadow-sm img-hover-card clickable-img" onclick="openImagePreviewModal('{{ asset('images/pencanangan-2026.webp') }}', 'Pencanangan Kelurahan Cantik 2026', 'Deklarasi &amp; Pencanangan Resmi Desa &amp; Kelurahan Cinta Statistik Kabupaten Mempawah 2026 oleh BPS &amp; Pemkab.')">
                                    <div class="overflow-hidden border-bottom img-zoom-wrapper" style="height: 190px;">
                                        <picture>
                                            <source srcset="{{ asset('images/pencanangan-2026.avif') }}" type="image/avif">
                                            <source srcset="{{ asset('images/pencanangan-2026.webp') }}" type="image/webp">
                                            <img src="{{ asset('images/pencanangan-2026.webp') }}" alt="Pencanangan Desa Cantik 2026" class="img-fluid w-100 h-100 object-fit-cover" loading="lazy" decoding="async" width="1000" height="750">
                                        </picture>
                                        <div class="zoom-overlay"><i class="fas fa-search-plus"></i> Perbesar</div>
                                    </div>
                                    <div class="p-3 bg-light text-center">
                                        <h6 class="fw-bold text-dark mb-1 small">Pencanangan Kelurahan Cantik 2026</h6>
                                        <p class="extra-small text-muted mb-0">Mempawah Command Center, Kantor Bupati Mempawah</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- FASE 2: DESIGN -->
                <div class="tab-pane fade" id="pane-gsbpm-2" role="tabpanel">
                    <div class="p-4 rounded-4 bg-white border shadow-sm">
                        <div class="row align-items-center g-4">
                            <div class="col-lg-7">
                                <div class="d-flex align-items-center gap-2 mb-2 flex-wrap">
                                    <span class="badge bg-info-subtle text-info border border-info-subtle px-3 py-1 rounded-pill extra-small fw-bold">Fase 2: Design</span>
                                    <span class="badge bg-light text-dark border rounded-pill extra-small"><i class="fas fa-calendar-alt me-1 text-info"></i> Awal Juni 2026</span>
                                    <span class="badge bg-success-subtle text-success rounded-pill extra-small"><i class="fas fa-check-circle me-1"></i> Selesai (SDI Compliant)</span>
                                </div>
                                <h5 class="fw-bold text-dark mb-2">Desain Kuesioner &amp; Standardisasi Metadata Statistik (SDI)</h5>
                                <p class="text-muted small mb-3">Perancangan instrumen pencacahan mikro berbasis agregat 9 RT dan 5 fasilitas umum dengan mengacu pada standar Metadata Satu Data Indonesia (SDI).</p>
                                
                                <div class="bg-light p-3 rounded-3 border mb-3">
                                    <h6 class="fw-bold text-dark small mb-2"><i class="fas fa-table-list text-info me-2"></i>Komponen Metadata &amp; Instrumen yang Disusun:</h6>
                                    <ul class="extra-small text-muted mb-0 ps-3">
                                        <li class="mb-1"><strong>MS-Kegiatan:</strong> Pendataan Potensi RT &amp; Fasilitas Kelurahan Cantik Pasir Wan Salim 2026.</li>
                                        <li class="mb-1"><strong>MS-Variabel (26 Variabel RT + 10 Variabel Fasilitas):</strong> Definisi operasional demografi, lansia, bansos, kepemilikan sanitasi, serta koordinat GPS fasilitas.</li>
                                        <li class="mb-1"><strong>MS-Indikator (8 Indikator Prioritas):</strong> Rumus Sex Ratio, Rata-rata ART, Proporsi Lansia, Bansos, Putus Sekolah, Kepadatan Hunian, dan Aksesibilitas.</li>
                                        <li><strong>Desain Kuesioner Digital:</strong> Penyesuaian formulir wawancara ketua RT agar ramah diisi melalui smartphone CAPI.</li>
                                    </ul>
                                </div>
                                <div class="d-flex gap-2 flex-wrap">
                                    <a href="#metadataTab" class="btn btn-sm btn-info text-dark rounded-pill extra-small fw-bold">
                                        <i class="fas fa-eye me-1"></i> Lihat Tab Metadata SDI
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-5">
                                <div class="card border rounded-4 overflow-hidden shadow-sm img-hover-card clickable-img" onclick="openImagePreviewModal('{{ asset('images/pasirwansalim/kantor-kelurahan.webp') }}', 'Kantor Kelurahan Pasir Wan Salim', 'Pusat posko koordinasi data Kelurahan Cantik Pasir Wan Salim 2026.')">
                                    <div class="overflow-hidden border-bottom img-zoom-wrapper" style="height: 190px;">
                                        <picture>
                                            <source srcset="{{ asset('images/pasirwansalim/kantor-kelurahan.avif') }}" type="image/avif">
                                            <source srcset="{{ asset('images/pasirwansalim/kantor-kelurahan.webp') }}" type="image/webp">
                                            <img src="{{ asset('images/pasirwansalim/kantor-kelurahan.webp') }}" alt="Kantor Kelurahan Pasir Wan Salim" class="img-fluid w-100 h-100 object-fit-cover" loading="lazy" decoding="async" width="1000" height="750">
                                        </picture>
                                        <div class="zoom-overlay"><i class="fas fa-search-plus"></i> Perbesar</div>
                                    </div>
                                    <div class="p-3 bg-light text-center">
                                        <h6 class="fw-bold text-dark mb-1 small">Standardisasi Metadata &amp; Instrumen</h6>
                                        <p class="extra-small text-muted mb-0">Posko Kelurahan Cantik Pasir Wan Salim 2026</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- FASE 3: BUILD -->
                <div class="tab-pane fade" id="pane-gsbpm-3" role="tabpanel">
                    <div class="p-4 rounded-4 bg-white border shadow-sm">
                        <div class="row align-items-center g-4">
                            <div class="col-lg-7">
                                <div class="d-flex align-items-center gap-2 mb-2 flex-wrap">
                                    <span class="badge bg-secondary-subtle text-secondary border border-secondary-subtle px-3 py-1 rounded-pill extra-small fw-bold">Fase 3: Build</span>
                                    <span class="badge bg-light text-dark border rounded-pill extra-small"><i class="fas fa-calendar-alt me-1 text-secondary"></i> Juni 2026</span>
                                    <span class="badge bg-success-subtle text-success rounded-pill extra-small"><i class="fas fa-check-circle me-1"></i> Siap Pakai</span>
                                </div>
                                <h5 class="fw-bold text-dark mb-2">Pengembangan Aplikasi CAPI Mobile AppSheet &amp; Sinkronisasi Cloud</h5>
                                <p class="text-muted small mb-3">Pembangunan aplikasi survei berbasis Android/iOS menggunakan AppSheet yang terhubung langsung secara real-time ke basis data cloud Google Sheets.</p>
                                
                                <div class="bg-light p-3 rounded-3 border mb-3">
                                    <h6 class="fw-bold text-dark small mb-2"><i class="fas fa-cogs text-secondary me-2"></i>Fitur Sistem CAPI yang Dikonfigurasi:</h6>
                                    <ul class="extra-small text-muted mb-0 ps-3">
                                        <li class="mb-1"><strong>Logika Validasi Real-Time:</strong> Mencegah kesalahan input logika (contoh: Jumlah bansos tidak melampaui jumlah KK terdaftar).</li>
                                        <li class="mb-1"><strong>Geotagging GPS Otomatis:</strong> Pengambilan titik koordinat akurat pada fasilitas publik (latitude &amp; longitude).</li>
                                        <li class="mb-1"><strong>Modul Kamera &amp; Unggah Foto:</strong> Dokumentasi visual kondisi fisik fasilitas kelurahan langsung dari lapangan.</li>
                                        <li><strong>Integrasi Google Sheets:</strong> Penyimpanan data tabel `Appsheet_RT` dan `Appsheet_Fasilitas` secara terpusat dan aman.</li>
                                    </ul>
                                </div>
                                <div class="d-flex gap-2 flex-wrap">
                                    <a href="#tabel-rt" class="btn btn-sm btn-outline-secondary rounded-pill extra-small">
                                        <i class="fas fa-table me-1"></i> Lihat Data CAPI Hasil Sinkronisasi
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-5">
                                <div class="card border rounded-4 overflow-hidden shadow-sm img-hover-card clickable-img" onclick="openImagePreviewModal('{{ asset('images/excel-sdi-cover.webp') }}', 'Workbook Data Excel SDI 2026', 'Struktur 5 Sheet Data Mentah &amp; Indikator SDI Kelurahan Pasir Wan Salim 2026.')">
                                    <div class="overflow-hidden border-bottom img-zoom-wrapper" style="height: 190px; background-color: #f8fafc;">
                                        <picture>
                                            <source srcset="{{ asset('images/excel-sdi-cover.avif') }}" type="image/avif">
                                            <source srcset="{{ asset('images/excel-sdi-cover.webp') }}" type="image/webp">
                                            <img src="{{ asset('images/excel-sdi-cover.webp') }}" alt="Arsitektur Database Cloud & CAPI" class="img-fluid w-100 h-100 object-fit-contain p-2" loading="lazy" decoding="async" width="800" height="600">
                                        </picture>
                                        <div class="zoom-overlay"><i class="fas fa-search-plus"></i> Perbesar</div>
                                    </div>
                                    <div class="p-3 bg-light text-center">
                                        <h6 class="fw-bold text-dark mb-1 small">Arsitektur CAPI AppSheet &amp; Database</h6>
                                        <p class="extra-small text-muted mb-0">Integrasi Cloud Google Sheets &amp; Geolocation GPS</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- FASE 4: COLLECT -->
                <div class="tab-pane fade" id="pane-gsbpm-4" role="tabpanel">
                    <div class="p-4 rounded-4 bg-white border shadow-sm">
                        <div class="row align-items-center g-4">
                            <div class="col-lg-7">
                                <div class="d-flex align-items-center gap-2 mb-2 flex-wrap">
                                    <span class="badge bg-success-subtle text-success border border-success-subtle px-3 py-1 rounded-pill extra-small fw-bold">Fase 4: Collect</span>
                                    <span class="badge bg-light text-dark border rounded-pill extra-small"><i class="fas fa-calendar-alt me-1 text-success"></i> Juni - Juli 2026</span>
                                    <span class="badge bg-success-subtle text-success rounded-pill extra-small"><i class="fas fa-check-circle me-1"></i> 100% Terdata (9 RT &amp; 5 Fasilitas)</span>
                                </div>
                                <h5 class="fw-bold text-dark mb-2">Pelatihan Agen Statistik &amp; Pendataan Terpusat Ketua RT via CAPI</h5>
                                <p class="text-muted small mb-3">Pelatihan intensif bagi Agen Statistik Kelurahan di BPS Mempawah serta pencacahan terpusat terhadap seluruh 9 Ketua RT dan inventarisasi fasilitas umum.</p>
                                
                                <div class="bg-light p-3 rounded-3 border mb-3">
                                    <h6 class="fw-bold text-dark small mb-2"><i class="fas fa-users-viewfinder text-success me-2"></i>Pelaksanaan Lapangan:</h6>
                                    <ul class="extra-small text-muted mb-0 ps-3">
                                        <li class="mb-1"><strong>Pelatihan Agen Statistik:</strong> BPS Mempawah membekali agen statistik pengoperasian CAPI, konsep GSBPM, dan tata cara wawancara.</li>
                                        <li class="mb-1"><strong>Pendataan Terpusat:</strong> Para Ketua RT diwawancarai oleh Agen Statistik Kelurahan menggunakan CAPI berdasarkan data registrasi terkini.</li>
                                        <li><strong>Observasi Fasilitas Umum:</strong> Agen statistik melakukan geotagging GPS dan foto kondisi sarana publik di seluruh RW.</li>
                                    </ul>
                                </div>
                                <div class="d-flex gap-2 flex-wrap">
                                    <button type="button" class="btn btn-sm btn-outline-success rounded-pill extra-small" onclick="openImagePreviewModal('{{ asset('images/pasirwansalim/pendataan-capi-1.webp') }}', 'Pengumpulan Data Lapangan CAPI', 'Wawancara CAPI potensi keluarga dan bangunan warga di Pasir Wan Salim 2026.')">
                                        <i class="fas fa-eye me-1"></i> Pratinjau Foto Lapangan
                                    </button>
                                </div>
                            </div>
                            <div class="col-lg-5">
                                <div class="card border rounded-4 overflow-hidden shadow-sm img-hover-card clickable-img" onclick="openImagePreviewModal('{{ asset('images/pasirwansalim/pendataan-capi-1.webp') }}', 'Pengumpulan Data Lapangan CAPI', 'Wawancara CAPI potensi keluarga dan bangunan warga di Pasir Wan Salim 2026.')">
                                    <div class="overflow-hidden border-bottom img-zoom-wrapper" style="height: 190px;">
                                        <picture>
                                            <source srcset="{{ asset('images/pasirwansalim/pendataan-capi-1.avif') }}" type="image/avif">
                                            <source srcset="{{ asset('images/pasirwansalim/pendataan-capi-1.webp') }}" type="image/webp">
                                            <img src="{{ asset('images/pasirwansalim/pendataan-capi-1.webp') }}" alt="Pengumpulan Data Lapangan CAPI" class="img-fluid w-100 h-100 object-fit-cover" loading="lazy" decoding="async" width="1000" height="750">
                                        </picture>
                                        <div class="zoom-overlay"><i class="fas fa-search-plus"></i> Perbesar</div>
                                    </div>
                                    <div class="p-3 bg-light text-center">
                                        <h6 class="fw-bold text-dark mb-1 small">Pengumpulan Data Lapangan CAPI</h6>
                                        <p class="extra-small text-muted mb-0">Wawancara 9 Ketua RT &amp; Geotagging Fasilitas</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- FASE 5: PROCESS -->
                <div class="tab-pane fade" id="pane-gsbpm-5" role="tabpanel">
                    <div class="p-4 rounded-4 bg-white border shadow-sm">
                        <div class="row align-items-center g-4">
                            <div class="col-lg-7">
                                <div class="d-flex align-items-center gap-2 mb-2 flex-wrap">
                                    <span class="badge bg-warning-subtle text-dark border border-warning-subtle px-3 py-1 rounded-pill extra-small fw-bold">Fase 5: Process</span>
                                    <span class="badge bg-light text-dark border rounded-pill extra-small"><i class="fas fa-calendar-alt me-1 text-warning"></i> Juli 2026</span>
                                    <span class="badge bg-success-subtle text-success rounded-pill extra-small"><i class="fas fa-check-circle me-1"></i> Verifikasi AI Lulus</span>
                                </div>
                                <h5 class="fw-bold text-dark mb-2">Pengolahan &amp; Verifikasi Data Berbasis AI Gemini di Google Sheets</h5>
                                <p class="text-muted small mb-3">Pembersihan data (*data cleaning*), rekonsiliasi anomali, dan pelatihan validasi otomatis memanfaatkan kecerdasan buatan (Gemini AI) yang terpasang di Google Sheets.</p>
                                
                                <div class="bg-light p-3 rounded-3 border mb-3">
                                    <h6 class="fw-bold text-dark small mb-2"><i class="fas fa-wand-magic-sparkles text-warning me-2"></i>Inovasi Pengolahan Data:</h6>
                                    <ul class="extra-small text-muted mb-0 ps-3">
                                        <li class="mb-1"><strong>Pembersihan &amp; Imputasi Data:</strong> Koreksi penulisan nama RT/RW, penyesuaian format numerik, dan deteksi duplikasi ID.</li>
                                        <li class="mb-1"><strong>Verifikasi AI Gemini di Google Sheets:</strong> Formula prompt AI untuk mendeteksi outlier data sosial, lansia, dan bansos.</li>
                                        <li><strong>Agregasi Hierarki SDI:</strong> Perhitungan rekapitulasi data otomatis dari tingkat 9 RT ke RW hingga total Kelurahan.</li>
                                    </ul>
                                </div>
                                <div class="d-flex gap-2 flex-wrap">
                                    <button type="button" class="btn btn-sm btn-outline-warning text-dark rounded-pill extra-small" onclick="openImagePreviewModal('{{ asset('images/pasirwansalim/pendataan-capi-2.webp') }}', 'Pelatihan Pengolahan Data CAPI', 'Proses verifikasi data dan pembekalan analitika data di Kantor BPS Mempawah 2026.')">
                                        <i class="fas fa-eye me-1"></i> Pratinjau Foto Pengolahan
                                    </button>
                                </div>
                            </div>
                            <div class="col-lg-5">
                                <div class="card border rounded-4 overflow-hidden shadow-sm img-hover-card clickable-img" onclick="openImagePreviewModal('{{ asset('images/pasirwansalim/pendataan-capi-2.webp') }}', 'Pelatihan Pengolahan Data CAPI', 'Proses verifikasi data dan pembekalan analitika data di Kantor BPS Mempawah 2026.')">
                                    <div class="overflow-hidden border-bottom img-zoom-wrapper" style="height: 190px;">
                                        <picture>
                                            <source srcset="{{ asset('images/pasirwansalim/pendataan-capi-2.avif') }}" type="image/avif">
                                            <source srcset="{{ asset('images/pasirwansalim/pendataan-capi-2.webp') }}" type="image/webp">
                                            <img src="{{ asset('images/pasirwansalim/pendataan-capi-2.webp') }}" alt="Pelatihan Pengolahan Data CAPI & AI" class="img-fluid w-100 h-100 object-fit-cover" loading="lazy" decoding="async" width="1000" height="750">
                                        </picture>
                                        <div class="zoom-overlay"><i class="fas fa-search-plus"></i> Perbesar</div>
                                    </div>
                                    <div class="p-3 bg-light text-center">
                                        <h6 class="fw-bold text-dark mb-1 small">Pengolahan &amp; Validasi AI Gemini</h6>
                                        <p class="extra-small text-muted mb-0">Verifikasi Anomali di Google Sheets &bull; BPS Mempawah</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- FASE 6: ANALYZE -->
                <div class="tab-pane fade" id="pane-gsbpm-6" role="tabpanel">
                    <div class="p-4 rounded-4 bg-white border shadow-sm">
                        <div class="row align-items-center g-4">
                            <div class="col-lg-7">
                                <div class="d-flex align-items-center gap-2 mb-2 flex-wrap">
                                    <span class="badge bg-danger-subtle text-danger border border-danger-subtle px-3 py-1 rounded-pill extra-small fw-bold">Fase 6: Analyze</span>
                                    <span class="badge bg-light text-dark border rounded-pill extra-small"><i class="fas fa-calendar-alt me-1 text-danger"></i> Akhir Juli 2026</span>
                                    <span class="badge bg-success-subtle text-success rounded-pill extra-small"><i class="fas fa-check-circle me-1"></i> Analisis Tuntas</span>
                                </div>
                                <h5 class="fw-bold text-dark mb-2">Analisis 8 Indikator SDI &amp; Perumusan Rekomendasi Kelurahan</h5>
                                <p class="text-muted small mb-3">Kalkulasi 8 indikator statistik strategis Satu Data Indonesia serta perumusan wawasan analitik terkait demografi, proporsi lansia, dan penerima bansos.</p>
                                
                                <div class="bg-light p-3 rounded-3 border mb-3">
                                    <h6 class="fw-bold text-dark small mb-2"><i class="fas fa-chart-pie text-danger me-2"></i>Hasil Analisis &amp; Wawasan Sektoral:</h6>
                                    <ul class="extra-small text-muted mb-0 ps-3">
                                        <li class="mb-1"><strong>Kalkulasi 8 Indikator SDI:</strong> Sex Ratio, Rata-rata ART, Proporsi Lansia, KTP-el, Penerima Bansos, Kepadatan Hunian, dan Akses Fasilitas.</li>
                                        <li class="mb-1"><strong>Wawasan Kesejahteraan Sosial:</strong> Analisis sebaran penerima bantuan sosial PKH/BPNT di 9 RT.</li>
                                        <li><strong>Rekomendasi Kebijakan:</strong> Masukan data mikro untuk musrenbang dan penyusunan program kerja kelurahan berbasis bukti.</li>
                                    </ul>
                                </div>
                                <div class="d-flex gap-2 flex-wrap">
                                    <a href="#sop-layanan" class="btn btn-sm btn-outline-danger rounded-pill extra-small">
                                        <i class="fas fa-chart-line me-1"></i> Lihat Produk Statistik Kelurahan
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-5">
                                <div class="card border rounded-4 overflow-hidden shadow-sm img-hover-card clickable-img" onclick="openImagePreviewModal('{{ asset('images/pasirwansalim/pendataan-capi-3.webp') }}', 'Analisis Data Kelurahan Pasir Wan Salim', 'Pembekalan interpretasi indikator statistik di Kantor Kelurahan Pasir Wan Salim 2026.')">
                                    <div class="overflow-hidden border-bottom img-zoom-wrapper" style="height: 190px;">
                                        <picture>
                                            <source srcset="{{ asset('images/pasirwansalim/pendataan-capi-3.avif') }}" type="image/avif">
                                            <source srcset="{{ asset('images/pasirwansalim/pendataan-capi-3.webp') }}" type="image/webp">
                                            <img src="{{ asset('images/pasirwansalim/pendataan-capi-3.webp') }}" alt="Analisis Data Kelurahan" class="img-fluid w-100 h-100 object-fit-cover" loading="lazy" decoding="async" width="1000" height="750">
                                        </picture>
                                        <div class="zoom-overlay"><i class="fas fa-search-plus"></i> Perbesar</div>
                                    </div>
                                    <div class="p-3 bg-light text-center">
                                        <h6 class="fw-bold text-dark mb-1 small">Analisis &amp; Wawasan Sektoral</h6>
                                        <p class="extra-small text-muted mb-0">Perhitungan 8 Indikator Statistik Prioritas SDI</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- FASE 7: DISSEMINATE -->
                <div class="tab-pane fade" id="pane-gsbpm-7" role="tabpanel">
                    <div class="p-4 rounded-4 bg-white border shadow-sm">
                        <div class="row align-items-center g-4">
                            <div class="col-lg-7">
                                <div class="d-flex align-items-center gap-2 mb-2 flex-wrap">
                                    <span class="badge bg-primary-subtle text-primary border border-primary-subtle px-3 py-1 rounded-pill extra-small fw-bold">Fase 7: Disseminate</span>
                                    <span class="badge bg-light text-dark border rounded-pill extra-small"><i class="fas fa-calendar-alt me-1 text-primary"></i> Agustus 2026</span>
                                    <span class="badge bg-success-subtle text-success rounded-pill extra-small"><i class="fas fa-check-circle me-1"></i> Rilis Publik</span>
                                </div>
                                <h5 class="fw-bold text-dark mb-2">Penyusunan Monografi Kelurahan &amp; Rilis Portal Web Interaktif</h5>
                                <p class="text-muted small mb-3">Penyusunan buku *Monografi Kelurahan Pasir Wan Salim 2026* serta perilisan portal web interaktif lengkap dengan peta geospasial Leaflet, visualisasi grafik, dan unduhan workbook Excel.</p>
                                
                                <div class="bg-light p-3 rounded-3 border mb-3">
                                    <h6 class="fw-bold text-dark small mb-2"><i class="fas fa-book-open text-primary me-2"></i>Produk Diseminasi yang Dirilis:</h6>
                                    <ul class="extra-small text-muted mb-0 ps-3">
                                        <li class="mb-1"><strong>Monografi Kelurahan 2026:</strong> Ringkasan profil demografi, wilayah, dan rekapitulasi data potensi 9 RT.</li>
                                        <li class="mb-1"><strong>Portal Web Kelurahan Cantik:</strong> Dashboard live dengan pencarian realtime, Leaflet Hybrid GPS Map, dan Chart.js.</li>
                                        <li><strong>Export Excel SDI Multi-Sheet:</strong> Unduhan data mikro terstruktur 5 sheet untuk kebutuhan analitik.</li>
                                    </ul>
                                </div>
                                <div class="d-flex gap-2 flex-wrap">
                                    <a href="#sop-layanan" class="btn btn-sm btn-outline-primary rounded-pill extra-small">
                                        <i class="fas fa-book me-1"></i> Buka Produk Monografi &amp; Excel
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-5">
                                <div class="card border rounded-4 overflow-hidden shadow-sm img-hover-card clickable-img" onclick="openImagePreviewModal('{{ asset('images/pasirwansalim/kantor-kelurahan.webp') }}', 'Monografi Kelurahan Pasir Wan Salim 2026', 'Publikasi resmi hasil pendataan lapangan Kelurahan Cantik 2026 BPS Kabupaten Mempawah &amp; Pemkel Pasir Wan Salim.')">
                                    <div class="overflow-hidden border-bottom img-zoom-wrapper" style="height: 190px;">
                                        <picture>
                                            <source srcset="{{ asset('images/pasirwansalim/kantor-kelurahan.avif') }}" type="image/avif">
                                            <source srcset="{{ asset('images/pasirwansalim/kantor-kelurahan.webp') }}" type="image/webp">
                                            <img src="{{ asset('images/pasirwansalim/kantor-kelurahan.webp') }}" alt="Monografi Kelurahan Pasir Wan Salim" class="img-fluid w-100 h-100 object-fit-cover" loading="lazy" decoding="async" width="1000" height="750">
                                        </picture>
                                        <div class="zoom-overlay"><i class="fas fa-search-plus"></i> Perbesar</div>
                                    </div>
                                    <div class="p-3 bg-light text-center">
                                        <h6 class="fw-bold text-dark mb-1 small">Monografi Resmi &amp; Web Portal</h6>
                                        <p class="extra-small text-muted mb-0">Rilis Publikasi Monografi &amp; Portal Kelurahan Cantik</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- FASE 8: EVALUATE -->
                <div class="tab-pane fade" id="pane-gsbpm-8" role="tabpanel">
                    <div class="p-4 rounded-4 bg-white border shadow-sm">
                        <div class="row align-items-center g-4">
                            <div class="col-lg-7">
                                <div class="d-flex align-items-center gap-2 mb-2 flex-wrap">
                                    <span class="badge bg-success-subtle text-success border border-success-subtle px-3 py-1 rounded-pill extra-small fw-bold">Fase 8: Evaluate</span>
                                    <span class="badge bg-light text-dark border rounded-pill extra-small"><i class="fas fa-calendar-alt me-1 text-success"></i> Berkelanjutan 2026+</span>
                                    <span class="badge bg-success-subtle text-success rounded-pill extra-small"><i class="fas fa-check-circle me-1"></i> SOP Aktif</span>
                                </div>
                                <h5 class="fw-bold text-dark mb-2">Evaluasi Kualitas, Penerapan SOP Permintaan Data &amp; Keberlanjutan</h5>
                                <p class="text-muted small mb-3">Penilaian menyeluruh terhadap kualitas data, pembentukan mekanisme pelayanan data resmi melalui SOP kelurahan, dan rencana pemutakhiran statistik mandiri berkala.</p>
                                
                                <div class="bg-light p-3 rounded-3 border mb-3">
                                    <h6 class="fw-bold text-dark small mb-2"><i class="fas fa-clipboard-check text-success me-2"></i>Mekanisme Evaluasi &amp; Layanan Berkelanjutan:</h6>
                                    <ul class="extra-small text-muted mb-0 ps-3">
                                        <li class="mb-1"><strong>SOP Permintaan Data 2026:</strong> Standardisasi alur permohonan data statistik bagi akademisi, instansi pemerintah, dan masyarakat.</li>
                                        <li class="mb-1"><strong>Review Kinerja Agen Statistik:</strong> Evaluasi ketepatan waktu pengumpulan, kelengkapan metadata, dan kepatuhan prinsip Satu Data Indonesia.</li>
                                        <li><strong>Kemandirian Statistik Kelurahan:</strong> Komitmen pemutakhiran data secara periodik berbasis aplikasi CAPI mandiri.</li>
                                    </ul>
                                </div>
                                <div class="d-flex gap-2 flex-wrap">
                                    <a href="#sop-layanan" class="btn btn-sm btn-outline-success rounded-pill extra-small">
                                        <i class="fas fa-file-signature me-1"></i> Standar Layanan SOP Data
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-5">
                                <div class="card border rounded-4 overflow-hidden shadow-sm img-hover-card clickable-img" onclick="openImagePreviewModal('{{ asset('images/pasirwansalim/pendataan-capi-4.webp') }}', 'SOP Pelayanan Data Kelurahan Pasir Wan Salim 2026', 'Standar Pelayanan Data Berkelanjutan 2026.')">
                                    <div class="overflow-hidden border-bottom img-zoom-wrapper" style="height: 190px;">
                                        <picture>
                                            <source srcset="{{ asset('images/pasirwansalim/pendataan-capi-4.avif') }}" type="image/avif">
                                            <source srcset="{{ asset('images/pasirwansalim/pendataan-capi-4.webp') }}" type="image/webp">
                                            <img src="{{ asset('images/pasirwansalim/pendataan-capi-4.webp') }}" alt="SOP Permintaan Data Kelurahan" class="img-fluid w-100 h-100 object-fit-cover" loading="lazy" decoding="async" width="1000" height="750">
                                        </picture>
                                        <div class="zoom-overlay"><i class="fas fa-search-plus"></i> Perbesar</div>
                                    </div>
                                    <div class="p-3 bg-light text-center">
                                        <h6 class="fw-bold text-dark mb-1 small">SOP Permintaan Data &amp; Evaluasi</h6>
                                        <p class="extra-small text-muted mb-0">Standar Pelayanan Data Berkelanjutan 2026</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <!-- Produk Statistik & SOP Permintaan Data -->
        <div class="card border-0 shadow-sm rounded-4 mb-5 p-4 bg-white" id="sop-layanan" data-aos="fade-up" data-aos-duration="1000">
            <h4 class="fw-bold text-dark mb-3"><i class="fas fa-concierge-bell me-2 text-primary"></i>Produk Statistik &amp; SOP Layanan Data Publik</h4>
            <p class="text-muted small mb-4">Layanan aksesibilitas data agregat bagi masyarakat, akademisi, dan perangkat daerah Kabupaten Mempawah.</p>
            <div class="row g-4">
                <!-- Monografi -->
                <div class="col-lg-3 col-md-6" data-aos="fade-left" data-aos-delay="100" data-aos-duration="800">
                    <div class="p-3 border rounded-4 h-100 bg-light text-center d-flex flex-column img-hover-card">
                        <div class="mb-3 overflow-hidden rounded-3 border img-zoom-wrapper clickable-img" onclick="openImagePreviewModal('{{ asset('images/pasirwansalim/kantor-kelurahan.webp') }}', 'Profil Kelurahan Pasir Wan Salim 2026', 'Monografi Kependudukan, Potensi RT &amp; Fasilitas Wilayah')" style="height: 130px;">
                            <picture><source srcset="{{{ asset('images/pasirwansalim/kantor-kelurahan.avif') }}}" type="image/avif"><source srcset="{{{ asset('images/pasirwansalim/kantor-kelurahan.webp') }}}" type="image/webp"><img src="{{{ asset('images/pasirwansalim/kantor-kelurahan.webp') }}}" alt="Monografi Kelurahan Pasir Wan Salim" class="img-fluid w-100 h-100" style="object-fit: cover;" loading="lazy" decoding="async" width="1000" height="750"></picture>
                            <div class="zoom-overlay"><i class="fas fa-search-plus"></i> Perbesar</div>
                        </div>
                        <h6 class="fw-bold text-dark mb-1">Monografi Kelurahan 2026</h6>
                        <p class="extra-small text-muted mb-3">Ringkasan profil demografi, wilayah, dan rekapitulasi data potensi RT.</p>
                        <div class="mt-auto d-grid gap-2">
                            <button type="button" class="btn btn-sm btn-outline-primary rounded-pill" onclick="openImagePreviewModal('{{ asset('images/pasirwansalim/kantor-kelurahan.webp') }}', 'Monografi Kelurahan Pasir Wan Salim 2026', 'Monografi data statistik mikro potensi kelurahan.')"><i class="fas fa-eye me-1"></i> Pratinjau Profil</button>
                        </div>
                    </div>
                </div>

                <!-- Infografis -->
                <div class="col-lg-3 col-md-6" data-aos="fade-left" data-aos-delay="200" data-aos-duration="800">
                    <div class="p-3 border rounded-4 h-100 bg-light text-center d-flex flex-column img-hover-card">
                        <div class="mb-3 overflow-hidden rounded-3 border img-zoom-wrapper clickable-img" onclick="openImagePreviewModal('{{ asset('images/pasirwansalim/pendataan-capi-1.webp') }}', 'Infografis Pendataan CAPI 2026', 'Dokumentasi kegiatan wawancara potensi wilayah di Pasir Wan Salim')" style="height: 130px;">
                            <picture><source srcset="{{{ asset('images/pasirwansalim/pendataan-capi-1.avif') }}}" type="image/avif"><source srcset="{{{ asset('images/pasirwansalim/pendataan-capi-1.webp') }}}" type="image/webp"><img src="{{{ asset('images/pasirwansalim/pendataan-capi-1.webp') }}}" alt="Infografis CAPI" class="img-fluid w-100 h-100" style="object-fit: cover;" loading="lazy" decoding="async" width="1000" height="750"></picture>
                            <div class="zoom-overlay"><i class="fas fa-search-plus"></i> Perbesar</div>
                        </div>
                        <h6 class="fw-bold text-dark mb-1">Infografis Sektoral 2026</h6>
                        <p class="extra-small text-muted mb-3">Visualisasi data statistik dalam bentuk grafik dan infografis komunikatif.</p>
                        <div class="mt-auto d-grid gap-2">
                            <button type="button" class="btn btn-sm btn-outline-success rounded-pill" onclick="openImagePreviewModal('{{ asset('images/pasirwansalim/pendataan-capi-1.webp') }}', 'Infografis Lapangan 2026', 'Dokumentasi pembinaan Desa Cantik.')"><i class="fas fa-eye me-1"></i> Pratinjau Poster</button>
                        </div>
                    </div>
                </div>

                <!-- Tabel Excel Multi-Sheet -->
                <div class="col-lg-3 col-md-6" data-aos="fade-left" data-aos-delay="300" data-aos-duration="800">
                    <div class="p-3 border rounded-4 h-100 bg-light text-center d-flex flex-column img-hover-card">
                        <div class="mb-3 overflow-hidden rounded-3 border img-zoom-wrapper clickable-img" onclick="openImagePreviewModal('{{ asset('images/excel-sdi-cover.webp') }}', 'Tabel Data Excel (SDI) 2026', 'Workbook multi-sheet lengkap: Ringkasan SDI, 8 Indikator RT, Variabel Mentah, Fasilitas, dan Rekap RW.')" style="height: 130px; background-color: #f8fafc;">
                            <picture>
                                <source srcset="{{ asset('images/excel-sdi-cover.avif') }}" type="image/avif">
                                <source srcset="{{ asset('images/excel-sdi-cover.webp') }}" type="image/webp">
                                <img src="{{ asset('images/excel-sdi-cover.webp') }}" alt="Tabel Data Excel SDI Kelurahan Pasir Wan Salim 2026" class="img-fluid w-100 h-100" style="object-fit: contain; padding: 4px;" loading="lazy" decoding="async" width="800" height="600">
                            </picture>
                            <div class="zoom-overlay">
                                <i class="fas fa-search-plus"></i> Perbesar
                            </div>
                        </div>
                        <h6 class="fw-bold text-dark mb-1">Tabel Data Excel (SDI)</h6>
                        <p class="extra-small text-muted mb-3">Workbook multi-sheet lengkap: Ringkasan SDI, 8 Indikator RT, Variabel Mentah, Fasilitas, dan Rekap RW.</p>
                        <div class="mt-auto d-grid gap-2">
                            <button type="button" class="btn btn-sm btn-outline-success rounded-pill" onclick="openImagePreviewModal('{{ asset('images/excel-sdi-cover.webp') }}', 'Tabel Data Excel (SDI) 2026', 'Workbook multi-sheet lengkap: Ringkasan SDI, 8 Indikator RT, Variabel Mentah, Fasilitas, dan Rekap RW.')">
                                <i class="fas fa-eye me-1"></i> Pratinjau Cover
                            </button>
                            <button type="button" onclick="downloadComprehensiveSDIWorkbookPasirWanSalim()" class="btn btn-sm btn-success rounded-pill fw-bold"><i class="fas fa-file-excel me-1"></i> Unduh Data Excel (.xlsx)</button>
                        </div>
                    </div>
                </div>

                <!-- SOP Permintaan Data -->
                <div class="col-lg-3 col-md-6" data-aos="fade-left" data-aos-delay="400" data-aos-duration="800">
                    <div class="p-3 border rounded-4 h-100 bg-light text-center d-flex flex-column">
                        <div class="mb-3 text-danger d-flex align-items-center justify-content-center" style="height: 130px;">
                            <i class="fas fa-clipboard-list fa-3x"></i>
                        </div>
                        <h6 class="fw-bold text-dark mb-1">SOP Permintaan Data</h6>
                        <p class="extra-small text-muted mb-3">Standar Operasional Prosedur pengajuan layanan permintaan data kelurahan.</p>
                        <div class="mt-auto d-grid gap-2">
                            <a href="#sop-layanan" onclick="alert('Permohonan data resmi dapat diajukan ke Kantor Kelurahan Pasir Wan Salim atau melalui kanal resmi PST BPS Kabupaten Mempawah.')" class="btn btn-sm btn-outline-danger rounded-pill"><i class="fas fa-info-circle me-1"></i> Informasi SOP</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Galeri Dokumentasi Lapangan -->
        <section class="container mb-5" id="dokumentasi" data-aos="fade-up" data-aos-duration="1000">
            <div class="text-center mb-4">
                <span class="badge bg-primary-subtle text-primary fw-semibold mb-2 px-3 py-2" style="font-size:0.78rem; border-radius:20px;"><i class="fas fa-camera me-1"></i> Dokumentasi Kegiatan</span>
                <h3 class="fw-bold">Foto Kegiatan Pendataan Kelurahan Cantik 2026</h3>
                <p class="text-muted small">Rangkaian kegiatan pendataan potensi wilayah dan inventarisasi fasilitas di Kelurahan Pasir Wan Salim.</p>
            </div>
            <div class="row g-3">
                <div class="col-6 col-md-4 col-lg-2" data-aos="fade-left" data-aos-delay="100" data-aos-duration="800">
                    <div class="border rounded-4 overflow-hidden shadow-sm h-100 bg-white p-2 img-hover-card clickable-img" onclick="openImagePreviewModal('{{ asset('images/pasirwansalim/kantor-kelurahan.webp') }}', 'Kantor Kelurahan Pasir Wan Salim', 'Tampak depan Kantor Kelurahan Pasir Wan Salim sebagai pusat koordinasi kegiatan Desa Cantik 2026.')">
                        <div style="height:120px; overflow:hidden; border-radius:10px;">
                            <picture><source srcset="{{{ asset('images/pasirwansalim/kantor-kelurahan.avif') }}}" type="image/avif"><source srcset="{{{ asset('images/pasirwansalim/kantor-kelurahan.webp') }}}" type="image/webp"><img src="{{{ asset('images/pasirwansalim/kantor-kelurahan.webp') }}}" class="w-100 h-100 object-fit-cover" alt="Kantor Kelurahan Pasir Wan Salim" loading="lazy" decoding="async" width="1000" height="750"></picture>
                        </div>
                        <div class="small fw-semibold mt-2 text-center text-dark text-truncate">Kantor Kelurahan</div>
                    </div>
                </div>
                <div class="col-6 col-md-4 col-lg-2" data-aos="fade-left" data-aos-delay="150" data-aos-duration="800">
                    <div class="border rounded-4 overflow-hidden shadow-sm h-100 bg-white p-2 img-hover-card clickable-img" onclick="openImagePreviewModal('{{ asset('images/pasirwansalim/pendataan-capi-1.webp') }}', 'Wawancara CAPI Lapangan #1', 'Proses wawancara CAPI potensi keluarga di lapangan Kelurahan Pasir Wan Salim 2026.')">
                        <div style="height:120px; overflow:hidden; border-radius:10px;">
                            <picture><source srcset="{{{ asset('images/pasirwansalim/pendataan-capi-1.avif') }}}" type="image/avif"><source srcset="{{{ asset('images/pasirwansalim/pendataan-capi-1.webp') }}}" type="image/webp"><img src="{{{ asset('images/pasirwansalim/pendataan-capi-1.webp') }}}" class="w-100 h-100 object-fit-cover" alt="Wawancara CAPI Lapangan" loading="lazy" decoding="async" width="1000" height="750"></picture>
                        </div>
                        <div class="small fw-semibold mt-2 text-center text-dark text-truncate">Wawancara CAPI #1</div>
                    </div>
                </div>
                <div class="col-6 col-md-4 col-lg-2" data-aos="fade-left" data-aos-delay="200" data-aos-duration="800">
                    <div class="border rounded-4 overflow-hidden shadow-sm h-100 bg-white p-2 img-hover-card clickable-img" onclick="openImagePreviewModal('{{ asset('images/pasirwansalim/pendataan-capi-2.webp') }}', 'Wawancara CAPI Lapangan #2', 'Pengisian formulir potensi kewilayahan berbasis AppSheet secara langsung bersama responden.')">
                        <div style="height:120px; overflow:hidden; border-radius:10px;">
                            <picture><source srcset="{{{ asset('images/pasirwansalim/pendataan-capi-2.avif') }}}" type="image/avif"><source srcset="{{{ asset('images/pasirwansalim/pendataan-capi-2.webp') }}}" type="image/webp"><img src="{{{ asset('images/pasirwansalim/pendataan-capi-2.webp') }}}" class="w-100 h-100 object-fit-cover" alt="Wawancara CAPI Lapangan #2" loading="lazy" decoding="async" width="1000" height="750"></picture>
                        </div>
                        <div class="small fw-semibold mt-2 text-center text-dark text-truncate">Wawancara CAPI #2</div>
                    </div>
                </div>
                <div class="col-6 col-md-4 col-lg-2" data-aos="fade-left" data-aos-delay="250" data-aos-duration="800">
                    <div class="border rounded-4 overflow-hidden shadow-sm h-100 bg-white p-2 img-hover-card clickable-img" onclick="openImagePreviewModal('{{ asset('images/pasirwansalim/pendataan-capi-3.webp') }}', 'Wawancara CAPI Lapangan #3', 'Verifikasi data lapangan bersama aparatur RT Kelurahan Pasir Wan Salim.')">
                        <div style="height:120px; overflow:hidden; border-radius:10px;">
                            <picture><source srcset="{{{ asset('images/pasirwansalim/pendataan-capi-3.avif') }}}" type="image/avif"><source srcset="{{{ asset('images/pasirwansalim/pendataan-capi-3.webp') }}}" type="image/webp"><img src="{{{ asset('images/pasirwansalim/pendataan-capi-3.webp') }}}" class="w-100 h-100 object-fit-cover" alt="Wawancara CAPI Lapangan #3" loading="lazy" decoding="async" width="1000" height="750"></picture>
                        </div>
                        <div class="small fw-semibold mt-2 text-center text-dark text-truncate">Verifikasi Lapangan</div>
                    </div>
                </div>
                <div class="col-6 col-md-4 col-lg-2" data-aos="fade-left" data-aos-delay="300" data-aos-duration="800">
                    <div class="border rounded-4 overflow-hidden shadow-sm h-100 bg-white p-2 img-hover-card clickable-img" onclick="openImagePreviewModal('{{ asset('images/pasirwansalim/pendataan-capi-4.webp') }}', 'Wawancara CAPI Lapangan #4', 'Dokumentasi kegiatan pendataan potensi kewilayahan menggunakan AppSheet Desa Cantik 2026.')">
                        <div style="height:120px; overflow:hidden; border-radius:10px;">
                            <picture><source srcset="{{{ asset('images/pasirwansalim/pendataan-capi-4.avif') }}}" type="image/avif"><source srcset="{{{ asset('images/pasirwansalim/pendataan-capi-4.webp') }}}" type="image/webp"><img src="{{{ asset('images/pasirwansalim/pendataan-capi-4.webp') }}}" class="w-100 h-100 object-fit-cover" alt="Wawancara CAPI Lapangan #4" loading="lazy" decoding="async" width="1000" height="750"></picture>
                        </div>
                        <div class="small fw-semibold mt-2 text-center text-dark text-truncate">Pendataan AppSheet</div>
                    </div>
                </div>
                <div class="col-6 col-md-4 col-lg-2" data-aos="fade-left" data-aos-delay="350" data-aos-duration="800">
                    <div class="border rounded-4 overflow-hidden shadow-sm h-100 bg-white p-2 img-hover-card clickable-img" onclick="openImagePreviewModal('{{ asset('images/pencanangan-2026.webp') }}', 'Pencanangan Kelurahan Cantik 2026', 'Deklarasi resmi program Desa &amp; Kelurahan Cinta Statistik Kabupaten Mempawah 2026.')">
                        <div style="height:120px; overflow:hidden; border-radius:10px;">
                            <picture><source srcset="{{{ asset('images/pencanangan-2026.avif') }}}" type="image/avif"><source srcset="{{{ asset('images/pencanangan-2026.webp') }}}" type="image/webp"><img src="{{{ asset('images/pencanangan-2026.webp') }}}" class="w-100 h-100 object-fit-cover" alt="Pencanangan Kelurahan Cantik 2026" loading="lazy" decoding="async" width="1000" height="750"></picture>
                        </div>
                        <div class="small fw-semibold mt-2 text-center text-dark text-truncate">Pencanangan 2026</div>
                    </div>
                </div>
            </div>
        </section>

    </main>

    <!-- Image Preview Modal Component -->
    <x-ui.image-modal />

    <!-- Embedded Fallback RT Aggregated Script (100% Privacy Compliant, Zero PII) -->
    <script id="fallback-rt" type="application/json">[{"Nama_RT":"RT 001 RW 01","Nama_Ketua_RT":"Ketua RT 001 RW 01","Jumlah_Penduduk_Laki_Laki":45,"Jumlah_Penduduk_Perempuan":40,"Jumlah_KK":30,"Jumlah_Bumbung_Rumah":24,"Jumlah_Penduduk_Lansia":16,"Jumlah_Memiliki_KTP":0,"Jumlah_Penerima_PKH":1,"Jumlah_Penerima_BPNT":0,"Jumlah_Penerima_BLTS":0,"Jumlah_Penerima_BLTDD":0,"Jumlah_Penerima_BCP":0,"Jumlah_Penerima_PIP":0,"Jumlah_Penerima_BPJS_PBI":0,"Jumlah_Penerima_BLT":0,"Jumlah_Penerima_Bansos_KK":1,"Jumlah_UMKM":2,"Jumlah_BPJS":81,"Jumlah_Penduduk_Putus_Sekolah":1,"Status_Pendataan":"Selesai"},{"Nama_RT":"RT 002 RW 01","Nama_Ketua_RT":"Ketua RT 002 RW 01","Jumlah_Penduduk_Laki_Laki":45,"Jumlah_Penduduk_Perempuan":38,"Jumlah_KK":28,"Jumlah_Bumbung_Rumah":25,"Jumlah_Penduduk_Lansia":17,"Jumlah_Memiliki_KTP":0,"Jumlah_Penerima_PKH":0,"Jumlah_Penerima_BPNT":7,"Jumlah_Penerima_BLTS":0,"Jumlah_Penerima_BLTDD":0,"Jumlah_Penerima_BCP":0,"Jumlah_Penerima_PIP":0,"Jumlah_Penerima_BPJS_PBI":0,"Jumlah_Penerima_BLT":0,"Jumlah_Penerima_Bansos_KK":7,"Jumlah_UMKM":4,"Jumlah_BPJS":60,"Jumlah_Penduduk_Putus_Sekolah":0,"Status_Pendataan":"Selesai"},{"Nama_RT":"RT 003 RW 02","Nama_Ketua_RT":"Ketua RT 003 RW 02","Jumlah_Penduduk_Laki_Laki":36,"Jumlah_Penduduk_Perempuan":34,"Jumlah_KK":23,"Jumlah_Bumbung_Rumah":24,"Jumlah_Penduduk_Lansia":5,"Jumlah_Memiliki_KTP":0,"Jumlah_Penerima_PKH":0,"Jumlah_Penerima_BPNT":3,"Jumlah_Penerima_BLTS":0,"Jumlah_Penerima_BLTDD":0,"Jumlah_Penerima_BCP":0,"Jumlah_Penerima_PIP":0,"Jumlah_Penerima_BPJS_PBI":0,"Jumlah_Penerima_BLT":0,"Jumlah_Penerima_Bansos_KK":3,"Jumlah_UMKM":10,"Jumlah_BPJS":64,"Jumlah_Penduduk_Putus_Sekolah":0,"Status_Pendataan":"Selesai"},{"Nama_RT":"RT 004 RW 02","Nama_Ketua_RT":"Ketua RT 004 RW 02","Jumlah_Penduduk_Laki_Laki":63,"Jumlah_Penduduk_Perempuan":40,"Jumlah_KK":30,"Jumlah_Bumbung_Rumah":31,"Jumlah_Penduduk_Lansia":1,"Jumlah_Memiliki_KTP":0,"Jumlah_Penerima_PKH":1,"Jumlah_Penerima_BPNT":2,"Jumlah_Penerima_BLTS":0,"Jumlah_Penerima_BLTDD":0,"Jumlah_Penerima_BCP":0,"Jumlah_Penerima_PIP":0,"Jumlah_Penerima_BPJS_PBI":0,"Jumlah_Penerima_BLT":0,"Jumlah_Penerima_Bansos_KK":3,"Jumlah_UMKM":19,"Jumlah_BPJS":87,"Jumlah_Penduduk_Putus_Sekolah":0,"Status_Pendataan":"Selesai"},{"Nama_RT":"RT 005 RW 03","Nama_Ketua_RT":"Ketua RT 005 RW 03","Jumlah_Penduduk_Laki_Laki":66,"Jumlah_Penduduk_Perempuan":70,"Jumlah_KK":42,"Jumlah_Bumbung_Rumah":33,"Jumlah_Penduduk_Lansia":12,"Jumlah_Memiliki_KTP":0,"Jumlah_Penerima_PKH":0,"Jumlah_Penerima_BPNT":3,"Jumlah_Penerima_BLTS":0,"Jumlah_Penerima_BLTDD":0,"Jumlah_Penerima_BCP":0,"Jumlah_Penerima_PIP":0,"Jumlah_Penerima_BPJS_PBI":0,"Jumlah_Penerima_BLT":0,"Jumlah_Penerima_Bansos_KK":3,"Jumlah_UMKM":12,"Jumlah_BPJS":118,"Jumlah_Penduduk_Putus_Sekolah":1,"Status_Pendataan":"Selesai"},{"Nama_RT":"RT 006 RW 03","Nama_Ketua_RT":"Ketua RT 006 RW 03","Jumlah_Penduduk_Laki_Laki":65,"Jumlah_Penduduk_Perempuan":66,"Jumlah_KK":50,"Jumlah_Bumbung_Rumah":40,"Jumlah_Penduduk_Lansia":11,"Jumlah_Memiliki_KTP":0,"Jumlah_Penerima_PKH":0,"Jumlah_Penerima_BPNT":5,"Jumlah_Penerima_BLTS":0,"Jumlah_Penerima_BLTDD":0,"Jumlah_Penerima_BCP":0,"Jumlah_Penerima_PIP":0,"Jumlah_Penerima_BPJS_PBI":0,"Jumlah_Penerima_BLT":0,"Jumlah_Penerima_Bansos_KK":5,"Jumlah_UMKM":7,"Jumlah_BPJS":123,"Jumlah_Penduduk_Putus_Sekolah":0,"Status_Pendataan":"Selesai"},{"Nama_RT":"RT 007 RW 04","Nama_Ketua_RT":"Ketua RT 007 RW 04","Jumlah_Penduduk_Laki_Laki":187,"Jumlah_Penduduk_Perempuan":181,"Jumlah_KK":114,"Jumlah_Bumbung_Rumah":95,"Jumlah_Penduduk_Lansia":26,"Jumlah_Memiliki_KTP":0,"Jumlah_Penerima_PKH":3,"Jumlah_Penerima_BPNT":8,"Jumlah_Penerima_BLTS":0,"Jumlah_Penerima_BLTDD":0,"Jumlah_Penerima_BCP":0,"Jumlah_Penerima_PIP":0,"Jumlah_Penerima_BPJS_PBI":0,"Jumlah_Penerima_BLT":0,"Jumlah_Penerima_Bansos_KK":8,"Jumlah_UMKM":12,"Jumlah_BPJS":339,"Jumlah_Penduduk_Putus_Sekolah":5,"Status_Pendataan":"Selesai"},{"Nama_RT":"RT 008 RW 04","Nama_Ketua_RT":"Ketua RT 008 RW 04","Jumlah_Penduduk_Laki_Laki":144,"Jumlah_Penduduk_Perempuan":155,"Jumlah_KK":92,"Jumlah_Bumbung_Rumah":74,"Jumlah_Penduduk_Lansia":11,"Jumlah_Memiliki_KTP":0,"Jumlah_Penerima_PKH":2,"Jumlah_Penerima_BPNT":4,"Jumlah_Penerima_BLTS":0,"Jumlah_Penerima_BLTDD":0,"Jumlah_Penerima_BCP":0,"Jumlah_Penerima_PIP":0,"Jumlah_Penerima_BPJS_PBI":0,"Jumlah_Penerima_BLT":0,"Jumlah_Penerima_Bansos_KK":5,"Jumlah_UMKM":10,"Jumlah_BPJS":257,"Jumlah_Penduduk_Putus_Sekolah":1,"Status_Pendataan":"Selesai"},{"Nama_RT":"RT 009 RW 05","Nama_Ketua_RT":"Ketua RT 009 RW 05","Jumlah_Penduduk_Laki_Laki":176,"Jumlah_Penduduk_Perempuan":176,"Jumlah_KK":117,"Jumlah_Bumbung_Rumah":88,"Jumlah_Penduduk_Lansia":21,"Jumlah_Memiliki_KTP":0,"Jumlah_Penerima_PKH":6,"Jumlah_Penerima_BPNT":7,"Jumlah_Penerima_BLTS":0,"Jumlah_Penerima_BLTDD":0,"Jumlah_Penerima_BCP":0,"Jumlah_Penerima_PIP":0,"Jumlah_Penerima_BPJS_PBI":0,"Jumlah_Penerima_BLT":0,"Jumlah_Penerima_Bansos_KK":10,"Jumlah_UMKM":13,"Jumlah_BPJS":316,"Jumlah_Penduduk_Putus_Sekolah":1,"Status_Pendataan":"Selesai"},{"Nama_RT":"RT 010 RW 05","Nama_Ketua_RT":"Ketua RT 010 RW 05","Jumlah_Penduduk_Laki_Laki":136,"Jumlah_Penduduk_Perempuan":129,"Jumlah_KK":83,"Jumlah_Bumbung_Rumah":61,"Jumlah_Penduduk_Lansia":13,"Jumlah_Memiliki_KTP":0,"Jumlah_Penerima_PKH":4,"Jumlah_Penerima_BPNT":6,"Jumlah_Penerima_BLTS":0,"Jumlah_Penerima_BLTDD":0,"Jumlah_Penerima_BCP":0,"Jumlah_Penerima_PIP":0,"Jumlah_Penerima_BPJS_PBI":0,"Jumlah_Penerima_BLT":0,"Jumlah_Penerima_Bansos_KK":6,"Jumlah_UMKM":17,"Jumlah_BPJS":257,"Jumlah_Penduduk_Putus_Sekolah":0,"Status_Pendataan":"Selesai"},{"Nama_RT":"RT 011 RW 06","Nama_Ketua_RT":"Ketua RT 011 RW 06","Jumlah_Penduduk_Laki_Laki":45,"Jumlah_Penduduk_Perempuan":56,"Jumlah_KK":32,"Jumlah_Bumbung_Rumah":27,"Jumlah_Penduduk_Lansia":17,"Jumlah_Memiliki_KTP":0,"Jumlah_Penerima_PKH":1,"Jumlah_Penerima_BPNT":3,"Jumlah_Penerima_BLTS":0,"Jumlah_Penerima_BLTDD":0,"Jumlah_Penerima_BCP":0,"Jumlah_Penerima_PIP":0,"Jumlah_Penerima_BPJS_PBI":0,"Jumlah_Penerima_BLT":0,"Jumlah_Penerima_Bansos_KK":3,"Jumlah_UMKM":10,"Jumlah_BPJS":101,"Jumlah_Penduduk_Putus_Sekolah":0,"Status_Pendataan":"Selesai"},{"Nama_RT":"RT 012 RW 06","Nama_Ketua_RT":"Ketua RT 012 RW 06","Jumlah_Penduduk_Laki_Laki":69,"Jumlah_Penduduk_Perempuan":61,"Jumlah_KK":42,"Jumlah_Bumbung_Rumah":39,"Jumlah_Penduduk_Lansia":5,"Jumlah_Memiliki_KTP":0,"Jumlah_Penerima_PKH":1,"Jumlah_Penerima_BPNT":12,"Jumlah_Penerima_BLTS":0,"Jumlah_Penerima_BLTDD":0,"Jumlah_Penerima_BCP":0,"Jumlah_Penerima_PIP":0,"Jumlah_Penerima_BPJS_PBI":0,"Jumlah_Penerima_BLT":0,"Jumlah_Penerima_Bansos_KK":12,"Jumlah_UMKM":2,"Jumlah_BPJS":84,"Jumlah_Penduduk_Putus_Sekolah":0,"Status_Pendataan":"Selesai"},{"Nama_RT":"RT 013 RW 06","Nama_Ketua_RT":"Ketua RT 013 RW 06","Jumlah_Penduduk_Laki_Laki":49,"Jumlah_Penduduk_Perempuan":46,"Jumlah_KK":27,"Jumlah_Bumbung_Rumah":39,"Jumlah_Penduduk_Lansia":1,"Jumlah_Memiliki_KTP":0,"Jumlah_Penerima_PKH":2,"Jumlah_Penerima_BPNT":6,"Jumlah_Penerima_BLTS":0,"Jumlah_Penerima_BLTDD":0,"Jumlah_Penerima_BCP":0,"Jumlah_Penerima_PIP":0,"Jumlah_Penerima_BPJS_PBI":0,"Jumlah_Penerima_BLT":0,"Jumlah_Penerima_Bansos_KK":7,"Jumlah_UMKM":0,"Jumlah_BPJS":57,"Jumlah_Penduduk_Putus_Sekolah":0,"Status_Pendataan":"Selesai"},{"Nama_RT":"RT 014 RW 07","Nama_Ketua_RT":"Ketua RT 014 RW 07","Jumlah_Penduduk_Laki_Laki":82,"Jumlah_Penduduk_Perempuan":57,"Jumlah_KK":38,"Jumlah_Bumbung_Rumah":30,"Jumlah_Penduduk_Lansia":14,"Jumlah_Memiliki_KTP":0,"Jumlah_Penerima_PKH":4,"Jumlah_Penerima_BPNT":4,"Jumlah_Penerima_BLTS":0,"Jumlah_Penerima_BLTDD":0,"Jumlah_Penerima_BCP":0,"Jumlah_Penerima_PIP":0,"Jumlah_Penerima_BPJS_PBI":0,"Jumlah_Penerima_BLT":0,"Jumlah_Penerima_Bansos_KK":6,"Jumlah_UMKM":0,"Jumlah_BPJS":90,"Jumlah_Penduduk_Putus_Sekolah":0,"Status_Pendataan":"Selesai"},{"Nama_RT":"RT 015 RW 08","Nama_Ketua_RT":"Ketua RT 015 RW 08","Jumlah_Penduduk_Laki_Laki":130,"Jumlah_Penduduk_Perempuan":116,"Jumlah_KK":75,"Jumlah_Bumbung_Rumah":61,"Jumlah_Penduduk_Lansia":16,"Jumlah_Memiliki_KTP":0,"Jumlah_Penerima_PKH":10,"Jumlah_Penerima_BPNT":1,"Jumlah_Penerima_BLTS":0,"Jumlah_Penerima_BLTDD":0,"Jumlah_Penerima_BCP":0,"Jumlah_Penerima_PIP":0,"Jumlah_Penerima_BPJS_PBI":0,"Jumlah_Penerima_BLT":0,"Jumlah_Penerima_Bansos_KK":11,"Jumlah_UMKM":2,"Jumlah_BPJS":226,"Jumlah_Penduduk_Putus_Sekolah":0,"Status_Pendataan":"Selesai"},{"Nama_RT":"RT 016 RW 08","Nama_Ketua_RT":"Ketua RT 016 RW 08","Jumlah_Penduduk_Laki_Laki":93,"Jumlah_Penduduk_Perempuan":104,"Jumlah_KK":63,"Jumlah_Bumbung_Rumah":48,"Jumlah_Penduduk_Lansia":16,"Jumlah_Memiliki_KTP":0,"Jumlah_Penerima_PKH":3,"Jumlah_Penerima_BPNT":6,"Jumlah_Penerima_BLTS":0,"Jumlah_Penerima_BLTDD":0,"Jumlah_Penerima_BCP":0,"Jumlah_Penerima_PIP":0,"Jumlah_Penerima_BPJS_PBI":0,"Jumlah_Penerima_BLT":0,"Jumlah_Penerima_Bansos_KK":9,"Jumlah_UMKM":1,"Jumlah_BPJS":151,"Jumlah_Penduduk_Putus_Sekolah":0,"Status_Pendataan":"Selesai"},{"Nama_RT":"RT 017 RW 08","Nama_Ketua_RT":"Ketua RT 017 RW 08","Jumlah_Penduduk_Laki_Laki":144,"Jumlah_Penduduk_Perempuan":141,"Jumlah_KK":86,"Jumlah_Bumbung_Rumah":62,"Jumlah_Penduduk_Lansia":33,"Jumlah_Memiliki_KTP":0,"Jumlah_Penerima_PKH":8,"Jumlah_Penerima_BPNT":17,"Jumlah_Penerima_BLTS":0,"Jumlah_Penerima_BLTDD":0,"Jumlah_Penerima_BCP":0,"Jumlah_Penerima_PIP":0,"Jumlah_Penerima_BPJS_PBI":0,"Jumlah_Penerima_BLT":0,"Jumlah_Penerima_Bansos_KK":16,"Jumlah_UMKM":5,"Jumlah_BPJS":245,"Jumlah_Penduduk_Putus_Sekolah":0,"Status_Pendataan":"Selesai"}]</script>

    <script>
        var rawRTData = [];
        var currentRTMode = 'variabel';
        var mapInstance = null;
        var chartDemografiInstance = null;
        var chartFasilitasInstance = null;

        var fasilitasData = [
            { nama: "Kantor Kelurahan Pasir Wan Salim", kategori: "Pemerintahan", rw: "RW 01", lat: 0.327415, lng: 108.970008, icon: "fa-building-columns", color: "#2563eb" },
            { nama: "Poskesdes / Posyandu Melati", kategori: "Kesehatan", rw: "RW 02", lat: 0.325654, lng: 108.969271, icon: "fa-heart-pulse", color: "#dc2626" },
            { nama: "SD Negeri 05 Pasir Wan Salim", kategori: "Pendidikan", rw: "RW 01", lat: 0.327639, lng: 108.970337, icon: "fa-graduation-cap", color: "#f59e0b" },
            { nama: "Masjid Jami Pasir Wan Salim", kategori: "Sarana Ibadah", rw: "RW 02", lat: 0.326071, lng: 108.969709, icon: "fa-mosque", color: "#16a34a" },
            { nama: "Sentra Kuliner Pesisir UMKM", kategori: "Ekonomi", rw: "RW 08", lat: 0.323709, lng: 108.980095, icon: "fa-store", color: "#0891b2" }
        ];

        document.addEventListener('DOMContentLoaded', function() {
            initMap();
            loadDataFromSheets();
        });

        function initMap() {
            if (mapInstance) return;
            mapInstance = L.map('map').setView([0.326, 108.973], 15);
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 19,
                attribution: '&copy; OpenStreetMap'
            }).addTo(mapInstance);

            var bounds = [];
            fasilitasData.forEach(function(f) {
                bounds.push([f.lat, f.lng]);
                var popupContent = '<div class="p-2" style="font-family:sans-serif;">'
                    + '<h6 class="fw-bold mb-1">' + escHtml(f.nama) + '</h6>'
                    + '<div class="small text-muted mb-1"><i class="fas ' + f.icon + ' me-1" style="color:' + f.color + '"></i>' + escHtml(f.kategori) + ' (' + escHtml(f.rw) + ')</div>'
                    + '<div class="extra-small text-muted">Kondisi: Baik | Akses Roda 4</div>'
                    + '</div>';

                var marker = L.circleMarker([f.lat, f.lng], {
                    radius: 8,
                    fillColor: f.color,
                    color: '#ffffff',
                    weight: 2,
                    opacity: 1,
                    fillOpacity: 0.95
                }).bindPopup(popupContent);

                marker.addTo(mapInstance);
            });

            if (bounds.length > 0) {
                mapInstance.fitBounds(bounds, { padding: [30, 30] });
            }
        }

        function loadDataFromSheets() {
            var syncIcon = document.getElementById('sync-icon');
            var syncStatus = document.getElementById('sync-status');
            if (syncIcon) syncIcon.classList.add('fa-spin');
            if (syncStatus) syncStatus.innerText = 'Mengambil data dari Google Sheets...';

            fetch('/desa-cantik/api/pasirwansalim/Appsheet_RT?refresh=1')
                .then(function(r) { return r.json(); })
                .then(function(data) {
                    if (Array.isArray(data) && data.length > 0 && !data.error) {
                        rawRTData = data;
                        if (syncStatus) syncStatus.innerText = 'Terhubung Live (' + new Date().toLocaleTimeString('id-ID') + ')';
                    } else {
                        useFallbackData();
                        if (syncStatus) syncStatus.innerText = 'Data Lokal Aktif';
                    }
                    if (syncIcon) syncIcon.classList.remove('fa-spin');
                    processRTData();
                })
                .catch(function(err) {
                    console.warn('API fetch failed, using embedded fallback:', err);
                    useFallbackData();
                    if (syncStatus) syncStatus.innerText = 'Data Lokal Aktif';
                    if (syncIcon) syncIcon.classList.remove('fa-spin');
                    processRTData();
                });
        }

        function useFallbackData() {
            var scriptEl = document.getElementById('fallback-rt');
            if (scriptEl && scriptEl.textContent) {
                try {
                    rawRTData = JSON.parse(scriptEl.textContent);
                } catch (e) {
                    console.error('Failed to parse fallback:', e);
                }
            }
        }

        function processRTData() {
            if (!rawRTData || !rawRTData.length) return;

            var totalL = 0, totalP = 0, totalKK = 0, totalBumbung = 0;
            var totalLansia = 0, totalBansos = 0, totalUMKM = 0, totalBPJS = 0;

            rawRTData.forEach(function(r) {
                var l = parseInt(r.Jumlah_Penduduk_Laki_Laki || 0) || 0;
                var p = parseInt(r.Jumlah_Penduduk_Perempuan || 0) || 0;
                var kk = parseInt(r.Jumlah_KK || 0) || 0;
                var bumbung = parseInt(r.Jumlah_Bumbung_Rumah || 0) || 0;
                var lansia = parseInt(r.Jumlah_Penduduk_Lansia || 0) || 0;
                var pkh = parseInt(r.Jumlah_Penerima_PKH || 0) || 0;
                var bpnt = parseInt(r.Jumlah_Penerima_BPNT || 0) || 0;
                var bansos = pkh + bpnt;
                var umkm = parseInt(r.Jumlah_UMKM || 0) || 0;
                var bpjs = parseInt(r.Jumlah_BPJS || 0) || 0;

                totalL += l;
                totalP += p;
                totalKK += kk;
                totalBumbung += bumbung;
                totalLansia += lansia;
                totalBansos += bansos;
                totalUMKM += umkm;
                totalBPJS += bpjs;

                r._pop = l + p;
                r._sexRatio = p > 0 ? parseFloat((l / p * 100).toFixed(1)) : 0;
                r._artRata = kk > 0 ? parseFloat(((l + p) / kk).toFixed(2)) : 0;
                r._pctLansia = (l + p) > 0 ? parseFloat((lansia / (l + p) * 100).toFixed(1)) : 0;
                r._pctBansos = kk > 0 ? parseFloat((bansos / kk * 100).toFixed(1)) : 0;
                r._kepadatan = bumbung > 0 ? parseFloat(((l + p) / bumbung).toFixed(2)) : 0;
            });

            var totalPop = totalL + totalP;
            var sexRatio = totalP > 0 ? ((totalL / totalP) * 100).toFixed(1) : '-';
            var artRata = totalKK > 0 ? (totalPop / totalKK).toFixed(2) : '-';
            var kepadatan = totalBumbung > 0 ? (totalPop / totalBumbung).toFixed(2) : '-';
            var pctLansia = totalPop > 0 ? ((totalLansia / totalPop) * 100).toFixed(1) : '-';

            // Update KPI Cards
            if (document.getElementById('kpi-penduduk')) document.getElementById('kpi-penduduk').innerText = totalPop.toLocaleString('id-ID');
            if (document.getElementById('kpi-sexratio')) document.getElementById('kpi-sexratio').innerText = sexRatio;
            if (document.getElementById('kpi-kk')) document.getElementById('kpi-kk').innerText = totalKK.toLocaleString('id-ID');
            if (document.getElementById('kpi-art')) document.getElementById('kpi-art').innerText = artRata + ' ART/KK';
            if (document.getElementById('kpi-bumbung')) document.getElementById('kpi-bumbung').innerText = totalBumbung.toLocaleString('id-ID');
            if (document.getElementById('kpi-kepadatan')) document.getElementById('kpi-kepadatan').innerText = kepadatan + ' Jiwa/Rumah';
            if (document.getElementById('kpi-lansia')) document.getElementById('kpi-lansia').innerText = totalLansia.toLocaleString('id-ID');
            if (document.getElementById('kpi-pct-lansia')) document.getElementById('kpi-pct-lansia').innerText = pctLansia + '%';
            if (document.getElementById('kpi-bansos')) document.getElementById('kpi-bansos').innerText = totalBansos.toLocaleString('id-ID') + ' Penerima';
            if (document.getElementById('kpi-fasilitas')) document.getElementById('kpi-fasilitas').innerText = fasilitasData.length + ' Fasilitas';

            var chartBadge = document.getElementById('rt-chart-count-badge');
            if (chartBadge) chartBadge.innerText = rawRTData.length + ' RT Terdata';

            renderTableRT();
            renderCharts();
        }

        function switchRTTableMode(mode) {
            currentRTMode = mode;
            var btnVar = document.getElementById('btn-mode-variabel');
            var btnInd = document.getElementById('btn-mode-indikator');

            if (mode === 'indikator') {
                btnVar.classList.remove('btn-primary', 'active');
                btnVar.classList.add('btn-outline-primary');
                btnInd.classList.remove('btn-outline-success');
                btnInd.classList.add('btn-success', 'active');
            } else {
                btnInd.classList.remove('btn-success', 'active');
                btnInd.classList.add('btn-outline-success');
                btnVar.classList.remove('btn-outline-primary');
                btnVar.classList.add('btn-primary', 'active');
            }
            renderTableRT();
        }

        function renderTableRT() {
            var thead = document.getElementById('table-rt-thead');
            var tbody = document.getElementById('table-rt-tbody');
            if (!thead || !tbody) return;

            if (currentRTMode === 'indikator') {
                thead.innerHTML = '<tr>'
                    + '<th>Nama RT / Wilayah</th>'
                    + '<th>Total Penduduk</th>'
                    + '<th>Sex Ratio (#1)</th>'
                    + '<th>Rata-rata ART (#2)</th>'
                    + '<th>Proporsi Lansia (#3)</th>'
                    + '<th>Keluarga Bansos (#5)</th>'
                    + '<th>Kepadatan Hunian (#7)</th>'
                    + '<th>UMKM Produktif</th>'
                    + '</tr>';

                tbody.innerHTML = '';
                rawRTData.forEach(function(r) {
                    var bansos = (parseInt(r.Jumlah_Penerima_PKH || 0) || 0) + (parseInt(r.Jumlah_Penerima_BPNT || 0) || 0);
                    var tr = document.createElement('tr');
                    tr.innerHTML = '<td class="fw-bold">' + escHtml(r.Nama_RT) + '</td>'
                        + '<td><span class="badge bg-light text-dark fw-bold">' + r._pop + ' Jiwa</span></td>'
                        + '<td><span class="badge bg-primary-subtle text-primary">' + r._sexRatio + '</span></td>'
                        + '<td>' + r._artRata + ' ART/KK</td>'
                        + '<td>' + r._pctLansia + '% (' + (r.Jumlah_Penduduk_Lansia || 0) + ' jiwa)</td>'
                        + '<td>' + r._pctBansos + '% (' + bansos + ' KK)</td>'
                        + '<td>' + r._kepadatan + ' Jiwa/Rumah</td>'
                        + '<td><span class="badge bg-success-subtle text-success fw-bold">' + (r.Jumlah_UMKM || 0) + ' Unit</span></td>';
                    tbody.appendChild(tr);
                });
            } else {
                thead.innerHTML = '<tr>'
                    + '<th>Nama RT / Wilayah</th>'
                    + '<th>L</th>'
                    + '<th>P</th>'
                    + '<th>Total Penduduk</th>'
                    + '<th>Total KK</th>'
                    + '<th>Bumbung Rumah</th>'
                    + '<th>Lansia</th>'
                    + '<th>Penerima Bansos</th>'
                    + '<th>UMKM</th>'
                    + '<th>BPJS</th>'
                    + '</tr>';

                tbody.innerHTML = '';
                rawRTData.forEach(function(r) {
                    var bansos = (parseInt(r.Jumlah_Penerima_PKH || 0) || 0) + (parseInt(r.Jumlah_Penerima_BPNT || 0) || 0);
                    var tr = document.createElement('tr');
                    tr.innerHTML = '<td class="fw-bold">' + escHtml(r.Nama_RT) + '</td>'
                        + '<td>' + (r.Jumlah_Penduduk_Laki_Laki || 0) + '</td>'
                        + '<td>' + (r.Jumlah_Penduduk_Perempuan || 0) + '</td>'
                        + '<td><span class="badge bg-primary-subtle text-primary fw-bold">' + r._pop + '</span></td>'
                        + '<td>' + (r.Jumlah_KK || 0) + '</td>'
                        + '<td>' + (r.Jumlah_Bumbung_Rumah || 0) + '</td>'
                        + '<td>' + (r.Jumlah_Penduduk_Lansia || 0) + '</td>'
                        + '<td>' + bansos + '</td>'
                        + '<td>' + (r.Jumlah_UMKM || 0) + '</td>'
                        + '<td>' + (r.Jumlah_BPJS || 0) + '</td>';
                    tbody.appendChild(tr);
                });
            }
        }

        function renderCharts() {
            // Demografi Chart
            if (document.getElementById('chartDemografi')) {
                if (chartDemografiInstance) chartDemografiInstance.destroy();
                var labels = rawRTData.map(function(r) { return r.Nama_RT; });
                var dataL = rawRTData.map(function(r) { return parseInt(r.Jumlah_Penduduk_Laki_Laki || 0); });
                var dataP = rawRTData.map(function(r) { return parseInt(r.Jumlah_Penduduk_Perempuan || 0); });
                var dataKK = rawRTData.map(function(r) { return parseInt(r.Jumlah_KK || 0); });

                var ctx = document.getElementById('chartDemografi').getContext('2d');
                chartDemografiInstance = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: labels,
                        datasets: [
                            { label: 'Laki-Laki', data: dataL, backgroundColor: '#3b82f6', borderRadius: 6 },
                            { label: 'Perempuan', data: dataP, backgroundColor: '#ec4899', borderRadius: 6 },
                            { label: 'Kepala Keluarga (KK)', data: dataKK, backgroundColor: '#10b981', borderRadius: 6 }
                        ]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: { legend: { position: 'top' } },
                        scales: { y: { beginAtZero: true } }
                    }
                });
            }

            // Fasilitas Pie Chart
            if (document.getElementById('chartFasilitas')) {
                if (chartFasilitasInstance) chartFasilitasInstance.destroy();
                var ctx2 = document.getElementById('chartFasilitas').getContext('2d');

                var katCounts = {};
                fasilitasData.forEach(function(f) {
                    katCounts[f.kategori] = (katCounts[f.kategori] || 0) + 1;
                });

                chartFasilitasInstance = new Chart(ctx2, {
                    type: 'doughnut',
                    data: {
                        labels: Object.keys(katCounts),
                        datasets: [{
                            data: Object.values(katCounts),
                            backgroundColor: ['#2563eb', '#dc2626', '#f59e0b', '#16a34a', '#0891b2']
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: { legend: { position: 'bottom' } }
                    }
                });
            }
        }

        function filterTableRT() {
            var q = (document.getElementById('search-rt').value || '').toLowerCase();
            document.querySelectorAll('#table-rt tbody tr').forEach(function(tr) {
                tr.style.display = tr.innerText.toLowerCase().indexOf(q) !== -1 ? '' : 'none';
            });
        }

        function filterTableFas() {
            var q = (document.getElementById('search-fas').value || '').toLowerCase();
            document.querySelectorAll('#table-fas tbody tr').forEach(function(tr) {
                tr.style.display = tr.innerText.toLowerCase().indexOf(q) !== -1 ? '' : 'none';
            });
        }

        function escHtml(str) {
            if (!str) return '';
            return String(str).replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;').replace(/"/g, '&quot;');
        }

        // Multi-Sheet Excel Export (SDI 2026 Compliant)
        function downloadComprehensiveSDIWorkbookPasirWanSalim() {
            if (!rawRTData || !rawRTData.length) {
                alert('Data Pasir Wan Salim belum siap diunduh.');
                return;
            }

            var totalL = 0, totalP = 0, totalKK = 0, totalBumbung = 0;
            var totalLansia = 0, totalBansos = 0, totalUMKM = 0, totalBPJS = 0;

            rawRTData.forEach(function(r) {
                var l = parseInt(r.Jumlah_Penduduk_Laki_Laki || 0) || 0;
                var p = parseInt(r.Jumlah_Penduduk_Perempuan || 0) || 0;
                var kk = parseInt(r.Jumlah_KK || 0) || 0;
                var bumbung = parseInt(r.Jumlah_Bumbung_Rumah || 0) || 0;
                var lansia = parseInt(r.Jumlah_Penduduk_Lansia || 0) || 0;
                var pkh = parseInt(r.Jumlah_Penerima_PKH || 0) || 0;
                var bpnt = parseInt(r.Jumlah_Penerima_BPNT || 0) || 0;

                totalL += l;
                totalP += p;
                totalKK += kk;
                totalBumbung += bumbung;
                totalLansia += lansia;
                totalBansos += (pkh + bpnt);
                totalUMKM += (parseInt(r.Jumlah_UMKM || 0) || 0);
                totalBPJS += (parseInt(r.Jumlah_BPJS || 0) || 0);
            });

            var totalPop = totalL + totalP;

            // Sheet 1: Ringkasan SDI
            var s1Rows = [
                ["REKAPITULASI PROFIL KELURAHAN CANTIK & INDIKATOR SDI 2026"],
                ["KELURAHAN PASIR WAN SALIM - KECAMATAN MEMPAWAH TIMUR, KABUPATEN MEMPAWAH"],
                ["Standar: Satu Data Indonesia (SDI) | Pembina Teknis: BPS Kabupaten Mempawah"],
                ["Tanggal Ekspor Data:", new Date().toLocaleDateString('id-ID', { year:'numeric', month:'long', day:'numeric' })],
                [],
                ["No", "Nama Indikator / Variabel SDI", "Nilai", "Satuan", "Keterangan & Catatan Metodologi"],
                [1, "Total Populasi Penduduk Terdata", totalPop, "Jiwa", "Pendataan mikro potensi RT Desa Cantik 2026"],
                [2, "Penduduk Laki-Laki", totalL, "Jiwa", (totalPop > 0 ? (totalL / totalPop * 100).toFixed(2) : 0) + "% dari total penduduk"],
                [3, "Penduduk Perempuan", totalP, "Jiwa", (totalPop > 0 ? (totalP / totalPop * 100).toFixed(2) : 0) + "% dari total penduduk"],
                [4, "Rasio Jenis Kelamin (Sex Ratio) [#1]", totalP > 0 ? parseFloat((totalL / totalP * 100).toFixed(2)) : 0, "L / 100 P", "Jumlah penduduk laki-laki per 100 perempuan"],
                [5, "Jumlah Kepala Keluarga (KK)", totalKK, "KK", "Tersebar di seluruh wilayah RT"],
                [6, "Rata-rata Anggota Rumah Tangga (ART) [#2]", totalKK > 0 ? parseFloat((totalPop / totalKK).toFixed(2)) : 0, "Jiwa / KK", "Rata-rata tanggungan per Kepala Keluarga"],
                [7, "Jumlah Bangunan Rumah Tinggal", totalBumbung, "Unit Rumah", "Total bangunan fisik tempat tinggal"],
                [8, "Kepadatan Hunian (Jiwa / Rumah) [#7]", totalBumbung > 0 ? parseFloat((totalPop / totalBumbung).toFixed(2)) : 0, "Jiwa / Rumah", "Rata-rata penghuni per unit rumah"],
                [9, "Populasi Lansia (≥ 65 Tahun)", totalLansia, "Jiwa", "Kelompok penduduk lanjut usia"],
                [10, "Proporsi Penduduk Lansia [#3]", totalPop > 0 ? (totalLansia / totalPop * 100).toFixed(2) + "%" : "0%", "Persen", "Persentase lansia terhadap total penduduk"],
                [11, "Total KK Penerima Bantuan Sosial", totalBansos, "KK", "Penerima manfaat program PKH & BPNT"],
                [12, "Jumlah UMKM Produktif Terdata", totalUMKM, "Unit", "Usaha mikro binaan"],
                [13, "Cakupan BPJS Kesehatan", totalBPJS, "Jiwa", "Warga yang memiliki jaminan kesehatan BPJS"],
                [14, "Sarana & Fasilitas Publik", fasilitasData.length, "Unit", "Fasilitas pemerintahan, pendidikan, kesehatan, ibadah"]
            ];

            // Sheet 2: 8 Indikator SDI Per RT
            var s2Rows = [
                [
                    "No", "Nama RT / Wilayah", "Total Penduduk", "Penduduk L", "Penduduk P",
                    "Sex Ratio [#1]", "Rata-rata ART [#2]", "Jumlah Lansia", "Proporsi Lansia [#3] (%)",
                    "Total KK", "Penerima Bansos (KK)", "Persentase Bansos [#5] (%)",
                    "Jumlah Rumah", "Kepadatan Hunian [#7] (Jiwa/Rumah)", "Jumlah UMKM"
                ]
            ];
            rawRTData.forEach(function(r, idx) {
                var bansos = (parseInt(r.Jumlah_Penerima_PKH || 0) || 0) + (parseInt(r.Jumlah_Penerima_BPNT || 0) || 0);
                s2Rows.push([
                    idx + 1,
                    r.Nama_RT,
                    r._pop,
                    parseInt(r.Jumlah_Penduduk_Laki_Laki || 0),
                    parseInt(r.Jumlah_Penduduk_Perempuan || 0),
                    r._sexRatio,
                    r._artRata,
                    parseInt(r.Jumlah_Penduduk_Lansia || 0),
                    r._pctLansia,
                    parseInt(r.Jumlah_KK || 0),
                    bansos,
                    r._pctBansos,
                    parseInt(r.Jumlah_Bumbung_Rumah || 0),
                    r._kepadatan,
                    parseInt(r.Jumlah_UMKM || 0)
                ]);
            });

            // Sheet 3: Variabel Potensi RT
            var s3Rows = [
                [
                    "No", "Nama RT / Wilayah", "Nama Ketua RT", "Penduduk L", "Penduduk P",
                    "Total Penduduk", "Total KK", "Bumbung Rumah", "Lansia", "Penerima PKH", "Penerima BPNT", "UMKM", "BPJS", "Putus Sekolah"
                ]
            ];
            rawRTData.forEach(function(r, idx) {
                s3Rows.push([
                    idx + 1,
                    r.Nama_RT,
                    r.Nama_Ketua_RT || '-',
                    parseInt(r.Jumlah_Penduduk_Laki_Laki || 0),
                    parseInt(r.Jumlah_Penduduk_Perempuan || 0),
                    r._pop,
                    parseInt(r.Jumlah_KK || 0),
                    parseInt(r.Jumlah_Bumbung_Rumah || 0),
                    parseInt(r.Jumlah_Penduduk_Lansia || 0),
                    parseInt(r.Jumlah_Penerima_PKH || 0),
                    parseInt(r.Jumlah_Penerima_BPNT || 0),
                    parseInt(r.Jumlah_UMKM || 0),
                    parseInt(r.Jumlah_BPJS || 0),
                    parseInt(r.Jumlah_Penduduk_Putus_Sekolah || 0)
                ]);
            });

            // Sheet 4: Sarana & Fasilitas
            var s4Rows = [
                ["No", "Nama Fasilitas / Sarana", "Kategori", "Wilayah RW", "Kondisi Bangunan", "Aksesibilitas", "Koordinat GPS"],
                [1, "Kantor Kelurahan Pasir Wan Salim", "Pemerintahan", "RW 01", "Baik", "Aspal / Beton (Roda 4)", "0.327415, 108.970008"],
                [2, "Poskesdes / Posyandu Melati", "Kesehatan", "RW 02", "Baik", "Aspal / Beton (Roda 4)", "0.325654, 108.969271"],
                [3, "SD Negeri 05 Pasir Wan Salim", "Pendidikan", "RW 01", "Baik", "Aspal (Roda 4)", "0.327639, 108.970337"],
                [4, "Masjid Jami Pasir Wan Salim", "Sarana Ibadah", "RW 02", "Baik", "Aspal (Roda 4)", "0.326071, 108.969709"],
                [5, "Sentra Kuliner Pesisir UMKM", "Ekonomi", "RW 08", "Baik", "Aspal (Roda 4)", "0.323709, 108.980095"]
            ];

            // Sheet 5: Rekapitulasi Dusun / RW
            var rwGroups = {};
            rawRTData.forEach(function(r) {
                var rwName = "RW 01";
                if (r.Nama_RT.indexOf('RW') !== -1) {
                    var parts = r.Nama_RT.split('RW');
                    rwName = 'RW ' + parts[1].trim();
                }
                if (!rwGroups[rwName]) {
                    rwGroups[rwName] = { l: 0, p: 0, pop: 0, kk: 0, bumbung: 0, lansia: 0, bansos: 0, umkm: 0 };
                }
                var bansos = (parseInt(r.Jumlah_Penerima_PKH || 0) || 0) + (parseInt(r.Jumlah_Penerima_BPNT || 0) || 0);
                rwGroups[rwName].l += parseInt(r.Jumlah_Penduduk_Laki_Laki || 0);
                rwGroups[rwName].p += parseInt(r.Jumlah_Penduduk_Perempuan || 0);
                rwGroups[rwName].pop += r._pop;
                rwGroups[rwName].kk += parseInt(r.Jumlah_KK || 0);
                rwGroups[rwName].bumbung += parseInt(r.Jumlah_Bumbung_Rumah || 0);
                rwGroups[rwName].lansia += parseInt(r.Jumlah_Penduduk_Lansia || 0);
                rwGroups[rwName].bansos += bansos;
                rwGroups[rwName].umkm += parseInt(r.Jumlah_UMKM || 0);
            });

            var s5Rows = [
                ["No", "Wilayah RW", "Total Penduduk", "L", "P", "Total KK", "Bumbung Rumah", "Lansia", "Bansos (KK)", "UMKM"]
            ];
            var rwIdx = 1;
            Object.keys(rwGroups).sort().forEach(function(rwKey) {
                var g = rwGroups[rwKey];
                s5Rows.push([rwIdx++, rwKey, g.pop, g.l, g.p, g.kk, g.bumbung, g.lansia, g.bansos, g.umkm]);
            });

            var filename = 'Data_SDI_Lengkap_Kelurahan_Pasir_Wan_Salim_2026.xlsx';

            if (typeof XLSX !== 'undefined') {
                var wb = XLSX.utils.book_new();

                function autoColWidth(ws, data) {
                    var colWidths = [];
                    data.forEach(function(row) {
                        row.forEach(function(cell, cIdx) {
                            var len = (cell === null || cell === undefined) ? 0 : String(cell).length;
                            if (!colWidths[cIdx] || len > colWidths[cIdx]) {
                                colWidths[cIdx] = len;
                            }
                        });
                    });
                    ws['!cols'] = colWidths.map(function(w) {
                        return { wch: Math.min(Math.max((w || 0) + 3, 10), 48) };
                    });
                }

                var ws1 = XLSX.utils.aoa_to_sheet(s1Rows);
                autoColWidth(ws1, s1Rows);
                XLSX.utils.book_append_sheet(wb, ws1, "Ringkasan SDI");

                var ws2 = XLSX.utils.aoa_to_sheet(s2Rows);
                autoColWidth(ws2, s2Rows);
                XLSX.utils.book_append_sheet(wb, ws2, "8 Indikator SDI RT");

                var ws3 = XLSX.utils.aoa_to_sheet(s3Rows);
                autoColWidth(ws3, s3Rows);
                XLSX.utils.book_append_sheet(wb, ws3, "Variabel Potensi RT");

                var ws4 = XLSX.utils.aoa_to_sheet(s4Rows);
                autoColWidth(ws4, s4Rows);
                XLSX.utils.book_append_sheet(wb, ws4, "Sarana & Fasilitas");

                var ws5 = XLSX.utils.aoa_to_sheet(s5Rows);
                autoColWidth(ws5, s5Rows);
                XLSX.utils.book_append_sheet(wb, ws5, "Rekapitulasi RW");

                XLSX.writeFile(wb, filename);
            }
        }

        // ==========================================
        // IMAGE PREVIEW MODAL HANDLER
        // ==========================================
        function openImagePreviewModal(imageSrc, title, caption) {
            var imgEl = document.getElementById('modalPreviewImg');
            var titleEl = document.getElementById('modalImageTitle');
            var captionEl = document.getElementById('modalImageCaption');
            var downloadBtn = document.getElementById('modalDownloadBtn');
            var modalEl = document.getElementById('imagePreviewModal');

            if (imgEl) imgEl.src = imageSrc;
            if (titleEl) titleEl.innerText = title || 'Pratinjau Foto';
            if (captionEl) captionEl.innerText = caption || 'Kelurahan Pasir Wan Salim 2026';
            
            if (downloadBtn) {
                downloadBtn.href = imageSrc;
                var filename = (title || 'foto_kelurahan_pasir_wan_salim').toLowerCase().replace(/[^a-z0-9]/g, '_') + '.webp';
                downloadBtn.setAttribute('download', filename);
            }

            if (modalEl && typeof bootstrap !== 'undefined') {
                var modal = bootstrap.Modal.getInstance(modalEl) || new bootstrap.Modal(modalEl);
                modal.show();
            }
        }

        // ==========================================
        // GSBPM 8-PHASE SMART CONTROLLER (6.5s Timer + Progress Track)
        // ==========================================
        var gsbpmCurrentIndex = 0;
        var gsbpmTotalTabs = 8;
        var gsbpmAutoInterval = null;
        var gsbpmIsPaused = false;
        var gsbpmAutoDuration = 6500; // 6.5 detik per fase

        var gsbpmPhaseMeta = [
            { num: 1, title: 'Specify Needs', desc: 'Identifikasi Kebutuhan & Pencanangan Kelurahan Cantik' },
            { num: 2, title: 'Design', desc: 'Desain Kuesioner & Metadata SDI (MS-Kegiatan/Variabel/Indikator)' },
            { num: 3, title: 'Build', desc: 'Pembangunan CAPI AppSheet & Database Sektoral' },
            { num: 4, title: 'Collect', desc: 'Pelatihan Agen Statistik & Survei CAPI 9 RT' },
            { num: 5, title: 'Process', desc: 'Pemrosesan Data, AI Gemini & Validasi Sektoral' },
            { num: 6, title: 'Analyze', desc: 'Analisis 8 Indikator Prioritas SDI & Wawasan Wilayah' },
            { num: 7, title: 'Disseminate', desc: 'Diseminasi Hasil & Publikasi Web Portal Kelurahan' },
            { num: 8, title: 'Evaluate', desc: 'Evaluasi Pembinaan & SOP Layanan Permintaan Data' }
        ];

        function startGsbpmAutoRotate() {
            if (gsbpmAutoInterval) clearInterval(gsbpmAutoInterval);
            gsbpmAutoInterval = setInterval(function() {
                if (!gsbpmIsPaused) {
                    gsbpmCurrentIndex = (gsbpmCurrentIndex + 1) % gsbpmTotalTabs;
                    selectGsbpmTab(gsbpmCurrentIndex, false);
                }
            }, gsbpmAutoDuration);
        }

        function selectGsbpmTab(index, isManual) {
            gsbpmCurrentIndex = index;
            var tabBtn = document.getElementById('tab-gsbpm-' + (index + 1));
            if (tabBtn && typeof bootstrap !== 'undefined') {
                var tabInstance = bootstrap.Tab.getInstance(tabBtn) || new bootstrap.Tab(tabBtn);
                tabInstance.show();
                
                // Update Progress bar & Label
                var pct = Math.round(((index + 1) / gsbpmTotalTabs) * 100);
                var pBar = document.getElementById('gsbpm-progress-bar');
                var pPct = document.getElementById('gsbpm-progress-pct');
                var sLabel = document.getElementById('gsbpm-step-label');

                if (pBar) pBar.style.width = pct + '%';
                if (pPct) pPct.innerText = pct + '% Selesai (Fase ' + (index + 1) + '/8)';
                if (sLabel && gsbpmPhaseMeta[index]) {
                    sLabel.innerHTML = '<i class="fas fa-check-circle text-success me-1"></i> Fase ' + (index + 1) + ' dari 8: <strong>' + gsbpmPhaseMeta[index].title + '</strong> — ' + gsbpmPhaseMeta[index].desc;
                }

                // Smooth Scroll Track to center active tab
                var track = document.getElementById('gsbpm-scroll-track');
                if (track) {
                    var tabLeft = tabBtn.offsetLeft;
                    var tabWidth = tabBtn.offsetWidth;
                    var trackWidth = track.offsetWidth;
                    var scrollPos = tabLeft - (trackWidth / 2) + (tabWidth / 2);
                    track.scrollTo({ left: Math.max(0, scrollPos), behavior: 'smooth' });
                }
            }
        }

        function manualSelectGsbpmTab(index) {
            selectGsbpmTab(index, true);
            startGsbpmAutoRotate();
        }

        function scrollGsbpmTrack(direction) {
            var track = document.getElementById('gsbpm-scroll-track');
            if (track) {
                var scrollAmount = 280;
                track.scrollBy({ left: direction === 'left' ? -scrollAmount : scrollAmount, behavior: 'smooth' });
            }
        }

        function toggleGsbpmAutoPlay() {
            gsbpmIsPaused = !gsbpmIsPaused;
            var pIcon = document.getElementById('gsbpm-play-icon');
            var tBadge = document.getElementById('gsbpm-timer-badge');
            var btn = document.getElementById('gsbpm-play-btn');

            if (gsbpmIsPaused) {
                if (pIcon) pIcon.className = 'fas fa-play fa-xs text-success me-1';
                if (tBadge) tBadge.innerText = 'Auto: PAUSED';
                if (btn) {
                    btn.classList.remove('btn-dark');
                    btn.classList.add('btn-outline-dark');
                }
            } else {
                if (pIcon) pIcon.className = 'fas fa-pause fa-xs text-warning me-1';
                if (tBadge) tBadge.innerText = 'Auto: ON (6.5s)';
                if (btn) {
                    btn.classList.remove('btn-outline-dark');
                    btn.classList.add('btn-dark');
                }
                startGsbpmAutoRotate();
            }
        }

        // Pause on mouse hover, resume on mouse leave & init
        document.addEventListener('DOMContentLoaded', function() {
            var gsbpmContainer = document.getElementById('gsbpm-flow');
            if (gsbpmContainer) {
                gsbpmContainer.addEventListener('mouseenter', function() {
                    gsbpmIsPaused = true;
                    var tBadge = document.getElementById('gsbpm-timer-badge');
                    if (tBadge && !document.getElementById('gsbpm-play-btn').classList.contains('btn-outline-dark')) {
                        tBadge.innerText = 'Auto: PAUSED (Hover)';
                    }
                });
                gsbpmContainer.addEventListener('mouseleave', function() {
                    if (!document.getElementById('gsbpm-play-btn').classList.contains('btn-outline-dark')) {
                        gsbpmIsPaused = false;
                        var tBadge = document.getElementById('gsbpm-timer-badge');
                        if (tBadge) tBadge.innerText = 'Auto: ON (6.5s)';
                    }
                });
            }
            // Inisialisasi awal Fase 1
            selectGsbpmTab(0, false);
            startGsbpmAutoRotate();
        });
    </script>
</x-layouts.app>
