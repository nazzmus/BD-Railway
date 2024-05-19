<?php
include('config/db_connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['update_manager'])) {
        $managerId = $_POST['manager_id'];
        $newSchedule = $_POST['new_schedule'];
        $newSalary = $_POST['new_salary'];


        $updateSql = "UPDATE salary SET schedule = '$newSchedule', salary = '$newSalary' WHERE id = '$managerId'";
        if (mysqli_query($data, $updateSql)) {
            echo "Manager's schedule and salary updated successfully.";
        } else {
            echo "Error updating manager: " . mysqli_error($data);
        }
    } elseif (isset($_POST['update_employee'])) {
        $employeeId = $_POST['employee_id'];
        $newSchedule = $_POST['new_schedule'];
        $newSalary = $_POST['new_salary'];


        $updateSql = "UPDATE salary SET schedule = '$newSchedule', salary = '$newSalary' WHERE id = '$employeeId'";
        if (mysqli_query($data, $updateSql)) {
            echo "Employee's schedule and salary updated successfully.";
        } else {
            echo "Error updating employee: " . mysqli_error($data);
        }
    }
}


mysqli_close($data);
?>