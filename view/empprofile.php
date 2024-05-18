<?php

session_start();

  if(!isset($_SESSION['username']))
  {
    header("location:login.php");
  }
  elseif($_SESSION['usertype']=='admin')
  {
    header("location:login.php");
  }
  elseif($_SESSION['usertype']=='manager')
  {
    header("location:login.php");
  }
  elseif($_SESSION['usertype']=='user')
  {
    header("location:login.php");
  }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link rel="stylesheet" href="profile.css">
</head>
<body>
<a href="employeehome.php">HOME</a>
    <div class="profile-Box">
        <h1>User Profile</h1>
        <?php
            session_start();

            if (!isset($_SESSION['username'])) {
                echo "User not logged in";
            } else {
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "webtech_project";

                $conn = new mysqli($servername, $username, $password, $dbname);
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                $logged_in_username = $_SESSION['username'];
                $sql = "SELECT * FROM user WHERE username = '$logged_in_username'";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<p>Name: " . $row["username"] . "</p>";
                        echo "<p>Id: " . $row["id"] . "</p>";
                        echo "<p>Email: " . $row["email"] . "</p>";
                        echo "<p>Contact: " . $row["phone"] . "</p>";
                        echo "<p>Password: " . $row["password"] . "</p>";
                    }
                } else {
                    echo "User data not found";
                }

                $conn->close();
            }
        ?>
    </div>
</body>
</html>