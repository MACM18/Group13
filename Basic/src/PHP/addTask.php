<?php
session_start();
require 'Connection.php';
$currentuser = $_SESSION['username'];
$task = $_POST["task"];
$Date = $_POST["Date"];
$time = $_POST["time"];
$Category = $_POST["Category"];
$query0 = "SELECT id FROM category WHERE User_Name='$currentuser' AND Title='$Category'";
$result = mysqli_query($connection, $query0);
$catID = mysqli_fetch_array($result);
$response = array();
$query = "INSERT INTO task (`User_Name`, `task`, `Date`, `time`, `Category`) VALUES('$currentuser','$task','$Date','$time','$catID[0]')";
if (mysqli_query($connection, $query)) {
    $response['Response'] = "success";
    // echo "success";
} else {
    $response['Response'] = "faild";
    // echo mysqli_error($connection);
}
echo json_encode($response);
?>