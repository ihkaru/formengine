@props([
    'villageName' => 'Desa Sungai Bakau Kecil',
    'year' => '2026',
    'imageWebp' => asset('images/dukungan-pemda.webp'),
    'imageJpg' => asset('images/dukungan-pemda.jpg'),
    'title' => 'Dukungan Penuh Pemerintah Kabupaten Mempawah',
    'quote' => '"Kedepan kiranya program Desa Cantik ini dapat lebih dimasifkan untuk seluruh desa dan kelurahan, serta dikolaborasikan dengan kebutuhan data di tingkat daerah yang dikelola perangkat daerah."',
    'quoteAuthor' => 'Ismail, S.MM. — Sekretaris Daerah Kabupaten Mempawah',
    'description' => null
])
<div class="card border-0 shadow-sm rounded-4 mb-5 p-4 bg-white" id="dukungan-pemkab">
    <div class="row align-items-center">
        <div class="col-lg-5 mb-4 mb-lg-0">
            <div class="rounded-4 overflow-hidden shadow-sm border img-zoom-wrapper clickable-img" onclick="openImagePreviewModal('{{ $imageWebp }}', 'Dukungan Pemkab Mempawah &amp; BPS', 'Dokumentasi Komitmen Pemkab Mempawah &amp; BPS Kabupaten Mempawah dalam Pembinaan Sektoral Desa Cantik {{ $year }}')">
                <img src="{{ $imageWebp }}" alt="Dukungan Pemkab Mempawah &amp; BPS" class="img-fluid w-100" style="height: auto; width: 100%; max-height: 460px; object-fit: contain;" onerror="this.onerror=null;this.src='{{ $imageJpg }}';">
                <div class="zoom-overlay">
                    <i class="fas fa-search-plus"></i> Klik untuk Tampilan Besar
                </div>
            </div>
        </div>
        <div class="col-lg-7">
            <div class="d-flex align-items-center gap-2 mb-2 flex-wrap">
                <span class="badge bg-primary-subtle text-primary fw-bold text-uppercase px-3 py-2 rounded-pill small text-nowrap">Bukti Pembinaan Sektoral {{ $year }}</span>
                <span class="badge bg-success-subtle text-success fw-bold px-3 py-2 rounded-pill small text-nowrap">Pemkab Mempawah x BPS</span>
            </div>
            <h3 class="fw-bold text-dark mb-3">{{ $title }}</h3>
            <p class="text-secondary mb-3">
                @if($description)
                    {!! $description !!}
                @else
                    Pemerintah Kabupaten Mempawah, melalui Sekretaris Daerah Ismail, S.MM., menegaskan komitmen dan dukungan penuh terhadap keberhasilan penyelenggaraan statistik sektoral dan Program Desa Cantik di {{ $villageName }} {{ $year }} sebagai percontohan kebijakan berbasis data (<em>evidence-based policy</em>).
                @endif
            </p>
            <blockquote class="blockquote border-start border-4 border-primary ps-3 bg-light p-3 rounded-3 my-3">
                <p class="mb-2 fst-italic text-dark small">{{ $quote }}</p>
                <footer class="blockquote-footer small text-muted"><cite title="Source Title">{{ $quoteAuthor }}</cite></footer>
            </blockquote>
            <div class="d-flex flex-column flex-sm-row gap-2 mt-3">
                <a href="#" class="btn btn-sm btn-primary rounded-pill px-4 text-nowrap">
                    <i class="fab fa-instagram me-1"></i> Lihat Dokumentasi Liputan
                </a>
                <a href="#publikasi" class="btn btn-sm btn-outline-secondary rounded-pill px-4 text-nowrap">
                    <i class="fas fa-file-alt me-1"></i> Dokumen Pembinaan
                </a>
            </div>
        </div>
    </div>
</div>
