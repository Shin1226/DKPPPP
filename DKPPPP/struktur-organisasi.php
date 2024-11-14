<?php
include 'config.php';

// Ambil data dari database
$query_struktur = "SELECT * FROM struktur_organisasi";
$result_struktur = mysqli_query($conn, $query_struktur);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Profil - Struktur Organisasi</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Favicons -->
  <link href="assets/img/logo-dinas.png" rel="icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

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
        <h1 class="mb-2 mb-lg-0">Struktur Organisasi</h1>
        <nav class="breadcrumbs">
          <ol>
            <li><a href="index.html">Beranda</a></li>
            <li class="current">Profil</li>
            <li class="current">Struktur Organisasi</li>
          </ol>
        </nav>
      </div>
    </div><!-- End Page Title -->
  </main>

  <section id="team" class="team section">
    <div class="container">
      <div class="row gy-4 d-flex align-items-center justify-content-center" style="min-height: 100vh;">
        <div class="col-lg-6">
          <h3>Struktur Organisasi</h3>

          <?php
          if (mysqli_num_rows($result_struktur) > 0) {
            echo '<div class="info-box">';
            while ($row = mysqli_fetch_assoc($result_struktur)) {
              echo '<h4>' . htmlspecialchars($row['nama_gambar']) . '</h4>';
              echo '<img src="admin/uploads/struktur_organisasi/' . htmlspecialchars($row['path_gambar']) . '" alt="' . htmlspecialchars($row['nama_gambar']) . '" style="width: 100%; height: auto;">';
              echo '<br>';
            }
            echo '</div>';
          } else {
            echo '<div class="info-box">Struktur organisasi tidak tersedia.</div>';
          }
          ?>
        </div>
      </div>
    </div>
  </section><!-- /Struktur Organisasi Section -->


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