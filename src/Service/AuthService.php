<?php
include_once "./LoginService.php";
if (isset($_POST["login"])) {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $auth = new LoginService();
    $user = $auth->CheckDatabase($email);

    if ($user) {

        if ($auth->CheckPassword($password, $user["PASSWORD"])) {

            session_start();
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['nom'];
            $_SESSION['role'] = $user['role_id'];
            if ($_SESSION['role'] == 3) {
                header("Location: ../../public/dashboard.php");
            } else {
                header("Location: ../../admin/dashboard.php");
            }
            exit();
        } else {
            echo "Invalid password.";
        }
    } else {
        echo "No user found with that email.";
    }
}
