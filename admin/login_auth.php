<?php 
session_start();
include '../config.php'; // Naik satu folder untuk ambil config

$username = mysqli_real_escape_string($koneksi, $_POST['username']);
$password = md5($_POST['password']); // Enkripsi MD5 sesuai database

$data = mysqli_query($koneksi, "SELECT * FROM admin WHERE username='$username' AND password='$password'");

// Cek jumlah data yang ditemukan
$cek = mysqli_num_rows($data);

if($cek > 0){
    $row = mysqli_fetch_assoc($data);
    
    // Set Session
    $_SESSION['username'] = $username;
    $_SESSION['nama_lengkap'] = $row['nama_lengkap'];
    $_SESSION['status'] = "login";

    header("location:dashboard.php");
}else{
    header("location:index.php?pesan=gagal");
}
?>