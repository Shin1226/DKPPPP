<?php
include 'config.php';

$id = $_GET['id'];
$sql = "DELETE FROM tugas_pokok_fungsi WHERE id='$id'";
if ($conn->query($sql) === TRUE) {
    header("Location: manajementugasfungsi.php");
} else {
    echo "Error deleting record: " . $conn->error;
}
?>
