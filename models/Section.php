
<?php 
require_once("./config/db.php");

function allsection($id){
    global $connexion;
    $sql = "SELECT sections.*, courses.title AS course_name
            FROM sections 
            LEFT JOIN courses ON sections.course_id = courses.id 
            WHERE sections.course_id = $id";

    $result = mysqli_query($connexion, $sql);
    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}

function createsection($id, $title, $Content){
    global $connexion;

    $id = intval($id);
    $title = mysqli_real_escape_string($connexion, $title);
    $Content = mysqli_real_escape_string($connexion, $Content);

    $sql = "INSERT INTO sections (titleS, content, course_id)
            VALUES ('$title', '$Content', $id)";

    return mysqli_query($connexion, $sql);
}


?>