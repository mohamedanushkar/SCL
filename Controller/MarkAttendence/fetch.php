

<?php
include '../../model/Connection.php';



$ID = $_POST["SelectClass"];

$query = "SELECT * FROM tbl_Student where tbl_Class_ID = '$ID'";

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




