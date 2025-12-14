<?php

require_once "./config/db.php";

class Section {

    private $connexion;

    public function __construct()
    {
        $this->connexion = connect();
    }

    public function allByCourse($courseId)
    {
        $sql = "SELECT * FROM sections WHERE course_id = $courseId";
        $result = mysqli_query($this->connexion, $sql);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    public function store($title, $courseId)
    {
        $sql = "INSERT INTO sections (title, course_id)
                VALUES ('$title', $courseId)";
        mysqli_query($this->connexion, $sql);
    }

    public function delete($id)
    {
        $sql = "DELETE FROM sections WHERE id = $id";
        mysqli_query($this->connexion, $sql);
    }

    public function find($id)
    {
        $sql = "SELECT * FROM sections WHERE id = $id";
        $result = mysqli_query($this->connexion, $sql);
        return mysqli_fetch_assoc($result);
    }

    public function update($id, $title)
    {
        $sql = "UPDATE sections SET title = '$title' WHERE id = $id";
        mysqli_query($this->connexion, $sql);
    }
}
