<?php
include 'connection.php';

$name = $_POST['teacher_name'];
$email = $_POST['teacher_email'];
$pass1 = $_POST['pass1'];
$pass2 = $_POST["pass2"];
$id = $_POST['teacher_id'];
$dept = $_POST['teacher_dept'];
$phn = $_POST['teacher_phn'];

if ($pass1 === $pass2) {
    
    $checkEmailQuery = "SELECT * FROM `teacher` WHERE `email` = '$email'";
    $resultCheckEmail = mysqli_query($conn, $checkEmailQuery);

    if (mysqli_num_rows($resultCheckEmail) > 0) {
        header("Location: teacher_signin.php?error=email_exists");
        exit();
    } else {
        $insertQuery = "INSERT INTO `teacher` (`name`, `email`, `password`, `teacher_id`, `dept`, `phone`) VALUES ('$name', '$email', '$pass1', '$id', '$dept', '$phn')";
        $resultInsert = mysqli_query($conn, $insertQuery);

        if ($resultInsert) {
            header("Location: teacher_signin.php?success=registration_successful");
            exit();
        } else {
            header("Location: teacher_signin.php?error=registration_failed");
            exit();
        }
    }
} else {
    header("Location: teacher_signin.php?error=password_mismatch");
    exit();
}

mysqli_close($conn);
?>