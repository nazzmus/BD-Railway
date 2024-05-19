<?php
include('controller/admin_session.php');
include('config/db_connection.php');
include('controller/add_user_logic.php');
?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="css/admin.css">
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
        <a href="logout.php">Logout</a>
    </div>
</header>
<?php include('admin_sidebar.php'); ?>
<div class="content">
    <center>
        <h1>Add User</h1>
        <br>
        <br>
        <div class="div_deg11">
            <form action="#" method="POST">
                <div>
                    <label for="name">Username</label>
                    <input type="text" name="name" required>
                </div>
                <div>
                    <label for="email">E-mail</label>
                    <input type="email" name="email" required>
                </div>
                <div>
                    <label for="phone">Phone</label>
                    <input type="number" name="phone" required>
                </div>
                <div>
                    <label for="password">Password</label>
                    <input type="text" name="password" required>
                </div>
                <div>
                    <label for="usertype">User Type</label>
                    <select name="usertype" required>
                        <option value="user">User</option>
                        <option value="manager">Manager</option>
                        <option value="employee">Employee</option>
                    </select>
                </div>
                <div>
                    <input type="submit" name="add_user" value="Add User">
                </div>
            </form>
        </div>
    </center>
</div>
</body>
</html>
