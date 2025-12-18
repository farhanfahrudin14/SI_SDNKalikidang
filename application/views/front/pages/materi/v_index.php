<div class="container my-5">
    <h2 class="text-center mb-4">
        Daftar Materi Kelas <?= $kelas ?>
    </h2>

    <?php if (!empty($materi)) : ?>
        <div class="row">
            <?php foreach ($materi as $m) : ?>
                <div class="col-md-4 mb-4">
                    <div class="card shadow-sm h-100">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title"><?= $m->judul; ?></h5>
                            <p class="card-text">
                                <?= word_limiter(strip_tags($m->deskripsi), 20); ?>
                            </p>
                            <div class="mt-auto">
                                <?php if (!empty($m->file)) : ?>
                                    <a href="<?= base_url('uploads/materi/'.$m->file); ?>" 
                                       class="btn btn-sm btn-info" target="_blank">
                                       Download Materi
                                    </a>
                                <?php else: ?>
                                    <span class="badge bg-secondary">Belum ada file</span>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php else : ?>
        <div class="alert alert-info text-center">
            Belum ada materi untuk kelas ini.
        </div>
    <?php endif; ?>
    		<div class="row justify-content-center mt-5">
			<div class="col-lg-10 text-center">
				<a href="<?= site_url('akademik/materi'); ?>" class="btn btn-outline-secondary">
					← Kembali ke Daftar Materi Pelajaran
				</a>
			</div>
		</div>
</div>
