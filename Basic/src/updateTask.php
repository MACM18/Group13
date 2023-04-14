<?php
session_start();
require 'Connection.php';
$task = $_POST["task"];
$Date = $_POST["Date"];
$time = $_POST["time"];
$Category = $_POST["Category"];
$status = $_POST["status"];

?>