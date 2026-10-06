<?php
include 'C:/xampp/htdocs/web/controller/DemandeC.php';

$error = "";

// Initialiser une demande à null
$demande = null;
$demandeC = new DemandeC(); // Instancier la classe DemandeC

// Récupérer l'id_o de l'URL
if(isset($_GET['id_o'])) {
    $id_o = $_GET['id_o'];
    // Utilisez $id_o comme nécessaire dans votre page ajoutDemande.php
} else {
    // Gérer le cas où id_o n'est pas défini dans l'URL
}

// Récupérer l'idEtudiant de l'URL
if(isset($_GET['idEtudiant'])) {
    $idEtudiant = $_GET['idEtudiant'];
    // Utilisez $idEtudiant comme nécessaire dans votre page ajoutDemande.php
} else {
    // Gérer le cas où idEtudiant n'est pas défini dans l'URL
}

if (
    isset($_POST["idEtudiant"]) &&
    isset($_POST["nom_d"]) &&
    isset($_POST["prenom_d"]) &&
    isset($_POST["email_d"]) &&
    isset($_POST["telephone_d"]) &&
    isset($_POST["cv_d"]) &&
    isset($_POST["lettre_motivation"]) &&
    isset($_POST["id_o"]) &&
    isset($_POST["date_d"]) &&
    isset($_POST["status_d"])
) {
    if (
        !empty($_POST["idEtudiant"]) &&
        !empty($_POST["nom_d"]) &&
        !empty($_POST["prenom_d"]) &&
        !empty($_POST["email_d"]) &&
        !empty($_POST["telephone_d"]) &&
        !empty($_POST["cv_d"]) &&
        !empty($_POST["lettre_motivation"]) &&
        !empty($_POST["id_o"]) &&
        !empty($_POST["date_d"]) &&
        !empty($_POST["status_d"])
    ) {
        $id_o = $_POST['id_o'];
        $cfg = require __DIR__ . '/../../config.local.php';
        $pdo = new PDO(
            $cfg['db']['dsn'],
            $cfg['db']['user'],
            $cfg['db']['pass'],
            [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            ]
        );
        $query = "SELECT id_o FROM offre WHERE id_o = ?";
        $statement = $pdo->prepare($query);
        $statement->execute([$id_o]);
        $existing_id_o = $statement->fetchColumn();

        // Si le id_o n'existe pas, afficher une alerte et rediriger
        if (!$existing_id_o) {
            echo '<script>alert("Le id_o fourni n\'existe pas. Veuillez entrer un id_o valide.");</script>';
            header('Location: ListeDemandes_front.php');
            exit;
        }

        // Si le id_o existe, ajouter la demande
        $demande = new Demande(
            null, // Laisser l'ID être défini automatiquement
            $_POST["idEtudiant"],
            $_POST["nom_d"],
            $_POST["prenom_d"],
            $_POST["email_d"],
            $_POST["telephone_d"],
            $_POST["cv_d"],
            $_POST["lettre_motivation"],
            $_POST["id_o"], // Modifier l'attribut id_o à idEtudiant
            new DateTime($_POST['date_d']),
            $_POST["status_d"]
        );

        $demandeC->ajoutDemande($demande);

        echo '<script>alert("Utilisateur ajouté avec succès.");</script>';
        header("Location: http://localhost/web/view/offre_test/profilEtudiantD.php?idEtudiant=$idEtudiant");
        exit();
    } else {
        $error = "Tous les champs doivent être remplis";
    }
}

?>

<html>
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


    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

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
    
    <div class="form-container">
        <style>
            /* POPPINS FONT */
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap');

/* ====== BASE ===== */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
}

/* ====== Body ===== */
body {
    /*background: #f5f2f2;*/ /* Remove or comment out this line */
    
    background-position: center;
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-size: cover;
    display: flex;
    align-items: center;
    justify-content: center;
    min-height: 100vh;
    padding: 0 20px;
}


/* ====== Form container ===== */
.form-container {
    display: flex;
    width: 1000px;
    height: 680px;
    border: 3px solid #fe3f40;
    border-radius: 50px;
    backdrop-filter: blur(20px);
    overflow: hidden;
}

/* ====== First Column ===== */
.col-1 {
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column;
    width: 55%;
    background: #fe3f40;
    backdrop-filter: blur(20px);
    border-radius: 0 30% 20% 0;
    transition: border-radius .3s;
}

.image-layer {
    position: relative;
}

.form-image-main {
    width: 400px;
    animation: scale-up 3s ease-in-out alternate infinite;
}

.form-image {
    position: absolute;
    left: 0;
    width: 400px;
}
.form-image1 {
    position: fixed; /* Positioning the image relative to the viewport */
    top: 0; /* Positioning the image at the top of the viewport */
    left: 0; /* Positioning the image at the left of the viewport */
    width: 100px;
    z-index: 999; /* Adjust z-index as needed to ensure it's above other elements */
}


/* ====== Form Image Animation ===== */
.coin {
    animation: scale-down 3s ease-in-out alternate infinite;
}

.spring {
    animation: scale-down 3s ease-in-out alternate infinite;
}

.dots {
    animation: scale-up 3s ease-in-out alternate infinite;
}

.rocket {
    animation: up-down 3s ease-in-out alternate infinite;
}

.cloud {
    animation: left-right 3s ease-in-out alternate infinite;
}

.stars {
    animation: scale-down 3s ease-in-out alternate infinite;
}

@keyframes left-right {
    to {
        transform: translateX(10px);
    }
}

@keyframes up-down {
    to {
        transform: translateY(10px);
    }
}

@keyframes scale-down {
    to {
        transform: scale(0.95);
    }
}

@keyframes scale-up {
    to {
        transform: scale(1.05);
    }
}

/* ====== Featured Words ===== */
.featured-words {
    text-align: center;
    color: #edeff0;
    width: 500px;
}

.featured-words span {
    font-weight: 400;
    color: #03a4ed;
}

/* ====== Second Column ===== */
.col-2 {
    position: relative;
    width: 45%;
    padding: 20px;
    overflow: hidden;
}

.btn-box {
    display: flex;
    justify-content: center;
    gap: 10px;
    margin-top: 0px;
    
}

.btn {
    font-weight: 500;
    padding: 5px 30px;
    border: none;
    border-radius: 30px;
    background: rgba(255, 255, 255, 0.3);
    color: #0b0b0b;
    box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
    cursor: pointer;
    transition: .1s;
}

.btn-1 {
    background: #03a4ed;
}

.btn:hover {
    opacity: 0.85;
}

/*  ======= Login Form ========  */
.login-form {
    position: absolute;
    left: 50%;
    transform: translateX(-50%);
    display: flex;
    flex-direction: column;
    align-items: center;
    width: 100%;
    padding: 0 4vw;
    transition: .3s;
}

/*  ======= Register Form ========  */
.register-form {
    position: absolute;
    left: -150%;
    transform: translateX(-50%);
    display: flex;
    flex-direction: column;
    align-items: center;
    width: 100%;
    padding: 0 4vw;
    transition: .3s;
}

.register-form .form-title {
    margin-block: 5px 5px;
}

.form-title {
    margin: 1px 0;
    color: #fe3f40;
    font-size: 25px;
    font-weight: 500;
}

.form-inputs {
    width: 100%;
}

.input-box {
    position: relative;

}


.input-field {
    width: 100%;
    height: 35px;
    padding: 0 15px;
    margin: 5px 0;
    color: #ffff;
    background: #acd7f6f0;
    box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
    border: none;
    border-radius: 10px;
    outline: none;
    backdrop-filter: blur(20px);
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
}
.input-field2 {
    width: 100%;
    height: 40px;
    padding: 0 15px;
    margin: 5px 0;
    color: #ffff;
    box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
    border: none;
    border-radius: 10px;
    outline: none;
    backdrop-filter: blur(20px);
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
}


::placeholder {
    color: #fff;
    font-size: 15px;
}

.input-submit {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
    width: 100%;
    height: 30px;
    padding: 0 15px;
    margin: 5px 0;
    color: #fff;
    background: #03a4ed;
    border: none;
    border-radius: 10px;
    box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
    cursor: pointer;
    transition: .3s;
}

.input-submit:hover {
    gap: 15px;
    background-color: #fe3f40;
}


/* ====== Responsive ====== */
@media (max-width: 892px) {
    .form-container {
        width: 400px;
    }

    .col-1 {
        display: none;
    }

    .col-2 {
        width: 100%;
    }
}
        </style>
       <div class="col col-1">
        <div class="image-layer">
            <img src="assets/img/about-left-image.png" class="form-image-main">
            <img src="assets/img/cloud.png" class="form-image cloud">
            <img src="assets/img/stars.png" class="form-image stars">
        </div>
        <p class="featured-words">Bienvenue sur <span> Khademni</span></p>
        </div>
     <div class="col col-2">
        
        <div class="login-form">
            <div class="form-title">
                <span> Remplir votre demande </span>
            </div>
            <script>
    function validateForm(event) {
        var idEtudiant = document.forms["monFormulaire"]["idEtudiant"].value;
        var nom_d = document.forms["monFormulaire"]["nom_d"].value;
        var prenom_d = document.forms["monFormulaire"]["prenom_d"].value;
        var email_d = document.forms["monFormulaire"]["email_d"].value;
        var telephone_d = document.forms["monFormulaire"]["telephone_d"].value;
        var cv_d = document.forms["monFormulaire"]["cv_d"].value;
        var lettre_motivation = document.forms["monFormulaire"]["lettre_motivation"].value;
        var id_o = document.forms["monFormulaire"]["id_o"].value;
        var date_d = document.forms["monFormulaire"]["date_d"].value;
        var status_d = document.forms["monFormulaire"]["status_d"].value;

        // Vérifier si les champs sont vides
        if (idEtudiant == "" || nom_d == "" || prenom_d == "" || email_d == "" || telephone_d == "" || cv_d == "" || lettre_motivation == "" || id_o == "" || date_d == "" || status_d == "") {
            alert("Veuillez remplir tous les champs");
            return false;
        }

        // Vérifier si idEtudiant contient uniquement des chiffres
        if (!/^\d+$/.test(idEtudiant)) {
            alert("Le champ ID Étudiant doit contenir uniquement des chiffres");
            return false;
        }

        // Vérifier si nom_d et prenom_d contiennent uniquement des lettres
        if (!/^[a-zA-Z]+$/.test(nom_d) || !/^[a-zA-Z]+$/.test(prenom_d)) {
            alert("Les champs Nom et Prénom ne doivent contenir que des lettres");
            return false;
        }

        // Vérifier le format de l'email_d
        if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email_d)) {
            alert("Le champ Email doit être au format valide");
            return false;
        }

        // Vérifier si telephone_d contient exactement 8 chiffres
        if (!/^\d{8}$/.test(telephone_d)) {
            alert("Le champ Téléphone doit contenir exactement 8 chiffres");
            return false;
        }

        // Vérifier si id_o contient uniquement des chiffres
        if (!/^\d+$/.test(id_o)) {
            alert("Le champ ID Offre doit contenir uniquement des chiffres");
            return false;
        }

        // Vérifier si status_d contient une valeur valide
        if (status_d !== "envoyee" && status_d !== "en_attente" && status_d !== "acceptee" && status_d !== "refusee") {
            alert("Le champ Status doit être une valeur valide");
            return false;
        }

        // Si toutes les validations passent, afficher une alerte pour indiquer que le formulaire a été envoyé avec succès
        alert("Succès ! Votre demande a été envoyée avec succès.", "success");
        return true;
    }
</script>

            <form name="monFormulaire" method="POST" action="" onsubmit="return validateForm(event)">
                <div class="form-inputs">
                    <div class="input-box">
                        <input type="hidden" class="input-field" name="id_demande" placeholder="Id_demande" >
                    </div>
                </div>
                <div class="form-inputs">
                    <div class="input-box">
                    <input type="hidden" class="input-field" name="idEtudiant" value="<?= isset($idEtudiant) ? $idEtudiant : '' ?>">

                    </div>
                </div>

                <div class="form-inputs">
                    <div class="input-box">
                        <input type="text" class="input-field" name="nom_d" placeholder="Nom" >
                        <input type="text" class="input-field" name="prenom_d" placeholder="Prénom" >
                    </div>
                </div>
                <div class="form-inputs">
                    <div class="input-box">
                        <input type="text" class="input-field" name="email_d" placeholder="Email" >
                    </div>
                </div>
                <div class="form-inputs">
                    <div class="input-box">
                    <input type="tel" class="input-field" name="telephone_d" placeholder="Telephone">

                        
                    </div>
                </div>
                <div class="form-inputs">
                    <div class="input-box">
                        <input type="file" class="input-field" name="cv_d" placeholder="CV" >
                    </div>
                </div>
                <div class="form-inputs">
                    <div class="input-box">
                        <input type="file" class="input-field" name="lettre_motivation" placeholder="Lettre_motivation" >
                    </div>
                </div>


                <div class="form-inputs">
                    <div class="input-box">
                        <input type="text" class="input-field" name="id_o" placeholder="Id_offre" value="<?= isset($id_o) ? $id_o : '' ?>">
                        
                    </div>
                </div>
                <div class="form-inputs">
                <div class="input-box">
            <input type="date" class="input-field" name="date_d" id="date_d" placeholder="Date de demande">
        </div>
                </div>
                <div class="form-inputs">
                        <div class="input-box">
                            <input type="text" class="input-field" name="status_d" value="envoyee" readonly>
                        </div>
                    </div>
         
                <div class="form-inputs">    
                    <div class="input-box">
                        <button type="submit" name="envoyer" class="input-submit">
                            <span>envoyer</span>
                            <i class="bx bx-right-arrow-alt"></i>
                        </button>
                    </div>
                </div>
                <a href="resume.php">Cliquez ici pour créé votre CV </a>


                <script>
    document.addEventListener("DOMContentLoaded", function() {
        var currentDate = new Date().toISOString().slice(0, 10);
        document.getElementById("date_d").value = currentDate;
    });
</script>
            </form> 
            
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
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/owl-carousel.js"></script>
<script src="assets/js/animation.js"></script>
<script src="assets/js/imagesloaded.js"></script>
<script src="assets/js/templatemo-custom.js"></script>




</body>
</html>
