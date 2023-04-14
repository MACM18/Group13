<?php
// Connect to the database
$conn = mysqli_connect('localhost', 'root', '', 'food');

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Query the database
// Query the database
$sql = "SELECT * FROM items";
$result = $conn->query($sql);

// Fetch the data
$data = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
}


// Close the database connection
$conn->close();


// Return the data as JSON
// Convert the data to JSON format
$json_data = json_encode($data);

echo json_encode($data);
?>