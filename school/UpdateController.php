
<?php
include '../SessionController.php';
include '../config.php';

if ($_SERVER['REQUEST_METHOD']=='POST') {
   
 // Get file details
 $fileTmpPath = $_FILES['Project_file']['tmp_name'];
 $fileName = $_FILES['Project_file']['name'];
 $fileSize = $_FILES['Project_file']['size'];
 $fileType = $_FILES['Project_file']['type'];
 $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
 
 // Specify the directory where you want to save the uploaded files
 $uploadDir = 'projects/';
$project_name=$_POST['project-name'];
$project_owner=$_POST['project-owner'];
$Project_file=$_POST['Project-file'];
$school_id=$_POST['school-id'];
 // Create the upload directory if it doesn't exist
 if (!file_exists($uploadDir)) {
    mkdir($uploadDir, 0777, true);
}

if ($fileExtension=='pdf') {
    // Move the uploaded file to the desired location
 $destPath = $uploadDir . $fileName;
 if (move_uploaded_file($fileTmpPath, $destPath)) {
    //  echo "File uploaded successfully. $fileType";
    
$insertQuery= "UPDATE into projects values (NULL,'$project_name','$project_owner','$Project_file','pending','$school_id')";
// Prepare and execute statement
$stmt = $conn->query($insertQuery);

// Execute the statement
if ($stmt) {
    echo "Project inserted successfully.";
}
 else {
    echo "Error: " . $conn->error;
}

// Close statement and connection

$conn->close();

 } 
 else {
     echo "Error occurred while uploading the file.";
 }
 } else {
     echo "only pdf file allowed";
 }  

}

else {
    echo "only post method allowed";
}
?>

