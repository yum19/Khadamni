<?php
require_once 'C:\xampp\htdocs\integfy\controller\testC.php';
require_once 'C:\xampp\htdocs\integfy\controller\entretienC.php';


$TestC = new TestC();

$error = "";

if (
    isset($_POST["email_test"]) &&
    isset($_POST["nom_entreprise_test"]) &&
    isset($_POST["domaine_informatique_test"]) &&
    isset($_POST["date_test"])
) {
    if (
        !empty($_POST['email_test']) &&
        !empty($_POST["nom_entreprise_test"]) &&
        !empty($_POST["domaine_informatique_test"]) &&
        !empty($_POST["date_test"])
    ) {
        $user = new User(
            null,
            $_POST['email_test'],
            $_POST['nom_entreprise_test'],
            $_POST['domaine_informatique_test'],
            $_POST['date_test']
        );

        $TestC->addUser($user);

        header('Location: success.php');
        exit;
    } else {
        $error = "Tous les champs doivent être remplis";
    }


    
}



?>
<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="Viewport" content="width=device-width,initial-scale=1">
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
            <svg class="circular" ViewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" />
            </svg>
        </div>
    </div>
    <div id="main-wrapper">   
        <div class="corner-container">
                  <img src="../view/dashboard/images/logoooooo.png" >
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
                                <img src="images/user/1.png" height="40" width="40" alt="">
                            </div>
                            <div class="drop-down dropdown-profile animated fadeIn dropdown-menu">
                                <div class="dropdown-content-body">
                                    <ul>
                                        <li>
                                            <a href="app-profile.html"><i class="icon-user"></i> <span>Profile</span></a>
                                        </li>
                                        <li>
                                            <a href="javascript:void()">
                                                <i class="icon-envelope-open"></i> <span>Inbox</span> <div class="badge gradient-3 badge-pill gradient-1">3</div>
                                            </a>
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
        <div class="nk-sidebar">  
                     
            <div class="nk-nav-scroll">
                <ul class="metismenu" id="menu">
                    <li class="nav-label">Dashboard</li>
                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="icon-speedometer menu-icon"></i><span class="nav-text">Dashboard</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="../view/dashboard/index.html">acceuil</a></li>
                            <!-- <li><a href="./index-2.html">Home 2</a></li> -->
                        </ul>
                    </li>
                    <li class="nav-label">Gestions</li>
                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="icon-menu menu-icon"></i><span class="nav-text">Gestion Utilisateurs</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="../view/dashboard/table-basic.html" aria-expanded="false">Tableau Etudiant</a></li>
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
                    background-color: #fe3f40
                }
                
            </style>
            <div class="register">
            <form action="" method="POST" name="myForm" onsubmit="return validateForm()">
                <div class="form-inputs">
                <div class="input-box">
                        <input type="email" class="input-field" placeholder="Email" name="email_test" required>
                    </div> 
                    <div class="input-box">
                        <input type="text" class="input-field" placeholder="Nom Entreprise" name="nom_entreprise_test" required>
                    </div>
                    <div class="input-box">
                        <select type="text" class="input-field" placeholder="Domaine informatique" name="domaine_informatique_test" required>
                            <option value="" disabled selected hidden> Domaine informatique</option>
                            <option value="web">Développement Web</option>
                            <option value="mobile">Développement Mobile</option>
                            <option value="data">Science des Données</option>
                            <option value="security">Sécurité Informatique</option>
                        </select>
                    </div>
                    <div class="input-box">
                        <input type="date" class="input-field" placeholder="date de test" name="date_test" required>
                    </div>      
                    <div class="input-box">
                        <button type="submit" class="input-submit" >
                            <span>AJOUTER</span>
                            <i class="bx bx-right-arrow-alt"></i>
                        </button>
                    </div>
                </div>
            </form>

                
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
 
    <script>
        function validateForm() {
            var email_test = document.forms["myForm"]["email_test"].value;
            var nom_entreprise_test = document.forms["myForm"]["nom_entreprise_test"].value;
            var domaine_informatique_test = document.forms["myForm"]["domaine_informatique_test"].value;
            var date_test = document.forms["myForm"]["date_test"].value;
             

            if (email_test == "" || nom_entreprise_test == "" || domaine_informatique_test == "" || date_test == "" ) {
                alert("Tous les champs doivent être remplis");
                return false;
            }
            return true;
        }
    </script>

    
</body>

    
</body>