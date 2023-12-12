<?php
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = '370project';

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}

function getAvailableCourses() {
    global $conn;
    $sql = "SELECT * FROM cms";
    $result = $conn->query($sql);

    if (!$result) {
        die("Query failed: " . $conn->error);
    }

    $courses = [];
    while ($row = $result->fetch_assoc()) {
        $courses[] = $row;
    }

    return $courses;
}
?>

