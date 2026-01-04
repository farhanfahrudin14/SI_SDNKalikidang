<div class="card shadow-sm">
    <div class="card-body">
        <h2 class="mb-4"><?= $title ?></h2>

        <form action="<?= site_url('c_prestasi/store') ?>" method="post" enctype="multipart/form-data">

            <!-- Judul Prestasi (Summernote) -->
<div class="mb-3">
    <label for="summernote_judul" class="form-label">Judul Prestasi</label>
    <textarea name="judul" id="summernote-judul" class="form-control"></textarea>

</div>

<!-- Deskripsi (Summernote) -->
<div class="mb-3">
    <label for="summernote" class="form-label">Deskripsi</label>
    <textarea
        name="deskripsi"
        id="summernote"
        class="form-control"
        required
    ></textarea>
</div>


            <!-- Foto -->
            <div class="mb-3">
                <label for="foto" class="form-label">Foto</label>
                <input
                    type="file"
                    name="foto"
                    id="foto"
                    class="form-control"
                    accept="image/*"
                >
                <small class="text-muted">* Maksimal ukuran gambar 3 MB</small>
            </div>

            <!-- Status Aktif -->
            <div class="mb-3">
                <label for="aktif" class="form-label">Aktif</label>
                <select name="aktif" id="aktif" class="form-select">
                    <option value="Y">Ya</option>
                    <option value="N">Tidak</option>
                </select>
            </div>

            <!-- Tombol -->
            <div class="d-flex gap-2">
                <a href="<?= site_url('c_prestasi') ?>" class="btn btn-secondary">
                    Kembali
                </a>
                <button type="submit" class="btn btn-primary">
                    Simpan
                </button>
            </div>

        </form>
    </div>
</div>
