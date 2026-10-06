<?php
include 'C:/xampp/htdocs/web/controller/DemandeC.php';
require '../offre_test/vendor/autoload.php';

$error = "";
$success_message = "";

// create offre
$demande = null;

// create an instance of the controller
$demandeC = new DemandeC();
if (
    isset($_POST["id_d"]) &&
    isset($_POST["idEtudiant"]) &&
    isset($_POST["nom_d"]) &&
    isset($_POST["prenom_d"]) &&
    isset($_POST["email_d"]) &&
    isset($_POST["telephone_d"]) &&
    isset($_POST["cv_d"]) &&
    isset($_POST["lettre_motivation"]) &&
    isset($_POST["id_o"]) &&
    isset($_POST["date_d"]) &&
    isset($_POST["status_d"])
) {
    if (
        !empty($_POST["id_d"]) &&
        !empty($_POST["idEtudiant"]) &&
        !empty($_POST["nom_d"]) &&
        !empty($_POST["prenom_d"]) &&
        !empty($_POST["email_d"]) &&
        !empty($_POST["telephone_d"]) &&
        !empty($_POST["cv_d"]) &&
        !empty($_POST["lettre_motivation"]) &&
        !empty($_POST["id_o"]) &&
        !empty($_POST["date_d"]) &&
        !empty($_POST["status_d"])
    ) {
        $demande = new Demande(
            $_POST["id_d"],
            $_POST["idEtudiant"],
            $_POST["nom_d"],
            $_POST["prenom_d"],
            $_POST["email_d"],
            $_POST["telephone_d"],
            $_POST["cv_d"],
            $_POST["lettre_motivation"],
            $_POST["id_o"],
            new DateTime($_POST['date_d']),
            $_POST["status_d"]
        );
        $demandeC->updateDemande($demande, $_POST["id_d"]);
        header('http://localhost/web/view/back%20end/table-basicOffre.php');
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
    <title>demande Display</title>
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
    <div class="container">
        <button><a href="back end/table-basicOffre.php">Retour à la liste</a></button>
        

        <div id="error">
            <?php echo $error; ?>
        </div>

        <?php if (isset($_POST['update'])) : ?>
            <?php $demande = $demandeC->showDemande($_POST['id_d']); ?>
            
            <form action="" method="POST">
                <table>
                    <tr>
                        <th>Champ</th>
                        <th>Valeur</th>
                    </tr>
                    <tr>
                        <td><label for="id_d">Id demande:</label></td>
                        <td><input type="hidden" name="id_d" value="<?php echo $demande['id_d']; ?>"><?php echo $demande['id_d']; ?></td>
                
                    
                        <td><label for="idEtudiant">idEtudiant:</label></td>
                        <td><input type="text" name="idEtudiant" id="didEtudiant" value="<?php echo $demande['idEtudiant']; ?>" maxlength="100"></td>
                    </tr>
                    <tr>
                        <td><label for="nom_d">nom_d:</label></td>
                        <td><input type="text" name="nom_d" id="nom_d" value="<?php echo $demande['nom_d']; ?>" maxlength="255"></td>
                   
                        <td><label for="prenom_d">prenom_d:</label></td>
                        <td><input type="text" name="prenom_d" id="prenom_d" value="<?php echo $demande['prenom_d']; ?>" maxlength="255"></td>
                    </tr>
                    <tr>
                        <td><label for="email_d">email_d:</label></td>
                        <td><input type="text" name="email_d" id="email_d" value="<?php echo $demande['email_d']; ?>" maxlength="255"></td>
                    
                        <td><label for="telephone_d">telephone_d:</label></td>
                        <td><input type="tel" name="telephone_d" id="telephone_d" value="<?php echo $demande['telephone_d']; ?>" maxlength="255"></td>
                    </tr>
                    <tr>
                        <td><label for="cv_d">cv_d:</label></td>
                        <td><input type="file" name="cv_d" id="cv_d" value="<?php echo $demande['cv_d']; ?>" maxlength="255"></td>
                    
                        <td><label for="lettre_motivation">lettre_motivation:</label></td>
                        <td><input type="file" name="lettre_motivation" id="lettre_motivation" value="<?php echo $demande['lettre_motivation']; ?>" maxlength="255"></td>
                    </tr>
                    <tr>
                        <td><label for="id_o">id_o:</label></td>
                        <td><input type="text" name="id_o" id="id_o" value="<?php echo $demande['id_o']; ?>"></td>
                    
                        <td><label for="date_d">date_d:</label></td>
                        <td><input type="date" name="date_d" id="date_d" value="<?php echo $demande['date_d']; ?>"></td>
                    </tr>
                    <tr>
                        <td><label for="status_d">Status:</label></td>
                        <td><input type="text" name="status_d" id="status_d" value="<?php echo $demande['status_d']; ?>" maxlength="255"></td>
                    
                        <td colspan="2" align="center">
                            <input type="submit" name="update" value="Update">
                        </td>
                    </tr>
                </table>
            </form>
        <?php endif; ?>
    </div>




    <script>
// Fonction pour envoyer un SMS
function sendSMS(tel, message) {
    var xhr = new XMLHttpRequest();
    var url = "send_sms.php?recipient=" + encodeURIComponent(tel) + "&message=" + encodeURIComponent(message);
    xhr.open("POST", url, true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            console.log("SMS envoyé avec succès !");
            alert("SMS envoyé avec succès !");
        }
    };
    xhr.send();
}

// Événement pour détecter les modifications du statut
document.getElementById("status_d").addEventListener("change", function() {
    var tel = document.getElementById("telephone_d").value; // Récupérer le numéro de téléphone
    var nouveauStatut = this.value; // Récupérer le nouveau statut
    var message = "Votre demande est maintenant " + nouveauStatut; // Composer le message du SMS

    // Vérifier que le numéro de téléphone est valide avant d'envoyer le SMS
    if (tel && tel.trim() !== "") {
        sendSMS(tel, message); // Appeler la fonction pour envoyer le SMS
    } else {
        console.log("Numéro de téléphone invalide !");
    }
});
</script>

</body>

</html>
