<?php

include 'C:/xampp/htdocs/web/controller/RecruteurC.php';

$error = "";


// Créer une instance de réclamation
$reclamation = null;

// Créer une instance du contrôleur de réclamation
$reclamationC = new reclamationC();
if (
    isset($_POST["id_reclamation"]) &&
    isset($_POST["date"]) &&
    isset($_POST["categorie_reclamation"]) &&
    isset($_POST["explication"])&&
    isset($_POST["idEtudiant"])
) {
    if (
        !empty($_POST["id_reclamation"]) &&
        !empty($_POST["date"]) &&
        !empty($_POST["categorie_reclamation"]) &&
        !empty($_POST["explication"])&&
        !empty($_POST["idEtudiant"])
    ) {
        // Créer un objet reclamation
        $reclamation = new reclamation(
            $_POST['id_reclamation'],
            new DateTime($_POST['date']),
            $_POST['categorie_reclamation'],
            $_POST['explication'],
            $_POST['idEtudiant']
        );
        // Mettre à jour la réclamation
        $reclamationC->updatereclamation($reclamation, $_POST["id_reclamation"]);
        // Rediriger vers la page de liste
        header('Location:listereclame.php');
        exit(); // Arrêter l'exécution du script après la redirection
    } else {
        $error = "Missing information";
    }
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>reclamation Display</title>
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="css/fontawesome.css">
    <link rel="stylesheet" href="css/templatemo-space-dynamic.css">
    <link rel="stylesheet" href="css/animated.css">
    <link rel="stylesheet" href="css/owl.css">
    <!-- Custom CSS -->
    <style>
        /* Importation d'une police Google Fonts */
        @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap');

        /* Utilisation de la police Roboto */
        body {
            font-family: 'Roboto', sans-serif;
            margin-top: 120px; /* Augmentation de la marge supérieure */
        }

        .rectangle {
            background-color: #fff; /* Couleur de fond blanc */
            border: 1px solid red; /* Bordure rouge */
            width: 100%;
            max-width: 800px;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            margin: 20px auto;
            text-align: left;
            position: relative;
        }

        .button {
            background-color: #fe3f40; /* Modification de la couleur de fond */
            font-size: 15px;
            font-weight: 400;
            color: #fff;
            text-transform: capitalize;
            padding: 12px 25px;
            border-radius: 23px;
            letter-spacing: 0.25px;
            border: none;
            outline: none;
            transition: all .3s;
            margin-right: 10px; /* Espacement entre les boutons */
            font-family: 'Roboto', sans-serif; /* Utilisation de la police Roboto */
        }

        .button:hover {
            background-color: #03a4ed; /* Couleur de fond au survol */
        }

        .search-button {
            background-color: #fe3f40; /* Couleur de fond du bouton */
            color: #fff; /* Couleur du texte */
            border: none; /* Supprimer la bordure */
            border-radius: 50%; /* Bordure arrondie pour donner une forme de cercle */
            padding: 10px; /* Espacement à l'intérieur du bouton */
            cursor: pointer; /* Curseur au survol */
            outline: none; /* Supprimer la bordure au focus */
            transition: background-color 0.3s; /* Animation de transition de la couleur de fond */
        }

        .search-button:hover {
            background-color: #03a4ed; /* Couleur de fond au survol */
        }

        /* Styliser l'icône de loupe */
        .search-button i {
            font-size: 18px; /* Taille de l'icône */
        }

        .animated-image {
            position: absolute;
            top: 10%;
            right: 20px;
            transform: translateY(-50%);
            animation: slideInRight 1s ease forwards;
            width: 200px; /* Ajuster la largeur de l'image */
            height: auto; /* Garder les proportions de l'image */
        }

        @keyframes slideInRight {
            from {
                transform: translateX(100%);
            }
            to {
                transform: translateX(0);
            }
        }

        .list-group-item {
            /* Supprimer les styles de couleur de fond et de bordure */
            background-color: transparent;
            border: none;
            padding: 0; /* Ajuster le rembourrage pour que le texte soit plus proche de la bordure */
        }

        #sort-button {
            background-color: #03a4ed;
    position: fixed;
    top: 100px; /* Modifier cette valeur pour ajuster la position verticale */
    right: 20px;
    z-index: 1000; /* Assurez-vous que le bouton reste au-dessus du contenu */
}


    </style>
</head>

<body>
<header class="header-area header-sticky wow slideInDown" data-wow-duration="0.75s" data-wow-delay="0s" style="position: fixed; top: 0; width: 100%; z-index: 1000;">
        <div class="container">
            <!-- Contenu de l'en-tête -->
            <!-- Ajoutez votre contenu d'en-tête ici -->
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="index.html" class="logo">
                        <h4>
                            <div class="corner-container">
                            <img src="../etudiant/assets/images/logo.png" >
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
                            </div> 
                        Kha<span>Damni</span></h4>
                        </a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li class="scroll-to-section"><a href="http://localhost/web/view/etudiant/index.php" class="active">Acceuil</a></li>

                            <li class="scroll-to-section"><a href="#services">Offres&demandes</a></li>
                            <li class="scroll-to-section"><a href="#yomna">Entretien</a></li>
                            <li class="scroll-to-section"><a href="#portfolio">Evènement</a></li>
                            <li class="scroll-to-section"><a href="#blog">Blog</a></li> 
                            <li class="scroll-to-section"><a href="#contact" class="active">Reclamation</a></li> 
                            <li class="scroll-to-section"><a href="http://localhost/web/view/reclam_blog/bot.php" >Chatbot</a></li> 
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
    <br>
<button style="background-color: white; border: 2px solid red; padding: 10px 20px; font-size: 16px; border-radius: 20px;">
    <a href="listereclame.php" style="text-decoration: none; color: black;">Retour à la liste</a>
</button>

    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>

    <?php
    if (isset($_POST['id_reclamation'])) {
        $reclamation = $reclamationC->showrecruteur($_POST['id_reclamation']);

    ?>

<form action="" method="POST" style="text-align: center;">
    <div style="margin-bottom: 10px; border: 1px solid #ccc; border-radius: 5px; padding: 10px; display: inline-block;">
        <label for="id_reclamation" style="display: block; margin-bottom: 5px;">id_reclamation:</label>
        <input type="text" name="id_reclamation" id="id_reclamation" value="<?php echo $reclamation['id_reclamation']; ?>" maxlength="20" style="width: 200px; padding: 5px; border: 1px solid #ccc; border-radius: 5px;">
    </div>
    <div style="margin-bottom: 10px; border: 1px solid #ccc; border-radius: 5px; padding: 10px; display: inline-block;">
        <label for="date" style="display: block; margin-bottom: 5px;">date:</label>
        <input type="text" name="date" id="date" value="<?php echo date('Y-m-d'); ?>" style="width: 200px; padding: 5px; border: 1px solid #ccc; border-radius: 5px;" readonly>
    </div>
    <div style="margin-bottom: 10px; border: 1px solid #ccc; border-radius: 5px; padding: 10px; display: inline-block;">
        <label for="categorie_reclamation" style="display: block; margin-bottom: 5px;">Catégorie:</label>
        <input type="text" name="categorie_reclamation" value="<?php echo $reclamation['categorie_reclamation']; ?>" id="categorie_reclamation" style="width: 200px; padding: 5px; border: 1px solid #ccc; border-radius: 5px;">
    </div>
    <div style="margin-bottom: 10px; border: 1px solid #ccc; border-radius: 5px; padding: 10px; display: inline-block;">
        <label for="explication" style="display: block; margin-bottom: 5px;">explication:</label>
        <input type="text" name="explication" value="<?php echo $reclamation['explication']; ?>" id="explication" style="width: 200px; padding: 5px; border: 1px solid #ccc; border-radius: 5px;">
    </div>
    <div style="margin-bottom: 10px; border: 1px solid #ccc; border-radius: 5px; padding: 10px; display: inline-block;">
        <label for="idEtudiant" style="display: block; margin-bottom: 5px;">idEtudiant:</label>
        <input type="text" name="idEtudiant" value="<?php echo $reclamation['idEtudiant']; ?>" id="idEtudiant" style="width: 200px; padding: 5px; border: 1px solid #ccc; border-radius: 5px;">
    </div>
   
    <div>
        <input type="submit" value="Update" style="padding: 8px 20px; background-color: #fe3f40; color: #fff; border: none; border-radius: 5px; cursor: pointer;">
        <input type="reset" value="Reset" style="padding: 8px 20px; background-color: #ccc; color: #fff; border: none; border-radius: 5px; cursor: pointer;">
    </div>
    <div style="margin-bottom: 300px;">
    <img src="services-left-image.png" alt="" style="width: 400px; height: 300px;">
</div>

</form>



    <?php
    }
    ?>
    <footer>
    <div class="container">
      <div class="row">
        <div class="col-lg-12 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.25s">
          <p>© Copyright 2024 Khadamni. All Rights Reserved.           
        </div>
      </div>
    </div>
  </footer>
</body>

</html>
