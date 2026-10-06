<?php
// Inclure le fichier contenant la logique du contrôleur EvenementC
include 'C:/xampp/htdocs/web/controller/EvenementC.php';
$evenementC = new EvenementC();
$idE=null;
// Vérifier si l'ID de l'événement est présent dans l'URL
if(isset($_GET['idE'])) {
    // Récupérer l'ID de l'événement depuis l'URL
    $idE = $_GET['idE'];
} 

// Déplacer cette ligne ici
$list = $evenementC->getEvenementsByEntrepriseId($idE);
 
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>profile</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <style type="text/css">
            body {
                background-color:white;
                background-size: cover;
                margin-top: 20px;
            }
            .card {
                position: relative;
                display: flex;
                flex-direction: column;
                min-width: 0;
                
                word-wrap: break-word;
                background-color: #f6f5f5c8;
                background-clip: border-box;
                border: 0 solid transparent;
                border-radius: .25rem;
                margin-bottom: 1.5rem;
                box-shadow: 0 2px 6px 0 rgb(218 218 253 / 65%), 0 2px 6px 0 rgb(206 206 238 / 54%);
            }
            .me-2 {
                margin-right: .5rem!important;
            }
            .btn {
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    gap: 8px;
                    width: 100%;
                    height: 40px;
                    padding: 0 12px;
                    margin: 8px 0;
                    color: #fff;
                    background: #03a4ed;
                    border: none;
                    border-radius: 80px;
                    box-shadow: 0 3px 6px rgba(0, 0, 0, 0.2);
                    cursor: pointer;
                    transition: .3s;
                }

                .btn:hover {
                    gap: 10px;
                    background-color: #fe3f40;
                }

                .btn-delete {
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    width: 100%; /* Adjust width as needed */
                    height: 40px;
                    color: #fff;
                    background: #fe3f40;
                    border: none;
                    border-radius: 80px;
                    box-shadow: 0 3px 6px rgba(0, 0, 0, 0.2);
                    cursor: pointer;
                    transition: background-color 0.3s;
                }
                .btn-delete:hover {
                    background-color: #03a4ed;
                }

        </style>
        <style>
                
                .error-message {
                    left: 0;
                    color: red;
                    font-size: 15px;
                }
        </style>
        <!--HEADER-->
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

        <title>Khadamni</title>

        <!-- Bootstrap core CSS -->
        <link href="../entreprise/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

        <!-- Additional CSS Files -->
        <link rel="stylesheet" href="../entreprise/assets/css/templatemo-space-dynamic.css">
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
                        <ul class="nav">
                        <li class="scroll-to-section"><a href="http://localhost/web/view/entreprise/index.php" class="active">Acceuil</a></li>
                        <li class="scroll-to-section"><a href="profilentreprise.php?idE=<?php echo $idE; ?>">Evenement</a></li>
                        <li class="scroll-to-section"><a href="#services">Offres&demandes</a></li>
                        <li class="scroll-to-section"><a href="#portfolio">Entretien</a></li>
                        <li class="scroll-to-section"><a href="#blog">Blog</a></li> 
                        <li class="scroll-to-section"><a href="#contact">Reclamation</a></li>
                        <li class="scroll-to-section"><a href="#contact"></a></li>

                        </ul>        
                        <a class='menu-trigger'>
                            <span>Menu</span>
                        </a>
                    </nav>
                    </div>
                </div>
                </div>
        </header>
        <div class="main-banner wow fadeIn" id="top" data-wow-duration="1s" data-wow-delay="0.5s">
            <div class="container">
               <div class="main-body">
                  <div class="row">
                        <div class="col-lg-4">
                            <div class="card">
                                <div class="card-body">
                                    
                                    <div class="d-flex flex-column align-items-center text-center">
                                        <img src="https://bootdey.com/img/Content/avatar/avatar6.png" alt="Admin" class="rounded-circle p-1 bg-primary" width="110">

                                    </div>
                                    <hr class="my-4">
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                            <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-globe me-2 icon-inline"><circle cx="12" cy="12" r="10"></circle><line x1="2" y1="12" x2="22" y2="12"></line><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path></svg>Website</h6>
                                            <span class="text-secondary">https://bootdey.com</span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                            <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-github me-2 icon-inline"><path d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22"></path></svg>Github</h6>
                                            <span class="text-secondary">bootdey</span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                            <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-twitter me-2 icon-inline text-info"><path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"></path></svg>Twitter</h6>
                                            <span class="text-secondary">@bootdey</span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                            <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-instagram me-2 icon-inline text-danger"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line></svg>Instagram</h6>
                                            <span class="text-secondary">bootdey</span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                            <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-facebook me-2 icon-inline text-primary"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path></svg>Facebook</h6>
                                            <span class="text-secondary">bootdey</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    <div class="col-lg-8" >
                        <div class="card">
                            <div class="card-body">
                                <div class="mt-3">
                                    <div class="d-flex justify-content-start">
                                        <?php
                                        echo "<a href='addEvenement.php?idE=$idE' class='btn btn-primary' style='font-weight: bold; font-size: 18px; width:300px;'>ajouter Evenement</a>";
                                        ?>
                                        <!-- Ajout du bouton pour afficher la liste des événements -->
                                        <a href="#" class="btn btn-primary" onclick="afficherListeEvenements()" style="font-weight: bold; font-size: 18px; width: 300px;">Liste des événements</a>
                                        <!-- Ajout du bouton pour afficher la liste des participations -->
                                        <a href="#" class="btn btn-primary" onclick="afficherListeParticipations()" style="font-weight: bold; font-size: 18px; width: 300px;">Liste des participations</a>
                                    </div>
                                    <!-- Première table -->
                                    <div class="table-container" id="tableEvenements" style="display: none;">
                                        <table class="table table-bordered table-striped verticle-middle" style="width: 100%;">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Identifiant Evenement</th>
                                                    <th scope="col">Nom Evenement</th>
                                                    <th scope="col">Adresse Evenement</th>
                                                    <th scope="col">Date d'Evenement</th>
                                                    <th scope="col">catégorie Evenement</th>
                                                    <th scope="col">modifier</th>
                                                    <th scope="col">supprimer</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                foreach ($list as $Evenement) {
                                                ?>
                                                    <tr>
                                                        <td><?php echo $Evenement['idEvenement']; ?></td>
                                                        <td><?php echo $Evenement['nomEvenement']; ?></td>
                                                        <td><?php echo $Evenement['adresseEVN']; ?></td>
                                                        <td><?php echo $Evenement['dateEVN']; ?></td>
                                                        <td><?php echo $Evenement['idCategorieEVN']; ?></td>
                                                        <td>
                                                            <form method="POST" action="update_front.php">
                                                                <input type="hidden" value="<?php echo $Evenement['idEvenement']; ?>" name="idEvenement">
                                                                <div class="d-flex justify-content-start">
                                                                    <button type="submit" class="btn btn-primary" style="font-weight: bold; font-size: 18px;" name="update">modifier</button>
                                                                </div>
                                                            </form>
                                                        </td>
                                                        <td>
                                                            <form method="POST" action="deleteEvenement.php">
                                                                <input type="hidden" value="<?php echo $Evenement['idEvenement']; ?>" name="idEvenement">
                                                                <div class="d-flex justify-content-start">
                                                                    <button type="submit" class="btn btn-primary" style="font-weight: bold; font-size: 18px;" name="delete">annuler</button>
                                                                </div>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                <?php
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- Fin de la première table -->

                                    <!-- Deuxième table -->
                                    <div class="table-container" id="tableParticipations" style="display: none;">
                                        <iframe src="part_event.php?idE=<?php echo $idE; ?>" frameborder="0" scrolling="yes" width="100%" height="500"></iframe>
                                    </div>
                                    <!-- Fin de la deuxième table -->
                                </div>
                            </div>
                        </div>
                    </div>
                        </div>
                    </div>
                </div>
                    <div class="table-container" id="tableParticipations" style="display: none;">
                        <iframe src="part_event.php?idE=<?php echo $idE; ?>" frameborder="0" scrolling="yes" width="100%" height="1200"></iframe>
                    </div>
                    <?php
                        // Display success or error messages
                        if (!empty($success_message)) {
                            echo '<div class="alert alert-success">' . $success_message . '</div>';
                        }
                        if (!empty($error)) {
                            echo '<div class="alert alert-danger">' . $error . '</div>';
                        }
                    ?>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="d-flex align-items-center mb-3">Project Status</h5>
                                <p>Web Design</p>
                                <div class="progress mb-3" style="height: 5px">
                                    <div class="progress-bar bg-primary" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <p>Website Markup</p>
                                <div class="progress mb-3" style="height: 5px">
                                    <div class="progress-bar bg-danger" role="progressbar" style="width: 72%" aria-valuenow="72" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <p>One Page</p>
                                <div class="progress mb-3" style="height: 5px">
                                    <div class="progress-bar bg-success" role="progressbar" style="width: 89%" aria-valuenow="89" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <p>Mobile Template</p>
                                <div class="progress mb-3" style="height: 5px">
                                    <div class="progress-bar bg-warning" role="progressbar" style="width: 55%" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <p>Backend API</p>
                                <div class="progress" style="height: 5px">
                                    <div class="progress-bar bg-info" role="progressbar" style="width: 66%" aria-valuenow="66" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
        <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.bundle.min.js"></script>
        <script>
                function afficherListeEvenements() {
                    document.getElementById('tableEvenements').style.display = 'block';
                    document.getElementById('tableParticipations').style.display = 'none';
                }

                function afficherListeParticipations() {
                    document.getElementById('tableEvenements').style.display = 'none';
                    document.getElementById('tableParticipations').style.display = 'block';
                }
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
