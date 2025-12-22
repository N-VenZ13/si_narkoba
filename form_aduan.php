<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulir Pengaduan - BNNP Sumsel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- SweetAlert2 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

    <!-- Navbar Sederhana -->
    <nav class="navbar navbar-dark bg-bnn shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold" href="index.php">
                <img src="assets\img\Logo_BNN.png" width="30" height="30" class="d-inline-block align-text-top me-2">
                SI-NARKOBA
            </a>
            <a href="index.php" class="btn btn-sm btn-light text-primary fw-bold rounded-pill">
                <i class="fas fa-home"></i> Kembali
            </a>
        </div>
    </nav>

    <div class="container mt-5 mb-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                
                <div class="card card-custom">
                    <div class="card-header-bnn">
                        <h4 class="mb-0"><i class="fas fa-file-signature me-2"></i> Formulir Pengaduan Masyarakat</h4>
                        <small class="text-light opacity-75">Silakan isi data dengan benar. Kerahasiaan Anda prioritas kami.</small>
                    </div>
                    <div class="card-body p-4">
                        
                        <form action="proses_aduan.php" method="POST" enctype="multipart/form-data" id="formLapor">
                            
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-bold">Nama Pelapor (Samaran)</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light"><i class="fas fa-user"></i></span>
                                        <input type="text" class="form-control" name="nama_pelapor" required placeholder="Contoh: Hamba Allah">
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-bold">No. WhatsApp / Telp</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light"><i class="fas fa-phone"></i></span>
                                        <input type="number" class="form-control" name="no_telp" required placeholder="08xxxxxxxxxx">
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-bold">Lokasi Kejadian Lengkap</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light"><i class="fas fa-map-marker-alt"></i></span>
                                    <textarea class="form-control" name="alamat_kejadian" rows="2" required placeholder="Jalan, Nomor Rumah, RT/RW, Patokan..."></textarea>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-bold">Kronologi / Isi Laporan</label>
                                <textarea class="form-control" name="isi_laporan" rows="4" required placeholder="Ceritakan aktivitas mencurigakan yang Anda lihat..."></textarea>
                            </div>

                            <div class="mb-4">
                                <label class="form-label fw-bold">Bukti Foto (Opsional)</label>
                                <input type="file" class="form-control" name="bukti_foto" accept=".jpg, .jpeg, .png">
                                <div class="form-text text-danger"><i class="fas fa-info-circle"></i> Maksimal ukuran file 2MB (JPG/PNG).</div>
                            </div>

                            <div class="d-grid">
                                <button type="submit" name="kirim" class="btn btn-bnn btn-lg rounded-pill">
                                    <i class="fas fa-paper-plane me-2"></i> KIRIM LAPORAN SEKARANG
                                </button>
                            </div>

                        </form>
                    </div>
                </div>

                <!-- Info Box -->
                <div class="alert alert-info mt-4 shadow-sm border-0 d-flex align-items-center">
                    <i class="fas fa-shield-alt fa-2x me-3"></i>
                    <div>
                        <strong>Jaminan Keamanan:</strong><br>
                        Data Anda dienkripsi dan hanya dapat diakses oleh petugas khusus BNNP Sumsel.
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Script Notifikasi dari PHP -->
    <?php if(isset($_GET['status']) && $_GET['status'] == 'sukses') { ?>
    <script>
        Swal.fire({
            title: 'Berhasil Terkirim!',
            text: 'Laporan Anda telah masuk ke sistem kami. Terima kasih atas partisipasi Anda.',
            icon: 'success',
            confirmButtonColor: '#363795',
            confirmButtonText: 'Kembali'
        });
    </script>
    <?php } ?>

</body>
</html>