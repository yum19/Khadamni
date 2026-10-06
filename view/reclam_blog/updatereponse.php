<?php

include '../Contrller/reponseC.php';

$error = "";


// Créer une instance de réclamation
$reponse = null;

// Créer une instance du contrôleur de réclamation
$reponseC = new reponseC();
if (
    isset($_POST["id_reponse"]) &&
    isset($_POST["etat_reponse"]) &&
    isset($_POST["idr"])
) {
    if (
        !empty($_POST["id_reponse"]) &&
        !empty($_POST["etat_reponse"]) &&
        !empty($_POST["idr"]) 
    ) {
        // Créer un objet reclamation
        $reponse = new reponse(
            $_POST['id_reponse'],
            $_POST['etat_reponse'],
            $_POST['idr']
        );
        // Mettre à jour la réclamation
        $reponseC->updatereponse($reponse, $_POST["id_reponse"]);
        // Rediriger vers la page de liste
        header('Location:listereponse.php');
        exit(); // Arrêter l'exécution du script après la redirection
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
    <title>reclamation Display</title>
</head>

<body>
    <button><a href="listereponse.php">Retour à la liste</a></button>
    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>

    <?php
    if (isset($_POST['id_reponse'])) {
        $reponse = $reponseC->showreponse($_POST['id_reponse']);

    ?>

<form action="" method="POST">
    <table border="1" align="center">
        <tr>
            <td>
                <label for="id_reponse">ID Réponse:
                </label>
            </td>
            <td><input type="text" name="id_reponse" id="id_reponse" value="<?php echo $reponse['id_reponse']; ?>" maxlength="20"></td>
        </tr>
        <tr>
            <td>
                <label for="etat_reponse">État Réponse:
                </label>
            </td>
            <td>
                <input type="text" name="etat_reponse" value="<?php echo $reponse['etat_reponse']; ?>" id="etat_reponse">
            </td>
        </tr>
        
        <tr>
            <td>
                <label for="idr">ID R:
                </label>
            </td>
            <td>
                <input type="text" name="idr" value="<?php echo $reponse['idr']; ?>" id="idr">
            </td>
        </tr>

        <tr>
            <td></td>
            <td>
                <input type="submit" value="Update">
            </td>
            <td>
                <input type="reset" value="Reset">
            </td>
        </tr>
    </table>
</form>

    <?php
    }
    ?>
</body>

</html>

