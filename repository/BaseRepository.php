<?php 
abstract class BaseRepository extends BaseManager
{
    protected string $table;
    protected string $entityClass;

    public function findAll(): ?array
    {
        return $this->mapToEntities(
            $this->fetchAll("SELECT * FROM {$this->table}")
        );
    }

    public function findById(int $id): ?object
    {
        $row = $this->fetchOne(
            "SELECT * FROM {$this->table} WHERE id = :id",
            ['id' => $id]
        );

        return $row ? $this->mapToEntity($row) : null;
    }

    public function delete(int $id): bool
    {
        return $this->execute(
            "DELETE FROM {$this->table} WHERE id = :id",
            ['id' => $id]
        );
    }
}










?>