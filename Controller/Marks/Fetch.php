

<?php
include '../../model/Connection.php';

$ExamID = $_POST["Exam_ID"];
$query = "SELECT * FROM exam WHERE ExamID = '$ExamID[0]]' ";

$result = mysqli_query($conn, $query);

while ($row = mysqli_fetch_assoc($result)) {

    $GradeIDClean = $row['Grade_ID'];
}




$query2 = "SELECT * FROM student WHERE Grade_ID = '$GradeIDClean' ";

$result2 = mysqli_query($conn, $query2);
?>
<!DOCTYPE html>  


<table id="employee_data" class="table table-striped table-bordered">  
    <thead>  
        <tr>  
            <th>Student ID</th>

            <th>Name</th>
            <th>Marks</th>


        </tr>  
    </thead>  
    <?php
    while ($row2 = mysqli_fetch_array($result2)) {

        echo "<tr>";

        echo "<td><input type='text'  name='Student_ID[]' id='Student_ID' value='{$row2["id"]}' class = 'form-control'></td>";

        echo "<td><input type='text' value='{$row2["Student_Name"]}' class = 'form-control'></td>";

        echo "<td><input type='text' name='Marks[]' type='text'  class = 'form-control'></td>";

        echo "</td>";
    }
    ?>  
</table>  

<div align="center">
    <button type="button" name="SaveDetails" id="SaveDetails" class="btn btn-success ">Add</button>
</div>
<script>
    $(document).ready(function () {



        $('#SaveDetails').click(function () {

            $.ajax({
                url: "../../Controller/Marks/insert.php",
                method: "POST",
                data: $('#insert_data').serialize(),
                success: function (data) {
                    $('#crud_table').html(data);
                    $('#insert_data')[0].reset();
                }
            });
        });
    });

</script>

