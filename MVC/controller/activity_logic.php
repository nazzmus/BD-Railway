<?php
if (!$data) {
    die("Connection failed: " . mysqli_connect_error());
}


$userLogsSql = "SELECT user_logs.timestamp, user.username, user_logs.action, user_logs.details 
                FROM user_logs 
                JOIN user ON user_logs.user_id = user.id 
                ORDER BY user_logs.timestamp DESC LIMIT 10";
$userLogsResult = mysqli_query($data, $userLogsSql);

if (!$userLogsResult) {
    die("Error fetching user logs: " . mysqli_error($data));
}
?>