<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Pengaduan Narkoba</title>
    <!-- Bootstrap 5 CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f8f9fa; }
        .hero-section {
            background: linear-gradient(to right, #0d3b66, #3d5a80);
            color: white;
            padding: 50px 0;
            margin-bottom: 30px;
        }
        .card { box-shadow: 0 4px 8px rgba(0,0,0,0.1); border: none; }
    </style>
</head>
<body>

    <!-- Header / Hero Section -->
    <div class="hero-section text-center">
        <div class="container">
            <h1>Sistem Informasi Pengaduan Kasus Narkoba</h1>
            <p class="lead">Mari bersama wujudkan lingkungan bebas narkoba. Identitas pelapor aman.</p>
        </div>
    </div>

    <!-- Form Pengaduan -->
    <div class="container mb-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-danger text-white">
                        <h5 class="mb-0">Formulir Pengaduan</h5>
                    </div>
                    <div class="card-body">
                        <!-- PENTING: enctype="multipart/form-data" wajib ada untuk upload foto -->
                        <form action="proses_aduan.php" method="POST" enctype="multipart/form-data">
                            
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama Pelapor (Boleh Samaran)</label>
                                <input type="text" class="form-control" name="nama_pelapor" required placeholder="Masukkan nama Anda">
                            </div>

                            <div class="mb-3">
                                <label for="telp" class="form-label">Nomor Telepon / WhatsApp</label>
                                <input type="number" class="form-control" name="no_telp" required placeholder="08xxxxxxxxxx">
                            </div>

                            <div class="mb-3">
                                <label for="alamat" class="form-label">Alamat / Lokasi Kejadian</label>
                                <textarea class="form-control" name="alamat_kejadian" rows="2" required placeholder="Jelaskan lokasi selengkap mungkin"></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="laporan" class="form-label">Isi Laporan / Kronologi</label>
                                <textarea class="form-control" name="isi_laporan" rows="4" required placeholder="Ceritakan detail aktivitas mencurigakan..."></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="foto" class="form-label">Bukti Foto (Opsional)</label>
                                <input type="file" class="form-control" name="bukti_foto" accept=".jpg, .jpeg, .png">
                                <small class="text-muted">Format: JPG/PNG. Maksimal 2MB.</small>
                            </div>

                            <div class="d-grid gap-2">
                                <button type="submit" name="kirim" class="btn btn-primary btn-lg">Kirim Laporan</button>
                            </div>

                        </form>
                    </div>
                </div>
                
                <div class="text-center mt-3">
                    <a href="admin/index.php" class="text-secondary small">Login Administrator</a>
                </div>

            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>