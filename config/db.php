<?php

$servername = "localhost";
$username   = "root";
$password   = "aicha123";
$database   = "brief1php";

try {
    $pdo = new PDO(
        "mysql:host=$servername;dbname=$database;charset=utf8mb4",
        $username,
        $password,
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]
    );

    return $pdo;

} catch (PDOException $e) {
    die("Erreur connexion : " . $e->getMessage());
}
