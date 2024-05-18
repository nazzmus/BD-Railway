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
  elseif($_SESSION['usertype']=='user')
  {
    header("location:login.php");
  }
  elseif($_SESSION['usertype']=='employee')
  {
    header("location:login.php");
  }

?>

<html>
    <head>
        <title>Manager Dashboard</title>
    </head>
    <body>
        manager home
        <a href="logout.php">Logout</a>
    </body>
</html>