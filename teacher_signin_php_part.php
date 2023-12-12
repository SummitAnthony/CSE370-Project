<?php
session_start();
include('dbconnection.php'); // Include your database connection file

if(isset($_POST['login'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM teachers WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        $row = mysqli_fetch_assoc($result);
        if ($row && password_verify($password, $row['password'])) {
            $_SESSION['teacher_id'] = $row['teacher_id'];
            $_SESSION['teacher_name'] = $row['name'];
            header('Location: teacher_dashboard.php'); // Redirect to teacher dashboard or any other page
            exit();
        } else {
            echo '<div class="alert alert-danger" role="alert">Invalid email or password</div>';
        }
    } else {
        echo '<div class="alert alert-danger" role="alert">Error: ' . mysqli_error($conn) . '</div>';
    }
}
?>
