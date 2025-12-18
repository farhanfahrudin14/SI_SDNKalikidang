<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0"><?= htmlspecialchars($title) ?></h4>
        </div>
        <div class="card-body">

            <a href="<?= site_url('c_berita/create') ?>"
               class="btn btn-success mb-3">
                + Tambah
            </a>

            <!-- FLASH MESSAGE -->
            <?php if ($this->session->flashdata('success')) : ?>
                <div class="alert alert-success">
                    <?= $this->session->flashdata('success') ?>
                </div>
            <?php elseif ($this->session->flashdata('error')) : ?>
                <div class="alert alert-danger">
                    <?= $this->session->flashdata('error') ?>
                </div>
            <?php endif; ?>

            <div class="table-responsive">
                <table class="table table-bordered table-striped align-middle">
                    <thead class="table-light text-center">
                        <tr>
                            <th width="50">No</th>
                            <th>Judul</th>
                            <th width="120">Thumbnail</th>
                            <th>Penulis</th>
                            <th width="120">Tanggal</th>
                            <th width="150">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($berita)) : ?>
                            <?php $no = 1; foreach ($berita as $b) : ?>
                            <tr>
                                <!-- NO -->
                                <td class="text-center"><?= $no++ ?></td>

                                <!-- JUDUL -->
                                <td><?= htmlspecialchars($b->title) ?></td>

                                <!-- THUMBNAIL -->
                                <td class="text-center">
                                    <?php if (!empty($b->photo)) : ?>
                                        <img src="<?= base_url('img/berita/thumbs/'.$b->photo) ?>"
                                             width="80"
                                             class="img-thumbnail">
                                    <?php else : ?>
                                        <small class="text-muted">Tidak ada</small>
                                    <?php endif; ?>
                                </td>

                                <!-- PENULIS -->
                                <td>
    <?= htmlspecialchars($b->first_name . ' ' . $b->last_name) ?><br>

    <?php if ($b->role === 'admin') : ?>
        <span class="badge bg-primary">Admin</span>

    <?php elseif ($b->role === 'admin_biasa') : ?>
        <span class="badge bg-warning text-dark">Admin Biasa</span>

    <?php elseif ($b->role === 'Guru') : ?>
        <span class="badge bg-success">Guru</span>

    <?php else : ?>
        <span class="badge bg-secondary">User</span>
    <?php endif; ?>
</td>


                                <!-- TANGGAL -->
                                <td class="text-center">
                                    <?= date('d-m-Y', strtotime($b->date)) ?>
                                </td>

                                <!-- AKSI -->
                                <td class="text-center">
                                    <a href="<?= site_url('c_berita/edit/'.$b->id) ?>"
                                       class="btn btn-sm btn-warning mb-1">
                                        Edit
                                    </a>

                                    <a href="<?= site_url('c_berita/destroy/'.$b->id) ?>"
                                       class="btn btn-sm btn-danger mb-1"
                                       onclick="return confirm('Yakin hapus data ini?')">
                                        Hapus
                                    </a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        <?php else : ?>
                        <tr>
                            <td colspan="6" class="text-center text-muted">
                                Data belum tersedia
                            </td>
                        </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>
