<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/section.css">
    <title>Sections</title>
</head>
<body>
<?php require_once __DIR__ . '/../layout/header.html'; ?>
<div class="course-manager">

    <a href="index.php?page=courses&action=list" class="cm-back">← Back to Courses</a>

    <h1 class="cm-course-title">
        <?= !empty($sectiondata) ? $sectiondata[0]['course_name'] : "Course" ?>
    </h1>

    <p class="cm-subtitle">Manage course sections and content</p>

    <div class="cm-actions">
        <button class="btn-add">
            <a href="index.php?page=sections&id=<?= $_GET['id'] ?>&action=create">+ Add Section</a>
        </button>
    </div>

    <div class="cm-section-list">

        <?php 
        $count = 1; 
        foreach($sectiondata as $s){ 
        ?>

        <div class="section-card">

            <div class="section-left">
                <div class="section-number"><?= $count++; ?></div>

                <div>
                    <h3><?= htmlspecialchars($s['titleS']) ?></h3>
                    <p class="date"><?= htmlspecialchars($s['created_at']) ?></p>
                </div>
            </div>

            <div class="section-actions">
                <button class="icon-btn" onclick="window.location.href='index.php?page=sections&action=edit&id=<?= $_GET['id'] ?>&idsection=<?= $s['id'] ?>'">✏️</button>
                <button class="icon-btn"   onclick="window.location.href='index.php?page=sections&action=delete&id=<?= $_GET['id'] ?>&idsection=<?= $s['id'] ?>'">🗑️</button>
            </div>

        </div>

        <?php } ?>

        <?php if (empty($sectiondata)) { ?>
            <p>No sections yet.</p>
        <?php } ?>

    </div>

</div>
<?php require_once __DIR__ . '/../layout/footer.html'; ?>
</body>
</html>
