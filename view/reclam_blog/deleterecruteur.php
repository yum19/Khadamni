<?php
include 'C:/xampp/htdocs/web/controller/RecruteurC.php';
$reclamationC = new reclamationC();
$reclamationC->deletereclamation($_POST["id_reclamation"]);
header('Location:listereclame.php');
