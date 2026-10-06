<?php

include '../controller/offreC.php';

$error = "";

// create offre
$offre = null;

// create an instance of the controller
$offreC = new OffreC();
if (
    isset($_POST["id_o"]) &&
    isset($_POST["id_dom"]) &&
    isset($_POST["titre"]) &&
    isset($_POST["description_o"]) &&
    isset($_POST["type_o"]) &&
    isset($_POST["idEntreprise"]) &&
    isset($_POST["lieu"]) &&
    isset($_POST["date_publication"]) &&
    isset($_POST["date_limite"]) &&
    isset($_POST["contact"]) &&
    isset($_POST["status_o"])
) {
    if (
        !empty($_POST["id_o"]) &&
        !empty($_POST["id_dom"]) &&
        !empty($_POST["titre"]) &&
        !empty($_POST["description_o"]) &&
        !empty($_POST["type_o"]) &&
        !empty($_POST["idEntreprise"]) &&
        !empty($_POST["lieu"]) &&
        !empty($_POST["date_publication"]) &&
        !empty($_POST["date_limite"]) &&
        !empty($_POST["contact"]) &&
        !empty($_POST["status_o"])
    ) {
        $offre = new Offre(
            $_POST["id_o"],
            $_POST["id_dom"],
            $_POST["titre"],
            $_POST["description_o"],
            $_POST["type_o"],
            $_POST["idEntreprise"],
            $_POST["lieu"],
            new DateTime($_POST["date_publication"]),
            new DateTime($_POST["date_limite"]),
            $_POST["contact"],
            $_POST["status_o"]
        );
        $offreC->updateOffre($offre, $_POST["id_o"]);
        header('http://localhost/integfy/view/back%20end/table-basicOffre.php');
    } else {
        $error = "Missing information";
    }
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>offre demande Display</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .container {
            width: 100%;
            margin: auto;
            padding: 20px;
        }

        h1 {
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }

        input[type="text"],
        input[type="tel"],
        input[type="date"],
        input[type="submit"] {
            width: 45%; /* Réduit la largeur pour deux éléments par ligne */
            padding: 8px;
            box-sizing: border-box;
            margin-bottom: 10px;
        }

        input[type="submit"] {
            width: 100%; /* Pleine largeur pour le bouton */
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        button {
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <button><a href="http://localhost/integfy/view/back%20end/table-basicOffre.php">Retour à la liste</a></button>
    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>

    <?php
   if (isset($_POST['update'])) {
        $offre = $offreC->showOffre($_POST['id_o']);

    ?>
        <form action="" method="POST">
                <table>
                    <tr>
                        <th>Champ</th>
                        <th>Valeur</th>
                    </tr>
                    <tr>
                            
                        <td> <label for="id_o">Id offre:</label></td>
                        <td><input type="hidden" name="id_o" value="<?php echo $offre['id_o']; ?>"><?php echo $offre['id_o']; ?> </td>
                    </td>
                        <td><label for="id_dom">Domaine Informatique:</label></td>
                        <td><input type="text" name="id_dom" id="id_dom" value="<?php echo $offre['id_dom']; ?>" maxlength="100"></td>
                    </tr>
                    <tr>
                        <td><label for="titre">Titre:</label></td>
                        <td><input type="text" name="titre" id="titre" value="<?php echo $offre['titre']; ?>" maxlength="255"></td>
                   
                        <td><label for="description_o">Description:</label></td>
                        <td><input type="text" name="description_o" id="description_o" value="<?php echo $offre['description_o']; ?>" maxlength="255"></td>
                    </tr>
                    <tr>
                        <td><label for="type_o">Type:</label></td>
                        <td><input type="text" name="type_o" id="type_o" value="<?php echo $offre['type_o']; ?>" maxlength="255"></td>
                    
                        <td><label for="idEntreprise">idEntreprise:</label></td>
                        <td><input type="text" name="idEntreprise" id="idEntreprise" value="<?php echo $offre['idEntreprise']; ?>" maxlength="255"></td>
                    </tr>
                    <tr>
                    <td>
                        <label for="lieu">Lieu:</label>
                    </td>
                    <td><input type="text" name="lieu" id="lieu" value="<?php echo $offre['lieu']; ?>" maxlength="255"></td>    


                    <td>
                        <label for="date_publication">Date Publication:</label>
                    </td>
                    <td>
                        <input type="date" name="date_publication" id="date_publication" value="<?php echo $offre['date_publication']; ?>">
                    </td>
                    </tr>
                    <tr>
                    <td>
                        <label for="date_limite">Date Limite:</label>
                    </td>
                    <td>
                        <input type="date" name="date_limite" id="date_limite" value="<?php echo $offre['date_limite']; ?>">
                    </td>
                    
                    <td>
                        <label for="contact">Contact:</label>
                    </td>
                    <td><input type="text" name="contact" id="contact" value="<?php echo $offre['contact']; ?>" maxlength="255"></td>
                    </tr>
                    <tr>
                    <td>
                        <label for="status_o">Status:</label>
                    </td>
                    <td><input type="text" name="status_o" id="status_o" value="<?php echo $offre['status_o']; ?>" maxlength="255"></td>

                        <td colspan="2" align="center">
                            <input type="submit" name="update" value="Update">
                        </td>
                    </tr>
                </table>
            </form>
        
    <?php
    }
    ?>
</body>

</html>
