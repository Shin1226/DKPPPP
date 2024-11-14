<?php
include 'config.php';

$id = $_GET['id'];
$sql = "DELETE FROM pengumuman WHERE id='$id'";
if ($conn->query($sql) === TRUE) {
    header("Location: manajemenpengumuman.php");
} else {
    echo "Error deleting record: " . $conn->error;
}
?>
