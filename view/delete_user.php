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

if (isset($_POST['delete_user'])) {
    $user_id = $_POST['user_id'];
    
    
    if ($user_id == 1) {
        echo "Admin user cannot be deleted.";
    } else {
        $sql = "DELETE FROM user WHERE id = '$user_id'";
        $result = mysqli_query($data, $sql);

        if ($result) {
            echo "User Deleted Successfully";
        } else {
            echo "Failed to delete user";
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
            <a href="add_manager.php"> Add Manager</a>
        </li>
        <li>
            <a href="view_manager.php">View Manager</a>
        </li>
        <li>
            <a href="add_employee.php">add Employee</a>
        </li>
        <li>
            <a href="view_employee.php">View Employee</a>
        </li>
        <li>
            <a href=""><h1>Manage All User</h1></a>
        </li>
    </ul>
</aside>
<div class="content">
    <center>
        <h1>Delete User</h1>
        <br>
        <br>
        <div class="div_deg11">
            <form action="#" method="POST">
                <div>
                    <label for="user_id">User ID</label>
                    <input type="text" name="user_id">
                </div>
                <div>
                    <input type="submit" name="delete_user" value="Delete User">
                </div>
            </form>
        </div>
    </center>
</div>
</body>
</html>