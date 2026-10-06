<?php
include '../controller/OffreC.php';
$offreC = new OffreC();
$liste = $offreC->ListeOffres();

?>
<html>


<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
 

  <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
  <link href="quixlab-master/css/style.css" rel="stylesheet">

</head>

<body>
  
  <body style="padding-top: 50px;">
    <div class="row page-titles mx-0">
      <div class="col-lg-6">
        <div class="card" style="width: 1200px;">
          <div class="card-body">
            <h4 class="card-title">Table Offres</h4>
             <div style="padding-left: 950px;">
            <a href="ajouterOffre_back.php" class="btn btn-success mb-2">Ajouter une nouvelle offre</a>
            </div>
            <div class="table-responsive">
              <table class="table table-bordered verticle-middle">
                <thead>
                  <tr>
                    <th scope="col">id_o</th>
                    <th scope="col">id_dom</th>
                    <th scope="col">titre</th>
                    <th scope="col">description_o</th>
                    <th scope="col">type</th>
                    <th scope="col">idEntreprise</th>
                    <th scope="col">lieu</th>
                    <th scope="col">date_publication</th>
                    <th scope="col">date_limite</th>
                    <th scope="col">contact</th>
                    <th scope="col">status_o</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  foreach ($liste as $offre) {
                  ?>
                    <tr>
                      <td><?php echo $offre['id_o']; ?></td>
                      <td><?php echo $offre['id_dom']; ?></td>
                      <td><?php echo $offre['titre']; ?></td>
                      <td><?php echo $offre['description_o']; ?></td>
                      <td><?php echo $offre['type_o']; ?></td>
                      <td><?php echo $offre['idEntreprise']; ?></td>
                      <td><?php echo $offre['lieu']; ?></td>
                      <td><?php echo $offre['date_publication']; ?></td>
                      <td><?php echo $offre['date_limite']; ?></td>
                      <td><?php echo $offre['contact']; ?></td>
                      <td><?php echo $offre['status_o']; ?></td>
                      <td>
                        <form method="POST" action="updateOffre.php">
                          <input type="hidden" value="<?php echo $offre['id_o']; ?>" name="id_o">
                          <button type="submit" class="btn btn-primary" name="update"><i class="fa fa-pencil"></i></button>
                        </form>
                      </td>
                      <td>
                        <form method="POST" action="deleteOffre.php">
                          <input type="hidden" value="<?php echo $offre['id_o']; ?>" name="id_o">
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
  
  </body>

</html>