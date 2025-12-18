<div class="container mt-4">
  <div class="card shadow-sm">
    <div class="card-header bg-primary text-white">
      <h4 class="mb-0"><?= $title ?></h4>
    </div>

    <div class="card-body">

      <a href="<?= site_url('c_galeri_kategori/create') ?>"
         class="btn btn-success mb-3">
        + Tambah Kategori
      </a>

      <?php if($this->session->flashdata('success')): ?>
        <div class="alert alert-success">
          <?= $this->session->flashdata('success') ?>
        </div>
      <?php elseif($this->session->flashdata('error')): ?>
        <div class="alert alert-danger">
          <?= $this->session->flashdata('error') ?>
        </div>
      <?php endif; ?>

      <div class="table-responsive">
        <table class="table table-bordered table-striped align-middle">
          <thead class="table-light">
            <tr>
              <th width="60">No</th>
              <th>Nama Kategori</th>
              <th width="180">Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php if (!empty($kategori)): ?>
              <?php $no=1; foreach($kategori as $k): ?>
                <tr>
                  <td><?= $no++ ?></td>
                  <td><?= htmlspecialchars($k->nama_kategori) ?></td>
                  <td>
                    <a href="<?= site_url('c_galeri_kategori/edit/'.$k->id) ?>"
                       class="btn btn-sm btn-warning">
                       Edit
                    </a>

                    <a href="<?= site_url('c_galeri_kategori/hapus/'.$k->id) ?>"
                       class="btn btn-sm btn-danger">
                       Hapus
                    </a>
                  </td>
                </tr>
              <?php endforeach; ?>
            <?php else: ?>
              <tr>
                <td colspan="3" class="text-center">
                  Belum ada kategori galeri
                </td>
              </tr>
            <?php endif; ?>
          </tbody>
        </table>
      </div>

    </div>
  </div>
</div>
