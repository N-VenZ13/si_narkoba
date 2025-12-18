<?php
session_start();
include '../config.php';

// Cek Login
if($_SESSION['status'] != "login"){
    header("location:index.php");
    exit;
}

if(isset($_GET['act']) && isset($_GET['id'])){
    $act = $_GET['act'];
    $id = $_GET['id'];

    if($act == "proses"){
        // Ubah status jadi Diproses
        mysqli_query($koneksi, "UPDATE pengaduan SET status='Diproses' WHERE id_pengaduan='$id'");
        header("location:dashboard.php");

    } elseif($act == "selesai"){
        // Ubah status jadi Selesai
        mysqli_query($koneksi, "UPDATE pengaduan SET status='Selesai' WHERE id_pengaduan='$id'");
        header("location:dashboard.php");

    } elseif($act == "hapus"){
        // Ambil data dulu untuk cek nama foto
        $q = mysqli_query($koneksi, "SELECT * FROM pengaduan WHERE id_pengaduan='$id'");
        $data = mysqli_fetch_array($q);

        // Hapus foto dari folder jika ada
        if($data['bukti_foto'] != null){
            $target = "../uploads/" . $data['bukti_foto'];
            if(file_exists($target)){
                unlink($target);
            }
        }

        // Hapus data dari database
        mysqli_query($koneksi, "DELETE FROM pengaduan WHERE id_pengaduan='$id'");
        header("location:dashboard.php");
    }
} else {
    header("location:dashboard.php");
}
?>