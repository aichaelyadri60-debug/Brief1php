<?php


require_once('./Model/BaseEntity.php');
class Section extends BaseEntity
{
    protected ?int $id = null;
    protected ?string $titleS = null;
    protected ?string $content = null;
    protected ?int $course_id = null;
    protected ?string $created_at = null;

    public function getId(): ?int {
        return $this->id;
    }

    public function getTitleS(): ?string {
        return $this->titleS;
    }
        public function getContent(): ?string {
        return $this->content;
    }

    public function getCreatedAt(): ?string {
        return $this->created_at;
    }

    public function getCourseId(): ?int {
        return $this->course_id;
    }
}


