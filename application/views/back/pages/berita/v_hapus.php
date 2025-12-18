<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-header bg-danger text-white">
            <h4 class="mb-0"><?= $title ?></h4>
        </div>
        <div class="card-body">

            <p>Yakin ingin menghapus berita ini?</p>

            <ul class="list-group mb-3">
                <li class="list-group-item"><strong>Judul:</strong> <?= $berita->judul ?></li>
                <?php if ($berita->thumbnail): ?>
                <li class="list-group-item">
                    <img src="<?= base_url('img/berita/thumbnail/'.$berita->thumbnail) ?>" width="150" class="img-thumbnail">
                </li>
                <?php endif; ?>
            </ul>

            <form action="<?= site_url('c_berita/destroy/'.$berita->id) ?>" method="post" class="d-flex justify-content-between">
                <a href="<?= site_url('c_berita') ?>" class="btn btn-secondary">Batal</a>
                <button class="btn btn-danger">Ya, Hapus</button>
            </form>

        </div>
    </div>
</div>
