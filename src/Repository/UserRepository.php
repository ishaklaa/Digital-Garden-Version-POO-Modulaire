<?php
require_once __DIR__ . '/../../config/database.php';
require_once __DIR__ . '/../Entity/User.php';
class UserRepository
{
    private $conn;
    public function __construct()
    {
        $this->conn = Database::getConnection();
    }

    public function addUser($user)
    {
        //$user->setRole(new Role("user"))
        $role_id = $this->getRoleId($user->getRole()->getName());
        $query = "insert into users (name,password,email,status,role_id) values (:username,:PASSWORD,:email,:statut,:role_id)";
        $stmt = $this->conn->prepare($query);
        $username = $user->getUsername();
        $password = $user->getPassword();
        $email = $user->getEmail();
        $statut = $user->getStatut();
        $stmt->bindParam(":username", $username);
        $stmt->bindParam(":PASSWORD", $password);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":role_id", $role_id);
        $stmt->bindParam(":statut", $statut);
        $stmt->execute();
    }
    public function getRoleId($roleString)
    {
        $query = "select id from roles where title = '$roleString' ";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $role_id = $result["id"];
        return $role_id;
    }
    public function updateUser($nom, $password, $email, $emailup)
    {
        $query = "select id from users where email =$email";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $id = $result["id"];
        $query2 = "UPDATE users SET nom = $nom, PASSWORD = $password,email=$emailup WHERE id= $id";
        $stmt = $this->conn->prepare($query2);
        $stmt->execute();
    }
    public function deleteUser($email)
    {
        $query = "select id from users where email =$email";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $id = $result["id"];
        $query2 = "delete from users where id =$id ";
        $stmt = $this->conn->prepare($query2);
        $stmt->execute();
    }
    public function showAllUsers()
    {
        $query = "select * from users ";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $users_array = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $users = [];
        foreach ($users_array as $user) {
            $users[] = new user($user["name"], $user["email"], $user["password"], $user["id"]);
        }
        return $users;
    }
    public function updateUserStatus($selectedStatu,$id)
    {
        // $id=$user->getId();
        $query = "UPDATE users SET status = '$selectedStatu'  WHERE id = $id";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
    }
}
