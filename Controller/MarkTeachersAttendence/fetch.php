

<?php
include '../../model/Connection.php';


$query = "SELECT * FROM tbl_Teachers";

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

        echo "<td><input type='hidden'  name='Teacher_ID[]' id='Teacher_ID' value='{$row["Teacher_ID"]}' class = 'form-control'>{$row["Teacher_ID"]}</td>";

        echo "<td>{$row["Teacher_Name"]}</td>";

        echo "<td><select class='form-control' name='Status[]' id='Status'><option value='1'>Present</option><option value='0'>Absent</option></select></td>";

        echo "</td>";
    }
    ?>  
</table>  




