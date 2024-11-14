<?php
include 'config.php';

$id = $_GET['id'];
$sql = "DELETE FROM sekretariat WHERE id='$id'";
if ($conn->query($sql) === TRUE) {
    header("Location: manajemen_sekretariat.php");
} else {
    echo "Error deleting record: " . $conn->error;
}
?>
