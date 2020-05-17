

<?php
include './../../../model/Connection.php';


session_start();

$ID = $_POST["SelectClass"];
$Teacher = $_SESSION["TechID"];

$query = "SELECT * FROM `tbl_batch_students` INNER JOIN tbl_student ON tbl_batch_students.Student_ID = tbl_student.Student_ID where Batch_ID = '$ID'";

$result = mysqli_query($conn, $query);
?>
<!DOCTYPE html>  


<table id="ATT1" class="table table-striped table-bordered">  
    <thead>  
        <tr>  
            <th>Student ID</th>

            <th>Name</th>
            <th>Status</th>

  
        </tr>  
    </thead>  
    <?php

    if ($result){
        while ($row = mysqli_fetch_array($result)) {

            echo "<tr>";
    
            echo "<td><input type='hidden'  name='Student_ID[]'  value='{$row["Student_ID"]}' class = 'form-control'>{$row["Student_ID"]}</td>";
    
            echo "<td>{$row["Student_Name"]}</td>";
    
            echo "<td><select class='form-control' name='Status[]' ><option value='1'>Present</option><option value='0'>Absent</option></select></td>";
    
            echo "</td>";
        }
    }
   
    ?>  
</table>



<script>
    $(document).ready(function () {
        $('#ATT1').DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": true,
        });
    });
</script>
