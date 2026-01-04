<div class="container py-4">
  <h2 class="mb-4 text-center fw-semibold">Daftar Fasilitas</h2>

  <?php if (!empty($kategori)) : ?>
    <div class="row g-3">
      <?php foreach ($kategori as $k) : ?>
        <div class="col-12 col-sm-6 col-md-4 mb-3">
          <div class="card h-100 border rounded-4 shadow-sm hover-card d-flex flex-column">

            <!-- FOTO TERBARU -->
            <?php
              $thumb = !empty($k->foto_terbaru)
                       ? base_url('uploads/fasilitas/'.$k->foto_terbaru)
                       : base_url('assets/front/img/no-image.jpg');
            ?>
            <img src="<?= $thumb; ?>"
                 class="card-img-top rounded-top-4"
                 alt="<?= htmlspecialchars($k->nama_kategori); ?>">

            <!-- BODY -->
            <div class="card-body text-center d-flex flex-column px-3">
              <h6 class="card-title fw-semibold mb-2">
                <?= htmlspecialchars($k->nama_kategori); ?>
              </h6>
              <p class="card-text text-muted small flex-grow-1" style="font-size:13px;">
                <?= word_limiter(strip_tags($k->deskripsi), 18); ?>
              </p>
            </div>

            <!-- FOOTER -->
            <div class="card-footer bg-transparent border-0 text-center pb-3">
              <a href="<?= site_url('profil/fasilitas_detail/'.$k->id); ?>"
                 class="btn btn-outline-primary rounded-pill px-3 py-1"
                 style="font-size:13px;">
                <i class="bi bi-eye"></i> Lihat Detail
              </a>
            </div>

          </div>
        </div>
      <?php endforeach; ?>
    </div>
  <?php else : ?>
    <div class="alert alert-info text-center">
      Belum ada data fasilitas
    </div>
  <?php endif; ?>
</div>

<style>
.hover-card {
  transition: all .25s ease;
}
.hover-card:hover {
  transform: translateY(-4px);
  box-shadow: 0 6px 18px rgba(0,0,0,.08);
}
.card-img-top {
  height: 250px;
  object-fit: cover;
}
@media (max-width: 576px) {
  .card-img-top { height: 220px; }
}
</style>
