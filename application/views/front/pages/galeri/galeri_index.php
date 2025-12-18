<div class="container py-4">
    <h2 class="mb-4 text-center fw-semibold">Galeri Kegiatan Sekolah</h2>

    <?php if (!empty($kategori)) : ?>
        <div class="row g-3">
            <?php foreach ($kategori as $k) : ?>
                <div class="col-12 col-sm-6 col-md-4 mb-3">

                    <div class="card h-100 border rounded-4 shadow-sm d-flex flex-column hover-card">

                        <?php if (!empty($k->latest_foto)) : ?>
                            <img src="<?= base_url('uploads/galeri/' . $k->latest_foto->foto); ?>"
                                 alt="<?= $k->nama_kategori; ?>"
                                 class="card-img-top rounded-top-4">
                        <?php endif; ?>

                        <div class="card-body text-center px-3"
                             style="padding-top:1.2rem; padding-bottom:0.5rem;">

                            <h6 class="card-title fw-semibold mb-1">
                                <?= ucwords($k->nama_kategori); ?>
                            </h6>

                        </div>

                        <div class="card-footer bg-transparent border-0 text-center pb-2">
                            <a href="<?= site_url('galeri/detail/' . $k->id); ?>"
                               class="btn btn-outline-primary rounded-pill px-3 py-1 mt-1"
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
            Belum ada kategori galeri yang ditambahkan.
        </div>
    <?php endif; ?>
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
}
@media (max-width: 576px) {
    .card-img-top {
        height: 220px;
    }
}
</style>
