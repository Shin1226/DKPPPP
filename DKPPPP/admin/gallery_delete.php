<?php
include 'config.php';

$id = $_GET['id'];
$sql = "DELETE FROM gallery WHERE id='$id'";
if ($conn->query($sql) === TRUE) {
    header("Location: manajemengalary.php");
} else {
    echo "Error deleting record: " . $conn->error;
}
?>
