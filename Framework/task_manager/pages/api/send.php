<?php
// In your PHP script, receive the data from the API route and insert it into the MySQL database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "food";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Receive the data from the API route
$data = json_decode(file_get_contents('php://input'), true);
echo $data;
// Insert the data into the MySQL database
$name = $data['name'];
$email = $data['email'];
$message = $data['message'];

$stmt = $conn->prepare("INSERT INTO test (name, email, message) VALUES (?, ?, ?)");
$stmt->bind_param($name, $email, $message);
$stmt->execute();
$stmt->close();
$conn->close();

// Send a response back to the API route
$response = array('success' => true);
echo json_encode($response);
?>