<?php
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $from = $_GET["from"];
    $to = $_GET["to"];
    if ($from === $to) {
        echo "<p><center>Error: FROM and TO cannot be the same. Please select different values.</center></p>";
    } else {
    }
}
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
          <a href="useredit.php">Profile</a>
        </li>
        <li>
          <a href="ticket.php">Online Ticket</a>
        </li>
        <li>
          <a href=""><h1>Price</h1></a>
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
        <Center>
          <h1>TOTAL</h1>
        <div class=profile>
        <form class="">
        <div class="profile">
          <label>Price</label>
                    <input type="text" name="price">
                </div>
          
          <input type="submit" name="update_profile" value="BUY">
</div>
</form>
</center>
</div>
    </div>
    </body>
</html>