<?php
class Offre
{
    private ?int $id_o = null;
    private ?int $id_dom = null;
    private ?string $titre = null;
    private ?string $description_o = null;
    private ?string $type_o = null;
    private ?int $idE = null;
    private ?string $lieu = null;
    private ?DateTime $date_publication = null;
    private ?DateTime $date_limite = null;
    private ?int $contact = null;
    private ?string $status_o = null;

    public function __construct($id_o, $id_dom, $titre, $description_o, $type_o, $idE, $lieu, $date_publication, $date_limite, $contact, $status_o)
    {
        $this->id_o = $id_o;
        $this->id_dom = $id_dom;
        $this->titre = $titre;
        $this->description_o = $description_o;
        $this->type_o = $type_o;
        $this->idE = $idE;
        $this->lieu = $lieu;
        $this->date_publication = $date_publication;
        $this->date_limite = $date_limite;
        $this->contact = $contact;
        $this->status_o = $status_o;
    }

    /**
     * Get the value of id
     */
    public function getid_o()
    {
        return $this->id_o;
    }
   
    /**
     * Get the value of lastName
     */
    public function getid_dom()
    {
        return $this->id_dom;
    }

    /**
     * Set the value of lastName
     *
     * @return  self
     */
    public function setid_dom($id_dom)
    {
        $this->id_dom = $id_dom;

        return $this;
    }

    /**
     * Get the value of firstName
     */
    public function gettitre()
    {
        return $this->titre;
    }

    /**
     * Set the value of firstName
     *
     * @return  self
     */
    public function settitre($titre)
    {
        $this->titre = $titre;

        return $this;
    }

    /**
     * Get the value of email
     */
    public function getdescription_o()
    {
        return $this->description_o;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */
    public function setdescription_o($description_o)
    {
        $this->description_o = $description_o;

        return $this;
    }

    /**
     * Get the value of dob
     */
    public function gettype_o()
    {
        return $this->type_o;
    }

    /**
     * Set the value of dob
     *
     * @return  self
     */
    public function settype_o($type_o)
    {
        $this->type_o = $type_o;

        return $this;
    }



    public function getidE()
    {
        return $this->idE;
    }

    /**
     * Set the value of dob
     *
     * @return  self
     */
    public function setidE($idE)
    {
        $this->idE = $idE;

        return $this;
    }

    public function getlieu()
    {
        return $this->lieu;
    }

    /**
     * Set the value of dob
     *
     * @return  self
     */
    public function setlieu($lieu)
    {
        $this->lieu = $lieu;

        return $this;
    }

    public function getdate_publication()
    {
        return $this->date_publication;
    }

    /**
     * Set the value of dob
     *
     * @return  self
     */
    public function setdate_publication($date_publication)
    {
        $this->date_publication= $date_publication;

        return $this;
    }

    public function getdate_limite()
    {
        return $this->date_limite;
    }

    /**
     * Set the value of dob
     *
     * @return  self
     */
    public function setdate_limite($date_limite)
    {
        $this->date_limite = $date_limite;

        return $this;
    }
    public function getcontact ()
    {
        return $this->contact ;
    }

    /**
     * Set the value of dob
     *
     * @return  self
     */
    public function setcontact ($contact )
    {
        $this->contact  = $contact ;

        return $this;
    }

    public function getstatus_o()
    {
        return $this->status_o;
    }

    /**
     * Set the value of dob
     *
     * @return  self
     */
    public function setstatus_o($status_o)
    {
        $this-> status_o= $status_o;

        return $this;
    }
}
