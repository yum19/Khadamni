<?php
include 'C:/xampp/htdocs/web/model/reponse.php'; // Assurez-vous que ce chemin est correct
include_once 'C:/xampp/htdocs/web/config.php';

class reponseC
{
    public function listereponse()
    {
        $sql = "SELECT * FROM reponse";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $r) {
            die('Error:' . $r->getMessage());
        } 
    }

    function deletereponse($id_reponse)
    {
        $sql = "DELETE FROM reponse WHERE id_reclamation = :id_reclamation";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id_reclamation', $id_reclamation);
    
        try {
            $req->execute();
        } catch (Exception $r) {
            die('Error:' . $r->getMessage());
        }
    }
    


/*function updatereponse($reponse, $id_reponse)
{
    try {
        $db = config::getConnexion();
        $query = $db->prepare(
            'UPDATE reponse SET 
                etat_reponse = :etat_reponse,
                idr = :idr
            WHERE id_reponse = :id_reponse'
        );
        $query->execute([
            'etat_reponse' => $reponse->getetat_reponse(),
            'idr' => $reponse->getidr(),
            'id_reponse' => $id_reponse
        ]);
        echo $query->rowCount() . " records UPDATED successfully <br>";
    } catch (PDOException $r) {
        $r->getMessage();
    }
}*/

function showreponse($id_reponse)
{
    $sql = "SELECT * FROM reponse WHERE id_reponse = :id_reponse";
    $db = config::getConnexion();
    try {
        $query = $db->prepare($sql);
        $query->bindParam(':id_reponse', $id_reponse, PDO::PARAM_INT); // Je vais changer PDO::PARAM_INT à PDO::PARAM_STR
        $query->execute();

        $reponse = $query->fetch();
        return $reponse;
    } catch (Exception $e) {
        die('Error: ' . $e->getMessage());
    }
}

public function AfficherId_Reclamation()
{
    $sql = "SELECT id_reclamation FROM reclamation ";
    $db = config::getConnexion();
    try {
        $list_id_rec = $db->query($sql);
        return $list_id_rec;
    } catch (Exception $e) {
        die('Error:' . $e->getMessage());
    }
}

/*public function addreponse($reponse)
{
    $sql = "INSERT INTO reponse (etat_reponse, id_reclamation) 
            VALUES (:etat_reponse, :id_reclamation)";
    $db = config::getConnexion();
    try {
        $query = $db->prepare($sql);
        $query->execute([
            ':etat_reponse' => $reponse->getetat_reponse(),
            ':id_reclamation' => $reponse->getid_reclamation(),
        ]);
        
        // Ajout de la réponse correspondante à la réclamation nouvellement ajoutée
        $lastInsertId = $db->lastInsertId(); // Obtenez l'ID de la dernière insertion
        $reponse = new reponse(NULL, $reponse->getetat_reponse(), $lastInsertId); // Créez une réponse avec l'ID de la réclamation
        $this->addreponse($reponse); // Ajoutez la réponse

        echo 'Reclamation added successfully.';
    } catch (Exception $e) {
        die('Error: ' . $e->getMessage());
    }
}*/

public function addreponse($reponse)
{
    $sql = "INSERT INTO reponse (reponse, id_reclamation) VALUES (:reponse, :id_reclamation)";
    $db = config::getConnexion();
    try {
        $req = $db->prepare($sql);
        
        // Correction : On suppose que $reponse est un objet contenant les méthodes getreponse() et getid_reclamation()
        $reponseText = $reponse->getreponse(); // Obtenez le texte de la réponse
        $id_reclamation = $reponse->getid_reclamation(); // Obtenez l'ID de la réclamation
        
        // Correction : Utilisation des valeurs correctes dans bindValue
        $req->bindValue(':reponse', $reponseText);
        $req->bindValue(':id_reclamation', $id_reclamation); 

        $req->execute();
    } catch (Exception $e) {
        echo 'Error: ' . $e->getMessage();
    }
}
function filterBadWords($text, $badWords) {
    // Parcourt tous les mots interdits
    foreach ($badWords as $badWord) {
        // Génère une chaîne d'étoiles de la même longueur que le mot interdit
        $replacement = str_repeat('*', mb_strlen($badWord));
        // Remplace le mot interdit par la chaîne d'étoiles dans le texte
        $text = str_ireplace($badWord, $replacement, $text);
    }
    // Retourne le texte avec les mots interdits remplacés par des étoiles
    return $text;


}


}
