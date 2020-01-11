
<?php
include '../../model/Connection.php';
$query = "SELECT special_awards.Special_Awards_ID, student.Student_Name, special_awards.Award_Name, special_awards.Description , special_awards.Recieved_Date FROM special_awards INNER JOIN student ON student.id = special_awards.Student_ID";
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
                    <th>Award ID</th> 
                    <th>Student Nama</th> 
                    <th>Award Name</th>
                    <th>Description</th>
                    <th>Recieved Date</th>
                    <th>Edit</th>
                    <th>Delete</th>

                </tr>  
            </thead>  
            <?php
            while ($row = mysqli_fetch_array($result)) {

                echo "<tr>";
                echo "<td>{$row["Special_Awards_ID"]}</td>";
                echo "<td>{$row["Student_Name"]}</td>";
                echo "<td>{$row["Award_Name"]}</td>";
                echo "<td>{$row["Description"]}</td>";
                echo "<td>{$row["Recieved_Date"]}</td>";
                echo " <td> <a  class='edit' data-id='{$row["Special_Awards_ID"]}'> <i  class='fa fa-edit'></i></a></td>";
                echo "<td>  <a  class='del' data-id='{$row["Special_Awards_ID"]}'> <i  class='fa fa-trash'></i></a></td>";
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