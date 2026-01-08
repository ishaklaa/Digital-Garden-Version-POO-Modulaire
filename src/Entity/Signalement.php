<?php
class Signalement
{
    private $id;
    private $elementType;
    private $raison;

    public function __construct($elementType, $raison, $id = null)
    {
        $this->id = $id;
        $this->elementType = $elementType;
        $this->raison = $raison;
    }
    public function getId()
    {
        return $this->id;
    }
    public function getElementType()
    {
        return $this->elementType;
    }
    public function getElementTypeRaison($raison)
    {
        $this->$raison;
    }
    public function setId($id)
    {
        $this->id = $id;
    }
    public function setElementType($elementType)
    {
        $this->elementType = $elementType;
    }
    public function setRaison($raison)
    {
        $this->raison = $raison;
    }
}
