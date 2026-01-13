<?php
include 'config.php';

// PERBAIKAN: Gunakan REQUEST_METHOD agar tetap jalan meski tombol disabled
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    // 1. Tangkap Data dari Form
    $nama    = mysqli_real_escape_string($koneksi, $_POST['nama_pelapor']);
    $telp    = mysqli_real_escape_string($koneksi, $_POST['no_telp']);
    $alamat  = mysqli_real_escape_string($koneksi, $_POST['alamat_kejadian']);
    $laporan = mysqli_real_escape_string($koneksi, $_POST['isi_laporan']);
    
    // 2. Logika Upload Foto
    $nama_foto = null; 
    
    if (isset($_FILES['bukti_foto']) && $_FILES['bukti_foto']['error'] == 0) {
        $foto_temp = $_FILES['bukti_foto']['tmp_name'];
        $foto_name = $_FILES['bukti_foto']['name'];
        $nama_foto_baru = time() . '_' . rand(100, 999) . '_' . $foto_name;
        $folder_tujuan = "uploads/" . $nama_foto_baru;

        if (move_uploaded_file($foto_temp, $folder_tujuan)) {
            $nama_foto = $nama_foto_baru;
        }
    }

    // 3. Simpan ke Database
    $query = "INSERT INTO pengaduan (nama_pelapor, no_telp, alamat_kejadian, isi_laporan, bukti_foto, status) 
              VALUES ('$nama', '$telp', '$alamat', '$laporan', '$nama_foto', 'Baru')";

    if (mysqli_query($koneksi, $query)) {
        // Redirect sukses
        header("Location: form_aduan.php?status=sukses");
        exit; // PENTING: Hentikan script agar tidak lanjut
    } else {
        echo "Gagal mengirim laporan: " . mysqli_error($koneksi);
    }

} else {
    // Jika akses langsung tanpa submit
    header("Location: index.php");
    exit;
}
?>