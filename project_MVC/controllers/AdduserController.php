<?php
session_start();

if (!isset($_SESSION['username']) || $_SESSION['usertype'] !== 'admin') {
    header("location:login.php");
    exit;
}

include_once '../../config/db.php';
include_once '../../models/UserModel.php';

$database = new Database();
$db = $database->getConnection();

$userModel = new UserModel($db);

if (isset($_POST['add_user'])) {
    $username = $_POST['name'];
    $user_email = $_POST['email'];
    $user_phone = $_POST['phone'];
    $user_password = $_POST['password'];
    $usertype = $_POST['usertype']; // Retrieve selected user type from the form

    // Check if the username already exists
    if ($userModel->checkUsernameExistence($username)) {
        echo "Username already exists!";
    } else {
        // Add the user
        if ($userModel->addUser($username, $user_email, $user_phone, $usertype, $user_password)) {
            echo "Data Uploaded Successfully";
        } else {
            echo "Upload Fail";
        }
    }
}

// Include the view file
include_once '../../views/admin/add_user_view.php';
?>
