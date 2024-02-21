<?php
require 'config.php';

// Retrieve the values submitted by the form
$name = $_POST['name'];
$email = $_POST['email'];
$review = $_POST['review'];

// Create a SQL query to insert the review data into the database
$sql = "INSERT INTO reviews (name, email, review) VALUES ('$name', '$email', '$review')";

// Execute the query and check if it was successful
if ($conn->query($sql) === TRUE) {
    echo "Review added successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the database connection
$conn->close();
?>
