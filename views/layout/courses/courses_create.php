<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Course</title>
    <link rel="stylesheet" href="./assets/create.css">
</head>

<body>

    <?php require_once __DIR__ . '/../layout/header.html'; ?>

    <div class="page-container">

        <h2>Create New Course</h2>
        <p class="subtitle">Add a new course to your library</p>

        <div class="form-card">

            <form action="index.php?page=courses&action=store" method="POST">

                <label>Course Title</label>
                <input type="text" name="title" placeholder="Enter course title" required>

                <label>Description</label>
                <textarea name="description" placeholder="Describe what students will learn" required></textarea>

                <label>image course</label>
                <input id="start" name="imagecourse" type="file" />

                <label>Level</label>
                <select name="level">
                    <option value="Débutant">Beginner</option>
                    <option value="Intermédiaire">Intermediate</option>
                    <option value="Avancé">Advanced</option>
                </select>

                <div class="btn-row">
                    <button type="submit" class="btn-save">
                        💾 Save Course
                    </button>

                    <a href="index.php?page=courses" class="btn-cancel">✖ Cancel</a>
                </div>

            </form>

        </div>

    </div>

    <?php require_once __DIR__ . '/../layout/footer.html'; ?>

</body>

</html>
