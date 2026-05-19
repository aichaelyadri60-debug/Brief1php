<?php   

header('location: statistique2.php');
if(isset($_SESSION['admin']['count'])){
    $_SESSION['admin']=['count'=> $count+=1];
    echo $_SESSION['admin']['count'];
}