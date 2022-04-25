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
    include "navbar.php";
    ?><br><br>

<div class="p-5 mb-4 bg-white text-primary">
    <div class="container"><br>
    <div class="card">
            <h1 class="card-header"></h1>
            <div class="card-body">

    <h2 class="text-center">Tambah Data SPP</h2><br>
    <form action="proses_tambah_spp.php" method="post">
    Kelas :
        <select name="id_kelas" class="form-control">
        <option selected>--Pilih Kelas--</option> 
        <?php
            include "koneksi.php";
            $qry_kelas=mysqli_query($koneksi, "select * from kelas");
            while($data_kelas=mysqli_fetch_array($qry_kelas)){
            echo '<option
            value="'.$data_kelas['id_kelas'].'">'.$data_kelas['nama_kelas'].'</option>';
        }
        ?>
        </select><br><br>
    Angkatan :
        <input type="number" name="angkatan" value="" placeholder=" Masukkan Angkatan" class="form-
            control"><br><br>
    Tahun :
        <input type="number" name="tahun" value="" placeholder=" Masukkan Tahun Masuk Anda" class="form-control"><br>
    Nominal :
        <input type="number" name="nominal" value="" placeholder=" Masukkan Nominal Pembayaran" class="form-control"><br>
    
        
    <button type="submit" class="btn btn-primary">Tambah Data SPP</button><br><br>
    </form>
            </div>
    </div>
    </div>
</div>

        </div>
    </main>

<script src="assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>

    <script src="assets/vendors/apexcharts/apexcharts.js"></script>
    <script src="assets/js/pages/dashboard.js"></script>

    <script src="assets/js/mazer.js"></script></div>
</body>
</html>