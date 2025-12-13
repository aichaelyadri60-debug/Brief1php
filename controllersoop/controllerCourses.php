<?php 
require_once "./modaloop/courseoop.php";
class CourseController{
    private $courseModal ;
    public function __construct(){
        $this->courseModal =new course();
    }
    public function index(){
        $resultat =$this->courseModal->all();
        require('./views/courses/list.php');
    }
    public function store(){
        if($_SERVER['REQUEST_METHOD']==='POST'){
            $title = $_POST["title"];
            $description = $_POST["description"];
            $level = $_POST["level"];
            $imageName =null;
            if(!empty($_FILES['imagecourses']['name'])){
                $imageName =time() ."_".basename($_FILES['imagecourses']['name']);
                move_uploaded_file($_FILES['imagecourses']['tmp_name'],"./images/".$imageName);
            }
            $this->courseModal->store($title, $description, $level, $imageName);
            header("Location:index.php?page=courses&action=list");
            exit;
        }
    }
    public function destroy(){
        if(isset($_GET['id'])){
            $id = intval($_GET['id']);
            $this->coursemodal->delete($id);
        }
        header('location:index.php?page=courses&action=list');
        exit;
    }
    public function edit(){
        if(isset($_GET['id'])){
            $id = intval($_GET['id']);
            $course = $this->coursemodal->find($id);
        }
        require "./views/courses/edit.php";
    }


    public function update(){
        $id = intval($_GET['id']);
        $title = $_POST["titre"];
        $desc = $_POST["desc"];
        $niveau = $_POST["niveau"];
        if(!empty($_FILES['image']['name'])){
            $newImage =time() ."_".$_FILES['image']['name'];
            move_uploaded_file($_FILES['image']['tmp_image'],"./images/" . $newImage);
            $this->courseModel->updateImage($id, $newImage);
        }
         $this->courseModel->update($id, $title, $desc, $niveau);
         header("Location: index.php?page=courses&action=list");
         exit;
    }

}
















?>