<?php

require_once "./modaloop/sectionoop.php";

class SectionController {

    private $sectionModel;

    public function __construct()
    {
        $this->sectionModel = new Section();
    }

    public function index()
    {
        if (!isset($_GET['id'])) {
            header("Location: index.php?page=courses");
            exit;
        }

        $courseId = intval($_GET['id']);
        $sectiondata = $this->sectionModel->allByCourse($courseId);

        require "./views/layout/sections/section_list.php";
    }
    public function create()
{
    if (!isset($_GET['id'])) {
        header("Location: index.php?page=sections");
        exit;
    }

    $courseId = intval($_GET['id']);
    require "./views/layout/sections/sections_create.php";
}


public function store()
{
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $courseId = intval($_GET['id']);   
        $title = $_POST['title'];

        $this->sectionModel->store($title, $courseId);

        header("Location: index.php?page=sections&id=" . $courseId);
        exit;
    }
}


    public function destroy()
    {
        if (isset($_GET['id'], $_GET['idsection'])) {

            $id = intval($_GET['idsection']);
            $courseId = intval($_GET['id']);

            $this->sectionModel->delete($id ,$courseId);

            header("Location: index.php?page=sections&id=" . $courseId);
            exit;
        }
    }

 public function edit()
    {
        if (!isset($_GET['idsection'], $_GET['id'])) {
            header("Location: index.php?page=courses");
            exit;
        }

        $sectionId = intval($_GET['idsection']);
        $sectiondata = $this->sectionModel->find($sectionId);

        require "./views/layout/sections/Sections_edit.php";
    }

    public function update()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_GET['id'], $_GET['idsection'])) {

            $sectionId = intval($_GET['idsection']);
            $courseId  = intval($_GET['id']);
            $title     = $_POST['titleS'];
            $content = $_POST['ContentS'];



            $this->sectionModel->update($sectionId, $title, $content);

            header("Location: index.php?page=sections&id=" . $courseId);
            exit;
        }
    }
}
