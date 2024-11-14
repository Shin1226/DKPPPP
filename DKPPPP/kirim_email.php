<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

// Debug: Lihat data POST yang diterima
var_dump($_POST); 

if (isset($_POST['nama'], $_POST['email'], $_POST['subjek'], $_POST['pesan'])) {
    $nama = htmlspecialchars($_POST['nama']);
    $email = htmlspecialchars($_POST['email']);
    $subjek = htmlspecialchars($_POST['subjek']);
    $pesan = htmlspecialchars($_POST['pesan']);

    // Email tujuan
    $to = "shindymaheswari26@gmail.com";

    // Membuat instance PHPMailer
    $mail = new PHPMailer(true);
    try {
        // Pengaturan server
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'shindymaheswari26@gmail.com'; // Ganti dengan email Gmail Anda
        $mail->Password = 'kgfo jnkk pymb ieko'; // Ganti dengan password aplikasi Gmail Anda
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Penerima
        $mail->setFrom($email, $nama);
        $mail->addAddress($to);

        // Konten email
        $mail->isHTML(false);
        $mail->Subject = "[$subjek] Pesan dari $nama";
        $mail->Body    = "Nama: $nama\nEmail: $email\nSubjek: $subjek\nPesan: $pesan\n";

        // Mengirim email
        $mail->send();
        echo "Pesan berhasil dikirim!";
    } catch (Exception $e) {
        echo "Pesan gagal dikirim.";
    }
} else {
    echo "Data tidak lengkap. Harap isi semua field.";
}
?>
