<?php
include '../../model/Connection.php';

$query = "SELECT * FROM tbl_Notice";
$result = mysqli_query($conn, $query);
?>
<table id="employee_data2" class="table table-striped table-bordered">  
    <thead>  
        <tr>  
            <th>ID</th>
            <th>Title</th>
            <th>Description</th>
            <th>Date</th>
            <th>Name</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>  
    </thead>  
    <?php
    while ($row = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td>{$row["tbl_Notice_ID"]}</td>";
        echo "<td>{$row["Notice_Title"]}</td>";
        echo "<td>{$row["Description"]}</td>";
        echo "<td>{$row["Date"]}</td>";
        echo "<td>{$row["Student_ID"]}</td>";
        echo "<td><a class='edit' data-id='{$row["tbl_Notice_ID"]}'><i class='fa fa-edit'></i></a></td>";
        echo "<td><a class='del' data-id='{$row["tbl_Notice_ID"]}'><i class='fa fa-trash'></i></a></td>";
        echo "</tr>";
    }
    ?>  
</table>  

<script>
    $(document).ready(function () {
        $('#employee_data2').DataTable();
    });
</script>  
