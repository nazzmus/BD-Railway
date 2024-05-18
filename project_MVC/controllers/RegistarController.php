<?php
session_start();
require_once '../config/db.php';
require_once '../models/UserModel.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $usertype = $_POST['usertype'];

    $userModel = new UserModel($conn);
    if ($userModel->register($username, $password, $phone, $email, $usertype)) {
        $_SESSION['registerMessage'] = "Registration successful";
    } else {
        $_SESSION['registerMessage'] = "Registration failed";
    }
    header("Location: ../views/register_view.php");
    exit;
}
?>