<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0"><?= $title ?></h4>
        </div>
        <div class="card-body">

            <!-- Tombol Tambah Kontak hanya muncul jika belum ada data -->
            <?php if (empty($kontak)): ?>
                <a href="<?= site_url('c_kontak/create') ?>" class="btn btn-success mb-3">
                    + Tambah Kontak
                </a>
            <?php endif; ?>

            <!-- Flash Message -->
            <?php if($this->session->flashdata('success')): ?>
                <div class="alert alert-success"><?= $this->session->flashdata('success') ?></div>
            <?php elseif($this->session->flashdata('error')): ?>
                <div class="alert alert-danger"><?= $this->session->flashdata('error') ?></div>
            <?php endif; ?>

            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead class="table-light">
                        <tr>
                            <th style="width:50px;">No</th>
                            <th>Alamat</th>
                            <th>Telepon</th>
                            <th>Email</th>
                            <th>Maps</th>
                            <th style="width:180px;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($kontak)): ?>
                            <?php $no=1; foreach ($kontak as $k): ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $k->alamat ?></td>
                                <td><?= $k->telepon ?></td>
                                <td><?= $k->email ?></td>
                                <td>
                                    <?php if (!empty($k->maps)): ?>
                                        <iframe 
                                            src="<?= htmlspecialchars($k->maps) ?>" 
                                            width="250" 
                                            height="150" 
                                            style="border:0;" 
                                            allowfullscreen 
                                            loading="lazy" 
                                            referrerpolicy="no-referrer-when-downgrade">
                                        </iframe>
                                    <?php else: ?>
                                        -
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <a href="<?= site_url('c_kontak/edit/'.$k->id) ?>" class="btn btn-sm btn-warning">Edit</a>
                                    <a href="<?= site_url('c_kontak/delete/'.$k->id) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus data ini?')">Hapus</a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="6" class="text-center">Belum ada data kontak.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
