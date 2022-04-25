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
  ?><br>

    <div class="container">
    <h1>Data SPP</h1>
    <!-- <form action = "tampil_spp.php" method = "POST">
        <input type = "text" name = "cari" class = "form-control" placeholder = "Masukkan ID SPP"/>
    </form> -->
    <br>
    <a href="tambah_spp.php" class="btn btn-secondary">Tambah SPP</a>
    <br><br>
    <table class="table table-primary table-striped">
  <thead>
    <tr>
      <th scope="col">ID SPP</th>
      <th scope="col">Nama Kelas</th>
      <th scope="col">Angkatan</th>
      <th scope="col">Tahun</th>
      <th scope="col">Nominal</th>
      <th scope="col">Aksi</th>
      
    </tr>
  </thead>
  <tbody>
    <?php
    include "koneksi.php";
    if (isset($_POST["cari"])){
        //jika ada keyword pencarian
        $cari = $_POST['cari'];
        $query_spp = mysqli_query($koneksi, "select * from spp join kelas on kelas.id_kelas=spp.id_kelas where spp.id_spp like '%$cari%' or spp.angkatan like '%$cari%'");
    } else {
        //jika tidak ada keyword pencarian
        $query_spp = mysqli_query($koneksi, "select * from spp join kelas on kelas.id_kelas=spp.id_kelas");
    }
    while ($data_spp = mysqli_fetch_array($query_spp)){?>
        <tr> 
            <td><?php echo $data_spp["id_spp"];?></td>
            <td><?php echo $data_spp["nama_kelas"];?></td>
            <td><?php echo $data_spp["angkatan"];?></td>
            <td><?php echo $data_spp["tahun"];?></td>
            <td><?php echo $data_spp["nominal"];?></td>

            <td><a
            href="ubah_spp.php?id_spp=<?=$data_spp['id_spp']?>"
            class="btn btn-dark">Ubah</a> | <a
            href="hapusSPP.php?id_spp=<?=$data_spp['id_spp']?>"
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
