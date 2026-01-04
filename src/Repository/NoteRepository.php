<?php

require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../src/Note.php';

class NoteRepository
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function create(Note $note): bool
    {
        $sql = "INSERT INTO notes (theme_id, titre, importance, contenu)
                VALUES (:theme_id, :titre, :importance, :contenu)";

        $stmt = $this->pdo->prepare($sql);

        return $stmt->execute([
            ':theme_id'  => $note->getId(),
            ':titre'     => $note->getTitre(),
            ':importance'=> $note->getImportance(),
            ':contenu'   => $note->getContenu()
        ]);
    }

    public function findById(int $id): ?Note
    {
        $sql = "SELECT * FROM notes WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':id' => $id]);

        $data = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$data) {
            return null;
        }

        return new Note(
            $data['theme_id'],
            $data['titre'],
            $data['importance'],
            $data['contenu'],
            $data['date_creation'],
            $data['id']
        );
    }

    public function findByTheme(int $themeId): array
    {
        $sql = "SELECT * FROM notes WHERE theme_id = :theme_id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':theme_id' => $themeId]);

        $notes = [];

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
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

    public function findAll(): array
    {
        $sql = "SELECT * FROM notes ORDER BY date_creation DESC";
        $stmt = $this->pdo->query($sql);

        $notes = [];

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
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

    public function update(Note $note): bool
    {
        $sql = "UPDATE notes
                SET titre = :titre,
                    importance = :importance,
                    contenu = :contenu
                WHERE id = :id";

        $stmt = $this->pdo->prepare($sql);

        return $stmt->execute([
            ':titre'      => $note->getTitre(),
            ':importance' => $note->getImportance(),
            ':contenu'    => $note->getContenu(),
            ':id'         => $note->getId()
        ]);
    }

    public function delete(int $id): bool
    {
        $sql = "DELETE FROM notes WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);

        return $stmt->execute([':id' => $id]);
    }
}
