<?php
require_once "./repository/DashboardRepository.php";
require_once "./helpers/auth.php";

class DashboardController
{
    private DashboardRepository $repo;

    public function __construct()
    {
        auth();
        $this->repo = new DashboardRepository();
    }

    public function index()
    {
        $totalCourses              = $this->repo->countCourses();
        $totalUsers                = $this->repo->countUsers();
        $totalInscriptions         = $this->repo->countInscriptions();
        $mostPopularCourse         = $this->repo->mostPopularCourse();
        $avgSections               = $this->repo->avgSectionsPerCourse();
        $inscriptionsByCourse      = $this->repo->inscriptionsByCourse();
        $coursesWithManySections   = $this->repo->coursesWithMoreThanFiveSections();
        $usersThisYear             = $this->repo->usersThisYear();
        $coursesWithoutInscription = $this->repo->coursesWithoutInscription();
        $lastInscriptions          = $this->repo->lastInscriptions();

        require "./views/layout/dashboard/index.php";
    }
}
