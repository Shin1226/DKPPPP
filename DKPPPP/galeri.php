<?php
include 'config.php';

$sql = "SELECT * FROM gallery order by id desc";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Galeri - DKPPPP</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Favicons -->
  <link href="assets/img/logo-dinas.png" rel="icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">

  <!-- Froala Editor -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/3.2.6/css/froala_editor.pkgd.min.css" rel="stylesheet" type="text/css" />
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/3.2.6/js/froala_editor.pkgd.min.js"></script>
</head>

<body class="galeri">

  <header id="header" class="header d-flex align-items-center sticky-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">

      <a href="index.php" class="logo d-flex align-items-center me-auto">
        <h1 class="sitename">DKPPPP</h1>
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
              <li><a href="pengumuman.php">pengumuman</a></li>
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
        <h1 class="mb-2 mb-lg-0">Galeri</h1>
        <nav class="breadcrumbs">
          <ol>
            <li><a href="index.php">Beranda</a></li>
            <li class="current">Galeri</li>
          </ol>
        </nav>
      </div>
    </div><!-- End Page Title -->

    <!-- Gambar Section -->
    <section id="galeri" class="galeri section">
      <div class="container">
        <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">

          <!-- Filter Galeri -->
          <ul class="galeri-filters isotope-filters" data-aos="fade-up" data-aos-delay="100">
            <li data-filter="*" class="filter-active">Semua</li>
            <li data-filter=".Pertanian">Pertanian</li>
            <li data-filter=".Perikanan">Perikanan</li>
            <li data-filter=".Peternakan">Peternakan</li>
            <li data-filter=".Video">Video</li>
          </ul><!-- End Galeri Filters -->

          <div class="row gy-4 isotope-container" data-aos="fade-up" data-aos-delay="200">
            <!-- Loop through items from the database -->
            <?php while ($row = $result->fetch_assoc()) { ?>
              <div class="col-lg-4 col-md-6 galeri-item isotope-item <?= $row['kategori'] ?> <?= $row['jenis_media'] == 'Video' ? 'Video' : '' ?>">
                <?php if ($row['jenis_media'] == 'Video' && !empty($row['link_video'])) { ?>
                  <!-- Tampilkan thumbnail video jika jenis_media adalah Video -->
                  <div class="video-container">
                    <!-- Get YouTube Video ID and display thumbnail -->
                    <?php
                    // Extract the YouTube video ID from the link
                    preg_match('/(?:https?:\/\/(?:www\.)?youtube\.com\/(?:[^\/]+\/\S+\/|(?:v|e(?:mbed)?)\/|\S*?[?&]v=)|youtu\.be\/)([a-zA-Z0-9_-]{11})/', $row['link_video'], $matches);
                    $videoID = $matches[1] ?? '';
                    if ($videoID) {
                      $thumbnailURL = "https://img.youtube.com/vi/{$videoID}/0.jpg";
                    }
                    ?>
                    <?php if ($videoID) { ?>
                      <img src="<?= $thumbnailURL ?>" class="img-fluid" alt="Video Thumbnail">
                    <?php } else { ?>
                      <p>No Thumbnail Available</p>
                    <?php } ?>
                  </div>
                <?php } else { ?>
                  <!-- Tampilkan gambar jika jenis_media bukan Video -->
                  <img src="admin/uploads/<?= $row['gambar'] ?>" class="img-fluid" alt="Gambar">
                <?php } ?>

                <div class="galeri-info">
                  <h4><?= $row['kategori'] ?></h4>
                  <p><?= $row['judul'] ?></p>
                  <?php if ($row['jenis_media'] == 'Video' && !empty($row['link_video'])) { ?>
                    <!-- Link ke video untuk glightbox -->
                    <a href="<?= $row['link_video'] ?>" title="<?= $row['kategori'] ?>" data-gallery="galeri-gallery-<?= $row['kategori'] ?>" class="glightbox preview-link"><i class="bi bi-play-circle"></i></a>
                  <?php } else { ?>
                    <!-- Link ke gambar untuk glightbox -->
                    <a href="admin/uploads/<?= $row['gambar'] ?>" title="<?= $row['judul'] ?>" data-gallery="galeri-gallery-<?= $row['judul'] ?>" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                  <?php } ?>
                </div>
              </div>
            <?php } ?>
          </div><!-- End Galeri Container -->
        </div>
      </div>
    </section><!-- /Galeri Section -->
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