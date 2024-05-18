<?php
$serverName = "localhost";
$userName = "root";
$password = "";
$dbName = "webtech_project";

$conn = new mysqli($serverName, $userName, $password, $dbName);

if ($conn->connect_error) {
    die("Connection error: " . $conn->connect_error);
}
?>
