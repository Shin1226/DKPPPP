<?php
include 'config.php';

$id = $_GET['id'];
$sql = "DELETE FROM bidang_perikanan WHERE id='$id'";
if ($conn->query($sql) === TRUE) {
    header("Location: manajemen_bidang_perikanan.php");
} else {
    echo "Error deleting record: " . $conn->error;
}
?>
