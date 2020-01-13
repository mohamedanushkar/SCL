<?php
include '../../model/Connection.php';
$query = "SELECT * FROM tbl_Teachers";
$result = mysqli_query($conn, $query);
?>  
<!DOCTYPE html>  
<html>  
    <head>
    </head>
    <body>
    <table id="employee_data" class="table table-striped table-bordered">
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Address</th>
            <th>Phone</th>
            <th>Email</th>
            <th>Grade</th>
            <th>Joined Year</th>
            <th>Class</th>
            <th>Subject</th>
            <th>Status</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        </thead>
        <?php
        while ($row = mysqli_fetch_array($result)) {
            echo "        <tr> ";
            echo "<td>{$row["Teacher_ID"]}</td>";
            echo "<td>{$row["Teacher_Name"]}</td>";
            echo "<td>{$row["Teacher_Address"]}</td>";
            echo "<td>{$row["Teacher_Phone"]}</td>";
            echo "<td>{$row["Teachert_Email"]}</td>";
            echo "<td>{$row["Present_Year"]}</td>";
            echo "<td>{$row["Gender"]}</td>";
            echo "<td>{$row["Joined_Year"]}</td>";
            echo "<td>{$row["Subject_ID"]}</td>";
            echo "<td>{$row["Status"]}</td>";
            echo "<td><a class='edit'  data-Subject= '{$row["Subject_ID"]}'  data-id='{$row["Teacher_ID"]}'> <i  class='fa fa-edit'></i></a></td>";
            echo "<td><a  class='del' data-id='{$row["Teacher_ID"]}'> <i  class='fa fa-trash'></i></a></td>";
            echo "</tr>";
        }
        ?>
    </table>
    </body>  
</html>  
<script>
    $(document).ready(function () {
        $('#employee_data').DataTable();
    });
</script>  