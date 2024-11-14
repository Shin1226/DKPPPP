<?php
include 'config.php';

$id = $_GET['id'];
$sql = "DELETE FROM upt_dinas WHERE id='$id'";
if ($conn->query($sql) === TRUE) {
    header("Location: manajemen_upt_dinas.php");
} else {
    echo "Error deleting record: " . $conn->error;
}
?>
