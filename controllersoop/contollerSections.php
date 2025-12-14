<?php

require_once "./models/Section.php";

class SectionController {

    private $sectionModel;

    public function __construct()
    {
        $this->sectionModel = new Section();
    }

    public function index()
    {
        if (!isset($_GET['course_id'])) {
            header("Location: index.php?page=courses");
            exit;
        }

        $courseId = intval($_GET['course_id']);
        $sections = $this->sectionModel->allByCourse($courseId);

        require "./views/sections/list.php";
    }

    public function store()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $title = $_POST['title'];
            $courseId = intval($_POST['course_id']);

            $this->sectionModel->store($title, $courseId);

            header("Location: index.php?page=sections&course_id=" . $courseId);
            exit;
        }
    }

    public function destroy()
    {
        if (isset($_GET['id'], $_GET['course_id'])) {

            $id = intval($_GET['id']);
            $courseId = intval($_GET['course_id']);

            $this->sectionModel->delete($id);

            header("Location: index.php?page=sections&course_id=" . $courseId);
            exit;
        }
    }

    public function edit()
    {
        $id = intval($_GET['id']);
        $section = $this->sectionModel->find($id);

        require "./views/sections/edit.php";
    }

    public function update()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $id = intval($_POST['id']);
            $title = $_POST['title'];
            $courseId = intval($_POST['course_id']);

            $this->sectionModel->update($id, $title);

            header("Location: index.php?page=sections&course_id=" . $courseId);
            exit;
        }
    }
}
