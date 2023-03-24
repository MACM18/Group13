<?php
    $user='MACM';
    $password='993430870Vmacm';
    $host='localhost';
    $database='taskManager';
    $connection=mysqli_connect($host,$user,$password,$database);
    if(isset($connection)){
        echo 'Connected';
    }
    else{
        echo 'not';
    }
?>