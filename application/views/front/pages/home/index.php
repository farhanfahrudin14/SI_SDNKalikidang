<!-- Carousel -->
<div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
	<div class="carousel-inner">
		<?php $no = 0;?>
		<?php foreach($banners as $banner) : ?>
			<?php $no++;  ?>
			<div class="carousel-item <?php if($no <= 1) { echo "active"; } ?>">
				<img src="<?= base_url("img/banner/$banner->photo") ?>" class="d-block w-100">
				<div class="carousel-caption d-none d-md-block">
					<h1><?= $banner->title ?></h1>
					<p><?= $banner->text ?></p>
				</div>
			</div>
		<?php endforeach ?>
	</div>
	<a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
		<span class="carousel-control-prev-icon" aria-hidden="true"></span>
		<span class="sr-only">Previous</span>
	</a>
	<a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
		<span class="carousel-control-next-icon" aria-hidden="true"></span>
		<span class="sr-only">Next</span>
	</a>
</div>
<!-- End of Carousel -->

<!-- Sambutan -->
<div class="sambutan mt-5">
    <div class="container">
        <div class="row justify-content-center">
            <!-- Teks Sambutan -->
            <div class="col-lg-9 col-md-8 col-sm-12 col-xs-12">
                <h2 class="mb-3 text-center">Sambutan Kepala Sekolah</h2>
                <hr class="mx-auto" style="width: 200px;">
                <div class="sambutan-content" style="line-height: 1.5; text-align: justify;">
                    <?= nl2br($sambutan->content) ?>
                </div>
            </div>

            <!-- Foto -->
            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-5 text-center">
                <img src="<?= base_url('img/sambutan/' . $sambutan->photo) ?>" 
                     class="img-thumbnail img-fluid shadow-sm rounded">
            </div>
        </div>
    </div>
</div>
<!-- End of Sambutan -->




<!-- Jurusan -->
<div class="jumbotron jumbotron-fluid bg-cover jurusan mt-5" style="background-image: url(<?= base_url('img/background/' . $jurusan->photo) ?>)">
	<div class="container text-center">
		<div class="row">
			<div class="col">
				<h2 class="">Daftar Kelas</h2>
			</div>
		</div>
		<hr>
		<div class="row pt-3">
			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 mb-4 text-center">
    <svg width="100" height="100">
        <circle cx="50" cy="50" r="45" fill="rgba(128,128,128,0.85)" />
        <text x="50%" y="55%" text-anchor="middle" font-size="32" fill="white" font-family="Arial" dy=".3em">I</text>
    </svg>
    <h5 class="mt-2">Kelas I A & B</h5>
</div>

<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 mb-4 text-center">
    <svg width="100" height="100">
        <circle cx="50" cy="50" r="45" fill="rgba(128,128,128,0.85)" />
        <text x="50%" y="55%" text-anchor="middle" font-size="32" fill="white" font-family="Arial" dy=".3em">II</text>
    </svg>
    <h5 class="mt-2">Kelas II A & B</h5>
</div>

<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 mb-4 text-center">
    <svg width="100" height="100">
        <circle cx="50" cy="50" r="45" fill="rgba(128,128,128,0.85)" />
        <text x="50%" y="55%" text-anchor="middle" font-size="32" fill="white" font-family="Arial" dy=".3em">III</text>
    </svg>
    <h5 class="mt-2">Kelas III A & B</h5>
</div>

<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 mb-4 text-center">
    <svg width="100" height="100">
        <circle cx="50" cy="50" r="45" fill="rgba(128,128,128,0.85)" />
        <text x="50%" y="55%" text-anchor="middle" font-size="32" fill="white" font-family="Arial" dy=".3em">IV</text>
    </svg>
    <h5 class="mt-2">Kelas IV A & B</h5>
</div>

<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 mb-4 text-center">
    <svg width="100" height="100">
        <circle cx="50" cy="50" r="45" fill="rgba(128,128,128,0.85)" />
        <text x="50%" y="55%" text-anchor="middle" font-size="32" fill="white" font-family="Arial" dy=".3em">V</text>
    </svg>
    <h5 class="mt-2">Kelas V A & B</h5>
</div>

<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 mb-4 text-center">
    <svg width="100" height="100">
        <circle cx="50" cy="50" r="45" fill="rgba(128,128,128,0.85)" />
        <text x="50%" y="55%" text-anchor="middle" font-size="32" fill="white" font-family="Arial" dy=".3em">VI</text>
    </svg>
    <h5 class="mt-2">Kelas VI A & B</h5>
</div>

		</div>
	</div>
</div>
<!-- End of Jurusan -->

<!-- Berita -->
<div class="last-news mt-5 mb-5">
	<div class="container">
		
		<!-- Judul -->
		<div class="row d-flex justify-content-center">
			<div class="col">
				<h2 class="text-center">Berita Terbaru</h2>
				<hr>
			</div>
		</div>

		<!-- List Berita -->
		<div class="row mt-4 justify-content-center">
			<?php foreach($berita as $b) : ?>
				<div class="col-lg-3 col-md-6 col-sm-6 col-12 mb-4 d-flex justify-content-center">
					<div class="card h-100" style="width: 18rem;">
						<img 
							src="<?= base_url('img/berita/thumbs/' . $b->photo) ?>" 
							class="card-img-top"
							style="height:180px; object-fit:cover;">
						<div class="card-body d-flex flex-column">
							<h5 class="card-title"><?= $b->title ?></h5>
							<p class="card-text"><?= character_limiter($b->content, 50) ?></p>
							<a href="<?= base_url("blog/baca/$b->seo_title") ?>" class="btn btn-info btn-sm mt-auto">
								Lanjut Membaca <i class="fa fa-angle-right ml-2"></i>
							</a>
						</div>
					</div>
				</div>
			<?php endforeach ?>
		</div>

		<!-- Tombol Selengkapnya -->
		<div class="row mt-4">
			<div class="col text-center">
				<a href="<?= base_url('blog') ?>" class="btn btn-secondary text-light">
					Lihat Selengkapnya <i class="fa fa-angle-double-right ml-2"></i>
				</a>
			</div>
		</div>
		
	</div>
</div>
<!-- End of Berita -->

