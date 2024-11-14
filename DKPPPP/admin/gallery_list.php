<?php
include 'config.php';

$sql = "SELECT * FROM galeri";
$result = $conn->query($sql);

function extractYouTubeID($url)
{
    parse_str(parse_url($url, PHP_URL_QUERY), $vars);
    return $vars['v'] ?? '';
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galeri</title>
    <link rel="stylesheet" href="AdminLTE/plugins/bootstrap/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <h2 class="my-4">Galeri</h2>
        <a href="gallery_add.php" class="btn btn-primary mb-3">Tambah Galeri</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Kategori</th>
                    <th>Judul</th>
                    <th>Media</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 0;
                while ($row = $result->fetch_assoc()) {
                    $no++; ?>
                    <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo htmlspecialchars($row['kategori']); ?></td>
                        <td><?php echo htmlspecialchars(strip_tags($row['judul'])); ?></td> <!-- Menghapus tag HTML -->
                        <td>
                            <?php if (!empty($row['link_video'])) { ?>
                                <!-- Jika tipe media adalah Video -->
                                <a href="<?php echo htmlspecialchars($row['link_video']); ?>" target="_blank">
                                    <img src="https://img.youtube.com/vi/<?php echo extractYouTubeID($row['link_video']); ?>/0.jpg" width="100" alt="Video Thumbnail">
                                </a>
                            <?php } elseif (!empty($row['gambar'])) { ?>
                                <!-- Jika tipe media adalah Gambar -->
                                <img src="uploads/<?php echo htmlspecialchars($row['gambar']); ?>" width="100" alt="Gambar">
                            <?php } else { ?>
                                <p>Tidak ada media</p>
                            <?php } ?>
                        </td>
                        <td>
                            <a href="gallery_edit.php?id=<?php echo $row['id']; ?>" class="btn btn-warning">Edit</a>
                            <a href="gallery_delete.php?id=<?php echo $row['id']; ?>" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <script src="AdminLTE/plugins/jquery/jquery.min.js"></script>
    <script src="AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>