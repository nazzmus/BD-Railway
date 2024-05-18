<?php
$servername = "localhost";
$username = "root";
$password = ""; 
$dbname = "webtech_project";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$id = $_POST['id'];
$new_username = $_POST['username'];
$new_phone = $_POST['phone'];
$new_email = $_POST['email'];
$new_password = $_POST['password'];


$sql = "UPDATE user SET username='$new_username', phone='$new_phone', email='$new_email', password='$new_password' WHERE id = $id";


if ($conn->query($sql) === TRUE) {
    echo "Profile updated successfully";
} else {
    echo "Error updating profile: " . $conn->error;
}


$conn->close();
?>