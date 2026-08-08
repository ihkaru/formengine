<link rel="stylesheet" href="/css/cerdas-navbar.css">

<nav class="navbar navbar-expand-lg navbar-dark sticky-top cerdas-navbar">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">
            <i class="fas fa-chart-line"></i>Cerdas-SM
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto align-items-lg-center">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ request()->routeIs('home') ? '#beranda' : route('home') }}">Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('cantik.index') ? 'active' : '' }}" href="{{ route('cantik.index') }}">Program Desa Cantik</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle {{ (request()->routeIs('cantik.*') && !request()->routeIs('cantik.index')) ? 'active' : '' }}" href="#" role="button" data-bs-toggle="dropdown">
                        Daftar Desa Binaan
                    </a>
                    <ul class="dropdown-menu">
                        <li><h6 class="dropdown-header">Desa Binaan 2026 (AppSheet)</h6></li>
                        <li><a class="dropdown-item {{ request()->routeIs('cantik.pasirwansalim') ? 'active' : '' }}" href="{{ route('cantik.pasirwansalim') }}">Kel. Pasir Wan Salim (2026)</a></li>
                        <li><a class="dropdown-item {{ request()->routeIs('cantik.pasirpalembang') ? 'active' : '' }}" href="{{ route('cantik.pasirpalembang') }}">Desa Pasir Palembang (2026)</a></li>
                        <li><a class="dropdown-item {{ request()->routeIs('cantik.sungaibakaukecil') ? 'active' : '' }}" href="{{ route('cantik.sungaibakaukecil') }}">Desa Sungai Bakau Kecil (2026)</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><h6 class="dropdown-header">Pra Desa Cantik 2026 (Uji CERDAS Engine)</h6></li>
                        <li><a class="dropdown-item fw-bold {{ request()->routeIs('cantik.sambora') ? 'active' : 'text-primary' }}" href="{{ route('cantik.sambora') }}"><i class="fas fa-microchip me-1 text-warning"></i> Desa Sambora (Kec. Toho)</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><h6 class="dropdown-header">Desa Binaan 2024 & 2025</h6></li>
                        <li><a class="dropdown-item {{ request()->routeIs('cantik.pedalaman') ? 'active' : '' }}" href="{{ route('cantik.pedalaman') }}">Kelurahan Pulau Pedalaman (2025)</a></li>
                        <li><a class="dropdown-item {{ request()->routeIs('cantik.sejegi') ? 'active' : '' }}" href="{{ route('cantik.sejegi') }}">Desa Sejegi (2025)</a></li>
                        <li><a class="dropdown-item {{ request()->routeIs('cantik.wajokhilir') ? 'active' : '' }}" href="{{ route('cantik.wajokhilir') }}">Desa Wajok Hilir (2024)</a></li>
                    </ul>
                </li>
                @if(request()->routeIs('home'))
                    <li class="nav-item"><a class="nav-link" href="#tentang">Tentang</a></li>
                    <li class="nav-item"><a class="nav-link" href="#fitur">Fitur</a></li>
                    <li class="nav-item"><a class="nav-link" href="#kontak">Kontak</a></li>
                @else
                    <li class="nav-item"><a class="nav-link" href="{{ route('home') }}#tentang">Tentang</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('home') }}#fitur">Fitur</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('home') }}#kontak">Kontak</a></li>
                @endif
                <li class="nav-item ms-lg-2">
                    <a class="btn btn-sm btn-outline-light px-3 rounded-pill fw-semibold" href="{{ route('cantik.index') }}">
                        <i class="fas fa-layer-group me-1"></i> Hub Desa Cantik
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
