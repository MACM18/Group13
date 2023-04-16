<?php
session_start();
require "Connection.php";
$user = $_POST['UserName'];
$pass = $_POST['Password'];
// $user = "Elephant";
// $pass = "12345";
$query = "select User_Name from user where User_Name='$user' and password='$pass'";
$result = mysqli_query($connection, $query);
$data = mysqli_fetch_assoc($result);
if ($data == null) {
    echo json_encode("invalid");
} else {
    $_SESSION['username'] = $data["User_Name"];
    echo json_encode($data);
}
?>