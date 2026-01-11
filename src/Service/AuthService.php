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
            $_SESSION['user_name'] = $user['name'];
            $_SESSION['role_id'] = $user['role_id'];
            $_SESSION['status'] = $user['status'];

            if ($_SESSION['status'] !== 'en attente') {

                if ($_SESSION['role_id'] === 3) {
                    header("Location: ../../public/dashboard.php");
                } else if ($_SESSION['role_id'] === 1) {
                    header("Location: ../../admin/dashboard.php");
                } else if ($_SESSION['role_id'] === 2) {
                    header("Location: ../../moderateur/dashboard.php");
                } else {
                    header("Location: ../../public/login.php");
                }

                exit();

            } else {
                
                header("Location: ../../public/pending.php");
                exit();
            }

        } else {
            echo "Invalid password.";
        }

    } else {
        echo "No user found with that email.";
    }
}
