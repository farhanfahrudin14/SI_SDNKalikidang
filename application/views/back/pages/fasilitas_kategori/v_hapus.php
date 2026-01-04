<div class="container mt-4">
  <div class="card shadow-sm">
    <div class="card-header bg-danger text-white">
      <h4 class="mb-0"><?= $title ?></h4>
    </div>

    <div class="card-body">
      <p>Yakin ingin menghapus kategori berikut?</p>

      <ul>
        <li><strong><?= htmlspecialchars($kategori->nama_kategori) ?></strong></li>
      </ul>

      <a href="<?= site_url('c_fasilitas_kategori/destroy/'.$kategori->id) ?>"
         class="btn btn-danger">
        Ya, Hapus
      </a>

      <a href="<?= site_url('c_fasilitas_kategori') ?>"
         class="btn btn-secondary">
        Batal
      </a>
    </div>
  </div>
</div>
