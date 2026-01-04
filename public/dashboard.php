<?php include '../includes/header.php'; ?>
<?php
session_start();
require "../config/database.php";

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$userId = $_SESSION['user_id'];

$stmt = $conn->prepare(
    "SELECT t.nom AS theme, n.note
     FROM notes n
     JOIN themes t ON n.theme_id = t.id
     WHERE n.user_id = ?"
);
$stmt->execute([$userId]);
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);


?>

<div class="container mt-5">
    <h3>Mes thèmes et notes</h3>

    <?php if ($data): ?>
        <table class="table table-bordered mt-3">
            <thead>
                <tr>
                    <th>Thème</th>
                    <th>Note</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data as $row): ?>
                    <tr>
                        <td><?= htmlspecialchars($row['theme']) ?></td>
                        <td><?= htmlspecialchars($row['note']) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>Aucune donnée.</p>
    <?php endif; ?>
</div>
<?php include '../includes/footer.php'; ?>