<?php
$servername = "localhost";
$username   = "root";
$password   = "";
$database   = "brief1php";
try{
    $connexion = new PDO("mysql :host =$servername","dbname:$database" , $username, $password);
    $connexion ->setAttribute(PDO ::ATTR_ERRMODE ,PDO ::ERRMODE_EXCEPTION);
}catch(PDOexception $e){
    die("erreur sur :" .$e->getMessage());
}

    ?>