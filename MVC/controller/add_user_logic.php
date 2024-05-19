<?php
if (isset($_POST['add_user'])) {
    $username = $_POST['name'];
    $user_email = $_POST['email'];
    $user_phone = $_POST['phone'];
    $user_password = $_POST['password'];
    $usertype = $_POST['usertype'];

    $check_sql = "SELECT * FROM user WHERE username = '$username'";
    $check_result = mysqli_query($data, $check_sql);
    if (mysqli_num_rows($check_result) > 0) {
        echo "Username already exists!";
    } else {
        $sql = "INSERT INTO user (username, email, phone, usertype, password) VALUES ('$username', '$user_email', '$user_phone', '$usertype', '$user_password')";
        $result = mysqli_query($data, $sql);

        if ($result) {
            echo "Data Uploaded Successfully";
        } else {
            echo "Upload Failed";
        }
    }
}
?>
