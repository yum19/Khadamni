<?php
include 'C:/xampp/htdocs/web/controller/PostC.php';

$x=new PostC();
$x->DeletePost($_GET['id']);
header('location:ListePostss.php');
?>