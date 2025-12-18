<div class="card shadow-sm">
    <div class="card-body">
        <h2 class="mb-4"><?= $title ?></h2>
        <a href="<?= site_url('c_prestasi/create') ?>" class="btn btn-primary mb-3">+ Tambah Prestasi</a>

        <?php if ($this->session->flashdata('success')): ?>
            <div class="alert alert-success"><?= $this->session->flashdata('success') ?></div>
        <?php elseif ($this->session->flashdata('error')): ?>
            <div class="alert alert-danger"><?= $this->session->flashdata('error') ?></div>
        <?php endif; ?>

        <div class="table-responsive">
            <table class="table table-bordered align-middle">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Judul</th>
                        <th>Deskripsi</th>
                        <th>Foto</th>
                        <th>Aktif</th>
                        <th>Diupload</th>
                        <th width="180">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($prestasi)) : ?>
                        <?php $no=1; foreach ($prestasi as $p) : ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $p->judul ?></td>
                            <td><?= word_limiter($p->deskripsi, 15) ?></td>
                            <td>
                                <?php if ($p->foto): ?>
                                    <img src="<?= base_url('uploads/prestasi/'.$p->foto) ?>" width="100" class="img-thumbnail">
                                <?php else: ?>
                                    <span class="text-muted">Tidak ada</span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <?php if ($p->aktif == 'Y'): ?>
                                    <span class="badge bg-success">Aktif</span>
                                <?php else: ?>
                                    <span class="badge bg-secondary">Tidak</span>
                                <?php endif; ?>
                            </td>
                            <td><?= $p->diupload ?></td>
                            <td>
                                <a href="<?= site_url('c_prestasi/edit/'.$p->id) ?>" class="btn btn-warning btn-sm">Edit</a>
                                <a href="<?= site_url('c_prestasi/destroy/'.$p->id) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus prestasi ini?')">Hapus</a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <tr><td colspan="7" class="text-center">Belum ada data</td></tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
