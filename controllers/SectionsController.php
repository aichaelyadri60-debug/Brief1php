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


if($action =='delete'){
    $id=$_GET['id'];
    $idsection =$_GET['idsection'];
    deletesection($id ,$idsection);
    header("Location: index.php?page=sections&id=$id&action=list");
    exit;
}

if ($action == 'edit' && $_SERVER['REQUEST_METHOD'] === 'GET') {
    $id = $_GET['id'];
    $idsection = $_GET['idsection'];
    $sectiondata = getSectionById($idsection);
}

if ($action == 'edit' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_GET['id'];
    $idsection = $_GET['idsection'];
    $title = $_POST['titleS'];
    $ContentS = $_POST['ContentS'];

    modifiersection($id, $idsection, $ContentS, $title);

    header("Location: index.php?page=sections&id=$id&action=list");
    exit;
}



?>