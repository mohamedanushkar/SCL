<?php
include '../../model/Connection.php';

$query = "SELECT notice.Notice_ID, student.id , student.Student_Name , notice.Heading , notice.Discription , notice.Time , notice.Date FROM notice JOIN student ON student.id = notice.Student_id";
$result = mysqli_query($conn, $query);
?>
<table id="employee_data2" class="table table-striped table-bordered">  
    <thead>  
        <tr>  
            <th>Name</th>
            <th>Address</th>
            <th>Phone</th>
            <th>Email</th>
            <th>Grade</th>  
            <th>Year</th>
            <th>Grade</th>  
            <th>Year</th>

        </tr>  
    </thead>  
    <?php
    while ($row = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td>{$row["id"]}</td>";
        echo "<td>{$row["Student_Name"]}</td>";
        echo "<td>{$row["Heading"]}</td>";
        echo "<td>{$row["Discription"]}</td>";
        echo "<td>{$row["Time"]}</td>";
        echo "<td>{$row["Date"]}</td>";
        echo "<td><a class='edit' data-id='{$row["Notice_ID"]}'><i class='fa fa-edit'></i></a></td>";
        echo "<td><a class='del' data-id='{$row["Notice_ID"]}'><i class='fa fa-trash'></i></a></td>";
        echo "</tr>";
    }
    ?>  
</table>  

<script>
    $(document).ready(function () {
        $('#employee_data2').DataTable();
    });
</script>  
