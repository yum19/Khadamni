<?php
include 'C:/xampp/htdocs/web/controller/EntrepriseC.php';
$entrepriseC = new EntrepriseC();
$entrepriseC->deleteEntreprise($_POST["idE"]);
header('Location:http://localhost/web/view/entreprise/table.php');