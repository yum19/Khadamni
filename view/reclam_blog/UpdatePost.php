<?php
include 'C:/xampp/htdocs/web/controller/PostC.php';
$error = "";
$post = null;
$postC = new PostC();

if (isset($_GET['ID_Post'])) {
    $postID = $_GET['ID_Post'];
    $post = $postC->showPost($postID);
    if (isset($_POST["modifier"])) { // Adjusted condition to check for the existence of modifier
        if (!empty($_POST["Titre"]) && !empty($_POST["Contenu"]) && !empty($_POST["Auteur"]) && !empty($_POST["Tags"]) && !empty($_FILES["Image"]["name"])) {
            $imageFileName = basename($_FILES["Image"]["name"]);
            $updatedPost = new Post(
                $_POST['ID_Post'],
                $_POST['Titre'],
                $_POST['Contenu'],
                $_POST['Auteur'],
                new DateTime(), // Assuming Date_Publication should be updated as well
                $_POST['Tags'],
                0, // Assuming Likes, Dislikes, and Comments should not be updated via this form
                0,
                0,
                $imageFileName
            );
            $postC->updatePost($updatedPost, $postID); // Use $postID to identify the post to update
            header('Location:ListePostss.php');
            exit();
        } else {
            $error = "Missing information";
        }
    }
}
?>

<html lang="en">
<head>
    <script>
        function validerForm() {
            var titre = document.getElementById("Titre").value;
            var contenu = document.getElementById("Contenu").value;
            var auteur = document.getElementById("Auteur").value;
            var tags = document.getElementById("Tags").value;
            var image = document.getElementById("Image").value;

            if (titre == "" || contenu == "" || auteur == "" || tags == "" || image == "") {
                alert("Veuillez remplir tous les champs.");
                return false;
            }

            if (!tags.startsWith("#")) {
                alert("Le tag doit commencer par un #.");
                return false;
            }

            if (titre.charAt(0) !== titre.charAt(0).toUpperCase()) {
                alert("Le titre doit commencer par une majuscule.");
                return false;
            }

            if (contenu.length <= 10) {
                alert("Le contenu doit contenir plus de 10 lettres.");
                return false;
            }

            if (/\d/.test(titre)) {
                alert("Le titre ne doit pas contenir de chiffres.");
                return false;
            }

            if (/\d/.test(auteur)) {
                alert("L'auteur ne doit pas contenir de chiffres.");
                return false;
            }

            return true;
        }
    </script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Display</title>
    <link href="../admin/dashboard/plugins/pg-calendar/css/pignose.calendar.min.css" rel="stylesheet">
    <!-- Chartist -->
    <link rel="stylesheet" href="../admin/dashboard/plugins/chartist/css/chartist.min.css">
    <link rel="stylesheet" href="../admin/dashboard/plugins/chartist-plugin-tooltips/css/chartist-plugin-tooltip.css">
    <!-- Custom Stylesheet -->
    <link href="../admin/dashboard/css/style.css" rel="stylesheet">
</head>
<body>
   <div id="preloader">
        <div class="loader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" />
            </svg>
        </div>
    </div>
    <div id="main-wrapper">   
        <div class="corner-container">
            <img src="../admin/dashboard/images/logoooooo.png" >
            <style>
                .corner-container {
                    position: fixed; /* Position fixe pour que le logo reste fixe lors du défilement */
                    top: 0; /* Distance depuis le haut */
                    left: 70px; /* Distance depuis la gauche */
                    z-index: 9999; /* Assure que le logo est au-dessus de tout le contenu */
                }

                .corner-container img {
                    width: 90px; /* Largeur minimale du logo */
                    top: 0; /* Distance depuis le haut */
                    height: auto; /* Hauteur ajustée automatiquement pour conserver les proportions */
                }
            </style>
        </div> 
        <div class="header">    
            <div class="header-content clearfix">
                
                <div class="nav-control">
                    <div class="hamburger">
                        <span class="toggle-icon"><i class="icon-menu"></i></span>
                    </div>
                </div>
                <div class="header-left">
                    <div class="input-group icons">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-transparent border-0 pr-2 pr-sm-3" id="basic-addon1"><i class="mdi mdi-magnify"></i></span>
                        </div>
                        <input type="search" class="form-control" placeholder="Search Dashboard" aria-label="Search Dashboard">
                        <div class="drop-down animated flipInX d-md-none">
                            <form action="#">
                                <input type="text" class="form-control" placeholder="Search">
                            </form>
                        </div>
                    </div>
                </div>
                <div class="header-right">
                    <ul class="clearfix">
                        <li class="icons dropdown"><a href="javascript:void(0)" data-toggle="dropdown">
                                <i class="mdi mdi-email-outline"></i>
                                <span class="badge badge-pill gradient-1">3</span>
                            </a>
                            <div class="drop-down animated fadeIn dropdown-menu">
                                <div class="dropdown-content-heading d-flex justify-content-between">
                                    <span class="">3 New Messages</span>  
                                    <a href="javascript:void()" class="d-inline-block">
                                        <span class="badge badge-pill gradient-1">3</span>
                                    </a>
                                </div>
                                <div class="dropdown-content-body">
                                    <ul>
                                        <li class="notification-unread">
                                            <a href="javascript:void()">
                                                <img class="float-left mr-3 avatar-img" src="images/avatar/1.jpg" alt="">
                                                <div class="notification-content">
                                                    <div class="notification-heading">Saiful Islam</div>
                                                    <div class="notification-timestamp">08 Hours ago</div>
                                                    <div class="notification-text">Hi Teddy, Just wanted to let you ...</div>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                    
                                </div>
                            </div>
                        </li>
                        <li class="icons dropdown"><a href="javascript:void(0)" data-toggle="dropdown">
                                <i class="mdi mdi-bell-outline"></i>
                                <span class="badge badge-pill gradient-2">3</span>
                            </a>
                            <div class="drop-down animated fadeIn dropdown-menu dropdown-notfication">
                                <div class="dropdown-content-heading d-flex justify-content-between">
                                    <span class="">2 New Notifications</span>  
                                    <a href="javascript:void()" class="d-inline-block">
                                        <span class="badge badge-pill gradient-2">5</span>
                                    </a>
                                </div>
                                <div class="dropdown-content-body">
                                    <ul>
                                        <li>
                                            <a href="javascript:void()">
                                                <span class="mr-3 avatar-icon bg-success-lighten-2"><i class="icon-present"></i></span>
                                                <div class="notification-content">
                                                    <h6 class="notification-heading">Events near you</h6>
                                                    <span class="notification-text">Within next 5 days</span> 
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void()">
                                                <span class="mr-3 avatar-icon bg-danger-lighten-2"><i class="icon-present"></i></span>
                                                <div class="notification-content">
                                                    <h6 class="notification-heading">Events to Join</h6>
                                                    <span class="notification-text">After two days</span> 
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                    
                                </div>
                            </div>
                        </li>
                        <li class="icons dropdown">
                            <div class="user-img c-pointer position-relative"   data-toggle="dropdown">
                                <span class="activity active"></span>
                                <img src="https://bootdey.com/img/Content/avatar/avatar6.png" height="40" width="40" alt="">
                            </div>
                            <div class="drop-down dropdown-profile animated fadeIn dropdown-menu">
                                <div class="dropdown-content-body">
                                   <ul>
                                        <li>
                                            <a href="http://localhost/web/gestionUser/view/admin/profil.php"><i class="icon-user"></i> <span>Profile</span></a>
                                        </li>
                                        <li>
                                            <a href="javascript:void()">
                                                <i class="icon-envelope-open"></i> <span>Inbox</span> <div class="badge gradient-3 badge-pill gradient-1">3</div>
                                            </a>
                                        </li>
                                        
                                        <hr class="my-2">
                                        <li><a href="http://localhost/web/view/admin/aff.php"><i class="icon-key"></i> <span>Logout</span></a></li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="nk-sidebar">           
            <div class="nk-nav-scroll">
                <ul class="metismenu" id="menu">
                    <li class="nav-label">Dashboard</li>
                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="icon-speedometer menu-icon"></i><span class="nav-text">Dashboard</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="http://localhost/web/gestionUser/view/admin/afficher.php">Acceuil</a></li>
                            <!-- <li><a href="./index-2.html">Home 2</a></li> -->
                        </ul>
                    </li>
                    <li class="nav-label">Statestique</li>
                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="icon-graph menu-icon"></i> <span class="nav-text">statestique</span>
                        </a>
                        <ul aria-expanded="false" >
                            <li>                
                                <a href="http://localhost/web/gestionUser/view/etudiant/statestique.php">
                                    <i class="icon-graph menu-icon"></i> Etudiant
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-label">Gestion Utilisateurs</li>
                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="icon-menu menu-icon"></i><span class="nav-text">Gestion Utilisateurs</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="../View/table.php" aria-expanded="false">Tableau Entreprise</a></li>
                        </ul>
                        <ul aria-expanded="false">
                            <li><a href="http://localhost/web/gestionUser/view/etudiant/afficher.php" aria-expanded="false">Tableau Etudiant</a></li>
                        </ul>
                    </li>
                    <li class="nav-label">Gestion Evenement</li>
                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="icon-menu menu-icon"></i><span class="nav-text">Gestion Evenement</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="http://localhost/web/view/evenement/ListEvenement.php" aria-expanded="false">Tableau Evenement</a></li>
                        </ul>
                        <ul aria-expanded="false">
                            <li><a href="http://localhost/web/view/evenement/ListCategorieevn.php" aria-expanded="false">Tableau Categorie</a></li>
                        </ul>
                        <ul aria-expanded="false">
                            <li><a href="http://localhost/web/view/evenement/listeParticipation.php" aria-expanded="false">Tableau Participation</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
        <div class="content-body">
            <style>
                .content-body {
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    min-height: 100vh;
                    background-color: #f0f0f0;
                }

                .register {
                    width: 400px;
                    padding: 20px 10px; /* Increased top and bottom padding */
                    background-color: #fff;
                    border: 2px solid orange;
                    border-radius: 10px;
                    box-shadow: 0 0 10px #fe3f40;
                }

                .form-title {
                    text-align: center; /* Center the title horizontally */
                    color: #fe3f40;
                    font-size: 28px;
                    font-weight: 600;
                    margin-bottom: 40px; /* Adjusted margin for spacing */
                    margin-top: 20px; /* Added margin to move title towards the top */
                }

                .input-box {
                    position: relative;
                }

                .input-field {
                    width: 100%;
                    height: 30px;
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
                    background-color: #fe3f40;
                }
            </style>
            <hr>

            <div id="error">
                <?php echo $error; ?>
            </div>
            <div class="register">
            <?php if ($post) { ?>
                <form action="" method="POST" enctype="multipart/form-data" onsubmit="return validerForm()">
                    <div class="form-inputs">
                        <input type="hidden" name="ID_Post" id="ID_Post" value="<?php echo $post['ID_Post']; ?>"> <!-- Removed readonly and disabled -->
                        <div class="input-box">
                            <input type="text" class="input-field" placeholder="Titre" name="Titre" id="Titre" value="<?php echo $post['Titre']; ?>">
                            <input type="text" class="input-field" placeholder="Contenu"  name="Contenu" id="Contenu" value="<?php echo $post['Contenu']; ?>">
                            <input type="text" class="input-field" placeholder="Auteur" name="Auteur" value="<?php echo $post['Auteur']; ?>" id="Auteur" >
                            <input type="text" class="input-field" placeholder="Tags" name="Tags" id="Tags" value="<?php echo $post['Tags']; ?>">
                            <input type="file" class="input-field" placeholder="image" name="Image" id="Image" value="<?php echo $post['Image']; ?>">
                        </div>

                        <div class="input-box">
                            <button type="submit" class="input-submit" name="modifier"> <!-- Use name="modifier" -->
                                <span>Modifier</span>
                                <i class="bx bx-right-arrow-alt"></i>
                            </button>
                        </div>
                    </div>
                </form>
            <?php } ?>
            </div>
        </div>
    <script src="../admin/dashboard/plugins/common/common.min.js"></script>
    <script src="../admin/dashboard/js/custom.min.js"></script>
    <script src="../admin/dashboard/js/settings.js"></script>
    <script src="../admin/dashboard/js/gleek.js"></script>
    <script src="../admin/dashboard/js/styleSwitcher.js"></script>

    <!-- Chartjs -->
    <script src="../admin/dashboard/plugins/chart.js/Chart.bundle.min.js"></script>
    <!-- Circle progress -->
    <script src="../admin/dashboard/plugins/circle-progress/circle-progress.min.js"></script>
    <!-- Datamap -->
    <script src="../admin/dashboard/plugins/d3v3/index.js"></script>
    <script src="../admin/dashboard/plugins/topojson/topojson.min.js"></script>
    <script src="../admin/dashboard/plugins/datamaps/datamaps.world.min.js"></script>
    <!-- Morrisjs -->
    <script src="../admin/dashboard/plugins/raphael/raphael.min.js"></script>
    <script src="../admin/dashboard/plugins/morris/morris.min.js"></script>
    <!-- Pignose Calender -->
    <script src="../admin/dashboard/plugins/moment/moment.min.js"></script>
    <script src="../admin/dashboard/plugins/pg-calendar/js/pignose.calendar.min.js"></script>
    <!-- ChartistJS -->
    <script src="../admin/dashboard/plugins/chartist/js/chartist.min.js"></script>
    <script src="view/dashboard/plugins/chartist-plugin-tooltips/js/chartist-plugin-tooltip.min.js"></script>
    <script src="view/dashboard/js/dashboard/dashboard-1.js"></script>
</body>
</html>
