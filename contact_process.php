<?php
// Database connection
include "connection.php";



// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve and sanitize form data
$name = htmlspecialchars($_POST['name']);
$email = htmlspecialchars($_POST['email']);
$subject = htmlspecialchars($_POST['subject']);
$message = htmlspecialchars($_POST['message']);

// Prepare and bind
$stmt = $con->prepare("INSERT INTO messages (name, email, subject, message) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $name, $email, $subject, $message);

// Execute the query
if ($stmt->execute()) {
    echo "Message sent successfully!";
    header("location:aboutus.php");
} else {
    echo "Error: " . $stmt->error;
}

// Close connection
$stmt->close();
$con->close();
?>
