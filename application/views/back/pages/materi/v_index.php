<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0"><?= $title ?></h4>
        </div>
        <div class="card-body d-flex justify-content-between align-items-center">
            <!-- Tombol Tambah -->
            <a href="<?= site_url('c_materi/create') ?>" class="btn btn-success">
                + Tambah
            </a>

            <!-- ✅ Filter Kelas (sebelah kanan tombol tambah) -->
            <form method="get" class="d-flex">
                <select name="kelas" class="form-select me-2" onchange="this.form.submit()">
                    <option value="">-- Semua Kelas --</option>
                    <?php for ($i = 1; $i <= 6; $i++): ?>
                        <option value="<?= $i ?>" <?= ($this->input->get('kelas') == $i) ? 'selected' : '' ?>>
                            Kelas <?= $i ?>
                        </option>
                    <?php endfor; ?>
                </select>
                <?php if ($this->input->get('kelas')): ?>
                    <a href="<?= site_url('c_materi') ?>" class="btn btn-secondary">Reset</a>
                <?php endif; ?>
            </form>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead class="table-light">
                        <tr>
                            <th style="width: 50px;">No</th>
                            <th>Judul</th>
                            <th>Deskripsi</th>
                            <th>Kelas</th>
                            <th>File</th>
                            <th style="width: 150px;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($materi)): ?>
                            <?php $no=1; foreach ($materi as $m): ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $m->judul ?></td>
                                <td><?= $m->deskripsi ?></td>
                                <td>
                                    <?php if (!empty($m->kelas)): ?>
                                        Kelas <?= $m->kelas ?>
                                    <?php else: ?>
                                        <span class="text-muted">Belum diatur</span>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <?php if (!empty($m->file)): ?>
                                        <?php if (pathinfo($m->file, PATHINFO_EXTENSION) == 'pdf'): ?>
                                            <a href="<?= base_url('uploads/materi/'.$m->file) ?>" target="_blank" class="btn btn-sm btn-outline-info">Lihat PDF</a>
                                        <?php else: ?>
                                            <img src="<?= base_url('uploads/materi/'.$m->file) ?>" width="80" class="img-thumbnail">
                                        <?php endif; ?>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <a href="<?= site_url('c_materi/edit/'.$m->id) ?>" class="btn btn-sm btn-warning">Edit</a>
                                    <a href="<?= site_url('c_materi/confirm/'.$m->id) ?>" 
   class="btn btn-danger btn-sm">
   Hapus
</a>

                                </td>
                            </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="6" class="text-center">Tidak ada data</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
