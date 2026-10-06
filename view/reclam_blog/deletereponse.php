<?php
include '..\contrller\reponseC.php';
$reponseC = new reponseC();
$reponseC->deletereponse($_POST["id_reponse"]); // Supprime la ligne correspondante dans la table "reponse"
header('Location:listereponse.php');
?>
