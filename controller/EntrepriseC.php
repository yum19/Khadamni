<?php
include "C:/xampp/htdocs/web/config.php";
include 'C:/xampp/htdocs/web/Model/Entreprise.php';

class EntrepriseC
{
    public function listEntreprises()
    {
        $sql = "SELECT * FROM entreprise";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function deleteEntreprise($idE)
    {
        $sql = "DELETE FROM entreprise WHERE idE = :idE";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':idE', $idE);
        echo "ID à supprimer : " . $idE;
        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function addEntreprise($entreprise)
    {
        $sql = "INSERT INTO entreprise (nomEntreprise, adresse, dateCreation, telephoneEn, descriptionE, emailEn, MDPEn)
        VALUES (:nomEntreprise, :adresse, :dateCreation, :telephoneEn, :descriptionE, :emailEn, :MDPEn)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'nomEntreprise' => $entreprise->getNomEntreprise(),
                'adresse' => $entreprise->getAdresse(),
                'dateCreation' => $entreprise->getDateCreation()->format('Y-m-d'),
                'telephoneEn' => $entreprise->getTelephone1(),
                'descriptionE' => $entreprise->getDescription(),
                'emailEn' => $entreprise->getEmail(),
                'MDPEn' => $entreprise->getMDP(),
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    function updateEntreprise($idE, $nomEntreprise, $adresse, $dateCreation, $telephoneEn, $descriptionE, $emailEn, $MDPEn)
    {
        $sql ="UPDATE entreprise 
        SET nomEntreprise = :nomEntreprise, adresse = :adresse, dateCreation = :dateCreation,  telephoneEn = :telephoneEn, descriptionE = :descriptionE, emailEn = :emailEn, MDPEn = :MDPEn
        WHERE idE = :idE";
        $db = Config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->bindParam(':idE', $idE);
            $query->bindParam(':nomEntreprise', $nomEntreprise);
            $query->bindParam(':adresse', $adresse);
            $query->bindParam(':dateCreation', $dateCreation);
            $query->bindParam(':telephoneEn', $telephoneEn);
            $query->bindParam(':descriptionE', $descriptionE);
            $query->bindParam(':emailEn', $emailEn);
            $query->bindParam(':MDPEn', $MDPEn);
            $query->execute();
            return $query->rowCount();
            } catch (Exception $e) {
                die('Error: ' . $e->getMessage());
            }
    }

    function showEntreprise($idE)
    {
        $sql = "SELECT * from entreprise where idE = :idE";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->bindParam(':idE', $idE);
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
     public function getUserByEmail($emailEn)
    {
        $sql = "SELECT * FROM entreprise WHERE emailEn = :emailEn";
        $db = Config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->bindParam(':emailEn', $emailEn);
            $query->execute();
            return $query->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            // Gérer les exceptions
            die('Error: ' . $e->getMessage());
        }
    }
    
    public function getUserByPassword($MDPEn)
    {
        $sql = "SELECT * FROM entreprise WHERE MDPEn = :MDPEn";
        $db = Config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->bindParam(':MDPEn', $MDPEn);
            $query->execute();
            return $query->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            // Gérer les exceptions
            die('Error: ' . $e->getMessage());
        }
    }
    public function updateUserPasswordByEmail($email, $mdp)
    {
        $sql = "UPDATE entreprise SET MDPEn = :mdp WHERE emailEn = :email";
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
