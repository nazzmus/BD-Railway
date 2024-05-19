<?php
include('controller/admin_session.php');
include('config/db_connection.php');
include('controller/manage_user.php');
?>

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
        <a href="logout.php">logout</a>
    </div>
</header>
<?php include('admin_sidebar.php'); ?>
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