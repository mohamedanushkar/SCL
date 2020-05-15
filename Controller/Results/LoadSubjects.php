

<?php
include '../../model/Connection.php';



$ID = $_POST["id"];

$query = "SELECT * FROM `tbl_subject` INNER JOIN exam_subjects ON tbl_subject.Subject_ID = exam_subjects.Subject_ID where Exam_ID = '$ID'";

$result = mysqli_query($conn, $query);
?>
<!DOCTYPE html>


<table id="data" class="table table-striped table-bordered">
    <thead>
    <tr>
        <th>Subject ID</th>

        <th>Subject Name</th>
        <th>Marks</th>


    </tr>
    </thead>
    <?php
    while ($row = mysqli_fetch_array($result)) {

        echo "<tr>";

        echo "<td><input type='hidden'  name='Subject_ID[]' id='Subject_ID' value='{$row["Subject_ID"]}' class = 'form-control'>{$row["Subject_ID"]}</td>";

        echo "<td>{$row["Name"]}</td>";

        echo "<td><input type='number'  name='Marks[]' max='100' min='0' id='Marks' class = 'form-control Marks'></td>";

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
