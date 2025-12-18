<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0"><?= $title ?></h4>
        </div>
        <div class="card-body">
            <a href="<?= site_url('c_guru/create') ?>" class="btn btn-success mb-3">
                + Tambah Guru
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
                            <th>Foto</th>
                            <th>Nama</th>
                            <th>NIP</th>
                            <th>Jabatan</th>
                            <th style="width:180px;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no=1; foreach ($guru as $g): ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td>
                                <?php if (!empty($g->foto)): ?>
                                    <img src="<?= base_url('uploads/guru/'.$g->foto) ?>" width="80" class="img-thumbnail">
                                <?php endif; ?>
                            </td>
                            <td><?= $g->nama ?></td>
                            <td><?= $g->nip ?: '-' ?></td>
                            <td><?= $g->jabatan ?></td>
                            <td>
    <?php if($this->ion_auth->is_admin()): ?>
        <a href="<?= site_url('c_guru/edit/'.$g->id) ?>" class="btn btn-sm btn-warning">Edit</a>
        <a href="<?= site_url('c_guru/delete/'.$g->id) ?>" class="btn btn-sm btn-danger">Hapus</a>
    <?php endif; ?>
</td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
