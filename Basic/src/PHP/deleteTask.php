<?php
session_start();
require 'Connection.php';
$currentuser = $_SESSION['username'];
$id = $_POST['id'];
$response = array();
$query = "DELETE FROM task WHERE id='$id'";
if (mysqli_query($connection, $query)) {
    $response['Response'] = "success";
} else {
    $response['Response'] = "faild";
}
echo json_encode($response);
?>