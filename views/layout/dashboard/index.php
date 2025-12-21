<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Admin</title>
    <link rel="stylesheet" href="./assets/dashboard.css">
</head>
<body>

    <?php require_once __DIR__ . '/../layout/header.html'; ?>
     <?php require_once __DIR__ . '/../layout/footer.html'; ?>

<main class="main-content">

    <h1 class="dashboard-title">📊 Tableau de Bord</h1>

    <section class="kpi-grid">

        <div class="kpi-card">
            <h3>Total des cours</h3>
            <p class="kpi-value"><?= $totalCourses ?></p>
        </div>

        <div class="kpi-card">
            <h3>Total des utilisateurs</h3>
            <p class="kpi-value"><?= $totalUsers ?></p>
        </div>

        <div class="kpi-card">
            <h3>Total des inscriptions</h3>
            <p class="kpi-value"><?= $totalInscriptions ?></p>
        </div>

<div class="kpi-card highlight">
    <h3>Cours le plus populaire</h3>

    <?php if ($mostPopularCourse && $mostPopularCourse['total'] > 0): ?>
        <p class="kpi-value"><?= htmlspecialchars($mostPopularCourse['title']) ?></p>
        <small><?= $mostPopularCourse['total'] ?> inscriptions</small>
    <?php else: ?>
        <p class="kpi-value">Aucune inscription</p>
    <?php endif; ?>
</div>


        <div class="kpi-card">
            <h3>Moyenne de sections / cours</h3>
            <p class="kpi-value"><?= number_format($avgSections, 1) ?></p>
        </div>

    </section>

    <section class="tables-section">

        <h2>📘 Inscriptions par cours</h2>
        <table>
            <thead>
                <tr>
                    <th>Cours</th>
                    <th>Total Inscriptions</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($inscriptionsByCourse as $row): ?>
                <tr>
                    <td><?= htmlspecialchars($row['title']) ?></td>
                    <td><?= $row['total'] ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>

        <h2>📚 Cours avec plus de 5 sections</h2>
        <table>
            <thead>
                <tr>
                    <th>Cours</th>
                    <th>Sections</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($coursesWithManySections as $row): ?>
                <tr>
                    <td><?= htmlspecialchars($row['title']) ?></td>
                    <td><?= $row['total_sections'] ?></td>

                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>

        <h2>👤 Utilisateurs inscrits cette année</h2>
        <table>
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Email</th>
                    <th>Date inscription</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($usersThisYear as $user): ?>
                <tr>
                    <td><?= htmlspecialchars($user['name']) ?></td>
                    <td><?= htmlspecialchars($user['email']) ?></td>
                    <td><?= $user['created_at'] ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>

        <h2>📭 Cours sans inscription</h2>
        <table>
            <thead>
                <tr>
                    <th>Cours</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($coursesWithoutInscription as $course): ?>
                <tr>
                    <td><?= htmlspecialchars($course['title']) ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>

        <h2>🕒 Dernières inscriptions</h2>
        <table>
            <thead>
                <tr>
                    <th>Utilisateur</th>
                    <th>Cours</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
<?php if (empty($lastInscriptions)): ?>
<tr>
    <td colspan="3">Aucune inscription pour le moment</td>
</tr>
<?php endif; ?>

            </tbody>
        </table>

    </section>

</main>


</body>
</html>
