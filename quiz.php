<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Quiz</title>
    <!-- Include Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
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
            height: 100vh;
        }

        h2 {
            color: #343a40;
        }

        form {
            max-width: 400px;
            width: 100%;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
            margin-top: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #495057;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            box-sizing: border-box;
            border: 1px solid #ced4da;
            border-radius: 4px;
            font-size: 16px;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

<h2>Upload Quiz</h2>

<form action="upload_quiz.php" method="post" enctype="multipart/form-data">  
    <div class="form-group">
        <label for="courseSelection">Select Course</label>
        <!-- Use a dropdown to select the course from existing courses -->
        <select class="form-control" id="courseSelection" name="courseSelection" required>
            <?php
            // Include your database connection file
            include('dbconnection.php');

            // Fetch courses from the database and populate the dropdown
            $query = "SELECT * FROM cms";
            $result = mysqli_query($conn, $query);

            if ($result) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<option value='" . htmlspecialchars($row['sc'], ENT_QUOTES) . "'>{$row['sc']}</option>";
                }
            } else {
                echo '<option value="">Error fetching courses</option>';
            }

            // Close the database connection
            mysqli_close($conn);
            ?>
        </select>
    </div>

    <div class="form-group">
        <label for="quizFile">Upload Quiz (PDF)</label>
        <input type="file" class="form-control-file" id="quizFile" name="quizFile" required>
    </div>
    
    <button type="submit" name="submitquiz" class="btn btn-primary">Submit Quiz</button>
</form>

<!-- Include Bootstrap 5 JS and Popper.js (if needed) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
