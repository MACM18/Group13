<?php
session_start();
require 'Connection.php';
$currentuser = $_SESSION['username'];
$Title = $_POST["Title"];
$Emoji = $_POST["Emoji"];
$position = $_POST["position"];
if ($_POST["visibility"] == "on") {
    $visibility = true;
} else {
    $visibility = false;
}

$id = $_POST['id'];

// $query0 = "SELECT id FROM category WHERE User_Name='$currentuser' AND Title='$Category'";
// $result = mysqli_query($connection, $query0);
// $catID = mysqli_fetch_array($result);
$response = array();
$query = "UPDATE category SET Title='$Title',Emoji='$Emoji',position='$position',visibility='$visibility' WHERE id='$id'";
if (mysqli_query($connection, $query)) {
    $response['Response'] = "success";
} else {
    $response['Response'] = "faild";
}
echo json_encode($response);
?>