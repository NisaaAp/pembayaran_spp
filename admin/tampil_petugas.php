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
    ?>
    <br><br>
    <div class="container">
    <h1>Data Petugas</h1>
    <form action = "tampil_petugas.php" method = "POST">
        <input type = "text" name = "cari" class = "form-control" placeholder = "Masukkan ID\Nama Petugas"/>
    </form><br><br>
    <a href="tambah_petugas.php" class="btn btn-secondary">Tambah Petugas</a><br><br>
    <table class="table table-primary table-striped">
  <thead>
    <tr>
      <th scope="col">ID Petugas</th>
      <th scope="col">Nama Petugas</th>
      <th scope="col">Username</th>
      <th scope="col">Level</th>
      <th scope="col">Aksi</th>
      
    </tr>
  </thead>
  <tbody>
    <?php
    include "koneksi.php";
    
    if (isset($_POST["cari"])){
        //jika ada keyword pencarian
        $cari = $_POST['cari'];
        $query_petugas = mysqli_query($koneksi, "select * from petugas where id_petugas like '%$cari%' or nama_petugas like '%$cari%'");
    } else {
        //jika tidak ada keyword pencarian
        $query_petugas = mysqli_query($koneksi, "select * from petugas");
    }
    while ($data_petugas = mysqli_fetch_array($query_petugas)){?>
        <tr> 
            <td><?php echo $data_petugas["id_petugas"];?></td>
            <td><?php echo $data_petugas["nama_petugas"];?></td>
            <td><?php echo $data_petugas["username"];?></td>
            <td><?php echo $data_petugas["level"];?></td>

            <td><a
            href="ubah_petugas.php?id_petugas=<?=$data_petugas['id_petugas']?>"
            class="btn btn-dark">Ubah</a> | <a
            href="hapus.php?id_petugas=<?=$data_petugas['id_petugas']?>"
            onclick="return confirm('Apakah anda yakin menghapus data ini?')" 
            class="btn btn-danger">Hapus</a>
            </td>

        </tr>
    <?php
    }
    ?>
  </tbody>
</table>

        </div>
    </main>
 <br>
   
<script src="assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>

    <script src="assets/vendors/apexcharts/apexcharts.js"></script>
    <script src="assets/js/pages/dashboard.js"></script>

    <script src="assets/js/mazer.js"></script>
    <?php
    include "footer.php";
    ?>
  </body>
</html>