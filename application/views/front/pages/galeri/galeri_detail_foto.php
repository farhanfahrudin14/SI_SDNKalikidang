<div class="container py-5">

  <div class="row justify-content-center">
    <div class="col-md-10 col-lg-8">

      <div class="card shadow-sm mb-4">
        <img src="<?= base_url('uploads/galeri/' . $foto->foto); ?>"
             class="img-fluid rounded">
      </div>

      <div class="card shadow-sm">
        <div class="card-body">

          <h4 class="mb-3">Deskripsi Foto</h4>

          <?php if (!empty($foto->deskripsi)) : ?>
            <p style="line-height:1.8;">
              <?= nl2br(htmlspecialchars($foto->deskripsi)); ?>
            </p>
          <?php else : ?>
            <p class="text-muted fst-italic">
              Tidak ada deskripsi.
            </p>
          <?php endif; ?>

          <?php if ($foto->tanggal_upload): ?>
            <p class="text-muted mt-3">
              Diunggah: <?= date('d M Y', strtotime($foto->tanggal_upload)); ?>
            </p>
          <?php endif; ?>

          <a href="<?= site_url('galeri/detail/'.$foto->kategori_id); ?>"
             class="btn btn-outline-secondary mt-3">
            ← Kembali ke Galeri
          </a>

        </div>
      </div>

    </div>
  </div>

</div>
