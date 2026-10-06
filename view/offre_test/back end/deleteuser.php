<?php
require_once 'C:\xampp\htdocs\web\controller\testC.php';


$TestC = new TestC();

if (isset($_GET["id_test"])) {
    $TestC->deleteUser($_GET["id_test"]);
}

header('Location: table-basic.php');
?>