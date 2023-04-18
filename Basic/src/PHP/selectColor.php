<?php
require 'Connection.php';
session_start();
$_SESSION['color'] = $_POST['color'];
$currentUser = $_SESSION['username'];
$tempC = $_SESSION['color'];
$query = "UPDATE color SET color='$tempC' WHERE User_Name='$currentUser'";
mysqli_query($connection, $query);
echo $currentUser;
echo $tempC;
?>