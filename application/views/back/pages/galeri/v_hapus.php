<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-header bg-danger text-white">
            <h4 class="mb-0"><?= $title ?></h4>
        </div>
        <div class="card-body">
            <p>Apakah Anda yakin ingin menghapus foto berikut?</p>
            <ul>
                <li><strong>Deskripsi:</strong> <?= $galeri->deskripsi ?></li>
                <li><strong>Tanggal Upload:</strong> <?= date('d-m-Y', strtotime($galeri->tanggal_upload)) ?></li>
                <?php if (!empty($galeri->foto)): ?>
                    <li><strong>Foto:</strong></li>
                    <img src="<?= base_url('uploads/galeri/'.$galeri->foto) ?>" width="120" class="img-thumbnail mt-2">
                <?php endif; ?>
            </ul>

            <a href="<?= site_url('c_galeri/destroy/'.$galeri->id) ?>" class="btn btn-danger">Ya, Hapus</a>
            <a href="<?= site_url('c_galeri') ?>" class="btn btn-secondary">Batal</a>
        </div>
    </div>
</div>
