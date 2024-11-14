<?php
include 'config.php';

$id = $_GET['id'];
$sql = "DELETE FROM bidang_ketahanan_pangan WHERE id='$id'";
if ($conn->query($sql) === TRUE) {
    header("Location: manajemen_bidang_ketahanan_pangan.php");
} else {
    echo "Error deleting record: " . $conn->error;
}
?>
