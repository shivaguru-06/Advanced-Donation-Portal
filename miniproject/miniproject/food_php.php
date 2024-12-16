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


// Assuming you have a form with fields named 'name' and 'email', you can retrieve the data like this:
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$food_type = $_POST['food_type'];
$quantity = $_POST['quantity'];
$preferred_date = $_POST['preferred_date'];
$preferred_time = $_POST['preferred_time'];
$preferred_address = $_POST['preferred_address'];
$message = $_POST['message'];




// SQL query to insert data into the database
$sql = "INSERT INTO food(name, email, phone , food_type, quantity,preferred_date, preferred_time, preferred_address, message) VALUES ('$name', '$email', '$phone','$food_type', '$quantity', '$preferred_date','$preferred_time', '$preferred_address', '$message')";

// Execute the query
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


// Close the database connection
$conn->close();
?>