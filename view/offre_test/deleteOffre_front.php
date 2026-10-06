<?php
include 'C:/xampp/htdocs/web/controller/OffreC.php';

$offreC = new OffreC();

if (isset($_POST["id_o"])) {
    $id_o = $_POST["id_o"];
    $offreC->deleteOffre($id_o);
    
    // Récupérer idE depuis l'URL, s'il est défini
    $idE = isset($_GET['idE']) ? $_GET['idE'] : "";

    // Rediriger avec idE dans l'URL
    header("Location: profilEntrepriseO.php?idE=$idE");    
    exit;
} else {
    echo "ID de l'offre non spécifié";
}

?>
