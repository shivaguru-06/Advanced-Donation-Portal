<?php
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$database = "donation";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
function sanitizePhoneNumber($input) {
    // Remove non-numeric characters
    $phone = preg_replace("/[^0-9]/", "", $input);
    
    // Validate phone number length
    if (strlen($phone) >= 10 && strlen($phone) <= 15) {
        return $phone;
    } else {
        return false;
    }
}

// Assuming you have a form with fields named 'name' and 'email', you can retrieve the data like this:
$name = $_POST['name'];
$email = $_POST['email'];
$phone = isset( $_POST['phone'])? sanitizePhoneNumber($_POST['phone']) : "";
$clothe_type = $_POST['clothe_type'];
$preferred_date = $_POST['preferred_date'];
$preferred_time = $_POST['preferred_time'];
$preferred_address = $_POST['preferred_address'];
$message = $_POST['message'];
if (!$phone) {
    echo "Error: Invalid phone number";
    exit; // Stop execution if phone number is invalid
}


// SQL query to insert data into the database
$sql = "INSERT INTO clothe (name, email, phone ,clothe_type,preferred_date, preferred_time, preferred_address, message) VALUES ('$name', '$email', '$phone', '$clothe_type','$preferred_date','$preferred_time', '$preferred_address', '$message')";

// Execute the query
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


// Close the database connection
$conn->close();
?>