<?php 
require_once "./models/Course.php";
$action = $_GET['action'] ?? 'list';
if ($action == "list") {
    $courses = allcourses();
}


if ($action == "store") {
    $title =$_POST["title"] ;
    $description =$_POST["description"] ;
    $level =$_POST["level"] ;
    move_uploaded_file($_FILES["imagecourse"]["tmp_name"], "C:\\laragon\\www\\briefphp\\course.png");
    $courses = stockercourses($title ,$description ,$level);
    header("Location: index.php?page=courses&action=list");
    exit;
}


if($action =="delete"){
    $id =$_POST[$id];
    $courses = deletecourses($id);
}

?>