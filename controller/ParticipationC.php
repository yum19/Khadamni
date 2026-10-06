<?php

include 'C:/xampp/htdocs/web/Model/Participation.php'; // Assurez-vous que ce chemin est correct
include_once 'C:/xampp/htdocs/web/config.php';
class ParticipationC
{
    public function listParticipations()
{
    $sql = "SELECT p.*, e.nomEvenement AS nomEvenement
            FROM participation p
            INNER JOIN evenement e ON p.idEvenement = e.idEvenement"; // Joindre la table evenement pour obtenir le nom de l'événement
    $db = config::getConnexion();
    try {
        $liste = $db->query($sql);
        return $liste;
    } catch (Exception $e) {
        die('Error:' . $e->getMessage());
    }
}

    public function deleteParticipation($idParticipation)
    {
        $sql = "DELETE FROM participation  WHERE idParticipation = :idParticipation";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':idParticipation', $idParticipation);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
    public function addParticipation($email, $MDP, $idEvenement)
{
    $sql = "INSERT INTO participation (idEvenement, idEtudiant, nomE, prenomE, telephoneE, age, emailE, MDPE)  
            SELECT :idEvenement, idEtudiant, nomE, prenomE, telephoneE, age, emailE, MDPE 
            FROM etudiant 
            WHERE emailE = :email AND MDPE = :MDP";
    $db = config::getConnexion();
    try {
        $query = $db->prepare($sql);
        $query->execute([
            'email' => $email,
            'MDP' => $MDP,
            'idEvenement' => $idEvenement
        ]);
        // Récupérer l'ID de la participation ajoutée
        $idParticipation = $db->lastInsertId();
        return $idParticipation; // Retourner l'ID de la participation ajoutée
    } catch (Exception $e) {
        echo 'Error: ' . $e->getMessage();
        return null; // Retourner null en cas d'erreur
    }
}


    public function showParticipation($idParticipation)
    {
    $sql = "SELECT p.*, e.nomEvenement 
            FROM participation p
            INNER JOIN evenement e ON p.idEvenement = e.idEvenement
            WHERE p.idParticipation = :idParticipation";
    $db = config::getConnexion();
    try {
        $query = $db->prepare($sql);
        $query->execute(['idParticipation' => $idParticipation]);
        $participation = $query->fetch();
        return $participation;
    } catch (Exception $e) {
        die('Error: ' . $e->getMessage());
    }
    }
    public function getParticipationsByIdEvenement($idEvenement)
{
    $sql = "SELECT * FROM participation WHERE idEvenement = :idEvenement";
    $db = config::getConnexion();
    try {
        $query = $db->prepare($sql);
        $query->execute(['idEvenement' => $idEvenement]);
        $participations = $query->fetchAll(PDO::FETCH_ASSOC);
        return $participations;
    } catch (Exception $e) {
        die('Error: ' . $e->getMessage());
    }
 }  
 public function getEventsByStudentId($idEtudiant)
{
    $sql = "SELECT e.*, p.idParticipation 
            FROM evenement e
            INNER JOIN participation p ON e.IdEvenement = p.IdEvenement
            WHERE p.idEtudiant = :idEtudiant";
    
    $db = config::getConnexion();
    
    try {
        $query = $db->prepare($sql);
        $query->execute(['idEtudiant' => $idEtudiant]);
        $events = $query->fetchAll(PDO::FETCH_ASSOC);
        return $events;
    } catch (Exception $e) {
        die('Error: ' . $e->getMessage());
    }
}
public function getEventNameById($idEvenement)
{
    $sql = "SELECT nomEvenement FROM evenement WHERE idEvenement = :idEvenement";
    $db = config::getConnexion();
    try {
        $query = $db->prepare($sql);
        $query->execute(['idEvenement' => $idEvenement]);
        $eventName = $query->fetchColumn();
        return $eventName;
    } catch (Exception $e) {
        die('Error: ' . $e->getMessage());
    }
}
public function compareInfosByStudentIdAndEventId($idEtudiant, $idEvenement)
{
    $sql = "SELECT e.ancienneAdresseEVN, e.adresseEVN, e.ancienneDateEVN, e.dateEVN
            FROM evenement e
            INNER JOIN participation p ON e.idEvenement = p.idEvenement
            WHERE p.idEtudiant = :idEtudiant AND p.idEvenement = :idEvenement";

    $db = config::getConnexion();

    try {
        $query = $db->prepare($sql);
        $query->execute([
            'idEtudiant' => $idEtudiant,
            'idEvenement' => $idEvenement
        ]);
        $infos = $query->fetch(PDO::FETCH_ASSOC);
        return $infos;
    } catch (Exception $e) {
        die('Error: ' . $e->getMessage());
    }
}
public function getParticipationsByIdEntreprise($idE)
{
    $sql = "SELECT p.*, e.nomEvenement 
            FROM participation p
            INNER JOIN evenement e ON p.idEvenement = e.idEvenement
            WHERE e.idE = :idE";
    $db = config::getConnexion();
    try {
        $query = $db->prepare($sql);
        $query->execute(['idE' => $idE]);
        $participations = $query->fetchAll(PDO::FETCH_ASSOC);
        return $participations;
    } catch (Exception $e) {
        die('Error: ' . $e->getMessage());
    }
}
}
