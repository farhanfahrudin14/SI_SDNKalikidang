<div class="blog mt-5 mb-5">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-10">
				<h1 class="text-center"><?= $prestasi->judul; ?></h1>
			</div>
		</div>

		<div class="row justify-content-center mt-4">
			<div class="col-lg-10">
				<div class="text-muted mt-3">
    <small>Diunggah pada <?= date('d M Y', strtotime($prestasi->diupload)); ?></small>
</div>


				<?php if (!empty($prestasi->foto)) : ?>
					<img src="<?= base_url('uploads/prestasi/' . $prestasi->foto); ?>" 
					     alt="<?= $prestasi->judul; ?>" 
					     class="img-fluid rounded shadow-sm">
				<?php endif; ?>
			</div>
		</div>

		<div class="row justify-content-center mt-4 konten">
			<div class="col-lg-10" style="line-height: 1.8; font-size: 1.05rem; text-align: justify;">
				<?= nl2br($prestasi->deskripsi); ?>
			</div>
		</div>

		<div class="row justify-content-center mt-5">
			<div class="col-lg-10 text-center">
				<a href="<?= site_url('akademik/prestasi'); ?>" class="btn btn-outline-secondary">
					← Kembali ke Daftar Prestasi
				</a>
			</div>
		</div>
	</div>
</div>
