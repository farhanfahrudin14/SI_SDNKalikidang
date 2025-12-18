<div class="container py-4">
  <h2 class="mb-4 text-center fw-semibold">Daftar Ekstrakurikuler</h2>

  <?php if (!empty($ekskul)) : ?>
    <div class="row g-3">
      <?php foreach ($ekskul as $e) : ?>
        <div class="col-12 col-sm-6 col-md-4 mb-3">
          <div class="card h-100 border rounded-4 shadow-sm d-flex flex-column justify-content-between hover-card">

            <?php if (!empty($e->foto)) : ?>
              <img src="<?= base_url('uploads/ekskul/' . $e->foto); ?>"
                   alt="<?= $e->judul; ?>"
                   class="card-img-top rounded-top-4">
            <?php endif; ?>

            <div class="card-body text-center d-flex flex-column px-3" style="padding-top: 1.5rem; padding-bottom: 1rem;">
              <h6 class="card-title fw-semibold mb-2"><?= $e->judul; ?></h6>
              <p class="card-text text-muted small flex-grow-1 mb-0" style="font-size: 13px;">
                <?= word_limiter(strip_tags($e->deskripsi), 18); ?>
              </p>
            </div>

            <div class="card-footer bg-transparent border-0 text-center mt-auto pb-3">
              <a href="<?= site_url('akademik/ekskul_detail/' . $e->id); ?>"
                 class="btn btn-outline-primary rounded-pill px-3 py-1" style="font-size: 13px;">
                <i class="bi bi-eye"></i> Lihat Detail
              </a>
            </div>

          </div>
        </div>
      <?php endforeach; ?>
    </div>
  <?php else : ?>
    <div class="alert alert-info text-center mt-4">
      Belum ada data ekstrakurikuler.
    </div>
  <?php endif; ?>
</div>

<style>
.hover-card {
  transition: all 0.25s ease;
}
.hover-card:hover {
  transform: translateY(-3px);
  box-shadow: 0 6px 15px rgba(0,0,0,0.08);
}
.card {
  border-radius: 10px;
}
.card-img-top {
  height: 250px;
  object-fit: cover;
  border-top-left-radius: 10px;
  border-top-right-radius: 10px;
}
.card-body {
  text-align: center;
  display: flex;
  flex-direction: column;
  justify-content: flex-start;
}
.card-title {
  margin: 0 0 0.5rem 0;
}
.card-text {
  margin: 0;
  font-size: 13px;
}
.row.g-3 {
  row-gap: 1.5rem;
}
@media (max-width: 576px) {
  .card-img-top {
    height: 220px;
  }
}
</style>
