<?php
require_once 'C:\xampp\htdocs\web\controller\testC.php';
require_once 'C:\xampp\htdocs\web\controller\entretienC.php';

$TestC = new TestC();
$TestC2 = new TestC2();

$error = "";

$email_test = isset($_POST['email_test']) ? $_POST['email_test'] : '';
$nom_entre = isset($_POST['nom_entre']) ? $_POST['nom_entre'] : '';
$prenom_entre = isset($_POST['prenom_entre']) ? $_POST['prenom_entre'] : '';
$nom_entreprise_test = isset($_POST['nom_entreprise_test']) ? $_POST['nom_entreprise_test'] : '';
$date_entre = isset($_POST['date_entre']) ? $_POST['date_entre'] : '';
$type_entre = isset($_POST['type_entre']) ? $_POST['type_entre'] : '';

// Fetch the latest id_test from the test table
$cfg = require __DIR__ . '/../../../config.local.php';
$pdo = new PDO(
    $cfg['db']['dsn'],
    $cfg['db']['user'],
    $cfg['db']['pass'],
    [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]
);
$query = "SELECT id_test FROM test ORDER BY id_test DESC LIMIT 1";
$statement = $pdo->query($query);
$id_test_auto = $statement->fetchColumn();

if (!$id_test_auto) {
    echo '<script>alert("Aucun ID Test trouvé dans la table test.");</script>';
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Handle form submission
    if (isset($_POST["email_test"]) && isset($_POST["nom_entre"]) && isset($_POST["prenom_entre"]) && isset($_POST["nom_entreprise_test"]) && isset($_POST["date_entre"]) && isset($_POST["type_entre"])) {
        if (!empty($_POST['email_test']) && !empty($_POST['nom_entre']) && !empty($_POST["prenom_entre"]) && !empty($_POST["nom_entreprise_test"]) && !empty($_POST["date_entre"]) && !empty($_POST["type_entre"])) {
            $email_test = $_POST['email_test'];
            $id_test = isset($_POST['id_test']) ? $_POST['id_test'] : '';
            // Check if the user is trying to change the auto-filled id_test
            if ($id_test != $id_test_auto) {
                echo '<script>
                alert("Vous ne pouvez pas modifier l\'ID Test automatiquement rempli.");
                window.location.href = "register2.php";
                </script>';
            } else {
                $user2 = new User2(
                    null,
                    $id_test, // Use the fetched id_test
                    $_POST['email_test'],
                    $_POST['nom_entre'],
                    $_POST['prenom_entre'],
                    $_POST['nom_entreprise_test'],
                    $_POST['date_entre'],
                    $_POST['type_entre']
                );
                $TestC2->addUser2($user2);
                echo '<script>alert("Utilisateur ajouté avec succès.");</script>';
                // No need to prevent form submission here
            }
        } else {
            $error = "Tous les champs doivent être remplis";
        }
        echo '<script>
        // Include the JavaScript code
        ' . file_get_contents("script_certif.js") . '

        // Call the submitForm function when the form is submitted

        </script>';
    }
}
?>

<html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ludiflex | Login & Register</title>
    <!-- BOXICONS -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- STYLE -->
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="qrcode.min.js"></script>
    <script src="qrcode.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-space-dynamic.css">
    <link rel="stylesheet" href="assets/css/animated.css">
    <link rel="stylesheet" href="assets/css/owl.css">
    <link rel="stylesheet" href="style_certif.css">
    <script src="https://cdn.jsdelivr.net/qrcodejs/1.0.0/qrcode.min.js"></script>



    <style>
        /* Ajout de marge entre le header et le formulaire */
        .form-container {
            margin-top: 120px; /* Ajustez la marge selon vos besoins */
             margin-bottom: 1px;
        }

        /* Styles spécifiques au logo */
        .corner-container {
            position: fixed; /* Position fixe pour que le logo reste fixe lors du défilement */
            top: 0; /* Distance depuis le haut */
            left: 10px; /* Distance depuis la gauche */
            z-index: 9999; /* Assure que le logo est au-dessus de tout le contenu */
        }

        .corner-container img {
            width: 50px; /* Largeur minimale du logo */
            top: 0; /* Distance depuis le haut */
            height: auto; /* Hauteur ajustée automatiquement pour conserver les proportions */
        }
    </style>
</head>
<body>
<div class="content">
    <header class="header-area header-sticky wow slideInDown" data-wow-duration="0.75s" data-wow-delay="0s">
        <div class="container">
          <div class="row">
            <div class="col-12">
              <nav class="main-nav">
                <!-- ***** Logo Start ***** -->
                <a href="index.php" class="logo">
                  <h4>
                    <div class="corner-container">
                      <img src="assets/img/logo.png" >
                    </div> 
                  Kha<span>Damni</span></h4>
                </a>
    
                <!-- ***** Logo End ***** -->
                <!-- ***** Menu Start ***** -->
                <ul class="nav">
                  <li class="scroll-to-section"><a href="http://localhost/web/view/etudiant/index.php">Acceuil</a></li>
                  <li class="scroll-to-section"><a href="#services">Offres&demandes</a></li>
              <li class="scroll-to-section"><a href="#yomna"  class="active">Entretien</a></li>
              <li class="scroll-to-section"><a href="#portfolio">Evènement</a></li>
              <li class="scroll-to-section"><a href="#blog">Blog</a></li> 
              <li class="scroll-to-section"><a href="#contact">Reclamation</a></li> 
              <li class="scroll-to-section"><a href="http://localhost/web/view/reclam_blog/bot.php">Chatbot</a></li> 
              <li class="scroll-to-section"><a href="http://localhost/web/view/etudiant/afficherProfil.php" class="active">Profile</a></li> 
              <li class="scroll-to-section"><a href="http://localhost/web/view/etudiant/afficherProfil.php" class="active"></a></li> 

                </ul>        
                <a class='menu-trigger'>
                    <span>Menu</span>
                </a>
                <!-- ***** Menu End ***** -->
              </nav>
            </div>
          </div>
        </div>
    </header>
    
    <div class="form-container">
        <style>
            /* POPPINS FONT */
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap');

/* ====== BASE ===== */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
}

/* ====== Body ===== */
body {
    /*background: #f5f2f2;*/ /* Remove or comment out this line */
    
    background-position: center;
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-size: cover;
    display: flex;
    align-items: center;
    justify-content: center;
    min-height: 100vh;
    padding: 0 20px;
}


/* ====== Form container ===== */
.form-container {
    display: flex;
    width: 1000px;
    height: 800px;
    border: 3px solid #fe3f40;
    border-radius: 50px;
    backdrop-filter: blur(20px);
    overflow: hidden;
}

/* ====== First Column ===== */
.col-1 {
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column;
    width: 55%;
    background: #fe3f40;
    backdrop-filter: blur(20px);
    border-radius: 0 30% 20% 0;
    transition: border-radius .3s;
}

.image-layer {
    position: relative;
}

.form-image-main {
    width: 400px;
    animation: scale-up 3s ease-in-out alternate infinite;
}

.form-image {
    position: absolute;
    left: 0;
    width: 400px;
}
.form-image1 {
    position: fixed; /* Positioning the image relative to the viewport */
    top: 0; /* Positioning the image at the top of the viewport */
    left: 0; /* Positioning the image at the left of the viewport */
    width: 100px;
    z-index: 999; /* Adjust z-index as needed to ensure it's above other elements */
}

/* ====== Form Image Animation ===== */
.coin {
    animation: scale-down 3s ease-in-out alternate infinite;
}

.spring {
    animation: scale-down 3s ease-in-out alternate infinite;
}

.dots {
    animation: scale-up 3s ease-in-out alternate infinite;
}

.rocket {
    animation: up-down 3s ease-in-out alternate infinite;
}

.cloud {
    animation: left-right 3s ease-in-out alternate infinite;
}

.stars {
    animation: scale-down 3s ease-in-out alternate infinite;
}

@keyframes left-right {
    to {
        transform: translateX(10px);
    }
}

@keyframes up-down {
    to {
        transform: translateY(10px);
    }
}

@keyframes scale-down {
    to {
        transform: scale(0.95);
    }
}

@keyframes scale-up {
    to {
        transform: scale(1.05);
    }
}

/* ====== Featured Words ===== */
.featured-words {
    text-align: center;
    color: #edeff0;
    width: 500px;
}

.featured-words span {
    font-weight: 400;
    color: #03a4ed;
}

/* ====== Second Column ===== */
.col-2 {
    position: relative;
    width: 45%;
    padding: 20px;
    overflow: hidden;
}

.btn-box {
    display: flex;
    justify-content: center;
    gap: 10px;
    margin-top: 0px;
    
}

.btn {
    font-weight: 500;
    padding: 5px 30px;
    border: none;
    border-radius: 30px;
    background: rgba(255, 255, 255, 0.3);
    color: #0b0b0b;
    box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
    cursor: pointer;
    transition: .1s;
}

.btn-1 {
    background: #03a4ed;
}

.btn:hover {
    opacity: 0.85;
}

/*  ======= Login Form ========  */
.login-form {
    position: absolute;
    left: 50%;
    transform: translateX(-50%);
    display: flex;
    flex-direction: column;
    align-items: center;
    width: 100%;
    padding: 0 4vw;
    transition: .3s;
}

/*  ======= Register Form ========  */
.register-form {
    position: absolute;
    left: -150%;
    transform: translateX(-50%);
    display: flex;
    flex-direction: column;
    align-items: center;
    width: 100%;
    padding: 0 4vw;
    transition: .3s;
}

.register-form .form-title {
    margin-block: 5px 5px;
}

.form-title {
    margin: 1px 0;
    color: #fe3f40;
    font-size: 25px;
    font-weight: 500;
}

.form-inputs {
    width: 100%;
}

.input-box {
    position: relative;

}


.input-field {
    width: 100%;
    height: 40px;
    padding: 0 20px;
    margin: 5px 0;
    color: #ffff;
    background: #acd7f6f0;
    box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
    border: none;
    border-radius: 10px;
    outline: none;
    backdrop-filter: blur(20px);
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
}
.input-field2 {
    width: 100%;
    height: 40px;
    padding: 0 15px;
    margin: 5px 0;
    color: #ffff;
    box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
    border: none;
    border-radius: 10px;
    outline: none;
    backdrop-filter: blur(20px);
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
}

.input-field3 {
    width: 1%;
    height: 1px;
    padding: 0 1px;
    color: #ffff;
    background: #acd7f6f0;
    box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
    border: none;
    border-radius: 10px;
    outline: none;
    backdrop-filter: blur(20px);
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
}

::placeholder {
    color: #fff;
    font-size: 15px;
}

.input-submit {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
    width: 100%;
    height: 30px;
    padding: 0 15px;
    margin: 5px 0;
    color: #fff;
    background: #03a4ed;
    border: none;
    border-radius: 10px;
    box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
    cursor: pointer;
    transition: .3s;
}

.input-submit:hover {
    gap: 15px;
    background-color: #fe3f40;
}

/* ====== Responsive ====== */
@media (max-width: 892px) {
    .form-container {
        width: 400px;
    }

    .col-1 {
        display: none;
    }

    .col-2 {
        width: 100%;
    }
}
        </style>
       <div class="col col-1">
        <div class="image-layer">
            <img src="assets\img\about-left-image.png" class="form-image-main">
            <img src="assets/img/cloud.png" class="form-image cloud">
            <img src="assets/img/stars.png" class="form-image stars">
        </div>
        <p class="featured-words">Bienvenue sur <span> Khadamni</span></p>
        </div>
     <div class="col col-2">
        
        <div class="login-form">
            <div class="form-title">
                <span> Entretien </span>
            </div>
            
                            <form id="test-form" action="register2.php" method="post">
                    <div class="form-inputs">
                        <div class="input-box">
                        <input type="text" class="input-field3" placeholder="id de test" name="id_test" value="<?= isset($id_test_auto) ? htmlspecialchars($id_test_auto) : '' ?>">

                        </div>
                    </div>
                    <div class="form-inputs">
                        <div class="input-box">
                            <input type="text" id="email" class="input-field" placeholder="Email" name="email_test" value="<?= htmlspecialchars($email_test) ?>">
                            <span style="color:red; font-size: smaller;" id="email_error"></span>

                        </div>
                    </div>
                    <div class="form-inputs">
                        <div class="input-box">
                            <input type="text" id="nom" class="input-field" placeholder="Nom" name="nom_entre" value="<?= htmlspecialchars($nom_entre) ?>">
                            <span style="color:red; font-size: smaller;" id="nom_error" ></span>
                            <input type="text" id="prenom" class="input-field" placeholder="Prenom" name="prenom_entre" value="<?= htmlspecialchars($prenom_entre) ?>">
                            <span style="color:red; font-size: smaller;" id="prenom_error" ></span>
                        </div>
                    </div>
                    <div class="form-inputs">
                        <div class="input-box">
                            <input type="text" id="entreprise" class="input-field" placeholder="Nom Entreprise" name="nom_entreprise_test" value="<?= htmlspecialchars($nom_entreprise_test) ?>">
                            <span style="color:red; font-size: smaller;" id="entreprise_error" ></span>
                        </div>
                    </div>
                    <div class="form-inputs">
                        <input type="date" id="date" class="input-field" placeholder="Date d'entretien'" name="date_entre" value="<?= htmlspecialchars($date_entre) ?>">
                        <span style="color:red; font-size: smaller;" id="date_error" ></span>
                    </div>
                    <div class="form-inputs">
                        <select class="input-field" name="type_entre" style="width: 100%;">
                            <option value="" disabled selected hidden> Type d'entretien</option>
                            <option value="en ligne" <?= ($type_entre == 'en ligne') ? 'selected' : '' ?>>En ligne</option>
                            <option value="presentiel" <?= ($type_entre == 'presentiel') ? 'selected' : '' ?>>Presentiel</option>
                        </select>
                    </div>
                    <div class="form-inputs">    
                        <div class="input-box">
                            <button type="submit" class="input-submit" id="submit-btn">
                                <span>Envoyer!</span>
                                <i class="bx bx-right-arrow-alt"></i>
                            </button>
                        </div>
                    </div>
                    <button type="button" class="input-submit" id="generate-qrcode-btn">
                    <span>Scan QR Code</span>
                    
                     </button>
                        <button type="button" class="input-submit" id="export-btn">
                    <span>Exporter</span>
                    <i class="bx bx-file-pdf"></i>
                </button>
                
            </form> 
            <div id="qrcode"></div>
             <div id="decoded-message"></div>
        </div>
    </div>
</div>
<?php if (!empty($error)) : ?>
    <div><?php echo $error; ?></div>
<?php endif; ?>

<footer>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.25s">
                <p>© Copyright 2024 Khadamni. All Rights Reserved.</p>
            </div>
        </div>
    </div>
</footer>
</div>

<script>
    // Function to generate QR code
    function generateQRCode() {
        // Serialize form data
        var formData = $('#test-form').serializeArray();

        // Clear existing QR code if any
        $('#qrcode').empty();

        // Generate QR code
        new QRCode(document.getElementById("qrcode"), {
            text: JSON.stringify(formData), // Convert form data to JSON string
            width: 200,
            height: 200
        });
    }

    // Call generateQRCode function when the button is clicked
    $('#generate-qrcode-btn').click(function() {
        generateQRCode();
    });

    // Function to redirect to text file with decoded message
    function redirectToTextFile(message) {
        // Create a Blob with the message content
        var blob = new Blob([message], { type: 'text/plain' });
        // Create a URL for the Blob
        var url = window.URL.createObjectURL(blob);
        // Create a link element
        var a = document.createElement('a');
        // Set the href attribute of the link to the URL of the Blob
        a.href = url;
        // Set the download attribute of the link to specify the filename
        a.download = 'decoded_message.txt';
        // Append the link to the document body
        document.body.appendChild(a);
        // Click the link to trigger the download
        a.click();
        // Remove the link from the document body
        document.body.removeChild(a);
        // Revoke the URL to release the Blob
        window.URL.revokeObjectURL(url);
    }

    // Function to decode QR code message
    // Function to decode QR code message
function decodeQRCode() {
    var qrCodeData = $('#qrcode').find('img').attr('src'); // Get QR code image data

    try {
        // Parse the QR code data into an array of objects
        var decodedData = JSON.parse(decodeURIComponent(qrCodeData)); // Parse the JSON string
        
        // Format the decoded data into the desired message
        var message = "id_test: " + decodedData[0].value + "\n" +
                      "nom: " + decodedData[2].value + "\n" +
                      "prenom: " + decodedData[3].value + "\n" +
                      "nom entreprise: " + decodedData[4].value + "\n" +
                      "date d'entretien: " + decodedData[5].value + "\n" +
                      "type entretien: " + decodedData[6].value + "\n" +
                      "félicitations pour votre réussite et nous avons hâte de vous voir briller lors de notre entretien!!!";

        // Redirect to text file with decoded message
        redirectToTextFile(message);
    } catch (error) {
        console.error("Error decoding QR code:", error);
        alert("Error decoding QR code. Please try again.");
    }
}

</script>




<script type="text/javascript">
const email = document.getElementById('email');
const nom = document.getElementById('nom');
const prenom = document.getElementById('prenom');
const entreprise = document.getElementById('entreprise');
const date = document.getElementById('date');
const form = document.getElementById('test-form');
const email_error = document.getElementById('email_error');
const nom_error = document.getElementById('nom_error');
const prenom_error = document.getElementById('prenom_error');
const entreprise_error = document.getElementById('entreprise_error');
const date_error = document.getElementById('date_error');

form.addEventListener('submit', (e) => {
    const alphabetSpaceRegex = /^[a-zA-Z\s]+$/; // Regex to allow alphabetic characters and spaces
    const email_check = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;

    // Clear previous error messages
    email_error.innerHTML = "";
    nom_error.innerHTML = "";
    prenom_error.innerHTML = "";
    entreprise_error.innerHTML = "";
    date_error.innerHTML = "";

    // Email validation
    if (!email.value.match(email_check)) {
        e.preventDefault();
        email_error.innerHTML = "Email valide est requis";
    }

    // Nom validation
    if (nom.value.trim() === '') {
        e.preventDefault();
        nom_error.innerHTML = "Le nom est requis";
    } else if (!alphabetSpaceRegex.test(nom.value.trim())) {
        e.preventDefault();
        nom_error.innerHTML = "Le nom doit contenir uniquement des lettres et des espaces";
    }

    // Prenom validation
    if (prenom.value.trim() === '') {
        e.preventDefault();
        prenom_error.innerHTML = "Le prénom est requis";
    } else if (!alphabetSpaceRegex.test(prenom.value.trim())) {
        e.preventDefault();
        prenom_error.innerHTML = "Le prénom doit contenir uniquement des lettres et des espaces";
    }

    // Entreprise validation
    if (entreprise.value.trim() === '') {
        e.preventDefault();
        entreprise_error.innerHTML = "Le nom de l'entreprise est requis";
    } else if (!alphabetSpaceRegex.test(entreprise.value.trim())) {
        e.preventDefault();
        entreprise_error.innerHTML = "Le nom de l'entreprise doit contenir uniquement des lettres et des espaces";
    }

    // Date validation
    const currentDate = new Date();
    const selectedDate = new Date(date.value);
    if (selectedDate <= currentDate) {
        e.preventDefault();
        date_error.innerHTML = "La date doit être dans le futur";
    }
});
</script>

<script>
    // Include the JavaScript code
    <?php echo file_get_contents("script_certif.js"); ?>
    
    // Add event listener to the "Exporter" button
    document.getElementById("export-btn").addEventListener("click", function() {
        // Call the submitForm function when the "Exporter" button is clicked
        submitForm();
    });
</script>


<!-- JS -->
<script src="script_certif.js"></script>
<script src="assets/js/main.js"></script>

<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/owl-carousel.js"></script>
<script src="assets/js/animation.js"></script>
<script src="assets/js/imagesloaded.js"></script>

</body>
</html>