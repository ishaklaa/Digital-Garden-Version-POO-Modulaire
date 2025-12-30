<?php include '../includes/header.php'; ?>
<?php
?>
<div class="container mt-5">
  <div class="card p-4 mx-auto form-box">
    <h3 class="text-center">Créer un compte</h3>

    <form method="post">
      <input type="text" class="form-control mb-3" placeholder="Nom d'utilisateur" required>
      <input type="email" class="form-control mb-3" placeholder="Email" required>
      <input type="password" class="form-control mb-3" placeholder="Mot de passe" required>
      <button class="btn btn-success w-100">Inscription</button>
    </form>
  </div>
</div>

<?php include '../includes/footer.php'; ?>
