<?php
include_once "./LoginService.php";

if (isset($_POST["login"])) {

    $email = $_POST["email"];
    $password = $_POST["password"];

    $auth = new LoginService();
    $user = $auth->CheckDatabase($email);

    if ($user) {

        if ($auth->CheckPassword($password, $user["password"])) {

            session_start();
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['nom'];
            $_SESSION['role'] = $user['role'];
            $_SESSION['status'] = $user['status'];

            if ($_SESSION['status'] !== 'pending') {

                if ($_SESSION['role'] === 'user') {
                    header("Location: ../../public/dashboard.php");
                } else if ($_SESSION['role'] === 'admin') {
                    header("Location: ../../admin/dashboard.php");
                } else if ($_SESSION['role'] === 'moderateur') {
                    header("Location: ../../moderateur/dashboard.php");
                } else {
                    header("Location: ../../public/login.php");
                }

                exit();

            } else {
                
                header("Location: ../../public/login.php");
                exit();
            }

        } else {
            echo "Invalid password.";
        }

    } else {
        echo "No user found with that email.";
    }
}
