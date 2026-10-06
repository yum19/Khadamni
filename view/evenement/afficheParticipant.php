<?php
include 'C:/xampp/htdocs/web/controller/ParticipationC.php';
$participationC = new ParticipationC();
$idParticipation = $_GET["idParticipation"];
$participation = $participationC->showParticipation($idParticipation);

// Vérifier si des informations de participation sont récupérées
if ($participation) {
    $idEvenement = $participation['idEvenement'];
    $nomEvenement = $participationC->getEventNameById($idEvenement);
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Space Dynamic - SEO HTML5 Template</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-space-dynamic.css">
    <link rel="stylesheet" href="assets/css/animated.css">
    <link rel="stylesheet" href="assets/css/owl.css">
    <style>
        /* CSS pour le cadre de style */
        .participant-info {
    border: 2px solid #3498db;
    padding: 20px;
    border-radius: 10px;
    margin: 200px auto; /* Pour centrer horizontalement et définir la marge supérieure */
    max-width: 600px; /* Définir une largeur maximale */
    background-color: #f8f9fa;
}


        .participant-info h3 {
            color: #fe3f40;
            margin-bottom: 10px;
        }
        .participant-info h2 {
            color: #3498db;
            margin-bottom: 10px;
        }

        .participant-info p {
            margin-bottom: 5px;
        }
    </style>
</head>

<body>

    <!-- Votre contenu HTML existant -->

    <!-- Section pour afficher les informations du participant -->
    <section class="participant-info">
    <div style="display: flex; align-items: center;">
        <div style="flex: 1;">
            <h2>Merci pour votre participation à l'événement <h3> <?php echo $nomEvenement; ?></h2></h3>
            <?php
                echo "<p>Nom: " . $participation['nomE'] . "</p>";
                echo "<p>Prénom: " . $participation['prenomE'] . "</p>";
                echo "<p>Téléphone: " . $participation['telephoneE'] . "</p>";
                echo "<p>Age: " . $participation['age'] . "</p>";
                echo "<p>Email: " . $participation['emailE'] . "</p>";
            ?>
        </div>
        <div style="flex: 1;">
            <img src="assets/images/18058.jpg" alt="Description de l'image" style="max-width:550px; height: auto;">
        </div>
    </div>
</section>

    <!-- Votre contenu HTML existant -->

    <!-- Scripts -->
    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/owl-carousel.js"></script>
    <script src="assets/js/animation.js"></script>
    <script src="assets/js/imagesloaded.js"></script>
    <script src="assets/js/templatemo-custom.js"></script>

</body>

</html>
<?php
} else {
    echo "Aucune information de participant trouvée";
}
?>
