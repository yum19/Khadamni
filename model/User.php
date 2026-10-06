<?php
class User
{
    private ?int $idR = null;
    private ?string $nomR = null;
    private ?string $prenomR = null;
    private ?int $telephoneR = null;
    private ?DateTime $dateR = null;
    private ?string $emailR = null;
    private ?string $MDPR = null;

    public function __construct($idR, $nomR, $prenomR, $telephoneR, $dateR, $emailR, $MDPR)
    {
        $this->idR = $idR;
        $this->nomR = $nomR;
        $this->prenomR = $prenomR;
        $this->telephoneR = $telephoneR;
        $this->dateR = new DateTime($dateR); // Correction ici
        $this->emailR = $emailR;
        $this->MDPR = $MDPR;
    }

    public function getId()
    {
        return $this->idR;
    }

    public function setId($idR)
    {
        $this->idR = $idR;
        return $this;
    }

    public function getNom()
    {
        return $this->nomR;
    }

    public function setNom($nomR)
    {
        $this->nomR = $nomR;
        return $this;
    }

    public function getPrenom()
    {
        return $this->prenomR;
    }

    public function setPrenom($prenom)
    {
        $this->prenomR = $prenom;
        return $this;
    }

    public function getTelephone()
    {
        return $this->telephoneR;
    }

    public function setTelephone($telephoneR)
    {
        $this->telephoneR = $telephoneR;
        return $this;
    }

    public function getDateNaissance()
    {
        return $this->dateR;
    }

    public function setDateNaissance($dateR)
    {
        $this->dateR = new DateTime($dateR); // Correction ici
        return $this;
    }

    public function getEmail()
    {
        return $this->emailR;
    }

    public function setEmail($emailR)
    {
        $this->emailR = $emailR;
        return $this;
    }

    public function getMDP()
    {
        return $this->MDPR;
    }

    public function setMDP($MDPR)
    {
        $this->MDPR = $MDPR;
        return $this;
    }
}
?>
