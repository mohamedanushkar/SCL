
<?php
include '../../model/Connection.php';



$date = $_POST["Date"];
$query = "SELECT teachers.Teachers_ID, teachers.Name, teachersattendence.Date, teachersattendence.Time, teachersattendence.Status FROM teachersattendence JOIN teachers ON teachers.Teachers_ID = teachersattendence.Teachers_ID WHERE teachersattendence.Date = '$date'";
$result = mysqli_query($conn, $query);
?>  
<!DOCTYPE html>  
<html>  
    <head>  
    </head>  
    <body>     
        <br>
        <table id="employee_data" class="table table-striped table-bordered">  
            <thead>  
                <tr>  
                    <th >Exam ID</th>
                    <th >Grade</th>
                    <th >Subject</th>
                    <th >Exam Name</th>
                    <th>Time</th>
                  
                </tr>  
            </thead>  
            <?php
            while ($row = mysqli_fetch_array($result)) {
                 echo "<tr>";
                echo "<td>{$row["Teachers_ID"]}</td>";
                echo "<td><input type='hidden' id='id' name='id' value='0'>{$row["Name"]}</td>";
                echo "<td><input type='hidden' id='id' name='id' value='0'>{$row["Date"]}</td>";
                echo "<td><input type='hidden' id='id' name='id' value='0'>{$row["Time"]}</td>";
                echo "<td>{$row["Status"]}</td>";
               
                               
                echo "</tr>";
            }
            ?>  
        </table> 
    </body>  
</html>  
<script>
    $(document).ready(function () {
        $('#employee_data').DataTable();
    });
</script>  