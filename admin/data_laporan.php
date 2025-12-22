<?php include 'layout_header.php'; ?>
<script>document.querySelector('h4').innerText = "Kelola Data Pengaduan";</script>

<div class="card stat-card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-striped datatable">
                <thead class="bg-light">
                    <tr>
                        <th>No</th>
                        <th>Tgl</th>
                        <th>Pelapor & Kontak</th>
                        <th>Isi Laporan</th>
                        <th>Bukti</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $no = 1;
                    // Kita simpan query di variabel dulu
                    $query = mysqli_query($koneksi, "SELECT * FROM pengaduan ORDER BY id_pengaduan DESC");
                    
                    // Teknik Array: Simpan semua data ke array dulu agar bisa di-looping 2 kali
                    $data_semua = array(); 
                    while($row = mysqli_fetch_array($query)){
                        $data_semua[] = $row; 
                    }

                    // LOOPING 1: HANYA UNTUK BARIS TABEL
                    foreach($data_semua as $d){
                    ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo date('d/m/Y', strtotime($d['tanggal_lapor'])); ?></td>
                        <td>
                            <strong><?php echo $d['nama_pelapor']; ?></strong><br>
                            <small class="text-muted"><i class="fas fa-phone"></i> <?php echo $d['no_telp']; ?></small>
                        </td>
                        <td><?php echo nl2br(htmlspecialchars($d['isi_laporan'])); ?></td>
                        <td class="text-center">
                            <?php if($d['bukti_foto']) { ?>
                                <!-- Tombol Pemicu Modal -->
                                <button type="button" class="btn btn-sm btn-info text-white" data-bs-toggle="modal" data-bs-target="#modalFoto<?php echo $d['id_pengaduan']; ?>">
                                    <i class="fas fa-image"></i> Lihat
                                </button>
                            <?php } else { echo "-"; } ?>
                        </td>
                        <td>
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
                        <td>
                            <div class="dropdown">
                                <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                    Opsi
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item text-warning" href="aduan_aksi.php?act=proses&id=<?php echo $d['id_pengaduan']; ?>">Proses Laporan</a></li>
                                    <li><a class="dropdown-item text-success" href="aduan_aksi.php?act=selesai&id=<?php echo $d['id_pengaduan']; ?>">Tandai Selesai</a></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li><a class="dropdown-item text-danger" href="aduan_aksi.php?act=hapus&id=<?php echo $d['id_pengaduan']; ?>" onclick="return confirm('Hapus data ini?')">Hapus</a></li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                    <?php } // Akhir Loop 1 ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- LOOPING 2: KHUSUS UNTUK MEMBUAT MODAL DI LUAR TABEL -->
<!-- Ini trik agar modal tidak kedap-kedip / tertutup tabel -->
<?php foreach($data_semua as $d){ 
    if($d['bukti_foto']) { // Hanya buat modal jika ada fotonya
?>
    <div class="modal fade" id="modalFoto<?php echo $d['id_pengaduan']; ?>" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Bukti Laporan: <?php echo htmlspecialchars($d['nama_pelapor']); ?></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center bg-light">
                    <img src="../uploads/<?php echo $d['bukti_foto']; ?>" class="img-fluid rounded shadow-sm">
                    <br><br>
                    <a href="../uploads/<?php echo $d['bukti_foto']; ?>" target="_blank" class="btn btn-sm btn-outline-primary">
                        <i class="fas fa-download"></i> Buka Ukuran Penuh
                    </a>
                </div>
            </div>
        </div>
    </div>
<?php 
    } 
} // Akhir Loop 2 
?>

<?php include 'layout_footer.php'; ?>