<?php
include 'C:/xampp/htdocs/web/controller/RecruteurC.php';
$error = "";

// Création d'une instance de la classe reclamationC
$reclamationC = new reclamationC();

// Vérification de la présence des données du formulaire
if (
    isset($_POST["date"]) &&
    isset($_POST["categorie_reclamation"]) &&
    isset($_POST["explication"]) &&
    isset($_POST["idEtudiant"]) // Vérifie si idEtudiant est envoyé dans le formulaire
) {
    // Vérification que les champs ne sont pas vides
    if (
        !empty($_POST["date"]) &&
        !empty($_POST["categorie_reclamation"]) &&
        !empty($_POST["explication"]) &&
        !empty($_POST["idEtudiant"]) // Vérifie si idEtudiant n'est pas vide
    ) {
        // Création d'une nouvelle réclamation avec les données du formulaire
        $reclamation = new reclamation(
            NULL, 
            new DateTime($_POST["date"]),
            $_POST['categorie_reclamation'],
            $_POST['explication'],
            $_POST["idEtudiant"] // Utilisation de $_POST["idEtudiant"] pour récupérer l'ID de l'étudiant
        );
        
        // Ajout de la réclamation à la base de données
        $reclamationC->addreclamation($reclamation);
        
        // Redirection vers la page listereclame.php après l'ajout de la réclamation
        header('Location:listereclame.php');
        exit(); // Assurez-vous de quitter le script après la redirection
    } else {
        $error = "Missing information";  
    }
}
?>
