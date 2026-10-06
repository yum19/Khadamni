<?php
include 'C:/xampp/htdocs/web/model/Post.php'; // Assurez-vous que ce chemin est correct
include_once 'C:/xampp/htdocs/web/config.php';
class PostC
{
    public function listPosts()
    {
        $sql="SELECT * FROM post";
        $db=config::getConnexion();
        try{
            $liste=$db->query($sql);
            return $liste;
        }
        catch(Exception $e)
        {
            die('Erreur :' .$e->getMessage());
        }
    }
    public function DeletePost($id)
    {
        $sql="DELETE FROM post WHERE ID_Post=:ID_Post";
        $db=config::getConnexion();
        $req=$db->prepare($sql);
        $req->bindValue(':ID_Post',$id);
        try
        {
            $req->execute();
        }
        catch(Exception $e)
        {
            die('Error:' .$e->getMessage());
        }
    }
    public function AddPost($post)
    {
        $sql = "INSERT INTO post VALUES (NULL, :Ti, :C, :A, :D, :Ta, :L, :DL, :Cm, :Im)";
        $db=config::getConnexion();
        try{
            $query=$db->prepare($sql);
            $query->execute([
                'Ti'=>$post->getTitre(),
                'C'=>$post->getContenu(),
                'A'=>$post->getAuteur(),
                'D'=>$post->getDate_Publication()->format('Y/m/d'),
                'Ta'=>$post->getTags(),
                'L'=>$post->getLikes(),
                'DL'=>$post->getDislikes(),
                'Cm'=>$post->getCommentaires(),
                'Im'=>$post->getImage(),
            ]);
        } catch(Exception $e){
            echo 'Error :' .$e->getMessage();
        }
    }
    function UpdatePost($post, $id)
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE post SET 
                    Titre = :Titre, 
                    Contenu = :Contenu, 
                    Auteur = :Auteur, 
                    Tags = :Tags,
                    Image = :Image
                WHERE ID_Post= :ID_Post'
            );
            $query->execute([
                'ID_Post' => $id,
                'Titre' => $post->getTitre(),
                'Contenu' => $post->getContenu(),
                'Auteur' => $post->getAuteur(),
                'Tags' => $post->getTags(),
                'Image' => $post->getImage(),
            ]);
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
    function showPost($id)
    {
        $sql = "SELECT * from post where ID_Post = $id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();

            $post = $query->fetch();
            return $post;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }
    public function incrementLikes($postID)
    {
    $sql = "UPDATE post SET Likes = Likes + 1 WHERE ID_Post = :ID_Post";
    $db = config::getConnexion();
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':ID_Post', $postID);
    $stmt->execute();
    }

    public function incrementDislikes($postID)
    {
    $sql = "UPDATE post SET Dislikes = Dislikes + 1 WHERE ID_Post = :ID_Post";
    $db = config::getConnexion();
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':ID_Post', $postID);
    $stmt->execute();
    }
    public function incrementCommentCount($postID)
{
    $sql = "UPDATE post SET Commentaires = Commentaires + 1 WHERE ID_Post = :ID_Post";
    $db = config::getConnexion();
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':ID_Post', $postID);
    $stmt->execute();
}
public function decrementCommentCount($postID)
    {
        $sql = "UPDATE post SET Commentaires = Commentaires - 1 WHERE ID_Post = :ID_Post";
        $db = config::getConnexion();
        $stmt = $db->prepare($sql);
        $stmt->bindValue(':ID_Post', $postID);
        $stmt->execute();
    }
    public function searchPosts($searchText)
{
    $sql = "SELECT * FROM post WHERE Titre LIKE :searchText OR Tags LIKE :searchText";

    $db = config::getConnexion();

    try {
        $stmt = $db->prepare($sql);

        $searchParam = "%" . $searchText . "%";
        $stmt->bindParam(':searchText', $searchParam, PDO::PARAM_STR);

        $stmt->execute();

        $searchResults = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $searchResults;
    } catch (PDOException $e) {
        echo "Erreur lors de la recherche des posts: " . $e->getMessage();
        return array(); 
    }
}


public function tripcommentaire($order = 'ASC') {
    // Détermine l'ordre de tri en fonction du paramètre $order
    $order = strtoupper($order); // Convertit en majuscules pour assurer la cohérence
    if ($order != 'ASC' && $order != 'DESC') {
        // Si l'ordre n'est ni 'ASC' ni 'DESC', utilise 'ASC' par défaut
        $order = 'ASC';
    }

    // Construit la requête SQL avec l'ordre de tri spécifié
    $sql = "SELECT * FROM post ORDER BY Commentaires $order";

    // Exécute la requête SQL et récupère les données des blogs triées
    $db = config::getConnexion();
    try {
        $liste = $db->query($sql);
        return $liste;
    } catch (Exception $e) {
        die('Erreur:'. $e->getMessage());
    }
}

function getLikes()
    {
        try {
            $pdo = config::getConnexion();
            $sql = "SELECT Titre, Likes FROM post";
    
           
            $stmt = $pdo->query($sql);
    
            $labels = [];
            $data = [];
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $labels[] = $row['Titre'];
                $data[] = $row['Likes'];
            }
    
    
            return ['labels' => $labels, 'data' => $data];
        } catch (PDOException $e) {
            echo "Error executing the query: " . $e->getMessage();
            return ['labels' => [], 'data' => []];
        }
    }




public function getTopPosts()
{
    $sql = "SELECT * FROM post 
            ORDER BY (Likes + Commentaires - Dislikes) DESC
            LIMIT 3";

    $db = config::getConnexion();

    try {
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $topPosts = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $topPosts;
    } catch (PDOException $e) {
        echo "Erreur lors de la récupération des meilleurs posts: " . $e->getMessage();
        return array(); 
    }
}
}
?>