<?php
include 'config.php';

// Ambil data dari tabel gallery
$sql_gallery = "SELECT * FROM gallery ORDER BY id DESC";
$result_gallery = $conn->query($sql_gallery);

// Ambil data dari tabel news
$sql = "SELECT * FROM news ORDER BY created_at DESC LIMIT 2";
$result_news = $conn->query($sql);

// Ambil data dari tabel beranda
$sql_beranda = "SELECT * FROM beranda WHERE status = 'aktif' ORDER BY urutan ASC";
$result_beranda = $conn->query($sql_beranda);

// Ambil data dari tabel profil_beranda
$sql_profil_beranda = "SELECT * FROM profil_beranda ORDER BY id DESC";
$result_profil_beranda = $conn->query($sql_profil_beranda);

// Ambil data dari tabel client
$sql_client = "SELECT * FROM client ORDER BY id DESC";
$result_client = $conn->query($sql_client);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>DKPPPP</title>
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

    <!-- Beranda Section -->
    <section id="beranda" class="beranda section dark-background">
      <div id="beranda-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="5000">

        <?php if ($result_beranda->num_rows > 0): ?>
          <?php $isFirstItem = true; ?>
          <?php while ($row = $result_beranda->fetch_assoc()): ?>
            <div class="carousel-item <?php echo $isFirstItem ? 'active' : ''; ?>">
              <?php if (!empty($row['gambar'])): ?>
                <img src="admin/uploads/beranda-carousel/<?php echo htmlspecialchars($row['gambar']); ?>" alt="Image for <?php echo htmlspecialchars($row['judul']); ?>">
              <?php else: ?>
                <img src="admin/uploads/beranda-carousel/<?php echo htmlspecialchars($row['gambar']); ?>">
              <?php endif; ?>
              <div class="carousel-container">
                <h2><?php echo htmlspecialchars($row['judul']); ?></h2>
                <p><?php echo htmlspecialchars($row['deskripsi']); ?></p>
              </div>
            </div> <!-- End Carousel Item -->
            <?php $isFirstItem = false; ?>
          <?php endwhile; ?>
        <?php else: ?>
          <div class="carousel-item active">
            <img src="assets/img/beranda-carousel/default.jpg" alt="Default Image">
            <div class="carousel-container">
              <h2>Selamat datang di DKPPPP</h2>
              <p>Dinas Ketahanan Pangan Pertanian Perikanan Peternakan</p>
            </div>
          </div> <!-- End Carousel Item -->
        <?php endif; ?>

        <a class="carousel-control-prev" href="#beranda-carousel" role="button" data-bs-slide="prev">
          <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
        </a>

        <a class="carousel-control-next" href="#beranda-carousel" role="button" data-bs-slide="next">
          <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
        </a>

        <ol class="carousel-indicators"></ol>

      </div>
    </section>
    <!-- /Beranda Section -->

    <!-- Profil Section -->
    <section id="profil" class="profil section">
      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Profil</h2>
        <p>Tentang Kami<br></p>
      </div><!-- End Section Title -->

      <div class="container">
        <div class="row gy-4">
          <div class="col-lg-6 content" data-aos="fade-up" data-aos-delay="100">
            <?php
            // Menampilkan deskripsi dengan tipe 'tentang'
            if ($result_profil_beranda->num_rows > 0):
              while ($row = $result_profil_beranda->fetch_assoc()):
                if ($row['tipe'] === 'tentang'):
            ?>
                  <p><?= htmlspecialchars($row['deskripsi']) ?></p>
            <?php
                endif;
              endwhile;
            endif;
            ?>
          </div>

          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
            <?php
            // Menampilkan visi, misi, dan tujuan
            $result_profil_beranda->data_seek(0); // Reset pointer hasil query
            if ($result_profil_beranda->num_rows > 0):
              while ($row = $result_profil_beranda->fetch_assoc()):
                if (in_array($row['tipe'], ['visi', 'misi', 'tujuan'])):
            ?>
                  <div class="info-box">
                    <h3><?= ucfirst(htmlspecialchars($row['tipe'])) ?></h3>
                    <p><?= htmlspecialchars($row['deskripsi']) ?></p>
                  </div>
            <?php
                endif;
              endwhile;
            endif;
            ?>
          </div>
        </div>
      </div>
    </section>
    <!-- /Profil Section -->

    <!-- Clients Section -->
    <section id="clients" class="clients section light-background">
      <div class="container" data-aos="fade-up">
        <div class="row gy-4">
          <?php if ($result_client->num_rows > 0): ?>
            <?php while ($client = $result_client->fetch_assoc()): ?>
              <div class="col-xl-2 col-md-3 col-6 client-logo">
                <?php
                // Periksa apakah logo_image_url ada sebelum mengaksesnya
                $logo_image_url = isset($client['logo_image_url']) ? htmlspecialchars($client['logo_image_url']) : '';
                ?>
                <!-- Menampilkan gambar logo -->
                <img src="admin/uploads/clients/<?= htmlspecialchars($client['logo_image_url']) ?>" class="img-fluid">
              </div><!-- End Client Item -->
            <?php endwhile; ?>
          <?php else: ?>
            <p class="text-center">Tidak ada logo client tersedia.</p>
          <?php endif; ?>
        </div>
      </div>
    </section>
    <!-- End Clients Section -->

<!-- Berita Section -->
<section id="berita" class="berita section">
  <div class="container section-title" data-aos="fade-up">
    <h2>Berita</h2>
    <p>DKPPPP</p>
  </div>
  <!-- End Section Title -->
  <div class="container">
  <div class="row gy-4">
    <?php while ($row = $result_news->fetch_assoc()) { ?>
      <div class="col-md-6" data-aos="fade-up" data-aos-delay="100">
        <div class="card h-100 shadow-sm border-0">
          <div class="card-img-top">
            <img src="admin/uploads/berita/<?php echo $row['image_path']; ?>" alt="" class="img-fluid rounded">
          </div>
          <div class="card-body">
            <h5 class="card-title">
              <a href="detail-berita.php?id=<?= $row['id']; ?>">
                <?= htmlspecialchars($row['title']); ?>
              </a>
            </h5>
            <!-- Informasi Kategori dan Tanggal -->
            <div class="post-meta" style="display: flex; align-items: center; color: #999; font-size: 14px; margin-bottom: 10px;">
              <span class="tanggal">
                <i class="bi bi-calendar"></i> <?= date('d M Y', strtotime($row['created_at'])); ?>
              </span>
            </div>
            <!-- Tampilkan 100 karakter pertama dari content -->
            <p class="card-text text-muted">
              <?= htmlspecialchars(substr(strip_tags($row['content']), 0, 100)); ?>...
            </p>
          </div>
          <div class="card-footer bg-transparent border-0">
            <a href="detail-berita.php?id=<?= $row['id']; ?>">Lihat Detail</a>
          </div>
        </div>
      </div>
    <?php } ?>
  </div>
</div>
</section>

    <!-- Gambar Section -->
    <section id="galeri" class="galeri section">
      <div class="container section-title" data-aos="fade-up">
        <h2>Galeri</h2>
        <p>DKPPPP</p>
      </div><!-- End Section Title -->

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
            <!-- Loop through items from database -->
            <?php while ($row = $result_gallery->fetch_assoc()) { ?>
              <div class="col-lg-4 col-md-6 galeri-item isotope-item <?= $row['kategori'] ?> <?= $row['jenis_media'] == 'Video' ? 'Video' : '' ?>">
                <?php if ($row['jenis_media'] == 'Video' && !empty($row['link_video'])) { ?>
                  <!-- Tampilkan video jika jenis_media adalah Video -->
                  <div class="video-container">
                    <iframe width="100%" height="200" src="<?= str_replace('watch?v=', 'embed/', $row['link_video']) ?>" frameborder="0" allowfullscreen></iframe>
                  </div>
                <?php } else { ?>
                  <!-- Tampilkan gambar jika jenis_media bukan Video -->
                  <img src="admin/uploads/<?= $row['gambar'] ?>" class="img-fluid" alt="">
                <?php } ?>

                <div class="galeri-info">
                  <h4><?= $row['kategori'] ?></h4>
                  <p><?= $row['judul'] ?></p>
                  <?php if ($row['jenis_media'] == 'Video' && !empty($row['link_video'])) { ?>
                    <!-- Link ke video untuk glightbox -->
                    <a href="<?= $row['link_video'] ?>" title="<?= $row['kategori'] ?>" data-gallery="galeri-gallery-<?= $row['kategori'] ?>" class="glightbox preview-link"><i class="bi bi-play-circle"></i></a>
                  <?php } else { ?>
                    <!-- Link ke gambar untuk glightbox -->
                    <a href="admin/uploads/<?= $row['gambar'] ?>" title="<?= $row['kategori'] ?>" data-gallery="galeri-gallery-<?= $row['kategori'] ?>" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
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