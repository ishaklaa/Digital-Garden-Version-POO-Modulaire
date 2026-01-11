<?php
require_once __DIR__ . '/../../config/database.php';
class LoginService
{

    private $email;
    private $conn;
    private $password;

    public function __construct()
    {
        
        $this->conn = Database::getConnection();
    }

    public function __set($name, $value)
    {
        $this->$name = $value;
    }
    public function __get($name)
    {
        return $this->$name;
    }
    public function CheckDatabase($email)
    {
        $query = "SELECT * FROM users WHERE email = :email";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":email", $email);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        return $user;
    }

    public function CheckPassword($password, $hashedPassword)
    {
        return password_verify($password, $hashedPassword);
    }
}
