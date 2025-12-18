<div class="container mt-4">
  <div class="card shadow-sm">
    <div class="card-header bg-danger text-white">
      <h4 class="mb-0"><?= $title ?></h4>
    </div>

    <div class="card-body">
      <p>Apakah Anda yakin ingin menghapus foto ini?</p>

      <img src="<?= base_url('uploads/galeri/'.$foto->foto) ?>"
           style="height:150px; display:block; margin-bottom:10px;">

      <p><strong>Deskripsi:</strong><br>
        <?= htmlspecialchars($foto->deskripsi) ?>
      </p>

      <a href="<?= site_url('c_galeri_foto/delete/'.$foto->id.'/'.$foto->kategori_id) ?>"
         class="btn btn-danger">Ya, Hapus</a>

      <a href="<?= site_url('c_galeri_foto/detail/'.$foto->kategori_id) ?>"
         class="btn btn-secondary">Batal</a>
    </div>
  </div>
</div>
