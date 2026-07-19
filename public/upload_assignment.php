<?php
if(isset($_POST['submitAssignment'])){
    require_once __DIR__ . '/../includes/db.php';

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
        $stmt = mysqli_prepare($conn, "INSERT INTO assignment (sc, pdf_file_path) VALUES (?, ?)");
        mysqli_stmt_bind_param($stmt, 'ss', $selectedCourse, $targetFilePath);
        $run = mysqli_stmt_execute($stmt);

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
