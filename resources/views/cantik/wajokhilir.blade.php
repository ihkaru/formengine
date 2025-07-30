<!-- resources/views/desa/pedalaman.blade.php -->
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Desa Wajok Hilir - Desa Cinta Statistik</title>
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
            --accent-color: #FF9800;
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
            background-image: url({{ asset('images/wajokhilir.webp')}});
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        color: white;
        text-align: center;
        position: relative;
        display: flex;
        align-items: center;
        justify-content: center;
        min-height: 100vh;
        padding: 60px 0;
        overflow: hidden;
        /* Mencegah scrollbar horizontal karena parallax */
        }

        .hero-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, rgba(46, 80, 144, 0.8) 0%, rgba(76, 175, 80, 0.6) 100%);
            z-index: 1;
        }

        .hero-content {
            position: relative;
            z-index: 2;
        }

        .hero-title {
            font-size: 3.5rem;
            font-weight: 800;
            margin-bottom: 20px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
        }

        .hero-subtitle {
            font-size: 1.5rem;
            margin-bottom: 30px;
            opacity: 0.9;
            text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.3);
        }

        .word-wrapper {
            display: inline-block;
            overflow: hidden;
            vertical-align: bottom;
        }

        .word {
            display: inline-block;
            transform: translateY(110%);
            animation: slide-up 0.8s cubic-bezier(0.25, 0.46, 0.45, 0.94) forwards;
        }

        @keyframes slide-up {
            to {
                transform: translateY(0);
            }
        }

        .btn-primary {
            background-color: var(--accent-color);
            border-color: var(--accent-color);
            padding: 10px 25px;
            font-weight: 600;
            border-radius: 50px;
            transition: all 0.3s;
        }

        .btn-primary:hover {
            background-color: #e08600;
            border-color: #e08600;
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
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

        .section-title.text-center::after {
            margin-left: auto;
            margin-right: auto;
        }

        .about-image {
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }

        .gallery-item {
            position: relative;
            overflow: hidden;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
            height: 280px;
            background-color: #fff;
        }

        .gallery-item:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
        }

        .gallery-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .gallery-item:hover img {
            transform: scale(1.05);
        }

        .gallery-caption {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            background: linear-gradient(to top, rgba(0, 0, 0, 0.7), transparent);
            color: white;
            padding: 30px 15px 15px 15px;
            font-weight: 600;
            text-align: center;
            opacity: 0;
            transform: translateY(20px);
            transition: all 0.3s ease;
        }

        .gallery-item:hover .gallery-caption {
            opacity: 1;
            transform: translateY(0);
        }

        /* Kartu Manfaat (menggunakan gaya yang sudah ada) */
        .feature-card {
            background-color: white;
            border-radius: 15px;
            padding: 30px;
            margin-bottom: 30px;
            transition: all 0.3s ease;
            border: none;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            height: 100%;
        }

        .feature-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
        }

        .feature-icon {
            margin-bottom: 25px;
        }

        .feature-icon i {
            font-size: 3rem;
            color: var(--accent-color);
            background: rgba(255, 152, 0, 0.1);
            width: 80px;
            height: 80px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
        }

        .feature-title {
            font-weight: 700;
            margin-bottom: 15px;
            color: var(--primary-color);
        }

        .product-section {
            background-color: #f8f9fa;
            padding: 80px 0;
        }

        .product-card {
            background-color: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
            border: none;
            height: 100%;
        }

        .product-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
        }

        .product-icon {
            font-size: 2.5rem;
            color: var(--primary-color);
            margin-bottom: 20px;
        }

        .product-title {
            font-weight: 700;
            margin-bottom: 15px;
            color: var(--primary-color);
        }

        .product-btn {
            padding: 8px 20px;
            font-size: 0.9rem;
            font-weight: 600;
            border-radius: 50px;
        }

        .year-select {
            margin-bottom: 30px;
        }

        .year-select .btn {
            margin-right: 10px;
            margin-bottom: 10px;
            border-radius: 50px;
            font-weight: 600;
            padding: 8px 20px;
            background-color: white;
            color: var(--primary-color);
            border: 2px solid var(--primary-color);
            transition: all 0.3s;
        }

        .year-select .btn:hover,
        .year-select .btn.active {
            background-color: var(--primary-color);
            color: white;
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

        .sop-diagram {
            background-color: white;
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        }

        .looker-embed-container {
            position: relative;
            overflow: hidden;
            width: 100%;
            padding-top: 140%;
            /* Aspect Ratio (height/width * 100). Sesuaikan jika perlu */
        }

        .looker-embed-container iframe {
            position: absolute;
            top: 0;
            left: 0;
            bottom: 0;
            right: 0;
            width: 100%;
            height: 100%;
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark sticky-top">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">
                <i class="fas fa-map-marked-alt me-2"></i>
                Desa Wajok Hilir
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('cantik.index')}}">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#tentang">Tentang</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#manfaat">Manfaat</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#dokumentasi">Dokumentasi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#produk">Produk Statistik</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}">
                            <i class="fas fa-arrow-left me-1"></i> Kembali ke Cerdas-SM
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-section" id="beranda">
        <div class="hero-overlay"></div>
        <div class="container hero-content">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <h1 class="hero-title" data-animate-text>Desa Wajok Hilir</h1>
                    <p class="hero-subtitle" data-animate-text>Desa Cinta Statistik (Cantik) di Kecamatan Jongkat</p>
                    <a href="#produk" class="btn btn-primary btn-lg" data-aos="fade-up" data-aos-delay="1000">
                        <i class="fas fa-chart-bar me-2"></i>Lihat Produk Statistik
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Tentang Section -->
    <section class="py-5" id="tentang">
        <div class="container py-5">
            <div class="row align-items-center">
                <div class="col-lg-6 mb-4 mb-lg-0" data-aos="fade-right" data-aos-duration="1000">
                    <div class="about-image">
                        <img src="{{ asset('images/wajokhilir.webp') }}" alt="Desa Wajok Hilir" class="img-fluid">
                    </div>
                </div>
                <div class="col-lg-6" data-aos="fade-left" data-aos-duration="1000">
                    <h2 class="section-title">Tentang Desa Wajok Hilir</h2>
                    <p>Desa Wajok Hilir terletak di Kecamatan Jongkat, Kabupaten Mempawah, Provinsi
                        Kalimantan Barat. Desa ini merupakan salah satu Desa/Kelurahan yang terpilih dalam program
                        Desa/Kelurahan Cinta Statistik (Cantik).</p>

                    <p>Program Desa/Kelurahan Cinta Statistik bertujuan untuk meningkatkan kesadaran masyarakat akan
                        pentingnya data statistik dalam pengambilan keputusan dan perencanaan pembangunan di tingkat
                        desa/kelurahan.</p>

                    <div class="row mt-4">
                        <div class="col-md-6 mb-3">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-users text-primary me-3" style="font-size: 2rem;"></i>
                                <div>
                                    <h5 class="mb-1">Jumlah Penduduk</h5>
                                    <p class="text-muted mb-0">11455 jiwa (Tahun 2023)</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-map-marked-alt text-primary me-3" style="font-size: 2rem;"></i>
                                <div>
                                    <h5 class="mb-1">Luas Wilayah</h5>
                                    <p class="text-muted mb-0">7247 Ha</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-trophy text-primary me-3" style="font-size: 2rem;"></i>
                                <div>
                                    <h5 class="mb-1">Status</h5>
                                    <p class="text-muted mb-0">Desa Cinta Statistik</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="manfaat" class="py-5" style="background-color: #ffffff;">
        <div class="container py-5">
            <h2 class="section-title text-center">Manfaat Program Desa Cantik</h2>
            <p class="text-center text-muted mb-5" style="font-size: 1.1rem;">
                Mengubah Data Menjadi Kesejahteraan, Dimulai dari Desa Kita.
            </p>
            <div class="row">
                <div class="col-lg-3 col-md-6 mb-4" data-aos="fade-up">
                    <div class="feature-card text-center">
                        <div class="feature-icon mx-auto">
                            <i class="fas fa-bullseye"></i>
                        </div>
                        <h5 class="feature-title">Kebijakan Tepat Sasaran</h5>
                        <p class="text-muted">Dengan data hingga level individu dan koordinat rumah, bantuan sosial dan
                            program pembangunan dapat disalurkan secara akurat kepada warga yang benar-benar
                            membutuhkan.
                        </p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="feature-card text-center">
                        <div class="feature-icon mx-auto">
                            <i class="fas fa-sitemap"></i>
                        </div>
                        <h5 class="feature-title">Kemandirian Data Desa</h5>
                        <p class="text-muted">Desa tidak lagi hanya menjadi objek pendataan, tetapi menjadi subjek yang
                            mampu mengelola, menganalisis, dan menyajikan datanya sendiri untuk kepentingan lokal.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="400">
                    <div class="feature-card text-center">
                        <div class="feature-icon mx-auto">
                            <i class="fas fa-chart-line"></i>
                        </div>
                        <h5 class="feature-title">Perencanaan Berbasis Bukti</h5>
                        <p class="text-muted">Setiap rencana pembangunan desa (Musrenbangdes) didasarkan pada data
                            faktual
                            dan terkini, sehingga lebih efektif dalam menjawab kebutuhan nyata masyarakat.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="600">
                    <div class="feature-card text-center">
                        <div class="feature-icon mx-auto">
                            <i class="fas fa-handshake-angle"></i>
                        </div>
                        <h5 class="feature-title">Transparansi & Kolaborasi</h5>
                        <p class="text-muted">Ketersediaan data yang valid meningkatkan kepercayaan publik dan membuka
                            peluang kerjasama dengan pihak eksternal seperti pemerintah, akademisi, dan swasta.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ============================================== -->



    <section class="product-section">
        <div class="container">
            <div class="row">
                <h2 class="section-title text-center">Produk Statistik yang akan Datang</h2>
                <!-- Monografi Desa -->
                <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up" data-aos-duration="1000">
                    <div class="product-card h-100">
                        <div class="card-body text-center p-4">
                            <div class="product-icon">
                                <i class="fas fa-book"></i>
                            </div>
                            <h4 class="product-title">Monografi Desa</h4>
                            <p class="card-text">Gambaran umum Desa yang mencakup data kependudukan, ekonomi,
                                sosial, dan infrastruktur.</p>

                            <div class="year-select">
                                <h6 class="mb-2">Pilih Tahun:</h6>
                                <button class="btn active">2023</button>
                                <button class="btn">2022</button>
                                <button class="btn">2021</button>
                            </div>

                            <div class="d-grid gap-2">
                                <a href="#" class="btn btn-primary product-btn">
                                    <i class="fas fa-eye me-2"></i>Lihat Online
                                </a>
                                <a href="#" class="btn btn-outline-primary product-btn">
                                    <i class="fas fa-download me-2"></i>Unduh PDF
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Infografis -->
                <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
                    <div class="product-card h-100">
                        <div class="card-body text-center p-4">
                            <div class="product-icon">
                                <i class="fas fa-chart-pie"></i>
                            </div>
                            <h4 class="product-title">Infografis</h4>
                            <p class="card-text">Visualisasi data statistik dalam bentuk infografis yang menarik dan
                                mudah dipahami.</p>

                            <div class="year-select">
                                <h6 class="mb-2">Pilih Tahun:</h6>
                                <button class="btn active">2023</button>
                                <button class="btn">2022</button>
                                <button class="btn">2021</button>
                            </div>

                            <div class="d-grid gap-2">
                                <a href="#" class="btn btn-primary product-btn">
                                    <i class="fas fa-eye me-2"></i>Lihat Infografis
                                </a>
                                <a href="#" class="btn btn-outline-primary product-btn">
                                    <i class="fas fa-download me-2"></i>Unduh Gambar
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Tabel Data -->
                <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="400">
                    <div class="product-card h-100">
                        <div class="card-body text-center p-4">
                            <div class="product-icon">
                                <i class="fas fa-table"></i>
                            </div>
                            <h4 class="product-title">Tabel Data</h4>
                            <p class="card-text">Kumpulan tabel data statistik Desa yang dapat diakses dan diunduh
                                dalam format Excel.</p>

                            <div class="year-select">
                                <h6 class="mb-2">Pilih Tahun:</h6>
                                <button class="btn active">2023</button>
                                <button class="btn">2022</button>
                                <button class="btn">2021</button>
                            </div>

                            <div class="d-grid gap-2">
                                <a href="#" class="btn btn-primary product-btn">
                                    <i class="fas fa-eye me-2"></i>Lihat Tabel
                                </a>
                                <a href="#" class="btn btn-outline-primary product-btn">
                                    <i class="fas fa-download me-2"></i>Unduh Excel
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Publikasi -->
                <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
                    <div class="product-card h-100">
                        <div class="card-body text-center p-4">
                            <div class="product-icon">
                                <i class="fas fa-file-alt"></i>
                            </div>
                            <h4 class="product-title">Publikasi</h4>
                            <p class="card-text">Dokumen publikasi resmi yang berisi analisis komprehensif tentang
                                berbagai aspek di kelurahan.</p>

                            <div class="year-select">
                                <h6 class="mb-2">Pilih Tahun:</h6>
                                <button class="btn active">2023</button>
                                <button class="btn">2022</button>
                                <button class="btn">2021</button>
                            </div>

                            <div class="d-grid gap-2">
                                <a href="#" class="btn btn-primary product-btn">
                                    <i class="fas fa-eye me-2"></i>Lihat Publikasi
                                </a>
                                <a href="#" class="btn btn-outline-primary product-btn">
                                    <i class="fas fa-download me-2"></i>Unduh PDF
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- SOP Permintaan Data -->
                <div class="col-lg-8 col-md-12 mb-4" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="400">
                    <div class="product-card h-100">
                        <div class="card-body p-4">
                            <div class="row">
                                <div class="col-md-4 text-center mb-4 mb-md-0">
                                    <div class="product-icon">
                                        <i class="fas fa-clipboard-list"></i>
                                    </div>
                                    <h4 class="product-title">SOP Permintaan Data</h4>
                                    <p>Standar Operasional Prosedur untuk permintaan data statistik Desa Pulau
                                        Pedalaman.</p>

                                    <div class="year-select">
                                        <h6 class="mb-2">Pilih Tahun:</h6>
                                        <button class="btn active">2023</button>
                                        <button class="btn">2022</button>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="sop-diagram">
                                        <h5 class="text-center mb-4">Alur Permintaan Data</h5>
                                        <img src="{{ asset('images/sop-diagram.svg') }}" alt="Diagram Alur SOP"
                                            class="img-fluid">
                                        <div class="mt-3 text-center">
                                            <a href="#" class="btn btn-sm btn-outline-primary">
                                                <i class="fas fa-download me-1"></i>Unduh SOP Lengkap (PDF)
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
                <div class="col-lg-5 mb-4">
                    <h5 class="footer-title">Desa Wajok Hilir</h5>
                    <p>Desa Cinta Statistik (Cantik) di Kecamatan Jongkat, Kabupaten Mempawah, Kalimantan Barat.</p>
                    <div class="social-links mt-4">
                        <a href="#"><i class="fab fa-facebook"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 mb-4">
                    <h5 class="footer-title">Tautan Cepat</h5>
                    <ul class="footer-links">
                        <li><a href="#beranda">Beranda</a></li>
                        <li><a href="#tentang">Tentang</a></li>
                        <li><a href="#dokumentasi">Dokumentasi</a></li>
                        <li><a href="#produk">Produk Statistik</a></li>
                        <li><a href="{{ route('home') }}">Kembali ke Cerdas-SM</a></li>
                    </ul>
                </div>

                <div class="col-lg-4 col-md-6 mb-4">
                    <h5 class="footer-title">Kontak</h5>
                    <ul class="footer-links">
                        <li><i class="fas fa-map-marker-alt me-2"></i> Jl. Desa No. 45, Pulau Pedalaman, Mempawah
                            Timur</li>
                        <li><i class="fas fa-phone-alt me-2"></i> +62 561 987654</li>
                        <li><i class="fas fa-envelope me-2"></i> info@pulaupedalaman.desa.id</li>
                    </ul>
                </div>
            </div>

            <div class="text-center copyright">
                <p>© {{ date('Y') }} Desa Wajok Hilir - Cerdas Survey Management. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- AOS JS -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
                // Inisialisasi AOS
                AOS.init({
                    once: true,
                    duration: 800
                });

                // Script untuk animasi teks per kata
                const textElements = document.querySelectorAll('[data-animate-text]');
                textElements.forEach(textEl => {
                    const text = textEl.textContent;
                    const words = text.split(' ');
                    let newContent = '';

                    words.forEach((word, index) => {
                        const wordHtml = `<span class="word-wrapper"><span class="word" style="animation-delay: ${index * 0.08}s">${word}</span></span>`;
                        newContent += wordHtml + ' ';
                    });

                    textEl.innerHTML = newContent.trim();
                });

                // ============================================== //
                //      SCRIPT BARU UNTUK EFEK PARALLAX           //
                // ============================================== //
                const heroSection = document.querySelector('.hero-section');
                window.addEventListener('scroll', function() {
                    // Ambil posisi scroll vertikal saat ini
                    const scrollPosition = window.pageYOffset;

                    // Atur posisi background.
                    // Angka 0.5 menentukan kecepatan parallax. Anda bisa mengubahnya (misal: 0.3, 0.7, dll)
                    heroSection.style.backgroundPositionY = scrollPosition * 0.5 + 'px';
                });

                // Script untuk tombol tahun produk (tidak berubah)
                document.querySelectorAll('.year-select .btn').forEach(button => {
                    button.addEventListener('click', function() {
                        this.parentNode.querySelectorAll('.btn').forEach(btn => {
                            btn.classList.remove('active');
                        });
                        this.classList.add('active');
                        console.log('Selected year:', this.textContent);
                    });
                });
            });
    </script>
</body>
<!-- Looker Studio Modal -->
<div class="modal fade" id="lookerStudioModal" tabindex="-1" aria-labelledby="lookerStudioModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="lookerStudioModalLabel">Dashboard Interaktif - Desa Wajok Hilir
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-0">
                <!-- Responsive Embed Container -->
                {{-- <div class="looker-embed-container">
                    <iframe
                        src="https://lookerstudio.google.com/embed/reporting/cc546ae1-d17a-428a-95e4-6940228a4c76/page/yprPF"
                        frameborder="0" style="border:0" allowfullscreen
                        sandbox="allow-storage-access-by-user-activation allow-scripts allow-same-origin allow-popups allow-popups-to-escape-sandbox"></iframe>
                </div> --}}
            </div>
        </div>
    </div>
</div>

</html>
