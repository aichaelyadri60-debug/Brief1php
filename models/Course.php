<?php
require_once "./config/db.php";

function allcourses(): array {
    global $connexion;
    $sql = "SELECT * FROM courses";
    $result = mysqli_query($connexion, $sql);
    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}


function stockercourses($title, $description, $level, $imageName): bool {
    global $connexion;
    $image = mysqli_real_escape_string($connexion, $imageName);

    $sql = "INSERT INTO courses (title, DescriptionC, level, image)
            VALUES ('$title', '$description', '$level', '$image')";

    return mysqli_query($connexion, $sql);
}

function  deletesecbycourse($id){
    global $connexion;
    $sql =" DELETE FROM sections WHERE course_id =$id";
    return mysqli_query($connexion ,$sql);



}
function deletecourses($id) {
    global $connexion;
    $sql = "DELETE FROM courses WHERE id = $id";
    return mysqli_query($connexion, $sql);
}
?>
