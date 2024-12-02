<?php
if ($_FILES['file']['name']) {
    // Direktori untuk menyimpan gambar
    $target_dir = "uploads/berita/";
    
    // Ekstensi file yang diizinkan
    $allowed_extensions = ['jpg', 'jpeg', 'png', 'gif'];
    $file_extension = strtolower(pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION));
    
    // Validasi jenis file
    if (!in_array($file_extension, $allowed_extensions)) {
        echo json_encode(['error' => 'Invalid file type.']);
        exit();
    }

    // Validasi ukuran file (maksimal 5 MB)
    if ($_FILES['file']['size'] > 5 * 1024 * 1024) {
        echo json_encode(['error' => 'File size exceeds 5 MB.']);
        exit();
    }

    // Buat nama file unik
    $file_name = uniqid() . '.' . $file_extension;
    $target_file = $target_dir . $file_name;

    // Memindahkan file ke direktori target
    if (move_uploaded_file($_FILES['file']['tmp_name'], $target_file)) {
        // Kembalikan URL file untuk Summernote
        echo json_encode(['url' => $target_file]);
    } else {
        echo json_encode(['error' => 'Error uploading file.']);
    }
} else {
    echo json_encode(['error' => 'No file uploaded.']);
}
?>
