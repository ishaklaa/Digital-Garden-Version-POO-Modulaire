<?php
class Theme
{

    private $id;

    private $nom;

    private $couleur;

    public function __construct($id=null ,$nom, $couleur)
    {
        $this->nom = $nom;
        $this->couleur = $couleur;
    }
     public function setId($id)
    {
        $this->id = $id;
    }
    public function __setName($nom, $value)
    {
        $this->$nom = $value;
    }
    public function __setColor($couleur, $value)
    {
        $this->$couleur = $value;
        
    }
    public function getId()
    {
        return $this->id;
    }
    public function __getName($nom)
    {
        return $this->$nom;
    }
    public function __getColor($couleur)
    {
        return $this->$couleur;
    }
}
