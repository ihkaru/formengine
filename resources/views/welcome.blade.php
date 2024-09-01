<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendataan Desa Wajok Hilir</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" rel="stylesheet">
    <style>
        :root {
            --color-jingga: #E98118;
            --color-jingga-light: #ff9d4d;
        }
        .bg-jingga {
            background-color: var(--color-jingga);
        }
        .text-jingga {
            color: var(--color-jingga);
        }
        .border-jingga {
            border-color: var(--color-jingga);
        }
        .hover\:bg-jingga-light:hover {
            background-color: var(--color-jingga-light);
        }
        .hover\:text-jingga:hover {
            color: var(--color-jingga-light);
        }
        .bg-pattern {
            background-color: #ffffff;
            background-image: url("data:image/svg+xml,%3Csvg width='52' height='26' viewBox='0 0 52 26' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ff7400' fill-opacity='0.1'%3E%3Cpath d='M10 10c0-2.21-1.79-4-4-4-3.314 0-6-2.686-6-6h2c0 2.21 1.79 4 4 4 3.314 0 6 2.686 6 6 0 2.21 1.79 4 4 4 3.314 0 6 2.686 6 6 0 2.21 1.79 4 4 4v2c-3.314 0-6-2.686-6-6 0-2.21-1.79-4-4-4-3.314 0-6-2.686-6-6zm25.464-1.95l8.486 8.486-1.414 1.414-8.486-8.486 1.414-1.414z' /%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
        }
        .side-nav {
            position: fixed;
            top: 0;
            left: -250px;
            height: 100vh;
            width: 250px;
            background-color: white;
            transition: left 0.3s ease-in-out;
            z-index: 1000;
        }
        .side-nav.open {
            left: 0;
        }
        .overlay {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(0, 0, 0, 0.5);
            display: none;
            z-index: 999;
        }
    </style>
</head>
<body class="bg-pattern text-gray-800 font-sans leading-normal tracking-normal">
    <nav class="bg-white shadow-md">
        <div class="container mx-auto px-4 py-3 flex justify-between items-center">
            <a href="#" class="text-jingga font-bold text-xl">Desa Cantik Wajok Hilir</a>
            <div class="hidden md:block">
                <a href="#tentang" class="text-gray-600 hover:text-jingga mr-4">Tentang</a>
                <a href="#tujuan" class="text-gray-600 hover:text-jingga mr-4">Tujuan</a>
                <a href="#inovasi" class="text-gray-600 hover:text-jingga mr-4">Inovasi</a>
                <a href="/admin" class="hover:text-jingga hover:scale-110  hover:-translate-y-1  hover:bg-white bg-jingga border border-jingga border-jingga-500 hover:border-amber-500  duration-300 ease-in-out transform transition text-white font-bold py-2 px-6 rounded-full ">Masuk</a>
            </div>
            <button class="md:hidden text-jingga" id="menuBtn">
                <i class="fas fa-bars"></i>
            </button>
        </div>
    </nav>

    <div class="side-nav shadow-lg" id="sideNav">
        <div class="p-4">
            <div class="flex justify-between">
                <div>
                </div>
                <div>
                    <button class="text-jingga mb-4" id="closeBtn">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <a href="#tentang" class="block text-gray-600 hover:text-jingga mb-2">Tentang</a>
            <a href="#tujuan" class="block text-gray-600 hover:text-jingga mb-2">Tujuan</a>
            <a href="#inovasi" class="block text-gray-600 hover:text-jingga">Inovasi</a>
        </div>
        <div class="text-center mt-5">
            <a href="/admin" class="hover:text-jingga hover:bg-white bg-jingga border border-jingga border-jingga-500 hover:border-amber-500  duration-300 ease-in-out transform transition text-white font-bold py-2 px-6 rounded-full ">Masuk</a>
        </div>
    </div>

    <div class="overlay" id="overlay"></div>

    <header class="bg-jingga py-20">
        <div class="container mx-auto text-center px-4">
            <h1 class="text-4xl font-bold mb-4 text-white" data-aos="fade-up">Desa Cantik Wajok Hilir</h1>
            <p class="text-xl mb-8 text-white" data-aos="fade-up" data-aos-delay="200">Membangun Masa Depan Desa dengan Data yang Akurat</p>
            <a href="#/tentang" class="bg-white text-jingga font-bold py-2 px-6 rounded-full transition duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-110 hover:bg-gray-100" data-aos="fade-up" data-aos-delay="400">
                Pelajari Lebih Lanjut
            </a>
        </div>
    </header>

    <main class="container mx-auto py-12 px-4">
        <section id="tentang" class="mb-12" data-aos="fade-up">
            <h2 class="text-3xl font-bold mb-4 text-jingga">Tentang Program</h2>
            <p class="text-lg text-gray-700">
                Program Desa Cantik Wajok Hilir merupakan kerja sama antara Pemerintah Desa Wajok Hilir dan BPS Kabupaten Mempawah untuk melaksanakan kegiatan pendataan terfokus. Ini adalah adaptasi dari model Registrasi Sosial Ekonomi (Regsosek) yang didesain khusus untuk menjawab kebutuhan spesifik Desa Wajok Hilir.
            </p>
        </section>
        <section id="rem" class="mb-12" data-aos="fade-up">
            <h2 class="text-3xl font-bold mb-4 text-jingga">Registrasi Ekonomi Masyarakat Wajok Hilir 2024</h2>
            <p class="text-lg text-gray-700">
                Registrasi Ekonomi Masyarakat Wajok Hilir 2024 merupakan salah satu dari rangkaian kegiatan Program Desa Cantik berupa kegiatan pendataan ekonomi yang bertujuan untuk membuat basis data penduduk beserta kondisi perokonomian masyarakat Desa Wajok Hilir.
            </p>
        </section>

        <section id="tujuan" class="mb-12" data-aos="fade-up">
            <h2 class="text-3xl font-bold mb-4 text-jingga">Tujuan Pendataan</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div class="bg-white p-6 rounded-lg shadow-md border-l-4 border-jingga">
                    <i class="fas fa-users text-4xl mb-4 text-jingga"></i>
                    <h3 class="text-xl font-bold mb-2 text-gray-800">Aspek Kependudukan</h3>
                    <p class="text-gray-600">Mengumpulkan data akurat tentang dinamika populasi desa untuk perencanaan yang lebih baik.</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-md border-l-4 border-jingga">
                    <i class="far fa-chart-bar text-4xl mb-4 text-jingga"></i>
                    <h3 class="text-xl font-bold mb-2 text-gray-800">Status Kemiskinan</h3>
                    <p class="text-gray-600">Mengidentifikasi area-area yang membutuhkan intervensi kebijakan untuk pengentasan kemiskinan.</p>
                </div>
            </div>
        </section>

        <section id="inovasi" data-aos="fade-up">
            <h2 class="text-3xl font-bold mb-4 text-jingga">Inovasi Pendataan</h2>
            <div class="bg-white p-6 rounded-lg shadow-md border-l-4 border-jingga">
                <i class="fas fa-mobile-alt text-4xl mb-4 text-jingga"></i>
                <h3 class="text-xl font-bold mb-2 text-gray-800">Teknologi Digital</h3>
                <p class="text-gray-600">Penggunaan aplikasi pada perangkat Android untuk wawancara langsung, meningkatkan efisiensi dan akurasi pengumpulan data.</p>
            </div>
        </section>
    </main>

    <footer class="bg-gray-100 text-gray-600 py-8">
        <div class="container mx-auto text-center">
            <p>&copy; 2024 Pemerintah Desa Wajok Hilir. Hak Cipta Dilindungi.</p>
        </div>
    </footer>

    <script>
        AOS.init({
            duration: 1000,
            once: true,
        });

        const menuBtn = document.getElementById('menuBtn');
        const closeBtn = document.getElementById('closeBtn');
        const sideNav = document.getElementById('sideNav');
        const overlay = document.getElementById('overlay');

        function openNav() {
            sideNav.classList.add('open');
            overlay.style.display = 'block';
        }

        function closeNav() {
            sideNav.classList.remove('open');
            overlay.style.display = 'none';
        }

        menuBtn.addEventListener('click', openNav);
        closeBtn.addEventListener('click', closeNav);
        overlay.addEventListener('click', closeNav);

        // Close side navigation when clicking on a link
        const navLinks = sideNav.querySelectorAll('a');
        navLinks.forEach(link => {
            link.addEventListener('click', closeNav);
        });
    </script>
</body>
</html>
