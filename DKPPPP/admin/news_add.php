<?php
session_start();
if (!isset($_SESSION['username'])) {
  header("Location: login.php");
  exit();
}
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $title = $_POST['title'];
  $content = $_POST['content'];
  $link = $_POST['link'];

  // Proses upload gambar
  $image_path = $_FILES['gambar']['name'];
  $target = "uploads/berita/" . basename($image_path);
  move_uploaded_file($_FILES['gambar']['tmp_name'], $target);

  // Simpan data ke database
  $sql = "INSERT INTO news (title, image_path, content, link) VALUES ('$title', '$image_path', '$content', '$link')";
  if ($conn->query($sql) === TRUE) {
    header("Location: manajemenberita.php");
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}
?>

}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Berita</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css">

  <!-- Theme style -->
  <link rel="stylesheet" href="assets/dist/css/adminlte.min.css">

  <!-- jQuery dan Popper.js -->
  <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

  <!-- Bootstrap CSS dan JS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

  <!-- Summernote CSS dan JS -->
  <link href="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote-bs4.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote-bs4.min.js"></script>

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
              <h1>Manajemen Berita</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                <li class="breadcrumb-item active">Manajemen Berita</li>
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
            <h3 class="card-title">Tambah Berita</h3>
          </div>
          <div class="form-group">
            <label for="title">Judul Berita:</label>
            <input type="text" class="form-control" id="title" name="title" required>
          </div>
          <div class="form-group">
            <label for="content">Isi Berita:</label>
            <div id="summernote"></div>
            <input type="hidden" id="content" name="content">
          </div>
          <!-- Inisialisasi Summernote dan Pengaturan Upload Gambar -->
          <script>
            $(document).ready(function() {
              $('#summernote').summernote({
                placeholder: 'Masukkan isi berita di sini',
                tabsize: 2,
                height: 300,
                callbacks: {
                  onImageUpload: function(files) {
                    let data = new FormData();
                    data.append("file", files[0]);
                    $.ajax({
                      url: 'upload_image.php',
                      type: 'POST',
                      data: data,
                      contentType: false,
                      processData: false,
                      success: function(url) {
                        $('#summernote').summernote('insertImage', url);
                      }
                    });
                  }
                }
              });

              // Simpan konten dari Summernote ke input hidden saat form disubmit
              $('#newsForm').on('submit', function(e) {
                e.preventDefault(); // Hindari submit default untuk testing
                $('#content').val($('#summernote').summernote('code'));
                console.log("Judul:", $('#title').val());
                console.log("Konten:", $('#content').val());
                // Submit form via AJAX atau proses lain jika diperlukan
              });
            });
          </script>

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