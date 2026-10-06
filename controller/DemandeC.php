<?php
require_once 'C:\xampp\htdocs\web\config.php';
include 'C:\xampp\htdocs\web\model\Demande.php';


class DemandeC
{ 

    function getNomOffre($id_o)
    {
        $sql = "SELECT titre FROM offre WHERE id_o = :id_o";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute(['id_o' => $id_o]);
            $result = $query->fetchColumn();
            return $result;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }
    /*function sendSMS() {
        // Effectuer une requête AJAX pour envoyer un SMS
        var tel = document.forms["certificatForm"]["tel"].value;
        var xhr = new XMLHttpRequest();
        var url = "send_sms.php?recipient=" + encodeURIComponent(tel);
        xhr.open("POST", url, true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                console.log("SMS envoyé avec succès !");
            }
        };
        xhr.send();
    }
*/
// Fonction pour envoyer un SMS



public function getDemandesByStudentId($idEtudiant)
{
    $sql = "SELECT  *
            FROM demande
            WHERE idEtudiant = :idEtudiant";
    
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



    public function statistiqueDemandesParDate()
    {
        try {
            $pdo = config::getConnexion();
            $query = $pdo->prepare("SELECT date_d, COUNT(*) as nombre_demandes FROM demande GROUP BY date_d");
            $query->execute();
            return $query->fetchAll();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    

    public function afficheDemandes($id_o){
    try{
        $pdo = config::getConnexion();
        $query = $pdo->prepare("SELECT * from demande WHERE id_o = :id_o");
        $query->execute(['id_o'=>$id_o]);
        return $query->fetchAll();
    }catch(PDOException $e){
        echo $e->getMessage();
    }
   }

   public function afficheOffres(){
    try{
        $pdo = config::getConnexion();
        $query = $pdo->prepare("SELECT * from offre ");
        $query->execute();
        return $query->fetchAll();
    }catch(PDOException $e){
        echo $e->getMessage();
    }
   }
    public function ListeDemandes()
    {
        $sql = "SELECT * FROM demande";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
    public function liste_demandes_fronte()
    {
        $sql = "SELECT * FROM demande";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function deleteDemande($id_d)
    {
        $sql = "DELETE FROM demande WHERE id_d = :id_d";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id_d', $id_d);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    

    function ajoutDemande($demande)
    {    
        $sql = "INSERT INTO demande    
        VALUES (NULL, :idEtudiant, :nom_d, :prenom_d, :email_d, :telephone_d, :cv_d, :lettre_motivation, :id_o, :date_d, :status_d)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'idEtudiant' => $demande->getidEtudiant(),
                'nom_d' => $demande->getnom_d(),
                'prenom_d' => $demande->getprenom_d(),
                'email_d' => $demande->getemail_d(),
                'telephone_d' => $demande->gettelephone_d(),
                'cv_d' => $demande->getcv_d(),
                'lettre_motivation' => $demande->getlettre_motivation(),
                'id_o' => $demande->getid_o(),
                'date_d' => $demande->getdate_d()->format('Y-m-d'),
                'status_d' => $demande->getstatus_d()
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
    
    function updateDemande($demande, $id_d)
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE demande SET 
                idEtudiant=:idEtudiant, 
                nom_d=:nom_d, 
                prenom_d=:prenom_d, 
                email_d=:email_d, 
                telephone_d=:telephone_d, 
                cv_d=:cv_d, 
                lettre_motivation=:lettre_motivation, 
                id_o=:id_o,
                date_d=:date_d, 
                status_d=:status_d 
                WHERE id_d=:id_d'
            );
    
            $date_d = $demande->getdate_d() ? $demande->getdate_d()->format('Y/m/d') : null;
    
            $query->execute([
                'id_d' => $demande->getid_d(),
                'idEtudiant' => $demande->getidEtudiant(),
                'nom_d' => $demande->getnom_d(),
                'prenom_d' => $demande->getprenom_d(),
                'email_d' => $demande->getemail_d(),
                'telephone_d' => $demande->gettelephone_d(),
                'cv_d' => $demande->getcv_d(),
                'lettre_motivation' => $demande->getlettre_motivation(),
                'id_o' => $demande->getid_o(),
                'date_d' => $date_d,
                'status_d' => $demande->getstatus_d()
            ]);
    
           
    
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    public function updateUser($id_d, $cv_d, $lettre_motivation)
    {
        $sql = "UPDATE demande 
                SET cv_d=:cv_d, lettre_motivation=:lettre_motivation 
                WHERE id_d=:id_d";
        $db = Config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->bindParam(':id_d', $id_d);
            $query->bindParam(':cv_d', $cv_d);
            $query->bindParam(':lettre_motivation', $lettre_motivation);
            $query->execute();
            return $query->rowCount();
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }
    

    function showDemande($id_d)
    {
        $sql = "SELECT * from demande  where id_d =$id_d" ;
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();

            $demande = $query->fetch();
            return $demande;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }
   function getNomDomaine($id_o)
{
    $sql = "SELECT o.titre, d.domaine_informatique
            FROM offre o
            INNER JOIN domaine d ON o.id_dom = d.id_dom
            WHERE o.id_o = :id_o";
    $db = config::getConnexion();
    try {
        $query = $db->prepare($sql);
        $query->execute(['id_o' => $id_o]);
        $result = $query->fetch(PDO::FETCH_ASSOC);
        
        // Check if $result is an array
        if (is_array($result)) {
            return $result['domaine_informatique'];
        } else {
            // Handle the case where no result is found
            return null; // Or any default value you prefer
        }
    } catch (Exception $e) {
        die('Error: ' . $e->getMessage());
    }
}

   
}
