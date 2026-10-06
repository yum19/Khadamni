<?php
include 'C:/xampp/htdocs/web/model/Evenement.php';
require_once 'C:/xampp/htdocs/web/controller/categorieevnC.php';

class EvenementC
{
    public function listEvenements()
    {
        $sql = "SELECT * FROM evenement";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function deleteEvenement($idEvenement)
{
    // Avant de supprimer l'événement, récupérez ses informations
    $evenementToDelete = $this->showEvenement($idEvenement);

    $sql = "DELETE FROM evenement  WHERE idEvenement = :idEvenement";
    $db = config::getConnexion();
    $req = $db->prepare($sql);
    $req->bindValue(':idEvenement', $idEvenement);

    try {
        $req->execute();

        // Envoyez l'alerte pour informer que l'événement a été supprimé
        $message = "L'événement avec l'ID " . $idEvenement . " a été supprimé.";
        // Envoyer l'alerte par e-mail
        // mail($to, $subject, $message, $headers);
        // Ou vous pouvez utiliser une autre méthode d'alerte, comme l'envoi d'une notification, l'enregistrement dans un fichier de journal, etc.
    } catch (Exception $e) {
        die('Error:' . $e->getMessage());
    }
}
function addEvenement($Evenement)
{
    $sql = "INSERT INTO evenement  
            VALUES (NULL, :nomEvenement, :adresseEVN, :dateEVN, :idCategorieEVN, :ancienneAdresseEVN, :ancienneDateEVN, :idE)";
    $db = config::getConnexion();
    try {
        $query = $db->prepare($sql);
        $query->execute([
            'nomEvenement' => $Evenement->getNomEvenement(),
            'adresseEVN' => $Evenement->getAdresseEVN(),
            'dateEVN' => $Evenement->getDateEVN()->format('Y-m-d'),
            'idCategorieEVN' => $Evenement->getIdCategorieEVN(),
            'ancienneAdresseEVN' => $Evenement->getAncienneAdresseEVN() ?? $Evenement->getAdresseEVN(),
            'ancienneDateEVN' => $Evenement->getAncienneDateEVN()->format('Y-m-d') ?? $Evenement->getDateEVN()->format('Y-m-d'),
            'idE' => $Evenement->getidE(),
        ]);
    } catch (Exception $e) {
        echo 'Error: ' . $e->getMessage();
    }
}


function updateEvenement($Evenement, $idEvenement, $idE)
{
    try {
        $db = config::getConnexion();
        
        // Récupérer les anciennes valeurs de dateEVN et adresseEVN
        $oldEvenement = $this->showEvenement($idEvenement);
        $ancienneDateEVN = $oldEvenement['dateEVN'];
        $ancienneAdresseEVN = $oldEvenement['adresseEVN'];

        $query = $db->prepare(
            'UPDATE evenement SET 
            nomEvenement = :nomEvenement, 
            adresseEVN = :adresseEVN, 
            ancienneDateEVN = :ancienneDateEVN, 
            ancienneAdresseEVN = :ancienneAdresseEVN, 
            dateEVN = :dateEVN, 
            idCategorieEVN = :idCategorieEVN
        WHERE idEvenement = :idEvenement AND idE = :idE'
        );

        $query->execute([
            'idEvenement' => $idEvenement,
            'nomEvenement' => $Evenement->getNomEvenement(),
            'adresseEVN' => $Evenement->getadresseEVN(),
            'ancienneDateEVN' => $ancienneDateEVN,
            'ancienneAdresseEVN' => $ancienneAdresseEVN,
            'dateEVN' => $Evenement->getdateEVN()->format('Y-m-d'),
            'idCategorieEVN' => $Evenement->getIdCategorieEVN(),
            'idE' => $idE,
        ]);

        // Votre logique supplémentaire ici...

        echo $query->rowCount() . " records UPDATED successfully <br>";
    } catch (PDOException $e) {
        $e->getMessage();
    }
}




    function showEvenement($idEvenement)
    {
        $sql = "SELECT * from evenement where idEvenement = $idEvenement";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();
            $Evenement = $query->fetch();
            return $Evenement;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }
    function getNomCategorie($idCategorieEVN)
    {
        $sql = "SELECT nomCategorieEVN FROM categorieevn WHERE idCategorieEVN = :idCategorieEVN";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute(['idCategorieEVN' => $idCategorieEVN]);
            $result = $query->fetchColumn();
            return $result;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }
    function getEvenementsByEntrepriseId($idE)
    {
        $sql = "SELECT * FROM evenement WHERE idE = :idE";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute(['idE' => $idE]);
            $result = $query->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }
    

}
