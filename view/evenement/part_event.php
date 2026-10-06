<?php
include 'C:/xampp/htdocs/web/controller/ParticipationC.php';

$idEvenement = null;
$idEntreprise = null; // Nouvelle variable pour l'id de l'entreprise

// Vérifier si un id d'entreprise est spécifié dans l'URL
if(isset($_GET['idE']) && !empty($_GET['idE'])) {
    // Récupérer et valider l'ID de l'entreprise
    $idEntreprise = intval($_GET['idE']);
}

$participationC = new ParticipationC();

// Utiliser la méthode pour récupérer les participations par ID d'entreprise
if ($idEntreprise !== null) { 
    $list = $participationC->getParticipationsByIdEntreprise($idEntreprise);
} else {
    // Si aucun id d'entreprise n'est spécifié ou si l'ID est invalide, afficher un message d'erreur ou une liste vide
    $list = array(); // Liste vide ou message d'erreur selon le cas
}
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
        width: 100%; /* Augmentation de la largeur */
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
        width: 100%; /* Ajustement de la largeur */
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
    /* Modificatiosn pour l'alerte */
    .alert {
        max-width:200px; /* Définir la largeur maximale souhaitée */
        background-color: #f6f5f5c8;
        border: 1px solid #007bff;
        border-radius: .25rem;
        box-shadow: 0 2px 6px 0 rgb(218 218 253 / 65%), 0 2px 6px 0 rgb(206 206 238 / 54%);
        color: black;
    }
</style>
</head>
<body>
<div class="container-xl"> <!-- Augmentation de la taille du container -->
    <div class="main-body">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex flex-column align-items-center text-center">
                            <div class="mt-3">
                                <div class="d-flex justify-content-start">
                                    <h5 class="card-title">Liste de participants</h5> <!-- Diminution de la taille du titre -->
                                    <!-- Barre de recherche -->
                                    <form id="searchForm">
                                        <input type="text" id="searchInput" placeholder="Rechercher par événement" style="width: 300px;"> <!-- Augmentation de la largeur du champ de texte -->
                                        <button type="submit" class='btn btn-primary' style='font-weight: bold; font-size: 18px;'>Rechercher</button>
                                    </form>
                                </div>
                                <div class="table-container">
                                    <table class="table table-bordered table-striped verticle-middle" style="width: 100%;">
                                        <thead>
                                            <tr>
                                                <th scope="col">Identifiant de Participation</th>
                                                <th scope="col">Nom d'événement</th>
                                                <th scope="col">Nom du participant</th>
                                                <th scope="col">Prénom du participant</th>
                                                <th scope="col">Identifiant de Participant</th>
                                                <th scope="col">Téléphone</th>
                                                <th scope="col">Âge</th>
                                                <th scope="col">Email</th>
                                            </tr>
                                        </thead>
                                        <tbody id="participantTable">
                                            <?php
                                            foreach ($list as $Participation) {
                                                ?>
                                                <tr>
                                                    <td><?php echo $Participation['idParticipation']; ?></td>
                                                    <td><?php echo $Participation['nomEvenement']; ?></td>
                                                    <td><?php echo $Participation['nomE']; ?></td>
                                                    <td><?php echo $Participation['prenomE']; ?></td>
                                                    <td><?php echo $Participation['idEtudiant']; ?></td>
                                                    <td><?php echo $Participation['telephoneE']; ?></td>
                                                    <td><?php echo $Participation['age']; ?></td>
                                                    <td><?php echo $Participation['emailE']; ?></td>
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
            </div>
        </div>
    </div>
</div>

<script src="../assets/plugins/common/common.min.js"></script>
<script src="../assets/js/custom.min.js"></script>
<script src="../assets/js/settings.js"></script>
<script src="../assets/js/gleek.js"></script>
<script src="../assets/js/styleSwitcher.js"></script>
<!-- Assurez-vous que le code JavaScript est placé à la fin du corps du document -->
<script>
    document.getElementById('searchForm').addEventListener('submit', function(event) {
        event.preventDefault();
        let searchTerm = document.getElementById('searchInput').value.trim().toLowerCase();
        let rows = document.getElementById('participantTable').getElementsByTagName('tr');
        for (let row of rows) {
            let cells = row.getElementsByTagName('td');
            // Comparer le nom de l'événement (deuxième colonne)
            if (cells.length > 1 && cells[1].textContent.trim().toLowerCase() === searchTerm) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        }
    });
</script>
</body>
</html>

