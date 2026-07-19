<?php
require_once __DIR__ . '/../includes/db.php';
$sid = $_REQUEST['sid'];
$stmt = mysqli_prepare($conn, "DELETE FROM `cms` WHERE `id` = ?");
mysqli_stmt_bind_param($stmt, 'i', $sid);
$run = mysqli_stmt_execute($stmt);
if ($run == true) {
    ?>
    <script>
        alert('Data deleted successfully');
        window.open('teacher_dashboard.php', '_self');
    </script>
    <?php
} else {
    echo "Error";
}
?>
