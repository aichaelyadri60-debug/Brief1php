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
        $sql = "SELECT sections.*, courses.title AS course_name
            FROM sections 
            LEFT JOIN courses ON sections.course_id = courses.id 
            WHERE sections.course_id = $courseId";
        $result = mysqli_query($this->connexion, $sql);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    public function store($title, $courseId)
    {
        $sql = "INSERT INTO sections (titleS, course_id)
                VALUES ('$title', $courseId)";
        mysqli_query($this->connexion, $sql);
    }

    public function delete($id ,$courseId)
    {
        $sql = "DELETE FROM sections WHERE id = $id  AND course_id =$courseId";
        mysqli_query($this->connexion, $sql);
    }

    public function find($id)
    {
        $sql = "SELECT * FROM sections WHERE id = $id";
        $result = mysqli_query($this->connexion, $sql);
        return mysqli_fetch_assoc($result);
    }

public function update($id, $title, $content)
{
    $sql = "UPDATE sections 
            SET titleS = '$title',
                content = '$content'
            WHERE id = $id";
    mysqli_query($this->connexion, $sql);
}

}
