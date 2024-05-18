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


<html>
    <head>
        <title>Employee Dashboard</title>
        <link rel="stylesheet" href="admin.css">
    </head>
    <body>
      <header class="header">
 
        <a href="">Employee Dashboard</a>
        <div class="logout">
          <a href="logout.php">logout</a>
        </div>
 
      </header>
      <aside>
      <ul>
        <li>
          <a href="empprofile.php"> View Profile </a>
        </li>
        <li>
          <a href="updateProfile.php"> Update profile </a>
        </li>
        <li>
          <a href="salary.php"> Salary </a>
        </li>
        <li>
          <a href="shiftManagement.php"> Shift Management </a>
        </li>
      </ul>
      </aside>
      <div class=content>
        <img src="train.jpg" width="850" height="450">
 
      </div>
    </body>
</html>