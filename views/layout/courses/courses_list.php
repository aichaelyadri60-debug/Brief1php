<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Courses</title>
    <link rel="stylesheet" href="./assets/courses.css">
</head>

<body>

<?php require_once __DIR__ . '/../layout/header.html'; ?>
<?php require_once __DIR__ . '/../layout/footer.html'; ?>

<div class="container">

    <div class="header-row">
        <div>
            <h2>Courses</h2>
            <p class="subtitle">Manage your educational content</p>
        </div>
        <a href="index.php?page=courses&action=create" class="btn-create">+ Add Course</a>
    </div>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Image</th>
                <th>Titre</th>
                <th>Niveau</th>
                <th>Description</th>
                <th>Date</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>
        <?php foreach ($courses as $c): 

            $levels = [
                "Débutant" => "debutant",
                "Intermédiaire" => "intermediaire",
                "Avancé" => "avance"
            ];

            $class = $levels[$c->getLevel()] ?? "";
        ?>
            <tr>
                <td><?= $c->getId() ?></td>

                <td>
                    <?php if ($c->getImage()): ?>
                        <img src="./images/<?= htmlspecialchars($c->getImage()) ?>" width="60">

                    <?php endif; ?>
                </td>

                <td><?= htmlspecialchars($c->getTitle()) ?></td>

                <td>
                    <span class="badge <?= $class ?>">
                        <?= htmlspecialchars($c->getLevel()) ?>
                    </span>
                </td>

                <td><?= htmlspecialchars($c->getDescriptionC()) ?></td>
                <td><?=$c->getCreatedAt() ?></td>

                <td class="actions">
                    <img src="./assets/button.png"
                         title="Sections"
                         onclick="location.href='index.php?page=sections&action=list&id=<?= $c->getId() ?>'">

                    <img src="./assets/button (1).png"
                         title="Edit"
                         onclick="location.href='index.php?page=courses&action=edit&id=<?= $c->getId() ?>'">

                    <img src="./assets/button (2).png"
                         title="Delete"
                         onclick="location.href='index.php?page=courses&action=destroy&id=<?= $c->getId() ?>'">

                    <a href="index.php?page=enrollment&action=store&course_id=<?= $c->getId() ?>"
                       class="btn-enroll">
                        S'inscrire
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

</div>

</body>
</html>
