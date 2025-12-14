<?php
$servername = "localhost";
$username   = "root";
$password   = "";
$database   = "brief1php";
$connexion = new mysqli($servername, $username, $password, $database);
if ($connexion->connect_error) {
    die("Erreur de connexion : " . $connexion->connect_error);
}
?>