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
    <h1>Data Siswa</h1>
    <form action = "tampil_siswa.php" method = "POST">
        <input type = "text" name = "cari" class = "form-control" placeholder = "Masukkan ID\Nama Siswa"/>
    </form>
    <br>
    <a href="tambah_siswa.php" class="btn btn-secondary">Tambah Siswa</a>
    <br><br>
    <table class="table table-primary table-striped">
  <thead>
    <tr>
      
      <th scope="col">NISN</th>
      <th scope="col">NIS</th>
      <th scope="col">Nama Siswa</th>
      <th scope="col">Alamat</th>
      <th scope="col">No. Telepon</th>
      <th scope="col">Username</th>
      <th scope="col">Nama Kelas</th>
      <th scope="col">Aksi</th>
      
    </tr>
  </thead>
  <tbody>
    <?php
    include "koneksi.php";
    if (isset($_POST["cari"])){
        //jika ada keyword pencarian
        $cari = $_POST['cari'];
        $query_siswa = mysqli_query($koneksi, "select * from siswa join kelas on kelas.id_kelas=siswa.id_kelas where siswa.nisn like '%$cari%' or siswa.nama like '%$cari%'");
    } else {
        //jika tidak ada keyword pencarian
        $query_siswa = mysqli_query($koneksi, "select * from siswa join kelas on kelas.id_kelas=siswa.id_kelas");
    }
    while ($data_siswa = mysqli_fetch_array($query_siswa)){?>
        <tr> 
            
            <td><?php echo $data_siswa["nisn"];?></td>
            <td><?php echo $data_siswa["nis"];?></td>
            <td><?php echo $data_siswa["nama"];?></td>
            <td><?php echo $data_siswa["alamat"];?></td>
            <td><?php echo $data_siswa["no_telp"];?></td>
            <td><?php echo $data_siswa["username"];?></td>
            <td><?php echo $data_siswa["nama_kelas"];?></td>

            <td><a
            href="ubah_siswa.php?nisn=<?=$data_siswa['nisn']?>"
            class="btn btn-dark">Ubah</a> 
            <br><br> <a
            href="hapusSiswa.php?nisn=<?=$data_siswa['nisn']?>"
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