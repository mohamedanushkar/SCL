<?php
include '../../model/Connection.php';
$query = "SELECT * FROM tbl_Student";
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
                            <th>Name</th>
                            <th>Address</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Grade</th>  
                            <th>Year</th>
                            <th>Joined Date</th>
                            <th>Year</th>
                            <th>Joined Date</th>
                            <th>Joined Date</th>
                        </tr>  
                    </thead>  
                    <?php
                    while ($row = mysqli_fetch_array($result)) {

                        echo "        <tr> ";
                        echo "<td>{$row["id"]}</td>";
                        echo "<td>{$row["Student_Name"]}</td>";
                        echo "<td>{$row["Student_Address"]}</td>";
                        echo "<td>{$row["Student_Phone"]}</td>";
                        echo "<td>{$row["Student_Email"]}</td>";
                        echo "<td>{$row["Grade_ID"]}</td>";
                        echo "<td>{$row["Year"]}</td>";
                        echo "<td>{$row["JoinedDate"]}</td>";

                        echo " <td> <a  class='edit' data-grade= '{$row["Grade_ID"]}'  data-id='{$row["id"]}'> <i  class='fa fa-edit'></i></a></td>";
                        echo "<td>  <a  class='del' data-id='{$row["id"]}'> <i  class='fa fa-trash'></i></a></td>";

                        echo "           </tr>";
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