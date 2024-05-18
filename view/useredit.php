<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("location: login.php");
    exit;
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "webtech_project";

$data = mysqli_connect($servername, $username, $password, $dbname);

if (isset($_POST['update_profile'])) {
    
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    
    $update_sql = "UPDATE user SET username='$name', phone='$phone', email='$email', password='$password' WHERE username='{$_SESSION['username']}'";
    
    if (mysqli_query($data, $update_sql)) {
        
        $_SESSION['username'] = $name;
        echo "Profile updated successfully";
    } else {
        echo "Error updating profile: " . mysqli_error($data);
    }
}


$name = $_SESSION['username'];
$sql = "SELECT * FROM user WHERE username='$name'";
$result = mysqli_query($data, $sql);
$info = mysqli_fetch_assoc($result);
?>

<html>
<head>
    <title>User Profile</title>
    <link rel="stylesheet" href="user.css">
</head>
<body>
<header class="header">
    <a href="user.php">User Profile</a>
    <div class="logout">
        <a href="logout.php">logout</a>
    </div>
</header>
<aside>
    <ul>
        <li>
            <a href=""><h1>Profile</h1></a>
        </li>
        <li>
            <a href="ticket.php">Online Ticket</a>
        </li>
        <li>
            <a href="tracking.php">Real time Train Track</a>
        </li>
        <li>
            <a href="train.php">Train</a>
        </li>
        <li>
            <a href="station.php">Station</a>
        </li>
    </ul>
</aside>
<div class="content">
    <center>
        <h1>Update Profile</h1>
        <div class="profile">
            <form method="post">
                <div class="profile">
                    <label>Name</label>
                    <input type="text" name="name" value="<?php echo isset($info['username']) ? $info['username'] : ''; ?>">
                </div>
                <div class="profile">
                    <label>Phone</label>
                    <input type="text" name="phone" value="<?php echo isset($info['phone']) ? $info['phone'] : ''; ?>">
                </div>
                <div class="profile">
                    <label>Email</label>
                    <input type="text" name="email" value="<?php echo isset($info['email']) ? $info['email'] : ''; ?>">
                </div>
                <div class="profile">
                    <label>Password</label>
                    <input type="password" name="password" value="<?php echo isset($info['password']) ? $info['password'] : ''; ?>">
                </div>
                <div>
                    <input type="submit" name="update_profile" value="UPDATE">
                </div>
            </form>
        </div>
    </center>
</div>
</body>
</html>