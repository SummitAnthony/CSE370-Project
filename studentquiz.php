<?php
session_start();
require_once('connection.php');

if (!isset($_SESSION['user_id'])) {
    header('location: index.php');
    exit();
}

$userEmail = $_SESSION['user_email'];

$sql = "SELECT * FROM students_courses 
        INNER JOIN quiz ON students_courses.selected_course_1 = quiz.sc OR
                           students_courses.selected_course_2 = quiz.sc OR
                           students_courses.selected_course_3 = quiz.sc
        WHERE students_courses.email = '$userEmail'";
$result = mysqli_query($conn, $sql) or die(mysqli_error($conn));

if ($userEmail && mysqli_num_rows($result) > 0) {
    ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #333;
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }

        a.btn {
            display: inline-block;
            padding: 8px 16px;
            text-decoration: none;
            background-color: #3498db;
            color: #fff;
            border-radius: 4px;
            transition: background-color 0.3s;
        }

        a.btn:hover {
            background-color: #2980b9;
        }

        .no-quiz {
            color: #777;
            font-style: italic;
        }
    </style>
</head>


    <body>
        <div class="container">
            <h1 class="mb-4">Quiz Files</h1>
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th scope="col">Student Email</th>
                        <th scope="col">Course</th>
                        <th scope="col">Quiz Files</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                        <tr>
                            <td><?php echo $userEmail ?></td>
                            <td><?php echo $row['sc'] ?></td>
                            <td>
                                <?php
                                // Fetch quiz files for the selected course
                                $filePath = $row['pdf_file_path'];
                                
                                // Display download link only if the course has a quiz file
                                if ($filePath) {
                                    echo "<a href='$filePath' download class='btn btn-primary'>Download Quiz File</a><br>";
                                } else {
                                    echo "No quiz available for this course.";
                                }
                                ?>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </body>

    </html>

<?php
} else {
    echo "Student profile not found or no quiz data available.";
}
?>
