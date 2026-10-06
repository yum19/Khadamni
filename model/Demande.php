<?php
class Demande
{
    private ?int $id_d = null;
    private ?int $idEtudiant = null;
    private ?string $nom_d = null;
    private ?string $prenom_d = null;
    private ?string $email_d = null;
    private ?string $telephone_d = null;
    private ?string $cv_d = null;
    private ?string $lettre_motivation = null;
    private ?int $id_o = null;
    private ?DateTime $date_d = null;
    private ?string $status_d  = null;




    public function __construct(?int $id_d, ?int $idEtudiant, ?string $nom_d, ?string $prenom_d, ?string $email_d,?string $telephone_d, ?string $cv_d, ?string $lettre_motivation, ?int $id_o, ?DateTime $date_d, ?string $status_d)
    {
        $this->id_d = $id_d;
        $this->idEtudiant = $idEtudiant;
        $this->nom_d = $nom_d;
        $this->prenom_d = $prenom_d;
        $this->email_d = $email_d;
        $this->telephone_d = $telephone_d;
        $this->cv_d = $cv_d;
        $this->lettre_motivation = $lettre_motivation;
        $this->id_o = $id_o;
        $this->date_d = $date_d;
        $this->status_d = $status_d;
    }
    


    /**
     * Get the value of id
     */
    public function getid_d()
    {
        return $this->id_d;
    }
   
    /**
     * Get the value of lastName
     */
    public function getidEtudiant()
    {
        return $this->idEtudiant;
    }

    /**
     * Set the value of lastName
     *
     * @return  self
     */
    public function setidEtudiant($idEtudiant)
    {
        $this->idEtudiant = $idEtudiant;

        return $this;
    }

    /**
     * Get the value of firstName
     */
    public function getnom_d()
    {
        return $this->nom_d;
    }

    /**
     * Set the value of firstName
     *
     * @return  self
     */
    public function setnom_d($nom_d)
    {
        $this->nom_d = $nom_d;

        return $this;
    }

    /**
     * Get the value of email
     */
    public function getprenom_d()
    {
        return $this->prenom_d;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */
    public function setprenom_d($prenom_d)
    {
        $this->prenom_d = $prenom_d;

        return $this;
    }

    /**
     * Get the value of dob
     */
    public function getemail_d()
    {
        return $this->email_d;
    }

    /**
     * Set the value of dob
     *
     * @return  self
     */
    public function setemail_d($email_d)
    {
        $this->email_d = $email_d;

        return $this;
    }



    public function gettelephone_d()
    {
        return $this->telephone_d;
    }

    /**
     * Set the value of dob
     *
     * @return  self
     */
    public function settelephone_d($telephone_d)
    {
        $this->telephone_d= $telephone_d;

        return $this;
    }

    public function getcv_d()
    {
        return $this->cv_d;
    }

    /**
     * Set the value of dob
     *
     * @return  self
     */
    public function setcv_d($cv_d)
    {
        $this->cv_d = $cv_d;

        return $this;
    }

    public function getlettre_motivation()
    {
        return $this->lettre_motivation;
    }

    /**
     * Set the value of dob
     *
     * @return  self
     */
    public function setlettre_motivation($lettre_motivation)
    {
        $this->lettre_motivation= $lettre_motivation;

        return $this;
    }

    public function getid_o ()
    {
        return $this->id_o ;
    }

    /**
     * Set the value of dob
     *
     * @return  self
     */
    public function setid_o ($id_o )
    {
        $this->id_o  = $id_o ;

        return $this;
    }
    public function getdate_d ()
    {
        return $this->date_d ;
    }

    /**
     * Set the value of dob
     *
     * @return  self
     */
    public function setdate_d ($date_d )
    {
        $this->date_d  = $date_d ;

        return $this;
    }

    public function getstatus_d()
    {
        return $this->status_d;
    }

    /**
     * Set the value of dob
     *
     * @return  self
     */
    public function setstatus_d($status_d)
    {
        $this-> status_d= $status_d;

        return $this;
    }
}
