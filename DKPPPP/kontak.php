<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Ambil data dari form
  $nama = $_POST['nama'];
  $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
  $subject = $_POST['subjek'];
  $pesan = $_POST['pesan'];

  // Validasi email
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "<script>alert('Email tidak valid. Silakan masukkan email yang benar.');</script>";
    exit;
  }

  // Menyimpan data ke dalam tabel kontak
  $sql = "INSERT INTO kontak (nama, email, subject, pesan) VALUES (?, ?, ?, ?)";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("ssss", $nama, $email, $subject, $pesan);

  // Eksekusi query
  if ($stmt->execute()) {
    echo "<script>alert('Pesan berhasil dikirim. Terima kasih!'); window.location.href='kontak.php';</script>";
  } else {
    echo "<script>alert('Gagal mengirim pesan. Silakan coba lagi.');</script>";
  }

  $stmt->close();
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Kontak - DKPPPP</title>
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

    <!-- Page Title -->
    <div class="page-title light-background">
      <div class="container d-lg-flex justify-content-between align-items-center">
        <h1 class="mb-2 mb-lg-0">Kontak</h1>
        <nav class="breadcrumbs">
          <ol>
            <li><a href="index.php">Beranda</a></li>
            <li class="current">Kontak</li>
          </ol>
        </nav>
      </div>
    </div><!-- End Page Title -->

    <!-- kontak Section -->
    <section id="kontak" class="kontak section">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="mb-4" data-aos="fade-up" data-aos-delay="200">
          <iframe style="border:0; width: 100%; height: 270px;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3956.3976873112697!2d111.0064405731879!3d-7.421163973093505!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a035b5f6c35bf%3A0x8957d930574f827b!2sDinas%20Ketahanan%20Pangan%2C%20Pertanian%20dan%20Perikanan%20Kabupaten%20Sragen!5e0!3m2!1sid!2sid!4v1728464402089!5m2!1sid!2sid" frameborder="0" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div><!-- End Google Maps -->

        <div class="row gy-4">

          <div class="col-lg-4">
            <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="300">
              <i class="bi bi-geo-alt flex-shrink-0"></i>
              <div>
                <h3>Alamat</h3>
                <p>Jl. Mayor Suharto No.6 - 7, Kebayan 1, Sragen Kulon, Kec. Sragen, Kabupaten Sragen, Jawa Tengah 57212</p>
              </div>
            </div><!-- End Info Item -->

            <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="400">
              <i class="bi bi-telephone flex-shrink-0"></i>
              <div>
                <h3>Telp.</h3>
                <p>(0271) 895779</p>
              </div>
            </div><!-- End Info Item -->

            <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="500">
              <i class="bi bi-envelope flex-shrink-0"></i>
              <div>
                <h3>Email</h3>
                <p>distankabsragen2@gmail.com</p>
              </div>
            </div><!-- End Info Item -->

          </div>

          <div class="col-lg-8">
            <form action="kirim_email.php" method="post" class="php-email-form" data-aos="fade-up" data-aos-delay="200">
              <div class="row gy-4">

                <div class="col-md-6">
                  <input type="text" name="nama" class="form-control" placeholder="Nama" required="">
                </div>

                <div class="col-md-6">
                  <input type="email" class="form-control" name="email" placeholder="Email" required="">
                </div>

                <div class="col-md-12">
                  <input type="text" class="form-control" name="subjek" placeholder="Subjek" required="">
                </div>

                <div class="col-md-12">
                  <textarea class="form-control" name="pesan" rows="6" placeholder="Pesan" required=""></textarea>
                </div>

                <div class="col-md-12 text-center">
                  <div class="loading">Memuat</div>
                  <div class="error-message">error</div>
                  <div class="sent-message">Pesan Anda telah terkirim. Terima kasih!</div>

                  <button type="submit">Kirim Pesan</button>
                </div>
              </div>
            </form>

          </div><!-- End kontak Form -->

        </div>

      </div>

    </section><!-- /kontak Section -->

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