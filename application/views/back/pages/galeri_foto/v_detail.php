<div class="container mt-4">
  <div class="card shadow-sm">
    <div class="card-header bg-primary text-white">
      <h4 class="mb-0">
        <?= $title ?>: <?= htmlspecialchars($kategori->nama_kategori) ?>
      </h4>
    </div>

    <div class="card-body">

      <a href="<?= site_url('c_galeri_foto/tambah/'.$kategori->id) ?>"
         class="btn btn-success mb-3">
        + Tambah Foto
      </a>

      <!-- Flash Message -->
      <?php if($this->session->flashdata('success')): ?>
        <div class="alert alert-success">
          <?= $this->session->flashdata('success') ?>
        </div>
      <?php elseif($this->session->flashdata('error')): ?>
        <div class="alert alert-danger">
          <?= $this->session->flashdata('error') ?>
        </div>
      <?php endif; ?>

      <div class="row">
        <?php if(!empty($foto)): ?>
          <?php foreach($foto as $f): ?>

            <div class="col-md-3 mb-3">
              <div class="card h-100">

                <!-- Foto -->
                <img src="<?= base_url('uploads/galeri/'.$f->foto) ?>"
                     class="card-img-top"
                     style="height:150px; object-fit:cover;">

                <!-- Deskripsi -->
                <div class="card-body">
                  <!-- Ringkas -->
                  <p class="small text-muted deskripsi-ringkas"
                     id="desc-short-<?= $f->id ?>">
                    <?= character_limiter(strip_tags($f->deskripsi), 120) ?>
                  </p>

                  <!-- Lengkap -->
                  <p class="small text-muted deskripsi-lengkap d-none"
                     id="desc-full-<?= $f->id ?>">
                    <?= nl2br(htmlspecialchars($f->deskripsi)) ?>
                  </p>

                  <!-- Tombol toggle -->
                  <?php if(strlen(strip_tags($f->deskripsi)) > 120): ?>
                    <a href="javascript:void(0)"
                       class="text-primary small"
                       onclick="toggleDeskripsi(<?= $f->id ?>)"
                       id="btn-desc-<?= $f->id ?>">
                       Lihat selengkapnya
                    </a>
                  <?php endif; ?>
                </div>

                <!-- Aksi -->
                <div class="card-footer text-center">
                  <a href="<?= site_url('c_galeri_foto/edit/'.$f->id) ?>"
                     class="btn btn-sm btn-warning">
                     Edit
                  </a>

                  <a href="<?= site_url('c_galeri_foto/delete/'.$f->id.'/'.$kategori->id) ?>"
                     class="btn btn-sm btn-danger"
                     onclick="return confirm('Yakin ingin menghapus foto ini?')">
                     Hapus
                  </a>
                </div>

              </div>
            </div>

          <?php endforeach; ?>
        <?php else: ?>
          <div class="col-12 text-center">
            <p>Belum ada foto</p>
          </div>
        <?php endif; ?>
      </div>

      <a href="<?= site_url('c_galeri_foto') ?>"
         class="btn btn-secondary mt-2">
         Kembali ke Daftar Kategori
      </a>

    </div>
  </div>
</div>

<!-- CSS -->
<style>
.deskripsi-ringkas {
  display: -webkit-box;
  -webkit-line-clamp: 3;      /* maksimal 3 baris */
  -webkit-box-orient: vertical;
  overflow: hidden;
}
</style>

<!-- JS -->
<script>
function toggleDeskripsi(id) {
    const shortDesc = document.getElementById('desc-short-' + id);
    const fullDesc  = document.getElementById('desc-full-' + id);
    const btn       = document.getElementById('btn-desc-' + id);

    if (fullDesc.classList.contains('d-none')) {
        shortDesc.classList.add('d-none');
        fullDesc.classList.remove('d-none');
        btn.innerText = 'Sembunyikan';
    } else {
        shortDesc.classList.remove('d-none');
        fullDesc.classList.add('d-none');
        btn.innerText = 'Lihat selengkapnya';
    }
}
</script>
