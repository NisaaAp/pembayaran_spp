<?php 
session_start();
if(isset($_SESSION['status_login']) ) {
	include 'koneksi.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Laporan Pembayaran</title>
	
	<style >
		body{
			font-family: arial;
		}
		.print{
			margin-top: 10px;
		}
		@media print{
			.print{
				display: none;
			}
		}
		table{
			border-collapse: collapse;
		}
	</style>
</head>
<body>
	<h3>SMK SHANDY PUTRA MALANG<b><br/>LAPORAN PEMBAYARAN SPP</b></h3>
	<br/>
	<hr/>
	Tanggal <?= $_GET['tgl1']." -- ".$_GET['tgl2'];  ?>
	<br/>
	<br>
	<table border="1" cellspacing="" cellpadding="4" width="100%">
	<tr>
		<th>NO</th>
		<th>NISN</th>
		<th>NIS</th>
		<th>NAMA SISWA</th>
		<th>KELAS</th>
		<th>NO. BAYAR</th>
		<th>PEMBAYARAN BULAN</th>
		<th>JUMLAH</th>
		<th>KETERANGAN</th>
	</tr>
	<?php 
	$pembayaran = $koneksi -> query("SELECT siswa.nisn,siswa.nis,siswa.nama, kelas.nama_kelas ,pembayaran.nobayar, pembayaran.bulan, pembayaran.jumlah,pembayaran.ket
							FROM pembayaran INNER JOIN siswa ON siswa.nisn=pembayaran.nisn
                            JOIN kelas ON kelas.id_kelas = siswa.id_kelas 
							WHERE tgl_bayar BETWEEN '$_GET[tgl1]' AND '$_GET[tgl2]'
							ORDER BY nobayar ASC");
                            
	$i=1;
	$total = 0;
	while($dta=mysqli_fetch_array($pembayaran)) :
	 ?>
	<tr>
		<td align="center"><?= $i ?></td>
		<td align="center"><?= $dta['nisn'] ?></td>
		<td align="center"><?= $dta['nis'] ?></td>
		<td align=""><?= $dta['nama'] ?></td>
		<td align=""><?= $dta['nama_kelas'] ?></td>
		<td align=""><?= $dta['nobayar'] ?></td>
		<td align=""><?= $dta['bulan'] ?></td>
		<td align="right">Rp<?= $dta['jumlah'] ?></td>
		<td align="center"><?= $dta['ket'] ?></td>
	</tr>
	<?php $i++; ?>
	<?php $total += $dta['jumlah']; ?>

<?php endwhile; ?>
<tr>
		<td colspan="7" align="right">TOTAL</td>
		<td align="right"><b>Rp<?= $total ?></b></td>
		<td></td>
	</tr>
	</table>
<table width="100%">
	<tr>
		<td></td>
		<td width="200px">
			<BR/>
			<p>Malang , <?= date('d/m/y') ?> <br/>
				Admin,
			<br/>
			<br/>
			<br/>
		<p>__________________________</p>
		</td>
	</tr>
</table>


	<a  href="#" onclick="window.print();"><button class="print">CETAK</button></a>
</body>
</html>


<?php 
} else {
	header("location : login.php");
}
?>