<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Administrator</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #e9ecef; display: flex; align-items: center; justify-content: center; height: 100vh; }
        .login-card { width: 100%; max-width: 400px; padding: 20px; }
    </style>
</head>
<body>

    <div class="card login-card shadow">
        <div class="card-body">
            <h3 class="text-center mb-4">Login Admin</h3>
            
            <!-- Pesan Error jika login gagal -->
            <?php 
            if(isset($_GET['pesan'])){
                if($_GET['pesan'] == "gagal"){
                    echo "<div class='alert alert-danger'>Login gagal! Username atau password salah.</div>";
                } else if($_GET['pesan'] == "belum_login"){
                    echo "<div class='alert alert-warning'>Anda harus login terlebih dahulu.</div>";
                }
            }
            ?>

            <form action="login_auth.php" method="POST">
                <div class="mb-3">
                    <label class="form-label">Username</label>
                    <input type="text" name="username" class="form-control" required autofocus>
                </div>
                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" required>
                </div>
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary">Masuk</button>
                </div>
                <div class="text-center mt-3">
                    <a href="../index.php" class="small text-decoration-none">← Kembali ke Halaman Utama</a>
                </div>
            </form>
        </div>
    </div>

</body>
</html>