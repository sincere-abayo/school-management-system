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

        echo "$school_name $district $sector $phone $email $user $password";

    echo $schoolCount;
    }
    
else {
    $schoolCount = 0;
    echo "no school found";
   
}
$conn->close();


?>