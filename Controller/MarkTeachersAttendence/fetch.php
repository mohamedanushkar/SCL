

<?php
include '../../model/Connection.php';


$query = "SELECT * FROM tbl_Teachers";

$result = mysqli_query($conn, $query);
?>
<!DOCTYPE html>  


<table id="loadddd" class="table table-striped table-bordered">
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

        echo "<td><input type='hidden'  name='Teacher_ID[]'  value='{$row["Teacher_ID"]}' class = 'form-control'>{$row["Teacher_ID"]}</td>";

        echo "<td>{$row["Teacher_Name"]}</td>";

        echo "<td><select class='form-control' name='Status[]'><option value='1'>Present</option><option value='0'>Absent</option></select></td>";

        echo "</td>";
    }
    ?>  
</table>

<script>
    $(document).ready(function () {
        $('#loadddd').DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": true,
        });
    });
</script>


