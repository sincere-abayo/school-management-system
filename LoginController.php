<?php
session_start();
include 'config.php'; // This file contains database connection settings

// Retrieve form data
$username = $_POST['username'];
$password = $_POST['password'];
$role = $_POST['role'];

// // Database connection
// $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
// }

// SQL query based on role
if ($role == 'admin') {
    $sql = "SELECT * FROM users WHERE Username = ? AND Password = ?";
} else if ($role == 'school') {
    $sql = "SELECT * FROM schools WHERE Username = ? AND Password = ?";
} else {
    die("Invalid role specified.");
}

// Prepare and execute statement
$stmt = $conn->prepare($sql);
$stmt->bind_param('ss', $username, $password);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    // Successful login
    $_SESSION['username'] = $username;
    $_SESSION['role'] = $role;
    $_SESSION['password'] = $password;
    
    echo "Login successful! Welcome " . htmlspecialchars($username);
} else {
    // Failed login
    echo "Invalid username or password.";
}

$stmt->close();
$conn->close();
?>
