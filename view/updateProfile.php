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
    <title>Update Profile</title>
    <link rel="stylesheet" href="update.css">
</head>
<body>
<a href="employeehome.php">HOME</a>
    <div class="profile-box">
        <h1>Update Profile</h1>
        <form action="updateprofileProcess.php" method="post">
            <label for="id">ID:</label>
            <input type="id" id="id" name="id" required><br><br>
            <label for="username">Username:</label>
            <input type="username" id="username" name="username" required><br><br>
            <label for="phone">Phone:</label>
            <input type="phone" id="phone" name="phone" required><br><br>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required><br><br>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required><br><br>

            <center><input type="submit" value="Update"></center>
        </form>
    </div>
</body>
</html>