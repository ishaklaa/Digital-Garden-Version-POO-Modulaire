<?php
include_once "LoginService.php";
if (isset($_POST["login"])) {
    $email = $_POST["email"];
    $password = $_POST["password"]; // Fixed typo

    $auth = new LoginService();
    $user = $auth->CheckDatabase($email);

    if ($user) {
        // Verify the password
        if ($auth->CheckPassword($password, $user["password"])) {
            // SUCCESS: Start the session
            session_start();
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['nom']; // or whatever your column is

            header("Location: ../../public/dashboard.php");
            exit();
        } else {
            echo "Invalid password.";
        }
    } else {
        echo "No user found with that email.";
    }
}
