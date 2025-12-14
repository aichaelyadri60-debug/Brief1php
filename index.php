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
        default:
            include "./views\layout/courses/courses_list.php";
            break;
    }
}


if($page === "sections"){
    include "./controllers/SectionsController.php";
    switch ($action) {
        case "create":
            include "./views\layout/sections/sections_create.php";
            break;
        case "edit":
            include "./views\layout/sections/sections_edit.php";
            break;
        default:
            include "./views\layout/sections/section_list.php";
            break;
        }
}

?>
