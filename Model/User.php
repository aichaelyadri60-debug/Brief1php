<?php 

require_once './Model/BaseEntity.php';
class User extends BaseEntity{
    protected ?int $id =null ;
    protected ?string $name =null ;
    protected ?string $email =null ;
    protected ?string $password =null ;
    protected ?string $role =null ;
    protected ?string $created_at =null;

    public function getEmail(){
        return $this->email;
    }
    public function getId(){
        return $this->id;
    }
    public function getName(){
        return $this->name;
    }
    public function getPassword(){
        return $this->password;
    }
}