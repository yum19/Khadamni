<?php
include 'C:/xampp/htdocs/web/controller/DomaineC.php';
$domaineC = new DomaineC();
$liste = $domaineC->ListeDomaines();
?>
<html>


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
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-space-dynamic.css">
    <link rel="stylesheet" href="assets/css/animated.css">
    <link rel="stylesheet" href="assets/css/owl.css">
</head>

<body>
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
                </div></h4>
            </a>

            <!-- ***** Logo End ***** -->
            <!-- ***** Menu Start ***** -->
            <ul class="nav">
              <li class="scroll-to-section"><a href="http://localhost/web/view/etudiant/index.php" >Acceuil</a></li>
              <li class="scroll-to-section"><a href="#services" class="active">Offres&demandes</a></li>
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
  <div class="main-banner wow fadeIn" id="top" data-wow-duration="1s" data-wow-delay="0.5s">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="card-body">
            <h4 class="card-title">Table Domaine</h4>
            <div class="table-responsive">
              <table class="table table-bordered verticle-middle">
                <thead>
                  <tr>
                    <th scope="col">id_dom</th>
                    <th scope="col">domaine_informatique</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  foreach ($liste as $domaine) {
                  ?>
                    <tr>
                      <td><?php echo $domaine['id_dom']; ?></td>
                      <td><?php echo $domaine['domaine_informatique']; ?></td>

                    </tr>
                  <?php
                  }
                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>



    <script src="../templatemo_562_space_dynamic/assets/js/isotope.js"></script>
    <script src="../templatemo_562_space_dynamic/assets/js/owl-carousel.js"></script>
    <script src="../templatemo_562_space_dynamic/assets/js/animation.js"></script>
    <script src="../templatemo_562_space_dynamic/assets/js/imagesloaded.js"></script>
    <script src="../templatemo_562_space_dynamic/assets/js/templatemo-custom.js"></script>
    <script src="../templatemo_562_space_dynamic/assets/js/main.js"></script>
    <script src="../templatemo_562_space_dynamic/assets/js/tabs.js"></script>


    <script src="../templatemo_562_space_dynamic/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../templatemo_562_space_dynamic/vendor/bootstrap/js/bootstrap.bundle.min.js.map"></script>
    <script src="../templatemo_562_space_dynamic/vendor/bootstrap/js/bootstrap.min.js"></script>

  </body>

</html>

   