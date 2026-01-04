<div class="container mt-4">
  <div class="card shadow-sm">

    <!-- HEADER -->
    <div class="card-header bg-primary text-white">
      <h4 class="mb-0">
        <?= $title ?> : <?= htmlspecialchars($kategori->nama_kategori) ?>
      </h4>
    </div>

    <div class="card-body">

      <!-- DESKRIPSI KATEGORI -->
      <?php if (!empty($kategori->deskripsi)): ?>
        <div class="alert alert-info">
          <strong>Deskripsi :</strong>
          <p class="mt-2 deskripsi-ringkas" id="desc-short">
            <?= character_limiter(strip_tags($kategori->deskripsi), 250) ?>
          </p>
          <p class="mt-2 d-none" id="desc-full">
            <?= nl2br(htmlspecialchars($kategori->deskripsi)) ?>
          </p>
          <?php if (strlen(strip_tags($kategori->deskripsi)) > 250): ?>
            <a href="javascript:void(0)" class="text-primary small" id="btn-desc" onclick="toggleDeskripsi()">
              Baca selengkapnya
            </a>
          <?php endif; ?>
        </div>
      <?php endif; ?>

      <!-- TOMBOL TAMBAH -->
      <a href="<?= site_url('c_ekstrakurikuler_foto/tambah/'.$kategori->id) ?>"
         class="btn btn-success mb-3">
        + Tambah Foto
      </a>

      <!-- FLASH MESSAGE -->
      <?php if($this->session->flashdata('success')): ?>
        <div class="alert alert-success"><?= $this->session->flashdata('success') ?></div>
      <?php elseif($this->session->flashdata('error')): ?>
        <div class="alert alert-danger"><?= $this->session->flashdata('error') ?></div>
      <?php endif; ?>

      <!-- LIST FOTO -->
      <div class="row">
        <?php if (!empty($foto)): ?>
          <?php foreach ($foto as $f): ?>
            <div class="col-md-3 mb-3">
              <div class="card h-100">

                <img src="<?= base_url('uploads/ekstrakurikuler/'.$f->foto) ?>"
                     class="card-img-top"
                     style="height:160px; object-fit:cover;">

                <!-- FOOTER TOMBOL -->
                <div class="card-footer text-center">
  <a href="<?= site_url('c_ekstrakurikuler_foto/edit/'.$f->id.'/'.$kategori->id) ?>"
     class="btn btn-sm btn-warning me-3">
    Edit
  </a>

  <a href="<?= site_url('c_ekstrakurikuler_foto/v_hapus/'.$f->id.'/'.$kategori->id) ?>"
     class="btn btn-sm btn-danger">
    Hapus
  </a>
</div>



              </div>
            </div>
          <?php endforeach; ?>
        <?php else: ?>
          <div class="col-12 text-center text-muted">
            <p>Belum ada foto pada kategori ini</p>
          </div>
        <?php endif; ?>
      </div>

      <!-- KEMBALI -->
      <a href="<?= site_url('c_ekstrakurikuler_foto') ?>"
         class="btn btn-secondary mt-3">
        Kembali ke Daftar Kategori
      </a>

    </div>
  </div>
</div>

<!-- STYLE -->
<style>
.deskripsi-ringkas {
  display: -webkit-box;
  -webkit-line-clamp: 4; /* jumlah baris awal */
  -webkit-box-orient: vertical;
  overflow: hidden;
}
</style>

<!-- SCRIPT -->
<script>
function toggleDeskripsi() {
  const shortDesc = document.getElementById('desc-short');
  const fullDesc  = document.getElementById('desc-full');
  const btn       = document.getElementById('btn-desc');

  if (fullDesc.classList.contains('d-none')) {
    shortDesc.classList.add('d-none');
    fullDesc.classList.remove('d-none');
    btn.innerText = 'Sembunyikan';
  } else {
    shortDesc.classList.remove('d-none');
    fullDesc.classList.add('d-none');
    btn.innerText = 'Baca selengkapnya';
  }
}
</script>
