<?php
include '../controller/DemandeC.php';

    $demandeC = new DemandeC();
    $statistiques_d = $demandeC->statistiqueDemandesParDate();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Statistiques des demandes par date</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
<div style="width: 40%">
    <canvas id="graphiqueDemandesParDate" width="200" height="400"></canvas>
    </div>
   
    <script>
        var ctx = document.getElementById('graphiqueDemandesParDate').getContext('2d');
        var chart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: [
                    <?php foreach ($statistiques_d as $statistique): ?>
                        '<?php echo $statistique['date_d']; ?>',
                    <?php endforeach; ?>
                ],
                datasets: [{
                    label: 'Nombre de demandes',
                    data: [
                        <?php foreach ($statistiques_d as $statistique): ?>
                            <?php echo $statistique['nombre_demandes']; ?>,
                        <?php endforeach; ?>
                    ],
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>

</body>
</html>
