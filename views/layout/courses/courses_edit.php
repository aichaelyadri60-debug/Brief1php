<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Course</title>
    <link rel="stylesheet" href="./assets/edit.css">
</head>
<body>

<?php require_once __DIR__ . '/../layout/header.html'; ?>

<div class="page-container">
    <div class="form-card">

        <form action="index.php?page=courses&action=update&id=<?= $course->getId() ?>"
              method="POST"
              enctype="multipart/form-data">

            <label>Course Title</label>
            <input type="text"
                   name="title"
                   value="<?= htmlspecialchars($course->getTitle()) ?>"
                   required>

            <label>Description</label>
            <textarea name="description" required><?= htmlspecialchars($course->getDescriptionC()) ?></textarea>

            <label>Image course (laisser vide si pas de changement)</label>
            <input type="file" name="imagecourses">

            <label>Level</label>
            <select name="level">
                <option value="Débutant" <?= $course->getLevel() === "Débutant" ? 'selected' : '' ?>>Beginner</option>
                <option value="Intermédiaire" <?= $course->getLevel() === "Intermédiaire" ? 'selected' : '' ?>>Intermediate</option>
                <option value="Avancé" <?= $course->getLevel() === "Avancé" ? 'selected' : '' ?>>Advanced</option>
            </select>

            <button type="submit" class="btn-save">💾 Edit Course</button>
            <a href="index.php?page=courses" class="btn-cancel">✖ Cancel</a>
        </form>

    </div>
</div>

<?php require_once __DIR__ . '/../layout/footer.html'; ?>

</body>
</html>
