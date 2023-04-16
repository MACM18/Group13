<?php
session_start();
require 'Connection.php';
$currentuser = $_SESSION['username'];
$task = $_POST["task"];
$Date = $_POST["Date"];
$time = $_POST["time"];
$Category = $_POST["Category"];
$id = $_POST['id'];
$query0 = "SELECT id FROM category WHERE User_Name='$currentuser' AND Title='$Category'";
$result = mysqli_query($connection, $query0);
$catID = mysqli_fetch_array($result);
$response = array();
$query = "UPDATE task SET task='$task',Date='$Date',time='$time',Category='$catID[0]' WHERE id='$id'";
if (mysqli_query($connection, $query)) {
    $response['Response'] = "success";
} else {
    $response['Response'] = "faild";
}
echo json_encode($response);
?>