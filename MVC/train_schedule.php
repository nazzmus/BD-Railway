<?php 
    include('config/db_connection.php');
    ?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard - Train Schedule</title>
    <link rel="stylesheet" href="css/admin.css">
    <style type="text/css">
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

        input[type="text"], input[type="time"] {
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
        <a href="logout.php">logout</a>
    </div>
</header>
<?php include('admin_sidebar.php'); ?>
<div class="content">
    <center>
        <h1>View and Update Train Schedule</h1>
        <br>
        <h2>Train Schedules</h2>
        <table>
            <tr>
                <th>Train Name</th>
                <th>Departure Station</th>
                <th>Arrival Station</th>
                <th>Departure Time</th>
                <th>Arrival Time</th>
                <th>Actions</th>
            </tr>
            

            <?php include('controller/trainlogic.php'); ?>
            
        </table>
    </center>
</div>

<?php
include('controller/train_update.php');
?>

</body>
</html>
