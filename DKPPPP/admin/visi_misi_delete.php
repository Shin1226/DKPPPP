<?php
include 'config.php';

$id = $_GET['id'];
$sql = "DELETE FROM visi_misi WHERE id='$id'";
if ($conn->query($sql) === TRUE) {
    header("Location: manajemen_visi_misi.php");
} else {
    echo "Error deleting record: " . $conn->error;
}
?>
