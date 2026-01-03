<?php
require_once __DIR__ . "/config/database.php";
require_once __DIR__ . "../src/Theme.php";

class ThemeRepository
{
    private $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }
    public function create(Theme $theme)
    {
        $sql = "INSERT INTO themes (nom, couleur, user_id)
                VALUES (:nom, :couleur, :user_id)";
        $stmt = $this->pdo->prepare($sql);

        return $stmt->execute([
            ':nom' => $this->$theme->nom,
            ':couleur' => $this->$theme->couleur,
            ':user_id' => $this->$theme->user_id
        ]);
    }
    public function findById($id)
    {
        $sql = "SELECT * FROM themes WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':id' => $id]);

        $data = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($data) {
            return new Theme(
                $data['nom'],
                $data['couleur'],
                $data['user_id'],
                $data['id']
            );
        }
        return null;
    }
    public function findByUser($user_id)
    {
        $sql = "SELECT * FROM themes WHERE user_id = :user_id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':user_id' => $user_id]);

        $themes = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $themes[] = new Theme(
                $row['nom'],
                $row['couleur'],
                $row['user_id'],
                $row['id']
            );
        }

        return $themes;
    }

    public function update(Theme $theme)
    {
        $sql = "UPDATE themes
                SET nom = :nom, couleur = :couleur
                WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);

        return $stmt->execute([
            ':nom' => $this->$theme->nom,
            ':couleur' => $this->$theme->couleur,
            ':id' => $this->$theme->id
        ]);
    }

    public function delete($id)
    {
        $sql = "DELETE FROM themes WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);

        return $stmt->execute([':id' => $id]);
    }

    
}



