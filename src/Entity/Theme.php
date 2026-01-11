<?php
class Theme
{

    private $id;

    private $title;

    private $couleur;
    private $user_id;
    private $privacy;

   

    public function __construct($title, $couleur, $user_id, $privacy,$id = null)
    {
        $this->title = $title;
        $this->couleur = $couleur;
        $this->user_id= $user_id;
        $this->privacy= $privacy;
    }
    public function setId($id)
    {
        $this->id = $id;
    }
    public function setTitle( $value)
    {
        $this->title = $value;
    }
    public function setColor( $value)
    {
        $this->couleur = $value;
    }
    public function setUser_id($user_id){
        $this->user_id= $user_id;
    }
    
    public function getId()
    {
        return $this->id;
    }
    public function getTiltle()
    {
        return $this->title;
    }
    public function getColor()
    {
        return $this->couleur;
    }
     public function getPrivacy()
    {
        return $this->privacy;
    } public function getUser_id()
    {
        return $this->user_id;
    }
    
}
