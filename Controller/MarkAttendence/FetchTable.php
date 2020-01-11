<table id="employee_data" class="table table-striped table-bordered">
    <thead>
    <tr>
        <th>Student ID
        <th>Date</th>
        <th>Status</th>
    </tr>
    </thead>
    <?php
    include '../../model/Connection.php';
    $query2 = "SELECT * FROM tbl_attendence";
    $result2 = mysqli_query($conn, $query2);
    while ($row2 = mysqli_fetch_array($result2)) {
        echo "<tr>";
        echo "<td>{$row2["Student_ID"]} </td>";
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