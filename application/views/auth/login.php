<?php $this->load->view('auth/templates/header') ?>

<main class="container d-flex align-items-center justify-content-center" style="min-height: 100vh;">
   <div class="row w-100">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
         <div class="card card-signin shadow-sm">
            <div class="card-body">
               <h5 class="card-title text-center mb-4">LOGIN</h5>

               <!-- Alert Notifikasi -->
               <div class="row">
                  <div class="col">
                     <?php if($this->session->flashdata('message')) : ?>
                        <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
                           <?= $this->session->flashdata('message') ?>
                           <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                     <?php endif ?>
                  </div>
               </div>

               <?= form_open("auth/login", ["class" => "form-signin"]) ?>
                  
                  <!-- Email -->
                  <div class="form-label-group mb-3">
                     <input type="text" name="identity" class="form-control" id="inputEmail" placeholder="Email" required autofocus>  
                     <label for="inputEmail">Email</label>
                  </div>

                  <!-- Password + Icon Mata -->
                  <div class="form-label-group position-relative mb-3">
                     <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
                     <label for="inputPassword">Password</label>
                     <span class="position-absolute" 
                           style="right: 15px; top: 50%; transform: translateY(-50%); cursor: pointer;" 
                           onclick="togglePassword('inputPassword', this)">
                        <i class="fa fa-eye"></i>
                     </span>
                  </div>

                  <!-- Dropdown Role -->
                  <div class="form-label-group mb-3">
                     <select name="role" class="form-control" required>
                        <option value="admin">Login sebagai Admin</option>
                        <option value="Guru">Login sebagai Guru</option>
                     </select>
                  </div>

                  <!-- Submit -->
                  <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Sign In</button>

                  <hr class="my-4">

                  <!-- Forgot Password -->
                  <div class="text-center mt-1">
                     <a href="<?= base_url('auth/forgot_password') ?>">Forgot Your Password ? </a> 
                  </div>
                  
               <?= form_close() ?>
            </div>
         </div>
      </div>
   </div>
</main>

<!-- JS Toggle Password -->
<script>
function togglePassword(fieldId, el) {
   const input = document.getElementById(fieldId);
   const icon = el.querySelector("i");

   if (input.type === "password") {
      input.type = "text";
      icon.classList.remove("fa-eye");
      icon.classList.add("fa-eye-slash");
   } else {
      input.type = "password";
      icon.classList.remove("fa-eye-slash");
      icon.classList.add("fa-eye");
   }
}
</script>

<?php $this->load->view('auth/templates/footer') ?>
