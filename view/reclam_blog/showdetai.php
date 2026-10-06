<?php
include 'C:/xampp/htdocs/web/controller/RecruteurC.php';
// Instanciation de la classe CategorieevnC
$reclamationC = new reclamationC();

// Vérifier si l'identifiant de la catégorie est défini dans la requête GET
if(isset($_GET['id_reclamation'])) {
   // Get the reclamation ID from the URL
   $id_reclamation = $_GET['id_reclamation'];
   
   // Use the showReclamationDetails() method to get the reclamation details
   try {
       // Call the showReclamationDetails() method from the reclamationC class
       $reclamation = $reclamationC->showReclamationDetails($id_reclamation);

       // Check if any results are returned
       if($reclamation) {
?>
<html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>KHADAMNI - Dashboard</title>
    <!-- Pignose Calender -->
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
        .bodyy {
            background: #f7f7ff;
            margin: 0;
            padding: 0;
            height: 100%;
        }

        .bodyy {
            display: flex;
            align-items: center;
            justify-content: center;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
            transform: scale(0.8); /* Zoom out the entire page */
            transform-origin: center; /* Set the origin of the transformation */
        }

        h4 {
            margin: 5px 0;
            color: #fe3f40;
            font-size: 22px;
            font-weight: 1000;
        }

        .envo {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            width: 48%; /* 48% to leave some space for the gap */
            height: 40px;
            padding: 0 12px;
            margin: 8px 1%; /* 1% margin between buttons */
            color: #fff;
            background: #03a4ed;
            border: none;
            border-radius: 80px;
            box-shadow: 0 3px 6px rgba(0, 0, 0, 0.2);
            cursor: pointer;
            transition: .3s;
        }

        .envo:hover {
            gap: 10px;
            background-color: #fe3f40;
        }

        /* Custom border class */
        .thicker-border {
            border: 5px solid #ced4da;
            border-radius: 10px;
            padding: 16px;
            /*width: 50%;*/ /* Remove fixed width */
            height: 800px;
        }

        /* Custom input field class */
        .custom-input {
            width: 100%;
            height: 40px;
            padding: 0 12px;
            margin: 6px 0;
            color: #333;
            background: #acd7f6f0;
            border: 2px solid #fff;
            border-radius: 6px;
            outline: none;
            box-shadow: 0 0 6px rgba(0, 0, 0, 0.2);
            font-size: 16px;
        }

        .card {
            position: relative;
            display: flex;
            flex-direction: column;
            min-width: 0;
            word-wrap: break-word;
            background-color: #fff;
            background-clip: border-box;
            border: 0 solid transparent;
            border-radius: 1.25rem;
            margin-bottom: 1.5rem;
            box-shadow: 0 2px 6px 0 rgb(218 218 253 / 65%), 0 2px 6px 0 rgb(206 206 238 / 54%);
        }

        .me-2 {
            margin-right: .5rem!important;
        }
            
            .envo {
                font-weight: 500;
                padding: 5px 30px;
                border: none;
                border-radius: 30px;
                background: rgba(255, 255, 255, 0.3);
                color: #0b0b0b;
                box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
                cursor: pointer;
                transition: .1s;
            }
            
            .envo-1 {
                background: #03a4ed;
            }
            
            .envo:hover {
                opacity: 0.85;
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
                                        <li><a href="http://localhost/web/final/back/viewProfil/aff.php"><i class="icon-key"></i> <span>Logout</span></a></li>
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
                    </li>
                    <li class="nav-label">Gestion Blog</li>
                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="icon-menu menu-icon"></i><span class="nav-text">Gestion Blog</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="http://localhost/web/view/entreprise/table.php" aria-expanded="false">Tableaux</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
        <div class="content-body">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="card" style="width: 1000px; left: 10%; top: 2%">
                            <div class="card-body" >
                                <div class="bodyy"style="width: 700px; margin-left:15%">
                                
                                        <div class="mt-3">
                                            <h4 style="font-weight: bold; font-size: 24px;">Votre Réclamation</h4>
                                            <p class="text-secondary mb-1" style="font-weight: bold; font-size: 18px;">Date de Réclamation:<?php echo $reclamation['date']; ?></p>
                                            <p class="text-muted font-size-sm" style="font-weight: bold; font-size: 18px;">Catégorie de la Réclamation: <?php echo $reclamation['categorie_reclamation']; ?></p>
                                            <p class="text-muted font-size-sm" style="font-weight: bold; font-size: 18px;">Votre Explication: <?php echo $reclamation['explication']; ?></p>
                                            <button><a href="addreponse.php">Repondre</a></button>

                                            <div id="responseForm" style="display: none;">
                                                <form id="responseForm" method="POST" action="addreponse.php">
                                                    <!-- Text area for the response message -->
                                                    <textarea name="etat_reponse" placeholder="Votre réponse"></textarea>
                                                    
                                                    <!-- Hidden input for the claim ID -->
                                                    <input type="hidden" id="claimIdInput" name="id_reclamation" value="<?php echo $claimId; ?>">
                                                    
                                                    <!-- Submit button -->
                                                    <button type="submit" style=" display: flex; justify-content: center; gap: 10px; margin-top: 0px;">Envoyer</button>
                                                </form>
                                            </div>

                                        </div>

                                        
                                    </div>
                                    
                                    <hr class="my-4">
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                            <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-globe me-2 icon-inline"><circle cx="12" cy="12" r="10"></circle><line x1="2" y1="12" x2="22" y2="12"></line><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path></svg>Website</h6>
                                            <span class="text-secondary">https://khadamni.com</span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                            <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-twitter me-2 icon-inline text-info"><path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"></path></svg>Twitter</h6>
                                            <span class="text-secondary">@khadamni</span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                            <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-instagram me-2 icon-inline text-danger"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line></svg>Instagram</h6>
                                            <a href="https://www.instagram.com/khadamni/" class="text-secondary">@khadamni</a>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                            <h6 class="mb-0">WhatsApp</h6>
                                            <span class="text-secondary">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-message-square me-2 icon-inline"><path d="M21 2H3c-1.1 0-1.99.9-1.99 2L1 20l4-4h14c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2z"></path></svg>
                                                77852693
                                            </span>
                                        </li>
                                    </ul>
                                    
                                    </div>
                                </div>
                        </div>                        
                    </div>
                </div>
            <!-- #/ container -->
        </div>
        <div class="footer">
            <div class="copyright">
                <p>Copyright &copy; Designed & Developed by KHADEMNI</a> 2024</p>
            </div>
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
    <script src="view/../admin/dashboard/plugins/chartist-plugin-tooltips/js/chartist-plugin-tooltip.min.js"></script>
    <script src="view/../admin/dashboard/js/../admin/dashboard/dashboard-1.js"></script>
    <script>
        function toggleResponseForm() {
            var responseForm = document.getElementById("responseForm");
            if (responseForm.style.display === "none") {
                responseForm.style.display = "block";
            } else {
                responseForm.style.display = "none";
            }
        }
    </script>
</body>
</html>


<?php
       } else {
           // If no reclamation found, display a message
           echo "No reclamation found with this ID.";
       }
   } catch (PDOException $e) {
       // Handle PDOException
       echo "PDOException: " . $e->getMessage();
   } catch (Exception $e) {
       // Handle other exceptions
       echo "Error: " . $e->getMessage();
   }
} else {
   // If reclamation ID is not specified in the URL, display a message
   echo "Reclamation ID is not specified.";
}
?>