<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Upload Form</title>
</head>
<body>
    <form  method="post" enctype="multipart/form-data">
        <label for="Project_file">Select File:</label>
        <input type="file" name="Project_file" id="Project_file">
        <button type="submit" name="submit">Upload</button>
    </form>

    <?php

// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Check if file is uploaded successfully
    if (isset($_FILES['Project_file']) && $_FILES['Project_file']['error'] === UPLOAD_ERR_OK) {
        // Get file details
        $fileTmpPath = $_FILES['Project_file']['tmp_name'];
        $fileName = $_FILES['Project_file']['name'];
        $fileSize = $_FILES['Project_file']['size'];
        $fileType = $_FILES['Project_file']['type'];
        $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
        
        // Specify the directory where you want to save the uploaded files
        $uploadDir = 'uploads/';

        // Create the upload directory if it doesn't exist
        if (!file_exists($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }
        $fileName=rand(00000,99999).$fileName;

        if ($fileExtension=='pdf') {
           // Move the uploaded file to the desired location
        $destPath = $uploadDir . $fileName;
        if (move_uploaded_file($fileTmpPath, $destPath)) {
            echo "File uploaded successfully. $fileType";
        } 
        else {
            echo "Error occurred while uploading the file.";
        }
        } else {
            echo "only pdf file allowed";
        }
        
    } 
    else {
        echo "No file uploaded or an error occurred.";
    }
} else {
    echo "Invalid request method.";
}
?>

</body>
</html>


