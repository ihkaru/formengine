@props([
    'villageName' => 'Desa Sungai Bakau Kecil',
    'districtName' => 'Kecamatan Mempawah Hilir',
    'regencyName' => 'Kabupaten Mempawah',
    'address' => 'Jl. Raya Senggiring RT.003 RW.001, Kode Pos 78919',
    'email' => 'desasungaibakaukecil2019@gmail.com',
    'bpsUrl' => 'https://mempawahkab.bps.go.id',
    'instagramUrl' => 'https://www.instagram.com/bpsmempawah',
    'youtubeUrl' => 'https://www.youtube.com/@bpskabupatenmempawah'
])

<footer class="village-footer text-white pt-5 pb-4 position-relative" style="background: linear-gradient(180deg, #064E3B 0%, #022c22 100%); border-top: 4px solid var(--secondary, #0D9488);">
    <div class="container">
        <div class="row g-4 mb-5">
            
            <!-- Kolom 1: Profil Desa & Program Desa Cantik -->
            <div class="col-lg-4 col-md-6">
                <div class="d-flex align-items-center gap-2 mb-3">
                    <div class="rounded-3 bg-white text-primary d-flex align-items-center justify-content-center shadow-sm" style="width: 42px; height: 42px;">
                        <i class="fas fa-chart-line fa-lg" style="color: #064E3B;"></i>
                    </div>
                    <div>
                        <h5 class="fw-bold mb-0 text-white">{{ $villageName }}</h5>
                        <small class="text-white-50">Desa Cinta Statistik (Desa Cantik) 2026</small>
                    </div>
                </div>
                <p class="text-white-50 small mb-3" style="line-height: 1.6;">
                    Portal integrasi data sektoral tingkat desa hasil pembinaan BPS Kabupaten Mempawah bersama Pemerintah {{ $villageName }}. Mewujudkan tata kelola data desa yang akurat, mutakhir, dan berstandar Satu Data Indonesia.
                </p>
                <div class="d-flex align-items-center gap-2 mt-3">
                    <a href="{{ $instagramUrl }}" target="_blank" rel="noopener noreferrer" class="btn btn-sm btn-outline-light rounded-circle d-flex align-items-center justify-content-center" style="width: 36px; height: 36px;" title="Instagram BPS Mempawah">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="{{ $youtubeUrl }}" target="_blank" rel="noopener noreferrer" class="btn btn-sm btn-outline-light rounded-circle d-flex align-items-center justify-content-center" style="width: 36px; height: 36px;" title="YouTube BPS Mempawah">
                        <i class="fab fa-youtube"></i>
                    </a>
                    <a href="{{ $bpsUrl }}" target="_blank" rel="noopener noreferrer" class="btn btn-sm btn-outline-light rounded-circle d-flex align-items-center justify-content-center" style="width: 36px; height: 36px;" title="Portal Resmi BPS Mempawah">
                        <i class="fas fa-globe"></i>
                    </a>
                    <a href="{{ route('home') }}" class="btn btn-sm btn-outline-light rounded-circle d-flex align-items-center justify-content-center" style="width: 36px; height: 36px;" title="Portal Utama Cerdas-SM">
                        <i class="fas fa-home"></i>
                    </a>
                </div>
            </div>

            <!-- Kolom 2: Tautan Cepat Navigasi -->
            <div class="col-lg-2 col-md-6 col-6">
                <h6 class="fw-bold text-uppercase text-white mb-3" style="letter-spacing: 0.5px;">
                    <i class="fas fa-compass text-warning me-2"></i>Eksplorasi
                </h6>
                <ul class="list-unstyled small mb-0 d-flex flex-column gap-2">
                    <li><a href="#beranda" class="text-white-50 text-decoration-none footer-link"><i class="fas fa-chevron-right extra-small me-1 text-white-50"></i> Beranda</a></li>
                    <li><a href="#gsbpm-flow" class="text-white-50 text-decoration-none footer-link"><i class="fas fa-chevron-right extra-small me-1 text-white-50"></i> Alur Pembinaan</a></li>
                    <li><a href="#map" class="text-white-50 text-decoration-none footer-link"><i class="fas fa-chevron-right extra-small me-1 text-white-50"></i> Peta Fasilitas</a></li>
                    <li><a href="#pills-tab" class="text-white-50 text-decoration-none footer-link"><i class="fas fa-chevron-right extra-small me-1 text-white-50"></i> Data Potensi RT</a></li>
                    <li><a href="#infografis" class="text-white-50 text-decoration-none footer-link"><i class="fas fa-chevron-right extra-small me-1 text-white-50"></i> Galeri Infografis</a></li>
                    <li><a href="#sop-layanan" class="text-white-50 text-decoration-none footer-link"><i class="fas fa-chevron-right extra-small me-1 text-white-50"></i> Permintaan Data</a></li>
                </ul>
            </div>

            <!-- Kolom 3: Standar & Kelembagaan -->
            <div class="col-lg-3 col-md-6 col-6">
                <h6 class="fw-bold text-uppercase text-white mb-3" style="letter-spacing: 0.5px;">
                    <i class="fas fa-shield-alt text-success me-2"></i>Standar Data
                </h6>
                <ul class="list-unstyled small mb-0 d-flex flex-column gap-2 text-white-50">
                    <li><span class="text-white fw-semibold">Satu Data Indonesia (SDI):</span> Format MS-Kegiatan, Variabel &amp; Indikator.</li>
                    <li><span class="text-white fw-semibold">GSBPM v5.1:</span> 8 Fase proses bisnis statistik internasional.</li>
                    <li><span class="text-white fw-semibold">CAPI AppSheet:</span> Pencacahan digital real-time.</li>
                    <li><span class="text-white fw-semibold">Pembina Data:</span> BPS Kabupaten Mempawah.</li>
                </ul>
            </div>

            <!-- Kolom 4: Kontak & Posko Desa Cantik -->
            <div class="col-lg-3 col-md-6">
                <h6 class="fw-bold text-uppercase text-white mb-3" style="letter-spacing: 0.5px;">
                    <i class="fas fa-map-marker-alt text-danger me-2"></i>Posko Layanan
                </h6>
                <p class="text-white-50 small mb-2">
                    <strong>Kantor {{ $villageName }}</strong><br>
                    {{ $address }}<br>
                    {{ $districtName }}, {{ $regencyName }}
                </p>
                <p class="text-white-50 small mb-3">
                    <i class="fas fa-envelope text-warning me-1"></i> {{ $email }}
                </p>
                <a href="#sop-layanan" class="btn btn-sm btn-warning text-dark fw-bold rounded-pill px-3 shadow-sm">
                    <i class="fas fa-paper-plane me-1"></i> Form Permintaan Data
                </a>
            </div>

        </div>

        <!-- Garis Pemisah & Copyright -->
        <div class="pt-4 border-top border-white-10 d-flex flex-column flex-md-row justify-content-between align-items-center gap-3 small text-white-50">
            <div>
                &copy; {{ date('Y') }} <strong>{{ $villageName }}</strong> &amp; <strong>BPS Kabupaten Mempawah</strong>. All rights reserved.
            </div>
            <div class="d-flex align-items-center gap-3 flex-wrap justify-content-center">
                <span class="badge bg-success-subtle text-success border border-success-subtle rounded-pill px-3 py-1 font-monospace">Open Data Sektoral</span>
                <span class="badge bg-light text-dark rounded-pill px-3 py-1 font-monospace">GSBPM Compliant</span>
                <a href="{{ route('home') }}" class="text-white-50 text-decoration-none footer-link">Cerdas-SM</a>
            </div>
        </div>
    </div>
</footer>

<style>
    .footer-link {
        transition: all 0.2s ease;
    }
    .footer-link:hover {
        color: #ffffff !important;
        transform: translateX(4px);
    }
    .border-white-10 {
        border-color: rgba(255, 255, 255, 0.12) !important;
    }
</style>
