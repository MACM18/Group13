<?php
session_start();
require 'Connection.php';
$currentuser = $_SESSION['username'];
$Title = $_POST["Title"];
$Emoji = $_POST["Emoji"];
$position = $_POST["position"];
$response = array();
$query = "INSERT INTO category (`User_Name`, `Title`, `Emoji`, `position`, `visibility`) VALUES('$currentuser','$Title','$Emoji','$position',1)";
if (mysqli_query($connection, $query)) {
    $response['Response'] = "success";
    // echo "success";
} else {
    $response['Response'] = "failed";
    // echo mysqli_error($connection);
}
echo json_encode($response);
?>