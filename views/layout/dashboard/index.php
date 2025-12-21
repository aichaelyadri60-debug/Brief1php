<?php
require_once "./helpers/auth.php";
auth();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="./assets/auth.css">
    <style>
        .dashboard {
            width: 900px;
            background: white;
            padding: 30px;
            border-radius: 12px;
        }

        .dashboard h1 {
            margin-bottom: 20px;
        }

        .stats {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            margin-bottom: 30px;
        }

        .stat {
            background: #f1f5f9;
            padding: 20px;
            border-radius: 10px;
            text-align: center;
        }

        .stat h2 {
            font-size: 32px;
            color: #2563eb;
        }

        .nav {
            display: flex;
            justify-content: space-between;
        }

        .nav a {
            background: #2563eb;
            color: white;
            padding: 10px 15px;
            border-radius: 6px;
            text-decoration: none;
        }

        .nav a.logout {
            background: #dc2626;
        }
    </style>
</head>
<body>

<div class="dashboard">
    <h1>📊 Admin Dashboard</h1>

    <div class="stats">
        <div class="stat">
            <h2><?= $totalCourses ?? 0 ?></h2>
            <p>Courses</p>
        </div>

        <div class="stat">
            <h2><?= $totalSections ?? 0 ?></h2>
            <p>Sections</p>
        </div>

        <div class="stat">
            <h2>1</h2>
            <p>Admin</p>
        </div>
    </div>

    <div class="nav">
        <a href="index.php?page=courses">Manage Courses</a>
        <a href="index.php?page=logout" class="logout">Logout</a>
    </div>
</div>

</body>
</html>
