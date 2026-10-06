<?php
include 'C:/xampp/htdocs/web/controller/UserC.php';

session_start();
// Check if the user is logged in
if(isset($_SESSION['idR'])) {
    // User is logged in, you can display their information
    $idR = $_SESSION['idR'];
    $nomR = $_SESSION['nomR'];
    $prenomR = $_SESSION['prenomR'];   
} else {
    // Redirect the user to the login page if not logged in
    header("Location: http://localhost/web/view/admin/aff.php");
    exit;
}
$userC = new UserC();
$users = $userC->listUsers();
if ($users) {
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>KHADAMNI - Dashboard</title>
    <!-- Pignose Calender -->
    <link href="dashboard/plugins/pg-calendar/css/pignose.calendar.min.css" rel="stylesheet">
    <!-- Chartist -->
    <link rel="stylesheet" href="dashboard/plugins/chartist/css/chartist.min.css">
    <link rel="stylesheet" href="dashboard/plugins/chartist-plugin-tooltips/css/chartist-plugin-tooltip.css">
    <!-- Custom Stylesheet -->
    <link href="dashboard/css/style.css" rel="stylesheet">

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
                  <img src="dashboard/images/logoooooo.png">
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
                            <span class="input-group-text bg-transparent border-0 pr-2 pr-sm-3" id="basic-addon1">
                                <i class="mdi mdi-magnify"></i>
                            </span>
                        </div>
                        <div class="form-group">
                            <input type="search" class="form-control" id="search2" placeholder="Search...">
                            <div id="error2"></div>
                        </div>                        
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
                            <div>                               
                                <p><i class="fa fa-circle" aria-hidden="true" style="color: green; font-size: 10px;"> </i>   Bienvenue <?php echo $nomR; ?> <?php echo $prenomR; ?></p>
                            </div>
                        </li>
                        
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
                                            <a href="http://localhost/web/view/admin/profil.php"><i class="icon-user"></i> <span>Profile</span></a>
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
                            <li><a href="http://localhost/web/view/admin/afficher.php">Acceuil</a></li>
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
                                <a href="http://localhost/web/view/etudiant/statestique.php">
                                    <i class="icon-graph menu-icon"></i> Etudiant
                                </a>
                            </li>
                            <li>                
                                <a href="../offre_test/back end/chart-flotOffres.php">
                                    <i class="icon-graph menu-icon"></i> offre
                                </a>
                            </li>
                            <li>                
                                <a href="../offre_test/back end/chart-flot.php">
                                    <i class="icon-graph menu-icon"></i>demande
                                </a>
                            </li>
                            <li>                
                                <a href="../offre_test/back end/chart-morris.php">
                                    <i class="icon-graph menu-icon"></i>Entretien
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
                            <li><a href="http://localhost/web/view/entreprise/table.php" aria-expanded="false">Tableau Entreprise</a></li>
                        </ul>
                        <ul aria-expanded="false">
                            <li><a href="http://localhost/web/view/etudiant/afficher.php" aria-expanded="false">Tableau Etudiant</a></li>
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
                    <li class="nav-label">Gestion Reclamation</li>
                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="icon-menu menu-icon"></i><span class="nav-text">Gestion Reclamation</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="../reclam_blog/listerecruteur.php" aria-expanded="false">Tableau Reclamation</a></li>
                        </ul>
                        <ul aria-expanded="false">
                            <li><a href="../reclam_blog/listereponse.php" aria-expanded="false">Tableau reponse</a></li>
                        </ul>
                    </li>
                    <li class="nav-label">Gestion Blog</li>
                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="icon-menu menu-icon"></i><span class="nav-text">Gestion Blog</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="http://localhost/web/view/reclam_blog/ListePostss.php" aria-expanded="false">Tableau commentaire</a></li>
                        </ul>
                        <ul aria-expanded="false">
                            <li><a href="http://localhost/web/view/reclam_blog/ListePosts.php" aria-expanded="false">Tableau Post</a></li>
                        </ul>
                    </li>
                    <li class="nav-label">Gestion offre&demande</li>
                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="icon-menu menu-icon"></i><span class="nav-text">offre&demande</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="../offre_test/back end/table-basicOffre.php" aria-expanded="false">Tableaux</a></li>
                        </ul>
                        
                    </li>
                    <li class="nav-label">Gestion Entretien</li>
                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="icon-menu menu-icon"></i><span class="nav-text">Entretien</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="../offre_test/back end/table-basic.php" aria-expanded="false">Tableaux</a></li>
                        </ul>
                        
                    </li>

                </ul>
            </div>
        </div>

        <div class="content-body">

            <div class="container-fluid mt-3">
                <div class="row">
                    <div class="col-lg-3 col-sm-6">
                        <div class="card gradient-3">
                            <div class="card-body">
                                <h3 class="card-title text-white">Nouveaux Visiteurs</h3>
                                <div class="d-inline-block">
                                    <h2 class="text-white">4565</h2>
                                    <p class="text-white mb-0">Jan - Mars 2023</p>
                                </div>
                                <span class="float-right display-5 opacity-5"><i class="fa fa-users"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card gradient-4">
                            <div class="card-body">
                                <h3 class="card-title text-white">Satisfaction du client</h3>
                                <div class="d-inline-block">
                                    <h2 class="text-white">99%</h2>
                                    <p class="text-white mb-0">Jan - Mars 2023</p>
                                </div>
                                <span class="float-right display-5 opacity-5"><i class="fa fa-heart"></i></span>
                            </div>
                        </div>
                    </div>
                
                    <div class="col-lg-3 col-sm-6">
                        <div class="card gradient-2">
                            <div class="card-body">
                                <h3 class="card-title text-white">Net Profit</h3>
                                <div class="d-inline-block">
                                    <h2 class="text-white">$ 8541</h2>
                                    <p class="text-white mb-0">Jan - March 2019</p>
                                </div>
                                <span class="float-right display-5 opacity-5"><i class="fa fa-money"></i></span>
                            </div>
                        </div>
                    </div>
                </div>  
                <div class="row">
                    <div class="col-lg-3 col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="text-center">
                                    <img src="C:/xampp/htdocs/web/view/admin/dashboard/images/users/8.jpg" class="rounded-circle" alt="">
                                    <h5 class="mt-3 mb-1">Ameni Issaoui</h5>
                                    <p class="m-0">Gestion Utilisateurs</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="text-center">
                                    <img src="C:/xampp/htdocs/web/view/admin/dashboard/images/users/5.jpg" class="rounded-circle" alt="">
                                    <h5 class="mt-3 mb-1">Arij Achach</h5>
                                    <p class="m-0">Gestion Entreprise</p>
                                    <!-- <a href="javascript:void()" class="btn btn-sm btn-warning">Send Message</a> -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="text-center">
                                    <img src="C:/xampp/htdocs/web/view/admin/dashboard/images/users/7.png" class="rounded-circle" alt="">
                                    <h5 class="mt-3 mb-1">Farah chebane</h5>
                                    <p class="m-0">Gestion offres&demandes</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="text-center">
                                    <img src="C:/xampp/htdocs/web/view/admin/dashboard/images/users/yomna.png" class="rounded-circle" alt="">
                                    <h5 class="mt-3 mb-1">Yomna Bouallegue</h5>
                                    <p class="m-0">Gestion Entretien</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="text-center">
                                    <img src="C:/xampp/htdocs/web/view/admin/dashboard/images/users/11.png" class="rounded-circle" alt="">
                                    <h5 class="mt-3 mb-1">Sirine Bouden</h5>
                                    <p class="m-0">Gestion Reclamation</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="text-center">
                                    <img src="C:/xampp/htdocs/web/view/admin/dashboard/images/users/12.png" class="rounded-circle" alt="">
                                    <h5 class="mt-3 mb-1">Cheker Hasan</h5>
                                    <p class="m-0">Gestion Blog</p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card" style="width: 1000px;">
                                    <a href="http://localhost/web/view/admin/ajouter.php" class="btn btn-primary">
                                        ajouter admin <i class="now-ui-icons ui-1_simple-add"></i> 
                                    </a>
                            <div class="card-body">
                                <div class="active-member">
                                    <div class="table-responsive">
                                        <table class="table table-xs mb-0" id="userTable2">
                                       
                                            <thead>
                                                <tr>
                                                    <th>id</th>
                                                    <th>Nom</th>
                                                    <th>Prenom</th>
                                                    <th>Téléphone</th>
                                                    <th>Date de naissance</th>
                                                    <th>Email</th>
                                                    <th>Mot De Passe</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($users as $user) : ?>
                                                    <tr>
                                                        <td class="text-center"><?= isset($user['idR']) ? $user['idR'] : ''; ?></td>
                                                        <td><?= isset($user['nomR']) ? $user['nomR'] : ''; ?></td>
                                                        <td><?= isset($user['prenomR']) ? $user['prenomR'] : ''; ?></td>
                                                        <td><?= isset($user['telephoneR']) ? $user['telephoneR'] : ''; ?></td>
                                                        <td><?= isset($user['dateR']) ? $user['dateR'] : ''; ?></td>
                                                        <td><?= isset($user['emailR']) ? $user['emailR'] : ''; ?></td>
                                                        <td><?= isset($user['MDPR']) ? $user['MDPR'] : ''; ?></td>
                                                
                                                        <td class="td-actions text-right">
                                                            <!-- Bouton "Modifier" -->
                                                            <form method="POST" action="http://localhost/web/view/admin/modifier.php">
                                                                <button class="btn btn-success btn-sm btn-icon" type="submit" name="modifier">
                                                                <i class="fa fa-pencil"></i>
                                                                </button>
                                                                <input type="hidden" value="<?= isset($user['idR']) ? $user['idR'] : ''; ?>" name="idR">
                                                            </form>

                                                            <!-- Bouton "Supprimer" -->
                                                            <a href="http://localhost/web/view/admin/supprimer.php?idR=<?= isset($user['idR']) ? $user['idR'] : ''; ?>" class="btn btn-danger btn-sm btn-icon">
                                                            <i class="fa fa-trash"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                                
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>                        
                    </div>
                </div>
                <div class="row">
                        <div class="col-lg-3 col-sm-6">
                            <div class="card">
                                <div class="social-graph-wrapper widget-facebook">
                                    <span class="s-icon"><i class="fa fa-facebook"></i></span>
                                </div>
                                <div class="row">
                                    <div class="col-6 border-right">
                                        <div class="pt-3 pb-3 pl-0 pr-0 text-center">
                                            <h4 class="m-1">89k</h4>
                                            <p class="m-0">Friends</p>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="pt-3 pb-3 pl-0 pr-0 text-center">
                                            <h4 class="m-1">119k</h4>
                                            <p class="m-0">Followers</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-lg-3 col-sm-6">
                            <div class="card">
                                <div class="social-graph-wrapper widget-googleplus">
                                    <span class="s-icon"><i class="fa fa-google-plus"></i></span>
                                </div>
                                <div class="row">
                                    <div class="col-6 border-right">
                                        <div class="pt-3 pb-3 pl-0 pr-0 text-center">
                                            <h4 class="m-1">89k</h4>
                                            <p class="m-0">Friends</p>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="pt-3 pb-3 pl-0 pr-0 text-center">
                                            <h4 class="m-1">119k</h4>
                                            <p class="m-0">Followers</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6">
                            <div class="card">
                                <div class="social-graph-wrapper widget-twitter">
                                    <span class="s-icon"><i class="fa fa-twitter"></i></span>
                                </div>
                                <div class="row">
                                    <div class="col-6 border-right">
                                        <div class="pt-3 pb-3 pl-0 pr-0 text-center">
                                            <h4 class="m-1">89k</h4>
                                            <p class="m-0">Friends</p>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="pt-3 pb-3 pl-0 pr-0 text-center">
                                            <h4 class="m-1">119k</h4>
                                            <p class="m-0">Followers</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
        <div class="footer">
            <div class="copyright">
                <p>Copyright &copy; Designed & Developed by KHADEMNI</a> 2024</p>
            </div>
        </div>
    </div>
<script>
        document.addEventListener("DOMContentLoaded", function() {
    document.getElementById("search2").addEventListener("keyup", function () {
        var search = this.value.toLowerCase();
        var rows = document.getElementById("userTable2").getElementsByTagName("tr");
        var foundResults = false; // Flag to track if any search results are found

        for (var i = 1; i < rows.length; i++) {
            var rowData = rows[i].getElementsByTagName("td");
            var found = false;

            for (var j = 0; j < rowData.length; j++) {
                var cellData = rowData[j].textContent.toLowerCase();

                if (cellData.includes(search)) {
                    found = true;
                    foundResults = true; // Set the flag to true if a match is found
                    break;
                }
            }

            if (found) {
                rows[i].style.display = ""; // Show the row if a match is found
            } else {
                rows[i].style.display = "none"; // Hide the row if no match is found
            }
        }

        // Display error message if no search results are found
        var errorMessage = document.getElementById("error2");
        if (!foundResults) {
            errorMessage.innerHTML = "<span class='text-danger'>Aucun résultat trouvé !</span>";
        } else {
            errorMessage.innerHTML = ""; // Clear the error message if results are found
        }
    });
});

</script>

    <script src="dashboard/plugins/common/common.min.js"></script>
    <script src="dashboard/js/custom.min.js"></script>
    <script src="dashboard/js/settings.js"></script>
    <script src="dashboard/js/gleek.js"></script>
    <script src="dashboard/js/styleSwitcher.js"></script>

    <!-- Chartjs -->
    <script src="dashboard/plugins/chart.js/Chart.bundle.min.js"></script>
    <!-- Circle progress -->
    <script src="dashboard/plugins/circle-progress/circle-progress.min.js"></script>
    <!-- Datamap -->
    <script src="dashboard/plugins/d3v3/index.js"></script>
    <script src="dashboard/plugins/topojson/topojson.min.js"></script>
    <script src="dashboard/plugins/datamaps/datamaps.world.min.js"></script>
    <!-- Morrisjs -->
    <script src="dashboard/plugins/raphael/raphael.min.js"></script>
    <script src="dashboard/plugins/morris/morris.min.js"></script>
    <!-- Pignose Calender -->
    <script src="dashboard/plugins/moment/moment.min.js"></script>
    <script src="dashboard/plugins/pg-calendar/js/pignose.calendar.min.js"></script>
    <!-- ChartistJS -->
    <script src="dashboard/plugins/chartist/js/chartist.min.js"></script>
    <script src="view/dashboard/plugins/chartist-plugin-tooltips/js/chartist-plugin-tooltip.min.js"></script>
    <script src="view/dashboard/js/dashboard/dashboard-1.js"></script>

</body>
</html>
<?php
} else {
    echo "<center><h2>Aucun utilisateur trouvé.</h2></center>";
}
?>
