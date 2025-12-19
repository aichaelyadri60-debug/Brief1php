<?php


require_once('./modaloop/BaseEntity.php');
class Section extends BaseEntity
{
    protected int $id;
    protected string $titleS;
    protected string $content;
    protected int $course_id;

}

