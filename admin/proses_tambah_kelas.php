<?php 
session_start();
  if($_SESSION['status_login']!=true) {
        header('location:index.php');
    }?>
<?php
    if($_POST){
        $nama_kelas=$_POST['nama_kelas'];
        $jurusan=$_POST['jurusan'];
        


        include "koneksi.php";
        $input=mysqli_query($koneksi, "INSERT INTO kelas (nama_kelas,
        jurusan) value ('".$nama_kelas."','".$jurusan."')");
        if($input){
        echo "<script>alert('Berhasil');location.href='tambah_kelas.php';</script>";
        } else {
        echo "<script>alert('Gagal');location.href='tambah_kelas.php';</script>";
        }
        }
?>
