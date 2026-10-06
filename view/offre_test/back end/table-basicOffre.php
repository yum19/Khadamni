<?php
require_once 'C:\xampp\htdocs\web\controller\OffreC.php';
require_once 'C:\xampp\htdocs\web\controller\DemandeC.php';
require_once 'C:\xampp\htdocs\web\controller\DomaineC.php';
$offreC = new OffreC();
$liste_offres = $offreC->ListeOffres();

$demandeC = new DemandeC();
$liste_demandes = $demandeC->ListeDemandes();

$domaineC = new DomaineC();
$liste = $domaineC->ListeDomaines();

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

            <!-- Offres -->
            <bodyy style="padding-top: 50px;">
                <div class="row page-titles mx-0">
                  <div class="col-lg-6">
                    <div class="card" style="width: 1200px;">
                      <div class="card-body">
                        <h4 class="card-title">Table Offres</h4>
                        <div style="padding-left: 950px;">
                        <a href="addOffreBack.php" class="btn btn-success mb-2">Ajouter une nouvelle offre</a>
                        </div>
                        <div class="table-responsive">
                          <table class="table table-bordered verticle-middle">
                            <thead>
                              <tr>
                                <th scope="col">id_o</th>
                                <th scope="col">id_dom</th>
                                <th scope="col">titre</th>
                                <th scope="col">description_o</th>
                                <th scope="col">type</th>
                                <th scope="col">idEntreprise</th>
                                <th scope="col">lieu</th>
                                <th scope="col">date_publication</th>
                                <th scope="col">date_limite</th>
                                <th scope="col">contact</th>
                                <th scope="col">status_o</th>
                                <th scope="col">Action</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php
                              foreach ($liste_offres as $offre) {
                              ?>
                                <tr>
                                  <td><?php echo $offre['id_o']; ?></td>
                                  <td><?php echo $offre['id_dom']; ?></td>
                                  <td><?php echo $offre['titre']; ?></td>
                                  <td><?php echo $offre['description_o']; ?></td>
                                  <td><?php echo $offre['type_o']; ?></td>
                                  <td><?php echo $offre['idE']; ?></td>
                                  <td><?php echo $offre['lieu']; ?></td>
                                  <td><?php echo $offre['date_publication']; ?></td>
                                  <td><?php echo $offre['date_limite']; ?></td>
                                  <td><?php echo $offre['contact']; ?></td>
                                  <td><?php echo $offre['status_o']; ?></td>
                                  <td>
                                    <form method="POST" action="../updateOffre.php">
                                      <input type="hidden" value="<?php echo $offre['id_o']; ?>" name="id_o">
                                      <button type="submit" class="btn btn-primary" name="update"><i class="fa fa-pencil"></i></button>
                                    </form>
                                  </td>
                                  <td>
                                    <form method="POST" action="../deleteOffre_front.php">
                                      <input type="hidden" value="<?php echo $offre['id_o']; ?>" name="id_o">
                                      <button type="submit" class="btn btn-danger" name="delete"><i class="fa fa-trash"></i></button>
                                    </form>
                                  </td>
                                </tr>
                              <?php
                              }
                              ?>
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
            </bodyy>

            <!-- Demandes -->
            <bodyy style="padding-top: 100px;">
                <div class="row page-titles mx-0">
                  <div class="col-lg-6">
                    <div class="card" style="width: 1200px;">
                      <div class="card-body">
                        <h4 class="card-title">Table Demandes</h4>
                        <div class="table-responsive">
                          <table class="table table-bordered verticle-middle">
                            <thead>
                              <tr>
                                <th scope="col">id_d</th>
                                <th scope="col">idEtudiant</th>
                                <th scope="col">nom_d</th>
                                <th scope="col">prenom_d</th>
                                <th scope="col">email_d</th>
                                <th scope="col">telephone_d</th>
                                <th scope="col">cv_d</th>
                                <th scope="col">lettre_motivation</th>
                                <th scope="col">id_o</th>
                                <th scope="col">date_d</th>
                                <th scope="col">status_d</th>
                                <th scope="col">Action</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php
                              foreach ($liste_demandes as $demande) {
                              ?>
                                <tr>
                                  <td><?php echo $demande['id_d']; ?></td>
                                  <td><?php echo $demande['idEtudiant']; ?></td>
                                  <td><?php echo $demande['nom_d']; ?></td>
                                  <td><?php echo $demande['prenom_d']; ?></td>
                                  <td><?php echo $demande['email_d']; ?></td>
                                  <td><?php echo $demande['telephone_d']; ?></td>
                                  <td><?php echo $demande['cv_d']; ?></td>
                                  <td><?php echo $demande['lettre_motivation']; ?></td>
                                  <td><?php echo $demande['id_o']; ?></td>
                                  <td><?php echo $demande['date_d']; ?></td>
                                  <td><?php echo $demande['status_d']; ?></td>
                                  <td>
                                    <form method="POST" action="../updateDemande.php">
                                      <input type="hidden" value="<?php echo $demande['id_d']; ?>" name="id_d">
                                      <button type="submit" class="btn btn-primary" name="update"><i class="fa fa-pencil"></i></button>
                                    </form>
                                  </td>
                                  <td>
                                    <form method="POST" action="../deleteDemande_front.php">
                                      <input type="hidden" value="<?php echo $demande['id_d']; ?>" name="id_d">
                                      <button type="submit" class="btn btn-danger" name="delete"><i class="fa fa-trash"></i></button>
                                    </form>
                                  </td>
                                </tr>
                              <?php
                              }
                              ?>
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
            </bodyy>

            <!-- domaine -->

            <bodyy style="padding-top: 100px;">
                <div class="row page-titles mx-0">
                  <div class="col-lg-6">
                    <div class="card" style="width: 1200px;">
                      <div class="card-body">
                        <h4 class="card-title">Table Domaine</h4>
                        <div class="table-responsive">
                          <table class="table table-bordered verticle-middle">
                            <thead>
                              <tr>
                                <th scope="col">id_dom</th>
                                <th scope="col">domaine_informatique</th>
                                <th scope="col">Action</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php
                              foreach ($liste as $domaine) {
                              ?>
                                <tr>
                                  <td><?php echo $domaine['id_dom']; ?></td>
                                  <td><?php echo $domaine['domaine_informatique']; ?></td>

                                  
                                  <td>
                                    <form method="POST" action="../deleteDomaine.php">
                                      <input type="hidden" value="<?php echo $domaine['id_dom']; ?>" name="id_dom">
                                      <button type="submit" class="btn btn-danger" name="delete"><i class="fa fa-trash"></i></button>
                                    </form>
                                  </td>
                                </tr>
                              <?php
                              }
                              ?>
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                    
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

            </bodyy>
            </div>

<div class="footer">
    <div class="copyright">
        <p>Copyright &copy; Designed & Developed by KHADEMNI</a> 2024</p>
    </div>
</div>
</div>
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

