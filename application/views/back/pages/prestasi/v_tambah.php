<div class="card shadow-sm">
    <div class="card-body">
        <h2 class="mb-4"><?= $title ?></h2>
        <form action="<?= site_url('c_prestasi/store') ?>" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="judul" class="form-label">Judul Prestasi</label>
                <input type="text" name="judul" id="judul" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi</label>
                <textarea name="deskripsi" id="deskripsi" class="form-control" rows="4" required></textarea>
            </div>

            <div class="mb-3">
                <label for="foto" class="form-label">Foto</label>
                <input type="file" name="foto" id="foto" class="form-control">
                <small class="text-muted">* Maksimal ukuran gambar 3 MB</small>
            </div>

            <div class="mb-3">
                <label for="aktif" class="form-label">Aktif</label>
                <select name="aktif" id="aktif" class="form-select">
                    <option value="Y">Ya</option>
                    <option value="N">Tidak</option>
                </select>
            </div>

            <a href="<?= site_url('c_prestasi') ?>" class="btn btn-secondary">Kembali</a>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>
