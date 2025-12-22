<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal Pengaduan BNNP</title>
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
    
    <style>
        .portal-bg {
            min-height: 100vh;
            background: linear-gradient(135deg, #005c97 0%, #363795 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow: hidden;
        }
        /* Hiasan background abstrak */
        .circle {
            position: absolute;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
        }
        .c1 { width: 300px; height: 300px; top: -50px; left: -50px; }
        .c2 { width: 200px; height: 200px; bottom: 50px; right: -50px; }
    </style>
</head>
<body>

    <div class="portal-bg">
        <!-- Hiasan Bulat -->
        <div class="circle c1"></div>
        <div class="circle c2"></div>

        <div class="container position-relative z-index-1">
            <div class="text-center text-white mb-5">
                <img src="assets\img\Logo_BNN.png" alt="Logo BNN" width="100" class="mb-3 drop-shadow">
                <h2 class="fw-bold">SISTEM PENGADUAN NARKOBA</h2>
                <p class="lead">Badan Narkotika Nasional Provinsi Sumatera Selatan</p>
                <div class="badge bg-warning text-dark px-3 py-2 rounded-pill mt-2">
                    <i class="fas fa-shield-alt"></i> Identitas Pelapor Dijamin Aman
                </div>
            </div>

            <div class="row justify-content-center">
                <!-- Pilihan 1: Masyarakat -->
                <div class="col-md-5 col-lg-4 mb-4">
                    <div class="card card-custom h-100 text-center p-4">
                        <div class="card-body">
                            <div class="mb-4 text-primary">
                                <i class="fas fa-bullhorn fa-4x"></i>
                            </div>
                            <h4 class="card-title fw-bold text-dark">Layanan Pengaduan</h4>
                            <p class="card-text text-muted">Laporkan indikasi penyalahgunaan narkoba di lingkungan Anda secara online.</p>
                            <a href="form_aduan.php" class="btn btn-bnn w-100 py-2 rounded-pill">
                                BUAT LAPORAN SEKARANG <i class="fas fa-arrow-right ms-2"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Pilihan 2: Admin -->
                <div class="col-md-5 col-lg-4 mb-4">
                    <div class="card card-custom h-100 text-center p-4" style="background-color: #f8f9fa; border: 2px dashed #dee2e6;">
                        <div class="card-body">
                            <div class="mb-4 text-secondary">
                                <i class="fas fa-user-lock fa-4x"></i>
                            </div>
                            <h4 class="card-title fw-bold text-dark">Login Petugas</h4>
                            <p class="card-text text-muted">Khusus untuk petugas admin BNNP untuk mengelola laporan masuk.</p>
                            <a href="admin/index.php" class="btn btn-outline-dark w-100 py-2 rounded-pill">
                                MASUK SISTEM <i class="fas fa-sign-in-alt ms-2"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="text-center text-white-50 mt-5">
                <small>&copy; 2025 BNNP Sumatera Selatan - War On Drugs</small>
            </div>
        </div>
    </div>

</body>
</html>