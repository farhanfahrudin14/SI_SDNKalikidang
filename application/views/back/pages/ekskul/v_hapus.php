<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-header bg-danger text-white">
            <h4 class="mb-0"><?= $title ?></h4>
        </div>
        <div class="card-body">
            <p class="mb-3">Apakah Anda yakin ingin menghapus ekskul ini?</p>

            <ul class="list-group mb-3">
                <li class="list-group-item"><strong>Judul:</strong> <?= $ekskul->judul ?></li>
                <li class="list-group-item"><strong>Deskripsi:</strong> <?= $ekskul->deskripsi ?></li>

                <?php if (!empty($ekskul->foto)): ?>
                    <li class="list-group-item">
                        <strong>Foto:</strong><br>
                        <img src="<?= base_url('uploads/ekskul/'.$ekskul->foto) ?>" width="150" class="img-thumbnail mt-2">
                    </li>
                <?php endif; ?>
            </ul>

            <form action="<?= site_url('c_ekskul/destroy/'.$ekskul->id) ?>" method="post" class="d-flex justify-content-between">
                <a href="<?= site_url('c_ekskul') ?>" class="btn btn-secondary">❌ Batal</a>
                <button type="submit" class="btn btn-danger">✅ Ya, Hapus</button>
            </form>

        </div>
    </div>
</div>
