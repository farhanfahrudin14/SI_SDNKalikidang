<div class="container py-4">
  <h2 class="mb-4 text-center fw-semibold">Daftar Fasilitas</h2>

  <?php if (!empty($fasilitas)) : ?>
    <div class="row g-3">
      <?php foreach ($fasilitas as $f) : ?>
        <div class="col-12 col-sm-6 col-md-4 mb-3">
          <div class="card h-100 border rounded-4 shadow-sm d-flex flex-column justify-content-between hover-card">

            <?php if (!empty($f->photo)) : ?>
              <img src="<?= base_url('img/fasilitas/' . $f->photo); ?>"
                   alt="<?= $f->name; ?>"
                   class="card-img-top rounded-top-4">
            <?php endif; ?>

            <div class="card-body text-center d-flex flex-column px-3" style="padding-top: 1.5rem; padding-bottom: 1rem;">
              <h6 class="card-title fw-semibold mb-2"><?= $f->name; ?></h6>
              <p class="card-text text-muted small flex-grow-1 mb-0" style="font-size: 13px;">
                <?= word_limiter(strip_tags($f->description), 18); ?>
              </p>
            </div>

            <div class="card-footer bg-transparent border-0 text-center mt-auto pb-3">
              <a href="<?= site_url('profil/fasilitas_detail/' . $f->id); ?>"
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
      Belum ada data fasilitas yang ditambahkan.
    </div>
  <?php endif; ?>
</div>

<style>
/* Efek hover halus */
.hover-card {
  transition: all 0.25s ease;
}
.hover-card:hover {
  transform: translateY(-3px);
  box-shadow: 0 6px 15px rgba(0,0,0,0.08);
}

/* Card dan gambar */
.card {
  border-radius: 10px;
}

/* Gambar lebih besar dan responsif */
.card-img-top {
  height: 250px; /* ubah sesuai selera: 220–300px */
  object-fit: cover;
  border-top-left-radius: 10px;
  border-top-right-radius: 10px;
}

/* Card body */
.card-body {
  text-align: center;
  display: flex;
  flex-direction: column;
  justify-content: flex-start; /* teks tetap di atas */
  /* padding-top sudah diatur inline agar mudah disesuaikan */
}

/* Judul & deskripsi */
.card-title {
  margin: 0 0 0.5rem 0; /* hapus margin-top agar card tidak memanjang */
}

.card-text {
  margin: 0; /* hapus margin-top */
  font-size: 13px;
}

/* Jarak antar baris kartu */
.row.g-3 {
  row-gap: 1.5rem;
}

/* Responsif untuk layar kecil */
@media (max-width: 576px) {
  .card-img-top {
    height: 220px;
  }
}
</style>
