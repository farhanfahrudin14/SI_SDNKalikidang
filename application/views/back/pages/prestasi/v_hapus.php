<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-header bg-danger text-white">
            <h4 class="mb-0"><?= $title ?></h4>
        </div>

        <div class="card-body">
            <p class="mb-3">Apakah Anda yakin ingin menghapus prestasi ini?</p>

            <ul class="list-group mb-3">
                <li class="list-group-item">
                    <strong>Judul:</strong><br>
                    <?= html_entity_decode($prestasi->judul); ?>
                </li>

                <li class="list-group-item">
                    <strong>Deskripsi:</strong><br>
                    <?= html_entity_decode($prestasi->deskripsi); ?>
                </li>

                <?php if (!empty($prestasi->foto)) : ?>
                    <li class="list-group-item">
                        <strong>Foto:</strong><br>
                        <img src="<?= base_url('uploads/prestasi/'.$prestasi->foto); ?>"
                             width="180"
                             class="img-thumbnail mt-2">
                    </li>
                <?php endif; ?>
            </ul>

            <form action="<?= site_url('c_prestasi/destroy/'.$prestasi->id); ?>"
                  method="post"
                  class="d-flex justify-content-between">

                <a href="<?= site_url('c_prestasi'); ?>" class="btn btn-secondary">
                    ❌ Batal
                </a>

                <button type="submit" class="btn btn-danger">
                    ✅ Ya, Hapus
                </button>
            </form>
        </div>
    </div>
</div>
