<?php
session_start();

class LogoutController {
    public function logout() {
        session_destroy();
        header("location: ../views/login_view.php");
        exit;
    }
}

// Instantiate the controller and call the logout method
$controller = new LogoutController();
$controller->logout();
?>
