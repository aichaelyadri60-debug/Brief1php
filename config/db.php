<?php

$servername = "localhost";
$username   = "root";
$password   = "aicha123";
$database   = "brief1php";

try {
    $pdo = new PDO(
        "mysql:host=$servername;dbname=$database",
        $username,
        $password,
    );

    return $pdo;

} catch (PDOException $e) {
    die("Erreur connexion : " . $e->getMessage());
}
