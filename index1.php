<?php
session_start();

if (!isset($_SESSION['teacher_id'])) {
    header('location: teacher_signin.php');
    exit();
}

$userID = $_SESSION['teacher_id'];
$userName = $_SESSION['teacher_name'];
$userEmail = $_SESSION['teacher_email'];

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
    <title>Course Management System</title>
    
    <!-- Include Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <!-- Internal styles for better presentation -->
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
        }

        header {
            text-align: center;
            margin-bottom: 20px;
            background-color: #f8f9fa; /* Match the background color of the header with body */
            padding: 10px;
        }

        h1, h2 {
            color: #343a40;
        }

        nav {
            text-align: center;
            margin-bottom: 20px;
        }

        a {
            display: inline-block;
            margin: 10px;
            padding: 15px 25px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            font-size: 18px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        a:hover {
            background-color: #0056b3;
        }

        /* Add a bit of space between the navigation links and the logout button */
        nav, #logout-form {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <header class="bg-light">
        <h1 class="text-dark">Course Management System</h1>
        <h2 class="text-secondary">Welcome to Admin Panel, <?php echo $userName; ?>!</h2>
    </header>

    <nav>
        <a href="insertcourse.php" class="btn btn-primary">Insert Course Details</a>
        <a href="viewcourse.php" class="btn btn-primary">View Course</a>
        <a href="updatecourse.php" class="btn btn-primary">Update Course</a>
        <a href="deletecourse.php" class="btn btn-primary">Delete Course</a>
        <a href="gradestudents.php" class="btn btn-primary">Grade Students</a>
		<a href="moretools.php" class="btn btn-primary">More Tools</a>
    </nav>

    <form id="logout-form" method="post">
        <button class="btn btn-danger" type="submit" name='logout'>Logout</button>
    </form>

    <!-- Include Bootstrap JS and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
