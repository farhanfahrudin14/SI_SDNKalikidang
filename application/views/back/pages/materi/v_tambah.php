<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-header bg-success text-white">
            <h4 class="mb-0"><?= $title ?></h4>
        </div>
        <div class="card-body">
            <form action="<?= base_url('c_materi/store') ?>" method="post" enctype="multipart/form-data">
                
                <div class="mb-3">
                    <label for="judul" class="form-label">Judul:</label>
                    <input type="text" name="judul" id="judul" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="deskripsi" class="form-label">Deskripsi:</label>
                    <textarea name="deskripsi" id="deskripsi" rows="5" class="form-control"></textarea>
                </div>

                <div class="mb-3">
                    <label for="kelas" class="form-label">Kelas:</label>
                    <select name="kelas" id="kelas" class="form-control" required>
                        <option value="">-- Pilih Kelas --</option>
                        <?php for($i=1; $i<=6; $i++): ?>
                            <option value="<?= $i ?>">Kelas <?= $i ?></option>
                        <?php endfor; ?>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="file" class="form-label">File (PDF):</label>
                    <input type="file" name="file" id="file" class="form-control" accept=".pdf">
                </div>

                <div class="d-flex justify-content-between">
                    <a href="<?= site_url('c_materi') ?>" class="btn btn-secondary">Kembali</a>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
