<?php
session_start();
// Cek apakah user sudah login
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
    <title>Dashboard Admin - SI Narkoba</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">Admin Panel</a>
            <div class="d-flex">
                <span class="navbar-text text-white me-3">
                    Halo, <?php echo $_SESSION['nama_lengkap']; ?>
                </span>
                <a href="logout.php" class="btn btn-danger btn-sm">Logout</a>
            </div>
        </div>
    </nav>

    <!-- Content -->
    <div class="container mt-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
        <h4>Daftar Laporan Masuk</h4>
        <a href="cetak.php" target="_blank" class="btn btn-success btn-sm">🖨️ Cetak Laporan</a>
    </div>
        
        <div class="card shadow">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-striped">
                        <thead class="table-dark text-center">
                            <tr>
                                <th>No</th>
                                <th>Tgl Lapor</th>
                                <th>Pelapor</th>
                                <th>Isi Laporan</th>
                                <th>Bukti</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $no = 1;
                            // Query mengambil data terbaru (DESC)
                            $query = mysqli_query($koneksi, "SELECT * FROM pengaduan ORDER BY id_pengaduan DESC");
                            while($d = mysqli_fetch_array($query)){
                            ?>
                            <tr>
                                <td class="text-center"><?php echo $no++; ?></td>
                                <td><?php echo date('d/m/Y H:i', strtotime($d['tanggal_lapor'])); ?></td>
                                <td>
                                    <strong><?php echo htmlspecialchars($d['nama_pelapor']); ?></strong><br>
                                    <small class="text-muted"><?php echo htmlspecialchars($d['no_telp']); ?></small><br>
                                    <small class="text-muted">Lokasi: <?php echo htmlspecialchars($d['alamat_kejadian']); ?></small>
                                </td>
                                <td><?php echo nl2br(htmlspecialchars($d['isi_laporan'])); ?></td>
                                <td class="text-center">
                                    <?php if($d['bukti_foto']) { ?>
                                        <a href="../uploads/<?php echo $d['bukti_foto']; ?>" target="_blank" class="btn btn-sm btn-info text-white">Lihat</a>
                                    <?php } else { echo "-"; } ?>
                                </td>
                                <td class="text-center">
                                    <?php 
                                    if($d['status'] == 'Baru'){
                                        echo '<span class="badge bg-danger">Baru</span>';
                                    } elseif($d['status'] == 'Diproses'){
                                        echo '<span class="badge bg-warning text-dark">Diproses</span>';
                                    } else {
                                        echo '<span class="badge bg-success">Selesai</span>';
                                    }
                                    ?>
                                </td>
                                <td class="text-center" width="150">
                                    <!-- Tombol Aksi (Akan difungsikan di tahap berikutnya) -->
                                    <div class="btn-group-vertical btn-group-sm">
                                        <a href="aduan_aksi.php?act=proses&id=<?php echo $d['id_pengaduan']; ?>" class="btn btn-warning" onclick="return confirm('Proses laporan ini?')">Proses</a>
                                        <a href="aduan_aksi.php?act=selesai&id=<?php echo $d['id_pengaduan']; ?>" class="btn btn-success" onclick="return confirm('Tandai selesai?')">Selesai</a>
                                        <a href="aduan_aksi.php?act=hapus&id=<?php echo $d['id_pengaduan']; ?>" class="btn btn-danger" onclick="return confirm('Hapus data ini?')">Hapus</a>
                                    </div>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>