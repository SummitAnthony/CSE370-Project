<?php
// Database connection — configure via environment variables (see .env.example),
// falls back to a default local XAMPP/WAMP setup.
$servername = getenv('DB_HOST') ?: 'localhost';
$username   = getenv('DB_USER') ?: 'root';
$password   = getenv('DB_PASSWORD') ?: '';
$dbname     = getenv('DB_NAME') ?: '370project';
$port       = (int)(getenv('DB_PORT') ?: 3306);

$conn = new mysqli($servername, $username, $password, $dbname, $port);

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

