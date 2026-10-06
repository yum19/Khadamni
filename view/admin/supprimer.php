<?php
include 'C:/xampp/htdocs/web/gestionUser/controller/UserC.php';

$userC = new UserC();

if (isset($_GET["idR"])) {
    $userC->deleteUser($_GET["idR"]);
}

header('Location: http://localhost/web/gestionUser/view/admin/afficher.php');
?>
