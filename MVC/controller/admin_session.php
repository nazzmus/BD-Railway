<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("location:login.php");
    exit; 
}

if ($_SESSION['usertype'] !== 'admin') {
    header("location:login.php");
    exit; 
}
?>
