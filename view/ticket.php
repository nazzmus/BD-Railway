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
            <a href=""><h1>Online Ticket</h1></a>
        </li>
        <li>
            <a href="">Price</a>
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
        <h1>BUY TICKET</h1>
        <div class="profile">
            <form action="price.php" method="GET">
            <div class="profile">
    <label>FROM</label>
    <select name="from">
        <option value="Dhaka">Dhaka</option>
        <option value="Chittagong">Chittagong</option>
        <option value="Sylhet">Sylhet</option>
        <option value="Mymensingh">Mymensingh</option>
        <option value="Rajshahi">Rajshahi</option>
        <option value="Rangpur">Rangpur</option>
        <option value="Khulna">Khulna</option>
        
    </select>
</div>
<div class="profile">
    <label>TO</label>
    <select name="to">
    <option value="Dhaka">Dhaka</option>
        <option value="Chittagong">Chittagong</option>
        <option value="Sylhet">Sylhet</option>
        <option value="Mymensingh">Mymensingh</option>
        <option value="Rajshahi">Rajshahi</option>
        <option value="Rangpur">Rangpur</option>
        <option value="Khulna">Khulna</option>
    </select>
</div>
                <div class="profile">
    <label>Choose class</label>
    <select name="class">
        <option value="AC">AC</option>
        <option value="Non AC">NON AC</option>
    </select>
</div>
    <div class="profile">
    <label>Quantity</label>
    <select name="class">
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
    </select>
</div>
        <div class=profile>
          <label>Seat</label>
    <select name="Prefered Seat">
        <option value="Window">Window</option>
        <option value="Sleeper">Sleeper</option>
        </select>
</div>
                <div class="profile">
                    <input type="submit" value="NEXT">
                </div>
            </form>
        </div>
    </center>
</div>
</body>
</html>