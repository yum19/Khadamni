<?php
class User2
{
    private $id_entre = null;
    private $id_test = null;
    private $email_test = null;
    private $nom_entre = null;
    private $prenom_entre = null;
    private $nom_entreprise_test = null;
    private $date_entre = null;
    private $type_entre = null;

    public function __construct($id_entre, $id_test, $email_test, $nom_entre, $prenom_entre, $nom_entreprise_test, $date_entre, $type_entre)
    {
        $this->id_entre = $id_entre;
        $this->id_test = $id_test;
        $this->email_test = $email_test;
        $this->nom_entre = $nom_entre;
        $this->prenom_entre = $prenom_entre;
        $this->nom_entreprise_test = $nom_entreprise_test;
        $this->date_entre = $date_entre;
        $this->type_entre = $type_entre;
    }

    

    public function getIdEntre()
    {
        return $this->id_entre;
    }

    public function setIdEntre($id_entre)
    {
        $this->id_entre = $id_entre;
    }

    public function getIdTest()
    {
        return $this->id_test;
    }

    public function setIdTest($id_test)
    {
        $this->id_test = $id_test;
    }

    public function getEmailTest()
    {
        return $this->email_test;
    }

    public function setEmailTest($email_test)
    {
        $this->email_test = $email_test;
    }

    public function getNomEntre()
    {
        return $this->nom_entre;
    }

    public function setNomEntre($nom_entre)
    {
        $this->nom_entre = $nom_entre;
    }

    public function getPrenomEntre()
    {
        return $this->prenom_entre;
    }

    public function setPrenomEntre($prenom_entre)
    {
        $this->prenom_entre = $prenom_entre;
    }

    public function getNomEntrepriseTest()
    {
        return $this->nom_entreprise_test;
    }

    public function setNomEntrepriseTest($nom_entreprise_test)
    {
        $this->nom_entreprise_test = $nom_entreprise_test;
    }

    public function getDateEntre()
    {
        return $this->date_entre;
    }

    public function setDateEntre($date_entre)
    {
        $this->date_entre = $date_entre;
    }

    public function getTypeEntre()
    {
        return $this->type_entre;
    }

    public function setTypeEntre($type_entre)
    {
        $this->type_entre = $type_entre;
    }
}


?>
