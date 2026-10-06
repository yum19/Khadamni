<?php
include 'C:/xampp/htdocs/web/controller/PostC.php';
include 'C:/xampp/htdocs/web/controller/CommentC.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ID_Post = isset($_POST['ID_Post']) ? $_POST['ID_Post'] : null;
    $Contenu = $_POST['Contenu'];
    $Pseudo = $_POST['Pseudo'];
    $DatePublication = new DateTime();

    $comment = new Comment(NULL, $ID_Post, $Contenu, $Pseudo, $DatePublication, 0);
    
    $commentC = new CommentC();
    $commentC->addComment($comment);

    $postC = new PostC();
    $postC->incrementCommentCount($ID_Post);

    header('Location: post_details.php?id=' . $ID_Post);
    exit();
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un commentaire</title>
</head>
<body>
    <h2>Ajouter un commentaire</h2>
    <form action="AddComment.php?ID_Post=<?= $post['ID_Post']; ?>" method="post">
        <input type="hidden" name="ID_Post" value="<?php echo isset($_GET['ID_Post']) ? $_GET['ID_Post'] : ''; ?>">
        <label for="Pseudo">Pseudo :</label><br>
        <input type="text" id="Pseudo" name="Pseudo"><br><br>
        <label for="Contenu">Contenu :</label><br>
        <textarea id="Contenu" name="Contenu" rows="4" cols="50"></textarea><br>
        <input type="submit" value="Ajouter">
    </form>
</body>
</html>
