<?php 
session_start();
  if($_SESSION['status_login']!=true) {
        header('location:index.php');
    }?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SPP SMK TELKOM</title>
    
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    
<link rel="stylesheet" href="assets/vendors/iconly/bold.css">

    <link rel="stylesheet" href="assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="assets/css/app.css">
    <link rel="shortcut icon" href="assets/images/favicon.svg" type="image/x-icon">
</head>
<body> 
<main>
        <div id="main">

		<?php 
include 'koneksi.php';
include 'navbar.php';

 ?>

 <div class="container">
	<div class="page-header">
<h2>CARI SISWA BERDASARKAN NISN</h2>
	</div>
 <form action="" method="get">
 	<table class="table">
 		<tr>
 			<td>NISN</td>
 			<td>:</td>
 			<td>
 				<input class="form-control" type="text" name="nisn">
 			</td>
 			<td>
 				<button class="btn btn-dark" type="submit">Cari</button>
 			</td>
 		</tr>
 		
 	</table>
 </form>

<?php 
if (isset($_GET['nisn']) != ''){
	$data_siswa = mysqli_query($koneksi, "SELECT * FROM siswa
	join kelas on kelas.id_kelas=siswa.id_kelas
    join spp on spp.id_kelas=kelas.id_kelas
    WHERE nisn = '$_GET[nisn]'");
	$data_sw = mysqli_fetch_assoc($data_siswa);
	$nisn = $data_sw['nisn'];
	//knp butuh variabel nisn?>



						<div class="panel panel-info">
							<div class="panel-heading">
						<h3>Biodata Siswa</h3>
						</div>
						<div class="panel panel-body">
							<table class="table table-bordered table-striped">
								<tr>
									<td>NISN</td>
									<td><?= $data_sw['nisn'] ?></td>
								</tr>
								<tr>
									<td>Nama Siswa</td>
									<td><?= $data_sw['nama'] ?></td>
								</tr>
								<tr>
									<td>Kelas</td>
									<td><?= $data_sw['nama_kelas'] ?></td>
								</tr>
								<tr>
									<td>Tahun ajaran </td>
									<td><?= $data_sw['tahun'] ?></td>
								</tr>
							</table>
						</div>
						</div>

							<div class="panel panel-info">
								<div class="panel-heading">
							<h3>Tagihan SPP Siswa</h3>
							</div>
							<div class="panel-body ">
								<table class="table table-bordered table-striped">
							<tr>
								<th>NO</th>
								<th>ID Petugas</th>
								<th>Bulan</th>
								<th>jatuh tempo</th>
								<th>Tanggal Bayar</th>
								<th>No bayar</th>
								<th>Jumlah</th>
								<th>Keterangan</th>
								<th>Bayar</th>
								
							</tr>

							<?php

							include 'koneksi.php';
							$sql = mysqli_query($koneksi, "SELECT * FROM pembayaran 
							JOIN siswa ON pembayaran.nisn = siswa.nisn
							JOIN spp ON pembayaran.id_spp = spp.id_spp where pembayaran.nisn = '$_GET[nisn]'
							ORDER BY jatuhtempo ASC");


							echo mysqli_error($koneksi);
							$no=1;
							while($d=mysqli_fetch_assoc($sql)){
								echo "<tr>
									<td>$no</td>
									<td>$_SESSION[id_petugas]</td>
									<td>$d[bulan]</td>
									<td>$d[jatuhtempo]</td>
									<td>$d[tgl_bayar]</td>
									<td>$d[nobayar]</td>
									<td>Rp$d[jumlah]</td>
									<td>$d[ket]</td>
									
									<td align='center'>";
										if($d['nobayar']==''){
											?>
											<a
										href="proses_transaksi.php?nisn=<?=$nisn?>&act=bayar&id_pembayaran=<?=$d['id_pembayaran']?>"
										onclick="return confirm('Apakah anda yakin ingin membayar ini?')" 
										class="btn btn-danger">Bayar</a>
										<?php
										}else{
											echo "<a class='btn btn-success btn-sm' href='cetak_slip_transaksi.php?nisn=$nisn&act=bayar&id_pembayaran=$d[id_pembayaran]' target='_blank'>Cetak</a> ";
										}
									echo "</td>
								</tr>";
								$no++;
							}
							?>
							</table>
																
							<p style="color: red;">Pembayaran dilakukan dengan cara mencari tagihan siswa berdasarkan NISN </p>

										</div></div>
									</div>
									</div>
									<?php 
}
?>
								</main>
								

 </div>
 <script src="assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>

    <script src="assets/vendors/apexcharts/apexcharts.js"></script>
    <script src="assets/js/pages/dashboard.js"></script>

    <script src="assets/js/mazer.js"></script>
	<br><br><br><br><br><br><br><br><br><br><br><br><?php
	include "footer.php";?>
</body>
</html>