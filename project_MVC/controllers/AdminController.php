<?php
session_start();
require_once '../config/db.php';
require_once '../models/UserModel.php';

class AdminController {
    private $userModel;

    public function __construct($conn) {
        $this->userModel = new UserModel($conn);
    }

    public function dashboard() {
        if (!isset($_SESSION['username']) || $_SESSION['usertype'] !== 'admin') {
            header("Location: ../views/login_view.php");
            exit;
        }

        include '../views/admin/dashboard.php';
    }
}

$conn = require '../config/db.php';
$controller = new AdminController($conn);
$controller->dashboard();
?>
