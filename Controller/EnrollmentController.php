<?php
require_once "./repository/EnrollmentRepository.php";
require_once "./helpers/auth.php";

class EnrollmentController
{
    private EnrollmentRepository $repo;

    public function __construct()
    {
        auth();
        $this->repo = new EnrollmentRepository();
    }

    public function store()
    {
        $userId   =  $_SESSION['admin']['id']; 
        $courseId = $_GET['course_id'];

        if ($this->repo->isEnrolled($userId, $courseId)) {
            header("Location: index.php?page=courses&error=already_enrolled");
            exit;
        }
        $enrollment =new Enrollment;
                $enrollment->hydrate([
                'user_id' => $_SESSION['admin']['id'] ,
                'course_id' =>  $_GET['course_id']
            ]);
        $this->repo->create($enrollment );

        header("Location: index.php?page=courses&success=enrolled");
        exit;
    }
}
