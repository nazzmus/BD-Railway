<?php

$serverName = "localhost";
$userName = "root";
$password = "";
$dbName = "webtech_project"; 
$data = mysqli_connect($serverName, $userName, $password, $dbName);


if ($data === false) {
    die("Connection error: " . mysqli_connect_error());
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $username = $_POST['username'];
    $password = $_POST['password'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $usertype = $_POST['usertype']; 

    
    $sql = "INSERT INTO user (username, password, phone, email, usertype) VALUES ('$username', '$password', '$phone', '$email', '$usertype')";
    if (mysqli_query($data, $sql)) {
        
        session_start();
        $_SESSION['registerMessage'] = "Registration successful"; 
        header("location:registar.php"); 
        exit; 
    } else {
        
        die("Error: " . $sql . "<br>" . mysqli_error($data));
    }
}
?>