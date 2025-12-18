<div class="container py-5">
  <div class="row justify-content-center">
    <div class="col-lg-10">

      <div class="text-center mb-5">
        <h1 class="fw-bold"><?= $fasilitas->name; ?></h1>
        <hr class="w-25 mx-auto" style="border-color: black;">

      </div>

      <?php if (!empty($fasilitas->photo)) : ?>
        <div class="text-center mb-4">
          <img src="<?= base_url('img/fasilitas/' . $fasilitas->photo); ?>"
               alt="<?= $fasilitas->name; ?>"
               class="img-fluid rounded-4 shadow-sm"
               style="max-height: 400px; object-fit: cover;">
        </div>
      <?php endif; ?>

      <div class="card border-0 shadow-sm p-4 rounded-4">
        <div class="card-body" style="line-height: 1.8; font-size: 1.05rem; text-align: justify;">
          <?= nl2br($fasilitas->description); ?>
        </div>
      </div>

      <div class="text-center mt-5">
        <a href="<?= site_url('profil/fasilitas'); ?>" class="btn btn-outline-secondary rounded-pill px-4">
          ← Kembali ke Daftar Fasilitas
        </a>
      </div>

    </div>
  </div>
</div>
