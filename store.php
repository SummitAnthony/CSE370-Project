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
    
    $checkStmt = mysqli_prepare($conn, "SELECT * FROM `student` WHERE `email` = ?");
    mysqli_stmt_bind_param($checkStmt, 's', $email);
    mysqli_stmt_execute($checkStmt);
    $resultCheckEmail = mysqli_stmt_get_result($checkStmt);

    if (mysqli_num_rows($resultCheckEmail) > 0) {

        header("Location: index.php?error=email_exists");
        exit();
    } else {

        $hashedPassword = password_hash($pass1, PASSWORD_DEFAULT);
        $insertStmt = mysqli_prepare($conn, "INSERT INTO `student` (`name`, `email`, `password`, `st_id`, `dept`, `phone`) VALUES (?, ?, ?, ?, ?, ?)");
        mysqli_stmt_bind_param($insertStmt, 'ssssss', $name, $email, $hashedPassword, $id, $dept, $phn);
        $resultInsert = mysqli_stmt_execute($insertStmt);

		$emailStmt = mysqli_prepare($conn, "INSERT INTO `students_courses` (`email`) VALUES (?)");
        mysqli_stmt_bind_param($emailStmt, 's', $email);
        $resultEmail = mysqli_stmt_execute($emailStmt);
		
        header("Location: index.php?success=registration_successful");
        exit();
    }
} else {
    header("Location: index.php?error=password_mismatch");
    exit();
}


mysqli_close($conn);


?>