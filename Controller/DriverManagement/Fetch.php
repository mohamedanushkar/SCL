<?php
include '../../model/Connection.php';

$query = "SELECT * FROM driver";
$result = mysqli_query($conn, $query);
?>
<head>
    
</head>
<body>
    
<table id="employee_data2" class="table table-striped table-bordered">  
    <thead>  
        <tr>  
            <th>Name</th>
            <th>Address</th>
            <th>Phone</th>
            <th>Email</th>
            <th>Grade</th>  
            
            <th>Grade</th>  
            <th>Year</th>

        </tr>  
    </thead>  
    <?php
    while ($row = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td>{$row["Driver_ID"]}</td>";
        echo "<td>{$row["Name"]}</td>";
        echo "<td>{$row["Address"]}</td>";
        echo "<td>{$row["Birth_Of_Date"]}</td>";
        echo "<td>{$row["Phone"]}</td>";
        
        echo "<td><a style='padding: 8px;    background-color: #449D44; color: White;    border-radius: 5px;' class='edit iconStyle'  data-id='{$row["Driver_ID"]}'><i class='fa fa-edit'></i></a></td>";
        echo "<td><a style='padding: 8px;    background-color: #337AB7; color: White;    border-radius: 5px;' class='del' data-id='{$row["Driver_ID"]}'><i class='fa fa-trash'></i></a></td>";
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
