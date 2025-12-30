<?php include '../includes/header.php'; ?>
<?php
?>
<div class="container mt-4">
  <h2>Validation des comptes</h2>

  <table class="table table-striped">
    <thead>
      <tr>
        <th>Utilisateur</th>
        <th>Email</th>
        <th>Statut</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>said</td>
        <td>said@email.com</td>
        <td>pending</td>
        <td>
          <button class="btn btn-success btn-sm">Valider</button>
          <button class="btn btn-danger btn-sm">Bloquer</button>
        </td>
      </tr>
    </tbody>
  </table>
</div>

<?php include '../includes/footer.php'; ?>
