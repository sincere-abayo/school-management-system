<?php 
include '../SessionController.php';
include '../config.php';


// $getSchoolNumber=mysqli_affected_rows($getSchoolNumber);

// SQL query to count schools
$sqlSchool = "SELECT *,COUNT(*)AS school_count FROM schools";

$resultSchool = $conn->query($sqlSchool);

if ($resultSchool->num_rows > 0) {
    $row = $resultSchool->fetch_assoc();
    $schoolCount = $row['school_count'];
    //while ($schoolData=mysqli_fetch_array($conn->query($sqlSchool))) {
        $schoolData=mysqli_fetch_array($conn->query($sqlSchool));
        $school_name=$schoolData['School_name'];
        $district=$schoolData['District'];
        $sector=$schoolData['Sector'];
        $phone=$schoolData['Phone'];
        $email=$schoolData['Email'];
        $user=$schoolData['Username'];
        $password=$schoolData['Password'];

        // echo "$school_name $district $sector $phone $email $user $password";
   // }
    echo $schoolCount;
    }
    
else {
    $schoolCount = 0;
    echo "no school found";
   
}
// SQL query to count projects
$projectnq = "SELECT COUNT(*)AS project_count FROM project";

$sqlProject = "SELECT * FROM projects join schools on (projects.school_id=projects.school_id)";

$resultProject = $conn->query($sqlProject);
$resultProjectnq = $conn->query($projectnq);
$row = $resultProject->fetch_assoc();
$projectCount = $row['project_count'];

if ($resultProject->num_rows> 0) {


    // $projectCount = $resultProject->num_rows;
    $projectData=mysqli_fetch_array($conn->query($sqlProject));
    $project_name=$projectData['Project_Name'];
    $project_owner = $projectData['Project_owner'];
    $project_file=$projectData['Project_file'];
    $project_school_name = $projectData['School_name'];
//   echo "$project_name";
echo $projectCount;
    
} 
else {
   
    echo "no project found";
   
}
// echo $projectCount;
// echo $schoolCount;


$conn->close();


?>