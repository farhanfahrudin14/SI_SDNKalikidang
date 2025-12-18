<!-- ====== HEADER ATAS MODERN ====== -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">


<style>
  /* Header modern */
  /* ======================================
   🔵 TOP HEADER MODERN
====================================== */
.top-header {
  background: linear-gradient(90deg, #0d6efd, #0a58ca);
  color: white;
  padding: 6px 0;
  font-size: 0.9rem;
}

/* ================================
   🔵 MARQUEE TEXT
================================ */
.marquee-modern {
  overflow: hidden;
  position: relative;
  white-space: nowrap;
  min-width: 200px;
  margin-right: 20px;
  max-width: 60%;
}
.marquee-modern span {
  display: inline-block;
  padding-left: 100%;
  animation: marqueeMove 12s linear infinite;
}
@keyframes marqueeMove {
  from { transform: translateX(0); }
  to { transform: translateX(-100%); }
}

/* ================================
   🔵 NAVBAR MODERN
================================ */
.navbar-modern {
  box-shadow: 0 2px 10px rgba(0,0,0,0.08);
  transition: 0.3s;
}
.navbar-modern .nav-link {
  font-weight: 500;
  padding: 12px 18px;
  color: #333;
  transition: 0.25s;
}
.navbar-modern .nav-link:hover {
  color: #0d6efd;
}
.navbar-modern .active > .nav-link {
  color: #0d6efd !important;
  font-weight: 600;
}

/* ========================================
   ❌ Hilangkan underline nav-link biasa
======================================== */
.navbar-modern .nav-item .nav-link:not(.dropdown-toggle)::after {
  display: none !important;
}

/* ========================================
   🔽 PANAH DROPDOWN
======================================== */
.navbar .dropdown-toggle::after {
  font-family: "bootstrap-icons";
  content: "\f282"; /* bi-chevron-down */
  font-weight: normal;
  border: none !important;
  margin-left: 6px;
  font-size: 0.85rem;
  vertical-align: middle;
  transition: transform 0.25s ease;
  display: inline-block;
}

/* 🔄 Panah berputar saat dropdown terbuka */
.navbar .dropdown.show .dropdown-toggle::after {
  transform: rotate(180deg);
}

/* ========================================
   🔽 DROPDOWN ANIMATION
======================================== */
.dropdown-menu {
  border-radius: 10px;
  padding: 10px 0;
  border: none;
  box-shadow: 0 10px 25px rgba(0,0,0,0.08);
  animation: dropdownFade 0.25s ease;
}
@keyframes dropdownFade {
  from { opacity: 0; transform: translateY(10px); }
  to { opacity: 1; transform: translateY(0); }
}
.dropdown-item {
  padding: 10px 20px;
}
.dropdown-item:hover {
  background: #eef5ff;
  color: #0d6efd;
}

/* ========================================
   🔵 LOGO
======================================== */
.navbar-brand img {
  max-height: 70px;
  transition: 0.3s;
}
.navbar-brand img:hover {
  transform: scale(1.05);
}

/* ========================================
   📱 MOBILE RESPONSIVE
======================================== */
@media (max-width: 768px) {
  .marquee-modern { display: none !important; }
}

</style>

<!-- ====== HEADER ====== -->
<div class="top-header">
  <div class="container d-flex justify-content-between align-items-center flex-wrap">

    <div class="marquee-modern flex-grow-1">
      <span>Selamat datang di Website SD Negeri Kalikidang — Mari belajar dan berprestasi bersama!</span>
    </div>

    <div class="d-flex align-items-center mt-1 mt-md-0" style="gap: 1.2rem; flex-wrap: nowrap;">
      
      <div class="d-flex align-items-center" style="gap:5px;">
        <i class="bi bi-clock-history"></i>
        <span id="header-jam" class="fw-semibold"></span>
      </div>

      <span class="text-white">|</span>

      <div>
        <a href="tel:081234567890" class="text-white text-decoration-none">
          <i class="bi bi-telephone"></i> 0812-3456-7890
        </a>
      </div>

      <span class="text-white">|</span>

      <div>
        <a href="mailto:info@sdnkalikidang.sch.id" class="text-white text-decoration-none">
          <i class="bi bi-envelope"></i> sdkalikidang2021@gmail.com
        </a>
      </div>

    </div>

  </div>
</div>

<!-- ====== NAVBAR ====== -->
<nav class="navbar navbar-expand-lg navbar-light bg-white navbar-modern sticky-top">
  <div class="container">
    
    <!-- LOGO -->
    <a class="navbar-brand d-flex align-items-center" href="<?= base_url() ?>">
      <img src="<?= base_url('img/identitas/kalikidang.png') ?>" alt="Logo">
    </a>

    <!-- TOGGLER -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- MENU -->
    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
      <ul class="navbar-nav">

        <!-- BERANDA -->
        <li class="nav-item <?= ($title=='Beranda')?'active':'' ?>">
          <a class="nav-link" href="<?= base_url() ?>">Beranda</a>
        </li>

        <!-- PROFIL -->
        <li class="nav-item dropdown <?= (
            $title=='Sejarah' || 
            $title=='Visi & Misi' || 
            $title=='Struktur' || 
            $title=='Fasilitas' || 
            $title=='Data Guru'
          )?'active':'' ?>">
          
          <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">
            Profil
          </a>

          <div class="dropdown-menu">
            <a class="dropdown-item" href="<?= base_url('profil/sejarah') ?>">Sejarah</a>
            <a class="dropdown-item" href="<?= base_url('profil/visimisi') ?>">Visi & Misi</a>
            <a class="dropdown-item" href="<?= base_url('profil/struktur') ?>">Struktur</a>
            <a class="dropdown-item" href="<?= base_url('profil/fasilitas') ?>">Fasilitas</a>
            <a class="dropdown-item" href="<?= base_url('profil/guru') ?>">Guru</a>
          </div>
        </li>

        <!-- AKADEMIK -->
        <li class="nav-item dropdown <?= (
            $title=='Materi Pelajaran' || 
            $title=='Ekstrakurikuler' || 
            $title=='Prestasi'
          )?'active':'' ?>">
          
          <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">
            Akademik
          </a>

          <div class="dropdown-menu">
            <a class="dropdown-item" href="<?= site_url('akademik/materi') ?>">Materi Pelajaran</a>
            <a class="dropdown-item" href="<?= site_url('akademik/ekskul') ?>">Ekstrakurikuler</a>
            <a class="dropdown-item" href="<?= site_url('akademik/prestasi') ?>">Prestasi</a>
          </div>
        </li>

        <!-- BERITA -->
        <li class="nav-item <?= ($title=='Berita')?'active':'' ?>">
          <a class="nav-link" href="<?= base_url('blog') ?>">Berita</a>
        </li>

        <!-- GALERI -->
        <li class="nav-item <?= ($title=='Galeri Kegiatan Sekolah')?'active':'' ?>">
          <a class="nav-link" href="<?= base_url('galeri') ?>">Galeri</a>
        </li>

        <!-- PPDB -->
        <li class="nav-item <?= ($title=='PPDB')?'active':'' ?>">
          <a class="nav-link" href="<?= base_url('ppdb') ?>">PPDB</a>
        </li>

        <!-- KONTAK -->
        <li class="nav-item <?= ($title=='Kontak')?'active':'' ?>">
          <a class="nav-link" href="<?= site_url('kontak') ?>">Kontak</a>
        </li>

      </ul>
    </div>
  </div>
</nav>


<!-- ====== SCRIPT JAM ====== -->
<script>
function updateJam() {
  const now = new Date();
  document.getElementById('header-jam').innerText =
    now.toLocaleTimeString('id-ID', { hour12: false });
}
setInterval(updateJam, 1000);
updateJam();
</script>
