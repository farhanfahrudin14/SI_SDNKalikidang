<div class="container mt-4">
  <div class="card shadow-sm">
    <div class="card-header bg-primary text-white">
      <h4 class="mb-0"><?= $title ?></h4>
    </div>

    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered table-striped">
          <thead class="table-light">
            <tr>
              <th width="50">No</th>
              <th>Nama Kategori</th>
              <th width="200">Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php if (!empty($kategori)): ?>
              <?php $no=1; foreach($kategori as $k): ?>
                <tr>
                  <td><?= $no++ ?></td>
                  <td><?= htmlspecialchars($k->nama_kategori) ?></td>
                  <td>
                    <a href="<?= site_url('c_galeri_foto/detail/'.$k->id) ?>" class="btn btn-sm btn-info">
                      Kelola Foto
                    </a>
                  </td>
                </tr>
              <?php endforeach; ?>
            <?php else: ?>
              <tr>
                <td colspan="3" class="text-center">Belum ada kategori</td>
              </tr>
            <?php endif; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
