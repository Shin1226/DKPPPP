<?php
session_start();
if (!isset($_SESSION['username'])) {
  header("Location: login.php");
  exit();
}

include 'config.php';

// Mengambil ID dari URL
$id = $_GET['id'];

// Mengambil data kepala dinas berdasarkan ID
$sql = "SELECT * FROM kepala_dinas WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 0) {
  echo "Data tidak ditemukan.";
  exit();
}

$row = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $nama = $_POST['nama'];
  $nip = $_POST['nip'];
  $jabatan = $_POST['jabatan'];
  $instansi = $_POST['instansi'];

  // Proses upload foto
  $foto = $_FILES['foto']['name'];
  if ($foto) {
    $target = "uploads/kepala_dinas/" . basename($foto);
    move_uploaded_file($_FILES['foto']['tmp_name'], $target);
  } else {
    // Jika tidak ada upload foto, tetap menggunakan foto yang lama
    $foto = $row['foto'];
  }

  // Simpan data ke database
  $sql_update = "UPDATE kepala_dinas SET nama = ?, nip = ?, jabatan = ?, instansi = ?, foto = ? WHERE id = ?";
  $stmt_update = $conn->prepare($sql_update);
  $stmt_update->bind_param("sssssi", $nama, $nip, $jabatan, $instansi, $foto, $id);

  if ($stmt_update->execute()) {
    header("Location: manajemen_kepala_dinas.php");
    exit();
  } else {
    echo "Error: " . $stmt_update->error;
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Kepala Dinas</title>

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
              <h1>Manajemen Kepala Dinas</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                <li class="breadcrumb-item active">Manajemen Kepala Dinas</li>
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
            <h3 class="card-title">Edit Kepala Dinas</h3>
          </div>
          <div class="card-body">
            <?php
            // Mengambil ID dari URL
            $id = $_GET['id'];

            // Mengambil data kepala dinas berdasarkan ID
            $sql = "SELECT * FROM kepala_dinas WHERE id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
              $data = $result->fetch_assoc();
            } else {
              echo "Data tidak ditemukan.";
              exit();
            }

            // Proses form jika ada POST request
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
              $nama = $_POST['nama'];
              $nip = $_POST['nip'];
              $jabatan = $_POST['jabatan'];
              $instansi = $_POST['instansi'];

              // Proses upload foto
              $foto = $_FILES['foto']['name'];
              if ($foto) {
                $target = "uploads/kepala_dinas/" . basename($foto);
                move_uploaded_file($_FILES['foto']['tmp_name'], $target);
              } else {
                // Jika tidak ada foto baru, gunakan foto yang lama
                $foto = $data['foto'];
              }

              // Simpan data ke database
              $sql_update = "UPDATE kepala_dinas SET nama = ?, nip = ?, jabatan = ?, instansi = ?, foto = ? WHERE id = ?";
              $stmt_update = $conn->prepare($sql_update);
              $stmt_update->bind_param("sssssi", $nama, $nip, $jabatan, $instansi, $foto, $id);

              if ($stmt_update->execute()) {
                header("Location: manajemen_kepala_dinas.php");
                exit();
              } else {
                echo "Error: " . $stmt_update->error;
              }
            }
            ?>
            <form method="post" enctype="multipart/form-data">
              <div class="form-group">
                <label>Nama</label>
                <input type="text" name="nama" class="form-control" value="<?= htmlspecialchars($data['nama']) ?>" required>
              </div>
              <div class="form-group">
                <label>NIP</label>
                <input type="text" name="nip" class="form-control" value="<?= htmlspecialchars($data['nip']) ?>" required>
              </div>
              <div class="form-group">
                <label>Jabatan</label>
                <input type="text" name="jabatan" class="form-control" value="<?= htmlspecialchars($data['jabatan']) ?>" required>
              </div>
              <div class="form-group">
                <label>Instansi</label>
                <input type="text" name="instansi" class="form-control" value="<?= htmlspecialchars($data['instansi']) ?>" required>
              </div>
              <div class="form-group">
                <label>Foto</label>
                <input type="file" name="foto" class="form-control">
                <img src="uploads/kepala_dinas/<?= htmlspecialchars($data['foto']) ?>" width="100" alt="Foto Kepala Dinas" style="margin-top: 10px;">
                <small class="form-text text-muted">Biarkan kosong jika tidak ingin mengganti foto.</small>
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