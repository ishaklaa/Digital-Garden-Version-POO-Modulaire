<?php
require_once __DIR__ . "/../../config/database.php";
require_once __DIR__ . "/../Entity/Theme.php";

class ThemeRepository
{
    private $conn;

    public function __construct()
    {
        $this->conn = Database::getConnection();
    }
    public function create($theme)
    {
        $sql = "INSERT INTO themes (title, color, user_id,visibility)
                VALUES (:nom, :couleur, :user_id,:visibility)";
        $stmt = $this->conn->prepare($sql);
        $title = $theme->getTiltle();
        $color = $theme->getColor();
        $privacy = $theme->getPrivacy();
        $userId = $theme->getUser_id();
        $stmt->bindParam(":nom", $title);
        $stmt->bindParam(":couleur", $color);    
        $stmt->bindParam(":user_id", $userId);
        $stmt->bindParam(":visibility", $privacy);
        $stmt->execute();
        
    }

       
    
    public function findById($id)
    {
        $sql = "SELECT * FROM themes WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':id' => $id]);

        $data = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($data) {
            return new Theme(
                $data['title'],
                $data['color'],
                $data['user_id'],
                $data['id']
            );
        }
        return null;
    }
    public function findByUser($user_id)
    {
        $sql = "SELECT * FROM themes WHERE user_id = :user_id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':user_id' => $user_id]);

        $themes = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $themes[] = new Theme(
                $row['Title'],
                $row['color'],
                $row['user_id'],
                $row['visibility']
            );
        }

        return $themes;
    }

    public function update(Theme $theme)
    {
        $sql = "UPDATE themes
                SET nom = :nom, couleur = :couleur
                WHERE id = :id";
        $stmt = $this->conn->prepare($sql);

        return $stmt->execute([
            ':nom' => $this->$theme->nom,
            ':couleur' => $this->$theme->couleur,
            ':id' => $this->$theme->id
        ]);
    }

    public function delete($id)
    {
        $sql = "DELETE FROM themes WHERE id = :id";
        $stmt = $this->conn->prepare($sql);

        return $stmt->execute([':id' => $id]);
    }

    
}



