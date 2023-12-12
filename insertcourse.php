<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Course Details</title>
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

<?php
include('index1.php');
?>

<h2>Insert Course Details</h2>

<form action="insertcourse.php" method="post" enctype="multipart/form-data">  
    <div class="form-group">
        <label for="subjectCode">Enter Subject Code</label>
        <input type="text" class="form-control" id="subjectCode" name="subjectCode" placeholder="Enter subject code" required>
    </div>

    <div class="form-group">
        <label for="courseName">Enter Course Name</label>
        <input type="text" class="form-control" id="courseName" name="courseName" placeholder="Enter course name" required>
    </div>

    <div class="form-group">
        <label for="sing">Upload Course Image</label>
        <input type="file" class="form-control-file" id="sing" name="sing" required>
    </div>
    
    <button type="submit" name="submit" class="btn btn-primary">Submit</button>

</form>

<!-- PHP section for processing form submission -->
<?php
if(isset($_POST['submit'])){
    
    include('connection.php');
    
    $sc = $_POST['subjectCode'];
    $name = $_POST['courseName'];
    $imagename = $_FILES['sing']['name'];
    $temp = $_FILES['sing']['tmp_name'];
    
    move_uploaded_file($temp, $imagename);
	
	
	//MY SQL PART 
    
    $sql = "INSERT INTO `cms` (`id`, `sc`, `cname`, `image`) VALUES ('', '$sc', '$name', '$imagename')";
    
	//RUNNING MY SQL QUERY FOR INSERTING THE DATA INTO THE CMS TABLE IN OUR COURSE DATABASE
	
    $run = mysqli_query($conn, $sql);
    
	
	//
	
    if ($run == true){
        echo '<div class="alert alert-success" role="alert">Data Inserted Successfully</div>';
    } else {
        echo '<div class="alert alert-danger" role="alert">Error</div>';
    }
}
?>

<!-- Include Bootstrap JS and jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
