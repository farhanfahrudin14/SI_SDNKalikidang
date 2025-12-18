<div class="container mt-4">
  <div class="card shadow-sm">
    <div class="card-header bg-success text-white">
      <h4 class="mb-0"><?= $title ?></h4>
    </div>

    <div class="card-body">
      <form action="<?= site_url('c_galeri_kategori/store') ?>" method="post">

        <div class="mb-3">
          <label class="form-label">Nama Kategori</label>
          <input type="text"
                 name="nama_kategori"
                 class="form-control"
                 placeholder="Contoh: Kegiatan Belajar"
                 required>
        </div>

        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="<?= site_url('c_galeri_kategori') ?>" class="btn btn-secondary">Batal</a>

      </form>
    </div>
  </div>
</div>
