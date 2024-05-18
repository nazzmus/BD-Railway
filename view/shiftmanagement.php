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
    <title>Shift Management</title>
    <link rel="stylesheet" href="shift.css">
</head>
<body>
<a href="employeehome.php">HOME</a>
    <div class="shift-box">
        <h2>Shift Schedule</h2>
        <p>Morning Shift: Sunday to Thursday, 10:00 AM to 7:00 PM</p>
        <p>Night Shift: Sunday to Thussday, 11:00 PM to 6:00 AM</p>
    </div>
</body>
</html>