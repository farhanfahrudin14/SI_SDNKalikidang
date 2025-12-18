<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-header bg-warning text-dark">
            <h4 class="mb-0"><?= $title ?></h4>
        </div>
        <div class="card-body">
            <form action="<?= site_url('c_guru/update/'.$guru->id) ?>" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama Guru</label>
                    <input type="text" name="nama" id="nama" class="form-control" value="<?= $guru->nama ?>" required>
                </div>
                <div class="mb-3">
                    <label for="nip" class="form-label">NIP (Opsional)</label>
                    <input type="text" name="nip" id="nip" class="form-control" value="<?= $guru->nip ?>">
                </div>
                <div class="mb-3">
                    <label for="jabatan" class="form-label">Jabatan</label>
                    <input type="text" name="jabatan" id="jabatan" class="form-control" value="<?= $guru->jabatan ?>" required>
                </div>
                <div class="mb-3">
                    <label for="foto" class="form-label">Foto Baru (opsional)</label>
                    <input type="file" name="foto" id="foto" class="form-control">
                    <?php if (!empty($guru->foto)): ?>
                        <p class="mt-2">Foto lama:</p>
                        <img src="<?= base_url('uploads/guru/'.$guru->foto) ?>" width="100" class="img-thumbnail">
                    <?php endif; ?>
                </div>
                <button type="submit" class="btn btn-warning">Update</button>
                <a href="<?= site_url('c_guru') ?>" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</div>
