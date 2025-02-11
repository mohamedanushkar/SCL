<table id="employee_data" class="table table-striped table-bordered">
    <thead>
    <tr>
        <th>Teacher ID
        <th>Date</th>
        <th>Status</th>
    </tr>
    </thead>
    <?php
    $date = date("Y-m-d");
    include '../../model/Connection.php';
    $query2 = "SELECT * FROM tbl_Attendence_Teachers INNER JOIN tbl_teachers ON tbl_teachers.Teacher_ID = tbl_attendence_teachers.Teacher_ID where Date = '$date'";
    $result2 = mysqli_query($conn, $query2);
    while ($row2 = mysqli_fetch_array($result2)) {
        echo "<tr>";
        echo "<td>{$row2["Teacher_ID"]} </td>";
        echo "<td>{$row2["Date"]}</td>";
        $status ='';
        if($row2["Status"]== 0){
            $status = '<label class="badge badge-danger">Absent</label>';
        }
        else{
            $status = '<label class="badge badge-success">Present</label>';
        }
        echo "<td>$status</td>";
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