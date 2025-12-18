<div class="container mt-4">
  <div class="card shadow-sm">
    <div class="card-header bg-warning text-dark">
      <h4 class="mb-0"><?= $title ?></h4>
    </div>

    <div class="card-body">
      <form action="<?= site_url('c_galeri_foto/update/'.$foto_data->id) ?>"
            method="post"
            enctype="multipart/form-data">

        <div class="mb-3">
          <label class="form-label">Kategori</label>
          <select name="kategori_id" class="form-control" required>
            <?php foreach($kategori_list as $k): ?>
              <option value="<?= $k->id ?>" <?= $k->id==$foto_data->kategori_id?'selected':'' ?>>
                <?= htmlspecialchars($k->nama_kategori) ?>
              </option>
            <?php endforeach; ?>
          </select>
        </div>

        <div class="mb-3">
          <label class="form-label">Deskripsi Foto</label>
          <textarea name="deskripsi" class="form-control" rows="3" required>
<?= htmlspecialchars($foto_data->deskripsi) ?>
          </textarea>
        </div>

        <div class="mb-3">
          <label class="form-label">Ganti Foto (opsional)</label>
          <input type="file" name="foto" class="form-control">
          <img src="<?= base_url('uploads/galeri/'.$foto_data->foto) ?>"
               style="height:150px; margin-top:10px;">
        </div>

        <button type="submit" class="btn btn-warning">Update</button>
        <a href="<?= site_url('c_galeri_foto/detail/'.$foto_data->kategori_id) ?>"
           class="btn btn-secondary">Batal</a>
      </form>
    </div>
  </div>
</div>
