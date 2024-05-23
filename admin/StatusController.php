
<?php
include '../SessionController.php';
include '../config.php';

if($_SERVER['REQUEST_METHOD']=='POST')
{
$project_id=$_POST['project_id'];     
$project_status= $_POST['project_status'];

$updateQuery= "UPDATE projects set Project_status = '$project_status' where Project_id='$project_id'";

$stmt = $conn->query($updateQuery);

// Execute the statement
if ($stmt) {
    echo "Status updated successfully.";
}
 else {
    echo "Error: " . $conn->error;
}

// Close statement and connection

$conn->close();
}

else{
    echo "only post method allowed";
}
?>