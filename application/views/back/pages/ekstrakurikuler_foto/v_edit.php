<div class="container mt-4">
  <div class="card shadow-sm">

    <!-- HEADER -->
    <div class="card-header bg-warning text-dark">
      <h4 class="mb-0"><?= isset($title) ? $title : 'Edit Foto' ?></h4>
    </div>

    <div class="card-body">

      <?php if(!isset($foto_data) || !$foto_data): ?>
        <div class="alert alert-danger">
          Data foto tidak ditemukan!
        </div>
        <a href="<?= site_url('c_ekstrakurikuler_foto') ?>" class="btn btn-secondary">Kembali</a>
      <?php else: ?>
        <form action="<?= site_url('c_ekstrakurikuler_foto/update/'.$foto_data->id) ?>"
              method="post"
              enctype="multipart/form-data">

          <!-- FOTO -->
          <div class="mb-3">
            <label class="form-label">Ganti Foto</label>
            <input type="file" name="foto" class="form-control mt-1" required>
            <?php if(!empty($foto_data->foto) && file_exists('./uploads/ekstrakurikuler/'.$foto_data->foto)): ?>
              <img src="<?= base_url('uploads/ekstrakurikuler/'.$foto_data->foto) ?>"
                   class="img-fluid mt-2"
                   style="max-height:150px;">
            <?php endif; ?>
          </div>

          <!-- TOMBOL -->
          <button type="submit" class="btn btn-warning">Update Foto</button>
          <a href="<?= site_url('c_ekstrakurikuler_foto/detail/'.$foto_data->kategori_id) ?>"
             class="btn btn-secondary">Batal</a>

        </form>
      <?php endif; ?>

    </div>
  </div>
</div>
