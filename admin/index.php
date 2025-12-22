<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Petugas - SI Narkoba</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <style>
        body {
            background: linear-gradient(135deg, #005c97 0%, #363795 100%);
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .login-card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 15px 30px rgba(0,0,0,0.2);
            overflow: hidden;
            width: 100%;
            max-width: 850px;
        }
        .login-left {
            background: url('https://asset.kompas.com/crops/Oq0-y9_HjYqRzP4vX4o7P7x5z0s=/0x0:780x390/750x500/data/photo/2016/08/29/1149596bnn-sumsel780x390.jpg') center center;
            background-size: cover;
            position: relative;
        }
        .overlay {
            background: rgba(0, 92, 151, 0.7);
            position: absolute; top:0; left:0; right:0; bottom:0;
        }
    </style>
</head>
<body>

    <div class="card login-card">
        <div class="row g-0">
            <!-- Sisi Kiri (Gambar) -->
            <div class="col-md-6 d-none d-md-block login-left">
                <div class="overlay d-flex align-items-center justify-content-center text-white p-4">
                    <div class="text-center">
                        <h3>Sistem Informasi<br>Pengaduan Narkoba</h3>
                        <p>BNNP Sumatera Selatan</p>
                    </div>
                </div>
            </div>
            <!-- Sisi Kanan (Form) -->
            <div class="col-md-6 bg-white p-5">
                <div class="text-center mb-4">
                    <img src="..\assets\img\Logo_BNN.png" width="60" class="mb-2">
                    <h4 class="fw-bold text-dark">Login Petugas</h4>
                    <p class="text-muted small">Silakan masuk untuk mengelola laporan.</p>
                </div>

                <?php 
                if(isset($_GET['pesan'])){
                    if($_GET['pesan'] == "gagal"){
                        echo "<div class='alert alert-danger py-2 small'><i class='fas fa-exclamation-circle'></i> Login Gagal! Cek username/password.</div>";
                    }
                }
                ?>

                <form action="login_auth.php" method="POST">
                    <div class="mb-3">
                        <label class="form-label small fw-bold">USERNAME</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light"><i class="fas fa-user"></i></span>
                            <input type="text" name="username" class="form-control" required placeholder="Masukkan username">
                        </div>
                    </div>
                    <div class="mb-4">
                        <label class="form-label small fw-bold">PASSWORD</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light"><i class="fas fa-lock"></i></span>
                            <input type="password" name="password" class="form-control" required placeholder="Masukkan password">
                        </div>
                    </div>
                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-bnn rounded-pill">MASUK SEKARANG</button>
                        <a href="../index.php" class="btn btn-light rounded-pill text-muted">Kembali ke Portal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>
</html>