<?php
include 'config.php';

$results_per_page = 4;

// Filter pencarian
$keyword = isset($_GET['keyword']) ? $_GET['keyword'] : '';

// Filter kategori
$kategori = isset($_GET['kategori']) ? $_GET['kategori'] : '';

// Menghitung jumlah total data di dalam database
$where_clause = "";
if (!empty($keyword)) {
    $where_clause .= "WHERE judul LIKE '%$keyword%' OR text LIKE '%$keyword%'";
} elseif (!empty($kategori)) {
    $where_clause .= "WHERE kategori = '$kategori'";
}

$total_sql = "SELECT COUNT(id) AS total FROM news $where_clause";
$result_news = $conn->query($total_sql);
$row = $result_news->fetch_assoc();
$total_pages = ceil($row['total'] / $results_per_page);

// Menentukan halaman saat ini 
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$page = max(1, min($page, $total_pages));

$start_limit = ($page - 1) * $results_per_page;

// Mengambil data berdasarkan halaman saat ini
$sql = "SELECT * FROM news $where_clause LIMIT $start_limit, $results_per_page";
$result_news = $conn->query($sql);
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
        </div><!-- End Page Title -->

        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <!-- Postingan Berita Section -->
                    <section id="postingan-berita" class="postingan-berita section">
                        <div class="container">
                            <div class="row gy-4">
                                <?php while ($row = $result_news->fetch_assoc()) { ?>
                                    <div class="col-lg-12">
                                        <article>
                                            <div class="post-img">
                                                <img src="admin/uploads/berita/<?php echo $row['gambar']; ?>" alt="" class="img-fluid">
                                            </div>
                                            <h2 class="title">
                                                <a><?= $row['judul']; ?></a>
                                            </h2>
                                            <!-- Informasi Kategori dan Tanggal -->
                                            <div class="post-meta" style="display: flex; align-items: center; color: #999; font-size: 14px; margin-bottom: 10px;">
                                                <span class="kategori" style="margin-right: 15px;">
                                                    <i class="bi bi-folder"></i> <?= $row['kategori']; ?>
                                                </span>
                                                <span class="tanggal">
                                                    <i class="bi bi-calendar"></i> <?= date('d M Y', strtotime($row['date'])); ?>
                                                </span>
                                            </div>
                                            <div class="content">
                                                <p><?php echo substr($row['text'], 0, 100); ?>...</p>
                                                <div class="card-footer bg-transparent border-0">
                                                    <a href="<?= $row['link'] ?>" target="_blank" class="btn btn-sm btn-primary">Baca Selengkapnya</a>
                                                </div>
                                            </div>
                                        </article>
                                    </div><!-- End Postingan Berita item -->
                                <?php } ?>
                            </div><!-- End Postingan Berita list -->
                        </div>
                    </section><!-- /Postingan Berita Section -->

                    <!-- Penomoran Berita Section -->
                    <section id="berita-pagination" class="berita-pagination section">
                        <div class="container">
                            <div class="d-flex justify-content-center">
                                <ul class="pagination">

                                    <!-- Tombol Halaman Sebelumnya -->
                                    <?php if ($page > 1): ?>
                                        <li><a href="?page=<?= $page - 1 ?>"><i class="bi bi-chevron-left"></i></a></li>
                                    <?php else: ?>
                                        <li class="disabled"><i class="bi bi-chevron-left"></i></li>
                                    <?php endif; ?>

                                    <!-- Nomor Halaman -->
                                    <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                                        <?php if ($i == $page): ?>
                                            <li><a href="?page=<?= $i ?>" class="active"><?= $i ?></a></li>
                                        <?php elseif ($i <= 4 || ($i >= $page - 1 && $i <= $page + 1) || $i > $total_pages - 1): ?>
                                            <li><a href="?page=<?= $i ?>"><?= $i ?></a></li>
                                        <?php elseif ($i == $page - 2 || $i == $page + 2): ?>
                                            <li>...</li>
                                        <?php endif; ?>
                                    <?php endfor; ?>

                                    <!-- Tombol Halaman Berikutnya -->
                                    <?php if ($page < $total_pages): ?>
                                        <li><a href="?page=<?= $page + 1 ?>"><i class="bi bi-chevron-right"></i></a></li>
                                    <?php else: ?>
                                        <li class="disabled"><i class="bi bi-chevron-right"></i></li>
                                    <?php endif; ?>
                                </ul>
                            </div>
                        </div>
                    </section>
                </div>

                <div class="col-lg-4 sidebar">
                    <div class="widgets-container">
                        <!-- Search Widget -->
                        <div class="search-widget widget-item">
                            <h3 class="widget-title">Pencarian</h3>
                            <form action="berita.php" method="GET">
                                <input type="text" name="keyword" placeholder="Cari berita..." value="<?= htmlspecialchars($keyword) ?>">
                                <button type="submit" title="Search"><i class="bi bi-search"></i></button>
                            </form>
                        </div><!--/Search Widget -->

                        <!-- Categories Widget -->
                        <div class="categories-widget widget-item">
                            <h3 class="widget-title">Kategori</h3>
                            <ul class="mt-3">
                                <?php
                                $sql = "SELECT kategori, COUNT(*) as jumlah FROM news GROUP BY kategori";
                                $result = $conn->query($sql);

                                while ($row = $result->fetch_assoc()) {
                                    $kategori = $row['kategori'];
                                    $jumlah = $row['jumlah'];
                                ?>
                                    <li>
                                        <a href="berita.php?kategori=<?= urlencode($kategori); ?>">
                                            <?= htmlspecialchars($kategori); ?> <span>(<?= $jumlah; ?>)</span>
                                        </a>
                                    </li>
                                <?php } ?>
                            </ul>
                        </div><!--/Categories Widget -->

                    </div>
                </div>
            </div>
        </div>
    </main>

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