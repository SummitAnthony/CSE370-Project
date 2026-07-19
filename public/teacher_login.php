<?php
require_once __DIR__ . '/../includes/db.php';

if (isset($_POST['email']) && isset($_POST["password"])){
    $e=$_POST['email'];
    $p=$_POST['password'];
    $stmt = mysqli_prepare($conn, "SELECT * FROM teacher WHERE email = ?");
    mysqli_stmt_bind_param($stmt, 's', $e);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $userData = mysqli_fetch_assoc($result);

    if ($userData && password_verify($p, $userData['password'])){
		session_start();
		session_regenerate_id(true);
		$_SESSION['teacher_id'] = $userData['id'];
        $_SESSION['teacher_name'] = $userData['name'];
        $_SESSION['teacher_email'] = $userData['email'];
        header('location:teacher_dashboard.php');
		exit();
    }
    else{
        echo "Email or password is wrong";
    }
}
?>
