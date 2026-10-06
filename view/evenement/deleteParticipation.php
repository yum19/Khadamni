<?php
include 'C:/xampp/htdocs/web/controller/ParticipationC.php';

// Vérifier si l'ID de la catégorie d'événement est passé via POST
if (isset($_POST["idParticipation"])) {
    // Créer une instance du contrôleur de catégories d'événements
    $participationC = new ParticipationC();

    // Supprimer la catégorie d'événement en utilisant l'ID passé via POST
    $participationC->deleteParticipation($_POST["idParticipation"]);
}

// Rediriger vers la liste des catégories d'événements
header('Location:profilEtud.php');
?>
