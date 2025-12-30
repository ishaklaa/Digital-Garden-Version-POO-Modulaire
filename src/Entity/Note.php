<?php
include_once "config\database.php";
include_once "src\Entity\Theme.php";
 
class Note {
    protected $id;
    protected $contenu;
    protected $titre;
    protected $importance;
    protected $dateCreation;
    protected $theme_id;
    public function __construct($id=null,$contenu,$titre,$importance,$dateCreation=null,$theme_id)
    {
        $this->id=$id;
        $this->contenu=$contenu;
        $this->titre=$titre;
        $this->importance=$importance;
        $this->dateCreation=$dateCreation;
        $this->theme_id;

    }
    public function getId(){
      return $this->id;
    }
    public function getContenu(){
        return $this->contenu;
    }
    public function getTitre(){
        return $this->titre;
    }
    public function getImportance(){
        return $this->importance;
    }
    public function theme_id(){
        return $this->theme_id;

    }
}