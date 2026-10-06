<?php
include 'C:/xampp/htdocs/web/config.php';
include 'C:/xampp/htdocs/web/model/User.php';


class UserC
{
    public function listUsers()
    {
        $sql = "SELECT * FROM recruteur";
        $db = Config::getConnexion();
        try {
            $data = $db->query($sql);
            return $data;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    public function deleteUser($idR)
    {
        $sql = "DELETE FROM recruteur WHERE idR = :idR";
        $db = Config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':idR', $idR);
    
        // Ajoutez un message de débogage pour afficher l'ID
        echo "ID à supprimer : " . $idR;
    
        try {
            $req->execute();
        } catch (Exception $e) {
            // Affichez les erreurs SQL en cas d'échec de l'exécution de la requête
            die('Error:' . $e->getMessage());
        }
    }
    
    public function addUser($user)
    {
        $sql = "INSERT INTO recruteur (nomR, prenomR, telephoneR, dateR, emailR, MDPR) 
                VALUES (:nomR, :prenomR, :telephoneR, :dateR, :emailR, :MDPR)";
        $db = Config::getConnexion();
       
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'nomR' => $user->getNom(),
                'prenomR' => $user->getPrenom(),
                'telephoneR' => $user->getTelephone(),
                'dateR' => $user->getDateNaissance()->format('Y-m-d'),
                'emailR' => $user->getEmail(),
                'MDPR' => $user->getMDP()
            ]);
            return "Utilisateur ajouté avec succès.";
        } catch (PDOException $e) {
            return 'Erreur lors de l\'ajout de l\'utilisateur: ' . $e->getMessage();
        }
    }
    
    public function updateUser($idR, $nomR, $prenomR, $telephoneR, $dateR, $emailR, $MDPR)
    {
        $sql = "UPDATE recruteur 
                SET nomR=:nomR, prenomR=:prenomR, telephoneR=:telephoneR, dateR=:dateR, emailR=:emailR, MDPR=:MDPR
                WHERE idR=:idR";
        $db = Config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->bindParam(':idR', $idR);
            $query->bindParam(':nomR', $nomR);
            $query->bindParam(':prenomR', $prenomR);
            $query->bindParam(':telephoneR', $telephoneR);
            $query->bindParam(':dateR', $dateR);
            $query->bindParam(':emailR', $emailR);
            $query->bindParam(':MDPR', $MDPR);
            $query->execute();
            return $query->rowCount();
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }
        
        
    public function getUserById($idR)
    {
        $sql = "SELECT * FROM recruteur WHERE idR = :idR";
        $db = Config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->bindParam(':idR', $idR);
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
    public function getUserByEmail($emailR)
    {
        $sql = "SELECT * FROM recruteur WHERE emailR = :emailR";
        $db = Config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->bindParam(':emailR', $emailR);
            $query->execute();
            return $query->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            // Gérer les exceptions
            die('Error: ' . $e->getMessage());
        }
    }
    public function getUserByPassword($MDPR)
    {
        $sql = "SELECT * FROM recruteur WHERE MDPR = :MDPR";
        $db = Config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->bindParam(':MDPR', $MDPR);
            $query->execute();
            return $query->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            // Handle exceptions
            die('Error: ' . $e->getMessage());
        }
    }
    public function updateUserPasswordByEmail($email, $mdp)
    {
        $sql = "UPDATE recruteur SET MDPR = :mdp WHERE emailR = :email";
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
