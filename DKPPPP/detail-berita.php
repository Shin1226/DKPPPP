<?php
include 'config.php';

// Validasi parameter `id`
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die("ID berita tidak valid!");
}

$id = (int)$_GET['id'];

// Query berita berdasarkan ID
$stmt = $conn->prepare("SELECT * FROM news WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

// Jika berita tidak ditemukan
if ($result->num_rows == 0) {
    die("Berita tidak ditemukan!");
}

$row = $result->fetch_assoc();

// Query untuk semua berita (digunakan untuk bagian "Postingan Berita")
$sql_all_news = "SELECT * FROM news ORDER BY created_at DESC";
$result_news = $conn->query($sql_all_news);

if (!$result_news) {
    die("Error saat mengambil semua berita: " . $conn->error);
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Berita - DKPPPP</title>
    <meta name="description" content="">
    <meta name="keywords" content="">

    <!-- Favicons -->
    <link href="assets/img/logo-dinas.png" rel="icon">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&family=Poppins:wght@100;200;300;400;500;600;700;800;900&family=Raleway:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Main CSS File -->
    <link href="assets/css/main.css" rel="stylesheet">
</head>

<body class="index-page">

    <header id="header" class="header d-flex align-items-center sticky-top">
        <div class="container-fluid container-xl position-relative d-flex align-items-center">
            <a href="index.php" class="logo d-flex align-items-center me-auto">
                <img src="assets/img/logo-2.png" alt="Sailor">
            </a>
            <nav id="navmenu" class="navmenu">
                <ul>
                    <li><a href="index.php" class="active">Beranda</a></li>
                    <li class="dropdown">
                        <a><span>Profil</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                        <ul>
                            <li><a href="kepala-dinas.php">Kepala Dinas</a></li>
                            <li><a href="visi-dan-misi.php">Visi dan Misi</a></li>
                            <li><a href="struktur-organisasi.php">Struktur Organisasi</a></li>
                            <li><a href="pegawai.php">Pegawai</a></li>
                            <li class="dropdown">
                                <a href="#"><span>Bidang dan UPT</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                                <ul>
                                    <li><a href="sekretariat.php">Sekretariat</a></li>
                                    <li><a href="bidang-pertanian.php">Bidang Pertanian</a></li>
                                    <li><a href="bidang-perikanan.php">Bidang Perikanan</a></li>
                                    <li><a href="bidang-peternakan.php">Bidang Peternakan</a></li>
                                    <li><a href="bidang-ketahanan-pangan.php">Bidang Ketahanan Pangan</a></li>
                                    <li><a href="upt-dinas.php">UPT Dinas</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a><span>Informasi</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                        <ul>
                            <li><a href="tugas-pokok-dan-fungsi.php">Tugas Pokok dan Fungsi</a></li>
                            <li><a href="pengumuman.php">Pengumuman</a></li>
                            <li><a href="https://inovasi.sragenkab.go.id/daerah/inovasi/mas-koperso-fasilitasi-pemasaran-komoditas-pertanian-secara-online" target="_blank">MAS KOPERSO</a></li>
                        </ul>
                    </li>
                    <li><a href="galeri.php">Galeri</a></li>
                    <li><a href="https://ppid.sragenkab.go.id/v2/" target="_blank">PPID</a></li>
                    <li><a href="berita.php">Berita</a></li>
                    <li><a href="kontak.php">Kontak</a></li>
                </ul>
                <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
            </nav>
        </div>
    </header>

    <main class="main">
        <!-- Page Title -->
        <div class="page-title light-background">
            <div class="container d-lg-flex justify-content-between align-items-center">
                <h1 class="mb-2 mb-lg-0">Berita</h1>
                <nav class="breadcrumbs">
                    <ol>
                        <li><a href="index.php">Beranda</a></li>
                        <li class="current">Berita</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- End Page Title -->

        <div class="row gy-4">
            <div class="col-lg-12">
                <article>
                    <!-- Judul Berita -->
                    <h2 class="title">
                        <?= htmlspecialchars($row['title']); ?>
                    </h2>

                    <!-- Informasi Tanggal -->
                    <div class="post-meta d-flex align-items-center text-muted mb-2" style="font-size: 14px;">
                        <span class="tanggal">
                            <i class="bi bi-calendar"></i> <?= date('d M Y', strtotime($row['created_at'])); ?>
                        </span>
                    </div>

                    <!-- Konten -->
                    <div class="content" style="line-height: 1.6; font-size: 16px;">
                        <p><?= $row['content']; ?></p>
                    </div>
                </article>
            </div>
        </div>



        <!-- Footer Section-->
        <?php
        include 'footer.php';
        ?>
        <!-- /Footer Section -->

        <!-- Scroll Top -->
        <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

        <!-- Preloader -->
        <div id="preloader"></div>

        <!-- Vendor JS Files -->
        <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="assets/vendor/php-email-form/validate.js"></script>
        <script src="assets/vendor/aos/aos.js"></script>
        <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
        <script src="assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
        <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
        <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
        <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
        <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

        <!-- Main JS File -->
        <script src="assets/js/main.js"></script>

</body>

</html>