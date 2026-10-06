<?php
require_once 'C:\xampp\htdocs\web\config.php';

include 'C:\xampp\htdocs\web\model\Domaine.php';

class DomaineC
{
    

    public function ListeDomaines()
    {
        $sql = "SELECT * FROM domaine";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste->fetchAll(PDO::FETCH_ASSOC); // Retourne un tableau associatif des résultats
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
    

    function deleteDomaine($id_dom)
    {
        $sql = "DELETE FROM domaine WHERE id_dom = :id_dom";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id_dom', $id_dom);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function addDomaine($domaine)
    {
        $sql = "INSERT INTO domaine    
        VALUES (NULL,:domaine_informatique)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'domaine_informatique' => $domaine->getdomaine_informatique()
                
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
    

          function updateDomaine($domaine, $id_dom)
{
    try {
        $db = config::getConnexion();
        $query = $db->prepare(
            'UPDATE domaine SET 
            domaine_informatique=:domaine_informatique 
            WHERE id_dom=:id_dom'
        );
        $query->execute([
            'id_dom' => $domaine->getid_dom(),
            'domaine_informatique' => $domaine->getdomaine_informatique(),
            
        ]);
        echo $query->rowCount() . " records UPDATED successfully <br>";
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

    function showDomaine($id_dom)
    {
        $sql = "SELECT * from domaine  where id_dom =$id_dom" ;
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();

            $domaine = $query->fetch();
            return $domaine;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }
}
