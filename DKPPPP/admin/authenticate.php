<?php
session_start();
include 'config.php';

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $_SESSION['username'] = $username;
    header("Location: index.php");
} else {
    echo "<script>alert('Login Gagal!');window.location='login.php';</script>";
}
?>
