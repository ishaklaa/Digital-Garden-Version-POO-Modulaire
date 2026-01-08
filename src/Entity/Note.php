<?php

include_once __DIR__ . "/Theme.php";

class Note
{
    protected $id;
    protected $contenu;
    protected $titre;
    protected $importance;
    protected $dateCreation;
    protected $theme;
    protected $statut;
    public function __construct($id = null, $contenu, $titre, $importance, $statut, $dateCreation = null)
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
    public function getStatut($statut)
    {
        return $this->statut;
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
    public function setStatut($statut)
    {
        return $this->statut = $statut;
    }
}
