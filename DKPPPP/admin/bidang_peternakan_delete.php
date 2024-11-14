<?php
include 'config.php';

$id = $_GET['id'];
$sql = "DELETE FROM bidang_peternakan WHERE id='$id'";
if ($conn->query($sql) === TRUE) {
    header("Location: manajemen_bidang_peternakan.php");
} else {
    echo "Error deleting record: " . $conn->error;
}
?>
