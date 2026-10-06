<?php
include 'C:/xampp/htdocs/web/controller/domaineC.php';

$error = "";

// create offre
$domaine = null;

// create an instance of the controller
$domaineC = new DomaineC();
if (
    isset($_POST["id_dom"]) &&
    isset($_POST["domaine_informatique"]) 
   
) {
    if (
        !empty($_POST["id_dom"]) &&
        !empty($_POST["domaine_informatique"]) 
        
    ) {
        $domaine = new Domaine(
            $_POST["id_dom"],
            $_POST["domaine_informatique"]
           
        );
        $domaineC->updateDomaine($domaine, $_POST["id_dom"]);
        header('Location:ListeDomaines.php');
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
    <title>domaine Display</title>
</head>

<body>
    <button><a href="ListeDomaines.php">Retour à la liste</a></button>
    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>

    <?php
   if (isset($_POST['update'])) {
        $domaine = $domaineC->showDomaine($_POST['id_dom']);

    ?>

        <form action="" method="POST">
            <table border="1" align="center">
                <tr>
                    <td>
                        <label for="id_dom">Id domaine:</label>
                    </td>
                    <td>
                        <input type="hidden" name="id_dom" value="<?php echo $domaine['id_dom']; ?>">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="domaine_informatique">:domaine_informatique</label>
                    </td>
                    <td><input type="text" name="domaine_informatique" id="domaine_informatique" value="<?php echo $domaine['domaine_informatique']; ?>" maxlength="100"></td>
                </tr>
               
                <tr>
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
