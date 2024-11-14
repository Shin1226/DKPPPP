<?php
require '../config.php';

$id = $_GET['id'];
$sql = "DELETE FROM profil_beranda WHERE id='$id'";
if ($conn->query($sql) === TRUE) {
    header("Location: manajemen_profil_beranda.php");
} else {
    echo "Error deleting record: " . $conn->error;
}
?>
