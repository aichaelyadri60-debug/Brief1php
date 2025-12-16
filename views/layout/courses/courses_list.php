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

                $class = $levels[$c['level']] ?? ""; ?>

                <tr class="trrr">
                    <td><?= $c['id'] ?></td>
                    <td><img src="./images/<?= $c['image'] ?>" style="width:50px; height:50px;"/></td>
                    <td><?= $c['title'] ?></td>
                    <td>
                        <span class="badge <?= $class ?>">
                            <?= $c['level'] ?>
                        </span>
                    </td>
                    <td><?= $c['DescriptionC'] ?></td>
                    <td><?= $c['created_at'] ?></td>
                    <td class="actions">
                        <img src="./assets/button.png"
                            onclick="window.location.href='index.php?page=sections&action=list&id=<?= $c['id'] ?>'"
                            alt="details">

                        <img src="./assets/button (1).png"
                            onclick="window.location.href='index.php?page=courses&action=edit&id=<?= $c['id'] ?>'"
                            alt="modifier">

                        <img src="./assets/button (2).png"
                            onclick="window.location.href='index.php?page=courses&action=destroy&id=<?= $c['id'] ?>'"
                            alt="supprimer">
                    </td>

                </tr>
            <?php endforeach; ?>
        </table>



      

    </div>

    <?php require_once __DIR__ . '/../layout/footer.html'; ?>


</body>

</html>