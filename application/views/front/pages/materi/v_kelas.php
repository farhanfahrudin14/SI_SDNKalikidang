<div class="container my-5">
    <h2 class="text-center mb-4">Daftar Materi Pelajaran</h2>
    <div class="row">
        <?php for ($i = 1; $i <= 6; $i++): ?>
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm h-100 text-center">
                    <div class="card-body d-flex flex-column">
                        <h4 class="card-title">Kelas <?= $i ?></h4>
                        <p class="card-text">Materi untuk Kelas <?= $i ?></p>
                        <div class="mt-auto">
                            <a href="<?= site_url('akademik/materi_kelas/'.$i) ?>" 
                               class="btn btn-primary">
                               Lihat Materi
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        <?php endfor; ?>
    </div>
</div>
