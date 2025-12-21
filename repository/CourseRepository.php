<?php

class CourseRepository extends BaseRepository
{
    protected string $table = 'courses';
    protected string $entityClass = Course::class;
}