<?php
// Inclure le fichier de la classe RecruteurC.php pour accéder aux méthodes
include 'C:/xampp/htdocs/web/controller/RecruteurC.php';

// Créer une instance de RecruteurC
$reclamationC = new reclamationC();

// Vérifier si une catégorie de réclamation est sélectionnée
if(isset($_POST['categorie_reclamation'])) {
    // Si une catégorie est sélectionnée, filtrer les réclamations par cette catégorie
    $stmt = $reclamationC->getReclamationsByCategory($_POST['categorie_reclamation']);
    $list = $stmt->fetchAll(PDO::FETCH_ASSOC);
} else {
    // Sinon, récupérer toutes les réclamations
    $list = $reclamationC->listereclamation()->fetchAll(PDO::FETCH_ASSOC);
}

// Trier les réclamations par date (ascendant)
usort($list, function($a, $b) {
    return strtotime($a['date']) - strtotime($b['date']);
});

// Définition de la fonction pour filtrer les mots indésirables dans l'explication des réclamations
function filterBadWords($text) {
    // Liste des mots interdits
    $badWords = array("sirine", "israel", "bad_word3"); // Remplacez les mots par ceux que vous souhaitez censurer

    // Remplacer les mots interdits par des étoiles
    foreach ($badWords as $badWord) {
        $text = str_ireplace($badWord, str_repeat("*", mb_strlen($badWord)), $text);
    }

    return $text;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Liste des Réclamations</title>
    <!-- Bootstrap core CSS -->
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
    <!-- En-tête de la page -->
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

    <!-- Formulaire de recherche -->
    <form method="POST" action="listereclame.php">
        <div class="form-inputs" style="display: flex;">
            <div class="input-box" style="display: inline-block; margin-right: 20px;">
                <select name="categorie_reclamation" class="input-field select-field" style="width: 200px; padding: 10px; border: 2px solid #03a4ed; border-radius: 20px; margin-left: auto; margin-right: auto;" required>
                    <option value="" disabled selected hidden>categorie_reclamation</option>
                    <option value="probleme_connexion">probleme_connexion</option>
                    <option value="annonces_trompeuses">annonces_trompeuses</option>
                    <option value="probleme_recruteurs">probleme_recruteurs</option>
                    <option value="problemes_techniques">problemes_techniques</option>
                    <!-- Ajouter plus d'options au besoin -->
                </select>
            </div>
            <div class="input-box" style="display: inline-block;">
                <!-- Bouton de recherche -->
                <button type="submit" class="search-button"><i class="fas fa-search"></i></button>
                <!-- Bouton de tri -->
               <!-- Bouton de tri -->
<button type="button" class="search-button" id="sort-button" style="width: 200px; padding: 10px; border: 2px solid #03a4ed; border-radius: 20px; margin-left: auto; margin-right: 20px; margin-top: 20px;"><i class="fas fa-sort"></i> Trier par date</button>

            </div>
        </div>
    </form>

    <!-- Contenu de la page -->
    <div id="reclamations-list">
        <?php if ($list) { ?>
            <?php foreach ($list as $reclamation) { ?>
                <div class="rectangle">
                    <div class="col-lg-6">
                        <div class="card" style="width: 750px;">
                            <div class="card-body">
                                <h4 class="card-title"></h4>
                                <div class="list-group">
                                    <div class="list-group-item" style="text-align: left;"> <!-- Alignement du texte à gauche -->
                                        <p class="mb-1 date">Date: <?php echo $reclamation['date']; ?></p>
                                        <p class="mb-1">Catégorie: <?php echo $reclamation['categorie_reclamation']; ?></p>
                                        <p class="mb-1">Explication: <?php echo filterBadWords($reclamation['explication']); ?></p>
                                        <form method="POST" action="updaterecruteur.php" style="display: inline-block;">
                                            <input type="hidden" value="<?php echo $reclamation['id_reclamation']; ?>" name="id_reclamation">
                                            <button type="submit" class="button" name="edit"><i class="fa fa-pencil"></i> Modifier</button>
                                        </form>
                                        <form method="POST" action="deleterecruteur.php" style="display: inline-block;">
                                            <input type="hidden" value="<?php echo $reclamation['id_reclamation']; ?>" name="id_reclamation">
                                            <button type="submit" class="button" name="delete"><i class="fa fa-trash"></i> Supprimer</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Image animée -->
                    <img src="blog-dec.png" alt="Votre Image" class="animated-image">
                </div>
            <?php } ?>
        <?php } else { ?>
            <!-- Aucune réclamation trouvée -->
            <p>Aucune réclamation trouvée pour cet étudiant.</p>
        <?php } ?>
    </div>
    <footer>
    <div class="container">
      <div class="row">
        <div class="col-lg-12 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.25s">
          <p>© Copyright 2024 Khadamni. All Rights Reserved.           
        </div>
      </div>
    </div>
  </footer>
    <!-- Scripts JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/owl-carousel.js"></script>
    <script src="assets/js/animation.js"></script>
    <script src="assets/js/imagesloaded.js"></script>
    <script src="assets/js/templatemo-custom.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Référence au bouton de tri
            var sortButton = document.getElementById('sort-button');

            // Fonction pour trier les réclamations par date
            function sortReclamationsByDate() {
                var listContainer = document.getElementById('reclamations-list');
                var listItems = listContainer.getElementsByClassName('rectangle');

                // Convertir la collection en tableau pour utiliser sort()
                var listArray = Array.prototype.slice.call(listItems);

                // Trier les réclamations par date (ascendant)
                listArray.sort(function(a, b) {
                    var dateA = new Date(a.querySelector('.date').textContent);
                    var dateB = new Date(b.querySelector('.date').textContent);
                    return dateA - dateB;
                });

                // Réinsérer les réclamations triées dans le conteneur
                listArray.forEach(function(item) {
                    listContainer.appendChild(item);
                });
            }

            // Associer la fonction de tri à l'événement de clic du bouton de tri
            sortButton.addEventListener('click', sortReclamationsByDate);
        });
    </script>
</body>
</html>
