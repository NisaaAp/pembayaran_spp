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
    $qry_get_siswa=mysqli_query($koneksi,"select * from siswa where 
    nisn = '".$_GET['nisn']."'");
    $data_siswa=mysqli_fetch_array($qry_get_siswa);
    ?>

    
<div class="p-5 mb-4 bg-white text-primary">
    <div class="container">
        <div class="card">
            <h1 class="card-header">Ubah Siswa</h1>
            <div class="card-body">
        <form action="proses_ubah_siswa.php" method="post">

        <input type="hidden" name="nisn" value=  "<?=$data_siswa['nisn']?>">
    NIS :
        <input type="text" name="nis" value=   "<?=$data_siswa['nis']?>" class="form-control">
  
    Nama Siswa :
        <input type="text" name="nama" value=   "<?=$data_siswa['nama']?>" class="form-control">
    Alamat : 
        <textarea name="alamat" class="form-control" rows="4"><?=$data_siswa['alamat']?></textarea>
    No. Telepon :
        <input type="text" name="no_telp" value=   "<?=$data_siswa['no_telp']?>" class="form-control">
    Kelas :
        <select name="id_kelas" class="form-control">
            <option></option>
            <?php 
            include "koneksi.php";
            $qry_kelas=mysqli_query($koneksi,"select * from kelas");
            while($data_kelas=mysqli_fetch_array($qry_kelas)){
                if($data_kelas['id_kelas']==$data_siswa['id_kelas']){
                    $selek="selected";
                } else {
                    $selek="";
                }
            echo '<option value="'.$data_kelas['id_kelas'].'" '.$selek.'>'.$data_kelas['nama_kelas'].'</option>';   
            }
            ?>
        </select>
    Jatuh Tempo :
 				<input class="form-control" type="text" name="jatuhtempo" value="2022-07-10" >
 			
    Username : 
        <input type="text" name="username" value="<?=$data_siswa['username']?>" class="form-control">
    Password : 
        <input type="password" name="password" value="" class="form-control"><br>

        <button type="submit" class="btn btn-primary">Ubah Siswa</button><br><br>
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