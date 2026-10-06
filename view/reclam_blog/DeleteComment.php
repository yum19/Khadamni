<?php
include 'C:/xampp/htdocs/web/controller/PostC.php';
include 'C:/xampp/htdocs/web/controller/CommentC.php';

$commentID = $_GET['id'];

$commentC = new CommentC();
$comment = $commentC->showComment($commentID);

if ($comment) {
    $postID = $comment['ID_Post'];

    $commentC->deleteComment($commentID);

    $postC = new PostC();
    $postC->decrementCommentCount($postID);

    header('location: Blog.php');
} else {
    // Gérer le cas où le commentaire n'existe pas
    echo "Le commentaire n'existe pas.";
}
?>
