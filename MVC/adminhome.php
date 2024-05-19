<?php
include('controller/admin_session.php');
?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="css/admin.css">
</head>
<body>
<header class="header">
    <a href="">Admin Dashboard</a>
    <div class="logout">
        <a href="logout.php">Logout</a>
    </div>
</header>
<?php include('admin_sidebar.php'); ?>
<div class="content">
    <h1>Admin Dashboard</h1>
</div>
</body>
</html>
