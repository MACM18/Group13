<?php
require "Connection.php";
$status = !$_POST['status'];
$id = $_POST['id'];
// echo $status;
// echo $id;
$query = "Update task set status='$status' where id='$id'";
if (mysqli_query($connection, $query)) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . mysqli_error($connection);
}

?>