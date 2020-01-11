
<?php
include '../../model/Connection.php';
$query = "SELECT exam.ExamID, grade.Grade_ID ,grade.Grade_Name, subject.Subject_ID, subject.Subject_Name, exam_name.Exam_Name_ID,exam_name.Exam_Name, exam.Exam_Time,exam.Date FROM exam JOIN grade ON grade.Grade_ID = exam.Grade_ID JOIN subject ON subject.Subject_ID = exam.Subject_ID JOIN exam_name ON exam_name.Exam_Name_ID = exam.Exam_Name_ID";
$result = mysqli_query($conn, $query);
?>  
<!DOCTYPE html>  
<html>  
    <head>  
    </head>  
    <body>     

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
                    <th>Delete</th>
                </tr>  
            </thead>  
            <?php
            while ($row = mysqli_fetch_array($result)) {
                echo "<tr>";
                echo "<td>{$row["ExamID"]}</td>";
               echo "<td><input type='hidden' id='Grade_Namef' name='Grade_Namef' value='{$row["Grade_ID"]}'>{$row["Grade_Name"]}</td>";
                echo "<td><input type='hidden' id='Subject_Namef' name='Subject_Namef' value='{$row["Subject_ID"]}'>{$row["Subject_Name"]}</td>";
                echo "<td><input type='hidden' id='Exam_Namef' name='Exam_Namef' value='{$row["Exam_Name_ID"]}'>{$row["Exam_Name"]}</td>";
                echo "<td>{$row["Exam_Time"]}</td>";
                echo "<td>{$row["Date"]}</td>";
                echo "<td><a class='edit' data-id='{$row["ExamID"]}'> <i  class='fa fa-edit'></i></a></td>";
                echo "<td><a class='del' data-id='{$row["ExamID"]}'> <i  class='fa fa-trash'></i></a></td>";
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