<html>
<head>
    <title>Add User</title>
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
    <a href="dashboard.php">Admin Dashboard</a>
    <div class="logout">
        <a href="logout.php">logout</a>
    </div>
</header>
<aside>
    <ul>
        <li>
            <a href=""><h1>Add User</h1></a>
        </li>
        <!-- Other navigation links -->
    </ul>
</aside>
<div class="content">
    <center>
        <h1>Add User</h1>
        <br><br>
        <div class="div_deg11">
        <form action="controllers/AddUserController.php" method="POST">

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
                    <label for="usertype">User Type</label>
                    <!-- Dropdown menu for selecting user type -->
                    <select name="usertype">
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
