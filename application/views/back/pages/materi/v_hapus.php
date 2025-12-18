<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-header bg-danger text-white">
            <h4 class="mb-0"><?= $title ?></h4>
        </div>
        <div class="card-body">
            <p class="mb-3">Apakah Anda yakin ingin menghapus materi ini?</p>

            <ul class="list-group mb-3">
                <li class="list-group-item"><strong>Judul:</strong> <?= $materi->judul ?></li>
                <li class="list-group-item"><strong>Deskripsi:</strong> <?= $materi->deskripsi ?></li>
                <li class="list-group-item"><strong>Kelas:</strong> <?= $materi->kelas ?></li>
                <?php if (!empty($materi->file)): ?>
                    <li class="list-group-item">
                        <strong>File:</strong><br>
                        <?php if (pathinfo($materi->file, PATHINFO_EXTENSION) == 'pdf'): ?>
                            <a href="<?= base_url('uploads/materi/'.$materi->file) ?>" target="_blank" class="btn btn-sm btn-outline-info mt-2">
                                📄 Lihat PDF
                            </a>
                        <?php else: ?>
                            <img src="<?= base_url('uploads/materi/'.$materi->file) ?>" width="150" class="img-thumbnail mt-2">
                        <?php endif; ?>
                    </li>
                <?php endif; ?>
            </ul>

            <form action="<?= site_url('c_materi/destroy/'.$materi->id) ?>" method="post" class="d-flex justify-content-between">
                <a href="<?= site_url('c_materi') ?>" class="btn btn-secondary">❌ Batal</a>
                <button type="submit" class="btn btn-danger">✅ Ya, Hapus</button>
            </form>
        </div>
    </div>
</div>
