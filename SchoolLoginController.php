<?php
session_start();
include 'config.php'; // This file contains database connection settings

// Retrieve form data
$email = $_POST['email'];
$password = $_POST['password'];


// SQL query based on role

    $sql = "SELECT * FROM schools WHERE Email = ? AND `Password` = ?";

// Prepare and execute statement
$stmt = $conn->prepare($sql);
$stmt->bind_param('ss', $email, $password);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    // Successful login

        $_SESSION['email'] = $email;
        $_SESSION['password'] = $password;
    


    echo "Login successful! Welcome " . htmlspecialchars($username);
} else {
    // Failed login
    echo "Invalid username or password.";
}

$stmt->close();
$conn->close();
?>
