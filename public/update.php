<?php
if (isset($_POST['submit'])) {
    require_once __DIR__ . '/../includes/db.php';
    
    $sc = $_POST['sc'];
    $cname = $_POST['cname'];
    
    $id = $_POST['sid'];
    $imagename = $_FILES['simg']['name'];
    $temp = $_FILES['simg']['tmp_name'];
    move_uploaded_file($temp, $imagename);
    
    $stmt = mysqli_prepare($conn, "UPDATE cms SET sc = ?, cname = ?, image = ? WHERE id = ?");
    mysqli_stmt_bind_param($stmt, 'sssi', $sc, $cname, $imagename, $id);
    $run = mysqli_stmt_execute($stmt);
    
    if ($run == true) {
        ?>
        <script>alert("DATA HAS BEEN UPDATED"); window.open('teacher_dashboard.php', '_self');</script>
        <?php
    } else {
        ?>
        <script>alert("ERROR");</script>
        <?php
    }
}
?>
