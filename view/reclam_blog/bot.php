<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Chatbot in PHP | CampCodes</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <style>
        /* Ajoutez le CSS pour les questions */
        .question {
            cursor: pointer;
            color: #007bff;
            font-weight: bold;
            border: 1px solid #ccc;
            padding: 8px;
            margin-bottom: 10px;
            border-radius: 5px;
        }
    </style>
        <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <title>Space Dynamic - SEO HTML5 Template</title>

    <!-- Bootstrap core CSS -->
    <link href="../entreprise/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="../entreprise/assets/css/fontawesome.css">
    <link rel="stylesheet" href="../entreprise/assets/css/templatemo-space-dynamic.css">
    <link rel="stylesheet" href="../entreprise/assets/css/animated.css">
    <link rel="stylesheet" href="../entreprise/assets/css/owl.css">
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
                  <img src="../entreprise/assets/images/logo.png" >
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
             <li class="scroll-to-section"><a href="http://localhost/web/view/etudiant/index.php#[object%20Object]" class="active">Acceuil</a></li>

              <li class="scroll-to-section"><a href="#portfolio">Evènement</a></li>
              <li class="scroll-to-section"><a href="#services">Offres&demandes</a></li>
              <li class="scroll-to-section"><a href="#yomna">Entretien</a></li>
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
    <div class="container">
        <br>
        <br>
        <br>
        <br>
        <br>
    <div class="wrapper">
        <div class="title"> Chatbot en ligne</div>
        <div class="form">
            <div class="bot-inbox inbox">
                <div class="icon">
                    <i class="fas fa-user"></i>
                </div>
                <div class="msg-header">
                    <p>Bonjour, comment puis-je vous aider ?</p>
                </div>
            </div>
        </div>
        <div class="question-container">
            <p>Questions:</p>
            <div class="questions">
                <?php
                // Connexion à la base de données
                $cfg = require __DIR__ . '/../../config.local.php';
                $dsn = $cfg['db']['dsn'];
                $username = $cfg['db']['user'];
                $password = $cfg['db']['pass'];

                try {
                    $pdo = new PDO($dsn, $username, $password);
                    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                    // Requête SQL pour sélectionner les questions
                    $query = "SELECT queries FROM chatbot WHERE queries NOT IN ('salut', 'merci')";
                    $stmt = $pdo->query($query);

                    // Affichage des questions
                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        echo '<div class="question">' . $row['queries'] . '</div>';
                    }
                } catch (PDOException $e) {
                    echo "Database Error: " . $e->getMessage();
                }
                ?>
            </div>
        </div>
        <div class="typing-field">
            <div class="input-data">
                <input id="data" type="text" placeholder="Type something here.." required>
                <button id="send-btn">Send</button>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function(){
            $(".question").on("click", function(){
                var question = $(this).text();
                var message = '<div class="user-inbox inbox"><div class="msg-header"><p>'+ question +'</p></div></div>';
                $(".form").append(message);
                $(".form").scrollTop($(".form")[0].scrollHeight);

                // Requête pour obtenir la réponse du bot
                $.ajax({
                    url: 'message.php',
                    type: 'POST',
                    data: {text: question},
                    success: function(result){
                        var reply = '<div class="bot-inbox inbox"><div class="icon"><i class="fas fa-user"></i></div><div class="msg-header"><p>'+ result +'</p></div></div>';
                        $(".form").append(reply);
                        $(".form").scrollTop($(".form")[0].scrollHeight);
                    }
                });
            });

            $("#send-btn").on("click", function(){
                var value = $("#data").val();
                var msg = '<div class="user-inbox inbox"><div class="msg-header"><p>'+ value +'</p></div></div>';
                $(".form").append(msg);
                $("#data").val('');
                
                $.ajax({
                    url: 'message.php',
                    type: 'POST',
                    data: {text: value},
                    success: function(result){
                        var reply = '<div class="bot-inbox inbox"><div class="icon"><i class="fas fa-user"></i></div><div class="msg-header"><p>'+ result +'</p></div></div>';
                        $(".form").append(reply);
                        $(".form").scrollTop($(".form")[0].scrollHeight);
                    }
                });
            });
        });
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
  <script src="../entreprise/vendor/jquery/jquery.min.js"></script>
  <script src="../entreprise/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../entreprise/assets/js/owl-carousel.js"></script>
  <script src="../entreprise/assets/js/animation.js"></script>
  <script src="../entreprise/assets/js/imagesloaded.js"></script>
  <script src="../entreprise/assets/js/templatemo-custom.js"></script>
</body>
</html>
