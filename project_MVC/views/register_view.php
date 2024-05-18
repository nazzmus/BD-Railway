<!DOCTYPE html>
<html>
<head>
    <title>Register Form</title>
    <link rel="stylesheet" type="text/css" href="design1.css">
</head>
<body background="rail.jpg" class="body_deg">
<nav>
    <label class="logo" for="">BD railway</label>
    <ul>
        <li><a href="home_view.php">Home</a></li>
        <li><a href="login_view.php">Login</a></li>
        <li><a href=""><b>Register</b></a></li>
        <li><a href="">Contact us</a></li>
    </ul>
</nav>
<center>
    <div class="login_design">
        <center class="title_deg">
            BD Railway Registration
            <h4>
                <?php
                session_start();
                if (isset($_SESSION['registerMessage'])) {
                    echo $_SESSION['registerMessage'];
                    unset($_SESSION['registerMessage']);
                }
                ?>
            </h4>
        </center>
        <form action="../controllers/RegisterController.php" method="POST" class="log_form">
            <div>
                <label class="lable_deg" for="username">Username:</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div>
                <label class="lable_deg" for="phone">Phone:</label>
                <input type="text" id="phone" name="phone" required>
            </div>
            <div>
                <label class="lable_deg" for="email">E-mail:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div>
                <label class="lable_deg" for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            
            <input type="hidden" name="usertype" value="user">
            <div>
                <input type="submit" name="submit" value="Register">
            </div>
        </form>
    </div>
</center>
</body>
</html>
