<?php
include 'C:/xampp/htdocs/web/controller/ParticipationC.php'; // Inclure le fichier EvenementC.php

$error = "";

// Créer une instance du contrôleur
$participationC = new ParticipationC();

// Vérifier si le formulaire de participation a été soumis
if (isset($_POST["emailE"]) && isset($_POST["MDPE"]) && isset($_GET["idEvenement"])) {
    // Récupérer les données du formulaire
    $email = $_POST["emailE"];
    $MDP = $_POST["MDPE"];
    $idEvenement = $_GET["idEvenement"];

    // Ajouter la participation
    $idParticipation = $participationC->addParticipation($email, $MDP, $idEvenement);
    if ($idParticipation !== null) {
        // Redirection avec l'idParticipation comme paramètre GET
        header('Location: afficheParticipant.php?idParticipation=' . $idParticipation);
        exit();
    } else {
        $error = "Erreur lors de l'ajout de la participation.";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ludiflex | Login & Register</title>
    <!-- BOXICONS -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- STYLE -->
    <link rel="stylesheet" href="assets/css/style.css">

    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-space-dynamic.css">
    <link rel="stylesheet" href="assets/css/animated.css">
    <link rel="stylesheet" href="assets/css/owl.css">

    <style>
            .card {
                width: 500px; /* Adjust as needed */
                margin: 0 auto;
                margin-left: 250%;
                background-color: #f9f9f9; /* Adjust card background color */
                padding: 20px;
                border: 3px solid #fe3f40;
                border-radius: 50px;
            }
            .form-title {
            margin: 40px 0;
            color: #fe3f40;
            font-size: 28px;
            font-weight: 600;
        }

            .input-box {
            position: relative;
            margin-bottom: 20px;
        }

        .input-field {
            width: 100%;
            height: 55px;
            padding: 0 15px;
            margin: 10px 0;
            color: #fff;
            background: #acd7f6f0;
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
            border: none;
            border-radius: 10px;
            outline: none;
            backdrop-filter: blur(20px);
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }

            .form-title {
                text-align: center;
                margin-bottom: 20px; /* Adjust spacing between form title and inputs */
            }

        </style>
</head>
<body>
    
  <!-- ***** Preloader Start ***** -->
  <div id="js-preloader" class="js-preloader">
    <div class="preloader-inner">
      <span class="dot"></span>
      <div class="dots">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
  </div>
  <!-- ***** Preloader End ***** -->

  <!-- ***** Header Area Start ***** -->
  <header class="header-area header-sticky wow slideInDown" data-wow-duration="0.75s" data-wow-delay="0s">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <nav class="main-nav">
            <!-- ***** Logo Start ***** -->
            <a href="index.html" class="logo">
              <h4>
                <div class="corner-container">
                  <img src="assets/images/logo.png" >
                  <style>
                    .corner-container {
                        position: fixed; /* Position fixe pour que le logo reste fixe lors du défilement */
                        top: 0; /* Distance depuis le haut */
                        left: 10px; /* Distance depuis la gauche */
                        z-index: 9999; /* Assure que le logo est au-dessus de tout le contenu */
                    }

                    .corner-container img {
                        width: 50px; /* Largeur minimale du logo */
                        top: 0; /* Distance depuis le haut */

                        height: auto; /* Hauteur ajustée automatiquement pour conserver les proportions */
                    }
                  </style>
                </div> 
              Kha<span>Damni</span></h4>
            </a>

            <!-- ***** Logo End ***** -->
            <!-- ***** Menu Start ***** -->
            <ul class="nav">
              <li class="scroll-to-section"><a href="#top" class="active">Acceuil</a></li>
              <li class="scroll-to-section"><a href="#portfolio">Evènement</a></li>
              <li class="scroll-to-section"><a href="#services">Offres&demandes</a></li>
              <li class="scroll-to-section"><a href="#services">Entretien</a></li>
              <li class="scroll-to-section"><a href="#blog">Blog</a></li> 
              <li class="scroll-to-section"><a href="#contact">Reclamation</a></li> 
              <li class="scroll-to-section"><a href="http://localhost/web/view/etudiant/afficherProfil.php" class="active">Profile</a></li> 

            </ul>        
            <a class='menu-trigger'>
                <span>Menu</span>
            </a>
            <!-- ***** Menu End ***** -->
          </nav>
        </div>
      </div>
    </div>
  </header>
  <div class="main-banner wow fadeIn" id="top" data-wow-duration="1s" data-wow-delay="0.5s">
     <div class="container">
        <div class="col col-2">
            <div class="card">
                <div class="card-body">
                <div class="login-form">
                <div class="form-title">
                    <span>Formulaire de participation</span>
                </div>
                <form name="participationForm" method="POST" action="">
                    <!-- Champ caché pour stocker l'id de l'événement -->
                    <input type="hidden" name="idEvenement" value="<?php echo $_GET['idEvenement']; ?>">
                    <div class="input-box">
                        <input type="email" class="input-field" placeholder="Adresse e-mail" name="emailE">
                    </div>
                    <div class="input-box">
                        <input type="password" class="input-field" placeholder="Mot de passe" name="MDPE">
                    </div>
                    <div class="input-box">
                        <button type="submit" name="envoyer" style="background-color: #3498db; color: white; border: none; padding: 10px 20px; border-radius: 5px; cursor: pointer;">Participer</button>
                    </div>
                </form>
            </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <script src="assets/js/main.js"></script>
<script src="assets/js/validation.js"></script>
<script src="assets/vendor/jquery/jquery.min.js"></script>
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/owl-carousel.js"></script>
<script src="assets/js/animation.js"></script>
<script src="assets/js/imagesloaded.js"></script>
<script src="assets/js/templatemo-custom.js"></script>
</body>
</html>
