<?php
session_start();
include 'C:/xampp/htdocs/web/controller/EntrepriseC.php';

$error = "";
$entreprise = null;
$entrepriseC = new EntrepriseC();

if (
    isset($_POST["nomEntreprise"]) &&
    isset($_POST["adresse"]) &&
    isset($_POST["dateCreation"])&&
    isset($_POST["telephoneEn"]) &&
    isset($_POST["descriptionE"])&&
    isset($_POST["emailEn"]) &&
    isset($_POST["MDPEn"])
) {
    if (
        !empty($_POST["nomEntreprise"]) &&
        !empty($_POST["adresse"]) &&
        !empty($_POST["dateCreation"])&&
        !empty($_POST["telephoneEn"]) &&
        !empty($_POST["descriptionE"])&&
        !empty($_POST["emailEn"]) &&
        !empty($_POST["MDPEn"])
    ) {
        $dateRFormatted = date('Y-m-d', strtotime($_POST["dateCreation"]));
        $entreprise = new Entreprise(
            NULL,
            $_POST["nomEntreprise"],
            $_POST["adresse"],
            $dateRFormatted,
            $_POST["telephoneEn"],
            $_POST["descriptionE"],
            $_POST["emailEn"],
            $_POST["MDPEn"]
        );
        $entrepriseC->addEntreprise($entreprise);
        header('Location: login.php');
        exit;
    } else {
        $error = "Missing information";
    }
}
// Login form handling
if(isset($_POST['afficher'])) {
    // Check if email and password are provided
    if(isset($_POST['emailEn']) && isset($_POST['MDPEn'])) {
        $emailE = $_POST['emailEn'];
        $MDPE = $_POST['MDPEn'];

        // Check if email and password are not empty
        if(!empty($emailE) && !empty($MDPE)) {
            $entrepriseC = new EntrepriseC();
            
            // Check if the user with the given email exists
            $userByEmail = $entrepriseC->getUserByEmail($emailE);

            // Check if the user with the given password exists
            $userByPassword = $entrepriseC->getUserByPassword($MDPE);

            // Verify both conditions
            if(!empty($userByEmail) && !empty($userByPassword)) {
                // Both email and password are correct
                $_SESSION['idE'] = $userByEmail['idE'];
                $_SESSION['nomEntreprise'] = $userByEmail['nomEntreprise'];
                $_SESSION['adresse'] = $userByEmail['adresse'];
                $_SESSION['dateCreation'] = $userByEmail['dateCreation'];
                $_SESSION['telephoneEn'] = $userByEmail['telephoneEn'];
                $_SESSION['descriptionE'] = $userByEmail['descriptionE'];
                $_SESSION['emailEn'] = $emailE;
                $_SESSION['MDPEn'] = $MDPE;
                header("Location: http://localhost/web/view/entreprise/index.php");
                exit;
            } else {
                // Incorrect email or password
                $error = "Incorrect email or password";
                echo '<script>                    
                     alert("Veuillez saisir tous les champs.");
                     window.location.href = "http://localhost/web/view/entreprise/login.php";
                     </script>';
                exit();
            }
        } else {
            // Email or password is empty
            $error = "Email and password are required";
            echo '<script> alert("Veuillez entrer votre email et mot de passe") ; window.location.href = "http://localhost/web/view/entreprise/login.php";</script>';
            exit();
        }
    } else {
        // Email or password not provided
        $error = "Email and password are required";
        echo '<script>alert("Veuillez entrer votre email et mot de passe.") ; window.location.href = "http://localhost/web/view/entreprise/login.php";</script>';
        exit();
    }

    // If there's an error, redirect back to login page with error message
    if(isset($error)) {
        header("Location: ../login.php?error=$error");
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>
    <!-- BOXICONS -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <!-- STYLE -->
    <link rel="stylesheet" href="assets/css/style.css">
    <style>
        
        .error-message {
            left: 0;
            color: red;
            font-size: 15px;
        }
                
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
            width: 900px;
            height: 725px;
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
            backdrop-filter: blur(30px);
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
            font-weight: 600;
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
            margin-top: 20px;
            
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
            top: 20%;
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
        .register {
            position: absolute;
            left: -50%;
            transform: translateX(-50%);
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 100%;
            padding: 0 4vw;
            transition: .3s;
        }

        .register .form-title {
            margin-block: 40px 20px;
        }

        .form-title {
            margin: 40px 0;
            color: #fe3f40;
            font-size: 28px;
            font-weight: 600;
        }

        .form-inputs {
            width: 100%;
        }

        .input-box {
            position: relative;
            margin-bottom: 20px;
        }

        .input-field {
            width: 100%;
            height: 55px;
            padding: 0 15px;
            margin: 10px 0;
            color: #fff;
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
            margin: 10px 0;
            color: #fff;
            background: #acd7f6f0;
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
            margin: 10px 0;
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
</head>
<body>

    <div class="form-container">
        <div class="col col-1">
            <div class="image-layer">
                
                
                <img src="assets/img/about-left-image.png" class="form-image-main">
                
                <img src="assets/img/cloud.png" class="form-image cloud">
                <img src="assets/img/stars.png" class="form-image stars">
            </div>

            <p class="featured-words">Bienvenue sur <span>   Khadamni</span></p>
        </div>


        <div class="col col-2">
            <div class="btn-box">
                <button class="btn btn-1" id="test">SE CONNECTER </button>
                <button class="btn btn-2" id="entretien"> S'INSECRIRE </button>
            </div>

            <div class="login-form">
                <form action="" method="post">
                    <div class="form-title">
                        <span>SE CONNECTER </span>
                    </div>
                    <?php if(isset($_GET['error'])){ ?>
                        <div class="alert alert-danger" role="alert">
                            <?php echo $_GET['error']; ?>
                        </div>
                    <?php } ?>
                    <div class="form-inputs">
                        <div class="input-box">
                            <input type="text" class="input-field" placeholder="Email" name="emailEn" value="<?php echo $user['emailEn'] ??''; ?>">
                        </div>
                        <div class="input-box">
                            <input type="password" class="input-field" placeholder="Mot de passe" name="MDPEn" value="<?php echo $user['MDPEn'] ??''; ?>">
                        </div>
                        <a href="http://localhost/web/view/entreprise/forgetPass/forget.php" class="forgot-password">Mot de passe oublié?</a>
                        <style>
                        
                            /* Style for the options */
                            .forgot-password{
                                color: #03a4ed;
                                font-size: 14px;
                            }
                        </style>               
                        <div class="input-box">
                            <button class="input-submit" name="afficher">
                                <span>SE CONNECTER </span>
                                <i class="bx bx-right-arrow-alt"></i>
                            </button>
                        </div>
                        <style>
                            .signUp-link {
                            font-size: 14px;
                            text-align: center;
                            margin: 15px 0;
                            }
                            .signUp-link p {
                            color: #03a4ed;
                            }
                            .signUp-link p a {
                            color: #fe3f40;
                            text-decoration: none;
                            font-weight: 500;
                            }
                            .signUp-link p a:hover {
                            text-decoration: underline;
                            }
                        </style>  
                    </div>
                </form>
            </div>

            <div class="register">
                <div class="form-title">
                    <span>S'INSECRIRE </span>
                </div>
                <form action="" method="POST" id="registrationForm">
                     <div class="form-inputs">
                        <div class="input-box">
                            <input type="text" class="input-field2" placeholder="Nom d'entreprise" name="nomEntreprise" >
                            <span class="error-message" id="nom-error"></span> 
                            <input type="text" class="input-field2" placeholder="Adresse" name="adresse">
                            <input type="date" class="input-field2" placeholder="Date de creation" name="dateCreation">
                            <span class="error-message" id="date-error"></span> 
                            <input type="text" class="input-field2" placeholder="Telephone" name="telephoneEn">
                            <span class="error-message" id="telephone-error"></span> 
                            <input type="text" class="input-field2" placeholder="Description" name="descriptionE"  maxlength="20" onkeypress="allowLettersOnly(event)" >
                            <input type="text" class="input-field2" placeholder="Email" name="emailEn">
                            <span class="error-message" id="email-error"></span>
                            <input type="password" class="input-field2" placeholder="Mot De Passe" name="MDPEn" >
                            <span class="error-message" id="mdp-error"></span> 
                        </div>
                        <div class="input-box">
                            <button type="submit" class="input-submit">
                                <span>S'INSECRIRE</span>
                                <i class="bx bx-right-arrow-alt"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
<!-- JS -->


<script src="assets/js/main.js"></script>
<script>
        document.addEventListener('DOMContentLoaded', function () {
            var form = document.getElementById('registrationForm');
            var inputFields = form.querySelectorAll('.input-field');

            inputFields.forEach(function (input) {
                input.addEventListener('input', function () {
                    clearErrorMessage(input.id + '-error');
                });

                input.addEventListener('focus', function () {
                    clearErrorMessage(input.id + '-error');
                });
            });

            form.addEventListener('submit', function (event) {
                var nom = form.querySelector('input[name="nomEntreprise"]').value;
                var adresse = form.querySelector('input[name="adresse"]').value;
                var dateCreation = form.querySelector('input[name="dateCreation"]').value;
                var telephone = form.querySelector('input[name="telephoneEn"]').value;
                var Description = form.querySelector('input[name="descriptionE"]').value;
                var email = form.querySelector('input[name="emailEn"]').value;
                var password = form.querySelector('input[name="MDPEn"]').value;

                // Check if any required field is empty
                if (nom.trim() === '' || adresse.trim() === '' || dateCreation.trim() === '' || telephone.trim() === '' || Description.trim() === '' || email.trim() === '' || password.trim() === '') {
                    alert("Veuillez saisir tous les champs.");
                    event.preventDefault();
                    return; // Stop further processing
                }
                // Get the current date
                var currentDate = new Date();
                var currentYear = currentDate.getFullYear();
                // Calculate the time difference in years
                var creationDate = new Date(dateCreation);
                var creationYear = creationDate.getFullYear();
                var timeDifference = currentYear - creationYear;
                
                // Regular expressions for validation
                var nameRegex = /^[a-zA-Z\s]+$/;
                var phoneRegex = /^\d{8}$/;

                // Clear previous error messages
                clearErrorMessages();

                // Validate NomE and PrenomE (only characters)
                if (!nameRegex.test(nom)) {
                    displayErrorMessage('nom-error', "Lettres seulement.");
                    event.preventDefault();
                }

                // Validate TelephoneE (exactly 8 numbers)
                if (!phoneRegex.test(telephone)) {
                    displayErrorMessage('telephone-error', "Le téléphone doit contenir 8 chiffres.");
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
                // Validate dateCreation (at least 5 years old)
                if (timeDifference < 5) {
                    displayErrorMessage('date-error', "La date de création doit avoir au moins 5 ans.");
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

</body>
</html>
