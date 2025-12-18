<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0"><?= $title ?></h4>
        </div>
        <div class="card-body">
            <a href="<?= site_url('c_ppdb/create') ?>" class="btn btn-success mb-3">+ Tambah</a>

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
                            <th>Judul</th>
                            <th>Deskripsi</th>
                            <th>Link</th>
                            <th>Foto</th>
                            <th width="150">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no=1; foreach ($ppdb as $p): ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $p->judul ?></td>
                            <td><?= $p->deskripsi ?></td>
                            <td>
                                <?php if(!empty($p->link)): ?>
                                    <a href="<?= $p->link ?>" target="_blank"><?= $p->link ?></a>
                                <?php endif; ?>
                            </td>
                            <td>
                                <?php if (!empty($p->foto) && file_exists('./uploads/ppdb/'.$p->foto)): ?>
                                    <img src="<?= base_url('uploads/ppdb/'.$p->foto) ?>" width="100" class="img-thumbnail">
                                <?php else: ?>
                                    <span class="text-danger">Foto tidak tersedia</span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <a href="<?= site_url('c_ppdb/edit/'.$p->id) ?>" class="btn btn-sm btn-warning">Edit</a>
                                <a href="<?= site_url('c_ppdb/delete/'.$p->id) ?>" class="btn btn-sm btn-danger">Hapus</a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
