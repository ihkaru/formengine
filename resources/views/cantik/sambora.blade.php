<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pra Desa Cantik 2026 - Desa Sambora, Kec. Toho - CERDAS Survey Engine</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- AOS CSS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <style>
        :root {
            --primary-color: #1E3A8A;
            --secondary-color: #0D9488;
            --accent-color: #F59E0B;
            --light-bg: #F8FAFC;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: var(--light-bg);
            color: #1E293B;
        }

        .navbar {
            background-color: var(--primary-color);
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .page-header {
            background: linear-gradient(135deg, rgba(30, 58, 138, 0.9) 0%, rgba(13, 148, 136, 0.95) 100%),
                url('https://images.unsplash.com/photo-1500382017468-9049fed747ef?q=80&w=2000&auto=format&fit=crop');
            background-size: cover;
            background-position: center;
            color: white;
            padding: 90px 0 70px;
        }

        .badge-cerdas {
            background-color: #F59E0B;
            color: #0F172A;
            font-weight: 700;
            padding: 8px 16px;
            border-radius: 50px;
            font-size: 0.9rem;
            display: inline-block;
        }

        .card-feature {
            border: none;
            border-radius: 16px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
            height: 100%;
        }

        .card-feature:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
        }

        .icon-box {
            width: 60px;
            height: 60px;
            border-radius: 12px;
            background: rgba(13, 148, 136, 0.1);
            color: var(--secondary-color);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            margin-bottom: 20px;
        }

        .stat-card {
            background: white;
            border-radius: 16px;
            padding: 24px;
            border-left: 5px solid var(--secondary-color);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.04);
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    @include('partials.navbar')

    <!-- Header Section -->
    <header class="page-header text-center">
        <div class="container">
            <div class="badge-cerdas mb-3" data-aos="fade-down">
                <i class="fas fa-microchip me-2"></i>Uji Lapangan CERDAS Survey Engine 2026
            </div>
            <h1 class="fw-bold display-5 mb-3" data-aos="fade-up">Pra Desa Cantik: Desa Sambora</h1>
            <p class="lead mx-auto" style="max-width: 800px;" data-aos="fade-up" data-aos-delay="100">
                Kecamatan Toho, Kabupaten Mempawah — Wilayah percontohan dan lokasi uji lapangan pertama aplikasi kuesioner mandiri berbasis **CERDAS Survey Engine**.
            </p>
        </div>
    </header>

    <!-- Content Section -->
    <main class="container my-5">
        <!-- Overview Banner -->
        <div class="card border-0 shadow-sm rounded-4 mb-5 p-4 bg-white" data-aos="fade-up">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <h3 class="fw-bold text-primary mb-2">Tentang Uji Lapangan Desa Sambora</h3>
                    <p class="text-muted mb-0">
                        Kegiatan pencacahan lapangan di Desa Sambora dilaksanakan sebagai tahap validasi dan pengujian langsung **CERDAS Survey Engine** di lapangan. Pendataan ini dilakukan secara kolaboratif bersama SMK Taruna Muhammadiyah untuk menguji ketahanan fitur offline-first, geotagging presisi, dan skema validasi otomatis.
                    </p>
                </div>
                <div class="col-lg-4 text-center mt-3 mt-lg-0">
                    <span class="badge bg-success fs-6 px-3 py-2 rounded-pill">
                        <i class="fas fa-check-circle me-1"></i> Selesai Lapangan (2026)
                    </span>
                </div>
            </div>
        </div>

        <!-- Metric Cards -->
        <div class="row g-4 mb-5" data-aos="fade-up" data-aos-delay="100">
            <div class="col-md-3">
                <div class="stat-card">
                    <small class="text-muted text-uppercase fw-semibold">Lokasi Uji</small>
                    <h4 class="fw-bold text-dark mt-1 mb-0">Desa Sambora</h4>
                    <small class="text-secondary">Kec. Toho, Kab. Mempawah</small>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stat-card">
                    <small class="text-muted text-uppercase fw-semibold">Engine Engine</small>
                    <h4 class="fw-bold text-primary mt-1 mb-0">CERDAS v1.0</h4>
                    <small class="text-secondary">AppSheet-compatible Engine</small>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stat-card">
                    <small class="text-muted text-uppercase fw-semibold">Mode Operasional</small>
                    <h4 class="fw-bold text-success mt-1 mb-0">Offline-First</h4>
                    <small class="text-secondary">Auto-sync & Geotagging</small>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stat-card">
                    <small class="text-muted text-uppercase fw-semibold">Status Program</small>
                    <h4 class="fw-bold text-warning mt-1 mb-0">Pra Desa Cantik</h4>
                    <small class="text-secondary">Persiapan Desa Binaan 2026</small>
                </div>
            </div>
        </div>

        <!-- Key CERDAS Engine Features Evaluated -->
        <h3 class="fw-bold text-center mb-4" data-aos="fade-up">Fitur Utama CERDAS Engine yang Diuji</h3>
        <div class="row g-4 mb-5">
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                <div class="card card-feature p-4">
                    <div class="icon-box"><i class="fas fa-wifi"></i></div>
                    <h5 class="fw-bold">Offline-First & Auto-Scrubbing</h5>
                    <p class="text-muted small">Pencacahan tetap berjalan lancar meski tanpa koneksi internet. Data tersembunyi (`show_if=false`) otomatis dibersihkan saat disimpan.</p>
                </div>
            </div>
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                <div class="card card-feature p-4">
                    <div class="icon-box"><i class="fas fa-map-marked-alt"></i></div>
                    <h5 class="fw-bold">Geotagging & Peta Lokasi</h5>
                    <p class="text-muted small">Menampilkan titik lokasi rumah secara interaktif di peta interaktif berbasis kolom GPS `Lokasi_Geotagging` secara presisi.</p>
                </div>
            </div>
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="300">
                <div class="card card-feature p-4">
                    <div class="icon-box"><i class="fas fa-tasks"></i></div>
                    <h5 class="fw-bold">Validasi Kondisional & UX Hint</h5>
                    <p class="text-muted small">Pengujian logika `required_if_fn`, multi-select checkbox sampah, serta petunjuk kontekstual ODK/KoBoToolbox di setiap rincian.</p>
                </div>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-dark text-white py-4 mt-5">
        <div class="container text-center">
            <p class="mb-0 text-muted small">&copy; 2026 BPS Kabupaten Mempawah — CERDAS Survey Engine Showcase & Portal Desa Cantik.</p>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({ duration: 800, once: true });
    </script>
</body>

</html>
