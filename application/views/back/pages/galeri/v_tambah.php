<div class="container mt-4">
  <div class="card shadow-sm">
    <div class="card-header bg-success text-white">
      <h4 class="mb-0"><?= $title ?></h4>
    </div>
    <div class="card-body">
      <form action="<?= site_url('c_galeri/store') ?>" method="post" enctype="multipart/form-data">
        
        <div class="mb-3">
          <label class="form-label">Foto (jpg/png, maks 2MB)</label>
          <input type="file" name="foto" class="form-control" accept=".jpg,.jpeg,.png" required>
        </div>

        <div class="mb-3">
          <label class="form-label">Deskripsi (maks. 88 kata)</label>
          <textarea 
            name="deskripsi" 
            class="form-control" 
            id="deskripsi" 
            rows="3" 
            required></textarea>
          <small id="wordCount" class="text-muted d-block mt-1">0 / 88 kata</small>
        </div>

        <div class="mb-3">
          <label class="form-label">Tanggal Upload</label>
          <input type="date" name="tanggal_upload" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success">Simpan</button>
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

  textarea.addEventListener("input", function (e) {
    const words = textarea.value.trim().split(/\s+/).filter(w => w.length > 0);
    let count = words.length;

    if (count > maxWords) {
      const allowedWords = words.slice(0, maxWords).join(" ");
      textarea.value = allowedWords;
      count = maxWords;
    }

    wordCount.textContent = `${count} / ${maxWords} kata`;
    wordCount.classList.toggle("text-danger", count >= maxWords);
  });

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
