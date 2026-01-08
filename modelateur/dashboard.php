
<?php include '../includes/header.php'; ?>
<body class="layout-root">
<style>
.layout-root {
  margin: 0;
  font-family: "Segoe UI", system-ui, sans-serif;
  background-color: #f9fafb;
  color: #1f2937;
}

.layout-header {
  height: 64px;
  background-color: #2563eb;
  display: flex;
  align-items: center;
  padding: 0 32px;
}

.header-title {
  color: #ffffff;
  font-size: 20px;
  font-weight: 700;
  letter-spacing: 0.3px;
}

.layout-main {
  padding: 40px;
}

.page-title {
  font-size: 30px;
  font-weight: 700;
  color: #111827;
  margin-bottom: 32px;
}

.grid-area {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
  gap: 28px;
}

.stat-card {
  background-color: #ffffff;
  border-radius: 14px;
  padding: 26px;
  box-shadow: 0 10px 24px rgba(0, 0, 0, 0.06);
  display: flex;
  flex-direction: column;
}

.card-title {
  font-size: 18px;
  font-weight: 700;
  color: #2563eb;
  margin-bottom: 12px;
}

.card-desc {
  font-size: 14px;
  color: #6b7280;
  margin-bottom: 20px;
  line-height: 1.5;
}

.primary-btn {
  padding: 12px 24px;
  border-radius: 8px;
  border: none;
  background-color: #10b981;
  color: #ffffff;
  font-size: 14px;
  font-weight: 600;
  cursor: pointer;
  transition: background-color 0.2s ease;
}

.primary-btn:hover {
  background-color: #059669;
}

.locked {
  opacity: 0.45;
  pointer-events: none;
}

</style>

<main class="layout-main">
    <h1 class="page-title">Dashboard modulateur</h1>

    <section class="grid-area">

        <article class="stat-card">
            <span class="card-title">Thèmes publics</span>
            <p class="card-desc">Accéder à la liste des thèmes visibles par tous.</p>
            <button class="primary-btn">Consulter</button>
        </article>

        <article class="stat-card">
            <span class="card-title">Signalements</span>
            <p class="card-desc">Examiner les signalements envoyés par les utilisateurs.</p>
            <button class="primary-btn">Consulter</button>
        </article>

        <article class="stat-card locked">
            <span class="card-title">Notes privées</span>
            <p class="card-desc">Accès restreint</p>
        </article>

        <article class="stat-card locked">
            <span class="card-title">Gestion des comptes</span>
            <p class="card-desc">Actions non autorisées</p>
        </article>

    </section>

<?php include '../includes/footer.php'; ?>