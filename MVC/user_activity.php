<?php
include('controller/admin_session.php');
include('config/db_connection.php');
include('controller/activity_logic.php');
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

        table {
            width: 80%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #dddddd;
            padding: 8px;
            text-align: center;
        }

        th {
            background-color: #f2f2f2;
        }

        input[type="text"], input[type="number"], input[type="email"] {
            padding: 5px;
            width: 150px;
        }

        input[type="submit"] {
            padding: 5px 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
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
<div class="container">
    <div class="content">
        <center>
            <h1>User Activity Logs</h1>
            <table border="1px">
                <tr>
                    <th>Timestamp</th>
                    <th>User</th>
                    <th>Action</th>
                    <th>Details</th>
                </tr>
                <?php while ($log = mysqli_fetch_assoc($userLogsResult)): ?>
                    <tr>
                        <td><?php echo $log['timestamp']; ?></td>
                        <td><?php echo $log['username']; ?></td>
                        <td><?php echo $log['action']; ?></td>
                        <td><?php echo $log['details']; ?></td>
                    </tr>
                <?php endwhile; ?>
            </table>
        </center>
    </div>
</div>

</body>
</html>