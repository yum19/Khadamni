<?php
include 'C:/xampp/htdocs/web/controller/categorieevnC.php';
$error = "";
$categorieevn = null;

// create an instance of the controller
$categorieevnC = new CategorieevnC();
if (
    isset($_POST["nomCategorieEVN"])&&
    isset($_POST["imageEVN"])

) {
    if (
        !empty($_POST["nomCategorieEVN"])&&
        !empty($_POST[" imageEVN"])
    ) {
        $categorieevn = new Categorieevn(
            NULL,
            $_POST["nomCategorieEVN"],
            $_POST[" imageEVN"]
        );
        $categorieevnC->addcategorieevn($categorieevn);
        header('Location:ListCategorieevn.php');
    } else {
        $error = "Missing information";
    }
}
?>
