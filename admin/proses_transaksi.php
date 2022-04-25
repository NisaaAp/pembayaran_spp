<?php 
session_start();
// echo "tes";
if(isset($_SESSION['status_login']) ) {
	
	include 'koneksi.php';
	if($_GET['act']=='bayar') {
		$id_pembayaran = $_GET['id_pembayaran'];
		$nisn   = $_GET['nisn'];

		
		$today =date("ymd");
		$query =mysqli_query($koneksi , "SELECT max(nobayar) AS last FROM pembayaran WHERE nobayar LIKE '$today%'");
		$data = mysqli_fetch_assoc($query);
		$lastNobayar = $data['last'];
		$lastNoUrut  = substr($lastNobayar, 6 ,4);
		$nextNoUrut  = $lastNoUrut;
		$nextNobayar = $today.sprintf('%04s' , $nextNoUrut);

		// tanggal bayar
		$tgl_bayar = date('Y-m-d');

		// id petugas
		$id_petugas = $_SESSION['id_petugas'];

		$q ="UPDATE pembayaran SET 
		nobayar = '$nextNobayar',
		tgl_bayar = '$tgl_bayar',
		ket = 'LUNAS',
		id_petugas = '$id_petugas' 
		WHERE id_pembayaran = '$id_pembayaran'";
		echo "tes";
		$byr = mysqli_query($koneksi ,$q);

		if ($byr) {
			
			header('location: transaksi.php?nisn='.$nisn);
		}else {
			echo "
			<script>
			alert('gagal')
			</script>
			";

		}
		
	}
	else if($_GET['act']=='batal'){
	    $id_pembayaran = $_GET['id_pembayaran'];
		$nisn   = $_GET['nisn'];

		$batal = mysqli_query($koneksi ,"UPDATE pembayaran SET 
			nobayar = null,
			tgl_bayar = null,
			ket = null,
			ida_petugas = null 
			WHERE id_pembayaran = '$id_pembayaran'");

			if ($batal) {
				header('location: transaksi.php?nisn='.$nisn);
		}
	}
}
 ?>