<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-header bg-danger text-white">
            <h4 class="mb-0"><?= $title ?></h4>
        </div>
        <div class="card-body">
            <p>Apakah Anda yakin ingin menghapus data kontak berikut?</p>

            <ul>
                <li><strong>Alamat:</strong> <?= $kontak->alamat ?></li>
                <li><strong>Telepon:</strong> <?= $kontak->telepon ?></li>
                <li><strong>Email:</strong> <?= $kontak->email ?></li>
                <?php if (!empty($kontak->maps)): ?>
                    <li><strong>Maps:</strong> <a href="<?= $kontak->maps ?>" target="_blank">Lihat Maps</a></li>
                <?php endif; ?>
            </ul>

            <a href="<?= site_url('c_kontak/destroy/'.$kontak->id) ?>" class="btn btn-danger">Ya, Hapus</a>
            <a href="<?= site_url('c_kontak') ?>" class="btn btn-secondary">Batal</a>
        </div>
    </div>
</div>
