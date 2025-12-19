<?php

$servername = "localhost";
$username   = "root";
$password   = "";
$database   = "brief1php";
try{
    $pdo =new pdo ("mysql:host=$servername ,dbname=$username" ,$password ,$database);
    $pdo->setAttribute(PDO::ATTR_ERRMODE ,PDO::ERRMODE_EXCEPTION);
    return $pdo;

}catch(PDOException $e){
    echo"erreur" .$e->getmessage();
}


?>