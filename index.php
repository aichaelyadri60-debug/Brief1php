<?php

$page = $_GET['page'] ?? "courses";
$action = $_GET['action'] ?? "list";

if ($page === "courses") {

    include "./controllers/coursesController.php";

    switch ($action) {
        case "create":
            include "./views\layout/courses/courses_create.php";
            break;

        case "edit":
            include "./views\layout/courses/courses_edit.php";
            break;

        case "delete":
            include "./views\layout/courses/courses_delete.php";
            break;

        default:
            include "./views\layout/courses/courses_list.php";
            break;
    }
}

?>
