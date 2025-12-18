<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-header bg-warning text-dark">
            <h4 class="mb-0"><?= $title ?></h4>
        </div>
        <div class="card-body">
            <form action="<?= site_url('c_materi/update/'.$materi->id) ?>" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="judul" class="form-label">Judul:</label>
                    <input type="text" name="judul" id="judul" value="<?= $materi->judul ?>" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="deskripsi" class="form-label">Deskripsi:</label>
                    <textarea name="deskripsi" id="deskripsi" rows="5" class="form-control"><?= $materi->deskripsi ?></textarea>
                </div>

                <div class="mb-3">
                    <label for="kelas" class="form-label">Kelas:</label>
                    <select name="kelas" id="kelas" class="form-control" required>
                        <?php for($i=1; $i<=6; $i++): ?>
                            <option value="<?= $i ?>" <?= ($materi->kelas == $i) ? 'selected' : '' ?>>Kelas <?= $i ?></option>
                        <?php endfor; ?>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="file" class="form-label">File (PDF):</label><br>
                    <?php if (!empty($materi->file)): ?>
                        <p>File lama: 
                            <?php if (pathinfo($materi->file, PATHINFO_EXTENSION) == 'pdf'): ?>
                                <a href="<?= base_url('uploads/materi/'.$materi->file) ?>" target="_blank" class="btn btn-sm btn-outline-info">Lihat PDF</a>
                            <?php else: ?>
                                <img src="<?= base_url('uploads/materi/'.$materi->file) ?>" width="100" class="img-thumbnail">
                            <?php endif; ?>
                        </p>
                    <?php endif; ?>
                    <input type="file" name="file" id="file" class="form-control">
                    <small class="text-muted">Kosongkan jika tidak ingin ganti file</small>
                </div>

                <div class="d-flex justify-content-between">
                    <a href="<?= site_url('c_materi') ?>" class="btn btn-secondary">Kembali</a>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
