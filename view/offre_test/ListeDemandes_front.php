<?php
include 'C:/xampp/htdocs/web/controller/DemandeC.php';
$demandeC = new DemandeC();
$liste = $demandeC->ListeDemandes();
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
        
 
  <tbody>
  <div style="margin-top: 100px;">
    <div class="col-lg-6">
      <div class="card" style="width: 1200px;">
        <div class="card-body">
          <h4 class="card-title">Table Demandes</h4>
          <div>
            <?php
            foreach ($liste as $demande) {
            ?>
              <div class="card mb-3">

                <div class="card-body">
                  <h5 class="card-title">  <span style="color:#fe3f40;">Demande :  </span><?php echo  $demande['id_d']; ?></h5>
                  <p class="card-text">
                  <span style="color: blue;">nom_d : </span><?php echo $demande['nom_d']; ?>&nbsp;&nbsp;
                  <span style="color: blue;">prenom_d : </span><?php echo $demande['prenom_d']; ?><br>
                  <span style="color: blue;">email_d : </span><?php echo $demande['email_d']; ?>&nbsp;&nbsp;
                  <span style="color: blue;">telephone_d :</span> <?php echo $demande['telephone_d']; ?><br>
                  <span style="color: blue;">cv_d : </span> <?php echo $demande['cv_d']; ?>&nbsp;&nbsp;
                  <span style="color: blue;">lettre_motivation : </span><?php echo $demande['lettre_motivation']; ?><br>
                  <span style="color: blue;">date_d : </span> <?php echo $demande['date_d']; ?><br>
                  <span style="color: blue;">status_d : </span> <?php echo $demande['status_d']; ?>&nbsp;&nbsp;
                  </p>
                  
                </div>
                
              </div>
            <?php
            }
            ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</tbody>


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
