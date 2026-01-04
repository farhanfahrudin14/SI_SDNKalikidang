<div class="container-fluid">

    <!-- JUDUL -->
    <h1 class="h3 mb-4 text-gray-800">Rekap Pendaftaran PPDB</h1>

    <!-- 🔹 RINGKASAN DATA -->
    <div class="row mb-4">

        <!-- PENGUNJUNG PPDB -->
        <div class="col-12 col-md-6 mb-3">
            <div class="card shadow text-center h-100">
                <div class="card-body d-flex flex-column justify-content-center">
                    <h6 class="text-muted">Pengunjung PPDB</h6>
                    <h2 class="font-weight-bold display-4">
                        <?= $pengunjung ?>
                    </h2>
                </div>
            </div>
        </div>

        <!-- PENGISI FORM -->
        <div class="col-12 col-md-6 mb-3">
            <div class="card shadow text-center h-100">
                <div class="card-body d-flex flex-column justify-content-center">
                    <h6 class="text-muted">Pengisi Form</h6>
                    <h2 class="font-weight-bold display-4 text-success">
                        <?= $pengisi ?>
                    </h2>
                </div>
            </div>
        </div>

    </div>

    <!-- 🔹 IFRAME GOOGLE SPREADSHEET -->
    <div class="card shadow mb-4">
        <div class="card-body p-0">
            <div style="height: 600px; overflow: hidden;">
                <iframe
                    src="https://docs.google.com/spreadsheets/d/1wqYGywoneHbbFwvdjsJeD74X_2nOSNWchDyLX-rafIU/preview"
                    style="width:100%; height:100%; border:0;"
                    scrolling="yes">
                </iframe>
            </div>
        </div>
    </div>

</div>
