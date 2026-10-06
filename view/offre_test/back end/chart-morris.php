<?php
require_once 'C:\xampp\htdocs\web\controller\testC.php';
require_once 'C:\xampp\htdocs\web\controller\entretienC.php';

$TestC2 = new TestC2();

$db = connexion::getConnexion();

// Récupérer toutes les occurrences de lieu_commande
$queryAllLocations = $db->query("SELECT DISTINCT type_entre FROM entretien");
$queryAllLocations->execute();
$allLocations = $queryAllLocations->fetchAll(PDO::FETCH_COLUMN);

// Récupérer le nombre d'occurrences pour chaque lieu_commande
$locationCounts = [];
foreach ($allLocations as $location) {
    $queryCount = $db->prepare("SELECT COUNT(*) FROM entretien WHERE type_entre = :location");
    $queryCount->bindParam(':location', $location);
    $queryCount->execute();
    $locationCounts[$location] = $queryCount->fetchColumn();
}

// Convertir les données en format JSON pour une utilisation dans JavaScript
$locationCountsJSON = json_encode(array_values($locationCounts));
$locationLabelsJSON = json_encode(array_keys($locationCounts));


// Récupérer toutes les occurrences de domaine_informatisue_test
$queryAllDomains = $db->query("SELECT DISTINCT domaine_informatique_test FROM test");
$queryAllDomains->execute();
$allDomains = $queryAllDomains->fetchAll(PDO::FETCH_COLUMN);

// Récupérer le nombre d'occurrences pour chaque domaine_informatisue_test
$domainCounts = [];
foreach ($allDomains as $domain) {
    $queryCount = $db->prepare("SELECT COUNT(*) FROM test WHERE domaine_informatique_test = :domain");
    $queryCount->bindParam(':domain', $domain);
    $queryCount->execute();
    $domainCounts[$domain] = $queryCount->fetchColumn();
}

// Convertir les données en format JSON pour une utilisation dans JavaScript
$domainCountsJSON = json_encode(array_values($domainCounts));
$domainLabelsJSON = json_encode(array_keys($domainCounts));
?>

<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>KHADAMNI - Dashboard</title>
    <!-- Pignose Calender -->
    <link href="../back end/dashboard/plugins/pg-calendar/css/pignose.calendar.min.css" rel="stylesheet">
    <!-- Chartist -->
    <link rel="stylesheet" href="../back end/dashboard/plugins/chartist/css/chartist.min.css">
    <link rel="stylesheet" href="../back end/dashboard/plugins/chartist-plugin-tooltips/css/chartist-plugin-tooltip.css">
    <!-- Custom Stylesheet -->
    <link href="../back end/dashboard/css/style.css" rel="stylesheet">

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

            <div class="row page-titles mx-0">
                <div class="col p-md-0">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Acceuil</a></li>
                    </ol>
                </div>
            </div>
           

            <div class="container-fluid">
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Statistique de Type d'entretien</h4>
                    <div class="graphBox" style="width: 500px; height: 500px;">
                        <div class="box1">
                            <canvas id="pieChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Histogramme de Domaine Informatique</h4>
                    <div class="graphBox" style="width: 500px; height: 500px;">
                        <div class="box1">
                            <canvas id="histogramChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var locationCounts = <?php echo $locationCountsJSON; ?>;
        var locationLabels = <?php echo $locationLabelsJSON; ?>;

        var ctx1 = document.getElementById('pieChart').getContext('2d');
        var myChart1 = new Chart(ctx1, {
            type: 'polarArea',
            data: {
                labels: locationLabels,
                datasets: [{
                    label: 'type d entretien',
                    data: locationCounts,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        var domainCounts = <?php echo $domainCountsJSON; ?>;
        var domainLabels = <?php echo $domainLabelsJSON; ?>;

        var ctx2 = document.getElementById('histogramChart').getContext('2d');
        var myChart2 = new Chart(ctx2, {
            type: 'bar',
            data: {
                labels: domainLabels,
                datasets: [{
                    label: ' Tests par Domaine',
                    data: domainCounts,
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                         beginAtZero: true,
                        precision: 0,
                        stepSize: 1
                    }
                }
            }
        });
    });
</script>




</div>
        <div class="footer">
            <div class="copyright">
            <p>Copyright &copy; Designed & Developed by KHADAMNI</a> 2024</p>
        </div>
  
      
</div>
  
<script src="../back end/dashboard/plugins/common/common.min.js"></script>
    <script src="../back end/dashboard/js/custom.min.js"></script>
    <script src="../back end/dashboard/js/settings.js"></script>
    <script src="../back end/dashboard/js/gleek.js"></script>
    <script src="../back end/dashboard/js/styleSwitcher.js"></script>

    <!-- Chartjs -->
    <script src="../back end/dashboard/plugins/chart.js/Chart.bundle.min.js"></script>
    <!-- Circle progress -->
    <script src="../back end/dashboard/plugins/circle-progress/circle-progress.min.js"></script>
    <!-- Datamap -->
    <script src="../back end/dashboard/plugins/d3v3/index.js"></script>
    <script src="../back end/dashboard/plugins/topojson/topojson.min.js"></script>
    <script src="../back end/dashboard/plugins/datamaps/datamaps.world.min.js"></script>
    <!-- Morrisjs -->
    <script src="../back end/dashboard/plugins/raphael/raphael.min.js"></script>
    <script src="../back end/dashboard/plugins/morris/morris.min.js"></script>
    <!-- Pignose Calender -->
    <script src="../back end/dashboard/plugins/moment/moment.min.js"></script>
    <script src="../back end/dashboard/plugins/pg-calendar/js/pignose.calendar.min.js"></script>
    <!-- ChartistJS -->
    <script src="../dashboard/plugins/chartist/js/chartist.min.js"></script>
    <script src="../back end/dashboard/plugins/chartist-plugin-tooltips/js/chartist-plugin-tooltip.min.js"></script>
    <script src="../back end/dashboard/js/dashboard/dashboard-1.js"></script>

</body>

</html>