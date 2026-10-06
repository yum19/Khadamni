<?php
include 'C:\xampp\htdocs\web\view\offre_test\front end\connexion.php';
include 'C:\xampp\htdocs\web\model\entretien.php';
require_once 'C:\xampp\htdocs\web\controller\testC.php';


class TestC2
{
    public function listUsers2()
    {
        $sql = "SELECT * FROM entretien";
        $db = connexion::getConnexion();
        try {
            $stmt = $db->query($sql);
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $data;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    public function listuser2($id_test)
    {
        try{
            $pdo=connexion::getConnexion();
            $query=$pdo->prepare("SELECT * FROM entretien WHERE id_test =:id_test");
            $query->execute(['id_test'=> $id_test]);
            return $query->fetchAll();
        }catch(PDOExecption $e){
            echo $e->getMessage();
        }

    }


    public function listUsers($id_test)
    {
        try{
        $pdo=connexion::getConnexion();
        $query=$pdo->prepare("SELECT* FROM test WHERE id_test =:id_test");
        $query->execute(['id_test' =>$id_test ]);
        return $query->fetchAll();
        } catch(PDOException $e){
            echo $e->getMessage();
        }

    }

    public function addUser2($user2)
{
    $sql = "INSERT INTO entretien (id_test, email_test, nom_entre, prenom_entre, nom_entreprise_test, date_entre, type_entre) 
            VALUES (:id_test, :email_test, :nom_entre, :prenom_entre, :nom_entreprise_test, :date_entre, :type_entre)";
    $db = connexion::getConnexion();
    try {
        $query = $db->prepare($sql);
        // Pass variables to bindParam instead of values
        $id_test = $user2->getIdTest();
        $email_test = $user2->getEmailTest();
        $nom_entre = $user2->getNomEntre();
        $prenom_entre = $user2->getPrenomEntre();
        $nom_entreprise_test = $user2->getNomEntrepriseTest();
        $date_entre = $user2->getDateEntre();
        $type_entre = $user2->getTypeEntre();
        $query->bindParam(':id_test', $id_test);
        $query->bindParam(':email_test', $email_test);
        $query->bindParam(':nom_entre', $nom_entre);
        $query->bindParam(':prenom_entre', $prenom_entre);
        $query->bindParam(':nom_entreprise_test', $nom_entreprise_test);
        $query->bindParam(':date_entre', $date_entre);
        $query->bindParam(':type_entre', $type_entre);
        $query->execute();
    } catch (Exception $e) {
        die('Error: ' . $e->getMessage());
    }
}


public function deleteUser2($id_entre)
{
    $sql = "DELETE FROM entretien WHERE id_entre = :id_entre";
    $db = connexion::getConnexion();
    $req = $db->prepare($sql);
    $req->bindValue(':id_entre', $id_entre);
    try {
        $req->execute();
    } catch (Exception $e) {
        die('Error:' . $e->getMessage());
    }
}

public function updateUser2($id_entre, $id_test, $email_test, $nom_entre, $prenom_entre, $nom_entreprise_test, $date_entre, $type_entre)
{
    $sql = "UPDATE entretien 
            SET id_test=:id_test, email_test=:email_test, nom_entre=:nom_entre, prenom_entre=:prenom_entre, nom_entreprise_test=:nom_entreprise_test, date_entre=:date_entre, type_entre=:type_entre
            WHERE id_entre=:id_entre";
    $db = connexion::getConnexion();
    try {
        $query = $db->prepare($sql);
        $query->bindParam(':id_entre', $id_entre);
        $query->bindParam(':id_test', $id_test); // Add id_test parameter
        $query->bindParam(':email_test', $email_test);
        $query->bindParam(':nom_entre', $nom_entre);
        $query->bindParam(':prenom_entre', $prenom_entre);
        $query->bindParam(':nom_entreprise_test', $nom_entreprise_test);
        $query->bindParam(':date_entre', $date_entre);
        $query->bindParam(':type_entre', $type_entre);
        $query->execute();
        return $query->rowCount();
    } catch (Exception $e) {
        die('Error: ' . $e->getMessage());
    }
}


public function getUserById2($id_entre)
{
    $sql = "SELECT * FROM entretien WHERE id_entre = :id_entre";
    $db = connexion::getConnexion();
    try {
        $query = $db->prepare($sql);
        $query->bindParam(':id_entre', $id_entre);
        $query->execute();
        return $query->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        // Handle exceptions
        die('Error: ' . $e->getMessage());
    }
}


}
 ?>   