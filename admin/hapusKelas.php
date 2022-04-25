<?php 
session_start();
  if($_SESSION['status_login']!=true) {
        header('location:index.php');
    }?>
<?php 
    if($_GET['id_kelas']){
        include "koneksi.php";
        $qry_hapus=mysqli_query($koneksi,"delete from kelas where id_kelas='".$_GET['id_kelas']."'");
        if($qry_hapus){
            echo "<script>alert('Sukses hapus data kelas');location.href='tampil_kelas.php';</script>";
        } else {
            echo "<script>alert('Gagal hapus data kelas');location.href='tampil_kelas.php';</script>";
        }
    }
?>
