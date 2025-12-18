<?php
// Tentukan grup user sesuai nama di database
$isAdmin       = $this->ion_auth->in_group('admin');
$isAdminBiasa  = $this->ion_auth->in_group('admin_biasa');
$isGuru        = $this->ion_auth->in_group('Guru');
?>

<div class="container-fluid">

   <!-- Page Heading -->
   <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">
         <?= $isGuru ? 'Dashboard Guru' : ($isAdminBiasa ? 'Dashboard Admin Biasa' : 'Dashboard Admin'); ?>
      </h1>
   </div>

   <!-- Alert -->
   <div class="row">
      <div class="col">
         <?php if ($this->session->flashdata('message')) : ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
               <?= $this->session->flashdata('message'); ?>
               <button type="button" class="close" data-dismiss="alert">
                  <span>&times;</span>
               </button>
            </div>
         <?php endif; ?>
      </div>
   </div>

   <!-- Content Row -->
   <div class="row">

      <!-- Selamat Datang (ADMIN, ADMIN_BIASA & GURU) -->
      <div class="col-xl-3 col-md-6 mb-4">
         <div class="card border-left-danger shadow h-100 py-2">
            <div class="card-body">
               <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                     <div class="text-s font-weight-bold text-danger text-uppercase mb-1">
                        Selamat Datang
                     </div>
                     <div class="h6 mb-0 font-weight-bold text-gray-800">
    <?= $this->ion_auth->user()->row()->first_name ?>
    <?= $this->ion_auth->user()->row()->last_name ?>
</div>

                  </div>
                  <div class="col-auto">
                     <i class="fas fa-smile-wink fa-3x text-gray-300"></i>
                  </div>
               </div>
            </div>
         </div>
      </div>

      <!-- Banner (ADMIN & ADMIN_BIASA) -->
      <?php if ($isAdmin || $isAdminBiasa) : ?>
      <div class="col-xl-3 col-md-6 mb-4">
         <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
               <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                     <div class="text-s font-weight-bold text-primary text-uppercase mb-1">
                        Banner
                     </div>
                     <div class="h mb-0 font-weight-bold text-gray-800">
                        <?= $total_banner ?? 0; ?>
                     </div>
                  </div>
                  <div class="col-auto">
                     <i class="fas fa-desktop fa-3x text-gray-300"></i>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <?php endif; ?>

      <!-- Fasilitas (ADMIN & ADMIN_BIASA) -->
      <?php if ($isAdmin || $isAdminBiasa) : ?>
      <div class="col-xl-3 col-md-6 mb-4">
         <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
               <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                     <div class="text-s font-weight-bold text-success text-uppercase mb-1">
                        Fasilitas
                     </div>
                     <div class="h mb-0 font-weight-bold text-gray-800">
                        <?= $total_fasilitas ?? 0; ?>
                     </div>
                  </div>
                  <div class="col-auto">
                     <i class="fas fa-place-of-worship fa-3x text-gray-300"></i>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <?php endif; ?>

      <!-- Berita (ADMIN, ADMIN_BIASA & GURU) -->
      <div class="col-xl-3 col-md-6 mb-4">
         <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
               <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                     <div class="text-s font-weight-bold text-warning text-uppercase mb-1">
                        Berita
                     </div>
                     <div class="h mb-0 font-weight-bold text-gray-800">
                        <?= $total_berita ?? 0; ?>
                     </div>
                  </div>
                  <div class="col-auto">
                     <i class="fas fa-newspaper fa-3x text-gray-300"></i>
                  </div>
               </div>
            </div>
         </div>
      </div>

      <!-- Materi Pelajaran (GURU) -->
      <?php if ($isGuru) : ?>
      <div class="col-xl-3 col-md-6 mb-4">
         <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
               <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                     <div class="text-s font-weight-bold text-info text-uppercase mb-1">
                        Materi Pelajaran
                     </div>
                     <div class="h mb-0 font-weight-bold text-gray-800">
                        <?= $total_materi ?? 0; ?>
                     </div>
                  </div>
                  <div class="col-auto">
                     <i class="fas fa-book fa-3x text-gray-300"></i>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <?php endif; ?>

   </div>

   <!-- Chart Total Postingan Bulanan (ADMIN & ADMIN_BIASA) -->
   <?php if ($isAdmin || $isAdminBiasa) : ?>
   <div class="row">
      <div class="col-xl-12">
         <div class="card shadow mb-4">
            <div class="card-header py-3">
               <h6 class="m-0 font-weight-bold text-primary">
                  Total Postingan Bulanan
               </h6>
            </div>
            <div class="card-body">
               <div class="chart-area">
                  <canvas id="myAreaChart" height="100"></canvas>
               </div>
            </div>
         </div>
      </div>
   </div>
   <?php endif; ?>

</div>
