
<?php

include '../SessionController.php';
include '../config.php';

if ($_SERVER['REQUEST_METHOD'] != 'POST') {
   echo "only post method allowed";
}

else {    
$names=$_POST['names'];
$email=$_POST['email'];
$user_name=$_POST['username'];
$password=$_POST['password'];
$updateQuery= "UPDATE users set Names='$names', Email = '$email', Username= '$user_name', `Password`= '$password' where Username='$userName' and `Password`='$userPassword'";
// Prepare and execute statement
$stmt = $conn->query($updateQuery);

// Execute the statement
if ($stmt) {
    echo "Profile updated successfully.";
}
 else {
    echo "Error: " . $conn->error;
}

// Close statement and connection
$stmt->close();
$conn->close();

}
?>






