<?php

require_once __DIR__ . "/role.php";

class User
{
    protected $id;
    protected $username;
    protected $email;
    protected $password;
    protected $date_inscription;
    protected role $role;
    protected $statut = "en attente";

    public function __construct( $username,$email, $password,$id=null, $date_inscription = null)
    {
        $this->id = $id;
        $this->email=$email;
        $this->username = $username;
        $this->password = $password;
        $this->date_inscription = $date_inscription;
        
    }
    public function getId()
    {
        return $this->id;
    }
    public function getUsername()
    {
        return $this->username;
    }
    public function getEmail()
    {
        return $this->email;
    }
    public function getPassword()
    {
        return $this->password;
    }
    public function getDate_inscription()
    {
        return $this->date_inscription;
    }
    public function getRole()
    {
        return $this->role;
    }
    public function getStatut(){
        return $this->statut;
    }
    public function setRole($role)
    {
        $this->role = $role;
    }
    
    public function setId($id)
    {
        $this->id = $id;
    }
    public function setUsername($username)
    {
        $this->username = $username;
    }
    public function setEmail($email)
    {
       $this->email=$email;
    }
    public function setPassword($password)
    {
        $this->password = $password;
    }
    public function setDate_inscription($date_inscription)
    {
        $this->date_inscription = $date_inscription;
    }
    public function setStatut($statut){
        return $this->statut=$statut;
    }
}
