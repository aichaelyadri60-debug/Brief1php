<?php
require_once "./repository/UserRepository.php";

class AuthController
{
    private UserRepository $repo;

    public function __construct()
    {
        $this->repo = new UserRepository();
    }

    public function login()
    {
        require "./views/layout/auth/login.php";
    }

    public function register()
    {
        require "./views/layout/auth/register.php";
    }

    public function store()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $user = new User();
            $user->hydrate([
                'name'     => $_POST['name'],
                'email'    => $_POST['email'],
                'password' => password_hash($_POST['password'], PASSWORD_DEFAULT),
            ]);

            $this->repo->create($user);

            header("Location: index.php?page=login");
            exit;
        }
    }

    public function authenticate()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $user = $this->repo->findByEmail($_POST['email']);

            if ($user && password_verify($_POST['password'], $user->getPassword())) {

                $_SESSION['admin'] = [
                    'id'    => $user->getId(),
                    'email' => $user->getEmail()
                ];

                header("Location: index.php?page=courses");
                exit;
            }

            $error = "Email ou mot de passe incorrect";
            require "./views/layout/auth/login.php";
        }
    }

    public function logout()
    {
        session_destroy();
        header("Location: index.php?page=login");
        exit;
    }
}
