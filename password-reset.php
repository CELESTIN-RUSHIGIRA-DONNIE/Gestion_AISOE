<?php
session_start();
include 'admin/conf/dbcon.php';



// Charger les classes PHPMailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require __DIR__ . '/PHPMailer/src/Exception.php';
require __DIR__ . '/PHPMailer/src/PHPMailer.php';
require __DIR__ . '/PHPMailer/src/SMTP.php';



function send_password_reset($get_name, $get_email, $token)
{
    // Implémentation de l'envoi de l'email de réinitialisation
    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->SMTPAuth = true;

    $mail->Host = 'smtp.gmail.com';
    $mail->Username = 'aidesocialeetudiantaisoe@gmail.com';
    $mail->Password = 'gnodvykdderghxgo'; // mot de passe d’application

    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    $mail->setFrom('aidesocialeetudiantaisoe@gmail.com', $get_name);
    $mail->addAddress($get_email);

    $mail->isHTML(true);
    $mail->Subject = 'Reset Password Notification';

    $email_template = "
        <h2>Bonjour $get_name,</h2>
        <p>Vous avez demandé une réinitialisation de mot de passe. Cliquez sur le lien ci-dessous pour réinitialiser votre mot de passe :</p><br><br>
        <a href='http://localhost/AISOE/change-password.php?token=$token&email=$get_email'>Réinitialiser mon mot de passe</a>
    ";
    $mail->Body = $email_template;
    $mail->send();
}

if (isset($_POST['forget'])) {

    // 1. Récupération & petite sécurisation
    $email   = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $token = bin2hex(random_bytes(50)); // Génère un token sécurisé

    $chk_email = "SELECT * FROM membre WHERE email='$email' LIMIT 1";
    $chk_email_run = mysqli_query($con, $chk_email);

    if (mysqli_num_rows($chk_email_run) > 0) {
        // Token et mise à jour de l'utilisateur
        $row = mysqli_fetch_array($chk_email_run);
        $get_name = $row['nom'];
        $get_email = $row['email'];

        $update_token = "UPDATE membre SET Verify_token='$token' WHERE email='$get_email' LIMIT 1";
        $update_token_run = mysqli_query($con, $update_token);
        if ($update_token_run) {
            send_password_reset($get_name, $get_email, $token);
            $_SESSION['message'] = "Un lien de réinitialisation a été envoyé à votre adresse email.";
            $_SESSION['msg_type'] = "success";
            header('Location: forget');
            exit;
        } else {
            $_SESSION['message'] = "Quelque chose s'est mal passé. Essayez à nouveau.";
            $_SESSION['msg_type'] = "danger";
            header('Location: forget');
            exit;
        }
    } else {
        $_SESSION['message'] = "Aucun compte trouvé avec cet email";
        $_SESSION['msg_type'] = "danger";
        header('Location: forget');
        exit;
    }
} 


else if (isset($_POST['change_password'])) {
    $email = trim($_POST['email']);
    $new_password = trim($_POST['new_password']);
    $confirm_new_password = trim($_POST['confirm_new_password']);
    $token = trim($_POST['token']);

    if (!empty($token) && !empty($email) && !empty($new_password) && !empty($confirm_new_password)) {
        if ($new_password === $confirm_new_password) {
            // Vérifier token + email
            $stmt = $con->prepare("SELECT id FROM membre WHERE email=? AND verify_token=? LIMIT 1");
            $stmt->bind_param("ss", $email, $token);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
                $stmt = $con->prepare("UPDATE membre SET password=? WHERE email=? AND verify_token=?");
                $stmt->bind_param("sss", $hashed_password, $email, $token);
                if ($stmt->execute()) {
                    $new_token = bin2hex(random_bytes(50));
                    $stmt = $con->prepare("UPDATE membre SET verify_token=? WHERE email=?");
                    $stmt->bind_param("ss", $new_token, $email);
                    $stmt->execute();

                    $_SESSION['message'] = "Votre mot de passe a été changé avec succès.";
                    $_SESSION['msg_type'] = "success";
                    header("Location: login.php");
                    exit;
                } else {
                    $_SESSION['message'] = "Erreur lors de la mise à jour.";
                    $_SESSION['msg_type'] = "danger";
                    header("Location: change-password.php");
                }
            } else {
                $_SESSION['message'] = "Token ou email invalide.";
                $_SESSION['msg_type'] = "danger";
                header("Location: change-password.php");
                exit;
            }
        } else {
            $_SESSION['message'] = "Les mots de passe ne correspondent pas.";
            $_SESSION['msg_type'] = "danger";
            header("Location: change-password.php");
            exit;
        }
    } else {
        $_SESSION['message'] = "Tous les champs sont requis.";
        $_SESSION['msg_type'] = "danger";
        header("Location: change-password.php");
        exit;
    }

}

