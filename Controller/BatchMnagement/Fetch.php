<?php
include '../../model/Connection.php';
$query = "SELECT * FROM `tbl_batch` INNER JOIN tbl_teachers ON tbl_teachers.Teacher_ID = tbl_batch.Teacher_ID INNER JOIN tbl_class ON tbl_class.Class_ID = tbl_batch.Class_ID";
$result = mysqli_query($conn, $query);
?>
<table id="data" class="table table-striped table-bordered">
    <thead>
    <tr>
        <th>Batch_Number</th>
        <th>Teacher_Name</th>
        <th>Teacher_Phone</th>
        <th>Class_Name</th>
        <th>View Students List</th>
        <th>Options</th>
    </tr>
    </thead>
    <?php
    while ($row = mysqli_fetch_array($result)) {

        echo "        <tr> ";
        echo "<td>{$row["Batch_Number"]}</td>";
        echo "<td>{$row["Teacher_Name"]}</td>";
        echo "<td>{$row["Teacher_Phone"]}</td>";
        echo "<td>{$row["Class_Name"]}</td>";
        echo " <td> <a  class='view' data-id='{$row["Batch_ID"]}'> <i  class='fa fa-eye'></i></a></td>";
        echo " <td> <a  class='del' data-id='{$row["Batch_ID"]}'> <i  class='fa fa-trash'></i></a></td>";
        echo "           </tr>";
    }
    ?>
</table>
<script>
    $(document).ready(function () {
        $('#data').DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": true,
        });
    });
</script>