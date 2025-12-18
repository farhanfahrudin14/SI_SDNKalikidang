<h2><?= $title ?></h2>

<p>Apakah Anda yakin ingin menghapus prestasi ini?</p>

<ul>
    <li><strong>Judul:</strong> <?= $prestasi->judul ?></li>
    <li><strong>Deskripsi:</strong> <?= $prestasi->deskripsi ?></li>
    <?php if (!empty($prestasi->foto)): ?>
        <li><strong>Foto:</strong><br>
            <img src="<?= base_url('uploads/prestasi/'.$prestasi->foto) ?>" width="150">
        </li>
    <?php endif; ?>
</ul>

<form action="<?= site_url('c_prestasi/destroy/'.$prestasi->id_prestasi) ?>" method="post">
    <button type="submit" class="btn btn-danger">✅ Ya, Hapus</button>
    <a href="<?= site_url('c_prestasi') ?>" class="btn btn-secondary">❌ Batal</a>
</form>
