<table id="employee_data1" class="table table-striped table-bordered">
    <thead>
    <tr>
        <th>Student ID
        <th>Date</th>
        <th>Status</th>
    </tr>
    </thead>
    <?php
    include '../../model/Connection.php';
    $date = date("Y-m-d");
    $query2 = "SELECT * FROM tbl_attendence inner join tbl_student on tbl_student.Student_ID = tbl_attendence.Student_ID where Date = '$date'";
    $result2 = mysqli_query($conn, $query2);
    while ($row2 = mysqli_fetch_array($result2)) {
        echo "<tr>";
        echo "<td>{$row2["Student_ID"]} </td>";
        echo "<td>{$row2["Date"]}</td>";
        echo "<td>{$row2["Student_Name"]}</td>";
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
        $('#employee_data1').DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": true,
        });
    });
</script>