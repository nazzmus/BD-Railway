<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("location: login.php");
    exit; 
}

$serverName = "localhost";
$userName = "root";
$password = "";
$dbName = "webtech_project";
$data = mysqli_connect($serverName, $userName, $password, $dbName);

if (!$data) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if the user is an admin
if ($_SESSION['usertype'] === 'admin') {
    // Process employee info update
    if (isset($_POST['update_employee'])) {
        $username = $_POST['username'];
        $user_email = $_POST['email'];
        $user_phone = $_POST['phone'];

        $update_sql = "UPDATE user SET email='$user_email', phone='$user_phone' WHERE username='$username'";
        $update_result = mysqli_query($data, $update_sql);
        if ($update_result) {
            echo "Employee Info Updated Successfully";
        } else {
            echo "Failed to Update Employee Info";
        }
    }
}

// Fetch all employees
$sql = "SELECT * FROM user WHERE usertype = 'employee'";
$result = mysqli_query($data, $sql);

if (!$result) {
    die("Error fetching employee data: " . mysqli_error($data));
}
?>
<!DOCTYPE html>
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
            <a href="add_manager.php">Add Manager</a>
        </li>
        <li>
            <a href="view_manager.php">View Manager</a>
        </li>
        <li>
            <a href="add_employee.php">Add Employee</a>
        </li>
        <li>
            <a href=""><h1>View And Update Employee</h1></a>
        </li>
        <li>
            <a href="delete_user.php">Manage All User</a>
        </li>
    </ul>
</aside>
<div class="content">
    <center>
        <h1>View/Update Employee Info</h1>
        <br>
        <br>
        <input type="text" id="searchInput" placeholder="Search by Name">
        <button onclick="searchEmployee()">Search</button>
        <br>
        <br>
        <table border="1px" id="employeeTable">
            <tr>
                <th style="padding: 20px; font-size: 15px;">Username</th>
                <th style="padding: 20px; font-size: 15px;">Phone</th>
                <th style="padding: 20px; font-size: 15px;">E-mail</th>
                <?php if ($_SESSION['usertype'] === 'admin'): ?>
                    <th style="padding: 20px; font-size: 15px;">Actions</th>
                <?php endif; ?>
            </tr>
            <?php while ($info = mysqli_fetch_assoc($result)): ?>
                <tr>
                    <td style="padding: 20px"><?php echo $info['username']; ?></td>
                    <td style="padding: 20px"><?php echo $info['phone']; ?></td>
                    <td style="padding: 20px"><?php echo $info['email']; ?></td>
                    <?php if ($_SESSION['usertype'] === 'admin'): ?>
                        <td style="padding: 20px">
                            <form action="#" method="POST">
                                <input type="hidden" name="username" value="<?php echo $info['username']; ?>">
                                <label for="email">New E-mail</label>
                                <input type="email" name="email" value="<?php echo $info['email']; ?>">
                                <label for="phone">New Phone</label>
                                <input type="number" name="phone" value="<?php echo $info['phone']; ?>">
                                <input type="submit" name="update_employee" value="Update">
                            </form>
                        </td>
                    <?php endif; ?>
                </tr>
            <?php endwhile; ?>
        </table>
    </center>
</div>

<script>
function searchEmployee() {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("searchInput");
    filter = input.value.toUpperCase();
    table = document.getElementById("employeeTable");
    tr = table.getElementsByTagName("tr");
    for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[0];
        if (td) {
            txtValue = td.textContent || td.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
        }
    }
}
</script>
</body>
</html>