<?php
if(isset($_POST['submitAssignment'])){
    include('dbconnection.php');

    $selectedCourse = mysqli_real_escape_string($conn, $_POST['courseSelection']);
    
   
    $assignmentFile = $_FILES['assignmentFile'];
    $fileName = $assignmentFile['name'];
    $fileTempName = $assignmentFile['tmp_name'];

    
    $fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);
    $allowedExtensions = ['pdf'];

    if (!in_array(strtolower($fileExtension), $allowedExtensions)) {
        echo '<div class="alert alert-danger" role="alert">Only PDF files are allowed.</div>';
        exit(); 
    }

    
    $uploadDirectory = 'assignments/'; 
    $targetFilePath = $uploadDirectory . $fileName;

    if (move_uploaded_file($fileTempName, $targetFilePath)) {
        // Insert data into Assignment table
        $sql = "INSERT INTO assignment (sc, pdf_file_path) VALUES ('$selectedCourse', '$targetFilePath')";
        $run = mysqli_query($conn, $sql);

        if ($run == true){
            echo '<div class="alert alert-success" role="alert">Assignment Uploaded Successfully</div>';
        } else {
            echo '<div class="alert alert-danger" role="alert">Error: ' . mysqli_error($conn) . '</div>';
        }
    } else {
        echo '<div class="alert alert-danger" role="alert">Error uploading the file.</div>';
    }
}
?>
