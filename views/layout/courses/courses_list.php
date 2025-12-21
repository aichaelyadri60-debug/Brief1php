<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./assets/courses.css">
</head>
<body>
    <?php require_once __DIR__ . '/../layout/header.html'; ?>

    <div class="container">
        <div class="header-row">
            <div>
                <h2>Courses</h2>
                <p class="subtitle">Manage your educational content</p>
            </div>
            <a href="index.php?page=courses&action=create" class="btn-create">+ Add Course</a>
        </div>
        <table>
            <tr>
                <th>ID</th>
                 <th style="width:100px ; height:100px;">image</th>
                <th>Titre</th>
                <th>niveau</th>
                <th>Description</th>
                <th>date</th>
                <th>Actions</th>
            </tr>

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
            <img src="./images/<?= $c->getImage() ?>" width="50">
        <?php endif; ?>
    </td>

    <td><?= $c->getTitle() ?></td>

    <td>
        <span class="badge <?= $class ?>">
            <?= $c->getLevel() ?>
        </span>
    </td>

    <td><?= $c->getDescriptionC() ?></td>
    <td><?= $c->getCreatedAt() ?></td>

    <td class="actions">
        <img src="./assets/button.png"
             onclick="location.href='index.php?page=sections&action=list&id=<?= $c->getId() ?>'">

        <img src="./assets/button (1).png"
             onclick="location.href='index.php?page=courses&action=edit&id=<?= $c->getId() ?>'">

        <img src="./assets/button (2).png"
             onclick="location.href='index.php?page=courses&action=destroy&id=<?= $c->getId() ?>'">
    </td>
</tr>

<?php endforeach; ?>

        </table>



      

    </div>

    <?php require_once __DIR__ . '/../layout/footer.html'; ?>


</body>

</html>