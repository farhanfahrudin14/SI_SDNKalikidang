<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-header bg-danger text-white">
            <h4 class="mb-0"><?= $title ?></h4>
        </div>
        <div class="card-body">
            <p>Apakah Anda yakin ingin menghapus data ini?</p>
            <ul class="list-group mb-3">
                <li class="list-group-item"><strong>Judul:</strong> <?= $ppdb->judul ?></li>
                <li class="list-group-item"><strong>Deskripsi:</strong> <?= $ppdb->deskripsi ?></li>
                <li class="list-group-item"><strong>Link:</strong> <?= $ppdb->link ?></li>
                <?php if (!empty($ppdb->foto) && file_exists('./uploads/ppdb/'.$ppdb->foto)): ?>
                <li class="list-group-item">
                    <strong>Foto:</strong><br>
                    <img src="<?= base_url('uploads/ppdb/'.$ppdb->foto) ?>" width="150" class="img-thumbnail mt-2">
                </li>
                <?php endif; ?>
            </ul>
            <form action="<?= site_url('c_ppdb/destroy/'.$ppdb->id) ?>" method="post" class="d-flex justify-content-between">
                <a href="<?= site_url('c_ppdb') ?>" class="btn btn-secondary">❌ Batal</a>
                <button type="submit" class="btn btn-danger">✅ Ya, Hapus</button>
            </form>
        </div>
    </div>
</div>
