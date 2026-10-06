<?php
class reclamation
{
    private ?int $id_reclamation = null;
    private ?DateTime $date = null;
    private ?string $categorie_reclamation = null;
    private ?string $explication = null;
    private ?int $idEtudiant = null;
   
    public function __construct(?int $id, ?DateTime $d, ?string $cr, ?string $ex,?int $idE)
    {
        $this->id_reclamation = $id;
        $this->date = $d;
        $this->categorie_reclamation = $cr;
        $this->explication = $ex;
        $this->idEtudiant= $idE; 
    }

    /**
     * Get the value of id
     */
    public function getid_reclamation()
    {
        return $this->id_reclamation;
    }
    
    public function getdate() 
    {
        return $this->date;
    }

    /**
     * Set the value of dob
     *
     * @return  self
     */
    public function setdate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get the value of dob
     */
    public function getcategorie_reclamation()
    {
        return $this->categorie_reclamation;
    }

    /**
     * Set the value of dob
     *
     * @return  self
     */
    public function setcategorie_reclamation($categorie_reclamation)
    {
        $this->categorie_reclamation = $categorie_reclamation;

        return $this;
    }
/**
     * Get the value of dob
     */
    public function getexplication()
    {
        return $this->explication;
    }

    /**
     * Set the value of dob
     *
     * @return  self
     */
    public function setexplication($explication)
    {
        $this->explication = $explication;

        return $this;
    }

    public function getidEtudiant()
    {
        return $this->idEtudiant;
    }

    /**
     * Set the value of dob
     *
     * @return  self
     */
    public function setidEtudiant($idEtudiant)
    {
        $this->idEtudiant = $idEtudiant;

        return $this;
    }


}