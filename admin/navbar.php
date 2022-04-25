
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
<div id="sidebar" class="active">
            <div class="sidebar-wrapper active" style="width: 230px;">
                <div class="sidebar-header">
                    <div class="d-flex justify-content-between">
                        <!-- <div class="logo">
                            <a href="index.html"><img src="assets/images/logo/logo.png" alt="Logo" srcset=""></a>
                        </div>
                        <div class="toggler">
                            <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                        </div> -->
                        <h2>SPP TELKOM</h2>
                    </div>
                </div>
                <div class="sidebar-menu">
                    <ul class="menu">
                        <li class="sidebar-title">Menu</li>

                        <li class="sidebar-item active ">
                            <a href="home.php" class='sidebar-link'>
                                <i class="bi bi-house-fill"></i>
                                <span>Home</span>
                            </a>
                        </li>
                        <li class="sidebar-item ">
                            <a href="tampil_siswa.php" class='sidebar-link'>
                                <i class="bi bi-people-fill"></i>
                                <span>Data Siswa</span>
                            </a>
                        </li>
                        <li class="sidebar-item ">
                            <a href="tampil_kelas.php" class='sidebar-link'>
                                <i class="bi bi-person-lines-fill"></i>
                                <span>Data Kelas</span>
                            </a>
                        </li>
                        <li class="sidebar-item ">
                            <a href="tampil_spp.php" class='sidebar-link'>
                                <i class="bi bi-card-text"></i>
                                <span>Data SPP</span>
                            </a>
                        </li>
            
                        <li class="sidebar-item  has-sub">
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-cash"></i>
                                <span>Transaksi</span>
                            </a>
                            <ul class="submenu ">
                                <li class="submenu-item ">
                                    <a href="transaksi.php">Entri Transaksi</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="history.php">History Pembayaran</a>
                                </li>
                            </ul>
                        </li>
                        <li class="sidebar-item ">
                            <a href="laporan.php" class='sidebar-link'>
                                <i class="bi bi-journal-text"></i>
                                <span>Laporan</span>
                            </a>
                        </li>

                        <li class="sidebar-item  has-sub">
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-person-badge-fill"></i>
                                <span>Profile</span>
                            </a>
                            <ul class="submenu ">
                                <li class="submenu-item ">
                                    <a href="profil_petugas.php">Profile Petugas</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="proses_logout.php">Log Out</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
            </div>
        </div>

</body>
</html>