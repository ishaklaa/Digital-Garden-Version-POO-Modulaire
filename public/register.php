<?php
include '../includes/header.php';
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

<div class="container mt-5">
  <div class="card p-4 mx-auto form-box">
    <h3 class="text-center">Créer un compte</h3>

    <?php if ($success): ?>
      <div class="alert alert-success">Compte créé ! <a href="login.php">Se connecter</a></div>
    <?php endif; ?>

    <?php if (!empty($errors)): ?>
      <div class="alert alert-danger">
        <ul class="mb-0">
          <?php foreach ($errors as $error): ?>
            <li><?php echo htmlspecialchars($error); ?></li>
          <?php endforeach; ?>
        </ul>
      </div>
    <?php endif; ?>

    <form action="register" method="post" id="registerForm">
      <input type="text" class="form-control mb-3" name="nom" value="<?php echo htmlspecialchars($name ?? ''); ?>" placeholder="Nom d'utilisateur" required>
      <input type="email" class="form-control mb-3" name="email" value="<?php echo htmlspecialchars($email ?? ''); ?>" placeholder="Email" required>
      <input type="password" class="form-control mb-3" name="password" placeholder="Mot de passe" required>
      <button class="btn btn-success w-100" name="inscription">Inscription</button>
    </form>
  </div>
</div>

<?php include '../includes/footer.php'; ?>