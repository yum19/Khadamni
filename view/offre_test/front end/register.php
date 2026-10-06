<?php
require_once 'C:\xampp\htdocs\web\controller\testC.php';
require_once 'C:\xampp\htdocs\web\controller\entretienC.php';
$TestC = new TestC();
$user=null;
$error = "";


if (
    isset($_POST["email_test"]) &&
    isset($_POST["nom_entreprise_test"]) &&
    isset($_POST["domaine_informatique_test"]) &&
    isset($_POST["date_test"])
) {
    if (
        !empty($_POST['email_test']) &&
        !empty($_POST["nom_entreprise_test"]) &&
        !empty($_POST["domaine_informatique_test"]) &&
        !empty($_POST["date_test"])
    ) {
        $user = new User(
            null,
            $_POST['email_test'],
            $_POST['nom_entreprise_test'],
            $_POST['domaine_informatique_test'],
            $_POST['date_test']
        );

        $TestC->addUser($user);

        echo '<script>alert("Utilisateur ajouté avec succès.");</script>';
        // Redirect to the quiz.html page
        if ($_POST['domaine_informatique_test'] == 'Développement web') {
            // Redirect to quiz.php
            header("Location: http://localhost/web/view/offre_test/view/front%20end/quiz.php");
            exit;
        } elseif ($_POST['domaine_informatique_test'] == 'Développement mobile') {
            // Redirect to quiz2.php
            header("Location: http://localhost/web/view/offre_test/front%20end/quiz2.php");
            exit;
        }  elseif ($_POST['domaine_informatique_test'] == 'Science informatique') {
            // Redirect to quiz2.php
            header("Location: http://localhost/web/view/offre_test/front%20end/quiz3.php");
            exit;
        }  elseif ($_POST['domaine_informatique_test'] == 'Securité informatique') {
            // Redirect to quiz2.php
            header("Location: http://localhost/web/view/offre_test/front%20end/quiz4.php");
            exit;
        } else {
            // Do nothing if the condition doesn't match
        }
    } else {
        $error = "Tous les champs doivent être remplis";
    }
}

$TestC2 = new TestC2();

if (
    isset($_POST["id_test"]) &&
    isset($_POST["email_test"]) &&
    isset($_POST["nom_entre"]) &&
    isset($_POST["prenom_entre"]) &&
    isset($_POST["nom_entreprise_test"]) &&
    isset($_POST["date_entre"]) &&
    isset($_POST["type_entre"])
) {
    if (
        !empty($_POST['id_test']) &&
        !empty($_POST['email_test']) &&
        !empty($_POST["nom_entre"]) &&
        !empty($_POST["prenom_entre"]) &&
        !empty($_POST["nom_entreprise_test"]) &&
        !empty($_POST["date_entre"]) &&
        !empty($_POST["type_entre"])
    ) {
        // Check if the provided id_test exists in the test table
        $id_test = $_POST['id_test'];
        $cfg = require __DIR__ . '/../../../config.local.php';
        $pdo = new PDO(
            $cfg['db']['dsn'],
            $cfg['db']['user'],
            $cfg['db']['pass'],
            [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            ]
        );
        $query = "SELECT id_test FROM test WHERE id_test = ?";
        $statement = $pdo->prepare($query);
        $statement->execute([$id_test]);
        $existing_id_test = $statement->fetchColumn();

        // If the provided id_test does not exist, display an alert message
        if (!$existing_id_test) {
            echo '<script>alert("Le id_test fourni n\'existe pas. Veuillez entrer un id_test valide.");</script>';
        } else {
            // Proceed with adding the user to the entretien table
            $user2 = new User2(
                null,
                $_POST['id_test'],
                $_POST['email_test'],
                $_POST['nom_entre'],
                $_POST['prenom_entre'],
                $_POST['nom_entreprise_test'],
                $_POST['date_entre'],
                $_POST['type_entre']
            );

            $TestC2->addUser2($user2);

            echo '<script>alert("Utilisateur ajouter avec succés.");</script>';
            exit;
        }
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
                <a href="index.php" class="logo">
                  <h4>
                    <div class="corner-container">
                      <img src="assets/img/logo.png" >
                    </div> 
                  Kha<span>Damni</span></h4>
                </a>
    
                <!-- ***** Logo End ***** -->
                <!-- ***** Menu Start ***** -->
                <ul class="nav">
                <li class="scroll-to-section"><a href="http://localhost/web/view/etudiant/index.php">Acceuil</a></li>
                  <li class="scroll-to-section"><a href="#services">Offres&demandes</a></li>
                <li class="scroll-to-section"><a href="#yomna" class="active">Entretien</a></li>
                <li class="scroll-to-section"><a href="#portfolio">Evènement</a></li>
                <li class="scroll-to-section"><a href="#blog">Blog</a></li> 
                <li class="scroll-to-section"><a href="#contact">Reclamation</a></li> 
                <li class="scroll-to-section"><a href="http://localhost/web/view/reclam_blog/bot.php">Chatbot</a></li> 
                <li class="scroll-to-section"><a href="http://localhost/web/view/etudiant/afficherProfil.php">Profile</a></li> 
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
    height: 60px;
    padding: 0 20px;
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
    height: 50px;
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
            <img src="assets\img\about-left-image.png" class="form-image-main">
            <img src="assets/img/cloud.png" class="form-image cloud">
            <img src="assets/img/stars.png" class="form-image stars">
        </div>
        <p class="featured-words">Bienvenue sur <span> Khadamni</span></p>
        </div>
     <div class="col col-2">
        
                <div class="login-form">
                <div class="form-title">
                    <span> Test Enligne</span>
                </div>
                <form id="test-form" action="register.php" method="post">
                    <div class="form-inputs">
                        <div class="input-box">
                            <input type="text" class="input-field" id="email" placeholder="Email" name="email_test" style="width: 100%;">
                            <span style="color:red" id="email_error"></span>
                        </div>
                    </div>
                    <div class="form-inputs">
                        <div class="input-box">
                            <input type="text" class="input-field" id="entreprise" placeholder="Nom de l'entreprise" name="nom_entreprise_test" style="width: 100%;">
                            <span style="color:red" id="name_error"></span>
                        </div>
                    </div>
                    <?php
                        if(isset($_GET['domaine_informatique_test'])) {
                            $domaine_informatique_test= $_GET['domaine_informatique_test'];
                            // Utilisez $id_o comme nécessaire dans votre page ajoutDemande.php
                        } else {
                            // Gérer le cas où id_o n'est pas défini dans l'URL
                            $domaine_informatique_test = ''; // Initialisez la variable avec une valeur par défaut
                        }
                        ?>

                        <div class="form-inputs">
                            <div class="input-box">
                                <input type="text" class="input-field" id="domaine_informatique_test" name="domaine_informatique_test"  value="<?= $domaine_informatique_test ?>" style="width: 100%;">
                                <div id="domaine-error" class="error-message"></div>
                            </div>
                        </div>


                    <div class="form-inputs">
                        <input type="date" class="input-field" id="date" placeholder="Date de test" name="date_test" style="width: 100%;">
                        <span style="color:red" id="date_error" ></span>
                    </div>
                    <div class="form-inputs">    
                        <div class="input-box">
                            <button type="submit" class="input-submit" id="submit-btn">
                                <span>Passer le test maintenant!</span>
                                <i class="bx bx-right-arrow-alt"></i>
                            </button>
                        </div>
                    </div>
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
<script type="text/javascript">
    const name = document.getElementById('entreprise');
    const email = document.getElementById('email');
    const date = document.getElementById('date'); // Add reference to the date input

    const form = document.getElementById('test-form');

    const name_error = document.getElementById('name_error');
    const email_error = document.getElementById('email_error');
    const pass_error = document.getElementById('pass_error');

    form.addEventListener('submit', (e) => {
        const alphabetRegex = /^[a-zA-Z\s]+$/;
        const email_check = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;

        if (name.value === '' || name.value == null) {
            e.preventDefault();
            name_error.innerHTML = "Le nom de l'entreprise est requis";
        } else if (!alphabetRegex.test(name.value.trim())) {
            e.preventDefault();
            name_error.innerHTML = "Le nom de l'entreprise doit contenir uniquement des lettres";
        } else {
            name_error.innerHTML = "";
        }

        if (!email.value.match(email_check)) {
            e.preventDefault();
            email_error.innerHTML = "Email valide est requis";
        } else {
            email_error.innerHTML = "";
        }

        // Date validation
        const currentDate = new Date();
        const formattedDate = currentDate.toISOString().slice(0, 10);

        if (date.value !== formattedDate) {
            e.preventDefault();
            // You can customize the error message as needed
            date_error.innerHTML = "La date doit être aujourd'hui";
        } else {
            date_error.innerHTML = "";
        }
    });
</script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Récupérer le champ domaine_informatique_test
        const domaineInput = document.getElementById('domaine_informatique_test');

        // Récupérer la valeur de domaine_informatique_test depuis l'URL
        const urlParams = new URLSearchParams(window.location.search);
        const domaine_informatique_test = urlParams.get('domaine_informatique_test');

        // Définir la valeur du champ domaine_informatique_test
        if (domaine_informatique_test) {
            domaineInput.value = domaine_informatique_test;
        }
    });
</script>

<script src="assets/js/main.js"></script>
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/owl-carousel.js"></script>
<script src="assets/js/animation.js"></script>
<script src="assets/js/imagesloaded.js"></script>
<script src="assets/js/templatemo-custom.js"></script>
</body>
</html>