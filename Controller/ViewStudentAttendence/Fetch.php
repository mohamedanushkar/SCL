
<?php
include '../../model/Connection.php';


$Grade_ID = $_POST["Grade_ID"];
$date = $_POST["Date"];
$query = "SELECT student.id, student.Student_Name , grade.Grade_Name, stuattendence.Date, stuattendence.Time,stuattendence.Status FROM stuattendence JOIN student ON student.id = stuattendence.Student_id JOIN grade ON grade.Grade_ID = stuattendence.Grade_ID WHERE stuattendence.Grade_ID = '$Grade_ID' AND stuattendence.Date = '$date'";
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
                    <th >Date</th>
                   
                    
                </tr>  
            </thead>  
            <?php
            while ($row = mysqli_fetch_array($result)) {
                 echo "<tr>";
                echo "<td>{$row["id"]}</td>";
                echo "<td><input type='hidden' id='id' name='id' value='0'>{$row["Student_Name"]}</td>";
                echo "<td><input type='hidden' id='id' name='id' value='0'>{$row["Grade_Name"]}</td>";
                echo "<td><input type='hidden' id='id' name='id' value='0'>{$row["Date"]}</td>";
                echo "<td>{$row["Time"]}</td>";
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