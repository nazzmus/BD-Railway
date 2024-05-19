<?php
      include('config/db_connection.php');
            
            $sql = "SELECT * FROM salary WHERE usertype = 'employee'";
            $result = mysqli_query($data, $sql);

            if (!$result) {
                die("Error fetching employee data: " . mysqli_error($data));
            }

            
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row['username'] . "</td>";
                echo "<td>" . $row['schedule'] . "</td>";
                echo "<td>" . $row['salary'] . "</td>";
                echo "<td>";
                echo "<form action='#' method='POST'>";
                echo "<input type='hidden' name='employee_id' value='" . $row['id'] . "'>";
                echo "<label for='schedule'>New Schedule</label>";
                echo "<input type='text' name='new_schedule'>";
                echo "<label for='salary'>New Salary</label>";
                echo "<input type='number' name='new_salary'>";
                echo "<input type='submit' name='update_employee' value='Update'>";
                echo "</form>";
                echo "</td>";
                echo "</tr>";
            }
            ?>