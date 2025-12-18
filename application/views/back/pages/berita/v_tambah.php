<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-header bg-success text-white">
            <h4 class="mb-0"><?= $title ?></h4>
        </div>
        <div class="card-body">

            <form action="<?= site_url('c_berita/store') ?>"
                  method="post"
                  enctype="multipart/form-data">

                <!-- JUDUL -->
                <div class="mb-3">
                    <label class="form-label">Judul</label>
                    <input type="text"
                           name="title"
                           class="form-control"
                           required>
                </div>

                <!-- ISI -->
                <div class="mb-3">
                    <label class="form-label">Isi Berita</label>
                    <textarea name="content"
                              rows="6"
                              class="form-control"
                              required></textarea>
                </div>

                <!-- FOTO -->
                <div class="mb-3">
                    <label class="form-label">Foto Berita</label>
                    <input type="file"
                           name="photo"
                           class="form-control"
                           accept="image/*"
                           required>
                </div>

                <!-- STATUS -->
                <div class="mb-3">
                    <label class="form-label">Status</label>
                    <select name="is_active" class="form-control">
                        <option value="Y">Aktif</option>
                        <option value="N">Nonaktif</option>
                    </select>
                </div>

                <!-- BUTTON -->
                <div class="d-flex justify-content-between">
                    <a href="<?= site_url('c_berita') ?>"
                       class="btn btn-secondary">
                        Kembali
                    </a>
                    <button type="submit"
                            class="btn btn-primary">
                        Simpan
                    </button>
                </div>

            </form>

        </div>
    </div>
</div>
