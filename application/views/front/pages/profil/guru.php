<!-- Content -->
<div class="content mt-5 mb-5 pb-5 pt-5">
    <div class="container">
        <h4 class="mb-4 text-center">Daftar Guru SD Negeri Kalikidang</h4>

        <div class="row">
            <?php if (!empty($guru)) : ?>
                <?php foreach ($guru as $g) : ?>
                    <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                        <div class="card h-100 text-center shadow-sm">
                            <?php if ($g->foto) : ?>
                                <img src="<?= base_url('uploads/guru/' . $g->foto); ?>" 
                                     class="card-img-top" 
                                     alt="<?= $g->nama; ?>" 
                                     style="width:100%; height:250px; object-fit:cover; object-position:top;">
                            <?php else : ?>
                                <img src="<?= base_url('assets/img/no-image.png'); ?>" 
                                     class="card-img-top" 
                                     alt="No Image" 
                                     style="width:100%; height:250px; object-fit:cover; object-position:center;">
                            <?php endif; ?>
                            <div class="card-body">
                                <h5 class="card-title mb-2"><?= $g->nama; ?></h5>
                                <p class="card-text mb-1">
                                    <strong>NIP:</strong> <?= $g->nip ?: '-'; ?>
                                </p>
                                <p class="card-text">
                                    <strong>Jabatan:</strong> <?= $g->jabatan; ?>
                                </p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else : ?>
                <div class="col-12">
                    <div class="alert alert-info text-center">
                        Belum ada data guru yang ditambahkan.
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>
<!-- End of Content -->
