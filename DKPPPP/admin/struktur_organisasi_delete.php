<?php
include 'config.php';

$id = $_GET['id'];
$sql = "DELETE FROM struktur_organisasi WHERE id='$id'";
if ($conn->query($sql) === TRUE) {
    header("Location: manajemen_struktur_organisasi.php");
} else {
    echo "Error deleting record: " . $conn->error;
}
?>
