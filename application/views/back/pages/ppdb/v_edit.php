<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-header bg-warning text-dark">
            <h4 class="mb-0"><?= $title ?></h4>
        </div>
        <div class="card-body">
            <form action="<?= site_url('c_ppdb/update/'.$ppdb->id) ?>" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="judul" class="form-label">Judul:</label>
                    <input type="text" name="judul" id="judul" value="<?= $ppdb->judul ?>" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="deskripsi" class="form-label">Deskripsi:</label>
                    <textarea name="deskripsi" id="deskripsi" class="form-control" rows="3"><?= $ppdb->deskripsi ?></textarea>
                </div>
                <div class="mb-3">
                    <label for="link" class="form-label">Link:</label>
                    <input type="url" name="link" id="link" value="<?= $ppdb->link ?>" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="foto" class="form-label">Foto:</label><br>
                    <?php if (!empty($ppdb->foto) && file_exists('./uploads/ppdb/'.$ppdb->foto)): ?>
                        <img src="<?= base_url('uploads/ppdb/'.$ppdb->foto) ?>" width="100" class="img-thumbnail mb-2">
                    <?php endif; ?>
                    <input type="file" name="foto" id="foto" class="form-control">
                    <small class="text-muted">Kosongkan jika tidak ingin ganti foto</small>
                </div>
                <div class="d-flex justify-content-between">
                    <a href="<?= site_url('c_ppdb') ?>" class="btn btn-secondary">Kembali</a>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
