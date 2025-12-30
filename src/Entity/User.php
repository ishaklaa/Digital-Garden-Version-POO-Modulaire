<?php
include_once "config\database.php";
include_once "src\Entity\role.php";
class User
{
    protected $id;
    protected $username;
    protected $password;
    protected $date_inscription;
    protected role $role;

    public function __construct($id, $username, $password, $date_inscription = null)
    {
        $this->id = $id;
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
    public function setPassword($password)
    {
        $this->password = $password;
    }
    public function setDate_inscription($date_inscription)
    {
        $this->date_inscription = $date_inscription;
    }
}
