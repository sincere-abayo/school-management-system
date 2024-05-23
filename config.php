<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

// Database connection
$conn =new mysqli("localhost", "root", "","swiss_contact");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
