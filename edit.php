<?php
include('index1.php');
include('connection.php');

$sid = $_GET['sid'];
$stmt = mysqli_prepare($conn, "SELECT * FROM `cms` WHERE `id` = ?");
mysqli_stmt_bind_param($stmt, 'i', $sid);
mysqli_stmt_execute($stmt);
$run = mysqli_stmt_get_result($stmt);
$data = mysqli_fetch_assoc($run);
?>

<h2>Update Course Details</h2>

<form action="update.php" method="post" enctype="multipart/form-data">
  <label for="sc">Enter Subject Code:</label>
  <input type="text" id="sc" name="sc" value="<?php echo $data['sc']; ?>" required>
  <br><br>

  <label for="cname">Enter Course Name:</label>
  <input type="text" id="cname" name="cname" value="<?php echo $data['cname']; ?>" required>
  <br><br>

  <label for="simg">Upload Image:</label>
  <input type="file" id="simg" name="simg" required>
  <br><br>

  <input type="hidden" name="sid" value="<?php echo $data['id']; ?>">
  <input type="submit" name="submit" value="Update">
</form>