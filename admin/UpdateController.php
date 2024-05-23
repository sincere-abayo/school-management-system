
<?php

include '../SessionController.php';
include '../config.php';

if (!isset($_POST['school_id'])) {
   echo "only post method allowed";
}

else {    
$school_name=$_POST['school-name'];
$district=$_POST['district'];
$sector=$_POST['sector'];
$phone=$_POST['phone'];
$email=$_POST['email'];
$user=$_POST['user'];
$password=$_POST['password'];
$id=$_POST['school_id'];
$updateQuery= "UPDATE schools set School_name='$school_name',District='$district',Sector='$sector',Phone='$phone',Email='$email' where school_id='$id'";
// Prepare and execute statement
$stmt = $conn->query($updateQuery);

// Execute the statement
if ($stmt) {
    echo "School inserted successfully.";
}
 else {
    echo "Error: " . $conn->error;
}

// Close statement and connection

$conn->close();

}
?>






