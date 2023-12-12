<?php
include('connection.php');
$sid = $_REQUEST['sid'];
$qry = "DELETE FROM `cms` WHERE `id` = '$sid'";
$run = mysqli_query($conn, $qry);
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
