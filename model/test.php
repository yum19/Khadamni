<?php
class User
{
    private $id_test = null;
    private $email_test = null;
    private $nom_entreprise_test = null;
    private $domaine_informatique_test = null;
    private $date_test = null;

    public function __construct($id_test, $email_test, $nom_entreprise_test, $domaine_informatique_test, $date_test)
    {
        $this->id_test = $id_test;
        $this->email_test = $email_test;
        $this->nom_entreprise_test = $nom_entreprise_test;
        $this->domaine_informatique_test = $domaine_informatique_test;
        $this->date_test = $date_test;
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

    public function getNomEntrepriseTest()
    {
        return $this->nom_entreprise_test;
    }

    public function setNomEntrepriseTest($nom_entreprise_test)
    {
        $this->nom_entreprise_test = $nom_entreprise_test;
    }

    public function getDomaineInformatiqueTest()
    {
        return $this->domaine_informatique_test;
    }

    public function setDomaineInformatiqueTest($domaine_informatique_test)
    {
        $this->domaine_informatique_test = $domaine_informatique_test;
    }

    public function getDateTest()
    {
        return $this->date_test;
    }

    public function setDateTest($date_test)
    {
        $this->date_test = $date_test;
    }
}

?>
