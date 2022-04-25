
<?php 
session_start();
  if($_SESSION['status_login']!=true) {
        header('location:index.php');
    }?>`<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Mazer Admin Dashboard</title>
    
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
        include "koneksi.php";
        include "navbar.php";
    ?>
    <br></br>
    <div class="Container col-md-9" style="border-color:blue; background-color:white; text-align:left;">
        <div class="card-header" style="color:white; background-color:white; text-align:left">
        
            <h2>History Pembayaran</h2>
            <br>
            <form action="history.php" method="post" class="d-flex">
            <Input class="form-control me-2" type="search" name="cari" placeholder="search">
            </form> 
        </div>
        <div class="card-body">
            <table class="table"> 
            <thead>
        <tr style="color:blue;">
            <th scope="col">id petugas</th>
            <th scope="col">Nisn</th>
            <th scope="col">Nama</th>
            <th scope="col">Tanggal Bayar</th>
            <th scope="col">Spp Bulan</th>
            <th scope="col">Spp Status</th>
        </tr>
        </thead>
    <tbody style="color:white;">
        <?php
        include "koneksi.php";
        if (isset($_POST["cari"])){
            $cari =  $_POST['cari'];
            $query_bayar = mysqli_query($koneksi,
            "SELECT * FROM pembayaran where bulan = ' $cari ' or nisn like '$cari%' and ket='LUNAS' ORDER BY bulan DESC");
        }else {
            //jika tidak ada keyword pencarian 
            $query_bayar = mysqli_query($koneksi,"select * from pembayaran where ket='LUNAS' ORDER BY bulan DESC");
        }
        while ($data_byr=mysqli_fetch_array($query_bayar)) { ?>
        <?php
        $query_siswa = mysqli_query($koneksi, "select * from pembayaran join siswa on siswa.nisn=pembayaran.nisn where siswa.nisn = '".$data_byr['nisn']."' and ket='LUNAS'");
        $data_siswa = mysqli_fetch_array($query_siswa);
        ?>
              <tr style="color:blue">
              <input type="hidden" value="<?php echo $data_bayar['id_pembayaran']?>">
                  <td><?php echo $data_byr["id_petugas"]; ?></td>
                  <td><?php echo $data_byr["nisn"]; ?></td>
                  <td><?php echo $data_siswa["nama"]?></td>
                  <td><?php echo $data_byr["tgl_bayar"]; ?></td>
                  <td><?php echo $data_byr["bulan"];?></td>
                  <td><?php echo $data_byr["ket"];?></td>

                  
              </tr>
            <?php
            }
            ?>
        </tbody>
            <br>
        </table><a href="transaksi.php" class="btn btn-outline-dark">pembayaran</a> 

        </div>
    </main>
   
    <script src="assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>

    <script src="assets/vendors/apexcharts/apexcharts.js"></script>
    <script src="assets/js/pages/dashboard.js"></script>

    <script src="assets/js/mazer.js"></script>
        </div>  
    </div>
</body>
</html>