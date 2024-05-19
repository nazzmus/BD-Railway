<?php
    
    $sql = "SELECT s.*, t.TrainName, ds.StationName AS DepartureStation, ars.StationName AS ArrivalStation 
    FROM Schedules s
    JOIN Trains t ON s.TrainID = t.TrainID
    JOIN Stations ds ON s.DepartureStationID = ds.StationID
    JOIN Stations ars ON s.ArrivalStationID = ars.StationID";
$result = mysqli_query($data, $sql);

if (!$result) {
die("Error fetching train schedule data: " . mysqli_error($data));
}


while ($row = mysqli_fetch_assoc($result)) {
echo "<tr>";
echo "<td>" . $row['TrainName'] . "</td>";
echo "<td>" . $row['DepartureStation'] . "</td>";
echo "<td>" . $row['ArrivalStation'] . "</td>";
echo "<td>" . $row['DepartureTime'] . "</td>";
echo "<td>" . $row['ArrivalTime'] . "</td>";
echo "<td>";
echo "<form action='#' method='POST'>";
echo "<input type='hidden' name='schedule_id' value='" . $row['ScheduleID'] . "'>";
echo "<label for='new_departure_time'>New Departure Time</label>";
echo "<input type='time' name='new_departure_time'>";
echo "<label for='new_arrival_time'>New Arrival Time</label>";
echo "<input type='time' name='new_arrival_time'>";
echo "<input type='submit' name='update_schedule' value='Update'>";
echo "</form>";
echo "</td>";
echo "</tr>";
}
?>