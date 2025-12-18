<div class="blog mt-5 mb-5">
    <div class="container">

        <!-- JUDUL -->
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <h1 class="text-center"><?= htmlspecialchars($berita->title) ?></h1>
            </div>
        </div>

        <!-- META -->
        <div class="row justify-content-center mt-3">
            <div class="col-lg-10 text-center text-muted">

                <span class="me-3">
                    <i class="fa fa-user me-1"></i>
                    <?= htmlspecialchars($berita->first_name . ' ' . $berita->last_name) ?>
                </span>

                <span class="me-3">
                    <i class="fa fa-calendar-alt me-1"></i>
                    <?= mediumdate_indo($berita->date) ?>
                </span>

               <?php if ($berita->role === 'admin') : ?>
    <span class="badge bg-primary">Admin</span>

<?php elseif ($berita->role === 'admin_biasa') : ?>
    <span class="badge bg-warning text-dark">Admin Biasa</span>

<?php elseif ($berita->role === 'Guru') : ?>
    <span class="badge bg-success">Guru</span>
<?php endif; ?>


            </div>
        </div>

        <!-- GAMBAR -->
        <div class="row justify-content-center mt-4">
            <div class="col-lg-10 text-center">
                <?php if (!empty($berita->photo)) : ?>
                    <img src="<?= base_url('img/berita/' . $berita->photo) ?>"
                         class="img-fluid rounded shadow-sm mb-4">
                <?php endif; ?>
            </div>
        </div>

        <!-- KONTEN -->
        <div class="row justify-content-center mt-3 konten">
            <div class="col-lg-10">
                <?= $berita->content ?>
            </div>
        </div>

        <!-- BACK -->
        <div class="row justify-content-center mt-5">
            <div class="col-lg-10 text-center">
                <a href="<?= site_url('blog'); ?>" class="btn btn-outline-secondary">
                    ← Kembali ke Daftar Berita
                </a>
            </div>
        </div>

    </div>
</div>
