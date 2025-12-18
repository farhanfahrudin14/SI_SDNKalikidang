<div class="container mt-4">
  <div class="card shadow-sm">
    <div class="card-header bg-danger text-white">
      <h4 class="mb-0"><?= $title ?></h4>
    </div>

    <div class="card-body">
      <p>Apakah Anda yakin ingin menghapus kategori berikut?</p>

      <ul>
        <li>
          <strong>Nama Kategori:</strong>
          <?= htmlspecialchars($kategori->nama_kategori) ?>
        </li>
      </ul>

      <a href="<?= site_url('c_galeri_kategori/destroy/'.$kategori->id) ?>"
         class="btn btn-danger">
        Ya, Hapus
      </a>

      <a href="<?= site_url('c_galeri_kategori') ?>"
         class="btn btn-secondary">
        Batal
      </a>
    </div>
  </div>
</div>
