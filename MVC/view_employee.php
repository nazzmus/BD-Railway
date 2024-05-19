<?php
include('controller/admin_session.php');
include('config/db_connection.php');
include('controller/employee_logic.php');
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
        <a href="logout.php">logout</a>
    </div>
</header>
<?php include('admin_sidebar.php'); ?>
<div class="content">
    <center>
        <h1>View/Update Employee Info</h1>
        <br>
        <br>
        <input type="text" id="searchInput" placeholder="Search by Name">
        <button onclick="searchUser()">Search</button>
        <br>
        <br>
        <table border="1px" id="userTable">
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
                            <form action="" method="POST">
                                <input type="hidden" name="username" value="<?php echo $info['username']; ?>">
                                <label for="email">New E-mail</label>
                                <input type="email" name="email" value="<?php echo $info['email']; ?>">
                                <label for="phone">New Phone</label>
                                <input type="number" name="phone" value="<?php echo $info['phone']; ?>">
                                <input type="submit" name="update_user" value="Update">
                            </form>
                        </td>
                    <?php endif; ?>
                </tr>
            <?php endwhile; ?>
        </table>
    </center>
</div>

<script>
function searchUser() {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("searchInput");
    filter = input.value.toUpperCase();
    table = document.getElementById("userTable");
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
