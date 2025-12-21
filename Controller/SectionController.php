<?php
require_once "./repository/SectionRepository.php";
require_once "./repository/CourseRepository.php";
require_once "./Model/Sections.php";
require_once "./Model/Course.php";
class SectionController
{
    private SectionRepository $repo;
    private CourseRepository $courseRepo;
    public function __construct()
    {
        $this->repo = new SectionRepository();
        $this->courseRepo  = new CourseRepository();
    }

    public function list()
    {
        $courseId = (int)$_GET['id'];
        $sectiondata  = $this->repo->findByCourse($courseId);
        $course   = $this->courseRepo->findOne($courseId);
        require "./views/layout/sections/section_list.php";
    }

    public function create()
    {
        $courseId = (int)$_GET['id'];
        require "./views/layout/sections/sections_create.php";
    }

    public function store()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $section = new Section();
            $section->hydrate([
                'titleS'    => $_POST['title'],
                'content'    => $_POST['Content'],
                'course_id' => $_GET['id'],
            ]);

            $this->repo->create($section);

            header("Location: index.php?page=sections&id=" . $_GET['id']);
            exit;
        }
    }

    public function edit()
    {
        $section = $this->repo->findOne((int)$_GET['idsection']);
        require "./views/layout/sections/Sections_edit.php";
    }

    public function update()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $section = new Section();
            $section->hydrate([
                'id'      => $_GET['idsection'],
                'titleS'  => $_POST['titleS'],
                'content' => $_POST['ContentSd'],
            ]);

            $this->repo->update($section);

            header("Location: index.php?page=sections&id=" . $_GET['id']);
            exit;
        }
    }

    public function destroy()
    {
        $this->repo->delete((int)$_GET['idsection']);

        header("Location: index.php?page=sections&id=" . $_GET['id']);
        exit;
    }
}
