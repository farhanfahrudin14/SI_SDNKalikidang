<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
   <!-- Bootstrap -->
   <link rel="stylesheet" href="<?= base_url('asset/vendor/bootstrap/css/bootstrap.min.css') ?>">
   <!-- Font Awesome -->
   <link rel="stylesheet" href="<?= base_url('asset/vendor/fontawesome-free/css/all.min.css') ?>">
   <!-- Custom Css -->
   <link rel="stylesheet" href="<?= base_url('asset/css/style.css') ?>">

   <!-- Favicon -->
   <link rel="shortcut icon" type="image/png" href="<?= base_url('asset/logo.png') ?>"/>
   
   <title><?= $title ?> - SD Negeri Kalikidang</title>
</head>
<body>

   <!-- Navbar -->
   <?php $this->load->view('front/layouts/_navbar'); ?>
   <!-- End of Navbar -->

   <!-- Content -->
   <?php $this->load->view('front/pages/' . $page); ?>
   <!-- End of Content -->
   
   <!-- Footer -->
   <?php $this->load->view('front/layouts/_footer'); ?>
   <!-- End of Footer -->

   <!-- Jquery -->
   <script src="<?= base_url('asset/vendor/jquery/jquery.min.js') ?>"></script>
   <script src="<?= base_url('asset/vendor/bootstrap/js/bootstrap.min.js') ?>"></script>
</body>
</html>
