<?php
class reponse
{
    private ?int $id_reponse = null;
    private ?string $reponse = null;
    private ?int $id_reclamation = null;
   
    public function __construct(?string $reponse, ?int $id_reclamation)
    {
        //$this->id_reponse = $id_reponse;
        $this->reponse = $reponse;
        $this->id_reclamation = $id_reclamation;
    }

    /*public function getid_reponse()
    {
        return $this->id_reponse;
    }
    */
    public function getreponse()
    {
        return $this->reponse;
    }

    public function setreponse($reponse)
    {
        $this->reponse = $reponse;
        return $this;
    }

    public function getid_reclamation()
    {
        return $this->id_reclamation;
    }

    public function setid_reclamation($id_reclamation)
    {
        $this->id_reclamation = $id_reclamation;
        return $this;
    }
}
?>
