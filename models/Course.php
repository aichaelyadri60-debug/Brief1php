<?php 
require_once "./config/db.php";
function allcourses(): array {
    global $connexion;
    $sql ="SELECT * FROM courses";
    $result = mysqli_query($connexion, $sql);
    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}


function stockercourses($title ,$description ,$level): bool{
    global $connexion ;
    $title =mysqli_real_escape_string($connexion ,$title);
    $description =mysqli_real_escape_string($connexion ,$description);
    $level =mysqli_real_escape_string($connexion ,$level);

   $sql = "INSERT INTO courses (title, DescriptionC, level) 
        VALUES ('$title', '$description', '$level')";
    return mysqli_query($connexion ,$sql);
}

function deletecourses($id){
     global $connexion ;
     $sql ='DELETE * FROM courses WHERE id =  $id ';
     return mysqli_query($connexion ,$sql);
}
?>