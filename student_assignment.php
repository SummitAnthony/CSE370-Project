<?php
session_start();
require_once('connection.php');

if (!isset($_SESSION['user_id'])) {
    header('location: index.php');
    exit();
}

$userEmail = $_SESSION['user_email'];

// Fetch the list of courses taken by the student
$sqlCourses = "SELECT DISTINCT selected_course_1, selected_course_2, selected_course_3 FROM students_courses WHERE email = ?";
$stmtCourses = mysqli_prepare($conn, $sqlCourses);

if ($stmtCourses) {
    mysqli_stmt_bind_param($stmtCourses, "s", $userEmail);
    mysqli_stmt_execute($stmtCourses);
    $resultCourses = mysqli_stmt_get_result($stmtCourses);

    $courses = [];

    while ($rowCourse = mysqli_fetch_assoc($resultCourses)) {
        $courses[] = $rowCourse['selected_course_1'];
        $courses[] = $rowCourse['selected_course_2'];
        $courses[] = $rowCourse['selected_course_3'];
    }

    $courses = array_unique(array_filter($courses));

    mysqli_stmt_close($stmtCourses);
}

// Fetch assignments based on the selected course
if (isset($_GET['selected_course'])) {
    $selectedCourse = $_GET['selected_course'];

    $sqlAssignments = "SELECT * FROM assignment WHERE sc = ?";
    $stmtAssignments = mysqli_prepare($conn, $sqlAssignments);

    if ($stmtAssignments) {
        mysqli_stmt_bind_param($stmtAssignments, "s", $selectedCourse);
        mysqli_stmt_execute($stmtAssignments);
        $resultAssignments = mysqli_stmt_get_result($stmtAssignments);

        $assignments = [];

        while ($rowAssignment = mysqli_fetch_assoc($resultAssignments)) {
            $assignments[] = $rowAssignment;
        }

        mysqli_stmt_close($stmtAssignments);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Assignment Page</title>
    <style>
        body {
            background-color: #f8f9fa;
        }

        .container {
            margin-top: 50px;
        }

        h1 {
            color: #007bff;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1 class="mb-4">Assignments</h1>

        <form method="get">
            <div class="mb-3">
                <label for="selectedCourse" class="form-label">Select Course:</label>
                <select class="form-select" id="selectedCourse" name="selected_course" onchange="this.form.submit()">
                    <option value="" disabled selected>Select a course</option>
                    <?php foreach ($courses as $course) : ?>
                        <option value="<?php echo $course; ?>" <?php echo ($course == $_GET['selected_course']) ? 'selected' : ''; ?>>
                            <?php echo $course; ?>
                        </option>
                    <?php endforeach; ?> 
                </select>
            </div>
        </form>

        <?php if (isset($assignments)) : ?>
            <?php if (!empty($assignments)) : ?>
                <table class="table table-bordered table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Course</th>
                            <th scope="col">Assignment</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($assignments as $assignment) : ?>
                            <tr>
                                <td><?php echo $assignment['sc']; ?></td>
                                <td>
                                    <?php
                                    $filePath = $assignment['pdf_file_path'];
                                    echo "<a href='$filePath' download class='btn btn-primary btn-sm'>Download Assignment</a>";
                                    ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php else : ?>
                <p class="text-muted">No assignments found for the selected course.</p>
            <?php endif; ?>
        <?php endif; ?>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.4.slim.min.js" integrity="sha256-oN9bpfScevCp8byqti3U3YWFw36Fcz5iUealwTc8XpI=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-GLhlTQ8iK9s9E7VHA6P1Y/B6zIvKxSSxF46GqMFnpKlA880cMOGO+AcpvA+ePw8t" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-eUq2wNN5EQ5I5Xs1Z5LLoPbPkQIXJp9sLdYxRnPTb3hbbzT9qFBELiCCd3YO0Fa" crossorigin="anonymous"></script>
</body>

</html>
