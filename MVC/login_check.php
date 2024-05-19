<?php
session_start();

$serverName = "localhost";
$userName = "root";
$password = "";
$dbName = "webtech_project";
$data = mysqli_connect($serverName, $userName, $password, $dbName);

if ($data === false) {
    die("connection error");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['username'];
    $pass = $_POST['password'];

    $sql = "SELECT * FROM user WHERE username='" . $name . "' AND password='" . $pass . "' ";
    $result = mysqli_query($data, $sql);
    $row = mysqli_fetch_array($result);

    if ($row) {
        
        switch ($row["usertype"]) {
            case "user":
                $_SESSION['username']=$name;
                $_SESSION['usertype']="user";
                header("location:userhome.php");
                break;
            case "admin":
                $_SESSION['username']=$name;
                $_SESSION['usertype']="admin";
                header("location:adminhome.php");
                break;
            case "manager":
                $_SESSION['username']=$name;
                $_SESSION['usertype']="manager";
                header("location:managerhome.php");
                break;
            case "employee":
                $_SESSION['username']=$name;
                $_SESSION['usertype']="employee";
                header("location:employeehome.php");
                break;
            default:
                echo "Invalid user type";
                break;
        }
    } else {
        session_start();
        $_SESSION['loginMessage'] = "Username or password is incorrect";
        header("location:login.php");
        exit; 
    }
}
?>