
<?php
include "koneksi.php";
session_start();
    if($_POST){
        $nisn=$_POST['nisn'];
        $nis=$_POST['nis'];
        $nama=$_POST['nama'];
        $alamat=$_POST['alamat'];
        $no_telp=$_POST['no_telp'];
        $username=$_POST['username'];
        $password=$_POST['password'];
        $awaltempo	 = $_POST['jatuhtempo'];
        $id_kelas=$_POST['id_kelas'];

        $bulanIndo =[
            '01' => 'januari',
            '02' => 'Februari',
            '03' => 'Maret',
            '04' => 'April',
            '05' => 'Mei',
            '06' => 'Juni',
            '07' => 'Juli',
            '08' => 'Agustus',
            '09' => 'September',
            '10' => 'Oktober',
            '11' => 'November',
            '12' => 'Desember',
        ];
   
        if (empty($nama)) {
            echo "<script>alert('nama siswa tidak boleh kosong');location.href='tambah_siswa.php';</script>";
        }

        elseif (empty($username)) {
            echo "<script>alert('username siswa tidak boleh kosong');location.href='tambah_siswa.php';</script>";
        }

        elseif (empty($password)) {
            echo "<script>alert('password siswa tidak boleh kosong');location.href='tambah_siswa.php';</script>";
        
        }else {
            $simpan = mysqli_query($koneksi,"INSERT INTO siswa(nisn, nis, nama, alamat, no_telp,  username, password, id_kelas)
            value
            ('".$nisn."','".$nis."','".$nama."','".$alamat."','".$no_telp."','".$username."','".md5($password)."','".$id_kelas."')") or die(mysqli_error($koneksi));
            
            if(!$simpan) {
                echo "<script>alert('Gagal menambahkan siswa');location.href='tambah_siswa.php';</script>";
            
            }else {
                // ambil data id terakhir
                $data_siswa =mysqli_fetch_array(mysqli_query($koneksi, "SELECT nisn,id_kelas FROM siswa where nisn = '".$nisn."'"));
                // $nisn = $data_siswa['nisn'];
                // var_dump($idsiswa); die;
                // taggihan dan simpan di tabel spp
                for ($i=0 ; $i<12;$i++){
                    // tanggal jatuh tempo setiap tanggal 10
                    $jatuhtempo = date("Y-m-d" , strtotime("+$i month" , strtotime($awaltempo)));
   
                    $bulan     = $bulanIndo[date('m' ,strtotime($jatuhtempo))]."  ".date('Y', strtotime($jatuhtempo));

                    $data_spp =mysqli_fetch_array(mysqli_query($koneksi, "SELECT nominal,id_spp FROM spp where id_kelas = ".$data_siswa['id_kelas']." "));
                    $nominal = $data_spp['nominal'];
                    $id_spp = $data_spp['id_spp'];

                    // simpan data
                    $add = mysqli_query($koneksi,"INSERT INTO pembayaran (id_petugas, nisn , jatuhtempo, bulan, jumlah,id_spp) VALUES (".$_SESSION['id_petugas'].", '".$nisn."','".$jatuhtempo."','".$bulan."','".$nominal."',".$id_spp.")");
                    if(!$add){
                        echo "error";
                    }
                    
                }
                // var_dump($add);
                header('Location: tambah_siswa.php');
                
                
            }
        }
    }
   
   
    
?>
      