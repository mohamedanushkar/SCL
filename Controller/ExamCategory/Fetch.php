
<?php

include '../../model/Connection.php';
$query = "SELECT * FROM Exam_Name";
$result = mysqli_query($conn, $query);
?>  
<!DOCTYPE html>  
<html>  
    <head>  


    </head>  
    <body>  
        <br /><br />  
        

        <br />  

        <table id="employee_data" class="table table-striped table-bordered">  
            <thead>  
                <tr>  
                    <th>ID</th>
            <th>Subject Name</th>        
            <th>Edit</th>
            <th>Delete</th>
                   
                </tr>  
            </thead>  
            <?php
            while ($row = mysqli_fetch_array($result)) {

                echo "<tr>";
                echo "<td>{$row["Exam_Name_ID"]}</td>";
                echo "<td>{$row["Exam_Name"]}</td>";
                echo " <td> <a  class='edit' data-id='{$row["Exam_Name_ID"]}'> <i  class='fa fa-edit'></i></a></td>";
                echo "<td>  <a  class='del' data-id='{$row["Exam_Name_ID"]}'> <i  class='fa fa-trash'></i></a></td>";
                echo "</td>";
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