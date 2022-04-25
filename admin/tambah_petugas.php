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
    
    include "koneksi.php";
    include "navbar.php";

    ?><br><br>

<div class="p-5 mb-4 bg-white text-primary">
    <div class="container"><br>
    <div class="card">
            <h1 class="card-header">Tambah Petugas</h1>
            <div class="card-body">

    <h2 class="text-center"></h2><br>
    <form action="proses_tambah_petugas.php" method="post"><br>
     Nama Petugas :
        <input type="text" name="nama_petugas" value="" placeholder=" Masukkan Nama Petugas" class="form-
            control"><br><br>
    Username :
        <input type="text" name="username" placeholder=" Masukkan Username" value="" class="form-
            control"><br><br>
    Password :
       <input type="password" name="password" value="" placeholder=" Masukkan Password" class="form-
            control"><br><br>
    LEVEL :
    <input type="text" name="level" value="" placeholder=" Masukkan Level Anda" class="form-
            control"><br><br>
         
            <button type="submit" class="btn btn-success">Tambah Petugas</button><br><br>
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

    <script src="assets/js/mazer.js"></script>
   
</body>
</html>