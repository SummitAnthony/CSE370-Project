<?php
if (isset($_POST['submitquiz'])) {
    include('dbconnection.php');

    // Validate course selection
    if (!isset($_POST['courseSelection']) || empty($_POST['courseSelection'])) {
        echo '<div class="alert alert-danger" role="alert">Please select a course.</div>';
        exit();
    }
    $selectedCourse = mysqli_real_escape_string($conn, $_POST['courseSelection']);

    // Validate quiz file
    $quizFile = $_FILES['quizFile'];
    $fileName = $quizFile['name'];
    $fileTempName = $quizFile['tmp_name'];
    $fileSize = $quizFile['size'];

    // Check if file was uploaded
    if (!is_uploaded_file($fileTempName)) {
        echo '<div class="alert alert-danger" role="alert">Please upload a quiz file.</div>';
        exit();
    }

    // Check file size
    if ($fileSize > 1048576) { // 1 MB
        echo '<div class="alert alert-danger" role="alert">File size is too large. Maximum allowed size is 1 MB.</div>';
        exit();
    }

    // Get file extension
    $fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);
    $allowedExtensions = ['pdf'];

    // Check file extension
    if (!in_array(strtolower($fileExtension), $allowedExtensions)) {
        echo '<div class="alert alert-danger" role="alert">Only PDF files are allowed.</div>';
        exit();
    }

    // Generate a unique filename to avoid conflicts
    $uniqueFileName = uniqid() . '.' . $fileExtension;

    // Set upload directory
    $uploadDirectory = 'uploads/';

    // Create upload directory if it doesn't exist
    if (!is_dir($uploadDirectory)) {
        mkdir($uploadDirectory, 0755, true);
    }

    // Set target file path
    $targetFilePath = $uploadDirectory . $uniqueFileName;

    // Upload file
    if (!move_uploaded_file($fileTempName, $targetFilePath)) {
        echo '<div class="alert alert-danger" role="alert">Error uploading the file.</div>';
        exit();
    }

    // Prepare and execute SQL statement
    $stmt = $conn->prepare("INSERT INTO quiz (sc, pdf_file_path) VALUES (?, ?)");
    $stmt->bind_param("ss", $selectedCourse, $targetFilePath);

    if ($stmt->execute()) {
        echo '<div class="alert alert-success" role="alert">Quiz Scheduled Successfully</div>';
    } else {
        echo '<div class="alert alert-danger" role="alert">Error: ' . $stmt->error . '</div>';
    }

    $stmt->close();

    // Close database connection
    $conn->close();
}
?>
