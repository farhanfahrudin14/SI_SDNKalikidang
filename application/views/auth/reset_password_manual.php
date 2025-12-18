<?php $this->load->view('auth/templates/header') ?>

<main class="container d-flex align-items-center justify-content-center" style="min-height: 100vh;">
   <div class="row w-100">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
         <div class="card card-signin shadow-sm">
            <div class="card-body">
               <h5 class="card-title text-center mb-4">Reset Password</h5>

               <!-- Alert -->
               <div class="row">
                  <div class="col">
                     <?php if($this->session->flashdata('success')) : ?>
                        <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
                           <?= $this->session->flashdata('success') ?>
                           <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                 <span aria-hidden="true">&times;</span>
                           </button>   
                        </div>
                     <?php elseif($this->session->flashdata('error')) : ?>
                        <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
                           <?= $this->session->flashdata('error') ?>
                           <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                 <span aria-hidden="true">&times;</span>
                           </button>   
                        </div>
                     <?php endif ?>
                  </div>
               </div>

               <p class="text-center"><strong>Email:</strong> <?= $user->email ?></p>

               <?= form_open("", ["class" => "form-signin"]) ?>

                  <!-- Password Baru -->
                  <div class="form-label-group position-relative mb-3">
                     <input type="password" name="new" id="newPassword" class="form-control" placeholder="Password Baru" required>
                     <label for="newPassword">Password Baru</label>
                     <span class="position-absolute" 
                           style="right: 15px; top: 50%; transform: translateY(-50%); cursor: pointer;" 
                           onclick="togglePassword('newPassword', this)">
                        <i class="fa fa-eye"></i>
                     </span>
                  </div>

                  <!-- Konfirmasi Password -->
                  <div class="form-label-group position-relative mb-3">
                     <input type="password" name="new_confirm" id="confirmPassword" class="form-control" placeholder="Konfirmasi Password" required>
                     <label for="confirmPassword">Konfirmasi Password</label>
                     <span class="position-absolute" 
                           style="right: 15px; top: 50%; transform: translateY(-50%); cursor: pointer;" 
                           onclick="togglePassword('confirmPassword', this)">
                        <i class="fa fa-eye"></i>
                     </span>
                  </div>

                  <!-- Submit -->
                  <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Simpan Password</button>

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
