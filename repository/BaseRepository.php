<?php 
abstract class BaseRepository
{
    protected PDO $pdo ;
    protected string $table;
    protected string $entityClass;

    public function __construct(){
         $this->pdo = require __DIR__ . '/../config/db.php';
    }
    public function findAll():array{
        $stmt =$this->pdo->query("SELECT * FROM {$this->table}");
        $rows =$stmt->fetchAll(PDO::FETCH_ASSOC);
        $entities =[];
        foreach ($rows as $row) {
            $entity =new $this->entityClass();
            $entity->hydrate($row);
            $entities[] = $entity;
        }
        return $entities;
    }

    public function findOne(int $id): ?object{
        $stmt =$this->pdo->prepare("SELECT * FROM {$this->table} where id =?");
        $stmt->execute([$id]);
        $result =$stmt->fetch(PDO::FETCH_ASSOC);
        if (!$result) return null;
        $entity =new $this->entityClass();
        $entity->hydrate($result);
        return $entity ;
    }

public function create(object $entity): bool
{
    $ref = new ReflectionClass($entity);
    $props = $ref->getProperties();

    $fields = [];
    $params = [];
    $data   = [];

    foreach ($props as $prop) {
        $prop->setAccessible(true);
        $name  = $prop->getName();
        $value = $prop->getValue($entity);
        if ($name === 'id') continue;

        $fields[] = $name;
        $params[] = ':' . $name;
        $data[$name] = $value;
    }

    $sql = "INSERT INTO {$this->table} (" . implode(',', $fields) . ")
            VALUES (" . implode(',', $params) . ")";

    $stmt = $this->pdo->prepare($sql);
    return $stmt->execute($data);
}
public function update(object $entity): bool
{
    $ref   = new ReflectionClass($entity);
    $props = $ref->getProperties();

    $set  = [];
    $data = [];
    $id   = null;

    foreach ($props as $prop) {
        $prop->setAccessible(true);

        $key   = $prop->getName();          
        $value = $prop->getValue($entity);  

        if ($key === 'id') {
            $id = $value;  
            continue;
        }

        $set[]        = "$key = :$key";
        $data[$key]   = $value;
    }

    $data['id'] = $id;

    $sql = "UPDATE {$this->table} SET " . implode(', ', $set) . " WHERE id = :id";
    $stmt = $this->pdo->prepare($sql);

    return $stmt->execute($data);
}

    public function delete(int $id): bool
    {
        $stmt = $this->pdo->prepare("DELETE FROM {$this->table} WHERE id = ?");
        return $stmt->execute([$id]);
    }
}










?>