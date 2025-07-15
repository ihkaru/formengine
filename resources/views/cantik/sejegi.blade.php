<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kolaborasi Digital Desa Cantik - Cerdas Survey Management</title>
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
            background-color: white;
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

        .nav-link:hover, .nav-link.active {
            color: white !important;
            transform: translateY(-2px);
        }

        .page-header {
            background: linear-gradient(135deg, var(--primary-color) 0%, #1a365d 100%);
            color: white;
            padding: 100px 0 80px;
            position: relative;
            overflow: hidden;
        }

        .page-header::before {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 100px;
            background: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 1440 320'%3E%3Cpath fill='%23ffffff' fill-opacity='1' d='M0,192L1440,64L1440,320L0,320Z'%3E%3C/path%3E%3C/svg%3E");
            background-size: cover;
        }

        .page-header h1 {
            font-weight: 800;
            font-size: 2.8rem;
        }

        .page-header p {
            font-size: 1.2rem;
            max-width: 850px;
            margin-left: auto;
            margin-right: auto;
            opacity: 0.9;
        }

        .section-title {
            position: relative;
            margin-bottom: 50px;
            font-weight: 700;
            color: var(--primary-color);
            text-align: center;
        }

        .section-title::after {
            content: '';
            display: block;
            width: 70px;
            height: 4px;
            background-color: var(--accent-color);
            margin: 15px auto 0;
        }

        .workflow-card, .tool-card, .impact-card {
            background-color: white;
            border-radius: 12px;
            padding: 30px;
            margin-bottom: 30px;
            transition: all 0.3s ease;
            border: 1px solid #e9ecef;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            height: 100%;
        }

        .workflow-card:hover, .tool-card:hover, .impact-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }

        .card-icon {
            font-size: 3rem;
            margin-bottom: 20px;
            color: var(--primary-color);
        }

        .pilot-case-section {
            background-color: var(--light-bg);
            padding: 80px 0;
        }

        .pilot-case-section img {
            border-radius: 12px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        }

        .collaboration-section {
            background-color: var(--primary-color);
            color: white;
            border-radius: 15px;
            padding: 50px;
        }

        .collaboration-section h3 {
            color: var(--accent-color);
            font-weight: 700;
        }

        .list-group-item {
            background: rgba(255,255,255,0.1);
            border: none;
            color: white;
        }

        .list-group-item i {
            color: var(--accent-color);
        }

        .footer {
            background-color: var(--primary-color);
            color: white;
            padding: 60px 0 30px;
        }
        .footer-title { font-weight: 700; margin-bottom: 25px; }
        .footer-links { list-style: none; padding: 0; }
        .footer-links li { margin-bottom: 10px; }
        .footer-links a { color: rgba(255, 255, 255, 0.8); text-decoration: none; transition: all 0.3s; }
        .footer-links a:hover { color: white; padding-left: 5px; }
        .copyright { margin-top: 30px; padding-top: 20px; border-top: 1px solid rgba(255, 255, 255, 0.1); }

    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark sticky-top">
        <div class="container">
            <a class="navbar-brand" href="#">
                <i class="fas fa-chart-line me-2"></i>Cerdas-SM
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="/#beranda">Beranda</a></li>
                    <li class="nav-item"><a class="nav-link" href="/#tentang">Tentang</a></li>
                    <li class="nav-item"><a class="nav-link" href="/#fitur">Fitur</a></li>
                    <li class="nav-item"><a class="nav-link active" href="#">Desa Cantik</a></li>
                    <li class="nav-item"><a class="nav-link" href="/#kontak">Kontak</a></li>
                    <li class="nav-item"><a class="nav-link btn btn-sm btn-success ms-2 px-3" href="#">Login</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <main>
        <!-- Page Header -->
        <header class="page-header text-center" data-aos="fade-in">
            <div class="container position-relative">
                <h1 class="mb-3">Mewujudkan Desa Sebagai Subjek Pembangunan Berbasis Data</h1>
                <p class="lead">Melalui program Kolaborasi Digital "Desa Cinta Statistik" (Cantik), BPS Kabupaten Mempawah memberdayakan desa untuk mengelola dan memanfaatkan data demi perencanaan yang lebih presisi.</p>
            </div>
        </header>

        <!-- The Problem Section -->
        <section class="py-5">
            <div class="container py-5">
                <div class="row align-items-center">
                    <div class="col-lg-6" data-aos="fade-right">
                         <h2 class="section-title text-start mb-4">Mengatasi Permasalahan Klasik Data Desa</h2>
                         <p class="text-muted">Selama ini, desa seringkali dihadapkan pada tantangan dalam pengelolaan data. Aparatur desa diminta untuk menginput data ke dalam berbagai aplikasi, namun seringkali tidak memiliki akses kembali terhadap data yang telah mereka kumpulkan. Hal ini menyebabkan data tidak terintegrasi dan tidak dapat dimanfaatkan secara optimal untuk pembangunan lokal.</p>
                         <p class="fw-bold text-primary">Program Desa Cantik hadir bukan untuk menambah aplikasi baru, melainkan untuk memperkuat ekosistem digital yang sudah ada dengan solusi yang efektif dan mudah diimplementasikan.</p>
                    </div>
                    <div class="col-lg-6" data-aos="fade-left">
                        <img src="https://img.freepik.com/free-vector/data-points-concept-illustration_114360-2240.jpg?w=826&t=st=1721013406~exp=1721014006~hmac=2e848419f12d8a141b212f45ecb71f9743a413d9692994f31c2386e680d0d80d" alt="Ilustrasi Data" class="img-fluid rounded">
                    </div>
                </div>
            </div>
        </section>

        <!-- The Solution: Digital Ecosystem -->
        <section class="py-5 bg-light">
            <div class="container py-5">
                <h2 class="section-title text-center">Solusi Digital untuk Kemandirian Data Desa</h2>
                <p class="text-center text-muted mb-5 col-lg-8 mx-auto">Kolaborasi Digital Desa Cantik memanfaatkan serangkaian perangkat digital yang saling terhubung untuk memberdayakan desa dalam mengelola datanya sendiri secara mandiri dan berkelanjutan.</p>
                <div class="row">
                    <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="0">
                        <div class="tool-card text-center">
                            <i class="fas fa-mobile-alt card-icon"></i>
                            <h4>AppSheet</h4>
                            <p class="text-muted">Memudahkan aparatur desa melakukan input data secara fleksibel melalui smartphone atau laptop, langsung dari lapangan.</p>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
                        <div class="tool-card text-center">
                            <i class="fas fa-table card-icon"></i>
                            <h4>Google Sheets</h4>
                            <p class="text-muted">Berfungsi sebagai basis penyimpanan data yang terpusat dan platform pengolahan data yang kolaboratif.</p>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="200">
                        <div class="tool-card text-center">
                            <i class="fas fa-chart-pie card-icon"></i>
                            <h4>Looker Studio</h4>
                            <p class="text-muted">Menyajikan data dalam bentuk dasbor visual yang interaktif, mudah dipahami untuk pengambilan keputusan.</p>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="300">
                        <div class="tool-card text-center">
                            <i class="fas fa-globe card-icon"></i>
                            <h4>Cerdas-SM</h4>
                            <p class="text-muted">Mengintegrasikan seluruh data Desa Cantik agar dapat diakses oleh publik dan para pemangku kepentingan.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Pilot Case Section -->
        <section class="pilot-case-section">
            <div class="container">
                 <h2 class="section-title text-center">Proyek Percontohan: Transformasi Data di Kelurahan Pulau Pedalaman</h2>
                 <div class="row align-items-center">
                     <div class="col-lg-6" data-aos="fade-right">
                         <p class="text-muted">Melalui pelatihan dan pendampingan statistik, BPS Kabupaten Mempawah membina aparatur kelurahan untuk mampu mengelola dan memanfaatkan data. Hasilnya, Kelurahan Pulau Pedalaman kini memiliki dasbor interaktif yang memuat berbagai informasi krusial.</p>
                         <ul class="list-unstyled">
                             <li class="d-flex mb-3"><i class="fas fa-check-circle text-success me-2 mt-1"></i><div><strong>Dasbor Komprehensif:</strong> Data kependudukan, kondisi rumah, pendidikan, hingga disabilitas kini terperinci dan dapat diakses setiap saat.</div></li>
                             <li class="d-flex mb-3"><i class="fas fa-check-circle text-success me-2 mt-1"></i><div><strong>Publikasi "Desa Dalam Angka":</strong> Menjadi fondasi dalam penyusunan publikasi statistik kelurahan yang pertama.</div></li>
                             <li class="d-flex"><i class="fas fa-check-circle text-success me-2 mt-1"></i><div><strong>Dasar Musrenbangdes:</strong> Menjadi masukan penting berbasis bukti untuk perencanaan pembangunan desa.</div></li>
                         </ul>
                     </div>
                     <div class="col-lg-6" data-aos="fade-left">
                         <img src="https://placehold.co/600x450/4CAF50/FFFFFF?text=Dasbor+Pulau+Pedalaman" alt="Ilustrasi Dasbor" class="img-fluid">
                     </div>
                 </div>
            </div>
        </section>

        <!-- Impact Section -->
        <section class="py-5">
            <div class="container py-5">
                <h2 class="section-title text-center">Dampak Positif dan Manfaat Program</h2>
                <div class="row">
                    <div class="col-lg-4 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="0">
                        <div class="impact-card">
                            <i class="fas fa-hand-holding-seedling card-icon"></i>
                            <h4 class="fw-bold">Kemandirian Data</h4>
                            <p class="text-muted">Desa/Kelurahan menjadi berdaulat atas datanya, mampu menyusun, membaca, dan menganalisis data untuk kebutuhannya sendiri.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
                        <div class="impact-card">
                            <i class="fas fa-bullseye card-icon"></i>
                            <h4 class="fw-bold">Perencanaan Tepat Sasaran</h4>
                            <p class="text-muted">Data yang akurat dan terkini menjadi dasar yang kuat untuk perencanaan pembangunan yang lebih efektif dan menjawab persoalan nyata.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="200">
                        <div class="impact-card">
                            <i class="fas fa-server card-icon"></i>
                            <h4 class="fw-bold">Dukungan Satu Data</h4>
                            <p class="text-muted">Program ini selaras dan mendukung inisiatif Satu Data Indonesia dengan menghasilkan data berkualitas dari level akar rumput.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Collaboration Section -->
        <section class="py-5">
             <div class="container" data-aos="zoom-in">
                <div class="collaboration-section">
                     <div class="row align-items-center">
                        <div class="col-lg-7">
                            <h3 class="mb-3">Kolaborasi untuk Masa Depan Pembangunan Daerah</h3>
                            <p class="opacity-75">Untuk merealisasikan perluasan program ke seluruh desa, sinergi lintas sektor adalah kunci. BPS Kabupaten Mempawah mengharapkan dukungan dari Diskominfo dan OPD terkait dalam aspek berikut:</p>
                             <ul class="list-group list-group-flush mt-4">
                                <li class="list-group-item"><i class="fas fa-server me-3"></i>Penyediaan Server/Cloud untuk sentralisasi data.</li>
                                <li class="list-group-item"><i class="fas fa-link me-3"></i>Integrasi data dengan portal Satu Data Daerah.</li>
                                <li class="list-group-item"><i class="fab fa-google me-3"></i>Fasilitasi Akun Google Workspace untuk desa.</li>
                                <li class="list-group-item"><i class="fas fa-shield-alt me-3"></i>Dukungan infrastruktur dan keamanan siber.</li>
                            </ul>
                        </div>
                        <div class="col-lg-5 text-center d-none d-lg-block">
                             <i class="fas fa-people-arrows fa-10x text-white opacity-25"></i>
                        </div>
                     </div>
                </div>
            </div>
        </section>

    </main>

    <!-- Footer -->
    <footer class="footer mt-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mb-4">
                    <h5 class="footer-title">Cerdas Survey Management</h5>
                    <p>Platform tata kelola data terintegrasi untuk pengambilan keputusan yang lebih baik.</p>
                </div>
                <div class="col-lg-2 col-md-4 mb-4">
                    <h5 class="footer-title">Tautan</h5>
                    <ul class="footer-links">
                        <li><a href="/#beranda">Beranda</a></li>
                        <li><a href="/#tentang">Tentang</a></li>
                        <li><a href="#">Desa Cantik</a></li>
                        <li><a href="/#kontak">Kontak</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-4 mb-4">
                    <h5 class="footer-title">Desa Cantik Terpilih</h5>
                    <ul class="footer-links">
                        <li><a href="#">Kelurahan Pulau Pedalaman</a></li>
                        <li><a href="#">Desa Wajok Hilir</a></li>
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
                <p>© 2025 Cerdas Survey Management & BPS Kabupaten Mempawah. All rights reserved.</p>
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
            duration: 800,
            offset: 100,
        });
    </script>
</body>

</html>
