<div class="card shadow-sm">
    <div class="card-body">
        <h2 class="mb-4"><?= $title ?></h2>

        <form action="<?= site_url('c_prestasi/update/'.$prestasi->id) ?>" method="post" enctype="multipart/form-data">

            <!-- Judul Prestasi (Summernote) -->
            <div class="mb-3">
                <label for="summernote_judul" class="form-label">Judul Prestasi</label>
                <textarea
                    name="judul"
                    id="summernote_judul"
                    class="form-control"
                    required
                ><?= $prestasi->judul ?></textarea>
            </div>

            <!-- Deskripsi (Summernote) -->
            <div class="mb-3">
                <label for="summernote" class="form-label">Deskripsi</label>
                <textarea
                    name="deskripsi"
                    id="summernote"
                    class="form-control"
                    required
                ><?= $prestasi->deskripsi ?></textarea>
            </div>

            <!-- Foto -->
            <div class="mb-3">
                <label class="form-label">Foto</label><br>
                <?php if ($prestasi->foto): ?>
                    <img
                        src="<?= base_url('uploads/prestasi/'.$prestasi->foto) ?>"
                        width="120"
                        class="img-thumbnail mb-2"
                    ><br>
                <?php endif; ?>

                <input
                    type="file"
                    name="foto"
                    id="foto"
                    class="form-control"
                >
                <small class="text-muted">
                    * Kosongkan jika tidak ingin mengubah foto
                </small>
            </div>

            <!-- Aktif -->
            <div class="mb-3">
                <label for="aktif" class="form-label">Aktif</label>
                <select name="aktif" id="aktif" class="form-select">
                    <option value="Y" <?= $prestasi->aktif == 'Y' ? 'selected' : '' ?>>Ya</option>
                    <option value="N" <?= $prestasi->aktif == 'N' ? 'selected' : '' ?>>Tidak</option>
                </select>
            </div>

            <!-- Tombol -->
            <div class="d-flex gap-2">
                <a href="<?= site_url('c_prestasi') ?>" class="btn btn-secondary">
                    Kembali
                </a>
                <button type="submit" class="btn btn-primary">
                    Update
                </button>
            </div>

        </form>
    </div>
</div>
