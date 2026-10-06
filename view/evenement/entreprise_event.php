<?php
include 'C:/xampp/htdocs/web/controller/EvenementC.php';
$evenementC = new EvenementC();

// Initialisation de $idE à null
$idE = null;

// Vérification si idE est spécifié dans l'URL
if(isset($_GET['idE']) && !empty($_GET['idE'])) {
    // Récupération de l'ID de l'entreprise à partir de l'URL et validation
    $idE = intval($_GET['idE']);
}

// Si idE n'est pas spécifié dans l'URL ou est invalide, vous pouvez définir une valeur par défaut
// ou traiter ce cas selon vos besoins. Par exemple, vous pouvez afficher un message d'erreur ou une liste vide.
if ($idE === null) {
    // Traitement en cas d'absence d'idE, comme afficher un message d'erreur ou une liste vide
    // Par exemple :
    // echo "L'ID de l'entreprise n'est pas spécifié.";
    // ou
    // $list = array();
} else {
    // Si idE est spécifié et valide, vous pouvez procéder à la récupération des événements
    $list = $evenementC->listEvenements();
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
    <div class="container">
        <div class="main-body">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-column align-items-center text-center">
                                <div class="mt-3">
                                    <div class="d-flex justify-content-start">
                                        <?php
                                        // Ajouter le lien vers addEvenement.php avec l'ID de l'entreprise
                                        echo "<a href='addEvenement.php?idE=$idE' class='btn btn-primary' style='font-weight: bold; font-size: 18px; width:200px;'>ajouter Evenement</a>";
                                        ?>
                                    </div>
                                    <!-- Première table -->
                                    <div class="table-container">
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
                                                            <form method="POST" action="updateEvenement.php">
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
                                    
                                    <!-- Fin de la deuxième table -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
   
</body>

</html>
