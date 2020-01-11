

<?php
include '../../model/Connection.php';



$Grade_ID = $_POST["Grade_ID"];
$query2 = "SELECT * FROM student WHERE Grade_ID = '$Grade_ID' ";

$result2 = mysqli_query($conn, $query2);
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
    while ($row2 = mysqli_fetch_array($result2)) {

        echo "<tr>";

        echo "<td><input type='text'  name='Student_ID[]' id='Student_ID' value='{$row2["id"]}' class = 'form-control'></td>";

        echo "<td><input type='text' value='{$row2["Student_Name"]}' class = 'form-control'></td>";

        echo "<td><select class='form-control' name='Status[]' id='Student_ID'><option value='1'>Present</option><option value='0'>Absent</option></select></td>";

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
                url: "../../Controller/MarkAttendence/insert.php",
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

