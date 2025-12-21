<?php
require_once './Model/BaseEntity.php';

class Enrollment extends BaseEntity
{
    protected ?int $id = null;
    protected ?int $user_id = null;
    protected ?int $course_id = null;
    protected ?string $created_at = null;

    public function getUserId() {
        return $this->user_id;
    }

    public function getCourseId() {
        return $this->course_id;
    }

    public function getCreatedAt() {
        return $this->created_at;
    }
}
