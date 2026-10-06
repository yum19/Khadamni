<?php
include 'C:/xampp/htdocs/web/controller/EvenementC.php'; // Inclure le fichier EvenementC.php
// Vérifier si l'ID de l'entreprise est passé dans l'URL
session_start();
$error = "";

// Créer un événement
$evenement = null;
$categorieevnC = new CategorieevnC();
$listeCategorieevns = $categorieevnC->listcategorieevns();
// Créer une instance du contrôleur
$evenementC = new EvenementC();

// Vérifier si une adresse est envoyée via l'URL
if (isset($_GET["adresseEVN"])) {
    $adresseEVN = $_GET["adresseEVN"];
} else {
    $adresseEVN = ""; // Adresse par défaut si aucune adresse n'est envoyée
}

// When setting idEntreprise
if (isset($_GET["idE"])) {
    $_SESSION["idE"] = $_GET["idE"];
}

// When retrieving idEntreprise
if (isset($_SESSION["idE"])) {
    $idEntreprise = $_SESSION["idE"];
} else {
    $idEntreprise = ""; // Set default value if idEntreprise is not set
}
if (
    isset($_POST["nomEvenement"]) &&
    isset($_POST["dateEVN"]) &&
    isset($_POST["idCategorieEVN"])
) {
    if (
        !empty($_POST["nomEvenement"]) &&
        !empty($_POST["dateEVN"]) &&
        !empty($_POST["idCategorieEVN"])
    ) {
        $nomCategorie = $_POST["idCategorieEVN"];
        // Vérifier si une nouvelle catégorie a été saisie
        if (isset($_POST["nouvelleCategorie"]) && !empty($_POST["nouvelleCategorie"])) {
            // Ajouter la nouvelle catégorie
            $categorieevnC->addcategorieevn($_POST["nouvelleCategorie"]);
            // Récupérer l'ID de la nouvelle catégorie ajoutée
            $nomCategorie = $categorieevnC->getLastInsertedId();
        }
        $evenement = new Evenement(
            NULL,
            $_POST["nomEvenement"],
            $adresseEVN, // Utiliser l'adresse récupérée depuis l'URL
            new DateTime($_POST['dateEVN']),
            $nomCategorie, // Utiliser l'ID de la catégorie
            $adresseEVN, // Ancienne adresse par défaut
            new DateTime($_POST['dateEVN']), // Ancienne date par défaut
            $idEntreprise, // Utiliser l'ID de l'entreprise
        );
        $evenementC->addEvenement($evenement);
        header("Location: profilentreprise.php?idE={$_SESSION['idE']}");
        exit(); // Terminer le script après la redirection
    } else {
        $error = "Missing information";
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
                    <div class="login-form-wrapper">
                        <div class="form-title">
                            <span>ajouter evenement</span>
                        </div>
                        <form name="monFormulaire" method="POST" action="" onsubmit="return validateForm();">
                            <input type="hidden" name="idE" value="<?php echo $idE; ?>">
                            <div class="input-box">
                                <input type="text" class="input-field" placeholder="nomEvenement" name="nomEvenement">
                                <div id="nomEvenementError" style="color: red;"></div> <!-- Ajout de l'élément d'erreur -->
                            </div>
                            <div class="input-box">
                                <input type="text" class="input-field" placeholder="adresseEVN" name="adresseEVN" value="<?php echo isset($adresseEVN) ? $adresseEVN : ''; ?>">
                                <div id="adresseEVNError" style="color: red;"></div> <!-- Ajout de l'élément d'erreur -->
                            </div>
                            <a href="map.php" style="margin-left: 10px;">Choisir localisation</a> <!-- Ajout du lien -->
                            <div class="input-box">
                                <input type="date" class="input-field" placeholder="dateEVN" name="dateEVN">
                                <div id="dateEVNError" style="color: red;"></div> <!-- Ajout de l'élément d'erreur -->
                            </div>
                            <div class="input-box">
                                <select name="idCategorieEVN" id="idCategorieEVN" class="input-field">
                                    <?php
                                    foreach ($listeCategorieevns as $categorieevn) {
                                        echo '<option value="' . $categorieevn['idCategorieEVN'] . '">' . $categorieevn['nomCategorieEVN'] . '</option>';
                                    }
                                    ?>
                                </select>
                                <a href="javascript:void(0);" id="ajouterCategorie">Ajouter une catégorie</a>
                                <div id="nouvelleCategorie" style="display: none;">
                                    <input type="text" class="input-field" placeholder="Nouvelle catégorie" name="nouvelleCategorie" id="nouvelleCategorieInput">
                                    <button type="button" id="validerNouvelleCategorie">Valider</button>
                                </div>
                            </div>
                            <div class="input-box">
                                <button type="submit" name="envoyer" style="background-color: #3498db; color: white; border: none; padding: 10px 20px; border-radius: 5px; cursor: pointer;">envoyer<i class="bx bx-right-arrow-alt"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<script>
    document.getElementById('ajouterCategorie').addEventListener('click', function() {
        document.getElementById('nouvelleCategorie').style.display = 'block';
    });

    document.getElementById('validerNouvelleCategorie').addEventListener('click', function() {
        var nouvelleCategorieInput = document.getElementById('nouvelleCategorieInput').value;
        var selectCategorie = document.getElementById('idCategorieEVN');
        var optionExists = false;
        for (var i = 0; i < selectCategorie.options.length; i++) {
            if (selectCategorie.options[i].text === nouvelleCategorieInput) {
                optionExists = true;
                break;
            }
        }
        if (!optionExists) {
            var newOption = new Option(nouvelleCategorieInput, '');
            selectCategorie.appendChild(newOption);
        }
        document.getElementById('nouvelleCategorie').style.display = 'none';
    });
</script>


    </div>
</div>
</div>
<footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.25s">
                    <p>© Copyright 2024 Khadamni. All Rights Reserved.</p>
                </div>
            </div>
        </div>
</footer>
</div>    


<!-- JS -->
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
