<div class="container mt-5 mb-5">
    <h2 class="text-center mb-4">Kontak Kami</h2>

    <?php if (!empty($kontak)): ?>
        <div class="row">
             <!-- Info Kontak + Form -->
            <div class="col-md-6" data-aos="fade-right" data-aos-delay="100">
                <div class="card card-custom shadow-lg h-100">
                    <div class="card-body p-4">

                        <h5 class="section-title">📍 Alamat</h5>
                        <p class="text-muted"><?= $kontak->alamat ?></p>

                        <h5 class="section-title mt-4">📞 Telepon</h5>
                        <p class="text-muted"><?= $kontak->telepon ?></p>

                        <h5 class="section-title mt-4">📧 Email</h5>
                        <p class="text-muted"><?= $kontak->email ?></p>

                        <h5 class="section-title mt-4 mb-3">✉️ Kirim Saran</h5>

                        <form action="<?= base_url('kontak/kirim_saran') ?>" method="POST">

                            <div class="mb-3">
                                <label class="form-label">Nama</label>
                                <input type="text" name="nama" class="form-control form-control-custom" placeholder="Masukkan nama Anda" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Email Anda</label>
                                <input type="email" name="email_pengirim" class="form-control form-control-custom" placeholder="contoh@gmail.com" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Pesan / Saran</label>
                                <textarea name="pesan" class="form-control form-control-custom" rows="4" placeholder="Tulis saran Anda di sini..." required></textarea>
                            </div>

                            <button type="submit" class="btn btn-submit w-100">
                                Kirim Saran
                            </button>

                        </form>

                    </div>
                </div>
            </div>

            <!-- Peta Lokasi -->
            <div class="col-md-6">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Lokasi</h5>
                        <?php if (!empty($kontak->maps)): ?>
                            <iframe 
                                src="<?= $kontak->maps ?>" 
                                width="100%" 
                                height="300" 
                                style="border:0;" 
                                allowfullscreen 
                                loading="lazy" 
                                referrerpolicy="no-referrer-when-downgrade">
                            </iframe>
                        <?php else: ?>
                            <p>Lokasi belum tersedia.</p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    <?php else: ?>
        <div class="alert alert-warning">Data kontak belum diisi.</div>
    <?php endif; ?>
</div>
