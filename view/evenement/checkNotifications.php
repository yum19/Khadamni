<?php
include 'C:/xampp/htdocs/web/controller/ParticipationC.php'; // Assurez-vous que ce chemin est correct

// Supposons que vous ayez déjà récupéré l'identifiant de l'étudiant
$idEtudiant = 3; // Remplacez par l'ID de l'étudiant

// Instanciation de la classe ParticipationC
$participationC = new ParticipationC();

// Récupération de tous les événements auxquels l'étudiant participe
$events = $participationC->getEventsByStudentId($idEtudiant);

// Initialisation du drapeau pour détecter les différences
$differencesFound = false;

// Parcourir tous les événements
foreach ($events as $event) {
    // Comparer les informations pour chaque événement
    $infos = $participationC->compareInfosByStudentIdAndEventId($idEtudiant, $event['idEvenement']);

    // Vérifier s'il y a des différences dans les adresses ou les dates
    if ($infos['ancienneAdresseEVN'] !== $infos['adresseEVN'] || $infos['ancienneDateEVN'] !== $infos['dateEVN']) {
        // Mettre à jour le drapeau s'il y a des différences
        $differencesFound = true;
        // Sortir de la boucle si une différence est trouvée dans au moins un événement
        break;
    }
}

// Afficher une alerte en fonction des différences trouvées
if ($differencesFound) {
    echo "<script>alert('Les informations ont été modifiées pour au moins un événement.');</script>";
} else {
    echo "<script>alert('Les informations n'ont pas été modifiées pour aucun événement.');</script>";
}
?>