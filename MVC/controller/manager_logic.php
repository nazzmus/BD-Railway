<?php
include('config/db_connection.php');


if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update_user'])) {
    $username = $_POST['username'];
    $newEmail = $_POST['email'];
    $newPhone = $_POST['phone'];

    $updateSql = "UPDATE user SET email = ?, phone = ? WHERE username = ?";
    $stmt = $data->prepare($updateSql);
    $stmt->bind_param("sss", $newEmail, $newPhone, $username);

    if ($stmt->execute()) {
        echo "<script>alert('User information updated successfully');</script>";
    } else {
        echo "<script>alert('Error updating user information');</script>";
    }

    $stmt->close();
}


$sql = "SELECT * FROM user WHERE usertype = 'manager'";
$result = mysqli_query($data, $sql);

if (!$result) {
    die("Error fetching user data: " . mysqli_error($data));
}
?>
