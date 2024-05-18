<?php
// models/LoginModel1.php

class LoginModel {
    private $db;

    public function __construct($dbConnection) {
        $this->db = $dbConnection;
    }

    public function authenticateUser($username, $password) {
        $sql = "SELECT * FROM user WHERE username=? AND password=?";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("ss", $username, $password);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }
}
?>
