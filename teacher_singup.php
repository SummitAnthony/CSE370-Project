<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Sign Up</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Your styling here */
    </style>
</head>
<body>

<?php
include('dbconnection.php'); // Include your database connection file
?>

<h2>Teacher Sign Up</h2>

<form action="teacher_signup.php" method="post">  
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name" required>
    </div>

    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required>
    </div>

    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required>
    </div>

    <div class="form-group">
        <label for="teacher_id">Teacher ID</label>
        <input type="text" class="form-control" id="teacher_id" name="teacher_id" placeholder="Enter your teacher ID" required>
    </div>

    <div class="form-group">
        <label for="dept">Department</label>
        <input type="text" class="form-control" id="dept" name="dept" placeholder="Enter your department" required>
    </div>

    <div class="form-group">
        <label for="phone">Phone</label>
        <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter your phone number" required>
    </div>
    
    <button type="submit" name="submit" class="btn btn-primary">Sign Up</button>

</form>

<?php
if(isset($_POST['submit'])){
    
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $teacher_id = $_POST['teacher_id'];
    $dept = $_POST['dept'];
    $phone = $_POST['phone'];
    
    $sql = "INSERT INTO teachers (name, email, password, teacher_id, dept, phone) VALUES ('$name', '$email', '$password', '$teacher_id', '$dept', '$phone')";
    
    $run = mysqli_query($conn, $sql);
    
    if ($run) {
        echo '<div class="alert alert-success" role="alert">Registration successful</div>';
    } else {
        echo '<div class="alert alert-danger" role="alert">Error: ' . mysqli_error($conn) . '</div>';
    }
}
?>

<!-- Include Bootstrap JS and jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
