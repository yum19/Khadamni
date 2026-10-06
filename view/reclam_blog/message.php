<?php
// connecting to database using PDO
$cfg = require __DIR__ . '/../../config.local.php';
$dsn = $cfg['db']['dsn'];
$username = $cfg['db']['user'];
$password = $cfg['db']['pass'];

try {
    $pdo = new PDO($dsn, $username, $password);
    // Set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database Error: " . $e->getMessage());
}

// getting user message through ajax
$getMesg = isset($_POST['text']) ? $_POST['text'] : '';
$getMesg = htmlspecialchars($getMesg); // Sanitize input to prevent SQL injection

//checking user query to database query
$check_data = "SELECT replies FROM chatbot WHERE queries LIKE ?";
$stmt = $pdo->prepare($check_data);
$stmt->execute(["%$getMesg%"]); 
$fetch_data = $stmt->fetch(PDO::FETCH_ASSOC);

// if user query matched to database query we'll show the reply otherwise it go to else statement
if($fetch_data){
    //storing reply to a variable which we'll send to ajax
    $reply = $fetch_data['replies'];
    echo $reply;
} else {
    echo "Désolé, je ne peux pas vous comprendre!";
}
?>
