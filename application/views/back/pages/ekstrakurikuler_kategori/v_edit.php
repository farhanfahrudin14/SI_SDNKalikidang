<div class="container mt-4">
  <div class="card shadow-sm">
    <div class="card-header bg-warning">
      <h4 class="mb-0"><?= $title ?></h4>
    </div>

    <div class="card-body">
      <form action="<?= site_url('c_ekstrakurikuler_kategori/update/'.$kategori->id) ?>" method="post">

        <div class="mb-3">
          <label class="form-label">Nama Kategori</label>
          <input type="text" name="nama_kategori"
                 value="<?= htmlspecialchars($kategori->nama_kategori) ?>"
                 class="form-control" required>
        </div>

        <div class="mb-3">
          <label class="form-label">Deskripsi</label>
          <textarea name="deskripsi" class="form-control" rows="4"><?= htmlspecialchars($kategori->deskripsi) ?></textarea>
        </div>

        <button class="btn btn-warning">Update</button>
        <a href="<?= site_url('c_ekstrakurikuler_kategori') ?>" class="btn btn-secondary">Batal</a>

      </form>
    </div>
  </div>
</div>
