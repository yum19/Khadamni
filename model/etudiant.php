<?php
class User
{
    private ?int $idEtudiant = null;
    private ?string $nomE = null;
    private ?string $prenomE = null;
    private ?int $telephoneE = null;
    private ?int $age = null;
    private ?string $emailE = null;
    private ?string $MDPE = null;
    private ?string $block = null;
    public function __construct($idEtudiant, $nomE, $prenomE, $telephoneE, $age, $emailE, $MDPE, $block)
    {
        $this->idEtudiant = $idEtudiant;
        $this->nomE = $nomE;
        $this->prenomE = $prenomE;
        $this->telephoneE = $telephoneE;
        $this->age = $age; // Correction ici
        $this->emailE = $emailE;
        $this->MDPE = $MDPE;
        $this->block = $block; 
    }

    public function getId()
    {
        return $this->idEtudiant;
    }

    public function setId($idEtudiant)
    {
        $this->idEtudiant = $idEtudiant;
        return $this;
    }

    public function getNom()
    {
        return $this->nomE;
    }

    public function setNom($nomE)
    {
        $this->nomE = $nomE;
        return $this;
    }

    public function getPrenom()
    {
        return $this->prenomE;
    }

    public function setPrenom($prenomE)
    {
        $this->prenomE = $prenomE;
        return $this;
    }

    public function getTelephone()
    {
        return $this->telephoneE;
    }

    public function setTelephone($telephoneE)
    {
        $this->telephoneE = $telephoneE;
        return $this;
    }

    public function getDateNaissance()
    {
        return $this->age;
    }

    public function setDateNaissance($age)
    {
        $this->age = $age; // Correction ici
        return $this;
    }

    public function getEmail()
    {
        return $this->emailE;
    }

    public function setEmail($emailE)
    {
        $this->emailE = $emailE;
        return $this;
    }

    public function getMDP()
    {
        return $this->MDPE;
    }

    public function setMDP($MDPE)
    {
        $this->MDPE = $MDPE;
        return $this;
    }
    public function getBlock()
    {
        return $this->block;
    }

    public function setBlock($block)
    {
        $this->block = $block;
        return $this;
    }
}
?>
