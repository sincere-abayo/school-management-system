<?php

include '../SessionController.php';
include '../config.php';

if (!isset($_GET['school_id'])) {
    echo "only get method allowed";
}

else{
    $id = $_GET['school_id'];
    $sql = "DELETE from schools where school_id = ? ";

    // Prepare the statement
    $stmt = $conn->prepare($sql);
    
    if ($stmt === false) {
        die("Prepare failed: " . $conn->error);
    }
    
    // Bind parameters to placeholders
    $stmt->bind_param('i', $id);
    
    // Execute the statement
    if ($stmt->execute()) {
        echo "School deleted well.";
    } else {
        echo "Error: " . $conn->error;
    }
    
    // Close statement and connection
    $stmt->close();
    $conn->close();
}
?>