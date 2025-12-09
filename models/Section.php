
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



?>