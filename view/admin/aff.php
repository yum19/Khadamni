<?php
session_start();
include "C:/xampp/htdocs/web/controller/UserC.php"; 
$error = "";
$user = null;
$userC = new UserC();
if (
    isset($_POST["nomR"]) &&
    isset($_POST["prenomR"]) &&
    isset($_POST["telephoneR"]) &&
    isset($_POST["dateR"]) &&
    isset($_POST["emailR"]) &&
    isset($_POST["MDPR"]) 
) {
    if (
        !empty($_POST["nomR"]) &&
        !empty($_POST["prenomR"]) &&
        !empty($_POST["telephoneR"]) &&
        !empty($_POST["dateR"]) &&
        !empty($_POST["emailR"]) &&
        !empty($_POST["MDPR"]) 
    ) {
        $user = new User(
            null,
            $_POST["nomR"],
            $_POST["prenomR"],
            $_POST["telephoneR"], 
            $_POST["dateR"],
            $_POST["emailR"],
            $_POST["MDPR"] 
        );
        $userC->addUser($user);
        header('Location: register.php');
        exit;
    } else {
        $error = "Tous les champs doivent être remplis";
    }
}
if(isset($_POST['afficher'])) 
{
    if(isset($_POST['emailR']) && isset($_POST['MDPR'])) {
        $emailR = $_POST['emailR'];
        $MDPR = $_POST['MDPR'];
        if(!empty($emailR) && !empty($MDPR)) {
            $userC = new UserC();
            $userByEmail = $userC->getUserByEmail($emailR);
            $userByPassword = $userC->getUserByPassword($MDPR);
            if(!empty($userByEmail) && !empty($userByPassword)) 
            {
                $_SESSION['idR'] = $userByEmail['idR'];
                $_SESSION['nomR'] = $userByEmail['nomR'];
                $_SESSION['prenomR'] = $userByEmail['prenomR'];
                $_SESSION['telephoneR'] = $userByEmail['telephoneR'];
                $_SESSION['dateR'] = $userByEmail['dateR'];
                $_SESSION['emailR'] = $emailR;
                $_SESSION['MDPR'] = $MDPR;
                header("Location: http://localhost/web/view/admin/afficher.php");
                exit;
            } else {
                $error = "Incorrect email or password";
                echo '<script> alert("compte non trouve..") ; window.location.href = "http://localhost/web/view/admin/aff.php"
                exit();</script>';

                exit();
            }
        } else 
        {
            $error = "Email and password are required";
            echo '<script> alert("Veuillez entrer votre email et mot de passe") ; window.location.href = "http://localhost/web/view/admin/aff.php";</script>';
            exit();
        }
    } else {
        $error = "Email and password are required";
        echo '<script>alert("Veuillez entrer votre email et mot de passe.") ; window.location.href = "http://localhost/web/view/admin/aff.php";</script>';
        exit();
    }
    if(isset($error)) {
        header("Location: ../aff.php?error=$error");
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
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="assets/css/style.css">

</head>
<body>
    <div class="form-container">
        <div class="col col-1">
            <div class="image-layer">
                <img src="assets\img\about-left-image.png" class="form-image-main">
                
                <img src="assets/img/cloud.png" class="form-image cloud">
                <img src="assets/img/stars.png" class="form-image stars">
            </div>
            <p class="featured-words">Bienvenue sur <span>Khadamni</span></p>
        </div>
        <div class="col col-2">      
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
                            <input type="text" class="input-field" placeholder="Email" name="emailR" value="<?php echo $user['emailR'] ??''; ?>">
                        </div>
                        <div class="input-box">
                            <input type="password" class="input-field" placeholder="Mot de passe" name="MDPR" value="<?php echo $user['MDPR'] ??''; ?>">
                        </div>
                        <a href="http://localhost/web/view/admin/forgetPass/forget.php" class="forgot-password">  Votre Mot de passe oublié ? cliquer ici !</a>
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
                    </div>
                </form>
            </div>
        </div>
    </div>
<!-- JS -->
<script src="assets/js/main.js"></script>

</body>
</html>
