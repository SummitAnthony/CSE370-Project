<?php
include 'connection.php';

$name = $_POST['name'];
$email = $_POST['email'];
$pass1 = $_POST['pass1'];
$pass2 = $_POST["pass2"];
$id = $_POST['id'];
$dept = $_POST['dept'];
$phn = $_POST['phn'];

if ($pass1 === $pass2) {
    
    $checkEmailQuery = "SELECT * FROM `student` WHERE `email` = '$email'";
    $resultCheckEmail = mysqli_query($conn, $checkEmailQuery);

    if (mysqli_num_rows($resultCheckEmail) > 0) {
        
        header("Location: index.php?error=email_exists");
        exit();
    } else {
        
        $insertQuery = "INSERT INTO `student` (`name`, `email`, `password`, `st_id`, `dept`, `phone`) VALUES ('$name', '$email', '$pass1', '$id', '$dept', '$phn')";
        $resultInsert = mysqli_query($conn, $insertQuery);
		
		$insertEmail ="INSERT INTO `students_courses` (`email`) VALUES ('$email')";
        $resultEmail = mysqli_query($conn, $insertEmail);
		
        header("Location: index.php?success=registration_successful");
        exit();
    }
} else {
    header("Location: index.php?error=password_mismatch");
    exit();
}


mysqli_close($conn);


?>