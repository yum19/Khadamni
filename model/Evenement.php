<?php
class Evenement
{
    private ?int $idEvenement = null;
    private ?string $nomEvenement = null;
    private ?string $adresseEVN = null;
    private ?dateTime $dateEVN = null;
    private ?string $idCategorieEVN = null;
    private ?string $ancienneAdresseEVN= null;
    private ?dateTime $ancienneDateEVN = null;
    private ?int $idE = null;
    public function __construct($id=NULL, $nom, $adresseEVN,$dateEVN,$idCategorieEVN,$ancienneAdresseEVN,$ancienneDateEVN,$idE)
    {
        $this->idEvenement = $id;
        $this->nomEvenement = $nom;
        $this->adresseEVN = $adresseEVN;
        $this->dateEVN = $dateEVN;
        $this->idCategorieEVN = $idCategorieEVN;
        $this->ancienneAdresseEVN =$ancienneAdresseEVN;
        $this->ancienneDateEVN = $ancienneDateEVN;
        $this->idE = $idE;
    } 

    /**
     * Get the value of idEvenement
     */
    public function getIdEvenement()
    {
        return $this->idEvenement;
    }

    /**
     * Get the value of nomEvenement
     */
    public function getNomEvenement()
    {
        return $this->nomEvenement;
    }

    /**
     * Set the value of nomEvenement
     *
     * @return  self
     */
    public function setNomEvenement($nomEvenement)
    {
        $this->nomEvenement = $nomEvenement;

        return $this;
    }

    /**
     * Get the value of adresseEVN
     */
    public function getAdresseEVN()
    {
        return $this->adresseEVN;
    }

    /**
     * Set the value of adresseEVN
     *
     * @return  self
     */
    public function setAdresseEVN($adresseEVN)
    {
        $this->adresseEVN = $adresseEVN;

        return $this;
    }

    /**
     * Get the value of dateEVN
     */
    public function getDateEVN()
    {
        return $this->dateEVN;
    }

    /**
     * Set the value of dateEVNCreation
     *
     * @return  self
     */
    public function setDateEVN($dateEVN)
    {
        $this->dateEVN = $dateEVN;

        return $this;
    }
    /**
     * Get the value of CategorieEVN
     */
    public function getIdCategorieEVN()
    {
        return $this->idCategorieEVN;
    }

    /**
     * Set the value of CategorieEVN
     *
     * @return  self
     */
    public function setIdCategorieEVN($idCategorieEVN)
    {
        $this->idCategorieEVN = $idCategorieEVN;

        return $this;
    }
    public function getAncienneAdresseEVN()
    {
        return $this->ancienneAdresseEVN;
    }

    /**
     * Set the value of adresseEVN
     *
     * @return  self
     */
    public function setAncienneAdresseEVN($ancienneAdresseEVN)
    {
        $this->ancienneAdresseEVN = $ancienneAdresseEVN;

        return $this;
    }

    /**
     * Get the value of dateEVN
     */
    public function getAncienneDateEVN()
    {
        return $this->ancienneDateEVN;
    }

    /**
     * Set the value of dateEVNCreation
     *
     * @return  self
     */
    public function setAncienneDateEVN($ancienneDateEVN)
    {
        $this->ancienneDateEVN= $ancienneDateEVN;

        return $this;
    }
    public function getidE()
    {
        return $this->idE;
    }

    /**
     * Set the value of CategorieEVN
     *
     * @return  self
     */
    public function setidE($idE)
    {
        $this->idE=$idE;

        return $this;
    }
}

