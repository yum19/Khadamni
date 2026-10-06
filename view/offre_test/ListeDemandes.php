<?php
include '../controller/DemandeC.php';
$demandeC = new DemandeC();
$liste = $demandeC->ListeDemandes();

?>
<!-- Afficher la liste des demandes dans un tableau -->
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1 ,shrink-to-fit=no">
  <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
  <link href="quixlab-master/css/style.css" rel="stylesheet">

</head>

<body>
<div class="content">
  <tbody style="padding-top: 100px;">
    <div class="row page-titles mx-0">
      <div class="col-lg-6">
        <div class="card" style="width: 1200px;">
          <div class="card-body">
            <h4 class="card-title">Table Demandes</h4>
            <div class="table-responsive">
              <table class="table table-bordered verticle-middle">
                <thead>
                  <tr>
                    <th scope="col">id_d</th>
                    <th scope="col">idEtudiant</th>
                    <th scope="col">nom_d</th>
                    <th scope="col">prenom_d</th>
                    <th scope="col">email_d</th>
                    <th scope="col">telephone_d</th>
                    <th scope="col">cv_d</th>
                    <th scope="col">lettre_motivation</th>
                    <th scope="col">id_o</th>
                    <th scope="col">date_d</th>
                    <th scope="col">status_d</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  foreach ($liste as $demande) {
                  ?>
                    <tr>
                      <td><?php echo $demande['id_d']; ?></td>
                      <td><?php echo $demande['idEtudiant']; ?></td>
                      <td><?php echo $demande['nom_d']; ?></td>
                      <td><?php echo $demande['prenom_d']; ?></td>
                      <td><?php echo $demande['email_d']; ?></td>
                      <td><?php echo $demande['telephone_d']; ?></td>
                      <td><?php echo $demande['cv_d']; ?></td>
                      <td><?php echo $demande['lettre_motivation']; ?></td>
                      <td><?php echo $demande['id_o']; ?></td>
                      <td><?php echo $demande['date_d']; ?></td>
                      <td><?php echo $demande['status_d']; ?></td>
                      <td>
                        <form method="POST" action="updateDemande.php">
                          <input type="hidden" value="<?php echo $demande['id_d']; ?>" name="id_d">
                          <button type="submit" class="btn btn-primary" name="update"><i class="fa fa-pencil"></i></button>
                        </form>
                      </td>
                      <td>
                        <form method="POST" action="deleteDemande.php">
                          <input type="hidden" value="<?php echo $demande['id_d']; ?>" name="id_d">
                          <button type="submit" class="btn btn-danger" name="delete"><i class="fa fa-trash"></i></button>
                        </form>
                      </td>
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

  </tbody>
  
  </div>
    <script src="assets/js/isotope.js"></script>
    <script src="assets/js/owl-carousel.js"></script>
    <script src="assets/js/animation.js"></script>
    <script src="assets/js/imagesloaded.js"></script>
    <script src="assets/js/templatemo-custom.js"></script>
    <script src="assets/js/main.js"></script>
    <script src="assets/js/tabs.js"></script>

    
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js.map"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
  </div>
  </body>

</html>
