<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("location:login.php");
    exit;
}

if ($_SESSION['usertype'] !== 'admin') {
    header("location:login.php");
    exit;
}

$serverName = "localhost";
$userName = "root";
$password = "";
$dbName = "webtech_project";
$data = mysqli_connect($serverName, $userName, $password, $dbName);

if (isset($_POST['add_manager'])) {
    $username = $_POST['name'];
    $user_email = $_POST['email'];
    $user_phone = $_POST['phone'];
    $user_password = $_POST['password'];
    $usertype = "manager";

    
    $check_sql = "SELECT * FROM user WHERE username = '$username'";
    $check_result = mysqli_query($data, $check_sql);
    if (mysqli_num_rows($check_result) > 0) {
        echo "Username already exists!";
    } else {
        
        $sql = "INSERT INTO user (username, email, phone, usertype, password) VALUES ('$username', '$user_email', '$user_phone', '$usertype', '$user_password')";
        $result = mysqli_query($data, $sql);

        if ($result) {
            echo "Data Uploaded Successfully";
        } else {
            echo "Upload Fail";
        }
    }
}
?>

<html>
<head>
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="admin.css">
    <style type="text/css">
        label {
            display: inline-block;
            text-align: right;
            width: 100px;
            padding-top: 10px;
            padding-bottom: 10px;
        }
    </style>
</head>
<body>
<header class="header">
    <a href="adminhome.php">Admin Dashboard</a>
    <div class="logout">
        <a href="logout.php">logout</a>
    </div>
</header>
<aside>
    <ul>
        <li>
            <a href="add_user.php">Add User</a>
        </li>
        <li>
            <a href="view_user.php">View User</a>
        </li>
        <li>
            <a href="add_manager.php"><h1>Add Manager</h1></a>
        </li>
        <li>
            <a href="view_manager.php">View Manager</a>
        </li>
        <li>
            <a href="add_employee.php">add Employee</a>
        </li>
        <li>
            <a href="view_employee">View Employee</a>
        </li>
        <li>
            <a href="delete_user.php">Manage All User</a>
        </li>
    </ul>
</aside>
<div class="content">
    <center>
        <h1>Add Manager</h1>
        <br>
        <br>
        <div class="div_deg11">
            <form action="#" method="POST">
                <div>
                    <label for="name">Username</label>
                    <input type="text" name="name">
                </div>
                <div>
                    <label for="email">E-mail</label>
                    <input type="email" name="email">
                </div>
                <div>
                    <label for="phone">Phone</label>
                    <input type="number" name="phone">
                </div>
                <div>
                    <label for="password">Password</label>
                    <input type="text" name="password">
                </div>
                <div>
                    <input type="submit" name="add_manager" value="Add Manager">
                </div>
            </form>
        </div>
    </center>
</div>
</body>
</html>