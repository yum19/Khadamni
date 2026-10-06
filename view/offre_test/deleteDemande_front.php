<?php
include 'C:/xampp/htdocs/web/controller/DemandeC.php';

$demandeC = new DemandeC();

if (isset($_POST["id_d"])) {
    $id_d = $_POST["id_d"];
    $demandeC->deleteDemande($id_d);
    
    // Récupérer idE depuis l'URL, s'il est défini
    $idEtudiant = isset($_GET['idEtudiant']) ? $_GET['idEtudiant'] : "";

    // Rediriger avec idE dans l'URL
    
    exit();
} else {
    echo "ID de l'offre non spécifié";
}

?>
