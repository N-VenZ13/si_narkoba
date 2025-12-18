<?php
session_start();
include '../config.php';

if($_SESSION['status'] != "login"){
    header("location:index.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Cetak Laporan Pengaduan</title>
    <style>
        body { font-family: Arial, sans-serif; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #000; padding: 8px; text-align: left; font-size: 12px; }
        th { background-color: #ddd; }
        h2, h4 { text-align: center; margin: 0; }
        .header { margin-bottom: 20px; border-bottom: 2px solid #000; padding-bottom: 10px; }
    </style>
</head>
<!-- Otomatis muncul pop-up print saat halaman dibuka -->
<body onload="window.print()">

    <div class="header">
        <h2>SISTEM INFORMASI PENGADUAN NARKOBA</h2>
        <h4>Laporan Rekapitulasi Pengaduan Masuk</h4>
    </div>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Tgl Lapor</th>
                <th>Nama Pelapor</th>
                <th>No Telp</th>
                <th>Lokasi</th>
                <th>Isi Laporan</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $no = 1;
            $query = mysqli_query($koneksi, "SELECT * FROM pengaduan ORDER BY id_pengaduan DESC");
            while($d = mysqli_fetch_array($query)){
            ?>
            <tr>
                <td style="text-align:center"><?php echo $no++; ?></td>
                <td><?php echo date('d/m/Y', strtotime($d['tanggal_lapor'])); ?></td>
                <td><?php echo htmlspecialchars($d['nama_pelapor']); ?></td>
                <td><?php echo htmlspecialchars($d['no_telp']); ?></td>
                <td><?php echo htmlspecialchars($d['alamat_kejadian']); ?></td>
                <td><?php echo htmlspecialchars($d['isi_laporan']); ?></td>
                <td><?php echo $d['status']; ?></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>

    <br>
    <p style="text-align: right; margin-right: 50px;">
        Dicetak oleh: <?php echo $_SESSION['nama_lengkap']; ?><br>
        Tanggal: <?php echo date('d-m-Y'); ?>
    </p>

</body>
</html>