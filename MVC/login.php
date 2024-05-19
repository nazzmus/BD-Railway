<html>
<head>
    <title>Login Form</title>
    <link rel="stylesheet" type="text/css" href="css/design.css">
</head>
<body background="images/rail.jpg" class="body_deg">
<nav>
    <label class="logo" for="">BD railway</label>
    <ul>
        <li><a href="home_view.php">Home</a></li>
        <li><a href=""><b>Login</b></a></li>
        <li><a href="registar.php">Register</a></li>
        <li><a href="">Contact us</a></li>
        
    </ul>
</nav>
<center>
    <div class="login_design">
        <center class="title_deg">
            BD Railway
            <h4>
                <?php
                session_start();
                if (isset($_SESSION['loginMessage'])) {
                    echo $_SESSION['loginMessage']; 
                    unset($_SESSION['loginMessage']); 
                }
                ?>
            </h4>
        </center>
        <form action="login_check.php" method="POST" class="log_form">
            <div>
                <label class="lable_deg" for="username">username:</label>
                <input type="text" id="username" name="username">
            </div>
            <div>
                <label class="lable_deg" for="password">password:</label>
                <input type="password" id="password" name="password">
            </div>
            <div>
                <input type="submit" name="submit" value="Login">
            </div>
        </form>
    </div>
</center>
</body>
</html>