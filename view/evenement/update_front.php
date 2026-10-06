<?php
include 'C:/xampp/htdocs/web/controller/EvenementC.php';

$error = "";

// create Evenement
$evenement = null;

// create an instance of the controller
$evenementC = new EvenementC();
if (
    isset($_POST["idEvenement"]) &&
    isset($_POST["nomEvenement"]) &&
    isset($_POST["adresseEVN"]) &&
    isset($_POST["dateEVN"]) &&
    isset($_POST["idCategorieEVN"])&&
    isset($_POST["idE"]) 
) {
    if (
        !empty($_POST["idEvenement"]) &&
        !empty($_POST["nomEvenement"]) &&
        !empty($_POST["adresseEVN"]) &&
        !empty($_POST["dateEVN"]) &&
        !empty($_POST["idCategorieEVN"])&&
        !empty($_POST["idE"])

    ) {
        $evenement = new Evenement(
            $_POST["idEvenement"],
            $_POST["nomEvenement"],
            $_POST["adresseEVN"],
            new DateTime($_POST['dateEVN']),
            $_POST["idCategorieEVN"],
            $_POST["adresseEVN"],
            new DateTime($_POST['dateEVN']),
            $_POST["idE"],
        );
        $evenementC->updateEvenement($evenement, $_POST["idEvenement"], $_POST["idE"]);
        header("Location: profilentreprise.php?idE={$_POST['idE']}");

    } else {
        $error = "Missing information";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Profile</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css" rel="stylesheet">
<style type="text/css">
    body {
        background-color:white;
        background-size: cover;
        margin-top: 20px;
    }
    .card {
        position: relative;
        display: flex;
        flex-direction: column;
        min-width: 0;
        word-wrap: break-word;
        background-color: #f6f5f5c8;
        background-clip: border-box;
        border: 0 solid transparent;
        border-radius: .25rem;
        margin-bottom: 1.5rem;
        box-shadow: 0 2px 6px 0 rgb(218 218 253 / 65%), 0 2px 6px 0 rgb(206 206 238 / 54%);
    }
    .me-2 {
        margin-right: .5rem!important;
    }
    .btn {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        width: 50%;
        height: 40px;
        padding: 0 12px;
        margin: 8px 0;
        color: #fff;
        background: #03a4ed;
        border: none;
        border-radius: 80px;
        box-shadow: 0 3px 6px rgba(0, 0, 0, 0.2);
        cursor: pointer;
        transition: .3s;
    }
    .btn:hover {
        gap: 10px;
        background-color: #fe3f40;
    }
    .btn-delete {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 100%;
        height: 40px;
        color: #fff;
        background: #fe3f40;
        border: none;
        border-radius: 80px;
        box-shadow: 0 3px 6px rgba(0, 0, 0, 0.2);
        cursor: pointer;
        transition: background-color 0.3s;
    }
    .btn-delete:hover {
        background-color: #03a4ed;
    }
    .error-message {
        left: 0;
        color: red;
        font-size: 15px;
    }
</style>

<!--HEADER-->
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
<title>Khadamni</title>

<!-- Bootstrap core CSS -->
<link href="../evenement/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

<!-- Additional CSS Files -->
<link rel="stylesheet" href="../evenement/assets/css/templatemo-space-dynamic.css">
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
                </div> </h4>
            </a>

            <!-- ***** Logo End ***** -->
            <!-- ***** Menu Start ***** -->
            <ul class="nav">
              <li class="scroll-to-section"><a href="http://localhost/web/view/entreprise/index.php" >Acceuil</a></li>
              <li class="scroll-to-section"><a href="#services"class="active">Offres&demandes</a></li>
              <li class="scroll-to-section"><a href="#yomna">Entretien</a></li>
              <li class="scroll-to-section"><a href="#portfolio">Evènement</a></li>
              <li class="scroll-to-section"><a href="#blog">Blog</a></li> 
              <li class="scroll-to-section"><a href="#contact">Reclamation</a></li> 
              <li class="scroll-to-section"><a href="http://localhost/web/view/entreprise/afficherProfil.php" class="active">Profile</a></li> 
              <li class="scroll-to-section"><a href="http://localhost/web/view/entreprise/afficherProfil.php" class="active"></a></li> 

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
        <div class="main-body">
            <div class="row">
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-column align-items-center text-center">
                                <img src="https://bootdey.com/img/Content/avatar/avatar6.png" alt="Admin" class="rounded-circle p-1 bg-primary" width="110">
                            </div>
                            <hr class="my-4">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                    <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-globe me-2 icon-inline"><circle cx="12" cy="12" r="10"></circle><line x1="2" y1="12" x2="22" y2="12"></line><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path></svg>Website</h6>
                                    <span class="text-secondary">https://bootdey.com</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                    <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-github me-2 icon-inline"><path d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22"></path></svg>Github</h6>
                                    <span class="text-secondary">bootdey</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                    <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-twitter me-2 icon-inline text-info"><path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"></path></svg>Twitter</h6>
                                    <span class="text-secondary">@bootdey</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                    <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-instagram me-2 icon-inline text-danger"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line></svg>Instagram</h6>
                                    <span class="text-secondary">bootdey</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                    <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-facebook me-2 icon-inline text-primary"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path></svg>Facebook</h6>
                                    <span class="text-secondary">bootdey</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-body">
                            <div class="mt-3">
                            <?php
            if (isset($_POST['idEvenement'])) {
                $Evenement = $evenementC->showEvenement($_POST['idEvenement']);
            ?>

                        <form method="POST" action="" enctype="multipart/form-data">
                            <input type="hidden" name="idEvenement" id="idEvenement" class="input-field" value="<?php echo $Evenement['idEvenement']; ?>" >
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">nomEvenement</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                <input type="text" name="nomEvenement" id="nomEvenement" class="input-field" value="<?php echo $Evenement['nomEvenement']; ?>">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">adresse d'evenement</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                <input type="text" name="adresseEVN" id="adresseEVN" class="input-field" value="<?php echo $Evenement['adresseEVN']; ?>">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">date d'evenement</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                <input type="date" name="dateEVN" id="dateEVN" class="input-field" value="<?php echo $Evenement['dateEVN']; ?>">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">idCategorieEVN</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                <input type="text" name="idCategorieEVN"  id="idCategorieEVN" class="input-field" value="<?php echo $Evenement['idCategorieEVN']; ?>">
                                </div>
                            </div>
                            <input type="hidden" name="idE" id="idE" class="input-field"value="<?php echo $Evenement['idE']; ?>" >

                            <div class="row mb-3">
                                <div class="col-sm-3"></div>
                                <div class="col-sm-9 text-secondary">
                                    <button class="btn btn-primary px-4" type="submit" name="modifier">Modifier</button>
                                </div>
                            </div>
                        </form>
                        <hr>
                    <?php
                    }
                    ?>


                    <?php
                    // Afficher les messages de succès ou d'erreur
                    if (!empty($success_message)) {
                        echo '<div class="alert alert-success">' . $success_message . '</div>';
                    }
                    if (!empty($error)) {
                        echo '<div class="alert alert-danger">' . $error . '</div>';
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function() {
    var deleteButton = document.querySelector(".btn-delete");
    deleteButton.addEventListener("click", function() {
        var alert = document.querySelector(".alert");
        alert.style.display = "none";
    });
});

<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.bundle.min.js"></script>

<footer>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.25s">
                <p>© Copyright 2024 Khadamni. All Rights Reserved.
            </div>
        </div>
    </div>
</footer>

<script src="../evenement/assets/vendor/jquery/jquery.min.js"></script>
<script src="../evenement/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../evenement/assets/js/owl-carousel.js"></script>
<script src="../evenement/assets/js/animation.js"></script>
<script src="../evenement/assets/js/imagesloaded.js"></script>
<script src="../evenement/assets/js/templatemo-custom.js"></script>

</body>
</html>

