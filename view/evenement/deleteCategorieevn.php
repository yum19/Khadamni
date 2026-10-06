<?php
include 'C:/xampp/htdocs/web/controller/categorieevnC.php';

// Vérifier si l'ID de la catégorie d'événement est passé via POST
if (isset($_POST["idCategorieEVN"])) {
    // Créer une instance du contrôleur de catégories d'événements
    $categorieevnC = new CategorieevnC();

    // Supprimer la catégorie d'événement en utilisant l'ID passé via POST
    $categorieevnC->deletecategorieevn($_POST["idCategorieEVN"]);
}

// Rediriger vers la liste des catégories d'événements
header('Location:ListCategorieevn.php');
?>
