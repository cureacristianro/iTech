<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // Încarcă PHPMailer

function sendWelcomeEmail($to, $name) {
    $mail = new PHPMailer(true);

    try {
        // Configurare
        $mail->isSMTP();
        $mail->Host       = 'smtp.example.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'itechonlineshopromania@gmail.com';
        $mail->Password   = '1234';
        $mail->SMTPSecure = 'tls';
        $mail->Port       = 587;

        // Destinatar
        $mail->setFrom('your_email@example.com', 'Your Name');
        $mail->addAddress($to, $name);

        // Subiect și mesaj
        $mail->Subject = 'Bine ai venit pe site!';
        $mail->Body    = 'Bine ai venit pe site-ul! Tocmai s-a efectuat o logare de pe contul tău! Pentru a verifica contul apasă aici!';

        // Trimite e-mailul
        $mail->send();

        return true; // E-mail trimis cu succes
    } catch (Exception $e) {
        return false; // Eroare la trimiterea e-mailului
    }
}