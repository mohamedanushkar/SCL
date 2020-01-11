

<head>
    <title></title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="../../Assets/CSS/Form.css" rel="stylesheet" type="text/css"/>

</head>

<body style="margin-right: 300px">
    <p style="background-color: red; padding: 10px; color: white">Mark Attendence</p>

    <br />


    <div class="table-responsive">
        <form id="insert_data" style="margin: 10px">


            <?php
            include '../../model/Connection.php';



           
            $query2 = "SELECT * FROM teachers";

            $result2 = mysqli_query($conn, $query2);
            ?>
            <!DOCTYPE html>  


            <table id="employee_data" class="table table-striped table-bordered">  
                <thead>  
                    <tr>  
                        <th>Student ID</th>

                        <th>Name</th>
                        <th>Status</th>


                    </tr>  
                </thead>  
                <?php
                while ($row2 = mysqli_fetch_array($result2)) {

                    echo "<tr>";

                    echo "<td><input type='text'  name='Teachers_ID[]' id='Teachers_ID' value='{$row2["Teachers_ID"]}' class = 'form-control'></td>";

                    echo "<td><input type='text' value='{$row2["Name"]}' class = 'form-control'></td>";

                    echo "<td><select class='form-control' name='Status[]' id='Student_ID'><option value='1'>Present</option><option value='0'>Absent</option></select></td>";

                    echo "</td>";
                }
                ?>  
            </table>  
            
            <div align="center">
                <button type="button" name="SaveDetails" id="SaveDetails" class="btn btn-success ">Add</button>
            </div>



        </form>
        <div id="crud_table">
            </div>
    </div>
</body>

<script>
    $(document).ready(function () {



        $('#SaveDetails').click(function () {

            $.ajax({
                url: "../../Controller/MarkTeachersAttendence/MarkTeachersAttendence.php",
                method: "POST",
                data: $('#insert_data').serialize(),
                success: function (data) {
                    
                     $('#crud_table').html(data);
                    $('#insert_data')[0].reset();
                    $('#insert_data').html('');
                }
            });
        });
    });

</script>