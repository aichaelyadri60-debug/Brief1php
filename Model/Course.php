<?php

require_once('./Model/BaseEntity.php');
class Course extends BaseEntity{
    public ?int $id = null;
    public ?string $title = null;
    public ?string $DescriptionC = null;
    public ?string $level = null;
    public ?string $image = null;
    public ?string $created_at = null;
    public function getId() { return $this->id; }
    public function getTitle() { return $this->title; }
    public function getDescriptionC() { return $this->DescriptionC; }
    public function getLevel() { return $this->level; }
    public function getImage() { return $this->image; }
    public function getCreatedAt() { return $this->created_at; }
    
}
