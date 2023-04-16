<?php
session_start();
require "Connection.php";
$user = $_POST['UserName'];
$pass = $_POST['Password'];
$name = $_POST['Name'];
$phone = $_POST['Phone'];
$email = $_POST['Email'];
// $user = "Elephant";
// $pass = "12345";
$queryInsert = "INSERT INTO `user` (`Name`, `Email`, `Mobile_No`, `User_Name`, `password`) VALUES ('$name', '$email', '$phone', '$user', '$pass')";
$queryCheck = "SELECT User_Name FROM user WHERE User_Name='$user'";
$response = array();
if (mysqli_query($connection, $queryInsert)) {
    // echo json_encode("success");
    $response['Insert'] = 'success';
} else {
    // echo json_encode(mysqli_error($connection));
    $response['InsertError'] = mysqli_error($connection);
}
$result = mysqli_query($connection, $queryCheck);
$data = mysqli_fetch_assoc($result);
if ($data == null) {
    // echo json_encode("invalid");
    $response['Available'] = "Database";
} else {
    // echo json_encode($data);
    $response['Available'] = "not";
}
echo json_encode($response);
?>