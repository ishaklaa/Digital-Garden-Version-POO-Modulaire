<?php
require_once './../config/database.php';
require_once '../src/Repository/ThemeRepository.php';
session_start();
if (isset($_POST["save_theme"]) && isset($_SESSION['user_id'])) {
    
    $ThemeRepository = new ThemeRepository();
    $title = $_POST["theme_name"];
    $color = $_POST["theme_color"];
    $privacy = $_POST["privacy"];
    $user_id = $_SESSION['user_id'];
   
    $theme = new Theme($title, $color, $user_id, $privacy);
    $ThemeRepository->create($theme);
    
}

?>
<style>
    body {
        font-family: Arial, sans-serif;
        background: #f4f4f4;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }

    .form-container {
        background: #fff;
        padding: 24px;
        width: 320px;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    h2 {
        margin-top: 0;
        text-align: center;
    }

    label {
        display: block;
        margin-top: 12px;
        font-weight: bold;
    }

    input {
        width: 100%;
        padding: 8px;
        margin-top: 6px;
        border-radius: 4px;
        border: 1px solid #ccc;
    }

    button {
        width: 100%;
        margin-top: 20px;
        padding: 10px;
        background: #4CAF50;
        color: white;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    button:hover {
        background: #43a047;
    }

    <?php include '../includes/header.php'; ?>
</style>
</head>

<body>

    <div class="form-container">
        <h2>Add Theme</h2>

        <form method="post" action="add_theme.php">
            <label>Theme Name</label>
            <input type="text" name="theme_name" placeholder="My Theme" required>
            <label>Theme Color</label>
            <input type="color" name="theme_color" value="#4CAF50">
            <label>Privacy</label>
            <select name="privacy">
                <option value="public">Publique</option>
                <option value="private">Privé</option>
            </select>


            <button type="submit" name="save_theme">Save Theme</button>
        </form>

    </div>
    <?php include '../includes/footer.php'; ?>