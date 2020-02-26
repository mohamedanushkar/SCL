
<?php
include '../../model/Connection.php';


$Grade_ID = $_POST["Grade_ID"];
$Year = $_POST["Year"];
$query = "SELECT * FROM `tbl_batch_students` INNER JOIN tbl_batch on tbl_batch.Batch_ID = tbl_batch_students.Batch_ID INNER JOIN tbl_student on tbl_batch_students.Student_ID = tbl_student.Student_ID WHERE Class_ID = '$Grade_ID' AND Batch_Number = '$Year'";
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
                echo "<td>{$row["Student_ID"]}</td>";
                echo "<td>{$row["Student_Name"]}</td>";
                echo " <td> <a  class='select' data-id='{$row["Student_ID"]}'><i class='fa fa-check'></i></a></td>";
                echo "</tr>";
            }
            ?>  
        </table> 
    </body>  
</html>  
