<?php
include 'config.php';

$id = $_GET['id'];
$sql = "DELETE FROM news WHERE id='$id'";
if ($conn->query($sql) === TRUE) {
    header("Location: manajemenberita.php");
} else {
    echo "Error deleting record: " . $conn->error;
}
?>
