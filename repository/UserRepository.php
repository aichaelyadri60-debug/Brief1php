<?php 

require_once "./repository/BaseRepository.php";
require_once "./Model/User.php";

class UserRepository extends BaseRepository{
    protected string $table ='users';
    protected string $entityClase =User::class;

     public function findByEmail(string $email): ?User
    {
        $stmt = $this->pdo->prepare(
            "SELECT * FROM users WHERE email = :email"
        );
        $stmt->execute(['email' => $email]);

        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if (!$row) return null;

        $user = new User();
        $user->hydrate($row);
        return $user;
    }
}