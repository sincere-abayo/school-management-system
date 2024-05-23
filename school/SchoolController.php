
<?php
include '../SessionController.php';
include '../config.php';

$sql = "SELECT * FROM schools WHERE Username = ? AND Password = ?";
// Prepare and execute statement
$stmt = $conn->prepare($sql);
$stmt->bind_param('ss', $userName, $userPassword);
$stmt->execute();
$result = $stmt->get_result();

// Initialize an array to store all selected data
// $schoolData = array();

// Fetch all rows returned by the query
while ($row = $result->fetch_assoc()) {
    // Append each row to the $schoolData array
    $school_name = $row['School_name'];
    $district=$row['District'];
    $sector=$row['Sector'];
    $phone=$row['Phone'];
    $email=$row['Email'];
    $user=$row['Username'];
    $password=$row['Password'];
    $school_id=$row['school_id'];
}


// echo "$school_name . $district . $sector. $phone . $email . $password . $school_id";

// SQL query to count projects
$projectnq = "SELECT COUNT(*)AS project_count FROM projects where school_id= '$school_id'";

$sqlProject = "SELECT * FROM projects join schools on (projects.school_id=schools.school_id) where schools.school_id= '$school_id'";

$resultProject = $conn->query($sqlProject);
$resultProjectnq = $conn->query($projectnq);
$row = $resultProjectnq->fetch_assoc();
$projectCount = $row['project_count'];

if ($resultProject->num_rows> 0) {


    // $projectCount = $resultProject->num_rows;
    $projectData=mysqli_fetch_array($conn->query($sqlProject));
    $project_name=$projectData['Project_Name'];
    $project_owner = $projectData['Project_owner'];
    $project_file=$projectData['Project_file'];
    $project_school_name = $projectData['School_name'];
    $project_status = $projectData['Project_status'];
//   echo "$project_name";
// echo $projectCount;
    
} 
else {
   
    echo "no project found";
   
}

?>