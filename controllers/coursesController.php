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


if ($action == "delete") {

    if (isset($_GET['id'])) {
        deletesecbycourse($_GET['id']);
        deletecourses(intval($_GET['id']));
    }

    header("Location: index.php?page=courses");
    exit;
}



if ($action == "edit" && $_SERVER['REQUEST_METHOD'] === 'GET') {

    if (!isset($_GET['id'])) {
        header("Location: index.php?page=courses");
        exit;
    }
    $id = intval($_GET["id"]);
    $data = affichedata($id);

    return; 
}


if ($action == "edit" && $_SERVER['REQUEST_METHOD'] === 'POST') {

    $id = intval($_GET['id']);
    $title = $_POST["titre"];
    $desc = $_POST["desc"];
    $niveau = $_POST["niveau"];

    $newImage = null;

    if (!empty($_FILES['image']['name'])) {

        $newImage = time() . "_" . basename($_FILES['image']['name']);
        $targetDir = "./images/";
        move_uploaded_file($_FILES["image"]["tmp_name"], $targetDir . $newImage);

        updateImageCourse($id, $newImage);
    }

    editcourse($id, $title, $desc, $niveau);

    header("Location: index.php?page=courses");
    exit;
}

?>
