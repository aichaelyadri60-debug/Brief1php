<?php
require_once "./repository/SectionRepository.php";
require_once "./repository/CourseRepository.php";
require_once "./Model/Sections.php";
require_once "./Model/Course.php";
require_once "./helpers/auth.php";

class CourseController
{
    private CourseRepository $repo;

    public function __construct()
    {
        auth();
        $this->repo = new CourseRepository();
    }

    public function list()
    {
        $courses = $this->repo->findAll();
        require "./views/layout/courses/courses_list.php";
    }

    public function create()
    {
        require "./views/layout/courses/courses_create.php";
    }

    public function store()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $imageName = null;
            if (!empty($_FILES['imagecourses']['name'])) {
                $imageName = time() . '_' . $_FILES['imagecourses']['name'];
                move_uploaded_file(
                    $_FILES['imagecourses']['tmp_name'],
                    './images/' . $imageName
                );
            }

            $course = new Course();
            $course->hydrate([
                'title'        => $_POST['title'],
                'DescriptionC' => $_POST['description'],
                'level'        => $_POST['level'],
                'image'        => $imageName,
                'created_at'   => date('Y-m-d')
            ]);

            $this->repo->create($course);

            header("Location: index.php?page=courses");
            exit;
        }
    }

    public function edit()
    {
        $course = $this->repo->findOne((int)$_GET['id']);
        require "./views/layout/courses/courses_edit.php";
    }

public function update()
{
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $id = (int)$_GET['id'];

        $existingCourse = $this->repo->findOne($id);

        $imageName = $existingCourse->getImage();

        if (
            isset($_FILES['imagecourses']) &&
            $_FILES['imagecourses']['error'] === UPLOAD_ERR_OK
        ) {
            $imageName = time() . '_' . basename($_FILES['imagecourses']['name']);

            move_uploaded_file(
                $_FILES['imagecourses']['tmp_name'],
                __DIR__ . '/../images/' . $imageName
            );
        }

        $course = new Course();
        $course->hydrate([
            'id'           => $id,
            'title'        => $_POST['title'],
            'DescriptionC' => $_POST['description'],
            'level'        => $_POST['level'],
            'image'        => $imageName,
            'created_at'   => $existingCourse->getCreatedAt()
        ]);

        $this->repo->update($course);

        header("Location: index.php?page=courses");
        exit;
    }
}



    public function destroy()
    {
            $courseId = (int)$_GET['id'];
    $sectionRepo = new SectionRepository();
    $sectionRepo->deleteByCourse($courseId);
        $this->repo->delete((int)$_GET['id']);
        header("Location: index.php?page=courses");
        exit;
    }
}
