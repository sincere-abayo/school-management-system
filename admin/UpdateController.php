
<?php

include '../SessionController.php';
include '../config.php';

if ($_SERVER['REQUEST_METHOD'] != 'POST') {
   echo "only post method allowed";
}

else {    
$school_name=$_POST['school-name'];
$id=$_POST['school_id'];
$updateQuery= "UPDATE schools set School_name='$school_name' where school_id='$id'";
// Prepare and execute statement
$stmt = $conn->query($updateQuery);

// Execute the statement
if ($stmt) {
    echo "School updated successfully.";
}
 else {
    echo "Error: " . $conn->error;
}

// Close statement and connection
$stmt->close();
$conn->close();

}
?>






