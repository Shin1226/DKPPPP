<?php
require '../config.php';

$id = $_GET['id'];
$sql = "DELETE FROM client WHERE id='$id'";
if ($conn->query($sql) === TRUE) {
    header("Location: manajemen_client.php");
} else {
    echo "Error deleting record: " . $conn->error;
}
?>
