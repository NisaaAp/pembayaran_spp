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
    $qry_get_petugas=mysqli_query($koneksi,"select * from petugas where 
    id_petugas = '".$_GET['id_petugas']."'");
    $data_petugas=mysqli_fetch_array($qry_get_petugas);
    ?>

    
<div class="p-5 mb-4 bg-white text-primary">
    <div class="container">
        <div class="card">
            <h1 class="card-header">Ubah Petugas</h1>
            <div class="card-body">
        <form action="proses_ubah_petugas.php" method="post">
        <input type="hidden" name="id_petugas" value=  "<?=$data_petugas['id_petugas']?>">
    Nama Petugas :
        <input type="text" name="nama_petugas" value=   "<?=$data_petugas['nama_petugas']?>" class="form-control">
    Username : 
        <input type="text" name="username" value="<?=$data_petugas['username']?>" class="form-control">
    Password : 
        <input type="password" name="password" value="" class="form-control"><br>
    LEVEL : 
        <input type="text" name="level" value="<?=$data_petugas['level']?>" class="form-control">
        <button type="submit" class="btn btn-primary">Ubah Petugas</button><br><br>
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