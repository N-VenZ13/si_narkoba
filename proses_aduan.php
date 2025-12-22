<?php
include 'config.php';

if (isset($_POST['kirim'])) {
    // 1. Tangkap Data dari Form
    $nama    = mysqli_real_escape_string($koneksi, $_POST['nama_pelapor']);
    $telp    = mysqli_real_escape_string($koneksi, $_POST['no_telp']);
    $alamat  = mysqli_real_escape_string($koneksi, $_POST['alamat_kejadian']);
    $laporan = mysqli_real_escape_string($koneksi, $_POST['isi_laporan']);

    // 2. Logika Upload Foto
    $nama_foto = null; // Default jika tidak ada foto

    // Cek apakah ada file yang diupload dan tidak error
    if (isset($_FILES['bukti_foto']) && $_FILES['bukti_foto']['error'] == 0) {
        $foto_temp = $_FILES['bukti_foto']['tmp_name'];
        $foto_name = $_FILES['bukti_foto']['name'];

        // Buat nama unik agar foto tidak tertimpa (timestamp + random number)
        $nama_foto_baru = time() . '_' . rand(100, 999) . '_' . $foto_name;
        $folder_tujuan = "uploads/" . $nama_foto_baru;

        // Pindahkan file ke folder uploads
        if (move_uploaded_file($foto_temp, $folder_tujuan)) {
            $nama_foto = $nama_foto_baru;
        }
    }

    // 3. Simpan ke Database
    $query = "INSERT INTO pengaduan (nama_pelapor, no_telp, alamat_kejadian, isi_laporan, bukti_foto, status) 
              VALUES ('$nama', '$telp', '$alamat', '$laporan', '$nama_foto', 'Baru')";

    if (mysqli_query($koneksi, $query)) {
        // echo "<script>alert('...'); window.location='index.php';</script>";

        // KODE BARU (Redirect ke form_aduan.php dengan parameter status):
        if (mysqli_query($koneksi, $query)) {
            header("Location: form_aduan.php?status=sukses");
        } else {
            echo "Gagal mengirim laporan: " . mysqli_error($koneksi);
        }
    } else {
        echo "Gagal mengirim laporan: " . mysqli_error($koneksi);
    }
} else {
    // Jika akses langsung tanpa submit
    header("Location: index.php");
}
