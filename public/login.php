<?php include '../includes/header.php';

 ?>
<?php
session_start()


?>
<div class="container mt-5">
  <div class="card p-4 mx-auto form-box">
    <h3 class="text-center">Connexion </h3>

    <form action ="../src/Entity/Service/AuthService.php" method="post" >
      <input type="email" class="form-control mb-3" name="email" placeholder="Email" required>
      <input type="password" class="form-control mb-3" name="password" placeholder="Mot de passe" required>
      <button class="btn btn-success w-100" name="login">Connexion</button>
    </form>
  </div>
</div>

<?php include '../includes/footer.php'; ?>
