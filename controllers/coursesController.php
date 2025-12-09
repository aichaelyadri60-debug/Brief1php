<?php 
require_once "./models/Course.php";
$action = $_GET['action'] ?? 'list';
if ($action == "list") {
    $courses = allcourses();
}

if ($action == "store" && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST["title"];
    $description = $_POST["description"];
    $level = $_POST["level"];
    if (!empty($_FILES['imagecourses']['name'])) {
        $imageName = time() . "_" . basename($_FILES['imagecourses']['name']);
        $targetDir = "./images/";

        move_uploaded_file($_FILES["imagecourses"]["tmp_name"], $targetDir . $imageName);
    }
    stockercourses($title, $description, $level, $imageName);
    header("Location: index.php?page=courses&action=list");
    exit;
}

?>
