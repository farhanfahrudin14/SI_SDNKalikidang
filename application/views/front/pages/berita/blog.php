<!--================Home Banner Area =================-->
<div class="jumbotron banner_area jumbotron-fluid"
     style="background-image:url(<?= base_url('img/banner_area/beritabg1.jpg') ?>);">
    <div class="container">
        <h1 class="display-4 text-light text-center">Berita</h1>
    </div>
</div>
<!--================End Home Banner Area =================-->

<!--================ Berita =================-->
<div class="last-news mt-5">
    <div class="container">

        <div class="row mt-4">
            <?php if (!empty($news)) : ?>
                <?php foreach ($news as $n) : ?>

                    <div class="col-lg-3 col-md-6 col-sm-6 mb-4 d-flex">
                        <div class="card shadow-sm w-100">

                            <!-- FOTO -->
                            <?php
                                $thumbPath = FCPATH . 'img/berita/thumbs/' . $n->photo;
                                $thumbUrl  = base_url('img/berita/thumbs/' . $n->photo);
                            ?>

                            <?php if (!empty($n->photo) && file_exists($thumbPath)) : ?>
                                <img src="<?= $thumbUrl ?>"
                                     class="card-img-top"
                                     style="height:150px;object-fit:cover;"
                                     alt="<?= $n->title ?>">
                            <?php else : ?>
                                <img src="<?= base_url('img/no-image.png') ?>"
                                     class="card-img-top"
                                     style="height:150px;object-fit:cover;"
                                     alt="No Image">
                            <?php endif; ?>

                            <!-- BODY -->
                            <div class="card-body d-flex flex-column">
                                <h6 class="card-title font-weight-bold">
                                    <?= character_limiter($n->title, 40) ?>
                                </h6>

                                <p class="card-text text-muted mb-3">
                                    <?= character_limiter(strip_tags($n->content), 60) ?>
                                </p>

                                <a href="<?= base_url('blog/baca/'.$n->seo_title) ?>"
                                   class="btn btn-info btn-sm mt-auto">
                                    Lanjut Membaca
                                    <i class="fa fa-angle-right ml-1"></i>
                                </a>
                            </div>

                        </div>
                    </div>

                <?php endforeach; ?>
            <?php else : ?>
                <div class="col text-center">
                    <p class="text-muted">Belum ada berita.</p>
                </div>
            <?php endif; ?>
        </div>

        <!-- PAGINATION -->
        <?php if (!empty($pagination)) : ?>
            <div class="row mt-5 pb-5">
                <div class="col d-flex justify-content-center">
                    <nav>
                        <?= $pagination ?>
                    </nav>
                </div>
            </div>
        <?php endif; ?>

    </div>
</div>
<!--================ End Berita =================-->
