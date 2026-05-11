<?php
 error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);   
session_start();
include("conf/dbcon.php");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

if (isset($_POST['send_newslatter'])) {

    $subject = $_POST['Subject'];
    $message = $_POST['message'];

    // Récupérer les abonnés
    $sql = "SELECT email FROM newslatter WHERE statut = 1";
    $res = $con->query($sql);

    $mail = new PHPMailer(true);

    // Configuration SMTP (Gmail exemple)
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'etoiledelouangeuea01@gmail.com';  // ← TON EMAIL
    $mail->Password = 'gkqhahtvfwvwwsyk';        // ← MOT DE PASSE APP
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    $mail->setFrom('etoiledelouangeuea01@gmail.com', 'Etoile de Louange UEA'); // ← TON EMAIL
    $mail->isHTML(true);

    $ok = 0;
    $total = $res->num_rows;

    while ($row = $res->fetch_assoc()) {
        $mail->clearAddresses();
        $mail->addAddress($row['email']);

        $mail->Subject = $subject;
        $mail->Body = $message . '<br><br><small>Etoile de Louange UEA</small>';

        try {
            $mail->send();
            $ok++;
        } catch (Exception $e) {
            error_log("Erreur envoi à {$row['email']}: {$mail->ErrorInfo}");
        }
    }

    $_SESSION['msg'] = "$ok / $total emails envoyés avec succès !";
    header("Location: newslatter.php");
    exit;
}
