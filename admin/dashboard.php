<?php include '../includes/header.php'; ?>

<?php require "../src/Repository/UserRepository.php";


$UserRepository = new UserRepository();
$users = $UserRepository->showAllUsers();
if (isset($_POST["status"])) {
$selectedStatu = $_POST["status"];
$id=$user->getId();
$query= "UPDATE utilisateurs SET statut = '$selectedStatu'  WHERE id = $id";
$stmt = $this->conn->prepare($query);
$stmt->execute();
}
?>


<div class="container mt-4">
  <h2>Dashboard Administrateur</h2>
  <p>Gestion globale de l'application.</p>

  ## Liste des Utilisateurs
  <div class="row mt-4">
    <?php if (empty($users)): ?>
      <div class="col-12">
        <div class="alert alert-info">Aucun utilisateur trouvé.</div>
      </div>
    <?php else: ?>
      <?php foreach ($users as $user): ?>
        <div class="col-md-6 col-lg-4 mb-4">
          <div class="card h-100">
            <div class="card-body">
              <h6 class="card-title"><?php echo htmlspecialchars($user->getUsername()); ?></h6>
              <p class="card-text">
                <strong>Email:</strong> <?php echo htmlspecialchars($user->getEmail()); ?><br>
                <strong>Statut actuel:</strong>
                <span class="badge <?php
                                    echo match ($user->getStatut()) {
                                      'active' => 'bg-success',
                                      'bloquee' => 'bg-danger',
                                      'en_attente' => 'bg-warning',
                                      default => 'bg-secondary'
                                    }; ?>">
                  <?php echo htmlspecialchars(ucfirst(str_replace('_', ' ', $user->getStatut()))); ?>
                </span>
              </p>
            </div>
            <div class="card-footer bg-transparent">
              <form method="POST" action="dashboard.php" class="d-inline" >
                <select name="status" class="form-select form-select-sm d-inline w-auto" onchange="this.form.submit()">
                  <option value="en_attente">En attente</option>
                  <option value="bloquee">Bloquée</option>
                  <option value="active">Active</option>
                </select>
              </form>
            </div>
          </div>
        </div>
      <?php endforeach; ?>

    <?php endif; ?>
  </div>
</div>

<?php include '../includes/footer.php'; ?>