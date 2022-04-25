<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Pelanggan </title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

</head>
<body>
    <?php
        include "navbar.php"; 
        include "koneksi.php";
        $query_profil = mysqli_query($koneksi, "SELECT * FROM siswa  join kelas on kelas.id_kelas=siswa.id_kelas
        where siswa.nisn = '".$_SESSION['nisn']."'");
        
        $data_siswa=mysqli_fetch_array($query_profil);
        ?>
    
        <main class="container"> 
            <br><br><br>
            <h1 style="text-align: center;">Data Profil Anda</h1>
            <hr>
        <section class="container">
        <div class="col">
                <form action=""><input type="hidden" name="nisn" value="<?=$data_siswa['nisn']?>"></form>
                <table class="table table-hover table-striped mb-4">
                    <thead style="text-align: left;">
                    <tr>
                        <td>NISN</td>
                        <td>:</td>
                        <td><?=$data_siswa["nisn"]?></td>
                    </tr>
                    <tr>
                        <td>NIS</td>
                        <td>:</td>
                        <td><?=$data_siswa["nis"]?></td>
                    </tr>
                    <tr>
                        <td>Nama</td>
                        <td>:</td>
                        <td><?=$data_siswa["nama"]?></td>
                    </tr>
                    <tr>
                        <td>Kelas</td>
                        <td>:</td>
                        <td><?=$data_siswa["nama_kelas"]?></td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td>:</td>
                        <td><?=$data_siswa["alamat"]?></td>
                    </tr>
                    <tr>
                        <td>No. Telepon</td>
                        <td>:</td>
                        <td><?=$data_siswa["no_telp"]?></td>
                    </tr>
                    <tr>
                        <td>Username</td>
                        <td>:</td>
                        <td><?=$data_siswa["username"]?></td>
                    </tr>
                </thead>
            </table>
        </div>

        <a href="home.php" class="btn btn-success">Kembali ke halaman utama</a>
        </section>        
        </main>   
    <?php
        include "footer.php";
    ?>


</body>
</html>