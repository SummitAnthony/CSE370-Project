<?php
session_start();


if (!isset($_SESSION['user_id'])) {
    
    header('location: index.php');
    exit();
}


$userID = $_SESSION['user_id'];
$userName = $_SESSION['user_name'];
$userEmail = $_SESSION['user_email'];
if (isset($_POST['logout'])) {
    
    session_destroy();
    header('location: index.php');
    exit();
}
?>









<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>Course Management System</title>

    <style>
        body {
            background-image: url(r7.jpg);
            background-repeat: no-repeat;
            background-position: center;
            background-attachment: fixed;
            background-size: cover;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .navbar {
            background-color: #9370DB; 
            color: white;
            padding: 15px;
            text-align: center;
        }

        .navbar-brand {
            font-size: 1.5rem;
            font-weight: bold;
            color: black;
            display: inline-block; /* Aligns the text in the middle */
            vertical-align: middle;
        }

        .page-box {
            margin-top: 20px;
			margin-bottom: 20px;
            text-align: center;
        }

        .page-button {
            width: 100%;
            padding: 20px;
            font-size: 1.2rem;
            border-radius: 10px;
            background-color: #D8BFD8; 
            color: white;
            transition: background-color 0.3s ease;
        }

        .page-button:hover {
            background-color: #C0C0C0; 
        }
    </style>
</head>
<body class="body-class">

    
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">
  <img src="r11.webp" width="80" height="65" alt="">Course Management System</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
		<form method = "post" action = "">
        <button type = "submit" class="btn nav-link" name = "logout">Logout</button>
		</form>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#"></a>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
      </li>
    </ul>
  </div>
</nav>
    
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="page-box">
					<h2>Welcome, <?php echo $userName; ?>!</h2>
                    <a href="studentprofile.php">
                        <button class="btn btn-primary btn-lg">Student Profile</button>
                    </a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="page-box">
                    <a href="gradesheet.php">
                        <button class="btn btn-success btn-lg">Grade Sheet</button>
                    </a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="page-box">
				<a href="courses.php">
                    <button class="btn btn-info btn-lg">Select Courses</button>
                </a>
				</div>
            </div>
        </div>
		<div class="row">
            <div class="col-sm-12">
                <div class="page-box">
				<a href="student_assignment.php">
                    <button class="btn btn-info btn-lg">Assignments</button>
                </a>
				</div>
            </div>
        </div>
		<div class="row">
            <div class="col-sm-12">
                <div class="page-box">
				<a href="studentquiz.php">
                    <button class="btn btn-info btn-lg">Quizes</button>
                </a>
				</div>
            </div>
        </div>


    </div>

</body>
</html>



