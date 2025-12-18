<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-header bg-danger text-white">
            <h4 class="mb-0"><?= $title ?></h4>
        </div>
        <div class="card-body">
            <p>Apakah Anda yakin ingin menghapus data guru berikut?</p>

            <ul>
                <li><strong>Nama:</strong> <?= $guru->nama ?></li>
                <li><strong>NIP:</strong> <?= $guru->nip ?: '-' ?></li>
                <li><strong>Jabatan:</strong> <?= $guru->jabatan ?></li>
                <?php if (!empty($guru->foto)): ?>
                    <li><strong>Foto:</strong></li>
                    <img src="<?= base_url('uploads/guru/'.$guru->foto) ?>" width="120" class="img-thumbnail mt-2">
                <?php endif; ?>
            </ul>

            <a href="<?= site_url('c_guru/destroy/'.$guru->id) ?>" class="btn btn-danger">Ya, Hapus</a>
            <a href="<?= site_url('c_guru') ?>" class="btn btn-secondary">Batal</a>
        </div>
    </div>
</div>
