<?php
class categorieevn
{
    private ?int $idCategorieEVN = null;
    private ?string $nomCategorieEVN = null;
    public function __construct($nomCategorieEVN, $idCategorieEVN = NULL)
    {
        $this->idCategorieEVN = $idCategorieEVN;
        $this->nomCategorieEVN = $nomCategorieEVN;
    }

    /**
     * Get the value of idCategorieEVN
     */
    public function getIdCategorieEVN()
    {
        return $this->idCategorieEVN;
    }

    /**
     * Get the value of nomCategorieEVN
     */
    public function getNomCategorieEVN()
    {
        return $this->nomCategorieEVN;
    }

    /**
     * Set the value of nomCategorieEVN
     *
     * @return  self
     */
    public function setNomCategorieEVN($nomCategorieEVN)
    {
        $this->nomCategorieEVN = $nomCategorieEVN;

        return $this;
    }
}
?>

