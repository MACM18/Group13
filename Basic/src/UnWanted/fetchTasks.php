<?php
session_start();
require 'Connection.php';
$currentuser = $_SESSION['username'];
$currentuser = "aaaaa";
if (isset($_POST['Category'])) {
    $category = $_POST['Category'];
}
if (isset($category)) {
    $query = "Select * from task where User_Name='$currentuser' and Category=$category order by date,time";
} else {
    $query = "Select * from task where User_Name='$currentuser' order by date,time";
}
// $query = "Select * from task where User_Name='$currentuser' order by date,time";
$result = mysqli_query($connection, $query);
$collection = array();

while ($data = mysqli_fetch_array($result)) {
    $collection[] = $data;
}
echo json_encode($collection);
?>