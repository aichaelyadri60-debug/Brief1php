<?php 
require_once "./models/Section.php";

$action = $_GET['action'] ?? 'list';

if ($action == 'list') {
    $id = $_GET['id'];
    $sectiondata = allsection($id);
}

if ($action == 'create' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_GET['id'];
    $title = $_POST['title'];
    $Content = $_POST['Content'];
    createsection($id, $title, $Content);
    header("Location: index.php?page=sections&id=$id&action=list");
    exit;
}




?>