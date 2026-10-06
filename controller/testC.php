<?php
include 'C:\xampp\htdocs\web\config.php';
include 'C:\xampp\htdocs\web\model\test.php';
require_once 'C:\xampp\htdocs\web\controller\testC.php';


class TestC
{

    public function listUsers()
    {
        $sql = "SELECT * FROM test";
        $db = Config::getConnexion();
        try {
            $stmt = $db->query($sql);
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $data;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    
    

    public function addUser($user)
    {
        $sql = "INSERT INTO test (email_test, nom_entreprise_test, domaine_informatique_test, date_test) 
                VALUES (:email_test, :nom_entreprise_test, :domaine_informatique_test, :date_test)";
        $db = Config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->bindParam(':email_test', $user->getEmailTest());
            $query->bindParam(':nom_entreprise_test', $user->getNomEntrepriseTest());
            $query->bindParam(':domaine_informatique_test', $user->getDomaineInformatiqueTest());
            $query->bindParam(':date_test', $user->getDateTest());
            $query->execute();
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    

    public function deleteUser($id_test)
    {
        $sql = "DELETE FROM test WHERE id_test = :id_test";
        $db = Config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id_test', $id_test);
    
        // Ajoutez un message de débogage pour afficher l'ID
        echo "ID à supprimer : " . $id_test;
    
        try {
            $req->execute();
        } catch (Exception $e) {
            // Affichez les erreurs SQL en cas d'échec de l'exécution de la requête
            die('Error:' . $e->getMessage());
        }
    }
    


    public function updateUser($id_test, $email_test, $nom_entreprise_test, $domaine_informatique_test, $date_test)
{
    $sql = "UPDATE test 
            SET email_test=:email_test, nom_entreprise_test=:nom_entreprise_test, domaine_informatique_test=:domaine_informatique_test, date_test=:date_test
            WHERE id_test=:id_test";
    $db = Config::getConnexion();
    try {
        $query = $db->prepare($sql);
        $query->bindParam(':id_test', $id_test);
        $query->bindParam(':email_test', $email_test);
        $query->bindParam(':nom_entreprise_test', $nom_entreprise_test);
        $query->bindParam(':domaine_informatique_test', $domaine_informatique_test);
        $query->bindParam(':date_test', $date_test);
        $query->execute();
        return $query->rowCount();
    } catch (Exception $e) {
        die('Error: ' . $e->getMessage());
    }
}
    
    
public function getUserById($id_test)
{
    $sql = "SELECT * FROM test WHERE id_test = :id_test";
    $db = Config::getConnexion();
    try {
        $query = $db->prepare($sql);
        $query->bindParam(':id_test', $id_test);
        $query->execute();

        // Check if any rows are returned
        if ($query->rowCount() > 0) {
            // Return the fetched user data
            return $query->fetch(PDO::FETCH_ASSOC);
        } else {
            // Handle case when no user is found with the specified ID
            return null;
        }
    } catch (PDOException $e) {
        // Handle PDO exceptions
        die('Error: ' . $e->getMessage());
    }
}
}
?>
