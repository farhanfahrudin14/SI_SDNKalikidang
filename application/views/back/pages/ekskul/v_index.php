<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0"><?= $title ?></h4>
        </div>
        <div class="card-body">
            <a href="<?= site_url('c_ekskul/create') ?>" class="btn btn-success mb-3">
                + Tambah
            </a>

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
                            <th>Judul</th>
                            <th>Deskripsi</th>
                            <th>Foto</th>
                            <th style="width:150px;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no=1; foreach ($ekskul as $e): ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $e->judul ?></td>
                            <td><?= substr($e->deskripsi, 0, 70) ?>...</td>
                            <td>
                                <?php if (!empty($e->foto)): ?>
                                    <img src="<?= base_url('uploads/ekskul/'.$e->foto) ?>" width="80" class="img-thumbnail">
                                <?php endif; ?>
                            </td>
                            <td>
                                <a href="<?= site_url('c_ekskul/edit/'.$e->id) ?>" class="btn btn-sm btn-warning">Edit</a>
                                <a href="<?= site_url('c_ekskul/delete/'.$e->id) ?>" class="btn btn-sm btn-danger">Hapus</a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
