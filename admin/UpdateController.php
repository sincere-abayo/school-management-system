
<?php

include '../SessionController.php';
include '../config.php';

if (!isset($_POST['school-id'])) {
   echo "only post method allowed";
}

else {    
$school_name=$_POST['school-name'];
$id=$_POST['school-id'];
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

$conn->close();

}
?>






