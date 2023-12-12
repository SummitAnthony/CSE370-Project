<?php
session_start();
require_once('connection.php');

if (!isset($_SESSION['user_id'])) {
    
    header('location: index.php');
    exit();
}


$userID = $_SESSION['user_id'];
$userName = $_SESSION['user_name'];
$userEmail = $_SESSION['user_email'];



$sql = "SELECT * FROM students_courses WHERE email = '$userEmail'";
$result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
$row = mysqli_fetch_assoc($result);

if ($userEmail && $row) {
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>Gradesheet</title>
</head>

<body>
    <div class="container mt-5">
        <h1 class="mb-4">Gradesheet</h1>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Student Name</th>
                    <th scope="col">Course 1</th>
					<th scope="col">Course 2</th>
					<th scope="col">Course 3</th>
                    <th scope="col">Grade of Course 1</th>
                    <th scope="col">Grade of Course 2</th>
					<th scope="col">Grade of Course 3</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?php echo $row['student_name'] ?></td>
					<td><?php echo $row['selected_course_1'] ?></td>
					<td><?php echo $row['selected_course_2'] ?></td>
					<td><?php echo $row['selected_course_3'] ?></td>
                    <td><?php echo $row['grade_course_id_1'] ?></td>
                    <td><?php echo $row['grade_course_id_2'] ?></td>
                    <td><?php echo $row['grade_course_id_3'] ?></td>
                </tr>
            </tbody>
        </table>
    </div>

    
    
</body>

</html>
<?php
} else {
    
    echo "Student profile not found.";
}
?>