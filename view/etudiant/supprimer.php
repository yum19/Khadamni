<?php
include "C:/xampp/htdocs/web/controller/etudiantC.php";


$userC = new UserC();

if (isset($_GET["idEtudiant"])) {
    $userC->deleteUser($_GET["idEtudiant"]);
}

header('Location: http://localhost/web/view/etudiant/afficher.php');
?>
