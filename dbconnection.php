<?php
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "370project";
$port = 3306;

$conn = mysqli_connect($host, $user, $pass, $dbname, $port);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

echo "Connected to the database successfully!";
?>
