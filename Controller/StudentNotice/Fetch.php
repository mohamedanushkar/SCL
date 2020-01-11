
<?php
include '../../model/Connection.php';


$Grade_ID = $_POST["Grade_ID"];
$Year = $_POST["Year"];
$query = "SELECT student.id, student.Student_Name FROM student WHERE student.Grade_ID = '$Grade_ID' AND student.Year = '$Year'";
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
                    <th>Exam ID</th>
                    <th>Grade</th>
                    <th>Select</th>

                </tr>  
            </thead>  
            <?php
            while ($row = mysqli_fetch_array($result)) {
                echo "<tr>";
                echo "<td>{$row["id"]}</td>";
                echo "<td>{$row["Student_Name"]}</td>";
                echo " <td> <a  class='select' data-id='{$row["id"]}'><i class='fa fa-check'></i></a></td>";
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