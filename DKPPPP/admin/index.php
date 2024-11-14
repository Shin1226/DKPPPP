<?php
include 'config.php';
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
$username = $_SESSION['username'];
$sql = "SELECT id, username, email, nama_lengkap, password FROM users WHERE username='$username'";
$result = $conn->query($sql);
$user = $result->fetch_assoc();

// Hitung jumlah foto
$query_foto = "SELECT COUNT(*) as total FROM gallery WHERE jenis_media = 'Gambar'";
$result_foto = $conn->query($query_foto);
$jumlahFoto = $result_foto->fetch_assoc()['total'];

// Hitung jumlah video
$query_video = "SELECT COUNT(*) as total FROM gallery WHERE link_video IS NOT NULL";
$result_video = $conn->query($query_video);
$jumlahVideo = $result_video->fetch_assoc()['total'];

// Hitung jumlah berita
$query_news = "SELECT COUNT(*) as total FROM news";
$result_news = $conn->query($query_news);
$jumlahBerita = $result_news->fetch_assoc()['total'];


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Dashboard for DKPPPP Admin Panel">
    <meta name="keywords" content="Admin, Dashboard, DKPPPP, Management">

    <title>Dashboard</title>

    <!-- Main CSS -->
    <link rel="stylesheet" href="assets/main.css">

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css">

    <!-- Theme style -->
    <link rel="stylesheet" href="assets/dist/css/adminlte.min.css">

    <!-- jQuery -->
    <script src="assets/plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap 4 -->
    <script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#"><i class="far fa-user"></i></a>
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
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper -->
        <div class="content-wrapper">
            <!-- Content Header -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Dashboard</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                            </ol>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Welcome Card with Box Section -->
            <section class="content">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Dashboard Manajemen</h3>
                    </div>
                    <div class="card-body text-center">
                        <h1>Welcome, <?php echo $user['nama_lengkap']; ?></h1>
                        <!-- Box Section -->
                        <div class="row mt-4">
                            <div class="col-md-4">
                                <div class="box">
                                    <img src="adminlte/AdminLTE-3.1.0/dist/img/beranda.png" alt="Home Icon">
                                    <a href="dashboard/manajemen_beranda.php" class="title">Manajemen Beranda</a>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="box">
                                    <img src="adminlte/AdminLTE-3.1.0/dist/img/profil.png" alt="Profile Icon">
                                    <a href="dashboard/manajemen_profil_beranda.php" class="title">Manajemen Profil</a>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="box">
                                    <img src="adminlte/AdminLTE-3.1.0/dist/img/client.png" alt="Client Icon">
                                    <a href="dashboard/manajemen_client.php" class="title">Manajemen Client</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer"></div>
                </div>
            </section>


            <!-- Chart Section -->
            <section class="content">
                <div class="row mt-4" style="justify-content: center;">
                    <!-- Media Chart Card -->
                    <div class="col-md-6" style="max-width: 300px;">
                        <div class="card" style="border: 1px solid #ddd; padding: 20px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
                            <div class="card-header">
                                <h5 class="card-title">Statistik Media</h5>
                            </div>
                            <div class="card-body text-center">
                                <!-- Ukuran canvas untuk pie chart -->
                                <canvas id="mediaChart" style="max-width: 200px; max-height: 200px;"></canvas>
                                <!-- Media Chart Script -->
                                <script>
                                    var jumlahFoto = <?php echo $jumlahFoto; ?>;
                                    var jumlahVideo = <?php echo $jumlahVideo; ?>;

                                    var ctxMedia = document.getElementById('mediaChart').getContext('2d');
                                    var mediaChart = new Chart(ctxMedia, {
                                        type: 'pie', // Pie chart for media
                                        data: {
                                            labels: ['Foto', 'Video'],
                                            datasets: [{
                                                label: 'Jumlah Media',
                                                data: [jumlahFoto, jumlahVideo],
                                                backgroundColor: [
                                                    'rgba(255, 99, 132, 0.7)',
                                                    'rgba(54, 162, 235, 0.7)'
                                                ],
                                                borderColor: [
                                                    'rgba(255, 99, 132, 1)',
                                                    'rgba(54, 162, 235, 1)'
                                                ],
                                                borderWidth: 1
                                            }]
                                        },
                                        options: {
                                            responsive: true,
                                            maintainAspectRatio: false,
                                            plugins: {
                                                legend: {
                                                    position: 'top',
                                                    labels: {
                                                        font: {
                                                            size: 12
                                                        }
                                                    }
                                                },
                                                tooltip: {
                                                    callbacks: {
                                                        label: function(context) {
                                                            let label = context.label || '';
                                                            let value = context.raw;
                                                            let total = context.dataset.data.reduce((a, b) => a + b, 0);
                                                            let percentage = (value / total * 100).toFixed(2) + '%';
                                                            return `${label}: ${value} (${percentage})`;
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                    });
                                </script>
                            </div>
                        </div>
                    </div>

                    <!-- News Chart Card -->
                    <div class="col-md-6" style="max-width: 300px;">
                        <div class="card" style="border: 1px solid #ddd; padding: 20px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
                            <div class="card-header">
                                <h5 class="card-title">Statistik Berita</h5>
                            </div>
                            <div class="card-body text-center">
                                <!-- Ukuran canvas untuk line chart -->
                                <canvas id="newsChart" style="max-width: 200px; max-height: 200px;"></canvas>
                                <!-- News Chart Script -->
                                <script>
                                    var jumlahBerita = <?php echo $jumlahBerita; ?>;

                                    var ctxNews = document.getElementById('newsChart').getContext('2d');
                                    var newsChart = new Chart(ctxNews, {
                                        type: 'line', // Line chart for news
                                        data: {
                                            labels: ['Berita'], // Can be extended with more labels if needed
                                            datasets: [{
                                                label: 'Jumlah Berita',
                                                data: [jumlahBerita], // Single data point for line chart
                                                backgroundColor: 'rgba(75, 192, 192, 0.7)',
                                                borderColor: 'rgba(75, 192, 192, 1)',
                                                borderWidth: 2,
                                                fill: false,
                                                pointRadius: 5
                                            }]
                                        },
                                        options: {
                                            responsive: true,
                                            maintainAspectRatio: false,
                                            plugins: {
                                                legend: {
                                                    position: 'top',
                                                    labels: {
                                                        font: {
                                                            size: 12
                                                        }
                                                    }
                                                },
                                                tooltip: {
                                                    callbacks: {
                                                        label: function(context) {
                                                            let label = context.dataset.label || '';
                                                            let value = context.raw;
                                                            return `${label}: ${value}`;
                                                        }
                                                    }
                                                }
                                            },
                                            scales: {
                                                y: {
                                                    beginAtZero: true // Ensure the Y-axis starts at 0
                                                }
                                            }
                                        }
                                    });
                                </script>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>


        <!-- Footer -->
        <footer class="main-footer">
            <div class="container text-center mt-4">
                <p>&copy; <strong>DKPPPP</strong> | 2024</p>
            </div>
        </footer>
    </div>

    <!-- Scripts -->
    <script src="assets/plugins/jquery/jquery.min.js"></script>
    <script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/dist/js/adminlte.min.js"></script>
</body>

</html>