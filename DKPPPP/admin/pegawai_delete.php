<?php
include 'config.php';

$id = $_GET['id'];
$sql = "DELETE FROM pegawai WHERE id='$id'";
if ($conn->query($sql) === TRUE) {
    header("Location: manajemen_pegawai.php");
} else {
    echo "Error deleting record: " . $conn->error;
}
?>
