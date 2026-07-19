<?php
require_once('connection.php');

if (isset($_POST['email']) && isset($_POST["password"])){
    $e=$_POST['email'];
    $p=$_POST['password'];
    $stmt = mysqli_prepare($conn, "SELECT * FROM student WHERE email = ? AND password = ?");
    mysqli_stmt_bind_param($stmt, 'ss', $e, $p);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) !=0){
		$userData = mysqli_fetch_assoc($result);
		session_start();
		$_SESSION['user_id'] = $userData['id'];
        $_SESSION['user_name'] = $userData['name'];
        $_SESSION['user_email'] = $userData['email'];
        header('location:home.php');
		exit();
    }
    else{
        echo "Email or password is wrong";
    }
}
?>