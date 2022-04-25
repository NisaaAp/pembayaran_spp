<?php 
session_start();
  if($_SESSION['status_login']!=true) {
        header('location:index.php');
    }?><!DOCTYPE html>
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
        include "koneksi.php";
        $query_profil = mysqli_query($koneksi, "SELECT * FROM petugas 
        where id_petugas = '".$_SESSION['id_petugas']."'");
        $data_petugas=mysqli_fetch_array($query_profil);
        ?>
    
        <main class="container"> 
            <br><br><br>
            <h1 style="text-align: center;">Data Profil Anda</h1>
            <hr>
        <section class="container">
        <div class="col">
                <form action=""><input type="hidden" name="id_petugas" value="<?=$data_petugas['id_petugas']?>"></form>
                <table class="table table-hover table-striped mb-4">
                    <thead style="text-align: left;">
                    <tr>
                        <td>Nama</td>
                        <td>:</td>
                        <td><?=$data_petugas["nama_petugas"]?></td>
                    </tr>
                    <tr>
                        <td>Username</td>
                        <td>:</td>
                        <td><?=$data_petugas["username"]?></td>
                    </tr>
                    <tr>
                        <td>Password</td>
                        <td>:</td>
                        <td><?=$data_petugas["password"]?></td>
                    </tr>
                    <tr>
                        <td>LEVEL</td>
                        <td>:</td>
                        <td><?=$data_petugas["level"]?></td>
                    </tr>
                </thead>
            </table>
        </div>

        <a href="home.php" class="btn btn-secondary">Kembali ke halaman utama</a>
        <a href="tampil_petugas.php" class="btn btn-secondary">data petugas</a>
        <div style="float: right;">
            <a href="ubah_petugas.php?id_petugas=<?=$data_petugas['id_petugas']?>"
            class="btn btn-dark">Ubah Akun Ini</a> | <a
            href="hapus.php?id_petugas=<?=$data_petugas['id_petugas']?>"
            onclick="return confirm('Apakah anda yakin menghapus data ini?')" 
            class="btn btn-danger">Hapus Akun Ini</a> 
    </div>
        </section>        
        </main>   
    

        </div>
    </main>
    
<script src="assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>

    <script src="assets/vendors/apexcharts/apexcharts.js"></script>
    <script src="assets/js/pages/dashboard.js"></script>

    <script src="assets/js/mazer.js"></script>
<?php
include "footer.php";?>
</body>
</html>