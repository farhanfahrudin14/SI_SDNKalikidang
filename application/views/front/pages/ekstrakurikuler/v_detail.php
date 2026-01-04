<!-- ========================================= -->
<!-- BOOTSTRAP -->
<!-- ========================================= -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<div class="container py-5">

    <!-- JUDUL -->
    <h2 class="mb-4 text-center fw-semibold">
        <?= ucwords($kategori->nama_kategori); ?>
    </h2>




    <!-- GALERI FOTO -->
    <?php if (!empty($foto)) : ?>
        <div class="row g-3">
            <?php foreach($foto as $f) : ?>
                <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="gallery-item position-relative overflow-hidden rounded">

                        <img src="<?= base_url('uploads/ekstrakurikuler/' . $f->foto); ?>" 
                             class="img-fluid w-100"
                             style="height: 250px; object-fit: cover; cursor:pointer;"
                             data-bs-toggle="modal"
                             data-bs-target="#m<?= $f->id; ?>">

                        <div class="overlay"
                             data-bs-toggle="modal"
                             data-bs-target="#m<?= $f->id; ?>">
                            <p class="text-white mb-0">Lihat Gambar</p>
                        </div>
                    </div>
                </div>

                <!-- MODAL -->
                <div class="modal fade" id="m<?= $f->id; ?>" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg">
                        <div class="modal-content bg-dark border-0 position-relative">

                            <!-- CUSTOM CLOSE BUTTON -->
                            <div class="close-custom" data-bs-dismiss="modal">✕</div>

                            <div class="modal-body p-0">
                                <img src="<?= base_url('uploads/ekstrakurikuler/' . $f->foto); ?>"
                                     class="img-fluid w-100" alt="">
                            </div>

                        </div>
                    </div>
                </div>

            <?php endforeach; ?>
        </div>
    <?php else : ?>
        <div class="text-center text-muted">Belum ada foto pada ekstrakurikuler ini</div>
    <?php endif; ?>

        <!-- DESKRIPSI -->
<?php if(!empty($kategori->deskripsi)): ?>
    <div class="mt-5" style="max-width:1000px; margin:auto;">
        <p class="fw-bold mb-2 text-start">Deskripsi:</p>
        <p class="text-justify mb-5">
            <?= nl2br(htmlspecialchars($kategori->deskripsi)); ?>
        </p>
    </div>
<?php endif; ?>

    <!-- KEMBALI -->
    <div class="text-center mt-4">
        <a href="<?= site_url('akademik/ekskul'); ?>" class="btn btn-outline-secondary">← Kembali ke Daftar Ekstrakurikuler</a>
    </div>
</div>


<style>
/* Overlay */
.gallery-item {
    position: relative;
    overflow: hidden;
}
.gallery-item img {
    height: 250px;
    object-fit: cover;
}
.gallery-item .overlay {
    position: absolute;
    inset: 0;
    background: rgba(0,0,0,0.55);
    display:flex;
    align-items:center;
    justify-content:center;
    opacity:0;
    transform:translateY(100%);
    transition:.35s;
    cursor:pointer;
}
.gallery-item:hover .overlay {
    opacity:1;
    transform:translateY(0);
}

/* Modal full black */
.modal-content {
    background:#000 !important;
}
.modal-backdrop.show {
    background:#000 !important;
    opacity:0.85 !important;
}

/* CUSTOM BLACK CLOSE BUTTON FIXED */
.close-custom {
    position:absolute;
    top:10px;
    right:10px;
    width:30px;
    height:30px;
    background: rgba(0,0,0,0.5);
    color:#fff;
    font-size:25px;
    border-radius:50%;
    display:flex;
    align-items:center;
    justify-content:center;
    cursor:pointer;
    z-index:99999;
    transition:.2s;
}
.close-custom:hover {
    background:#333;
}
</style>
