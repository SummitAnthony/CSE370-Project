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

<h2>Update Course Details</h2>
<h3>Find Course Records to Update</h3>

    <form action="updatecourse.php" method="post">
        <label>
            Enter Subject Code
        </label>
        <input type="text" name="sc" required>

        <label>
            Enter Course name
        </label>

        <input type="text" name="name" required>

        <input type="submit" name="submit" value="search">
    </form>

    <?php
    if (isset($_POST['submit'])) {
        include('connection.php');

        $sc = $_POST['sc'];
        $name = $_POST['name'];
        $sql = "select * from `cms` where `sc`='$sc' OR `cname` LIKE '%$name%'";
        $run = mysqli_query($conn, $sql);

        if (mysqli_num_rows($run) < 1) {
            echo "No Record Found";
        } else {
            $count = 0;

            while ($data = mysqli_fetch_assoc($run)) {
                $count++;
                ?>
                <br>
                <table width=100% border=1 cellspacing=3 cellpadding=4>
                    <tr>
                        <td width="35%" align="center">
                            <img src="<?php echo $data['image']; ?>" width="100" height="100">
                        </td>
                        <td width="20%" align="center"><?php echo $data['sc']; ?></td>
                        <td width="20%" align="center"><?php echo $data['cname']; ?></td>
                        <td width="20%" align="center">
                            <a href="edit.php?sid=<?php echo $data['id']; ?>">
                                EDIT
                            </a>
                        </td>
                    </tr>
                </table>
                </br>
                <?php
            }
        }
    }
    ?>
</body>
</html>
