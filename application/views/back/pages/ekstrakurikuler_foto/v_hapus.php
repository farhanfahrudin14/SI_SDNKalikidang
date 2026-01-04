<div class="container mt-4">
  <div class="card shadow-sm">
    <div class="card-header bg-danger text-white">
      <h4 class="mb-0"><?= isset($title) ? $title : 'Hapus Foto Ekstrakurikuler' ?></h4>
    </div>

    <div class="card-body">
      <?php if(!empty($foto) && isset($foto->foto) && file_exists('./uploads/ekstrakurikuler/'.$foto->foto)): ?>
        <p>Apakah Anda yakin ingin menghapus foto ini?</p>
        <img src="<?= base_url('uploads/ekstrakurikuler/'.$foto->foto) ?>"
             class="img-fluid mb-3"
             style="max-height:200px;">
      <?php else: ?>
        <p class="text-warning">Foto tidak ditemukan atau sudah dihapus.</p>
      <?php endif; ?>

      <?php if(!empty($foto) && isset($foto->id) && isset($foto->kategori_id)): ?>
        <a href="<?= site_url('c_ekstrakurikuler_foto/delete/'.$foto->id.'/'.$foto->kategori_id) ?>"
           class="btn btn-danger">
          Ya, Hapus
        </a>

        <a href="<?= site_url('c_ekstrakurikuler_foto/detail/'.$foto->kategori_id) ?>"
           class="btn btn-secondary">
          Batal
        </a>
      <?php else: ?>
        <a href="<?= site_url('c_ekstrakurikuler_foto') ?>"
           class="btn btn-secondary">
          Kembali ke Daftar Kategori
        </a>
      <?php endif; ?>
    </div>
  </div>
</div>
