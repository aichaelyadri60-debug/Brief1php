<?php
require_once "./config/db.php";

class EnrollmentRepository
{
    private PDO $pdo;

    public function __construct()
    {
        $this->pdo = require "./config/db.php";
    }
    public function enroll(int $userId, int $courseId): bool
    {
        $sql = "INSERT INTO enrollments (user_id, course_id)
                VALUES (:user_id, :course_id)";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([
            'user_id' => $userId,
            'course_id' => $courseId
        ]);
    }
    public function isEnrolled(int $userId, int $courseId): bool
    {
        $sql = "SELECT COUNT(*) FROM enrollments
                WHERE user_id = ? AND course_id = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$userId, $courseId]);
        return $stmt->fetchColumn() > 0;
    }
}
