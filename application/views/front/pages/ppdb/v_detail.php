<!-- Detail PPDB (Hanya Form) -->
<div class="container mt-5 mb-5">
    <div class="card shadow-lg">
        <div class="card-body">

            <!-- Teks pembuka -->
            <div class="text-center mb-4">
                <h4 class="fw-bold">Formulir Pendaftaran PPDB</h4>
                <p class="text-muted mb-0">
                    Silakan isi formulir pendaftaran melalui form di bawah ini dengan data yang benar dan lengkap.
                </p>
            </div>

            <?php if (!empty($ppdb->link)): ?>
                <?php 
                    // pastikan link sudah format embed
                    $form_url = str_replace('/viewform', '/viewform?embedded=true', $ppdb->link);
                ?>
                <iframe 
                    src="<?= $form_url ?>" 
                    width="100%" 
                    height="1200" 
                    frameborder="0" 
                    marginheight="0" 
                    marginwidth="0" 
                    style="border:0; border-radius:8px; width:100%;">
                    Memuat formulir…
                </iframe>
            <?php else: ?>
                <div class="alert alert-warning text-center">
                    Link formulir belum tersedia.
                </div>
            <?php endif; ?>

            <!-- Tombol kembali -->
            <div class="mt-4 text-center">
                <a href="<?= base_url('ppdb') ?>" class="btn btn-secondary">
                    ← Kembali ke Informasi PPDB
                </a>
            </div>

        </div>
    </div>
</div>
