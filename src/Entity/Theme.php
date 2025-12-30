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
    public function __setName($nom, $value)
    {
        $this->$nom = $value;
    }
    public function __setColor($couleur, $value)
    {
        $this->$couleur = $value;
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
