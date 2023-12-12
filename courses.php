<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course Selection System</title>
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>

    <div class="container mt-5">
        <h2 class="mb-4">Select Your Courses</h2>

        <form action="process_form.php" method="post">
            

            <div class="form-group">
                <label for="selectedCourse1">Select Course 1:</label>
                <select class="form-control" name="selectedCourse1" required>
                    <?php
                    include 'connection.php';
                    $courses = getAvailableCourses();
                    foreach ($courses as $course) {
                        echo "<option value='{$course['sc']}'>{$course['sc']}</option>";
                    }
                    ?>
                </select>
                <button type="submit" class="btn btn-primary" name="addCourse1">Add Course 1</button>
            </div>

            <div class="form-group">
                <label for="selectedCourse2">Select Course 2:</label>
                <select class="form-control" name="selectedCourse2" required>
                    <?php
                    foreach ($courses as $course) {
                        echo "<option value='{$course['sc']}'>{$course['sc']}</option>";
                    }
                    ?>
                </select>
                <button type="submit" class="btn btn-primary" name="addCourse2">Add Course 2</button>
            </div>

            <div class="form-group">
                <label for="selectedCourse3">Select Course 3:</label>
                <select class="form-control" name="selectedCourse3" required>
                    <?php
                    foreach ($courses as $course) {
                        echo "<option value='{$course['sc']}'>{$course['sc']}</option>";
                    }
                    ?>
                </select>
                <button type="submit" class="btn btn-primary" name="addCourse3">Add Course 3</button>
            </div>

            <!-- Main Submit Button for Submitting All Courses -->
            <button type="submit" class="btn btn-primary" name="submit">Submit All Courses</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

</body>
</html>







