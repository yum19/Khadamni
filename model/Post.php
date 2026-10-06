<?php
class Post
{
    private ?int $ID_Post=null;
    private ?string $Titre;
    private ?string $Contenu;
    private ?string $Auteur;
    private ?DateTime $Date_Publication;
    private ?string $Tags;
    private ?int $Likes;
    private ?int $Dislikes;
    private ?int $Commentaires;
    private ?string $Image;

    public function __construct($ID_Post=null,$Titre,$Contenu,$Auteur,$Date_Publication,$Tags,$Likes,$Dislikes,$Commentaires,$Image)
    {
        $this->ID_Post=$ID_Post;
        $this->Titre=$Titre;
        $this->Contenu=$Contenu;
        $this->Auteur=$Auteur;
        $this->Date_Publication=$Date_Publication;
        $this->Tags=$Tags;
        $this->Likes=$Likes;
        $this->Dislikes=$Dislikes;
        $this->Commentaires=$Commentaires;
        $this->Image=$Image;
    }
    public function getID_Post(){return $this->ID_Post;}
    public function getTitre(){return $this->Titre;}
    public function getContenu(){return $this->Contenu;}
    public function getAuteur(){return $this->Auteur;}
    public function getDate_Publication(){return $this->Date_Publication;}
    public function getTags(){return $this->Tags;}
    public function getLikes(){return $this->Likes;}
    public function getDislikes(){return $this->Dislikes;}
    public function getCommentaires(){return $this->Commentaires;}
    public function getImage(){return $this->Image;}

    public function setTitre(string $val){$this->Titre=$val;}
    public function setContenu(string $val){$this->Contenu=$val;}
    public function setAuteur(string $val){$this->Auteur=$val;}
    public function setDate_Publication(DateTime $val){$this->Date_Publication=$val;}
    public function setTags(string $val){$this->Tags=$val;}
    public function setLikes(int $val){$this->Likes=$val;}
    public function setDislikes(int $val){$this->Dislikes=$val;}
    public function setCommentaires(int $val){$this->Commentaires=$val;}
    public function setImage(string $val){$this->Image=$val;}
} 
?>