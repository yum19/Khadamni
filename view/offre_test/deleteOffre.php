<?php
include '../controller/OffreC.php';
$offreC = new OffreC();
if (isset($_POST["id_o"])) {
    $offreC->deleteOffre($_POST["id_o"]);
    header('Location: ListeOffres.php');
    exit;
} else {
    echo "ID de l'offre non spécifié";
}
?>
