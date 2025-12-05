<?php 
$servername ="localhost";
$root = "root";
$password ="";
$database ="brief1php";

$connexion =new mysqli($servername ,$root ,$password ,$database);
if($connexion->connect_error){
    die("erreur de connexion ". $connexion->connect_error);
}
?>