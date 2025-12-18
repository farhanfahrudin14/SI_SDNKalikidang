<?php $this->load->view('auth/templates/header'); ?>

<div class="container mt-5" style="background-color:#003399; padding:25px; border-radius:10px;">
    <div class="row justify-content-center">
        <div class="col-md-6">

            <h3 class="mb-3 text-center text-white"><?= lang('create_user_heading'); ?></h3>
            <p class="text-center text-light"><?= lang('create_user_subheading'); ?></p>

            <?php if ($message): ?>
                <div class="alert alert-danger">
                    <?= $message; ?>
                </div>
            <?php endif; ?>

            <?= form_open("auth/create_user"); ?>

            <div class="form-group">
                <?= lang('create_user_fname_label', 'first_name', ['class' => 'text-white']); ?>
                <?= form_input($first_name, '', ['class' => 'form-control', 'placeholder' => 'Masukkan nama depan']); ?>
            </div>

            <div class="form-group">
                <?= lang('create_user_lname_label', 'last_name', ['class' => 'text-white']); ?>
                <?= form_input($last_name, '', ['class' => 'form-control', 'placeholder' => 'Masukkan nama belakang']); ?>
            </div>

            <?php if ($identity_column !== 'email'): ?>
                <div class="form-group">
                    <?= lang('create_user_identity_label', 'identity', ['class' => 'text-white']); ?>
                    <?= form_input($identity, '', ['class' => 'form-control', 'placeholder' => 'Username']); ?>
                    <?= form_error('identity', '<small class="text-warning">', '</small>'); ?>
                </div>
            <?php endif; ?>

            <div class="form-group">
                <?= lang('create_user_company_label', 'company', ['class' => 'text-white']); ?>
                <?= form_input($company, '', ['class' => 'form-control', 'placeholder' => 'Nama perusahaan (opsional)']); ?>
            </div>

            <div class="form-group">
                <?= lang('create_user_email_label', 'email', ['class' => 'text-white']); ?>
                <?= form_input($email, '', ['class' => 'form-control', 'placeholder' => 'Masukkan email']); ?>
            </div>

            <div class="form-group">
                <?= lang('create_user_phone_label', 'phone', ['class' => 'text-white']); ?>
                <?= form_input($phone, '', ['class' => 'form-control', 'placeholder' => 'Masukkan nomor telepon']); ?>
            </div>

            <!-- 🔥 DROPDOWN ROLE YANG BARU AKU TAMBAHKAN -->
            <div class="form-group">
                <label class="text-white">Pilih Role</label>
                <select name="role" class="form-control" required>
                    <option value="">-- Pilih Role --</option>
                    <option value="3">Admin Biasa</option>
                    <option value="4">Guru</option>
                </select>
            </div>
            <!-- END ROLE -->

            <div class="form-group">
                <?= lang('create_user_password_label', 'password', ['class' => 'text-white']); ?>
                <?= form_input($password, '', ['class' => 'form-control', 'placeholder' => 'Password']); ?>
            </div>

            <div class="form-group">
                <?= lang('create_user_password_confirm_label', 'password_confirm', ['class' => 'text-white']); ?>
                <?= form_input($password_confirm, '', ['class' => 'form-control', 'placeholder' => 'Konfirmasi password']); ?>
            </div>

            <button type="submit" class="btn btn-light btn-block">
                <?= lang('create_user_submit_btn'); ?>
            </button>

            <?= form_close(); ?>

        </div>
    </div>
</div>

<?php $this->load->view('auth/templates/footer'); ?>
