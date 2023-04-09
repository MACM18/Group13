<?php
$user = 'MACM';
$password = '12345';
$host = 'localhost';
$database = 'taskManager';
$connection = mysqli_connect($host, $user, $password, $database);
if (isset($connection)) {
    echo 'Connected';
} else {
    echo 'not';
}
?>