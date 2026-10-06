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
   } else {
       // Redirect the user to the login page if not logged in
       header("Location: http://localhost/web/view/etudiant/register.php");
       exit;
   }
include 'C:/xampp/htdocs/web/controller/categorieevnC.php';
$categorieevnC = new CategorieevnC();
$list = $categorieevnC->listcategorieevns();
$counts = $categorieevnC->countEvenementsParCategorie(); // Appel de la méthode pour compter les événements par catégorie
include 'C:/xampp/htdocs/web/controller/PostC.php'; // Include your PostC class file
// Create an instance of the Post controller
$postC = new PostC();
// Get the top 3 posts
$topPosts = $postC->getTopPosts(); // Assuming you have a function named getTop3Posts()
?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <title>Space Dynamic - SEO HTML5 Template</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-space-dynamic.css">
    <link rel="stylesheet" href="assets/css/animated.css">
    <link rel="stylesheet" href="assets/css/owl.css">
<!--
    
TemplateMo 562 Space Dynamic

https://templatemo.com/tm-562-space-dynamic

-->
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
                </div> 
              Kha<span>Damni</span></h4>
            </a>

            <!-- ***** Logo End ***** -->
            <!-- ***** Menu Start ***** -->
            <ul class="nav">
              
              <li class="scroll-to-section"><a href="#services">Offres&demandes</a></li>
              <li class="scroll-to-section"><a href="#yomna">Entretien</a></li>
              <li class="scroll-to-section"><a href="#portfolio">Evènement</a></li>
              <li class="scroll-to-section"><a href="#blog">Blog</a></li> 
              <li class="scroll-to-section"><a href="#contact">Reclamation</a></li> 
              <li class="scroll-to-section"><a href="http://localhost/web/view/reclam_blog/bot.php" class="active">Chatbot</a></li> 
              <li class="scroll-to-section"><a href="http://localhost/web/view/etudiant/afficherProfil.php" class="active">Profile</a></li> 
              <li style ="margin-top:0.8%;">
                <div>
                  <i class="fa fa-circle" aria-hidden="true" style="color: green; font-size: 10px;"> </i> 
                    Bienvenue <?php echo $prenomE; ?>
                </div>
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
      <div class="row">
        <div class="col-lg-12">
          <div class="row">
            <div class="col-lg-6 align-self-center">
              <div class="left-content header-text wow fadeInLeft" data-wow-duration="1s" data-wow-delay="1s">
                <h6>Bienvenue à Khadamni</h6>
                <h2> <em>Le futur numérique </em>vous attend.  <span>Prêt à démarrer?</span> </h2>
                <p>Développez vos compétences et bâtissez votre avenir avec des opportunités de stages et d'emplois stimulantes dans le secteur de l'informatique.</p>
                <form id="search" action="#" method="GET">
                  <fieldset>
                    <input type="address" name="address" class="email" placeholder="..." autocomplete="on" required>
                  </fieldset>
                  <fieldset>
                    <button type="submit" class="main-button">Chercher</button>
                  </fieldset>
                </form>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="right-image wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.5s">
                <img src="assets/images/banner-right-image.png" alt="team meeting">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div id="services" class="our-services section">
      <div class="container">
        <!--       domaine     -->
        <div class="row">
          <div class="col-lg-6 offset-lg-3">
                <center><div class="main-blue-button">
                </div></center>
                <div class="section-heading text-center wow bounceIn" data-wow-duration="1s" data-wow-delay="0.1s">
                 <h2><span style="color: #03a4ed;"> Voici les différents </span> domaines <span style="color:#fe3f40;">de nos offres!!!</span> </h2>
                  &nbsp;&nbsp;
                </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-3 col-sm-6">
            <a href="#">
              <div class="item wow bounceInUp" data-wow-duration="1s" data-wow-delay="0.3s">
                <div class="hidden-content text-center">
                    <h4><span class="orange-text">Développement mobile</span></h4>
                </div>
                <style>
                    .orange-text {
                        color: #fe3f40;
                    }
                </style>
                
                <div class="showed-content text-center">
                    <img src="./assets/images/développement mobile.png" alt="Description de l'image">
                </div>
            </div>
            
            </a>
          </div>
          <div class="col-lg-3 col-sm-6">
            <a href="#">
              <div class="item wow bounceInUp" data-wow-duration="1s" data-wow-delay="0.4s">
                <div class="hidden-content text-center">
                    <h4>Développement web</h4>
                </div>
                
                <div class="showed-content">
                    <img src="./assets/images/développement web.png" alt="Description de l'image">
                </div>
            </div>
            
            </a>
          </div>
          <div class="col-lg-3 col-sm-6">
            <a href="#">
              <div class="item wow bounceInUp" data-wow-duration="1s" data-wow-delay="0.5s">
                <div class="hidden-content text-center">
                    <h4><span class="orange-text"> Sécurité </span></h4>
            
                    <style>
                        .orange-text {
                            color: #fe3f40;
                        }
                    </style>
                </div>
            
                <div class="showed-content text-center">
                    <img src="./assets/images/securité de l'informatique.png" alt="Description de l'image">
                </div>
            </div>
            
            </a>
          </div>
          <div class="col-lg-3 col-sm-6">
            <a href="#">
              <div class="item wow bounceInUp" data-wow-duration="1s" data-wow-delay="0.6s">
                <div class="hidden-content text-center">
                    <h4>Science de l'informatique</h4>
                </div>
                <div class="showed-content">
                    <img src="./assets/images/science de l'informatique.png" alt="Description de l'image">
                </div>
            </div>
            
            </a>
          </div>
          <!--       domaine  fin   -->
               <!--       offre     -->
        <div class="row">
          <div class="col-lg-12">
            <div class="row">
              <div class="col-lg-6 align-self-center">
                <div class="left-content header-text wow fadeInLeft" data-wow-duration="1s" data-wow-delay="1s">
                <h2> <em> <span style="color: #03a4ed;"> Voila </span></em>nos <span style="color:#fe3f40;">offres!!!</span> </h2>
                &nbsp;&nbsp;
                  <p>Découvrez nos offres d'emploi et de stage et bonne chance dans vos recherches !</p>
                  <form id="search" action="#" method="GET">
                  &nbsp;&nbsp;
                  &nbsp;&nbsp;
                  <fieldset>
                    <div style="display: flex; justify-content: center;">
                      <div class="main-blue-button" style="margin-right: 10px;">
                      <a href="../offre_test/ListeOffres_front.php?idEtudiant=<?php echo $idEtudiant; ?>">Voir tous les Offres</a>
                      </div>
                   </div>
                  </fieldset>
  
                  </form>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="right-image wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.5s">
                  <img src="./assets/images/Job hunt-cuate.png" alt="team meeting">
                </div>
              </div>
            </div>
          </div>
        </div>
          <!--       offre  fin    -->
      <!--       demande    -->
  
        <div class="row">
          <div class="col-lg-12">
            <div class="row">
            <div class="col-lg-6">
                <div class="right-image wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.5s">
                  <img src="./assets/images/Online Review-pana.png" alt="team meeting">
                </div>
            </div>
            <div class="col-lg-6 align-self-center">
                <div class="left-content header-text wow fadeInLeft" data-wow-duration="1s" data-wow-delay="1s">
                  <h2> <em> <span style="color: #03a4ed;"> Voila </span></em>nos <span style="color:#fe3f40;">demandes!!!</span> </h2>
                  &nbsp;&nbsp;
                  <p>Pour ajouter votre demande et consulter la liste des offres pour plus d'informations, n'hésitez pas à ajouter votre demande dès maintenant.</p>
                  <form id="search" action="#" method="GET">
                    
                  <fieldset>
                  &nbsp;&nbsp;
                  &nbsp;&nbsp;
    <div style="display: flex; justify-content: center;">
      <div class="main-orange-button" style="margin-right: 20px;">
        <a href="http://localhost/web/view/offre_test/profilEtudiantD.php?idEtudiant=<?php echo $idEtudiant; ?>">Voir tous les demandes</a>
      </div>
      <div class="main-orange-button">
        <a href="../offre_test/ajoutDemande.php">Ajouter une demande</a>
      </div>
    </div>
  </fieldset>
  
                  <style>
             .main-orange-button {
              background-color: #fe3f40;
              color: white; /* Couleur du texte en blanc */
              padding: 10px 20px;
              border-radius: 25px;
              display: inline-block;
              text-decoration: none;
              font-weight: bold;
          }
          
          .main-orange-button a {
              color: white; /* Couleur du texte en blanc pour les liens */
          }
        </style>
                  </form>
                </div>
              </div>
              
            </div>
          </div>
        
          
        
    </div>
    </div>
    
    </div>
    <!--       demande fin    -->
      
  </div>
                                                       <!--       scroll mta3i fin        -->
  <div id="yomna" class="our-portfolio section">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 align-self-center  wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.2s">
          <div class="left-image">
            <img src="assets/images/services-left-image.png" alt="">
          </div>
        </div>
        <div class="col-lg-6 wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.2s">
          <div class="section-heading">
            <h2>Améliorez Votre Processus de Recrutement avec <em>KHADAMNI</em> Notre Service de <br><span>Gestion d'Entretien</span></br> </h2>
            <p>Trouver les bons talents pour votre entreprise peut être un défi. Nous simplifions ce processus pour vous en offrant une plateforme de gestion d'entretien efficace et personnalisée. Notre service vous permet de filtrer les candidats en fonction de leur domaine informatique et de les évaluer à travers des tests en ligne, assurant ainsi que seuls les meilleurs talents parviennent à l'étape de l'entretien.</p>
          </div>
          <div class="row">
            <div class="col-lg-12">
              <div class="first-bar progress-skill-bar">
                <h4>1. Tests en Ligne Personnalisés </h4>
                <span>84%</span>
                <div class="filled-bar"></div>
                <div class="full-bar"></div>
              </div>
            </div>
            <div class="col-lg-12">
              <div class="second-bar progress-skill-bar">
                <h4>2. Filtrage Automatisé</h4>
                <span>88%</span>
                <div class="filled-bar"></div>
                <div class="full-bar"></div>
              </div>
            </div>
            <div class="col-lg-12">
              <div class="third-bar progress-skill-bar">
                <h4>3. Entretiens en Ligne ou Présentiels </h4>
                <span>94%</span>
                <div class="filled-bar"></div>
                <div class="full-bar"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  
    <style>
    .input-box {
      position: relative;
      color: white;
  
  }
  .input-submit {
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 10px;
      width: 50%;
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
  </style>
  

  <style>

.our-portfolio .progress-skill-bar {
  margin-bottom: 30px;
  position: relative;
  width: 100%;

}

.our-portfolio .progress-skill-bar span {
  position: absolute;
  top: 0;
  font-size: 18px;
  font-weight: 600;
  color: #03a4ed;
}

.our-portfolio .first-bar span {
  left: 69%;
}

.our-portfolio .second-bar span {
  left: 81%;
}

.our-portfolio .third-bar span {
  left: 88%;
}

.our-portfolio .progress-skill-bar h4 {
  font-size: 18px;
  font-weight: 700;
  color: #2a2a2a;
  margin-bottom: 14px;
}

.our-portfolio .progress-skill-bar .full-bar {
  width: 100%;
  height: 6px;
  border-radius: 3px;
  background-color: #f7eff1;
  position: relative;
  z-index: 1;
}

.our-portfolio .progress-skill-bar .filled-bar {
  background: rgb(255,77,30);
  background: linear-gradient(105deg, rgba(255,77,30,1) 0%, rgba(255,44,109,1) 100%);
  height: 6px;
  border-radius: 3px;
  margin-bottom: -6px;
  position: relative;
  z-index: 2;
}

.our-portfolio .first-bar .filled-bar {
  width: 71%;
}

.our-portfolio .second-bar .filled-bar {
  width: 83%;
}

.our-portfolio .third-bar .filled-bar {
  width: 90%;
}
  </style>


  <div id="portfolio" class="our-portfolio section">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <div class="section-heading wow bounceIn" data-wow-duration="1s" data-wow-delay="0.2s">
                    <h2>Participez à nos événements pour des expériences mémorables et du plaisir partagé !<em>Inscrivez-vous </em> &amp; dès maintenant <span>pour ne rien manquer</span></h2>
                </div>
            </div>
        </div>
        <div class="row">
        <?php foreach ($list as $categorie) { ?>
                <div class="col-lg-3 col-sm-6">
                    <a href="#">
                        <div class="item wow bounceInUp" data-wow-duration="1s" data-wow-delay="0.3s">
                            <div class="hidden-content">
                                <h4><?php echo $categorie['nomCategorieEVN']; ?></h4>
                                <?php
                                    // Chercher le nombre d'événements associés à cette catégorie dans les résultats de $counts
                                    $count = array_reduce($counts, function ($acc, $item) use ($categorie) {
                                        return $item['nomCategorieEVN'] === $categorie['nomCategorieEVN'] ? $item['nombre_evenements'] : $acc;
                                    }, 0);
                                ?>
                                <p><?php echo $count; ?> événements</p>
                            </div>
                            <div class="showed-content">
                                <a href="../evenement/detail.php?id=<?php echo $categorie['idCategorieEVN']; ?>">
                                    <!-- Utilisez le chemin de l'image de la catégorie -->
                                    <img src="../evenement/assets/images/Seminar-pana.png" alt="" style="max-width:3000px;" >
                                </a>
                            </div>
                        </div>
                    </a>
                </div>
            <?php } ?>
        </div>
    </div>
</div>
  <div id="blog" class="our-blog section">
      <div class="container">
          <div class="row">
              <div class="col-lg-6 wow fadeInDown" data-wow-duration="1s" data-wow-delay="0.25s">
                  <div class="section-heading">
                      <h2>Découvrez ce qui est <em>Tendance</em> dans nos dernières <span>Actualités</span></h2>
                  </div>
              </div>
              <div class="col-lg-6 wow fadeInDown" data-wow-duration="1s" data-wow-delay="0.25s">
                  <div class="top-dec">
                      <img src="assets/images/blog-dec.png" alt="">
                  </div>
              </div>
          </div>
          <div class="row">
              <div class="col-lg-6 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.25s">
                  <div class="left-image">
                      <a href="#"><img src="assets/images/big-blog-thumb.jpg" alt="Espace de travail sur le bureau"></a>
                            <div class="info">
                              <div class="inner-content">
                                <ul>
                                  <li><i class="fa fa-calendar"></i> 14/03/2001</li>
                                  <li><i class="fa fa-users"></i> Khadamni</li>
                                  <li><i class="fa fa-folder"></i> Marque</li>
                                </ul>
                                  <a href="#"><h4>BLOG </h4></a>
                                  <p>Notre blog est votre destination de choix pour un contenu engageant et stimulant sur une large gamme de sujets. Que vous recherchiez les dernières tendances technologiques, des conseils pour le développement personnel ou des histoires inspirantes, vous trouverez tout ici.</p>
                                  <div class="main-blue-button">
                                      <a href="../reclam_blog/formulaire.php">Ecrire votre Blog </a>
                                      <a href="../reclam_blog/Blog.php">Tous nos Blog</a>
                                  </div>
                              </div>
                            </div>
                  </div>
              </div>
                        
                  <div class="col-lg-6 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.25s">
                    <div class="right-list">
                      <ul>
                          <?php foreach($topPosts as $post): ?>
                              <li>
                                  <a href="post_details.php?id=<?php echo $post['ID_Post']; ?>">
                                      <div class="left-content align-self-center">
                                          <span><i class="fa fa-calendar"></i> <?php echo $post['Date_Publication']; ?></span>
                                          <h4><?php echo $post['Titre']; ?></h4>
                                          <p><?php echo substr($post['Contenu'], 0, 100); ?>...</p> <!-- Limiting content to 100 characters -->
                                      </div>
                                      <div class="right-image">
                                          <img src="../reclam_blog/Images/<?php echo $post['Image']; ?>" alt="">
                                      </div>
                                  </a>
                              </li>
                          <?php endforeach; ?>
                      </ul>
                    </div>
                  </div>
          </div>
      </div>
  </div>
  <br>
  <br>
  <div id="contact" class="contact-us section">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 align-self-center wow fadeInLeft" data-wow-duration="0.5s" data-wow-delay="0.25s">
          <div class="section-heading">
            <h2>"N'hésitez pas à nous envoyer une réclamation concernant vos besoins en matière de site web."</h2>
            <p>Feel free to send us a message about your website needs</p>
            <div class="phone-info">
              <h4>For any enquiry, Call Us: <span><i class="fa fa-phone"></i> <a href="#">77234555</a></span></h4>
            </div>
          </div>
        </div>
        <div class="col-lg-6 wow fadeInRight" data-wow-duration="0.5s" data-wow-delay="0.25s">
          <form id="contact" action="" method="post">
            <div class="row">
              <img src="assets/images/13818740_5362970.png" alt=""class="photo-animee">
              <div class="col-lg-12">
                
              
              <?php
         // Ajouter le lien vers addEvenement.php avec l'ID de l'entreprise
          // Remplacez 1 par l'ID de l'entreprise
          echo "<a href='../reclam_blog/reclame.php?idEtudiant=$idEtudiant' class='btn btn-primary' style='font-weight: bold; font-size: 18px; width:200px;'>remplir reclamation</a>";
           ?>
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