<?php
if($_POST){
    $nisn=$_POST["nisn"];
    $nis=$_POST["nis"];
    $nama=$_POST["nama"];
    $alamat=$_POST["alamat"];
    $no_telp=$_POST["no_telp"];
    $username=$_POST["username"];
    $password=$_POST["password"];
    $id_kelas=$_POST["id_kelas"];

    if(empty($nama)){
        echo "<script>alert('nama siswa tidak boleh kosong');location.href='tambah_siswa.php';</script>";
 
    } elseif(empty($username)){
        echo "<script>alert('username tidak boleh kosong');location.href='tambah_siswa.php';</script>";
    } else {
        include "koneksi.php";
        if(empty($password)){
            $update=mysqli_query($koneksi,"update siswa set nisn='".$nisn."', nis='".$nis."', nama='".$nama."', alamat='".$alamat."', no_telp='".$no_telp."', username='".$username."', id_kelas='".$id_kelas."' where nisn = '".$nisn."' ") or die(mysqli_error($koneksi));
            if($update){
                echo "<script>alert('Sukses update siswa');location.href='tampil_siswa.php';</script>";
            } else {
                echo "<script>alert('Gagal update siswa');location.href='ubah_siswa.php?nisn=".$nisn."';</script>";
            }
        } else {
            $update=mysqli_query($koneksi,"update siswa set nisn='".$nisn."', nis='".$nis."', nama='".$nama."', alamat='".$alamat."', no_telp='".$no_telp."', username='".$username."', password='".md5($password)."', id_kelas='".$id_kelas."' where nisn = '".$nisn."'") or die(mysqli_error($koneksi));
            if($update){
                echo "<script>alert('Sukses update siswa');location.href='tampil_siswa.php';</script>";
            } else {
                echo "<script>alert('Gagal update siswa');location.href='ubah_siswa.php?nisn=".$nisn."';</script>";
            }
        }
        
    } 
}
?>

