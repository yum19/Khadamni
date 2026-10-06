<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion Blogs :Homepage</title>
    <link rel="stylesheet" href="../View/blog.css"/>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,400;0,500;0,600;1,600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="cssgb/home.css">
    
    <!--==Title========================-->
    <title>Blog</title>
    <!--==CSS==========================-->
    <link rel="stylesheet" href="cssgb/style.css">
    <!--==Poppins======================-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <!--==Font-Awesome=================-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
   
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

<!-- Additional CSS Files -->
<link rel="stylesheet" href="assetsgb/css/fontawesome.css">
<link rel="stylesheet" href="assetsgb/css/templatemo-space-dynamic.css">
<link rel="stylesheet" href="assetsgb/css/animated.css">
<link rel="stylesheet" href="assetsgb/css/owl.css">

</head>
<body>
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
              Kha<span>Dmni</span></h4>
            </a>

            <!-- ***** Logo End ***** -->
            <!-- ***** Menu Start ***** -->
            <ul class="nav">
              <li class="scroll-to-section"><a href="#top" class="active">Home</a></li>
              <li class="scroll-to-section"><a href="#about"></a></li>
              <li class="scroll-to-section"><a href="#services">Offres&demandes</a></li>
              <li class="scroll-to-section"><a href="#portfolio">Entretien</a></li>
              <li class="scroll-to-section"><a href="#blog">Blog</a></li> 
              <li class="scroll-to-section"><a href="#contact">Reclamation</a></li> 
              <li class="scroll-to-section"><div class="main-red-button"><a href="C:\Users\21628\OneDrive\Desktop\projet_web\loginn\loginn\Untitled-1.html">Se connecter</a></div></li> 
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

    <nav class="navbar">
        <img src="img/logo.png" class="logo" alt="">
        <ul class="links-container">
            <li class="link-item"><a href="../View/Blog.php" class="link">Blogs</a></li>
            <li class="link-item"><a href="../View/index.html" class="link">return to Khadamni</a></li>
        </ul>
    </nav>

    <header class="header">
        <div class="content">
            <h1 class="heading">
                <span class="small">Bienvenue dans le monde </span>
                
                <span class="no-fill">de Écriture de blog</span>
            </h1>
            <div class="main-blue-button">
                 
            <a href="../View/blog.php"  style="margin-left: 10px;" class="btn">discover our blogs</a>
            <a href="../View/formulaire.php"  style="margin-left: 10px;" class="btn"> write you own</a>
            </div>
          </div>
    </header>



    <script src="https://www.gstatic.com/firebasejs/8.9.1/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/8.9.1/firebase-firestore.js"></script>

    <script src="js/firebase.js"></script>
    <script src="js/home.js"></script>
    <div id="contact" class="contact-us section">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 align-self-center wow fadeInLeft" data-wow-duration="0.5s" data-wow-delay="0.25s">
          <div class="section-heading">
            <h2>Feel Free To Send Us a Message About Your Website Needs</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed doer ket eismod tempor incididunt ut labore et dolores</p>
            <div class="phone-info">
              <h4>For any enquiry, Call Us: <span><i class="fa fa-phone"></i> <a href="#">010-020-0340</a></span></h4>
            </div>
          </div>
        </div>
        <div class="col-lg-6 wow fadeInRight" data-wow-duration="0.5s" data-wow-delay="0.25s">
          <form id="contact" action="" method="post">
            <div class="row">
              <div class="col-lg-6">
                <fieldset>
                  <input type="name" name="name" id="name" placeholder="Name" autocomplete="on" required>
                </fieldset>
              </div>
              <div class="col-lg-6">
                <fieldset>
                  <input type="surname" name="surname" id="surname" placeholder="Surname" autocomplete="on" required>
                </fieldset>
              </div>
              <div class="col-lg-12">
                <fieldset>
                  <input type="text" name="email" id="email" pattern="[^ @]*@[^ @]*" placeholder="Your Email" required="">
                </fieldset>
              </div>
              <div class="col-lg-12">
                <fieldset>
                  <textarea name="message" type="text" class="form-control" id="message" placeholder="Message" required=""></textarea>  
                </fieldset>
              </div>
              <div class="col-lg-12">
                <fieldset>
                  <button type="submit" id="form-submit" class="main-button ">Send Message</button>
                </fieldset>
              </div>
            </div>
            <div class="contact-dec">
              <img src="assets/images/contact-decoration.png" alt="">
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
    <FOOTer>
    <div class="container">
        <div class="row">
          <div class="col-lg-12 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.25s">
            <p>© Droit d'auteur 2021 Space Dynamic Co. Tous droits réservés. 
            
            <br>Conception : <a rel="nofollow" href="https://Khadamni.com">Khadamni</a></p>
          </div>
        </div>
      </div>
    </footer>
    <!-- Scripts -->
    <script src="view/vendor/jquery/jquery.min.js"></script>
    <script src="view/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="view/assets/js/owl-carousel.js"></script>
    <script src="view/assets/js/animation.js"></script>
    <script src="view/assets/js/imagesloaded.js"></script>
    <script src="view/assets/js/templatemo-custom.js"></script>
    
</body>
</html>