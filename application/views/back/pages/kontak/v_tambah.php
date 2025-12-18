<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-header bg-success text-white">
            <h4 class="mb-0"><?= $title ?></h4>
        </div>
        <div class="card-body">
            <form action="<?= site_url('c_kontak/store') ?>" method="post">
                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <textarea name="alamat" id="alamat" class="form-control" rows="3" required></textarea>
                </div>
                <div class="mb-3">
                    <label for="telepon" class="form-label">Telepon</label>
                    <input type="text" name="telepon" id="telepon" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" id="email" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="maps" class="form-label">Google Maps (link/iframe)</label>
                    <textarea name="maps" id="maps" class="form-control" rows="3"></textarea>
                </div>
                <button type="submit" class="btn btn-success">Simpan</button>
                <a href="<?= site_url('c_kontak') ?>" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</div>
