@props([
    'title' => 'Portal Desa Cantik 2026 - BPS Kabupaten Mempawah',
    'description' => 'Portal Resmi Desa Cantik 2026 - BPS Kabupaten Mempawah',
    'extraHead' => ''
])
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
    <meta name="description" content="{{ $description }}">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://unpkg.com/aos@2.3.1/dist/aos.css" />

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/PapaParse/5.4.1/papaparse.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/xlsx@0.18.5/dist/xlsx.full.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <style>
        :root {
            --primary: #064E3B;
            --secondary: #0D9488;
            --accent: #F59E0B;
        }
        html, body {
            overflow-x: hidden !important;
            width: 100% !important;
            max-width: 100% !important;
            font-family: 'Poppins', sans-serif;
            background-color: #F8FAFC;
            color: #1E293B;
        }
        .navbar { background-color: var(--primary); box-shadow: 0 2px 10px rgba(0,0,0,0.15); }
        .page-header {
            background: linear-gradient(135deg, rgba(6,78,59,0.88) 0%, rgba(13,148,136,0.90) 100%),
                url("{{ asset('images/sungaibakaukecil/kantor-desa.webp') }}");
            background-size: cover; background-position: center;
            color: white; padding: 80px 0 60px;
        }
        .kpi-card {
            background: white; border-radius: 16px; padding: 24px;
            border-left: 5px solid var(--secondary);
            box-shadow: 0 4px 15px rgba(0,0,0,0.04);
            transition: transform 0.3s ease;
        }
        .kpi-card:hover { transform: translateY(-5px); }
        .kpi-icon {
            width: 50px; height: 50px; border-radius: 12px;
            background: rgba(13,148,136,0.1); color: var(--secondary);
            display: flex; align-items: center; justify-content: center; font-size: 1.4rem;
        }
        #map { height: 480px; border-radius: 16px; box-shadow: 0 8px 25px rgba(0,0,0,0.08); }
        .table-responsive { max-height: 500px; overflow-y: auto; }
        .nav-tabs .nav-link.active { color: var(--primary); font-weight: 700; border-bottom: 3px solid var(--primary); }
        .sync-wrap { background: rgba(0,0,0,0.4); border-radius: 50px; padding: 6px 16px; display: inline-flex; align-items: center; gap: 8px; }
        
        .clickable-img {
            cursor: pointer;
            transition: transform 0.3s cubic-bezier(0.4, 0, 0.2, 1), filter 0.3s ease;
        }
        .clickable-img:hover {
            transform: scale(1.03);
            filter: brightness(1.05);
        }
        .img-hover-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .img-hover-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.1) !important;
        }
        .img-zoom-wrapper {
            position: relative;
            overflow: hidden;
            cursor: pointer;
        }
        .img-zoom-wrapper .zoom-overlay {
            position: absolute;
            top: 0; left: 0; right: 0; bottom: 0;
            background: rgba(6, 78, 59, 0.55);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            transition: opacity 0.3s ease;
            font-weight: 600;
            font-size: 0.85rem;
            gap: 6px;
            pointer-events: none;
        }
        .img-zoom-wrapper:hover .zoom-overlay {
            opacity: 1;
        }

        /* 3D Flip Flashcards & Swiper Styling */
        .swiper-flashcards {
            padding: 10px 5px 45px 5px !important;
        }
        .flashcard-container {
            perspective: 1000px;
            height: 330px;
            cursor: pointer;
            user-select: none;
        }
        .flashcard-inner {
            position: relative;
            width: 100%;
            height: 100%;
            transition: transform 0.6s cubic-bezier(0.4, 0, 0.2, 1);
            transform-style: preserve-3d;
            border-radius: 20px;
        }
        .flashcard-container.flipped .flashcard-inner {
            transform: rotateY(180deg);
        }
        .flashcard-front, .flashcard-back {
            position: absolute;
            width: 100%;
            height: 100%;
            -webkit-backface-visibility: hidden;
            backface-visibility: hidden;
            border-radius: 20px;
            padding: 22px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            box-shadow: 0 10px 30px rgba(0,0,0,0.06);
            border: 1px solid rgba(0,0,0,0.08);
            overflow-y: auto;
        }
        .flashcard-front {
            background: linear-gradient(145deg, #ffffff 0%, #f8fafc 100%);
            color: #1e293b;
        }
        .flashcard-container.is-perbaikan .flashcard-front {
            background: linear-gradient(145deg, #fff5f5 0%, #fef2f2 100%);
            border: 1.5px solid #fca5a5;
        }
        .flashcard-back {
            background: linear-gradient(145deg, #064e3b 0%, #0d9488 100%);
            color: white;
            transform: rotateY(180deg);
        }
        .flashcard-container.is-perbaikan .flashcard-back {
            background: linear-gradient(145deg, #991b1b 0%, #b91c1c 100%);
        }
        .flashcard-badge {
            font-size: 0.72rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            padding: 5px 12px;
            border-radius: 50px;
        }
        .btn-fc-filter {
            white-space: nowrap !important;
            flex-shrink: 0 !important;
        }
        .swiper-nav-btn {
            width: 38px;
            height: 38px;
            border-radius: 50%;
            background: white;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            color: var(--primary);
            display: flex;
            align-items: center;
            justify-content: center;
            border: none;
            transition: all 0.2s ease;
        }
        .swiper-nav-btn:hover {
            background: var(--primary);
            color: white;
            transform: scale(1.05);
        }

        /* Mobile Adjustments for Small Screens (< 576px) */
        @media (max-width: 576px) {
            .page-header { padding: 45px 0 30px; }
            .page-header h1 { font-size: 1.7rem; }
            .page-header .lead { font-size: 0.9rem; }
            .kpi-card { padding: 16px; }
            .flashcard-container { height: 350px; }
            .flashcard-front, .flashcard-back { padding: 16px; }
            .flashcard-front h6 { font-size: 0.95rem; }
            .flashcard-back p { font-size: 0.88rem; }
            #map { height: 350px; }
        }
        /* Banner Word-by-Word Slide Up Animation */
        .word-wrapper {
            display: inline-block;
            overflow: hidden;
            vertical-align: bottom;
        }
        .word {
            display: inline-block;
            transform: translateY(110%);
            animation: word-slide-up 0.8s cubic-bezier(0.25, 0.46, 0.45, 0.94) forwards;
        }
        @keyframes word-slide-up {
            to { transform: translateY(0); }
        }
        .page-header {
            will-change: background-position;
            transition: background-position 0.1s ease-out;
        }
                /* Hero Section 100vh Full Viewport (Sejegi Style) & Anti-Jitter GPU Optimization */
        .hero-section {
            background-image: url("{{ asset('images/sungaibakaukecil/kantor-desa.webp') }}");
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
            padding: 80px 0;
            overflow: hidden;
        }
        .hero-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, rgba(6, 78, 59, 0.88) 0%, rgba(13, 148, 136, 0.85) 100%);
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
            text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.4);
        }
        .hero-subtitle {
            font-size: 1.25rem;
            margin-bottom: 28px;
            opacity: 0.95;
            text-shadow: 1px 1px 5px rgba(0, 0, 0, 0.4);
        }

        /* Anti-Jitter & Hardware Acceleration for AOS */
        [data-aos] {
            backface-visibility: hidden;
            -webkit-backface-visibility: hidden;
            transform: translateZ(0);
            -webkit-transform: translateZ(0);
        }

        /* Banner Word-by-Word Slide Up Animation */
        .word-wrapper {
            display: inline-block;
            overflow: hidden;
            vertical-align: bottom;
        }
        .word {
            display: inline-block;
            transform: translateY(110%);
            animation: word-slide-up 0.85s cubic-bezier(0.25, 0.46, 0.45, 0.94) forwards;
        }
        @keyframes word-slide-up {
            to { transform: translateY(0); }
        }

    </style>
    {{ $extraHead }}
</head>
<body>
    @include('partials.navbar')

    {{ $slot }}

    <footer class="bg-dark text-white py-4 mt-5">
        <div class="container text-center">
            <p class="mb-0 text-muted small">&copy; 2026 BPS Kabupaten Mempawah &amp; Pemerintah Desa — Portal Desa Cantik.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Inisialisasi AOS Anti-Jitter (once: true, debounceDelay, throttleDelay, offset terkalibrasi)
            if (typeof AOS !== "undefined") {
                AOS.init({
                    once: true,
                    duration: 900,
                    offset: 90,
                    easing: "ease-out-cubic",
                    debounceDelay: 50,
                    throttleDelay: 99
                });
            }

            // Animasi teks per kata (data-animate-text)
            const textElements = document.querySelectorAll('[data-animate-text]');
            textElements.forEach(textEl => {
                const text = textEl.textContent.trim();
                const words = text.split(/\s+/);
                let newContent = '';
                words.forEach((word, index) => {
                    const wordHtml = '<span class="word-wrapper"><span class="word" style="animation-delay: ' + (index * 0.08) + 's">' + word + '</span></span>';
                    newContent += wordHtml + ' ';
                });
                textEl.innerHTML = newContent.trim();
            });

            // Efek Parallax Halus Berbasis requestAnimationFrame (Bebas Jitter & Stutter)
            const heroSection = document.querySelector('.hero-section');
            if (heroSection) {
                let ticking = false;
                window.addEventListener('scroll', function() {
                    if (!ticking) {
                        window.requestAnimationFrame(function() {
                            const scrollPos = window.pageYOffset;
                            heroSection.style.backgroundPositionY = (scrollPos * 0.5) + 'px';
                            ticking = false;
                        });
                        ticking = true;
                    }
                }, { passive: true });
            }
        });
    </script>
</body>
</html>
