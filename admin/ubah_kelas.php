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
    include "koneksi.php";
    $qry_get_kelas=mysqli_query($koneksi,"SELECT * FROM kelas where 
    id_kelas = '".$_GET['id_kelas']."'");
    $data_kelas=mysqli_fetch_array($qry_get_kelas);
    ?>

<div class="p-5 mb-4 bg-white text-primary">
    <div class="container">
        <div class="card">
            <h1 class="card-header">Ubah Kelas</h1>
            <div class="card-body">
            <form action="proses_ubah_kelas.php" method="post">
                <input type="hidden" name="id_kelas" value="<?=$data_kelas['id_kelas']?>">
    Nama Kelas :
            <input type="text" name="nama_kelas" value="<?=$data_kelas['nama_kelas']?>" class="form-control"><br>
    Jurusan :
            <input type="text" name="jurusan" value="<?=$data_kelas['jurusan']?>" class="form-control">
            <br>

            <button type="submit" class="btn btn-primary">Ubah Kelas</button><br><br>
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


  