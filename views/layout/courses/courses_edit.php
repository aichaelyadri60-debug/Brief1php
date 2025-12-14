<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Course</title>
    <link rel="stylesheet" href="./assets/edit.css">
</head>
<body>
    <?php require_once __DIR__ . '/../layout/header.html'; ?>
    <div class="page-container">
        <div class="form-card">
          <form id="editCourseForm"
      action="index.php?page=courses&action=edit&id=<?= $_GET['id'] ?>"
      method="POST"
      enctype="multipart/form-data">

    <label>Course Title</label>
    <input type="text" id="titre" name="titre" value="<?= $data['title'] ?>" required>

    <label>Description</label>
    <textarea id="desc" name="desc" required><?= $data['DescriptionC'] ?></textarea>

    <label>Image course (laisser vide si pas de changement)</label>
    <input id="image" name="image" type="file" />

    <label>Level</label>
    <select id="niveau" name="niveau">
        <option value="Débutant" <?= $data['level']=="Débutant" ? 'selected' : '' ?>>Beginner</option>
        <option value="Intermédiaire" <?= $data['level']=="Intermédiaire" ? 'selected' : '' ?>>Intermediate</option>
        <option value="Avancé" <?= $data['level']=="Avancé" ? 'selected' : '' ?>>Advanced</option>
    </select>

    <button type="submit" class="btn-save">💾 Edit Course</button>
    <a href="index.php?page=courses" class="btn-cancel">✖ Cancel</a>
</form>

        </div>
    </div>
    <?php require_once __DIR__ . '/../layout/footer.html'; ?>
</body>
</html>
