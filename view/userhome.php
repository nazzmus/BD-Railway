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
  elseif($_SESSION['usertype']=='employee')
  {
    header("location:login.php");
  }

?>
<html>
    <head>
        <title>User Profile</title>
        <link rel="stylesheet" href="user.css">
    </head>
    <body>
      <header class="header">

        <a href="">User Profile</a>
        <div class="logout">
          <a href="logout.php">logout</a>
        </div>

      </header>
      <aside>

      <ul>
        <li>
          <a href="useredit.php">Profile</a>
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
      <div class=content>
        <h1>For changing password or name <br> Please select Profile option</h1>
        <p><h2>To reserve seats <b>Please buy Ticket first</b></h2></p>
    </div>
    </body>
</html>