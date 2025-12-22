<?php include 'layout_header.php'; ?>

<!-- Judul Halaman -->
<script>document.querySelector('h4').innerText = "Dashboard Overview";</script>

<?php
// Hitung Statistik
$total   = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM pengaduan"));
$baru    = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM pengaduan WHERE status='Baru'"));
$proses  = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM pengaduan WHERE status='Diproses'"));
$selesai = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM pengaduan WHERE status='Selesai'"));
?>

<div class="row">
    <!-- Card 1 -->
    <div class="col-md-3 mb-4">
        <div class="card stat-card bg-white p-3">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <small class="text-muted text-uppercase fw-bold">Total Laporan</small>
                    <h2 class="mb-0 fw-bold text-dark"><?php echo $total; ?></h2>
                </div>
                <div class="icon-box bg-primary">
                    <i class="fas fa-file-alt"></i>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Card 2 -->
    <div class="col-md-3 mb-4">
        <div class="card stat-card bg-white p-3">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <small class="text-muted text-uppercase fw-bold">Laporan Baru</small>
                    <h2 class="mb-0 fw-bold text-danger"><?php echo $baru; ?></h2>
                </div>
                <div class="icon-box bg-danger">
                    <i class="fas fa-bell"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Card 3 -->
    <div class="col-md-3 mb-4">
        <div class="card stat-card bg-white p-3">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <small class="text-muted text-uppercase fw-bold">Diproses</small>
                    <h2 class="mb-0 fw-bold text-warning"><?php echo $proses; ?></h2>
                </div>
                <div class="icon-box bg-warning text-dark">
                    <i class="fas fa-sync-alt"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Card 4 -->
    <div class="col-md-3 mb-4">
        <div class="card stat-card bg-white p-3">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <small class="text-muted text-uppercase fw-bold">Selesai</small>
                    <h2 class="mb-0 fw-bold text-success"><?php echo $selesai; ?></h2>
                </div>
                <div class="icon-box bg-success">
                    <i class="fas fa-check-circle"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card stat-card">
    <div class="card-header bg-white border-0 py-3">
        <h6 class="fw-bold mb-0"><i class="fas fa-history me-2"></i>5 Laporan Terakhir</h6>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-striped mb-0">
                <thead class="table-light">
                    <tr>
                        <th>Tgl</th>
                        <th>Pelapor</th>
                        <th>Isi Laporan</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $q = mysqli_query($koneksi, "SELECT * FROM pengaduan ORDER BY id_pengaduan DESC LIMIT 5");
                    while($d = mysqli_fetch_array($q)){
                    ?>
                    <tr>
                        <td><?php echo date('d/m/y', strtotime($d['tanggal_lapor'])); ?></td>
                        <td><?php echo htmlspecialchars($d['nama_pelapor']); ?></td>
                        <td class="text-truncate" style="max-width: 200px;"><?php echo htmlspecialchars($d['isi_laporan']); ?></td>
                        <td>
                            <?php if($d['status']=='Baru') echo '<span class="badge bg-danger">Baru</span>';
                            elseif($d['status']=='Diproses') echo '<span class="badge bg-warning text-dark">Proses</span>';
                            else echo '<span class="badge bg-success">Selesai</span>'; ?>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include 'layout_footer.php'; ?>