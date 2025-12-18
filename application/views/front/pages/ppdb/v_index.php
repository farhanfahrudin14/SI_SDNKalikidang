<!-- PPDB -->
<div class="ppdb mt-5 mb-5">
    <h2 class="mb-4 text-center">Informasi PPDB</h2>
    <div class="container">
        <div class="row justify-content-center">

            <?php foreach($ppdb as $p) : ?>
                <div class="col-lg-8 col-md-10 col-sm-12 mb-4 d-flex align-items-stretch">
                    <div class="card shadow-lg w-100">
                        
                        <!-- Foto -->
                        <?php if(!empty($p->foto)): ?>
                            <a href="<?= base_url('uploads/ppdb/' . $p->foto) ?>" target="_blank">
                                <img 
                                    src="<?= base_url('uploads/ppdb/' . $p->foto) ?>" 
                                    class="card-img-top img-fluid" 
                                    style="height:400px; object-fit:cover; background:#f8f9fa; border-bottom:1px solid #ddd;">
                            </a>
                        <?php endif; ?>

                        <div class="card-body d-flex flex-column">
                            <!-- Judul -->
                            <h4 class="card-title text-center mb-3"><?= $p->judul ?></h4>

                            <!-- Deskripsi -->
                            <?php if(!empty($p->deskripsi)): ?>
                                <p class="card-text" 
                                   style="flex-grow:1; text-align:justify; white-space:pre-line; line-height:1.4; font-size:14px;">
                                    <?= nl2br($p->deskripsi) ?>
                                </p>
                            <?php endif; ?>

                            <!-- Tombol ke halaman detail -->
                            <div class="text-left mt-3">
                                <a href="<?= base_url('ppdb/detail/' . $p->id) ?>" class="btn btn-primary px-4">
                                    Klik di sini menuju ke pendaftaran →
                                </a>
                            </div>
                        </div>

                    </div>
                </div>
            <?php endforeach ?>

        </div>
    </div>
</div>
<!-- End of PPDB -->
