<?php
include 'C:\xampp\htdocs\web\controller\OffreC.php';
$error = "";
// create offre
$offre = null;
// create an instance of the controller
$offreC = new OffreC();
if (
    isset($_POST["id_o"]) &&
    isset($_POST["id_dom"]) &&
    isset($_POST["titre"]) &&
    isset($_POST["description_o"]) &&
    isset($_POST["type_o"]) &&
    isset($_POST["idE"]) &&
    isset($_POST["lieu"]) &&
    isset($_POST["date_publication"]) &&
    isset($_POST["date_limite"]) &&
    isset($_POST["contact"]) &&
    isset($_POST["status_o"])
) {
    if (
        !empty($_POST["id_o"]) &&
        !empty($_POST["id_dom"]) &&
        !empty($_POST["titre"]) &&
        !empty($_POST["description_o"]) &&
        !empty($_POST["type_o"]) &&
        !empty($_POST["idE"]) &&
        !empty($_POST["lieu"]) &&
        !empty($_POST["date_publication"]) &&
        !empty($_POST["date_limite"]) &&
        !empty($_POST["contact"]) &&
        !empty($_POST["status_o"])
    ) {
        $offre = new Offre(
            $_POST["id_o"],
            $_POST["id_dom"],
            $_POST["titre"],
            $_POST["description_o"],
            $_POST["type_o"],
            $_POST["idE"],
            $_POST["lieu"],
            new DateTime($_POST["date_publication"]),
            new DateTime($_POST["date_limite"]),
            $_POST["contact"],
            $_POST["status_o"]
        );
        $offreC->updateOffre($offre, $_POST["id_o"]);
        header('Location:ListeOffres_front.php');
    } else {
        $error = "Missing information";
    }
}
?>

<html>
<html lang="en">
 <head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1 ,shrink-to-fit=no">
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
        </style>
 </head>

<body>

<div class="content">
<header class="header-area header-sticky wow slideInDown" data-wow-duration="0.75s" data-wow-delay="0s">
            <div class="container" >
              <div class="row">
                <div class="col-12">
                  <nav class="main-nav">
                    <!-- ***** Logo Start ***** -->
                    <a href="index.php" class="logo">
                      <h4>
                        <div class="corner-container">
                          <img src="assets/images/logo.png" >
                        </div> 
                      Kha<span>Damni</span></h4>
                    </a>
        
                    <!-- ***** Logo End ***** -->
                    <!-- ***** Menu Start ***** -->
                    <ul class="nav">
                      <li class="scroll-to-section"><a href="./front end/index.php" >Acceuil</a></li>
                      <li class="scroll-to-section"><a href="#about"></a></li>
                      <li class="scroll-to-section"><a href="#services" class="active">Offres&demandes</a></li>
                      <li class="scroll-to-section"><a href="#portfolio">Entretien</a></li>
                      <li class="scroll-to-section"><a href="#blog">Blog</a></li> 
                      <li class="scroll-to-section"><a href="#contact">Reclamation</a></li> 
                      <li class="scroll-to-section"><div class="main-red-button"><a href="C:\Users\21628\OneDrive\Desktop\projet_web\loginn\loginn\Untitled-1.html">Se connecter</a></div></li> 
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
      <a href="ListeOffres_front.php">Retour à la liste</a>
    </div>


        <style>
  .main-orange-button {
            background-color: #fe3f40;
            color: white; /* Couleur du texte en blanc */
            padding: 10px 20px;
            border-radius: 5px;
            display: inline-block;
            text-decoration: none;
            font-weight: bold;
        }
  .main-orange-button a {
            color: white; /* Couleur du texte en blanc pour les liens */
        }
</style>


    <div id="error">
        <?php echo $error; ?>
    </div>

    <?php
   if (isset($_POST['id_o'])) {
        $offre = $offreC->showOffre($_POST['id_o']);

    ?>


    
        <center><h2>Modifier l'offre</h2></center>
        <form action="" method="POST">
                 
               
                <tr>
                    <td>
                        <label for="titre">Titre:</label>
                    </td>
                    <td><input type="text" name="titre" id="titre" value="<?php echo $offre['titre']; ?>" maxlength="255"></td>
                </tr>
                <br>
                <tr>
                    <td>
                        <label for="description_o">Description:</label>
                    </td>
                    <td><input type="text" name="description_o" id="description_o" value="<?php echo $offre['description_o']; ?>" maxlength="255"></td>
                </tr>
                <br>
                <tr>
                    <td>
                        <label for="date_limite">Date Limite:</label>
                    </td>
                    <td>
                        <input type="date" name="date_limite" id="date_limite" value="<?php echo $offre['date_limite']; ?>">
                    </td>
                </tr>
                <br>
                <tr>
                    <td>
                        <label for="status_o">Status:</label>
                    </td>
                    <td><input type="text" name="status_o" id="status_o" value="<?php echo $offre['status_o']; ?>" maxlength="255"></td>
                </tr>
                <br>
                <!-- Reste du formulaire -->
                <td>
                    <input type="submit" name="update" value="Update">
                </td>
                <td>
                    <input type="reset" value="Reset">
                </td>
            </tr>
                    </form>
                </div>
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
