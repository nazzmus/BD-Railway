<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="admin.css">
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

        input[type="text"], input[type="number"] {
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
<aside>
    <ul>
        <li><a href="add_user.php">Add User</a></li>
        <li><a href="view_and_update_user.php">View And Update User</a></li>
        <li><a href=""><h1>View Schedule and Salary</h1></a></li>
        <li><a href="add_manager.php">Add Manager</a></li>
        <li><a href="view_manager.php">View Manager</a></li>
        <li><a href="add_employee.php">Add Employee</a></li>
        <li><a href="view_employee.php">View And Update Users</a></li>
        <li><a href="delete_user.php">Manage All Users</a></li>
    </ul>
</aside>
<div class="content">
    <center>
        <h1>View Schedule and Salary</h1>
        <br>
        <h2>Managers</h2>
        <table>
            <tr>
                <th>Name</th>
                <th>Schedule</th>
                <th>Salary</th>
                <th>Actions</th>
            </tr>
            <?php
            // Connect to the database
            $serverName = "localhost";
            $userName = "root";
            $password = "";
            $dbName = "webtech_project";
            $data = mysqli_connect($serverName, $userName, $password, $dbName);

            if (!$data) {
                die("Connection failed: " . mysqli_connect_error());
            }

            // Fetch managers from the salary table
            $sql = "SELECT * FROM salary WHERE usertype = 'manager'";
            $result = mysqli_query($data, $sql);

            if (!$result) {
                die("Error fetching manager data: " . mysqli_error($data));
            }

            // Display manager schedule and salary
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row['username'] . "</td>";
                echo "<td>" . $row['schedule'] . "</td>";
                echo "<td>" . $row['salary'] . "</td>";
                echo "<td>";
                echo "<form action='#' method='POST'>";
                echo "<input type='hidden' name='manager_id' value='" . $row['id'] . "'>";
                echo "<label for='schedule'>New Schedule</label>";
                echo "<input type='text' name='new_schedule'>";
                echo "<label for='salary'>New Salary</label>";
                echo "<input type='number' name='new_salary'>";
                echo "<input type='submit' name='update_manager' value='Update'>";
                echo "</form>";
                echo "</td>";
                echo "</tr>";
            }
            ?>
        </table>
        <br>
        <h2>Employees</h2>
        <table>
            <tr>
                <th>Name</th>
                <th>Schedule</th>
                <th>Salary</th>
                <th>Actions</th>
            </tr>
            <?php
            // Fetch employees from the salary table
            $sql = "SELECT * FROM salary WHERE usertype = 'employee'";
            $result = mysqli_query($data, $sql);

            if (!$result) {
                die("Error fetching employee data: " . mysqli_error($data));
            }

            // Display employee schedule and salary
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row['username'] . "</td>";
                echo "<td>" . $row['schedule'] . "</td>";
                echo "<td>" . $row['salary'] . "</td>";
                echo "<td>";
                echo "<form action='#' method='POST'>";
                echo "<input type='hidden' name='employee_id' value='" . $row['id'] . "'>";
                echo "<label for='schedule'>New Schedule</label>";
                echo "<input type='text' name='new_schedule'>";
                echo "<label for='salary'>New Salary</label>";
                echo "<input type='number' name='new_salary'>";
                echo "<input type='submit' name='update_employee' value='Update'>";
                echo "</form>";
                echo "</td>";
                echo "</tr>";
            }
            ?>
                </table>
    </center>
</div>

<?php
// Handle form submissions and update schedules and salaries
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['update_manager'])) {
        $managerId = $_POST['manager_id'];
        $newSchedule = $_POST['new_schedule'];
        $newSalary = $_POST['new_salary'];

        // Update manager schedule and salary in the database
        $updateSql = "UPDATE salary SET schedule = '$newSchedule', salary = '$newSalary' WHERE id = '$managerId'";
        if (mysqli_query($data, $updateSql)) {
            echo "Manager's schedule and salary updated successfully.";
        } else {
            echo "Error updating manager: " . mysqli_error($data);
        }
    } elseif (isset($_POST['update_employee'])) {
        $employeeId = $_POST['employee_id'];
        $newSchedule = $_POST['new_schedule'];
        $newSalary = $_POST['new_salary'];

        // Update employee schedule and salary in the database
        $updateSql = "UPDATE salary SET schedule = '$newSchedule', salary = '$newSalary' WHERE id = '$employeeId'";
        if (mysqli_query($data, $updateSql)) {
            echo "Employee's schedule and salary updated successfully.";
        } else {
            echo "Error updating employee: " . mysqli_error($data);
        }
    }
}

// Close the database connection
mysqli_close($data);
?>

</body>
</html>

