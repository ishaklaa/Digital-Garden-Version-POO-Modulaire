<?php

require_once __DIR__ . "/../config/database.php";
require_once __DIR__ . "/../src/Note.php";

class NoteRepository
{
    private $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }
    public function create(Note $note)
    {
        $sql = "INSERT INTO notes ( titre, importance, contenu)
                VALUES ( :titre, :importance, :contenu)";

        $stmt = $this->pdo->prepare($sql);

        return $stmt->execute([
         
            ':titre'         => $note->getTitre(),
            ':importance'    => $note->getImportance(),
            ':contenu'       => $note->getContenu(),
            
        ]);
    }

    public function findById($id)
    {
        $sql = "SELECT * FROM notes WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':id' => $id]);

        $data = $stmt->fetch();

        if ($data) {
            return new Note(
                $data['theme_id'],
                $data['titre'],
                $data['importance'],
                $data['contenu'],
                $data['date_creation'],
                $data['id']
            );
        }
        return null;
    }
    public function findByTheme($theme_id)
    {
        $sql = "SELECT * FROM notes WHERE theme_id = :theme_id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':theme_id' => $theme_id]);

        $notes = [];

        while ($row = $stmt->fetch()) {
            $notes[] = new Note(
                $row['theme_id'],
                $row['titre'],
                $row['importance'],
                $row['contenu'],
                $row['date_creation'],
                $row['id']
            );
        }

        return $notes;
    }
    public function update(Note $note)
    {
        $sql = "UPDATE notes
                SET titre = :titre,
                    importance = :importance,
                    contenu = :contenu
                WHERE id = :id";

        $stmt = $this->pdo->prepare($sql);

        return $stmt->execute([
            ':titre'      => $note-> getTitre(),
            ':importance' => $note->getImportance(),
            ':contenu'    => $note->getContenu(),
            ':id'         => $note->getId()
        ]);
    }

   
    public function delete($id)
    {
        $sql = "DELETE FROM notes WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);

        return $stmt->execute([':id' => $id]);
    }
}
