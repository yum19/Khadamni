<?php
include 'C:/xampp/htdocs/web/controller/PostC.php';
include 'C:/xampp/htdocs/web/controller/CommentC.php';
$PostC=new PostC();
$liste=$PostC->listPosts();
$commentC=new CommentC();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1">
  <title>Blog</title>
  <link rel="stylesheet" href="cssgb/blog.css">
  <link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,300;0,500;0,600;1,300&display=swap" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="cssgb/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="cssgb/owl.carousel.min.css">
  <link rel="stylesheet" type="text/css" href="cssgb/owl.theme.default.min.css">

    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-space-dynamic.css">
    <link rel="stylesheet" href="assets/css/animated.css">
    <link rel="stylesheet" href="assets/css/owl.css">
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
                  <img src="../etudiant/assets/images/logo.png" >
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
              <li class="scroll-to-section"><a href="http://localhost/web/view/etudiant/index.php" class="active">Acceuil</a></li>
              <li class="scroll-to-section"><a href="#services">Offres&demandes</a></li>
              <li class="scroll-to-section"><a href="#yomna">Entretien</a></li>
              <li class="scroll-to-section"><a href="#portfolio">Evènement</a></li>
              <li class="scroll-to-section"><a href="#contact">Reclamation</a></li> 
              <li class="scroll-to-section"><a href="http://localhost/web/view/reclam_blog/bot.php" class="active">Chatbot</a></li> 
              <li class="scroll-to-section"><a href="http://localhost/web/view/etudiant/afficherProfil.php" class="active">Profile</a></li> 
              <li style ="margin-top:0.8%;">
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
      <div class="row">
        <div class="col-lg-12">
          <div class="row">
            <div class="col-lg-6 align-self-center">
              <div class="left-content header-text wow fadeInLeft" data-wow-duration="1s" data-wow-delay="1s">
                <h6>Blog</h6>
                <h2> <em>Retrouvez tous  </em>nos posts   <span>sur cette page</span> </h2>
                <br>
                <h2><a href="#posts-section" class="b">Voir nos Posts</a></h2>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="right-image wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.5s">
                <img src="Images/blog.jpg" alt="team meeting">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
    <div class="container" >
      <div class="header-info-par">
        <h3></h3>
        <h4></h4>
       
        <!--<div class="video">  
        <img src="../view/imagesun1/backh.png" alt="Your Image Description ">        
        </div>-->
      </div>
    </div>
  </header>
  <section class="tour" id="posts-section">
  <fieldset>
    <div class="center-text"> 
      <input type="text" id="searchInput" class="searchbar" placeholder="Rechercher par titre..." style="background-color: #FFFFFF;">
    </div>
    </fieldset>
    <div id="normalPosts" class="tour-content">
    <?php foreach($liste as $post): ?>
    <div class="box" id="box-posts">
        <a href="post_details.php?id=<?= $post['ID_Post']; ?>">
            <img src="Images/<?= $post['Image']; ?>">
            <h4><?= $post['Titre']; ?></h4>
        </a>
        <p>Likes : <?= $post['Likes']; ?> Dislikes : <?= $post['Dislikes']; ?></p>
        <p>Commentaires: <?= $post['Commentaires']; ?></p>
        <p><?= $post['Auteur']; ?> <?= $post['Date_Publication']; ?></p>
    </div>
<?php endforeach; ?>
  </section>
  <section class="top-posts">
    <div class="center-text">
        <h2>Top 3 des Meilleurs Posts</h2>
    </div>
    <div class="tour-content">
        <?php $topPosts = $PostC->getTopPosts(); ?>
        <?php foreach($topPosts as $post): ?>
            <div class="box" id="box-top-posts">
                <a href="post_details.php?id=<?= $post['ID_Post']; ?>">
                    <img src="Images/<?= $post['Image']; ?>">
                    <h4><?= $post['Titre']; ?></h4>
                </a>
                <p>Likes : <?= $post['Likes']; ?> Dislikes : <?= $post['Dislikes']; ?></p>
                <p>Commentaires: <?= $post['Commentaires']; ?></p>
                <p><?= $post['Auteur']; ?> <?= $post['Date_Publication']; ?></p>
            </div>
        <?php endforeach; ?>
    </div>
</section>
<footer>
    <div class="container">
      <div class="row">
        <div class="col-lg-12 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.25s">
          <p>© Copyright 2021 Space Dynamic Co. All Rights Reserved. 
          
          <br>Design: <a rel="nofollow" href="https://templatemo.com">Khadamni</a></p>
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
  <script>
    function validateComment(postID) {
        var pseudo = document.getElementById("Pseudo" + postID).value;
        var contenu = document.getElementById("Contenu" + postID).value;

        if (pseudo.trim() === "" || contenu.trim() === "") {
            alert("Veuillez remplir tous les champs.");
            return false;
        }
        return true;
    }
</script>
  <script src="js/jquery-3.1.1.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/extrenaljq.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        $('#searchInput').keyup(function(){
            var searchText = $(this).val();
            $.ajax({
                url: 'search_posts.php',
                method: 'GET',
                data: { searchText: searchText },
                success: function(response){
                    $('#normalPosts').html(response);
                }
            });
        });
    });
</script>
</body>
</html>