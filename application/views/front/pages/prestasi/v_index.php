<div class="container py-4">
    <h2 class="mb-4 text-center">Daftar Prestasi</h2>

    <?php if (!empty($prestasi)) : ?>
        <div class="row">
            <?php foreach ($prestasi as $p) : ?>
                <div class="col-md-4 mb-4">
                    <div class="card shadow-sm h-100">

                        <?php if (!empty($p->foto)) : ?>
                            <img
                                src="<?= base_url('uploads/prestasi/' . $p->foto); ?>"
                                class="card-img-top"
                                alt="<?= strip_tags($p->judul); ?>"
                                style="height: 200px; object-fit: cover;"
                            >
                        <?php endif; ?>

                        <div class="card-body">

                            <!-- JUDUL (HTML TERBATAS: bold + italic) -->
                            <h5 class="card-title">
                                <?= strip_tags($p->judul, '<b><strong><i><em>'); ?>
                            </h5>

                            <!-- DESKRIPSI (RINGKAS & TANPA HTML) -->
                            <p class="card-text">
                                <?= word_limiter(strip_tags($p->deskripsi), 20); ?>
                            </p>

                        </div>

                        <div class="card-footer text-center">
                            <a
                                href="<?= site_url('akademik/prestasi_detail/' . $p->id); ?>"
                                class="btn btn-info btn-sm"
                            >
                                Lanjut Membaca
                            </a>
                        </div>

                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php else : ?>
        <div class="alert alert-info text-center">
            Belum ada data prestasi yang ditambahkan.
        </div>
    <?php endif; ?>
</div>
