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
    
    $checkStmt = mysqli_prepare($conn, "SELECT * FROM `teacher` WHERE `email` = ?");
    mysqli_stmt_bind_param($checkStmt, 's', $email);
    mysqli_stmt_execute($checkStmt);
    $resultCheckEmail = mysqli_stmt_get_result($checkStmt);

    if (mysqli_num_rows($resultCheckEmail) > 0) {
        header("Location: teacher_signin.php?error=email_exists");
        exit();
    } else {
        $hashedPassword = password_hash($pass1, PASSWORD_DEFAULT);
        $insertStmt = mysqli_prepare($conn, "INSERT INTO `teacher` (`name`, `email`, `password`, `teacher_id`, `dept`, `phone`) VALUES (?, ?, ?, ?, ?, ?)");
        mysqli_stmt_bind_param($insertStmt, 'ssssss', $name, $email, $hashedPassword, $id, $dept, $phn);
        $resultInsert = mysqli_stmt_execute($insertStmt);

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