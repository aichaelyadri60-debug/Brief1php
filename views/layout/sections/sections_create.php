<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create New Section</title>
    <link rel="stylesheet" href="./assets/createsections.css">
</head>
<body>
<?php require_once __DIR__ . '/../layout/header.html'; ?>
    <main class="page-container">

        <h1 class="page-title">Create New Section</h1>
        <p class="page-subtitle">Add a new section to your course</p>

        <div class="form-container">

<form id="sectionForm"
      action="index.php?page=sections&id=<?= $_GET['id'] ?>&action=create"
      method="POST">


                <label class="form-label">Section Title</label>
                <input 
                name="title"
                    type="text" 
                    class="form-input" 
                    placeholder="Enter section title"
                >

                <label class="form-label">Content</label>
                <textarea 
                 name="Content"
                    class="form-textarea" 
                    placeholder="Enter section content"
                ></textarea>
                <div class="btn-group">
                    <button type="submit" name="submit" class="btn btn-save">💾 edit Section</button>
                    <button type="button" class="btn btn-cancel" onclick="window.history.back()">✖ Cancel </button>
                </div>


            </form>

        </div>
    </main>

<?php require_once __DIR__ . '/../layout/footer.html'; ?>
</body>
</html>