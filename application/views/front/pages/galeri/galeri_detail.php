<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<div class="container py-4">

    <h2 class="mb-4 text-center fw-semibold">
        <?= ucwords($kategori->nama_kategori); ?>
    </h2>

    <?php if (!empty($foto)) : ?>
        <div class="row g-3">

            <?php foreach ($foto as $f) : ?>
                <div class="col-12 col-sm-6 col-md-4 mb-3">

                    <div class="card h-100 border rounded-4 shadow-sm d-flex flex-column justify-content-between hover-card">

                        <img src="<?= base_url('uploads/galeri/' . $f->foto); ?>"
                             alt="Foto Galeri"
                             class="card-img-top rounded-top-4">

                        <div class="card-body text-center d-flex flex-column px-3"
                             style="padding-top:1.5rem; padding-bottom:1rem;">

                            <p class="card-text text-muted small flex-grow-1 mb-2"
                               style="font-size:13px;">
                                <?= !empty($f->deskripsi)
                                    ? word_limiter(strip_tags($f->deskripsi), 18)
                                    : 'Tidak ada deskripsi'; ?>
                            </p>
                        </div>

                        <div class="card-footer bg-transparent border-0 text-center mt-auto pb-3">

                            <a href="<?= site_url('galeri/detail_foto/' . $f->id); ?>"
                               class="btn btn-outline-primary rounded-pill px-3 py-1"
                               style="font-size:13px;">
                                <i class="bi bi-eye"></i> Lihat Selengkapnya
                            </a>

                        </div>

                    </div>

                </div>
            <?php endforeach; ?>

        </div>

    <?php else : ?>
        <div class="alert alert-info text-center mt-4">
            Belum ada foto pada kategori ini.
        </div>
    <?php endif; ?>

    <div class="text-center mt-4">
        <!-- <a href="<?= site_url('galeri'); ?>"
           class="btn btn-secondary rounded-pill px-4">
            ← Kembali ke Galeri
        </a> -->
       <a href="<?= site_url('galeri'); ?>"
             class="btn btn-outline-secondary mt-3">
            ← Kembali ke Galeri
          </a>
    </div>
    

</div>

<style>
.hover-card {
    transition: all 0.25s ease;
}
.hover-card:hover {
    transform: translateY(-3px);
    box-shadow: 0 6px 15px rgba(0,0,0,0.08);
}
.card {
    border-radius: 10px;
}
.card-img-top {
    height: 250px;
    object-fit: cover;
    border-top-left-radius: 10px;
    border-top-right-radius: 10px;
}
.card-body {
    text-align: center;
    display: flex;
    flex-direction: column;
}
.card-text {
    font-size: 13px;
}
@media (max-width: 576px) {
    .card-img-top {
        height: 220px;
    }
}
</style>
