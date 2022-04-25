<?php 
session_start();
  if($_SESSION['status_login']!=true) {
        header('location:index.php');
    }?>
    
    <?php 
    if($_GET['id_spp']){
        include "koneksi.php";
        $qry_hapus=mysqli_query($koneksi,"delete from spp where id_spp='".$_GET['id_spp']."'");
        if($qry_hapus){
            echo "<script>alert('Sukses hapus data spp');location.href='tampil_spp.php';</script>";
        } else {
            echo "<script>alert('Gagal hapus data spp');location.href='tampil_spp.php';</script>";
        }
    }
?>
