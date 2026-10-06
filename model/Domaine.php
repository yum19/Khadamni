<?php
class Domaine
{
    private ?int $id_dom = null;
    private ?string $domaine_informatique = null;


    public function __construct($id_dom = null, $domaine_informatique)
{
    $this->id_dom = $id_dom;
    $this->domaine_informatique = $domaine_informatique;
    
}
    /**
     * Get the value of id
     */
    public function getid_dom()
    {
        return $this->id_dom;
    }
   
    /**
     * Get the value of lastName
     */
    public function getdomaine_informatique()
    {
        return $this->domaine_informatique;
    }

    /**
     * Set the value of lastName
     *
     * @return  self
     */
    public function setdomaine_informatique($domaine_informatique)
    {
        $this->domaine_informatique = $domaine_informatique;

        return $this;
    }

}
