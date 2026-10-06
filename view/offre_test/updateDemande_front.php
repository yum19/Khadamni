<?php
require_once 'C:\xampp\htdocs\web\controller\DemandeC.php'; // Assurez-vous que ce chemin est correct

$error = "";

// create offre
$demande = null;

// create an instance of the controller
$demandeC = new DemandeC();
if (
    isset($_POST["id_d"]) &&
    isset($_POST["idEtudiant"]) &&
    isset($_POST["nom_d"]) &&
    isset($_POST["prenom_d"]) &&
    isset($_POST["email_d"]) &&
    isset($_POST["telephone_d"]) &&
    isset($_FILES["cv_d"]) && // Changement ici pour utiliser $_FILES
    isset($_FILES["lettre_motivation"]) && // Changement ici pour utiliser $_FILES
    isset($_POST["id_o"]) &&
    isset($_POST["date_d"]) &&
    isset($_POST["status_d"])
) {
    if (
        !empty($_POST["id_d"]) &&
        !empty($_POST["idEtudiant"]) &&
        !empty($_POST["nom_d"]) &&
        !empty($_POST["prenom_d"]) &&
        !empty($_POST["email_d"]) &&
        !empty($_POST["telephone_d"]) &&
        !empty($_FILES["cv_d"]["name"]) && // Changement ici pour vérifier si un fichier a été téléchargé
        !empty($_FILES["lettre_motivation"]["name"]) && // Changement ici pour vérifier si un fichier a été téléchargé
        !empty($_POST["id_o"]) &&
        !empty($_POST["date_d"]) &&
        !empty($_POST["status_d"])
    ) {
        // Utilisez $_FILES pour manipuler les fichiers
        $cv_d = $_FILES["cv_d"]["name"];
        $lettre_motivation = $_FILES["lettre_motivation"]["name"];
        
        // Vérifiez si les fichiers ont été correctement téléchargés
        if (move_uploaded_file($_FILES["cv_d"]["tmp_name"], "chemin_vers_votre_dossier/$cv_d") &&
            move_uploaded_file($_FILES["lettre_motivation"]["tmp_name"], "chemin_vers_votre_dossier/$lettre_motivation")) {
            
            // Créez votre objet Demande
            $demande = new Demande(
                $_POST["id_d"],
                $_POST["idEtudiant"],
                $_POST["nom_d"],
                $_POST["prenom_d"],
                $_POST["email_d"],
                $_POST["telephone_d"],
                $cv_d, // Utilisez le nom du fichier téléchargé
                $lettre_motivation, // Utilisez le nom du fichier téléchargé
                $_POST["id_o"],
                new DateTime($_POST['date_d']),
                $_POST["status_d"]
            );
            $demandeC->updateDemande($demande, $_POST["id_d"]);
            header('Location:../offre_test/profilEtudiantD.php');
        } else {
            $error = "Erreur lors du téléchargement des fichiers";
        }
    } else {
        $error = "Informations manquantes";
    }
}
?>
<html lang="en">
 <head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

  <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
  <link href="quixlab-master/css/style.css" rel="stylesheet">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    
  <!-- STYLE -->
  <link rel="stylesheet" href="assets/css/style.css">

  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    
  <!-- Additional CSS Files -->
  <link rel="stylesheet" href="assets/css/fontawesome.css">
  <link rel="stylesheet" href="assets/css/templatemo-space-dynamic.css">
  <link rel="stylesheet" href="assets/css/animated.css">
  <link rel="stylesheet" href="assets/css/owl.css">
  <style>
    /* Ajout de marge entre le header et le formulaire */
    .form-container {
        margin-top: 120px; /* Ajustez la marge selon vos besoins */
        margin-bottom: 1px;
    }

    /* Styles spécifiques au logo */
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
    .main-orange-button {
        background-color: #fe3f40;
        color: white; /* Couleur du texte en blanc */
        padding: 10px 20px;
        border-radius: 25px;
        display: inline-block;
        text-decoration: none;
        font-weight: bold;
    }
        
    .main-orange-button a {
        color: white; /* Couleur du texte en blanc pour les liens */
    }
  </style>
 </head>
 <body>
  <div class="content">
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
                    .photo-animee {
                      animation: deplacement 2s linear infinite alternate; /* Définition de l'animation */
                    }
                    @keyframes deplacement {
                      from {
                          transform: translateX(0); /* Début de la translation (aucun déplacement) */
                      }
                      to {
                          transform: translateX(100px); /* Fin de la translation (déplacement de 100px vers la droite) */
                      }
                    }
                  </style>
                </div> </h4>
            </a>

            <!-- ***** Logo End ***** -->
            <!-- ***** Menu Start ***** -->
            <ul class="nav">
              <li class="scroll-to-section"><a href="http://localhost/web/view/etudiant/index.php" >Acceuil</a></li>
              <li class="scroll-to-section"><a href="#services"class="active">Offres&demandes</a></li>
              <li class="scroll-to-section"><a href="#yomna">Entretien</a></li>
              <li class="scroll-to-section"><a href="#portfolio">Evènement</a></li>
              <li class="scroll-to-section"><a href="#blog">Blog</a></li> 
              <li class="scroll-to-section"><a href="#contact">Reclamation</a></li> 
              <li class="scroll-to-section"><a href="http://localhost/web/view/etudiant/afficherProfil.php" class="active">Profile</a></li> 
              <li class="scroll-to-section"><a href="http://localhost/web/view/etudiant/afficherProfil.php" class="active"></a></li> 

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
    
    <div class="main-orange-button">
      <a href="ListeDemandes_front.php">Retour à la liste</a>
    </div>
    <div id="error">
        <?php echo $error; ?>
    </div>

    <?php
   if (isset($_POST['id_d'])) {
        $demande = $demandeC->showDemande($_POST['id_d']);

    ?>

        <form action="" method="POST" >
                <tr>
                    <td>
                        <label for="cv_d">cv_d:</label>
                    </td>
                    <td><input type="file" name="cv_d" id="cv_d" value="<?php echo $demande['cv_d']; ?>" maxlength="255"></td>
                </tr>
                <br>
                <tr>
                    <td>
                        <label for="lettre_motivation">lettre_motivation:</label>
                    </td>
                    <td><input type="file" name="lettre_motivation" id="lettre_motivation" value="<?php echo $demande['lettre_motivation']; ?>" maxlength="255"></td>
                </tr>
                <br>
                <tr>
                    <td colspan="2" align="center">
                        <input type="submit" name="update" value="modifier">
                    </td>
                </tr>
        </form>
    <?php
    }
    ?>


   
   
  <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.25s">
                    <p>© Copyright 2024 Khadamni. All Rights Reserved.</p>
                </div>
            </div>
        </div>
</footer>
 
    <script src="assets/js/isotope.js"></script>
    <script src="assets/js/owl-carousel.js"></script>
    <script src="assets/js/animation.js"></script>
    <script src="assets/js/imagesloaded.js"></script>
    <script src="assets/js/templatemo-custom.js"></script>
    <script src="assets/js/main.js"></script>
    <script src="assets/js/tabs.js"></script>

    
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js.map"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
  </div>
 
</body>

</html>
