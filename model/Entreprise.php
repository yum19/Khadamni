<?php
class Entreprise
{
    private ?int $idE = null;
    private ?string $nomEntreprise = null;
    private ?string $adresse = null;
    private ?DateTime $dateCreation = null;
    private ?int $telephoneEn = null;
    private ?string $descriptionE = null;
    private ?string $emailEn = null;
    private ?string $MDPEn = null;
    
    
    public function __construct($idE, $nomEntreprise, $adresse, $dateCreation,  $telephoneEn,  $descriptionE,  $emailEn, $MDPEn)
    {
        $this->idE = $idE;
        $this->nomEntreprise = $nomEntreprise;
        $this->adresse = $adresse;
        $this->dateCreation = new DateTime($dateCreation);
        $this->telephoneEn = $telephoneEn;
        $this->descriptionE = $descriptionE;
        $this->emailEn = $emailEn;
        $this->MDPEn = $MDPEn;
        
}

    /**
     * Get the value of idEntreprise
     */
    public function getIdEntreprise()
    {
        return $this->idE;
    }
    public function setId($idE)
    {
        $this->idE = $idE;
        return $this;
    }

    /**
     * Get the value of nomEntreprise
     */
    public function getNomEntreprise()
    {
        return $this->nomEntreprise;
    }

    /**
     * Set the value of nomEntreprise
     *
     * @return  self
     */
    public function setNomEntreprise($nomEntreprise)
    {
        $this->nomEntreprise = $nomEntreprise;

        return $this;
    }

    /**
     * Get the value of adresse
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * Set the value of adresse
     *
     * @return  self
     */
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;

        return $this;
    }
    /**
     * Get the value of dateCreation
     */
    public function getDateCreation()
    {
        return $this->dateCreation;
    }

    /**
     * Set the value of dateCreation
     *
     * @return  self
     */
    public function setDateCreation($dateCreation)
    {
        $this->dateCreation = $dateCreation;

        return $this;
    }

    /**
     * Get the value of telephone1
     */
    public function getTelephone1()
    {
        return $this->telephoneEn;
    }

    /**
     * Set the value of telephone1
     *
     * @return  self
     */
    public function setTelephone1($telephoneEn)
    {
        $this->telephoneEn = $telephoneEn;

        return $this;
    }

    public function getDescription()
    {
        return $this->descriptionE;
    }

    /**
     * Set the value of nomEntreprise
     *
     * @return  self
     */
    public function setDescription($descriptionE)
    {
        $this->descriptionE = $descriptionE;

        return $this;
    }

    
    /**
     * Get the value of email
     */
    public function getEmail()
    {
        return $this->emailEn;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */
    public function setEmail($emailEn)
    {
        $this->emailEn = $emailEn;

        return $this;
    }

    
    /**
     * Get the value of MDPEn
     */
    public function getMDP()
    {
        return $this->MDPEn;
    }

    /**
     * Set the value of MDPEn
     *
     * @return  self
     */
    public function setMDP($MDPEn)
    {
        $this->MDPEn = $MDPEn;

        return $this;
    }
}


