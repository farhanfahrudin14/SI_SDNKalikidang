<div class="blog mt-5 mb-5">
    <div class="container">

        <!-- JUDUL -->
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <h1 class="text-center">
                    <?= preg_replace(
                        '/<\/?p[^>]*>/',
                        '',
                        html_entity_decode(html_entity_decode($prestasi->judul))
                    ); ?>
                </h1>
            </div>
        </div>

        <!-- TANGGAL + FOTO -->
        <div class="row justify-content-center mt-4">
            <div class="col-lg-10">

                <div class="text-muted mb-2">
                    <small>
                        Diunggah pada <?= date('d M Y', strtotime($prestasi->diupload)); ?>
                    </small>
                </div>

                <?php if (!empty($prestasi->foto)) : ?>
                    <img
                        src="<?= base_url('uploads/prestasi/' . $prestasi->foto); ?>"
                        alt="Foto Prestasi"
                        class="img-fluid rounded shadow-sm"
                    >
                <?php endif; ?>

            </div>
        </div>

        <!-- DESKRIPSI -->
        <div class="row justify-content-center mt-4">
            <div
                class="col-lg-10"
                style="line-height:1.8; font-size:1.05rem; text-align:justify;"
            >
                <?= html_entity_decode(html_entity_decode($prestasi->deskripsi)); ?>
            </div>
        </div>

        <!-- TOMBOL KEMBALI -->
        <div class="row justify-content-center mt-5">
            <div class="col-lg-10 text-center">
                <a
                    href="<?= site_url('akademik/prestasi'); ?>"
                    class="btn btn-outline-secondary"
                >
                    ← Kembali ke Daftar Prestasi
                </a>
            </div>
        </div>

    </div>
</div>
