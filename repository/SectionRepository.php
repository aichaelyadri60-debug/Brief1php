<?php

class SectionRepository extends BaseRepository
{
    protected string $table = 'sections';
    protected string $entityClass = Section::class;

    public function findByCourse(int $courseId): array
    {
        $stmt = $this->pdo->prepare(
            "SELECT * FROM sections WHERE course_id = :id"
        );
        $stmt->execute(['id' => $courseId]);

        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $entities = [];

        foreach ($rows as $row) {
            $entity = new Section([]);
            $entity->hydrate($row);
            $entities[] = $entity;
        }
        return $entities;
    }

        public function deleteByCourse(int $courseId): bool
    {
        $stmt = $this->pdo->prepare(
            "DELETE FROM sections WHERE course_id = ?"
        );
        return $stmt->execute([$courseId]);
    }
}
