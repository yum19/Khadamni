<?php
include 'C:/xampp/htdocs/web/controller/EvenementC.php';
$evenementC = new EvenementC();
$evenementC->deleteEvenement($_POST["idEvenement"]);
//header('Location:ListEvenement.php');