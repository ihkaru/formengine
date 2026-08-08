<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kolaborasi Digital Desa/Kelurahan Cantik - Cerdas Survey Management</title>
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

        /* === PERUBAHAN: Efek Parallax Header === */
        .page-header {
        color: white;
        padding: 100px 0 140px;
        position: relative;
        overflow: hidden;
        /* Layer gradien di atas gambar untuk keterbacaan teks */
        background: linear-gradient(135deg, rgba(46, 80, 144, 0.85) 0%, rgba(26, 54, 93, 0.9) 100%),
        url('https://images.unsplash.com/photo-1557687799-9426a4a4f8a8?q=80&w=2070&auto=format&fit=crop');
        background-size: cover;
        background-position: center;
        background-attachment: fixed; /* Kunci efek parallax */
        }

        .page-header::before {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        height: 100px;
        /* background: teal; */
        background-size: cover;
        background-position: bottom;
        }

        .logo-container {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 25px;
        margin-bottom: 30px;
        }

        .logo-container img {
        max-height: 200px; /* Ukuran logo yang lebih proporsional */
        width: auto;
        background: rgba(255, 255, 255, 0.9);
        border-radius: 8px;
        padding: 8px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
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

        /* === PERUBAHAN: Animasi Slide-Up Kustom === */
        @keyframes slideUp {
        from {
        transform: translateY(80%);
        opacity: 0;
        }
        to {
        transform: translateY(0);
        opacity: 1;
        }
        }

        /* Elemen disembunyikan awalnya */
        .animate-on-scroll {
        opacity: 0;
        will-change: transform, opacity; /* Optimasi performa */
        }

        /* Kelas yg ditambahkan JS saat elemen terlihat */
        .animate-on-scroll.is-visible {
        animation: slideUp 0.8s ease-out forwards;
        }
        /* === AKHIR PERUBAHAN ANIMASI === */


        @media (max-width: 768px) {
            .page-header {
            padding: 80px 0 100px;
            background-attachment: scroll; /* Menonaktifkan parallax di mobile untuk performa */
            }
            .logo-container img {
            max-height: 150px;
            }
            .page-header h1 {
            font-size: 2.2rem;
            }
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

        /* === SECTION BARU: Intervensi Data Mikro === */
        .microdata-section {
        position: relative;
        padding: 100px 0;
        color: white;
        background: linear-gradient(rgba(46, 80, 144, 0.9), rgba(46, 80, 144, 0.9)),
        url('https://images.unsplash.com/photo-1517048676732-d65bc937f952?q=80&w=2070&auto=format&fit=crop');
        background-size: cover;
        background-position: center;
        background-attachment: fixed; /* Efek Parallax */
        }

        .microdata-section h2 {
        color: var(--accent-color);
        font-weight: 700;
        }

        .microdata-section p, .microdata-section li {
        opacity: 0.9;
        }

        .microdata-section .icon-box {
        font-size: 2.5rem;
        color: var(--accent-color);
        margin-right: 20px;
        }

        /* === SECTION BARU: Peta Koordinat === */
        .map-section img,
        .about-image img { /* Menambahkan .about-image img agar konsisten */
        border-radius: 12px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.15);
        border: 5px solid white;
        }

        .map-section .list-group-item {
        background-color: transparent;
        border: none;
        padding-left: 0;
        }

        .map-section .list-group-item i {
            color: var(--primary-color);
            width: 25px;
        }

        .desa-card-link {
        text-decoration: none;
        color: inherit
        }

        .desa-card {
        border-radius: 15px;
        overflow: hidden;
        box-shadow: 0 5px 15px rgba(0, 0, 0, .08);
        transition: all .3s ease;
        border: none;
        height: 100%;
        background-color: white
        }

        .desa-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 15px 30px rgba(46, 80, 144, .15)
        }

        .desa-card img {
        height: 220px;
        object-fit: cover;
        width: 100%
        }

        .desa-card-body {
        padding: 25px
        }

        .card-title {
        font-weight: 700;
        color: var(--primary-color)
        }

        .tool-card,
        .impact-card {
        background-color: white;
        border-radius: 12px;
        padding: 30px;
        margin-bottom: 30px;
        transition: all .3s ease;
        border: 1px solid #e9ecef;
        box-shadow: 0 5px 15px rgba(0, 0, 0, .05);
        height: 100%
        }

        .tool-card:hover,
        .impact-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 10px 30px rgba(0, 0, 0, .1)
        }

        .card-icon {
        font-size: 3rem;
        margin-bottom: 20px;
        color: var(--primary-color)
        }

        .pilot-case-section {
        background-color: var(--light-bg);
        padding: 80px 0
        }

        .collaboration-section {
        background-color: var(--primary-color);
        color: white;
        border-radius: 15px;
        padding: 50px
        }

        .collaboration-section h3 {
        color: var(--accent-color);
        font-weight: 700
        }

        .collaboration-section .list-group-item {
        background: rgba(255, 255, 255, .1);
        border: none;
        color: white
        }

        .collaboration-section .list-group-item i {
        color: var(--accent-color)
        }

        .footer {
        background-color: var(--primary-color);
        color: white;
        padding: 60px 0 30px
        }

        .footer-title {
        font-weight: 700;
        margin-bottom: 25px
        }

        .footer-links {
        list-style: none;
        padding: 0
        }

        .footer-links li {
        margin-bottom: 10px
        }

        .footer-links a {
        color: rgba(255, 255, 255, .8);
        text-decoration: none;
        transition: all .3s
        }

        .footer-links a:hover {
        color: white;
        padding-left: 5px
        }

        .copyright {
        margin-top: 30px;
        padding-top: 20px;
        border-top: 1px solid rgba(255, 255, 255, .1)
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    @include('partials.navbar')

    <main>
        <!-- Page Header -->
    <header class="page-header text-center">
    <div class="container position-relative">
        <div class="logo-container">
            <img src="{{asset('images/MPW.png')}}" alt="Logo Pemerintah Kabupaten Mempawah" class="animate-on-scroll">
            <img src="{{asset('images/BPS.png')}}" alt="Logo BPS" class="animate-on-scroll"
                style="animation-delay: 0.1s;">
        </div>

        <!-- ============================================== -->
        <!--        HIGHLIGHT RESPONSIF DIPERBARUI          -->
        <!-- ============================================== -->
        <div class="mb-4 animate-on-scroll" style="animation-delay: 0.2s;">
            <!--
              PENJELASAN CLASS BARU:
              - rounded-3: Bentuk default untuk mobile (persegi panjang dengan sudut membulat).
              - rounded-lg-pill: Berubah menjadi pil di layar besar (large) dan di atasnya.
              - fs-6 & fs-lg-5: Ukuran font kecil di mobile, dan lebih besar di desktop.
              - px-3 & px-lg-4: Padding horizontal lebih kecil di mobile, lebih besar di desktop.
            -->
            <div class="bg-white text-primary fw-semibold d-inline-block rounded-3 rounded-lg-pill px-3 px-lg-4 py-2"
                style="max-width: 90%; line-height: 1.5;">
                <span class="fs-6 fs-lg-5">
                    Program Desa/Kelurahan Cinta Statistik Kabupaten Mempawah
                </span>
            </div>
        </div>
        <!-- ============================================== -->
        <!--                AKHIR HIGHLIGHT                 -->
        <!-- ============================================== -->

        <h1 class="mb-3 animate-on-scroll" style="animation-delay: 0.3s;">Mewujudkan Desa/Kelurahan Sebagai Subjek
            Pembangunan Berbasis Data</h1>

        <p class="lead animate-on-scroll" style="animation-delay: 0.4s;">Melalui program Kolaborasi Digital
            Desa/Kelurahan Cantik (Cinta Statistik), BPS Kabupaten Mempawah membina Desa/Kelurahan untuk mengelola dan
            memanfaatkan data demi perencanaan yang lebih presisi.</p>
        </div>
    </header>

        <!-- ========== BAGIAN BARU: CARD PEMILIHAN Desa/Kelurahan ========== -->
        <section class="py-5 bg-light" id="pilih-desa">
            <div class="container">
                <div class="text-center mb-5" data-aos="fade-up">
                    <span class="badge bg-primary px-3 py-2 rounded-pill mb-2">Desa Cinta Statistik (Desa Cantik)</span>
                    <h2 class="section-title text-center">Daftar Desa Binaan & Pra-Desa</h2>
                    <p class="text-muted col-lg-8 mx-auto">
                        Pilih desa atau kelurahan untuk melihat dasbor indikator data statistik, hasil pencacahan AppSheet, dan showcase uji lapangan CERDAS Survey Engine.
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
                                <img src="{{ asset('images/sungaibakaukecil/kantor-desa.webp') }}" class="card-img-top" alt="Desa Sungai Bakau Kecil" style="height: 220px; object-fit: cover;">
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
        <!-- ========== AKHIR BAGIAN PEMILIHAN ========== -->

        <!-- ============================================== -->
        <!--        SECTION DUKUNGAN PEMKAB BARU MULAI      -->
        <!-- ============================================== -->
        <section id="dukungan-pemkab" class="py-5" style="background-color: white;">
            <div class="container py-5">
                <div class="row align-items-center">
                    <div class="col-lg-6 mb-4 mb-lg-0" data-aos="fade-right" data-aos-duration="1000">
                        <div class="about-image">
                            <img src="{{ asset('images/dukungan-pemda.jpg') }}"
                                alt="Sekda Mempawah, Ismail, dalam acara Evaluasi Pembinaan Statistik Sektoral"
                                class="img-fluid">
                        </div>
                    </div>
                    <div class="col-lg-6" data-aos="fade-left" data-aos-duration="1000">
                        <h2 class="section-title text-start">Dukungan Penuh Pemerintah Kabupaten Mempawah untuk Program Desa Cantik</h2>
                        <p class="text-muted">
                            Pemerintah Kabupaten Mempawah, melalui Sekretaris Daerah Ismail, menegaskan komitmen dan
                            dukungan
                            penuhnya terhadap keberhasilan Program Desa Cinta Statistik (Cantik) di Desa Sejegi dan
                            Kelurahan
                            Pulau Pedalaman.
                        </p>
                        <p class="text-muted">
                            Dukungan ini disampaikan secara resmi dalam acara "Evaluasi Pembinaan Statistik Sektoral dan
                            Program Desa/Kelurahan Cinta Statistik" pada
                            24
                            Juli 2025, yang menyoroti peran strategis data berkualitas untuk pembangunan daerah yang tepat
                            sasaran.
                        </p>
                        <blockquote class="blockquote mt-4 border-start border-4 border-primary ps-3">
                            <p class="mb-2 fst-italic">"Kedepan kiranya program Desa Cantik ini dapat lebih dimasifkan
                                untuk seluruh desa dan kelurahan, serta dikolaborasikan dengan kebutuhan data di tingkat
                                daerah yang dikelola perangkat daerah."</p>
                                <br>
                            <footer class="blockquote-footer">Ismail, <cite title="Source Title">Sekretaris Daerah
                                    Kabupaten
                                    Mempawah</cite></footer>
                        </blockquote>
                        <div class="mt-4">
                            <a href="https://www.instagram.com/p/DMfN8FsPXv0/?img_index=1" target="_blank"
                                rel="noopener noreferrer" class="btn btn-primary" style="background-color: var(--primary-color); border-color: var(--primary-color);">
                                <i class="fab fa-instagram me-2"></i> Lihat Selengkapnya
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- ============================================== -->
        <!--         SECTION DUKUNGAN PEMKAB BARU SELESAI     -->
        <!-- ============================================== -->

        <section class="microdata-section" id="microdata">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6" data-aos="fade-right">
                        <h2 class="mb-4">Intervensi Tepat Sasaran Berbasis Data Mikro</h2>
                        <p>Kebijakan yang efektif tidak lahir dari data agregat (rata-rata), tetapi dari pemahaman mendalam
                            terhadap data mikro—informasi pada level individu dan rumah tangga. Dengan data mikro, pemerintah
                            dapat:</p>
                        <ul class="list-unstyled mt-4">
                            <li class="d-flex align-items-start mb-3">
                                <i class="fas fa-user-check icon-box"></i>
                                <div>
                                    <h5>Mengidentifikasi Penerima Manfaat</h5>
                                    <p class="mb-0">Mengetahui secara pasti (by name by address) siapa yang berhak menerima
                                        bantuan sosial, beasiswa, atau intervensi stunting, sehingga mengurangi salah sasaran.
                                    </p>
                                </div>
                            </li>
                            <li class="d-flex align-items-start mb-3">
                                <i class="fas fa-tasks icon-box"></i>
                                <div>
                                    <h5>Merancang Program yang Relevan</h5>
                                    <p class="mb-0">Memahami karakteristik unik setiap rumah tangga untuk merancang program
                                        pemberdayaan ekonomi atau pelatihan yang sesuai dengan kebutuhan nyata mereka.</p>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-6 text-center d-none d-lg-block" data-aos="zoom-in">
                        <i class="fas fa-magnifying-glass-chart fa-10x text-white opacity-25"></i>
                    </div>
                </div>
            </div>
        </section>

        <!-- === SECTION BARU: DATA BERBASIS KOORDINAT === -->
        <section class="py-5 bg-light" id="koordinat">
            <div class="container py-5">
                <div class="row align-items-center">
                    <div class="col-lg-6" data-aos="fade-right">
                        <h2 class="section-title text-start mb-4">Pemetaan Spasial untuk Perencanaan Presisi</h2>
                        <p class="text-muted">Aplikasi pendataan tidak hanya mencatat 'apa' dan 'siapa', tetapi juga 'di mana'.
                            Setiap data yang dikumpulkan dilengkapi dengan informasi koordinat geografis (GPS).</p>
                        <p class="text-muted">Hal ini memungkinkan visualisasi data dalam bentuk peta interaktif untuk:</p>
                        <ul class="list-group list-group-flush mt-3">
                            <li class="list-group-item d-flex align-items-center"><i class="fas fa-user-friends me-3"></i>Mengetahui profil
                                keluarga dan komposisi anggota rumah tangga.</li>
                            <li class="list-group-item d-flex align-items-center"><i class="fas fa-child me-3"></i>Memetakan anak putus sekolah
                                dan kelompok disabilitas.</li>
                            <li class="list-group-item d-flex align-items-center"><i class="fas fa-home me-3"></i>Menilai kondisi fisik rumah
                                berdasarkan foto dan bahan bangunan utama.</li>
                            <li class="list-group-item d-flex align-items-center"><i class="fas fa-toilet me-3"></i>Mengidentifikasi akses
                                sanitasi dan pengelolaan sampah keluarga.</li>
                        </ul>
                    </div>

                    <div class="col-lg-6 map-section mt-4 mt-lg-0" data-aos="fade-left">
                        <!-- GANTI DENGAN SCREENSHOT PETA DARI APLIKASI ANDA -->
                        <img src="{{asset('images/map.jpg')}}" alt="Contoh Peta Sebaran Data"
                            class="img-fluid">
                    </div>
                </div>
            </div>
        </section>

        <!-- The Problem Section -->
        <section class="py-5">
            <div class="container py-5">
                <div class="row align-items-center">
                    <div class="col-lg-6" data-aos="fade-right">
                        <h2 class="section-title text-start mb-4">Mengatasi Permasalahan Klasik Data Desa</h2>
                        <p class="text-muted">Selama ini, Desa/Kelurahan seringkali dihadapkan pada tantangan dalam pengelolaan
                            data. Aparatur Desa/Kelurahan diminta untuk menginput data ke dalam berbagai aplikasi, namun
                            seringkali tidak memiliki akses kembali terhadap data yang telah mereka kumpulkan. Hal ini
                            menyebabkan data tidak terintegrasi dan tidak dapat dimanfaatkan secara optimal untuk
                            pembangunan lokal.</p>
                        <p class="fw-bold text-primary">Program Desa/Kelurahan Cantik hadir bukan untuk menambah aplikasi baru,
                            melainkan untuk memperkuat ekosistem digital yang sudah ada dengan solusi yang efektif dan
                            mudah diimplementasikan.</p>
                    </div>
                    <div class="col-lg-6 map-section mt-4 mt-lg-0" data-aos="fade-left">
                        <img src="{{asset('images/sejegi-app-2.webp')}}"
                            alt="Ilustrasi Data" class="img-fluid rounded">
                    </div>
                </div>
            </div>
        </section>

        <!-- The Solution: Digital Ecosystem -->
        <section class="py-5 bg-light">
            <div class="container py-5">
                <h2 class="section-title text-center">Solusi Digital untuk Kemandirian Data Desa</h2>
                <p class="text-center text-muted mb-5 col-lg-8 mx-auto">Kolaborasi Digital Desa/Kelurahan Cantik memanfaatkan
                    serangkaian perangkat digital yang saling terhubung untuk membina Desa/Kelurahan dalam mengelola datanya
                    sendiri secara mandiri dan berkelanjutan.</p>
                <div class="row">
                    <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="0">
                        <div class="tool-card text-center"><i class="fas fa-mobile-alt card-icon"></i>
                            <h4>AppSheet</h4>
                            <p class="text-muted">Memudahkan aparatur Desa/Kelurahan melakukan input data secara fleksibel melalui
                                smartphone atau laptop, langsung dari lapangan.</p>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
                        <div class="tool-card text-center"><i class="fas fa-table card-icon"></i>
                            <h4>Google Sheets</h4>
                            <p class="text-muted">Berfungsi sebagai basis penyimpanan data yang terpusat dan platform
                                pengolahan data yang kolaboratif.</p>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="200">
                        <div class="tool-card text-center"><i class="fas fa-chart-pie card-icon"></i>
                            <h4>Looker Studio</h4>
                            <p class="text-muted">Menyajikan data dalam bentuk dasbor visual yang interaktif, mudah
                                dipahami untuk pengambilan keputusan.</p>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="300">
                        <div class="tool-card text-center"><i class="fas fa-globe card-icon"></i>
                            <h4>Cerdas-SM</h4>
                            <p class="text-muted">Mengintegrasikan seluruh data Desa/Kelurahan Cantik agar dapat diakses oleh
                                publik dan para pemangku kepentingan.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Pilot Case Section -->
        <section class="pilot-case-section">
            <div class="container">
                <h2 class="section-title text-center">Binaan 2025: Transformasi Data di Kelurahan Pulau Pedalaman
                </h2>
                <div class="row align-items-center">
                    <div data-aos="fade-right">
                        <p class="text-muted">Melalui pelatihan dan pendampingan statistik, BPS Kabupaten Mempawah
                            membina aparatur kelurahan untuk mampu mengelola dan memanfaatkan data. Hasilnya, Kelurahan
                            Pulau Pedalaman kini memiliki dasbor interaktif yang memuat berbagai informasi krusial.</p>
                        <ul class="list-unstyled">
                            <li class="d-flex mb-3"><i class="fas fa-check-circle text-success me-2 mt-1"></i>
                                <div><strong>Dasbor Komprehensif:</strong> Data kependudukan, kondisi rumah, pendidikan,
                                    hingga disabilitas kini agragasi dan dapat diakses setiap saat.</div>
                            </li>
                            <li class="d-flex mb-3"><i class="fas fa-check-circle text-success me-2 mt-1"></i>
                                <div><strong>Publikasi "Desa/Kelurahan Dalam Angka":</strong> Menjadi fondasi dalam penyusunan
                                    publikasi statistik kelurahan yang pertama.</div>
                            </li>
                            <li class="d-flex"><i class="fas fa-check-circle text-success me-2 mt-1"></i>
                                <div><strong>Dasar Musrenbangdes:</strong> Menjadi masukan penting berbasis bukti untuk
                                    perencanaan pembangunan desa.</div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="row align-item-center">
                    <div class="col-lg-6 w-100" style="height: 100vh" data-aos="fade-left">
                        <iframe class="w-100 h-100" style="height: 700px" src="https://lookerstudio.google.com/embed/reporting/cc546ae1-d17a-428a-95e4-6940228a4c76/page/yprPF"
                            frameborder="0" style="border:0" allowfullscreen
                            sandbox="allow-storage-access-by-user-activation allow-scripts allow-same-origin allow-popups allow-popups-to-escape-sandbox">
                        </iframe>
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
                        <div class="impact-card"><i class="fas fa-hand-holding-seedling card-icon"></i>
                            <h4 class="fw-bold">Kemandirian Data</h4>
                            <p class="text-muted">Desa/Kelurahan menjadi berdaulat atas datanya, mampu menyusun,
                                membaca, dan menganalisis data untuk kebutuhannya sendiri.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
                        <div class="impact-card"><i class="fas fa-bullseye card-icon"></i>
                            <h4 class="fw-bold">Perencanaan Tepat Sasaran</h4>
                            <p class="text-muted">Data yang akurat dan terkini menjadi dasar yang kuat untuk perencanaan
                                pembangunan yang lebih efektif dan menjawab persoalan nyata.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="200">
                        <div class="impact-card"><i class="fas fa-server card-icon"></i>
                            <h4 class="fw-bold">Dukungan Satu Data</h4>
                            <p class="text-muted">Program ini selaras dan mendukung inisiatif Satu Data Indonesia dengan
                                menghasilkan data berkualitas dari level akar rumput.</p>
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
                            <h3 class="mb-3">Sinergi Membangun Daerah Berbasis Data</h3>
                            <p class="opacity-75">
                                Keberhasilan dan perluasan program Kolaborasi Digital Desa/Kelurahan Cantik sangat bergantung pada
                                komitmen bersama. BPS Kabupaten Mempawah berkomitmen untuk mewujudkan kolaborasi seluas-luasnya bagi seluruh
                                Organisasi Perangkat Daerah (OPD) serta Pemerintah Desa/Kelurahan untuk bersama-sama
                                memperkuat ekosistem data daerah dari akar rumput.
                            </p>
                            <p class="opacity-75 mt-3">
                                Mari wujudkan pembangunan yang lebih terarah dan tepat sasaran melalui kemitraan strategis
                                dalam:
                            </p>
                            <ul class="list-group list-group-flush mt-4">
                                <li class="list-group-item"><i class="fas fa-sitemap me-3"></i>Pemanfaatan data Desa/Kelurahan untuk
                                    perencanaan lintas sektor.</li>
                                <li class="list-group-item"><i class="fas fa-users-cog me-3"></i>Penguatan kapasitas dan
                                    literasi data bagi aparatur.</li>
                                <li class="list-group-item"><i class="fas fa-sync-alt me-3"></i>Penyelarasan program dan
                                    kegiatan pemberdayaan di tingkat desa.</li>
                                <li class="list-group-item"><i class="fas fa-file-signature me-3"></i>Integrasi hasil data dalam
                                    Musrenbang dan dokumen perencanaan.</li>
                            </ul>
                        </div>
                        <div class="col-lg-5 text-center d-none d-lg-block">
                            <i class="fas fa-handshake fa-10x text-white opacity-25"></i>
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
                        <li><a href="#">Desa/Kelurahan Cantik</a></li>
                        <li><a href="/#kontak">Kontak</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-4 mb-4">
                    <h5 class="footer-title">Desa Binaan & Pra-Desa</h5>
                    <ul class="footer-links">
                        <li><a href="{{ route('cantik.pasirwansalim') }}">Kel. Pasir Wan Salim (2026)</a></li>
                        <li><a href="{{ route('cantik.pasirpalembang') }}">Desa Pasir Palembang (2026)</a></li>
                        <li><a href="{{ route('cantik.sungaibakaukecil') }}">Desa Sungai Bakau Kecil (2026)</a></li>
                        <li><a href="{{ route('cantik.sambora') }}" class="fw-bold text-warning"><i class="fas fa-microchip me-1"></i>Pra Desa Cantik Sambora (2026)</a></li>
                        <li><a href="{{ route('cantik.pedalaman') }}">Kel. Pulau Pedalaman (2025)</a></li>
                        <li><a href="{{ route('cantik.sejegi') }}">Desa Sejegi (2025)</a></li>
                        <li><a href="{{ route('cantik.wajokhilir') }}">Desa Wajok Hilir (2024)</a></li>
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
        // Inisialisasi AOS untuk animasi scroll di section selain header
            AOS.init({
                once: false, // Animasi hanya berjalan sekali
                duration: 800,
                offset: 100
            });

            // === PERUBAHAN: JavaScript untuk Animasi Slide-Up Kustom ===
            document.addEventListener("DOMContentLoaded", () => {
                const animatedElements = document.querySelectorAll('.animate-on-scroll');

                // Cek jika browser mendukung IntersectionObserver
                if ("IntersectionObserver" in window) {
                    const observer = new IntersectionObserver((entries, observer) => {
                        entries.forEach(entry => {
                            // Jika elemen masuk ke viewport
                            if (entry.isIntersecting) {
                                entry.target.classList.add('is-visible');
                                // Hentikan pengamatan setelah animasi berjalan
                                observer.unobserve(entry.target);
                            }
                        });
                    }, {
                        threshold: 0.1 // Picu saat 10% elemen terlihat
                    });

                    animatedElements.forEach(el => {
                        observer.observe(el);
                    });
                } else {
                    // Fallback untuk browser lama: langsung tampilkan semua
                    animatedElements.forEach(el => {
                        el.classList.add('is-visible');
                    });
                }
            });
    </script>
</body>

</html>
