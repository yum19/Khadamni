<?php
class Participation
{
    private ?int $idParticipation = null;
    private ?int $idEvenement=null;
    private ?int $idEtudiant = null;
    private ?string $nomE = null;
    private ?string $prenomE = null;
    private ?int $telephoneE = null;
    private ?int $age = null;
    private ?string $emailE = null;
    private ?string $MDPE = null;
    public function __construct($id=NULL,$idEvenement,$idEtudiant,$nomE,$prenomE,$telephoneE,$age,$emailE,$MDPE)
    {
        $this->idParticipation = $id;
        $this->idEtudiant = $idEtudiant;
        $this->idEvenement =$idEvenement;
        $this->nomE =$nomE;
        $this->prenomE=$prenomE;
        $this->telephoneE =$telephoneE;
        $this->age = $age;
        $this->emailE = $emailE;
        $this->MDPE =$MDPE;

    }
    // Getters
    public function getIdParticipation()
    {
        return $this->idParticipation;
    }

    public function getIdEtudiant()
    {
        return $this->idEtudiant;
    }
    public function getIdEvenement()
    {
        return $this->idEtudiant;
    }

    public function getNomE()
    {
        return $this->nomE;
    }

    public function getPrenomE()
    {
        return $this->prenomE;
    }

    public function getTelephoneE()
    {
        return $this->telephoneE;
    }

    public function getAge()
    {
        return $this->age;
    }

    public function getEmailE()
    {
        return $this->emailE;
    }

    public function getMDPE()
    {
        return $this->MDPE;
    }

    // Setters
    public function setIdParticipation(?int $idParticipation)
    {
        $this->idParticipation = $idParticipation;
    }

    public function setIdEtudiant(?int $idEtudiant)
    {
        $this->idEtudiant = $idEtudiant;
    }

    public function setNomE(?string $nomE)
    {
        $this->nomE = $nomE;
    }

    public function setPrenomE(?string $prenomE)
    {
        $this->prenomE = $prenomE;
    }

    public function setTelephoneE(?int $telephoneE)
    {
        $this->telephoneE = $telephoneE;
    }

    public function setAge(?int $age)
    {
        $this->age = $age;
    }

    public function setEmailE(?string $emailE)
    {
        $this->emailE = $emailE;
    }

    public function setMDPE(?string $MDPE)
    {
        $this->MDPE = $MDPE;
    }
}

    


