<?php
$user = 'taskUser';
$password = '12345';
$host = 'localhost';
$database = 'taskManager';
$connection = mysqli_connect($host, $user, $password, $database);
$connection->set_charset('utf8mb4');
?>