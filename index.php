 <?php
require_once "controllersoop/contollerSections.php";
require_once "controllersoop/controllerCourses.php";

$page   = $_GET['page']   ?? 'courses';
$action = $_GET['action'] ?? 'list';

if ($page === 'courses') {

    $controller = new CourseController();

    switch ($action) {
        case 'list':    $controller->index(); break;
        case 'create':  $controller->create(); break;
        case 'store':   $controller->store(); break;
        case 'edit':    $controller->edit(); break;
        case 'update':  $controller->update(); break;
        case 'destroy': $controller->destroy(); break;
        default: echo "Action introuvable";
    }
}




elseif ($page === 'sections') {

    $controller = new SectionController();

    switch ($action) {
        case 'list':    $controller->index(); break;
        case 'create':  $controller->create(); break;
        case 'store':   $controller->store(); break;
        case 'edit':    $controller->edit(); break;
        case 'update':  $controller->update(); break;
        case 'destroy': $controller->destroy(); break;
        default: echo "Action section introuvable";
    }
}


else {
    echo "Page introuvable";
}



