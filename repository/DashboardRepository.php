<?php
require_once "./config/db.php";

class DashboardRepository
{
    private PDO $pdo;

    public function __construct()
    {
        $this->pdo = require "./config/db.php";
    }

    public function countCourses()
    {
        return $this->pdo->query("SELECT COUNT(*) FROM courses")->fetchColumn();
    }

    public function countUsers()
    {
        return $this->pdo->query("SELECT COUNT(*) FROM users")->fetchColumn();
    }

    public function countInscriptions()
    {
        return $this->pdo->query("SELECT COUNT(*) FROM enrollments")->fetchColumn();
    }

 public function mostPopularCourse()
{
    return $this->pdo->query("
        SELECT c.title, COUNT(e.id) AS total
        FROM courses c
        LEFT JOIN enrollments e ON e.course_id = c.id
        GROUP BY c.id
        ORDER BY total DESC
        LIMIT 1
    ")->fetch(PDO::FETCH_ASSOC);
}


public function avgSectionsPerCourse()
{
    return $this->pdo->query("
        SELECT COALESCE(AVG(section_count), 0)
        FROM (
            SELECT COUNT(*) AS section_count
            FROM sections
            GROUP BY course_id
        ) t
    ")->fetchColumn();
}


    public function inscriptionsByCourse()
    {
        return $this->pdo->query("
            SELECT c.title, COUNT(e.id) AS total
            FROM courses c
            LEFT JOIN enrollments e ON e.course_id = c.id
            GROUP BY c.id
        ")->fetchAll(PDO::FETCH_ASSOC);
    }

    public function coursesWithMoreThanFiveSections()
    {
        return $this->pdo->query("
            SELECT c.title, COUNT(s.id) AS total_sections
            FROM courses c
            JOIN sections s ON s.course_id = c.id
            GROUP BY c.id
            HAVING total_sections > 5
        ")->fetchAll(PDO::FETCH_ASSOC);
    }

    public function usersThisYear()
    {
        return $this->pdo->query("
            SELECT DISTINCT u.name, u.email, e.created_at
            FROM users u
            JOIN enrollments e ON e.user_id = u.id
            WHERE YEAR(e.created_at) = YEAR(CURDATE())
        ")->fetchAll(PDO::FETCH_ASSOC);
    }

    public function coursesWithoutInscription()
    {
        return $this->pdo->query("
            SELECT c.title
            FROM courses c
            LEFT JOIN enrollments e ON e.course_id = c.id
            WHERE e.id IS NULL
        ")->fetchAll(PDO::FETCH_ASSOC);
    }

    public function lastInscriptions()
    {
        return $this->pdo->query("
            SELECT u.name, c.title, e.created_at
            FROM enrollments e
            JOIN users u ON u.id = e.user_id
            JOIN courses c ON c.id = e.course_id
            ORDER BY e.created_at DESC
            LIMIT 5
        ")->fetchAll(PDO::FETCH_ASSOC);
    }
}
