<?php
include 'admin/conf/dbcon.php';



// Charger les classes PHPMailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require __DIR__ . '/PHPMailer/src/Exception.php';
require __DIR__ . '/PHPMailer/src/PHPMailer.php';
require __DIR__ . '/PHPMailer/src/SMTP.php';

if (isset($_POST['send_message'])) {

    // 1. Récupération & petite sécurisation
    $name     = htmlspecialchars(trim($_POST['name']));
    $email   = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $subject   = htmlspecialchars(trim($_POST['subject']));
    $message = htmlspecialchars(trim($_POST['message']));

    // Insertion avec requête préparée
    $stmt = $con->prepare("INSERT INTO messages (nom, email, sujet, message) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $name, $email, $subject, $message);
    $stmt->execute();

    // Récupérer l'id pour lier plus tard la réponse, si besoin
    $id_message = $stmt->insert_id;

    $stmt->close();
    $con->close();

    // 2. Préparation de PHPMailer
    $mail = new PHPMailer(true);

    try {
        // Debug (0 en production)
        $mail->SMTPDebug = SMTP::DEBUG_OFF;

        // Config SMTP Gmail
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'etoiledelouangeuea01@gmail.com';       // Gmail de la chorale // aidesocialeetudiantaisoe@gmail.com
        $mail->Password   = 'gkqhahtvfwvwwsyk';         // mot de passe d’application // pour AISOE gnodvykdderghxgo
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;     // TLS
        $mail->Port       = 587;

        // 3. Infos d’expéditeur et destinataire
        $mail->setFrom('etoiledelouangeuea01@gmail.com', 'Site Aide Sociale Étudiants');
        $mail->addAddress('celestinrushigiradonnie@gmail.com', 'Responsable AISOE');
        $mail->addReplyTo($email, $name); // pour répondre directement à la personne

        // 4. Contenu du mail
        $mail->isHTML(false); // texte simple
        $mail->Subject = "Nouveau message du site chorale : ".$subject;
        $body  = "Vous avez reçu un nouveau message depuis le site d'AISOE.\n\n";
        $body .= "Nom : $name\n";
        $body .= "Email : $email\n";
        $body .= "Sujet : $subject\n\n";
        $body .= "Message :\n$message\n";

        $mail->Body = $body;

        // 5. Envoi
        $mail->send();
        $_SESSION['toastr'] = ['type' => 'success', 'message' => 'Message envoyé avec succès.'];
        header("Location: contact.php");
    } catch (Exception $e) {
        echo "Erreur lors de l'envoi du message : {$mail->ErrorInfo}";
    }
} else {
    echo "Accès direct interdit.";
}


?>