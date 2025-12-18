<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0"><?= $title ?></h4>
        </div>
        <div class="card-body">
            <a href="<?= site_url('c_galeri/create') ?>" class="btn btn-success mb-3">+ Tambah Foto</a>

            <?php if($this->session->flashdata('success')): ?>
                <div class="alert alert-success"><?= $this->session->flashdata('success') ?></div>
            <?php elseif($this->session->flashdata('error')): ?>
                <div class="alert alert-danger"><?= $this->session->flashdata('error') ?></div>
            <?php endif; ?>

            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead class="table-light">
                        <tr>
                            <th width="50">No</th>
                            <th>Foto</th>
                            <th>Deskripsi</th>
                            <th>Tanggal Upload</th>
                            <th width="180">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no=1; foreach ($galeri as $g): ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td>
                                <?php if (!empty($g->foto)): ?>
                                    <img src="<?= base_url('uploads/galeri/'.$g->foto) ?>" width="100" class="img-thumbnail">
                                <?php endif; ?>
                            </td>
                            <td><?= $g->deskripsi ?></td>
                            <td><?= date('d-m-Y', strtotime($g->tanggal_upload)) ?></td>
                            <td>
                                <a href="<?= site_url('c_galeri/edit/'.$g->id) ?>" class="btn btn-sm btn-warning">Edit</a>
                                <a href="<?= site_url('c_galeri/delete/'.$g->id) ?>" class="btn btn-sm btn-danger">Hapus</a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
