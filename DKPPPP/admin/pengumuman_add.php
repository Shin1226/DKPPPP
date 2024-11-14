<?php
session_start();
if (!isset($_SESSION['username'])) {
  header("Location: login.php");
  exit();
}

include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  // Ambil data dari form
  $judul = $_POST['judul'];
  $deskripsi = $_POST['deskripsi'];
  $link = $_POST['link'];

  // Cek apakah file diunggah
  if (isset($_FILES['file_upload']) && $_FILES['file_upload']['error'] === UPLOAD_ERR_OK) {
    // Ambil informasi file
    $file_name = $_FILES['file_upload']['name'];
    $file_tmp = $_FILES['file_upload']['tmp_name'];
    $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
    $allowed_ext = ['pdf', 'jpg', 'jpeg', 'png'];

    // Tentukan direktori penyimpanan
    $upload_dir = 'uploads/pengumuman/';

    // Cek ekstensi file
    if (in_array($file_ext, $allowed_ext)) {
      // Buat nama file unik untuk menghindari bentrok nama file
      $new_file_name = uniqid() . '.' . $file_ext;
      $upload_path = $upload_dir . $new_file_name;

      // Pindahkan file ke direktori penyimpanan
      if (move_uploaded_file($file_tmp, $upload_path)) {
        // Simpan data ke database
        $sql = "INSERT INTO pengumuman (judul, deskripsi, link, file) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssss", $judul, $deskripsi, $link, $new_file_name);

        if ($stmt->execute()) {
          echo "Data berhasil disimpan.";
        } else {
          echo "Error: " . $conn->error;
        }
      } else {
        echo "Gagal mengunggah file.";
      }
    } else {
      echo "Ekstensi file tidak diperbolehkan. Hanya PDF, JPG, dan PNG yang diperbolehkan.";
    }
  } else {
    echo "Tidak ada file yang diunggah atau terjadi kesalahan saat mengunggah.";
  }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Dashboard</title>

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
              <h1>Manajemen Pengumuman</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                <li class="breadcrumb-item active">Manajemen Pengumuman</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">

        <!-- Default box -->
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Tambah Pengumuman</h3>
          </div>
          <div class="card-body">
            <form method="post" enctype="multipart/form-data">
              <div class="form-group">
                <label>Judul</label>
                <input type="text" name="judul" class="form-control" required>
              </div>
              <div class="form-group">
                <label>Upload Gambar atau PDF</label>
                <input type="file" name="file_upload" class="form-control" accept=".jpg,.jpeg,.png,.pdf">
                <!-- Tidak menggunakan required agar opsional -->
              </div>
              <div class="form-group">
                <label>Deskripsi</label>
                <textarea name="deskripsi" class="form-control" required></textarea>
              </div>
              <div class="form-group">
                <label>Link (Opsional)</label>
                <input type="text" name="link" class="form-control">
                <!-- Tidak menggunakan required agar opsional -->
              </div>
              <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
          </div>

          <!-- /.card-body -->
          <div class="card-footer">

          </div>
          <!-- /.card-footer-->
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