<?php
// Enable error reporting for debugging (optional, can be removed in production)
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Database credentials
$servername = "localhost";  // Your database server (usually "localhost")
$username = "root";         // Your MySQL username (default is "root" for local development)
$password = "";             // Your MySQL password (leave empty if no password is set)
$dbname = "bihar_tourism";  // Your database name (replace with your actual DB name)

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);  // Stop if connection fails
}
?>
