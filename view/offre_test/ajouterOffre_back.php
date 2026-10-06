<?php
include '../controller/OffreC.php';

$error = "";

// create employe
$offre = null;

// create an instance of the controller
$offreC = new OffreC();

if (
    !empty($_POST["id_dom"]) &&
    !empty($_POST["titre"]) &&
    !empty($_POST["description_o"]) &&
    !empty($_POST["type_o"]) &&
    !empty($_POST["idEntreprise"]) &&
    !empty($_POST["lieu"]) &&
    !empty($_POST["date_publication"]) &&
    !empty($_POST["date_limite"]) &&
    !empty($_POST["contact"]) &&
    !empty($_POST["status_o"]) &&
    isset($_POST["envoyer"])
) {
    // Check if date fields are in the correct format
    if (DateTime::createFromFormat('Y-m-d', $_POST['date_publication']) === false || DateTime::createFromFormat('Y-m-d', $_POST['date_limite']) === false) {
        $error = "Invalid date format";
    } else {
        $date_publication = new DateTime($_POST['date_publication']);
        $date_limite = new DateTime($_POST['date_limite']);

        $domaine_informatique = $offreC->getdomaine_informatique($_POST["id_dom"]);
        $offre = new Offre(
            null, // Laisser l'ID être défini automatiquement
            $_POST["id_dom"],
            $_POST["titre"],
            $_POST["description_o"],
            $_POST["type_o"],
            $_POST["idEntreprise"],
            $_POST["lieu"],
            $date_publication,
            $date_limite,
            $_POST["contact"], // Assurez-vous que le contact est un entier
            $_POST["status_o"]
        );

        $offreC->addOffre($offre);
        header('Location:ListeOffres.php');
        exit; // Ajout de l'exit après la redirection
    }
}

$domaineC = new DomaineC();
$ListeDomaines = $domaineC->ListeDomaines();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nouvelle offre</title>
    <!-- Bootstrap CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>

<body style="padding-top: 10px;" , style="padding-bottom: 100px;">
<center>
    <div class="row page-titles mx-0">
      <div class="col-lg-6">
        <div class="card" style="width: 500px;" style = "height:500px;">
          <div class="card-body">
            <h2 class="card-title">Nouvelle offre</h2>
            <form method="POST" action="ajouterOffreTraitement.php">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="domaine_informatique">Domaine Informatique :</label>
                            <input type="text" class="form-control" id="domaine_informatique" name="domaine_informatique" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="titre">Titre :</label>
                            <input type="text" class="form-control" id="titre" name="titre" required>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="description_o">Description :</label>
                    <textarea class="form-control" id="description_o" name="description_o" required></textarea>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="type_o">Type :</label>
                            <input type="text" class="form-control" id="type_o" name="type_o" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="idEntreprise">idEntreprise :</label>
                            <input type="text" class="form-control" id="idEntreprise" name="idEntreprise" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="lieu">Lieu :</label>
                            <input type="text" class="form-control" id="lieu" name="lieu" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="date_publication">Date de publication :</label>
                            <input type="date" class="form-control" id="date_publication" name="date_publication" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="date_limite">Date limite :</label>
                            <input type="date" class="form-control" id="date_limite" name="date_limite" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="contact">Contact :</label>
                            <input type="text" class="form-control" id="contact" name="contact" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                <div class="col-md-6">
                <div class="form-group">
                    <label for="status_o">Status :</label>
                    <input type="text" class="form-control" id="status_o" name="status_o" required>
                </div>
                </div>
                <div class="col-md-6">
                <button type="submit" class="btn btn-primary">Ajouter</button>
                </div>
                </div>
            </form>
        </div>
        </div>
    </div>
</div>
</center>

    <!-- Bootstrap JS -->
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js.map"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>
