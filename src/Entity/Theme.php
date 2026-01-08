<?php
class Theme
{

    private $id;

    private $nom;

    private $couleur;

    private $statut;

    public function __construct($nom, $couleur, $statut, $id = null)
    {
        $this->nom = $nom;
        $this->couleur = $couleur;
    }
    public function setId($id)
    {
        $this->id = $id;
    }
    public function setName($nom, $value)
    {
        $this->$nom = $value;
    }
    public function setColor($couleur, $value)
    {
        $this->$couleur = $value;
    }
    public function setStatut($statut)
    {
        return $this->statut = $statut;
    }
    public function getId()
    {
        return $this->id;
    }
    public function getName($nom)
    {
        return $this->$nom;
    }
    public function getColor($couleur)
    {
        return $this->$couleur;
    }
    public function getStatut($statut)
    {
        return $this->statut;
    }
}
