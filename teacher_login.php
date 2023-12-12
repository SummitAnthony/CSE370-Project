<?php
require_once('connection.php');

if (isset($_POST['email']) && isset($_POST["password"])){
    $e=$_POST['email'];
    $p=$_POST['password'];
    $sql= "SELECT * FROM teacher WHERE email='$e'AND password ='$p' ";

    $result= mysqli_query($conn,$sql);

    if (mysqli_num_rows($result) !=0){
		$userData = mysqli_fetch_assoc($result);
		session_start();
		$_SESSION['teacher_id'] = $userData['id'];
        $_SESSION['teacher_name'] = $userData['name'];
        $_SESSION['teacher_email'] = $userData['email'];
        header('location:index1.php');
		exit();
    }
    else{
        echo "Email or password is wrong";
    }
}
?>
