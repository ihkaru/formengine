<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Desa Cantik - Cerdas Survey Management</title>
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

        .page-header {
            background: linear-gradient(135deg, var(--primary-color) 0%, #1a365d 100%);
            color: white;
            padding: 80px 0;
            text-align: center;
        }

        .page-header h1 {
            font-weight: 800;
            font-size: 3rem;
        }

        .page-header p {
            font-size: 1.25rem;
            max-width: 800px;
            margin-left: auto;
            margin-right: auto;
            opacity: 0.9;
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
            margin: 15px auto 0;
        }

        .slogan-section {
            background-color: var(--accent-color);
            color: var(--primary-color);
            padding: 40px 0;
            text-align: center;
        }

        .slogan-section h3 {
            font-weight: 700;
            margin: 0;
        }

        .slogan-section .icon {
            font-size: 2rem;
            margin-right: 15px;
            vertical-align: middle;
        }

        .desa-card {
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
            height: 100%;
        }

        .desa-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.15);
        }

        .desa-card img {
            height: 220px;
            object-fit: cover;
            width: 100%;
        }

        .desa-card-body {
            padding: 25px;
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
    <nav class="navbar navbar-expand-lg navbar-dark sticky-top">
        <div class="container">
            <a class="navbar-brand" href="#">
                <i class="fas fa-chart-line me-2"></i>
                Cerdas-SM
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/#beranda">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/#tentang">Tentang</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/#fitur">Fitur</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Desa/Kelurahan Cantik</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/#kontak">Kontak</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-sm btn-success ms-2 px-3" href="#">Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <main>
        <!-- Page Header -->
        <header class="page-header" data-aos="fade-in">
            <div class="container">
                <h1>Desa/Kelurahan Cantik</h1>
                <p class="lead">Program Unggulan Badan Pusat Statistik (BPS) Kabupaten Mempawah untuk meningkatkan
                    literasi, kesadaran, dan peran aktif aparatur dan masyarakat dalam penyelenggaraan kegiatan
                    statistik. [10]</p>
            </div>
        </header>

        <!-- Slogan Section -->
        <section class="slogan-section" data-aos="fade-up">
            <div class="container d-flex justify-content-center align-items-center">
                <i class="fas fa-bullseye-pointer icon"></i>
                <h3>Data Akurat, Intervensi Tepat Sasaran: Membangun Negeri dari Desa dengan Geotagging Presisi.</h3>
            </div>
        </section>

        <!-- Desa Cantik Section -->
        <section class="py-5">
            <div class="container py-5">
                <div class="row mb-5" data-aos="fade-up">
                    <div class="col-lg-8 mx-auto text-center">
                        <h2 class="section-title">Program Desa Cinta Statistik (Cantik)</h2>
                        <p class="text-muted">Program Desa/Kelurahan Cantik adalah sebuah inisiatif dari BPS untuk
                            membina dan meningkatkan kompetensi aparatur desa dalam mengelola dan memanfaatkan data
                            statistik, sehingga perencanaan pembangunan desa menjadi lebih tepat sasaran. [6, 7]
                            Tujuannya adalah untuk standardisasi pengelolaan data, mengoptimalkan pemanfaatan data untuk
                            pembangunan, serta membentuk agen-agen statistik di level desa. [10] Program ini merupakan
                            langkah strategis untuk menjadikan desa sebagai subjek pembangunan, sejalan dengan arahan
                            Presiden RI untuk membangun dari pinggiran demi pemerataan ekonomi dan pengentasan
                            kemiskinan. [19]</p>
                        <p class="text-muted">Di Kabupaten Mempawah, program ini diimplementasikan untuk memperbaiki
                            tata kelola data desa agar lebih terstruktur dan terintegrasi, sehingga berbagai persoalan
                            dan potensi desa dapat tergambar dengan jelas untuk mendukung pembangunan yang lebih
                            terarah. [9, 13]</p>
                    </div>
                </div>

                <div class="row">
                    <!-- Card Desa Wajok Hilir -->
                    <div class="col-lg-4 col-md-6 mb-4 d-flex align-items-stretch" data-aos="zoom-in"
                        data-aos-duration="500">
                        <div class="desa-card">
                            <img src="https://placehold.co/600x400/2E5090/FFFFFF?text=Desa+Wajok+Hilir"
                                class="card-img-top" alt="Desa Wajok Hilir">
                            <div class="desa-card-body d-flex flex-column">
                                <h4 class="card-title">Desa Wajok Hilir</h4>
                                <p class="card-text text-muted">Kecamatan Jongkat</p>
                                <div class="mt-auto">
                                    <p class="mb-2"><i class="fas fa-calendar-alt me-2 text-primary"></i>Lokasi Binaan
                                        Tahun 2024</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <span class="badge bg-success">Pembinaan Selesai</span>
                                        <a href="#" class="btn btn-primary btn-sm">
                                            <i class="fas fa-arrow-right me-1"></i> Lihat Detail
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Card Kelurahan Pulau Pedalaman -->
                    <div class="col-lg-4 col-md-6 mb-4 d-flex align-items-stretch" data-aos="zoom-in"
                        data-aos-duration="500" data-aos-delay="200">
                        <div class="desa-card">
                            <img src="https://placehold.co/600x400/4CAF50/FFFFFF?text=Kel.+Pulau+Pedalaman"
                                class="card-img-top" alt="Kelurahan Pulau Pedalaman">
                            <div class="desa-card-body d-flex flex-column">
                                <h4 class="card-title">Kelurahan Pulau Pedalaman</h4>
                                <p class="card-text text-muted">Kecamatan Mempawah Timur</p>
                                <div class="mt-auto">
                                    <p class="mb-2"><i class="fas fa-calendar-alt me-2 text-primary"></i>Lokasi Binaan
                                        Tahun 2025</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <span class="badge bg-primary">Pembinaan Aktif</span>
                                        <a href="#" class="btn btn-primary btn-sm">
                                            <i class="fas fa-arrow-right me-1"></i> Lihat Detail
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Card Desa Selanjutnya -->
                    <div class="col-lg-4 col-md-6 mb-4 d-flex align-items-stretch" data-aos="zoom-in"
                        data-aos-duration="500" data-aos-delay="400">
                        <div class="desa-card">
                            <img src="https://placehold.co/600x400/FFC107/333333?text=Segera+Hadir" class="card-img-top"
                                alt="Desa Selanjutnya">
                            <div class="desa-card-body d-flex flex-column">
                                <h4 class="card-title">Desa/Kelurahan Berikutnya</h4>
                                <p class="card-text text-muted">Akan diumumkan</p>
                                <div class="mt-auto">
                                    <p class="mb-2"><i class="fas fa-calendar-alt me-2 text-primary"></i>Lokasi Binaan
                                        Tahun 2026</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <span class="badge bg-secondary">Segera Hadir</span>
                                        <button class="btn btn-outline-primary btn-sm" disabled>
                                            <i class="fas fa-arrow-right me-1"></i> Lihat Detail
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

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
                        <li><a href="/#beranda">Beranda</a></li>
                        <li><a href="/#tentang">Tentang</a></li>
                        <li><a href="/#fitur">Fitur</a></li>
                        <li><a href="#">Desa Cantik</a></li>
                        <li><a href="/#kontak">Kontak</a></li>
                    </ul>
                </div>

                <div class="col-lg-3 col-md-4 mb-4">
                    <h5 class="footer-title">Desa Cantik Terpilih</h5>
                    <ul class="footer-links">
                        <li><a href="#">Desa Wajok Hilir (2024)</a></li>
                        <li><a href="#">Kelurahan Pulau Pedalaman (2025)</a></li>
                    </ul>
                </div>

                <div class="col-lg-3 col-md-4 mb-4">
                    <h5 class="footer-title">Kontak</h5>
                    <ul class="footer-links">
                        <li><i class="fas fa-map-marker-alt me-2"></i> BPS Kab. Mempawah</li>
                        <li><i class="fas fa-phone-alt me-2"></i> (0561) 691049</li>
                        <li><i class="fas fa-envelope me-2"></i> bps6104@bps.go.id</li>
                    </ul>
                </div>
            </div>

            <div class="text-center copyright">
                <p>© 2025 Cerdas Survey Management. All rights reserved.</p>
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
            once: true,
            duration: 800
        });
    </script>
</body>

</html>
