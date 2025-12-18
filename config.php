<?php
// Konfigurasi Database
$host = "localhost";
$user = "root";
$pass = "";
$db   = "db_narkoba";

// Melakukan Koneksi
$koneksi = mysqli_connect($host, $user, $pass, $db);

// Cek Koneksi (Opsional, bisa dihapus jika sudah fix)
if (!$koneksi) {
    die("Koneksi Gagal: " . mysqli_connect_error());
}
?>