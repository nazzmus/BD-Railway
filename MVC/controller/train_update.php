<?php
// Handle form submissions and update train schedules
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['update_schedule'])) {
        $scheduleId = $_POST['schedule_id'];
        $newDepartureTime = $_POST['new_departure_time'];
        $newArrivalTime = $_POST['new_arrival_time'];

        // Update train schedule in the database
        $updateSql = "UPDATE Schedules 
                      SET DepartureTime = '$newDepartureTime', ArrivalTime = '$newArrivalTime' 
                      WHERE ScheduleID = '$scheduleId'";
        if (mysqli_query($data, $updateSql)) {
            echo "Train schedule updated successfully.";
        } else {
            echo "Error updating train schedule: " . mysqli_error($data);
        }
    }
}

// Close the database connection
mysqli_close($data);
?>