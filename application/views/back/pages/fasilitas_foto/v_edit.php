<div class="container mt-4">
  <div class="card shadow-sm">

    <div class="card-header bg-warning text-dark">
      <h4 class="mb-0"><?= isset($title) ? $title : 'Edit Foto Fasilitas' ?></h4>
    </div>

    <div class="card-body">

      <?php if(!isset($foto_data) || !$foto_data): ?>
        <div class="alert alert-danger">
          Data foto tidak ditemukan!
        </div>
        <a href="<?= site_url('c_fasilitas_foto') ?>" class="btn btn-secondary">Kembali</a>
      <?php else: ?>
        <form action="<?= site_url('c_fasilitas_foto/update/'.$foto_data->id) ?>"
              method="post"
              enctype="multipart/form-data">

          <div class="mb-3">
            <label class="form-label">Ganti Foto</label>
            <input type="file" name="foto" class="form-control mt-1" required>
            <?php if(!empty($foto_data->foto) && file_exists('./uploads/fasilitas/'.$foto_data->foto)): ?>
              <img src="<?= base_url('uploads/fasilitas/'.$foto_data->foto) ?>"
                   class="img-fluid mt-2"
                   style="max-height:150px;">
            <?php endif; ?>
          </div>

          <button type="submit" class="btn btn-warning">Update Foto</button>
          <a href="<?= site_url('c_fasilitas_foto/detail/'.$foto_data->kategori_id) ?>"
             class="btn btn-secondary">
            Batal
          </a>
        </form>
      <?php endif; ?>

    </div>
  </div>
</div>
