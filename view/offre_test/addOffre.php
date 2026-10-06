<?php
require_once 'C:\xampp\htdocs\web\controller\OffreC.php'; // Assurez-vous que ce chemin est correct

$error = "";

// create employe
$offre = null;

// create an instance of the controller
$offreC = new OffreC();
$idE = $_GET["idE"];
if (
    !empty($_POST["id_dom"]) &&
    !empty($_POST["titre"]) &&
    !empty($_POST["description_o"]) &&
    !empty($_POST["type_o"]) &&
    !empty($_POST["idE"]) &&
    !empty($_POST["lieu"]) &&
    !empty($_POST["date_publication"]) &&
    !empty($_POST["date_limite"]) &&
    !empty($_POST["contact"]) &&
    !empty($_POST["status_o"]) &&
    isset($_POST["envoyer"])
) {
    // Check if date fields are in the correct format
    if (DateTime::createFromFormat('Y-m-d', $_POST['date_publication']) === false || DateTime::createFromFormat('Y-m-d', $_POST['date_limite']) === false) {
        $error = "Invalid date format";
    } else {
        $date_publication = new DateTime($_POST['date_publication']);
        $date_limite = new DateTime($_POST['date_limite']);

        $domaine_informatique = $offreC->getdomaine_informatique($_POST["id_dom"]);
        $offre = new Offre(
            null, // Laisser l'ID être défini automatiquement
            $_POST["id_dom"],
            $_POST["titre"],
            $_POST["description_o"],
            $_POST["type_o"],
            $_POST["idE"],
            $_POST["lieu"],
            $date_publication,
            $date_limite,
            $_POST["contact"], // Assurez-vous que le contact est un entier
            $_POST["status_o"]
        );

        $offreC->addOffre($offre);
        header("Location: profilEntrepriseO.php?idE=$idE");
        exit; // Ajout de l'exit après la redirection
    }
}

$domaineC = new DomaineC();
$ListeDomaines = $domaineC->ListeDomaines();
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
                          <img src="assets/images/logo.png" >
                        </div> </h4>
                    </a>
        
                    <!-- ***** Logo End ***** -->
                    <!-- ***** Menu Start ***** -->

                    <ul class="nav">
              <li class="scroll-to-section"><a href="http://localhost/web/view/entreprise/index.php" >Acceuil</a></li>
              <li class="scroll-to-section"><a href="#services" class="active">Offres&demandes</a></li>
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
    

<div class="form-container" >
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

        <p class="featured-words">Bienvenue sur <span>   Khademni</span></p>
    </div>


    <div class="col col-2">
        


        <div class="login-form">
            <div class="form-title">
                <span>Remplir votre offre</span>
            </div>
            
            <script>
    function validateForm() {
    var id_dom = document.forms["monFormulaire"]["id_dom"].value;
    var titre = document.forms["monFormulaire"]["titre"].value;
    var description_o = document.forms["monFormulaire"]["description_o"].value;
    var type_o = document.forms["monFormulaire"]["type_o"].value;
    var idE = document.forms["monFormulaire"]["idE"].value;
    var lieu = document.forms["monFormulaire"]["lieu"].value;
    var date_publication = document.forms["monFormulaire"]["date_publication"].value;
    var date_limite = document.forms["monFormulaire"]["date_limite"].value;
    var contact = document.forms["monFormulaire"]["contact"].value;
    var status_o = document.forms["monFormulaire"]["status_o"].value;

    // Vérifier si les champs sont vides
    if (id_dom == "" || titre == "" || description_o == "" || type_o == "" || idE == "" || lieu == "" || date_publication == "" || date_limite == "" || contact == "" || status_o == "") {
        alert("Veuillez remplir tous les champs");
        return false;
    }

    // Vérifier si titre contient seulement des lettres
    if (!/^[a-zA-Z]+$/.test(titre)) {
        alert("Le champ Titre doit contenir uniquement des lettres");
        return false;
    }

    // Vérifier si description contient seulement des lettres
    if (!/^[a-zA-Z]+$/.test(description_o)) {
        alert("Le champ Description doit contenir uniquement des lettres");
        return false;
    }

    // Vérifier si type contient seulement des lettres
    if (!/^[a-zA-Z]+$/.test(type_o)) {
        alert("Le champ Type doit contenir uniquement des lettres");
        return false;
    }

    // Vérifier si datePub est égale à la date du système
    var currentDate = new Date().toISOString().slice(0, 10);
    if (date_publication !== currentDate) {
        alert("La date de publication doit être égale à la date du système");
        return false;
    }

    // Vérifier si dateLimite est différente de la date du système
    if (date_limite === currentDate) {
        alert("La date limite ne peut pas être la même que la date du système");
        return false;
    }

    // Vérifier si contact contient seulement 8 chiffres
    if (!/^\d{8}$/.test(contact)) {
        alert("Le champ Contact doit contenir exactement 8 chiffres");
        return false;
    }

    // Si toutes les validations passent, afficher une alerte pour indiquer que le formulaire a été envoyé avec succès
    alert("Votre offre a été envoyée avec succès.");
    return true;
}

</script>
         <form  name="monFormulaire" method="POST" action="" onsubmit="return validateForm()">   
            
            <div class="form-inputs">
                <div class="input-box">
                    <input type="hidden" class="input-field" placeholder="Id_offre" >
                </div>
            </div>
            <div class="form-inputs">
                <div class="input-box">
                    
                    <select class="input-field"  name="id_dom" >
                        <?php
                        foreach($ListeDomaines as $domaine){
                            echo'<option value="' . $domaine['id_dom'] . '">' . $domaine['domaine_informatique'] . '</option>';
                        }
                        ?>
                        <!-- Add more options as needed -->
                    </select>
                </div>
            
            </div>
            
            <div class="form-inputs">
                <div class="input-box">
                    <input type="text" class="input-field" placeholder="titre"  name="titre" >
                </div>
            </div> 
            <div class="form-inputs">   
                <div class="input-box">
                    <input type="text" class="input-field" placeholder="description_o"  name="description_o" >
                </div>
            </div>
            <div class="form-inputs">
                <div class="input-box">
                    <input type="text" class="input-field" placeholder="type_o"  name="type_o">
                </div>
            </div>
            <div class="form-inputs">
            <div class="input-box">
    <?php
    // Récupérer l'ID passé dans l'URL
    $idE = $_GET["idE"];
    ?>
    <input type="text" class="input-field" placeholder="idE" name="idE" value="<?php echo $idE; ?>" readonly>
</div>
            </div>
            <div class="form-inputs">
                <div class="input-box">
                    <input type="text" class="input-field" placeholder="lieu" name="lieu">
                </div>
            </div>   
            <div class="form-inputs">
                <div class="input-box">
                    <input type="date" class="input-field" placeholder="date_publication"  name="date_publication">
                </div>
            </div>
            <div class="form-inputs">
                <div class="input-box">
                    <input type="date" class="input-field" placeholder="date_limite"  name="date_limite">
                </div>
            </div>
            <div class="form-inputs">
                <div class="input-box">
                    <input type="text" class="input-field" placeholder="contact"  name="contact">
                </div>
            </div>
                <div class="form-inputs">
                        <div class="input-box">
                            <input type="text" class="input-field" name="status_o" value="ouverte" readonly>
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
            <script>
    document.addEventListener("DOMContentLoaded", function() {
        var currentDate = new Date().toISOString().slice(0, 10);
        document.getElementById("date_publication").value = currentDate;
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