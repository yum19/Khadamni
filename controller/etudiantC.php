<?php
include "C:/xampp/htdocs/web/config.php";
include "C:/xampp/htdocs/web/model/etudiant.php";

class UserC
{
    public function listUsers()
    {
        $sql = "SELECT * FROM etudiant";
        $db = Config::getConnexion();
        try {
            $data = $db->query($sql);
            return $data;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    public function deleteUser($idEtudiant)
    {
        $sql = "DELETE FROM etudiant WHERE idEtudiant = :idEtudiant";
        $db = Config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':idEtudiant', $idEtudiant);
    
        // Ajoutez un message de débogage pour afficher l'ID
        echo "ID à supprimer : " . $idEtudiant;
    
        try {
            $req->execute();
        } catch (Exception $e) {
            // Affichez les erreurs SQL en cas d'échec de l'exécution de la requête
            die('Error:' . $e->getMessage());
        }
    }
    public function updateUserBlockActive($idEtudiant)
    {
        
        $sql = "UPDATE etudiant SET block = 1 WHERE idEtudiant = :idEtudiant";
        $db = Config::getConnexion();
        
    
        $req = $db->prepare($sql);

        $req->bindValue(':idEtudiant', $idEtudiant);
        try {
        
            $req->execute();
        } catch (Exception $e) {
        
            die('Error:' . $e->getMessage());
        }
    }
    public function updateUserBlockDesactive($idEtudiant)
    { 
        $sql = "UPDATE etudiant SET block = 0 WHERE idEtudiant = :idEtudiant";
        $db = Config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':idEtudiant', $idEtudiant);
        try {
            $req->execute();
        } catch (Exception $e) {
        
            die('Error:' . $e->getMessage());
        }
    }
    
    public function addUser($user)
    {
        $sql = "INSERT INTO etudiant (nomE, prenomE, telephoneE, age, emailE, MDPE, block) 
                VALUES (:nomE, :prenomE, :telephoneE, :age, :emailE, :MDPE, :block)";
        $db = Config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'nomE' => $user->getNom(),
                'prenomE' => $user->getPrenom(),
                'telephoneE' => $user->getTelephone(),
                'age' => $user->getDateNaissance(),
                'emailE' => $user->getEmail(),
                'MDPE' => $user->getMDP(),
                'block' => $user->getBlock()
            ]);
            echo "Utilisateur ajouté avec succès.";
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    public function updateUser($idEtudiant, $nomE, $prenomE, $telephoneE, $age, $emailE, $MDPE)
    {
        $sql = "UPDATE etudiant 
                SET nomE=:nomE, prenomE=:prenomE, telephoneE=:telephoneE, age=:age, emailE=:emailE, MDPE=:MDPE 
                WHERE idEtudiant=:idEtudiant";
        $db = Config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->bindParam(':idEtudiant', $idEtudiant);
            $query->bindParam(':nomE', $nomE); // Modifier ici
            $query->bindParam(':prenomE', $prenomE); // Modifier ici
            $query->bindParam(':telephoneE', $telephoneE); // Modifier ici
            $query->bindParam(':age', $age);
            $query->bindParam(':emailE', $emailE); // Modifier ici
            $query->bindParam(':MDPE', $MDPE); // Modifier ici
    
            $query->execute();
            return $query->rowCount();
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }
    
    
    public function getUserById($idEtudiant)
    {
        $sql = "SELECT * FROM etudiant WHERE idEtudiant = :idEtudiant";
        $db = Config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->bindParam(':idEtudiant', $idEtudiant);
            $query->execute();
            return $query->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            // Gérer les exceptions
            die('Error: ' . $e->getMessage());
        }
    }

    public function getUserByEmail($emailE)
    {
        $sql = "SELECT * FROM etudiant WHERE emailE = :emailE ";
        $db = Config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->bindParam(':emailE', $emailE);
            $query->execute();
            return $query->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            // Handle exceptions
            die('Error: ' . $e->getMessage());
        }
    }
    

    public function getUserByPassword($MDPE)
    {
        $sql = "SELECT * FROM etudiant WHERE MDPE = :MDPE";
        $db = Config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->bindParam(':MDPE', $MDPE);
            $query->execute();
            return $query->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            // Handle exceptions
            die('Error: ' . $e->getMessage());
        }
    }
    /*public function Login($emailE, $MDPE)
    {
        $db = config::getConnexion();
        $sql = "SELECT * FROM etudiant WHERE emailE=:emailE AND MDPE=:MDPE";
        
        try {
            $query = $db->prepare($sql);
            $query->bindParam(':emailE', $emailE);
            $query->bindParam(':MDPE', $MDPE);
            $query->execute();
            $user = $query->fetchObject();
            
            if ($user) 
            {
                session_start();
                $_SESSION['user'] = $user;
                
                if (isset($user->block) && $user->block == 1) 
                {
                    header('location: ../view(profil)/Home/templatemo_562_space_dynamic/index.php');
                    exit;
                } 
                else
                {
                    echo "<script>alert('Erreur: Votre compte est bloqué.');</script>";
                }
            } else {
                echo "<script>alert('Erreur: Email et/ou mot de passe incorrect(s).');</script>";
            }
        } catch (Exception $e) {
            echo "<script>alert('Erreur: " . $e->getMessage() . "');</script>";
        }
    }*/
    public function updateUserPasswordByEmail($email, $mdp)
    {
        $sql = "UPDATE etudiant SET MDPE = :mdp WHERE emailE = :email ";
        $db = Config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->bindParam(':mdp', $mdp, PDO::PARAM_STR);
            $query->bindParam(':email', $email, PDO::PARAM_STR);
            $query->execute();
            
            // Vérifie si la mise à jour a été effectuée avec succès
            if ($query->rowCount() > 0) {
                return true; // Retourne vrai si au moins une ligne a été affectée
            } else {
                return false; // Retourne faux si aucune ligne n'a été affectée (aucun utilisateur trouvé pour l'email donné)
            }
        } catch (PDOException $e) {
            // Gestion des erreurs de requête SQL
            die('Erreur lors de la mise à jour du mot de passe: ' . $e->getMessage());
        }
    }
}
?>
