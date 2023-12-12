<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Assignment</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
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

<h2>Upload Assignment</h2>

<form action="upload_assignment.php" method="post" enctype="multipart/form-data">  
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
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<option value='{$row['sc']}'>{$row['sc']}</option>";
            }
            ?>
        </select>
    </div>

    <div class="form-group">
        <label for="assignmentFile">Upload Assignment (PDF)</label>
        <input type="file" class="form-control-file" id="assignmentFile" name="assignmentFile" required>
    </div>
    
    <button type="submit" name="submitAssignment" class="btn btn-primary">Submit Assignment</button>
</form>



