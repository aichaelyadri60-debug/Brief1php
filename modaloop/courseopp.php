<?php 
require_once("./config/db.php");
class Course{
    private $connexion ;
    public function __construct(){
        $this->connexion =connect();
    }
    public function all(){
        $sql ="SELECT * FROM courses ";
        $result =mysqli_query($this->connexion, $sql);
        return mysqli_fetch_all($result ,MYSQLI_ASSOC);
    }
    public function store($title, $desc, $level, $image ){
         $sql ="INSERT INTO courses (title, DescriptionC, level, imagecourse) VALUES ('$title', '$desc', '$level', '$image')";
         mysqli_query($this->connexion ,$sql);

    }


    public function delete ($id){
        $sql = "DELETE FROM courses WHERE id=$id";
        mysqli_query($this->conn, $sql);
    }
    
    public function update($id, $title, $desc, $level){
        $sql = "UPDATE courses
                SET title='$title', DescriptionC='$desc', level='$level'
                WHERE id=$id";

        mysqli_query($this->conn, $sql);
    }
    
    
    public function updateImage($id, $image){
        $sql = "UPDATE courses SET imagecourse='$image' WHERE id=$id";
        mysqli_query($this->conn, $sql);
    }
    public function find($id){
        $sql = "SELECT * FROM courses WHERE id=$id";
        $result = mysqli_query($this->conn, $sql);
        return mysqli_detch_assoc($result);
    }

}




?>