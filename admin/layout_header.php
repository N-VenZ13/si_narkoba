<?php
session_start();
if($_SESSION['status'] != "login"){
    header("location:index.php?pesan=belum_login");
}
include '../config.php';
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - BNNP</title>
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- DataTables CSS (Untuk Tabel Canggih) -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
    <!-- Custom CSS Admin -->
    <style>
        body { background-color: #f4f6f9; overflow-x: hidden; }
        
        /* Sidebar Style */
        .sidebar {
            min-height: 100vh;
            background: linear-gradient(180deg, #005c97 0%, #363795 100%);
            color: #fff;
            width: 250px;
            position: fixed;
            top: 0; left: 0;
            transition: all 0.3s;
            z-index: 1000;
        }
        .sidebar-brand {
            padding: 20px;
            text-align: center;
            border-bottom: 1px solid rgba(255,255,255,0.1);
        }
        .sidebar-menu { padding: 20px 10px; }
        .sidebar-menu a {
            display: block;
            color: rgba(255,255,255,0.8);
            padding: 12px 20px;
            text-decoration: none;
            border-radius: 10px;
            margin-bottom: 5px;
            transition: 0.3s;
        }
        .sidebar-menu a:hover, .sidebar-menu a.active {
            background: rgba(255,255,255,0.2);
            color: #fff;
            font-weight: bold;
        }
        .sidebar-menu i { width: 25px; }
        
        /* Content Wrapper */
        .main-content {
            margin-left: 250px;
            padding: 30px;
            transition: all 0.3s;
        }

        /* Card Stat */
        .stat-card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.05);
            transition: 0.3s;
        }
        .stat-card:hover { transform: translateY(-5px); }
        .icon-box {
            width: 50px; height: 50px;
            border-radius: 10px;
            display: flex; align-items: center; justify-content: center;
            font-size: 24px; color: white;
        }
    </style>
</head>
<body>

<!-- Sidebar -->
<div class="sidebar">
    <div class="sidebar-brand">
        <img src="..\assets\img\Logo_BNN.png" width="40" class="mb-2">
        <h5 class="mb-0 fw-bold">PANEL ADMIN</h5>
        <small>BNNP Sumsel</small>
    </div>
    <div class="sidebar-menu">
        <small class="text-white-50 text-uppercase ms-3 mb-2 d-block" style="font-size:11px;">Menu Utama</small>
        <a href="dashboard.php"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
        <a href="data_laporan.php"><i class="fas fa-folder-open"></i> Data Pengaduan</a>
        <a href="cetak.php" target="_blank"><i class="fas fa-print"></i> Cetak Laporan</a>
        
        <small class="text-white-50 text-uppercase ms-3 mb-2 mt-3 d-block" style="font-size:11px;">Akun</small>
        <a href="logout.php" class="text-danger bg-opacity-10"><i class="fas fa-sign-out-alt"></i> Logout</a>
    </div>
</div>

<!-- Wrapper Konten Utama (Akan ditutup di layout_footer.php) -->
<div class="main-content">
    <!-- Topbar Sederhana -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="fw-bold text-secondary">
            <!-- Judul Halaman akan dinamis -->
        </h4>
        <div class="d-flex align-items-center">
            <div class="me-3 text-end d-none d-md-block">
                <span class="d-block fw-bold text-dark"><?php echo $_SESSION['nama_lengkap']; ?></span>
                <span class="d-block small text-muted">Administrator</span>
            </div>
            <img src="https://ui-avatars.com/api/?name=<?php echo $_SESSION['nama_lengkap']; ?>&background=005c97&color=fff" class="rounded-circle" width="45">
        </div>
    </div>