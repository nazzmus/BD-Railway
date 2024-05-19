<?php
$serverName = "localhost";
$userName = "root";
$password = "";
$dbName = "webtech_project";

$data = mysqli_connect($serverName, $userName, $password, $dbName);

if ($data === false) {
    die("Connection error: " . mysqli_connect_error());
}
?>
