<?php
include('config/db_connection.php');
if (isset($_POST['delete_user'])) {
    $user_id = $_POST['user_id'];
    
    
    if ($user_id == 1) {
        echo "Admin user cannot be deleted.";
    } else {
        $sql = "DELETE FROM user WHERE id = '$user_id'";
        $result = mysqli_query($data, $sql);

        if ($result) {
            echo "User Deleted Successfully";
        } else {
            echo "Failed to delete user";
        }
    }
}
?>