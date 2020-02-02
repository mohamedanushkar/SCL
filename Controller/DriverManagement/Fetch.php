<?php
include '../../model/Connection.php';

$query = "SELECT * FROM tbl_driver";
$result = mysqli_query($conn, $query);
?>
<head>
    
</head>
<body>
    
<table id="employee_data2" class="table table-striped table-bordered">  
    <thead>  
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Address</th>
            <th>Phone</th>
            <th>Email</th>
            <th>Gender</th>
            <th>Year</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>  
    </thead>  
    <?php
    while ($row = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td>{$row["Driver_ID"]}</td>";
        echo "<td>{$row["Driver_Name"]}</td>";
        echo "<td>{$row["Driver_Address"]}</td>";
        echo "<td>{$row["Driver_Phone"]}</td>";
        echo "<td>{$row["Driver_Email"]}</td>";
        echo "<td>{$row["Gender"]}</td>";
        echo "<td>{$row["Joined_Year"]}</td>";
        echo "<td><a class='edit'  data-id='{$row["Driver_ID"]}'><i class='fa fa-edit'></i></a></td>";
        echo "<td><a class='del' data-id='{$row["Driver_ID"]}'><i class='fa fa-trash'></i></a></td>";
        echo "</tr>";
    }
    ?>  
</table>  
</body>

<script>
    $(document).ready(function () {
        $('#employee_data2').DataTable();
    });
</script>  
