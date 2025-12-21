<?php
session_start();

require_once 'core/kernel/autoloading.php';
Autoloading::LoadClass();


$page   = $_GET['page']   ?? 'login';
$action = $_GET['action'] ?? null;

$publicPages = ['login', 'register', 'authenticate' , 'auth'];

if (!in_array($page, $publicPages) && !isset($_SESSION['admin'])) {
    header("Location: index.php?page=login");
    exit;
}


switch ($page) {

    case 'login':
        require './views/layout/auth/login.php';
        exit;

    case 'register':
        require './views/layout/auth/register.php';
        exit;
        case 'auth':
            $controller = new AuthController();
            $action = $action ?? 'login';
            break;
        case 'authenticate':
    $controller = new AuthController();
    $controller->authenticate();
    exit;

    case 'logout':
        $controller = new AuthController();
        $controller->logout();
        exit;

    case 'dashboard':
        $controller = new DashboardController();
        $controller->index();
        exit;


    case 'courses':
        $controller = new CourseController();
        $action = $action ?? 'list';
        break;

    case 'sections':
        $controller = new SectionController();
        $action = $action ?? 'list';
        break;
    case 'enrollment':
        $controller = new EnrollmentController();
        $action = $action ?? 'store';
        break;


    default:
        die(" Page introuvable");
}


if (!method_exists($controller, $action)) {
    die(" Action introuvable");
}

$controller->$action();
