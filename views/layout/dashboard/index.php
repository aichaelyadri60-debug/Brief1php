<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Admin</title>
    <link rel="stylesheet" href="./assets/dashboard.css">
</head>
<body>

<?php require_once __DIR__ . '/../layout/header.html'; ?>

<main class="main-content">

<h1>📊 Tableau de Bord</h1>

<section class="kpi-grid">
    <div class="kpi-card">
        <h3>Total des cours</h3>
        <p><?= $totalCourses ?></p>
    </div>

    <div class="kpi-card">
        <h3>Total des utilisateurs</h3>
        <p><?= $totalUsers ?></p>
    </div>

    <div class="kpi-card">
        <h3>Total des inscriptions</h3>
        <p><?= $totalInscriptions ?></p>
    </div>

    <div class="kpi-card highlight">
        <h3>Cours le plus populaire</h3>
        <?php if ($mostPopularCourse && $mostPopularCourse['total'] > 0): ?>
            <p><?= htmlspecialchars($mostPopularCourse['title']) ?></p>
            <small><?= $mostPopularCourse['total'] ?> inscriptions</small>
        <?php else: ?>
            <p>Aucune inscription</p>
        <?php endif; ?>
    </div>

    <div class="kpi-card">
        <h3>Moyenne sections / cours</h3>
        <p><?= number_format($avgSections, 1) ?></p>
    </div>
</section>

<section class="tables-section">

<h2>📘 Inscriptions par cours</h2>
<table>
<tr><th>Cours</th><th>Total</th></tr>
<?php foreach ($inscriptionsByCourse as $row): ?>
<tr>
    <td><?= htmlspecialchars($row['title']) ?></td>
    <td><?= $row['total'] ?></td>
</tr>
<?php endforeach; ?>
</table>

<h2>📚 Cours avec plus de 5 sections</h2>
<table>
<tr><th>Cours</th><th>Sections</th></tr>
<?php foreach ($coursesWithManySections as $row): ?>
<tr>
    <td><?= htmlspecialchars($row['title']) ?></td>
    <td><?= $row['total'] ?></td>
</tr>
<?php endforeach; ?>
</table>

<h2>👤 Utilisateurs inscrits cette année</h2>
<table>
<tr><th>Nom</th><th>Date</th></tr>
<?php foreach ($usersThisYear as $user): ?>
<tr>
    <td><?= htmlspecialchars($user['name']) ?></td>
    <td><?= $user['created_at'] ?></td>
</tr>
<?php endforeach; ?>
</table>

<h2>📭 Cours sans inscription</h2>
<ul>
<?php foreach ($coursesWithoutInscription as $course): ?>
    <li><?= htmlspecialchars($course['title']) ?></li>
<?php endforeach; ?>
</ul>

<h2>🕒 Dernières inscriptions</h2>
<table>
<tr><th>Utilisateur</th><th>Cours</th><th>Date</th></tr>
<?php foreach ($lastInscriptions as $row): ?>
<tr>
    <td><?= htmlspecialchars($row['name']) ?></td>
    <td><?= htmlspecialchars($row['title']) ?></td>
    <td><?= $row['created_at'] ?></td>
</tr>
<?php endforeach; ?>
</table>

</section>
</main>

<?php require_once __DIR__ . '/../layout/footer.html'; ?>

</body>
</html>
