<?php
include 'config.php';

$id = $_GET['id'];
$sql = "DELETE FROM bidang_pertanian WHERE id='$id'";
if ($conn->query($sql) === TRUE) {
    header("Location: manajemen_bidang_pertanian.php");
} else {
    echo "Error deleting record: " . $conn->error;
}
?>
