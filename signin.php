<?php
require_once('connection.php');

if (isset($_POST['email']) && isset($_POST["password"])){
    $e=$_POST['email'];
    $p=$_POST['password'];
    $sql= "SELECT * FROM student WHERE email='$e'AND password ='$p' ";

    $result= mysqli_query($conn,$sql);

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