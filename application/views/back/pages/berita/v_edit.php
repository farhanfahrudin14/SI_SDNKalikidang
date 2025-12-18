<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-header bg-warning text-dark">
            <h4 class="mb-0"><?= $title ?></h4>
        </div>
        <div class="card-body">

            <form action="<?= site_url('c_berita/update/'.$berita->id) ?>"
                  method="post"
                  enctype="multipart/form-data">

                <!-- JUDUL -->
                <div class="mb-3">
                    <label class="form-label">Judul</label>
                    <input type="text"
                           name="title"
                           value="<?= $berita->title ?>"
                           class="form-control"
                           required>
                </div>

                <!-- ISI -->
                <div class="mb-3">
                    <label class="form-label">Isi Berita</label>
                    <textarea name="content"
                              rows="5"
                              class="form-control"
                              required><?= $berita->content ?></textarea>
                </div>

                <!-- THUMBNAIL -->
                <div class="mb-3">
                    <label class="form-label">Thumbnail</label><br>

                    <?php if (!empty($berita->photo)) : ?>
                        <img src="<?= base_url('img/berita/'.$berita->photo) ?>"
                             width="120"
                             class="img-thumbnail mb-2">
                    <?php endif; ?>

                    <input type="file" name="photo" class="form-control">
                    <small class="text-muted">Kosongkan jika tidak diganti</small>
                </div>

                <!-- STATUS -->
                <div class="mb-3">
                    <label class="form-label">Status</label>
                    <select name="is_active" class="form-control">
                        <option value="Y" <?= $berita->is_active == 'Y' ? 'selected' : '' ?>>Aktif</option>
                        <option value="N" <?= $berita->is_active == 'N' ? 'selected' : '' ?>>Nonaktif</option>
                    </select>
                </div>

                <div class="d-flex justify-content-between">
                    <a href="<?= site_url('c_berita') ?>" class="btn btn-secondary">Kembali</a>
                    <button class="btn btn-primary">Update</button>
                </div>

            </form>

        </div>
    </div>
</div>
