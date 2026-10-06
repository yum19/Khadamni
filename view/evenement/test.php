<?php
include 'C:/xampp/htdocs/web/controller/ParticipationC.php'; // Assurez-vous que ce chemin est correct

// Supposons que vous ayez déjà récupéré l'identifiant de l'étudiant
$idEtudiant = 4; // Remplacez par l'ID de l'étudiant

// Instanciation de la classe ParticipationC
$participationC = new ParticipationC();

// Récupération de tous les événements auxquels l'étudiant participe
$events = $participationC->getEventsByStudentId($idEtudiant);

// Initialisation de la variable pour stocker les événements modifiés
$modifiedEvents = [];

// Parcourir tous les événements
foreach ($events as $evenement) {
    // Comparer les informations pour chaque événement
    $infos = $participationC->compareInfosByStudentIdAndEventId($idEtudiant, $evenement['idEvenement']);

    // Vérifier s'il y a des différences dans les adresses ou les dates
    if ($infos['ancienneAdresseEVN'] !== $infos['adresseEVN'] || $infos['ancienneDateEVN'] !== $infos['dateEVN']) {
        // Stocker l'événement modifié avec ses informations
        $modifiedEvents[] = [
            'nomEvenement' => $evenement['nomEvenement'],
            'dateEVN' => $infos['dateEVN'],
            'adresseEVN' => $infos['adresseEVN']
        ];
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"> <!-- Font Awesome for icons -->
</head>
<body>
    <!-- Afficher l'alerte si des différences sont trouvées -->
    <?php if (!empty($modifiedEvents)): ?>
        <script>
            // Afficher une alerte JavaScript
            alert("Les informations ont été modifiées pour les événements suivants :\n<?php foreach ($modifiedEvents as $event): ?>\n- <?php echo $event['nomEvenement'] . ' - ' . $event['dateEVN'] . ' - ' . $event['adresseEVN']; ?>\n<?php endforeach; ?>");
        </script>
    <?php endif; ?>

    <div class="container">
        <div class="main-body">
            <div class="row justify-content-center"> <!-- Align center -->
                <div class="col-md-12"> <!-- Change col-lg-4 to col-md-12 -->
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-column align-items-center text-center">
                                <img src="https://bootdey.com/img/Content/avatar/avatar6.png" alt="Admin" class="rounded-circle p-1 bg-primary" width="110">
                                <div class="mt-3">
                                    <table class="table table-bordered table-striped verticle-middle" style="width: 100%;">
                                        <thead>
                                            <tr>
                                                <th scope="col">Nom de l'événement</th>
                                                <th scope="col">Date de l'événement</th>
                                                <th scope="col">Lieu de l'événement</th>
                                                <th scope="col">Annuler la participation</th>
                                                <!-- Ajoutez les autres colonnes ici selon vos besoins -->
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($events as $evenement) { ?>
                                                <tr>
                                                    <td><?php echo $evenement['nomEvenement']; ?></td>
                                                    <td><?php echo $evenement['dateEVN']; ?></td>
                                                    <td><?php echo $evenement['adresseEVN']; ?></td>
                                                    <td>
                                                        <form method="POST" action="deleteParticipation.php">
                                                            <input type="hidden" value="<?php echo $evenement['idParticipation']; ?>" name="idParticipation">
                                                            <button type="submit" class="btn btn-primary delete-btn">Annuler</button>
                                                        </form>
                                                    </td>
                                                    <!-- Ajoutez les autres colonnes ici selon vos besoins -->
                                                </tr>
                                            <?php } ?>
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

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.min.js"></script>
</body>
</html>
