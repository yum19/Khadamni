
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
    <link href="../view(profil)/Home/templatemo_562_space_dynamic/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="../view(profil)/Home/templatemo_562_space_dynamic/assets/css/templatemo-space-dynamic.css">
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
                  <img src="../view(profil)/Home/templatemo_562_space_dynamic/assets/images/logo.png" >
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
              <li class="scroll-to-section"><a href="http://localhost/web/etudiant/view(profil)/Home/templatemo_562_space_dynamic/index.html" class="active">Acceuil</a></li>
              <li class="scroll-to-section"><a href="#services">Entreprise</a></li>
              <li class="scroll-to-section"><a href="#services">Offres&demandes</a></li>
              <li class="scroll-to-section"><a href="#portfolio">Entretien</a></li>
              <li class="scroll-to-section"><a href="#blog">Blog</a></li> 
              <li class="scroll-to-section"><a href="#contact">Reclamation</a></li> 

              <!--li class="scroll-to-section"><div class="main-red-button"><a href="http://localhost/web/final/view/register.php">Se connecter</a></div></li--> 

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
            </div>
        </div>
    </div>
</div>
</div>

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
  <script src="../view(profil)/Home/templatemo_562_space_dynamic/vendor/jquery/jquery.min.js"></script>
  <script src="../view(profil)/Home/templatemo_562_space_dynamic/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../view(profil)/Home/templatemo_562_space_dynamic/assets/js/owl-carousel.js"></script>
  <script src="../view(profil)/Home/templatemo_562_space_dynamic/assets/js/animation.js"></script>
  <script src="../view(profil)/Home/templatemo_562_space_dynamic/assets/js/imagesloaded.js"></script>
  <script src="../view(profil)/Home/templatemo_562_space_dynamic/assets/js/templatemo-custom.js"></script>
</body>
</html>
