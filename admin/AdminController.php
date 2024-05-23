<?php 
include 'SessionController.php';
include 'config.php';


// $getSchoolNumber=mysqli_affected_rows($getSchoolNumber);

// SQL query to count schools
$sqlSchool = "SELECT COUNT(*)AS school_count FROM schools";

$resultSchool = $conn->query($sqlSchool);

if ($resultSchool->num_rows > 0) {
    $row = $resultSchool->fetch_assoc();
    $schoolCount = $row['school_count'];
    
} else {
    $schoolCount = 0;
   
}

// SQL query to count projects
$sqlProject = "SELECT COUNT(*)AS project_count FROM projects";

$resultProject = $conn->query($sqlProject);

if ($resultProject->num_rows > 0) {
    $row = $resultProject->fetch_assoc();
    $projectCount = $row['project_count'];
    
} 
else {
    $projectCount = 0;
   
}
echo $projectCount;
echo $schoolCount;
$conn->close();


?>