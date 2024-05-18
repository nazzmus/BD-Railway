<?php
session_start();
require_once '../config/db.php';
require_once '../models/UserModel.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $userModel = new UserModel($conn);
    $user = $userModel->login($username, $password);

    if ($user) {
        $_SESSION['username'] = $user['username'];
        $_SESSION['usertype'] = $user['usertype'];
        switch ($user['usertype']) {
            case 'user':
                header("Location: ../views/userhome.php");
                break;
            case 'admin':
                header("Location: ../views/dashboard.php");
                break;
            case 'manager':
                header("Location: ../views/managerhome.php");
                break;
            case 'employee':
                header("Location: ../views/employeehome.php");
                break;
            default:
                echo "Invalid user type";
                break;
        }
    } else {
        $_SESSION['loginMessage'] = "Username or password is incorrect";
        header("Location: ../views/login_view.php");
        exit;
    }
}
?>
