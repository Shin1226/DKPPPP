<?php
include 'config.php';

$id = $_GET['id'];
$sql = "DELETE FROM kepala_dinas WHERE id='$id'";
if ($conn->query($sql) === TRUE) {
    header("Location: manajemen_kepala_dinas.php");
} else {
    echo "Error deleting record: " . $conn->error;
}
