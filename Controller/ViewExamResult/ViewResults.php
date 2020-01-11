
<?php
include '../../model/Connection.php';


$Exam_ID = $_POST["id"];

$query = "SELECT student.id, student.Student_Name, subject.Subject_Name, result.Marks FROM result JOIN exam ON exam.ExamID = result.ExamID JOIN student ON student.id = result.Student_id JOIN subject ON exam.Subject_ID = subject.Subject_ID WHERE exam.ExamID ='$Exam_ID'";
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
                   
                </tr>  
            </thead>  
            <?php
            while ($row = mysqli_fetch_array($result)) {
                 echo "<tr>";
                echo "<td>{$row["id"]}</td>";
                echo "<td>{$row["Student_Name"]}</td>";
                echo "<td>{$row["Subject_Name"]}</td>";
                echo "<td>{$row["Marks"]}</td>";
               
                         
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