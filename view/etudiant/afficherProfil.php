<?php
   include "C:/xampp/htdocs/web/controller/etudiantC.php";

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    session_set_cookie_params(['httponly' => true]);
    session_start();
    // Check if the user is not logged in, then redirect to the login page

    // Check if the user is logged in
    if(isset($_SESSION['idEtudiant'])) {
        // User is logged in, you can display their information
        $idEtudiant = $_SESSION['idEtudiant'];
        $nomE = $_SESSION['nomE'];
        $prenomE = $_SESSION['prenomE'];
        $telephoneE = $_SESSION['telephoneE'];
        $age = $_SESSION['age'];
        $emailE = $_SESSION['emailE'];
        $MDPE = $_SESSION['MDPE'];   
    } else {
        // Redirect the user to the login page if not logged in
        header("Location: http://localhost/web/view/etudiant/register.php");
        exit;
    }

    $userC = new UserC();
    $error = "";
    $success_message = "";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST["modifier"])) {
        
            $nomE=$_POST['nomE'] ?? '';
            $prenomE = $_POST['prenomE'] ?? '';
            $telephoneE = $_POST['telephoneE'] ?? '';
            $age = $_POST['age'] ?? '';
            $emailE =$_POST['emailE'] ?? '';
            $MDPE = $_POST['MDPE'] ?? '';

            // Vérification des champs requis
            if (empty($nomE) || empty($prenomE) || empty($telephoneE) || empty($age) || empty($emailE) || empty($MDPE)) {
                $error = "Tous les champs doivent être remplis";
            } else {
                $result = $userC->updateUser($idEtudiant, $nomE, $prenomE, $telephoneE, $age, $emailE, $MDPE);
                if ($result) {
                    $_SESSION['nomE'] = $nomE;
                    $_SESSION['prenomE'] = $prenomE;
                    $_SESSION['telephoneE'] = $telephoneE;
                    $_SESSION['age'] = $age;
                    $_SESSION['emailE'] = $emailE;
                    $_SESSION['MDPE'] = $MDPE;
                    // Affichage du message de succès
                    $success_message = "Modifications enregistrées avec succès.";
                } else {
                    $error = "Erreur lors de la mise à jour de l'utilisateur.";
                }
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>profile</title>
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
            width: 100%; /* Adjust width as needed */
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

</style>
<style>
        
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
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/templatemo-space-dynamic.css">
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
            <a href="index.php" class="logo">
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
                  </style>
                </div> 
              Kha<span>Damni</span></h4>
            </a>

            <!-- ***** Logo End ***** -->
            <!-- ***** Menu Start ***** -->
            <ul class="nav">
              <li class="scroll-to-section"><a href="http://localhost/web/view/etudiant/index.php">Acceuil</a></li>
              <li class="scroll-to-section"><a href="#services">Offres&demandes</a></li>
              <li class="scroll-to-section"><a href="#yomna">Entretien</a></li>
              <li class="scroll-to-section"><a href="#portfolio">Evènement</a></li>
              <li class="scroll-to-section"><a href="#blog">Blog</a></li> 
              <li class="scroll-to-section"><a href="http://localhost/web/view/reclam_blog/listereclame.php">Reclamation</a></li> 
              <li class="scroll-to-section"><a href="http://localhost/web/view/reclam_blog/bot.php">Chatbot</a></li> 
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
  <!-- ***** Header Area End ***** --> 
<div class="main-banner wow fadeIn" id="top" data-wow-duration="1s" data-wow-delay="0.5s">
   
<div class="container">
    <div class="main-body">
        <div class="row">
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex flex-column align-items-center text-center">
                            <img src="https://bootdey.com/img/Content/avatar/avatar6.png" alt="Admin" class="rounded-circle p-1 bg-primary" width="110">
                            <div class="mt-3">
                                <h4><?php echo $nomE; ?> <?php echo $prenomE; ?></h4>
                                <p class="text-secondary mb-1">Etudiant</p>
                                
                                <a href="http://localhost/web/view/Home-absolu/templatemo_562_space_dynamic/index.html" class="btn btn-delete"> <i class="now-ui-icons ui-1_simple-remove"></i> LOG OUT</a>


                            </div>
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
                        <form method="POST" action="" id="registrationForm">
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Nom</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="text" class="form-control" name="nomE" value="<?php echo $nomE; ?>">
                                    <span class="error-message" id="nom-error"></span> 
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Prenom</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="text" class="form-control" name="prenomE" value="<?php echo $prenomE; ?>">
                                    <span class="error-message" id="prenom-error"></span>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Telephone</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="text" class="form-control" name="telephoneE" value="<?php echo $telephoneE; ?>">
                                    <span class="error-message" id="telephone-error"></span> 

                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Age</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="number" class="form-control"  name="age" value="<?php echo $age; ?>">
                                    <span class="error-message" id="age-error"></span>  

                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Email</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="text" class="form-control" name="emailE" value="<?php echo $emailE; ?>">
                                    <span class="error-message" id="email-error"></span>

                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Mot de passe</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="text" class="form-control"  name="MDPE" value="<?php echo $MDPE; ?>">
                                    <span class="error-message" id="mdp-error"></span>  
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3"></div>
                                <div class="col-sm-9 text-secondary">
                                    <button class="btn btn-primary px-4" type="submit" name="modifier">Modifier</button>                                </div>
                            </div>
                        </form>
                        <?php
                        // Display success or error messages
                        if (!empty($success_message)) {
                            echo '<div class="alert alert-success">' . $success_message . '</div>';
                        }
                        if (!empty($error)) {
                            echo '<div class="alert alert-danger">' . $error . '</div>';
                        }
                        ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="d-flex align-items-center mb-3">Project Status</h5>
                                <p>Web Design</p>
                                <div class="progress mb-3" style="height: 5px">
                                    <div class="progress-bar bg-primary" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <p>Website Markup</p>
                                <div class="progress mb-3" style="height: 5px">
                                    <div class="progress-bar bg-danger" role="progressbar" style="width: 72%" aria-valuenow="72" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <p>One Page</p>
                                <div class="progress mb-3" style="height: 5px">
                                    <div class="progress-bar bg-success" role="progressbar" style="width: 89%" aria-valuenow="89" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <p>Mobile Template</p>
                                <div class="progress mb-3" style="height: 5px">
                                    <div class="progress-bar bg-warning" role="progressbar" style="width: 55%" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <p>Backend API</p>
                                <div class="progress" style="height: 5px">
                                    <div class="progress-bar bg-info" role="progressbar" style="width: 66%" aria-valuenow="66" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<script>
        document.addEventListener('DOMContentLoaded', function () {
            var form = document.getElementById('registrationForm');
            var inputFields = form.querySelectorAll('.row mb-3');

            inputFields.forEach(function (input) {
                input.addEventListener('input', function () {
                    clearErrorMessage(input.id + '-error');
                });

                input.addEventListener('focus', function () {
                    clearErrorMessage(input.id + '-error');
                });
            });

            form.addEventListener('submit', function (event) {
                var nom = form.querySelector('input[name="nomE"]').value;
                var prenom = form.querySelector('input[name="prenomE"]').value;
                var telephone = form.querySelector('input[name="telephoneE"]').value;
                var age = form.querySelector('input[name="age"]').value;
                var email = form.querySelector('input[name="emailE"]').value;
                var password = form.querySelector('input[name="MDPE"]').value;

                // Check if any required field is empty
                if (nom.trim() === '' || prenom.trim() === '' || telephone.trim() === '' || age.trim() === '' || email.trim() === '' || password.trim() === '') {
                    alert("Veuillez saisir tous les champs.");
                    event.preventDefault();
                    return; // Stop further processing
                }
                // Regular expressions for validation
                var nameRegex = /^[a-zA-Z]+$/;
                var phoneRegex = /^\d{8}$/;
                var ageValue = parseInt(age, 10);

                // Clear previous error messages
                clearErrorMessages();

                // Validate NomE and PrenomE (only characters)
                if (!nameRegex.test(nom)) {
                    displayErrorMessage('nom-error', "Lettres seulement.");
                    event.preventDefault();
                }

                if (!nameRegex.test(prenom)) {
                    displayErrorMessage('prenom-error', "Lettres seulement.");
                    event.preventDefault();
                }

                // Validate TelephoneE (exactly 8 numbers)
                if (!phoneRegex.test(telephone)) {
                    displayErrorMessage('telephone-error', "Le téléphone doit contenir 8 chiffres.");
                    event.preventDefault();
                }

                // Validate Age (between 22 and 30)
                if (ageValue < 19 || ageValue > 30) {
                    displayErrorMessage('age-error', "L'âge entre 19 et 30 ans.");
                    event.preventDefault();
                }

                // Validate Email (using the existing function)
                if (!validateEmail(email)) {
                    displayErrorMessage('email-error', "Veuillez saisir une adresse e-mail valide.");
                    event.preventDefault();
                }

                // Validate Password length
                if (password.length < 8) {
                    displayErrorMessage('mdp-error', "Doit contenir au moins 8 caractères.");
                    event.preventDefault();
                }

                function validateEmail(email) {
                    var regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                    return regex.test(email);
                }

                function displayErrorMessage(elementId, message) {
                    var errorElement = document.getElementById(elementId);
                    errorElement.textContent = message;
                }

                function clearErrorMessage(elementId) {
                    var errorElement = document.getElementById(elementId);
                    if (errorElement) {
                        errorElement.textContent = '';
                    }
                }

                function clearErrorMessages() {
                    var errorElements = form.querySelectorAll('.error-message');
                    errorElements.forEach(function (element) {
                        element.textContent = '';
                    });
                }
            });
        });
</script>
<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript">
    
</script>
<footer>
    <div class="container">
      <div class="row">
        <div class="col-lg-12 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.25s">
          <p>© Copyright 2024 Khadamni. All Rights Reserved.           
        </div>
      </div>
    </div>
  </footer>
  <!-- Scripts -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/js/owl-carousel.js"></script>
  <script src="assets/js/animation.js"></script>
  <script src="assets/js/imagesloaded.js"></script>
  <script src="assets/js/templatemo-custom.js"></script>
</body>
</html>
