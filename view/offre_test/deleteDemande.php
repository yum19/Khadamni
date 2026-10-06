<?php
include '../controller/DemandeC.php';
$demandeC = new DemandeC();
if (isset($_POST["id_d"])) {
    $demandeC->deleteDemande($_POST["id_d"]);
    header('Location: ListeDemandes.php');
    exit;
} else {
    echo "ID de l'offre non spécifié";
}
?>
