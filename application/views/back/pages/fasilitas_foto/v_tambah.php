<div class="container mt-4">
  <div class="card shadow-sm">
    <div class="card-header bg-success text-white">
      <h4 class="mb-0">
        <?= $title ?> : <?= htmlspecialchars($kategori->nama_kategori) ?>
      </h4>
    </div>

    <div class="card-body">
      <form action="<?= site_url('c_fasilitas_foto/upload/'.$kategori->id) ?>"
            method="post"
            enctype="multipart/form-data">

        <div class="mb-3">
          <label class="form-label">Foto</label>
          <input type="file" name="foto" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success">Upload</button>
        <a href="<?= site_url('c_fasilitas_foto/detail/'.$kategori->id) ?>"
           class="btn btn-secondary">
          Batal
        </a>
      </form>
    </div>
  </div>
</div>
