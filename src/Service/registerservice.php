<?php
require "../src/Repository/UserRepository.php";

$errors = [];
$success = false;

if (isset($_POST["inscription"])) {
  $name = trim($_POST["nom"] ?? '');
  $email = trim($_POST["email"] ?? '');
  $password = $_POST["password"] ?? '';


  if (empty($name)) $errors[] = "Nom requis.";
  if (empty($email)) $errors[] = "Email requis.";
  if (empty($password)) $errors[] = "Mot de passe requis.";


  if (!empty($password) && !preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d@$!%*?&]{8,}$/', $password)) {
    $errors[] = "Mot de passe: 8+ chars, majuscule, minuscule, chiffre.";
  }


  if (!empty($email) && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = "Email invalide.";
  }

  if (empty($errors)) {
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $user = new user($name, $email, $hashed_password);
    $user->setRole(new Role("user"));
    $UserRepository = new UserRepository();
    if ($UserRepository->addUser($user)) {
      $success = true;
      $errors = [];
    } else {
      $errors[] = "Erreur inscription.";
    }
  }
}
?>