<?php
    if($_POST){
        $id_kelas=$_POST["id_kelas"];
        $nama_kelas=$_POST["nama_kelas"];
        $jurusan=$_POST['jurusan'];
        
       

        if (empty($nama_kelas)) {
            echo "<script>alert('nama kelas tidak boleh kosong');location.href='tambah_kelas.php';</script>";
        }
        elseif (empty($jurusan)) {
            echo "<script>alert('jurusan tidak boleh kosong');location.href='tambah_kelas.php';</script>";
        } else {
            include "koneksi.php";
            $update=mysqli_query($koneksi, "UPDATE kelas set id_kelas='".$id_kelas."', nama_kelas='".$nama_kelas."',jurusan='".$jurusan."' where id_kelas= '".$id_kelas."'") or die(mysqli_error($koneksi));
                if($update){
        echo "<script>alert('Berhasil update');location.href='tampil_kelas.php';</script>";
        }      else {
        echo "<script>alert('Gagal update');location.href='ubah_kelas.php?id_kelas=".$id_kelas."';</script>";
        }
    }
 }
        
          
    ?>

