<?php
include '../controller/DomaineC.php';
$domaineC = new DomaineC();
if (isset($_POST["id_dom"])) {
    $domaineC->deleteDomaine($_POST["id_dom"]);
    header('Location: ListeDomaines.php');
    exit;
} else {
    echo "ID de l'offre non spécifié";
}
?>
