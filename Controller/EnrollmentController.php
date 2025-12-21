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
        $userId   = $_SESSION['admin_id'];
        $courseId = (int) $_GET['course_id'];

        if (!$this->repo->isEnrolled($userId, $courseId)) {
            $this->repo->enroll($userId, $courseId);
        }

        header("Location: index.php?page=courses");
        exit;
    }
}
