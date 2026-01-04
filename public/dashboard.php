<?php
// MUST be first
session_start();

require_once './../config/database.php';
require_once '../src/Repository/ThemeRepository.php';

// Security: user must be logged in
if (!isset($_SESSION['user_id'])) {
  header('Location: login.php');
  exit;
}

$userId = $_SESSION['user_id'];
$db = new Database;
$pdo = $db->getConnection();
$themeRepo = new ThemeRepository($pdo);

// Get themes of logged-in user
$themes = $themeRepo->findByUser($userId);

// Header AFTER PHP logic
include '../includes/header.php';
?>

<style>
  body {
    font-family: Arial, sans-serif;
    background: #f4f4f4;
  }

  main {
    padding: 2rem;
    display: flex;
    flex-wrap: wrap;
    gap: 1.5rem;
  }

  .card {
    background: #fff;
    width: 250px;
    padding: 1rem;
    border-radius: 8px;
    box-shadow: 0 3px 6px rgba(0, 0, 0, 0.1);
  }

  .card h3 {
    margin: 0;
  }

  .buttons {
    display: flex;
    justify-content: space-between;
    margin-top: 1rem;
  }

  .buttons a {
    text-decoration: none;
    padding: 6px 8px;
    border-radius: 4px;
    color: white;
    font-size: 0.85rem;
  }

  .view {
    background: #2196F3;
  }

  .edit {
    background: #FFC107;
  }

  .delete {
    background: #F44336;
  }

  .add-theme {
    display: inline-block;
    padding: 8px 12px;
    background: #4CAF50;
    color: white;
    border-radius: 4px;
    text-decoration: none;
  }

  body {
    font-family: Arial, sans-serif;
    background: #f4f4f4;
    padding: 40px;
  }

  .card {
    width: 260px;
    background: #ffffff;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    padding: 16px;
    border-top: 6px solid #4CAF50;
  }

  .card h3 {
    margin: 0;
    font-size: 1.2rem;
  }

  .buttons {
    margin-top: 16px;
    display: flex;
    justify-content: space-between;
  }

  .buttons a {
    text-decoration: none;
    padding: 6px 10px;
    border-radius: 4px;
    font-size: 0.85rem;
    color: white;
  }

  .view {
    background-color: #2196F3;
  }

  .edit {
    background-color: #FFC107;
  }

  .delete {
    background-color: #F44336;
  }
</style>

<main>

  <a class="add-theme" href="add_theme.php">+ Add Theme</a>

  <?php if (empty($themes)): ?>
    <p>No themes found.</p>
  <?php else: ?>
    <?php foreach ($themes as $theme): ?>
      <div class="card" style="border-top: 5px solid <?= htmlspecialchars($theme->__getColor($color)) ?>">
        <h3><?= htmlspecialchars($theme->__getName($nom)) ?></h3>

        <div class="buttons">
          <a class="view" href="notes.php?theme_id=<?= $theme->getId() ?>">View</a>
          <a class="edit" href="edit_theme.php?id=<?= $theme->getId() ?>">Edit</a>
          <a class="delete"
            href="delete_theme.php?id=<?= $theme->getId() ?>"
            onclick="return confirm('Are you sure you want to delete this theme?');">
            Delete
          </a>
        </div>
      </div>
    <?php endforeach; ?>
  <?php endif; ?>

</main>

<?php include '../includes/footer.php'; ?>