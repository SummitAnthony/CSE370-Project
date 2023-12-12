<?php
include('index1.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Course Details</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
        }

        h2, h3 {
            color: #333;
        }

        form {
            max-width: 400px;
            width: 100%;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
            margin-top: 20px;
            display: flex;
            flex-direction: column;
        }

        label {
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

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: left;
        }

        th {
            background-color: #007bff;
            color: #fff;
        }

        td img {
            max-width: 80px;
            max-height: 80px;
            border-radius: 5px;
        }

        a {
            display: inline-block;
            padding: 5px 10px;
            border: 1px solid #007bff;
            border-radius: 5px;
            background-color: #fff;
            color: #007bff;
            text-decoration: none;
        }

        a:hover {
            background-color: #007bff;
            color: #fff;
        }
    </style>
</head>
<body>

<h2>Delete Course Details</h2>
<h3>Find Course Records to Delete</h3>

<form action="deletecourse.php" method="post">
    <label>Enter Subject Code</label>
    <input type="text" name="sc" required>
    <label>Enter Course Name</label>
    <input type="text" name="name" required>
    <input type="submit" name="submit" value="Search">
</form>

<?php
if (isset($_POST['submit'])) {
    include('connection.php');
    echo "Submit button clicked.<br>"; 
    $sc = $_POST['sc'];
    $name = $_POST['name'];
    $sql = "SELECT * FROM `cms` WHERE `sc` = '$sc' OR `cname` LIKE '%$name%'";
    $run = mysqli_query($conn, $sql);
    if (mysqli_num_rows($run) < 1) {
        echo "No Record Found<br>"; 
    } else { 
        echo '<table>';
        echo '<tr><th>Course Image</th><th>Subject Code</th><th>Course Name</th><th>Action</th></tr>';
        while ($data = mysqli_fetch_assoc($run)) {
            ?>
            <tr>
                <td><img src="<?php echo $data['image']; ?>" alt="Course Image"></td>
                <td><?php echo $data['sc']; ?></td>
                <td><?php echo $data['cname']; ?></td>
                <td>
                    <a href="delete.php?sid=<?php echo $data['id']; ?>">
                        Delete
                    </a>
                </td>
            </tr>
            <?php
        }
        echo '</table>';
    }
}
?>

</body>
</html>
