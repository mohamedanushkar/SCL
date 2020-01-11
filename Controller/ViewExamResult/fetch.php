
<?php
include '../../model/Connection.php';


$Grade_ID = $_POST["Grade_ID"];

$query = "SELECT exam.ExamID, grade.Grade_Name, subject.Subject_Name,exam_name.Exam_Name, exam.Exam_Time,exam.Date FROM exam JOIN grade ON grade.Grade_ID = exam.Grade_ID JOIN subject ON subject.Subject_ID = exam.Subject_ID JOIN exam_name ON exam_name.Exam_Name_ID = exam.Exam_Name_ID WHERE exam.Grade_ID ='$Grade_ID'";
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
                    <th>Edit</th>
                    
                </tr>  
            </thead>  
            <?php
            while ($row = mysqli_fetch_array($result)) {
                 echo "<tr>";
                echo "<td>{$row["ExamID"]}</td>";
                echo "<td><input type='hidden' id='id' name='id' value='0'>{$row["Grade_Name"]}</td>";
                echo "<td><input type='hidden' id='id' name='id' value='0'>{$row["Subject_Name"]}</td>";
                echo "<td><input type='hidden' id='id' name='id' value='0'>{$row["Exam_Name"]}</td>";
                echo "<td>{$row["Exam_Time"]}</td>";
                echo "<td>{$row["Date"]}</td>";
                echo "<td><a class='edit' data-id='{$row["ExamID"]}'> <i  class='fa fa-eye'></i></a></td>";               
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