<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-header bg-success text-white">
            <h4 class="mb-0"><?= $title ?></h4>
        </div>
        <div class="card-body">
            <form action="<?= site_url('c_guru/store') ?>" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama Guru</label>
                    <input type="text" name="nama" id="nama" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="nip" class="form-label">NIP (Opsional)</label>
                    <input type="text" name="nip" id="nip" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="jabatan" class="form-label">Jabatan</label>
                    <input type="text" name="jabatan" id="jabatan" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="foto" class="form-label">Foto (jpg/png, maks 2MB)</label>
                    <input type="file" name="foto" id="foto" class="form-control">
                </div>
                <button type="submit" class="btn btn-success">Simpan</button>
                <a href="<?= site_url('c_guru') ?>" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</div>
