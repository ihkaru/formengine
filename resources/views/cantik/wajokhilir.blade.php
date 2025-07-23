<!-- resources/views/desa/pedalaman.blade.php -->
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelurahan Pulau Pedalaman - Kelurahan Cinta Statistik</title>
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
            background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.7)),
            url('{{ asset("images/pulau-pedalaman-header.webp") }}');
            background-size: cover;
            background-position: center;
            background-position: center;
            color: white;
            padding: 150px 0;
            text-align: center;
            position: relative;
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
            margin-bottom: 20px;
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
                Kelurahan Pulau Pedalaman
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#beranda">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#tentang">Tentang</a>
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
                <div class="col-lg-10" data-aos="fade-up" data-aos-duration="1000">
                    <h1 class="hero-title">Kelurahan Pulau Pedalaman</h1>
                    <p class="hero-subtitle">Kelurahan Cinta Statistik (Cantik) di Kecamatan Mempawah Timur</p>
                    <a href="#produk" class="btn btn-primary btn-lg">
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
                        <img src="{{ asset('images/pulau-pedalaman-landscape.webp') }}" alt="Kelurahan Pulau Pedalaman"
                            class="img-fluid">
                    </div>
                </div>
                <div class="col-lg-6" data-aos="fade-left" data-aos-duration="1000">
                    <h2 class="section-title">Tentang Kelurahan Pulau Pedalaman</h2>
                    <p>Kelurahan Pulau Pedalaman terletak di Kecamatan Mempawah Timur, Kabupaten Mempawah, Provinsi
                        Kalimantan Barat. Kelurahan ini merupakan salah satu desa/kelurahan yang terpilih dalam program
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
                                    <p class="text-muted mb-0">3.245 jiwa (2023)</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-home text-primary me-3" style="font-size: 2rem;"></i>
                                <div>
                                    <h5 class="mb-1">Jumlah Rumah Tangga</h5>
                                    <p class="text-muted mb-0">876 rumah tangga</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-map-marked-alt text-primary me-3" style="font-size: 2rem;"></i>
                                <div>
                                    <h5 class="mb-1">Luas Wilayah</h5>
                                    <p class="text-muted mb-0">10,5 km<sup>2</sup></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-trophy text-primary me-3" style="font-size: 2rem;"></i>
                                <div>
                                    <h5 class="mb-1">Status</h5>
                                    <p class="text-muted mb-0">Kelurahan Cinta Statistik</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Produk Statistik Section -->
    <section class="product-section" id="produk">

        <div class="container">
            <h2 class="section-title text-center">Produk Statistik</h2>
            <p class="text-center mb-5">Berikut adalah produk statistik yang tersedia untuk Kelurahan Pulau Pedalaman
            </p>
            <div class="product-card h-100 mb-4">
                <div data-aos="fade-up" data-aos-duration="1000" data-aos-delay="300">
                    <div class="looker-embed-container card-body">
                        <iframe
                            src="https://lookerstudio.google.com/embed/reporting/cc546ae1-d17a-428a-95e4-6940228a4c76/page/yprPF"
                            frameborder="0" style="border:0" allowfullscreen
                            sandbox="allow-storage-access-by-user-activation allow-scripts allow-same-origin allow-popups allow-popups-to-escape-sandbox">
                        </iframe>
                    </div>
                </div>
            </div>

            <div class="row">
                <!-- Monografi Desa -->
                <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up" data-aos-duration="1000">
                    <div class="product-card h-100">
                        <div class="card-body text-center p-4">
                            <div class="product-icon">
                                <i class="fas fa-book"></i>
                            </div>
                            <h4 class="product-title">Monografi Desa</h4>
                            <p class="card-text">Gambaran umum kelurahan yang mencakup data kependudukan, ekonomi,
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
                            <p class="card-text">Kumpulan tabel data statistik kelurahan yang dapat diakses dan diunduh
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
                                    <p>Standar Operasional Prosedur untuk permintaan data statistik Kelurahan Pulau
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
                    <h5 class="footer-title">Kelurahan Pulau Pedalaman</h5>
                    <p>Kelurahan Cinta Statistik (Cantik) di Kecamatan Mempawah Timur, Kabupaten Mempawah, Kalimantan
                        Barat.</p>
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
                        <li><a href="#produk">Produk Statistik</a></li>
                        <li><a href="{{ route('home') }}">Kembali ke Cerdas-SM</a></li>
                    </ul>
                </div>

                <div class="col-lg-4 col-md-6 mb-4">
                    <h5 class="footer-title">Kontak</h5>
                    <ul class="footer-links">
                        <li><i class="fas fa-map-marker-alt me-2"></i> Jl. Kelurahan No. 45, Pulau Pedalaman, Mempawah
                            Timur</li>
                        <li><i class="fas fa-phone-alt me-2"></i> +62 561 987654</li>
                        <li><i class="fas fa-envelope me-2"></i> info@pulaupedalaman.desa.id</li>
                    </ul>
                </div>
            </div>

            <div class="text-center copyright">
                <p>&copy; {{ date('Y') }} Kelurahan Pulau Pedalaman - Cerdas Survey Management. All rights reserved.</p>
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
            once: true
        });

        // Tahun selection for products
        document.querySelectorAll('.year-select .btn').forEach(button => {
            button.addEventListener('click', function() {
                // Remove active class from siblings
                this.parentNode.querySelectorAll('.btn').forEach(btn => {
                    btn.classList.remove('active');
                });

                // Add active class to clicked button
                this.classList.add('active');

                // Here you would typically fetch data for the selected year
                // For demo purposes, we'll just log the selected year
                console.log('Selected year:', this.textContent);
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
                <h5 class="modal-title" id="lookerStudioModalLabel">Dashboard Interaktif - Kelurahan Pulau Pedalaman
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
