<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

include 'config.php';

// Ambil data footer berdasarkan id
$id = $_GET['id'];
$query = "SELECT * FROM footer WHERE id = '$id' LIMIT 1";
$result = mysqli_query($conn, $query);

if ($result && mysqli_num_rows($result) > 0) {
    $footer = mysqli_fetch_assoc($result);
} else {
    echo "Data footer tidak ditemukan.";
    exit();
}

// Proses update data footer
if (isset($_POST['submit'])) {
    $alamat = mysqli_real_escape_string($conn, $_POST['alamat']);
    $telepon = mysqli_real_escape_string($conn, $_POST['telepon']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $twitter = mysqli_real_escape_string($conn, $_POST['twitter']);
    $youtube = mysqli_real_escape_string($conn, $_POST['youtube']);
    $instagram = mysqli_real_escape_string($conn, $_POST['instagram']);
    $facebook = mysqli_real_escape_string($conn, $_POST['facebook']);
    $google_map = mysqli_real_escape_string($conn, $_POST['google_map']);

    $updateQuery = "UPDATE footer SET 
                    alamat = '$alamat', 
                    telepon = '$telepon', 
                    email = '$email', 
                    twitter = '$twitter', 
                    youtube = '$youtube', 
                    instagram = '$instagram', 
                    facebook = '$facebook', 
                    google_map = '$google_map' 
                    WHERE id = '$id'";

    if (mysqli_query($conn, $updateQuery)) {
        echo "Data footer berhasil diperbarui!";
        header("Location: manajemen_footer.php"); // Arahkan ke halaman manajemen footer
        exit();
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Footer</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css">

    <!-- Theme style -->
    <link rel="stylesheet" href="assets/dist/css/adminlte.min.css">
</head>

<body class="hold-transition sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-user"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <a href="profile.php" class="dropdown-item">
                            <i class="fas fa-sign-out mr-2"></i> Profile
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="logout.php" class="dropdown-item">
                            <i class="fas fa-sign-out mr-2"></i> Logout
                        </a>
                    </div>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="index.php" class="brand-link">
                <img src="adminlte/AdminLTE-3.1.0/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">DKPPPP</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="adminlte/AdminLTE-3.1.0/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block"><?= $_SESSION['username'] ?></a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <li class="nav-item">
                            <a href="index.php" class="nav-link active">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>Dashboard</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="manajemenprofil.php" class="nav-link">
                                <i class="nav-icon fas fa-book"></i>
                                <p>Manajemen Profil<i class="right fas fa-angle-left"></i></p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item"><a href="manajemen_kepala_dinas.php" class="nav-link"><i class="far fa-circle nav-icon"></i>
                                        <p>Kepala Dinas</p>
                                    </a></li>
                                <li class="nav-item"><a href="manajemen_visi_misi.php" class="nav-link"><i class="far fa-circle nav-icon"></i>
                                        <p>Visi dan Misi</p>
                                    </a></li>
                                <li class="nav-item"><a href="manajemen_struktur_organisasi.php" class="nav-link"><i class="far fa-circle nav-icon"></i>
                                        <p>Struktur Organisasi</p>
                                    </a></li>
                                <li class="nav-item"><a href="manajemen_pegawai.php" class="nav-link"><i class="far fa-circle nav-icon"></i>
                                        <p>Pegawai</p>
                                    </a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="manajemenbidangupt.php" class="nav-link">
                                <i class="nav-icon fas fa-book"></i>
                                <p>Manajemen Bidang dan UPT<i class="right fas fa-angle-left"></i></p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item"><a href="manajemen_sekretariat.php" class="nav-link"><i class="far fa-circle nav-icon"></i>
                                        <p>Sekretariat</p>
                                    </a></li>
                                <li class="nav-item"><a href="manajemen_bidang_pertanian.php" class="nav-link"><i class="far fa-circle nav-icon"></i>
                                        <p>Bidang Pertanian</p>
                                    </a></li>
                                <li class="nav-item"><a href="manajemen_bidang_perikanan.php" class="nav-link"><i class="far fa-circle nav-icon"></i>
                                        <p>Bidang Perikanan</p>
                                    </a></li>
                                <li class="nav-item"><a href="manajemen_bidang_peternakan.php" class="nav-link"><i class="far fa-circle nav-icon"></i>
                                        <p>Bidang Peternakan</p>
                                    </a></li>
                                <li class="nav-item"><a href="manajemen_bidang_ketahanan_pangan.php" class="nav-link"><i class="far fa-circle nav-icon"></i>
                                        <p>Bidang Ketahanan Pangan</p>
                                    </a></li>
                                <li class="nav-item"><a href="manajemen_upt_dinas.php" class="nav-link"><i class="far fa-circle nav-icon"></i>
                                        <p>UPT Dinas</p>
                                    </a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="manajemenInformasi.php" class="nav-link">
                                <i class="nav-icon fas fa-book"></i>
                                <p>Manajemen Informasi<i class="right fas fa-angle-left"></i></p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item"><a href="manajementugasfungsi.php" class="nav-link"><i class="far fa-circle nav-icon"></i>
                                        <p>Tugas Pokok dan Fungsi</p>
                                    </a></li>
                                <li class="nav-item"><a href="manajemenpengumuman.php" class="nav-link"><i class="far fa-circle nav-icon"></i>
                                        <p>Pengumuman</p>
                                    </a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="manajemenberita.php" class="nav-link"><i class="nav-icon fas fa-book"></i>
                                <p>Manajemen Berita</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="manajemengalary.php" class="nav-link"><i class="nav-icon fas fa-book"></i>
                                <p>Manajemen Galeri</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="manajemen_footer.php" class="nav-link"><i class="nav-icon fas fa-book"></i>
                                <p>Manajemen Footer</p>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Manajemen Footer</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                                <li class="breadcrumb-item active">Manajemen Footer</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main Content -->
            <section class="content">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Edit Footer</h3>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="footer_edit.php?id=<?php echo $footer['id']; ?>">
                            <div class="form-group">
                                <label>Alamat:</label>
                                <input type="text" name="alamat" class="form-control" value="<?php echo htmlspecialchars($footer['alamat']); ?>" required>
                            </div>
                            <div class="form-group">
                                <label>Telepon:</label>
                                <input type="text" name="telepon" class="form-control" value="<?php echo htmlspecialchars($footer['telepon']); ?>" required>
                            </div>
                            <div class="form-group">
                                <label>Email:</label>
                                <input type="email" name="email" class="form-control" value="<?php echo htmlspecialchars($footer['email']); ?>" required>
                            </div>
                            <div class="form-group">
                                <label>Twitter:</label>
                                <input type="text" name="twitter" class="form-control" value="<?php echo htmlspecialchars($footer['twitter']); ?>">
                            </div>
                            <div class="form-group">
                                <label>Youtube:</label>
                                <input type="text" name="youtube" class="form-control" value="<?php echo htmlspecialchars($footer['youtube']); ?>">
                            </div>
                            <div class="form-group">
                                <label>Instagram:</label>
                                <input type="text" name="instagram" class="form-control" value="<?php echo htmlspecialchars($footer['instagram']); ?>">
                            </div>
                            <div class="form-group">
                                <label>Facebook:</label>
                                <input type="text" name="facebook" class="form-control" value="<?php echo htmlspecialchars($footer['facebook']); ?>">
                            </div>
                            <div class="form-group">
                                <label>Google Map Embed Code:</label>
                                <textarea name="google_map" class="form-control" rows="3"><?php echo htmlspecialchars($footer['google_map']); ?></textarea>
                            </div>
                            <div class="form-group">
                                <label>Copyright:</label>
                                <input type="text" name="copyright" class="form-control" value="<?php echo htmlspecialchars($footer['copyright']); ?>" required>
                            </div>
                            <!-- Tombol aksi -->
                            <button type="submit" name="submit" class="btn btn-primary">Update</button>
                            <a href="manajemen_footer.php" class="btn btn-secondary">Cancel</a>
                        </form>
                    </div>
                </div>
                <!-- /.card -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Footer -->
        <footer class="main-footer">
            <div class="container text-center mt-4">
                <p>&copy; <strong>DKPPPP</strong> | 2024</p>
            </div>
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="assets/dist/js/adminlte.min.js"></script>

</body>

</html>