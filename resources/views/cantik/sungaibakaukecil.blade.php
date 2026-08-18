<x-layouts.app title="Desa Sungai Bakau Kecil - Desa Cinta Statistik 2026" description="Portal Resmi Desa Cantik 2026 Desa Sungai Bakau Kecil - BPS Kabupaten Mempawah" district-name="Kecamatan Mempawah Timur">

        <!-- Hero Section with Sejegi-style Parallax & Overlay -->
    <header class="hero-section text-center" id="beranda">
        <div class="hero-overlay"></div>
        <div class="container hero-content">
            <div class="d-flex justify-content-center gap-2 mb-3" data-aos="fade-down" data-aos-duration="900">
                <span class="badge bg-warning text-dark px-3 py-2 rounded-pill fw-bold shadow-sm"><i class="fas fa-star me-1"></i> Desa Cantik 2026</span>
                <span class="badge bg-light text-dark px-3 py-2 rounded-pill fw-bold shadow-sm"><i class="fas fa-database me-1"></i> AppSheet Live Data</span>
            </div>
            <h1 class="hero-title" data-animate-text>Desa Sungai Bakau Kecil</h1>
            <p class="hero-subtitle lead mx-auto text-white mb-4" style="max-width:820px;" data-animate-text>
                Kecamatan Mempawah Timur, Kabupaten Mempawah — Pendataan Potensi Kewilayahan RT &amp; Inventarisasi Fasilitas Umum Berbasis Satu Data Indonesia (SDI).
            </p>
            <div class="d-flex justify-content-center align-items-center flex-wrap gap-2">
                <div class="sync-wrap text-white small fw-semibold" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200" data-aos-duration="800">
                    <i class="fas fa-sync fa-spin text-success" id="sync-icon"></i>
                    <span id="sync-status">Menghubungkan ke Google Sheets...</span>
                </div>
                <button class="btn btn-sm btn-light rounded-pill px-3 fw-bold shadow-sm" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="300" data-aos-duration="800" onclick="loadDataFromSheets()">
                    <i class="fas fa-redo me-1"></i> Sync Sekarang
                </button>
                <a href="#gsbpm-flow" class="btn btn-sm btn-outline-light rounded-pill px-3 fw-bold" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="400" data-aos-duration="800">
                    <i class="fas fa-project-diagram me-1"></i> Alur Pembinaan
                </a>
                <a href="#infografis" class="btn btn-sm btn-outline-light rounded-pill px-3 fw-bold" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="500" data-aos-duration="800">
                    <i class="fas fa-chart-pie me-1"></i> Galeri Infografis
                </a>
                <a href="#sop-layanan" class="btn btn-sm btn-outline-light rounded-pill px-3 fw-bold" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="600" data-aos-duration="800">
                    <i class="fas fa-envelope me-1"></i> Permintaan Data
                </a>
                <a href="#aparat-desa" class="btn btn-sm btn-outline-light rounded-pill px-3 fw-bold" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="700" data-aos-duration="800">
                    <i class="fas fa-user-tie me-1"></i> Perangkat Desa
                </a>
                <a href="#publikasi" class="btn btn-sm btn-outline-light rounded-pill px-3 fw-bold" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="800" data-aos-duration="800">
                    <i class="fas fa-book me-1"></i> Bukti Dukung 2026
                </a>
            </div>
        </div>
    </header>

    <main class="container my-5">

        <!-- KPI Cards (Reusable Component with Staggered Delays) -->
        <div class="row g-4 mb-5">
            <x-ui.kpi-card title="Total Penduduk" icon="fa-users" id="kpi-penduduk" sub-id="kpi-sexratio" sub-label="Sex Ratio" sub-color="text-primary" delay="100" aos="fade-up" />
            <x-ui.kpi-card title="Rumah Tangga / KK" icon="fa-home" id="kpi-kk" sub-id="kpi-art" sub-label="ART Rata-rata" sub-color="text-success" delay="200" aos="fade-up" />
            <x-ui.kpi-card title="Bumbung Rumah" icon="fa-building" id="kpi-bumbung" sub-id="kpi-kepadatan" sub-label="Kepadatan" sub-color="text-info" delay="300" aos="fade-up" />
            <x-ui.kpi-card title="Penduduk Lansia" icon="fa-user-clock" id="kpi-lansia" sub-id="kpi-pct-lansia" sub-label="Proporsi" sub-color="text-warning" delay="400" aos="fade-up" />
            <x-ui.kpi-card title="Penerima Bansos" icon="fa-hand-holding-heart" id="kpi-bansos" sub-id="kpi-pct-bansos" sub-label="Proporsi" sub-color="text-danger" delay="500" aos="fade-up" />
            <x-ui.kpi-card title="Fasilitas Umum" icon="fa-map-marker-alt" id="kpi-fasilitas" sub-id="kpi-ratio-ibadah" sub-label="Ibadah/1k" sub-color="text-success" delay="600" aos="fade-up" />
        </div>

        <!-- Metadata SDI 2026 (Reusable Component) -->
        <x-widgets.sdi-metadata-tab village-name="Desa Sungai Bakau Kecil" :rt-count="37" :var-rt-count="26" :var-fas-count="15" />

        <!-- Flashcard Interaktif & Trivia Stats (Reusable Component) -->
        <x-widgets.flashcard-deck village-name="Desa Sungai Bakau Kecil" title="Flashcard Trivia & Insights Data Desa" />

        <!-- Charts (Staggered Slide Left & Right) -->
        <div class="row g-4 mb-5">
            <div class="col-lg-8" data-aos="fade-right" data-aos-duration="1000" data-aos-delay="150" style="overflow: hidden;">
                <div class="card border-0 shadow-sm rounded-4 p-4 bg-white h-100" style="overflow: hidden;">
                    <div class="d-flex justify-content-between align-items-center mb-3 flex-wrap gap-2">
                        <div>
                            <h5 class="fw-bold text-dark mb-1"><i class="fas fa-chart-bar me-2 text-primary"></i>Jumlah Penduduk &amp; KK Per RT</h5>
                            <p class="text-muted extra-small mb-0"><i class="fas fa-arrows-left-right me-1 text-primary"></i>Geser ke kanan untuk melihat seluruh RT desa</p>
                        </div>
                        <span class="badge bg-primary-subtle text-primary fw-bold px-3 py-2 rounded-pill" id="rt-chart-count-badge">37 RT Terdata</span>
                    </div>
                    <div style="overflow-x: auto; overflow-y: hidden; width: 100%; max-width: 100%; -webkit-overflow-scrolling: touch;" class="pb-2">
                        <div id="chartDemografiContainer" style="width: 1800px; height: 350px; position: relative;">
                            <canvas id="chartDemografi"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4" data-aos="fade-left" data-aos-duration="1000" data-aos-delay="300" data-aos-duration="900">
                <div class="card border-0 shadow-sm rounded-4 p-4 bg-white h-100">
                    <h5 class="fw-bold text-dark mb-3"><i class="fas fa-chart-pie me-2 text-success"></i>Kategori Fasilitas Desa</h5>
                    <canvas id="chartFasilitas" style="max-height:350px;"></canvas>
                </div>
            </div>
        </div>

        <!-- Map -->
        <div class="card border-0 shadow-sm rounded-4 mb-5 p-4 bg-white" data-aos="fade-up" data-aos-duration="1000">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h4 class="fw-bold text-primary mb-0"><i class="fas fa-map-marked-alt me-2"></i>Peta Persebaran Sarana &amp; Fasilitas Umum</h4>
                <span class="badge bg-info text-dark" id="map-count-badge">0 Fasilitas Terpetakan</span>
            </div>
            <div id="map"></div>
        </div>

        <!-- Tables -->
        <div class="card border-0 shadow-sm rounded-4 mb-5 p-4 bg-white" data-aos="fade-up" data-aos-duration="1000">
            <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-2">
                <div>
                    <h4 class="fw-bold text-dark mb-1"><i class="fas fa-table me-2 text-primary"></i>Daftar Potensi RT &amp; Fasilitas Desa</h4>
                    <p class="text-muted small mb-0">Dataset terpadu 37 RT dan 49 titik fasilitas umum Desa Sungai Bakau Kecil.</p>
                </div>
                <button type="button" class="btn btn-sm btn-outline-success rounded-pill px-3 py-2 fw-bold shadow-sm" onclick="downloadCurrentTableExcel()">
                    <i class="fas fa-file-excel me-1"></i> Unduh Data Excel Lengkap (.xlsx)
                </button>
            </div>
            <ul class="nav nav-pills mb-3 flex-nowrap overflow-x-auto text-nowrap" id="pills-tab" role="tablist">
                <li class="nav-item"><button class="nav-link active rounded-pill px-4" data-bs-toggle="pill" data-bs-target="#pills-rt">Daftar RT (37 Wilayah)</button></li>
                <li class="nav-item"><button class="nav-link rounded-pill px-4" data-bs-toggle="pill" data-bs-target="#pills-fas">Daftar Fasilitas (49 Unit)</button></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane fade show active" id="pills-rt">
                    <div class="d-flex justify-content-between align-items-center mb-3 flex-wrap gap-2">
                        <div class="col-md-4 col-12">
                            <input type="text" id="search-rt" class="form-control form-control-sm rounded-pill" placeholder="Cari Nama RT / Ketua RT...">
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
                    <div class="mb-3 col-md-4 col-12">
                        <input type="text" id="search-fas" class="form-control form-control-sm rounded-pill" placeholder="Cari Nama Fasilitas / Kategori...">
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover align-middle small text-nowrap" id="table-fas">
                            <thead class="table-light user-select-none text-nowrap">
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
            </div>{{-- /tab-content --}}
        </div>{{-- /Tables card --}}

        <!-- Dukungan Pemkab & Pembinaan Sektoral (Reusable Component) -->
        <x-ui.dukungan-pemkab village-name="Desa Sungai Bakau Kecil" year="2026" aos="fade-up" />

        <!-- ============================================================== -->
        <!--  ALUR PENYELENGGARAAN PEMBINAAN DESA CINTA STATISTIK (GSBPM)   -->
        <!-- ============================================================== -->
        <div class="card border-0 shadow-sm rounded-4 mb-5 p-4 bg-white" id="gsbpm-flow" data-aos="fade-up" data-aos-duration="1000" style="overflow: hidden;">
            
            <!-- Header Section -->
            <div class="d-flex justify-content-between align-items-start align-items-md-center mb-3 flex-wrap gap-3">
                <div>
                    <div class="d-flex align-items-center gap-2 mb-2 flex-wrap">
                        <span class="badge bg-primary-subtle text-primary border border-primary-subtle rounded-pill px-3 py-1 fw-bold extra-small">
                            <i class="fas fa-certificate me-1"></i> Standar Internasional BPS &amp; UNECE
                        </span>
                        <span class="badge bg-success-subtle text-success border border-success-subtle rounded-pill px-3 py-1 fw-bold extra-small">
                            <i class="fas fa-database me-1"></i> Satu Data Indonesia (SDI)
                        </span>
                    </div>
                    <h4 class="fw-bold text-dark mb-1">
                        <i class="fas fa-project-diagram me-2 text-primary"></i>Alur Penyelenggaraan Pembinaan Desa Cinta Statistik
                    </h4>
                    <p class="text-muted small mb-0">Rangkaian 8 fase pembinaan statistik sektoral Desa Sungai Bakau Kecil 2026 mengadopsi standar <em>Generic Statistical Business Process Model</em> (GSBPM v5.1).</p>
                </div>
                <div class="d-flex gap-2 align-items-center flex-wrap">
                    <button type="button" class="btn btn-sm btn-outline-primary rounded-pill px-3 fw-semibold shadow-sm" data-bs-toggle="modal" data-bs-target="#modalMetadataSDI">
                        <i class="fas fa-database me-1"></i> Buka Metadata SDI
                    </button>
                    <button type="button" class="btn btn-sm btn-dark rounded-pill px-3 fw-semibold font-monospace" id="gsbpm-play-btn" onclick="toggleGsbpmAutoPlay()" title="Klik untuk Jeda/Lanjut Rotasi Otomatis">
                        <i class="fas fa-pause fa-xs text-warning me-1" id="gsbpm-play-icon"></i>
                        <span id="gsbpm-timer-badge">Auto: ON (6s)</span>
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
                /* Hide native ugly scrollbars */
                .gsbpm-scroll-track {
                    overflow-x: auto !important;
                    overflow-y: hidden !important;
                    scrollbar-width: none !important; /* Firefox */
                    -ms-overflow-style: none !important;  /* IE/Edge */
                    scroll-behavior: smooth;
                    padding: 4px 2px 10px 2px;
                }
                .gsbpm-scroll-track::-webkit-scrollbar {
                    display: none !important; /* Chrome/Safari */
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

                /* Aparat Desa Fade Slide From Right Animation */
                @keyframes aparatFadeSlideRight {
                    0% {
                        opacity: 0;
                        transform: translate3d(40px, 0, 0);
                    }
                    100% {
                        opacity: 1;
                        transform: translate3d(0, 0, 0);
                    }
                }

                .aparat-card-item {
                    transition: transform 0.25s ease, box-shadow 0.25s ease;
                }

                .aparat-card-item .card {
                    transition: transform 0.25s cubic-bezier(0.16, 1, 0.3, 1), box-shadow 0.25s cubic-bezier(0.16, 1, 0.3, 1);
                }

                .aparat-card-item .card:hover {
                    transform: translateY(-4px);
                    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08) !important;
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
                                    <div class="phase-desc">8 Indikator &amp; Canva</div>
                                </button>
                            </li>
                            <li class="nav-item flex-shrink-0" role="presentation">
                                <button class="nav-link gsbpm-nav-btn" id="tab-gsbpm-7" data-bs-toggle="pill" data-bs-target="#pane-gsbpm-7" type="button" role="tab" aria-selected="false" onclick="manualSelectGsbpmTab(6)">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <span class="gsbpm-num-badge">07</span>
                                        <i class="fas fa-globe text-primary extra-small"></i>
                                    </div>
                                    <div class="phase-title">Disseminate</div>
                                    <div class="phase-desc">Publikasi &amp; Web</div>
                                </button>
                            </li>
                            <li class="nav-item flex-shrink-0" role="presentation">
                                <button class="nav-link gsbpm-nav-btn" id="tab-gsbpm-8" data-bs-toggle="pill" data-bs-target="#pane-gsbpm-8" type="button" role="tab" aria-selected="false" onclick="manualSelectGsbpmTab(7)">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <span class="gsbpm-num-badge">08</span>
                                        <i class="fas fa-sync-alt text-success extra-small"></i>
                                    </div>
                                    <div class="phase-title">Evaluate</div>
                                    <div class="phase-desc">SOP Permintaan Data</div>
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
                                <h5 class="fw-bold text-dark mb-2">Identifikasi Kebutuhan Data &amp; Pencanangan Resmi Desa Cantik</h5>
                                <p class="text-muted small mb-3">Langkah inisiasi pembinaan statistik sektoral yang diawali koordinasi antara BPS Kabupaten Mempawah dan Pemerintah Desa Sungai Bakau Kecil hingga pencanangan serentak oleh Pemkab Mempawah.</p>
                                
                                <div class="bg-light p-3 rounded-3 border mb-3">
                                    <h6 class="fw-bold text-dark small mb-2"><i class="fas fa-list-check text-primary me-2"></i>Aktivitas Konkret yang Dilalui:</h6>
                                    <ul class="extra-small text-muted mb-0 ps-3">
                                        <li class="mb-1"><strong>Koordinasi Awal BPS Mempawah:</strong> Tim pembina BPS Mempawah hadir melakukan audiensi dan menawarkan program pembinaan Desa Cantik 2026.</li>
                                        <li class="mb-1"><strong>Persetujuan Pemdes SBK:</strong> Pj. Kepala Desa (Saniman) dan jajaran Pemdes menyepakati komitmen pelaksanaan pembinaan statistik terpadu.</li>
                                        <li class="mb-1"><strong>Pencanangan di Mempawah Command Center:</strong> Deklarasi resmi 3 Desa/Kelurahan Cantik 2026 bersama Bupati/Sekda Mempawah di Kantor Bupati.</li>
                                        <li><strong>Penetapan Agen Statistik Desa:</strong> Penunjukan perangkat desa dan operator IT desa sebagai Agen Statistik resmi Desa Sungai Bakau Kecil.</li>
                                    </ul>
                                </div>
                                <div class="d-flex gap-2 flex-wrap">
                                    <button type="button" class="btn btn-sm btn-outline-primary rounded-pill extra-small" onclick="openImagePreviewModal('{{ asset('images/pencanangan-2026.webp') }}', 'Pencanangan Desa Cantik 2026', 'Deklarasi &amp; Pencanangan Resmi Desa &amp; Kelurahan Cinta Statistik Kabupaten Mempawah 2026 oleh BPS &amp; Pemkab.')">
                                        <i class="fas fa-eye me-1"></i> Pratinjau Foto Pencanangan
                                    </button>
                                </div>
                            </div>
                            <div class="col-lg-5">
                                <div class="card border rounded-4 overflow-hidden shadow-sm img-hover-card clickable-img" onclick="openImagePreviewModal('{{ asset('images/pencanangan-2026.webp') }}', 'Pencanangan Desa Cantik 2026', 'Deklarasi &amp; Pencanangan Resmi Desa &amp; Kelurahan Cinta Statistik Kabupaten Mempawah 2026 oleh BPS &amp; Pemkab.')">
                                    <div class="overflow-hidden border-bottom img-zoom-wrapper" style="height: 190px;">
                                        <picture>
                                            <source srcset="{{ asset('images/pencanangan-2026.avif') }}" type="image/avif">
                                            <source srcset="{{ asset('images/pencanangan-2026.webp') }}" type="image/webp">
                                            <img src="{{ asset('images/pencanangan-2026.webp') }}" alt="Pencanangan Desa Cantik 2026" class="img-fluid w-100 h-100 object-fit-cover" loading="lazy" decoding="async" width="1000" height="750">
                                        </picture>
                                        <div class="zoom-overlay"><i class="fas fa-search-plus"></i> Perbesar</div>
                                    </div>
                                    <div class="p-3 bg-light text-center">
                                        <h6 class="fw-bold text-dark mb-1 small">Pencanangan Desa Cantik 2026</h6>
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
                                <p class="text-muted small mb-3">Perancangan instrumen pencacahan mikro berbasis agregat RT dan sarana fasilitas umum dengan mengacu pada standar Metadata Satu Data Indonesia (SDI).</p>
                                
                                <div class="bg-light p-3 rounded-3 border mb-3">
                                    <h6 class="fw-bold text-dark small mb-2"><i class="fas fa-table-list text-info me-2"></i>Komponen Metadata &amp; Instrumen yang Disusun:</h6>
                                    <ul class="extra-small text-muted mb-0 ps-3">
                                        <li class="mb-1"><strong>MS-Kegiatan:</strong> Pendataan Potensi Kewilayahan RT dan Fasilitas Desa Cantik SBK 2026.</li>
                                        <li class="mb-1"><strong>MS-Variabel (26 Variabel RT + 15 Variabel Fasilitas):</strong> Definisi operasional demografi, bansos, kepemilikan KTP-el, serta koordinat GPS sarana umum.</li>
                                        <li class="mb-1"><strong>MS-Indikator (8 Indikator Prioritas):</strong> Rumus Sex Ratio, Rata-rata ART, Persentase Lansia, KTP-el, Bansos, Putus Sekolah, Kepadatan Hunian, dan Sarana Ibadah.</li>
                                        <li><strong>Desain Kuesioner Digital:</strong> Penyesuaian formulir wawancara ketua RT agar ramah diisi melalui smartphone CAPI.</li>
                                    </ul>
                                </div>
                                <div class="d-flex gap-2 flex-wrap">
                                    <button type="button" class="btn btn-sm btn-info text-dark rounded-pill extra-small fw-bold" data-bs-toggle="modal" data-bs-target="#modalMetadataSDI">
                                        <i class="fas fa-eye me-1"></i> Pratinjau Metadata (3 Tab)
                                    </button>
                                    <a href="https://drive.google.com/file/d/1AS3gtBHXqqZv0K-rglbR5aHlAg1Y8FD4/view?usp=sharing" target="_blank" rel="noopener noreferrer" class="btn btn-sm btn-outline-success rounded-pill extra-small fw-bold">
                                        <i class="fas fa-file-pdf me-1"></i> Unduh PDF Dokumen Metadata
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-5">
                                <div class="card border rounded-4 overflow-hidden shadow-sm img-hover-card clickable-img" onclick="openImagePreviewModal('{{ asset('images/sungaibakaukecil/kantor-desa.webp') }}', 'Pemerintah Desa Sungai Bakau Kecil', 'Pusat koordinasi &amp; kesiapan posko pelayanan data Desa Cantik 2026.')">
                                    <div class="overflow-hidden border-bottom img-zoom-wrapper" style="height: 190px;">
                                        <picture>
                                            <source srcset="{{ asset('images/sungaibakaukecil/kantor-desa.avif') }}" type="image/avif">
                                            <source srcset="{{ asset('images/sungaibakaukecil/kantor-desa.webp') }}" type="image/webp">
                                            <img src="{{ asset('images/sungaibakaukecil/kantor-desa.webp') }}" alt="Kantor Desa Sungai Bakau Kecil" class="img-fluid w-100 h-100 object-fit-cover" loading="lazy" decoding="async" width="960" height="1280">
                                        </picture>
                                        <div class="zoom-overlay"><i class="fas fa-search-plus"></i> Perbesar</div>
                                    </div>
                                    <div class="p-3 bg-light text-center">
                                        <h6 class="fw-bold text-dark mb-1 small">Standardisasi Metadata &amp; Instrumen</h6>
                                        <p class="extra-small text-muted mb-0">Posko Desa Cantik Sungai Bakau Kecil 2026</p>
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
                                <p class="text-muted small mb-3">Pembangunan aplikasi survei berbasis Android/iOS menggunakan AppSheet yang terhubung langsung secara idempoten ke basis data cloud Google Sheets.</p>
                                
                                <div class="bg-light p-3 rounded-3 border mb-3">
                                    <h6 class="fw-bold text-dark small mb-2"><i class="fas fa-cogs text-secondary me-2"></i>Fitur Sistem CAPI yang Dikonfigurasi:</h6>
                                    <ul class="extra-small text-muted mb-0 ps-3">
                                        <li class="mb-1"><strong>Logika Validasi Real-Time:</strong> Mencegah kesalahan input logika (contoh: Jumlah KTP tidak boleh melampaui jumlah penduduk dewasa).</li>
                                        <li class="mb-1"><strong>Geotagging GPS Otomatis:</strong> Pengambilan titik koordinat akurat pada setiap fasilitas publik (latitude &amp; longitude).</li>
                                        <li class="mb-1"><strong>Modul Kamera &amp; Unggah Foto:</strong> Dokumentasi visual kondisi fisik fasilitas desa langsung dari lapangan.</li>
                                        <li><strong>Integrasi Google Sheets:</strong> Penyimpanan data tabel `Appsheet_RT` dan `Appsheet_Fasilitas` secara terpusat dan aman.</li>
                                    </ul>
                                </div>
                                <div class="d-flex gap-2 flex-wrap">
                                    <a href="#pills-tab" class="btn btn-sm btn-outline-secondary rounded-pill extra-small">
                                        <i class="fas fa-table me-1"></i> Lihat Data CAPI Hasil Sinkronisasi
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-5">
                                <div class="card border rounded-4 overflow-hidden shadow-sm img-hover-card clickable-img" onclick="openImagePreviewModal('{{ asset('images/excel-sdi-cover.webp') }}', 'Workbook Data Excel SDI 2026', 'Struktur 5 Sheet Data Mentah &amp; Indikator SDI Desa Sungai Bakau Kecil 2026.')">
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
                                    <span class="badge bg-success-subtle text-success rounded-pill extra-small"><i class="fas fa-check-circle me-1"></i> 100% Terdata (37 RT &amp; 49 Fasilitas)</span>
                                </div>
                                <h5 class="fw-bold text-dark mb-2">Pelatihan Agen Statistik &amp; Pendataan Terpusat Ketua RT via CAPI</h5>
                                <p class="text-muted small mb-3">Pelatihan intensif bagi Agen Statistik Desa serta pencacahan terpusat di Kantor Desa terhadap seluruh 37 Ketua RT dan inventarisasi 49 fasilitas umum.</p>
                                
                                <div class="bg-light p-3 rounded-3 border mb-3">
                                    <h6 class="fw-bold text-dark small mb-2"><i class="fas fa-users-viewfinder text-success me-2"></i>Pelaksanaan Lapangan:</h6>
                                    <ul class="extra-small text-muted mb-0 ps-3">
                                        <li class="mb-1"><strong>Pelatihan Agen Statistik Desa:</strong> BPS Mempawah membekali agen statistik pengoperasian CAPI, konsep GSBPM, dan tata cara wawancara.</li>
                                        <li class="mb-1"><strong>Pendataan Terpusat di Kantor Desa:</strong> Para Ketua RT hadir membawa register kependudukan, lalu diwawancarai oleh Agen Statistik Desa menggunakan CAPI.</li>
                                        <li><strong>Observasi 49 Fasilitas Umum:</strong> Agen statistik melakukan geotagging dan foto kondisi sarana ibadah, sekolah, kesehatan, dan pemerintahan.</li>
                                    </ul>
                                </div>
                                <div class="d-flex gap-2 flex-wrap">
                                    <button type="button" class="btn btn-sm btn-outline-success rounded-pill extra-small" onclick="openImagePreviewModal('{{ asset('images/sungaibakaukecil/dokum-1.webp') }}', 'Pelatihan Agen Statistik RT', 'Pembekalan metodologi CAPI AppSheet &amp; verifikasi indikator SDI oleh BPS Mempawah.')">
                                        <i class="fas fa-eye me-1"></i> Pratinjau Foto Pelatihan
                                    </button>
                                </div>
                            </div>
                            <div class="col-lg-5">
                                <div class="card border rounded-4 overflow-hidden shadow-sm img-hover-card clickable-img" onclick="openImagePreviewModal('{{ asset('images/sungaibakaukecil/dokum-1.webp') }}', 'Pelatihan Agen Statistik RT', 'Pembekalan metodologi CAPI AppSheet &amp; verifikasi indikator SDI oleh BPS Mempawah.')">
                                    <div class="overflow-hidden border-bottom img-zoom-wrapper" style="height: 190px;">
                                        <picture>
                                            <source srcset="{{ asset('images/sungaibakaukecil/dokum-1.avif') }}" type="image/avif">
                                            <source srcset="{{ asset('images/sungaibakaukecil/dokum-1.webp') }}" type="image/webp">
                                            <img src="{{ asset('images/sungaibakaukecil/dokum-1.webp') }}" alt="Pelatihan Agen Statistik RT" class="img-fluid w-100 h-100 object-fit-cover" loading="lazy" decoding="async" width="1000" height="750">
                                        </picture>
                                        <div class="zoom-overlay"><i class="fas fa-search-plus"></i> Perbesar</div>
                                    </div>
                                    <div class="p-3 bg-light text-center">
                                        <h6 class="fw-bold text-dark mb-1 small">Pelatihan &amp; Pencacahan CAPI</h6>
                                        <p class="extra-small text-muted mb-0">Wawancara 37 Ketua RT &amp; Geotagging 49 Fasilitas</p>
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
                                        <li class="mb-1"><strong>Pembersihan &amp; Imputasi Data:</strong> Koreksi penulisan nama RT, penyesuaian spasi/format numerik, dan deteksi duplikasi ID.</li>
                                        <li class="mb-1"><strong>Verifikasi AI Gemini di Google Sheets:</strong> Pelatihan Agen Statistik membuat formula prompt AI untuk mendeteksi outlier data sosial dan bansos.</li>
                                        <li><strong>Agregasi Hierarki SDI:</strong> Perhitungan rekapitulasi data otomatis dari tingkat RT ke tingkat Dusun hingga total Desa.</li>
                                    </ul>
                                </div>
                                <div class="d-flex gap-2 flex-wrap">
                                    <button type="button" class="btn btn-sm btn-outline-warning text-dark rounded-pill extra-small" onclick="openImagePreviewModal('{{ asset('images/sungaibakaukecil/dokum-2.webp') }}', 'Pelatihan Pengolahan Data CAPI', 'Proses verifikasi data, validasi anomali AI Gemini, dan pembekalan analitika data di Kantor BPS Mempawah 2026.')">
                                        <i class="fas fa-eye me-1"></i> Pratinjau Foto Pengolahan AI
                                    </button>
                                </div>
                            </div>
                            <div class="col-lg-5">
                                <div class="card border rounded-4 overflow-hidden shadow-sm img-hover-card clickable-img" onclick="openImagePreviewModal('{{ asset('images/sungaibakaukecil/dokum-2.webp') }}', 'Pelatihan Pengolahan Data CAPI', 'Proses verifikasi data, validasi anomali AI Gemini, dan pembekalan analitika data di Kantor BPS Mempawah 2026.')">
                                    <div class="overflow-hidden border-bottom img-zoom-wrapper" style="height: 190px;">
                                        <picture>
                                            <source srcset="{{ asset('images/sungaibakaukecil/dokum-2.avif') }}" type="image/avif">
                                            <source srcset="{{ asset('images/sungaibakaukecil/dokum-2.webp') }}" type="image/webp">
                                            <img src="{{ asset('images/sungaibakaukecil/dokum-2.webp') }}" alt="Pelatihan Pengolahan Data CAPI & AI" class="img-fluid w-100 h-100 object-fit-cover" loading="lazy" decoding="async" width="1000" height="750">
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
                                <h5 class="fw-bold text-dark mb-2">Analisis 8 Indikator SDI &amp; Desain Infografis Visual Canva</h5>
                                <p class="text-muted small mb-3">Kalkulasi 8 indikator statistik strategis Satu Data Indonesia serta pelatihan penyusunan poster infografis yang menarik dan mudah dipahami masyarakat menggunakan Canva.</p>
                                
                                <div class="bg-light p-3 rounded-3 border mb-3">
                                    <h6 class="fw-bold text-dark small mb-2"><i class="fas fa-chart-pie text-danger me-2"></i>Hasil Analisis &amp; Desain:</h6>
                                    <ul class="extra-small text-muted mb-0 ps-3">
                                        <li class="mb-1"><strong>Kalkulasi 8 Indikator SDI:</strong> Sex Ratio (104,49), ART (3,46), Lansia (7,80%), E-KTP (71,17%), Bansos (4,96%), Putus Sekolah (1,84%), Kepadatan (4,11 jiwa/rumah), dan Ibadah (4,53 per 1000).</li>
                                        <li class="mb-1"><strong>Pelatihan Desain Canva:</strong> Agen statistik dilatih merancang infografis demografi, pendidikan &amp; sosial, serta fasilitas infrastruktur.</li>
                                        <li><strong>Interpretasi Kebijakan Desa:</strong> Identifikasi 32 anak putus sekolah sebagai rekomendasi program beasiswa desa 2027.</li>
                                    </ul>
                                </div>
                                <div class="d-flex gap-2 flex-wrap">
                                    <a href="#infografis" class="btn btn-sm btn-outline-danger rounded-pill extra-small">
                                        <i class="fas fa-chart-pie me-1"></i> Lihat 3 Infografis Tematik
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-5">
                                <div class="card border rounded-4 overflow-hidden shadow-sm img-hover-card clickable-img" onclick="openImagePreviewModal('{{ asset('images/sungaibakaukecil/infografis-demografi.webp') }}', 'Infografis Profil Demografi 2026', 'Struktur kependudukan, piramida kelompok usia, rasio gender, sebaran RT per dusun, dan persentase kepemilikan E-KTP (71,17%).')">
                                    <div class="overflow-hidden border-bottom img-zoom-wrapper" style="height: 190px; background-color: #f8fafc;">
                                        <picture>
                                            <source srcset="{{ asset('images/sungaibakaukecil/infografis-demografi.avif') }}" type="image/avif">
                                            <source srcset="{{ asset('images/sungaibakaukecil/infografis-demografi.webp') }}" type="image/webp">
                                            <img src="{{ asset('images/sungaibakaukecil/infografis-demografi.webp') }}" alt="Infografis Demografi Canva" class="img-fluid w-100 h-100 object-fit-contain p-2" loading="lazy" decoding="async" width="723" height="1024">
                                        </picture>
                                        <div class="zoom-overlay"><i class="fas fa-search-plus"></i> Perbesar</div>
                                    </div>
                                    <div class="p-3 bg-light text-center">
                                        <h6 class="fw-bold text-dark mb-1 small">Visualisasi Infografis Canva</h6>
                                        <p class="extra-small text-muted mb-0">Storytelling 8 Indikator Statistik Prioritas SDI</p>
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
                                <h5 class="fw-bold text-dark mb-2">Penyusunan Publikasi Resmi &amp; Rilis Portal Web Desa Cantik</h5>
                                <p class="text-muted small mb-3">Penyusunan 2 buku publikasi cetak/PDF serta perilisan portal web interaktif lengkap dengan peta geospasial Leaflet, grafik interaktif, dan unduhan Excel.</p>
                                
                                <div class="bg-light p-3 rounded-3 border mb-3">
                                    <h6 class="fw-bold text-dark small mb-2"><i class="fas fa-book-open text-primary me-2"></i>Produk Diseminasi yang Dirilis:</h6>
                                    <ul class="extra-small text-muted mb-0 ps-3">
                                        <li class="mb-1"><strong>Publikasi 1:</strong> <em>"Desa Sungai Bakau Kecil Dalam Angka 2026"</em> (Buku rilis resmi kompilasi data statistik makro &amp; mikro).</li>
                                        <li class="mb-1"><strong>Publikasi 2:</strong> <em>"Potensi Desa Sungai Bakau Kecil 2026"</em> (Pemetaan potensi kewilayahan &amp; sarana prasarana).</li>
                                        <li><strong>Portal Web Desa Cantik:</strong> Dashboard live dengan pencarian realtime, Leaflet Hybrid GPS Map, Chart.js, dan export multi-sheet Excel.</li>
                                    </ul>
                                </div>
                                <div class="d-flex gap-2 flex-wrap">
                                    <a href="#publikasi" class="btn btn-sm btn-outline-primary rounded-pill extra-small">
                                        <i class="fas fa-book me-1"></i> Buka Buku Publikasi 2026
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-5">
                                <div class="card border rounded-4 overflow-hidden shadow-sm img-hover-card clickable-img" onclick="openImagePreviewModal('{{ asset('images/sungaibakaukecil/cover-sbk-dalam-angka-2026.webp') }}', 'Publikasi SBK Dalam Angka 2026', 'Publikasi resmi hasil pendataan lapangan Desa Cinta Statistik 2026 BPS Kabupaten Mempawah &amp; Pemdes SBK.')">
                                    <div class="overflow-hidden border-bottom img-zoom-wrapper" style="height: 190px; background-color: #fbf9f5;">
                                        <picture>
                                            <source srcset="{{ asset('images/sungaibakaukecil/cover-sbk-dalam-angka-2026.avif') }}" type="image/avif">
                                            <source srcset="{{ asset('images/sungaibakaukecil/cover-sbk-dalam-angka-2026.webp') }}" type="image/webp">
                                            <img src="{{ asset('images/sungaibakaukecil/cover-sbk-dalam-angka-2026.webp') }}" alt="Cover SBK Dalam Angka 2026" class="img-fluid w-100 h-100 object-fit-contain p-2" loading="lazy" decoding="async" width="726" height="1024">
                                        </picture>
                                        <div class="zoom-overlay"><i class="fas fa-search-plus"></i> Perbesar</div>
                                    </div>
                                    <div class="p-3 bg-light text-center">
                                        <h6 class="fw-bold text-dark mb-1 small">Publikasi Resmi &amp; Web Portal</h6>
                                        <p class="extra-small text-muted mb-0">Rilis Publikasi PDF &amp; Portal Desa Cantik</p>
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
                                <p class="text-muted small mb-3">Penilaian menyeluruh terhadap kualitas data, pembentukan mekanisme pelayanan data resmi melalui SOP desa, dan rencana pemutakhiran statistik mandiri berkala.</p>
                                
                                <div class="bg-light p-3 rounded-3 border mb-3">
                                    <h6 class="fw-bold text-dark small mb-2"><i class="fas fa-clipboard-check text-success me-2"></i>Mekanisme Evaluasi &amp; Layanan Berkelanjutan:</h6>
                                    <ul class="extra-small text-muted mb-0 ps-3">
                                        <li class="mb-1"><strong>SOP Permintaan Data 2026:</strong> Standardisasi alur permohonan data statistik bagi akademisi, instansi pemerintah, dan masyarakat.</li>
                                        <li class="mb-1"><strong>Review Kinerja Agen Statistik:</strong> Evaluasi ketepatan waktu pengumpulan, kelengkapan metadata, dan kepatuhan prinsip Satu Data Indonesia.</li>
                                        <li><strong>Kemandirian Statistik Desa:</strong> Pemdes SBK berkomitmen mengalokasikan pemutakhiran data secara periodik berbasis CAPI mandiri.</li>
                                    </ul>
                                </div>
                                <div class="d-flex gap-2 flex-wrap">
                                    <a href="#sop-layanan" class="btn btn-sm btn-outline-success rounded-pill extra-small">
                                        <i class="fas fa-file-signature me-1"></i> Standar Layanan SOP Data
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-5">
                                <div class="card border rounded-4 overflow-hidden shadow-sm img-hover-card clickable-img" onclick="openImagePreviewModal('{{ asset('images/sungaibakaukecil/cover-sop-sbk-2026.webp') }}', 'SOP Permintaan Data Desa Sungai Bakau Kecil 2026', 'Standar Operasional Prosedur Pelayanan &amp; Permintaan Data Statistik Sektoral Desa Sungai Bakau Kecil 2026.')">
                                    <div class="overflow-hidden border-bottom img-zoom-wrapper" style="height: 190px; background-color: #fbf9f5;">
                                        <picture>
                                            <source srcset="{{ asset('images/sungaibakaukecil/cover-sop-sbk-2026.avif') }}" type="image/avif">
                                            <source srcset="{{ asset('images/sungaibakaukecil/cover-sop-sbk-2026.webp') }}" type="image/webp">
                                            <img src="{{ asset('images/sungaibakaukecil/cover-sop-sbk-2026.webp') }}" alt="SOP Permintaan Data 2026" class="img-fluid w-100 h-100 object-fit-contain p-2" loading="lazy" decoding="async" width="726" height="1024">
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

        <!-- Galeri Infografis Tematik Desa Cantik 2026 -->
        <div class="card border-0 shadow-sm rounded-4 mb-5 p-4 bg-white" id="infografis" data-aos="fade-up" data-aos-duration="1000">
            <div class="d-flex justify-content-between align-items-start align-items-sm-center mb-4 flex-wrap gap-2">
                <div>
                    <h4 class="fw-bold text-dark mb-1"><i class="fas fa-chart-pie me-2 text-success"></i>Galeri Infografis Tematik Desa Cantik 2026</h4>
                    <p class="text-muted small mb-0">Visualisasi grafis data kependudukan, pendidikan, kesejahteraan sosial, dan infrastruktur Desa Sungai Bakau Kecil.</p>
                </div>
                <div class="d-flex gap-2">
                    <span class="badge bg-success-subtle text-success border border-success-subtle px-3 py-2 rounded-pill">Desa Cantik 2026</span>
                    <span class="badge bg-primary px-3 py-2 rounded-pill">BPS Mempawah</span>
                </div>
            </div>
            <div class="row g-4">
                <!-- Infografis 1: Profil Demografi -->
                <div class="col-lg-4 col-md-6" data-aos="fade-right" data-aos-duration="1000" data-aos-delay="150" data-aos-duration="900">
                    <div class="card h-100 border rounded-4 shadow-sm overflow-hidden img-hover-card">
                        <div class="overflow-hidden border-bottom img-zoom-wrapper clickable-img" onclick="openImagePreviewModal('{{ asset('images/sungaibakaukecil/infografis-demografi.webp') }}', 'Infografis Profil Demografi 2026', 'Struktur kependudukan, piramida kelompok usia, rasio gender, sebaran RT per dusun, dan persentase kepemilikan E-KTP (71,17%).')" style="height: 280px; background-color: #f8fafc;">
                            <picture><source srcset="{{ asset('images/sungaibakaukecil/infografis-demografi.avif') }}" type="image/avif"><source srcset="{{ asset('images/sungaibakaukecil/infografis-demografi.webp') }}" type="image/webp"><img src="{{ asset('images/sungaibakaukecil/infografis-demografi.webp') }}" alt="Infografis Profil Demografi Desa Sungai Bakau Kecil" class="img-fluid w-100 h-100" style="object-fit: contain; padding: 6px;" loading="lazy" decoding="async" width="723" height="1024"></picture>
                            <div class="zoom-overlay">
                                <i class="fas fa-search-plus"></i> Klik Pratinjau HD
                            </div>
                        </div>
                        <div class="p-3 d-flex flex-column flex-grow-1">
                            <div class="d-flex gap-1 flex-wrap mb-2">
                                <span class="badge bg-primary-subtle text-primary extra-small">5.744 Jiwa</span>
                                <span class="badge bg-success-subtle text-success extra-small">1.661 KK</span>
                                <span class="badge bg-warning-subtle text-dark extra-small">E-KTP 71,17%</span>
                            </div>
                            <h6 class="fw-bold text-dark mb-1">Profil Demografi &amp; Kependudukan</h6>
                            <p class="text-muted extra-small mb-3">Gambaran umum struktur piramida penduduk, rasio gender (2.935 Laki-laki / 2.809 Perempuan), dan sebaran RT di 8 Dusun.</p>
                            <div class="mt-auto d-grid gap-2">
                                <button type="button" class="btn btn-sm btn-outline-success rounded-pill" onclick="openImagePreviewModal('{{ asset('images/sungaibakaukecil/infografis-demografi.webp') }}', 'Infografis Profil Demografi 2026', 'Struktur kependudukan, piramida kelompok usia, rasio gender, sebaran RT per dusun, dan persentase kepemilikan E-KTP (71,17%).')">
                                    <i class="fas fa-eye me-1"></i> Pratinjau HD
                                </button>
                                <a href="https://drive.google.com/file/d/1FV3GkEALufdKjKLxYLioAlEmm5MBOGK2/view?usp=drive_link" target="_blank" rel="noopener noreferrer" class="btn btn-sm btn-success rounded-pill">
                                    <i class="fas fa-download me-1"></i> Unduh Poster HD
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Infografis 2: Pendidikan & Kesejahteraan Sosial -->
                <div class="col-lg-4 col-md-6">
                    <div class="card h-100 border rounded-4 shadow-sm overflow-hidden img-hover-card">
                        <div class="overflow-hidden border-bottom img-zoom-wrapper clickable-img" onclick="openImagePreviewModal('{{ asset('images/sungaibakaukecil/infografis-pendidikan-sosial.webp') }}', 'Infografis Pendidikan &amp; Kesejahteraan Sosial 2026', 'Pemetaan tingkat pendidikan, sebaran penerima bantuan sosial PKH/BPNT/BLT, serta mitigasi 32 anak putus sekolah.')" style="height: 280px; background-color: #f8fafc;">
                            <picture><source srcset="{{ asset('images/sungaibakaukecil/infografis-pendidikan-sosial.avif') }}" type="image/avif"><source srcset="{{ asset('images/sungaibakaukecil/infografis-pendidikan-sosial.webp') }}" type="image/webp"><img src="{{ asset('images/sungaibakaukecil/infografis-pendidikan-sosial.webp') }}" alt="Infografis Pendidikan dan Kesejahteraan Sosial" class="img-fluid w-100 h-100" style="object-fit: contain; padding: 6px;" loading="lazy" decoding="async" width="724" height="1024"></picture>
                            <div class="zoom-overlay">
                                <i class="fas fa-search-plus"></i> Klik Pratinjau HD
                            </div>
                        </div>
                        <div class="p-3 d-flex flex-column flex-grow-1">
                            <div class="d-flex gap-1 flex-wrap mb-2">
                                <span class="badge bg-info-subtle text-dark extra-small">731 Siswa Terdata</span>
                                <span class="badge bg-danger-subtle text-danger extra-small">32 Putus Sekolah</span>
                                <span class="badge bg-primary-subtle text-primary extra-small">PKH &amp; BPNT</span>
                            </div>
                            <h6 class="fw-bold text-dark mb-1">Pendidikan &amp; Kesejahteraan Sosial</h6>
                            <p class="text-muted extra-small mb-3">Indikator pemerataan pendidikan (SD-Sarjana), analisis penyaluran bantuan sosial desa, dan data anak usia 7-18 tahun.</p>
                            <div class="mt-auto d-grid gap-2">
                                <button type="button" class="btn btn-sm btn-outline-info rounded-pill" onclick="openImagePreviewModal('{{ asset('images/sungaibakaukecil/infografis-pendidikan-sosial.webp') }}', 'Infografis Pendidikan &amp; Kesejahteraan Sosial 2026', 'Pemetaan tingkat pendidikan, sebaran penerima bantuan sosial PKH/BPNT/BLT, serta mitigasi 32 anak putus sekolah.')">
                                    <i class="fas fa-eye me-1"></i> Pratinjau HD
                                </button>
                                <a href="https://drive.google.com/file/d/1FV3GkEALufdKjKLxYLioAlEmm5MBOGK2/view?usp=drive_link" target="_blank" rel="noopener noreferrer" class="btn btn-sm btn-primary rounded-pill">
                                    <i class="fas fa-download me-1"></i> Unduh Poster HD
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Infografis 3: Fasilitas & Infrastruktur -->
                <div class="col-lg-4 col-md-6" data-aos="fade-left" data-aos-duration="1000" data-aos-delay="450" data-aos-duration="900">
                    <div class="card h-100 border rounded-4 shadow-sm overflow-hidden img-hover-card">
                        <div class="overflow-hidden border-bottom img-zoom-wrapper clickable-img" onclick="openImagePreviewModal('{{ asset('images/sungaibakaukecil/infografis-fasilitas-infrastruktur.webp') }}', 'Infografis Fasilitas &amp; Infrastruktur 2026', 'Inventarisasi 49 fasilitas umum desa (53,1% sarana ibadah), kondisi 77,6% akses aspal/beton, dan sebaran 1.397 bumbung rumah.')" style="height: 280px; background-color: #f8fafc;">
                            <picture><source srcset="{{ asset('images/sungaibakaukecil/infografis-fasilitas-infrastruktur.avif') }}" type="image/avif"><source srcset="{{ asset('images/sungaibakaukecil/infografis-fasilitas-infrastruktur.webp') }}" type="image/webp"><img src="{{ asset('images/sungaibakaukecil/infografis-fasilitas-infrastruktur.webp') }}" alt="Infografis Fasilitas dan Infrastruktur Desa" class="img-fluid w-100 h-100" style="object-fit: contain; padding: 6px;" loading="lazy" decoding="async" width="721" height="1024"></picture>
                            <div class="zoom-overlay">
                                <i class="fas fa-search-plus"></i> Klik Pratinjau HD
                            </div>
                        </div>
                        <div class="p-3 d-flex flex-column flex-grow-1">
                            <div class="d-flex gap-1 flex-wrap mb-2">
                                <span class="badge bg-success-subtle text-success extra-small">49 Fasilitas</span>
                                <span class="badge bg-primary-subtle text-primary extra-small">77,6% Aspal/Beton</span>
                                <span class="badge bg-warning-subtle text-dark extra-small">1.397 Bumbung</span>
                            </div>
                            <h6 class="fw-bold text-dark mb-1">Fasilitas &amp; Infrastruktur Desa</h6>
                            <p class="text-muted extra-small mb-3">Pemetaan sarana peribadatan, kesehatan, pendidikan, kondisi akses jalan transportasi, dan sebaran unit rumah hunian.</p>
                            <div class="mt-auto d-grid gap-2">
                                <button type="button" class="btn btn-sm btn-outline-warning rounded-pill text-dark" onclick="openImagePreviewModal('{{ asset('images/sungaibakaukecil/infografis-fasilitas-infrastruktur.webp') }}', 'Infografis Fasilitas &amp; Infrastruktur 2026', 'Inventarisasi 49 fasilitas umum desa (53,1% sarana ibadah), kondisi 77,6% akses aspal/beton, dan sebaran 1.397 bumbung rumah.')">
                                    <i class="fas fa-eye me-1"></i> Pratinjau HD
                                </button>
                                <a href="https://drive.google.com/file/d/1FV3GkEALufdKjKLxYLioAlEmm5MBOGK2/view?usp=drive_link" target="_blank" rel="noopener noreferrer" class="btn btn-sm btn-warning rounded-pill text-dark">
                                    <i class="fas fa-download me-1"></i> Unduh Poster HD
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Publikasi Resmi & Booklet (Bukti Dukung Output) -->
        <div class="card border-0 shadow-sm rounded-4 mb-5 p-4 bg-white" id="publikasi" data-aos="fade-up" data-aos-duration="1000">
            <div class="d-flex justify-content-between align-items-start align-items-sm-center mb-4 flex-wrap gap-2">
                <div>
                    <h4 class="fw-bold text-dark mb-1"><i class="fas fa-book-open me-2 text-primary"></i>Publikasi Resmi &amp; Booklet Profil Desa 2026</h4>
                    <p class="text-muted small mb-0">Dokumen publikasi dan analisis data potensi kewilayahan hasil pendataan Desa Cantik 2026.</p>
                </div>
                <span class="badge bg-primary px-3 py-2 rounded-pill">SDI Compliant</span>
            </div>
            <div class="row g-4 justify-content-center">
                <!-- Publikasi 1: SBK Dalam Angka -->
                <div class="col-md-6 col-lg-6" data-aos="fade-right" data-aos-duration="1000" data-aos-delay="150" data-aos-duration="900">
                    <div class="card h-100 border rounded-4 shadow-sm p-3 text-center d-flex flex-column img-hover-card">
                        <div class="overflow-hidden rounded-3 border mb-3 img-zoom-wrapper clickable-img" onclick="openImagePreviewModal('{{ asset('images/sungaibakaukecil/cover-sbk-dalam-angka-2026.webp') }}', 'Cover Publikasi Desa Sungai Bakau Kecil Dalam Angka 2026', 'Publikasi resmi hasil pendataan lapangan Desa Cinta Statistik 2026 BPS Kabupaten Mempawah &amp; Pemerintah Desa Sungai Bakau Kecil.')" style="height: 260px; background-color: #fbf9f5;">
                            <picture><source srcset="{{ asset('images/sungaibakaukecil/cover-sbk-dalam-angka-2026.avif') }}" type="image/avif"><source srcset="{{ asset('images/sungaibakaukecil/cover-sbk-dalam-angka-2026.webp') }}" type="image/webp"><img src="{{ asset('images/sungaibakaukecil/cover-sbk-dalam-angka-2026.webp') }}" alt="Cover Sungai Bakau Kecil Dalam Angka 2026" class="img-fluid w-100 h-100" style="object-fit: contain; padding: 4px;" loading="lazy" decoding="async" width="733" height="1024"></picture>
                            <div class="zoom-overlay">
                                <i class="fas fa-search-plus"></i> Pratinjau Cover
                            </div>
                        </div>
                        <span class="badge bg-primary-subtle text-primary mb-2 align-self-center px-3 py-1 rounded-pill">Publikasi Utama 2026</span>
                        <h5 class="fw-bold text-dark mb-1">Sungai Bakau Kecil Dalam Angka 2026</h5>
                        <p class="text-muted small mb-3">Publikasi komprehensif data sosial, ekonomi, kependudukan, dan potensi desa.</p>
                        <div class="mt-auto d-grid gap-2">
                            <a href="https://drive.google.com/file/d/1w-G8kY9jC00jQoGhbxaUYNlJcsiZvJyq/view?usp=drive_link" target="_blank" rel="noopener noreferrer" class="btn btn-sm btn-outline-primary rounded-pill"><i class="fas fa-eye me-1"></i> Lihat Online (Drive)</a>
                            <a href="https://drive.google.com/file/d/1w-G8kY9jC00jQoGhbxaUYNlJcsiZvJyq/view?usp=drive_link" target="_blank" rel="noopener noreferrer" class="btn btn-sm btn-primary rounded-pill"><i class="fas fa-download me-1"></i> Unduh PDF Publikasi</a>
                        </div>
                    </div>
                </div>

                <!-- Publikasi 2: Potensi Desa (Podes) -->
                <div class="col-md-6 col-lg-6">
                    <div class="card h-100 border rounded-4 shadow-sm p-3 text-center d-flex flex-column img-hover-card">
                        <div class="overflow-hidden rounded-3 border mb-3 img-zoom-wrapper clickable-img" onclick="openImagePreviewModal('{{ asset('images/sungaibakaukecil/cover-podes-sbk-2026.webp') }}', 'Cover Publikasi Potensi Desa Sungai Bakau Kecil 2026', 'Publikasi potensi kewilayahan, sarana dan prasarana fasilitas umum 37 RT di Sungai Bakau Kecil.')" style="height: 260px; background-color: #fbf9f5;">
                            <picture><source srcset="{{ asset('images/sungaibakaukecil/cover-podes-sbk-2026.avif') }}" type="image/avif"><source srcset="{{ asset('images/sungaibakaukecil/cover-podes-sbk-2026.webp') }}" type="image/webp"><img src="{{ asset('images/sungaibakaukecil/cover-podes-sbk-2026.webp') }}" alt="Cover Potensi Desa Sungai Bakau Kecil 2026" class="img-fluid w-100 h-100" style="object-fit: contain; padding: 4px;" loading="lazy" decoding="async" width="723" height="1024"></picture>
                            <div class="zoom-overlay">
                                <i class="fas fa-search-plus"></i> Pratinjau Cover
                            </div>
                        </div>
                        <span class="badge bg-success-subtle text-success mb-2 align-self-center px-3 py-1 rounded-pill">Potensi Wilayah (Podes)</span>
                        <h5 class="fw-bold text-dark mb-1">Potensi Desa Sungai Bakau Kecil 2026</h5>
                        <p class="text-muted small mb-3">Ringkasan grafis dan publikasi potensi kewilayahan serta persebaran fasilitas umum 37 RT di Sungai Bakau Kecil.</p>
                        <div class="mt-auto d-grid gap-2">
                            <a href="https://drive.google.com/file/d/1F3ZAMa_B45zhdPK1a9r0D6vOyR-sfnd8/view?usp=drive_link" target="_blank" rel="noopener noreferrer" class="btn btn-sm btn-outline-success rounded-pill"><i class="fas fa-eye me-1"></i> Lihat Online (Drive)</a>
                            <a href="https://drive.google.com/file/d/1F3ZAMa_B45zhdPK1a9r0D6vOyR-sfnd8/view?usp=drive_link" target="_blank" rel="noopener noreferrer" class="btn btn-sm btn-success rounded-pill"><i class="fas fa-download me-1"></i> Unduh Publikasi Podes</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Produk Statistik & SOP Permintaan Data (Bukti Dukung Layanan & Standar Operasional) -->
        <div class="card border-0 shadow-sm rounded-4 mb-5 p-4 bg-white" id="sop-layanan" data-aos="fade-up" data-aos-duration="1000">
            <h4 class="fw-bold text-dark mb-3"><i class="fas fa-concierge-bell me-2 text-primary"></i>Produk Statistik &amp; SOP Layanan Data Publik</h4>
            <p class="text-muted small mb-4">Layanan aksesibilitas data bagi masyarakat, akademisi, dan perangkat daerah Kabupaten Mempawah.</p>
            <div class="row g-4">
                <!-- Monografi -->
                <div class="col-lg-3 col-md-6">
                    <div class="p-3 border rounded-4 h-100 bg-light text-center d-flex flex-column img-hover-card">
                        <div class="mb-3 overflow-hidden rounded-3 border img-zoom-wrapper clickable-img" onclick="openImagePreviewModal('{{ asset('images/sungaibakaukecil/monografi.webp') }}', 'Monografi Desa Sungai Bakau Kecil 2026', 'Profil Monografi Kependudukan, Wilayah &amp; Sarana Infrastruktur Desa')" style="height: 130px;">
                            <picture><source srcset="{{ asset('images/sungaibakaukecil/monografi.avif') }}" type="image/avif"><source srcset="{{ asset('images/sungaibakaukecil/monografi.webp') }}" type="image/webp"><img src="{{ asset('images/sungaibakaukecil/monografi.webp') }}" alt="Monografi Desa Sungai Bakau Kecil" class="img-fluid w-100 h-100" style="object-fit: cover;" loading="lazy" decoding="async" width="960" height="1280"></picture>
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
                    <div class="p-3 border rounded-4 h-100 bg-light text-center d-flex flex-column img-hover-card">
                        <div class="mb-3 overflow-hidden rounded-3 border img-zoom-wrapper clickable-img" onclick="openImagePreviewModal('{{ asset('images/sungaibakaukecil/infografis-demografi.webp') }}', 'Infografis Demografi Desa 2026', 'Visualisasi data statistik demografi dalam bentuk poster ringkas dan komunikatif.')" style="height: 130px; background-color: #f8fafc;">
                            <picture><source srcset="{{ asset('images/sungaibakaukecil/infografis-demografi.avif') }}" type="image/avif"><source srcset="{{ asset('images/sungaibakaukecil/infografis-demografi.webp') }}" type="image/webp"><img src="{{ asset('images/sungaibakaukecil/infografis-demografi.webp') }}" alt="Infografis Demografi Desa Sungai Bakau Kecil" class="img-fluid w-100 h-100" style="object-fit: contain; padding: 4px;" loading="lazy" decoding="async" width="723" height="1024"></picture>
                            <div class="zoom-overlay">
                                <i class="fas fa-search-plus"></i> Perbesar
                            </div>
                        </div>
                        <h6 class="fw-bold text-dark mb-1">Infografis Demografi 2026</h6>
                        <p class="extra-small text-muted mb-3">Visualisasi data statistik dalam bentuk poster ringkas dan komunikatif.</p>
                        <div class="mt-auto d-grid gap-2">
                            <button type="button" class="btn btn-sm btn-outline-success rounded-pill" onclick="openImagePreviewModal('{{ asset('images/sungaibakaukecil/infografis-demografi.webp') }}', 'Infografis Demografi Desa 2026', 'Visualisasi data statistik demografi dalam bentuk poster ringkas dan komunikatif.')">
                                <i class="fas fa-eye me-1"></i> Pratinjau Poster
                            </button>
                            <a href="https://drive.google.com/file/d/1FV3GkEALufdKjKLxYLioAlEmm5MBOGK2/view?usp=drive_link" target="_blank" rel="noopener noreferrer" class="btn btn-sm btn-success rounded-pill"><i class="fas fa-download me-1"></i> Unduh Versi HD</a>
                        </div>
                    </div>
                </div>
                <!-- Tabel Excel Raw Data -->
                <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="350" data-aos-duration="850">
                    <div class="p-3 border rounded-4 h-100 bg-light text-center d-flex flex-column img-hover-card">
                        <div class="mb-3 overflow-hidden rounded-3 border img-zoom-wrapper clickable-img" onclick="openImagePreviewModal('{{ asset('images/excel-sdi-cover.webp') }}', 'Tabel Data Excel (SDI) 2026', 'Workbook multi-sheet lengkap: Ringkasan SDI, 8 Indikator RT, Variabel Mentah, Rekap Dusun &amp; 49 Fasilitas.')" style="height: 130px; background-color: #f8fafc;">
                            <picture>
                                <source srcset="{{ asset('images/excel-sdi-cover.avif') }}" type="image/avif">
                                <source srcset="{{ asset('images/excel-sdi-cover.webp') }}" type="image/webp">
                                <img src="{{ asset('images/excel-sdi-cover.webp') }}" alt="Tabel Data Excel SDI Desa Sungai Bakau Kecil 2026" class="img-fluid w-100 h-100" style="object-fit: contain; padding: 4px;" loading="lazy" decoding="async" width="800" height="600">
                            </picture>
                            <div class="zoom-overlay">
                                <i class="fas fa-search-plus"></i> Perbesar
                            </div>
                        </div>
                        <h6 class="fw-bold text-dark mb-1">Tabel Data Excel (SDI)</h6>
                        <p class="extra-small text-muted mb-3">Workbook multi-sheet lengkap: Ringkasan SDI, 8 Indikator RT, Variabel Mentah, Rekap Dusun &amp; 49 Fasilitas.</p>
                        <div class="mt-auto d-grid gap-2">
                            <button type="button" class="btn btn-sm btn-outline-success rounded-pill" onclick="openImagePreviewModal('{{ asset('images/excel-sdi-cover.webp') }}', 'Tabel Data Excel (SDI) 2026', 'Workbook multi-sheet lengkap: Ringkasan SDI, 8 Indikator RT, Variabel Mentah, Rekap Dusun &amp; 49 Fasilitas.')">
                                <i class="fas fa-eye me-1"></i> Pratinjau Cover
                            </button>
                            <button type="button" onclick="downloadCurrentTableExcel()" class="btn btn-sm btn-success rounded-pill fw-bold"><i class="fas fa-file-excel me-1"></i> Unduh Data Excel (.xlsx)</button>
                        </div>
                    </div>
                </div>
                <!-- SOP Permintaan Data -->
                <div class="col-lg-3 col-md-6" data-aos="fade-left" data-aos-duration="1000" data-aos-delay="450" data-aos-duration="850">
                    <div class="p-3 border rounded-4 h-100 bg-light text-center d-flex flex-column img-hover-card">
                        <div class="mb-3 overflow-hidden rounded-3 border img-zoom-wrapper clickable-img" onclick="openImagePreviewModal('{{ asset('images/sungaibakaukecil/cover-sop-sbk-2026.webp') }}', 'SOP Permintaan Data Desa Sungai Bakau Kecil 2026', 'Standar Operasional Prosedur Pelayanan &amp; Permintaan Data Statistik Sektoral Desa Sungai Bakau Kecil 2026.')" style="height: 130px; background-color: #fbf9f5;">
                            <picture>
                                <source srcset="{{ asset('images/sungaibakaukecil/cover-sop-sbk-2026.avif') }}" type="image/avif">
                                <source srcset="{{ asset('images/sungaibakaukecil/cover-sop-sbk-2026.webp') }}" type="image/webp">
                                <img src="{{ asset('images/sungaibakaukecil/cover-sop-sbk-2026.webp') }}" alt="SOP Permintaan Data Desa Sungai Bakau Kecil 2026" class="img-fluid w-100 h-100" style="object-fit: contain; padding: 4px;" loading="lazy" decoding="async" width="726" height="1024">
                            </picture>
                            <div class="zoom-overlay">
                                <i class="fas fa-search-plus"></i> Perbesar
                            </div>
                        </div>
                        <h6 class="fw-bold text-dark mb-1">SOP Permintaan Data 2026</h6>
                        <p class="extra-small text-muted mb-3">Standar Operasional Prosedur pelayanan &amp; pengajuan permintaan data desa.</p>
                        <div class="mt-auto d-grid gap-2">
                            <button type="button" class="btn btn-sm btn-outline-danger rounded-pill" onclick="openImagePreviewModal('{{ asset('images/sungaibakaukecil/cover-sop-sbk-2026.webp') }}', 'SOP Permintaan Data Desa Sungai Bakau Kecil 2026', 'Standar Operasional Prosedur Pelayanan &amp; Permintaan Data Statistik Sektoral Desa Sungai Bakau Kecil 2026.')">
                                <i class="fas fa-eye me-1"></i> Pratinjau Cover
                            </button>
                            <a href="https://drive.google.com/file/d/1Hj1c4WsDdj2NTdmz8Y6rYTZUkWAx0O_V/view?usp=drive_link" target="_blank" rel="noopener noreferrer" class="btn btn-sm btn-danger rounded-pill">
                                <i class="fas fa-download me-1"></i> Unduh Dokumen SOP
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Galeri Dokumentasi Kegiatan (Bukti Proses Pembinaan & Pencacahan Agen Statistik) -->

        <div class="card border-0 shadow-sm rounded-4 mb-5 p-4 bg-white" id="dokumentasi" data-aos="fade-up" data-aos-duration="1000">
            <div class="d-flex justify-content-between align-items-start align-items-sm-center mb-3 flex-wrap gap-2">
                <div>
                    <h4 class="fw-bold text-dark mb-1"><i class="fas fa-camera me-2 text-primary"></i>Dokumentasi Kegiatan Pendataan</h4>
                    <p class="text-muted small mb-0">Proses kapasitas building, pelatihan CAPI, dan pendataan oleh Agen Statistik Desa Sungai Bakau Kecil.</p>
                </div>
                <span class="badge bg-success-subtle text-success border border-success-subtle rounded-pill px-3 py-2 font-monospace fw-bold">5 Foto Dokumentasi</span>
            </div>
            <div class="row g-3">
                <div class="col-md-4 col-lg-4" data-aos="fade-right" data-aos-duration="1000" data-aos-delay="150" data-aos-duration="850">
                    <div class="border rounded-4 overflow-hidden shadow-sm h-100 bg-light img-hover-card" onclick="openImagePreviewModal('{{ asset('images/sungaibakaukecil/kantor-desa.webp') }}', 'Pemerintah Desa Sungai Bakau Kecil', 'Pusat koordinasi &amp; kesiapan posko pelayanan data Desa Cantik 2026.')">
                        <div class="overflow-hidden border-bottom img-zoom-wrapper" style="height: 200px;">
                            <picture><source srcset="{{ asset('images/sungaibakaukecil/kantor-desa.avif') }}" type="image/avif"><source srcset="{{ asset('images/sungaibakaukecil/kantor-desa.webp') }}" type="image/webp"><img src="{{ asset('images/sungaibakaukecil/kantor-desa.webp') }}" alt="Pemerintah Desa Sungai Bakau Kecil" class="img-fluid w-100 h-100" style="object-fit: cover;" loading="lazy" decoding="async" width="960" height="1280"></picture>
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
                <div class="col-md-4 col-lg-4" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="250" data-aos-duration="850">
                    <div class="border rounded-4 overflow-hidden shadow-sm h-100 bg-light img-hover-card" onclick="openImagePreviewModal('{{ asset('images/sungaibakaukecil/dokum-1.webp') }}', 'Pelatihan Agen Statistik RT', 'Pembekalan metodologi CAPI AppSheet &amp; verifikasi indikator SDI oleh BPS Mempawah.')">
                        <div class="overflow-hidden border-bottom img-zoom-wrapper" style="height: 200px;">
                            <picture><source srcset="{{ asset('images/sungaibakaukecil/dokum-1.avif') }}" type="image/avif"><source srcset="{{ asset('images/sungaibakaukecil/dokum-1.webp') }}" type="image/webp"><img src="{{ asset('images/sungaibakaukecil/dokum-1.webp') }}" alt="Pembekalan & Pelatihan Agen Statistik" class="img-fluid w-100 h-100" style="object-fit: cover;" loading="lazy" decoding="async" width="1000" height="750"></picture>
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
                            <picture><source srcset="{{ asset('images/sungaibakaukecil/dokum-2.avif') }}" type="image/avif"><source srcset="{{ asset('images/sungaibakaukecil/dokum-2.webp') }}" type="image/webp"><img src="{{ asset('images/sungaibakaukecil/dokum-2.webp') }}" alt="Wawancara CAPI dengan Ketua RT" class="img-fluid w-100 h-100" style="object-fit: cover;" loading="lazy" decoding="async" width="960" height="1280"></picture>
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
                            <picture><source srcset="{{ asset('images/sungaibakaukecil/dokum-3.avif') }}" type="image/avif"><source srcset="{{ asset('images/sungaibakaukecil/dokum-3.webp') }}" type="image/webp"><img src="{{ asset('images/sungaibakaukecil/dokum-3.webp') }}" alt="Tagging GPS Sarana & Fasilitas" class="img-fluid w-100 h-100" style="object-fit: cover;" loading="lazy" decoding="async" width="960" height="1280"></picture>
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
                            <picture><source srcset="{{ asset('images/sungaibakaukecil/dokum-4.avif') }}" type="image/avif"><source srcset="{{ asset('images/sungaibakaukecil/dokum-4.webp') }}" type="image/webp"><img src="{{ asset('images/sungaibakaukecil/dokum-4.webp') }}" alt="Ground Check & Quality Control Data" class="img-fluid w-100 h-100" style="object-fit: cover;" loading="lazy" decoding="async" width="960" height="1280"></picture>
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
                <div class="col-md-6 col-lg-6" data-aos="fade-right" data-aos-duration="1000" data-aos-delay="450" data-aos-duration="850">
                    <div class="border rounded-4 overflow-hidden shadow-sm h-100 bg-light img-hover-card" onclick="openImagePreviewModal('{{ asset('images/sungaibakaukecil/diseminasi.webp') }}', 'Diseminasi Hasil Pendataan CAPI', 'Pelatihan diseminasi hasil pendataan CAPI Desa Sungai Bakau Kecil di Kantor BPS Mempawah 2026.')">
                        <div class="overflow-hidden border-bottom img-zoom-wrapper" style="height: 220px;">
                            <picture><source srcset="{{ asset('images/sungaibakaukecil/diseminasi.avif') }}" type="image/avif"><source srcset="{{ asset('images/sungaibakaukecil/diseminasi.webp') }}" type="image/webp"><img src="{{ asset('images/sungaibakaukecil/diseminasi.webp') }}" alt="Diseminasi Hasil Pendataan CAPI" class="img-fluid w-100 h-100" style="object-fit: cover;" loading="lazy" decoding="async" width="1000" height="750"></picture>
                            <div class="zoom-overlay">
                                <i class="fas fa-search-plus"></i> Klik Tampilan Besar
                            </div>
                        </div>
                        <div class="p-3">
                            <h6 class="fw-bold mb-1">Diseminasi Hasil Pendataan CAPI</h6>
                            <p class="extra-small text-muted mb-0">Pelatihan diseminasi hasil pendataan CAPI di Kantor BPS Mempawah 2026.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6" data-aos="fade-left" data-aos-duration="1000" data-aos-delay="550" data-aos-duration="850">
                    <div class="border rounded-4 overflow-hidden shadow-sm h-100 bg-light img-hover-card" onclick="openImagePreviewModal('{{ asset('images/pencanangan-2026.webp') }}', 'Pencanangan Desa Cantik 2026', 'Deklarasi &amp; Pencanangan Resmi Desa &amp; Kelurahan Cinta Statistik Kabupaten Mempawah 2026 oleh BPS &amp; Pemkab.')">
                        <div class="overflow-hidden border-bottom img-zoom-wrapper" style="height: 220px;">
                            <picture><source srcset="{{ asset('images/pencanangan-2026.avif') }}" type="image/avif"><source srcset="{{ asset('images/pencanangan-2026.webp') }}" type="image/webp"><img src="{{ asset('images/pencanangan-2026.webp') }}" alt="Pencanangan Desa Cantik 2026" class="img-fluid w-100 h-100" style="object-fit: cover;" loading="lazy" decoding="async" width="1000" height="750"></picture>
                            <div class="zoom-overlay">
                                <i class="fas fa-search-plus"></i> Klik Tampilan Besar
                            </div>
                        </div>
                        <div class="p-3">
                            <h6 class="fw-bold mb-1">Pencanangan Desa Cantik 2026</h6>
                            <p class="extra-small text-muted mb-0">Deklarasi &amp; pencanangan resmi Desa &amp; Kelurahan Cinta Statistik Kabupaten Mempawah 2026.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>


<!-- ============================================================== -->
        <!--        STRUKTUR & APARATUR PEMERINTAH DESA SUNGAI BAKAU KECIL      -->
        <!-- ============================================================== -->
        <div class="card border-0 shadow-sm rounded-4 mb-5 p-4 bg-white" id="aparat-desa" data-aos="fade-up" data-aos-duration="1000">
            <div class="d-flex justify-content-between align-items-start align-items-sm-center mb-3 flex-wrap gap-2">
                <div>
                    <h4 class="fw-bold text-dark mb-1"><i class="fas fa-users-cog me-2 text-primary"></i>Struktur &amp; Aparatur Pemerintah Desa Sungai Bakau Kecil</h4>
                    <p class="text-muted small mb-0">Susunan kepemimpinan desa, jajaran sekretariat, kepala seksi, kepala urusan, kepala dusun, dan staf pelaksana.</p>
                </div>
                <span class="badge bg-primary-subtle text-primary border border-primary-subtle rounded-pill px-3 py-2 font-monospace fw-bold">20 Aparatur Desa</span>
            </div>

            <!-- Filter Categories & Search Bar -->
            <div class="row g-2 mb-4 align-items-center">
                <div class="col-lg-8 col-md-12" data-aos="fade-left" data-aos-duration="1000">
                    <div class="d-flex gap-2 flex-wrap" id="aparat-filter-buttons">
                        <button type="button" class="btn btn-sm btn-primary rounded-pill px-3 fw-semibold active" onclick="filterAparatCards('all', this)">
                            <i class="fas fa-th-large me-1"></i> Semua (20)
                        </button>
                        <button type="button" class="btn btn-sm btn-outline-primary rounded-pill px-3 fw-semibold" onclick="filterAparatCards('pimpinan', this)">
                            <i class="fas fa-crown me-1"></i> Pimpinan &amp; Sekdes (2)
                        </button>
                        <button type="button" class="btn btn-sm btn-outline-info rounded-pill px-3 fw-semibold" onclick="filterAparatCards('kasi-kaur', this)">
                            <i class="fas fa-user-tie me-1"></i> Kasi &amp; Kaur (6)
                        </button>
                        <button type="button" class="btn btn-sm btn-outline-warning rounded-pill px-3 fw-semibold" onclick="filterAparatCards('kadus', this)">
                            <i class="fas fa-map-marked-alt me-1"></i> Kepala Dusun (8)
                        </button>
                        <button type="button" class="btn btn-sm btn-outline-secondary rounded-pill px-3 fw-semibold" onclick="filterAparatCards('staf', this)">
                            <i class="fas fa-user-friends me-1"></i> Staf Pelaksana (4)
                        </button>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12" data-aos="fade-right" data-aos-duration="1000">
                    <div class="input-group input-group-sm">
                        <span class="input-group-text bg-white border-end-0 rounded-start-pill"><i class="fas fa-search text-muted"></i></span>
                        <input type="text" id="search-aparat" class="form-control border-start-0 rounded-end-pill" placeholder="Cari nama atau jabatan aparatur..." oninput="searchAparatCards(this.value)">
                    </div>
                </div>
            </div>            <!-- Grid Kartu Aparat -->
            <div class="row g-3" id="aparat-grid-container">
                <!-- SANIMAN -->
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 aparat-card-item" data-cat="pimpinan" data-name="saniman" data-role="pj. kepala desa" data-aos="fade-left" data-aos-duration="600" data-aos-delay="50">
                    <div class="card h-100 border rounded-4 shadow-sm overflow-hidden img-hover-card bg-white text-center d-flex flex-column">
                        <div class="position-relative overflow-hidden border-bottom img-zoom-wrapper clickable-img" onclick="openImagePreviewModal('{{ asset('images/sungaibakaukecil/aparat/saniman.webp') }}', 'SANIMAN', 'PJ. KEPALA DESA - Penjabat Kepala Desa Pemerintah Desa Sungai Bakau Kecil')" style="height: 270px; background-color: #f8fafc;">
                            <picture>
                                <source srcset="{{ asset('images/sungaibakaukecil/aparat/saniman.avif') }}" type="image/avif">
                                <source srcset="{{ asset('images/sungaibakaukecil/aparat/saniman.webp') }}" type="image/webp">
                                <img src="{{ asset('images/sungaibakaukecil/aparat/saniman.webp') }}" alt="SANIMAN - PJ. KEPALA DESA" class="w-100 h-100 object-fit-cover" loading="lazy" decoding="async" width="450" height="580">
                            </picture>
                            <div class="zoom-overlay">
                                <i class="fas fa-search-plus"></i> Pratinjau Foto
                            </div>
                        </div>
                        <div class="p-3 d-flex flex-column flex-grow-1">
                            <span class="badge bg-primary rounded-pill px-3 py-1 extra-small align-self-center mb-2">PJ. KEPALA DESA</span>
                            <h6 class="fw-bold text-dark mb-1">SANIMAN</h6>
                            <p class="extra-small text-muted mb-3">Penjabat Kepala Desa Pemerintah Desa Sungai Bakau Kecil</p>
                            <div class="mt-auto">
                                <button type="button" class="btn btn-sm btn-outline-secondary w-100 rounded-pill extra-small" onclick="openImagePreviewModal('{{ asset('images/sungaibakaukecil/aparat/saniman.webp') }}', 'SANIMAN', 'PJ. KEPALA DESA - Penjabat Kepala Desa Pemerintah Desa Sungai Bakau Kecil')">
                                    <i class="fas fa-eye me-1"></i> Lihat Foto Lengkap
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- RIANDI PRAYUDA S,Pd -->
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 aparat-card-item" data-cat="pimpinan" data-name="riandi prayuda s,pd" data-role="sekretaris desa" data-aos="fade-left" data-aos-duration="600" data-aos-delay="100">
                    <div class="card h-100 border rounded-4 shadow-sm overflow-hidden img-hover-card bg-white text-center d-flex flex-column">
                        <div class="position-relative overflow-hidden border-bottom img-zoom-wrapper clickable-img" onclick="openImagePreviewModal('{{ asset('images/sungaibakaukecil/aparat/riandi.webp') }}', 'RIANDI PRAYUDA S,Pd', 'SEKRETARIS DESA - Sekretaris Desa & Koordinator Administrasi Desa')" style="height: 270px; background-color: #f8fafc;">
                            <picture>
                                <source srcset="{{ asset('images/sungaibakaukecil/aparat/riandi.avif') }}" type="image/avif">
                                <source srcset="{{ asset('images/sungaibakaukecil/aparat/riandi.webp') }}" type="image/webp">
                                <img src="{{ asset('images/sungaibakaukecil/aparat/riandi.webp') }}" alt="RIANDI PRAYUDA S,Pd - SEKRETARIS DESA" class="w-100 h-100 object-fit-cover" loading="lazy" decoding="async" width="450" height="580">
                            </picture>
                            <div class="zoom-overlay">
                                <i class="fas fa-search-plus"></i> Pratinjau Foto
                            </div>
                        </div>
                        <div class="p-3 d-flex flex-column flex-grow-1">
                            <span class="badge bg-success rounded-pill px-3 py-1 extra-small align-self-center mb-2">SEKRETARIS DESA</span>
                            <h6 class="fw-bold text-dark mb-1">RIANDI PRAYUDA S,Pd</h6>
                            <p class="extra-small text-muted mb-3">Sekretaris Desa & Koordinator Administrasi Desa</p>
                            <div class="mt-auto">
                                <button type="button" class="btn btn-sm btn-outline-secondary w-100 rounded-pill extra-small" onclick="openImagePreviewModal('{{ asset('images/sungaibakaukecil/aparat/riandi.webp') }}', 'RIANDI PRAYUDA S,Pd', 'SEKRETARIS DESA - Sekretaris Desa & Koordinator Administrasi Desa')">
                                    <i class="fas fa-eye me-1"></i> Lihat Foto Lengkap
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- HAQQI WIRAKARYADI, S.Pd -->
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 aparat-card-item" data-cat="kasi-kaur" data-name="haqqi wirakaryadi, s.pd" data-role="kasi pemerintahan" data-aos="fade-left" data-aos-duration="600" data-aos-delay="150">
                    <div class="card h-100 border rounded-4 shadow-sm overflow-hidden img-hover-card bg-white text-center d-flex flex-column">
                        <div class="position-relative overflow-hidden border-bottom img-zoom-wrapper clickable-img" onclick="openImagePreviewModal('{{ asset('images/sungaibakaukecil/aparat/haqqi.webp') }}', 'HAQQI WIRAKARYADI, S.Pd', 'KASI PEMERINTAHAN - Kepala Seksi Pemerintahan Desa')" style="height: 270px; background-color: #f8fafc;">
                            <picture>
                                <source srcset="{{ asset('images/sungaibakaukecil/aparat/haqqi.avif') }}" type="image/avif">
                                <source srcset="{{ asset('images/sungaibakaukecil/aparat/haqqi.webp') }}" type="image/webp">
                                <img src="{{ asset('images/sungaibakaukecil/aparat/haqqi.webp') }}" alt="HAQQI WIRAKARYADI, S.Pd - KASI PEMERINTAHAN" class="w-100 h-100 object-fit-cover" loading="lazy" decoding="async" width="450" height="580">
                            </picture>
                            <div class="zoom-overlay">
                                <i class="fas fa-search-plus"></i> Pratinjau Foto
                            </div>
                        </div>
                        <div class="p-3 d-flex flex-column flex-grow-1">
                            <span class="badge bg-info text-dark rounded-pill px-3 py-1 extra-small align-self-center mb-2">KASI PEMERINTAHAN</span>
                            <h6 class="fw-bold text-dark mb-1">HAQQI WIRAKARYADI, S.Pd</h6>
                            <p class="extra-small text-muted mb-3">Kepala Seksi Pemerintahan Desa</p>
                            <div class="mt-auto">
                                <button type="button" class="btn btn-sm btn-outline-secondary w-100 rounded-pill extra-small" onclick="openImagePreviewModal('{{ asset('images/sungaibakaukecil/aparat/haqqi.webp') }}', 'HAQQI WIRAKARYADI, S.Pd', 'KASI PEMERINTAHAN - Kepala Seksi Pemerintahan Desa')">
                                    <i class="fas fa-eye me-1"></i> Lihat Foto Lengkap
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- MASUDI EDI MULYONO -->
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 aparat-card-item" data-cat="kasi-kaur" data-name="masudi edi mulyono" data-role="kasi pelayanan" data-aos="fade-left" data-aos-duration="600" data-aos-delay="200">
                    <div class="card h-100 border rounded-4 shadow-sm overflow-hidden img-hover-card bg-white text-center d-flex flex-column">
                        <div class="position-relative overflow-hidden border-bottom img-zoom-wrapper clickable-img" onclick="openImagePreviewModal('{{ asset('images/sungaibakaukecil/aparat/masudi.webp') }}', 'MASUDI EDI MULYONO', 'KASI PELAYANAN - Kepala Seksi Pelayanan Masyarakat')" style="height: 270px; background-color: #f8fafc;">
                            <picture>
                                <source srcset="{{ asset('images/sungaibakaukecil/aparat/masudi.avif') }}" type="image/avif">
                                <source srcset="{{ asset('images/sungaibakaukecil/aparat/masudi.webp') }}" type="image/webp">
                                <img src="{{ asset('images/sungaibakaukecil/aparat/masudi.webp') }}" alt="MASUDI EDI MULYONO - KASI PELAYANAN" class="w-100 h-100 object-fit-cover" loading="lazy" decoding="async" width="450" height="580">
                            </picture>
                            <div class="zoom-overlay">
                                <i class="fas fa-search-plus"></i> Pratinjau Foto
                            </div>
                        </div>
                        <div class="p-3 d-flex flex-column flex-grow-1">
                            <span class="badge bg-info text-dark rounded-pill px-3 py-1 extra-small align-self-center mb-2">KASI PELAYANAN</span>
                            <h6 class="fw-bold text-dark mb-1">MASUDI EDI MULYONO</h6>
                            <p class="extra-small text-muted mb-3">Kepala Seksi Pelayanan Masyarakat</p>
                            <div class="mt-auto">
                                <button type="button" class="btn btn-sm btn-outline-secondary w-100 rounded-pill extra-small" onclick="openImagePreviewModal('{{ asset('images/sungaibakaukecil/aparat/masudi.webp') }}', 'MASUDI EDI MULYONO', 'KASI PELAYANAN - Kepala Seksi Pelayanan Masyarakat')">
                                    <i class="fas fa-eye me-1"></i> Lihat Foto Lengkap
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- USNI HUSIN -->
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 aparat-card-item" data-cat="kasi-kaur" data-name="usni husin" data-role="kasi kesejahteraan" data-aos="fade-left" data-aos-duration="600" data-aos-delay="50">
                    <div class="card h-100 border rounded-4 shadow-sm overflow-hidden img-hover-card bg-white text-center d-flex flex-column">
                        <div class="position-relative overflow-hidden border-bottom img-zoom-wrapper clickable-img" onclick="openImagePreviewModal('{{ asset('images/sungaibakaukecil/aparat/usni.webp') }}', 'USNI HUSIN', 'KASI KESEJAHTERAAN - Kepala Seksi Kesejahteraan Sosial & Pembangunan')" style="height: 270px; background-color: #f8fafc;">
                            <picture>
                                <source srcset="{{ asset('images/sungaibakaukecil/aparat/usni.avif') }}" type="image/avif">
                                <source srcset="{{ asset('images/sungaibakaukecil/aparat/usni.webp') }}" type="image/webp">
                                <img src="{{ asset('images/sungaibakaukecil/aparat/usni.webp') }}" alt="USNI HUSIN - KASI KESEJAHTERAAN" class="w-100 h-100 object-fit-cover" loading="lazy" decoding="async" width="450" height="580">
                            </picture>
                            <div class="zoom-overlay">
                                <i class="fas fa-search-plus"></i> Pratinjau Foto
                            </div>
                        </div>
                        <div class="p-3 d-flex flex-column flex-grow-1">
                            <span class="badge bg-info text-dark rounded-pill px-3 py-1 extra-small align-self-center mb-2">KASI KESEJAHTERAAN</span>
                            <h6 class="fw-bold text-dark mb-1">USNI HUSIN</h6>
                            <p class="extra-small text-muted mb-3">Kepala Seksi Kesejahteraan Sosial & Pembangunan</p>
                            <div class="mt-auto">
                                <button type="button" class="btn btn-sm btn-outline-secondary w-100 rounded-pill extra-small" onclick="openImagePreviewModal('{{ asset('images/sungaibakaukecil/aparat/usni.webp') }}', 'USNI HUSIN', 'KASI KESEJAHTERAAN - Kepala Seksi Kesejahteraan Sosial & Pembangunan')">
                                    <i class="fas fa-eye me-1"></i> Lihat Foto Lengkap
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- PUTRI NURMALASARI, S.Si -->
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 aparat-card-item" data-cat="kasi-kaur" data-name="putri nurmalasari, s.si" data-role="kaur perencanaan" data-aos="fade-left" data-aos-duration="600" data-aos-delay="100">
                    <div class="card h-100 border rounded-4 shadow-sm overflow-hidden img-hover-card bg-white text-center d-flex flex-column">
                        <div class="position-relative overflow-hidden border-bottom img-zoom-wrapper clickable-img" onclick="openImagePreviewModal('{{ asset('images/sungaibakaukecil/aparat/putri.webp') }}', 'PUTRI NURMALASARI, S.Si', 'KAUR PERENCANAAN - Kepala Urusan Perencanaan & Evaluasi Program')" style="height: 270px; background-color: #f8fafc;">
                            <picture>
                                <source srcset="{{ asset('images/sungaibakaukecil/aparat/putri.avif') }}" type="image/avif">
                                <source srcset="{{ asset('images/sungaibakaukecil/aparat/putri.webp') }}" type="image/webp">
                                <img src="{{ asset('images/sungaibakaukecil/aparat/putri.webp') }}" alt="PUTRI NURMALASARI, S.Si - KAUR PERENCANAAN" class="w-100 h-100 object-fit-cover" loading="lazy" decoding="async" width="450" height="580">
                            </picture>
                            <div class="zoom-overlay">
                                <i class="fas fa-search-plus"></i> Pratinjau Foto
                            </div>
                        </div>
                        <div class="p-3 d-flex flex-column flex-grow-1">
                            <span class="badge bg-primary-subtle text-primary rounded-pill px-3 py-1 extra-small align-self-center mb-2">KAUR PERENCANAAN</span>
                            <h6 class="fw-bold text-dark mb-1">PUTRI NURMALASARI, S.Si</h6>
                            <p class="extra-small text-muted mb-3">Kepala Urusan Perencanaan & Evaluasi Program</p>
                            <div class="mt-auto">
                                <button type="button" class="btn btn-sm btn-outline-secondary w-100 rounded-pill extra-small" onclick="openImagePreviewModal('{{ asset('images/sungaibakaukecil/aparat/putri.webp') }}', 'PUTRI NURMALASARI, S.Si', 'KAUR PERENCANAAN - Kepala Urusan Perencanaan & Evaluasi Program')">
                                    <i class="fas fa-eye me-1"></i> Lihat Foto Lengkap
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- EVA RAYANI -->
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 aparat-card-item" data-cat="kasi-kaur" data-name="eva rayani" data-role="kaur umum" data-aos="fade-left" data-aos-duration="600" data-aos-delay="150">
                    <div class="card h-100 border rounded-4 shadow-sm overflow-hidden img-hover-card bg-white text-center d-flex flex-column">
                        <div class="position-relative overflow-hidden border-bottom img-zoom-wrapper clickable-img" onclick="openImagePreviewModal('{{ asset('images/sungaibakaukecil/aparat/eva.webp') }}', 'EVA RAYANI', 'KAUR UMUM - Kepala Urusan Umum & Rumah Tangga Desa')" style="height: 270px; background-color: #f8fafc;">
                            <picture>
                                <source srcset="{{ asset('images/sungaibakaukecil/aparat/eva.avif') }}" type="image/avif">
                                <source srcset="{{ asset('images/sungaibakaukecil/aparat/eva.webp') }}" type="image/webp">
                                <img src="{{ asset('images/sungaibakaukecil/aparat/eva.webp') }}" alt="EVA RAYANI - KAUR UMUM" class="w-100 h-100 object-fit-cover" loading="lazy" decoding="async" width="450" height="580">
                            </picture>
                            <div class="zoom-overlay">
                                <i class="fas fa-search-plus"></i> Pratinjau Foto
                            </div>
                        </div>
                        <div class="p-3 d-flex flex-column flex-grow-1">
                            <span class="badge bg-primary-subtle text-primary rounded-pill px-3 py-1 extra-small align-self-center mb-2">KAUR UMUM</span>
                            <h6 class="fw-bold text-dark mb-1">EVA RAYANI</h6>
                            <p class="extra-small text-muted mb-3">Kepala Urusan Umum & Rumah Tangga Desa</p>
                            <div class="mt-auto">
                                <button type="button" class="btn btn-sm btn-outline-secondary w-100 rounded-pill extra-small" onclick="openImagePreviewModal('{{ asset('images/sungaibakaukecil/aparat/eva.webp') }}', 'EVA RAYANI', 'KAUR UMUM - Kepala Urusan Umum & Rumah Tangga Desa')">
                                    <i class="fas fa-eye me-1"></i> Lihat Foto Lengkap
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- BURHANUDIN -->
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 aparat-card-item" data-cat="kasi-kaur" data-name="burhanudin" data-role="kaur keuangan" data-aos="fade-left" data-aos-duration="600" data-aos-delay="200">
                    <div class="card h-100 border rounded-4 shadow-sm overflow-hidden img-hover-card bg-white text-center d-flex flex-column">
                        <div class="position-relative overflow-hidden border-bottom img-zoom-wrapper clickable-img" onclick="openImagePreviewModal('{{ asset('images/sungaibakaukecil/aparat/burhanudin.webp') }}', 'BURHANUDIN', 'KAUR KEUANGAN - Kepala Urusan Keuangan & Perbendaharaan Desa')" style="height: 270px; background-color: #f8fafc;">
                            <picture>
                                <source srcset="{{ asset('images/sungaibakaukecil/aparat/burhanudin.avif') }}" type="image/avif">
                                <source srcset="{{ asset('images/sungaibakaukecil/aparat/burhanudin.webp') }}" type="image/webp">
                                <img src="{{ asset('images/sungaibakaukecil/aparat/burhanudin.webp') }}" alt="BURHANUDIN - KAUR KEUANGAN" class="w-100 h-100 object-fit-cover" loading="lazy" decoding="async" width="450" height="580">
                            </picture>
                            <div class="zoom-overlay">
                                <i class="fas fa-search-plus"></i> Pratinjau Foto
                            </div>
                        </div>
                        <div class="p-3 d-flex flex-column flex-grow-1">
                            <span class="badge bg-primary-subtle text-primary rounded-pill px-3 py-1 extra-small align-self-center mb-2">KAUR KEUANGAN</span>
                            <h6 class="fw-bold text-dark mb-1">BURHANUDIN</h6>
                            <p class="extra-small text-muted mb-3">Kepala Urusan Keuangan & Perbendaharaan Desa</p>
                            <div class="mt-auto">
                                <button type="button" class="btn btn-sm btn-outline-secondary w-100 rounded-pill extra-small" onclick="openImagePreviewModal('{{ asset('images/sungaibakaukecil/aparat/burhanudin.webp') }}', 'BURHANUDIN', 'KAUR KEUANGAN - Kepala Urusan Keuangan & Perbendaharaan Desa')">
                                    <i class="fas fa-eye me-1"></i> Lihat Foto Lengkap
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- HAIRIDIANSYAH A.md -->
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 aparat-card-item" data-cat="kadus" data-name="hairidiansyah a.md" data-role="kepala dusun senggiring" data-aos="fade-left" data-aos-duration="600" data-aos-delay="50">
                    <div class="card h-100 border rounded-4 shadow-sm overflow-hidden img-hover-card bg-white text-center d-flex flex-column">
                        <div class="position-relative overflow-hidden border-bottom img-zoom-wrapper clickable-img" onclick="openImagePreviewModal('{{ asset('images/sungaibakaukecil/aparat/hairidiansyah.webp') }}', 'HAIRIDIANSYAH A.md', 'KEPALA DUSUN SENGGIRING - Kepala Dusun Senggiring (RT 001 - RT 003, RT 020)')" style="height: 270px; background-color: #f8fafc;">
                            <picture>
                                <source srcset="{{ asset('images/sungaibakaukecil/aparat/hairidiansyah.avif') }}" type="image/avif">
                                <source srcset="{{ asset('images/sungaibakaukecil/aparat/hairidiansyah.webp') }}" type="image/webp">
                                <img src="{{ asset('images/sungaibakaukecil/aparat/hairidiansyah.webp') }}" alt="HAIRIDIANSYAH A.md - KEPALA DUSUN SENGGIRING" class="w-100 h-100 object-fit-cover" loading="lazy" decoding="async" width="450" height="580">
                            </picture>
                            <div class="zoom-overlay">
                                <i class="fas fa-search-plus"></i> Pratinjau Foto
                            </div>
                        </div>
                        <div class="p-3 d-flex flex-column flex-grow-1">
                            <span class="badge bg-warning-subtle text-dark rounded-pill px-3 py-1 extra-small align-self-center mb-2">KEPALA DUSUN SENGGIRING</span>
                            <h6 class="fw-bold text-dark mb-1">HAIRIDIANSYAH A.md</h6>
                            <p class="extra-small text-muted mb-3">Kepala Dusun Senggiring (RT 001 - RT 003, RT 020)</p>
                            <div class="mt-auto">
                                <button type="button" class="btn btn-sm btn-outline-secondary w-100 rounded-pill extra-small" onclick="openImagePreviewModal('{{ asset('images/sungaibakaukecil/aparat/hairidiansyah.webp') }}', 'HAIRIDIANSYAH A.md', 'KEPALA DUSUN SENGGIRING - Kepala Dusun Senggiring (RT 001 - RT 003, RT 020)')">
                                    <i class="fas fa-eye me-1"></i> Lihat Foto Lengkap
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ZULMI ARIANSYAH S.Pd -->
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 aparat-card-item" data-cat="kadus" data-name="zulmi ariansyah s.pd" data-role="kepala dusun benteng timur" data-aos="fade-left" data-aos-duration="600" data-aos-delay="100">
                    <div class="card h-100 border rounded-4 shadow-sm overflow-hidden img-hover-card bg-white text-center d-flex flex-column">
                        <div class="position-relative overflow-hidden border-bottom img-zoom-wrapper clickable-img" onclick="openImagePreviewModal('{{ asset('images/sungaibakaukecil/aparat/zulmi.webp') }}', 'ZULMI ARIANSYAH S.Pd', 'KEPALA DUSUN BENTENG TIMUR - Kepala Dusun Benteng Timur (RT 007 - RT 009, RT 018, RT 036)')" style="height: 270px; background-color: #f8fafc;">
                            <picture>
                                <source srcset="{{ asset('images/sungaibakaukecil/aparat/zulmi.avif') }}" type="image/avif">
                                <source srcset="{{ asset('images/sungaibakaukecil/aparat/zulmi.webp') }}" type="image/webp">
                                <img src="{{ asset('images/sungaibakaukecil/aparat/zulmi.webp') }}" alt="ZULMI ARIANSYAH S.Pd - KEPALA DUSUN BENTENG TIMUR" class="w-100 h-100 object-fit-cover" loading="lazy" decoding="async" width="450" height="580">
                            </picture>
                            <div class="zoom-overlay">
                                <i class="fas fa-search-plus"></i> Pratinjau Foto
                            </div>
                        </div>
                        <div class="p-3 d-flex flex-column flex-grow-1">
                            <span class="badge bg-warning-subtle text-dark rounded-pill px-3 py-1 extra-small align-self-center mb-2">KEPALA DUSUN BENTENG TIMUR</span>
                            <h6 class="fw-bold text-dark mb-1">ZULMI ARIANSYAH S.Pd</h6>
                            <p class="extra-small text-muted mb-3">Kepala Dusun Benteng Timur (RT 007 - RT 009, RT 018, RT 036)</p>
                            <div class="mt-auto">
                                <button type="button" class="btn btn-sm btn-outline-secondary w-100 rounded-pill extra-small" onclick="openImagePreviewModal('{{ asset('images/sungaibakaukecil/aparat/zulmi.webp') }}', 'ZULMI ARIANSYAH S.Pd', 'KEPALA DUSUN BENTENG TIMUR - Kepala Dusun Benteng Timur (RT 007 - RT 009, RT 018, RT 036)')">
                                    <i class="fas fa-eye me-1"></i> Lihat Foto Lengkap
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- LILY MAULINA S.Kom -->
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 aparat-card-item" data-cat="kadus" data-name="lily maulina s.kom" data-role="kepala dusun benteng raya" data-aos="fade-left" data-aos-duration="600" data-aos-delay="150">
                    <div class="card h-100 border rounded-4 shadow-sm overflow-hidden img-hover-card bg-white text-center d-flex flex-column">
                        <div class="position-relative overflow-hidden border-bottom img-zoom-wrapper clickable-img" onclick="openImagePreviewModal('{{ asset('images/sungaibakaukecil/aparat/lily.webp') }}', 'LILY MAULINA S.Kom', 'KEPALA DUSUN BENTENG RAYA - Kepala Dusun Benteng Raya (RT 004 - RT 006, RT 031)')" style="height: 270px; background-color: #f8fafc;">
                            <picture>
                                <source srcset="{{ asset('images/sungaibakaukecil/aparat/lily.avif') }}" type="image/avif">
                                <source srcset="{{ asset('images/sungaibakaukecil/aparat/lily.webp') }}" type="image/webp">
                                <img src="{{ asset('images/sungaibakaukecil/aparat/lily.webp') }}" alt="LILY MAULINA S.Kom - KEPALA DUSUN BENTENG RAYA" class="w-100 h-100 object-fit-cover" loading="lazy" decoding="async" width="450" height="580">
                            </picture>
                            <div class="zoom-overlay">
                                <i class="fas fa-search-plus"></i> Pratinjau Foto
                            </div>
                        </div>
                        <div class="p-3 d-flex flex-column flex-grow-1">
                            <span class="badge bg-warning-subtle text-dark rounded-pill px-3 py-1 extra-small align-self-center mb-2">KEPALA DUSUN BENTENG RAYA</span>
                            <h6 class="fw-bold text-dark mb-1">LILY MAULINA S.Kom</h6>
                            <p class="extra-small text-muted mb-3">Kepala Dusun Benteng Raya (RT 004 - RT 006, RT 031)</p>
                            <div class="mt-auto">
                                <button type="button" class="btn btn-sm btn-outline-secondary w-100 rounded-pill extra-small" onclick="openImagePreviewModal('{{ asset('images/sungaibakaukecil/aparat/lily.webp') }}', 'LILY MAULINA S.Kom', 'KEPALA DUSUN BENTENG RAYA - Kepala Dusun Benteng Raya (RT 004 - RT 006, RT 031)')">
                                    <i class="fas fa-eye me-1"></i> Lihat Foto Lengkap
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ISMAIL -->
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 aparat-card-item" data-cat="kadus" data-name="ismail" data-role="kepala dusun sepakat tengah" data-aos="fade-left" data-aos-duration="600" data-aos-delay="200">
                    <div class="card h-100 border rounded-4 shadow-sm overflow-hidden img-hover-card bg-white text-center d-flex flex-column">
                        <div class="position-relative overflow-hidden border-bottom img-zoom-wrapper clickable-img" onclick="openImagePreviewModal('{{ asset('images/sungaibakaukecil/aparat/ismail.webp') }}', 'ISMAIL', 'KEPALA DUSUN SEPAKAT TENGAH - Kepala Dusun Sepakat Tengah (RT 010 - RT 014, RT 019, RT 033, RT 035)')" style="height: 270px; background-color: #f8fafc;">
                            <picture>
                                <source srcset="{{ asset('images/sungaibakaukecil/aparat/ismail.avif') }}" type="image/avif">
                                <source srcset="{{ asset('images/sungaibakaukecil/aparat/ismail.webp') }}" type="image/webp">
                                <img src="{{ asset('images/sungaibakaukecil/aparat/ismail.webp') }}" alt="ISMAIL - KEPALA DUSUN SEPAKAT TENGAH" class="w-100 h-100 object-fit-cover" loading="lazy" decoding="async" width="450" height="580">
                            </picture>
                            <div class="zoom-overlay">
                                <i class="fas fa-search-plus"></i> Pratinjau Foto
                            </div>
                        </div>
                        <div class="p-3 d-flex flex-column flex-grow-1">
                            <span class="badge bg-warning-subtle text-dark rounded-pill px-3 py-1 extra-small align-self-center mb-2">KEPALA DUSUN SEPAKAT TENGAH</span>
                            <h6 class="fw-bold text-dark mb-1">ISMAIL</h6>
                            <p class="extra-small text-muted mb-3">Kepala Dusun Sepakat Tengah (RT 010 - RT 014, RT 019, RT 033, RT 035)</p>
                            <div class="mt-auto">
                                <button type="button" class="btn btn-sm btn-outline-secondary w-100 rounded-pill extra-small" onclick="openImagePreviewModal('{{ asset('images/sungaibakaukecil/aparat/ismail.webp') }}', 'ISMAIL', 'KEPALA DUSUN SEPAKAT TENGAH - Kepala Dusun Sepakat Tengah (RT 010 - RT 014, RT 019, RT 033, RT 035)')">
                                    <i class="fas fa-eye me-1"></i> Lihat Foto Lengkap
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- KHOLIS -->
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 aparat-card-item" data-cat="kadus" data-name="kholis" data-role="kepala dusun sepakat darat" data-aos="fade-left" data-aos-duration="600" data-aos-delay="50">
                    <div class="card h-100 border rounded-4 shadow-sm overflow-hidden img-hover-card bg-white text-center d-flex flex-column">
                        <div class="position-relative overflow-hidden border-bottom img-zoom-wrapper clickable-img" onclick="openImagePreviewModal('{{ asset('images/sungaibakaukecil/aparat/kholis.webp') }}', 'KHOLIS', 'KEPALA DUSUN SEPAKAT DARAT - Kepala Dusun Sepakat Darat (RT 015 - RT 017, RT 030, RT 034, RT 037)')" style="height: 270px; background-color: #f8fafc;">
                            <picture>
                                <source srcset="{{ asset('images/sungaibakaukecil/aparat/kholis.avif') }}" type="image/avif">
                                <source srcset="{{ asset('images/sungaibakaukecil/aparat/kholis.webp') }}" type="image/webp">
                                <img src="{{ asset('images/sungaibakaukecil/aparat/kholis.webp') }}" alt="KHOLIS - KEPALA DUSUN SEPAKAT DARAT" class="w-100 h-100 object-fit-cover" loading="lazy" decoding="async" width="450" height="580">
                            </picture>
                            <div class="zoom-overlay">
                                <i class="fas fa-search-plus"></i> Pratinjau Foto
                            </div>
                        </div>
                        <div class="p-3 d-flex flex-column flex-grow-1">
                            <span class="badge bg-warning-subtle text-dark rounded-pill px-3 py-1 extra-small align-self-center mb-2">KEPALA DUSUN SEPAKAT DARAT</span>
                            <h6 class="fw-bold text-dark mb-1">KHOLIS</h6>
                            <p class="extra-small text-muted mb-3">Kepala Dusun Sepakat Darat (RT 015 - RT 017, RT 030, RT 034, RT 037)</p>
                            <div class="mt-auto">
                                <button type="button" class="btn btn-sm btn-outline-secondary w-100 rounded-pill extra-small" onclick="openImagePreviewModal('{{ asset('images/sungaibakaukecil/aparat/kholis.webp') }}', 'KHOLIS', 'KEPALA DUSUN SEPAKAT DARAT - Kepala Dusun Sepakat Darat (RT 015 - RT 017, RT 030, RT 034, RT 037)')">
                                    <i class="fas fa-eye me-1"></i> Lihat Foto Lengkap
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- A. RANI BAHARI -->
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 aparat-card-item" data-cat="kadus" data-name="a. rani bahari" data-role="kepala dusun kedaung" data-aos="fade-left" data-aos-duration="600" data-aos-delay="100">
                    <div class="card h-100 border rounded-4 shadow-sm overflow-hidden img-hover-card bg-white text-center d-flex flex-column">
                        <div class="position-relative overflow-hidden border-bottom img-zoom-wrapper clickable-img" onclick="openImagePreviewModal('{{ asset('images/sungaibakaukecil/aparat/rani.webp') }}', 'A. RANI BAHARI', 'KEPALA DUSUN KEDAUNG - Kepala Dusun Kedaung (RT 021 - RT 023)')" style="height: 270px; background-color: #f8fafc;">
                            <picture>
                                <source srcset="{{ asset('images/sungaibakaukecil/aparat/rani.avif') }}" type="image/avif">
                                <source srcset="{{ asset('images/sungaibakaukecil/aparat/rani.webp') }}" type="image/webp">
                                <img src="{{ asset('images/sungaibakaukecil/aparat/rani.webp') }}" alt="A. RANI BAHARI - KEPALA DUSUN KEDAUNG" class="w-100 h-100 object-fit-cover" loading="lazy" decoding="async" width="450" height="580">
                            </picture>
                            <div class="zoom-overlay">
                                <i class="fas fa-search-plus"></i> Pratinjau Foto
                            </div>
                        </div>
                        <div class="p-3 d-flex flex-column flex-grow-1">
                            <span class="badge bg-warning-subtle text-dark rounded-pill px-3 py-1 extra-small align-self-center mb-2">KEPALA DUSUN KEDAUNG</span>
                            <h6 class="fw-bold text-dark mb-1">A. RANI BAHARI</h6>
                            <p class="extra-small text-muted mb-3">Kepala Dusun Kedaung (RT 021 - RT 023)</p>
                            <div class="mt-auto">
                                <button type="button" class="btn btn-sm btn-outline-secondary w-100 rounded-pill extra-small" onclick="openImagePreviewModal('{{ asset('images/sungaibakaukecil/aparat/rani.webp') }}', 'A. RANI BAHARI', 'KEPALA DUSUN KEDAUNG - Kepala Dusun Kedaung (RT 021 - RT 023)')">
                                    <i class="fas fa-eye me-1"></i> Lihat Foto Lengkap
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- HAIDIN -->
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 aparat-card-item" data-cat="kadus" data-name="haidin" data-role="kepala dusun senambang" data-aos="fade-left" data-aos-duration="600" data-aos-delay="150">
                    <div class="card h-100 border rounded-4 shadow-sm overflow-hidden img-hover-card bg-white text-center d-flex flex-column">
                        <div class="position-relative overflow-hidden border-bottom img-zoom-wrapper clickable-img" onclick="openImagePreviewModal('{{ asset('images/sungaibakaukecil/aparat/haidin.webp') }}', 'HAIDIN', 'KEPALA DUSUN SENAMBANG - Kepala Dusun Senambang (RT 024 - RT 026, RT 032)')" style="height: 270px; background-color: #f8fafc;">
                            <picture>
                                <source srcset="{{ asset('images/sungaibakaukecil/aparat/haidin.avif') }}" type="image/avif">
                                <source srcset="{{ asset('images/sungaibakaukecil/aparat/haidin.webp') }}" type="image/webp">
                                <img src="{{ asset('images/sungaibakaukecil/aparat/haidin.webp') }}" alt="HAIDIN - KEPALA DUSUN SENAMBANG" class="w-100 h-100 object-fit-cover" loading="lazy" decoding="async" width="450" height="580">
                            </picture>
                            <div class="zoom-overlay">
                                <i class="fas fa-search-plus"></i> Pratinjau Foto
                            </div>
                        </div>
                        <div class="p-3 d-flex flex-column flex-grow-1">
                            <span class="badge bg-warning-subtle text-dark rounded-pill px-3 py-1 extra-small align-self-center mb-2">KEPALA DUSUN SENAMBANG</span>
                            <h6 class="fw-bold text-dark mb-1">HAIDIN</h6>
                            <p class="extra-small text-muted mb-3">Kepala Dusun Senambang (RT 024 - RT 026, RT 032)</p>
                            <div class="mt-auto">
                                <button type="button" class="btn btn-sm btn-outline-secondary w-100 rounded-pill extra-small" onclick="openImagePreviewModal('{{ asset('images/sungaibakaukecil/aparat/haidin.webp') }}', 'HAIDIN', 'KEPALA DUSUN SENAMBANG - Kepala Dusun Senambang (RT 024 - RT 026, RT 032)')">
                                    <i class="fas fa-eye me-1"></i> Lihat Foto Lengkap
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- SAMURI -->
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 aparat-card-item" data-cat="kadus" data-name="samuri" data-role="kepala dusun konsasi" data-aos="fade-left" data-aos-duration="600" data-aos-delay="200">
                    <div class="card h-100 border rounded-4 shadow-sm overflow-hidden img-hover-card bg-white text-center d-flex flex-column">
                        <div class="position-relative overflow-hidden border-bottom img-zoom-wrapper clickable-img" onclick="openImagePreviewModal('{{ asset('images/sungaibakaukecil/aparat/samuri.webp') }}', 'SAMURI', 'KEPALA DUSUN KONSASI - Kepala Dusun Konsasi (RT 027 - RT 029)')" style="height: 270px; background-color: #f8fafc;">
                            <picture>
                                <source srcset="{{ asset('images/sungaibakaukecil/aparat/samuri.avif') }}" type="image/avif">
                                <source srcset="{{ asset('images/sungaibakaukecil/aparat/samuri.webp') }}" type="image/webp">
                                <img src="{{ asset('images/sungaibakaukecil/aparat/samuri.webp') }}" alt="SAMURI - KEPALA DUSUN KONSASI" class="w-100 h-100 object-fit-cover" loading="lazy" decoding="async" width="450" height="580">
                            </picture>
                            <div class="zoom-overlay">
                                <i class="fas fa-search-plus"></i> Pratinjau Foto
                            </div>
                        </div>
                        <div class="p-3 d-flex flex-column flex-grow-1">
                            <span class="badge bg-warning-subtle text-dark rounded-pill px-3 py-1 extra-small align-self-center mb-2">KEPALA DUSUN KONSASI</span>
                            <h6 class="fw-bold text-dark mb-1">SAMURI</h6>
                            <p class="extra-small text-muted mb-3">Kepala Dusun Konsasi (RT 027 - RT 029)</p>
                            <div class="mt-auto">
                                <button type="button" class="btn btn-sm btn-outline-secondary w-100 rounded-pill extra-small" onclick="openImagePreviewModal('{{ asset('images/sungaibakaukecil/aparat/samuri.webp') }}', 'SAMURI', 'KEPALA DUSUN KONSASI - Kepala Dusun Konsasi (RT 027 - RT 029)')">
                                    <i class="fas fa-eye me-1"></i> Lihat Foto Lengkap
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- FITRIANI -->
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 aparat-card-item" data-cat="staf" data-name="fitriani" data-role="staf tata usaha & umum" data-aos="fade-left" data-aos-duration="600" data-aos-delay="50">
                    <div class="card h-100 border rounded-4 shadow-sm overflow-hidden img-hover-card bg-white text-center d-flex flex-column">
                        <div class="position-relative overflow-hidden border-bottom img-zoom-wrapper clickable-img" onclick="openImagePreviewModal('{{ asset('images/sungaibakaukecil/aparat/fitriani.webp') }}', 'FITRIANI', 'STAF TATA USAHA & UMUM - Staf Pelaksana Urusan Tata Usaha & Administrasi Umum')" style="height: 270px; background-color: #f8fafc;">
                            <picture>
                                <source srcset="{{ asset('images/sungaibakaukecil/aparat/fitriani.avif') }}" type="image/avif">
                                <source srcset="{{ asset('images/sungaibakaukecil/aparat/fitriani.webp') }}" type="image/webp">
                                <img src="{{ asset('images/sungaibakaukecil/aparat/fitriani.webp') }}" alt="FITRIANI - STAF TATA USAHA & UMUM" class="w-100 h-100 object-fit-cover" loading="lazy" decoding="async" width="450" height="580">
                            </picture>
                            <div class="zoom-overlay">
                                <i class="fas fa-search-plus"></i> Pratinjau Foto
                            </div>
                        </div>
                        <div class="p-3 d-flex flex-column flex-grow-1">
                            <span class="badge bg-secondary-subtle text-dark rounded-pill px-3 py-1 extra-small align-self-center mb-2">STAF TATA USAHA & UMUM</span>
                            <h6 class="fw-bold text-dark mb-1">FITRIANI</h6>
                            <p class="extra-small text-muted mb-3">Staf Pelaksana Urusan Tata Usaha & Administrasi Umum</p>
                            <div class="mt-auto">
                                <button type="button" class="btn btn-sm btn-outline-secondary w-100 rounded-pill extra-small" onclick="openImagePreviewModal('{{ asset('images/sungaibakaukecil/aparat/fitriani.webp') }}', 'FITRIANI', 'STAF TATA USAHA & UMUM - Staf Pelaksana Urusan Tata Usaha & Administrasi Umum')">
                                    <i class="fas fa-eye me-1"></i> Lihat Foto Lengkap
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ZAINUDDIN -->
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 aparat-card-item" data-cat="staf" data-name="zainuddin" data-role="staf kasi pelayanan" data-aos="fade-left" data-aos-duration="600" data-aos-delay="100">
                    <div class="card h-100 border rounded-4 shadow-sm overflow-hidden img-hover-card bg-white text-center d-flex flex-column">
                        <div class="position-relative overflow-hidden border-bottom img-zoom-wrapper clickable-img" onclick="openImagePreviewModal('{{ asset('images/sungaibakaukecil/aparat/zainuddin.webp') }}', 'ZAINUDDIN', 'STAF KASI PELAYANAN - Staf Pelaksana Seksi Pelayanan Masyarakat')" style="height: 270px; background-color: #f8fafc;">
                            <picture>
                                <source srcset="{{ asset('images/sungaibakaukecil/aparat/zainuddin.avif') }}" type="image/avif">
                                <source srcset="{{ asset('images/sungaibakaukecil/aparat/zainuddin.webp') }}" type="image/webp">
                                <img src="{{ asset('images/sungaibakaukecil/aparat/zainuddin.webp') }}" alt="ZAINUDDIN - STAF KASI PELAYANAN" class="w-100 h-100 object-fit-cover" loading="lazy" decoding="async" width="450" height="580">
                            </picture>
                            <div class="zoom-overlay">
                                <i class="fas fa-search-plus"></i> Pratinjau Foto
                            </div>
                        </div>
                        <div class="p-3 d-flex flex-column flex-grow-1">
                            <span class="badge bg-secondary-subtle text-dark rounded-pill px-3 py-1 extra-small align-self-center mb-2">STAF KASI PELAYANAN</span>
                            <h6 class="fw-bold text-dark mb-1">ZAINUDDIN</h6>
                            <p class="extra-small text-muted mb-3">Staf Pelaksana Seksi Pelayanan Masyarakat</p>
                            <div class="mt-auto">
                                <button type="button" class="btn btn-sm btn-outline-secondary w-100 rounded-pill extra-small" onclick="openImagePreviewModal('{{ asset('images/sungaibakaukecil/aparat/zainuddin.webp') }}', 'ZAINUDDIN', 'STAF KASI PELAYANAN - Staf Pelaksana Seksi Pelayanan Masyarakat')">
                                    <i class="fas fa-eye me-1"></i> Lihat Foto Lengkap
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- HIKMATUN -->
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 aparat-card-item" data-cat="staf" data-name="hikmatun" data-role="staf kaur keuangan" data-aos="fade-left" data-aos-duration="600" data-aos-delay="150">
                    <div class="card h-100 border rounded-4 shadow-sm overflow-hidden img-hover-card bg-white text-center d-flex flex-column">
                        <div class="position-relative overflow-hidden border-bottom img-zoom-wrapper clickable-img" onclick="openImagePreviewModal('{{ asset('images/sungaibakaukecil/aparat/hikmatun.webp') }}', 'HIKMATUN', 'STAF KAUR KEUANGAN - Staf Pelaksana Urusan Keuangan & Kas Desa')" style="height: 270px; background-color: #f8fafc;">
                            <picture>
                                <source srcset="{{ asset('images/sungaibakaukecil/aparat/hikmatun.avif') }}" type="image/avif">
                                <source srcset="{{ asset('images/sungaibakaukecil/aparat/hikmatun.webp') }}" type="image/webp">
                                <img src="{{ asset('images/sungaibakaukecil/aparat/hikmatun.webp') }}" alt="HIKMATUN - STAF KAUR KEUANGAN" class="w-100 h-100 object-fit-cover" loading="lazy" decoding="async" width="450" height="580">
                            </picture>
                            <div class="zoom-overlay">
                                <i class="fas fa-search-plus"></i> Pratinjau Foto
                            </div>
                        </div>
                        <div class="p-3 d-flex flex-column flex-grow-1">
                            <span class="badge bg-secondary-subtle text-dark rounded-pill px-3 py-1 extra-small align-self-center mb-2">STAF KAUR KEUANGAN</span>
                            <h6 class="fw-bold text-dark mb-1">HIKMATUN</h6>
                            <p class="extra-small text-muted mb-3">Staf Pelaksana Urusan Keuangan & Kas Desa</p>
                            <div class="mt-auto">
                                <button type="button" class="btn btn-sm btn-outline-secondary w-100 rounded-pill extra-small" onclick="openImagePreviewModal('{{ asset('images/sungaibakaukecil/aparat/hikmatun.webp') }}', 'HIKMATUN', 'STAF KAUR KEUANGAN - Staf Pelaksana Urusan Keuangan & Kas Desa')">
                                    <i class="fas fa-eye me-1"></i> Lihat Foto Lengkap
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- SAHRUL ROZI -->
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 aparat-card-item" data-cat="staf" data-name="sahrul rozi" data-role="staf pbb kasi pemerintahan" data-aos="fade-left" data-aos-duration="600" data-aos-delay="200">
                    <div class="card h-100 border rounded-4 shadow-sm overflow-hidden img-hover-card bg-white text-center d-flex flex-column">
                        <div class="position-relative overflow-hidden border-bottom img-zoom-wrapper clickable-img" onclick="openImagePreviewModal('{{ asset('images/sungaibakaukecil/aparat/sahrul.webp') }}', 'SAHRUL ROZI', 'STAF PBB KASI PEMERINTAHAN - Staf Pelaksana PBB & Pendataan Seksi Pemerintahan')" style="height: 270px; background-color: #f8fafc;">
                            <picture>
                                <source srcset="{{ asset('images/sungaibakaukecil/aparat/sahrul.avif') }}" type="image/avif">
                                <source srcset="{{ asset('images/sungaibakaukecil/aparat/sahrul.webp') }}" type="image/webp">
                                <img src="{{ asset('images/sungaibakaukecil/aparat/sahrul.webp') }}" alt="SAHRUL ROZI - STAF PBB KASI PEMERINTAHAN" class="w-100 h-100 object-fit-cover" loading="lazy" decoding="async" width="450" height="580">
                            </picture>
                            <div class="zoom-overlay">
                                <i class="fas fa-search-plus"></i> Pratinjau Foto
                            </div>
                        </div>
                        <div class="p-3 d-flex flex-column flex-grow-1">
                            <span class="badge bg-secondary-subtle text-dark rounded-pill px-3 py-1 extra-small align-self-center mb-2">STAF PBB KASI PEMERINTAHAN</span>
                            <h6 class="fw-bold text-dark mb-1">SAHRUL ROZI</h6>
                            <p class="extra-small text-muted mb-3">Staf Pelaksana PBB & Pendataan Seksi Pemerintahan</p>
                            <div class="mt-auto">
                                <button type="button" class="btn btn-sm btn-outline-secondary w-100 rounded-pill extra-small" onclick="openImagePreviewModal('{{ asset('images/sungaibakaukecil/aparat/sahrul.webp') }}', 'SAHRUL ROZI', 'STAF PBB KASI PEMERINTAHAN - Staf Pelaksana PBB & Pendataan Seksi Pemerintahan')">
                                    <i class="fas fa-eye me-1"></i> Lihat Foto Lengkap
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div id="no-aparat-found" class="text-center py-5 d-none">
                <i class="fas fa-user-slash fa-3x text-muted mb-3"></i>
                <h6 class="text-muted fw-bold">Tidak ada aparatur yang cocok dengan pencarian</h6>
            </div>
        </div>

    </main>

    <!-- Modal Metadata SDI Desa Cantik 2026 (MS-Kegiatan, MS-Variabel, MS-Indikator) -->
    <div class="modal fade" id="modalMetadataSDI" tabindex="-1" aria-labelledby="modalMetadataSDILabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl modal-dialog-scrollable">
            <div class="modal-content rounded-4 border-0 shadow">
                <div class="modal-header border-bottom bg-light px-4 py-3">
                    <div>
                        <span class="badge bg-primary rounded-pill px-3 py-1 extra-small mb-1">Satu Data Indonesia (SDI)</span>
                        <h5 class="modal-title fw-bold text-dark fs-5" id="modalMetadataSDILabel">
                            <i class="fas fa-database text-primary me-2"></i>Metadata Statistik Sektoral Desa Sungai Bakau Kecil 2026
                        </h5>
                        <p class="text-muted extra-small mb-0">Dokumen standardisasi penyelenggaraan statistik sektoral sesuai kaidah Satu Data Indonesia &amp; BPS.</p>
                    </div>
                    <div class="d-flex align-items-center gap-2">
                        <a href="https://drive.google.com/file/d/1AS3gtBHXqqZv0K-rglbR5aHlAg1Y8FD4/view?usp=sharing" target="_blank" rel="noopener noreferrer" class="btn btn-sm btn-success rounded-pill px-3 fw-bold shadow-sm d-none d-sm-inline-flex align-items-center">
                            <i class="fas fa-file-pdf me-1"></i> Unduh PDF Resmi
                        </a>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                    </div>
                </div>
                <div class="modal-body p-4">
                    <!-- Nav Tabs for Metadata Types -->
                    <ul class="nav nav-tabs nav-fill mb-3" id="metaTabs" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active fw-bold small" id="meta-kegiatan-tab" data-bs-toggle="tab" data-bs-target="#meta-kegiatan" type="button" role="tab"><i class="fas fa-clipboard-list me-1 text-primary"></i> I. MS-Kegiatan</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link fw-bold small" id="meta-variabel-tab" data-bs-toggle="tab" data-bs-target="#meta-variabel" type="button" role="tab"><i class="fas fa-table me-1 text-info"></i> II. MS-Variabel (26 RT &amp; 15 Fasilitas)</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link fw-bold small" id="meta-indikator-tab" data-bs-toggle="tab" data-bs-target="#meta-indikator" type="button" role="tab"><i class="fas fa-chart-line me-1 text-success"></i> III. MS-Indikator (8 Dimensi)</button>
                        </li>
                    </ul>
                    <div class="tab-content" id="metaTabsContent">
                        
                        <!-- TAB 1: MS-KEGIATAN -->
                        <div class="tab-pane fade show active" id="meta-kegiatan" role="tabpanel">
                            <div class="table-responsive border rounded-3">
                                <table class="table table-hover table-striped align-middle mb-0 small">
                                    <thead class="table-light">
                                        <tr>
                                            <th style="width: 5%;">No</th>
                                            <th style="width: 30%;">Elemen Metadata Kegiatan</th>
                                            <th style="width: 65%;">Keterangan / Nilai Spesifikasi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr><td class="fw-bold text-center">1</td><td class="fw-semibold">Nama Kegiatan</td><td>Pendataan Potensi Kewilayahan Rukun Tetangga (RT) dan Inventarisasi Fasilitas Umum Desa Cantik Sungai Bakau Kecil 2026</td></tr>
                                        <tr><td class="fw-bold text-center">2</td><td class="fw-semibold">Instansi Penyelenggara</td><td>Pemerintah Desa Sungai Bakau Kecil bekerjasama dengan BPS Kabupaten Mempawah</td></tr>
                                        <tr><td class="fw-bold text-center">3</td><td class="fw-semibold">Jenis Kegiatan</td><td>Pendataan Langsung (Survei Sektoral CAPI)</td></tr>
                                        <tr><td class="fw-bold text-center">4</td><td class="fw-semibold">Tujuan Kegiatan</td><td>Memetakan kondisi sosial-ekonomi penduduk di tingkat RT serta kelayakan sarana prasarana desa untuk mendukung kebijakan pembangunan berbasis bukti (evidence-based policy).</td></tr>
                                        <tr><td class="fw-bold text-center">5</td><td class="fw-semibold">Cara Pengumpulan Data</td><td>Wawancara langsung dengan Ketua RT (Agregat RT) dan observasi lapangan titik koordinat fasilitas desa menggunakan CAPI AppSheet.</td></tr>
                                        <tr><td class="fw-bold text-center">6</td><td class="fw-semibold">Cakupan Wilayah</td><td>Seluruh wilayah Desa Sungai Bakau Kecil (Kec. Mempawah Timur, Kab. Mempawah) mencakup 37 Rukun Tetangga (RT) dan 8 Dusun.</td></tr>
                                        <tr><td class="fw-bold text-center">7</td><td class="fw-semibold">Unit Pengamatan</td><td>Rukun Tetangga (RT) dan Sarana Prasarana (Fasilitas Umum Desa)</td></tr>
                                        <tr><td class="fw-bold text-center">8</td><td class="fw-semibold">Frekuensi Kegiatan</td><td>Tahunan (Annual / Pemutakhiran Berkala)</td></tr>
                                        <tr><td class="fw-bold text-center">9</td><td class="fw-semibold">Waktu Pelaksanaan</td><td>Juni - Juli 2026 (Pengumpulan Lapangan), Agustus 2026 (Pengolahan, Diseminasi &amp; Integrasi Web)</td></tr>
                                        <tr><td class="fw-bold text-center">10</td><td class="fw-semibold">Media Rilis</td><td>Portal Web Desa Cantik Sungai Bakau Kecil &amp; Publikasi Desa Sungai Bakau Kecil Dalam Angka 2026</td></tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <!-- TAB 2: MS-VARIABEL -->
                        <div class="tab-pane fade" id="meta-variabel" role="tabpanel">
                            <h6 class="fw-bold text-dark mb-2 small"><i class="fas fa-list-ol text-info me-1"></i> A. Tabel Variabel Tingkat Rukun Tetangga (26 Variabel `Appsheet_RT`)</h6>
                            <div class="table-responsive border rounded-3 mb-4" style="max-height: 300px;">
                                <table class="table table-hover table-striped align-middle mb-0 extra-small">
                                    <thead class="table-light sticky-top">
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Variabel</th>
                                            <th>Konsep</th>
                                            <th>Definisi Operasional</th>
                                            <th>Satuan</th>
                                            <th>Tipe Data</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr><td>1</td><td><code>Nama_RT</code></td><td>Wilayah</td><td>Nama rukun tetangga tempat pengumpulan CAPI dilakukan</td><td>-</td><td>String</td></tr>
                                        <tr><td>2</td><td><code>Nama_Petugas</code></td><td>Petugas</td><td>Nama agen statistik desa yang menginput data</td><td>-</td><td>String</td></tr>
                                        <tr><td>3</td><td><code>Tanggal_Waktu</code></td><td>Waktu</td><td>Tanggal dan waktu pencacahan dilakukan</td><td>-</td><td>DateTime</td></tr>
                                        <tr><td>4</td><td><code>Nama_Ketua_RT</code></td><td>Narasumber</td><td>Nama Ketua RT aktif yang diwawancarai</td><td>-</td><td>String</td></tr>
                                        <tr><td>5</td><td><code>Jumlah_Penduduk_Laki_Laki</code></td><td>Demografi</td><td>Jumlah penduduk berjenis kelamin laki-laki di RT</td><td>Orang</td><td>Integer</td></tr>
                                        <tr><td>6</td><td><code>Jumlah_Penduduk_Perempuan</code></td><td>Demografi</td><td>Jumlah penduduk berjenis kelamin perempuan di RT</td><td>Orang</td><td>Integer</td></tr>
                                        <tr><td>7</td><td><code>Jumlah_Bumbung_Rumah</code></td><td>Fisik</td><td>Jumlah atap/bangunan fisik tempat tinggal di RT</td><td>Unit</td><td>Integer</td></tr>
                                        <tr><td>8</td><td><code>Jumlah_KK</code></td><td>Keluarga</td><td>Jumlah kepala keluarga di RT</td><td>KK</td><td>Integer</td></tr>
                                        <tr><td>9</td><td><code>Jumlah_Penduduk_Lansia</code></td><td>Rentan</td><td>Jumlah penduduk berusia 60 tahun ke atas di RT</td><td>Orang</td><td>Integer</td></tr>
                                        <tr><td>10</td><td><code>Jumlah_Kelahiran_Bayi</code></td><td>Kelahiran</td><td>Jumlah bayi lahir hidup dalam 1 tahun terakhir</td><td>Bayi</td><td>Integer</td></tr>
                                        <tr><td>11</td><td><code>Jumlah_Kematian</code></td><td>Kematian</td><td>Jumlah kematian penduduk dalam 1 tahun terakhir</td><td>Orang</td><td>Integer</td></tr>
                                        <tr><td>12</td><td><code>Jumlah_Penerima_PKH</code></td><td>Bansos</td><td>Jumlah penduduk/keluarga penerima Program Keluarga Harapan</td><td>Orang</td><td>Integer</td></tr>
                                        <tr><td>13</td><td><code>Jumlah_Penerima_BPNT</code></td><td>Bansos</td><td>Jumlah penerima Bantuan Pangan Non Tunai</td><td>Orang</td><td>Integer</td></tr>
                                        <tr><td>14</td><td><code>Jumlah_Penerima_BST</code></td><td>Bansos</td><td>Jumlah penerima Bantuan Sosial Tunai</td><td>Orang</td><td>Integer</td></tr>
                                        <tr><td>15</td><td><code>Jumlah_Penerima_BLT</code></td><td>Bansos</td><td>Jumlah penerima Bantuan Langsung Tunai Dana Desa</td><td>Orang</td><td>Integer</td></tr>
                                        <tr><td>16</td><td><code>Jumlah_Memiliki_KTP</code></td><td>Adminduk</td><td>Jumlah penduduk wajib KTP yang sudah memiliki KTP-el</td><td>Orang</td><td>Integer</td></tr>
                                        <tr><td>17</td><td><code>Jumlah_Sekolah_TK</code></td><td>Pendidikan</td><td>Jumlah penduduk sedang menempuh jenjang TK/PAUD</td><td>Orang</td><td>Integer</td></tr>
                                        <tr><td>18</td><td><code>Jumlah_Sekolah_SD</code></td><td>Pendidikan</td><td>Jumlah penduduk sedang menempuh jenjang SD/MI</td><td>Orang</td><td>Integer</td></tr>
                                        <tr><td>19</td><td><code>Jumlah_Sekolah_SMP</code></td><td>Pendidikan</td><td>Jumlah penduduk sedang menempuh jenjang SMP/MTs</td><td>Orang</td><td>Integer</td></tr>
                                        <tr><td>20</td><td><code>Jumlah_Sekolah_SMA</code></td><td>Pendidikan</td><td>Jumlah penduduk sedang menempuh jenjang SMA/SMK/MA</td><td>Orang</td><td>Integer</td></tr>
                                        <tr><td>21</td><td><code>Jumlah_Sekolah_Sarjana</code></td><td>Pendidikan</td><td>Jumlah penduduk lulusan Diploma/Sarjana/Pascasarjana</td><td>Orang</td><td>Integer</td></tr>
                                        <tr><td>22</td><td><code>Jumlah_Penduduk_Putus_Sekolah</code></td><td>Pendidikan</td><td>Jumlah anak usia sekolah (7-18 tahun) yang tidak bersekolah</td><td>Orang</td><td>Integer</td></tr>
                                        <tr><td>23</td><td><code>Jumlah_Anak_Usia_0_1_Tahun</code></td><td>Balita</td><td>Jumlah anak berusia di bawah 1 tahun</td><td>Anak</td><td>Integer</td></tr>
                                        <tr><td>24</td><td><code>Jumlah_Anak_Usia_2_5_Tahun</code></td><td>Balita</td><td>Jumlah anak berusia antara 2 s.d. 5 tahun</td><td>Anak</td><td>Integer</td></tr>
                                        <tr><td>25</td><td><code>Jumlah_Pendatang</code></td><td>Migrasi</td><td>Jumlah penduduk baru pindah masuk ke RT</td><td>Orang</td><td>Integer</td></tr>
                                        <tr><td>26</td><td><code>Status_Pendataan</code></td><td>Metodologi</td><td>Status kelengkapan pencacahan CAPI</td><td>-</td><td>String</td></tr>
                                    </tbody>
                                </table>
                            </div>

                            <h6 class="fw-bold text-dark mb-2 small"><i class="fas fa-map-location-dot text-info me-1"></i> B. Tabel Variabel Fasilitas Umum (15 Variabel `Appsheet_Fasilitas`)</h6>
                            <div class="table-responsive border rounded-3" style="max-height: 250px;">
                                <table class="table table-hover table-striped align-middle mb-0 extra-small">
                                    <thead class="table-light sticky-top">
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Variabel</th>
                                            <th>Konsep</th>
                                            <th>Definisi Operasional</th>
                                            <th>Satuan / Tipe</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr><td>1</td><td><code>ID_Fasilitas</code></td><td>Identitas</td><td>Kode unik sarana prasarana</td><td>String Alfanumerik</td></tr>
                                        <tr><td>2</td><td><code>Nama_Petugas</code></td><td>Petugas</td><td>Nama agen statistik penginput</td><td>String</td></tr>
                                        <tr><td>3</td><td><code>Tanggal_Waktu</code></td><td>Waktu</td><td>Waktu observasi koordinat lapangan</td><td>DateTime</td></tr>
                                        <tr><td>4</td><td><code>Lokasi_GPS</code></td><td>Geospasial</td><td>Titik koordinat latitude dan longitude GPS</td><td>String Geografis</td></tr>
                                        <tr><td>5</td><td><code>Foto_Fasilitas</code></td><td>Dokumentasi</td><td>Lampiran foto kondisi bangunan sarana</td><td>Image URL</td></tr>
                                        <tr><td>6</td><td><code>RT</code></td><td>Wilayah</td><td>RT lokasi fasilitas berada</td><td>String</td></tr>
                                        <tr><td>7</td><td><code>Nama_Fasilitas</code></td><td>Nama</td><td>Nama resmi sarana fasilitas publik</td><td>String</td></tr>
                                        <tr><td>8</td><td><code>Kategori_Fasilitas</code></td><td>Kategori</td><td>Ibadah, Pendidikan, Kesehatan, Pemerintahan</td><td>String</td></tr>
                                        <tr><td>9</td><td><code>Sub_Kategori</code></td><td>Sub-Kategori</td><td>Masjid, Surau, SD, SMP, Posyandu, Kantor Desa</td><td>String</td></tr>
                                        <tr><td>10</td><td><code>Kondisi_Bangunan</code></td><td>Kelayakan</td><td>Baik, Rusak Ringan, Rusak Berat</td><td>String</td></tr>
                                        <tr><td>11</td><td><code>Sumber_Listrik</code></td><td>Utilitas</td><td>PLN 24 Jam, Non-PLN, dsb.</td><td>String</td></tr>
                                        <tr><td>12</td><td><code>Sumber_Air_Bersih</code></td><td>Utilitas</td><td>PDAM, Sumur Bor, Mata Air</td><td>String</td></tr>
                                        <tr><td>13</td><td><code>Akses_Jalan</code></td><td>Infrastruktur</td><td>Aspal/Beton (Roda 4), Jalan Tanah, dsb.</td><td>String</td></tr>
                                        <tr><td>14</td><td><code>Sinyal_Seluler</code></td><td>Telekomunikasi</td><td>Sangat Baik (4G/LTE), Cukup (3G), Lemah</td><td>String</td></tr>
                                        <tr><td>15</td><td><code>Catatan</code></td><td>Keterangan</td><td>Catatan temuan khusus petugas</td><td>String</td></tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <!-- TAB 3: MS-INDIKATOR -->
                        <div class="tab-pane fade" id="meta-indikator" role="tabpanel">
                            <div class="table-responsive border rounded-3">
                                <table class="table table-hover table-striped align-middle mb-0 small">
                                    <thead class="table-light">
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Indikator SDI</th>
                                            <th>Definisi Konsep</th>
                                            <th>Rumus / Formula Kalkulasi</th>
                                            <th>Satuan</th>
                                            <th>Nilai Aktual SBK 2026</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="fw-bold text-center">1</td>
                                            <td class="fw-semibold">Rasio Jenis Kelamin (Sex Ratio)</td>
                                            <td>Perbandingan jumlah penduduk laki-laki dengan 100 penduduk perempuan di desa.</td>
                                            <td><code>(L / P) &times; 100</code></td>
                                            <td>Poin</td>
                                            <td><span class="badge bg-primary rounded-pill">104,49</span></td>
                                        </tr>
                                        <tr>
                                            <td class="fw-bold text-center">2</td>
                                            <td class="fw-semibold">Rata-rata Anggota RT (ART)</td>
                                            <td>Rata-rata banyaknya anggota keluarga yang mendiami satu rumah tangga / KK.</td>
                                            <td><code>(L + P) / Total KK</code></td>
                                            <td>Jiwa/KK</td>
                                            <td><span class="badge bg-success rounded-pill">3,46</span></td>
                                        </tr>
                                        <tr>
                                            <td class="fw-bold text-center">3</td>
                                            <td class="fw-semibold">Persentase Penduduk Lansia</td>
                                            <td>Proporsi jumlah lansia (60+ tahun) terhadap total penduduk desa.</td>
                                            <td><code>(Lansia / Total Penduduk) &times; 100%</code></td>
                                            <td>Persen</td>
                                            <td><span class="badge bg-info text-dark rounded-pill">7,80%</span></td>
                                        </tr>
                                        <tr>
                                            <td class="fw-bold text-center">4</td>
                                            <td class="fw-semibold">Persentase Kepemilikan KTP-el</td>
                                            <td>Proporsi penduduk yang telah memiliki KTP fisik dari total penduduk desa.</td>
                                            <td><code>(Memiliki KTP / Total Penduduk) &times; 100%</code></td>
                                            <td>Persen</td>
                                            <td><span class="badge bg-warning text-dark rounded-pill">71,17%</span></td>
                                        </tr>
                                        <tr>
                                            <td class="fw-bold text-center">5</td>
                                            <td class="fw-semibold">Persentase Penerima Bansos</td>
                                            <td>Proporsi penduduk terdaftar penerima bansos (PKH, BPNT, BLT) terhadap total penduduk.</td>
                                            <td><code>(Penerima Bansos / Total Penduduk) &times; 100%</code></td>
                                            <td>Persen</td>
                                            <td><span class="badge bg-secondary rounded-pill">4,96%</span></td>
                                        </tr>
                                        <tr>
                                            <td class="fw-bold text-center">6</td>
                                            <td class="fw-semibold">Persentase Putus Sekolah</td>
                                            <td>Proporsi anak usia sekolah (7-18 tahun) yang tidak bersekolah terhadap total anak sekolah.</td>
                                            <td><code>(Putus Sekolah / Total Anak Sekolah) &times; 100%</code></td>
                                            <td>Persen</td>
                                            <td><span class="badge bg-danger rounded-pill">1,84% (32 Anak)</span></td>
                                        </tr>
                                        <tr>
                                            <td class="fw-bold text-center">7</td>
                                            <td class="fw-semibold">Kepadatan Hunian Rumah</td>
                                            <td>Rata-rata jumlah penduduk yang menghuni setiap bangunan fisik tempat tinggal.</td>
                                            <td><code>Total Penduduk / Jumlah Bumbung</code></td>
                                            <td>Jiwa/Rumah</td>
                                            <td><span class="badge bg-dark rounded-pill">4,11</span></td>
                                        </tr>
                                        <tr>
                                            <td class="fw-bold text-center">8</td>
                                            <td class="fw-semibold">Rasio Sarana Ibadah per 1000 Jiwa</td>
                                            <td>Ketersediaan sarana tempat ibadah desa untuk setiap 1.000 jiwa penduduk.</td>
                                            <td><code>(Sarana Ibadah / Total Penduduk) &times; 1000</code></td>
                                            <td>Unit/1000 Jiwa</td>
                                            <td><span class="badge bg-primary rounded-pill">4,53 (26 Unit)</span></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="modal-footer border-top bg-light px-4 py-2 justify-content-between flex-wrap gap-2">
                    <span class="text-muted extra-small"><i class="fas fa-shield-alt text-success me-1"></i> Standar Metadata Satu Data Indonesia (SDI) BPS Kab. Mempawah &bull; 100% Privacy Compliant</span>
                    <div class="d-flex align-items-center gap-2">
                        <a href="https://drive.google.com/file/d/1AS3gtBHXqqZv0K-rglbR5aHlAg1Y8FD4/view?usp=sharing" target="_blank" rel="noopener noreferrer" class="btn btn-sm btn-success rounded-pill px-3 fw-bold shadow-sm">
                            <i class="fas fa-download me-1"></i> Unduh Dokumen PDF
                        </a>
                        <button type="button" class="btn btn-sm btn-secondary rounded-pill px-4 fw-semibold" data-bs-dismiss="modal">Tutup</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Preview Foto Tampilan Besar (Lightbox Reusable Component) -->
    <x-ui.image-modal />

    <script id="fallback-rt" type="application/json">[{"Nama_RT": "RT 030 RW 05 DUSUN SEPAKAT DARAT", "Nama_Petugas": "Haqqi Wirakaryadi", "Tanggal_Waktu": "6/17/2026 10:24:48", "Nama_Ketua_RT": "MARSALIM", "Jumlah_Penduduk_Laki_Laki": "54", "Jumlah_Penduduk_Perempuan": "38", "Jumlah_Bumbung_Rumah": "32", "Jumlah_KK": "33", "Jumlah_Penduduk_Lansia": "14", "Jumlah_Kelahiran_Bayi": "0", "Jumlah_Kematian": "0", "Jumlah_Penerima_PKH": "0", "Jumlah_Penerima_BPNT": "0", "Jumlah_Penerima_BST": "0", "Jumlah_Penerima_BLT": "0", "Jumlah_Memiliki_KTP": "78", "Jumlah_Sekolah_TK": "2", "Jumlah_Sekolah_SD": "2", "Jumlah_Sekolah_SMP": "3", "Jumlah_Sekolah_SMA": "1", "Jumlah_Sekolah_Sarjana": "0", "Jumlah_Penduduk_Putus_Sekolah": "0", "Jumlah_Anak_Usia_0_1_Tahun": "0", "Jumlah_Anak_Usia_2_5_Tahun": "2", "Jumlah_Pendatang": "0", "Status_Pendataan": "Selesai"}, {"Nama_RT": "RT 021 RW 06 DUSUN KEDAUNG", "Nama_Petugas": "Haqqi Wirakaryadi", "Tanggal_Waktu": "6/15/2026 10:36:02", "Nama_Ketua_RT": "PULIAN", "Jumlah_Penduduk_Laki_Laki": "66", "Jumlah_Penduduk_Perempuan": "66", "Jumlah_Bumbung_Rumah": "36", "Jumlah_KK": "37", "Jumlah_Penduduk_Lansia": "15", "Jumlah_Kelahiran_Bayi": "0", "Jumlah_Kematian": "0", "Jumlah_Penerima_PKH": "2", "Jumlah_Penerima_BPNT": "0", "Jumlah_Penerima_BST": "0", "Jumlah_Penerima_BLT": "0", "Jumlah_Memiliki_KTP": "95", "Jumlah_Sekolah_TK": "0", "Jumlah_Sekolah_SD": "18", "Jumlah_Sekolah_SMP": "11", "Jumlah_Sekolah_SMA": "8", "Jumlah_Sekolah_Sarjana": "0", "Jumlah_Penduduk_Putus_Sekolah": "0", "Jumlah_Anak_Usia_0_1_Tahun": "0", "Jumlah_Anak_Usia_2_5_Tahun": "8", "Jumlah_Pendatang": "0", "Status_Pendataan": "Selesai"}, {"Nama_RT": "RT 022 RW 06 DUSUN KEDAUNG", "Nama_Petugas": "Haqqi Wirakaryadi", "Tanggal_Waktu": "6/15/2026 10:44:13", "Nama_Ketua_RT": "MARSULI", "Jumlah_Penduduk_Laki_Laki": "44", "Jumlah_Penduduk_Perempuan": "36", "Jumlah_Bumbung_Rumah": "34", "Jumlah_KK": "23", "Jumlah_Penduduk_Lansia": "5", "Jumlah_Kelahiran_Bayi": "0", "Jumlah_Kematian": "0", "Jumlah_Penerima_PKH": "0", "Jumlah_Penerima_BPNT": "0", "Jumlah_Penerima_BST": "0", "Jumlah_Penerima_BLT": "0", "Jumlah_Memiliki_KTP": "58", "Jumlah_Sekolah_TK": "2", "Jumlah_Sekolah_SD": "8", "Jumlah_Sekolah_SMP": "6", "Jumlah_Sekolah_SMA": "3", "Jumlah_Sekolah_Sarjana": "0", "Jumlah_Penduduk_Putus_Sekolah": "0", "Jumlah_Anak_Usia_0_1_Tahun": "0", "Jumlah_Anak_Usia_2_5_Tahun": "8", "Jumlah_Pendatang": "0", "Status_Pendataan": "Selesai"}, {"Nama_RT": "RT 019 RW 04 DUSUN SEPAKAT TENGAH", "Nama_Petugas": "Haqqi Wirakaryadi", "Tanggal_Waktu": "6/17/2026 10:25:50", "Nama_Ketua_RT": "MARJUKI", "Jumlah_Penduduk_Laki_Laki": "79", "Jumlah_Penduduk_Perempuan": "60", "Jumlah_Bumbung_Rumah": "26", "Jumlah_KK": "37", "Jumlah_Penduduk_Lansia": "8", "Jumlah_Kelahiran_Bayi": "0", "Jumlah_Kematian": "0", "Jumlah_Penerima_PKH": "0", "Jumlah_Penerima_BPNT": "0", "Jumlah_Penerima_BST": "0", "Jumlah_Penerima_BLT": "0", "Jumlah_Memiliki_KTP": "102", "Jumlah_Sekolah_TK": "0", "Jumlah_Sekolah_SD": "6", "Jumlah_Sekolah_SMP": "6", "Jumlah_Sekolah_SMA": "10", "Jumlah_Sekolah_Sarjana": "0", "Jumlah_Penduduk_Putus_Sekolah": "0", "Jumlah_Anak_Usia_0_1_Tahun": "0", "Jumlah_Anak_Usia_2_5_Tahun": "0", "Jumlah_Pendatang": "0", "Status_Pendataan": "Selesai"}, {"Nama_RT": "RT 010 RW 03 DUSUN SEPAKAT TENGAH", "Nama_Petugas": "Haqqi Wirakaryadi", "Tanggal_Waktu": "6/17/2026 10:04:15", "Nama_Ketua_RT": "HARIANTO", "Jumlah_Penduduk_Laki_Laki": "66", "Jumlah_Penduduk_Perempuan": "72", "Jumlah_Bumbung_Rumah": "27", "Jumlah_KK": "39", "Jumlah_Penduduk_Lansia": "10", "Jumlah_Kelahiran_Bayi": "0", "Jumlah_Kematian": "0", "Jumlah_Penerima_PKH": "0", "Jumlah_Penerima_BPNT": "0", "Jumlah_Penerima_BST": "0", "Jumlah_Penerima_BLT": "0", "Jumlah_Memiliki_KTP": "104", "Jumlah_Sekolah_TK": "0", "Jumlah_Sekolah_SD": "5", "Jumlah_Sekolah_SMP": "6", "Jumlah_Sekolah_SMA": "11", "Jumlah_Sekolah_Sarjana": "0", "Jumlah_Penduduk_Putus_Sekolah": "0", "Jumlah_Anak_Usia_0_1_Tahun": "0", "Jumlah_Anak_Usia_2_5_Tahun": "0", "Jumlah_Pendatang": "0", "Status_Pendataan": "Selesai"}, {"Nama_RT": "RT 027 RW 08 DUSUN KONSASI", "Nama_Petugas": "Haqqi Wirakaryadi", "Tanggal_Waktu": "6/2/2026 10:04:54", "Nama_Ketua_RT": "MARSYAD", "Jumlah_Penduduk_Laki_Laki": "65", "Jumlah_Penduduk_Perempuan": "54", "Jumlah_Bumbung_Rumah": "27", "Jumlah_KK": "36", "Jumlah_Penduduk_Lansia": "10", "Jumlah_Kelahiran_Bayi": "2", "Jumlah_Kematian": "0", "Jumlah_Penerima_PKH": "4", "Jumlah_Penerima_BPNT": "0", "Jumlah_Penerima_BST": "1", "Jumlah_Penerima_BLT": "0", "Jumlah_Memiliki_KTP": "80", "Jumlah_Sekolah_TK": "2", "Jumlah_Sekolah_SD": "14", "Jumlah_Sekolah_SMP": "3", "Jumlah_Sekolah_SMA": "7", "Jumlah_Sekolah_Sarjana": "0", "Jumlah_Penduduk_Putus_Sekolah": "0", "Jumlah_Anak_Usia_0_1_Tahun": "2", "Jumlah_Anak_Usia_2_5_Tahun": "7", "Jumlah_Pendatang": "0", "Status_Pendataan": "Selesai"}, {"Nama_RT": "RT 024 RW 07 DUSUN SENAMBANG", "Nama_Petugas": "Haqqi Wirakaryadi", "Tanggal_Waktu": "6/17/2026 9:46:30", "Nama_Ketua_RT": "MAT RAIS", "Jumlah_Penduduk_Laki_Laki": "57", "Jumlah_Penduduk_Perempuan": "51", "Jumlah_Bumbung_Rumah": "28", "Jumlah_KK": "34", "Jumlah_Penduduk_Lansia": "2", "Jumlah_Kelahiran_Bayi": "0", "Jumlah_Kematian": "0", "Jumlah_Penerima_PKH": "0", "Jumlah_Penerima_BPNT": "0", "Jumlah_Penerima_BST": "0", "Jumlah_Penerima_BLT": "0", "Jumlah_Memiliki_KTP": "98", "Jumlah_Sekolah_TK": "0", "Jumlah_Sekolah_SD": "5", "Jumlah_Sekolah_SMP": "8", "Jumlah_Sekolah_SMA": "2", "Jumlah_Sekolah_Sarjana": "0", "Jumlah_Penduduk_Putus_Sekolah": "0", "Jumlah_Anak_Usia_0_1_Tahun": "0", "Jumlah_Anak_Usia_2_5_Tahun": "0", "Jumlah_Pendatang": "0", "Status_Pendataan": "Selesai"}, {"Nama_RT": "RT 032 RW 07 DUSUN SENAMBANG", "Nama_Petugas": "Haqqi Wirakaryadi", "Tanggal_Waktu": "6/17/2026 9:49:39", "Nama_Ketua_RT": "M. ALI", "Jumlah_Penduduk_Laki_Laki": "71", "Jumlah_Penduduk_Perempuan": "68", "Jumlah_Bumbung_Rumah": "30", "Jumlah_KK": "33", "Jumlah_Penduduk_Lansia": "18", "Jumlah_Kelahiran_Bayi": "0", "Jumlah_Kematian": "0", "Jumlah_Penerima_PKH": "0", "Jumlah_Penerima_BPNT": "0", "Jumlah_Penerima_BST": "0", "Jumlah_Penerima_BLT": "0", "Jumlah_Memiliki_KTP": "115", "Jumlah_Sekolah_TK": "0", "Jumlah_Sekolah_SD": "7", "Jumlah_Sekolah_SMP": "12", "Jumlah_Sekolah_SMA": "4", "Jumlah_Sekolah_Sarjana": "0", "Jumlah_Penduduk_Putus_Sekolah": "0", "Jumlah_Anak_Usia_0_1_Tahun": "0", "Jumlah_Anak_Usia_2_5_Tahun": "0", "Jumlah_Pendatang": "0", "Status_Pendataan": "Selesai"}, {"Nama_RT": "RT 025 RW 07 DUSUN SENAMBANG", "Nama_Petugas": "Haqqi Wirakaryadi", "Tanggal_Waktu": "6/17/2026 9:48:02", "Nama_Ketua_RT": "HASANUDIN", "Jumlah_Penduduk_Laki_Laki": "71", "Jumlah_Penduduk_Perempuan": "67", "Jumlah_Bumbung_Rumah": "31", "Jumlah_KK": "33", "Jumlah_Penduduk_Lansia": "12", "Jumlah_Kelahiran_Bayi": "0", "Jumlah_Kematian": "0", "Jumlah_Penerima_PKH": "0", "Jumlah_Penerima_BPNT": "0", "Jumlah_Penerima_BST": "0", "Jumlah_Penerima_BLT": "0", "Jumlah_Memiliki_KTP": "111", "Jumlah_Sekolah_TK": "7", "Jumlah_Sekolah_SD": "14", "Jumlah_Sekolah_SMP": "8", "Jumlah_Sekolah_SMA": "5", "Jumlah_Sekolah_Sarjana": "0", "Jumlah_Penduduk_Putus_Sekolah": "0", "Jumlah_Anak_Usia_0_1_Tahun": "0", "Jumlah_Anak_Usia_2_5_Tahun": "0", "Jumlah_Pendatang": "0", "Status_Pendataan": "Selesai"}, {"Nama_RT": "RT 002 RW 01 DUSUN SENGGIIRING", "Nama_Petugas": "Haqqi Wirakaryadi", "Tanggal_Waktu": "6/2/2026 9:31:30", "Nama_Ketua_RT": "MURSID, S.Pd", "Jumlah_Penduduk_Laki_Laki": "67", "Jumlah_Penduduk_Perempuan": "73", "Jumlah_Bumbung_Rumah": "32", "Jumlah_KK": "41", "Jumlah_Penduduk_Lansia": "17", "Jumlah_Kelahiran_Bayi": "0", "Jumlah_Kematian": "0", "Jumlah_Penerima_PKH": "3", "Jumlah_Penerima_BPNT": "0", "Jumlah_Penerima_BST": "0", "Jumlah_Penerima_BLT": "1", "Jumlah_Memiliki_KTP": "105", "Jumlah_Sekolah_TK": "6", "Jumlah_Sekolah_SD": "9", "Jumlah_Sekolah_SMP": "2", "Jumlah_Sekolah_SMA": "7", "Jumlah_Sekolah_Sarjana": "1", "Jumlah_Penduduk_Putus_Sekolah": "3", "Jumlah_Anak_Usia_0_1_Tahun": "3", "Jumlah_Anak_Usia_2_5_Tahun": "7", "Jumlah_Pendatang": "0", "Status_Pendataan": "Selesai"}, {"Nama_RT": "RT 004 RW 02 DUSUN BENTENG RAYA", "Nama_Petugas": "Haqqi Wirakaryadi", "Tanggal_Waktu": "6/2/2026 11:26:25", "Nama_Ketua_RT": "HARFANSYAH", "Jumlah_Penduduk_Laki_Laki": "57", "Jumlah_Penduduk_Perempuan": "64", "Jumlah_Bumbung_Rumah": "32", "Jumlah_KK": "40", "Jumlah_Penduduk_Lansia": "11", "Jumlah_Kelahiran_Bayi": "3", "Jumlah_Kematian": "0", "Jumlah_Penerima_PKH": "4", "Jumlah_Penerima_BPNT": "4", "Jumlah_Penerima_BST": "0", "Jumlah_Penerima_BLT": "1", "Jumlah_Memiliki_KTP": "83", "Jumlah_Sekolah_TK": "2", "Jumlah_Sekolah_SD": "16", "Jumlah_Sekolah_SMP": "4", "Jumlah_Sekolah_SMA": "4", "Jumlah_Sekolah_Sarjana": "0", "Jumlah_Penduduk_Putus_Sekolah": "0", "Jumlah_Anak_Usia_0_1_Tahun": "3", "Jumlah_Anak_Usia_2_5_Tahun": "3", "Jumlah_Pendatang": "0", "Status_Pendataan": "Selesai"}, {"Nama_RT": "RT 013 RW 04 DUSUN SEPAKAT TENGAH", "Nama_Petugas": "Haqqi Wirakaryadi", "Tanggal_Waktu": "6/8/2026 11:22:06", "Nama_Ketua_RT": "KHOLIS", "Jumlah_Penduduk_Laki_Laki": "70", "Jumlah_Penduduk_Perempuan": "62", "Jumlah_Bumbung_Rumah": "32", "Jumlah_KK": "37", "Jumlah_Penduduk_Lansia": "6", "Jumlah_Kelahiran_Bayi": "1", "Jumlah_Kematian": "0", "Jumlah_Penerima_PKH": "7", "Jumlah_Penerima_BPNT": "5", "Jumlah_Penerima_BST": "0", "Jumlah_Penerima_BLT": "0", "Jumlah_Memiliki_KTP": "84", "Jumlah_Sekolah_TK": "2", "Jumlah_Sekolah_SD": "11", "Jumlah_Sekolah_SMP": "8", "Jumlah_Sekolah_SMA": "5", "Jumlah_Sekolah_Sarjana": "3", "Jumlah_Penduduk_Putus_Sekolah": "5", "Jumlah_Anak_Usia_0_1_Tahun": "2", "Jumlah_Anak_Usia_2_5_Tahun": "6", "Jumlah_Pendatang": "0", "Status_Pendataan": "Selesai"}, {"Nama_RT": "RT 017 RW 05 DUSUN SEPAKAT DARAT", "Nama_Petugas": "Haqqi Wirakaryadi", "Tanggal_Waktu": "6/17/2026 10:24:11", "Nama_Ketua_RT": "SAFURI", "Jumlah_Penduduk_Laki_Laki": "95", "Jumlah_Penduduk_Perempuan": "90", "Jumlah_Bumbung_Rumah": "34", "Jumlah_KK": "50", "Jumlah_Penduduk_Lansia": "10", "Jumlah_Kelahiran_Bayi": "0", "Jumlah_Kematian": "0", "Jumlah_Penerima_PKH": "0", "Jumlah_Penerima_BPNT": "0", "Jumlah_Penerima_BST": "0", "Jumlah_Penerima_BLT": "0", "Jumlah_Memiliki_KTP": "146", "Jumlah_Sekolah_TK": "5", "Jumlah_Sekolah_SD": "11", "Jumlah_Sekolah_SMP": "15", "Jumlah_Sekolah_SMA": "4", "Jumlah_Sekolah_Sarjana": "2", "Jumlah_Penduduk_Putus_Sekolah": "2", "Jumlah_Anak_Usia_0_1_Tahun": "0", "Jumlah_Anak_Usia_2_5_Tahun": "0", "Jumlah_Pendatang": "0", "Status_Pendataan": "Selesai"}, {"Nama_RT": "RT 011 RW 03 DUSUN SEPAKAT TENGAH", "Nama_Petugas": "Haqqi Wirakaryadi", "Tanggal_Waktu": "6/8/2026 11:13:14", "Nama_Ketua_RT": "JUNAIDI", "Jumlah_Penduduk_Laki_Laki": "54", "Jumlah_Penduduk_Perempuan": "51", "Jumlah_Bumbung_Rumah": "35", "Jumlah_KK": "32", "Jumlah_Penduduk_Lansia": "24", "Jumlah_Kelahiran_Bayi": "2", "Jumlah_Kematian": "0", "Jumlah_Penerima_PKH": "1", "Jumlah_Penerima_BPNT": "5", "Jumlah_Penerima_BST": "0", "Jumlah_Penerima_BLT": "0", "Jumlah_Memiliki_KTP": "78", "Jumlah_Sekolah_TK": "1", "Jumlah_Sekolah_SD": "4", "Jumlah_Sekolah_SMP": "6", "Jumlah_Sekolah_SMA": "2", "Jumlah_Sekolah_Sarjana": "3", "Jumlah_Penduduk_Putus_Sekolah": "0", "Jumlah_Anak_Usia_0_1_Tahun": "2", "Jumlah_Anak_Usia_2_5_Tahun": "2", "Jumlah_Pendatang": "5", "Status_Pendataan": "Selesai"}, {"Nama_RT": "RT 014 RW 04 DUSUN SEPAKAT TENGAH", "Nama_Petugas": "Haqqi Wirakaryadi", "Tanggal_Waktu": "6/8/2026 11:15:51", "Nama_Ketua_RT": "MARTILAM", "Jumlah_Penduduk_Laki_Laki": "71", "Jumlah_Penduduk_Perempuan": "83", "Jumlah_Bumbung_Rumah": "35", "Jumlah_KK": "37", "Jumlah_Penduduk_Lansia": "16", "Jumlah_Kelahiran_Bayi": "0", "Jumlah_Kematian": "0", "Jumlah_Penerima_PKH": "4", "Jumlah_Penerima_BPNT": "10", "Jumlah_Penerima_BST": "0", "Jumlah_Penerima_BLT": "0", "Jumlah_Memiliki_KTP": "84", "Jumlah_Sekolah_TK": "2", "Jumlah_Sekolah_SD": "15", "Jumlah_Sekolah_SMP": "5", "Jumlah_Sekolah_SMA": "3", "Jumlah_Sekolah_Sarjana": "0", "Jumlah_Penduduk_Putus_Sekolah": "1", "Jumlah_Anak_Usia_0_1_Tahun": "1", "Jumlah_Anak_Usia_2_5_Tahun": "12", "Jumlah_Pendatang": "0", "Status_Pendataan": "Selesai"}, {"Nama_RT": "RT 009 RW 03 DUSUN BENTENG TIMUR", "Nama_Petugas": "Haqqi Wirakaryadi", "Tanggal_Waktu": "6/17/2026 10:01:17", "Nama_Ketua_RT": "BURHANI", "Jumlah_Penduduk_Laki_Laki": "64", "Jumlah_Penduduk_Perempuan": "74", "Jumlah_Bumbung_Rumah": "36", "Jumlah_KK": "46", "Jumlah_Penduduk_Lansia": "9", "Jumlah_Kelahiran_Bayi": "0", "Jumlah_Kematian": "0", "Jumlah_Penerima_PKH": "0", "Jumlah_Penerima_BPNT": "0", "Jumlah_Penerima_BST": "0", "Jumlah_Penerima_BLT": "0", "Jumlah_Memiliki_KTP": "102", "Jumlah_Sekolah_TK": "1", "Jumlah_Sekolah_SD": "5", "Jumlah_Sekolah_SMP": "5", "Jumlah_Sekolah_SMA": "9", "Jumlah_Sekolah_Sarjana": "0", "Jumlah_Penduduk_Putus_Sekolah": "0", "Jumlah_Anak_Usia_0_1_Tahun": "0", "Jumlah_Anak_Usia_2_5_Tahun": "8", "Jumlah_Pendatang": "0", "Status_Pendataan": "Selesai"}, {"Nama_RT": "RT 028 RW 08 DUSUN KONSASI", "Nama_Petugas": "Haqqi Wirakaryadi", "Tanggal_Waktu": "6/17/2026 9:50:33", "Nama_Ketua_RT": "SARUKI", "Jumlah_Penduduk_Laki_Laki": "86", "Jumlah_Penduduk_Perempuan": "70", "Jumlah_Bumbung_Rumah": "36", "Jumlah_KK": "35", "Jumlah_Penduduk_Lansia": "15", "Jumlah_Kelahiran_Bayi": "0", "Jumlah_Kematian": "0", "Jumlah_Penerima_PKH": "0", "Jumlah_Penerima_BPNT": "0", "Jumlah_Penerima_BST": "0", "Jumlah_Penerima_BLT": "0", "Jumlah_Memiliki_KTP": "117", "Jumlah_Sekolah_TK": "0", "Jumlah_Sekolah_SD": "20", "Jumlah_Sekolah_SMP": "16", "Jumlah_Sekolah_SMA": "7", "Jumlah_Sekolah_Sarjana": "0", "Jumlah_Penduduk_Putus_Sekolah": "0", "Jumlah_Anak_Usia_0_1_Tahun": "0", "Jumlah_Anak_Usia_2_5_Tahun": "0", "Jumlah_Pendatang": "0", "Status_Pendataan": "Selesai"}, {"Nama_RT": "RT 036 RW 03 DUSUN BENTENG TIMUR", "Nama_Petugas": "Haqqi Wirakaryadi", "Tanggal_Waktu": "6/10/2026 10:42:42", "Nama_Ketua_RT": "JULIADI", "Jumlah_Penduduk_Laki_Laki": "115", "Jumlah_Penduduk_Perempuan": "98", "Jumlah_Bumbung_Rumah": "36", "Jumlah_KK": "63", "Jumlah_Penduduk_Lansia": "7", "Jumlah_Kelahiran_Bayi": "0", "Jumlah_Kematian": "0", "Jumlah_Penerima_PKH": "0", "Jumlah_Penerima_BPNT": "0", "Jumlah_Penerima_BST": "0", "Jumlah_Penerima_BLT": "0", "Jumlah_Memiliki_KTP": "137", "Jumlah_Sekolah_TK": "5", "Jumlah_Sekolah_SD": "19", "Jumlah_Sekolah_SMP": "13", "Jumlah_Sekolah_SMA": "9", "Jumlah_Sekolah_Sarjana": "2", "Jumlah_Penduduk_Putus_Sekolah": "0", "Jumlah_Anak_Usia_0_1_Tahun": "0", "Jumlah_Anak_Usia_2_5_Tahun": "19", "Jumlah_Pendatang": "0", "Status_Pendataan": "Selesai"}, {"Nama_RT": "RT 003 RW 01 DUSUN SENGGIRING", "Nama_Petugas": "Haqqi Wirakaryadi", "Tanggal_Waktu": "6/2/2026 11:25:09", "Nama_Ketua_RT": "M. NAWI", "Jumlah_Penduduk_Laki_Laki": "59", "Jumlah_Penduduk_Perempuan": "64", "Jumlah_Bumbung_Rumah": "38", "Jumlah_KK": "37", "Jumlah_Penduduk_Lansia": "6", "Jumlah_Kelahiran_Bayi": "0", "Jumlah_Kematian": "0", "Jumlah_Penerima_PKH": "0", "Jumlah_Penerima_BPNT": "0", "Jumlah_Penerima_BST": "0", "Jumlah_Penerima_BLT": "0", "Jumlah_Memiliki_KTP": "85", "Jumlah_Sekolah_TK": "1", "Jumlah_Sekolah_SD": "22", "Jumlah_Sekolah_SMP": "5", "Jumlah_Sekolah_SMA": "10", "Jumlah_Sekolah_Sarjana": "0", "Jumlah_Penduduk_Putus_Sekolah": "0", "Jumlah_Anak_Usia_0_1_Tahun": "0", "Jumlah_Anak_Usia_2_5_Tahun": "0", "Jumlah_Pendatang": "0", "Status_Pendataan": "Selesai"}, {"Nama_RT": "RT 031 RW 02 DUSUN BENTENG RAYA", "Nama_Petugas": "Haqqi Wirakaryadi", "Tanggal_Waktu": "6/2/2026 11:54:07", "Nama_Ketua_RT": "RUDHI KHAIRUDDIN", "Jumlah_Penduduk_Laki_Laki": "39", "Jumlah_Penduduk_Perempuan": "38", "Jumlah_Bumbung_Rumah": "38", "Jumlah_KK": "38", "Jumlah_Penduduk_Lansia": "10", "Jumlah_Kelahiran_Bayi": "0", "Jumlah_Kematian": "0", "Jumlah_Penerima_PKH": "0", "Jumlah_Penerima_BPNT": "0", "Jumlah_Penerima_BST": "0", "Jumlah_Penerima_BLT": "0", "Jumlah_Memiliki_KTP": "55", "Jumlah_Sekolah_TK": "1", "Jumlah_Sekolah_SD": "9", "Jumlah_Sekolah_SMP": "2", "Jumlah_Sekolah_SMA": "2", "Jumlah_Sekolah_Sarjana": "0", "Jumlah_Penduduk_Putus_Sekolah": "0", "Jumlah_Anak_Usia_0_1_Tahun": "1", "Jumlah_Anak_Usia_2_5_Tahun": "3", "Jumlah_Pendatang": "0", "Status_Pendataan": "Selesai"}, {"Nama_RT": "RT 015 RW 05 DUSUN SEPAKAT DARAT", "Nama_Petugas": "Sahrul Rozi", "Tanggal_Waktu": "6/2/2026 12:09:45", "Nama_Ketua_RT": "MAHRUJI", "Jumlah_Penduduk_Laki_Laki": "82", "Jumlah_Penduduk_Perempuan": "76", "Jumlah_Bumbung_Rumah": "38", "Jumlah_KK": "41", "Jumlah_Penduduk_Lansia": "11", "Jumlah_Kelahiran_Bayi": "0", "Jumlah_Kematian": "1", "Jumlah_Penerima_PKH": "8", "Jumlah_Penerima_BPNT": "14", "Jumlah_Penerima_BST": "0", "Jumlah_Penerima_BLT": "1", "Jumlah_Memiliki_KTP": "109", "Jumlah_Sekolah_TK": "0", "Jumlah_Sekolah_SD": "23", "Jumlah_Sekolah_SMP": "11", "Jumlah_Sekolah_SMA": "5", "Jumlah_Sekolah_Sarjana": "2", "Jumlah_Penduduk_Putus_Sekolah": "5", "Jumlah_Anak_Usia_0_1_Tahun": "2", "Jumlah_Anak_Usia_2_5_Tahun": "8", "Jumlah_Pendatang": "0", "Status_Pendataan": "Selesai"}, {"Nama_RT": "RT 035 RW 04 DUSUN SEPAKAT TENGAH", "Nama_Petugas": "Sahrul Rozi", "Tanggal_Waktu": "6/20/2026 10:29:24", "Nama_Ketua_RT": "JOHAN", "Jumlah_Penduduk_Laki_Laki": "79", "Jumlah_Penduduk_Perempuan": "79", "Jumlah_Bumbung_Rumah": "39", "Jumlah_KK": "50", "Jumlah_Penduduk_Lansia": "15", "Jumlah_Kelahiran_Bayi": "2", "Jumlah_Kematian": "3", "Jumlah_Penerima_PKH": "7", "Jumlah_Penerima_BPNT": "2", "Jumlah_Penerima_BST": "0", "Jumlah_Penerima_BLT": "0", "Jumlah_Memiliki_KTP": "143", "Jumlah_Sekolah_TK": "0", "Jumlah_Sekolah_SD": "10", "Jumlah_Sekolah_SMP": "5", "Jumlah_Sekolah_SMA": "7", "Jumlah_Sekolah_Sarjana": "1", "Jumlah_Penduduk_Putus_Sekolah": "1", "Jumlah_Anak_Usia_0_1_Tahun": "2", "Jumlah_Anak_Usia_2_5_Tahun": "0", "Jumlah_Pendatang": "2", "Status_Pendataan": "Selesai"}, {"Nama_RT": "RT 037 RW 05 DUSUN SEPAKAT DARAT", "Nama_Petugas": "Haqqi Wirakaryadi", "Tanggal_Waktu": "6/17/2026 10:23:00", "Nama_Ketua_RT": "MUNAKI", "Jumlah_Penduduk_Laki_Laki": "73", "Jumlah_Penduduk_Perempuan": "61", "Jumlah_Bumbung_Rumah": "39", "Jumlah_KK": "63", "Jumlah_Penduduk_Lansia": "19", "Jumlah_Kelahiran_Bayi": "0", "Jumlah_Kematian": "0", "Jumlah_Penerima_PKH": "0", "Jumlah_Penerima_BPNT": "0", "Jumlah_Penerima_BST": "0", "Jumlah_Penerima_BLT": "0", "Jumlah_Memiliki_KTP": "105", "Jumlah_Sekolah_TK": "0", "Jumlah_Sekolah_SD": "20", "Jumlah_Sekolah_SMP": "3", "Jumlah_Sekolah_SMA": "6", "Jumlah_Sekolah_Sarjana": "0", "Jumlah_Penduduk_Putus_Sekolah": "0", "Jumlah_Anak_Usia_0_1_Tahun": "0", "Jumlah_Anak_Usia_2_5_Tahun": "0", "Jumlah_Pendatang": "0", "Status_Pendataan": "Selesai"}, {"Nama_RT": "RT 001 RW 01 DUSUN SENGGIRING", "Nama_Petugas": "Haqqi Wirakaryadi", "Tanggal_Waktu": "6/2/2026 9:30:10", "Nama_Ketua_RT": "SY. JAMALUDDIN", "Jumlah_Penduduk_Laki_Laki": "98", "Jumlah_Penduduk_Perempuan": "96", "Jumlah_Bumbung_Rumah": "40", "Jumlah_KK": "58", "Jumlah_Penduduk_Lansia": "15", "Jumlah_Kelahiran_Bayi": "0", "Jumlah_Kematian": "0", "Jumlah_Penerima_PKH": "0", "Jumlah_Penerima_BPNT": "0", "Jumlah_Penerima_BST": "0", "Jumlah_Penerima_BLT": "0", "Jumlah_Memiliki_KTP": "160", "Jumlah_Sekolah_TK": "0", "Jumlah_Sekolah_SD": "11", "Jumlah_Sekolah_SMP": "1", "Jumlah_Sekolah_SMA": "7", "Jumlah_Sekolah_Sarjana": "0", "Jumlah_Penduduk_Putus_Sekolah": "0", "Jumlah_Anak_Usia_0_1_Tahun": "0", "Jumlah_Anak_Usia_2_5_Tahun": "0", "Jumlah_Pendatang": "0", "Status_Pendataan": "Selesai"}, {"Nama_RT": "RT 034 RW 05 DUSUN SEPAKAT DARAT", "Nama_Petugas": "Sahrul Rozi", "Tanggal_Waktu": "6/2/2026 12:22:10", "Nama_Ketua_RT": "SADRA'I", "Jumlah_Penduduk_Laki_Laki": "86", "Jumlah_Penduduk_Perempuan": "115", "Jumlah_Bumbung_Rumah": "41", "Jumlah_KK": "45", "Jumlah_Penduduk_Lansia": "9", "Jumlah_Kelahiran_Bayi": "4", "Jumlah_Kematian": "0", "Jumlah_Penerima_PKH": "5", "Jumlah_Penerima_BPNT": "8", "Jumlah_Penerima_BST": "0", "Jumlah_Penerima_BLT": "1", "Jumlah_Memiliki_KTP": "87", "Jumlah_Sekolah_TK": "3", "Jumlah_Sekolah_SD": "16", "Jumlah_Sekolah_SMP": "3", "Jumlah_Sekolah_SMA": "4", "Jumlah_Sekolah_Sarjana": "1", "Jumlah_Penduduk_Putus_Sekolah": "0", "Jumlah_Anak_Usia_0_1_Tahun": "0", "Jumlah_Anak_Usia_2_5_Tahun": "0", "Jumlah_Pendatang": "2", "Status_Pendataan": "Selesai"}, {"Nama_RT": "RT 016 RW 05 DUSUN SEPAKAT DARAT", "Nama_Petugas": "Sahrul Rozi", "Tanggal_Waktu": "6/2/2026 12:15:03", "Nama_Ketua_RT": "SIRI", "Jumlah_Penduduk_Laki_Laki": "92", "Jumlah_Penduduk_Perempuan": "105", "Jumlah_Bumbung_Rumah": "41", "Jumlah_KK": "47", "Jumlah_Penduduk_Lansia": "14", "Jumlah_Kelahiran_Bayi": "1", "Jumlah_Kematian": "0", "Jumlah_Penerima_PKH": "3", "Jumlah_Penerima_BPNT": "0", "Jumlah_Penerima_BST": "0", "Jumlah_Penerima_BLT": "1", "Jumlah_Memiliki_KTP": "152", "Jumlah_Sekolah_TK": "2", "Jumlah_Sekolah_SD": "20", "Jumlah_Sekolah_SMP": "7", "Jumlah_Sekolah_SMA": "3", "Jumlah_Sekolah_Sarjana": "0", "Jumlah_Penduduk_Putus_Sekolah": "6", "Jumlah_Anak_Usia_0_1_Tahun": "5", "Jumlah_Anak_Usia_2_5_Tahun": "20", "Jumlah_Pendatang": "2", "Status_Pendataan": "Selesai"}, {"Nama_RT": "RT 023 RW 06 DUSUN KEDAUNG", "Nama_Petugas": "Haqqi Wirakaryadi", "Tanggal_Waktu": "6/2/2026 9:50:30", "Nama_Ketua_RT": "SYAHRUDDIN", "Jumlah_Penduduk_Laki_Laki": "111", "Jumlah_Penduduk_Perempuan": "95", "Jumlah_Bumbung_Rumah": "41", "Jumlah_KK": "56", "Jumlah_Penduduk_Lansia": "0", "Jumlah_Kelahiran_Bayi": "0", "Jumlah_Kematian": "0", "Jumlah_Penerima_PKH": "0", "Jumlah_Penerima_BPNT": "0", "Jumlah_Penerima_BST": "0", "Jumlah_Penerima_BLT": "0", "Jumlah_Memiliki_KTP": "128", "Jumlah_Sekolah_TK": "37", "Jumlah_Sekolah_SD": "12", "Jumlah_Sekolah_SMP": "11", "Jumlah_Sekolah_SMA": "12", "Jumlah_Sekolah_Sarjana": "0", "Jumlah_Penduduk_Putus_Sekolah": "0", "Jumlah_Anak_Usia_0_1_Tahun": "0", "Jumlah_Anak_Usia_2_5_Tahun": "0", "Jumlah_Pendatang": "0", "Status_Pendataan": "Selesai"}, {"Nama_RT": "RT 026 RW 07 DUSUN SENAMBANG", "Nama_Petugas": "Haqqi Wirakaryadi", "Tanggal_Waktu": "6/17/2026 9:48:54", "Nama_Ketua_RT": "SAHRUJI", "Jumlah_Penduduk_Laki_Laki": "101", "Jumlah_Penduduk_Perempuan": "111", "Jumlah_Bumbung_Rumah": "41", "Jumlah_KK": "47", "Jumlah_Penduduk_Lansia": "21", "Jumlah_Kelahiran_Bayi": "0", "Jumlah_Kematian": "0", "Jumlah_Penerima_PKH": "0", "Jumlah_Penerima_BPNT": "0", "Jumlah_Penerima_BST": "0", "Jumlah_Penerima_BLT": "0", "Jumlah_Memiliki_KTP": "172", "Jumlah_Sekolah_TK": "0", "Jumlah_Sekolah_SD": "10", "Jumlah_Sekolah_SMP": "11", "Jumlah_Sekolah_SMA": "15", "Jumlah_Sekolah_Sarjana": "0", "Jumlah_Penduduk_Putus_Sekolah": "0", "Jumlah_Anak_Usia_0_1_Tahun": "0", "Jumlah_Anak_Usia_2_5_Tahun": "0", "Jumlah_Pendatang": "0", "Status_Pendataan": "Selesai"}, {"Nama_RT": "RT 005 RW 02 DUSUN BENTENG RAYA", "Nama_Petugas": "Haqqi Wirakaryadi", "Tanggal_Waktu": "6/2/2026 11:58:15", "Nama_Ketua_RT": "SATIAT", "Jumlah_Penduduk_Laki_Laki": "143", "Jumlah_Penduduk_Perempuan": "106", "Jumlah_Bumbung_Rumah": "42", "Jumlah_KK": "62", "Jumlah_Penduduk_Lansia": "9", "Jumlah_Kelahiran_Bayi": "0", "Jumlah_Kematian": "2", "Jumlah_Penerima_PKH": "4", "Jumlah_Penerima_BPNT": "2", "Jumlah_Penerima_BST": "0", "Jumlah_Penerima_BLT": "0", "Jumlah_Memiliki_KTP": "109", "Jumlah_Sekolah_TK": "0", "Jumlah_Sekolah_SD": "13", "Jumlah_Sekolah_SMP": "9", "Jumlah_Sekolah_SMA": "6", "Jumlah_Sekolah_Sarjana": "0", "Jumlah_Penduduk_Putus_Sekolah": "0", "Jumlah_Anak_Usia_0_1_Tahun": "0", "Jumlah_Anak_Usia_2_5_Tahun": "0", "Jumlah_Pendatang": "0", "Status_Pendataan": "Selesai"}, {"Nama_RT": "RT 008 RW 03 DUSUN BENTENG TIMUR", "Nama_Petugas": "Haqqi Wirakaryadi", "Tanggal_Waktu": "6/17/2026 9:56:43", "Nama_Ketua_RT": "NURHAYATI", "Jumlah_Penduduk_Laki_Laki": "52", "Jumlah_Penduduk_Perempuan": "77", "Jumlah_Bumbung_Rumah": "43", "Jumlah_KK": "50", "Jumlah_Penduduk_Lansia": "2", "Jumlah_Kelahiran_Bayi": "0", "Jumlah_Kematian": "0", "Jumlah_Penerima_PKH": "0", "Jumlah_Penerima_BPNT": "0", "Jumlah_Penerima_BST": "0", "Jumlah_Penerima_BLT": "0", "Jumlah_Memiliki_KTP": "74", "Jumlah_Sekolah_TK": "1", "Jumlah_Sekolah_SD": "20", "Jumlah_Sekolah_SMP": "10", "Jumlah_Sekolah_SMA": "5", "Jumlah_Sekolah_Sarjana": "0", "Jumlah_Penduduk_Putus_Sekolah": "0", "Jumlah_Anak_Usia_0_1_Tahun": "0", "Jumlah_Anak_Usia_2_5_Tahun": "15", "Jumlah_Pendatang": "0", "Status_Pendataan": "Selesai"}, {"Nama_RT": "RT 033 RW 04 DUSUN SEPAKAT TENGAH", "Nama_Petugas": "Sahrul Rozi", "Tanggal_Waktu": "6/25/2026 10:26:39", "Nama_Ketua_RT": "FIRDAUS", "Jumlah_Penduduk_Laki_Laki": "95", "Jumlah_Penduduk_Perempuan": "100", "Jumlah_Bumbung_Rumah": "45", "Jumlah_KK": "50", "Jumlah_Penduduk_Lansia": "14", "Jumlah_Kelahiran_Bayi": "2", "Jumlah_Kematian": "2", "Jumlah_Penerima_PKH": "12", "Jumlah_Penerima_BPNT": "4", "Jumlah_Penerima_BST": "0", "Jumlah_Penerima_BLT": "1", "Jumlah_Memiliki_KTP": "105", "Jumlah_Sekolah_TK": "0", "Jumlah_Sekolah_SD": "28", "Jumlah_Sekolah_SMP": "10", "Jumlah_Sekolah_SMA": "5", "Jumlah_Sekolah_Sarjana": "1", "Jumlah_Penduduk_Putus_Sekolah": "0", "Jumlah_Anak_Usia_0_1_Tahun": "2", "Jumlah_Anak_Usia_2_5_Tahun": "24", "Jumlah_Pendatang": "0", "Status_Pendataan": "Selesai"}, {"Nama_RT": "RT 007 RW 03 DUSUN BENTENG TIMUR", "Nama_Petugas": "Haqqi Wirakaryadi", "Tanggal_Waktu": "6/17/2026 9:53:59", "Nama_Ketua_RT": "SULAIMAN", "Jumlah_Penduduk_Laki_Laki": "76", "Jumlah_Penduduk_Perempuan": "81", "Jumlah_Bumbung_Rumah": "46", "Jumlah_KK": "50", "Jumlah_Penduduk_Lansia": "16", "Jumlah_Kelahiran_Bayi": "0", "Jumlah_Kematian": "0", "Jumlah_Penerima_PKH": "0", "Jumlah_Penerima_BPNT": "0", "Jumlah_Penerima_BST": "0", "Jumlah_Penerima_BLT": "0", "Jumlah_Memiliki_KTP": "125", "Jumlah_Sekolah_TK": "4", "Jumlah_Sekolah_SD": "9", "Jumlah_Sekolah_SMP": "6", "Jumlah_Sekolah_SMA": "6", "Jumlah_Sekolah_Sarjana": "0", "Jumlah_Penduduk_Putus_Sekolah": "2", "Jumlah_Anak_Usia_0_1_Tahun": "0", "Jumlah_Anak_Usia_2_5_Tahun": "2", "Jumlah_Pendatang": "0", "Status_Pendataan": "Selesai"}, {"Nama_RT": "RT 020 RW 01 DUSUN SENGGIRING", "Nama_Petugas": "Haqqi Wirakaryadi", "Tanggal_Waktu": "5/24/2026 17:53:00", "Nama_Ketua_RT": "DG. RIVA'IE", "Jumlah_Penduduk_Laki_Laki": "82", "Jumlah_Penduduk_Perempuan": "75", "Jumlah_Bumbung_Rumah": "50", "Jumlah_KK": "53", "Jumlah_Penduduk_Lansia": "16", "Jumlah_Kelahiran_Bayi": "0", "Jumlah_Kematian": "0", "Jumlah_Penerima_PKH": "0", "Jumlah_Penerima_BPNT": "0", "Jumlah_Penerima_BST": "0", "Jumlah_Penerima_BLT": "0", "Jumlah_Memiliki_KTP": "121", "Jumlah_Sekolah_TK": "", "Jumlah_Sekolah_SD": "11", "Jumlah_Sekolah_SMP": "4", "Jumlah_Sekolah_SMA": "", "Jumlah_Sekolah_Sarjana": "0", "Jumlah_Penduduk_Putus_Sekolah": "0", "Jumlah_Anak_Usia_0_1_Tahun": "0", "Jumlah_Anak_Usia_2_5_Tahun": "3", "Jumlah_Pendatang": "0", "Status_Pendataan": "Selesai"}, {"Nama_RT": "RT 018 RW 03 DUSUN BENTENG TIMUR", "Nama_Petugas": "Haqqi Wirakaryadi", "Tanggal_Waktu": "6/10/2026 10:40:13", "Nama_Ketua_RT": "EFENDI", "Jumlah_Penduduk_Laki_Laki": "105", "Jumlah_Penduduk_Perempuan": "85", "Jumlah_Bumbung_Rumah": "54", "Jumlah_KK": "65", "Jumlah_Penduduk_Lansia": "10", "Jumlah_Kelahiran_Bayi": "0", "Jumlah_Kematian": "0", "Jumlah_Penerima_PKH": "0", "Jumlah_Penerima_BPNT": "0", "Jumlah_Penerima_BST": "0", "Jumlah_Penerima_BLT": "0", "Jumlah_Memiliki_KTP": "137", "Jumlah_Sekolah_TK": "2", "Jumlah_Sekolah_SD": "20", "Jumlah_Sekolah_SMP": "6", "Jumlah_Sekolah_SMA": "8", "Jumlah_Sekolah_Sarjana": "0", "Jumlah_Penduduk_Putus_Sekolah": "0", "Jumlah_Anak_Usia_0_1_Tahun": "0", "Jumlah_Anak_Usia_2_5_Tahun": "5", "Jumlah_Pendatang": "0", "Status_Pendataan": "Selesai"}, {"Nama_RT": "RT 012 RW 04 DUSUN SEPAKAT TENGAH", "Nama_Petugas": "Haqqi Wirakaryadi", "Tanggal_Waktu": "6/17/2026 10:28:32", "Nama_Ketua_RT": "MARINO", "Jumlah_Penduduk_Laki_Laki": "146", "Jumlah_Penduduk_Perempuan": "124", "Jumlah_Bumbung_Rumah": "54", "Jumlah_KK": "72", "Jumlah_Penduduk_Lansia": "41", "Jumlah_Kelahiran_Bayi": "0", "Jumlah_Kematian": "0", "Jumlah_Penerima_PKH": "0", "Jumlah_Penerima_BPNT": "0", "Jumlah_Penerima_BST": "0", "Jumlah_Penerima_BLT": "0", "Jumlah_Memiliki_KTP": "229", "Jumlah_Sekolah_TK": "0", "Jumlah_Sekolah_SD": "3", "Jumlah_Sekolah_SMP": "11", "Jumlah_Sekolah_SMA": "9", "Jumlah_Sekolah_Sarjana": "0", "Jumlah_Penduduk_Putus_Sekolah": "0", "Jumlah_Anak_Usia_0_1_Tahun": "0", "Jumlah_Anak_Usia_2_5_Tahun": "0", "Jumlah_Pendatang": "0", "Status_Pendataan": "Selesai"}, {"Nama_RT": "RT 006 RW 02 DUSUN BENTENG RAYA", "Nama_Petugas": "Haqqi Wirakaryadi", "Tanggal_Waktu": "6/8/2026 12:28:47", "Nama_Ketua_RT": "EFFENDI RAUPE", "Jumlah_Penduduk_Laki_Laki": "108", "Jumlah_Penduduk_Perempuan": "92", "Jumlah_Bumbung_Rumah": "56", "Jumlah_KK": "57", "Jumlah_Penduduk_Lansia": "14", "Jumlah_Kelahiran_Bayi": "1", "Jumlah_Kematian": "0", "Jumlah_Penerima_PKH": "2", "Jumlah_Penerima_BPNT": "0", "Jumlah_Penerima_BST": "0", "Jumlah_Penerima_BLT": "0", "Jumlah_Memiliki_KTP": "156", "Jumlah_Sekolah_TK": "3", "Jumlah_Sekolah_SD": "8", "Jumlah_Sekolah_SMP": "5", "Jumlah_Sekolah_SMA": "3", "Jumlah_Sekolah_Sarjana": "0", "Jumlah_Penduduk_Putus_Sekolah": "0", "Jumlah_Anak_Usia_0_1_Tahun": "1", "Jumlah_Anak_Usia_2_5_Tahun": "3", "Jumlah_Pendatang": "0", "Status_Pendataan": "Selesai"}, {"Nama_RT": "RT 029 RW 08 DUSUN KONSASI", "Nama_Petugas": "Haqqi Wirakaryadi", "Tanggal_Waktu": "6/11/2026 10:17:12", "Nama_Ketua_RT": "MARSYAD", "Jumlah_Penduduk_Laki_Laki": "56", "Jumlah_Penduduk_Perempuan": "52", "Jumlah_Bumbung_Rumah": "108", "Jumlah_KK": "34", "Jumlah_Penduduk_Lansia": "13", "Jumlah_Kelahiran_Bayi": "0", "Jumlah_Kematian": "0", "Jumlah_Penerima_PKH": "4", "Jumlah_Penerima_BPNT": "8", "Jumlah_Penerima_BST": "7", "Jumlah_Penerima_BLT": "1", "Jumlah_Memiliki_KTP": "59", "Jumlah_Sekolah_TK": "2", "Jumlah_Sekolah_SD": "6", "Jumlah_Sekolah_SMP": "2", "Jumlah_Sekolah_SMA": "1", "Jumlah_Sekolah_Sarjana": "0", "Jumlah_Penduduk_Putus_Sekolah": "7", "Jumlah_Anak_Usia_0_1_Tahun": "0", "Jumlah_Anak_Usia_2_5_Tahun": "8", "Jumlah_Pendatang": "0", "Status_Pendataan": "Selesai"}]</script>
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
            if (typeof AOS !== "undefined") { setTimeout(function() { AOS.refresh(); }, 300); }
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
                        + '<th style="cursor:pointer;" onclick="sortTableRT(\'Jumlah_Penduduk_Putus_Sekolah\')" title="Jumlah Anak Usia 7-18 Tahun yang Tidak Bersekolah">Putus Sekolah <i class="fas fa-sort text-muted ms-1" id="sort-icon-Jumlah_Penduduk_Putus_Sekolah"></i></th>'
                        + '<th style="cursor:pointer;" onclick="sortTableRT(\'_pctPutus\')" title="Persentase Anak Putus Sekolah terhadap Total Anak Bersekolah di RT: (Putus / Siswa) × 100%">#6 % Putus Sekolah <i class="fas fa-sort text-muted ms-1" id="sort-icon-_pctPutus"></i></th>'
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
            if (document.getElementById('kpi-pct-bansos')) document.getElementById('kpi-pct-bansos').innerText = pctBansos + '%';
            document.getElementById('kpi-fasilitas').innerText = fas.length;
            if (document.getElementById('kpi-ratio-ibadah')) document.getElementById('kpi-ratio-ibadah').innerText = ratioIbadah;

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

            generate20Flashcards(rt, fas);

            // Default initial sort: Sort RT table by Nama_RT ascending
            sortTableRT('Nama_RT', true);
            sortTableFas('Nama_Fasilitas', true);
        }

        // Interactive 3D Flashcards Logic (20 Dynamic Facts + Village Improvement Insights)
        var allFlashcardsData = [];
        var activeFlashcardsData = [];
        var swiperFlashcards = null;

        function generate20Flashcards(rt, fas) {
            if (!Array.isArray(rt) || !rt.length) return;

            var totalL = 0, totalP = 0, totalKK = 0, totalBumbung = 0, totalLansia = 0, totalBansos = 0, totalKTP = 0, totalPutusSekolah = 0, totalAnakSekolah = 0;
            
            rt.forEach(function(r) {
                totalL += parseInt(r.Jumlah_Penduduk_Laki_Laki || 0);
                totalP += parseInt(r.Jumlah_Penduduk_Perempuan || 0);
                totalKK += parseInt(r.Jumlah_KK || 0);
                totalBumbung += parseInt(r.Jumlah_Bumbung_Rumah || 0);
                totalLansia += parseInt(r.Jumlah_Penduduk_Lansia || 0);
                totalKTP += parseInt(r.Jumlah_Memiliki_KTP || 0);
                totalPutusSekolah += parseInt(r.Jumlah_Penduduk_Putus_Sekolah || 0);
                totalAnakSekolah += parseInt(r.Jumlah_Sekolah_TK || 0)
                                  + parseInt(r.Jumlah_Sekolah_SD || 0)
                                  + parseInt(r.Jumlah_Sekolah_SMP || 0)
                                  + parseInt(r.Jumlah_Sekolah_SMA || 0);
                totalBansos += parseInt(r.Jumlah_Penerima_PKH || 0)
                             + parseInt(r.Jumlah_Penerima_BPNT || 0)
                             + parseInt(r.Jumlah_Penerima_BLT || 0)
                             + parseInt(r.Jumlah_Penerima_BST || 0);
            });

            var totalPenduduk = totalL + totalP;
            var sexRatio = totalP > 0 ? ((totalL / totalP) * 100).toFixed(1) : '-';
            var artRata = totalKK > 0 ? (totalPenduduk / totalKK).toFixed(2) : '-';
            var kepadatan = totalBumbung > 0 ? (totalPenduduk / totalBumbung).toFixed(2) : '-';
            var pctLansia = totalPenduduk > 0 ? ((totalLansia / totalPenduduk) * 100).toFixed(1) : '-';
            var pctKTP = totalPenduduk > 0 ? ((totalKTP / totalPenduduk) * 100).toFixed(1) : '-';
            var pctBansos = totalPenduduk > 0 ? ((totalBansos / totalPenduduk) * 100).toFixed(1) : '-';
            var pctPutusSekolah = totalAnakSekolah > 0 ? ((totalPutusSekolah / totalAnakSekolah) * 100).toFixed(1) : '-';
            var bumbungPerKK = totalKK > 0 ? (totalBumbung / totalKK).toFixed(2) : '-';

            // RT Rekor Sorting
            var rtMaxPop = rt.slice().sort(function(a,b) { return (b._totalPop||0) - (a._totalPop||0); })[0] || {};
            var rtMinPop = rt.slice().sort(function(a,b) { return (a._totalPop||0) - (b._totalPop||0); })[0] || {};

            var rtMinKTP = rt.slice().filter(function(r){ return (r._totalPop||0) > 0; }).sort(function(a,b) { return (a._pctKTP||0) - (b._pctKTP||0); })[0] || {};
            var rtMaxLansiaPct = rt.slice().filter(function(r){ return (r._totalPop||0) > 0; }).sort(function(a,b) { return (b._pctLansia||0) - (a._pctLansia||0); })[0] || {};
            var rtMaxBansos = rt.slice().filter(function(r){ return (r._totalPop||0) > 0; }).sort(function(a,b) { return (b._pctBansos||0) - (a._pctBansos||0); })[0] || {};
            var rtMaxPutus = rt.slice().sort(function(a,b) { return parseInt(b.Jumlah_Penduduk_Putus_Sekolah||0) - parseInt(a.Jumlah_Penduduk_Putus_Sekolah||0); })[0] || {};
            var rtMaxKepadatan = rt.slice().filter(function(r){ return parseInt(r.Jumlah_Bumbung_Rumah||0)>0; }).sort(function(a,b) { return (b._kepadatan||0) - (a._kepadatan||0); })[0] || {};
            var rtMaxIbadah = rt.slice().sort(function(a,b) { return (b._cntIbadah||0) - (a._cntIbadah||0); })[0] || {};

            // Fasilitas stats
            var fasCatMap = {};
            var countIbadah = 0;
            fas.forEach(function(f) {
                var kat = (f.Kategori_Fasilitas || 'Lainnya').trim();
                fasCatMap[kat] = (fasCatMap[kat] || 0) + 1;
                if (kat.toLowerCase().indexOf('ibadah') !== -1 || kat.toLowerCase().indexOf('agama') !== -1) countIbadah++;
            });
            var topFasKat = Object.keys(fasCatMap).sort(function(a,b) { return fasCatMap[b] - fasCatMap[a]; })[0] || 'Tempat Ibadah';
            var topFasCount = fasCatMap[topFasKat] || 0;
            var ratioIbadah = totalPenduduk > 0 ? ((countIbadah / totalPenduduk) * 1000).toFixed(2) : '-';

            // RT tanpa fasilitas langsung
            var rtFasSet = new Set(fas.map(function(f) { return (f.RT || '').trim(); }));
            var rtZeroFasCount = rt.filter(function(r) { return !rtFasSet.has((r.Nama_RT || '').trim()); }).length;

            allFlashcardsData = [
                {
                    id: 1, category: 'demografi', badge: 'Populasi & Gender', isPerbaikan: false,
                    question: 'Berapa total populasi penduduk & rasio jenis kelamin (Sex Ratio) di Desa Sungai Bakau Kecil?',
                    answer: 'Total Penduduk: <strong>' + totalPenduduk.toLocaleString('id-ID') + ' Jiwa</strong> (' + totalL.toLocaleString('id-ID') + ' L & ' + totalP.toLocaleString('id-ID') + ' P). Sex Ratio desa adalah <strong>' + sexRatio + '</strong> (ada ' + sexRatio + ' Laki-laki per 100 Perempuan).'
                },
                {
                    id: 2, category: 'demografi', badge: 'Struktur KK', isPerbaikan: false,
                    question: 'Berapa jumlah Kartu Keluarga (KK) & rata-rata Anggota Rumah Tangga (ART) per KK?',
                    answer: 'Terdata sebanyak <strong>' + totalKK.toLocaleString('id-ID') + ' KK</strong>. Rata-rata ukuran keluarga adalah <strong>' + artRata + ' orang per KK</strong> (tipe keluarga sedang).'
                },
                {
                    id: 3, category: 'demografi', badge: 'Bumbung Rumah', isPerbaikan: false,
                    question: 'Berapa total fisik bangunan rumah warga & kepadatan rata-rata per bumbung rumah?',
                    answer: 'Terdapat <strong>' + totalBumbung.toLocaleString('id-ID') + ' unit bumbung rumah</strong> dengan rata-rata kepadatan <strong>' + kepadatan + ' jiwa per rumah</strong>.'
                },
                {
                    id: 4, category: 'rekor', badge: 'RT Populer', isPerbaikan: false,
                    question: 'RT manakah yang memiliki jumlah penduduk terbanyak di Desa Sungai Bakau Kecil?',
                    answer: '<strong>' + (rtMaxPop.Nama_RT || 'RT') + '</strong> (Ketua: ' + (rtMaxPop.Nama_Ketua_RT || '-') + ') merupakan RT paling padat penduduk dengan total <strong>' + (rtMaxPop._totalPop || 0) + ' Jiwa</strong>.'
                },
                {
                    id: 5, category: 'rekor', badge: 'Populasi Minimum', isPerbaikan: false,
                    question: 'RT manakah yang memiliki jumlah penduduk paling sedikit di desa ini?',
                    answer: '<strong>' + (rtMinPop.Nama_RT || 'RT') + '</strong> (Ketua: ' + (rtMinPop.Nama_Ketua_RT || '-') + ') dengan jumlah warga terdata sebanyak <strong>' + (rtMinPop._totalPop || 0) + ' Jiwa</strong>.'
                },
                {
                    id: 6, category: 'perbaikan', badge: '⚠️ Intervensi KTP-el', isPerbaikan: true,
                    question: 'RT mana yang memiliki % kepemilikan KTP-el terendah dan perlu layanan "Jemput Bola"?',
                    answer: '<strong>' + (rtMinKTP.Nama_RT || 'RT') + '</strong> baru mencatat <strong>' + (rtMinKTP._pctKTP || 0) + '% kepemilikan KTP-el</strong> (' + (rtMinKTP.Jumlah_Memiliki_KTP || 0) + ' dari ' + (rtMinKTP._totalPop || 0) + ' jiwa). <em>Rekomendasi: Pelayanan KTP-el keliling ke RT ini!</em>'
                },
                {
                    id: 7, category: 'lansia', badge: 'Tahap Penuaan', isPerbaikan: false,
                    question: 'Berapa total penduduk lansia dan berapa proporsinya terhadap seluruh warga desa?',
                    answer: 'Total Lansia: <strong>' + totalLansia.toLocaleString('id-ID') + ' Jiwa</strong> (<strong>' + pctLansia + '%</strong> populasi). Desa ini tergolong ke dalam struktur penuaan penduduk (*ageing population*).'
                },
                {
                    id: 8, category: 'perbaikan', badge: '⚠️ Prioritas Lansia', isPerbaikan: true,
                    question: 'RT manakah yang memiliki konsentrasi lansia paling tinggi & butuh posyandu lansia rutin?',
                    answer: '<strong>' + (rtMaxLansiaPct.Nama_RT || 'RT') + '</strong> mencatat proporsi lansia tertinggi yaitu <strong>' + (rtMaxLansiaPct._pctLansia || 0) + '%</strong> (' + (rtMaxLansiaPct.Jumlah_Penduduk_Lansia || 0) + ' lansia). <em>Perlu penguatan posyandu lansia rutin.</em>'
                },
                {
                    id: 9, category: 'lansia', badge: 'Bantuan Sosial', isPerbaikan: false,
                    question: 'Berapa total warga penerima manfaat Bantuan Sosial (PKH/BPNT/BLT/BST) di desa ini?',
                    answer: 'Total penerima manfaat bansos mencapai <strong>' + totalBansos.toLocaleString('id-ID') + ' penerima</strong> (<strong>' + pctBansos + '%</strong> dari total penduduk desa).'
                },
                {
                    id: 10, category: 'perbaikan', badge: '⚠️ Verifikasi Bansos', isPerbaikan: true,
                    question: 'RT mana dengan persentase penerima bansos tertinggi yang perlu pemutakhiran data berkala?',
                    answer: '<strong>' + (rtMaxBansos.Nama_RT || 'RT') + '</strong> mencatatkan persentase penerima bansos <strong>' + (rtMaxBansos._pctBansos || 0) + '%</strong>. <em>Perlu pemutakhiran data DTKS untuk memastikan ketepatan sasaran.</em>'
                },
                {
                    id: 11, category: 'perbaikan', badge: '⚠️ Putus Sekolah', isPerbaikan: true,
                    question: 'Berapa total anak putus sekolah dan RT manakah dengan angka kasus tertinggi?',
                    answer: 'Terdata <strong>' + totalPutusSekolah + ' anak putus sekolah</strong> (' + pctPutusSekolah + '% dari anak usia sekolah). Kasus terbanyak di <strong>' + (rtMaxPutus.Nama_RT || 'RT') + '</strong> (' + (rtMaxPutus.Jumlah_Penduduk_Putus_Sekolah || 0) + ' anak). <em>Perlu program pendampingan Kembali ke Sekolah.</em>'
                },
                {
                    id: 12, category: 'fasilitas', badge: 'Inventaris Spasial', isPerbaikan: false,
                    question: 'Berapa jumlah sarana & fasilitas umum yang sudah terinventarisasi lengkap dengan geotagging?',
                    answer: 'Sebanyak <strong>' + fas.length + ' titik lokasi fasilitas publik</strong> (Sekolah, Posyandu, Tempat Ibadah, Lapangan, dll.) telah terpetakan secara presisi.'
                },
                {
                    id: 13, category: 'fasilitas', badge: 'Dominasi Fasilitas', isPerbaikan: false,
                    question: 'Kategori fasilitas umum apakah yang paling banyak jumlahnya di Desa Sungai Bakau Kecil?',
                    answer: 'Kategori <strong>' + topFasKat + '</strong> merupakan sarana publik terbanyak dengan jumlah <strong>' + topFasCount + ' titik lokasi</strong>.'
                },
                {
                    id: 14, category: 'fasilitas', badge: 'Rasio Peribadatan', isPerbaikan: false,
                    question: 'Berapa jumlah tempat ibadah dan berapa rasionya per 1.000 penduduk desa?',
                    answer: 'Terdapat <strong>' + countIbadah + ' rumah ibadah</strong> di desa ini, yang menghasilkan rasio <strong>' + ratioIbadah + ' tempat ibadah per 1.000 penduduk</strong>.'
                },
                {
                    id: 15, category: 'rekor', badge: 'Sentra Ibadah', isPerbaikan: false,
                    question: 'RT mana yang menjadi konsentrasi rumah ibadah terbanyak di desa ini?',
                    answer: '<strong>' + (rtMaxIbadah.Nama_RT || 'RT') + '</strong> memiliki rumah ibadah terbanyak yaitu <strong>' + (rtMaxIbadah._cntIbadah || 0) + ' tempat ibadah</strong>.'
                },
                {
                    id: 16, category: 'perbaikan', badge: '⚠️ Kepadatan Hunian', isPerbaikan: true,
                    question: 'RT manakah yang paling padat tingkat huniannya (jiwa per bumbung rumah)?',
                    answer: '<strong>' + (rtMaxKepadatan.Nama_RT || 'RT') + '</strong> mencatat kepadatan terpadat dengan <strong>' + (rtMaxKepadatan._kepadatan || 0) + ' jiwa per bumbung rumah</strong>. <em>Berpotensi memerlukan perhatian ventilasi & sanitasi lingkungan.</em>'
                },
                {
                    id: 17, category: 'demografi', badge: 'Cakupan RT SDI', isPerbaikan: false,
                    question: 'Berapa total Satuan Lingkungan Setempat (RT) yang tercakup dalam pendataan SDI desa ini?',
                    answer: 'Sebanyak <strong>' + rt.length + ' RT</strong> terdata secara akurat berbasis rekapan kewilayahan RT (unit observasi: Ketua RT).'
                },
                {
                    id: 18, category: 'demografi', badge: 'Kemandirian Tempat Tinggal', isPerbaikan: false,
                    question: 'Berapa rasio bumbung rumah fisik dibanding total KK di desa ini?',
                    answer: 'Rasio bumbung rumah/KK adalah <strong>' + bumbungPerKK + ' rumah per KK</strong>. Nilai ini menunjukkan sebagian besar keluarga di desa telah menempati bangunan rumah mandiri.'
                },
                {
                    id: 19, category: 'perbaikan', badge: '⚠️ Akses Sarana Publik', isPerbaikan: true,
                    question: 'Berapa jumlah RT yang belum memiliki fasilitas publik terdaftar langsung di wilayah RT-nya?',
                    answer: 'Sebanyak <strong>' + rtZeroFasCount + ' RT</strong> belum memiliki titik fasilitas publik fisik terdaftar langsung di RT setempat. <em>Perlu kemudahan akses lintas RT.</em>'
                },
                {
                    id: 20, category: 'perbaikan', badge: '💡 Action Plan Desa', isPerbaikan: true,
                    question: 'Apa 3 rekomendasi kebijakan utama berbasis data (Data-Driven Policy) untuk desa ini?',
                    answer: '<strong>1) Jemput bola KTP-el</strong> di ' + (rtMinKTP.Nama_RT || 'RT') + '<br><strong>2) Pendampingan Putus Sekolah</strong> di ' + (rtMaxPutus.Nama_RT || 'RT') + '<br><strong>3) Posyandu Lansia Ekstra</strong> di ' + (rtMaxLansiaPct.Nama_RT || 'RT') + '.'
                }
            ];

            activeFlashcardsData = allFlashcardsData.slice();
            renderFlashcards(activeFlashcardsData);
        }

        function renderFlashcards(cards) {
            var wrapper = document.getElementById('flashcards-swiper-wrapper');
            var badgeCount = document.getElementById('flashcards-count-badge');
            if (!wrapper) return;

            if (badgeCount) badgeCount.innerText = cards.length + ' Flashcard';

            var html = '';
            cards.forEach(function(card, idx) {
                var cardClass = card.isPerbaikan ? 'flashcard-container is-perbaikan' : 'flashcard-container';
                var badgeBg = card.isPerbaikan ? 'bg-danger text-white' : (card.category === 'rekor' ? 'bg-warning text-dark' : 'bg-success-subtle text-success');
                
                html += '<div class="swiper-slide">'
                     +  '  <div class="' + cardClass + '" onclick="toggleFlipCard(this)">'
                     +  '    <div class="flashcard-inner">'
                     +  '      <div class="flashcard-front shadow-sm">'
                     +  '        <div class="d-flex justify-content-between align-items-center w-100 mb-2">'
                     +  '          <span class="badge ' + badgeBg + ' flashcard-badge"><i class="fas fa-tag me-1"></i>' + card.badge + '</span>'
                     +  '          <span class="badge bg-light text-secondary rounded-circle px-2 py-1 small fw-bold">#' + (idx + 1) + '</span>'
                     +  '        </div>'
                     +  '        <div class="my-auto text-center px-2">'
                     +  '          <i class="' + (card.isPerbaikan ? 'fas fa-exclamation-triangle text-danger fs-1 mb-3' : 'fas fa-question-circle text-primary fs-1 mb-3') + '"></i>'
                     +  '          <h6 class="fw-bold text-dark lh-base mb-0">' + card.question + '</h6>'
                     +  '        </div>'
                     +  '        <div class="text-muted extra-small fw-semibold mt-2 text-center">'
                     +  '          <i class="fas fa-hand-pointer me-1 text-primary"></i> Klik / Sentuh untuk buka jawaban'
                     +  '        </div>'
                     +  '      </div>'
                     +  '      <div class="flashcard-back shadow-sm">'
                     +  '        <div class="d-flex justify-content-between align-items-center w-100 mb-2">'
                     +  '          <span class="badge bg-white text-dark flashcard-badge"><i class="fas fa-lightbulb text-warning me-1"></i>' + card.badge + '</span>'
                     +  '          <span class="badge bg-white-50 text-white rounded-circle px-2 py-1 small fw-bold">#' + (idx + 1) + '</span>'
                     +  '        </div>'
                     +  '        <div class="my-auto text-start px-2 w-100">'
                     +  '          <p class="mb-0 fs-6 lh-base">' + card.answer + '</p>'
                     +  '        </div>'
                     +  '        <div class="text-white-50 extra-small fw-semibold mt-2 text-center">'
                     +  '          <i class="fas fa-undo me-1"></i> Klik lagi untuk balikkan'
                     +  '        </div>'
                     +  '      </div>'
                     +  '    </div>'
                     +  '  </div>'
                     +  '</div>';
            });

            wrapper.innerHTML = html;

            if (swiperFlashcards) {
                swiperFlashcards.destroy(true, true);
            }

            swiperFlashcards = new Swiper('.swiper-flashcards', {
                slidesPerView: 1,
                spaceBetween: 20,
                loop: false,
                pagination: {
                    el: '.swiper-pagination-flashcards',
                    clickable: true,
                    type: 'fraction'
                },
                navigation: {
                    nextEl: '.swiper-button-next-flashcard',
                    prevEl: '.swiper-button-prev-flashcard',
                },
                breakpoints: {
                    640: { slidesPerView: 1.2, spaceBetween: 20 },
                    768: { slidesPerView: 2.2, spaceBetween: 24 },
                    1024: { slidesPerView: 3.2, spaceBetween: 28 }
                }
            });
        }

        function toggleFlipCard(el) {
            if (el) el.classList.toggle('flipped');
        }

        function filterFlashcards(cat, btn) {
            document.querySelectorAll('#flashcard-filter-container .btn-fc-filter').forEach(function(b) {
                b.className = 'btn btn-sm btn-outline-secondary rounded-pill px-3 fw-semibold btn-fc-filter';
            });
            if (btn) btn.className = 'btn btn-sm btn-primary rounded-pill px-3 fw-semibold active btn-fc-filter';

            if (cat === 'all') {
                activeFlashcardsData = allFlashcardsData.slice();
            } else {
                activeFlashcardsData = allFlashcardsData.filter(function(card) {
                    return card.category === cat;
                });
            }
            renderFlashcards(activeFlashcardsData);
        }

        function shuffleFlashcards() {
            var arr = activeFlashcardsData.slice();
            for (var i = arr.length - 1; i > 0; i--) {
                var j = Math.floor(Math.random() * (i + 1));
                var temp = arr[i];
                arr[i] = arr[j];
                arr[j] = temp;
            }
            activeFlashcardsData = arr;
            renderFlashcards(activeFlashcardsData);
        }

        function flipAllFlashcards(showAnswer) {
            var cards = document.querySelectorAll('.flashcard-container');
            cards.forEach(function(card) {
                if (showAnswer) {
                    card.classList.add('flipped');
                } else {
                    card.classList.remove('flipped');
                }
            });
        }

        function resetFlashcards() {
            filterFlashcards('all', document.querySelector('#flashcard-filter-container button'));
            flipAllFlashcards(false);
            if (swiperFlashcards) swiperFlashcards.slideTo(0);
        }

        // Render Bar Chart: Sorted from Largest to Smallest total population for ALL RTs
        function renderDemografiChart(rt) {
            var sorted = rt.slice().sort(function(a, b) {
                var popA = parseInt(a.Jumlah_Penduduk_Laki_Laki || 0) + parseInt(a.Jumlah_Penduduk_Perempuan || 0);
                var popB = parseInt(b.Jumlah_Penduduk_Laki_Laki || 0) + parseInt(b.Jumlah_Penduduk_Perempuan || 0);
                return popB - popA; // Descending order
            });

            var count = sorted.length;
            var container = document.getElementById('chartDemografiContainer');
            if (container) {
                // Dynamically set container width based on total RT count (at least 48px per RT bar)
                var minWidth = Math.max(800, count * 48);
                container.style.width = minWidth + 'px';
            }

            if (document.getElementById('rt-chart-count-badge')) {
                document.getElementById('rt-chart-count-badge').innerText = count + ' RT Terdata';
            }

            var ctx = document.getElementById('chartDemografi').getContext('2d');
            if (chartDemografiInstance) chartDemografiInstance.destroy();
            chartDemografiInstance = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: sorted.map(function(d) { return d.Nama_RT ? d.Nama_RT.replace('DUSUN ', '').replace('RW ', '') : 'RT'; }),
                    datasets: [
                        { label: 'Penduduk (Jiwa)', data: sorted.map(function(d) { return parseInt(d.Jumlah_Penduduk_Laki_Laki||0)+parseInt(d.Jumlah_Penduduk_Perempuan||0); }), backgroundColor: '#0D9488', borderRadius: 4 },
                        { label: 'Jumlah KK', data: sorted.map(function(d) { return parseInt(d.Jumlah_KK||0); }), backgroundColor: '#F59E0B', borderRadius: 4 }
                    ]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: { position: 'top' },
                        title: { display: true, text: 'Demografi Seluruh Wilayah RT (Terurut dari Penduduk Terbesar → Terkecil)' }
                    },
                    scales: {
                        x: {
                            ticks: {
                                autoSkip: false,
                                maxRotation: 45,
                                minRotation: 45,
                                font: { size: 10 }
                            }
                        },
                        y: {
                            beginAtZero: true
                        }
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
                    // #1 Sex ratio formatting
                    var sexRatioBadge = (r._sexRatio >= 95 && r._sexRatio <= 110)
                        ? '<span class="badge bg-primary-subtle text-primary fw-bold">' + (r._sexRatio || 0) + '</span>'
                        : '<span class="badge bg-info-subtle text-dark fw-bold">' + (r._sexRatio || 0) + '</span>';

                    // #2 ART rata-rata
                    var artBadge = '<span class="badge bg-success-subtle text-success fw-bold">' + (r._artRata || 0) + '</span>';

                    // #3 Lansia % formatting (Ageing: >=10%, high: >=15%)
                    var lansiaPctBadge = (r._pctLansia >= 15)
                        ? '<span class="badge bg-warning text-dark fw-bold border border-warning-subtle" title="Konsentrasi Lansia Tinggi: ≥15%"><i class="fas fa-user-clock me-1"></i>' + r._pctLansia + '%</span>'
                        : (r._pctLansia >= 10
                            ? '<span class="badge bg-warning-subtle text-dark fw-bold">' + r._pctLansia + '%</span>'
                            : '<span class="badge bg-light text-muted border">' + r._pctLansia + '%</span>');

                    // #4 KTP % formatting (Target: >=80% Hijau, 70-79% Info, <70% Merah)
                    var ktpPctBadge = (r._pctKTP >= 80)
                        ? '<span class="badge bg-success-subtle text-success fw-bold border border-success-subtle"><i class="fas fa-check-circle me-1"></i>' + r._pctKTP + '%</span>'
                        : (r._pctKTP >= 70
                            ? '<span class="badge bg-info-subtle text-info-emphasis fw-bold">' + r._pctKTP + '%</span>'
                            : '<span class="badge bg-danger-subtle text-danger fw-bold border border-danger-subtle" title="Cakupan KTP Rendah (<70%): Perlu Jemput Bola Adminduk"><i class="fas fa-id-card me-1"></i>' + r._pctKTP + '%</span>');

                    // #5 Bansos % formatting
                    var bansosPctBadge = (r._pctBansos > 10)
                        ? '<span class="badge bg-danger-subtle text-danger fw-bold border border-danger-subtle" title="Tingkat Kerentanan Sosial Tinggi: >10% penerima bansos">' + r._pctBansos + '%</span>'
                        : (r._pctBansos > 0
                            ? '<span class="badge bg-primary-subtle text-primary fw-bold">' + r._pctBansos + '%</span>'
                            : '<span class="badge bg-light text-muted border">0%</span>');

                    // #6 Putus Sekolah formatting
                    var putusPctBadge = (r._pctPutus > 10)
                        ? '<span class="badge bg-danger-subtle text-danger fw-bold border border-danger-subtle" title="Perlu Intervensi: >10% dari siswa di RT ini"><i class="fas fa-exclamation-circle me-1"></i>' + r._pctPutus + '%</span>'
                        : (r._pctPutus > 0
                            ? '<span class="badge bg-warning-subtle text-dark fw-bold border border-warning-subtle">' + r._pctPutus + '%</span>'
                            : '<span class="badge bg-light text-muted border">0%</span>');

                    // #7 Kepadatan hunian
                    var kepadatanBadge = (r._kepadatan >= 5.0)
                        ? '<span class="badge bg-warning-subtle text-dark fw-bold" title="Kepadatan Hunian Tinggi (≥5 Jiwa/Rumah)"><i class="fas fa-home me-1"></i>' + r._kepadatan + '</span>'
                        : '<span class="badge bg-secondary-subtle text-secondary-emphasis fw-bold">' + (r._kepadatan || 0) + '</span>';

                    // #8 Ibadah rasio
                    var ibadahBadge = (r._ratioIbadah > 0)
                        ? '<span class="badge bg-teal-subtle text-teal fw-bold" style="background:#ccfbf1;color:#0f766e;"><i class="fas fa-mosque me-1"></i>' + r._ratioIbadah + '</span>'
                        : '<span class="badge bg-light text-muted border">0</span>';

                    tr.innerHTML = '<td class="fw-bold text-nowrap">' + escHtml(r.Nama_RT) + '</td>'
                        + '<td>' + sexRatioBadge + '</td>'
                        + '<td>' + artBadge + '</td>'
                        + '<td class="fw-bold text-dark">' + (r.Jumlah_Penduduk_Lansia || 0) + '</td>'
                        + '<td>' + lansiaPctBadge + '</td>'
                        + '<td class="fw-bold text-dark">' + (r.Jumlah_Memiliki_KTP || 0) + '</td>'
                        + '<td>' + ktpPctBadge + '</td>'
                        + '<td class="fw-bold text-dark">' + (r._cntBansos || 0) + '</td>'
                        + '<td>' + bansosPctBadge + '</td>'
                        + '<td class="fw-bold ' + ((r.Jumlah_Penduduk_Putus_Sekolah || 0) > 0 ? 'text-danger' : 'text-muted') + '">' + (r.Jumlah_Penduduk_Putus_Sekolah || 0) + '</td>'
                        + '<td>' + putusPctBadge + '</td>'
                        + '<td>' + kepadatanBadge + '</td>'
                        + '<td class="fw-bold text-dark">' + (r._cntIbadah || 0) + '</td>'
                        + '<td>' + ibadahBadge + '</td>';
                } else {
                    var total = parseInt(r.Jumlah_Penduduk_Laki_Laki||0) + parseInt(r.Jumlah_Penduduk_Perempuan||0);
                    tr.innerHTML = '<td class="fw-bold text-nowrap">' + escHtml(r.Nama_RT) + '</td>'
                        + '<td class="text-nowrap">' + escHtml(r.Nama_Ketua_RT) + '</td>'
                        + '<td>' + (r.Jumlah_Penduduk_Laki_Laki||0) + '</td>'
                        + '<td>' + (r.Jumlah_Penduduk_Perempuan||0) + '</td>'
                        + '<td class="fw-bold text-primary">' + total + '</td>'
                        + '<td>' + (r.Jumlah_KK||0) + '</td>'
                        + '<td>' + (r.Jumlah_Bumbung_Rumah||0) + '</td>'
                        + '<td>' + (r.Jumlah_Penduduk_Lansia||0) + '</td>'
                        + '<td>' + (r.Jumlah_Memiliki_KTP||0) + '</td>'
                        + '<td><span class="badge bg-success-subtle text-success fw-bold border border-success-subtle"><i class="fas fa-check-double me-1"></i>' + escHtml(r.Status_Pendataan||'Selesai') + '</span></td>';
                }
                tbody.appendChild(tr);
            });
            filterTableRT();
        }

        function renderTableFas(fas) {
            var tbody = document.querySelector('#table-fas tbody');
            if (!tbody) return;
            tbody.innerHTML = '';
            fas.forEach(function(r) {
                var dirBtn = '-';
                if (r.Lokasi_GPS && r.Lokasi_GPS.indexOf(',') !== -1) {
                    var p = r.Lokasi_GPS.split(',');
                    var lat = p[0].trim();
                    var lng = p[1].trim();
                    if (!isNaN(parseFloat(lat)) && !isNaN(parseFloat(lng))) {
                        var dirUrl = 'https://www.google.com/maps/dir/?api=1&destination=' + lat + ',' + lng;
                        dirBtn = '<a href="' + dirUrl + '" target="_blank" class="btn btn-xs btn-outline-primary rounded-pill px-2 py-1 text-nowrap extra-small" style="font-size:11px;">'
                            + '<i class="fas fa-location-arrow me-1"></i> Rute'
                            + '</a>';
                    }
                }

                // Badge Kategori Fasilitas
                var kat = (r.Kategori_Fasilitas || '').toLowerCase();
                var katBadge = '<span class="badge bg-secondary">' + escHtml(r.Kategori_Fasilitas) + '</span>';
                if (kat.indexOf('ibadah') !== -1 || kat.indexOf('agama') !== -1) {
                    katBadge = '<span class="badge bg-success-subtle text-success border border-success-subtle fw-semibold"><i class="fas fa-mosque me-1"></i>' + escHtml(r.Kategori_Fasilitas) + '</span>';
                } else if (kat.indexOf('pendidikan') !== -1 || kat.indexOf('sekolah') !== -1) {
                    katBadge = '<span class="badge bg-primary-subtle text-primary border border-primary-subtle fw-semibold"><i class="fas fa-graduation-cap me-1"></i>' + escHtml(r.Kategori_Fasilitas) + '</span>';
                } else if (kat.indexOf('kesehatan') !== -1 || kat.indexOf('posyandu') !== -1) {
                    katBadge = '<span class="badge bg-danger-subtle text-danger border border-danger-subtle fw-semibold"><i class="fas fa-heart-pulse me-1"></i>' + escHtml(r.Kategori_Fasilitas) + '</span>';
                } else if (kat.indexOf('pemerintah') !== -1 || kat.indexOf('kantor') !== -1) {
                    katBadge = '<span class="badge bg-dark-subtle text-dark border fw-semibold"><i class="fas fa-landmark me-1"></i>' + escHtml(r.Kategori_Fasilitas) + '</span>';
                }

                // Badge Kondisi Bangunan
                var kondisi = (r.Kondisi_Bangunan || 'Baik').toLowerCase();
                var kondisiBadge = '<span class="badge bg-success-subtle text-success fw-bold border border-success-subtle"><i class="fas fa-check-circle me-1"></i>Baik</span>';
                if (kondisi.indexOf('rusak berat') !== -1) {
                    kondisiBadge = '<span class="badge bg-danger-subtle text-danger fw-bold border border-danger-subtle"><i class="fas fa-triangle-exclamation me-1"></i>Rusak Berat</span>';
                } else if (kondisi.indexOf('rusak') !== -1 || kondisi.indexOf('sedang') !== -1 || kondisi.indexOf('ringan') !== -1) {
                    kondisiBadge = '<span class="badge bg-warning-subtle text-dark fw-bold border border-warning-subtle"><i class="fas fa-wrench me-1"></i>' + escHtml(r.Kondisi_Bangunan) + '</span>';
                }

                var tr = document.createElement('tr');
                tr.innerHTML = '<td><code>' + escHtml(r.ID_Fasilitas) + '</code></td>'
                    + '<td class="fw-bold text-dark text-nowrap">' + escHtml(r.Nama_Fasilitas) + '</td>'
                    + '<td>' + katBadge + '</td>'
                    + '<td>' + escHtml(r.Sub_Kategori) + '</td>'
                    + '<td class="fw-semibold text-nowrap">' + escHtml(r.RT) + '</td>'
                    + '<td>' + kondisiBadge + '</td>'
                    + '<td><span class="badge bg-light text-dark border">' + escHtml(r.Sumber_Listrik || 'PLN') + '</span></td>'
                    + '<td><span class="badge bg-light text-dark border">' + escHtml(r.Sumber_Air_Bersih || '-') + '</span></td>'
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

        // Comprehensive Multi-Sheet Excel Data Export Logic (SDI Compliant)
        function downloadCurrentTableExcel() {
            downloadComprehensiveSDIWorkbook();
        }
        function downloadCurrentTableCSV() { downloadCurrentTableExcel(); }
        function exportRTToExcel() { downloadComprehensiveSDIWorkbook(); }
        function exportFasToExcel() { downloadComprehensiveSDIWorkbook(); }

        function downloadComprehensiveSDIWorkbook() {
            if (!rawRTData || !rawRTData.length) {
                alert('Data RT dan Fasilitas belum siap diunduh.');
                return;
            }

            // 1. Calculate Aggregate Statistics for Sheet 1 & 5
            var totalL = 0, totalP = 0, totalKK = 0, totalBumbung = 0, totalLansia = 0;
            var totalBansos = 0, totalKTP = 0, totalPutusSekolah = 0, totalAnakSekolah = 0;
            var totalTK = 0, totalSD = 0, totalSMP = 0, totalSMA = 0, totalSarjana = 0;
            var totalPKH = 0, totalBPNT = 0, totalBST = 0, totalBLT = 0;
            var totalLahir = 0, totalMati = 0, totalPendatang = 0;

            var dusunMap = {};

            rawRTData.forEach(function(r) {
                var l = parseInt(r.Jumlah_Penduduk_Laki_Laki || 0);
                var p = parseInt(r.Jumlah_Penduduk_Perempuan || 0);
                var pop = l + p;
                var kk = parseInt(r.Jumlah_KK || 0);
                var bumbung = parseInt(r.Jumlah_Bumbung_Rumah || 0);
                var lansia = parseInt(r.Jumlah_Penduduk_Lansia || 0);
                var ktp = parseInt(r.Jumlah_Memiliki_KTP || 0);
                var pkh = parseInt(r.Jumlah_Penerima_PKH || 0);
                var bpnt = parseInt(r.Jumlah_Penerima_BPNT || 0);
                var bst = parseInt(r.Jumlah_Penerima_BST || 0);
                var blt = parseInt(r.Jumlah_Penerima_BLT || 0);
                var bansos = pkh + bpnt + bst + blt;
                var putus = parseInt(r.Jumlah_Penduduk_Putus_Sekolah || 0);
                var tk = parseInt(r.Jumlah_Sekolah_TK || 0);
                var sd = parseInt(r.Jumlah_Sekolah_SD || 0);
                var smp = parseInt(r.Jumlah_Sekolah_SMP || 0);
                var sma = parseInt(r.Jumlah_Sekolah_SMA || 0);
                var sarjana = parseInt(r.Jumlah_Sekolah_Sarjana || 0);
                var lahir = parseInt(r.Jumlah_Kelahiran_Bayi || 0);
                var mati = parseInt(r.Jumlah_Kematian || 0);
                var pendatang = parseInt(r.Jumlah_Pendatang || 0);

                totalL += l;
                totalP += p;
                totalKK += kk;
                totalBumbung += bumbung;
                totalLansia += lansia;
                totalKTP += ktp;
                totalPKH += pkh;
                totalBPNT += bpnt;
                totalBST += bst;
                totalBLT += blt;
                totalBansos += bansos;
                totalPutusSekolah += putus;
                totalTK += tk;
                totalSD += sd;
                totalSMP += smp;
                totalSMA += sma;
                totalSarjana += sarjana;
                totalAnakSekolah += (tk + sd + smp + sma);
                totalLahir += lahir;
                totalMati += mati;
                totalPendatang += pendatang;

                // Extract Dusun Name
                var rtName = (r.Nama_RT || '').trim();
                var dusunName = 'Lainnya';
                var dIdx = rtName.indexOf('DUSUN');
                if (dIdx !== -1) {
                    dusunName = rtName.substring(dIdx).trim();
                } else if (rtName.indexOf('RW') !== -1) {
                    dusunName = rtName.substring(rtName.indexOf('RW')).trim();
                }

                if (!dusunMap[dusunName]) {
                    dusunMap[dusunName] = {
                        nama: dusunName,
                        rtCount: 0,
                        l: 0, p: 0, pop: 0, kk: 0, bumbung: 0,
                        lansia: 0, ktp: 0, bansos: 0, putus: 0, fasCount: 0
                    };
                }
                dusunMap[dusunName].rtCount++;
                dusunMap[dusunName].l += l;
                dusunMap[dusunName].p += p;
                dusunMap[dusunName].pop += pop;
                dusunMap[dusunName].kk += kk;
                dusunMap[dusunName].bumbung += bumbung;
                dusunMap[dusunName].lansia += lansia;
                dusunMap[dusunName].ktp += ktp;
                dusunMap[dusunName].bansos += bansos;
                dusunMap[dusunName].putus += putus;
            });

            var totalPop = totalL + totalP;
            var totalFas = (rawFasData && rawFasData.length) ? rawFasData.length : 0;
            var countIbadah = 0, countPendidikan = 0, countKesehatan = 0, countPemerintah = 0, countLainnya = 0;
            var countAspal = 0, countPerkerasan = 0, countTanah = 0;

            (rawFasData || []).forEach(function(f) {
                var kat = (f.Kategori_Fasilitas || '').toLowerCase();
                if (kat.indexOf('ibadah') !== -1 || kat.indexOf('agama') !== -1) countIbadah++;
                else if (kat.indexOf('pendidikan') !== -1) countPendidikan++;
                else if (kat.indexOf('kesehatan') !== -1) countKesehatan++;
                else if (kat.indexOf('pemerintah') !== -1) countPemerintah++;
                else countLainnya++;

                var akses = (f.Akses_Jalan || '').toLowerCase();
                if (akses.indexOf('aspal') !== -1 || akses.indexOf('beton') !== -1) countAspal++;
                else if (akses.indexOf('perkerasan') !== -1 || akses.indexOf('batu') !== -1) countPerkerasan++;
                else if (akses.indexOf('tanah') !== -1) countTanah++;

                // Map fas to dusun
                var fRt = (f.RT || '').trim();
                var dIdx = fRt.indexOf('DUSUN');
                if (dIdx !== -1) {
                    var dName = fRt.substring(dIdx).trim();
                    if (dusunMap[dName]) dusunMap[dName].fasCount++;
                }
            });

            // ==========================================
            // SHEET 1: RINGKASAN & INDIKATOR SDI DESA
            // ==========================================
            var s1Rows = [
                ["REKAPITULASI PROFIL DESA CANTIK & INDIKATOR SDI 2026"],
                ["DESA SUNGAI BAKAU KECIL - KECAMATAN MEMPAWAH TIMUR, KABUPATEN MEMPAWAH"],
                ["Standar: Satu Data Indonesia (SDI) | Pembina Teknis: BPS Kabupaten Mempawah"],
                ["Tanggal Ekspor Data:", new Date().toLocaleDateString('id-ID', { year:'numeric', month:'long', day:'numeric' })],
                [],
                ["No", "Nama Variabel / Indikator SDI", "Nilai", "Satuan", "Keterangan & Catatan Metodologi"],
                [1, "Total Populasi Penduduk", totalPop, "Jiwa", "Hasil pendataan mikro CAPI AppSheet 37 RT"],
                [2, "Penduduk Laki-Laki", totalL, "Jiwa", (totalPop > 0 ? (totalL / totalPop * 100).toFixed(2) : 0) + "% dari total penduduk"],
                [3, "Penduduk Perempuan", totalP, "Jiwa", (totalPop > 0 ? (totalP / totalPop * 100).toFixed(2) : 0) + "% dari total penduduk"],
                [4, "Rasio Jenis Kelamin (Sex Ratio) [#1]", totalP > 0 ? parseFloat((totalL / totalP * 100).toFixed(2)) : 0, "L / 100 P", "Jumlah penduduk laki-laki per 100 perempuan"],
                [5, "Jumlah Kepala Keluarga (KK)", totalKK, "KK", "Tersebar di 37 RT dalam 8 Dusun"],
                [6, "Rata-rata Anggota Rumah Tangga (ART) [#2]", totalKK > 0 ? parseFloat((totalPop / totalKK).toFixed(2)) : 0, "Jiwa / KK", "Rata-rata tanggungan per Kepala Keluarga"],
                [7, "Jumlah Bumbung Rumah (Unit Fisik Hunian)", totalBumbung, "Unit", "Total bangunan tempat tinggal terdata"],
                [8, "Kepadatan Hunian (Jiwa / Rumah) [#7]", totalBumbung > 0 ? parseFloat((totalPop / totalBumbung).toFixed(2)) : 0, "Jiwa / Rumah", "Rata-rata penghuni per unit rumah"],
                [9, "Populasi Lansia (≥ 60 Tahun)", totalLansia, "Jiwa", "Penduduk usia lanjut terdata"],
                [10, "Proporsi Penduduk Lansia [#3]", totalPop > 0 ? (totalLansia / totalPop * 100).toFixed(2) + "%" : "0%", "Persen", "Persentase kelompok lansia terhadap total penduduk"],
                [11, "Warga Memiliki KTP-el", totalKTP, "Jiwa", "Warga yang telah memiliki identitas KTP-el"],
                [12, "Tingkat Kepemilikan KTP-el [#4]", totalPop > 0 ? (totalKTP / totalPop * 100).toFixed(2) + "%" : "0%", "Persen", "Cakupan kepemilikan dokumen identitas kependudukan"],
                [13, "Total KK Penerima Bantuan Sosial", totalBansos, "KK", "Akumulasi penerima manfaat PKH, BPNT, BST, & BLT"],
                [14, "Persentase KK Penerima Bansos [#5]", totalPop > 0 ? (totalBansos / totalPop * 100).toFixed(2) + "%" : "0%", "Persen", "Rincian: PKH=" + totalPKH + ", BPNT=" + totalBPNT + ", BST=" + totalBST + ", BLT=" + totalBLT],
                [15, "Jumlah Anak Putus Sekolah (7-18 Tahun)", totalPutusSekolah, "Anak", "Anak usia wajib belajar yang tidak bersekolah"],
                [16, "Persentase Anak Putus Sekolah [#6]", totalAnakSekolah > 0 ? (totalPutusSekolah / totalAnakSekolah * 100).toFixed(2) + "%" : "0%", "Persen", "Dibandingkan total anak usia sekolah terdata (" + totalAnakSekolah + " anak)"],
                [17, "Total Sarana & Fasilitas Umum Terdata", totalFas, "Unit", "Terinventarisasi dengan koordinat GPS dan foto"],
                [18, "Sarana Ibadah (Masjid, Surau, Vihara)", countIbadah, "Unit", "53,1% dari total fasilitas desa"],
                [19, "Rasio Sarana Ibadah per 1.000 Jiwa [#8]", totalPop > 0 ? parseFloat((countIbadah / totalPop * 1000).toFixed(2)) : 0, "Unit / 1.000 Jiwa", "Kecukupan sarana peribadatan per 1.000 penduduk"],
                [20, "Sarana Pendidikan (TK, SD, SMP, SMA, Ponpes)", countPendidikan, "Unit", "24,5% dari total fasilitas desa"],
                [21, "Sarana Kesehatan (Posyandu, Poskesdes)", countKesehatan, "Unit", "18,4% dari total fasilitas desa"],
                [22, "Kantor Pemerintahan Desa", countPemerintah, "Unit", "Pusat pelayanan administrasi & posko Desa Cantik"],
                [23, "Fasilitas & Bangunan Lainnya", countLainnya, "Unit", "Penggalangan sampan warga"],
                [24, "Kondisi Akses Jalan: Aspal / Beton", countAspal + " unit (" + (totalFas > 0 ? (countAspal / totalFas * 100).toFixed(1) : 0) + "%)", "Persen", "Dapat diakses kendaraan roda 4"],
                [25, "Kondisi Akses Jalan: Perkerasan / Batu", countPerkerasan + " unit (" + (totalFas > 0 ? (countPerkerasan / totalFas * 100).toFixed(1) : 0) + "%)", "Persen", "Dapat diakses kendaraan roda 4"],
                [26, "Kondisi Akses Jalan: Jalan Tanah", countTanah + " unit (" + (totalFas > 0 ? (countTanah / totalFas * 100).toFixed(1) : 0) + "%)", "Persen", "Dapat diakses kendaraan roda 2"],
                [],
                ["KOMPOSISI PENDIDIKAN TERCATAT (JIWA)"],
                ["Jenjang TK", totalTK, "Jiwa", "Pendidikan Anak Usia Dini / TK"],
                ["Jenjang SD / MI", totalSD, "Jiwa", "Pendidikan Dasar"],
                ["Jenjang SMP / MTs", totalSMP, "Jiwa", "Pendidikan Menengah Pertama"],
                ["Jenjang SMA / SMK / MA", totalSMA, "Jiwa", "Pendidikan Menengah Atas"],
                ["Jenjang Diploma / Sarjana", totalSarjana, "Jiwa", "Pendidikan Tinggi"],
                [],
                ["DINAMIKA KEPENDUDUKAN TERCATAT (JIWA)"],
                ["Kelahiran Bayi", totalLahir, "Jiwa", "Bayi baru lahir tahun berjalan"],
                ["Kematian", totalMati, "Jiwa", "Kematian tercatat tahun berjalan"],
                ["Pendatang Baru", totalPendatang, "Jiwa", "Warga pendatang masuk ke desa"]
            ];

            // ==========================================
            // SHEET 2: 8 INDIKATOR SDI PER RT
            // ==========================================
            var s2Rows = [
                [
                    "No", "Nama RT", "Dusun", "Nama Ketua RT", "Total Penduduk",
                    "Penduduk L", "Penduduk P", "Sex Ratio [#1]", "Rata-rata ART [#2]",
                    "Jumlah Lansia", "Proporsi Lansia [#3] (%)", "Jumlah KTP-el", "Kepemilikan KTP-el [#4] (%)",
                    "Jumlah KK", "Jumlah Bansos (KK)", "Persentase Bansos [#5] (%)",
                    "Jumlah Putus Sekolah", "Persentase Putus Sekolah [#6] (%)",
                    "Jumlah Bumbung Rumah", "Kepadatan Hunian [#7] (Jiwa/Rumah)",
                    "Jumlah Sarana Ibadah", "Rasio Ibadah [#8] (per 1k Jiwa)"
                ]
            ];
            rawRTData.forEach(function(r, idx) {
                var rtName = (r.Nama_RT || '').trim();
                var dusunName = rtName.indexOf('DUSUN') !== -1 ? rtName.substring(rtName.indexOf('DUSUN')).trim() : '-';
                var l = parseInt(r.Jumlah_Penduduk_Laki_Laki || 0);
                var p = parseInt(r.Jumlah_Penduduk_Perempuan || 0);
                var pop = l + p;

                s2Rows.push([
                    idx + 1,
                    rtName,
                    dusunName,
                    r.Nama_Ketua_RT || '',
                    pop,
                    l,
                    p,
                    parseFloat(r._sexRatio || 0),
                    parseFloat(r._artRata || 0),
                    parseInt(r.Jumlah_Penduduk_Lansia || 0),
                    parseFloat(r._pctLansia || 0),
                    parseInt(r.Jumlah_Memiliki_KTP || 0),
                    parseFloat(r._pctKTP || 0),
                    parseInt(r.Jumlah_KK || 0),
                    parseInt(r._cntBansos || 0),
                    parseFloat(r._pctBansos || 0),
                    parseInt(r.Jumlah_Penduduk_Putus_Sekolah || 0),
                    parseFloat(r._pctPutus || 0),
                    parseInt(r.Jumlah_Bumbung_Rumah || 0),
                    parseFloat(r._kepadatan || 0),
                    parseInt(r._cntIbadah || 0),
                    parseFloat(r._ratioIbadah || 0)
                ]);
            });

            // ==========================================
            // SHEET 3: VARIABEL POTENSI RT (MENTAH)
            // ==========================================
            var s3Rows = [
                [
                    "No", "Nama RT", "Dusun", "Nama Ketua RT", "Nama Petugas Pendata", "Tanggal & Waktu",
                    "Penduduk L", "Penduduk P", "Total Penduduk", "Jumlah Bumbung Rumah", "Jumlah KK",
                    "Jumlah Lansia", "Kelahiran Bayi", "Kematian",
                    "Penerima PKH", "Penerima BPNT", "Penerima BST", "Penerima BLT", "Total Penerima Bansos",
                    "Jumlah Memiliki KTP", "Siswa TK", "Siswa SD", "Siswa SMP", "Siswa SMA", "Siswa Sarjana",
                    "Total Siswa / Pelajar", "Penduduk Putus Sekolah", "Anak Usia 0-1 Tahun", "Anak Usia 2-5 Tahun",
                    "Jumlah Pendatang", "Status Pendataan"
                ]
            ];
            rawRTData.forEach(function(r, idx) {
                var rtName = (r.Nama_RT || '').trim();
                var dusunName = rtName.indexOf('DUSUN') !== -1 ? rtName.substring(rtName.indexOf('DUSUN')).trim() : '-';
                var l = parseInt(r.Jumlah_Penduduk_Laki_Laki || 0);
                var p = parseInt(r.Jumlah_Penduduk_Perempuan || 0);
                var pop = l + p;
                var pkh = parseInt(r.Jumlah_Penerima_PKH || 0);
                var bpnt = parseInt(r.Jumlah_Penerima_BPNT || 0);
                var bst = parseInt(r.Jumlah_Penerima_BST || 0);
                var blt = parseInt(r.Jumlah_Penerima_BLT || 0);
                var bansos = pkh + bpnt + bst + blt;
                var tk = parseInt(r.Jumlah_Sekolah_TK || 0);
                var sd = parseInt(r.Jumlah_Sekolah_SD || 0);
                var smp = parseInt(r.Jumlah_Sekolah_SMP || 0);
                var sma = parseInt(r.Jumlah_Sekolah_SMA || 0);
                var sarjana = parseInt(r.Jumlah_Sekolah_Sarjana || 0);
                var totalSiswa = tk + sd + smp + sma + sarjana;

                s3Rows.push([
                    idx + 1,
                    rtName,
                    dusunName,
                    r.Nama_Ketua_RT || '',
                    r.Nama_Petugas || '',
                    r.Tanggal_Waktu || '',
                    l,
                    p,
                    pop,
                    parseInt(r.Jumlah_Bumbung_Rumah || 0),
                    parseInt(r.Jumlah_KK || 0),
                    parseInt(r.Jumlah_Penduduk_Lansia || 0),
                    parseInt(r.Jumlah_Kelahiran_Bayi || 0),
                    parseInt(r.Jumlah_Kematian || 0),
                    pkh,
                    bpnt,
                    bst,
                    blt,
                    bansos,
                    parseInt(r.Jumlah_Memiliki_KTP || 0),
                    tk,
                    sd,
                    smp,
                    sma,
                    sarjana,
                    totalSiswa,
                    parseInt(r.Jumlah_Penduduk_Putus_Sekolah || 0),
                    parseInt(r.Jumlah_Anak_Usia_0_1_Tahun || 0),
                    parseInt(r.Jumlah_Anak_Usia_2_5_Tahun || 0),
                    parseInt(r.Jumlah_Pendatang || 0),
                    r.Status_Pendataan || 'Selesai'
                ]);
            });

            // ==========================================
            // SHEET 4: SARANA & FASILITAS UMUM
            // ==========================================
            var s4Rows = [
                [
                    "No", "ID Fasilitas", "Nama Fasilitas", "Kategori Fasilitas", "Sub Kategori",
                    "RT / Wilayah", "Kondisi Bangunan", "Sumber Listrik", "Sumber Air Bersih",
                    "Akses Jalan Menuju Lokasi", "Kualitas Sinyal Seluler", "Titik Koordinat GPS",
                    "Nama Petugas Pendata", "Tanggal & Waktu", "Catatan Khusus"
                ]
            ];
            (rawFasData || []).forEach(function(r, idx) {
                s4Rows.push([
                    idx + 1,
                    r.ID_Fasilitas || '',
                    r.Nama_Fasilitas || '',
                    r.Kategori_Fasilitas || '',
                    r.Sub_Kategori || '',
                    r.RT || '',
                    r.Kondisi_Bangunan || 'Baik',
                    r.Sumber_Listrik || '',
                    r.Sumber_Air_Bersih || '',
                    r.Akses_Jalan || '',
                    r.Sinyal_Seluler || '',
                    r.Lokasi_GPS || '',
                    r.Nama_Petugas || '',
                    r.Tanggal_Waktu || '',
                    r.Catatan || ''
                ]);
            });

            // ==========================================
            // SHEET 5: REKAPITULASI PER DUSUN
            // ==========================================
            var s5Rows = [
                [
                    "No", "Nama Dusun", "Jumlah RT", "Penduduk L", "Penduduk P", "Total Penduduk",
                    "Jumlah KK", "Rata-rata ART", "Jumlah Bumbung Rumah", "Populasi Lansia",
                    "Warga Memiliki KTP-el", "Penerima Bansos (KK)", "Anak Putus Sekolah", "Jumlah Fasilitas Umum"
                ]
            ];
            var dIdx = 1;
            Object.keys(dusunMap).sort().forEach(function(k) {
                var d = dusunMap[k];
                s5Rows.push([
                    dIdx++,
                    d.nama,
                    d.rtCount,
                    d.l,
                    d.p,
                    d.pop,
                    d.kk,
                    d.kk > 0 ? parseFloat((d.pop / d.kk).toFixed(2)) : 0,
                    d.bumbung,
                    d.lansia,
                    d.ktp,
                    d.bansos,
                    d.putus,
                    d.fasCount
                ]);
            });
            // Total Dusun Row
            s5Rows.push([
                "", "TOTAL DESA", rawRTData.length, totalL, totalP, totalPop,
                totalKK, totalKK > 0 ? parseFloat((totalPop / totalKK).toFixed(2)) : 0, totalBumbung, totalLansia,
                totalKTP, totalBansos, totalPutusSekolah, totalFas
            ]);

            // ==========================================
            // BUILD WORKBOOK WITH SHEETJS (XLSX)
            // ==========================================
            var filename = 'Data_SDI_Lengkap_Desa_Sungai_Bakau_Kecil_2026.xlsx';

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
                XLSX.utils.book_append_sheet(wb, ws2, "8 Indikator SDI Per RT");

                var ws3 = XLSX.utils.aoa_to_sheet(s3Rows);
                autoColWidth(ws3, s3Rows);
                XLSX.utils.book_append_sheet(wb, ws3, "Variabel Potensi RT");

                var ws4 = XLSX.utils.aoa_to_sheet(s4Rows);
                autoColWidth(ws4, s4Rows);
                XLSX.utils.book_append_sheet(wb, ws4, "Sarana & Fasilitas");

                var ws5 = XLSX.utils.aoa_to_sheet(s5Rows);
                autoColWidth(ws5, s5Rows);
                XLSX.utils.book_append_sheet(wb, ws5, "Rekapitulasi Dusun");

                XLSX.writeFile(wb, filename);
            } else {
                // Fallback CSV
                var csvContent = "\uFEFF" + s2Rows.map(function(e) {
                    return e.map(function(v) {
                        var str = (v === null || v === undefined) ? '' : String(v);
                        return '"' + str.replace(/"/g, '""') + '"';
                    }).join(",");
                }).join("\r\n");

                var blob = new Blob([csvContent], { type: 'text/csv;charset=utf-8;' });
                var link = document.createElement("a");
                var url = URL.createObjectURL(blob);
                link.setAttribute("href", url);
                link.setAttribute("download", filename.replace(/\.xlsx$/, '.csv'));
                document.body.appendChild(link);
                link.click();
                document.body.removeChild(link);
            }
        }
        function triggerExcelDownload(rows, filename) {
            downloadComprehensiveSDIWorkbook();
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
            { num: 1, title: 'Specify Needs', desc: 'Identifikasi Kebutuhan & Pencanangan Desa Cantik' },
            { num: 2, title: 'Design', desc: 'Desain Kuesioner & Metadata SDI (MS-Kegiatan/Variabel/Indikator)' },
            { num: 3, title: 'Build', desc: 'Pembangunan CAPI AppSheet & Database Sektoral' },
            { num: 4, title: 'Collect', desc: 'Pelatihan Agen Statistik & Survei CAPI RT' },
            { num: 5, title: 'Process', desc: 'Pemrosesan Data, AI Gemini & Validasi Sektoral' },
            { num: 6, title: 'Analyze', desc: 'Analisis 8 Indikator Prioritas SDI & Infografis Canva' },
            { num: 7, title: 'Disseminate', desc: 'Diseminasi Hasil & Publikasi Web Portal Desa' },
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
            // Saat user klik manual, reset timer rotasi agar punya waktu 6.5s untuk membaca
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

        // Pause on mouse hover, resume on mouse leave
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

        // ==========================================
        // FILTER & SEARCH APARAT DESA
        // ==========================================
        var currentAparatCat = 'all';
        function filterAparatCards(cat, btn) {
            currentAparatCat = cat;
            var buttons = document.querySelectorAll('#aparat-filter-buttons button');
            buttons.forEach(function(b) {
                b.classList.remove('active', 'btn-primary');
                if (!b.classList.contains('btn-outline-primary') && !b.classList.contains('btn-outline-info') && !b.classList.contains('btn-outline-warning') && !b.classList.contains('btn-outline-secondary')) {
                    b.classList.add('btn-outline-primary');
                }
            });
            btn.classList.add('active', 'btn-primary');
            btn.classList.remove('btn-outline-primary', 'btn-outline-info', 'btn-outline-warning', 'btn-outline-secondary');
            applyAparatFilter();
        }

        function searchAparatCards(query) {
            applyAparatFilter(query ? query.trim().toLowerCase() : '');
        }

        function applyAparatFilter(searchQuery) {
            if (searchQuery === undefined) {
                var searchInput = document.getElementById('search-aparat');
                searchQuery = searchInput ? searchInput.value.trim().toLowerCase() : '';
            }
            var items = document.querySelectorAll('.aparat-card-item');
            var visibleCount = 0;
            items.forEach(function(el) {
                var cat = el.getAttribute('data-cat');
                var name = el.getAttribute('data-name') || '';
                var role = el.getAttribute('data-role') || '';
                var matchCat = (currentAparatCat === 'all' || cat === currentAparatCat);
                var matchSearch = (!searchQuery || name.indexOf(searchQuery) !== -1 || role.indexOf(searchQuery) !== -1);
                if (matchCat && matchSearch) {
                    el.classList.remove('d-none');
                    el.classList.add('aos-animate');
                    
                    // Trigger animasi fade slide from right dengan dynamic stagger delay yang halus
                    el.style.animation = 'none';
                    void el.offsetWidth; // Force reflow agar animasi selalu ter-trigger ulang
                    var delayMs = Math.min(visibleCount * 35, 250);
                    el.style.animation = 'aparatFadeSlideRight 0.4s cubic-bezier(0.16, 1, 0.3, 1) ' + delayMs + 'ms both';
                    visibleCount++;
                } else {
                    el.classList.add('d-none');
                    el.style.animation = '';
                }
            });
            var noFound = document.getElementById('no-aparat-found');
            if (noFound) {
                if (visibleCount === 0) {
                    noFound.classList.remove('d-none');
                } else {
                    noFound.classList.add('d-none');
                }
            }
            if (typeof AOS !== 'undefined') {
                AOS.refresh();
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
            if (captionEl) captionEl.innerText = caption || 'Desa Sungai Bakau Kecil 2026';
            
            if (downloadBtn) {
                downloadBtn.href = imageSrc;
                var filename = (title || 'foto_desa_sungai_bakau_kecil').toLowerCase().replace(/[^a-z0-9]/g, '_') + '.webp';
                downloadBtn.setAttribute('download', filename);
            }

            if (modalEl && typeof bootstrap !== 'undefined') {
                var modal = bootstrap.Modal.getInstance(modalEl) || new bootstrap.Modal(modalEl);
                modal.show();
            }
        }
    </script>

    {{-- Tambahkan AOS initialization langsung di sini karena layout app memuatnya sebelum </body> --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            if (typeof AOS !== 'undefined') {
                AOS.init({
                    once: true,
                    duration: 800,
                    offset: 100,
                    easing: 'ease-out-cubic'
                });
                // Refresh setelah data dinamis (Google Sheets) selesai dimuat
                window.addEventListener('load', function() {
                    AOS.refresh();
                });
            }
        });
    </script>

</x-layouts.app>
