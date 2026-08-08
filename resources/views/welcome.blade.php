
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cerdas Survey Management</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome untuk icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- AOS CSS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <!-- Custom CSS -->
    <style>
        :root {
            --primary-color: #2E5090;
            --secondary-color: #4CAF50;
            --accent-color: #FFC107;
            --text-color: #333;
            --light-bg: #f8f9fa;
        }

        body {
            font-family: 'Poppins', sans-serif;
            color: var(--text-color);
            background-color: #f8f9fa;
        }

        .navbar {
            background-color: var(--primary-color);
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .navbar-brand {
            font-weight: 700;
            color: white !important;
        }

        .nav-link {
            color: rgba(255, 255, 255, 0.85) !important;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .nav-link:hover {
            color: white !important;
            transform: translateY(-2px);
        }

        .hero-section {
            background: linear-gradient(135deg, var(--primary-color) 0%, #1a365d 100%);
            color: white;
            padding: 100px 0;
            position: relative;
            overflow: hidden;
        }

        .hero-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: url('data:image/svg+xml;charset=utf8,%3Csvg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"%3E%3Cpath fill="%23ffffff" fill-opacity="0.05" d="M0,96L48,112C96,128,192,160,288,160C384,160,480,128,576,117.3C672,107,768,117,864,144C960,171,1056,213,1152,213.3C1248,213,1344,171,1392,149.3L1440,128L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"%3E%3C/path%3E%3C/svg%3E');
            background-size: cover;
            background-position: center;
        }

        .hero-title {
            font-size: 3rem;
            font-weight: 800;
            margin-bottom: 20px;
        }

        .hero-subtitle {
            font-size: 1.25rem;
            margin-bottom: 30px;
            opacity: 0.9;
        }

        .btn-primary {
            background-color: var(--secondary-color);
            border-color: var(--secondary-color);
            padding: 10px 25px;
            font-weight: 600;
            border-radius: 50px;
            transition: all 0.3s;
        }

        .btn-primary:hover {
            background-color: #3d8b40;
            border-color: #3d8b40;
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .feature-card {
            background-color: white;
            border-radius: 12px;
            padding: 30px;
            margin-bottom: 30px;
            transition: all 0.3s ease;
            border: none;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        }

        .feature-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }

        .feature-icon {
            font-size: 2.5rem;
            margin-bottom: 20px;
            color: var(--primary-color);
        }

        .section-title {
            position: relative;
            margin-bottom: 50px;
            font-weight: 700;
            color: var(--primary-color);
        }

        .section-title::after {
            content: '';
            display: block;
            width: 70px;
            height: 4px;
            background-color: var(--accent-color);
            margin-top: 15px;
        }

        .desa-card {
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
        }

        .desa-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.15);
        }

        .desa-card img {
            height: 200px;
            object-fit: cover;
            width: 100%;
        }

        .desa-card-body {
            padding: 20px;
        }

        .card-title {
            font-weight: 700;
            margin-bottom: 10px;
            color: var(--primary-color);
        }

        .footer {
            background-color: var(--primary-color);
            color: white;
            padding: 60px 0 30px;
        }

        .footer-title {
            font-weight: 700;
            margin-bottom: 25px;
        }

        .footer-links {
            list-style: none;
            padding: 0;
        }

        .footer-links li {
            margin-bottom: 10px;
        }

        .footer-links a {
            color: rgba(255, 255, 255, 0.8);
            text-decoration: none;
            transition: all 0.3s;
        }

        .footer-links a:hover {
            color: white;
            padding-left: 5px;
        }

        .social-links {
            font-size: 1.5rem;
        }

        .social-links a {
            color: white;
            margin-right: 15px;
            transition: all 0.3s;
        }

        .social-links a:hover {
            color: var(--accent-color);
            transform: translateY(-3px);
        }

        .copyright {
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    @include('partials.navbar')

    <!-- Hero Section -->
    <section class="hero-section" id="beranda">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6" data-aos="fade-right" data-aos-duration="1000">
                    <h1 class="hero-title">Cerdas Survey Management</h1>
                    <p class="hero-subtitle">Platform tata kelola data terintegrasi untuk pengambilan keputusan yang
                        lebih baik.</p>
                    <a href="#fitur" class="btn btn-primary btn-lg">
                        <i class="fas fa-chart-bar me-2"></i>Jelajahi Fitur
                    </a>
                </div>
                <div class="col-lg-6" data-aos="fade-left" data-aos-duration="1000" data-aos-delay="200">
                    <div class="bg-white p-4 rounded-4 shadow-lg border text-center">
                        <i class="fas fa-chart-area text-primary display-1 mb-3"></i>
                        <h4 class="fw-bold text-dark mb-2">Platform Engine Pendataan</h4>
                        <p class="text-muted small mb-0">Showcase Data Hasil Pencacahan Lapangan CERDAS Survey Engine & AppSheet BPS Kab. Mempawah</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Tentang Section -->
    <section class="py-5 bg-light" id="tentang">
        <div class="container py-5">
            <div class="row align-items-center">
                <div class="col-lg-6 mb-4 mb-lg-0" data-aos="fade-right" data-aos-duration="1000">
                    <img src="{{ asset('images/dukungan-pemda.jpg') }}" alt="Dukungan Pemda" class="img-fluid rounded-4 shadow border" onerror="this.src='https://images.unsplash.com/photo-1517048676732-d65bc937f952?q=80&w=800&auto=format&fit=crop'">
                </div>
                <div class="col-lg-6" data-aos="fade-left" data-aos-duration="1000">
                    <h2 class="section-title">Tentang Cerdas-SM</h2>
                    <p class="mb-4">Cerdas Survey Management (Cerdas-SM) adalah aplikasi web full-stack yang dibangun
                        dengan Laravel untuk menampung dan mengelola data dari berbagai sumber. Platform ini dirancang
                        untuk menyediakan data yang terstruktur dan mudah diakses untuk pengambilan keputusan.</p>
                    <div class="row mt-4">
                        <div class="col-md-6 mb-3">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-database text-primary me-3" style="font-size: 2rem;"></i>
                                <div>
                                    <h5 class="mb-1">Integrasi Data</h5>
                                    <p class="text-muted mb-0">Menggabungkan data dari berbagai sumber</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-chart-pie text-primary me-3" style="font-size: 2rem;"></i>
                                <div>
                                    <h5 class="mb-1">Visualisasi</h5>
                                    <p class="text-muted mb-0">Menyajikan data dalam format yang mudah dipahami</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-file-alt text-primary me-3" style="font-size: 2rem;"></i>
                                <div>
                                    <h5 class="mb-1">Laporan</h5>
                                    <p class="text-muted mb-0">Membuat laporan data yang komprehensif</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-cogs text-primary me-3" style="font-size: 2rem;"></i>
                                <div>
                                    <h5 class="mb-1">Kemudahan Pengelolaan</h5>
                                    <p class="text-muted mb-0">Antarmuka yang intuitif untuk pengelolaan data</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Fitur Section -->
    <section class="py-5" id="fitur">
        <div class="container py-5">
            <h2 class="section-title text-center mb-5">Fitur Utama</h2>
            <div class="row">
                <div class="col-md-4 mb-2" data-aos="fade-up" data-aos-duration="1000">
                    <div class="feature-card text-center h-100">
                        <i class="fas fa-database feature-icon"></i>
                        <h4>Pengumpulan Data</h4>
                        <p>Menampung data dari berbagai sumber seperti survei lapangan, data administratif, dan sumber
                            daring.</p>
                    </div>
                </div>
                <div class="col-md-4 mb-2" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
                    <div class="feature-card text-center h-100">
                        <i class="fas fa-chart-bar feature-icon"></i>
                        <h4>Analisis Data</h4>
                        <p>Alat analisis data yang komprehensif untuk mengekstrak wawasan berharga dari data yang
                            terkumpul.</p>
                    </div>
                </div>
                <div class="col-md-4 mb-2" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="400">
                    <div class="feature-card text-center h-100">
                        <i class="fas fa-file-invoice feature-icon"></i>
                        <h4>Pelaporan</h4>
                        <p>Membuat laporan yang dapat disesuaikan dengan format yang mudah diunduh seperti PDF dan
                            Excel.</p>
                    </div>
                </div>
                <div class="col-md-4 mb-2" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
                    <div class="feature-card text-center h-100">
                        <i class="fas fa-user-shield feature-icon"></i>
                        <h4>Manajemen Pengguna</h4>
                        <p>Sistem manajemen pengguna dengan berbagai tingkat akses untuk keamanan data yang lebih baik.
                        </p>
                    </div>
                </div>
                <div class="col-md-4 mb-2" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="400">
                    <div class="feature-card text-center h-100">
                        <i class="fas fa-map-marked-alt feature-icon"></i>
                        <h4>Desa Cantik</h4>
                        <p>Visualisasi dan pengelolaan data khusus untuk program Desa/Kelurahan Cinta Statistik.</p>
                    </div>
                </div>
                <div class="col-md-4 mb-2" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="600">
                    <div class="feature-card text-center h-100">
                        <i class="fas fa-sync-alt feature-icon"></i>
                        <h4>Integrasi Real-time</h4>
                        <p>Sinkronisasi data secara real-time dari Google Sheets dan sumber data eksternal lainnya.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Desa Cantik Section -->
    <section class="py-5 bg-light" id="desa-cantik">
        <div class="container py-5">
            <div class="text-center mb-5" data-aos="fade-up">
                <span class="badge bg-primary px-3 py-2 rounded-pill mb-2">Desa Cinta Statistik (Desa Cantik)</span>
                <h2 class="section-title text-center">Daftar Desa Binaan & Pra-Desa</h2>
                <p class="text-muted col-lg-8 mx-auto">
                    Dokumentasi dan penyajian data statistik desa binaan BPS Kabupaten Mempawah melalui metode pendataan **AppSheet** dan uji lapangan **CERDAS Survey Engine**.
                </p>
            </div>

            <div class="row g-4">
                <!-- Card 1: Pra Desa Cantik Sambora 2026 (Featured CERDAS Engine) -->
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                    <a href="{{ route('cantik.sambora') }}" class="desa-card-link">
                        <div class="desa-card border border-warning border-2">
                            <img src="https://images.unsplash.com/photo-1500382017468-9049fed747ef?q=80&w=800&auto=format&fit=crop" class="card-img-top" alt="Desa Sambora">
                            <div class="desa-card-body d-flex flex-column">
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <span class="badge bg-warning text-dark font-weight-bold"><i class="fas fa-microchip me-1"></i>Pra-Desa 2026</span>
                                    <small class="text-primary fw-bold">Uji CERDAS</small>
                                </div>
                                <h4 class="card-title text-dark fw-bold">Desa Sambora</h4>
                                <p class="card-text text-muted small">Kecamatan Toho — Lokasi Uji Lapangan CERDAS Survey Engine (Offline-First & Geotagging)</p>
                                <div class="mt-auto pt-3 border-top d-flex justify-content-between align-items-center">
                                    <span class="badge bg-success">Uji Lapangan</span>
                                    <span class="text-primary fw-bold">Lihat Detail <i class="fas fa-arrow-right ms-1"></i></span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <!-- Card 2: Kel. Pasir Wan Salim (2026) -->
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                    <a href="{{ route('cantik.pasirwansalim') }}" class="desa-card-link">
                        <div class="desa-card">
                            <img src="https://images.unsplash.com/photo-1590523741831-ab7e8b8f9c7f?q=80&w=800&auto=format&fit=crop" class="card-img-top" alt="Kelurahan Pasir Wan Salim">
                            <div class="desa-card-body d-flex flex-column">
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <span class="badge bg-success">Binaan 2026</span>
                                    <small class="text-muted">AppSheet</small>
                                </div>
                                <h4 class="card-title fw-bold">Kel. Pasir Wan Salim</h4>
                                <p class="card-text text-muted small">Kecamatan Mempawah Timur</p>
                                <div class="mt-auto pt-3 border-top d-flex justify-content-between align-items-center">
                                    <span class="badge bg-light text-dark">Data Mikro</span>
                                    <span class="text-primary fw-bold">Lihat Detail <i class="fas fa-arrow-right ms-1"></i></span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <!-- Card 3: Desa Pasir Palembang (2026) -->
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                    <a href="{{ route('cantik.pasirpalembang') }}" class="desa-card-link">
                        <div class="desa-card">
                            <img src="https://images.unsplash.com/photo-1506744038136-46273834b3fb?q=80&w=800&auto=format&fit=crop" class="card-img-top" alt="Desa Pasir Palembang">
                            <div class="desa-card-body d-flex flex-column">
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <span class="badge bg-success">Binaan 2026</span>
                                    <small class="text-muted">AppSheet</small>
                                </div>
                                <h4 class="card-title fw-bold">Desa Pasir Palembang</h4>
                                <p class="card-text text-muted small">Kecamatan Mempawah Timur</p>
                                <div class="mt-auto pt-3 border-top d-flex justify-content-between align-items-center">
                                    <span class="badge bg-light text-dark">Data Mikro</span>
                                    <span class="text-primary fw-bold">Lihat Detail <i class="fas fa-arrow-right ms-1"></i></span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <!-- Card 4: Desa Sungai Bakau Kecil (2026) -->
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                    <a href="{{ route('cantik.sungaibakaukecil') }}" class="desa-card-link">
                        <div class="desa-card">
                            <img src="https://images.unsplash.com/photo-1542601906990-b4d3fb778b09?q=80&w=800&auto=format&fit=crop" class="card-img-top" alt="Desa Sungai Bakau Kecil">
                            <div class="desa-card-body d-flex flex-column">
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <span class="badge bg-success">Binaan 2026</span>
                                    <small class="text-muted">AppSheet</small>
                                </div>
                                <h4 class="card-title fw-bold">Desa Sungai Bakau Kecil</h4>
                                <p class="card-text text-muted small">Kecamatan Mempawah Hilir</p>
                                <div class="mt-auto pt-3 border-top d-flex justify-content-between align-items-center">
                                    <span class="badge bg-light text-dark">Data Mikro</span>
                                    <span class="text-primary fw-bold">Lihat Detail <i class="fas fa-arrow-right ms-1"></i></span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <!-- Card 5: Kelurahan Pulau Pedalaman (2025) -->
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                    <a href="{{ route('cantik.pedalaman') }}" class="desa-card-link">
                        <div class="desa-card">
                            <img src="{{ asset('images/pulaupedalaman.webp') }}" class="card-img-top" alt="Kelurahan Pulau Pedalaman" onerror="this.src='https://images.unsplash.com/photo-1517048676732-d65bc937f952?q=80&w=800&auto=format&fit=crop'">
                            <div class="desa-card-body d-flex flex-column">
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <span class="badge bg-info text-dark">Binaan 2025</span>
                                    <small class="text-muted">AppSheet</small>
                                </div>
                                <h4 class="card-title fw-bold">Kel. Pulau Pedalaman</h4>
                                <p class="card-text text-muted small">Kecamatan Mempawah Timur</p>
                                <div class="mt-auto pt-3 border-top d-flex justify-content-between align-items-center">
                                    <span class="badge bg-light text-dark">Dasbor Looker</span>
                                    <span class="text-primary fw-bold">Lihat Detail <i class="fas fa-arrow-right ms-1"></i></span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <!-- Card 6: Desa Sejegi (2025) -->
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                    <a href="{{ route('cantik.sejegi') }}" class="desa-card-link">
                        <div class="desa-card">
                            <img src="{{ asset('images/sejegi.webp') }}" class="card-img-top" alt="Desa Sejegi" onerror="this.src='https://images.unsplash.com/photo-1464822759023-fed622ff2c3b?q=80&w=800&auto=format&fit=crop'">
                            <div class="desa-card-body d-flex flex-column">
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <span class="badge bg-info text-dark">Binaan 2025</span>
                                    <small class="text-muted">AppSheet</small>
                                </div>
                                <h4 class="card-title fw-bold">Desa Sejegi</h4>
                                <p class="card-text text-muted small">Kecamatan Mempawah Timur</p>
                                <div class="mt-auto pt-3 border-top d-flex justify-content-between align-items-center">
                                    <span class="badge bg-light text-dark">Dasbor Looker</span>
                                    <span class="text-primary fw-bold">Lihat Detail <i class="fas fa-arrow-right ms-1"></i></span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <!-- Card 7: Desa Wajok Hilir (2024) -->
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                    <a href="{{ route('cantik.wajokhilir') }}" class="desa-card-link">
                        <div class="desa-card">
                            <img src="{{ asset('images/wajokhilir.webp') }}" class="card-img-top" alt="Desa Wajok Hilir" onerror="this.src='https://images.unsplash.com/photo-1470071459604-3b5ec3a7fe05?q=80&w=800&auto=format&fit=crop'">
                            <div class="desa-card-body d-flex flex-column">
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <span class="badge bg-secondary">Binaan 2024</span>
                                    <small class="text-muted">Early Pilot</small>
                                </div>
                                <h4 class="card-title fw-bold">Desa Wajok Hilir</h4>
                                <p class="card-text text-muted small">Kecamatan Siantan / Jongkat</p>
                                <div class="mt-auto pt-3 border-top d-flex justify-content-between align-items-center">
                                    <span class="badge bg-light text-dark">Pilot Project</span>
                                    <span class="text-primary fw-bold">Lihat Detail <i class="fas fa-arrow-right ms-1"></i></span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Kontak Section -->
    <section class="py-5" id="kontak">
        <div class="container py-5">
            <div class="row">
                <div class="col-lg-6" data-aos="fade-right" data-aos-duration="1000">
                    <h2 class="section-title">Hubungi BPS Kabupaten Mempawah</h2>
                    <p class="mb-4">Untuk informasi lebih lanjut mengenai program Desa Cinta Statistik dan integrasi CERDAS Survey Engine, silakan hubungi tim pembinaan kami.</p>

                    <div class="mb-4">
                        <div class="d-flex mb-3">
                            <i class="fas fa-map-marker-alt text-primary me-3 mt-1" style="font-size: 1.5rem;"></i>
                            <div>
                                <h5 class="mb-1">Alamat Kantor</h5>
                                <p class="text-muted mb-0">BPS Kabupaten Mempawah, Kalimantan Barat</p>
                            </div>
                        </div>

                        <div class="d-flex mb-3">
                            <i class="fas fa-phone-alt text-primary me-3 mt-1" style="font-size: 1.5rem;"></i>
                            <div>
                                <h5 class="mb-1">Telepon</h5>
                                <p class="text-muted mb-0">(0561) 691049</p>
                            </div>
                        </div>

                        <div class="d-flex">
                            <i class="fas fa-envelope text-primary me-3 mt-1" style="font-size: 1.5rem;"></i>
                            <div>
                                <h5 class="mb-1">Email Resmi</h5>
                                <p class="text-muted mb-0">bps6104@bps.go.id</p>
                            </div>
                        </div>
                    </div>
                </div>

                    <div class="social-links">
                        <a href="#"><i class="fab fa-facebook"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>

                <div class="col-lg-6" data-aos="fade-left" data-aos-duration="1000">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body p-4">
                            <h4 class="card-title mb-4">Kirim Pesan</h4>
                            <form>
                                <div class="mb-3">
                                    <label for="name" class="form-label">Nama Lengkap</label>
                                    <input type="text" class="form-control" id="name"
                                        placeholder="Masukkan nama lengkap">
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email" placeholder="Masukkan email">
                                </div>
                                <div class="mb-3">
                                    <label for="subject" class="form-label">Subjek</label>
                                    <input type="text" class="form-control" id="subject" placeholder="Masukkan subjek">
                                </div>
                                <div class="mb-3">
                                    <label for="message" class="form-label">Pesan</label>
                                    <textarea class="form-control" id="message" rows="5"
                                        placeholder="Tulis pesan Anda di sini"></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-paper-plane me-2"></i>Kirim Pesan
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mb-4">
                    <h5 class="footer-title">Cerdas Survey Management</h5>
                    <p>Platform tata kelola data terintegrasi untuk pengambilan keputusan yang lebih baik.</p>
                    <div class="social-links mt-4">
                        <a href="#"><i class="fab fa-facebook"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>

                <div class="col-lg-2 col-md-4 mb-4">
                    <h5 class="footer-title">Tautan</h5>
                    <ul class="footer-links">
                        <li><a href="#beranda">Beranda</a></li>
                        <li><a href="#tentang">Tentang</a></li>
                        <li><a href="#fitur">Fitur</a></li>
                        <li><a href="#kontak">Kontak</a></li>
                    </ul>
                </div>

                <div class="col-lg-3 col-md-4 mb-4">
                    <h5 class="footer-title">Desa Cantik</h5>
                    <ul class="footer-links">
                        <li><a href="{{ route('cantik.wajokhilir') }}">Desa Wajok Hilir (Desa Cantik 2024)</a></li>
                        <li><a href="{{ route('cantik.pedalaman') }}">Kelurahan Pulau Pedalaman (Kelurahan Cantik 2024)</a></li>
                        {{-- <li><a href="/">Kelurahan Pulau Pedalaman</a></li> --}}
                        <!-- Tambahkan desa/kelurahan lain jika ada -->
                    </ul>
                </div>

                <div class="col-lg-3 col-md-4 mb-4">
                    <h5 class="footer-title">Kontak</h5>
                    <ul class="footer-links">
                        <li><i class="fas fa-map-marker-alt me-2"></i> Jl. Statistik No. 123, Pontianak</li>
                        <li><i class="fas fa-phone-alt me-2"></i> +62 561 123456</li>
                        <li><i class="fas fa-envelope me-2"></i> info@cerdas-sm.gov.id</li>
                    </ul>
                </div>
            </div>

            <div class="text-center copyright">
                <p>&copy; {{ date('Y') }} Cerdas Survey Management. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- AOS JS -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        // Initialize AOS
        AOS.init({
            once: true // whether animation should happen only once - while scrolling down
        });
    </script>
</body>

</html>
