
<?php

include '../SessionController.php';
include '../config.php';

if ($_SERVER['REQUEST_METHOD']=='POST') {
   
    $school_name=$_POST['school-name'];
$district=$_POST['district'];
$sector=$_POST['sector'];
$phone=$_POST['phone'];
$email=$_POST['email'];
$user=$_POST['user'];
$password=$_POST['password'];
$id=NULL;
$insertQuery= "INSERT into schools values ('$id','$school_name','$district','$sector','$phone','$email','$user','$password')";
// Prepare and execute statement
$stmt = $conn->query($insertQuery);


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

else {
    echo "only post method allowed";
}
?>

