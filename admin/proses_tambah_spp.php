<?php
    if($_POST){
        $angkatan=$_POST['angkatan'];
        $tahun=$_POST['tahun'];
        $nominal=$_POST['nominal'];
        $id_kelas=$_POST['id_kelas'];


        include "koneksi.php";
        $input=mysqli_query($koneksi, "INSERT INTO spp (angkatan, tahun, nominal,
        id_kelas) value ('".$angkatan."','".$tahun."','".$nominal."','".$id_kelas."')");
        if($input){
        echo "<script>alert('Berhasil');location.href='tampil_spp.php';</script>";
        } else {
        echo "<script>alert('Gagal');location.href='tambah_spp.php';</script>";
        }
        }
  

?>