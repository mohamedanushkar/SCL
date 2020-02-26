

<?php
include '../../model/Connection.php';



$ID = $_POST["SelectClass"];

$query = "SELECT * FROM `tbl_batch_students` INNER JOIN tbl_student ON tbl_batch_students.Student_ID = tbl_student.Student_ID where Batch_ID = '$ID'";

$result = mysqli_query($conn, $query);
?>
<!DOCTYPE html>  


<table id="employee_data" class="table table-striped table-bordered">  
    <thead>  
        <tr>  
            <th>Student ID</th>

            <th>Name</th>
            <th>Status</th>

  
        </tr>  
    </thead>  
    <?php
    while ($row = mysqli_fetch_array($result)) {

        echo "<tr>";

        echo "<td><input type='hidden'  name='Student_ID[]' id='Student_ID' value='{$row["Student_ID"]}' class = 'form-control'>{$row["Student_ID"]}</td>";

        echo "<td>{$row["Student_Name"]}</td>";

        echo "<td><select class='form-control' name='Status[]' id='Status'><option value='1'>Present</option><option value='0'>Absent</option></select></td>";

        echo "</td>";
    }
    ?>  
</table>



<script>
    $(document).ready(function () {
        $('#employee_data').DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": true,
        });
    });
</script>
