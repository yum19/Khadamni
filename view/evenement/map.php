<?php
$adresseEVN = ""; // Initialisation de la variable adresseEVN

    if (isset($_POST["submit_address"])) {
        $address = $_POST["address"];
        $address = str_replace(" ", "+", $address);
        $adresseEVN = $address; // Enregistrement de l'adresse dans la variable adresseEVN
    ?>  
    <br>
    <br>
        <center><div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <iframe width="1000" height="500"
                        src="https://maps.google.com/maps?q=<?php echo $address; ?>&output=embed"></iframe>
                </div>
            </div>
        </div></center>
    <?php
    } 
 ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <title>Space Dynamic - SEO HTML5 Template</title>
    <!-- Bootstrap core CSS -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-space-dynamic.css">
    <link rel="stylesheet" href="categorieevn/assets/css/animated.css">
    <link rel="stylesheet" href="categorieevn/assets/css/owl.css">
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
                                    <img src="assets/images/logo.png">
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
                            <li class="scroll-to-section"><a href="homeCategorieevn.php" class="active">Home</a></li>
                            <li class="scroll-to-section"><a href="#portfolio">evenement</a></li>
                            <li class="scroll-to-section"><a href="#services">Offres&demandes</a></li>
                            <li class="scroll-to-section"><a href="#">Entretien</a></li>
                            <li class="scroll-to-section"><a href="#blog">Blog</a></li>
                            <li class="scroll-to-section"><a href="#contact">Reclamation</a></li>
                            <li class="scroll-to-section"><a href="http://localhost/web/final/view/afficher.php"
                                    class="active">Profile</a></li>
                            <li class="scroll-to-section">
                                <div class="main-red-button"><a href="http://localhost/web/final/view/register.php">Se
                                        connecter</a></div>
                            </li>
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
    <!-- ***** Header Area End ***** -->
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card border-primary">
                    <div class="card-header bg-primary text-white">Entrez une adresse</div>
                    <div class="card-body">
                          <form method="POST">
                            <p>
                                <input type="text" name="address" placeholder="Enter address" value="<?php echo $adresseEVN; ?>">
                            </p>
                            <a href="addEvenement.php?adresseEVN=<?php echo urlencode($adresseEVN); ?>" class="btn btn-primary">valider</a>
                            <button type="submit" name="submit_address" class="btn btn-primary">Chercher</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    

    <!-- Inclure Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">

    <!-- Scripts -->
    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/owl-carousel.js"></script>
    <script src="assets/js/animation.js"></script>
    <script src="assets/js/imagesloaded.js"></script>
    <script src="assets/js/templatemo-custom.js"></script>
</body>

</html>
