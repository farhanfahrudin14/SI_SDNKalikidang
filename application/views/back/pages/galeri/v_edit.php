<div class="container mt-4">
  <div class="card shadow-sm">
    <div class="card-header bg-warning text-dark">
      <h4 class="mb-0"><?= $title ?></h4>
    </div>
    <div class="card-body">
      <form action="<?= site_url('c_galeri/update/'.$galeri->id) ?>" method="post" enctype="multipart/form-data">
        
        <div class="mb-3">
          <label class="form-label">Foto Baru (opsional)</label>
          <input type="file" name="foto" class="form-control">
          <?php if (!empty($galeri->foto)): ?>
            <p class="mt-2 mb-1">Foto lama:</p>
            <img src="<?= base_url('uploads/galeri/'.$galeri->foto) ?>" width="100" class="img-thumbnail">
          <?php endif; ?>
        </div>

        <div class="mb-3">
          <label class="form-label">Deskripsi (maks. 88 kata)</label>
          <textarea 
            name="deskripsi" 
            class="form-control" 
            rows="3" 
            id="deskripsi" 
            required><?= $galeri->deskripsi ?></textarea>
          <small id="wordCount" class="text-muted d-block mt-1">0 / 88 kata</small>
        </div>

        <div class="mb-3">
          <label class="form-label">Tanggal Upload</label>
          <input type="date" name="tanggal_upload" class="form-control" value="<?= $galeri->tanggal_upload ?>" required>
        </div>

        <button type="submit" class="btn btn-warning">Update</button>
        <a href="<?= site_url('c_galeri') ?>" class="btn btn-secondary">Batal</a>
      </form>
    </div>
  </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function () {
  const textarea = document.getElementById("deskripsi");
  const wordCount = document.getElementById("wordCount");
  const maxWords = 88;

  function countWords(text) {
    return text.trim().split(/\s+/).filter(word => word.length > 0).length;
  }

  function updateCount() {
    const words = textarea.value.trim().split(/\s+/).filter(w => w.length > 0);
    let count = words.length;

    if (count > maxWords) {
      const allowedWords = words.slice(0, maxWords).join(" ");
      textarea.value = allowedWords;
      count = maxWords;
    }

    wordCount.textContent = `${count} / ${maxWords} kata`;
    wordCount.classList.toggle("text-danger", count >= maxWords);
  }

  // Jalankan perhitungan awal (biar nggak 0)
  updateCount();

  textarea.addEventListener("input", updateCount);

  textarea.addEventListener("keydown", function (e) {
    const words = textarea.value.trim().split(/\s+/).filter(w => w.length > 0);
    if (words.length >= maxWords && 
        e.key.length === 1 && 
        !e.ctrlKey && !e.metaKey && !e.altKey) {
      e.preventDefault();
    }
  });
});
</script>

