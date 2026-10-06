<?php
include 'C:\xampp\htdocs\web\config.php';
require_once 'C:\xampp\htdocs\web\model\Offre.php';
require_once 'C:\xampp\htdocs\web\controller\DomaineC.php';

class OffreC
{

    
    
    public function getOffresByEntrepriseId($idE)
    {
        $sql = "SELECT  *
                FROM offre
                WHERE idE = :idE";
        
        $db = config::getConnexion();
        
        try {
            $query = $db->prepare($sql);
            $query->execute(['idE' => $idE]);
            $events = $query->fetchAll(PDO::FETCH_ASSOC);
            return $events;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }





    function statistiqueOffresParDomaine()
    {
        $sql = "SELECT id_dom, COUNT(*) as nombre_offres FROM offre GROUP BY id_dom";
        $db = config::getConnexion();
        try {
            $query = $db->query($sql);
            $statistiques = $query->fetchAll();
            return $statistiques;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }
    




    /*
     function ListeOffres()
    {
        $sql = "SELECT * FROM offre";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
   */
  function ListeOffres($id_dom = null, $tri = null)
  {
      $sql = "SELECT * FROM offre";
      if ($id_dom !== null) {
          $sql .= " WHERE id_dom = :id_dom";
      }
      if ($tri !== null) {
          $sql .= " ORDER BY $tri";
      }
      $db = config::getConnexion();
      try {
          $query = $db->prepare($sql);
          if ($id_dom !== null) {
              $query->bindParam(':id_dom', $id_dom);
          }
          $query->execute();
          $liste = $query->fetchAll();
          return $liste;
      } catch (Exception $e) {
          die('Error:' . $e->getMessage());
      }
  }
  
    function deleteOffre($id_o)
    {
        $sql = "DELETE FROM offre WHERE id_o = :id_o";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id_o', $id_o);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function addOffre($offre)
    {
        $sql = "INSERT INTO offre (id_dom, titre, description_o, type_o, idE, lieu, date_publication, date_limite, contact, status_o)  
                VALUES (:id_dom, :titre, :description_o, :type_o, :idE, :lieu, :date_publication, :date_limite, :contact, :status_o)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
    
            $query->bindParam(':id_dom', $offre->getid_dom());
            $query->bindParam(':titre', $offre->gettitre());
            $query->bindParam(':description_o', $offre->getdescription_o());
            $query->bindParam(':type_o', $offre->gettype_o());
            $query->bindParam(':idE', $offre->getidE());
            $query->bindParam(':lieu', $offre->getlieu());
            $query->bindParam(':date_publication', $offre->getdate_publication()->format('Y-m-d'));
            $query->bindParam(':date_limite', $offre->getdate_limite()->format('Y-m-d'));
            $query->bindParam(':contact', $offre->getcontact());
            $query->bindParam(':status_o', $offre->getstatus_o());
    
            $query->execute();
    
            
    
        } catch (PDOException $e) {
            // Gérer l'erreur de manière appropriée
            echo 'Error: ' . $e->getMessage();
        }
    }
    

    function updateOffre($id_o, $titre, $date_limite, $status_o)
{
    try {
        $db = config::getConnexion();
        $query = $db->prepare(
            'UPDATE offre SET 
            titre = :titre, 
            date_limite = :date_limite,
            status_o = :status_o
            WHERE id_o = :id_o'
        );

        $query->execute([
            'id_o' => $id_o,
            'titre' => $titre,
            'date_limite' => $date_limite,
            'status_o' => $status_o
        ]);

        if ($query->rowCount() > 0) {
            return true; // Retourne true si au moins une ligne a été mise à jour
        } else {
            return false; // Retourne false si aucune ligne n'a été mise à jour
        }
    } catch (PDOException $e) {
        // Vous pouvez choisir de gérer l'erreur différemment ici
        // Par exemple, en lançant une exception ou en retournant un message d'erreur
        die('Error: ' . $e->getMessage());
    }
}



    function showOffre($id_o)
    {
        $sql = "SELECT * from offre  where id_o =$id_o" ;
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();

            $offre = $query->fetch();
            return $offre;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    function getdomaine_informatique($id_dom)
    {
        $sql = "SELECT domaine_informatique FROM domaine WHERE id_dom = :id_dom";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute(['id_dom' => $id_dom]);
            $result = $query->fetchColumn();
            return $result;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }
    function getNomEntreprise($idE)
    {
        $sql = "SELECT nomEntreprise FROM entreprise WHERE idE = :idE";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute(['idE' => $idE]);
            $result = $query->fetchColumn();
            return $result;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }
}
