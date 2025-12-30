<?php
include_once "config\database.php";
class User {
    protected $id;
    protected $username;
    protected $password;
    protected $date_inscription;
    protected $role;
    public function __construct($id,$username,$password,$role,$date_inscription=null)
    {
        $this->id=$id;
        $this->username=$username;
        $this->password=$password;
        $this->date_inscription=$date_inscription;
        $this->role= $role;
        

    }
    public function getId(){
        return $this->id;
    }
    public function getUsername(){
        return $this->username;
    }
    public function getPassword(){
        return $this->password;
    }
    public function getDate_inscription(){
        return $this->date_inscription;
    }
    public function getRole_name(){
        // return $this->role_name;
    }
    
}