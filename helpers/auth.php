<?php   



function auth(){
    if(!isset($_SESSION['admin'])){
        header('location: index.php?page=login');
        exit ;
    }
}