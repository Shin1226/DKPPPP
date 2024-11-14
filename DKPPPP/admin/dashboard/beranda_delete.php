<?php
require '../config.php';

$id = $_GET['id'];
$sql = "DELETE FROM beranda WHERE id='$id'";
if ($conn->query($sql) === TRUE) {
    header("Location: manajemen_beranda.php");
} else {
    echo "Error deleting record: " . $conn->error;
}
?>
