<?php
include('connection.php');
$sid = $_REQUEST['sid'];
$stmt = mysqli_prepare($conn, "DELETE FROM `cms` WHERE `id` = ?");
mysqli_stmt_bind_param($stmt, 'i', $sid);
$run = mysqli_stmt_execute($stmt);
if ($run == true) {
    ?>
    <script>
        alert('Data deleted successfully');
        window.open('index1.php', '_self');
    </script>
    <?php
} else {
    echo "Error";
}
?>
