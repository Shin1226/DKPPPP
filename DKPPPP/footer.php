<?php
include 'config.php';

// Ambil data footer dari database
$sqlFooter = "SELECT * FROM footer LIMIT 1";
$footerResult = $conn->query($sqlFooter);

// Cek apakah data footer tersedia
if ($footerResult && $footerResult->num_rows > 0) {
    $footer = $footerResult->fetch_assoc();
} else {
    $footer = null;
}
?>

<!-- Footer Section -->
<?php if ($footer): ?>
<footer id="footer" class="footer dark-background">
    <div class="container footer-top">
        <div class="row gy-4">
            <div class="col-lg-4 col-md-6 footer-about">
                <a href="index.php" class="logo d-flex align-items-center">
                    <span class="sitename">DKPPPP</span>
                </a>
                <div class="footer-contact pt-3">
                    <p><?php echo isset($footer['alamat']) ? htmlspecialchars($footer['alamat']) : 'Alamat tidak tersedia'; ?></p>
                    <p class="mt-3"><strong>Telp:</strong> <span><?php echo isset($footer['telepon']) ? htmlspecialchars($footer['telepon']) : 'Telepon tidak tersedia'; ?></span></p>
                    <p><strong>Email:</strong> <span><?php echo isset($footer['email']) ? htmlspecialchars($footer['email']) : 'Email tidak tersedia'; ?></span></p>
                </div>
                <div class="social-links d-flex mt-4">
                    <a href="<?php echo isset($footer['twitter']) ? htmlspecialchars($footer['twitter']) : '#'; ?>"><i class="bi bi-twitter-x"></i></a>
                    <a href="<?php echo isset($footer['youtube']) ? htmlspecialchars($footer['youtube']) : '#'; ?>" target="_blank">
                        <i class="bi bi-youtube"></i>
                    </a>
                    <a href="<?php echo isset($footer['instagram']) ? htmlspecialchars($footer['instagram']) : '#'; ?>"><i class="bi bi-instagram"></i></a>
                    <a href="<?php echo isset($footer['facebook']) ? htmlspecialchars($footer['facebook']) : '#'; ?>"><i class="bi bi-facebook"></i></a>
                </div>
            </div>
            <div class="col-lg-8 col-md-6 d-flex justify-content-center align-items-center">
                <div class="map-container" style="margin-top: -20px; text-align: center;">
                    <?php
                    // Menampilkan Google Map dari database dengan ukuran kecil
                    if (isset($footer['google_map'])) {
                        echo '<iframe src="' . htmlspecialchars($footer['google_map']) . '" width="300" height="225" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>';
                    } else {
                        echo 'Peta tidak tersedia';
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</footer>

<div class="container copyright text-center mt-4">
    <p><?php echo isset($footer['copyright']) ? htmlspecialchars($footer['copyright']) : '© Copyright DKPPPP All Rights Reserved'; ?></p>
    <div class="credits">
    </div>
</div>
<?php else: ?>
<!-- Pesan jika data footer tidak ditemukan -->
<p>Data footer tidak tersedia.</p>
<?php endif; ?>

<?php
// Debugging koneksi dan query
if (!$footerResult) {
    echo "Error: " . $conn->error;
} elseif ($footerResult->num_rows === 0) {
    echo "Data footer tidak ditemukan.";
}
?>
