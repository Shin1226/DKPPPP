<?php
if ($_FILES['file']['name']) {
  $target_dir = "uploads/berita/"; // Direktori untuk menyimpan gambar
  $target_file = $target_dir . basename($_FILES["file"]["name"]);
  
  // Memindahkan file yang diupload ke direktori target
  if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
    echo $target_file; // Mengembalikan URL gambar untuk Summernote
  } else {
    echo "Error uploading file";
  }
}
?>
