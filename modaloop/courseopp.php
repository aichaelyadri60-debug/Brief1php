<?php
require_once __DIR__ . "/../config/db.php";

class Course {

    private $connexion;

    public function __construct() {
        $this->connexion = connect();
    }



    public function all() {
        $sql = "SELECT * FROM courses";
        $result = mysqli_query($this->connexion, $sql);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    public function store($title, $description, $level, $imageName) {
        $sql = "INSERT INTO courses (title, DescriptionC, level, image)
                VALUES ('$title', '$description', '$level', '$imageName')";
        mysqli_query($this->connexion, $sql);
    }

        public function deleteByCourse($courseId) {
        $sql = "DELETE FROM sections WHERE course_id = $courseId";
        mysqli_query($this->connexion, $sql);
    }
    public function delete($id) {
        $sql = "DELETE FROM courses WHERE id=$id";
        mysqli_query($this->connexion, $sql);
    }

    public function find($id) {
        $sql = "SELECT * FROM courses WHERE id=$id";
        $result = mysqli_query($this->connexion, $sql);
        return mysqli_fetch_assoc($result);
    }

    public function update($id, $title, $description, $level) {
        $sql = "UPDATE courses 
                SET title='$title',
                    DescriptionC='$description',
                    level='$level'
                WHERE id=$id";
        mysqli_query($this->connexion, $sql);
    }

    public function updateImage($id, $imageName) {
        $sql = "UPDATE courses SET image='$imageName' WHERE id=$id";
        mysqli_query($this->connexion, $sql);
    }
}
