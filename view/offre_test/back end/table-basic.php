<?php
require_once 'C:\xampp\htdocs\web\controller\testC.php';
require_once 'C:\xampp\htdocs\web\controller\entretienC.php';

$TestC = new TestC();
$users = $TestC->listUsers();

$TestC2 = new TestC2();
$users2 = $TestC2->listUsers2();

if ($users || $users2)  {


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
                  <img src="dashboard/images/logoooooo.png" >
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
        <!--**********************************
            Nav header end
        ***********************************-->

        <!--**********************************
            Header start
        ***********************************-->
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
                        <div class="drop-down   d-md-none">
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
                                <span class="badge gradient-1 badge-pill badge-primary">3</span>
                            </a>
                            <div class="drop-down animated fadeIn dropdown-menu">
                                <div class="dropdown-content-heading d-flex justify-content-between">
                                    <span class="">3 New Messages</span>  
                                    
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
                                        <li class="notification-unread">
                                            <a href="javascript:void()">
                                                <img class="float-left mr-3 avatar-img" src="images/avatar/2.jpg" alt="">
                                                <div class="notification-content">
                                                    <div class="notification-heading">Adam Smith</div>
                                                    <div class="notification-timestamp">08 Hours ago</div>
                                                    <div class="notification-text">Can you do me a favour?</div>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void()">
                                                <img class="float-left mr-3 avatar-img" src="images/avatar/3.jpg" alt="">
                                                <div class="notification-content">
                                                    <div class="notification-heading">Barak Obama</div>
                                                    <div class="notification-timestamp">08 Hours ago</div>
                                                    <div class="notification-text">Hi Teddy, Just wanted to let you ...</div>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void()">
                                                <img class="float-left mr-3 avatar-img" src="images/avatar/4.jpg" alt="">
                                                <div class="notification-content">
                                                    <div class="notification-heading">Hilari Clinton</div>
                                                    <div class="notification-timestamp">08 Hours ago</div>
                                                    <div class="notification-text">Hello</div>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                    
                                </div>
                            </div>
                        </li>
                        <li class="icons dropdown"><a href="javascript:void(0)" data-toggle="dropdown">
                                <i class="mdi mdi-bell-outline"></i>
                                <span class="badge badge-pill gradient-2 badge-primary">3</span>
                            </a>
                            <div class="drop-down animated fadeIn dropdown-menu dropdown-notfication">
                                <div class="dropdown-content-heading d-flex justify-content-between">
                                    <span class="">2 New Notifications</span>  
                                    
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
                                                    <h6 class="notification-heading">Event Started</h6>
                                                    <span class="notification-text">One hour ago</span> 
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void()">
                                                <span class="mr-3 avatar-icon bg-success-lighten-2"><i class="icon-present"></i></span>
                                                <div class="notification-content">
                                                    <h6 class="notification-heading">Event Ended Successfully</h6>
                                                    <span class="notification-text">One hour ago</span>
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
                        <li class="icons dropdown d-none d-md-flex">
                            <a href="javascript:void(0)" class="log-user"  data-toggle="dropdown">
                                <span>English</span>  <i class="fa fa-angle-down f-s-14" aria-hidden="true"></i>
                            </a>
                            <div class="drop-down dropdown-language animated fadeIn  dropdown-menu">
                                <div class="dropdown-content-body">
                                    <ul>
                                        <li><a href="javascript:void()">English</a></li>
                                        <li><a href="javascript:void()">Dutch</a></li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                        <li class="icons dropdown">
                            <div class="user-img c-pointer position-relative"   data-toggle="dropdown">
                                <span class="activity active"></span>
                                <img src="https://bootdey.com/img/Content/avatar/avatar6.png" height="40" width="40" alt="">
                            </div>
                            <div class="drop-down dropdown-profile   dropdown-menu">
                                <div class="dropdown-content-body">
                                    <ul>
                                        <li>
                                            <a href="app-profile.html"><i class="icon-user"></i> <span>Profile</span></a>
                                        </li>
                                        <li>
                                            <a href="email-inbox.html"><i class="icon-envelope-open"></i> <span>Inbox</span> <div class="badge gradient-3 badge-pill badge-primary">3</div></a>
                                        </li>
                                        
                                        <hr class="my-2">
                                        <li>
                                            <a href="page-lock.html"><i class="icon-lock"></i> <span>Lock Screen</span></a>
                                        </li>
                                        <li><a href="page-login.html"><i class="icon-key"></i> <span>Logout</span></a></li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
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
            <li class="breadcrumb-item active"><a href="javascript:void(0)">Home</a></li>
        </ol>
    </div>
</div>
            <!-- row -->

            <div class="col-lg-6">
                <div class="card">
    <div class="card-body">
        <div class="card-title">
            <h4>Table de Test</h4>
            <!-- Bouton "Ajouter" 
            <a href="../view/adduser.php" class="btn btn-primary btn-md btn-icon float-right">
                Ajouter
                <i class="now-ui-icons ui-1_simple-add"></i>
            </a>-->
        </div>
        
        
        <input type="search" class="form-control" id="search2" placeholder="rechercher.....">
        <div id="error2"></div>

        <div class="table-responsive">
            <table class="table table-hover" id="userTable2">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Email</th>
                        <th>Entreprise</th>
                        <th>Domaine Informatique</th>
                        <th>Date De Test</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($users as $user) : ?>
                    <tr>
                        <td class="text-center"><?= isset($user['id_test']) ? $user['id_test'] : ''; ?></td>
                        <td><?= isset($user['email_test']) ? $user['email_test'] : ''; ?></td>
                        <td><?= isset($user['nom_entreprise_test']) ? $user['nom_entreprise_test'] : ''; ?></td>
                        <td><?= isset($user['domaine_informatique_test']) ? $user['domaine_informatique_test'] : ''; ?></td>
                        <td><?= isset($user['date_test']) ? $user['date_test'] : ''; ?></td>
                        <td class="td-actions text-right">
                            <!-- Bouton "Modifier" -->
                            <form id="update_form_<?php echo $user['id_test']; ?>" method="POST" action="./updateuser.php">
                                <input type="hidden" name="id_test" value="<?php echo isset($user['id_test']) ? $user['id_test'] : ''; ?>">
                                <button type="submit" name="modifier" class="btn btn-success btn-md btn-icon">
                                    Modifier
                                    <i class="now-ui-icons ui-2_settings-90"></i>
                                </button>
                            </form>
                            <!-- Bouton "Supprimer" -->
                            <a href="./deleteuser.php?id_test=<?php echo isset($user['id_test']) ? $user['id_test'] : ''; ?>" class="btn btn-danger btn-md btn-icon">
                                Supprimer
                                <i class="now-ui-icons ui-1_simple-remove"></i>
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
<script>

function showtable2(curarray) {
    var tableBody = document.getElementById("userTable2").getElementsByTagName('tbody')[0];
    tableBody.innerHTML = '';

    if (curarray.length === 0) {
        document.getElementById("error2").innerHTML = `<span class='text-danger'>Aucun résultat trouvé !</span>`;
    } else {
        document.getElementById("error2").innerHTML = "";

        for (var i = 0; i < curarray.length; i++) {
            var newRow = tableBody.insertRow(tableBody.rows.length);
            newRow.innerHTML = `
                <td>${curarray[i].id_test}</td>
                <td>${curarray[i].email_test}</td>
                <td>${curarray[i].nom_entreprise_test}</td>
                <td>${curarray[i].domaine_informatique_test}</td>
                <td>${curarray[i].date_test}</td>
                <td>
                    <form id="update_form_${curarray[i].id_test}" method="POST" action="updateuser.php">
                        <input type="hidden" name="id_test" value="${curarray[i].id_test}">
                        <button type="submit" name="modifier" class="btn btn-success btn-md btn-icon">
                            Modifier
                            <i class="now-ui-icons ui-2_settings-90"></i>
                        </button>
                    </form>
                    <a href="deleteuser.php?id_test=${curarray[i].id_test}" class="btn btn-danger btn-md btn-icon">
                        Supprimer
                        <i class="now-ui-icons ui-1_simple-remove"></i>
                    </a>
                </td>
            `;
        }
    }
}

document.getElementById("search2").addEventListener("keyup", function () {
    var search = this.value.toLowerCase();

    var filteredArray = <?php echo json_encode($users); ?>.filter(function (user) {
        return Object.values(user).some(val => val.toString().toLowerCase().includes(search));
    });

    showtable2(filteredArray);
});
</script>

<div class="col-lg-6">
    <div class="card">
        <div class="card-body">
            <div class="card-title">
                <h4>Table d'entretien</h4>
                <!-- Bouton "Ajouter" -->
                <!-- Bouton "Ajouter" 
                <a href="../view/addentretien.php" class="btn btn-primary btn-md btn-icon float-right">
                    Ajouter
                    <i class="now-ui-icons ui-1_simple-add"></i>
                </a>-->
            </div>
            <input type="search" class="form-control" id="search" placeholder="rechercher.....">
            <div id="error"></div>

            <div class="table-responsive">
                <table class="table table-hover" id="userTable">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Id_test</th>
                            <th>Email</th>
                            <th>Nom</th>
                            <th>Prenom</th>
                            <th>Entreprise</th>
                            <th>Date D'entretien</th>
                            <th>Type D'entretien</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($users2 as $user2) : ?>
                            <tr>
                                <td class="text-center"><?= isset($user2['id_entre']) ? $user2['id_entre'] : ''; ?></td>
                                <td><?= isset($user2['id_test']) ? $user2['id_test'] : ''; ?></td>
                                <td><?= isset($user2['email_test']) ? $user2['email_test'] : ''; ?></td>
                                <td><?= isset($user2['nom_entre']) ? $user2['nom_entre'] : ''; ?></td>
                                <td><?= isset($user2['prenom_entre']) ? $user2['prenom_entre'] : ''; ?></td>
                                <td><?= isset($user2['nom_entreprise_test']) ? $user2['nom_entreprise_test'] : ''; ?></td>
                                <td><?= isset($user2['date_entre']) ? $user2['date_entre'] : ''; ?></td>
                                <td><?= isset($user2['type_entre']) ? $user2['type_entre'] : ''; ?></td>
                                <td class="td-actions text-right">
                                    <!-- Bouton "Modifier" -->
                                    <form id="update_form" method="POST" action="updateentretien.php">
                                        <input type="hidden" name="id_entre" value="<?= isset($user2['id_entre']) ? $user2['id_entre'] : ''; ?>">
                                        <button type="submit" name="modifier" class="btn btn-success btn-md btn-icon">
                                            Modifier
                                            <i class="now-ui-icons ui-2_settings-90"></i>
                                        </button>
                                    </form>
                                    <!-- Bouton "Supprimer" -->
                                    <a href="deleteentretien.php?id_test=<?= isset($user2['id_entre']) ? $user2['id_entre'] : ''; ?>" class="btn btn-danger btn-md btn-icon">
                                        Supprimer
                                        <i class="now-ui-icons ui-1_simple-remove"></i>
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
<script>

function showtable(curarray) {
    var tableBody = document.getElementById("userTable").getElementsByTagName('tbody')[0];
    tableBody.innerHTML = '';

    if (curarray.length === 0) {
        document.getElementById("error").innerHTML = `<span class='text-danger'>Aucun résultat trouvé !</span>`;
    } else {
        document.getElementById("error").innerHTML = "";

        for (var i = 0; i < curarray.length; i++) {
            var newRow = tableBody.insertRow(tableBody.rows.length);
            newRow.innerHTML = `
                <td>${curarray[i].id_entre}</td>
                <td>${curarray[i].id_test}</td>
                <td>${curarray[i].email_test}</td>
                <td>${curarray[i].nom_entre}</td>
                <td>${curarray[i].prenom_entre}</td>
                <td>${curarray[i].nom_entreprise_test}</td>
                <td>${curarray[i].date_entre}</td>
                <td>${curarray[i].type_entre}</td>
                <td>
                    <form id="update_form" method="POST" action="../view/updateentretien.php">
                        <input type="hidden" name="id_entre" value="${curarray[i].id_entre}">
                        <button type="submit" name="modifier" class="btn btn-success btn-md btn-icon">
                            Modifier
                            <i class="now-ui-icons ui-2_settings-90"></i>
                        </button>
                    </form>
                    <a href="../view/deleteentretien.php?id_test=${curarray[i].id_entre}" class="btn btn-danger btn-md btn-icon">
                        Supprimer
                        <i class="now-ui-icons ui-1_simple-remove"></i>
                    </a>
                </td>
            `;
        }
    }
}

document.getElementById("search").addEventListener("keyup", function () {
    var search = this.value.toLowerCase();

    var filteredArray = <?php echo json_encode($users2); ?>.filter(function (user) {
        return Object.values(user).some(val => val.toString().toLowerCase().includes(search));
    });

    showtable(filteredArray);
});
</script>
       
        
        <div class="footer">
            <div class="copyright">
            <p>Copyright &copy; Designed & Developed by KHADAMNI</a> 2024</p>
            </div>
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

</body>

</html>
<?php
} else {
    echo "<center><h2>Aucun utilisateur trouvé.</h2></center>";
}
?>