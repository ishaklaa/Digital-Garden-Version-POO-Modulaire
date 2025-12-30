<?php
include_once "config\database.php";
include_once "src\Entity\Theme.php";

class Note
{
    protected $id;
    protected $contenu;
    protected $titre;
    protected $importance;
    protected $dateCreation;
    protected $theme;
    public function __construct($id = null, $contenu, $titre, $importance, $dateCreation = null)
    {
        $this->id = $id;
        $this->contenu = $contenu;
        $this->titre = $titre;
        $this->importance = $importance;
        $this->dateCreation = $dateCreation;
    }
    public function getId()
    {
        return $this->id;
    }
    public function getContenu()
    {
        return $this->contenu;
    }
    public function getTitre()
    {
        return $this->titre;
    }
    public function getImportance()
    {
        return $this->importance;
    }
    public function gettheme()
    {
        return $this->theme;
    }
    public function setId($id)
    {
        $this->id = $id;
    }
    public function setContenu($contenu)
    {
        $this->contenu = $contenu;
    }
    public function setTitre($titre)
    {
        $this->titre = $titre;
    }
    public function setImportance($importance)
    {
        $this->importance = $importance;
    }
    public function settheme($theme)
    {
        $this->theme = $theme;
    }
}
