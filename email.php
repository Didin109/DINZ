<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    $mail = new PHPMailer(true);

    try {
        // Konfigurasi server email
        $mail->isSMTP();
        $mail->Host = 'smtp.example.com'; // Ganti dengan host SMTP Anda
        $mail->SMTPAuth = true;
        $mail->Username = 'your_email@example.com'; // Ganti dengan email Anda
        $mail->Password = 'your_email_password'; // Ganti dengan password email Anda
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        // Penerima
        $mail->setFrom('your_email@example.com', 'Formulir Profil Pengguna');
        $mail->addAddress('babepintar123@gmail.com');

        // Konten email
        $mail->isHTML(true);
        $mail->Subject = 'Profil Pengguna Baru';
        $mail->Body    = "<h1>Profil Pengguna Baru</h1>
                          <p><strong>Nama:</strong> {$name}</p>
                          <p><strong>Email:</strong> {$email}</p>
                          <p><strong>Pesan:</strong><br>{$message}</p>";

        $mail->send();
        echo 'Pesan telah terkirim';
    } catch (Exception $e) {
        echo "Pesan tidak dapat dikirim. Mailer Error: {$mail->ErrorInfo}";
    }
}
?>