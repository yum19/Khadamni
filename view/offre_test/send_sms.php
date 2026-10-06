<?php

use Twilio\Rest\Client;
require_once "C:/xampp/htdocs/integfy/vendor/autoload.php";

// Identifiants Twilio : voir config.local.php (gitignoré)
$cfg = require __DIR__ . '/../../config.local.php';
$sid    = $cfg['twilio']['sid'];
$token  = $cfg['twilio']['token'];

// Numéro Twilio et numéro du destinataire
$twilio_number = $cfg['twilio']['number']; // Votre numéro Twilio
$recipient_number = "+216" . $_GET['recipient']; // Le numéro du destinataire

// Corps du message
$message_body = "Bonjour, votre demande est " . $_GET['message'] . ".";



try {
    // Initialisez le client Twilio
    $twilio = new Client($sid, $token);

    // Envoyer le message SMS
    $message = $twilio->messages->create(
        $recipient_number,
        array(
            'from' => $twilio_number,
            'body' => $message_body
        )
    );

    // Afficher l'identifiant du message
    echo 'Message envoyé avec succès. ID du message : ' . $message->sid;
} catch (Exception $e) {
    // Gérer les erreurs d'envoi de message
    echo 'Erreur lors de l\'envoi du message : ' . $e->getMessage();
}
?>
