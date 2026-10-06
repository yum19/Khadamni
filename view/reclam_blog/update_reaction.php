<?php
include 'C:/xampp/htdocs/web/controller/PostC.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['ID_Post']) && isset($_POST['action'])) {
    $postID = $_POST['ID_Post'];
    $action = $_POST['action'];

    $postC = new PostC();
    if ($action === 'like') {
        $postC->incrementLikes($postID);
    } elseif ($action === 'dislike') {
        $postC->incrementDislikes($postID);
    }

    $postDetails = $postC->showPost($postID);
    $response = [
        'success' => true,
        'likes' => $postDetails['Likes'],
        'dislikes' => $postDetails['Dislikes']
    ];
    echo json_encode($response);
} else {
    // Répondre avec une erreur si les données POST sont incorrectes
    echo json_encode(['success' => false]);
}
?>