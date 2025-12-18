<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-header bg-warning text-dark">
            <h4 class="mb-0"><?= $title ?></h4>
        </div>
        <div class="card-body">
            <form action="<?= site_url('c_ekskul/update/'.$ekskul->id) ?>" method="post" enctype="multipart/form-data">

                <div class="mb-3">
                    <label for="judul" class="form-label">Judul:</label>
                    <input type="text" name="judul" id="judul" value="<?= $ekskul->judul ?>" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="deskripsi" class="form-label">Deskripsi:</label>
                    <textarea name="deskripsi" id="deskripsi" rows="4" class="form-control"><?= $ekskul->deskripsi ?></textarea>
                </div>

                <div class="mb-3">
                    <label for="foto" class="form-label">Foto:</label><br>

                    <?php if (!empty($ekskul->foto)): ?>
                        <p>
                            <img src="<?= base_url('uploads/ekskul/'.$ekskul->foto) ?>" width="100" class="img-thumbnail">
                        </p>
                    <?php endif; ?>

                    <input type="file" name="foto" id="foto" class="form-control">
                    <small class="text-muted">Kosongkan jika tidak ingin mengganti foto</small>
                </div>

                <div class="d-flex justify-content-between">
                    <a href="<?= site_url('c_ekskul') ?>" class="btn btn-secondary">Kembali</a>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>

            </form>
        </div>
    </div>
</div>
