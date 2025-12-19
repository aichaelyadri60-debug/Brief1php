<?php
require_once __DIR__ . '/../modaloop/courseopp.php';

class CourseController {

    private $courseModel;

    public function __construct() {
        $this->courseModel = new Course();
    }

    public function index() {
        $courses = $this->courseModel->all();
        require "./views/layout/courses/courses_list.php";
    }

    public function create() {
        require "./views/layout/courses/courses_create.php";
    }

    public function store() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $title = $_POST['title'];
            $description = $_POST['description'];
            $level = $_POST['level'];
            $imageName = null;

            if (!empty($_FILES['imagecourses']['name'])) {
                $imageName = time() . "_" . $_FILES['imagecourses']['name'];
                move_uploaded_file(
                    $_FILES['imagecourses']['tmp_name'],
                    "./images/" . $imageName
                );
            }

            $this->courseModel->store($title, $description, $level, $imageName);
            header("Location: index.php?page=courses&action=list");
            exit;
        }
    }

    public function destroy() {
        if (isset($_GET['id'])) {
            $this->courseModel->deleteByCourse($_GET['id']);
            $this->courseModel->delete($_GET['id']);
        }
        header("Location: index.php?page=courses&action=list");
        exit;
    }


    public function edit() {
        $data = $this->courseModel->find($_GET['id']);
        require "./views/layout/courses/courses_edit.php";
    }

    public function update() {
        $id = $_GET['id'];

        $title = $_POST['title'];
        $description = $_POST['description'];
        $level = $_POST['level'];

        if (!empty($_FILES['imagecourses']['name'])) {
            $imageName = time() . "_" . $_FILES['imagecourses']['name'];
            move_uploaded_file(
                $_FILES['imagecourses']['tmp_name'],
                "./images/" . $imageName
            );
            $this->courseModel->updateImage($id, $imageName);
        }

        $this->courseModel->update($id, $title, $description, $level);
        header("Location: index.php?page=courses&action=list");
        exit;
    }
}
