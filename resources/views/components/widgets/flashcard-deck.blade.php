@props([
    'title' => 'Flashcard Trivia & Insights Data Desa',
    'villageName' => 'Desa Sungai Bakau Kecil',
    'badgeText' => 'Interactive Gimmick'
])
<div class="card border-0 shadow-sm rounded-4 mb-5 p-4 bg-white overflow-hidden" data-aos="fade-up" data-aos-duration="850">
    <div class="d-flex justify-content-between align-items-center mb-3 flex-wrap gap-2">
        <div>
            <div class="d-flex align-items-center gap-2 mb-1">
                <span class="badge bg-warning text-dark rounded-pill fw-bold"><i class="fas fa-gamepad me-1"></i> {{ $badgeText }}</span>
                <span class="badge bg-primary-subtle text-primary rounded-pill fw-bold" id="flashcards-count-badge">20 Flashcard</span>
            </div>
            <h4 class="fw-bold text-dark mb-1"><i class="fas fa-clone me-2 text-primary"></i>{{ $title }}</h4>
            <p class="text-muted small mb-0">Uji pemahaman Anda mengenai 20 fakta &amp; rekomendasi perbaikan {{ $villageName }} berbasis data live terkini.</p>
        </div>
        <div class="d-flex align-items-center gap-2 flex-wrap">
            <button class="btn btn-sm btn-outline-secondary rounded-pill px-3 fw-bold" onclick="shuffleFlashcards()">
                <i class="fas fa-random me-1"></i> Acak Kartu
            </button>
            <button class="btn btn-sm btn-outline-primary rounded-pill px-3 fw-bold" onclick="flipAllFlashcards(true)">
                <i class="fas fa-eye me-1"></i> Buka Semua
            </button>
            <button class="btn btn-sm btn-outline-dark rounded-pill px-3 fw-bold" onclick="resetFlashcards()">
                <i class="fas fa-undo me-1"></i> Reset
            </button>
        </div>
    </div>

    <!-- Filter Buttons -->
    <div class="d-flex gap-2 overflow-x-auto pb-2 mb-3 align-items-center flex-nowrap text-nowrap" id="flashcard-filter-container">
        <button class="btn btn-sm btn-primary rounded-pill px-3 fw-semibold active btn-fc-filter" onclick="filterFlashcards('all', this)">
            <i class="fas fa-border-all me-1"></i> Semua Fakta (20)
        </button>
        <button class="btn btn-sm btn-outline-danger rounded-pill px-3 fw-semibold btn-fc-filter" onclick="filterFlashcards('perbaikan', this)">
            <i class="fas fa-exclamation-circle me-1"></i> ⚠️ Isu &amp; Perbaikan Desa
        </button>
        <button class="btn btn-sm btn-outline-secondary rounded-pill px-3 fw-semibold btn-fc-filter" onclick="filterFlashcards('demografi', this)">
            <i class="fas fa-users me-1"></i> Demografi &amp; KK
        </button>
        <button class="btn btn-sm btn-outline-secondary rounded-pill px-3 fw-semibold btn-fc-filter" onclick="filterFlashcards('lansia', this)">
            <i class="fas fa-user-clock me-1"></i> Lansia &amp; Bansos
        </button>
        <button class="btn btn-sm btn-outline-secondary rounded-pill px-3 fw-semibold btn-fc-filter" onclick="filterFlashcards('fasilitas', this)">
            <i class="fas fa-map-marker-alt me-1"></i> Fasilitas Publik
        </button>
        <button class="btn btn-sm btn-outline-secondary rounded-pill px-3 fw-semibold btn-fc-filter" onclick="filterFlashcards('rekor', this)">
            <i class="fas fa-trophy me-1"></i> Rekor &amp; Unik RT
        </button>
    </div>

    <!-- Swiper Deck Container -->
    <div class="position-relative">
        <div class="swiper swiper-flashcards">
            <div class="swiper-wrapper" id="flashcards-swiper-wrapper">
                <!-- Dynamic slides inserted via JS -->
            </div>
        </div>

        <!-- Custom Navigation Controls -->
        <div class="d-flex justify-content-between align-items-center mt-2 px-2">
            <button class="swiper-nav-btn swiper-button-prev-flashcard shadow-sm" title="Kartu Sebelumnya">
                <i class="fas fa-chevron-left"></i>
            </button>
            <div class="swiper-pagination-flashcards text-muted fw-bold small text-center"></div>
            <button class="swiper-nav-btn swiper-button-next-flashcard shadow-sm" title="Kartu Selanjutnya">
                <i class="fas fa-chevron-right"></i>
            </button>
        </div>
    </div>
</div>
