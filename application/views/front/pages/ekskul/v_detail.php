<div class="container py-5">
  <div class="row justify-content-center">
    <div class="col-lg-10">

      <div class="text-center mb-5">
        <h1 class="fw-bold"><?= $ekskul->judul; ?></h1>
        <hr class="w-25 mx-auto" style="border-color: black;">
      </div>

      <?php if (!empty($ekskul->foto)) : ?>
        <div class="text-center mb-4">
          <img src="<?= base_url('uploads/ekskul/' . $ekskul->foto); ?>"
               alt="<?= $ekskul->judul; ?>"
               class="img-fluid rounded-4 shadow-sm"
               style="max-height: 400px; object-fit: cover;">
        </div>
      <?php endif; ?>

      <div class="card border-0 shadow-sm p-4 rounded-4">
        <div class="card-body" style="line-height: 1.8; font-size: 1.05rem; text-align: justify;">
          <?= nl2br($ekskul->deskripsi); ?>
        </div>
      </div>

      <div class="text-center mt-5">
        <a href="<?= site_url('akademik/ekskul'); ?>" class="btn btn-outline-secondary rounded-pill px-4">
          ← Kembali ke Daftar Ekstrakurikuler
        </a>
      </div>

    </div>
  </div>
</div>

<style>
.img-fluid {
  transition: transform 0.3s;
}
.img-fluid:hover {
  transform: scale(1.02);
}
</style>
