<?php

require_once 'C:\xampp\htdocs\web\controller\testC.php';
require_once 'C:\xampp\htdocs\web\controller\entretienC.php';

$TestC2 = new TestC2();

if (isset($_GET["id_test"])) {
    $TestC2->deleteUser2($_GET["id_test"]);
}

header('Location: table-basic.php');
?>