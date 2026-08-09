<div class="modal fade" id="imagePreviewModal" tabindex="-1" aria-labelledby="imagePreviewModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content rounded-4 border-0 shadow">
            <div class="modal-header border-0 pb-0">
                <div>
                    <h5 class="modal-title fw-bold fs-6" id="imagePreviewModalLabel">
                        <i class="fas fa-image text-primary me-2"></i><span id="modalImageTitle">Pratinjau Gambar</span>
                    </h5>
                    <p class="text-muted extra-small mb-0" id="modalImageCaption">Desa Cantik 2026</p>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
            </div>
            <div class="modal-body text-center p-3">
                <div class="bg-light rounded-3 p-2 d-flex align-items-center justify-content-center" style="min-height: 300px; max-height: 70vh;">
                    <img id="modalPreviewImg" src="" alt="Pratinjau Gambar" class="img-fluid rounded-2 shadow-sm" style="max-height: 65vh; object-fit: contain;">
                </div>
            </div>
            <div class="modal-footer border-0 pt-0 justify-content-between">
                <span class="text-muted extra-small"><i class="fas fa-info-circle me-1"></i> Klik 'Unduh' untuk menyimpan gambar resolusi penuh.</span>
                <div>
                    <button type="button" class="btn btn-sm btn-light rounded-pill px-3 fw-semibold me-1" data-bs-dismiss="modal">Tutup</button>
                    <a id="modalDownloadBtn" href="#" download="" class="btn btn-sm btn-primary rounded-pill px-3 fw-bold">
                        <i class="fas fa-download me-1"></i> Unduh Foto High-Res
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
