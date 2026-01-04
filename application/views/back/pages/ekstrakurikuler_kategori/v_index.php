<div class="container mt-4">
  <div class="card shadow-sm">

    <!-- HEADER -->
    <div class="card-header bg-primary text-white">
      <h4 class="mb-0"><?= $title ?></h4>
    </div>

    <div class="card-body">

      <!-- TAMBAH -->
      <a href="<?= site_url('c_ekstrakurikuler_kategori/create') ?>"
         class="btn btn-success mb-3">
        + Tambah Kategori
      </a>

      <!-- FLASH -->
      <?php if($this->session->flashdata('success')): ?>
        <div class="alert alert-success">
          <?= $this->session->flashdata('success') ?>
        </div>
      <?php endif; ?>

      <div class="table-responsive">
        <table class="table table-bordered table-striped align-middle">
          <thead class="table-light">
            <tr>
              <th width="60">No</th>
              <th>Nama Kategori</th>
              <th>Deskripsi</th>
              <th width="180">Aksi</th>
            </tr>
          </thead>

          <tbody>
            <?php if (!empty($kategori)): ?>
              <?php $no=1; foreach ($kategori as $k): ?>
                <tr>
                  <td><?= $no++ ?></td>

                  <td><?= htmlspecialchars($k->nama_kategori) ?></td>

                  <td style="max-width:350px">
                    <?php if (!empty($k->deskripsi)): ?>

                      <!-- DESKRIPSI RINGKAS -->
                      <div id="short-<?= $k->id ?>">
                        <?= character_limiter(strip_tags($k->deskripsi), 120) ?>
                      </div>

                      <!-- DESKRIPSI FULL -->
                      <div id="full-<?= $k->id ?>" class="d-none">
                        <?= nl2br(htmlspecialchars($k->deskripsi)) ?>
                      </div>

                      <?php if (strlen(strip_tags($k->deskripsi)) > 120): ?>
                        <a href="javascript:void(0)"
                           class="text-primary small"
                           onclick="toggleDesc(<?= $k->id ?>)"
                           id="btn-<?= $k->id ?>">
                          Baca selengkapnya
                        </a>
                      <?php endif; ?>

                    <?php else: ?>
                      <span class="text-muted">-</span>
                    <?php endif; ?>
                  </td>

                  <td>
                    <a href="<?= site_url('c_ekstrakurikuler_kategori/edit/'.$k->id) ?>"
                       class="btn btn-sm btn-warning">
                      Edit
                    </a>

                    <a href="<?= site_url('c_ekstrakurikuler_kategori/hapus/'.$k->id) ?>"
                       class="btn btn-sm btn-danger"
                       onclick="return confirm('Yakin hapus kategori ini?')">
                      Hapus
                    </a>
                  </td>
                </tr>
              <?php endforeach; ?>
            <?php else: ?>
              <tr>
                <td colspan="4" class="text-center text-muted">
                  Belum ada kategori
                </td>
              </tr>
            <?php endif; ?>
          </tbody>
        </table>
      </div>

    </div>
  </div>
</div>

<!-- SCRIPT -->
<script>
function toggleDesc(id) {
  const shortDesc = document.getElementById('short-' + id);
  const fullDesc  = document.getElementById('full-' + id);
  const btn       = document.getElementById('btn-' + id);

  if (fullDesc.classList.contains('d-none')) {
    shortDesc.classList.add('d-none');
    fullDesc.classList.remove('d-none');
    btn.innerText = 'Sembunyikan';
  } else {
    shortDesc.classList.remove('d-none');
    fullDesc.classList.add('d-none');
    btn.innerText = 'Baca selengkapnya';
  }
}
</script>
