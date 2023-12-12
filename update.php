<?php
if (isset($_POST['submit'])) {
    include('connection.php');
    
    $sc = $_POST['sc'];
    $cname = $_POST['cname'];
    
    $id = $_POST['sid'];
    $imagename = $_FILES['simg']['name'];
    $temp = $_FILES['simg']['tmp_name'];
    move_uploaded_file($temp, $imagename);
    
    $sql = "UPDATE cms SET sc = '$sc', cname = '$cname', image = '$imagename' WHERE id = '$id'";
    $run = mysqli_query($conn, $sql);
    
    if ($run == true) {
        ?>
        <script>alert("DATA HAS BEEN UPDATED"); window.open('index1.php', '_self');</script>
        <?php
    } else {
        ?>
        <script>alert("ERROR");</script>
        <?php
    }
}
?>
